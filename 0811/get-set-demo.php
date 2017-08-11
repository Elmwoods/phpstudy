<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/11
 * Time: 10:39
 * 使用__get、__set方法自动调用存取封装的私有成员
 */
class  Person{
    //封装的私有成员
    private $name;
    private $age;
    //使用__get方法获取私有属性
    function __get( $property_name )
    {
//        echo "在直接获取私有属性值的时候，自动调用了这个__get()方法<br>";
        if (isset($this->$property_name))
            return $this->$property_name;
        else
            return null;
    }
    //__set()方法用来设置私有属性
    function __set( $property_name , $value)
    {
//        echo "在直接设置私有属性值的时候，自动调用了这个__set()方法为私有属性赋值<br>";
        $this->$property_name = $value;
    }


}

$p1 = new Person();
//直接为私有属性赋值的操作，会自动调用__set()方法进行赋值
$p1->name = "张三";
$p1->sex = "男";
$p1->age=20;
//直接获取私有属性的值，会自动调用__get()方法，返回成员属性的值
echo "姓名：".$p1->name."<br>";
echo "账户：".$p1->sex."<br>";
echo "年龄：".$p1->age."<br>";