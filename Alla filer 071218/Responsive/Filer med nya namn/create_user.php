<?php
require("db.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Skapa användare</title>
</head>
<body>
    <form action="" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
        Verify password: <input type="text" name="passwordcheck"><br>
        Name: <input type="text" name="name"><br>
        <select name="type">
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
        </select>
        <input type="submit">
    </form>
    <?php
    if(!empty($_POST))
    {
        $password = $_POST['password'];
        $passwordcheck = $_POST['passwordcheck'];
        $username = $_POST['username'];
        $name = $_POST['name'];
        $type = $_POST['type'];
            
        $sql = "SELECT Username FROM users WHERE Username = :username";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetchAll();
            
        if(empty($result))
        {
            if($password == $passwordcheck)
            {
                $hashed_password =  password_hash($password, PASSWORD_DEFAULT);
                    
                $sql = "INSERT INTO users (Username, Password, Name, Type) VALUES (:username, :password, :name, :type)";
                $stmt =  $dbh->prepare($sql);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $hashed_password);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":type", $type);
                $stmt->execute();
                    
                echo "Användaren ahr skapats.";
				?>
                <script>
                    window.history.pushState({}, document.title, "/" + "php/create_user.php");
                </script>
                <?php
            }
            else if($password != $passwordcheck)
            {
                echo "Lösenorden överensstämmer ej!";
            }
            else
            {
                echo "Ett fel inträffade, försök igen!";
            }
        }	
    }
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
            ?>
            <script type="text/javascript">
                if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_1.jpg')";}
                else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_1.jpg')";}
            </script>
            <?php
        }
        else if($_SESSION['bgid'] == 2)
        {
            ?>
            <script type="text/javascript">
                if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_2.jpg')";}
                else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_2.jpg')";}
            </script>
            <?php
        }
        else if($_SESSION['bgid'] == 3)
        {
            ?>
            <script type="text/javascript">
                if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_3.jpg')";}
                else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_3.jpg')";}
            </script>
            <?php
        }
        else if($_SESSION['bgid'] == 4)
        {
            ?>
            <script type="text/javascript">
                if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_4.jpg')";}
                else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_4.jpg')";}
            </script>
            <?php
        }
        else if($_SESSION['bgid'] == 5)
        {
            ?>
            <script type="text/javascript">
                if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_5.jpg')";}
                else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_5.jpg')";}
            </script>
            <?php
        }
        else if($_SESSION['bgid'] == 6)
        {
            ?>
            <script type="text/javascript">
                if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_6.jpg')";}
                else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_6.jpg')";}
            </script>
            <?php
        }
        else if($_SESSION['bgid'] == 7)
        {
            ?>
            <script type="text/javascript">
                if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_7.jpg')";}
                else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_7.jpg')";}
            </script>
            <?php
        }
        else if($_SESSION['bgid'] == 8)
        {
            ?>
            <script type="text/javascript">
                if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_8.jpg')";}
                else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_8.jpg')";}
            </script>
            <?php
        }
        else if($_SESSION['bgid'] == 9)
        {
            ?>
            <script type="text/javascript">
                if(window.innerWidth < 480){document.body.style.backgroundImage = "url('img/Backgrounds_mobile/Mobile_9.jpg')";}
                else if(window.innerWidth > 480){document.body.style.backgroundImage = "url('img/Backgrounds_desktop/Desktop_9.jpg')";}
            </script>
            <?php
        }
    }
    ?>
</body>
</html>