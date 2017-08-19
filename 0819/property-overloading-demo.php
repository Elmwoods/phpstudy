<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/19
 * Time: 13:09
 */

/**
 * 属性重载的几个特殊方法（魔术方法）
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
        $this->prop_list[$name]=$value;//保存到该数组中

    }

    public function __get($name)//$name代表要取值的不存在的属性名
    {
        // TODO: Implement __get() method.
        if (!empty($this->prop_list[$name]))
            return $this->prop_list[$name];
        else
            return "该属性不存在";
            //或者，也可以触发错误
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
        if (isset($this->prop_list[$name])){
            return true;
        }else{
            return false;
        }
    }

    public function __unset($name)
    {
        // TODO: Implement __unset() method.
//        unset($this->prop_list);
        unset($this->prop_list[$name]);
    }
}

$a=new A();
$a->p1=22;//使用存在的属性赋值
$a->p2=11;//使用不存在的属性赋值
$a->aa='2222222';
$a->aaa='3333333333333';
var_dump($a);
echo "<pre>";

//----------------------------------------------------------------------------------------------------------------------
//不存在的属性进行的取值情况
echo "<br/>属性p1=".$a->p1;//存在的
echo "<br/>属性p2=".$a->p2."<br/>";//不存在的
echo "<br/>属性p3=".$a->p3."<br/>";//不存在且没有赋过值


//echo $a->prop_list['p2'];
//print_r($a->prop_list);

//----------------------------------------------------------------------------------------------------------------------
//演示对属性进行isset判断的结果：
echo "<br/>p1属性是否存在？";
var_dump(isset($a->p1));

echo "<br/>p2属性是否存在？";
var_dump(isset($a->p2));

echo "<br/>p3属性是否存在？";
var_dump(isset($a->p3));

//----------------------------------------------------------------------------------------------------------------------
//演示对属性进行unset操作的结果：
echo "<br/>unset()p2属性之前<br/>";
print_r($a->prop_list);
unset($a->p2);
echo "<br/>unset()p2属性之后<br/>";
print_r($a->prop_list);





