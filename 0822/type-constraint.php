<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 10:06
 */

class MyClass{

    /**
     * 测试函数
     * 第一个参数必须为OtherClass类的一个对象
     */
    public function test(OtherClass $otherClass){
        echo $otherClass->var;
    }

    /**
     * 第一个参数必须为数组
     */
    public function test_array(array $test_array){
        print_r($test_array);
    }

    /**
     * 第一个参数必须为递归类型
     */
    public function test_interface(Traversable $interface){
        echo get_class($interface);
    }

    /**
     * 第一个参数必须为回调类型
     * @param callable $callback
     * @param $data
     */
    public function test_callable(callable $callback,$data){
        call_user_func($callback,$data);
    }
}

//Other类的定义
class OtherClass{
    public $var=' wo ri ni niang ';
}

//两个类的对象
$myclass=new MyClass();
$otherClass=new otherClass();
echo '<pre>';


//致命错误：第一个参数必须是 OtherClass 类的一个对象
//$myclass->test('hello');

//正确
$myclass->test($otherClass);
echo '<hr/>';

// 致命错误：第一个参数必须为 OtherClass 类的一个实例
//$foo=new stdClass();
//$myclass->test($foo);

// 致命错误：第一个参数必须为数组
//$myclass->test_array('nk');

// 正确：输出数组
$myclass->test_array(array('a','b','v'));
echo '<hr/>';

// 正确：输出 ArrayObject
$myclass->test_interface(new ArrayObject(array()));

// 正确：输出 int(1)
$myclass->test_callable('var_dump',1);



//---------------------------我是分界线---------------------------------------------------------------------------------

//类型约束不只是用在类的成员函数里，也能使用在函数里：
class A{
    public $var='qqqqqqqqqqqqqqqq';
}

/**
 * 测试函数
 * 第一个函数必须是MyClass类的一个对象
 */
function MyFunction (A $foo){
    echo $foo->var;
}

//正确 输入qqqqqqqqqqq
$a=new A();
MyFunction($a);

//---------------------------我是分界线---------------------------------------------------------------------------------

function test(stdClass $obj=null){

}
test(null);
test(new stdClass());




















