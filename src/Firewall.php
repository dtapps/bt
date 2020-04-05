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
class Firewall extends BaseBt
{
    /**
     * 获取防火墙
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function getList($page = 1, $limit = 10)
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'firewall.get_list';
        $p_data['table'] = 'firewall';
        $p_data['limit'] = $limit;
        $p_data['p'] = $page;
        $p_data['search'] = '';
        $p_data['order'] = 'id desc';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        $data = json_decode($result, true);
        if (empty($data['data'])) $data['data'] = [];
        if (empty($data['page'])) $data['page'] = 0;
        return [
            'data' => $data['data'],
            'count' => $this->getCountData($data['page'])
        ];
    }

    /**
     * 获取面板日志
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function getLog($page = 1, $limit = 10)
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'firewall.get_log_list';
        $p_data['table'] = 'logs';
        $p_data['limit'] = $limit;
        $p_data['p'] = $page;
        $p_data['search'] = '';
        $p_data['order'] = 'id desc';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        $data = json_decode($result, true);
        if (empty($data['data'])) $data['data'] = [];
        if (empty($data['page'])) $data['page'] = 0;
        return [
            'data' => $data['data'],
            'count' => $this->getCountData($data['page'])
        ];
    }
}
