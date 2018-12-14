<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Kurser</title>
<link rel="stylesheet" href="betamobilecss_1.0.1.css" type="text/css">
</head>

<body>
	<div id="wrapper">
    	<header>
        	<h1 id="headerlogoh1">"LOGGA"</h1>
        </header>
        <nav>
        	<div class="dropdown">
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
        <section id="sectioncourse">
        	<nav id="navincourse">
            	<div id="divlinkincourse">
            		<a href="linkincourse">Material</a>
                </div>
                <div id="divlinkincourse">
                	<a href="linkincourse">Till kurs</a>
                </div>
                <div id="divlinkincourse">
                	<a href="linkincourse">Inlämning</a>
                </div>
            </nav>
            <div id="news">
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