<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Inlämningar</title>
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
        	<div id="block">
                <form action="" method="get">
                    <select name="course">
                    	<option>Kurs</option>
                        <option>Kurs 1</option>
                        <option>Kurs 2</option>
                        <option>Kurs 3</option>
                        <option>Kurs 4</option>
                        <?php //Kurs 1-4 är bara exempel. Första är bara där som en placeholder ?>
                    </select>
                    <select name="hand-in">
                    	<option>Uppgift</option>
                        <option>Uppgift 1</option>
                        <option>Uppgift 2</option>
                        <option>Uppgift 3</option>
                        <option>Uppgift 4</option>
                        <?php //Uppgift 1-4 är bara exempel. Första är bara där som en placeholder ?>
                    </select>
                    <input type="file" name="file"><br>
                    <input type="text" name="headline_hand-in" placeholder="Rubrik"><br>
                    <textarea id="comment" type="text" name="content_hand-in" placeholder="Kommentarer"></textarea><br>
                    <input type="submit" value="Lämna in">
                    <?php //Lägga till resten så man kan lämna in filer ?>
                </form>
            </div>
        </section>
    </div>
</body>
</html>