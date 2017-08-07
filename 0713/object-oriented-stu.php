<?php
header("Content-type:text/html;charset=utf-8;");
class Stu
{
	var $name = '';
	var $age = 0;
	var $gender = '';
	static $sum = 0;		//初始为0个，为静态属性，代表学生总数
	const SCHOOL = '传智';	
	function __construct($name , $age, $gender)
	{
		$this->name = $name;
		$this->age = $age;
		$this->gender = $gender;
		self::$sum++;		//累加学生数量
		echo "{$name}加入".self::SCHOOL."，现在有".self::$sum.'个学生'.'<br />';
	} 
	function __destruct()
	{
		echo 	"{$this->name} 被销毁 <br />";
	}
	function IntroMe()
	{
		echo "我叫:".$this->name.'<br />';
		echo "年龄:".$this->age.'<br />';
		echo "性别:".$this->gender.'<br />';
	}
}
$s1 = new Stu('张三',18,'男');
$s1->IntroMe();
$s2 = new Stu('赵六',22,'男');
$s1->IntroMe();
