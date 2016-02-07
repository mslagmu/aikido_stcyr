<?php

require('fpdf.php');


if ( !isset ($_REQUEST["majeur"]) ) $_REQUEST["majeur"]="mineur";

class myPDF extends FPDF {
	function ecrire ($str) {
		$utf=iconv('UTF-8','windows-1252',$str);
		$this->write(5,$utf);
	}
	function getValue ($name) {
		if (isset($_REQUEST[$name]) && $_REQUEST[$name] <> "") {
			$this->SetFont('Arial','I',11);
			$this->ecrire($_REQUEST[$name]);
			$this->SetFont('Arial','',11);
		} else {
			$this->ecrire(" ...............................");
		}
	}
	
	function exposant($str) {
		$y = $this->GetY();
		$x = $this->GetX();
		$this->SetXY($x,$y-1);
		$this->SetFont('Arial','I',5);
		$this->write(5,$str);
		$this->SetY($y);
		$this->SetFont('Arial','',11);
	}
	
	function choix($champs,$valeurs) {
		$this->SetFont('Arial','I',11);

		if (isset($_REQUEST[$champs])) {

			$this->ecrire($_REQUEST[$champs]);

		} else {
			foreach($valeurs as $v) {
				$this->ecrire(" ".$v);
			}
			$this->exposant(" (1)");
		}
		$this->SetFont('Arial','',11);
	}
	
	function colonne($text1,$text2,$field,$x,$w) {
		$this->SetFont('Arial','B',11);
		$this->rect($x,180,$w,10);
		$l1 = $this->GetStringWidth($text1);
		$x1 = ($w - $l1) /2 + $x ;
		$this->setXY($x1,180);
		$this->ecrire($text1);
		$l2 =  $this->GetStringWidth($text2);
		$x2 = ($w - $l2) /2 + $x ;
		$this->setXY($x2,185);
		$this->ecrire($text2);
		$this->rect($x,190,$w,20);
		$this->SetFont('Arial','',11);
		
		if ( $field == "paiement") {
			if ( isset($_REQUEST[$field] ) ) {
				$l3 = $this->GetStringWidth($_REQUEST[$field]);
				$x3 = ($w - $l3) /2 + $x -1;
				$this->SetFont('Arial','I',11);
				$this->setXY($x3,195);
				$this->ecrire($_REQUEST[$field]);
				$this->SetFont('Arial','',11);
				return;
			} else {
				$l3 = $this->GetStringWidth("Chèques");
				$x3 = ($w - $l3) /2 + $x -1;
				$this->SetFont('Arial','I',11);
				$this->setXY($x3,193);
				$this->ecrire("Chèques");
				$this->SetFont('Arial','',11);
				$l3 = $this->GetStringWidth("Espèces");
				$x3 = ($w - $l3) /2 + $x -1;
				$this->SetFont('Arial','I',11);
				$this->setXY($x3,200);
				$this->ecrire("Espèces");
				$this->exposant(" (1)");
				$this->SetFont('Arial','',11);
				return;
			}
		}
		if ( isset($_REQUEST[$field] ) ) {
			$l3 = $this->GetStringWidth($_REQUEST[$field]. " E");
			$x3 = ($w - $l3) /2 + $x -1;
			$this->SetFont('Arial','I',11);
			$this->setXY($x3,195);
			$this->ecrire($_REQUEST[$field]. " €");
			$this->SetFont('Arial','',11);
		}
	}
}

function saison() {
	$annee = intval(date("Y"));
	$mois  = intval(date("m"));
	if ( $mois < 7 ) {
		$annee = $annee-1;
	}
	$annee2=$annee+1;
	return "$annee/$annee2";
}

$pdf = new myPDF('P','mm','A4');

$pdf->SetMargins(20, 15);

$pdf->AddPage();

$pdf->image("../logoaikido.png",20,10,28.1);

$pdf->SetFont('Helvetica','B',28);

$pdf->Text(89,15,iconv('UTF-8','windows-1252','AÏKIDO'));
$pdf->Text(65,25,'Saint Cyr Club 78');

$pdf->SetFontSize(18);
$pdf->Text(90,35,'(ASCC78)');
$pdf->Text(75,50,'FICHE D\'INSCRIPTION');
$pdf->Text(78,57,'SAISON '.saison());


$pdf->SetFont('Arial','',11);

$pdf->SetXY(20,70);

$pdf->ecrire("Nom: ");
$pdf->getValue("nom");
$pdf->SetX(88);
$pdf->ecrire("Prénom: ");
$pdf->getValue("prenom");
$pdf->SetX(140);
$pdf->ecrire("Sexe: ");
$pdf->choix("sexe",array("M","F"));
$pdf->ecrire("\n");

$pdf->ecrire("Né le: ");
$pdf->getValue("date_naissance");
$pdf->SetX(88);
$pdf->ecrire("à ");
$pdf->getValue("lieu_naissance");
$pdf->ecrire("\n");


