<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/22
 * Time: 14:30
 */

include_once './S.class.php';

//读取序列化后的数据(字符串)
$str=file_get_contents('./obj.txt');
$obj=unserialize($str);
var_dump($obj);//注意：该对象序列化时没有让p2进行序列化，恢复时，恢复原始的数据。
