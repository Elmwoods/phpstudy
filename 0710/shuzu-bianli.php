<?php

  /*
  $arr  = array(
      array('id'=>1,'area'=>'北京','pid'=>0),      
      array('id'=>2,'area'=>'北京1','pid'=>0),      
      array('id'=>3,'area'=>'北京2','pid'=>0),      
      array('id'=>4,'area'=>'北京3','pid'=>1),      
      array('id'=>5,'area'=>'北京4','pid'=>2),
      array('id'=>1,'area'=>'北京5','pid'=>4),
      array('id'=>6,'area'=>'北京6','pid'=>5),      
      array('id'=>7,'area'=>'北京7','pid'=>9),      
      array('id'=>1,'area'=>'北京8','pid'=>11)  
  );
  */

    /**
     * 无限遍历数组
     * @param  [type]  $arr [description]
     * @param  integer $pid [description]
     * @param  integer $lev [description]
     * @return [type]       [description]
     */
/*     function t($arr, $pid = 0,$lev = 0){
    static $list = array();
    foreach ($arr as $key => $v) {
      if ($v['pid'] == $pid) {
        echo str_repeat(" ", $lev).$v['area']."<br>";
        $list[] = $v;
        t($arr,$v['id'],$lev+1);
      }
    }
    return $list;
}
$list = t($a);
echo "<hr/>";
print_r($list);


*/