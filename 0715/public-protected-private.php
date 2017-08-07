<?php
header("Content-type:text/html;charset=utf-8;");
class A
{
    public $name = "";
    protected $age;
    private $password;

    function __construct($name, $age, $pass)
    {
        $this->name = $name;
        $this->age = $age;
        $this->password = $pass;
        echo '我的信息:';
        echo '<br />我是：'.$this->name;
        echo '<br />年龄：'.$this->age;
        echo '<br />密码：'.$this->password;
        echo "<br />这是类A的构造方法";
    }
}
$a1 = new A("张三",18,"123");
echo "<hr />";
echo "<hr />";
echo "<hr />";
echo '<br />我是：'.$a1->name;
//echo '<br />年龄：'.$a1->age;        //报错
//echo '<br />密码：'.$a1->password;  //报错！
var_dump($a1);

class B extends A{

}
echo "<hr />";
echo "<hr />";
echo "<hr />";
$b1 = new B("李四",22,"456");

var_dump($b1);