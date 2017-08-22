<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 15:23
 */

class A{}
class B extends A{}

$v1=1;
$v2=new A();
$v3=new B();
$res1=$v1 instanceof A;
$res2=$v2 instanceof A;
$res3=$v3 instanceof B;
$res4=$v3 instanceof A;
$res5=$v2 instanceof B;
var_dump($res1);
var_dump($res2);
var_dump($res3);
var_dump($res4);
var_dump($res5);
