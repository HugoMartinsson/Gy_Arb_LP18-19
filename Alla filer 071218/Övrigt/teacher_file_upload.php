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

<body>
	<?php
	//OBS, SKA SKICKAS MED NÄR LÄRARE SKAPAR INLÄMNING
	$handInName = "PHP_MYSQL_LAB";
	//OBS, SKA ERSÄTTAS MED RIKTIG "CURRENTUSER"
	$_SESSION['currentuser'] = "Henrik";
	
		//Hämtar alla kurser som den inloggade läraren undervisar i. 
		$sql = "SELECT Name FROM courses WHERE Teacher = :currentuser";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":currentuser", $_SESSION['currentuser']);
		$stmt->execute();
		$result = $stmt->fetchAll();
		?>
        
	<form action="" method="post" enctype="multipart/form-data">
    	<input type="file" name="myfile" id="fileToUpload">
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
        <input type="submit" value="Ladda upp fil" name="submit">
	</form>
    

	<?php
	if(!empty($_POST))
	{
		$sql2 = "SELECT MAX(FileID) AS MaxFileID FROM teacherfiles";
		$sql2 = "SELECT FileID FROM teacherfiles order by FileID";
		$stmt = $dbh->prepare($sql2);
		$stmt->execute();
		$result = $stmt->fetchAll();
		
		//SER TILL SÅ ATT FILEN FÅR SAMMA ID I FILNAMNET SOM FileID så att man kan identifiera filer med samma namn ändå
		foreach($result as $row)
		{
			$FileID = $row->FileID;
		}
		$FileID = $FileID + 1;
		$FileNameToShow = $_FILES['myfile']['name'];
		
		//FILE UPLOAD
		$currentDir = getcwd();
		$uploadDirectory = "/Uploaded_Files/";
		$fileName = $FileID . "." . $_POST['course'] .  "_" .  $_FILES['myfile']['name'];
		$fileTmpName  = $_FILES['myfile']['tmp_name'];
		$fileType = $_FILES['myfile']['type'];
		
		//Add file to database
		$sql = "INSERT INTO teacherfiles (Filename, Filefolder, Filecourse, FileHandinName, Uploader) VALUES (:fileName, :uploadDirectory, :course, :FileHandinName, :uploader)";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":fileName", $fileName);
		$stmt->bindParam(":uploadDirectory", $uploadDirectory);
		$stmt->bindParam(":course", $_POST['course']);
		$stmt->bindParam(":uploader", $_SESSION['currentuser']);
		$stmt->bindParam(":FileHandinName", $handInName);
		$stmt->execute();
		
		
		$uploadPath = $currentDir . $uploadDirectory . basename($fileName);
	
		if (isset($_POST['submit']))
		{
			if (empty($errors))
			{
				$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
			}
			if ($didUpload)
			{
				 echo "The file " . $FileNameToShow . " has been uploaded";
			} 
			else
			{
				 echo "An error occurred somewhere. Try again or contact the admin";
			}
		}
	}
	
?>

</body>

</html>