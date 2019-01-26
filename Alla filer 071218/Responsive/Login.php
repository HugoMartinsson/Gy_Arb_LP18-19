<?php
	require("db.php");
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login_1.0.1</title>
<link rel="stylesheet" href="styler.css" type="text/css">
</head>

<body>
	<div id="wrapperlogin">
    	<div id="headerlogin">
        	<h1 id="headerlogoh1">"LOGGA"</h1>
        </div>
        <div id="sectionlogin">
        	<div id="loginsectionborder">
                <form action="" method="post">
                    <div id="logoncredentialsdiv">
                    	<p id="logoncredentialsp">Användarnamn:</p>
                    	<input type="text" name="username" id="logoncredentialsfillin">
                	</div>
                	<div id="logoncredentialsdiv">
                    	<p id="logoncredentialsp">Lösenord:</p>
                    	<input type="text" name="password" id="logoncredentialsfillin">
                	</div>
                	<div id="logonbuttondiv">
                		<input id="inputlogin" type="submit" id="logininput" value="Logga in">
                	</div>
                </form>
            </div>
        </div>
    </div>
<?php
	if(!empty($_POST))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		//$hashed_password = password_hash($password, PASSWORD_DEFUALT);
		
		$sql = "SELECT Password FROM users WHERE Username = :username";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		$result = $stmt->fetchAll();
		
		foreach($result as $row)
		{
			if(password_verify($password, $row->Password))
			{
				$_SESSION['currentuser'] =  $username;
				echo "Welcome";
				?>
                <script>
					window.location.href = "start.php";
                </script>
                <?php
			}
			else if(!password_verify($password, $row->Password))
			{
				?><p>Username or password is incorrect!</p><?php
			}
			else
			{
				?><p>An error occured, please try again!</p><?php
			}
		}
	}
?>
</body>
</html>
