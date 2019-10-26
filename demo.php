<?php
/*
                   _ooOoo_
                  o8888888o
                  88" . "88
                  (| -_- |)
                  O\  =  /O
               ____/`---'\____
             .'  \\|     |//  `.
            /  \\|||  :  |||//  \
           /  _||||| -:- |||||-  \
           |   | \\\  -  /// |   |
           | \_|  ''\---/''  |   |
           \  .-\__  `-`  ___/-. /
         ___`. .'  /--.--\  `. . __
      ."" '<  `.___\_<|>_/___.'  >'"".
     | | :  `- \`.;`\ _ /`;.`/ - ` : | |
     \  \ `-.   \_ __\ /__ _/   .-` /  /
======`-.____`-.___\_____/___.-`____.-'======
                   `=---='
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
*/

/**
 * Created by : PhpStorm
 * Date: 2019/10/26
 * Time: 22:56
 * User: 李光春
 */

require_once './vendor/autoload.php';

// 实例化
$ding = new \liguangchun\dingtalk\grouprobot\DingBot();
// 配置通知地址
$ding->setConfig([
    'webhook' => 'https://oapi.dingtalk.com/robot/send?access_token=xxx'
]);
// 发送文本消息
$res = $ding->text('测试测试');
var_dump($res);
