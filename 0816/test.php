<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/16
 * Time: 13:28
 */
//echo phpinfo();
    $redis = new Redis();
    $redis->connect('127.0.0.1',6379);
//    $redis->set('lalala.com','商城首页');
    echo $redis->get('lalala.com');