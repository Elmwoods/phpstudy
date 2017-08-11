<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/11
 * Time: 9:55
 * 使用 __clone 复制对象
 */
class Account{
    public $balance;
    function __construct( $balance )
    {
        $this->balance = $balance;
    }

}

class Person {
    private $name;
    private $age;
    private $id;
    private $account;
    function __construct($name , $age , Account $account)
    {
        $this->name = $name;
        $this->age = $age;
        $this->account = $account;
    }
    function setId( $id ){
        $this->id = $id;
    }

    function __get($account)
    {
        return $this->account;
    }

    function __clone(){
        $this->id = 0;
        $this->account = clone $this->account;//对象属性在被复制之后被共享，需要在__clone方法中复制指向的对象
    }
}

$p = new Person("Hello",11, new Account(200));
$p->setId(1110);
$p2 = clone $p;
var_dump($p2);
//给p充一些钱
$aa = $p2->account->balance += 10;
//var_dump($aa);
//结果p2也得到了这笔钱，这不合理
var_dump($p2->account->balance);