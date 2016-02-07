<?
	function showLink($path) {
		print "<a href=\"?go=$path\">$path</a> ";
	}
	function image($name) {
		print "<img src=\"$name.jpg\"\> ";
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet"  type="text/css" href="style.css" />
    <link rel="icon" type="image/png" href="logoaikido.png" />
    <title>AIKIDO SAINT CYR CLUB 78</title>
</head>
<body>
	<div id="header">
		<div id="logostcyr" ><img src="logoaikido.png" height="100px"/></div>
		<div id="logoffaaa" ><img src="ffaaa.png" height="100px"/></div>
		<div > 
			<div id="sitename">Aïkido Saint Cyr Club 78</div>
			<div id="siteabrev">ASCC78</div>
		</div>
	</div>
	<div id="menu">
		<div id="menutitle"><img src="icon-menu.png" height="30px"/></div>
		 <ul>
			<li><? showLink("Accueil"); ?></li>
			<li><? showLink("Historique"); ?></li>
			<li><? showLink("Informations"); ?></li>
			<li><? showLink("Inscription"); ?></li>
			<li><? showLink("Photos"); ?></li>
			<li><? showLink("Video"); ?></li>

		</ul> 
	</div>
	<div id="sidebar">
		<div id="horairetitle"><img src="calendrier.jpeg" height="30px"/></div>
		<div id="sidebarcontent">
			<p class="sidebartitle">Horaires</p>
			<p class="whitetitle">Cours Adultes</p>
			<p class="horaires">Mar: 19h30 21h00</p>
			<p class="horaires">Jeu: 19h30 21h00</p>
			<p class="horaires">Sam: 09h30 12h00</p>
			<p class="whitetitle">Cours Enfants</p>
			<p class="horaires">Mer: 16h45 18h00</p>
			<p class="whitetitle" style="border:1px solid"><a href="?go=Inscription">Bulletin d'Inscription</a></p>
			
			<p class="whitetitle" >Nous contacter</p>
			<p class="horaires"><a href="mailto:aikidostcyr@gmail.com">aikidostcyr@gmail.com</a></p>
		</div>
	</div>
	<div id="document">
		<?
			if ( isset($_REQUEST["go"])) {
				$page = $_REQUEST["go"];
			} else {
				$page = "Accueil";
			}
			require("content/$page.php");
		?>
	</div>
</body>
</html>
