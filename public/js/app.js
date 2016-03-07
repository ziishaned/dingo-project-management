jQuery(document).ready(function($) {
    $('#save-change').on('click', function(event) {
        event.preventDefault();
        $("#create-new-board [data-dismiss='modal']").trigger('click');
        $.toast({
            heading: 'Success',
            text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
            showHideTransition: 'slide',
            icon: 'success'
        }); 
    });
});
jQuery(document).ready(function($) {
    $('.mega-dingo-dropdown').on('click', function (event) {
        $(this).parent().toggleClass('open');
    });
    $('body').on('click', function (e) {
        if (!$('.mega-dingo-dropdown').is(e.target) 
            && $('.mega-dingo-dropdown').has(e.target).length === 0 
            && $('.open').has(e.target).length === 0
        ) {
            $('.mega-dingo-dropdown').parent().removeClass('open');
        }
    });
}); 
$(document).ready(function() {
    $(".card-con").each(function(index, el) {
        
        $(el).sortable({
            connectWith: ".card-con",
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
});
$(document).ready(function() {
    $(".board-panel-title").each(function(index, el) {
        $(el).editable();
    });
});

$(document).ready(function() {
    $('.delete-list').on('click', function() {
        var that = this;
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this List with cards!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
            }, function(){   
                var listId = $(that).data("listid");
                $.ajax({
                    url: 'delete-list',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        listId: listId 
                    },
                    success: function (data) {
                        console.log(data);
                        swal("Deleted!", "Your file was successfully deleted!", "success");
                    },
                    error: function (error) {
                        var response = JSON.parse(error.responseText);
                        console.log(response);
                        swal("Oops", "We couldn't connect to the server!", "error");
                    }
                });
        });
    });
});

// var listCards = [];

// $('.bcategory-list').each(function(index, list){
//     var updateListId = $(list).data('listId');
//     var cards = $(list).find('.ui-sortable').sortable('toArray');
//     listCards.push({
//         listId: updateListId,
//         cards: cards 
//     });
// });