<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body{
                font-family: 'Open Sans', sans-serif;
                margin-top: 30px;
                background-color: #fff;
                text-align: center;
                color: #000;
            }
            .error-heading{
                font-size: 100px;
                line-height: 100px;
                font-weight: bold;
                padding-top: 30px;
            }
            img{
                max-width: 100%;
            }
            .error-main h1{
                font-size: 50px;
                margin: 0px;
                color: #080808;
                font-weight: bold;
                line-height: 50px;
                padding-bottom: 30px;
            }
            .error-main h2{
                font-size: 25px;
                color: #080808;
                font-family: 'Roboto', sans-serif;
                font-weight: 400;
                padding-top: 25px;
                line-height: 45px;
            }
            .require-links ul{padding-top: 30px;}
            .require-links li{
                display: inline-block;
                line-height: 15px;
                font-family: 'Roboto', sans-serif;
                font-weight: 500;
            }
            .require-links li a{
                font-size: 24px;
                color: #f5b11a;
                text-align: center;
                line-height: 1.2; 
            }
            .seperator-td{
                margin: 0 5px;
                font-size: 30px;
                vertical-align: sub;
            }
        </style>

    </head>
    <body>
        <div class="error-main">
            <h1>Oops... <br/> Page not found</h1>
            <img src="/assets/images/Robot.png" alt="404"/>
            <div class="error-heading">404</div>
            <h2>Looks like you're lost... <br/>
                Don't worry.... it happens to the best of us :)<br/>
                Try these links below:
            </h2>
            <ul class="require-links">
                <li class="seperator-td">•</li>
                <li><a href="{{route('index')}}">Home</a></li>
            </ul>
        </div>
    </body>
</html>
