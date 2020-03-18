<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */


namespace LiGuAngChUn\Bt;

/**
 * 系统安全
 * Class firewall
 * @package LiGuAngChUn\Bt
 */
class Firewall extends Base
{
    /**
     * 获取防火墙
     * @return mixed
     */
    public function getList()
    {
        $url = '/data?action=getData';
        $p_data['table'] = 'logs';
        $p_data['limit'] = 10;
        $p_data['tojs'] = 'firewall.get_list';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        return json_decode($result, true);
    }

    /**
     * 获取面板日志
     * @return mixed
     */
    public function getLog()
    {
        $url = '/data?action=getData';
        $p_data['table'] = 'logs';
        $p_data['limit'] = 10;
        $p_data['tojs'] = 'firewall.get_log_list';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        return json_decode($result, true);
    }
}
