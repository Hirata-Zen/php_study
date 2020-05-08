<?php
	function hello_user($name){
		return "こんにちは、".$name."さん";
	}
	$user=hello_user("平田");
	echo $user;
?>
