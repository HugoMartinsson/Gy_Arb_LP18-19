<?php
require("db.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Kurser</title>
<link rel="stylesheet" href="betamobilecss_1.0.1.css" type="text/css">
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
                        <a href="dropdowncontent">Hem</a>
                        <a href="dropdowncontent">Kurser/Klassrum</a>
                        <a href="dropdowncontent">Länksamlingar</a>
                        <a href="dropdowncontent">Inlämningar</a>
                        <a href="dropdowncontent">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section>
        	<div id="navincourse">
            	<a href="link">Material</a>
                <a href="link">Till kurs</a>
                <a href="link">Inlämning</a>
            </div>
            <?php
				$coursename = $_GET['coursename'];
				
				?><h1 id="newsh1"><?php echo $coursename ?></h1>
			
            <div id="news">
            	<div id="news">
                <?php
					$sql = "SELECT * FROM news WHERE course = :coursename ORDER BY datetime DESC";
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(":coursename", $coursename);
					$stmt->execute();
					$result = $stmt->fetchAll();
					
					foreach($result as $row)
					{
						?> <h1 id="newsh1"><?php echo $row->headline; ?></h1>
                        <p id="newsp"><?php echo $row->news; ?><br><br></p>
               	 		<p id="date"> <?php echo $row->datetime; ?></p><?php
					}
				?>
            	<h1 id="newsh1">"You decide"</h1>
                <p id="newsp">This is a random text that you as a user is able to write yourself. At this point we have not yet implementet the function that allows you to write here, but we are working our hardets to make things work! Soon enough you as a user (with ceratin priviledges) will be able to write news that will show up in this section so that your students will be able to read them!<br><br></p>
                <p id="date"></p>
            </div>
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