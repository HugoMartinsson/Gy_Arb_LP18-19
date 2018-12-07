<?php 
session_start();
require("db.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Namnlöst dokument</title>
<link rel="stylesheet" href="betamobilecss_1.0.1.css" type="text/css">
</head>

<body>
<?php
	$username = $_GET['username'];
	$password = $_GET['password'];
	$_SESSION['currentuser'] = $_GET['username'];
	
	$sql = "SELECT Password FROM users WHERE Username = :username";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(":username", $username);
	$stmt->execute();
	$result = $stmt->fetchAll();
?>
	<?php 
	foreach($result as $row)
	{
	if($row->Password != $password) : ?>
    	<form action="betamobilelogin_1.0.1.php" method="get">
        	<p>Felaktigt användarnamn eller lösenord</p>
        	<p>Klicka på knappen för att komma tillbaka till inloggningen</p>
        	<input type="submit" value="Till Inloggning">
       	</form>
	<?php endif; ?>
<?php
	if($row->Password == $password)
	{
		echo "Welcome $username";
	}
	}
?>

</body>
</html>