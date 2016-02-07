
<script>
	function showpicture(s) {
		$greatphoto=document.getElementById("greatphoto");
		$greatphoto.src='PicturesGallery/' + s;
		$photoFrame=document.getElementById("photoFrame");
		$photoFrame.style.visibility="visible";
	}
	function closeFrame() {
		$photoFrame=document.getElementById("photoFrame");
		$photoFrame.style.visibility="hidden";
	}
</script>

<table >

<?php

$dir_nom = 'PicturesGallery'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

$rang = -1;

while($element = readdir($dir)) {

	if($element != '.' && $element != '..' && preg_match("/(\d+_)2(_\d+_dsc_\d+.jpg)/",$element,$result)) {
		$rang= $rang+1;
		if ( $rang == 0) { echo "<tr>\n" ;};
		$bigphoto = $result[1] . "3" . $result[2];
		echo "	<td><img src='PicturesGallery/$element' onclick='showpicture(\"$bigphoto\")'></td>\n";
		//break;
		if ( $rang == 6 ) {
			echo "</tr>\n";
			$rang=-1;
		}
	}

}
?> 
</table>

<div id="photoFrame">
	<p ><a onclick="closeFrame();">Fermer</a></p>
	<p><img id="greatphoto" /></p>
</div>
