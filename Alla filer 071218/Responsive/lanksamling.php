<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Länksamling</title>
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
                        <a href="http://www.novasoftware.se/webviewer/(S(kfzct0fzd3s4iy55e3xyz345))/design1.aspx?schoolid=53520">Schema</a>
                        <a href="mittkonto.php">Mitt Konto</a>
                    </div>
             </div>
        </nav>
        <section>
            	<a id="lanksamlinga" href="https://www.inlasningstjanst.se/bibliotek/#/bokhyllan">Inläsningstjänst</a>
                <a id="lanksamlinga" href="https://www.ne.se">NE</a>
                <a id="lanksamlinga" href="https://onedrive.live.com/?authkey=%21ADf60_BzaaEZbqw&cid=F406DF85EF25B27E&id=F406DF85EF25B27E%2114521&parId=F406DF85EF25B27E%2114400&action=locate">Logger Pro</a>
                
                <a id="lanksamlinga" href="">Provvakt - Matematik</p></a>
                <!-- Går inte att få fram länken från vklass -->
                
                <a id="lanksamlinga" href="">Provvakt - Word</a>
                <!-- Går inte att få fram länken från vklass -->
                
                <a id="lanksamlinga" href="">Provvakt - Wordpad</a>
                <!-- Går inte att få fram länken från vklass -->
                
                <a id="lanksamlinga" href="https://education.ti.com/en/software/details/en/62263B036C1641C3B6CF1C4F18FE84DA/ti-nspirecxcas_pc_update">TI-Nspire</a>
                <a id="lanksamlinga" href="https://www.alex.se">Alex</a>
                <a id="lanksamlinga" href="">ArtikelSök</a>
                <!-- Blev redirectad till fronter med länken på vklass -->
                
                <a id="lanksamlinga" href="https://digitalpedagogik.se">Digital Pedagogik</a>
                <a id="lanksamlinga" href="">Digitala Lärresurser</a>
                <!-- Går inte att få fram länken från vklass -->
                
                <a id="lanksamlinga" href="http://galeapps.galegroup.com/apps/auth/vasterh?cause=http%3A%2F%2Ffind.galegroup.com%2Fmenu%2Fcommonmenu.do%3FuserGroupName%3Dv">Global Issues in context</a>
                <a id="lanksamlinga" href="https://skovde.inspera.com">Inspera - elever</a>
                <a id="lanksamlinga" href="https://www.ui.se/landguiden">Landguiden</a>               
                <a id="lanksamlinga" href="https://www.retriever-info.com/?e=3">Retriever</a>
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