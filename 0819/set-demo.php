<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/19
 * Time: 13:09
 */

/**
 * 属性重载的特殊方法
 */
class A{
    public $p1=1;
    public $prop_list = array();//空数组存取数据
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
//        echo "使用不存在的属性:{$name}";
//        echo "<br/>给该属性赋值为{$value}";
        //将这个数据并以该名字存储起来（存储到对象中）
        $this->prop_list[$name]=$value;
    }

}

$a=new A();
$a->p1=22;//使用存在的属性赋值
$a->p2=11;//使用不存在的属性赋值
$a->aa='2222222';
$a->aaa='3333333333333';
var_dump($a);
//echo $a->prop_list['p2'];
//print_r($a->prop_list);


