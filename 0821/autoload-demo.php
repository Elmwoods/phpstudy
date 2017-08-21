<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/21
 * Time: 13:57
 */
//此函数在后续的代码中只要需要一个类，就会自动调用
//其中唯一的一个参数表示要找的那个类的类名
//常规自动加载函数：__autoload
function __autoload($class_name){
    //echo "<br/> 我来找{$class_name}类来了";
    require_once './class/'.$class_name.'.class.php';
//    require_once './class/'.$class_name.'.php';
}
$obj = new A();
var_dump($obj);
echo "<br/>";
$obj = new B();
var_dump($obj);

/**
 * 注意事项:
 *      1.通常，我们将文件取名为跟类名有关的并且有规律性的名字，比如文件名为：类名.class.php
 *      2.类文件中，只包含一个类的定义语句，不要有其他
 *      3.类文件通常都集中统一放置在一定的目录中，比如class，比如lib，比如inc。
 */