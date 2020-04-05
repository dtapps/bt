<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */


namespace LiGuAngChUn\Bt;

/**
 * 设置
 * Class Setup
 * @package LiGuAngChUn\Bt
 */
class Setup extends BaseBt
{
    /**
     * 获取消息通道
     * @return mixed
     */
    public function getNews()
    {
        $url = '/config?action=get_settings';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }
}
