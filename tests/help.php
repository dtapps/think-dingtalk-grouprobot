<?php

// +----------------------------------------------------------------------
// | 钉钉群机器人通知
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 [ https://www.dtapp.net ]
// +----------------------------------------------------------------------
// | 官方网站: https://gitee.com/liguangchun/dingtalk-grouprobot
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 仓库地址 ：https://gitee.com/liguangchun/dingtalk-grouprobot
// | github 仓库地址 ：https://github.com/GC0202/dingtalk-grouprobot
// | Packagist 地址 ：https://packagist.org/packages/liguangchun/dingtalk-grouprobot
// +----------------------------------------------------------------------

use DtApp\Notice\DingTalk\Send;

require_once '../vendor/autoload.php';

$config = [
    'webhook' => 'https://oapi.dingtalk.com/robot/send?access_token=xxx', // 自定义机器人接口链接，webhook和access_token可配置其中一个
    'access_token' => 'xxx', // 自定义机器人接口链接的access_token，webhook和access_token可配置其中一个
];

$dd = new Send($config);

var_dump($dd->text('测试'));
