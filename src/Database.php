<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */


namespace LiGuAngChUn\Bt;

/**
 * 数据库管理
 * Class Database
 * @package LiGuAngChUn\Bt
 */
class Database extends Base
{
    /**
     * 获取数据库列表
     * @return mixed
     */
    public function getList()
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'database.get_list';
        $p_data['table'] = 'databases';
        $p_data['limit'] = 15;
        $p_data['p'] = 1;
        $p_data['search'] = '';
        $p_data['order'] = 'id desc';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        return json_decode($result, true);
    }
}
