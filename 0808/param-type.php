<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8
 * Time: 9:56
 */
class AddressManger{
    private $addresses =  array("209.131.36.139","74.125.19.106");

    function outputAddress( $resolve )
    {
//        if (is_string($resolve)) {
//            $resolve = (preg_match("/false|no|off/i", $resolve)) ? false : true;
//            var_dump($resolve);
//        }
        if (!is_bool($resolve)){
            die("outputAddress() require a boolean argument <br/>");
        }
        foreach ($this->addresses as $address) {
            print $address;
            if ($resolve) {
                print "(" . gethostbyaddr($address) . ")";  //gethostbyaddr --获取指定的IP地址的主机名
            }
            print "<br/>";
        }
    }
}

$settings = simplexml_load_file("settings.xml");  //将XML文件解释为对象
$manager = new AddressManger();
$manager->outputAddress( (bool)$settings->resolvedomains);








