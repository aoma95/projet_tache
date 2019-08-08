<?php

function date_conv($jour,$mois,$annee){
    $date_form=$annee."-".$mois."-".$jour;
//    $date_covert=date_create($date_form);
    return $date_form;
}

function post_tache(){
    $stmt = get_tache();
    while ($ligne = $stmt->fetch()) {
        $today = date_create();
        $day= date_create($ligne["date_fin_tache"]);
        $interval = $today->diff($day);
        $interval=$interval->format('%R%a J');
        ?><li>
        <input type="checkbox" name="tache[]" value="<?=$ligne["id_tache"]?>">
        <h1 class="<?=$ligne["priority_tache"]?>"><?=$ligne["titre_tache"]?> :
            <?=$interval?>
        </h1>
        <p><?=$ligne["description_tache"]?></p>
        </li>
<?php
    }
}


if (isset($_POST) AND !empty($_POST)) {
    require('../model/model.php');
    $date=date_conv($_POST['jour'],$_POST['mois'],$_POST['annee']);
    $titre=$_POST["titre"];
    $description=$_POST["description"];
    $level=$_POST["level"];
    if ($description===''){
        $description="Pas de description";
    }
    add_tache($titre,$description,$level,$date);
}

else{
    require('model/model.php');
}
