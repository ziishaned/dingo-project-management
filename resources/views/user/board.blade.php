@extends('layouts.app')

@section('content')
<div class="horizontal-container frame">
    <div class="row horizontal-row list-sortable">
        @foreach($lists as $list)
            <div class="bcategory-list" data-list-id="{{ $list['id'] }}">
                <div class="panel panel-default">
                    <div class="panel-heading" style="border-bottom: 0px; ">
                        <div class="row">
                            <div class="col-lg-10">
                                <h3 class="panel-title board-panel-title" data-pk="{{ $list['id'] }}">{{ $list['list_name'] }}</h3>
                            </div>
                            <div class="col-lg-2">
                                <span data-listid="{{ $list['id'] }}" class="glyphicon glyphicon-trash delete-list" aria-hidden="true" style="cursor: pointer; top: 3px;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body card-list-con frame">
                        <ul class="list-group">
                            <div class="card-con" data-listid="{{ $list->id }}">
                                @foreach($cards as $card)
                                    @if($card['list_id'] === $list['id']) 
                                        <li class="list-group-item board-list-items" id="card_{{ $card['id'] }}" data-cardid ="{{ $card['id'] }}" data-toggle="modal" href="#card-detail">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p style="margin-bottom: 0px;" class="pull-left">{{ $card['card_title'] }}</p>    
                                                    <ul class="card-description-intro list-inline pull-right">
                                                        @if($card["card_description"] !== '')
                                                            <li id="card_description">
                                                                <a href="#" data-placement="bottom" data-toggle="tooltip" title="This card has a description." ><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>
                                                            </li>
                                                        @endif
                                                        @foreach($cardTaskCount as $x) 
                                                            @if($x["id"] === $card['id'])
                                                                @if($x['totalTasks'] > 0)
                                                                    <li id="totalTasks">
                                                                        <a href="#" data-placement="bottom" data-toggle="tooltip" title="This card have {{ $x['totalTasks'] }} tasks." data-totaltask="{{ $x['totalTasks'] }}"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></a>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        @if($card['totalComments'] > 0) 
                                                            <li id="totalComments">
                                                                <a href="#" data-placement="bottom" data-toggle="tooltip" title="This card have {{ $card['totalComments'] }} comments." data-totalComments="{{ $card['totalComments'] }}"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>                                            
                                        </li>
                                    @endif
                                @endforeach
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