<?php
    $arr = [
        [24,27],
        [1,2],
        [12,13,14]
    ];
    $count = count($arr);
    echo '<pre>';
//    array_map(function ($value) use (&$aa){
//        $aa=array_merge($aa,array_values($value));
//    },$arr);
//    print_r($aa);

/*    //二维数组转化为一维数组
    $i=0;
    $array = array();
    foreach($arr as $v){
        $arr[$i] = $v;
        echo '<br />';
        print_r($arr[$i]);
        $i++;
    }
*/

    $aa = [];
    $aa = array_reduce($arr,'array_merge',array());
    print_r($aa);
    //$bb = array();
    /*for ($i=1; $i<30; $i++){
        $aa['key'.$i] = 'value'.$i;
    }
    $cc = array_splice($aa,1,4);
    print_r($cc);*/

//    $bb = array();
//    foreach($arr as $val){
//        $bb[] = $val;
//        print_r($bb);
//    }

header("Content-type:text/html;charset=utf8;");
$result = array();
$t = getCombinationToString($aa, $count);
print_r($t);
//print_r(array_slice($t,1,4));
die;
/*function getCombinationToString($arr, $m) {
    if ($m ==1) {
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
}*/
function getCombinationToString($arr,$m){
    $result = array();
    if ($m ==1){
        return $arr;
    }

    if ($m == count($arr)){
        $result[] = implode(',' , $arr);
        return $result;
    }

    $temp_firstelement = $arr[0];
    unset($arr[0]);
    $arr = array_values($arr);
    $temp_list1 = getCombinationToString($arr, ($m-1));

    foreach ($temp_list1 as $s){
        $s = $temp_firstelement.','.$s;
        $result[] = $s;
    }
    unset($temp_list1);

    $temp_list2 = getCombinationToString($arr, $m);
    foreach ($temp_list2 as $s){
        $result[] = $s;
    }
    unset($temp_list2);

    return $result;
}