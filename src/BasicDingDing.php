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

namespace DtApp\Notice\DingTalk;

/**
 * 中间件
 * Class BasicDingDing
 * @package DtApp\Notice\DingTalk
 */
class BasicDingDing
{
    /**
     * 定义当前版本
     */
    const VERSION = '1.0.3';

    /**
     * 配置
     * @var
     */
    public $config;

    /**
     * Base constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->config = new DataArray($options);
    }
}
