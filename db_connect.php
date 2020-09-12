<?php

$host = '127.0.0.1';
$port = '3306';
$usr = 'alvaro';
$pass = 'password';
$db = 'capstone';

$mysqli = @mysqli_connect($host, $usr, $pass, $db, $port) OR die(mysqli_connect_error($dbc));

?>