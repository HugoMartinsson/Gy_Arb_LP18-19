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
                        <a href="dropdowncontent">Länksamlingar</a>
                        <a href="inlamning.php">Inlämningar</a>
                        <a href="mittkonto.php">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section>
        <?php
		//DEHÄR SKIPPAR VI ÄN SÅ LÄNGE, OM VI HAR TID ÖVER KAN VI BÖRJA TITTA PÅ DETTA
		/*
		?>
        	<div id="block_course_add">
            	<form action="" method="get">
                	<input type="text" name="name" placeholder="Kursnamn">
                    <input type="text" name="teacher" placeholder="Lärare">
                    <input type="submit" value="Lägg till kurs">
                </form>
				<?php*/
				?>
                <?php
				if(!empty($_GET['name']) && !empty($_GET['teacher']) && $currentusertype == 'teacher')
				{
					$name = $_GET['name'];
					$text = $_GET['teacher'];
					//Fortsätta
				}
				?>
            
            <div id="block_course">
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
						?><a id="linktocourse" href="<?php echo 'betakurs.php?coursename=' . $row->Name?>"><p><?php echo $row->Name; ?></p></a><br><?php
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
						?><a id="linktocourse" href="<?php echo 'betakurs.php?coursename=' . $row->Name?>"><p><?php echo $row->Name; ?></p></a><br><?php
                    }
				}
				?>
                <a id="linktocourse" href=""><p>Exempel</p></a><br>
                <a id="linktocourse" href=""><p>Exempel</p></a><br>
                <a id="linktocourse" href=""><p>Exempel</p></a><br>
                <a id="linktocourse" href=""><p>Exempel</p></a><br>
                <a id="linktocourse" href=""><p>Exempel</p></a><br>
                <a id="linktocourse" href=""><p>Exempel</p></a><br>
            </div>
            
        </section>
    </div>
</body>
</html>
