<?php
require("db.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ladda upp filer</title>
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
                        <a href="http://www.novasoftware.se/webviewer/(S(kfzct0fzd3s4iy55e3xyz345))/design1.aspx?schoolid=53520">Schema</a>
                        <a href="mittkonto.php">Mitt Konto</a>
                        <a href="create_handin.php">Skapa inlämning</a>
                        <a href="teacher_file_upload.php">Ladda upp fil</a>
                        <a href="logout.php">Logga ut</a>
                    </div>
             </div>
        </nav>
        <section>
        	<?php
			//OBS, SKA SKICKAS MED NÄR LÄRARE SKAPAR INLÄMNING
			$handInName = "PHP_MYSQL_LAB";
			//OBS, SKA ERSÄTTAS MED RIKTIG "CURRENTUSER"
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
				
			<form action="" method="post" enctype="multipart/form-data">
				<input type="file" name="myfile" id="fileToUpload"><br>
				<select name="course">
                	<option value="" disabled selected>Kurs</option>
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
				try
				{
					$sql2 = "SELECT MAX(FileID) AS MaxFileID FROM teacherfiles";
					$sql2 = "SELECT FileID FROM teacherfiles order by FileID";
					$stmt = $dbh->prepare($sql2);
					$stmt->execute();
					$result = $stmt->fetchAll();
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
				
				//SER TILL SÅ ATT FILEN FÅR SAMMA ID I FILNAMNET SOM FileID så att man kan identifiera filer med samma namn ändå
				foreach($result as $row)
				{
					$FileID = $row->FileID;
				}
				$FileID = $FileID + 1;
				$FileNameToShow = $_FILES['myfile']['name'];
				
				try
				{
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
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
				
				
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
                         <form action="teacher_file_upload.php">
                            <input type="submit" value="Tillbaka">
                         </form>
                         <?php
					}
				}
			}
			?>
        </section>
    </div>
    <?php
			if(isset($_SESSION['currentuser']))
			{
				$sql = "SELECT Backgroundid FROM users WHERE Username = :username";
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(':username', $_SESSION['currentuser']);
				$stmt->execute();
				$res = $stmt->fetchAll();
				
				foreach($res as $row)
				{
					$_SESSION['bgid'] = $row->Backgroundid;
				}
				
				if(empty($_SESSION['bgid']) or $_SESSION['bgid'] == 0)
				{
					$_SESSION['bgid'] = 2;
				}	
				
				if($_SESSION['bgid'] == 1)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_1.jpg')";}
						else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_1.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 2)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_2.jpg')";}
						else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_2.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 3)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_3.jpg')";}
						else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_3.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 4)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_4.jpg')";}
						else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_4.jpg')";}
                        </script><?php
					}
                    else if($_SESSION['bgid'] == 5)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_5.jpg')";}
						else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_5.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 6)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_6.jpg')";}
						else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_6.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 7)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_7.jpg')";}
						else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_7.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 8)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_8.jpg')";}
						else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_8.jpg')";}
                        </script><?php
					}
					else if($_SESSION['bgid'] == 9)
					{
						?><script type="text/javascript">
						if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_9.jpg')";}
						else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_9.jpg')";}
                        </script><?php
					}
			}
			?>
</body>
</html>