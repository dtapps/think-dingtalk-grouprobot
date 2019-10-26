# dingtalk-grouprobot
thinkphp 钉钉机器人扩展

## 安装
```
composer require liguangchun/dingtalk-grouprobot
```

## 使用
```
use liguangchun\dingtalk\grouprobot\DingBot;

class Index
{
    public function index()
    {
        // 实例化
        $ding = new DingBot();
        // 配置通知地址
        $ding->setConfig([
            'webhook' => 'https://oapi.dingtalk.com/robot/send?access_token=xxx'
        ]);
        // 发送文本消息
        $res = $ding->text('测试测试');
    }
}
```
