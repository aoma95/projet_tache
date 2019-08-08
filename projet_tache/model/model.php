<?php

function connect_db(){
    $params=parse_ini_file('db.ini');
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
function connect_db_in(){
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
function add_tache($titre,$description,$level,$date){
    $bdd=connect_db_in();
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
function get_tache(){
    $bdd=connect_db();
    $req_get_tache="SELECT * from tache";
    $stmt=$bdd->prepare($req_get_tache);
    $stmt->execute();
    return $stmt;
}

function delete_tache($id){
    $bdd=connect_db_in();
    $valeur=["id"=>$id];
    $req_del_tache="DELETE FROM tache WHERE id_tache = :id";
    $stmt=$bdd->prepare($req_del_tache);
    $stmt->execute($valeur);
}