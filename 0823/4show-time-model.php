<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/23
 * Time: 13:31
 */
class DateTimeModel{
    function GetTime(){
        return Date('H:i:s');
    }
    function GetDate(){
        return Date('Y年m月d日');
    }
    function GetDateTime(){
        return Date('Y年m月d日 H:i:s');
    }
}