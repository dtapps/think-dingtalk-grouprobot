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
// | 国外仓库地址 ：https://github.com/dtapps/think-dingtalk-grouprobot
// | Packagist 地址 ：https://packagist.org/packages/liguangchun/dingtalk-grouprobo
// +----------------------------------------------------------------------

namespace dtapps\dingtalk\grouprobot\dingtalk;

use dtapps\dingtalk\grouprobot\exception\Exception;
use dtapps\dingtalk\grouprobot\Service;

/**
 * 定义当前版本
 */
const VERSION = '1.0.6';

/**
 * 钉钉机器人扩展
 * Class GroupRobotService
 * @package dtapps\dingtalk\grouprobot\dingtalk
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
     * 请求
     * @var
     */
    private $_url, $data;
    private $headers = 'application/json;charset=utf-8';

    /**
     * 链接
     * @param string $webHook
     * @return $this
     */
    public function webHook(string $webHook = '')
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
    public function accessToken(string $accessToken = '')
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
    public function text(string $content): bool
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
    private function send(array $data): bool
    {
        if (empty($this->_webHook) && empty($this->_accessToken)) {
            throw new Exception('钉钉自定义机器人接口未配置');
        }
        if (empty($data['msgtype'])) {
            $data['msgtype'] = $this->msgType;
        }
        if (!empty($this->_webHook)) {
            if (is_array($data)) {
                $this->data = json_encode($data, JSON_UNESCAPED_UNICODE);
            } else {
                $this->data = $data;
            }
        }
        if (!empty($this->_accessToken)) {
            if (is_array($data)) {
                $this->data = json_encode($data, JSON_UNESCAPED_UNICODE);
            } else {
                $this->data = $data;
            }
        }

        throw new Exception('钉钉自定义机器人接口未配置，【webhook，access_token】请配置其中一个');
    }

    /**
     * 发送Post请求
     * @return array|bool|mixed|string
     */
    private function http()
    {
        if (!empty($this->_webHook)) {
            $this->_url = $this->_webHook . $this->_accessToken;
        } else {
            $this->_url = "https://oapi.dingtalk.com/robot/send?access_token={$this->_accessToken}";
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: ' . $this->headers));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        $content = curl_exec($ch);
        curl_close($ch);
        $this->output = $content;
        return $this;
    }
}