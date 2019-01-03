<?php
require("db.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Namnlöst dokument</title>
</head>
<?php
	//SKA ERSÄTTAS MED RIKTIG CURRENTUSER
	$_SESSION['currentuser'] = "huma0130";
	
	//Detta ska vara kvär även när riktig currentuser har implementerats
	$user = "%" . $_SESSION['currentuser'] . "%";
	
	//Hämtar de kurser den inloggade eleven deltar i
	$sql = "SELECT Name FROM courses WHERE Students LIKE :currentuser";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':currentuser', $user);
	$stmt->execute();
	$result = $stmt->fetchAll();
?>

<body>
<form action="" method="get">
	Välj kurs:
	<select name="course">
    	<?php
			foreach($result as $row)
			{
				?>
        	 	<option value="<?php echo $row->Name; ?>"><?php echo $row->Name; ?></option>
            	<?php
			}
			?>
    </select>
    <input type="submit" value="Välj">
</form>
<?php
	if(!empty($_GET))
	{
		$course = $_GET['course'];
		
		$sql = "SELECT HandInName FROM handin WHERE HandInCourse = :course";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":course", $course);
		$stmt->execute();
		$result = $stmt->fetchAll();
	}
	if(!empty($_GET['course']))
	{
?>
	<form action="student_handIn2.php" method="get">
    	<input type="hidden" name="course" value="<?php echo $course ?>">
    	<select name="handin">
        <?php
        	foreach($result as $row)
			{
				?>
        	 	<option value="<?php echo $row->HandInName; ?>"><?php echo $row->HandInName; ?></option>
            	<?php
			}
			?>
        </select>
        <input type="submit" value="Fortsätt">
        </form>
<?php
}
?>
</body>
</html>