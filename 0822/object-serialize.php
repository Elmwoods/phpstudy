<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 14:13
 */
include_once "./S.class.php";
$obj=new S();
$obj->p1=11;
$obj->p2=22;
$obj->p3=33;

$str=serialize($obj);
file_put_contents('./obj.txt',$str);