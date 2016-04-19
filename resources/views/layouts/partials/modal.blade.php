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
                                    <input type="text" id="card-tags-input">
                                </div>
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <select id="card_color">
                                        <option value="">Select a color...</option>
                                        <option value="61BD4F">Green</option>
                                        <option value="F2D600">Yellow</option>
                                        <option value="FFAB4A">Orange</option>
                                        <option value="EB5A46">Red</option>
                                        <option value="C377E0">Purple</option>
                                        <option value="0079BF">Blue</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="date">
                            <h1>Add due date and Time</h1>
                            <hr>
                            <form action="" method="POST" role="form" style="height: 65px;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h1 class="label" style="color: #333333; padding-left: 0px; font-size: 16px;">Created at: </h1>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                            <input type='text' class="form-control" id='created-at' aria-describedby="basic-addon1" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h1 class="label" style="color: #333333; padding-left: 0px; font-size: 16px;">Due Date: </h1>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                            <input type='text' class="form-control" data-format="dd-MM-yyyy hh:mm:ss" id='due-date' aria-describedby="basic-addon1"/>
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
                            <div class="task-list-con" style="margin-top: 12px;"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <div class="row" style="margin-top: 13px;">
                                <div class="col-lg-12">
                                    <h1 style="font-family: monospace; font-size: 23px; font-weight: 700; margin: 0;">Post a Comment: </h1>
                                    <hr style="margin-top: 5px;">
                                    <form  method="POST" role="form" role="form">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div class="form-group">
                                                    <textarea name="adasd" id="comment-input" class="form-control" rows="3" required="required"></textarea>
                                                </div>  
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <button class="btn btn-default" id="submit-comment">Submit</button>
                                                </div>  
                                            </div>
                                        </div>
                                    </form>
                                    <div class="detailBox">
                                        <div class="actionBox">
                                            <ul class="commentList frame">
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
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-change">Save Changes</button>
                    <button type="button" class="btn btn-danger" id="delete-card"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                </div>            
            </div>
        </div>
    </div>
</div>
