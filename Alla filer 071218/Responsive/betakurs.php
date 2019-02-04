<?php
require("db.php");
session_start();
$course = $_GET['course'];
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
                        <a href="inlamning.php">Inlämningar</a>
                        <a href="http://www.novasoftware.se/webviewer/(S(kfzct0fzd3s4iy55e3xyz345))/design1.aspx?schoolid=53520">Schema</a>
                        <a href="mittkonto.php">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section>
        	<div id="navincourse">
            	<a id="navincourselink" href=<?php echo "material.php?course=" . $course ?>>Material</a>
                <a class="navincourseon" href=<?php echo "betakurs.php?course=" . $course ?>><?php echo $course ?></a>
                <a id="navincourselink" href=<?php echo "inlamningikurs.php?course=" . $course ?>>Inlämning</a>
            </div>			
            <div id="news">
                <?php
				try
				{
					$sql = "SELECT * FROM news WHERE course = :course ORDER BY datetime DESC";
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(":course", $course);
					$stmt->execute();
					$result = $stmt->fetchAll();
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
					
				foreach($result as $row)
				{
					?> <h1 id="newsh1"><?php echo $row->headline; ?></h1>
                    <p id="newsp"><?php echo $row->news; ?><br><br></p>
               	 	<p id="date"> <?php echo $row->datetime; ?></p><?php
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
</body>
</html>