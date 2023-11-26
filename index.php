<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>5-Day Weather Forecast Of Dhaka</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center" style="background-image: url('high-hills-covered-dry-grass-with-visible-skyline-mt-tam-marin-ca.jpg')">

    <div class="max-w-screen-xl mx-auto bg-white rounded p-2 shadow-md " style="background-image: url('starry-night-sky.jpg')">
        <h1 class="text-2xl font-semibold mb-4 p-2 font-mono text-center text-white" >5-Day Weather Forecast Of Dhaka</h1>
        <button class="border rounded bg-blue-100 flex flex-wrap max-w-md mx-auto bg-white rounded p-2 shadow-md p-2 outline outline-offset-4 text-red-600 border-red "><a href="index.php">Reload</a></button><br>

        <?php
        
        $apiKey = "bae71c6e9998539c4ce707390729bcab";
        $cityId = "1185241";
        $apiUrl = "http://api.openweathermap.org/data/2.5/forecast?id={$cityId}&units=metric&appid={$apiKey}";

        $response = file_get_contents($apiUrl);
        $weatherData = json_decode($response, true);

        if (!empty($weatherData)) :
            ?>
                <div class="bg-blue-100 flex flex-wrap border rounded">
                    <?php foreach ($weatherData['list'] as $forecast) : ?>
                        <div class="w-1/4 px-3 p-4 shadow-md">
                            <div class="mb-4 border rounded p-4 border-black">
                                <ul>
                                    <li class="text-sm font-bold">Date and Time: <?php echo $forecast['dt_txt']; ?></li>
                                    <li class="text-sm font-semibold">Temperature: <?php echo $forecast['main']['temp']; ?> &#8451;</li>
                                    <li class="text-sm font-semibold">Weather: <?php echo $forecast['weather'][0]['description']; ?></li>
                                    <li>
                                        <img src="http://openweathermap.org/img/w/<?php echo $forecast['weather'][0]['icon']; ?>.png" alt="Weather Icon">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        <?php else : ?>
            <p class="text-red-500">Sorry, Failed to fetch weather data!!</p>
        <?php endif; ?>
    </div>

</body>
</html>