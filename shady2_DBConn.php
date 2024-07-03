<?php
//mysqli conn
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "shady2";
$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);
//PDO conn
$dsn = "mysql:host=localhost; dbname=shady2";
$connPDO = new PDO($dsn,$dbUserName,$dbPassword);