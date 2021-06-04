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

namespace dtapps\dingtalk\grouprobot\exception;

/**
 * 错误处理
 * Class Exception
 * @package dtapps\dingtalk\grouprobot\exception
 */
class Exception extends \think\Exception
{
    public function errorMessage(): string
    {
        return $this->getMessage();
    }
}
