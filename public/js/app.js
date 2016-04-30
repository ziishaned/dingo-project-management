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

$("button.navbar-toggle").on("click", function () {
   $(".overlay").fadeIn('slow');
});

$(function(){
    $("#brand-name").typed({
        strings: ["Dingo Project Managment Tool", "Created using Laravel PHP Framework", "Dingo :)"],
        typeSpeed: 100
    });
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
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