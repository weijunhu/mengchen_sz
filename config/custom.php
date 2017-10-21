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
    'cron_task_log' => env('CRON_TASK_LOG', '/tmp/artisan.log'),

    //游戏服数据缓存时的key
    'game_server_cache_duration' => 3,              //数据缓存时间，3min
    'game_server_cache_players' => 'game:players',  //所有玩家

    //游戏后端数据交互接口信息
    'game_api_address' => env('GAME_API_ADDRESS'),
    'game_api_key' => env('GAME_API_KEY'),
    'game_api_secret' => env('GAME_API_SECRET'),

    //游戏后端接口
    'game_api_records' => 'records',                //战绩列表和查询
    'game_api_record_info' => 'record-info',        //查询指定的战绩id的数据
    'game_api_players' => 'players',                //玩家列表和查询
    'game_api_top-up' => 'top-up',                  //玩家充值
];