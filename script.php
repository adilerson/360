<?php
    include('class.php');
    
    if (isset($_GET['atualiza'])){
        
        $videos = listVideos($_GET['atualiza']);
        
        echo '<script>atualiza("'.count($videos).'")</script>';
    }

    if (isset($_GET['contaVideos'])){
        $path = "videoSpinApi/dist/".$_GET['evento']."/";
        $diretorio = dir($path);
        $conta = 0;
        while($arquivo = $diretorio -> read()){

            $arq = $arquivo;
            $ext = pathinfo($arq, PATHINFO_EXTENSION);
            
            if ($ext == 'jpg'){
                
                if (filesize($path.$arquivo) > 100){
                    $conta++;
                }
            }
        }
        echo '<script>contar('.$conta.')</script>';
    }


    if (isset($_GET['lastVideo'])){
        $video = getLastVideo();
        if ( count($video) > 0){

            echo '{"video":""'.$video[0]['address'].'","ïd":"'.$video[0]['id'].'"}';
        }

        
    }

    if (isset($_GET['insertVideo'])){
        insertVideo($_GET['insertVideo'],$_GET['event']);
        

        
    }

    if (isset($_GET['dropVideo'])){
        dropVideo($_GET['dropVideo']);
        

        
    }
    

?>