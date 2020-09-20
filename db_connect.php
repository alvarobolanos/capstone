<?php

// Remote
if (getenv("CLEARDB_DATABASE_URL")) {
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	
	$mysqli = new mysqli($server, $username, $password, $db);
	
} else {
	
	// Local
	$host = '127.0.0.1';
	$port = '3306';
	$usr = 'alvaro';
	$pass = 'password';
	$db = 'capstone';
	
	$mysqli = @mysqli_connect($host, $usr, $pass, $db, $port) OR die(mysqli_connect_error($db));

}


?>