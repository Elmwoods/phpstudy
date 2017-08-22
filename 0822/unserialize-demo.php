<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 14:05
 */

//反序列化
$v1=file_get_contents('./file1.txt');   //读取序列化的数据
$v2=file_get_contents('./file2.txt');
$v3=file_get_contents('./file3.txt');
$v4=file_get_contents('./file4.txt');
$v5=file_get_contents('./file5.txt');

$str1=unserialize($v1);
$str2=unserialize($v2);
$str3=unserialize($v3);
$str4=unserialize($v4);
$str5=unserialize($v5);

var_dump($str1);
var_dump($str2);
var_dump($str3);
var_dump($str4);
var_dump($str5);