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
 * 发送通知
 * Class Send
 * @package DtApp\Notice\DingTalk
 */
class Send extends BasicDingDing
{
    /**
     * 消息类型
     * @var string
     */
    private $msgType = 'text';

    /**
     * 发送文本消息
     * @param string $content 消息内容
     * @return bool    发送结果
     * @throws DingDingException
     */
    public function text(string $content)
    {
        $this->msgType = 'text';
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
     * @throws DingDingException
     */
    private function sendMsg(array $data)
    {
        if (empty($this->config->get('webhook')) && empty($this->config->get('access_token'))) throw new DingDingException('钉钉自定义机器人接口未配置，【webhook，access_token】请配置其中一个');
        if (!empty($this->config->get('webhook'))) {
            if (empty($data['msgtype'])) $data['msgtype'] = $this->msgType;
            $result = $this->postHttp($this->config->get('webhook'), $data, true);
            if ($result['errcode'] == 0) return true;
            return false;
        } else if (!empty($this->config->get('access_token'))) {
            if (empty($data['msgtype'])) $data['msgtype'] = $this->msgType;
            $result = $this->postHttp("https://oapi.dingtalk.com/robot/send?access_token=" . $this->config->get('access_token'), $data, true);
            if ($result['errcode'] == 0) return true;
            return false;
        } else {
            throw new DingDingException('钉钉自定义机器人接口未配置，【webhook，access_token】请配置其中一个');
        }
    }

    /**
     * 发送Post请求
     * @param string $url 网址
     * @param array $data 参数
     * @param string $headers
     * @param bool $is_json 是否返回Json格式
     * @return array|bool|mixed|string
     */
    private function postHttp(string $url, array $data = [], bool $is_json = false, string $headers = 'application/json;charset=utf-8')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: ' . $headers));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        $content = curl_exec($ch);
        curl_close($ch);
        if (empty($is_json)) return $content;
        try {
            return json_decode($content, true);
        } catch (\Exception $e) {
            return false;
        }
    }
}