$pdf->ecrire("Adresse No: ");
$pdf->getValue("no_adresse");
$pdf->SetX(88);
$pdf->ecrire("Rue: ");
$pdf->getValue("rue");
$pdf->SetX(140);
$pdf->ecrire("Bât: ");
$pdf->getValue("batiment");
$pdf->ecrire("\n");


$pdf->ecrire("Code Postal: ");
$pdf->getValue("CP");
$pdf->SetX(88);
$pdf->ecrire("Commune: ");
$pdf->getValue("commune");
$pdf->ecrire("\n");

$pdf->ecrire("Téléphone: ");
$pdf->getValue("tel");
$pdf->SetX(88);
$pdf->ecrire("Courriel: ");
$pdf->getValue("courriel");
$pdf->ecrire("\n");

$pdf->ecrire("Profession: ");
$pdf->getValue("profession");
$pdf->SetX(88);
$pdf->choix("inscription",array("1èreInscription","Renouvellement"));
$pdf->ecrire("\n");

$pdf->ecrire("Niveau: ");
$pdf->choix("niveau",array("Débutant","Moyen","Comfirmé"));
$pdf->ecrire("\n");
$pdf->ecrire("Je désire passer ma visite médicale obligatoire au centre médico-sportif: ");
$pdf->choix("medecin",array("oui","non"));
$pdf->ecrire("\n");

$pdf->ecrire("J'autorise la prise de photos et leur publication dans les média: ");
$pdf->choix("media",array("oui","non"));
$pdf->ecrire("\n");

$pdf->ecrire("\n");

$signature="Signature précédée de la mention \"Lu et Approuvé\"";

$ln = $pdf->GetStringWidth($signature);
$start=(210 - $ln)/2;


if (  $_REQUEST["majeur"]=="mineur" ) {
	$pdf->ecrire("AUTORISATION PARENTALE:");
	$pdf->ecrire("\n");
	$pdf->ecrire("\n");
	$pdf->ecrire("Je sousigné(e) ");
	$pdf->getValue("soussignataire");
//	$pdf->SetX(88);
	$pdf->ecrire(" autorise mon enfant ");
	$pdf->getValue("nom_enfant");
//	$pdf->SetX(160);
	$pdf->ecrire(" à pratiquer l'aïkido au club \"Aïkido Saint Cyr Club 78\"");
	$pdf->ecrire("\n");
	$pdf->ecrire("J'autorise mon fils ou ma fille à quitter seul(e) le lieu d'entrainement et celà sous ma responsabilité: ");
	$pdf->choix("quitter",array("oui","non"));
	$pdf->ecrire("\n");
	$pdf->SetX($start);
	$pdf->ecrire($signature);
	$pdf->exposant(" (2)");
	$pdf->ecrire("\n");
	$pdf->ecrire("\n");
	$pdf->ecrire("\n");

	$pdf->ecrire("Fait à: ");
	$pdf->getValue("parent_lieu");
	$pdf->SetX(88);
	$pdf->ecrire("le : ");
	$pdf->getValue("parent_date");
	$pdf->ecrire("\n");
}
$larg=35;
$haut=10;




$pdf->colonne("Licence","","cout_licence",20,23);
$pdf->colonne("Assurance","Complémentaire","cout_assurance",43,32);
$pdf->colonne("Visite","Médicale","cout_visite",75,20);
$pdf->colonne("Cotisation","Trimestrielle","cout_trim",95,25);
$pdf->colonne("Cotisation","Annuelle","cout_ann",120,23);
$pdf->colonne("Virement","Effectué","virement",143,23);
$pdf->colonne("Mode de","Paiement","paiement",166,23);





$pdf->SetXY(20,215);

$pdf->ecrire("Lors de mon inscription, je reconnais avoir pris connaissance des fiches d'assurances complémentaires non obligatoires jointes à cette feuille d'inscription et qu'une notice d'asurance individuelle m'a été remise par la:  ");
$pdf->choix("lieu",array("section","fédération"));
$pdf->ecrire("\n");
$pdf->ecrire("Le titulaire désire souscrire une assurance complémentaire falcultative : ");
$pdf->choix("assurance",array("oui","non"));
$pdf->ecrire("\n");
$pdf->ecrire("\n");

$pdf->SetX($start);
$pdf->ecrire($signature);
$pdf->exposant(" (2)");

$pdf->ecrire("\n");
$pdf->ecrire("\n");
$pdf->ecrire("\n");

$pdf->ecrire("Fait à: ");
$pdf->getValue("signature_lieu");
$pdf->SetX(88);
$pdf->ecrire("le : ");
$pdf->getValue("signature_date");

$pdf->ecrire("\n\n");
$pdf->SetFont('Arial','I',9);
$pdf->ecrire("(1) Barrer les mentions inutiles\n");
$pdf->ecrire("(2) Signature obligatoire de l'adhérent ou du représentant légal pour le mineur.");

$pdf->SetXY(20,215);

$pdf->Output();
?> 
