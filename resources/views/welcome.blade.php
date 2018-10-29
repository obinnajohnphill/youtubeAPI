<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>YouTube API</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: left;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

       #form{
            min-width: 0;
            width: 70%;
            display: inline;
        }


    </style>


</head>
<body>

<div class="content">
    <div class="title m-b-md">
        <h2>Welcome to Obinna's YouTube Videos API</h2>
    </div>

    <form id="form" method="post" action="/videos">
        <br>
        <div class="col-md-4" align ="left">
            <label for="searchItem">Search Video:</label>
            <input required type="text" class="form-control form-control input-lg"  placeholder="Enter a search keyword" name="searchItem"><br>
            <label for="num_of_video">Number of Videos:</label>
            <input required  type="number" min="1" max="50" class="form-control form-control input-lg" id="num_of_video" placeholder="Select number of videos (maximum: 50)" name="num_of_video"><br>
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        {{ csrf_field() }}
    </form>

</div>

</body>
</html>