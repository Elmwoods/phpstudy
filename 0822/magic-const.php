<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 14:54
 */

class A{
    function f1(){
        echo "<br/>当前类为：".__CLASS__;
        echo "<br/>当前方法为：".__METHOD__;
        echo "<br/>当前目录为：".__DIR__;
        echo "<br/>当前行为：".__LINE__;
        echo "<br/>当前文件为：".__FILE__;
    }
}
$a=new A();
$a->f1();

$all_class=get_declared_classes();//获取当前文件的所有类名
echo '<pre>';
print_r($all_class);
echo '</pre>';
