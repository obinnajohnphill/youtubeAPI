

<html>
<head>
    <title>YouTube API @yield('title')</title>
</head>
<body>

<div class="container">
    @yield('content')
    @if(isset($data))
        @foreach ($data as $video)
            <h4>{{$data['decription']}}</h4>
            <br>
            <div class="media">
                <div class="media-body">
                    <iframe width="700" height="315" src="http://www.youtube.com/embed/{{$data['video']}}" frameborder="0" allowfullscreen>
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

