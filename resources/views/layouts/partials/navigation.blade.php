@if (Auth::check())
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user.dashboard') }}">Dingo</a>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="text-transform: capitalize;">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ Auth::user()->name }} <span class="caret"></span>
                </a>    
                <ul class="dropdown-menu profile-dropdown" role="menu">
                    <li>
                        <p class="text-center">{{ Auth::user()->name }}</p>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('user.profile') }}">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.dashboard') }}">
                            Cards
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('/logout') }}">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
@else
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="{{ route('auth.login') }}">Dingo</a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            </ul>
        </div>
    </nav> 
@endif