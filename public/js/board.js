$(document).ready(function() {
    var Board = {
        init: function(params) {
            this.params = params;
            this.bindUI();
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
                $(this).hide();
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
        },
        saveCard: function (data, curentBtnClicked) {
            that = this;
            $.ajax({
                url: 'postCard',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (data) {
                    console.log(data);
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
                    that.params['createNewBoardModal'].modal('hide');
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
        saveListNameBtn     :   $('#saveListName')
    });
    $.ajaxSetup({
        beforeSend: function() {
            if ($("#loadingbar").length === 0) {
                $("body").append("<div id='loadingbar'></div>")
                $("#loadingbar").addClass("waiting").append($("<dt/><dd/>"));
                $("#loadingbar").width((50 + Math.random() * 30) + "%");
            }
        },
        complete : function() {
            $("#loadingbar").width("101%").delay(200).fadeOut(400, function() {
                $(this).remove();
            });
        }
    });
});