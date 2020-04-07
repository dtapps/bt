<?php
// +----------------------------------------------------------------------
// | 宝塔PHP扩展包
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 [ https://www.dtapp.net ]
// +----------------------------------------------------------------------
// | 官方网站: https://gitee.com/liguangchun/bt
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 仓库地址 ：https://gitee.com/liguangchun/bt
// | github 仓库地址 ：https://github.com/GC0202/bt
// | Packagist 地址 ：https://packagist.org/packages/liguangchun/bt
// +----------------------------------------------------------------------

namespace dtApp\Bt;

/**
 * 网站管理
 * Class Site
 * @package dtApp\Bt
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
        $p_data['table'] = 'sites';
        $p_data['limit'] = $limit;
        $p_data['p'] = $page;
        $p_data['search'] = $search;
        $p_data['order'] = 'id desc';
        $p_data['type'] = $type;
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
