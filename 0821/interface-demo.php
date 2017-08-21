<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/21
 * Time: 8:31
 */

/**
 * 接口
 *     多继承
 *      implements实现
 */

//音乐播放器接口定义
interface Player{
    const PI=3.1415926;
    function play();//接口中的方法都只能是抽象的，不需要abstract关键字
    function next();
    function prev();
    function stop();
}

//USB设备接口定义
interface USBSet{
    const WIDTH=12;
    const HEIGHT=5;
    function data_in();
    function data_output();
}

//MP3播放器类，普通类
class MP3Player implements Player,USBSet{
    //这里必须实现其“上级”所有抽象方法
    function play(){echo "音乐播放";}
    function next(){echo "下一首";}
    function prev(){echo "上一首";}
    function stop(){echo "音乐暂停";}
    function data_in(){echo "数据输入";}
    function data_output(){echo "数据输出";}
}

//另外，Player接口可以有下级的类，比如纯的播放器
//另外，USB接口可以有下级的类，比如USB线


class B{
    public $a=1;
    function get(){
        echo "...";
    }
}
//1.一个类，可以继承其他类，并同时实现其它接口，形式如下：
class A extends B implements Player,USBSet{
    function play(){echo "音乐播放";}
    function next(){echo "下一首";}
    function prev(){echo "上一首";}
    function stop(){echo "音乐暂停";}
    function data_in(){echo "数据输入";}
    function data_output(){echo "数据输出";}
}

//2.接口之间可以相互继承,形式如下：
interface I extends Player,USBSet{

}

//3.接口中的常量和抽象方法都只能是public，而且不用写！抽象方法也无需使用abstract关键字




































