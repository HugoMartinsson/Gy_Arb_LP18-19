<?php
require("db.php");
session_start();
if(isset($_SESSION['currentuser']))
{
	try
	{
		$sql = "SELECT Type FROM users where Username = :currentuser";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":currentuser", $_SESSION['currentuser']);
		$stmt->execute();
		$result = $stmt->fetchAll();
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
	
	foreach($result as $row)
	{
		$usertype = $row->Type;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Kurser</title>
<link rel="stylesheet" href="styler.css" type="text/css">
</head>

<body>
  <div id="wrapper">
    	<header>
        	<h1 id="headerlogoh1">"LOGGA"</h1>
        </header>
        <nav>
        	<div id="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="start.php">Hem</a>
                        <a href="kurser_overview_KLAR.php">Kurser/Klassrum</a>
                        <a href="lanksamling.php">Länksamlingar</a>
                        <?php 
						if($usertype == "student")
						{
							?><a href="inlamning.php">Inlämningar</a><?php
						}
						?>
                        <a href="http://www.novasoftware.se/webviewer/(S(kfzct0fzd3s4iy55e3xyz345))/design1.aspx?schoolid=53520">Schema</a>
                        <a href="mittkonto.php">Mitt Konto</a>
                        <?php 
						if($usertype == "teacher")
						{
							?><a href="create_handin.php">Skapa inlämning</a><a href="teacher_file_upload.php">Ladda upp fil</a><a href="add_news.php">Skriv nyhet</a><?php
						}
						?>
                        <a href="logout.php">Logga ut</a>
                    </div>
             </div>
        </nav>
        <section>
        	<div id="news">
            	<h1 id="newsh1">Klicka på en bild för att byta bakgrundsbild</h1><br>
                <a href="mittkonto.php?imageid=1"><img src="img/Backgrounds_desktop/Desktop_1.jpg" width="180px" height="100%"/></a>
                <a href="mittkonto.php?imageid=2"><img src="img/Backgrounds_desktop/Desktop_2.jpg" width="180px" height="100%"/></a>
                <a href="mittkonto.php?imageid=3"><img src="img/Backgrounds_desktop/Desktop_3.jpg" width="180px" height="100%"/></a>
                <a href="mittkonto.php?imageid=4"><img src="img/Backgrounds_desktop/Desktop_4.jpg" width="180px" height="100%"/></a>
                <a href="mittkonto.php?imageid=5"><img src="img/Backgrounds_desktop/Desktop_5.jpg" width="180px" height="100%"/></a>
                <a href="mittkonto.php?imageid=6"><img src="img/Backgrounds_desktop/Desktop_6.jpg" width="180px" height="100%"/></a>
                <a href="mittkonto.php?imageid=7"><img src="img/Backgrounds_desktop/Desktop_7.jpg" width="180px" height="100%"/></a>
                <a href="mittkonto.php?imageid=8"><img src="img/Backgrounds_desktop/Desktop_8.jpg" width="180px" height="100%"/></a>
                <a href="mittkonto.php?imageid=9"><img src="img/Backgrounds_desktop/Desktop_9.jpg" width="180px" height="100%"/></a>
            </div>
            
        	<?php
			if(!empty($_GET))
				{
					$imageid = $_GET['imageid'];
					$_SESSION['bgid'] = $imageid;
					
					$sql = "UPDATE users SET Backgroundid = :bgid WHERE Username = :username";
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':username', $_SESSION['currentuser']);
					$stmt->bindParam(":bgid", $imageid);
					$stmt->execute();
				}
			if(empty($_SESSION['bgid']))
			{
				$sql = "SELECT Backgroundid FROM users WHERE Username = :username";
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':username', $_SESSION['currentuser']);
				$stmt->execute();
				$res = $stmt->fetchAll();
				
				foreach($res as $row)
				{
					$_SESSION['bgid'] = $row->Backgroundid;
				}
			}
				if(empty($_SESSION['bgid']) or $_SESSION['bgid'] == 0)
				{
					$_SESSION['bgid'] = 2;
				}
			
				if($_SESSION['bgid'] == 1)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_1.jpg')";}
						else if(window.innerWidth > 481){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_1.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 2)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_2.jpg')";}
						else if(window.innerWidth > 481){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_2.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 3)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_3.jpg')";}
						else if(window.innerWidth > 481){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_3.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 4)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_4.jpg')";}
						else if(window.innerWidth > 481){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_4.jpg')";}
                        </script><?php
					}
                    else if($_SESSION['bgid'] == 5)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_5.jpg')";}
						else if(window.innerWidth > 481){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_5.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 6)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_6.jpg')";}
						else if(window.innerWidth > 481){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_6.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 7)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_7.jpg')";}
						else if(window.innerWidth > 481){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_7.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 8)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_8.jpg')";}
						else if(window.innerWidth > 481){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_8.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 9)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_9.jpg')";}
						else if(window.innerWidth > 481){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_9.jpg')";}
                        </script><?php
					}
			?>
    </section>

</div>
    <script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
    		document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
  			if (!event.target.matches('.dropbtn')) {

  		    var dropdowns = document.getElementsByClassName("dropdown-content");
    		var i;
    		for (i = 0; i < dropdowns.length; i++) {
     		var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  	}
	}
	
	
	</script>
</body>
</html>
<?php 
}
else
{
	header("Location: login.php");
}