<?php 
session_start();
require("db.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Start</title>
<link rel="stylesheet" href="styler.css" type="text/css">
</head>
<body>
<?php
	$_SESSION['currentuser'] = "Huma0130";
	
	//Kan tas bort mot slutet men låt ligga kvar nu
	/*$sql = "SELECT Password FROM users WHERE Username = :username";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(":username", $username);
	$stmt->execute();
	$result = $stmt->fetchAll();*/
	
	
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
		echo "Welcome " . $_SESSION['currentuser'];
		*/?>
        <div id="wrapper">
    	<header>
        	<h1 id="headerlogoh1">"LOGGA"</h1>
        </header>
        <nav>
        	<div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="start.php">Hem</a>
                        <a href="kurser_overview_KLAR.php">Kurser/Klassrum</a>
                        <a href="lanksamling.php">Länksamlingar</a>
                        <a href="inlamning.php">Inlämningar</a>
                        <a href="http://www.novasoftware.se/webviewer/(S(kfzct0fzd3s4iy55e3xyz345))/design1.aspx?schoolid=53520">Schema</a>
                        <a href="mittkonto.php">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section>
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