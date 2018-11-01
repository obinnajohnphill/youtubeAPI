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
            text-align: center;
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
    </style>
</head>

<body>

<div class="content">
    <div class="title m-b-md">
        <h2>YouTube Videos Search Result</h2>
    </div>

    @yield('content')
       <div align=left">
        <a class="btn btn-info btn-sm" float-right href="../"><strong>Back to the search page</strong></a>
      </div>
            <form id="form" method="post" action="/viewAll">
                   <input type="hidden" value="yes" name="viewAll"><br>
                <button type="submit" class="btn btn-primary btn-sm"><strong>View All Videos Saved</strong></button>
                {{ csrf_field() }}
            </form><br>

@if(!empty($successMsg))
        <div class="alert alert-success"><strong>{{ $successMsg }}</strong></div>
    @endif
    @if(!empty($unsuccessMsg))
        <div class="alert alert-danger"><strong>{{ $unsuccessMsg }}</strong></div>
    @endif
    @if(isset($results))
        @foreach($results as $result)
            <h4>{{$result['title']}}</h4>
            <br>
            <div class="media">
                <div class="media-body">
                    <iframe width="80%" height="500" src="http://www.youtube.com/embed/{{$result['video']}}" frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <br>
        @endforeach
    @else
           Something went wrong
        @endif

</div>
</body>
</html>

