<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/23
 * Time: 10:13
 */
$time = date('Y年m月d日 H:i:s');
/*
if (!empty($_GET['plate'] && $_GET['plate'] == 2)) {
    $plate_file = './3show-time-2.html';
} elseif (!empty($_GET['plate'] && $_GET['plate'] == 3)) {
    $plate_file =  './3show-time-3.html';
} else {
    $plate_file =  './3show-time-1.html';
}
*/
$plate=$_GET['plate']?$_GET['plate']:1;
$plate_file='./3show-time-'.$plate.'.html';
include_once $plate_file;