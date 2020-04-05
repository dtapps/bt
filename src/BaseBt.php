<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */

namespace LiGuAngChUn\Bt;

class BaseBt
{
    /**
     * 定义当前版本
     */
    const VERSION = '1.0.2';

    /**
     * 配置
     * @var
     */
    public $config;

    /**
     * Base constructor.
     * @param array $options
     * @throws BtException
     */
    public function __construct(array $options)
    {
        if (empty($options['key'])) throw new BtException('请检查配置 接口密钥：[key]，示例：x0m1NM1yumUVTyzLrpoJ4tgbVAZFzWVj');
        if (empty($options['panel'])) throw new BtException('请检查配置 面板地址：[panel]，示例：http://127.0.0.1:8888');
        $this->config = new DataArray($options);
    }

    /**
     * 发起POST请求
     * @param String $url 目标网填，带http://
     * @param array $data 欲提交的数据
     * @param int $timeout
     * @return string
     */
    protected function HttpPostCookie($url, $data = [], $timeout = 60)
    {
        $p_data = $this->GetKeyData();
        //定义cookie保存位置
        $cookie_file = __DIR__ . '/../cookie/' . md5($this->config->get('panel')) . '.cookie';
        is_dir($cookie_file) OR mkdir($cookie_file, 0777, true);
        if (!file_exists($cookie_file)) {
            $fp = fopen($cookie_file, 'w+');
            fclose($fp);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->config->get('panel') . $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array_merge($p_data, $data));
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /**
     * 构造带有签名的关联数组
     */
    private function GetKeyData()
    {
        $now_time = time();
        return array(
            'request_token' => md5($now_time . '' . md5($this->config->get('key'))),
            'request_time' => $now_time
        );
    }

    /**
     * 获取总数
     * @param string $str
     * @return false|int|string
     */
    protected function getCountData(string $str)
    {
        $start = strpos($str, "共");
        $end = strpos($str, "条数据");
        $count = substr($str, $start + 3, $end - $start - 3);
        if (empty($count)) return 0;
        return $count;
    }
}
