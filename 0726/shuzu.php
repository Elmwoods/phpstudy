<?php
/*$array = [
    [24,27],
    [1,2]
];*/
$array = [
    [1,2],
    [6,7,8],
    [9,10,11,12]
];




echo '<pre>';

//$ids = array_map('array_shift',$array);
/*if( ! function_exists('array_column'))
{
    function array_column($input, $columnKey, $indexKey = NULL)
    {
        $columnKeyIsNumber = (is_numeric($columnKey)) ? TRUE : FALSE;
        $indexKeyIsNull = (is_null($indexKey)) ? TRUE : FALSE;
        $indexKeyIsNumber = (is_numeric($indexKey)) ? TRUE : FALSE;
        $result = array();

        foreach ((array)$input AS $key => $row)
        {
            if ($columnKeyIsNumber)
            {
                $tmp = array_slice($row, $columnKey, 1);
                $tmp = (is_array($tmp) && !empty($tmp)) ? current($tmp) : NULL;
            }
            else
            {
                $tmp = isset($row[$columnKey]) ? $row[$columnKey] : NULL;
            }
            if ( ! $indexKeyIsNull)
            {
                if ($indexKeyIsNumber)
                {
                    $key = array_slice($row, $indexKey, 1);
                    $key = (is_array($key) && ! empty($key)) ? current($key) : NULL;
                    $key = is_null($key) ? 0 : $key;
                }
                else
                {
                    $key = isset($row[$indexKey]) ? $row[$indexKey] : 0;
                }
            }

            $result[$key] = $tmp;
        }

        return $result;
    }
}
$column=array_column($array,'id','name');
print_r($column);
*/
//二维数组遍历
//foreach($array as $k => $v){
//    foreach($v as $key => $value){
//        echo $value;
//    }
//}

//$chunk = array_chunk($array,$count);
//print_r($chunk);

$aa = [];
$aa = array_reduce($array,'array_merge',array());
//print_r($aa);


//print_r(array_keys($array));//获取数组键

header("Content-type:text/html;charset=utf8;");
$count = count($array);
echo '<pre>';
$result = array();
$t = getCombinationToString($aa, $count);
print_r($t);
die;

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
