@extends('layouts.app')

@section('content')
<div class="board-list-con" style="padding-left: 10px !important; padding-top: 40px !important; padding-right: 0px; padding-bottom: 0px;">
    <div class="my-board">
        <h1 class="board-starred-heading" style="margin-top: 10px;margin-left: 15px;font-weight: 500;font-size: 25px;"><span class="glyphicon glyphicon-list-art starred-boards" aria-hidden="true"></span> My Boards</h1>
        <div class="row boards-col">
            @foreach($boards as $board)
                <div class="col-lg-3">
                    <a data-toggle="modal" href="{{ url('board/' . $board->id) }}" class="board-main-link-con">
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
