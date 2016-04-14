<div class="modal fade" id="create-new-board">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Create Board</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    <div class="form-group" id="boardTitleCon">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" id="boardTitle" placeholder='Like "Home Construction" for example...' name="boardName">
                    </div>
                    <div class="form-group">
                        <h4>Team</h4>
                        <p>
                            Teams make sharing and working within a group even easier.
                            It does't look like you are a member of any teams <a data-toggle="modal" href='#create-team'>Create a team</a>.
                        </p>
                    </div>
                    <div class="form-group" id="boardPrivacyTypeCon">
                        <p><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> This board will be Private.</p>
                        <select name="boardPrivacyType" id="boardPrivacyType" class="form-control" required="required">
                            <option value="private">Private</option>
                            <option value="team">Team</option>
                            <option value="public">Public</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-board">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="see-closed-board">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Closed Boards</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default panel-custom">
                    <div class="panel-body">
                        <p>No boards have been closed.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create-team">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Closed Boards</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="" method="POST" role="form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required="required"></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <p>
                                    A teams is a group of boards and people. It helps keep your company, team, or family organized.
                                </p>
                                <p>
                                    <b>Business Class </b>gives your team more security, administrative controls and superpowers.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-profile-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Change profile info</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="title">Full Name</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="title">User Name</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="title">Initials</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="title">Bio</label>
                        <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="save-change">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="card-detail">
    <div class="modal-dialog" style="width: 720px;">
        <div class="modal-content">
            <div role="tabpanel">
                <div class="modal-header" style="border-bottom: none; padding-bottom: 0px !important;">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#general" aria-controls="tab" role="tab" data-toggle="tab">General</a>
                        </li>
                        <li role="presentation">
                            <a href="#date" aria-controls="tab" role="tab" data-toggle="tab">Date</a>
                        </li>
                        <li role="presentation">
                            <a href="#subtasks" aria-controls="tab" role="tab" data-toggle="tab">Subtasks</a>
                        </li>
                        <li role="presentation">
                            <a href="#comments" aria-controls="tab" role="tab" data-toggle="tab">Comments</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-body" style="padding-top: 10px; padding-left: 35px; padding-right: 35px;">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="general">
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <a href="#" data-type="text" class="input-editable editable-click" title="Enter Card Title" id="card_title_editable">Empty</a>
                                </div>           
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <a href="#" data-type="textarea" class="input-editable editable-click" title="Enter Card Description" id="card_description_editable">Empty</a>
                                </div>
                                <div class="form-group">
                                    <label for="">Labels</label>
                                    <a href="#" class="input-editable" id="card-tags-input" data-type="select2" data-title="Enter Labels"></a>
                                </div>
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <a href="#" class="input-editable" id="card_color" data-type="select" data-url="/post" data-title="Select Color of Card" style="color: #333333; font-weight: 100; font-style: italic;"></a>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="date">
                            <h1>Add due date and Time</h1>
                            <hr>
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="#" class="input-editable" id="event" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-title="Setup event date and time">Empty</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="subtasks">
                            <div class="addSubTaskCon">
                                <h2>Add subtask</h2>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="exampleInputAmount">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default">Add</button>
                                    </span>
                                </div>
                            </div>
                            <form action="" method="POST" role="form" style="margin-top: 12px;">
                                <div class="form-group sub-task-con">
                                    <div class="row">
                                        <div class="col-lg-11">
                                            <input class="magic-checkbox" type="checkbox" name="layout" id="1" value="option" data-taskid="1">
                                            <label for="1" class="sub-task-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                        </div>
                                        <div class="col-lg-1">
                                            <a href="" class="delete-task"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sub-task-con">
                                    <div class="row">
                                        <div class="col-lg-11">
                                            <input class="magic-checkbox" type="checkbox" name="layout" id="2" value="option">
                                            <label for="2" class="sub-task-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                        </div>
                                        <div class="col-lg-1">
                                            <a href="" class="delete-task"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sub-task-con">
                                    <div class="row">
                                        <div class="col-lg-11">
                                            <input class="magic-checkbox" type="checkbox" name="layout" id="3" value="option">
                                            <label for="3" class="sub-task-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                        </div>
                                        <div class="col-lg-1">
                                            <a href="" class="delete-task"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <div class="row" style="margin-top: 13px;">
                                <div class="col-lg-12">
                                    <form  method="POST" role="form" role="form">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                                                </div>  
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <button class="btn btn-default">Submit</button>
                                                </div>  
                                            </div>
                                        </div>
                                    </form>
                                    <div class="detailBox">
                                        <div class="actionBox">
                                            <ul class="commentList">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="commenterImage">
                                                              <img src="{{ asset('img/user_1.jpg') }}" class="img-responsive" />
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <div class="comment-user-name">
                                                                <h1>Zeeshan Ahmed</h1>
                                                            </div>
                                                            <div class="commentText">
                                                                <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="commenterImage">
                                                              <img src="{{ asset('img/user_1.jpg') }}" class="img-responsive" />
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <div class="comment-user-name">
                                                                <h1>Zeeshan Ahmed</h1>
                                                            </div>
                                                            <div class="commentText">
                                                                <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="commenterImage">
                                                              <img src="{{ asset('img/user_2.jpg') }}" class="img-responsive" />
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <div class="comment-user-name">
                                                                <h1>Zeeshan Ahmed</h1>
                                                            </div>
                                                            <div class="commentText">
                                                                <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>       
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="save-change" data-dismiss="modal">Save & Close</button>
                    <button type="button" class="btn btn-default" id="delete-card">Delete</button>
                </div>            
            </div>
        </div>
    </div>
</div>
