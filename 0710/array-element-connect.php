<?php

$arr = [

  [24,27,45],[1,2,3,4]
];

//冒泡排序（数组排序）
function bubble_sort($array)
{
    $count = count($array);
    if ($count <= 0) return false;
    for($i=0; $i<$count; $i++){
        for($j=$count-1; $j>$i; $j--){
            if ($array[$j] < $array[$j-1]){
                $tmp = $array[$j];
                $array[$j] = $array[$j-1];
                $array[$j-1] = $tmp;
            }
        }
    }
    return $array;
}
bubble_sort($arr);
/*
$a=array();
$a = array_chunk($a,100);
$aa=[];
foreach ($arr[0] as $key => $value) {
	foreach (specifications($value,$arr) as $v) {
		$aa[]=$v;
	}
}
function specifications($value='',$arr=array()){
	$array=[];
	$len=count($arr);
	for ($i=1; $i <$len ; $i++) {
		if (is_array($arr[$i])) {
			foreach ($arr[$i] as $val) {
				$array[]=$value.':'.$val;
			}
		}
	}
	return $array;
}

header("content-type:text/html; charset=utf-8");
echo "<pre>";
print_r($aa);
die;
*/













//$arr = array('a','b','c','d');
/*
$result = array();
$t = getCombinationToString($a, 3);
print_r($t);

function getCombinationToString($arr, $m) {
    if ($m == 1) {
        return $arr;
    }
    $result = array();
    $tmpArr = $arr;
    unset($tmpArr[0]);
    for($i=0;$i<count($arr);$i++) {
        $s = $arr[$i];
        $ret = getCombinationToString(array_values($tmpArr), ($m-1));
        foreach($ret as $row) {
            $result[] = $s . $row;
        }
    }
    return $result;
}
*/


