<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color : #fff;
            color            : #636b6f;
            font-family      : 'Nunito', sans-serif;
            font-weight      : 200;
            height           : 100vh;
            margin           : 0;
        }

        .full-height {
            height : 100vh;
        }

        .flex-center {
            align-items     : center;
            display         : flex;
            justify-content : center;
        }

        .position-ref {
            position : relative;
        }

        .top-right {
            position : absolute;
            right    : 10px;
            top      : 18px;
        }

        .content {
            text-align : center;
        }

        .title {
            font-size : 84px;
        }

        .links > a {
            color           : #636b6f;
            padding         : 0 25px;
            font-size       : 13px;
            font-weight     : 600;
            letter-spacing  : .1rem;
            text-decoration : none;
            text-transform  : uppercase;
        }

        .m-b-md {
            margin-bottom : 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">

            {{--<p>
                @if(0 < strlen($route))
                    {{ __('strings.welcome.forward_ok') }}
                @else
                    {{ __('strings.welcome.forward_fail') }}
                @endif
            </p>--}}

            <p>
                @if(env('APP_RESEARCH_DONE'))
                    Diese Aktion ist bereits abgelaufen.
                @elseif(0 < strlen($route) && env('APP_RESEARCH_DONE'))
                    Sie werden nachfolgend in 5 Sekunden weitergeleitet..
                @else
                    Weiterleitung nicht möglich<br />(ID Parameter in der URI fehlt)..
                @endif
            </p>

        </div>

        @if(0 < strlen($route) && !env('APP_RESEARCH_DONE'))
            {{--<p>({{ __('strings.welcome.forward_to', $route ) }})</p>--}}
            <p>(Weiterleitung nach {{ $route }})</p>
        @endif
    </div>
</div>
@if(0 < strlen($route) && !env('APP_RESEARCH_DONE'))
    <script>
      document.onreadystatechange = function () {
        if (document.readyState === "complete") {
          setTimeout(
            function () {
              window.location.replace("{{ $route }}");
            },
            5000
          )
        }
      }
    </script>
@endif
</body>
</html>
