<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login_1.0.1</title>
<link rel="stylesheet" href="betamobilecss_1.0.1.css" type="text/css">
<link rel="stylesheet" href="css/main.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div id="wrapperlogin">
    	<header>
        	<h1 id="headerlogoh1">"LOGGA"</h1>
        </header>
        <section id="loginsection">
        	<div id="loginsectionborder">
                <div id="logoncredentialsdiv">
                <form action="login_script_1.0.1.php" method="get">
                    <p id="logoncredentialsp">Användarnamn:</p>
                    <input type="text" name="username" id="logoncredentialsfillin">
                </div>
                <div id="logoncredentialsdiv">
                    <p id="logoncredentialsp">Lösenord:</p>
                    <input type="text" name="password" id="logoncredentialsfillin">
                </div>
                <div id="logonbuttondiv">
                	<input type="submit" value="Logga in" id="presstologin">
                </div>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
<?php
	$username = "root";
	$password = "";
	$servername = "localhost";
	$dbname = "eclass";
	$conn = new MySQLi($servername, $username, $password, $dbname);
/*
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";*/
?>
