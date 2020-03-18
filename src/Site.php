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
class Site extends Base
{
    /**
     * 获取网站列表
     * @return mixed
     */
    public function getList()
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'site.get_list';
        $p_data['table'] = 'site';
        $p_data['limit'] = 15;
        $p_data['p'] = 1;
        $p_data['search'] = '';
        $p_data['order'] = 'id desc';
        $p_data['type'] = -1;
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        return json_decode($result, true);
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
