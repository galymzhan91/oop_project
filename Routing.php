<?php	

class Routing
{
	public static function redirect($location)
	{
		header("Location: http://localhost:8080/myproject/".$location);
		exit();
	}
	
	public static function urlDivide($url)
	{
		$bite = explode("/", $url);
		foreach $bite as $v 
		{	
			
		}
	}
}
























?>