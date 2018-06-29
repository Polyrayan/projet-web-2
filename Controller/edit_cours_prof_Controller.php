<?php

require_once("./../Model/proposer_model.php");
require_once("./../Model/cours_prof_model.php");

$prof = getProf($_COOKIE['prof']);
$id = $prof["idProf"];

$idCours = htmlentities($_POST['idCours']);
$lieu =    htmlentities($_POST['lieu']);
$ville =   htmlentities($_POST['ville']);
$prix =    htmlentities($_POST['prix']);
$dateCours = htmlentities($_POST['dateCours']);
$debut =   htmlentities($_POST['debut']);
$fin =     htmlentities($_POST['fin']);
$nomMatiere = htmlspecialchars($_POST['matiere']);
$mat = getMatiere($nomMatiere);
$idMatiere = $mat['idMatiere'];
$niveau =     htmlentities($_POST['niveau']);
$niv = getNiveau($niveau);
$idNiveau = htmlentities($niv['idNiveau']);
if(Verif_presenceEleve($idCours) == 0 ){
		editerCours($idCours,$prix,$ville,$lieu,$debut,$fin,$dateCours,$idNiveau,$idMatiere);
  $msg = "success";
  header("location:./../prof/cours?edit=" .$msg);
}
else{
  	$msg = "student_reserved_this_course";
    header("location:./../prof/cours?errorsuppr=" .$msg);
}

?>
