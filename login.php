<?php
require_once('DB.php');
class Login
{
	protected $login = false;
	
	function __construct()
	{
		getLogin();
	}
	public function setLogin($bool)
	{
		$this->login = $bool;
	}
	
	public function getLogin()
	{
		return $this->login;
	}
	
	public static function success($message)
	{
		if(!$message){
			redirect(server[self_php]);
		}else{
			redirect(home.php);
		}
	}
	// Проверять если есть сессия сразу перенаправлять в страницу пользователя
	// Если нет
	// Должен проверить совпадает ли пароль 
	// Если совпадает открыть сессию
}



if($_SERVER["REQUEST_METHOD"] == "POST" & !empty($_POST["username"]) & !empty($_POST["password"])){
	$username = trim(strip_tags(stripcslashes($_POST["username"])));
	$password = trim(strip_tags(stripcslashes($_POST["password"])));
	//htmlentities($str, ENT_QUOTES, "UTF-8");
	$conn = DB::getInstance();
	$sql = 'select * from users where username=?';
	$query = $conn->prepare($sql);
	$query->bindParam(1, $username, PDO::PARAM_STR);
	$query->execute();
	$mas = $query->fetch(PDO::FETCH_ASSOC);
	print_r($mas);
	$hash = $mas['password_hash'];
	if (password_verify($password, $hash)) {
		$success = true;
	}
}

include 'includes/header.php';
?>	
<div class="text-center">
	<div class="row justify-content-center">
	<div class="col-3">
		<form class="form-signin" method="post" action="login.php">
			<input type="username" id="inputUsername" name="username" class="form-control mb-2" placeholder="Username" required autofocus>
			<!--<input type="email" id="inputEmail" name="username" class="form-control mb-2" placeholder="Email address" required autofocus>-->
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
			<hr class="mx-1">
			<button class="btn btn-primary " type="submit">Sign in</button>
		</form>
	</div>
	</div>
</div>
<?php
include 'includes/footer.php';
?>
