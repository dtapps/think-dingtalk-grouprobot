<?php

namespace DtApp\Notice\DingTalk\dingtalk;

use DtApp\Notice\DingTalk\exception\Exception;
use DtApp\ThinkLibrary\Service;
use DtApp\ThinkLibrary\service\curl\HttpService;

/**
 * 定义当前版本
 */
const VERSION = '1.0.4';

/**
 * 钉钉机器人扩展
 * Class GroupRobot
 * @package DtApp\Notice\DingTalk\dingtalk
 */
class GroupRobot extends Service
{
    /**
     * 消息类型
     * @var string
     */
    private $_msgType = 'text';

    /**
     * 消息类型
     * @param string $type
     * @return $this
     */
    public function msgType($type = 'text')
    {
        $this->_msgType = $type;
        return $this;
    }

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
     * @param string $content
     * @return bool
     * @throws Exception
     */
    public function text(string $content)
    {
        return $this->sendMsg([
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
    private function sendMsg(array $data)
    {
        if (empty($this->_webHook) && empty($this->_accessToken)) {
            throw new Exception('钉钉自定义机器人接口未配置');
        }
        if (!empty($this->_webHook)) {
            if (empty($data['msgtype'])) {
                $data['msgtype'] = $this->_msgType;
            }
            return HttpService::instance()
                ->url($this->_webHook . $this->_accessToken)
                ->data($data)
                ->post()
                ->toArray();
        }

        if (!empty($this->_accessToken)) {
            if (empty($data['msgtype'])) {
                $data['msgtype'] = $this->_msgType;
            }
            return HttpService::instance()
                ->url("https://oapi.dingtalk.com/robot/send?access_token=" . $this->_accessToken)
                ->data($data)
                ->post()
                ->toArray();
        }

        throw new Exception('钉钉自定义机器人接口未配置，【webhook，access_token】请配置其中一个');
    }
}