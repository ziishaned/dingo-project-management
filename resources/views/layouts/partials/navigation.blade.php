<button type="button" class="navbar-toggle toggle-left pull-left" data-toggle="sidebar" data-target=".sidebar-left" style="border-color: #ddd; margin-left: 10px; position: absolute;">
  <span class="icon-bar" style="background-color: #888;"></span>
  <span class="icon-bar" style="background-color: #888;"></span>
  <span class="icon-bar" style="background-color: #888;"></span>
</button>
<div class="col-xs-7 col-sm-3 col-md-3 sidebar sidebar-left sidebar-animate" style="padding: 0px; background-color: #fff; border-right: 1px solid #eee;top: 0;box-shadow: 0px 0px 12px rgba(0,0,0,.175); z-index: 10000;">
  <ul class="nav navbar-stacked">
    <li class="active">
      <a href="#" style="color: #444; display: block; font-size: 15px; height: 64px; line-height: 64px; padding: 0 15px;">Home</a>
    </li>
    <li>
      <a href="#" style="color: #444; display: block; font-size: 15px; height: 64px; line-height: 64px; padding: 0 15px;">About</a>
    </li>
    <li>
      <a href="#" style="color: #444; display: block; font-size: 15px; height: 64px; line-height: 64px; padding: 0 15px;">Contact</a>
    </li>
  </ul>
</div>
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