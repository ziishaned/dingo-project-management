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