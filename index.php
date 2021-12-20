<?php 

$searchPoke = $_POST['nome'];

$url = "https://www.canalti.com.br/api/pokemons.json"; // json with pokemons
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
$pokemons = json_decode(curl_exec($ch));

if(count($pokemons->pokemon)){
    $i = 0;
    foreach($pokemons->pokemon as $Pokemon){
        $i++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons</title>
</head>
<body>
<?php
foreach($pokemons->pokemon as $Pokemon){
    if($Pokemon->name == $searchPoke){
        $type = implode(',', $Pokemon->type);
        $weaknesses = implode(',', $Pokemon->weaknesses);
        ?>
    <link rel="stylesheet" href="index.css">
    <style>
    .mediumCard{
        background: url(<?=$Pokemon->img?>) center/cover;
        display: block;
        margin-left: auto;
        margin-right: auto;
        height: 200px;
        width: 50%;
    }
    </style>
<div class="content">
    <div class="card">
        <div class="topCard">
            <h2 class="title"><?=$Pokemon->name?></h2>
        </div>
        <div class="mediumCard">
            
            </div>
            <div class="bottomCard">
                <span class="buttonText"><strong>Type:</strong><?=$type?></span><br>
                <p class="buttonText"><strong>Weaknesses:</strong><?=$weaknesses?></p>
                <form action="#" method="post">
                    <strong>Pokemons:</strong><br>
                    <input type="text" name="nome" id="nome" >
                    <button>Search</button>
                </form>
            </div>
        </div>

    </div>
<?php
    }
}
?>

</body>
</html>