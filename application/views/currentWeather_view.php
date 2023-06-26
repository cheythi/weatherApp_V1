<body style="background-color: #f8f47c17;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex">
                <?php 
                    $long    = $weather['coord']['lon'] ?? 0;
                    $lat     = $weather['coord']['lat'] ?? 0;
                    $name    = $weather['name'] ?? "--";
                    $country = $weather['sys']['country'] ?? "--";
                ?>
                <span class="mb-3 mb-md-0 c_footer"> &#8594;  long: <?php echo $long; ?> lat: <?php echo $lat; ?> | <?php echo $name; ?> , <?php echo $country; ?> </span>
            </div>
        
            <ul class="nav col-md-6 d-flex justify-content-end">
                <li class="ms-3"><a class="text-muted" href="https://github.com/cheythi/weatherApp_V1"><i class="fa fa-github"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://lk.linkedin.com/in/chethana-dasanayaka"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
        
    </div>
    <?php
    // Assign default values to variables
    $main = $description = $icon = $currentTemp = $feelsLike = $min = $max = $pressure = $humidity = $speed = $deg = $gust = $cloudiness = 0;

    // Retrieve weather data from API
    if ($weather && isset($weather['main'])) {
        $main = $weather['weather'][0]['main'] ?? '';
        $description = $weather['weather'][0]['description'] ?? '';
        $icon = $weather['weather'][0]['icon'] ?? '10d';
        $currentTemp = $weather['main']['temp'] ?? 0;
        $feelsLike = $weather['main']['feels_like'] ?? 0;
        $min = $weather['main']['temp_min'] ?? 0;
        $max = $weather['main']['temp_max'] ?? 0;
        $pressure = $weather['main']['pressure'] ?? 0;
        $humidity = $weather['main']['humidity'] ?? 0;
        $speed = $weather['wind']['speed'] ?? 0;
        $deg = $weather['wind']['deg'] ?? 0;
        $gust = $weather['wind']['gust'] ?? 0;
        $cloudiness = $weather['clouds']['all'] ?? 0;
    }
    ?>

    <div class="container c_middle_header">
        <?php if ($weather && isset($weather['main'])): ?>
            <h1>Weather Status in <?= $weather['name'] ?></h1>
        <?php else: ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error retrieving weather data...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>    
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertArea" style="display: none;"></div>
    </div>

    <div class="container c_middle_content">
        <div class="row justify-content-end">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6"><h3>Current Weather</h3></div>
                        <!-- Unit change button -->
                        <div class="col-md-3"><input class="btn btn-outline-secondary" type="button" id="refresh" value="Refresh" onclick="refresh()"></div>
                    </div>                
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <h5 class="card-title"><?= $main ?></h5>
                                <p class="card-text"><?= $description ?></p>
                            </div>
                            <div class="col-md-6">
                                <img src="https://openweathermap.org/img/w/<?= $icon ?>.png" alt="Weather Icon" class="c_weather_icon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6"><h3>Temperature</h3></div>
                        <!-- Unit change button -->
                        <div class="col-md-3"><input class="btn btn-outline-secondary" type="button" id="unitChange" value="&deg;F" onclick="changeUnit()"></div>
                    </div>
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <p class="card-text temperature" id="tempNow">Current temperature: <?= $currentTemp ?> &deg;C</p>
                                <p class="card-text temperature" id="tempFeels">Feels like: <?= $feelsLike ?> &deg;C</p>
                            </div> 
                            <div class="col-md-6">   
                                <p class="card-text temperature" id="min">Today Min: <?= $min ?> &deg;C</p>
                                <p class="card-text temperature" id="max">Today Max: <?= $max ?> &deg;C</p>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>Pressure and Humidity</h3>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Pressure: <?= $pressure ?> hPa</p>
                            <p class="card-text">Humidity: <?= $humidity ?>%</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Wind Information</h3>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Speed: <?= $speed ?> m/s</p>
                            <p class="card-text">Direction: <?= $deg ?>&deg;</p>
                            <p class="card-text">Gust: <?= $gust ?> m/s</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>General Info</h3>
                    <div class="card">
                        <div class="card-body">
                            <?php if ($weather && isset($weather['sys']['sunrise'])): ?>
                                <?php $timestamp = $weather['sys']['sunrise']; ?>
                                <?php $lkTime = convertToLkTime($timestamp); ?>
                                <p class="card-text">Sunrise: <?= $lkTime ?></p>
                            <?php else: ?>
                                <p class="card-text">Sunrise: 0</p>
                            <?php endif; ?>
                            <?php if ($weather && isset($weather['sys']['sunset'])): ?>
                                <?php $timestamp = $weather['sys']['sunset']; ?>
                                <?php $lkTime = convertToLkTime($timestamp); ?>
                                <p class="card-text">Sunset: <?= $lkTime ?></p>
                            <?php else: ?>
                                <p class="card-text">Sunset: 0</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Cloud Coverage</h3>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Cloudiness: <?= $cloudiness ?>%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form to submit lat and long -->
    <div class="hide">
        <form id="getweatherData" action="<?= base_url() ?>" method="get">
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
        </form>
    </div>

    <?php
    // This method is used to convert time to LK
    function convertToLkTime($timestamp) {
        $datetime = new DateTime();
        $datetime->setTimestamp($timestamp);
        $datetime->setTimezone(new DateTimeZone('UTC'));

        $timezone_lk = new DateTimeZone('Asia/Colombo');
        $datetime->setTimezone($timezone_lk);

        $lkTime = $datetime->format('Y-m-d H:i:s');

        return $lkTime;
    }
    ?>
</body>

