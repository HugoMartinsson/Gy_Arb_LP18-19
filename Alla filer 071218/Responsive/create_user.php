<?php
	require("db.php");
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Namnlöst dokument</title>
</head>

<body>
<form action="" method="post">
	Username: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    Verify password: <input type="text" name="passwordcheck"><br>
    Name: <input type="text" name="name"><br>
    <select name="type">
    	<option value="teacher">Teacher</option>
        <option value="student">Student</option>
    </select>
    <input type="submit">
</form>
<?php

	if(!empty($_POST))
	{
		$password = $_POST['password'];
		$passwordcheck = $_POST['passwordcheck'];
		$username = $_POST['username'];
		$name = $_POST['name'];
		$type = $_POST['type'];
		
		$sql = "SELECT Username FROM users WHERE Username = :username";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		$result = $stmt->fetchAll();
		
		if(empty($result))
		{
			if($password == $passwordcheck)
			{
				$hashed_password =  password_hash($password, PASSWORD_DEFAULT);
				
				$sql = "INSERT INTO users (Username, Password, Name, Type) VALUES (:username, :password, :name, :type)";
				$stmt =  $dbh->prepare($sql);
				$stmt->bindParam(":username", $username);
				$stmt->bindParam(":password", $hashed_password);
				$stmt->bindParam(":name", $name);
				$stmt->bindParam(":type", $type);
				$stmt->execute();
				
				echo "User was succesfully created";?>
				<script>
                      window.history.pushState({}, document.title, "/" + "php/create_user.php");
                </script>
                <?php
			}
			else if($password != $passwordcheck)
			{
				echo "Password don´t match";
			}
			else
			{
				echo "A problem occured, please try again";
			}
		}
		
	}
	?>
</body>
</html>