<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Nyheter</title>
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
            	<h2>Nyhet 1</h2><br>
                <p>Spicy jalapeno bacon ipsum dolor amet sunt dolor beef sint, jerky anim lorem ullamco flank. Tail cow ut t-bone pastrami laboris nulla tri-tip anim salami cillum venison rump ut. Corned beef consequat beef ribs pork pig rump voluptate brisket tri-tip porchetta cupidatat sunt spare ribs et. Tenderloin et minim, veniam voluptate eu jerky occaecat irure flank sed laborum kevin esse meatball. Spicy jalapeno bacon ipsum dolor amet sunt dolor beef sint, jerky anim lorem ullamco flank. Tail cow ut t-bone pastrami laboris nulla tri-tip anim salami cillum venison rump ut. Corned beef consequat beef ribs pork pig rump voluptate brisket tri-tip porchetta cupidatat sunt spare ribs et. Tenderloin et minim, veniam voluptate eu jerky occaecat irure flank sed laborum kevin esse meatball. Spicy jalapeno bacon ipsum dolor amet sunt dolor beef sint, jerky anim lorem ullamco flank. Tail cow ut t-bone pastrami laboris nulla tri-tip anim salami cillum venison rump ut. Corned beef consequat beef ribs pork pig rump voluptate brisket tri-tip porchetta cupidatat sunt spare ribs et. Tenderloin et minim, veniam voluptate eu jerky occaecat irure flank sed laborum kevin esse meatball. Spicy jalapeno bacon ipsum dolor amet sunt dolor beef sint, jerky anim lorem ullamco flank. Tail cow ut t-bone pastrami laboris nulla tri-tip anim salami cillum venison rump ut. Corned beef consequat beef ribs pork pig rump voluptate brisket tri-tip porchetta cupidatat sunt spare ribs et. Tenderloin et minim, veniam voluptate eu jerky occaecat irure flank sed laborum kevin esse meatball.</p>
            </div>
            <div id="block">
            	<h2>Nyhet 2</h2><br>
                <p>Spicy jalapeno bacon ipsum dolor amet sunt dolor beef sint, jerky anim lorem ullamco flank. Tail cow ut t-bone pastrami laboris nulla tri-tip anim salami cillum venison rump ut. Corned beef consequat beef ribs pork pig rump voluptate brisket tri-tip porchetta cupidatat sunt spare ribs et. Tenderloin et minim, veniam voluptate eu jerky occaecat irure flank sed laborum kevin esse meatball. Spicy jalapeno bacon ipsum dolor amet sunt dolor beef sint, jerky anim lorem ullamco flank. Tail cow ut t-bone pastrami laboris nulla tri-tip anim salami cillum venison rump ut. Corned beef consequat beef ribs pork pig rump voluptate brisket tri-tip porchetta cupidatat sunt spare ribs et. Tenderloin et minim, veniam voluptate eu jerky occaecat irure flank sed laborum kevin esse meatball. Spicy jalapeno bacon ipsum dolor amet sunt dolor beef sint, jerky anim lorem ullamco flank. Tail cow ut t-bone pastrami laboris nulla tri-tip anim salami cillum venison rump ut. Corned beef consequat beef ribs pork pig rump voluptate brisket tri-tip porchetta cupidatat sunt spare ribs et. Tenderloin et minim, veniam voluptate eu jerky occaecat irure flank sed laborum kevin esse meatball. Spicy jalapeno bacon ipsum dolor amet sunt dolor beef sint, jerky anim lorem ullamco flank. Tail cow ut t-bone pastrami laboris nulla tri-tip anim salami cillum venison rump ut. Corned beef consequat beef ribs pork pig rump voluptate brisket tri-tip porchetta cupidatat sunt spare ribs et. Tenderloin et minim, veniam voluptate eu jerky occaecat irure flank sed laborum kevin esse meatball.</p>
            </div>
            <div id="block_news_add">
                <form action="" method="get">
                    <input id="headline" type="text" name="headline" placeholder="Rubrik"><br>
                    <textarea type="text" name="text" placeholder="Innehåll"></textarea><br>
                    <input type="submit" value="Publicera">
                </form>
                
                <?php
				if(!empty($_GET['headline']) && !empty($_GET['text']))
				{
					$headline = $_GET['headline'];
					$text = $_GET['text'];
					//Fortsätta
				}
				?>
            </div>
        </section>
    </div>
</body>
</html>
