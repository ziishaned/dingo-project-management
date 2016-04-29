	@extends('layouts.app')

@section('content')
<div class="profile-con" style="padding-left: 10px !important; padding-top: 60px !important; padding-right: 10px; padding-bottom: 0px;">
    <div class="row user-profile-intro">
        <div class="col-lg-12">
        	<div class="media">
        		<div class="col-lg-offset-4">
	        		<div class="pull-left">
	        			<img class="media-object img-responsive img-thumbnail" src="{{ asset('img/user_1.jpg') }}" alt="Image">
	        		</div>
	        		<div class="media-body" style="padding-left: 20px;">
	        			<h4 class="media-heading" style="text-transform: capitalize; font-weight: bold;">{{ Auth::user()->name }}</h4>
	        			                        <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> {{ Auth::user()->email }}</p>
                        <p><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Joined on {{ Carbon\Carbon::parse(Auth::user()->created_at)->toFormattedDateString() }}</p>
	        		</div>
        		</div>
        	</div>
        </div>    
    </div>
    <div class="container">
	    <div class="row" style="margin-top: 15px;">
	    	<div class="col-lg-5 col-lg-offset-3">
			    <ul class="nav nav-tabs" role="tablist" style="padding-left: 150px;">
                    <li role="presentation" class="">
                        <a href="#"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Activity</a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="#"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Profile</a>
                    </li>	
                </ul>
	    	</div>
	    </div>
    </div>
</div>
@endsection