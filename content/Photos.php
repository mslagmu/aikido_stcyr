<script src="js/jquery.min.js"></script>
<script src="js/lightgallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="js/lg-thumbnail.min.js"></script>
<script src="js/lg-fullscreen.min.js"></script>


<div id="lightgallery">

<?php

$dir_nom = 'PicturesGallery'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

$rang = -1;

while($element = readdir($dir)) {

	if($element != '.' && $element != '..' && preg_match("/(\d+_)2(_\d+_dsc_\d+.jpg)/",$element,$result)) {
		$bigphoto = $result[1] . "3" . $result[2];
?>
<a href="PicturesGallery/<?php echo $bigphoto; ?>">
      <img src="PicturesGallery/<?php echo $element; ?>" />
</a>

<?php
	}

}
?> 

</div>


<script type="text/javascript">
	$(document).ready(function() {
		$("#lightgallery").lightGallery(); 
	});
</script>

