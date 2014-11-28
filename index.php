<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http_equiv="Content-type" content="text/html; charset=utf-8">
    
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<title>Weather Scraper</title>

<style>

    html, body {
        height:100%;
        color:white;
    }

    p {
        font-size:1.5em;
    }

    .container{
        background-image:url("/weather-predictor/images/beach_background.jpg");
        width:100%;
        height:100%;
        background-size:cover;
        background-position:center;
        padding-top:50px;
    }

    .center {
        text-align:center;
        }

    #location {
        margin-bottom: 20px;
    }  

    .alert{
        display:none;
    }
</style>
</head>
<body>
        <div class="container">
        <div class="row center">
            <div class="col-md-6 col-md-offset-3">
                <div>
                    <h1>Weather Predictor</h1></br>
                    <p>Enter a city to get a 3 day forecast.</p>
                </div>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Eg. Calgary, Berlin, Sydney"> 
                        <input id="findWeather" name="forecast" type="submit" class="btn btn-success" value="Get Forecast">
                    </div>
                </form>
                <div id="successAlert" class="alert alert-success">Success, weather retrieved!</div>
                <div id="failAlert" class="alert alert-danger">Could not find weather data for that city.</div>
            </div>
        </div>
    </div>
    <script>
        $("#findWeather").click(function(event){
            event.preventDefault();
            $("#successAlert").hide();
            $("#failAlert").hide();
            if ($("#location").val() != ""){
                
                $.get("scraper.php?city="+$("#location").val(), function(data){
                    if ($.trim(data) == ""){
                        $("#failAlert").fadeIn();
                    }else if(data == false){
                        $("#failAlert").fadeIn();
                    }else{
                        $("#successAlert").html(data).fadeIn();
                    }
                });
            }else{
                $("#failAlert").fadeIn();
            }
          });
    </script>
</body>
</html>    



