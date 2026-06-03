<?php

function getBreeds($apiKey){

    $url = "https://api.thedogapi.com/v1/breeds";

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    curl_setopt($ch,CURLOPT_HTTPHEADER,array(
        'x-api-key: '.$apiKey
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response,true);
}

function getBreedImages($apiKey,$breedId,$limit=5){

    $url="https://api.thedogapi.com/v1/images/search?breed_id={$breedId}&limit={$limit}";

    $ch=curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    curl_setopt($ch,CURLOPT_HTTPHEADER,array(
        'x-api-key: '.$apiKey
    ));

    $response=curl_exec($ch);

    curl_close($ch);

    return json_decode($response,true);
}

$apiKey = "live_UVDwC52XP9QrlcbbN7zfKSGcWpGWT8I6zGtjgnqQvCmetAautWmWI3njKPQldVoP";

$breeds = getBreeds($apiKey);

echo "<h1>Lista de Razas</h1>";

foreach($breeds as $breed){

    echo $breed['name']." (ID: ".$breed['id'].")<br>";

}

$huskyId = 8;

$images = getBreedImages($apiKey,$huskyId);

echo "<h1>Imagenes Husky</h1>";

foreach($images as $image){

    echo '<img src="'.$image['url'].'" width="200"><br>';

}

?>