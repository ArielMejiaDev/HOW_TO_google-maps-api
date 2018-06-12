<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Maps API</title>
</head>
<body>
    <form action="" method="post">
        <label for="ubicacion">Ingresa tu pais</label>
        <input type="text" name="ubicacion">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
<?php
    //recibe el pais y devuelve la latitud y la longitud
    if (isset($_POST['ubicacion'])) {
        $ubicacion = $_POST['ubicacion'];
        //echo 'Tu ubicacion es: ' . $ubicacion ;
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$ubicacion.'&key=AIzaSyAldK59WVcvttJYORCV56-DjUXDcYJiB6Q';
        //echo $url;
        $json = file_get_contents($url);
        $datos = json_decode($json,true);
        //var_dump($datos);
        echo '<pre>',print_r($datos),'</pre>';
        $lat = $datos['results'][0]['geometry']['location']['lat'];
        $lng = $datos['results'][0]['geometry']['location']['lng'];
        echo '<br>';
        echo 'la latitud de su ciudad es de: ' . $lat . 'y longitud de su ciudad es de: ' . $lng;
    }
?>