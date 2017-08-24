<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/23
 * Time: 13:29
 */
require_once './4show-time-model.php';
if (!empty($_GET['type'])&&$_GET['type']==2){
    $obj=new DateTimeModel();
    $time=$obj->GetTime();
}elseif(!empty($_GET['type'])&&$_GET['type']==3){
    $obj=new DateTimeModel();
    $time=$obj->GetDateTime();
}else{
    $obj=new DateTimeModel();
    $time=$obj->GetDate();
}
include_once './4show-time-view.html';