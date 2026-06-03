<?php

$url = "https://api.thedogapi.com/v1/breeds";

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

    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

curl_close($ch);

?>