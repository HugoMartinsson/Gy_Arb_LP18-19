<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Material</title>
<link rel="stylesheet" href="betamobilecss_1.0.1.css" type="text/css">
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
                        <a href="dropdowncontent">Hem</a>
                        <a href="dropdowncontent">Kurser/Klassrum</a>
                        <a href="dropdowncontent">Länksamlingar</a>
                        <a href="dropdowncontent">Inlämningar</a>
                        <a href="dropdowncontent">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section>
        	<div id="navincourse">
            	<a class="navincourseon" href="link">Material</a>
                <a id="navincourselink" href="link">Till kurs</a>
                <a id="navincourselink" href="link">Inlämning</a>
            </div>
            <div id="news">
            	<div id="news">
            	<h1 id="newsh1">"You decide"</h1>
                <p id="newsp">VET EJ VILKEN CONTENT VI WSKALL HA HÄR!<br><br></p>
                <p id="date"></p>
            </div>
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