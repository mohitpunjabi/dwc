<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    @include('partials.meta')
    <title>DaWhimsiCo - Online treasure hunt - Starting March 14, 2015</title>

    <link rel="icon" type="image/ico" href="{{ asset('favico.png') }}" />
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>


    @include('partials.analytics')
</head>

<body>
    @include('partials.facebook')

    <div class="jumbotron main">
        <div class="container">
            @include('partials.nav')
        </div>

        <div class="text-center">
            <img src="{{ asset('/img/logo-without-text.png') }}" title="DaWhimsiCo" alt="DaWhimsiCo"/>
            <h1 class="logo">DaWhimsiCo</h1>
            <p class="logo">There is but one rule. Hunt, or be hunted.</p>

            @if(Auth::guest())
                <a href="{{ url('/auth/login') }}" class="btn btn-primary btn-lg">Login</a>
                <a href="{{ url('/auth/register') }}" class="btn btn-default btn-lg">Register</a>
            @else
                <a href="{{ url('/home') }}"  class="btn btn-success btn-lg">Start playing now</a>
<!--                <a class="btn btn-primary btn-lg">Visit the forums</a> -->
            @endif

            <br/><br/>
        </div>

        <div class="text-center">
            <button class="btn btn-lg btn-circle"><i class="glyphicon glyphicon-chevron-down"></i></button>
        </div>
    </div>

    <div id="about" class="container welcome">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>
                        Who are we? What do we do? <br/>
                        <small>What does DaWhi- (what was it called again?) Dawhimsico even mean?</small>
                    </h1>
                </div>

                <p class="lead">Very simply put, DaWhimsiCo is an online treasure hunt.</p>
                <p class="lead">
                    <strong>What is an online treasure hunt?</strong><br/>
                    It is an event that tests your ability to connect the dots by using your intelligence.
                    It is an exercise for the mind, a challenge you seek, the knowledge you long for, the work out your neurons ache for.
                </p>

                <p class="lead">
                    <strong>How do we do this you ask?</strong><br/>
                    By navigating a player from the movie <a href="http://www.imdb.com/title/tt1375666/" target="_blank">Inception</a>
                    to the popular gun manufacturing brand <a href="http://www.beretta.com" target="_blank">Baretta</a> to the cricketer
                    <a href="http://en.wikipedia.org/wiki/Dominic_Cork" target="_blank">Dominic Cork</a> with the help of a bunch of keywords.
                    Some of our previous topics include <a href="http://en.wikipedia.org/wiki/Cardrona_Bra_Fence" target="_blank">a bra
                    fence in New Zealand</a> and the <a href="http://en.wikipedia.org/wiki/Smith_number" target="_blank">Smith Number</a>.
                </p>

                <p class="lead">
                    We hide hints and clues in plain sight for you to decipher, and ask of you to use your aptitude to come up
                    with something logical from complete gibberish.
                </p>

                <p class="lead">
                    <a class="btn btn-primary">Login</a> or <a>register</a> to get started. <em>Happy hunting!</em>
                    <br/>

                    <div class="text-center facebook-like">
                        <div class="fb-like" data-href="https://facebook.com/dawhimsico/" data-width="250" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
                    </div>
                </p>
            </div>
        </div>
    </div>

    <div id="prizes" class="jumbotron">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Solve a level, and get prizes worth Rs. 20,000.</h1>

                <p class="text-center">
                    This contest is a part of <a href="http://srijanism.org" target="_blank">Srijan 2015</a>, the cultural fest
                    of <a href="http://www.ismdhanbad.ac.in" target="_blank">Indian School of Mines, Dhanbad</a>.
                    Solve each level and get amazing prizes, sponsored by the <a href="http://www.ebay.in/" target="_blank">eBay</a>,
                    <a href="http://www.cleartrip.com/" target="_blank">Cleartrip</a>,  <a href="http://www.americanswan.com/" target="_blank">American Swan</a>
                    and <a href="http://500px.com/" target="_blank">500px</a>.
                </p>
                <p class="text-center">
                    <a href="http://www.ebay.in/" target="_blank"><img class="img-thumbnail sponsor" src="https://cdn4.iconfinder.com/data/icons/flat-brand-logo-2/512/ebay-256.png" /></a>
                    <a href="http://www.cleartrip.com/" target="_blank"><img class="img-thumbnail sponsor" src="http://domaindisputesindia.com/wp-content/uploads/2013/03/cleartrip_logo.jpeg" /></a>
                    <a href="http://www.americanswan.com/" target="_blank"><img class="img-thumbnail sponsor" src="http://static.americanswan.com/Lecom_Magento/skin/frontend/enterprise/lecom/images-v3/as-logo-new.png" /></a>
                    <a href="http://500px.com/" target="_blank"><img class="img-thumbnail sponsor" src="https://camo.githubusercontent.com/e058bc1d6d4a60162abd9eff196e7d59b3d2c5a6/687474703a2f2f7777312e70727765622e636f6d2f707266696c65732f323031322f30342f31392f393432313937372f67495f3132323336355f35303070785f6c6f676f5f3235302e706e67" /></a>
                </p>

            </div>
        </div>
    </div>

    <div id="contact" class="container welcome">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center">Who made this sh*t?</h1>

            <p class="lead">
                We are the game changers, we are the people who <strike>don’t care for modesty and think they’re funny</strike>
                come along once in a while and redefine the way something is done.
            </p>

            <p class="text-center lead">
                <a class="btn btn-primary btn-lg" href="https://facebook.com/dawhimsico">Facebook</a>
                <a class="btn btn-primary btn-lg" href="https://twitter.com/dawhimsico">Twitter</a>
                <a href="mailto:info@dawhimsico.com">info@dawhimsico.com</a>
            </p>

            <div class="text-center">
                For more details, log on to
                <a href="http://www.VVSdotball64dotball2Wlaxman.com">www.VVSdotball64dotball2Wlaxman.com</a> and say
                <a href="{{ url('glennmcgrath') }}">Ooo Ahaa Glenn McGrath!</a>

            </div>

            <hr/>
            <p class="text-center">
                <a href="http://srijanism.org" target="_blank"><img src="http://srijanism.org/img/srijan%20mask1.png" class="img" height="50" /></a>
                <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" class="img" height="50" alt="DaWhimsiCo" /></a>
            </p>
        </div>
    </div>
</body>
</html>