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
window.onload = function() {
    dragula([document.getElementById('left1'), document.getElementById('right1')]);
}
jQuery(document).ready(function($) {
    var ancherToAddInput = $('#show-input-field');
    $('#show-input-field').on('click', function() { 
        $('.addListInputForm').show(); 
        $('#show-input-field').hide();
    });
    $('.close-input-add-list').on('click', function() { 
        $('#show-input-field').show();
        $('.addListInputForm').hide(); 
    });
});