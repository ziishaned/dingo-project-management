function validate(container_id) {
    var final_flag = [];
    var final_answer;
    $(container_id + ' .input-group').each(function(k3, v3) {
        if($(this).children('input').length != 0)
        {
            method = 'text';
        }
        else if($(this).children('select').length != 0)
        {
            method = 'select';
        }
         else if($(this).children('textarea').length != 0)
        {
            method = 'textarea';
        }
        else{
            method = null;
             valid_type = 'nullable';
        }

        if(method == 'text')
        {
            input_val = $(this).children('input').val();
            valid_type = $(this).find('input').data('validate');
        }
        else if(method == 'select')
        {
            input_val = $(this).children('select').val();
            valid_type1 =  $(this).children('select').data('validate');
            valid_type = valid_type1 == 'nullable' ? 'nullable' : 'select_spcl';
            idropdown = $(this).children('select').attr('idropdown');
        }

        //console.log(container_id);
        var current_flag = false;
        if (valid_type == 'text') {
            current_flag = input_val.length > 1 ? true : false
        } else if (valid_type == 'number') {
            var no = /^\d+$/;
            current_flag = no.test(input_val);
        } else if (valid_type == 'nospace') {
            var no = /^[a-zA-Z0-9-_@.]+$/;
            current_flag = no.test(input_val);
        } else if (valid_type == 'nullable') {
            current_flag = true;
        } else if (valid_type == 'email') {
            var rx = /^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]+?\.[A-Za-z0-9_\-\.]{2,8}$/;
            current_flag = rx.test(input_val);
        } else if (valid_type == 'password') {
            current_flag = input_val.length > 0 ? true : false;
        } else if (valid_type == 'contact') {
            inp = parseInt(input_val, 10);
            current_flag = inp < 9999999999 && inp > 1000000000 ? true : false;
        } else if (valid_type == 'select_spcl') {
            current_flag = input_val == 0 || input_val == '' ? false : true;
        }

        if (!current_flag) {
            $(this).removeClass('success').addClass('error');
            if (valid_type == 'select_spcl')
            {
                $(this).children('.icontainer').removeClass('select2_theme').addClass('select2_red');
               $('.'+idropdown).removeClass('select2_theme').addClass('select2_red');     
            }
           
            
        } else {
            $(this).removeClass('error').addClass('success');
             if (valid_type == 'select_spcl')
            {
                $(this).children('.icontainer').removeClass('select2_theme select2_red').addClass('select2_green');
               $('.'+idropdown).removeClass('select2_theme select2_red').addClass('select2_green');     
            }
         }
        final_flag.push(current_flag);
        if (k3 == $(container_id + ' .input-group').length - 1) {
            final_answer = true;
            $.each(final_flag, function(k2, v2) {
                if (!v2) {
                    final_answer = false;
                }
            });
               yff = $('.pt-wrapper').outerHeight();
                y_h = $(container_id).outerHeight();
                if(yff < y_h)
                {
                    $('.pt-wrapper').css('height',y_h);                 
                }
        }
    });
    return final_answer;
}

