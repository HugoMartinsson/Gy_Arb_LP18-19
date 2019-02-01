<?php
require("db.php");
session_start();

$_SESSION['currentuser'] = "huma0130";
	
$sql = "SELECT Type FROM users where Username = :currentuser";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(":currentuser", $_SESSION['currentuser']);
$stmt->execute();
$result = $stmt->fetchAll();
	
foreach($result as $row)
{
	$currentusertype = $row->Type;
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
                        <a href="kurser_overview_KLAR.php">Kurser/Klassrum</a>
                        <a href="lanksamling.php">Länksamlingar</a>
                        <a href="inlamning.php">Inlämningar</a>
                        <a href="http://www.novasoftware.se/webviewer/(S(kfzct0fzd3s4iy55e3xyz345))/design1.aspx?schoolid=53520">Schema</a>
                        <a href="mittkonto.php">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section>
        	<?php
			if($currentusertype == "student")
			{
				//SKA VARA KVAR ÄVEN NÄR CURRENTUSER ÄR IMPLEMENTERAD
				$user = "%" . $_SESSION['currentuser'] . "%";
					
				//HÄMTAR ALLA KURSER SOM ELEVEN DELTAR I
				$sql = "SELECT Name FROM courses WHERE Students LIKE :currentuser";
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(":currentuser", $user);
				$stmt->execute();
				$result2 = $stmt->fetchAll();
					
				foreach($result2 as $row)
				{
					?><a id="linktocourse" href="<?php echo 'betakurs.php?course=' . $row->Name?>"><p><?php echo $row->Name; ?></p></a><?php
                }
			}
			if($currentusertype == 'teacher')
			{
					
				//Hämtar alla kurser som läraren undervisar i
				$sql = "SELECT Name FROM courses WHERE Teacher = :currentuser";
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(":currentuser", $_SESSION['currentuser']);
				$stmt->execute();
				$result2 = $stmt->fetchAll();
					
				foreach($result2 as $row)
				{
					?><a id="linktocourse" href="<?php echo 'betakurs.php?course=' . $row->Name?>"><p><?php echo $row->Name; ?></p></a><br><?php
                }
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
