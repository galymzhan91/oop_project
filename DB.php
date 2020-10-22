<?php
## Database connection with PDO class
class DB
{
	private static $_pdo;	
	private static $username = "root";
	private static $password = "";
	private function __construct() // define construct method for security issue
	{}
	
	public static function getInstance() 
	{
		if(!self::$_pdo){ // if connection doesn't established than return new connection. Also this called as Singleton
			try{
				self::$_pdo = new PDO("mysql:host=localhost; dbname=mydating", self::$username, self::$password);
				 // set the PDO error mode to exception
				self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "Connected successfully";
			}catch(PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}
		}
		return self::$_pdo;
	}
	public static function closeConn()
	{
		return self::$_pdo = null;
	}
}

?>

<?php
/* ## Example of how to secure password!
// config.conf
pepper=c1isvFdxMDdmjOlvxpecFw

<?php
// register.php
$pepper = getConfigVariable("pepper");
$pwd = $_POST['password'];
$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
$pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
add_user_to_database($username, $pwd_hashed);
?>

<?php
// login.php
$pepper = getConfigVariable("pepper");
$pwd = $_POST['password'];
$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
$pwd_hashed = get_pwd_from_db($username);
if (password_verify($pwd_peppered, $pwd_hashed)) {
    echo "Password matches.";
}
else {
    echo "Password incorrect.";
}



//$rest_json = file_get_contents("php://input");
//$_POST = json_decode($rest_json, true);






?>
*/
?>