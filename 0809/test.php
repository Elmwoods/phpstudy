<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/9
 * Time: 9:19
 */
require 'MyPDO.class.php';
$db = MyPDO::getInstance('localhost', 'root', '', 'php_study', 'utf8');
$query = $db->query('select * from products');
var_dump($query);
$db->destruct();

