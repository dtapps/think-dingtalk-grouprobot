<img align="right" width="100" src="https://cdn-oss.dtapp.net/04/999e9f2f06d396968eacc10ce9bc8a.png" alt="dtApp Logo"/>

<h1 align="left"><a href="https://www.dtapp.net/">ThinkPHP6钉钉群通知</a></h1>

📦 ThinkPHP6钉钉群通知

[![Latest Stable Version](https://poser.pugx.org/liguangchun/dingtalk-grouprobot/v/stable)](https://packagist.org/packages/liguangchun/dingtalk-grouprobot) 
[![Latest Unstable Version](https://poser.pugx.org/liguangchun/dingtalk-grouprobot/v/unstable)](https://packagist.org/packages/liguangchun/dingtalk-grouprobot) 
[![Total Downloads](https://poser.pugx.org/liguangchun/dingtalk-grouprobot/downloads)](https://packagist.org/packages/liguangchun/dingtalk-grouprobot) 
[![License](https://poser.pugx.org/liguangchun/dingtalk-grouprobot/license)](https://packagist.org/packages/liguangchun/dingtalk-grouprobot)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D7.1-8892BF.svg)](http://www.php.net/)
[![Code Health](https://hn.devcloud.huaweicloud.com/codecheck/v1/codecheck/task/codehealth.svg?taskId=76a095890e894f4099c2e3f005d827e3)](https://hn.devcloud.huaweicloud.com/codecheck/project/c7ff3e2d65674858bd363cb43ee6c35e/codecheck/task/76a095890e894f4099c2e3f005d827e3/detail)
[![Build Status](https://travis-ci.org/GC0202/dingtalk-grouprobot.svg?branch=6.0)](https://travis-ci.org/GC0202/dingtalk-grouprobot)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GC0202/dingtalk-grouprobot/badges/quality-score.png?b=6.0)](https://scrutinizer-ci.com/g/GC0202/dingtalk-grouprobot/?branch=6.0)
[![Code Coverage](https://scrutinizer-ci.com/g/GC0202/dingtalk-grouprobot/badges/coverage.png?b=6.0)](https://scrutinizer-ci.com/g/GC0202/dingtalk-grouprobot/?branch=6.0)

## 依赖环境

1. PHP7.1 版本及以上

## 安装

部分代码来自互联网，若有异议可以联系作者进行删除。

- Github仓库地址：https://github.com/GC0202/dingtalk-grouprobot
- 码云仓库地址：https://gitee.com/liguangchun/dingtalk-grouprobot
- 华为云仓库地址：https://codehub-cn-south-1.devcloud.huaweicloud.com/composer00001/dingtalk-grouprobot.git

### 开发版
```text
composer require liguangchun/dingtalk-grouprobot dev-master -vvv
```

### 稳定版
```text
composer require liguangchun/dingtalk-grouprobot -vvv
```

## 更新

```text
composer update liguangchun/dingtalk-grouprobot -vvv
```

## 删除

```text
composer remove liguangchun/dingtalk-grouprobot -vvv
```

## 服务使用示例

```php
use DtApp\Notice\DingTalk\dingtalk\GroupRobot;

try {
    var_dump(GroupRobot::instance()
        ->accessToken('xxx')
        ->text('测试'));
} catch (\DtApp\Notice\DingTalk\exception\Exception $e) {
    var_dump($e->getMessage());
}
```
