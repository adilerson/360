<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css?teste=2" rel="stylesheet">
    <title>360BR</title>
</head>
<body>
    <?php

    function corrigeNome($string){
        $string = str_replace("_", " ", $string); 

        return ucfirst($string);
    }

$itens = new DirectoryIterator('videoSpinApi/dist/');
    foreach($itens as $item){
        if ( ($item->gettype() === 'dir') && ($item != '.') && ($item != '..')){
            echo '<a href="index.php?evento='.$item.'" class="bubbly-button">'.corrigeNome($item).'</a>';
            
        }

    }

    
    ?>
</body>

<style>
    body{
        background: #373e46 !important;
    }
    .bubbly-button {
        margin: 1rem;
    font-family: "Helvetica", "Arial", sans-serif;
    display: inline-block;
    font-size: 1em;
    padding: 1em 2em;
    margin-top: 100px;
    margin-bottom: 60px;
    -webkit-appearance: none;
    appearance: none;
    /* background-color: #00cffc; */
    border: 3px solid #00cffc;
    color: #fff;
    border-radius: 4rem;
    /* border: none; */
    cursor: pointer;
    position: relative;
    transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
    box-shadow: 0 2px 25px rgb(0 207 252 / 39%);
    font-family: 'poppins';
    font-weight: bold;
    font-size: 1.5rem;
}
</style>
</html>