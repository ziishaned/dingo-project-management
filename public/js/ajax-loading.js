$(document).ready(function() {
    var AjaxLoadingBar = {
      init: function () {
        this.bindUI();
      }, 
      bindUI: function () {
        var that = this;
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
      }
    };
    
    AjaxLoadingBar.init();
});