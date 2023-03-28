
<?php
/*
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://localhost/curl/request.php");
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array("request" => "nome_return")));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);

    echo $server_output;*/



    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURL</title>
</head>
<body>
    <?php
        $url = "https://swapi.dev/api/people/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = json_decode(curl_exec($ch));

        echo '<pre>';
        var_dump($resultado);
        echo '</pre>';
    ?>
    
</body>
</html>