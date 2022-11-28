<?php 
date_default_timezone_set('America/Sao_Paulo');
function getCaminho(){
    $relativo = '';
    $caminho = ($_SERVER['PHP_SELF']);
    $quant = substr_count($caminho, '/');
    $quant=$quant-1;
    for ($k = 0; $k < $quant; $k++) {
      $relativo.="../";
    }
}

function getUser($user,$password){
    include(getCaminho().'pdo.php');
    $sql = "SELECT * FROM `users` WHERE `user` LIKE '".$user."' AND `password` LIKE '".$password."'";
    $pdo_verifica = $conexao_pdo->prepare($sql);
    //echo $sql;exit;
    $pdo_verifica->execute(); 
    $users = $pdo_verifica->fetch();
    return $users;
}

function getEventos($id){
    include(getCaminho().'pdo.php');
    $pdo_verifica = $conexao_pdo->prepare("SELECT * FROM `events` WHERE `idUser` LIKE '".$id."'");
    $pdo_verifica->execute(); 
    $users = $pdo_verifica->fetch();
    return $users;
}

function getEvent($idEvent){
    include(getCaminho().'pdo.php');
    $pdo_verifica = $conexao_pdo->prepare("SELECT * FROM `events` WHERE `id` LIKE '".$idEvent."'");
    $pdo_verifica->execute(); 
    $event = $pdo_verifica->fetch();
    return $event;
}

function setVideo($idUser,$idEvent,$videoName){
    if (!file_exists('videos/'.$idUser.'/'.$idEvent.'/'.$videoName.".mp4")){
        return 'found';
    }
    include(getCaminho().'pdo.php');
    $sql = "INSERT INTO `videos` (`id`, `idUser`, `idEvent`, `title`, `address`) VALUES (NULL, '".$idUser."', '".$idEvent."', '','');";
    $pdo_verifica = $conexao_pdo->prepare($sql);
    $pdo_verifica->execute();
    $lastId = $conexao_pdo->lastInsertId();

    $sql = "UPDATE `videos` SET `address` = '".$idUser."/".$idEvent."/".$lastId.".mp4' WHERE `videos`.`id` = '".$lastId."'";
    $pdo_verifica = $conexao_pdo->prepare($sql);
    $pdo_verifica->execute();     

    if (rename('videos/'.$idUser.'/'.$idEvent.'/'.$videoName.".mp4",'videos/'.$idUser."/".$idEvent.'/'.$lastId.".mp4")){
        return 'ok';

    }else{

        return 'error';
    }

}

function listVideos($idEvent){
    
    include(getCaminho().'pdo.php');
    $sql = "SELECT * FROM `videos` WHERE `idEvent` LIKE '".$idEvent."'";
    $pdo_verifica = $conexao_pdo->prepare($sql);
    //echo $sql;exit;
    $pdo_verifica->execute(); 
    $users = $pdo_verifica->fetchAll();
    return $users;

}

function getEvents($idUser){
    
    include(getCaminho().'pdo.php');
    $sql = "SELECT * FROM `events` WHERE `idUser` LIKE '".$idUser."'";
    $pdo_verifica = $conexao_pdo->prepare($sql);
    //echo $sql;exit;
    $pdo_verifica->execute(); 
    $events = $pdo_verifica->fetchAll();
    return $events;

}

function getLastVideo(){
    
    include(getCaminho().'pdo.php');
    $sql = "SELECT * FROM `videos` LIMIT 1";
    $pdo_verifica = $conexao_pdo->prepare($sql);
    //echo $sql;exit;
    $pdo_verifica->execute(); 
    $videos = $pdo_verifica->fetchALL();
    return $videos;

}

function insertVideo($video,$title){
    
    include(getCaminho().'pdo.php');
    $sql = "INSERT INTO `videos` (`id`, `title`, `address`) VALUES (NULL,  '".$title."', '".$video."');";
    $pdo_verifica = $conexao_pdo->prepare($sql);
    $pdo_verifica->execute();
    return 'ok';
}


function dropVideo($id){
    
    include(getCaminho().'pdo.php');
    $sql = "DELETE FROM videos WHERE `videos`.`id` = ".$id;
    $pdo_verifica = $conexao_pdo->prepare($sql);
    $pdo_verifica->execute();
    return 'ok';
}




?>


