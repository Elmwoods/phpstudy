<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/21
 * Time: 10:04
 */
header("Content-type:text/html;charset=utf8;");
//class Car{
//    //在这里定义一个共有属性name
//    public $name = '1111';
//
//
//}
//$car = new Car();
////在这里输出$car对象的name属性
//echo $car->name;

//class Car {
//    public $speed = 0;
//    //增加speedUp方法，使speed加10
//    public function speedUp(){
//        $this->speed +=10;
//    }
//}
//$car = new Car();
//$car->speedUp();
//echo $car->speed;

//使用关键字static修饰的，称之为静态方法，静态方法不需要实例化对象，可以通过类名直接调用，操作符为双冒号::。
//class Car{
//
//    public static  function getName(){
//        return "汽车";
//    }
//}
//echo Car::getName();

//class Car {
//    //增加构造函数与析构函数
//    function __construct(){
//        echo '构造函数被调用<br>';
//    }
//    function __destruct(){
//        echo '析构函数被调用<br>';
//    }
//}
//$car = new Car();
//echo '使用后销毁析构对象<br>';
//unset($car);
//class Smallcar extends Car{
//    function __construct()
//    {
//        echo '子类构造函数被调用<br>';
//        parent::__construct();
//    }
//}
//$s = new Smallcar();

//class Car {
//    private static $speed = 10;
//    public function getSpeed() {
//        return self::$speed;
//    }
//    //在这里定义一个静态方法，实现速度累加10
//    public static function speedUp(){
//        return self::$speed+=10;
//    }
//}
//$car = new Car();
//Car::speedUp();  //调用静态方法加速
//echo $car->getSpeed();  //调用共有方法输出当前的速度值

//class Car {
//    public $speed = 0; //汽车的起始速度是0
//    public function speedUp() {
//        $this->speed += 10;
//        return $this->speed;
//    }
//}
////定义继承于Car的Truck类
//class Truck extends Car{
//    public function speedUp(){
//    $this->speed+=50;
//    return $this->speed;
//}
//}
//$truck = new Truck();
//$truck->speedUp();
//echo $truck->speed;
























