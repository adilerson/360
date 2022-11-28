<?php
    include('class.php');
        if (isset($_GET['maximo'])){
            $maximo = $_GET['maximo'];
        }else{
            $maximo = 100;
        }


        if (!isset($_GET['evento'])){
            echo '<script>window.location.href = "eventos.php";</script>';

        }else{
            $evento = $_GET['evento'];
        }

        function corrigeNome($string){
            $string = str_replace("_", " ", $string); 

            return $string;
        }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/qrcode.js?teste=1"></script>
    <link href="css/style.css?teste=2" rel="stylesheet">

    <title>360 - <?php echo $evento; ?></title>
    <script>
        
        
        function gerar(address,key){

            $('#'+key).empty();

            $('#'+key).qrcode({text: address});
        }
        function contar(qt){
            console.log('Conta: '+ conta + ', Qt: ' + qt)
            if (qt > conta){
                conta = qt;
                $("#atualizar").fadeIn("300");
            }
        }

        function atualizaVideos(){

            $("#status").load("script.php?contaVideos=1&evento=<?php echo corrigeNome($evento) ?> ");
        }
        setInterval(atualizaVideos, 3000);

</script>
</head>
<body id="body">
    


<?php
    

        
            echo '<div class="titulo fw-bold">'.ucfirst($evento).'</div>';
        
    
    echo '<div class="ws-100 text-center transition"><div id="atualizar" class="btn transition" style="display:none;">Atualizar</div></div>';
    echo '<div class="videos">';

    $path = "videoSpinApi/dist/".$evento."/";
    $diretorio = dir($path);
    $script = '';
    

    while($arquivo = $diretorio -> read()){
        $arq = $arquivo;
        $ext = pathinfo($arq, PATHINFO_EXTENSION);
        
        //echo $name;
        
        if ($ext == 'mp4'){
            $arquivos[] = $arquivo;
        }
        

    }
    $key = 0;

    $arquivos = array_reverse($arquivos);
    foreach($arquivos as $arquivo){

        
        if ($key < $maximo){
        
            $sonome = pathinfo($arquivo, PATHINFO_FILENAME);

            echo '<div class="videoPai">
                    <div class="video" ide="qrcode_'.$key.'" style="background-image: url(\''.$path.$sonome.'.jpg\');" video="'.$sonome.'.mp4">';
                /*
                    <video  class="videoEmbed" controls>
                        <source src="'.$path.$arquivo.'" type="video/mp4">
                    </video>
                    */
            //echo '<img src="'.$path.$sonome.'.jpg" class="videoEmbed"></img>';

                echo '</div><div id="qrcode_'.$key.'" class="desfocado qrcode transition-1"></div>
                </div>';
                $script .= 'gerar("http://'.$_SERVER['SERVER_NAME'].':8080/download.php?video='.$path.$arquivo.'","qrcode_'.$key.'"); ';

            }
            $key++;
        

    }
    echo '<script>conta = '.$key.';</script>';
    
        echo '</div>';

?>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div>
        <span class="close">&times;</span>
    </div>
    <div style="text-align: center;">
        <video  class="videoEmbedModal" src="" id="videoModal" controls="controls" autoplay>
    </div>
    <div class="text-center">
        <div id="qrcodeModal" class="qrcode-focado"></div>
    </div>
    </video>
  </div>
</div>

<div id="status"></div>
</body>
</html>

<style>
    
</style>

<script>
    <?php
        echo $script;
    ?>
    $("#atualizar").click(function(){

            window.location.reload();
            openFullscreen()
    })

    $(".qrcode").click(function(){
        $(".qrcode").removeClass("desfocado");
        $(".qrcode").addClass("desfocado");
        $(this).removeClass("desfocado",1300);
    })
    $(".video").click(function(){
        
        $(".qrcode").removeClass("desfocado");
        $(".qrcode").addClass("desfocado");
        $("#"+$(this).attr("ide")).removeClass("desfocado",1300);
    });





    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    $(".video").click(function(){
        modal.style.display = "block";
        
        
        gerar("http://<?php echo $_SERVER['SERVER_NAME'] ?>:8080/<?php echo $path ?>"+$(this).attr("video"),"qrcodeModal"); 
        $("#videoModal").attr("src","http://<?php echo $_SERVER['SERVER_NAME'] ?>:8080/<?php echo $path ?>"+$(this).attr("video"))
        
    })
    

    // When the user clicks on <span> (x), close the modal
    $(".close").click(function(){
        $("#videoModal").attr("src","");
        modal.style.display = "none";
    });
    


    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }


</script>