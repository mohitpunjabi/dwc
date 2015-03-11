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

<body class="welcome">
@include('partials.facebook')

<div class="container">

    <div class="content">
        @include('partials.ad')

        <div class="subtitle">DaWhimsiCo will be live on</div>
        <div class="title">3.14.15 9:26PM</div>

        <div class="fb-like" data-href="https://facebook.com/dawhimsico/" data-width="300" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>

</div>

</body>
</html>