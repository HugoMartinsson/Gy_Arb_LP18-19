<?php /*
session_start();
require("db.php");*/
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>gymnasiumarbete_1.0.1</title>
<link rel="stylesheet" href="betamobilecss_1.0.1.css" type="text/css">
</head>
<body>
<?php
	/*$username = "root";
	$password = "";
	$servername = "localhost";
	$dbname = "eclass";
	$conn = new MySQLi($servername, $username, $password, $dbname);	
	$username = $_GET['username'];
	$password = $_GET['password'];
	$_SESSION['currentuser'] = $_GET['username'];
	
	$sql = "SELECT Password FROM users WHERE Username = :username";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(":username", $username);
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	/*$result = $conn->query($sql);*/
	//$row = $result -> fetch_assoc();
?>
	<?php 
	/*
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
		*/?>
        <div id="wrapper">
    	<header>
        	<h1 id="headerlogoh1">"LOGGA"</h1>
        </header>
        <nav>
        	<div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="dropdowncontent">Hem</a>
                        <a href="dropdowncontent">Kurser/Klassrum</a>
                        <a href="dropdowncontent">Länksamlingar</a>
                        <a href="dropdowncontent">Inlämningar</a>
                        <a href="dropdowncontent">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section id="sectionstart">
        	<div id="news">
            	<h1 id="newsh1">"You decide"</h1>
                <p id="newsp">This is a random text that you as a user is able to write yourself. At this point we have not yet implementet the function that allows you to write here, but we are working our hardets to make things work! Soon enough you as a user (with ceratin priviledges) will be able to write news that will show up in this section so that your students will be able to read them!<br><br></p>
                <p id="date"></p>
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
</body>
</html>