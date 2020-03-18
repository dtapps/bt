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
class Soft extends Base
{
    public function getList()
    {
        $url = '/plugin?action=get_soft_list';
        $p_data['p'] = 0;
        $p_data['type'] = 0;
        $p_data['tojs'] = 'soft.get_list';
        $p_data['force'] = 0;// 是否更新列表 1=是 0=否
        $p_data['query'] = ''; // 搜索
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        return json_decode($result, true);
    }
}
