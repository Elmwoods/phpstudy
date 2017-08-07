<?php
/**
 *  __construct（）函数创建一个新的SimpleXMLElement对象
 * 如果成功，函数返回一个对象，如果失败，则返回false;
 */
$xmlstring = <<<XML
<?xml version="1.0" encoding="ISO-8859-1"?>
<note>
    <to>George</to>
    <from>John</from>
    <heading>Reminder</heading>
    <body>Dont forget the meeting!</body>
</note>
XML;

$xml = new SimpleXMLElement($xmlstring);

echo $xml->to[0];