<?php

use dtapps\dingtalk\grouprobot\dingtalk\GroupRobotService;

require __DIR__ .'/../vendor/autoload.php';

class Test extends PHPUnit\Framework\TestCase
{
    public function testExample()
    {
        GroupRobotService::instance()
            ->accessToken("xxx")
            ->text("Test");
    }
}
?>