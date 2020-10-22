<?php


class Pages  //при входе на сайт показывает соответствующую страницу
{
	public static function showPage($name)
	{
		if($name='auth'){
			page(auth.html);
		}else return '404 not found';
		
		if($name='register'){
			page(register.html);
		}else return '404 not found';
		
		if($name='about'){
			page(about.html);
		}else return '404 not found';
	}
}


class Db  //подключение к базе данных
{
	private function __construct()
	{
		try{
			$pdo = new PDO('mysql:host=localhost', 'dbname=database', 'username', 'password');
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public static function getInstance()
	{
		if(!isset(self::$_instance)){
			self::$_instance = new Db();
		}
		return self::$_instance;
	}
}









?>