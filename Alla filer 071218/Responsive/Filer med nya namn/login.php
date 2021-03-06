<?php
require("db.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
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
                    	<input type="text" name="username" id="logoncredentialsfillin" placeholder="Användarnamn">
                	</div>
                	<div id="logoncredentialsdiv">
                    	<input type="password" name="password" id="logoncredentialsfillin" placeholder="Lösenord">
                	</div>
                	<div id="logonbuttondiv">
                		<input type="submit" id="inputlogin" value="Logga in">
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
		
		try
		{
			$sql = "SELECT Password FROM users WHERE Username = :username";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(":username", $username);
			$stmt->execute();
			$result = $stmt->fetchAll();
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
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
				echo "Användarnamn eller lösenord är felaktigt!";
				//FUNGERAR EJ
			}
			else
			{
				echo "Ett fel inträffade, försök igen!";
				//FUNGERAR EJ
			}
		}
	}
	?>
	<script type="text/javascript">
		if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_1.jpg')";}
		else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_1.jpg')";}
    </script>
</body>
</html>