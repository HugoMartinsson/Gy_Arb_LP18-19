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
?>
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
            <?php 
					
				try
				{
					$user = "%" . $_SESSION['currentuser'] . "%";
					$count = 1;
						
					//HÄMTAR ALLA KURSER SOM ELEVEN DELTAR I
					$sql = "SELECT Name FROM courses WHERE Students LIKE :currentuser";
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(":currentuser", $user);
					$stmt->execute();
					$result = $stmt->fetchAll();
						
					foreach($result as $row)
					{
						$sql = "SELECT * FROM news WHERE course = :course";
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(":course", $row->Name);
						$stmt->execute();
						$result2 = $stmt->fetchAll();
							
						foreach($result2 as $row)
						{
							?>
                               <div id="news">
                               	<h1 id="newsh1"><?php echo $row->headline ?></h1>
								<p id="newsp"><?php echo $row->news ?></p>
								<p id="date"> <?php echo $row->datetime ?></p>
                               </div>
                            <?php
						}
					}
				}
				catch(Exception $e)
				{
					echo $e->getMessage();	
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