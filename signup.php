<?php

if(!isset($_POST['email'])) error( "Email is required.");

if(!isset($_POST['psw'])) error( "Password is required.");
	
if(!isset($_POST['psw-repeat'])) error( "Password repeat is required.");

if($_POST['psw'] != $_POST['psw-repeat']) error( "Password must match.");

$users = get_users();

if(in_array($_POST['email'], $users)) error ("User already exists");

$line = PHP_EOL . $_POST['email'] . ":" . $_POST['psw'] ;
file_put_contents("user.txt", $line, FILE_APPEND);

echo "Welcome!";

function get_users() {
	

    $lines = file("user.txt");
	$users = [];
	
	foreach($lines as $line) {
		if(trim($line) == '') {
			continue;
		}
		list($email, $psw) = explode(":", trim($line), 2);
		$users[] = $email;
	}
	return $users;
}

function error($message) {
	echo $message;
	exit();
}



