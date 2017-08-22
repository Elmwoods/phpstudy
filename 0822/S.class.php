<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 14:22
 */

class S{
    public $p1=1;
    public $p2=2;
    public $p3=3;

    public function __sleep()
    {
        // TODO: Implement __sleep() method.
        //序列化p1，p3两个属性数据
        return array('p1','p3');
    }

}