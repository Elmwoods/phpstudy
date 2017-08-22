<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 9:00
 */

class A{
    public $p=1;

//    private function __clone(){     //禁止克隆
//        // TODO: Implement __clone() method.
//    }

}

$a=new A();
$b=$a;//值传递对比
var_dump($a);
var_dump($b);
$b->p=22;
var_dump($a);
var_dump($b);
$c=new A();
$d=clone $c;//克隆对象
var_dump($c);
var_dump($d);
$d->p=44;
var_dump($c);
var_dump($d);