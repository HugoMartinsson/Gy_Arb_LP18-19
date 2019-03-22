<?php
$dsn = "mysql:host=localhost;dbname=eclass;";//Host + Database
$login = "root";//User
$password = "";//Password
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");//Use UTF8
$dbh = new pdo($dsn, $login, $password, $options);//Create database handle
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//Fetch objects
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Get SQL-statement warnings etc
?>