@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="user-board-title pull-left">{{ $boardDetail['boardTitle'] }} <span class="glyphicon glyphicon-star" aria-hidden="true"></span></h2>   
            <h2 class="user-board-privacy-type pull-right">
                <a  class="dropdown-toggle user-board-privacy-type" data-toggle="dropdown" role="button" aria-expanded="false" href="{{ url('/register') }}"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> {{ $boardDetail['boardPrivacyType'] }}</a>
                <ul class="dropdown-menu profile-dropdown" role="menu">
                    <li class="text-center">Change Visibility</li>
                    <li class="divider"></li>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h5><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Private <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></h5>   
                            <p>The Board is private. Only people added to the board can view and edit it.</p>
                        </li>
                        <li class="list-group-item">
                            <h5><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Private</h5>   
                            <p>The Board is private. Only people added to the board can view and edit it.</p>
                        </li>
                        <li class="list-group-item">
                            <h5><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Private</h5>   
                            <p>The Board is private. Only people added to the board can view and edit it.</p>
                        </li>
                    </ul>
                </ul>
            </h2>
        </div>
    </div>
</div>
<div class="horizontal-container">
    <div class="row horizontal-row list-sortable">
        @foreach($lists as $list)
            <div class="bcategory-list">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title board-panel-title">{{ $list['list_name'] }}</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <div data-id="{{ $list->id }}">
                                {{-- <li class="list-group-item board-list-items"><a data-toggle="modal" href="#card-detail">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero unde labore voluptates numquam</a></li> --}}
                            </div>
                        </ul>
                        <a href="#" class="show-input-field">Add a card...</a>
                        <form action="" method="POST" role="form" style="display: none;">
                            <div class="form-group" id="dynamic-board-input-con" style="margin-bottom: 8px;">
                                <textarea name="card-title" class="form-control" rows="3"></textarea>
                                <input type="hidden" name="list_id" value="{{ $list->id }}">
                                <input type="hidden" name="board_id" value="{{ $boardDetail['id'] }}">    
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <button type="submit" class="btn btn-primary" id="saveCard">Save</button> <span class="glyphicon glyphicon-remove close-input-field" aria-hidden="true"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="bcategory-list">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="#" class="show-input-field">Add a list...</a>
                    <form action="" class="add-board-list-form" method="POST" role="form" style="display: none;">
                        <div class="form-group" id="dynamic-board-input-con" style="margin-bottom: 8px;">
                            <input type="text" class="form-control" name="list_name">
                            <input type="hidden" name="board_id" value="{{ $boardDetail['id'] }}">
                        </div>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <button type="submit" class="btn btn-primary" id="saveListName">Save</button> <span class="glyphicon glyphicon-remove close-input-field" aria-hidden="true"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection