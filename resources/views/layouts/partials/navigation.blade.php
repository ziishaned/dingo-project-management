@if (Auth::check())
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle mega-dingo-dropdown"  role="button" aria-expanded="false">Dingo</a>
                        <ul class="dropdown-menu dingo-dropdown" role="menu">
                            <li>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Find boards by name...">
                                </div>
                            </li>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Starred Boards <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                                            </a>
                                        </h4>
                                    </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <a href="{{ url('board') }}">ok</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Recent Boards <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        okok
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Boards <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        ok
                                    </div>
                                </div>
                            </div>
                        </div>                            
                            <li>
                                <div class="form-group">
                                    <a class="btn btn-default form-control" data-toggle="modal" href='#create-new-board'>Create new board</a>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <a class="btn btn-default form-control" href="#" role="button">Always keep this menu open</a>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <a class="btn btn-default form-control" data-toggle="modal" href='#see-closed-board'>See closed board</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-nav brand-logo-con">
                    <li class="brand-logo"><img src="{{ asset('img/brand-logo.png') }}" alt=""> <span>Dingo</span></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>    
                        <ul class="dropdown-menu profile-dropdown" role="menu">
                            <li>
                                <p class="text-center">Zeeshan Ahmed</p>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Cards
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Settings
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">Help</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="{{ url('/register') }}"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a>
                        <ul class="dropdown-menu profile-dropdown" role="menu">
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </li>
                            <li class="divider"></li>
                            <li>
                                Voluptatem accusantium, facere doloribus totam dignissimos 
                            </li>
                        </ul>
                    </li>                    
                </ul>
            </div>
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