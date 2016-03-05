var my = {
    init: function(params) {
        console.log(params);
    }
};
my.init({
    boardTitle         :  $('#boardTitle').val(),
    boardPrivacyType   :  $('#boardPrivacyType').val()
});
jQuery(document).ready(function($) {
    $('#save-board').on('click', function(event) {
        event.preventDefault();
        var boardTitle = $('#boardTitle').val();
        var boardPrivacyType = $('#boardPrivacyType').val();

        $.ajax({
            url: 'postBoard',
            type: 'POST',
            dataType: 'json',
            data: {
                boardTitle: boardTitle,
                boardPrivacyType: boardPrivacyType 
            },
            success: function (data) {
                $('#create-new-board').modal('hide');
                $('#boardTitle').val('');
                $('#boardTitleCon').removeClass('has-error');
                $('#boardTitleCon').find('.alert').remove();
            },
            error: function (error) {
                var response = JSON.parse(error.responseText);
                var errors = {};
                $('#boardTitleCon').find('.alert').empty();
                $.each(response, function(index, val) {
                    $('#' + index + 'Con').addClass('has-error');
                    $('#' + index + 'Con').prepend('<div class="alert alert-danger"><li>'+ val +'</li></div>');
                });
            }
        });                
        
    });
    $('#saveListName').on('click', function(event) {
        event.preventDefault();
        var listName = $('#listNameInput').val();
        var boardId = $('input#boardId').val();
        $.ajax({
            url: 'postListName',
            type: 'POST',
            dataType: 'json',
            data: {
                listName: listName,
                boardId: boardId
            },
            success: function (data) {
                console.log(data);
                $('#create-new-board').modal('hide');
                $('#boardTitle').val('');
                $('#boardTitleCon').removeClass('has-error');
                $('#boardTitleCon').find('.alert').remove();
            },
            error: function (error) {
                var response = JSON.parse(error.responseText);
                var errors = {};
                $('#listNameCon').find('.alert').remove();
                $.each(response, function(index, val) {
                    $('#listNameCon').addClass('has-error');
                    $('#listNameCon').prepend('<div class="alert alert-danger"><li>'+ val +'</li></div>');
                });
            }
        });
    });
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