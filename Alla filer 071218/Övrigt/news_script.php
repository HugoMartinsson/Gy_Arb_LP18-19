<?php
session_start();
require("db.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Namnlöst dokument</title>
</head>

<?php
	//ENDAST FÖR TEST
	//Denna ska sen ersättas med "Currentuser" variablen, vem som är inloggad. 
	$_SESSION['currentuser'] = "Henrik";
	
	$sql = "SELECT Type FROM users WHERE Name = :currentuser";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(":currentuser", $_SESSION['currentuser']);
	$stmt->execute();
	$result2 = $stmt->fetchAll();
	
	foreach($result2 as $row2)
	{
		$type = $row2->Type;
	}
	
	if($type == "teacher")
	{
		//Hämtar alla kurser som den inloggade läraren undervisar i. 
		$sql = "SELECT Name FROM courses WHERE Teacher = :currentuser";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":currentuser", $_SESSION['currentuser']);
		$stmt->execute();
		$result = $stmt->fetchAll();
?>
<body>
	<form action="" method="post">
    	Rubrik: <input type="text" name="headline">
        Nyhet: <input type="text" name="news">
        Kurs: 	<select name="course">
        	<?php
			//Skriver ut kurserna den hämtat så läraren får välja i vilket kurs nyheten ska publiceras. 
			foreach($result as $row)
			{
				?>
        	 	<option value="<?php echo $row->Name; ?>"><?php echo $row->Name; ?></option>
            	<?php
			}
			?>
        </select>
        <input type="submit">
        </form>
<?php
if(!empty($_POST))
{
	//Hämtar infon ang nyheten från GET.
	$headline = $_POST['headline'];
	$news = $_POST['news'];
	$course = $_POST['course'];
	
	//Placerar nyheten i databasen
	$sql = "INSERT INTO news (news, headline, course, datetime) values (:news, :headline, :course, Now())";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(":news", $news);
	$stmt->bindParam(":headline", $headline);
	$stmt->bindParam(":course", $course);
	$stmt->execute();
}
	//Skriver ut alla nyheter som finns.
	//ENDAST FÖR TEST
	//ENDAST FÖR TEST
	$sql = "SELECT * FROM news order by datetime";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();
		
	foreach($result as $row)
	{
		?>
        <p>
            Headline: <?php echo $row->headline; ?> -- News: <?php echo $row->news; ?> -- course: <?php echo $row->course; ?>
        </p>
        <?php
	}
	}
?>
</body>
</html>