<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/qrcode.js?teste=1"></script>
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600;800&display=swap" rel="stylesheet">
    <title>CG-360</title>
    <script>
        function gerar(address,key){

            $('#qrcode_'+key).empty();

            $('#qrcode_'+key).qrcode({text: address});
        }

        /*
        function atualizaVideos(){

            $("#status").load("script.php?atualiza=<?php echo $_GET['video'] ?>");
        }
        setInterval(atualizaVideos, 3000);
        videos = 0;
        function atualiza(contaVideos){
            if (contaVideos > videos){
                if (videos > 0){
                    $("#atualizar").fadeIn("300");
                }
                
                videos = contaVideos;
            }
        }
        */
       
</script>
</head>
<body>
    


<?php
    include('class.php');

    if (isset($_GET['user'])){
        $user = getUser($_GET['user'],$_GET['password']);
        print_r($user);
    }


    if (isset($_GET['inserir'])){

        $video = setVideo($_GET['inserir'],$_GET['evento'],$_GET['video']);
        print_r($video);
    }

    if (isset($_GET['evento'])){

        $videos = listVideos($_GET['evento']);
        $event = getEvent($_GET['evento']);
        $script = '';
        echo '<div class="titulo fw-bold">'.$event['name'].'</div>';
        echo '<div class="videos">';
        foreach($videos as $key=>$video){
            if (file_exists('videos/'.$video['address'])){
                echo '<div class="videoPai">
                    <div class="video"><embed type="video/webm" src="videos/'.$video['address'].'" class="videoEmbed"> <div class="download"></div></div>';
                echo '<div id="qrcode_'.$key.'" class="desfocado"></div>
                </div>';
                $script .= 'gerar("http://'.$_SERVER['SERVER_NAME'].':8080/download.php?video='.$video["address"].'","'.$key.'"); ';
            }
            
        }
        echo '</div>';
    }


    if (isset($_GET['eventos'])){
        
        $events = getEvents($_GET['eventos']);

        echo '<div class="eventos">';
        foreach($events as $event){
            
            echo '<div class="evento">'.$event['name'].'</div>';
            
            }
        echo '</div>';
    }
?>

<div id="status"></div>
</body>
</html>



<style>
    
    body{
        font-family:'poppins';
    }
    .lastVideo{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin-top: 1rem;
        
    }
    .qrcode{
        text-align: center;
        /*margin: 1rem;*/
        
    }
    canvas{
        width: 10rem !important;
        padding: 0.7rem;
        border: 2px solid black;
        border-radius: 0rem 0rem 0.8rem 0.8rem;
        box-shadow: 1px 1px 10px black;
        
    }
    .lastVideoEmbed{
        width: 36vh !important;
        height: 66vh !important;
        box-shadow: 3px 2px 10px #00000045;
        border-radius: 0.5rem;
    }
    video{
        margin: 0 !important;
        width: 55vh !important;
    }
    .titulo{
        width:100%;
        padding: 3rem 0rem;
        color:#272727;
        text-align: center;
        font-size:2rem;
    }
    .videoEmbed{
        width: 10rem;
        height: 17rem;
    }
    .video{
        position: relative;
        width: 10rem;
        height: 17rem;
        border: 1px solid #e5e5e5;
        margin: 0rem 1rem 0rem 0rem;
        /*padding: 1rem;*/
        border-radius: 0.3rem;
        box-shadow: 0px 4px 7px #27272726;
    }
    .videos{

        display: flex;
        padding: 1rem;
    }
    .download{
        cursor: pointer;
        position: absolute;
        width: 40px;
        height: 40px;
        bottom: 1rem;
        right: 1rem;
        opacity: 0.7;
        background-image: url('/360/img/download.png');
    }
</style>

<script>
    <?php
        echo $script;
    ?>
</script>