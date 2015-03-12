<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#dwc-navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo-without-text.png') }}" alt="DaWhimsiCo" title="DaWhimsiCo" height="20" /></a>
        </div>

        <div class="collapse navbar-collapse" id="dwc-navbar">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}#about">About</a></li>
                <li><a href="{{ url('/') }}#prizes">Prizes</a></li>
                <li><a href="{{ url('/') }}#contact">Contact</a></li>
                @if(Auth::user())
                    <li><a href="{{ url('/leaderboard') }}">Leaderboard</a></li>
                    <li><a href="{{ url('/levels') }}">Levels</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{ Auth::user()->gravatar }}" height="20" alt="{{ Auth::user()->name }}" /> {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>