@extends('layouts.app')

@section('content')
<div class="profile-con" style="padding-left: 10px !important; padding-top: 60px !important; padding-right: 10px; padding-bottom: 0px;">
    @include('layouts.partials.profileintro')
    <div class="container">
	    <div class="row" style="margin-top: 15px;">
	    	<div class="col-lg-5 col-lg-offset-3">
			    <ul class="nav nav-tabs" role="tablist" style="padding-left: 150px;">
                    <li role="presentation" @if($page=='activity') class="active" @endif>
                        <a href="{{ route('user.activity') }}"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Activity</a>
                    </li>
                    <li role="presentation" @if($page=='profile') class="active" @endif>
                        <a href="{{ route('user.profile') }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Profile</a>
                    </li>	
                </ul>
	    	</div>
	    </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-lg-8 col-lg-offset-2">
                <ul>
                    <li>
                        <div class="media">
                            <div class="pull-left" style="    display: block; border: 1px solid #DCDCDC; border-radius: 4px; box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.17); padding: 3px;">
                                <img class="media-object" src="{{ asset('img/user_1.jpg') }}" style="width: 35px;">
                            </div>
                            <div class="media-body" style="padding-left: 15px; padding-top: 1px;">
                                <p style="margin-bottom: 1px;"><b>Zeeshan Ahmed</b> completed a task on Laravel in Today Board Name Welcome Board</p>
                                <p style="margin-bottom: 1px;"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Apr, 29 2016 at 9:55 pm</p>
                            </div>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <div class="media">
                            <div class="pull-left" style="    display: block; border: 1px solid #DCDCDC; border-radius: 4px; box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.17); padding: 3px;">
                                <img class="media-object" src="{{ asset('img/user_1.jpg') }}" style="width: 35px;">
                            </div>
                            <div class="media-body" style="padding-left: 15px; padding-top: 1px;">
                                <p style="margin-bottom: 1px;"><b>Zeeshan Ahmed</b> completed a task on Laravel in Today Board Name Welcome Board</p>
                                <p style="margin-bottom: 1px;"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Apr, 29 2016 at 9:55 pm</p>
                            </div>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <div class="media">
                            <div class="pull-left" style="    display: block; border: 1px solid #DCDCDC; border-radius: 4px; box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.17); padding: 3px;">
                                <img class="media-object" src="{{ asset('img/user_1.jpg') }}" style="width: 35px;">
                            </div>
                            <div class="media-body" style="padding-left: 15px; padding-top: 1px;">
                                <p style="margin-bottom: 1px;"><b>Zeeshan Ahmed</b> completed a task on Laravel in Today Board Name Welcome Board</p>
                                <p style="margin-bottom: 1px;"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Apr, 29 2016 at 9:55 pm</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection