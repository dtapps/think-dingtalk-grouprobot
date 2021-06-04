<?php

// +----------------------------------------------------------------------
// | ThinkPHP6钉钉群通知 for ThinkLibrary 6.0
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 [ https://www.dtapp.net ]
// +----------------------------------------------------------------------
// | 官方网站: https://www.dtapp.net
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | 国内仓库地址 ：https://gitee.com/dtapps/think-dingtalk-grouprobot
// | 国外仓库地址 ：https://github.com/dtapps/think-dingtalk-grouprobot
// | Packagist 地址 ：https://packagist.org/packages/dtapps/think-dingtalk-grouprobot
// +----------------------------------------------------------------------

namespace dtapps\dingtalk\grouprobot;

use think\App;
use think\Container;

/**
 * 自定义服务基类
 * Class Service
 * @package dtapps\dingtalk\grouprobot
 */
abstract class Service
{

    /**
     * 应用实例
     * @var App
     */
    protected $app;

    /**
     * Service constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * 初始化服务
     * @return Service
     */
    protected function initialize(): Service
    {
        return $this;
    }

    /**
     * 静态实例对象
     * @param array $args
     * @return static
     */
    public static function instance(...$args): Service
    {
        return Container::getInstance()
            ->make(static::class, $args);
    }
}