<?php
/**
 * val 或 key 相同的时候 需要考虑！
 * 
 * @var array
 */
/*
  $arr  =  array(
                 array(
                    array('id'=>1,'pid'=>9),
                    array('id'=>2,'pid'=>10), 
                 ),      
                 array(
                    array('id'=>3,'pid'=>11),
                    array('id'=>4,'pid'=>12), 
                 ),             
                 array(
                    array('id'=>5,'pid'=>13),
                    array('id'=>6,'pid'=>14), 
                 )
             );         
*/            
$arr = [
  [1,2,3],
  [24,25,26,27],
  [243,254,24,274],
  [2433]
];
function arr_connected($arr){
  static $data;
  echo "<pre>";
  foreach ($arr as $key => $value) {
    if (is_array($value)) {               //如果键值是数组，则进行函数递归调用
      arr_connected($value);
    }else {                 //如果键值是数值，则进行输出 
      $data[] = $value;
      //echo $value."\t";
      //print_r ($data);
      $getData = getdata($data,3);
      print_r( $getData);
    }
  }
  echo "</pre>";
}
arr_connected($arr);

function getdata( $arr, $num,$t=array()) {
if ($num == 0) {
return array($t);
}
$r = array();
for ($i=0,$l =count($arr); $i <= $l-$num; $i++) {
$tmp = getdata( array_slice($arr, $i+1, $l, false), $num-1,array_merge($t, array($arr[$i])));

$r = array_merge($r, $tmp);
}
  return $r; 
}





































