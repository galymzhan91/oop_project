<?php

class User extends DB
{
	$db  = new DB();
	//$db = DB::getInstance();
	static function getUser($username)
	{
		if($db->query("Select username from users where username=$username"))
		{
			return $username;
		}else return 'invalid username';
	}
}

?>