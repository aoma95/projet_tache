<?php

function connect_db(){
    $params=parse_ini_file('../db.ini');
    try
    {
        $bdd = new PDO($params['url'],$params['user'],$params['pass']);
        return $bdd;
    }
    catch(Exception $e)
    {
        die("Une érreur a été trouvé : " . $e->getMessage());
    }
}
//function add_tache($titre,$description,$level,$date){
//    $bdd=connect_db();
//    $req_add_tache="INSERT INTO tache (titre,description,level,date_fin) VALUES ($titre,$description,$level,$date);";
//    var_dump($req_add_tache);
//    $stmt=$bdd->prepare($req_add_tache);
//    $stmt->execute();
////    header('location:../index.php');
//}
function add_tache($titre,$description,$level,$date){
    $bdd=connect_db();
    $valeur=["titre_tache"=>$titre,"description_tache"=>$description,"priority_tache"=>$level,"date_fin_tache"=>$date];
    $req_add_tache="INSERT INTO tache (titre_tache,description_tache,priority_tache,date_fin_tache) VALUES (:titre_tache,:description_tache,:priority_tache,:date_fin_tache);";
    $stmt=$bdd->prepare($req_add_tache);
    $stmt->execute($valeur);
//    if(!$stmt->execute($valeur)){
//
//        print_r($stmt->errorInfo());
//    }
    header('location:../index.php');
}