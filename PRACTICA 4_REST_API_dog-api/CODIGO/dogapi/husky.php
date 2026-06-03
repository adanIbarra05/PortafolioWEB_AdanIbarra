<?php

$breed_id = 8;

$url = "https://api.thedogapi.com/v1/images/search?breed_id={$breed_id}&limit=5";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'x-api-key: live_UVDwC52XP9QrlcbbN7zfKSGcWpGWT8I6zGtjgnqQvCmetAautWmWI3njKPQldVoP'
));

$response = curl_exec($ch);

if($response === false){

    echo 'Error: '.curl_error($ch);

}else{

    $data = json_decode($response, true);

    echo "<h1>Imagenes de Husky</h1>";

    foreach($data as $image){

        echo '<img src="'.$image['url'].'" style="width:200px;"><br>';

    }
}

curl_close($ch);

?>