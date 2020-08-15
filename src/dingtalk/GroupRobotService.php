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
// | 国内仓库地址 ：https://gitee.com/liguangchun/dingtalk-grouprobo
// | 国外仓库地址 ：https://github.com/GC0202/dingtalk-grouprobo
// | Packagist 地址 ：https://packagist.org/packages/liguangchun/dingtalk-grouprobo
// +----------------------------------------------------------------------

namespace DtApp\Notice\DingTalk\dingtalk;

use DtApp\Notice\DingTalk\exception\Exception;
use DtApp\ThinkLibrary\Service;
use DtApp\ThinkLibrary\service\curl\HttpService;

/**
 * 定义当前版本
 */
const VERSION = '1.0.5';

/**
 * 钉钉机器人扩展
 * Class GroupRobotService
 * @package DtApp\Notice\DingTalk\dingtalk
 */
class GroupRobotService extends Service
{
    /**
     * 消息类型
     * @var string
     */
    private $msgType = 'text';

    /**
     * 链接
     * @var string
     */
    private $_webHook = '';

    /**
     * 链接
     * @param string $webHook
     * @return $this
     */
    public function webHook($webHook = '')
    {
        $this->_webHook = $webHook;
        return $this;
    }

    /**
     * token
     * @var string
     */
    private $_accessToken = '';

    /**
     * token
     * @param string $accessToken
     * @return $this
     */
    public function accessToken($accessToken = '')
    {
        $this->_accessToken = $accessToken;
        return $this;
    }

    /**
     * 发送文本消息
     * @param string $content 消息内容
     * @return bool
     * @throws Exception
     */
    public function text(string $content)
    {
        $this->msgType = 'text';
        return $this->send([
            'text' => [
                'content' => $content,
            ],
        ]);
    }

    /**
     * 组装发送消息
     * @param array $data 消息内容数组
     * @return bool 发送结果
     * @throws Exception
     */
    private function send(array $data)
    {
        if (empty($this->_webHook) && empty($this->_accessToken)) {
            throw new Exception('钉钉自定义机器人接口未配置');
        }
        if (empty($data['msgtype'])) {
            $data['msgtype'] = $this->msgType;
        }
        if (!empty($this->_webHook)) {
            return HttpService::instance()
                ->url($this->_webHook . $this->_accessToken)
                ->data($data)
                ->post()
                ->toArray();
        }
        if (!empty($this->_accessToken)) {
            return HttpService::instance()
                ->url("https://oapi.dingtalk.com/robot/send?access_token=" . $this->_accessToken)
                ->data($data)
                ->post()
                ->toArray();
        }

        throw new Exception('钉钉自定义机器人接口未配置，【webhook，access_token】请配置其中一个');
    }
}