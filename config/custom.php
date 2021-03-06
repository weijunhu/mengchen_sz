<?php
/**
 * Created by PhpStorm.
 * User: liudian
 * Date: 9/23/17
 * Time: 15:47
 */

return [
    //是否开启系统日志记录功能
    'operation_log' => env('OPERATION_LOG', true),

    //是否开启邮件通知(新的库存申请，通知管理员)
    'email_notification' => env('EMAIL_NOTIFICATION', false),

    //计划任务日志
    'cron_task_log' => storage_path('logs/' . env('CRON_TASK_LOG', 'artisan.log')),

    //游戏服数据缓存时的key
    'game_server_cache_duration' => 3,              //数据缓存时间，3min
    'game_server_cache_players' => 'game:players',  //缓存所有玩家数据
    'game_server_cache_room_history' => 'room:history',     //格式化之后的房间历史记录的缓存
    'game_server_cache_currency_log' => 'currency:all',     //道具消耗记录的缓存(暂未使用)
    'game_server_cache_valid_card_agent_log' => 'valid-card:agent',     //包含了有效耗卡数据的代理商给玩家充值记录
    'game_server_cache_valid_card_consumed_log' => 'valid-card:consumed',     //从后端返回的道具消耗日志中提取有效耗卡记录并缓存
    'cache_room_statement' => 'room:statement',     //房间数据报表
    'cache_community_log' => 'community:log:',       //社区动态消息是否已读，缓存（prifix）

    //游戏后端数据交互接口信息
    'game_api_address' => env('GAME_API_ADDRESS'),
    'game_api_key' => env('GAME_API_KEY'),
    'game_api_secret' => env('GAME_API_SECRET'),

    //游戏后端接口
    'game_api_records' => 'records',                //战绩列表和查询
    'game_api_record_room' => 'records-room',       //查询指定房间id
    'game_api_record_info' => 'record-info',        //查询指定的战绩id的数据
    'game_api_players' => 'players',                //玩家列表和查询
    'game_api_players_find' => 'players/find',                //通过uid精确查找玩家
    'game_api_players_batch-find' => 'players/batch-find',                //通过uids批量查找玩家
    'game_api_players_online_amount' => 'players/online/amount', //获取实时在线玩家数量
    'game_api_players_online_peak' => 'players/online/peak',     //获取指定日期的当日玩家最高在线数量
    'game_api_players_in-game' => 'players/in-game',    //获取实时游戏中的玩家数量
    'game_api_players_in-game_peak' => 'players/in-game/peak',    //获取指定日期的在游戏中的玩家最高数量
    'game_api_top-up' => 'top-up',                  //玩家充值
    'game_api_room_create' => 'room',               //创建游戏房间
    'game_api_room_open' => 'room/open',            //查看正在玩的房间
    'game_api_room_history' => 'room/history',      //查看已经结束的房间
    'game_api_card_consumed' => 'card/consumed',    //房卡消耗数据（指定日期）
    'game_api_card_consumed_total' => 'card/consumed/total',    //房卡总消耗
    'game_api_currency_log' => 'currency/log',      //道具消耗记录
    'game_api_activities_list' => 'activities/list', //获取活动列表
    'game_api_activities_add' => 'activities/add', //添加活动
    'game_api_activities_modify' => 'activities/modify',
    'game_api_activities_delete' => 'activities/delete',
    'game_api_activities_reward_list' => 'activities/reward/list', //获取活动奖品列表
    'game_api_activities_reward_log' => 'activities/reward/log', //获取活动奖品抽取次数记录
    'game_api_activities_reward_add' => 'activities/reward/add',
    'game_api_activities_reward_modify' => 'activities/reward/modify',
    'game_api_activities_reward_delete' => 'activities/reward/delete',
    'game_api_activities_goods-type_list' => 'activities/goods-type/list', //获取任务奖品道具列表
    'game_api_activities_goods-type_add' => 'activities/goods-type/add',
    'game_api_activities_goods-type_modify' => 'activities/goods-type/modify',
    'game_api_activities_goods-type_delete' => 'activities/goods-type/delete',
    'game_api_activities_task_list' => 'activities/task/list', //获取任务列表
    'game_api_activities_task_add' => 'activities/task/add',
    'game_api_activities_task_modify' => 'activities/task/modify',
    'game_api_activities_task_delete' => 'activities/task/delete',
    'game_api_activities_task-type_list' => 'activities/task-type/list', //获取任务类型列表
    'game_api_activities_user-goods_list' => 'activities/user-goods/list', //获取user_goods列表
    'game_api_activities_user-goods_add' => 'activities/user-goods/add',
    'game_api_activities_user-goods_modify' => 'activities/user-goods/modify',
    'game_api_activities_user-goods_delete' => 'activities/user-goods/delete',
    'game_api_activities_user-goods_reset' => 'activities/user-goods/reset',    //重置user_goods
    'game_api_activities_tasks-player_list' => 'activities/tasks-player/list', //获取tasks_player列表
    'game_api_activities_tasks-player_add' => 'activities/tasks-player/add',
    'game_api_activities_tasks-player_modify' => 'activities/tasks-player/modify',
    'game_api_activities_tasks-player_delete' => 'activities/tasks-player/delete',
    'game_api_activities_tasks-player_reset' => 'activities/tasks-player/reset',    //重置玩家任务
    'game_api_activities_log-activity-reward' => 'activities/log-activity-reward',  //查看玩家中奖记录
    'game_api_wechat_official-account_unionid-openid_create' => 'wechat/official-account/unionid-openid/create', //创建unionid和公众号openid记录
    'game_api_wechat_official-account_unionid-openid_delete' => 'wechat/official-account/unionid-openid/delete', //
    'game_api_wechat_red-packet_send-list' => 'wechat/red-packet/send-list', //获取待发送红包列表
    'game_api_wechat_red-packet_update' => 'wechat/red-packet/update', //更新发送红包状态
    'game_api_community_record_search' => 'community/record/search',    //旧 - 查询社区玩家战绩
    'game_api_community_record_search_v1' => 'v1/community/record/search',    //新版 - 查询社区玩家战绩
    'game_api_community_record_mark' => 'community/record/mark',    //标记战绩为已读/未读
    'game_api_community_room_open' => 'community/room/open',    //获取社团开房信息(正在玩的房间)
    'game_api_marquee' => 'marquees',  //跑马灯
];