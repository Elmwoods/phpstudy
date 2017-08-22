<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 13:46
 */

//序列化
$v1=1;
$v2=2.2;
$v3='abc';
$v4=true;
$v5=array('a','b','c');
$str1=serialize($v1);
$str2=serialize($v2);
$str3=serialize($v3);
$str4=serialize($v4);
$str5=serialize($v5);
file_put_contents('./file1.txt',$str1);
file_put_contents('./file2.txt',$str2);
file_put_contents('./file3.txt',$str3);
file_put_contents('./file4.txt',$str4);
file_put_contents('./file5.txt',$str5);


