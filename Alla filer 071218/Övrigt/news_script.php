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
	//Hämtar alla kurser som den inloggade läraren undervisar i. 
	$sql = "SELECT Name FROM courses WHERE Teacher = :currentuser";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(":currentuser", $_SESSION['currentuser']);
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	
	foreach($result as $row)
	{
		$coursename = $row->Name;
	}
?>
<body>
	<form action="" method="get">
    	Rubrik: <input type="text" name="headline">
        Nyhet: <input type="text" name="news">
        Kurs: 	<select name="course">
			
        	<?php
			//Skriver ut kurserna den hämtat så läraren får välja i vilket kurs nyheten ska publiceras. 
			foreach($result as $row)
			{
				?>
        	 	<option value="<?php echo $coursename = $row->Name; ?>"><?php echo $coursename = $row->Name;?></option>
            	<?php
			}
			?>
        </select>
        </form>
<?php
	$headline = $_GET['headline'];
	$news = $_GET['news'];
	$course = $_GET['course'];
        
	$sql = "INSERT INTO news (headlin ,news, course) values (:news, :headline, :course)";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(":news", $news);
	$stmt->bindParam(":headline", $headline);
	$stmt->bindParam(":course", $news);
	

</body>
</html>