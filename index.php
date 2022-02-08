<?php

$url = "api.openweathermap.org/data/2.5/weather";
$options = array(
    'q' => 'Moscow',
    'appid' => '',
    'units' => 'metric',
    'language' => 'en',
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($options));

$data = json_decode(curl_exec($ch));
curl_close($ch);
$currentTime = time();

date_default_timezone_set('Europe/Moscow');
$today = date("D M j G:i:s T Y");   
$temp = $data->main->temp;
$min_temp = $data->main->temp_min;
$max_temp = $data->main->temp_max;
$feels_like = $data->main->feels_like;
$humidity = $data->main->humidity;
$description =$data->weather[0]->description;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./accets/style.css">
    <title>weather</title>
</head>

<body>

    <header class="header _container">
        <h2><?php echo $data->name; ?> weather status</h2>
    </header>

    
<main class="main _container"><div class="weather">
<div class="current-time"><div><?php echo date("l G:i", $currentTime); ?></div>
    <div><?php echo date("jS F, Y",$currentTime); ?></div></div>

    <div class="weather-data">

        <p>Temperature: <?php echo ceil($temp) + 0; ?>°C</p>
        <p>Minimum Temperature: <?php echo ceil($min_temp) + 0; ?>°C</p>
        <p>Maximum Temperature: <?php echo ceil($max_temp) + 0; ?>°C</p>
        <p>Feels like: <?php echo ceil($feels_like) + 0; ?>°C</p>
        <p>Humidity: <?php echo $humidity; ?>%</p>
    
        <!-- <div class="description" ><p><?php echo $description ?>
        <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" /> </p></div> -->

        
        
    </div></div>
</div>
</main>

</body>

</html>
