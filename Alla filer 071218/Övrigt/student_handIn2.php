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
	//OBS SKA ERSÄTTAS
	$_SESSION['currentuser'] = "huma0130";
	$handInName = $_GET['handin'];
	$course = $_GET['course'];
	?>
	<form action="" method="post" enctype="multipart/form-data">
    	<input type="file" name="myfile" id="fileToUpload">
        <input type="submit" value="Lämna in fil" name="submit">
    </form>
<?php
if(!empty($_POST))
	{
		$sql2 = "SELECT MAX(FileID) AS MaxFileID FROM studentfiles";
		$sql2 = "SELECT FileID FROM studentfiles order by FileID";
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
		$fileName = $FileID . "." . $handInName .  "_" .  $_FILES['myfile']['name'];
		$fileTmpName  = $_FILES['myfile']['tmp_name'];
		$fileType = $_FILES['myfile']['type'];
		
		//Add file to database
		$sql = "INSERT INTO studentfiles (FileName, FileFolder, FileCourse, FileHandInName, Uploader) VALUES (:fileName, :uploadDirectory, :course, :FileHandinName, :uploader)";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":fileName", $fileName);
		$stmt->bindParam(":uploadDirectory", $uploadDirectory);
		$stmt->bindParam(":course", $course);
		$stmt->bindParam(":FileHandinName", $handInName);
		$stmt->bindParam(":uploader", $_SESSION['currentuser']);
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