<?php
// if session is not started
session_start();
$u = "gааафыв123";
/*
if(preg_match('/^[a-zA-Z0-9]+$/', $u)){
	echo "correct";
}else echo "incorrect";*/

echo date('Y-m-d', time())."\n";



?>