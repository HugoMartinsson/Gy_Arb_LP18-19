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
<link rel="stylesheet" href="betacomp_styler.css" type="text/css">
</head>

<body>
	<div id="wrapper">
        <header>
            <h1>Logga + Namn</h1>
        </header>
        <aside>
            <nav>
                <a href="betacomp_1.php"><button><p id="link">Hem</p></button></a>
                <a href="betacomp_2.php"><button><p id="link">Kurser/klassrum</p></button></a>
                <a href="betacomp_3.php"><button><p id="link">Länksamling</p></button></a>
                <a href="betacomp_4.php"><button><p id="link">Inlämningar</p></button></a>
                <a href="betacomp_5.php"><button><p id="link">Konto</p></button></a>
            </nav>
        </aside>
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
						?><a href="<?php echo 'betakurs.php?coursename=' . $row->Name?>"><p><?php echo $row->Name; ?></p></a><br><?php
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
						?><a href="<?php echo 'betakurs.php?coursename=' . $row->Name?>"><p><?php echo $row->Name; ?></p></a><br><?php
                    }
				}
				?>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
            </div>
            
        </section>
    </div>
</body>
</html>
