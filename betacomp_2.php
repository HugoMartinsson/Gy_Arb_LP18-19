<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Kurser/Klassrum</title>
<link rel="stylesheet" href="betacomp_styler.css" type="text/css">
</head>

<body>
	<div id="wrapper">
        <header>
            <h1>Logga + Namn</h1>
        </header>
        <aside>
            <nav>
                <a href="betacomp_1.php"><button><p id="link">Hem</p></button></a>
                <a href="betacomp_2.php"><button><p id="link">Kurser/klassrum</p></button></a>
                <a href="betacomp_3.php"><button><p id="link">Länksamling</p></button></a>
                <a href="betacomp_4.php"><button><p id="link">Inlämningar</p></button></a>
                <a href="betacomp_5.php"><button><p id="link">Konto</p></button></a>
            </nav>
        </aside>
        <section>
        	<div id="block_course_add">
            	<form action="" method="get">
                	<input type="text" name="name" placeholder="Kursnamn">
                    <input type="text" name="teacher" placeholder="Lärare">
                    <input type="submit" value="Lägg till kurs">
                </form>
                <?php
				if(!empty($_GET['name']) && !empty($_GET['teacher']))
				{
					$name = $_GET['name'];
					$text = $_GET['teacher'];
					//Fortsätta
				}
				?>
            </div>
            <div id="block_course">
            	<a href=""><p>Engelska 7</p></a><br>
                <a href=""><p>Matematik 4</p></a><br>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
                <a href=""><p>Exempel</p></a><br>
            </div>
            
        </section>
    </div>
</body>
</html>
