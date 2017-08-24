<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/23
 * Time: 9:43
 */
if (!empty($_GET['type'] && $_GET['type'] == '2')) {
    $t1 = date('H:i:s');
} elseif (!empty($_GET['type'] && $_GET['type'] == '3')) {
    $t1 = date('Y年m月d日 H:i:s');
} else {
    $t1 = date('Y年m月d日');
}
include_once '2show-time.html';
echo "<h3>$t1</h3>";