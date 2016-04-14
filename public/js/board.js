$(document).ready(function() {
    var Board = {
        init: function(params) {
            this.params = params;
            this.bindUI();
            this.initCradDrag();
            this.initEditableListName();
        },
        initCradDrag: function () {
            $(".card-con").each(function(index, el) {
                $(el).sortable({
                    connectWith: ".card-con",
                    placeholder: "dashed-placeholder",
                    revert: 200,
                    receive: function( event, ui ) {
                        var targetList = event.target;
                        var targetCard = ui.item[0];
                        var listId = $(targetList).data('listid');
                        var cardId = $(targetCard).data('cardid');

                        $.ajax({
                            url: 'changeCardList',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                listId: listId, 
                                cardId: cardId
                            },
                            success: function (data) {
                                console.log(data);
                            },
                            error: function (error) {
                                var response = JSON.parse(error.responseText);
                                console.log(response);
                            }
                        });

                    },
                }).disableSelection();
            });
        },
        initEditableListName: function () {
            $(".board-panel-title").each(function(index, el) {
                $.fn.editable.defaults.mode = 'popup';
                $(el).editable({
                    validate: function(value) {
                        if($.trim(value) == '') 
                            return 'Value is required.';
                    },
                    type: 'text',
                    url:'update-list-name',  
                    title: 'Edit List Name',
                    placement: 'right', 
                    send:'always',
                    ajaxOptions: {
                        dataType: 'json'
                    }
                });
            }); 
        },
        bindUI: function () {
            var that = this;

            this.params['saveBoardBtn'].on('click', function(event) {
                event.preventDefault();
                that.saveBoard();
            });

            $('#saveListName').on('click', function(event) {
                event.preventDefault();
                that.saveList($(this).closest('.panel-body').find('form').serialize(), this);
            });

            $(document).on('click', '.show-input-field', function() {
                var currentList = $(this).hide();
                that.targetList =  $(currentList).parent();
                $(this).closest('.panel-body').find('form').show();
            });

            $(document).on('click', '.close-input-field', function() {
                $(this).closest('.panel-body').find('.show-input-field').show();
                $(this).closest('.panel-body').find('form').hide();
            });

            $(document).on('click', '#saveCard', function(event) {
                event.preventDefault();
                that.saveCard($(this).closest('.panel-body').find('form').serialize(), this);
            });

            $(document).on('click', '.board-list-items', function() {
                var cardId = $(this).data('cardid');
                $('.modal#card-detail').find('button#delete-card').data('cardid', cardId);
                that.putCardDetailInModal(cardId);
            });

            $(document).on('click', 'button#delete-card', function() {
                var cardId = $(this).data('cardid');
                var cardIdCon = $(".list-group-item").filter("[data-cardid="+cardId+"]");
                that.deleteCard(cardId, cardIdCon);
            });
        },
        putCardDetailInModal: function (cardId) {
            var that = this;
            $.ajax({
                url: 'getCardDetail',
                type: 'POST',
                dataType: 'json',
                data: {
                    cardId: cardId
                },
                success: function (data) {
                    $("#card-detail").find("#card_title_editable").text(data.card.card_title);
                    that.makeEditable("#card_title_editable");
                    $("#card-detail").find("#card_description_editable").text(data.card.card_description);
                    that.makeEditable("#card_description_editable");
                    // that.makeEditable("#card-tags-input");
                    that.makeEditable("#card_color", data.card.card_color);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },
        makeEditable: function (elementId, opt) {
            switch (elementId) {
                case "#card_title_editable":
                    var cardTitle = $(elementId).text();
                    $("#card-detail").find(elementId).editable({
                        validate: function(value) {
                            if($.trim(value) == '') 
                                return 'Value is required.';
                        },  
                        inputclass: "x-editable-input",
                        type: 'text', 
                        placement: 'right',
                    });
                    $("#card-detail").find(elementId).editable("setValue", cardTitle);
                    break;
                case "#card_description_editable":
                    var cardDescription = $(elementId).text();
                    $("#card-detail").find(elementId).editable({
                        validate: function(value) {
                            if($.trim(value) == '') 
                                return 'Value is required.';
                        },
                        inputclass: "x-editable-input", 
                        type: 'text', 
                        placement: 'right',
                    });
                    $("#card-detail").find(elementId).editable("setValue", cardDescription);
                    break;
                case "#card-tags-input":
                    $("#card-detail").find(elementId).editable({
                        inputclass: 'tags-input',
                        select2: {
                            tags: [],
                            tokenSeparators: [",", " "]
                        },
                        placement: 'right',
                    });
                    break;
                case "#card_color":
                    $("#card-detail").find('#card_color').editable({
                        inputclass: 'select-input',
                        value: opt,    
                        source: [
                              {value: 1, text: ''},
                              {value: "yellow", text: 'Yellow'},
                              {value: "green", text: 'Green'},
                              {value: 4, text: 'Red'},
                              {value: 5, text: 'Blue'},
                              {value: 6, text: 'Purple'}
                           ],
                        placement: 'right',
                    });
                    break;
                default:
                    console.log('Default');
                    break;
            }
        },
        deleteCard: function (cardId, cardIdCon) {
            swal({   
                title: "Are you sure?",   
                text: "You will not be able to recover this List with cards!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                closeOnConfirm: false 
                }, function(){   
                    $.ajax({
                        url: 'deleteCard',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            cardId: cardId
                        },
                        success: function (data) {
                            $(cardIdCon).remove();
                            $('.modal#card-detail').modal("hide");
                            swal("Deleted!", "Your file was successfully deleted!", "success");
                        },
                        error: function (error) {
                            var response = JSON.parse(error.responseText);
                            swal("Oops", "We couldn't connect to the server!", "error");
                        }
                    });
            });   
        },
        saveCard: function (data, curentBtnClicked) {
            var that = this;
            $.ajax({
                url: 'postCard',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (data) {
                    $(that.targetList).find('.card-con').append(
                        '<li class="list-group-item board-list-items ui-sortable-handle" id="card_'+data.id+'" data-cardid="'+ data.id +'"><a data-toggle="modal" href="#card-detail">'+ data.card_title +'</a></li>'
                    );
                    $(that.targetList).find('form').hide();
                    $(that.targetList).find('form textarea').val('');
                    $(that.targetList).find('a.show-input-field').show();
                },
                error: function (error) {
                    var response = JSON.parse(error.responseText);
                    $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').find('.alert').remove();
                    $.each(response, function(index, val) {
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').addClass('has-error');
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').prepend('<div class="alert alert-danger"><li>'+ val +'</li></div>');
                    });
                }
            });
        },
        saveBoard: function () {
            that = this;
            $.ajax({
                url: 'postBoard',
                type: 'POST',
                dataType: 'json',
                data: {
                    boardTitle: that.params['boardTitle'].val(),
                    boardPrivacyType: that.params['boardPrivacyType'].val() 
                },
                success: function (data) {
                    $(that.params['createBoardLink']).closest(".col-lg-3").before(
                        '<div class="col-lg-3">'+
                            '<a data-toggle="modal" href="http://localhost:8000/board?id='+data.id+'" class="board-main-link-con">'+
                                '<div class="board-link">'+
                                    '<div class="row">'+
                                        '<div class="col-lg-8">'+
                                            '<h2 style="font-size: 20px; ">'+
                                                data.boardTitle +
                                            '</h2>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</a>'+
                        '</div>'
                    );
                    that.params['createNewBoardModal'].modal('hide') 
                    that.params['boardTitle'].val('');
                    that.params['boardTitleCon'].removeClass('has-error');
                    that.params['boardTitleCon'].find('.alert').remove();
                },
                error: function (error) {
                    var response = JSON.parse(error.responseText);
                    that.params['boardTitleCon'].find('.alert').empty();
                    $.each(response, function(index, val) {
                        that.params['boardTitleCon'].addClass('has-error');
                        that.params['boardTitleCon'].prepend('<div class="alert alert-danger"><li>'+ val +'</li></div>');
                    });
                }
            }); 
        },
        saveList: function (data, curentBtnClicked) {
            that = this;
            $.ajax({
                url: 'postListName',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (data) {
                    console.log(data);
                    $(curentBtnClicked).closest(".bcategory-list").before(
                        '<div class="bcategory-list" data-list-id="' + data.id + '">'+
                            '<div class="panel panel-default">'+
                                '<div class="panel-heading" style="border-bottom: 0px; ">'+
                                    '<div class="row">'+
                                        '<div class="col-lg-10">'+
                                            '<h3 class="panel-title board-panel-title editable editable-click" data-pk="' + data.id + '">' + data.list_name + '</h3>'+
                                        '</div>'+
                                        '<div class="col-lg-2">'+
                                            '<span data-listid="' + data.id + '" class="glyphicon glyphicon-trash delete-list" aria-hidden="true" style="cursor: pointer;"></span>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="panel-body card-list-con frame">'+
                                    '<ul class="list-group">'+
                                        '<div class="card-con ui-sortable" data-listid="' + data.id + '">'+
                                        '</div>'+
                                    '</ul>'+
                                    '<a href="#" class="show-input-field">Add a card...</a>'+
                                    '<form action="" method="POST" role="form" style="display: none;">'+
                                        '<div class="form-group" id="dynamic-board-input-con" style="margin-bottom: 8px;">'+
                                            '<textarea name="card-title" class="form-control" rows="3"></textarea>'+
                                            '<input type="hidden" name="list_id" value="' + data.id + '">'+
                                            '<input type="hidden" name="board_id" value="' + data.board_id + '">'+    
                                        '</div>'+
                                        '<div class="form-group" style="margin-bottom: 0px;">'+
                                            '<button type="submit" class="btn btn-primary" id="saveCard">Save</button> <span class="glyphicon glyphicon-remove close-input-field" aria-hidden="true"></span>'+
                                        '</div>'+
                                    '</form>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                    that.initCradDrag();
                    that.initEditableListName();
                    that.params['createNewBoardModal'].modal('hide');
                    $('.show-input-field').show();
                    $('.add-board-list-form').hide();
                    $('.add-board-list-form').find('input[type="text"]').val('');
                    that.params['boardTitle'].val('');
                    that.params['boardTitleCon'].removeClass('has-error');
                    that.params['boardTitleCon'].find('.alert').remove();
                },
                error: function (error) {
                    var response = JSON.parse(error.responseText);
                    $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').find('.alert').remove()
                    $.each(response, function(index, val) {
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').addClass('has-error');
                        $(curentBtnClicked).closest('form').find('#dynamic-board-input-con').prepend('<div class="alert alert-danger"><li>'+ val +'</li></div>');
                    });
                }
            });
        }
    };
    Board.init({
        boardTitle          :   $('#boardTitle'),
        boardPrivacyType    :   $('#boardPrivacyType'),
        saveBoardBtn        :   $('#save-board'),
        createNewBoardModal :   $('#create-new-board'),
        boardTitleCon       :   $('#boardTitleCon'),
        saveListNameBtn     :   $('#saveListName'),
        createBoardLink     :   $('.board-create-link')
    });
});