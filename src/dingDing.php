<?php
/**
 * 钉钉群通知
 * (c) Chaim <gc@dtapp.net>
 */

namespace liguangchun\dingtalk\notice;

/**
 * 钉钉
 * Class dingDing
 * @package liguangchun\dingtalk\notice
 */
class dingDing
{
    /**
     * 钉钉自定义机器人接口链接
     * @var string
     */
    private $webhook = '';

    /**
     * 消息类型
     * @var string
     */
    private $msgType = 'text';

    public function __construct(array $config = [])
    {
        if (!empty($config['webhook'])) $this->webhook = $config['webhook'];
    }

    /**
     * 发送文本消息
     * @param string $content 消息内容
     * @return bool    发送结果
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
     */
    public function sendMsg(array $data)
    {
        if (empty($data['msgtype'])) $data['msgtype'] = $this->msgType;
        $result = $this->postHttp($this->webhook, $data, true);
        if ($result['errcode'] == 0) return true;
        return false;
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
