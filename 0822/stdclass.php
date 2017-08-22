<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 9:27
 */

//stdClass内置类
$obj1=new stdClass();
var_dump($obj1);

$b=array(
    'aa'=>'1',
    'bb'=>'2',
    'cc'=>'3',
    5=>'55555'      //注意：对于整数下标的单元，转换为对象的属性后，无法操作（获取）
                    //此时，可以这样使用该对象：$v1=$obj2->host;
                    //不能这样使用：$v2=$obj2->5;
);
$obj2=(object)$b;//强制类型转换
var_dump($obj2);

//标量类型转为对象类型
$v1=1;                  $objv1=(object)$v1;
$v2=2.113;              $objv2=(object)$v2;
$v3='ohshit';            $objv3=(object)$v3;
$v4=true;               $objv4=(object)$v4;
var_dump($objv1);
var_dump($objv2);
var_dump($objv3);
var_dump($objv4);
