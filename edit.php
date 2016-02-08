<?
	if ( isset($_GET["editor1"]) ){
		$message = urldecode($_GET["editor1"]);
		file_put_contents("content/message.php",$message);
	} else {
		$message = file_get_contents("content/message.php");
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edition de la page d'accueil</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <form action="edit.php" method="GET">
			<input type="submit" value="Sauver"/>
            <textarea name="editor1" id="editor1" rows="30" cols="80"><?=$message?></textarea>
        </form>
    </body>
</html> 
