            <?php
            function weatherData($city){
            $apiURL = "https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=771265c048e85b3ab0fcf0bbbd11749e";
            $apiData = file_get_contents($apiURL);
            $weatherArray = json_decode($apiData, true);
            $city_name = $weatherArray['name'];
            $country = $weatherArray['sys']['country'];
            $weather_desc =$weatherArray['weather']['0']['description'];
            $temp = $weatherArray['main']['temp'];
            $temp = round($temp - 273.15);
            $temp_min = round(($weatherArray['main']['temp_min'] )- 273.15);
            $temp_max = round(($weatherArray['main']['temp_max'])-273.15);
            $pressure = $weatherArray['main']['pressure'];
            $humidity = $weatherArray['main']['humidity'];
            $wind_speed = $weatherArray['wind']['speed'];
            $img_code = $weatherArray['weather']['0']['icon'];
            $date = date("Y-m-d");
            $day = date('l', strtotime($date));
    
            echo '<div class="d-flex flex-column mx-auto  w-100 " >
            
            <div id="city-info" class="text-center text-white" style="background-color: rgb(156,27,105)">
            <div class="pt-5 pb-4">
            <img class="mb-2 text-center"  width ="31px" height="31px" src="img/location.png" alt="location"><span style="font-weight: bold;font-size: 23px;">'.$city_name.'</span>, <span> '.$country.'</span>
            <p > '. $day.', '.$date.'</p>
            </div>
            </div>
            <br/> 
            <div id="weather-data" class="d-flex flex-row mx-auto pt-2 w-100" >
            <div id="main-data" class="d-flex flex-column align-items-center  mt-2  ml-4 mr-4" >
            <img class="text-center" src="img\\'.$img_code.'.png" height="108px" width="108px" alt="icon">
            <h3 class="text-center pt-3 ">'.$temp.'&deg;</h3>
            <h6 class="text-center pt-2" style="text-transform:capitalize;">'.$weather_desc.'</h6>
            </div>

            <div id="vertical-line" class="">
            </div>

            <div id="highlights" class="pt-2 w-50 pl-3" >
            <h6 class="pb-1">Highlights</h6>
            <div  class="d-flex flex-row">
            <div>
            <p>Humidity</p>
             <p>Pressure</p>
             <p>Min Temp</p> 
             <p>Max Temp</p>
             <p>Wind Speed</p>
            </div>
            <div class="pl-2">
             <p>'.$humidity.'%</p>
             <p>'.$pressure.'</p>
             <p> '.$temp_min.'&#8451;</p> 
             <p> '.$temp_max.'&#8451;</p>
             <p> '.$wind_speed.'km/h</p>
            </div>
            </div>
            <div>
            
            </div> 
            </div>';
        }

        ?>