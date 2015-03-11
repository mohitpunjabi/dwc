<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    @include('partials.meta')
    <title>DaWhimsiCo - March 14, 2015</title>

    <link rel="icon" type="image/ico" href="{{ asset('favico.png') }}" />
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css" />

    @include('partials.analytics')
</head>

<body>

    <div class="jumbotron">
        <div class="container">
            @include('partials.nav')
        </div>

        <div class="text-center">
            <img src="{{ asset('/img/logo-without-text.png') }}"/>
            <h1>DaWhimsiCo</h1>
            <p>
                There is but one rule. Hunt, or be hunted.
            </p>

            <button class="btn btn-primary btn-lg">Sign in</button>
            <button class="btn btn-lg">Register</button>
        </div>
    </div>

</body>
</html>