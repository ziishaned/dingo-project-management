@extends('layouts.app')

@section('content')
<div class="board-list-con" style="padding-left: 10px !important; padding-top: 40px !important; padding-right: 0px; padding-bottom: 0px;">
    @if(sizeof($starredBoards) > 0)
        <div class="my-fv-board">
            <h1 class="board-starred-heading" style="margin-top: 10px;margin-left: 15px;font-weight: 500;font-size: 25px;"><span class="glyphicon glyphicon-star-empty starred-boards" aria-hidden="true"></span> Starred Boards</h1>
            <div class="row boards-col">
                @foreach($starredBoards as $board)
                    <div class="col-lg-3" data-boardid="{{ $board->id }}">
                        <a href="{{ url('board/' . $board->id) }}" class="board-main-link-con">
                            <div class="board-link">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h2 style="font-size: 20px; ">
                                            {{ $board->boardTitle }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="my-board">
        <h1 class="board-starred-heading" style="margin-top: 10px;margin-left: 15px;font-weight: 500;font-size: 25px;"><span class="glyphicon glyphicon-list-alt starred-boards" aria-hidden="true"></span> My Boards</h1>
        <div class="row boards-col">
            @if(sizeof($boards) > 0)
                @foreach($boards as $board)
                    <div class="col-lg-3">
                        <div class="board-link" style="cursor: pointer;" data-boardid="{{ $board->id }}">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h2 style="margin-top: 5px;">
                                        <a href="{{ url('board/' . $board->id) }}" class="board-main-link-con" style="font-size: 20px; color: #FFFFFF;">
                                            {{ $board->boardTitle }}
                                        </a>
                                    </h2>
                                </div>
                                <div class="col-lg-2">
                                    <p style="margin-top: 12px;">
                                        <a href="#" style="font-size: 20px; {{ ($board->is_starred == 1) ? 'color: #FFEB3B;' : 'color: #FFF;' }}" id="make-fv-board"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="col-lg-3">
                <a data-toggle="modal" href='#create-new-board' class="board-create-link">
                    <div class="board-create">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="board-create-head">
                                    Create New board...
                                </h1>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
