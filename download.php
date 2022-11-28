<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <link href="css/style.css?teste=3" rel="stylesheet">
    <title>CG-360</title>
</head>

<body>

<?php
    $video = $_GET['video'];
    
?>
<div class="pai">

    <div class="baixarDiv">
        <a class="bubbly-button" href="<?php echo $video?>" download>Baixar Video</a>
    </div>

    <!--<button class="bubbly-button">Click me!</button>-->
    <!--
        <div class="divVideo">
            <video src="http://<?php echo $_SERVER['SERVER_NAME']; ?>:8080/<?php echo $video?>">
        </div>
    -->
</div>

</body>
<style>
    body{
        background: #373e46 !important;
    }
    @font-face {
        font-family: "poppins";
        src: url("/fonts/Roboto-Regular.ttf");
    }
html{
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
    .baixar{
        border-radius: 5rem;
        border: 3px solid #00cffc;
        color: white;
        padding: 2rem 7rem;
        font-family: 'poppins';
        font-weight: bold;
        font-size: 1.5rem;

    }
    .baixarDiv{
        margin:1rem;
    }
    .pai{
        display:flex;
            flex-direction: column;
    align-content: center;
    align-items: center;
    justify-content: center;
    }
    .divVideo{
        margin-top: 1rem;
    }
    video{
        border-radius: 0.5rem;
        box-shadow: 1px 1px 5px silver;
    }
    a:link { text-decoration: none; }


a:visited { text-decoration: none; }


a:hover { text-decoration: none; }


a:active { text-decoration: none; }




.bubbly-button {
    font-family: "Helvetica", "Arial", sans-serif;
    display: inline-block;
    font-size: 1em;
    padding: 1.5em 3em;
    margin-top: 100px;
    margin-bottom: 60px;
    -webkit-appearance: none;
    appearance: none;
    /* background-color: #00cffc; */
    border: 6px solid #00cffc;
    color: #fff;
    border-radius: 4rem;
    /* border: none; */
    cursor: pointer;
    position: relative;
    transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
    box-shadow: 0 2px 25px rgb(0 207 252 / 39%);
    font-family: 'poppins';
    font-weight: bold;
    font-size: 2rem;
}
.bubbly-button:focus {
  outline: 0;
}
.bubbly-button:before, .bubbly-button:after {
  position: absolute;
  content: "";
  display: block;
  width: 140%;
  height: 100%;
  left: -20%;
  z-index: -1000;
  transition: all ease-in-out 0.5s;
  background-repeat: no-repeat;
}
.bubbly-button:before {
  display: none;
  top: -75%;
  background-image: radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, transparent 20%, #00cffc 20%, transparent 30%), radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, transparent 10%, #00cffc 15%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%);
  background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%, 10% 10%, 18% 18%;
}
.bubbly-button:after {
  display: none;
  bottom: -75%;
  background-image: radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, transparent 10%, #00cffc 15%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%), radial-gradient(circle, #00cffc 20%, transparent 20%);
  background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 10% 10%, 20% 20%;
}
.bubbly-button:active {
  transform: scale(0.9);
  background-color: #00cffc;
  box-shadow: 0 2px 25px rgba(255, 0, 130, 0.2);
}
.bubbly-button.animate:before {
  display: block;
  animation: topBubbles ease-in-out 1s forwards;
}
.bubbly-button.animate:after {
  display: block;
  animation: bottomBubbles ease-in-out 1s forwards;
}

@keyframes topBubbles {
  0% {
    background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
  }
  50% {
    background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;
  }
  100% {
    background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
    background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
  }
}
@keyframes bottomBubbles {
  0% {
    background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
  }
  50% {
    background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;
  }
  100% {
    background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
    background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
  }
}




</style>

<script>
    var animateButton = function(e) {

    e.preventDefault;
    //reset animation
    e.target.classList.remove('animate');

    e.target.classList.add('animate');
    setTimeout(function(){
    e.target.classList.remove('animate');
    },700);
    };

    var bubblyButtons = document.getElementsByClassName("bubbly-button");

    for (var i = 0; i < bubblyButtons.length; i++) {
    bubblyButtons[i].addEventListener('click', animateButton, false);
    }
</script>