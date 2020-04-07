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
 * 系统信息
 * Class System
 * @package dtApp\Bt
 */
class System extends BaseBt
{
    /**
     * 获取硬盘信息
     * @return mixed
     */
    public function getDiskInfo()
    {
        $url = '/system?action=GetDiskInfo';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }

    /**
     * 获取信息系统
     * @return mixed
     */
    public function getSystemTotal()
    {
        $url = '/system?action=GetSystemTotal';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }

    /**
     * 获取用户信息
     * @return mixed
     */
    public function getUserInfo()
    {
        $url = '/ssl?action=GetUserInfo';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }

    /**
     * 获取网络信息
     * @return mixed
     */
    public function getNetWork()
    {
        $url = '/system?action=GetNetWork';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }

    /**
     * 获取插件信息
     * @return mixed
     */
    public function getPlugin()
    {
        $url = '/plugin?action=get_index_list';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }

    /**
     * 获取软件信息
     * @return mixed
     */
    public function getSoft()
    {
        $url = '/plugin?action=get_soft_list';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }

    /**
     * 获取更新信息
     * @return mixed
     */
    public function getUpdatePanel()
    {
        $url = '/ajax?action=UpdatePanel';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }
}
