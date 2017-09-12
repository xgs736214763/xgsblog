<?php
namespace frontend\widgets\weather;

use yii\base\Widget;

/**
 *
 * @author xiaoxie
 *        
 */
class WeatherWidget extends Widget
{

    public function postUrl($url, $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $handles = curl_exec($ch);
        curl_close($ch);
        return $handles;
    }

    public function getUrl($url, $data = [])
    {
        $ch = curl_init();
        // 设置选项，包括URL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // 执行并获取HTML文档内容
        $output = curl_exec($ch);
        // 释放curl句柄
        curl_close($ch);
        return $output;
    }

    /**
     * 获取经纬度
     * 
     * @return mixed
     */
    public function getPoint()
    {
        $latlon = $this->postUrl('http://api.map.baidu.com/location/ip?ak=CXtGNbmUioe3pfZ0yvnsNDjaYj63vQ8C&coor=bd09ll');
        $latlonarr = json_decode($latlon, true);
        $point = $latlonarr['content']['point'];
        return $point;
    }

    /**
     * 根据经纬度获取城市
     * 
     * @param unknown $point
     * @return mixed
     */
    public function getCity()
    {
        $ip = $_SERVER["REMOTE_ADDR"];
        $city = $this->getUrl('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=' . $ip);
        
        $cityarr = json_decode($city, true);
        // 城市名称
        $cityname = $cityarr['city'];
        return $cityname;
    }

    /**
     * 获取天气预报接口
     * 
     * @return string|number[]
     */
    public function getWeatherinfo()
    {
        $cityname = $this->getCity();
        
        // print_r($cityname);exit;
        $data = $this->getUrl('http://www.sojson.com/open/api/weather/json.shtml?city=' . $cityname);
        $weatherdata = json_decode($data, true);
        $weatherarr = [];
        if ($weatherdata['status'] == 200) {
            foreach ($weatherdata['data']['forecast'] as $key => $value) {
                
                $weatherarr[$key]['date'] = $value['date'];
                $weatherarr[$key]['high'] = $value['high'];
                $weatherarr[$key]['low'] = $value['low'];
                $weatherarr[$key]['fx'] = $value['fx'];
                $weatherarr[$key]['fl'] = $value['fl'];
                $weatherarr[$key]['type'] = $value['type'];
                $weatherarr[$key]['notice'] = $value['notice'];
                if ($value['type'] == '小雨') {
                    $weatherarr[$key]['icon'] = 'wea_l w11_l';
                } else if ($value['type'] == '阴') {
                    $weatherarr[$key]['icon'] = 'w26_l';
                } else if ($value['type'] == '多云') {
                    $weatherarr[$key]['icon'] = 'wea_l w28_l';
                } else if ($value['type'] == '小于转多云') {
                    $weatherarr[$key]['icon'] = 'wea_l w11_l';
                } else if ($value['type'] == '小于转中雨') {
                    $weatherarr[$key]['icon'] = 'wea_l w11_l';
                } else if ($value['type'] == '中雨') {
                    $weatherarr[$key]['icon'] = 'w64_l';
                } else if ($value['type'] == '晴天') {
                    $weatherarr[$key]['icon'] = 'wea_l w32_l';
                } else if ($value['type'] == '多云转晴') {
                    $weatherarr[$key]['icon'] = 'wea_l w28_l';
                } else if ($value['type'] == '雷阵雨转阴') {
                    $weatherarr[$key]['icon'] = 'wea_l w37_l';
                } else if ($value['type'] == '雷阵雨转小雨') {
                    $weatherarr[$key]['icon'] = 'wea_l w37_l';
                } else if ($value['type'] == '小雨转阴') {
                    $weatherarr[$key]['icon'] = 'wea_l w11_l';
                } else if ($value['type'] == '阵雨') {
                    $weatherarr[$key]['icon'] = 'wea_l w39_l';
                } else if ($value['type'] == '阵雨转多云') {
                    $weatherarr[$key]['icon'] = 'wea_l w39_l';
                } else if ($value['type'] == '中雨转阵雨') {
                    $weatherarr[$key]['icon'] = 'wea_l w64_l';
                } else if ($value['type'] == '晴转小雨') {
                    $weatherarr[$key]['icon'] = 'wea_l w32_l';
                } else if ($value['type'] == '雷阵雨') {
                    $weatherarr[$key]['icon'] = 'wea_l w37_l';
                } else if ($value['type'] == '大雨转阴') {
                    $weatherarr[$key]['icon'] = 'wea_l w12_l';
                } else if ($value['type'] == '大雨') {
                    $weatherarr[$key]['icon'] = 'wea_l w12_l';
                } else if ($value['type'] == '阵雨转雷阵雨') {
                    $weatherarr[$key]['icon'] = 'wea_l w39_l';
                } else if ($value['type'] == '阵雨转多云') {
                    $weatherarr[$key]['icon'] = 'wea_l w39_l';
                } else {
                    $weatherarr[$key]['icon'] = '';
                }
            }
        } else {
            $weatherarr['status'] = 500;
            $weatherarr[0]['date'] = date('Y-m-d');
            $weatherarr[0]['icon'] = '';
            $weatherarr[0]['high'] = '';
            $weatherarr[0]['low'] = '';
            $weatherarr[0]['fx'] = '';
            $weatherarr[0]['fl'] = '';
            $weatherarr[0]['type'] = '正在掐指计算';
            $weatherarr[0]['notice'] = '正在加载中';
        }
        return $weatherarr;
    }

    /**
     *
     * {@inheritdoc}
     * @see \yii\base\Widget::run()
     */
    public function run()
    {
        $point = $this->getPoint();
        
        $cityname = $this->getCity($point);
        $weatherarr = $this->getWeatherinfo();
        $i = 0;
        foreach ($weatherarr as $key => $value) {
            if (substr($value['date'], 0, 2) == date('d')) {
                $i = $key;
            }
        }
        
        return $this->render('index', [
            'data' => $weatherarr,
            'city' => $cityname,
            'i' => $i
        ]);
    }
}

