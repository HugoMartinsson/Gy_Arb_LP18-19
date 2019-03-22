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
<title>Kurser/Klassrum</title>
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
                        <a href="course_overview.php">Kurser/Klassrum</a>
                        <a href="links.php">Länksamling</a>
                        <?php 
						if($usertype == "student")
						{
							?>
                            <a href="handin.php">Inlämningar</a>
							<?php
						}
						?>
                        <a href="http://www.novasoftware.se/webviewer/(S(kfzct0fzd3s4iy55e3xyz345))/design1.aspx?schoolid=53520">Schema</a>
                        <a href="account.php">Mitt Konto</a>
                        <?php 
						if($usertype == "teacher")
						{
							?>
                            <a href="create_handin.php">Skapa inlämning</a>
                            <a href="file_upload.php">Ladda upp fil</a>
                            <a href="news_upload.php">Skriv nyhet</a>
							<?php
						}
						?>
                        <a href="logout.php">Logga ut</a>
                    </div>
             </div>
        </nav>
        <section>
        	<div id="centerlinks">
				<?php
                if($usertype == "student")
                {
                    //SKA VARA KVAR ÄVEN NÄR CURRENTUSER ÄR IMPLEMENTERAD
                    $user = "%" . $_SESSION['currentuser'] . "%";
                    
                    try
                    {
                        //HÄMTAR ALLA KURSER SOM ELEVEN DELTAR I
                        $sql = "SELECT Name FROM courses WHERE Students LIKE :currentuser";
                        $stmt = $dbh->prepare($sql);
                        $stmt->bindParam(":currentuser", $user);
                        $stmt->execute();
                        $result2 = $stmt->fetchAll();
                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();
                    }
                    foreach($result2 as $row)
                    {
                        ?>
                        <a id="linktocourse" href="<?php echo 'course.php?course=' . $row->Name?>"><p><?php echo $row->Name; ?></p></a>
						<?php
                    }
                }
                if($usertype == 'teacher')
                {
                    try
                    {
                        //Hämtar alla kurser som läraren undervisar i
                        $sql = "SELECT Name FROM courses WHERE Teacher = :currentuser";
                        $stmt = $dbh->prepare($sql);
                        $stmt->bindParam(":currentuser", $_SESSION['currentuser']);
                        $stmt->execute();
                        $result2 = $stmt->fetchAll();
                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();
                    }
                    foreach($result2 as $row)
                    {
                        ?>
                        <a id="linktocourse" href="<?php echo 'course.php?course=' . $row->Name?>"><p><?php echo $row->Name; ?></p></a>
						<?php
                    }
                }
                ?>
        	</div>            
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
	<?php
	if(isset($_SESSION['currentuser']))
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
		if(empty($_SESSION['bgid']) or $_SESSION['bgid'] == 0)
		{
			$_SESSION['bgid'] = 2;
		}	
		if($_SESSION['bgid'] == 1)
		{
			?>
			<script type="text/javascript">
				if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_1.jpg')";}
				else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_1.jpg')";}
            </script>
			<?php
		}
		else if($_SESSION['bgid'] == 2)
		{
			?>
			<script type="text/javascript">
				if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_2.jpg')";}
				else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_2.jpg')";}
            </script>
			<?php
		}
		else if($_SESSION['bgid'] == 3)
		{
			?>
			<script type="text/javascript">
				if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_3.jpg')";}
				else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_3.jpg')";}
            </script>
			<?php
		}
		else if($_SESSION['bgid'] == 4)
		{
			?>
			<script type="text/javascript">
				if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_4.jpg')";}
				else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_4.jpg')";}
            </script>
			<?php
		}
        else if($_SESSION['bgid'] == 5)
		{
			?>
			<script type="text/javascript">
				if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_5.jpg')";}
				else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_5.jpg')";}
            </script>
			<?php
		}
		else if($_SESSION['bgid'] == 6)
		{
			?>
			<script type="text/javascript">
				if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_6.jpg')";}
				else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_6.jpg')";}
            </script>
			<?php
		}
		else if($_SESSION['bgid'] == 7)
		{
			?>
			<script type="text/javascript">
				if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_7.jpg')";}
				else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_7.jpg')";}
            </script>
			<?php
		}
		else if($_SESSION['bgid'] == 8)
		{
			?>
			<script type="text/javascript">
				if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_8.jpg')";}
				else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_8.jpg')";}
            </script>
			<?php
		}
		else if($_SESSION['bgid'] == 9)
		{
			?>
			<script type="text/javascript">
				if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_9.jpg')";}
				else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_9.jpg')";}
            </script>
			<?php
		}
	}		
	?>
</body>
</html>
<?php
}
else
{
	header("Location: login.php");
}