<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TopUpAdmin;
use App\Models\TopUpAgent;
use App\Models\TopUpPlayer;
use Illuminate\Support\Facades\Validator;
use App\Models\OperationLogs;
use Illuminate\Support\Facades\DB;

class TopUpController extends Controller
{
    protected $currentAdmin = null;

    public function __construct()
    {
        //TODO 完成权限控制之后需要更新session此值
        $this->currentAdmin = session('user') ?: User::find(1);
    }

    //给总代理商充卡
    public function topUp2TopAgent(Request $request, $receiver, $type, $amount)
    {
        Validator::make($request->route()->parameters,[
            'receiver' => 'required|string|exists:users,account',
            'type' => 'required|integer|exists:item_type,id',
            'amount' => 'required|integer|not_in:0',
        ])->validate();

        $receiverModel = User::with(['inventory' => function ($query) use ($type) {
            $query->where('item_id', $type);
        }])->where('account', $receiver)->firstOrFail();

        if (! $this->isTopAgent($receiverModel)) {
            return [ 'error' => '只能给总代理商充值' ];
        }

        $this->topUp($receiverModel, $type, $amount);

        //TODO 日志记录
        return [
            'message' => '充值成功',
        ];
    }

    protected function isTopAgent($agent)
    {
        return 2 == $agent->group_id;
    }

    protected function topUp($receiver, $type, $amount)
    {
        return DB::transaction(function () use ($receiver, $type, $amount){
            //记录充值流水
            TopUpAdmin::create([
                'provider_id' => $this->currentAdmin->id,
                'receiver_id' => $receiver->id,
                'type' => $type,
                'amount' => $amount,
            ]);

            //更新库存
            if (empty($receiver->inventory)) {
                $receiver->inventory()->create([
                    'user_id' => $receiver->id,
                    'item_id' => $type,
                    'stock' => $amount,
                ]);
            } else {
                $totalStock = $amount + $receiver->inventory->stock;
                $receiver->inventory->update([
                    'stock' => $totalStock,
                ]);
            }
        });
    }

    //管理员给总代的充卡记录
    public function topUp2TopAgentHistory()
    {
        //TODO 日志记录
        return TopUpAdmin::with(['provider', 'receiver', 'item'])->get();
    }

    //上级代理商给下级的充卡记录
    public function Agent2AgentHistory()
    {
        //TODO 日志记录
        return TopUpAgent::with(['provider', 'receiver', 'item'])->get();
    }

    //代理商给玩家的充卡记录
    public function Agent2PlayerHistory()
    {
        //TODO 日志记录
        return TopUpPlayer::with(['provider', 'item'])->get();
    }

}