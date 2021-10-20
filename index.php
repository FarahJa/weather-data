<?php 
    error_reporting(E_ALL ^ E_NOTICE);

    require_once ('data.php');

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>

    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/style.css">

</head>
<body>

<nav class="navbar navbar-dark bg-dark  ">
  <a class="navbar-brand float-left"><img src="img/icon.png" width="37px" height="37px"></a>
  
    <!-- Search box -->
    <form class="col-lg-4 col-md-6 col-sm-8 col-10" action="" method="get">

    <div class="input-group" >
  <input type="text" class="form-control" name="city" id="city" placeholder="Enter City Name" >
  <div class="input-group-append">
    <button class="btn btn-light btn-outline-secondary" type="submit" name="submit" >Search</button>
  </div>
</div>
</form>

</nav>

    <!--Main Container-->
    <div class="container-fluid d-flex align-content-center bg-light" style="height: 90vh; background-color: #6dd5ed">

    
    <!--Main box-->
    <div class="row bg-white mx-auto my-5 " style="height:475px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 10px; width: 380px;">

    
    <!-- City and weather data-->
    
        <?php 

        if(isset($_GET['submit'])){
            $cityName = $_GET['city'];
            weatherData($cityName);
        }
        else{
                
                    $ip = $_SERVER['REMOTE_ADDR'];
                $ipURL = file_get_contents("http://ipinfo.io/$ip/geo");
                $ipData = json_decode($ipURL, true);
                $userCity = $ipData['city'];
                
            weatherData($userCity);
        }
    ?>


</div>
</div>
    
</body>
</html>