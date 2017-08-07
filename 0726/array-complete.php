<?php
/**
* Created by PhpStorm.
* User: Elmwood
* Date: 2017/7/26
* Time: 15:58
* PHP 二维数组的排列组合
*/


$array = [
    [1,2],
    [6,7,8],
    [9,10,11,12]
];
$aa = count($array);
$data = getCombinationToString($array, $aa);
foreach ($data as &$av) {
    $av = implode(':', $av);
}
var_dump($data);
function getCombinationToString($arr, $len)
{
    if ($len == 1) {    //获取的长度为1，返回一个一维数组
        return $arr[0];
    }
    $tempArr = $arr;
    unset($tempArr[0]);
    $returnarr = [];
    $len2 = count($arr);
    $ret = getCombinationToString(array_values($tempArr), ($len - 1));
    foreach ($arr[$len2 - $len] as $alv) {
        foreach ($ret as $rv) {
            if (is_array($rv)) {
                array_unshift($rv, $alv); //在数组开头插入元素
                $returnarr[] = array_values($rv);
            } else {
                $returnarr[] = [$alv,$rv];
            }
        }
    }
    return $returnarr;
}


