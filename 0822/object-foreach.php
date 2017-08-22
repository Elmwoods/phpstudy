<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 9:11
 */
class A{
    public $p1=1;
    protected $p2=2;
    private $p3=3;
    static $p4=4;
    function ShowAllProp(){
        foreach ($this as $key=>$value){   //只能遍历可访问的属性
            echo "<br/>属性$key:$value";
        }
    }
}
$a=new A();
//var_dump($a);
foreach ($a as $key=>$value){   //只能遍历可访问的属性
    echo "<br/>属性$key:$value";
}
echo "<hr/>";
$a->ShowAllProp();
echo "<hr/>";
var_dump($a);