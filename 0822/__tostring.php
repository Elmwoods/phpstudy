<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 14:42
 */
class A{
    public $name='阿三';
    protected $age=22;
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name."({$this->age})";
    }

}

//致命错误：类A一个对象不能转化为字符串
$a=new A();
echo '对象a为:'.$a;

//----------------------------------------------------------------------------------------------------------------------

class B{
    public function __invoke()
    {
        echo "<br/>我是对象，不是函数";
    }

}
$b=new B();
$b();