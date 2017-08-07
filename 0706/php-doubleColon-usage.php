<?php
	/**
	* 用变量在类定义外部访问
	*/
	/*class Fruit
	{
 		const CONST_VALUE = 'Fruit Color';
	}*/
	//$classname = 'Fruit';
	//echo $classname::CONST_VALUE."<br />"; // As of PHP 5.3.0
	//echo Fruit::CONST_VALUE.   "<br/>";

	/**
	* 在类定义外部使用：：
	*/
	/*class Apple extends Fruit
	{
		
		public static  $color = "RED";
		public static function doubleColon(){
			echo parent::CONST_VALUE ."<br />";
			echo self::$color ."<br />";
		}
	}
	Apple::doubleColon();*/

	/**
	* 调用parent方法
	*/
	/*class Fruit{
		protected function showColor(){
			echo "Fruit::showColor() \n";
		}

	}
	class Apple extends Fruit
	{
		public function showColor(){
			parent::showColor();
			echo "Apple::showColor()\n";
		}
	}
	$apple  = new Apple();
	$apple ->showColor();
	*/
	/**
	 *使用作用域限定符 
	 */
/*	class Apple
	{
		public  function showColor()
		{
			return $this->color;
		}
	}

	class Banana
	{
		//public $color;
		public function __construct()
		{
			$this->color ="Banana is yellow";			
		}
		public function GetColor(){
			return Apple::showColor();
		}
	}
	$banana = new Banana;
	echo $banana->GetColor();*/

	/**
	* 调用基类的方法
	*/
	class Fruit{
		static function color(){
			return "color";
		}
		static function  showColor(){
			echo "show".self::color();
		}
	}
	class Apple extends Fruit
	{
		
		static function color()
		{
			return "red";
		}
	}
	Apple::showColor();