<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Namnlöst dokument</title>
<link rel="stylesheet" href="betamobilecss_1.0.1.css" type="text/css">
</head>

<body>
<?php
$username = "root";
	$password = "";
	$servername = "localhost";
	$dbname = "eclass";
	$conn = new MySQLi($servername, $username, $password, $dbname);
	
	$username = $_GET['username'];
	$password = $_GET['password'];
	
	$sql = "SELECT Password FROM users WHERE Username = '$username'";
	$result = $conn->query($sql);
	$row = $result -> fetch_assoc();
?>
	<?php if($row['Password'] != $password) : ?>
    	<form action="betamobilelogin_1.0.1.php" method="get">
        	<p>Felaktigt användarnamn eller lösenord</p>
        	<p>Klicka på knappen för att komma tillbaka till inloggningen</p>
        	<input type="submit" value="Till Inloggning">
       	</form>
	<?php endif; ?>
<?php
	if($row['Password'] == $password)
	{
		echo "Welcome $username";
	}
?>

</body>
</html>