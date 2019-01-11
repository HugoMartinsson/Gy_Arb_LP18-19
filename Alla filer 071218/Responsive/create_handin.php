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
<title>Namnlöst dokument</title>
</head>

<body>
<form action="" method="get">	
	<select name="course">
        	<?php
			//Skriver ut alla kurser så läraren får välja vart filen ska publiceras
			foreach($result as $row)
			{
				?>
        	 	<option value="<?php echo $row->Name; ?>"><?php echo $row->Name; ?></option>
            	<?php
			}
			?>
    </select>
    <p>Namn på inlämningen</p>
	<input type="text" name="handInName">
    <input type="submit">
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
</body>
</html>