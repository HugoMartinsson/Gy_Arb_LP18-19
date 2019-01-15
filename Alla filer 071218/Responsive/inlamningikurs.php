<?php
require("db.php");
session_start();
$coursename = $_GET['coursename'];
?>
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
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Material</title>
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
                        <a href="mittkonto.php">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section>
        	<div id="navincourse">
            	<a id="navincourselink" href=<?php echo "material.php?coursename=" . $coursename ?>>Material</a>
                <a id="navincourselink" href=<?php echo "betakurs.php?coursename=" . $coursename ?>>Till kurs</a>
                <a class="navincourseon" href=<?php echo "inlamningikurs.php?coursename=" . $coursename ?>>Inlämning</a>
            </div>
            <div id="news">
                    <?php
							if(!empty($_GET))
							{
								
								
								$sql = "SELECT HandInName FROM handin WHERE HandInCourse = :course";
								$stmt = $dbh->prepare($sql);
								$stmt->bindParam(":course", $coursename);
								$stmt->execute();
								$result = $stmt->fetchAll();
							}
							if(!empty($coursename))
							{
					?>
								<form action="" method="get">
									<input type="hidden" name="coursename" value="<?php echo $coursename ?>">
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
						if(!empty($_GET['handin']) && !empty($_GET['coursename']))
						{
							$handInName = $_GET['handin'];
							$coursename = $_GET['coursename'];
							?>
							<form action="" method="post" enctype="multipart/form-data">
								<input type="file" name="myfile" id="fileToUpload">
								<input type="submit" value="Lämna in fil" name="submit">
							</form> <?php
                        }

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
			$stmt->bindParam(":course", $coursename);
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
					 
					 ?>
                     <form action="<?php echo "inlamningikurs.php?coursename=" . $coursename; ?>" method="get">
                     	<input type="submit" value="Tillbaka">
                     </form>
                     <?php
				}
			}
		}
?>
            </div>
        </section>
	</div>
    <script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
    		document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
  			if (!event.target.matches('.dropbtn')) {

  		    var dropdowns = document.getElementsByClassName("dropdown-content");
    		var i;
    		for (i = 0; i < dropdowns.length; i++) {
     		var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  	}
		}
</script>
</body>
</html>