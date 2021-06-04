<img align="right" width="100" src="https://kodo-cdn.dtapp.net/04/999e9f2f06d396968eacc10ce9bc8a.png" alt="www.dtapp.net"/>

<h1 align="left"><a href="https://www.dtapp.net/">ThinkPHP6钉钉群通知</a></h1>

📦 ThinkPHP6钉钉群通知

[![Latest Stable Version](https://poser.pugx.org/dtapps/think-dingtalk-grouprobot/v/stable)](https://packagist.org/packages/dtapps/think-dingtalk-grouprobot)  
[![Total Downloads](https://poser.pugx.org/dtapps/think-dingtalk-grouprobot/downloads)](https://packagist.org/packages/dtapps/think-dingtalk-grouprobot) 
[![License](https://poser.pugx.org/dtapps/think-dingtalk-grouprobot/license)](https://packagist.org/packages/dtapps/think-dingtalk-grouprobot)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D7.1-8892BF.svg)](http://www.php.net/)
[![Build Status](https://api.travis-ci.com/dtapps/think-dingtalk-grouprobot.svg?branch=master)](https://www.travis-ci.com/github/dtapps/think-dingtalk-grouprobot)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dtapps/think-dingtalk-grouprobot/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dtapps/think-dingtalk-grouprobot/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/dtapps/think-dingtalk-grouprobot/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/dtapps/think-dingtalk-grouprobot/?branch=master)

## 依赖环境

1. PHP7.1 版本及以上

## 托管

- 国外仓库地址：[https://github.com/dtapps/think-dingtalk-grouprobot](https://github.com/dtapps/think-dingtalk-grouprobot)
- 国内仓库地址：[https://gitee.com/dtapps/think-dingtalk-grouprobot](https://gitee.com/dtapps/think-dingtalk-grouprobot)
- Packagist 地址：[https://packagist.org/packages/dtapps/think-dingtalk-grouprobot](https://packagist.org/packages/dtapps/think-dingtalk-grouprobot)

### 安装
```text
composer require dtapps/think-dingtalk-grouprobot -vvv
```

## 更新

```text
composer update dtapps/think-dingtalk-grouprobot -vvv
```

## 删除

```text
composer remove dtapps/think-dingtalk-grouprobot -vvv
```

## 服务使用示例

```php
use dtapps\dingtalk\grouprobot\dingtalk\GroupRobotService;

try {
    var_dump(GroupRobotService::instance()
        ->accessToken('xxx')
        ->text('测试'));
} catch (\dtapps\dingtalk\grouprobot\exception\Exception $e) {
    var_dump($e->getMessage());
}
```
