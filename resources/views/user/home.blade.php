@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-board">
        <div class="col-md-12">
            <h1 class="board-starred-heading"><span class="glyphicon glyphicon-user starred-boards" aria-hidden="true"></span> My Boards</h1>
            <div class="row boards-col">
                <div class="col-lg-4">
                    <div class="board-create">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
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
