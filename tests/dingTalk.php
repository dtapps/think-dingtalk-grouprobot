<?php
/**
 * 钉钉群通知
 * (c) Chaim <gc@dtapp.net>
 */

$ding = new \liguangchun\dingtalk\notice\dingDing([
    'webhook' => '通知地址'
]);
$ding->text('测试');
