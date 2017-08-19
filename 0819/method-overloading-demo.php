<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/19
 * Time: 14:34
 */

/**
 * 方法重载
 *      当对象对未定义的实例方法进行调用（访问），会自动调用定义好的魔术方法：call（）
 *      当对象对未定义的静态方法进行调用（访问），会自动调用定义好的魔术方法：callstatic（）
 */
class A{

    function f1(){
        echo "<p>普通实例方法被调用";

    }

    /**
     * 该魔术方法需要两个参数分别为：
     * $name:代表不存在的方法名
     * $arguments：调用该不存在的方法是的“所有参数”--是一个数组！
     */

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
//        echo "<p>要调用的不存在的方法名为:{$name}";
//        echo "<p>使用的实参数据为:";print_r($arguments);
        // 下面使用这种机制实现其他面向对象语言中的重载效果
        if ($name=="eat"){
            $num=count($arguments);
            if ($num==1){//调用喝粥方法
                $this->hezhou($arguments[0]);
            }elseif ($num==2){//调用吃饭方法
                $this->chifan($arguments[0],$arguments[1]);
            }else{
                echo "<br/>爱吃啥吃啥去！";
            }
        }

    }

//    function __call($name, $arguments)
//    {
//        if ($name=="eat"){
//            $num=count($arguments);
//            if ($num==1){//调用喝粥方法
//                echo "<br/>一口喝完{$zhou}"; //这种情况可以不调用hezhou方法
//            }elseif ($num==2){//调用吃饭方法
//                echo "<br/>一口吃完{$fan}";//这种情况可以不调用chifan方法
//            }else{
//                echo "<br/>爱吃啥吃啥去！";
//            }
//        }
//
//    }

    /**
     * 该魔术方法需要两个参数分别为：
     * $name:代表不存在的方法名（函数名）
     * $arguments：调用该不存在的方法是的“所有参数”--是一个数组！
     */

    static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        // 下面使用这种机制实现其他面向对象语言中的重载效果
        if ($name=="eat"){
            $num=count($arguments);
            if ($num==1){//调用喝粥方法
                self::hezhou1($arguments[0]);
            }elseif ($num==2){//调用吃饭方法
                self::chifan1($arguments[0],$arguments[1]);
            }else{
                echo "<br/>爱吃啥吃啥去！";
            }
        }
    }

    function hezhou($zhou){
        echo "<br/>一口喝完{$zhou}";
    }

    function chifan($fan){
        echo "<br/>一口吃完{$fan}";
    }
    static function hezhou1($zhou){
        echo "<br/>一口喝完2{$zhou}";
    }

    static function chifan1($fan){
        echo "<br/>一口吃完2{$fan}";
    }

}

$a=new A();
$a->f1();
$a->f2();//进行了下面的操作后这个没有作用了
$a->f3(2,'www');//进行了下面的操作后这个没有作用了

//实例方法
$a->eat("粥");
$a->eat('饭','筷子');
$a->eat('545555','9887948','iyawr98','iuh8');

//静态方法
$a::eat("粥");
$a::eat('饭','筷子');
$a::eat('1651','59+','156');

