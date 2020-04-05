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
class Database extends BaseBt
{
    /**
     * 获取数据库列表
     * @param int $page
     * @param int $limit
     * @param string $search
     * @return mixed
     */
    public function getList($page = 1, $limit = 15, $search = '')
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'database.get_list';
        $p_data['table'] = 'databases';
        $p_data['limit'] = $limit;
        $p_data['p'] = $page;
        $p_data['search'] = $search;
        $p_data['order'] = 'id desc';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        $data = json_decode($result, true);
        if (empty($data['data'])) $data['data'] = [];
        if (empty($data['page'])) $data['page'] = 0;
        if (!is_array($data['data'])) $data['data'] = [];
        return [
            'data' => $data['data'],
            'count' => $this->getCountData($data['page'])
        ];
    }
}
