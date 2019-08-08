<?php
require('../model/model.php');
function date_conv($jour,$mois,$annee){
    $date_form=$annee."-".$mois."-".$jour;
//    $date_covert=date_create($date_form);
    return $date_form;
}
if (isset($_POST) AND !empty($_POST)) {
    $date=date_conv($_POST['jour'],$_POST['mois'],$_POST['annee']);
    $titre=$_POST["titre"];
    $description=$_POST["description"];
    $level=$_POST["level"];
    add_tache($titre,$description,$level,$date);

}



