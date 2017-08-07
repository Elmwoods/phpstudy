<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/14
 * Time: 4:52
 */
function get_numeric($val) {
    if (is_numeric($val)) {
        return $val + 0;
    }
    return 0;
}
var_dump(get_numeric('ojaw'));
get_numeric('3'); // int(3)
get_numeric('1.2'); // float(1.2)
get_numeric('3.0'); // float(3)

$v = is_numeric('12316496736197679746')?true:false;
var_dump($v);
?>