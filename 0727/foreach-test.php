<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 9:54
 */
header("Content-type:text/html;charset=utf8;");
$fruit=array('苹果','香蕉','菠萝');
foreach($fruit as $key=>$value){
    echo '<br>第'.$key.'值是：'.$value;
}
