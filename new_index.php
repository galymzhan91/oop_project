<?php 

require_once('classes/UserAuth.php');

print 'Hello this is index page!';

function showPage($name)
{
	if($name='auth'){
		page(auth.html);
	}else if($name='register'){
		page(register.html);
	}else if($name='about'){
		page(about.html);
	}else 
		return '404 not found';
}




























?>