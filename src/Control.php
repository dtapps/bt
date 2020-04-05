<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */


namespace LiGuAngChUn\Bt;


/**
 * 系统监控
 * Class Control
 * @package LiGuAngChUn\Bt
 */
class Control extends BaseBt
{
    /**
     * 获取监控信息
     * @param string $type 类型 GetCpuIo = CPU信息/内存 GetDiskIo = 磁盘IO GetNetWorkIo = 网络IO
     * @param int $start_time 开始时间
     * @param int $end_time 结束时间
     * @return mixed
     */
    public function getInfo($type = 'GetCpuIo', $start_time = 0, $end_time = 0)
    {
        if (empty($start_time)) $start_time = strtotime(date('Y-m-d'));
        if (empty($end_time)) $end_time = time();
        $url = "/ajax?action={$type}&start={$start_time}&end={$end_time}";
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }
}
