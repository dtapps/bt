<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */


namespace LiGuAngChUn\Bt;

/**
 * 网站管理
 * Class Site
 * @package LiGuAngChUn\Bt
 */
class Site extends BaseBt
{
    /**
     * 获取网站列表
     * @param int $page
     * @param int $limit
     * @param string $search
     * @param int $type
     * @return mixed
     */
    public function getList($page = 1, $limit = 15, $search = '', $type = -1)
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'site.get_list';
        $p_data['table'] = 'site';
        $p_data['limit'] = $limit;
        $p_data['p'] = $page;
        $p_data['search'] = $search;
        $p_data['order'] = 'id desc';
        $p_data['type'] = $type;
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        $data = json_decode($result, true);
        return [
            'data' => $data['data'],
            'count' => $this->getCountData($data['page'])
        ];
    }

    /**
     * 获取网站分类
     * @return mixed
     */
    public function getTypes()
    {
        $url = '/site?action=get_site_types';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }

}
