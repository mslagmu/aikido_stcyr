<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet"  type="text/css" href="inscription.css" />
    <title>AIKIDO SAINT CYR CLUB 78</title>
</head>
<body>
<script>
	function age() {
		var s = document.getElementById("majeur");
		var p = document.getElementById("parent");
		var value="";
		if ( s.value == "majeur" ) { value="hidden"; } else { value = "visible"; };
		p.style.visibility=value;
	}
</script>

<div class="titre">AÏKIDO</div>
<div class="titre">Saint Cyr Club 78</div>
<div class="soustitre">(ASCC78)</div>

<div class="soustitre">FICHE D'INSCRIPTION</div>

<p><i>Ce formulaire vous permet de générer un fichier PDF qu'il vous faudra signer et donner à un responsable du club.
Vous pouvez ne pas le remplir et faire "envoyer" pour obtenir une fiche d'inscription à remplir manuellement.</i></p>

<form action="fpdf" method="get" >
<p>Nom: <input type="text" name="nom"/> <span class="second">Prénom: <input type="text" name="prenom"/>          Sexe : F <input type="radio" name="sexe" value="F"/> M <input type="radio" name="sexe" value="M"/> </p>
<p>Né(e) le <input type="text" name="date_naissance"/> <span class="second">à <input type="text" name="lieu_naissance"/> </span></p>
<p>Adresse :  N°<input type="text" name="no_adresse"/> <span class="second">Rue <input type="text" name="rue"/> Bât:<input type="text" name="batiment"/></span></p>
<p>Code Postal: <input type="text" name="CP"/>  <span class="second">Commune: <input type="text" name="commune"/></span></p>
<p>Tél : <input type="text" name="tel"/><span class="second">Courriel: <input type="text" name="courriel"/></span></p>
<p>Profession: <input type="text" name="profession"/><span class="second">1ère Inscription <input type="radio" name="inscription" value="Première Inscription"/> Renouvellement<input type="radio" name="inscription" value="renouvellement"/></span></p>
<p>Niveau :    Débutant<input type="radio" name="niveau" value="Débutant"/>
			   Moyen <input type="radio" name="niveau" value="Moyen"/>
			   Confirmé<input type="radio" name="niveau" value="Confirmé"/></p>
<p>Je désire passer ma visite médicale obligatoire au centre médico-sportif : oui<input type="radio" name="medecin" value="oui"/> non<input type="radio" name="medecin" value="non"/>
<p>J'autorise la prise de photos et leur publication dans les média : oui<input type="radio" name="media" value="oui"/> non<input type="radio" name="media" value="non"/>

<p>Etes vous : 
<select name="majeur" id="majeur" onchange="age();">
  <option value="mineur" selected>Mineur</option>
  <option value="majeur">Majeur</option>
</select> 
</p>

<div id="parent">
<p id="autorisation">AUTORISATION PARENTALE:</p>

<p>Je sousigné(e)<input type="text" name="soussignataire"/> autorise mon enfant <input type="text" name="nom_enfant" /> 
<p>à pratiquer l'aïkido au club "Aïkido Saint Cyr Club 78"
<p>J'autorise mon fils ou ma fille à quitter seul(e) le lieu d'entrainement et celà sous ma responsabilité:</p>
<p>oui<input type="radio" name="quitter" value="oui"/> non<input type="radio" name="quitter" value="non"/></p>


<p>Fait à <input type="text" name="parent_lieu" /> Le:<input type="text" name="parent_date"/></p>
</div>
<table>
	<tr>
		<td class="th">Licence</td>
		<td class="th">Assurance Complémentaire</td>
		<td class="th">Visite Médicale</td>
		<td class="th">Cotisation Trimestrielle</td>
		<td class="th">Cotisation Annuelle</td>
		<td class="th">Virement Effectué</td>
		<td class="th">Mode de Paiement</td>
	</tr>
	<tr>
		<td><input size="4" type="text" name="cout_licence"/> €</td>
		<td><input size="4" type="text" name="cout_assurance"/> €</td>
		<td><input size="4" type="text" name="cout_visite"/> €</td>
		<td><input size="4" type="text" name="cout_trim"/> €</td>
		<td><input size="4" type="text" name="cout_ann"/> €</td>
		<td><input size="4" type="text" name="virement"/> €</td>
		<td id="paiement">
			<p>Espèce <input type="radio" name="paiement" value="Espèces"/></p>
			<p>Chèque <input type="radio" name="paiement" value="Chèque"/></p>
		</td>
	</tr>
</table>


<P>Lors de mon inscription je reconnais avoir pris connaissance des fiches d'assurances complémentaires non obligatoires jointes à cette feuille d'inscription 
et qu'une notice d'asurance individuelle m'a été remise par la section <input type="radio" name="lieu" value="section"/> ou par la fédération <input type="radio" name="lieu" value="fédération"/> </P>
<P>Le titulaire désire souscrire une assurance complémentaire falcultative : oui<input type="radio" name="assurance" value="oui"/> non<input type="radio" name="assurance" value="non"/></p>

<p>Fait à <input type="text" name="signature_lieu" /> Le:<input type="text" name="signature_date"/></p>

<input type="submit" value="Envoyer"/>

</form>
</body>
</html>
