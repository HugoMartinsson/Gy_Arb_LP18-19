<?php
require("db.php");
session_start();

		$_SESSION['currentuser'] = "Henrik";
		
		try
		{
			//Hämtar alla kurser som den inloggade läraren undervisar i. 
			$sql = "SELECT Name FROM courses WHERE Teacher = :currentuser";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(":currentuser", $_SESSION['currentuser']);
			$stmt->execute();
			$result = $stmt->fetchAll();
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
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
        	<div id="createhandindiv">
				<form action="" method="get">
					<select name="course">
                    	<option value="" disabled selected>Välj kurs</option>
        				<?php
						//Skriver ut alla kurser så läraren får välja vart filen ska publiceras
						foreach($result as $row)
						{
							?>
        	 					<option id="inputoptions" value="<?php echo $row->Name; ?>"><?php echo $row->Name; ?></option>
            				<?php
						}
						?>
    				</select><br>
				<input id="inputhandin" type="text" name="handInName" placeholder="Namn på inlämningen"><br>
    			<input id="inputhandin" type="submit" value="Skapa">
				</form>
				<?php
					if(empty($_GET['handInName']) && !empty($_GET))
					{
						echo "Var vänlig skriv ett namn och försök igen";
					}
					
					if(!empty($_GET['handInName']))
					{
						$course = $_GET['course'];
						$handInName = $_GET['handInName'];
						
						try
						{
							$sql = "INSERT INTO handin (HandInName, HandInCourse) VALUES (:handinname, :handincourse)";
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(":handinname", $handInName);
							$stmt->bindParam(":handincourse", $course);
							$stmt->execute();
						}
						catch(Exception $e)
						{
							echo $e->getMessage();
						}
					}
				?>
    		</div>
		</section>
    </div>
</body>
</html>