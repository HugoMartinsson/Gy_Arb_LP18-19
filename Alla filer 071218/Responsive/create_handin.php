<?php
require("db.php");
session_start();

		$_SESSION['currentuser'] = "Henrik";
		
		//Hämtar alla kurser som den inloggade läraren undervisar i. 
		$sql = "SELECT Name FROM courses WHERE Teacher = :currentuser";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":currentuser", $_SESSION['currentuser']);
		$stmt->execute();
		$result = $stmt->fetchAll();
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
                        <a href="dropdowncontent">Länksamlingar</a>
                        <a href="inlamning.php">Inlämningar</a>
                        <a href="mittkonto.php">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section>
        	<div id="createhandindiv">
				<form action="" method="get">
                	<p id="hanndinp">Välj kurs</p>	
					<select name="course">
        				<?php
						//Skriver ut alla kurser så läraren får välja vart filen ska publiceras
						foreach($result as $row)
						{
							?>
        	 					<option id="inputoptions" value="<?php echo $row->Name; ?>"><?php echo $row->Name; ?></option>
            				<?php
						}
						?>
    			</select>
    			<p id="hanndinp">Namn på inlämningen</p>
				<input id="inputhandin" type="text" name="handInName"><br>
    			<input id="inputhandin" type="submit" value="Skapa">
				</form>
				<?php 
					if(!empty($_GET))
					{
						$course = $_GET['course'];
						$handInName = $_GET['handInName'];
		
						$sql = "INSERT INTO handin (HandInName, HandInCourse) VALUES (:handinname, :handincourse)";
						$stmt = $dbh->prepare($sql);
						$stmt->bindParam(":handinname", $handInName);
						$stmt->bindParam(":handincourse", $course);
						$stmt->execute();
					}
				?>
    	</div>
	</section>
</body>
</html>