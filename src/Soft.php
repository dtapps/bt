<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */


namespace LiGuAngChUn\Bt;


/**
 * 软件管理
 * Class Soft
 * @package LiGuAngChUn\Bt
 */
class Soft extends BaseBt
{
    /**
     * 获取软件列表
     * @param int $page
     * @param int $type
     * @param int $force
     * @param string $query
     * @return mixed
     */
    public function getList($page = 1, $type = 0, $force = 0, $query = '')
    {
        $url = '/plugin?action=get_soft_list';
        $p_data['p'] = $page;
        $p_data['type'] = $type;
        $p_data['tojs'] = 'soft.get_list';
        $p_data['force'] = $force;// 是否更新列表 1=是 0=否
        $p_data['query'] = $query; // 搜索
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        return json_decode($result, true);
    }
}
