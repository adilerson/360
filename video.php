<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/qrcode.js?teste=1"></script>
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CG-360</title>
    
</head>
<body>    
<?php
    include('class.php');
    if (isset($_GET['last'])){

        $videos = listVideos($_GET['lastevento']);
        $event = getEvent($_GET['lastevento']);
        $script = '';
        //echo '<div class="titulo">'.$event['name'].'</div>';
        echo '<div class="lastVideo">';
        if (isset($_GET['menos'])){
            $menos = $_GET['menos'];
        }else{
            $menos = 0;
        }
        $videos = array_reverse($videos);
        
        
        if (file_exists('videos/'.$videos[$menos]['address'])){
            echo '<video class="lastVideoEmbed" controls><source type="video/mp4" src="/360/videos/'.$videos[$menos]['address'].'" controls="controls" preload="none" onclick="this.play()"></video>';
            echo '<div class="qrcode" id="qrcode_'.$key.'"></div>';
            $script .= 'gerar("https://www.studiocg.com.br/360/videos/'.$videos[$menos]["address"].'","'.$key.'"); ';
        }
        echo '</div>';
        echo '<div class="ws-100 row justify-content-evenly footer">';
        
        if ($menos < count($videos)){
            $atual = $menos;
            $atual++;
            echo '<a href="?last='.$_GET['last'].'&lastevento='.$_GET['lastevento'].'&menos='.$atual.'" class="btn btn-success col-3">Voltar</a>';
        }else{
            echo '<div class="btn btn-secondary col-3">Voltar</div>';
        }

        echo '<div id="atualizar" class="btn btn-success col-3" style="display:none;">Atualizar</div>';

        if ($menos > 0){
            $atual = $menos;
            $atual--;
            echo '<a href="?last='.$_GET['last'].'&lastevento='.$_GET['lastevento'].'&menos='.$atual.'" class="btn btn-success col-3">Avançar</a>';
        }else{
            echo '<div class="btn btn-secondary col-3">Avançar</div>';
        }
    }


?>

<div id="status"></div>
</body>
</html>

<style>
    .lastVideo{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin-top: 1rem;
        
    }
    .qrcode{
        text-align: center;
        margin: 1rem;
        
    }
    canvas{
        width: 10rem !important;
        padding: 0.7rem;
        border: 2px solid black;
        border-radius: 0.8rem;
        box-shadow: 1px 1px 10px black;
        
    }
    .lastVideoEmbed{
        width: 36vh !important;
        height: 66vh !important;
        box-shadow: 3px 2px 10px #00000045;
        border-radius: 0.5rem;
    }

    .videoEmbed{
        width: 10rem;
        height: 17rem;
    }
    .footer{
        position: fixed;
    width: 100%;
    bottom: 0;
    margin-bottom: 1rem;
    }
</style>

<script>
    function gerar(address,key){
        //$('#qrcode_'+key).qrcode(address);

        $('#qrcode_'+key).empty();


        // Generate and Output QR Code
        $('#qrcode_'+key).qrcode({text: address});
    }
    function atualizaVideos(){

        $("#status").load("script.php?atualiza=<?php echo $_GET['lastevento'] ?>");
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
    
    <?php
        echo $script;
    ?>
</script>