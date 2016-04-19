$(document).ready(function() {
    $(document).on('click', '.delete-list', function() {
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
                        $(that).closest(".bcategory-list").remove();
                        swal("Deleted!", "Your file was successfully deleted!", "success");
                    },
                    error: function (error) {
                        var response = JSON.parse(error.responseText);
                        swal("Oops", "We couldn't connect to the server!", "error");
                    }
                });
        });
    });
});

$(document).ready(function() {
    $.fn.editable.defaults.mode = 'popup';
    // $('#card_color').editable({
    //     inputclass: 'select-input',
    //     value: 1,    
    //     source: [
    //           {value: 1, text: ''},
    //           {value: 2, text: 'Yellow'},
    //           {value: 3, text: 'Green'},
    //           {value: 4, text: 'Red'},
    //           {value: 5, text: 'Blue'},
    //           {value: 6, text: 'Purple'}
    //        ],
    //     placement: 'right',
    // });
    // $('#event').editable({
    //     placement: 'top',
    //     combodate: {
    //         firstItem: 'name'
    //     }
    // }); 
});

$(document).ready(function() {
    $(document).on('mouseenter', '.sub-task-con', function(event) {
        event.preventDefault();
        $(this).find("a.delete-task").show();
    });
    $(document).on('mouseleave', '.sub-task-con', function(event) {
        event.preventDefault();
        $(this).find("a.delete-task").hide();
    });
});

// $('#myPleaseWait').modal('show');
// $('#myPleaseWait').modal('hide');

// var listCards = [];

// $('.bcategory-list').each(function(index, list){
//     var updateListId = $(list).data('listId');
//     var cards = $(list).find('.ui-sortable').sortable('toArray');
//     listCards.push({
//         listId: updateListId,
//         cards: cards 
//     });
// });