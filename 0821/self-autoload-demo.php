<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/21
 * Time: 16:52
 */

//自定义自动加载函数 spl_autoload_register();

//第一步，先声明若干个要作为自动加载函数使用的函数名
spl_autoload_register('auto1');//auto1现在作为自动加载函数
spl_autoload_register('auto2');//auto2现在作为自动加载函数

//第二步，定义函数--类似之前定义 __autoload()函数
function auto1($class_name){//负责加载class中的类文件
    $file = './class/'. $class_name.'.class.php';
    if (file_exists($file)){//如果该文件存在
        //echo "在class目录中";
        require_once $file;
    }
}

function auto2($class_name){
    $file = './lib/'. $class_name.'.class.php';
    if (file_exists($file)){
        //echo "在lib目录中";
        require_once $file;
    }
}

$obj = new A();
var_dump($obj);
$obj = new B();
var_dump($obj);
$obj = new C();
var_dump($obj);