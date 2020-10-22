<?php
session_start();
require_once 'DB.php';
 ?>
<div class="text-center">
  <h3><?php //echo $user."successfully ".$action."!"; ?></h3>
</div>

<?php 


print_r($_SESSION["email"].'! </br>');
if( $_SERVER["REQUEST_METHOD"] == "POST" & !empty($_POST["username"]) & !empty($_POST["password"]) & !empty($_POST["email"])){
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$_POST["coutry_id"] = 0;
	$_POST["region_id"] = 0;
	$_SESSION["email"] = $_POST["email"];
	$conn = DB::getInstance();
	$sql = 'INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password_hash`, `email`, `address`, `address2`, `country_id`, `region_id`, `zip`, `phone`) VALUES (NULL, "'.$_POST["firstname"].'", "'.$_POST["lastname"].'", "'.$_POST["username"].'", "'.$password.'", "'.$_POST["email"].'", "'.$_POST["address"].'", "'.$_POST["address2"].'", "'.$_POST["coutry_id"].'", "'.$_POST["region_id"].'", "'.$_POST["zip"].'", "'.$_POST["phone"].'");';	
	$query = $conn->prepare($sql);
	$res = $query->execute();
    $_SESSION["username"] = $_POST["username"];
	header("Location: ".$_SERVER['PHP_SELF']);
	exit;
}
else{
	echo 'fill the fields!';
}


?> 