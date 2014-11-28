<?php
    $city = $_GET['city'];
    $city = str_replace(" ", "", $city);
    $url = "http://www.weather-forecast.com/locations/".$city."/forecasts/latest/";

    function get_http_response_code($url){
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
        }

    if (get_http_response_code($url) != "404"){
        $contents = file_get_contents($url);
        echo preg_match('/3 Day Weather Forecast Summary:<\/b>(.*?)<\/span>/s', $contents, $matches);
        echo $matches[1];
    }else{
        //error
        echo "";
    }
?>



