@extends('layouts.app')

@section('content')
<div class="well well-lg well-cus">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-lg-offset-3 profile-img-con">
                <div class="profile-img"></div>
            </div>  
            <div class="col-lg-4 col-lg-offset-1">
                <h1 class="user-pro-name">Zeeshan Ahmed</h1>
                <button type="button" class="btn btn-default edit-user-data-btn" data-toggle="modal" href="#edit-profile-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Profile</button>
            </div>
        </div>
        <div class="row nav-profile-con">
            <div class="col-lg-8 col-lg-offset-4">
                <div class="btn-group-horizontal">
                    <a class="btn btn-default nav-profile" href="#" role="button">Profile</a>
                    <a class="btn btn-default nav-profile" href="#" role="button">Cards</a>
                    <a class="btn btn-default nav-profile" href="#" role="button">Settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection