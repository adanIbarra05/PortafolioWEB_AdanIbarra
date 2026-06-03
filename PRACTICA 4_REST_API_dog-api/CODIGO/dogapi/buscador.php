<?php

$apiKey = "live_UVDwC52XP9QrlcbbN7zfKSGcWpGWT8I6zGtjgnqQvCmetAautWmWI3njKPQldVoP";

function getBreeds($apiKey){

    $url = "https://api.thedogapi.com/v1/breeds";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: '.$apiKey
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}

$breeds = getBreeds($apiKey);

$breed_id = $_GET['breed'] ?? 8;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Buscador de Razas</title>
</head>
<body>

<h1>Buscador de Razas de Perros</h1>

<form method="GET">

<select name="breed">

<?php
foreach($breeds as $breed){

    $selected = ($breed['id'] == $breed_id) ? 'selected' : '';

    echo '<option value="'.$breed['id'].'" '.$selected.'>'.
    $breed['name'].'</option>';
}
?>

</select>

<button type="submit">Buscar</button>

</form>

<?php

$url = "https://api.thedogapi.com/v1/images/search?breed_id={$breed_id}&limit=5";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'x-api-key: '.$apiKey
));

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

echo "<h2>Imágenes</h2>";

foreach($data as $image){

    echo '<img src="'.$image['url'].'" width="250"><br><br>';
}

?>

</body>
</html>