<div class="container c_middle_header">
    <?php if ($weather && isset($weather['main'])): ?>
        <h1>Weather Condition in <?= $weather['name'] ?></h1>
    <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertArea" >
            Error retrieving weather data...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>
<div class="container c_middle_content">
    <div class="row">
        <div class="col-md-6">
            <h3>Current Weather</h3>
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-6">
                        <h5 class="card-title"><?= $weather['weather'][0]['main'] ?></h5>
                        <p class="card-text"><?= $weather['weather'][0]['description'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <img src="https://openweathermap.org/img/w/<?= $weather['weather'][0]['icon'] ?>.png" alt="Weather Icon" class="c_weather_icon">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8"><h3>Temperature</h3></div>
                <div class="col-md-4"><a href=""><h3>&deg;c</h3></a></div>
            </div>
                
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-6">
                        <p class="card-text">Current temparature: <?= $weather['main']['temp'] ?></p>
                        <p class="card-text">Feels like: <?= $weather['main']['feels_like'] ?></p>
                    </div> 
                    <div class="col-md-6">   
                        <p class="card-text">Today Min: <?= $weather['main']['temp_min'] ?></p>
                        <p class="card-text">Today Max: <?= $weather['main']['temp_max'] ?></p>
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
                    <p class="card-text">Pressure: <?= $weather['main']['pressure'] ?> hPa</p>
                    <p class="card-text">Humidity: <?= $weather['main']['humidity'] ?>%</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3>Wind Information</h3>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Speed: <?= $weather['wind']['speed'] ?> m/s</p>
                    <p class="card-text">Direction: <?= $weather['wind']['deg'] ?>&deg;</p>
                    <p class="card-text">Gust: <?= $weather['wind']['gust'] ?> m/s</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>General Info</h3>
            <div class="card">
                <div class="card-body">
                    <!-- Convert Time to LK -->
                    <?php
                        $timestamp = $weather['sys']['sunrise']; 

                        // timestamp convert to UTC
                        $datetime = new DateTime();
                        $datetime->setTimestamp($timestamp);
                        $datetime->setTimezone(new DateTimeZone('UTC'));

                        // UTC to LK timee
                        $timezone_lk = new DateTimeZone('Asia/Colombo');
                        $datetime->setTimezone($timezone_lk);

                        $sunrise = $datetime->format('Y-m-d H:i:s');
                    ?>
                    <p class="card-text">Sunrise: <?php echo $sunrise; ?></p>
                    <!-- Convert Time to LK -->
                    <?php
                        $timestamp = $weather['sys']['sunset']; 

                        // timestamp convert to UTC
                        $datetime = new DateTime();
                        $datetime->setTimestamp($timestamp);
                        $datetime->setTimezone(new DateTimeZone('UTC'));

                        // UTC to LK timee
                        $timezone_lk = new DateTimeZone('Asia/Colombo');
                        $datetime->setTimezone($timezone_lk);

                        $sunset = $datetime->format('Y-m-d H:i:s');
                    ?>
                    <p class="card-text">Sunset: <?php echo $sunset; ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <h3>Cloud Coverage</h3>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Cloudiness: <?= $weather['clouds']['all'] ?>%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

