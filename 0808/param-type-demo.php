<?php
///**
// * Created by PhpStorm.
// * User: Administrator
// * Date: 2017/8/8
// * Time: 14:37
// */
class ShopProduct{
    public $title = 'default product';      // 属性也称为成员变量，用来存放对象之间互不相同的数据
    public $producerMainName = 'main name';
    public $producerFirstName = 'first name';
    public $price = 0;

    // 创建对象时，构造方法会被自动调用，构造方法可以确保必要的属性设置，并完成任何需要准备的工作
    public function __construct($title,$producerMainName,$producerFirstName,$price){
        $this->title = $title;      // 使用伪变量$this给每个变量赋值
        $this->producerMainName = $producerMainName;
        $this->producerFirstName = $producerFirstName;
        $this->price = $price;
    }

    public function getProducer(){  // 方法让对象执行任务
        return $this->producerMainName . $this->producerFirstName;
    }
}

class ShopProductWriter{
    public function write(ShopProduct $shopProduct){    // 类的类型提示，只需将类名放在需要约束的方法参数之前
        $str = $shopProduct->title . ':' . $shopProduct->getProducer() . "($shopProduct->price) . </br>";
        print $str;
    }

    public function setArray(array $storearray){        // 数组提示
        var_dump($storearray);
    }

    public function setWriter(ObjectWriter $objectWriter=null){
        var_dump($objectWriter);
    }
}

class Wrong{};
$store = array('name'=>'taobao');
$objectWriter = NULL;

$product1 = new ShopProduct('My Antonia','Willa','Cather',5.99);    // 更易于实例化，也更安全，实例化和设置只需要一条语句就可以完成，任何使用ShopProduct对象的代码都可以相信所有的属性皆被初始化了
$writer = new ShopProductWriter();
$writer->write($product1);        // 有了参数提示，规定此处只能传入new ShopProduct对象
//$writer->write(new Wrong());     // 传入其它的对象会出现：Catchable fatal error: Argument 1 passed to ShopProductWriter::write() must be an instance of ShopProduct, instance of Wrong given..从而防止隐藏bug的产生。
$writer->setArray($store);        // 有了参数提示，规定此处只能传入一个数组
$writer->setWriter($objectWriter); // 有了参数提示，规定此处只能传入NULL