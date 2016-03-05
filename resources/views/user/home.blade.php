@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-board">
        <div class="col-md-12">
            <h1 class="board-starred-heading"><span class="glyphicon glyphicon-user starred-boards" aria-hidden="true"></span> My Boards</h1>
            <div class="row boards-col">
                @foreach($boards as $board)
                    <div class="col-lg-3">
                        <a data-toggle="modal" href="{{ url('board?id=' . $board->id) }}" class="board-main-link-con">
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
                    <div class="board-create">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="board-create-head">
                                    <a data-toggle="modal" href='#create-new-board' class="board-create-link">Create New board...</a>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
