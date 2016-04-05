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
    <div class="modal-dialog">
        <div class="modal-content">
            <div role="tabpanel">
                <div class="modal-header" style="border-bottom: none; padding-bottom: 0px !important;">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#general" aria-controls="tab" role="tab" data-toggle="tab">General</a>
                        </li>
                        <li role="presentation">
                            <a href="#dates" aria-controls="tab" role="tab" data-toggle="tab">Dates</a>
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
                                    <div class="tm_editable_container input-group theme1" id="board_title">
                                        <input type="text">
                                    </div>
                                </div>           
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Labels</label>
                                    <input type="text" class="form-control" id="cardTagsInput">
                                </div>
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <select name="" id="input" class="form-control" required="required">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="dates">
                            <h1>Add due date and Time</h1>
                            <hr>
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="datetimepicker12"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="subtasks">
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <input class="magic-checkbox" type="checkbox" name="layout" id="1" value="option">
                                    <label for="1">OKOK</label>
                                </div>
                                <div class="form-group">
                                    <input class="magic-checkbox" type="checkbox" name="layout" id="2" value="option">
                                    <label for="2">OKOK</label>
                                </div>
                                <div class="form-group">
                                    <input class="magic-checkbox" type="checkbox" name="layout" id="3" value="option">
                                    <label for="3">OKOK</label>
                                </div>
                            </form>
                            <div class="addSubTaskCon">
                                <h2>Add subtask</h2>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="exampleInputAmount">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default">Add</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <h2><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Add Comment</h2>
                            <form action="" method="POST" role="form" style="height: 123px;">
                                <div class="form-group">
                                    <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Send</button>
                            </form>
                            <div class="panel panel-primary" style="margin-top: 20px;">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Comments</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-1" style="top: 8px;">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-lg-11">
                                            <h5><strong>Zeeshan Ahmed</strong></h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam voluptas deserunt amet magnam consectetur praesentium nam animi facilis eius rem, neque molestiae a, dolorum velit ipsam, inventore maxime numquam laudantium.</p>
                                            <p><span>an hour ago</span> - <span><a href="#">Edit</a></span> - <span><a href="#">Delete</a></span></p>
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