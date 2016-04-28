<h1 style="color: #393333; text-align: center;font-family: arvo;font-weight: 800;position: fixed;top: 8px;margin: 0px;/* left: 50%; */width: 100%;"><span id="brand-name"></span></h1>
@if (Auth::check())
    <button type="button" class="navbar-toggle toggle-left pull-left" data-toggle="sidebar" data-target=".sidebar-left" style="border-color: #ddd; margin-left: 10px; position: absolute; z-index: 1000;">
      <span class="icon-bar" style="background-color: #888;"></span>
      <span class="icon-bar" style="background-color: #888;"></span>
      <span class="icon-bar" style="background-color: #888;"></span>
    </button>

    <div class="col-xs-7 col-sm-3 col-md-3 sidebar sidebar-left sidebar-animate" style="padding: 0px; background-color: #fff; border-right: 1px solid #eee;top: 0;box-shadow: 0px 0px 12px rgba(0,0,0,.175); z-index: 10000;">
        <h1 style="text-align: center; font-family: arvo; font-weight: 800;"><a href="{{ route('user.dashboard') }}" style="color: #393333;">Dingo</a></h1>
        <ul class="nav navbar-stacked sidebar-inner">
            <li>
                <div class="media" style="padding-left: 15px;">
                    <div class="pull-left">
                        <img class="media-object img-responsive img-thumbnail" src="{{ asset('img/user_1.jpg') }}">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading" style="text-transform: capitalize; font-weight: bold;">{{ Auth::user()->name }}</h4>
                        <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> {{ Auth::user()->email }}</p>
                        <p><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Joined on {{ Carbon\Carbon::parse(Auth::user()->created_at)->toFormattedDateString() }}</p>
                    </div>
                </div>
            </li>
            <li>
                <form class="navbar-form" role="search">
                    <div class="form-group">
                        <input type="text" id="typeahead" class="form-control" data-provide="typeahead">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </li>
            <li style="margin-top: 10px;">
                <a href="{{ route('user.profile') }}" style="color: #393333;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Profile</a>
            </li>
            <li>
                <a href="#" style="color: #393333;"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> About</a>
            </li>
            <li>
                <a href="#" style="color: #393333;"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Contact</a>
            <li>
                <a href="{{ url('/logout') }}" style="color: #393333;"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a>
            </li>
        </ul>
    </div>
@endif
<div class="overlay"></div>
{{-- div overlay po f top 0 left 0 wid 100% hei 100% z-index 999  --}}
{{-- @if (Auth::check())
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
@endif --}}