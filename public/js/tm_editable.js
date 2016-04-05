var Global_tm_array = [];
var tm_counter = -1;
(function ( $ ) {
 
    $.fn.tm_editbale = function(option,new_obj) {
        this.each(function(){
            $this = $(this);
            var i_class_name = new_obj.hasOwnProperty('iclass') ? new_obj.iclass:$this.data('iclass');
            var i_placeholder = new_obj.hasOwnProperty('iplaceholder') ? new_obj.iclass:$this.data('iplaceholder');
            var i_validate = new_obj.hasOwnProperty('ivalidate') ? new_obj.iclass:$this.data('ivalidate');
            var i_error = new_obj.hasOwnProperty('ierror') ? new_obj.iclass:$this.data('ierror');
            var i_remover = new_obj.hasOwnProperty('remover') ? new_obj.iclass:$this.data('remover');
            var i_removerclass = new_obj.hasOwnProperty('removerclass') ? new_obj.iclass:$this.data('removerclass');
            var i_date = new_obj.hasOwnProperty('date') ? new_obj.iclass:$this.data('date');
            var theme_name = new_obj.hasOwnProperty('theme') ? new_obj.theme:$this.data('theme');
            
            //get full_length
            var full_length = {
                                'inside':true,
                                'outside':true
                                }
             if(new_obj.hasOwnProperty('full_length')){
                if(new_obj.full_length.hasOwnProperty('inside'))
                    full_length.inside = new_obj.full_length.inside
                if(new_obj.full_length.hasOwnProperty('outside'))
                    full_length.outside = new_obj.full_length.outside
            }
                                        
            //get outside btn
            var outside_btn = {
                                new_line:false,
                                pull:'right',
                                onshow:"&nbsp;&nbsp;<i class='fa fa-pencil'></i>",
                                removebtn:"&nbsp;&nbsp;<i class='fa fa-times'></i>",
                                onhover:"&nbsp;Edit"
                            }
            if(new_obj.hasOwnProperty('outside_btn')){
                if(new_obj.outside_btn.hasOwnProperty('new_line'))
                    outside_btn.new_line = new_obj.outside_btn.new_line
                if(new_obj.outside_btn.hasOwnProperty('pull'))
                    outside_btn.pull = new_obj.outside_btn.pull
                if(new_obj.outside_btn.hasOwnProperty('onshow'))
                    outside_btn.onshow = new_obj.outside_btn.onshow
                if(new_obj.outside_btn.hasOwnProperty('removebtn'))
                    outside_btn.removebtn = new_obj.outside_btn.removebtn
                if(new_obj.outside_btn.hasOwnProperty('onhover'))
                    outside_btn.onhover = new_obj.outside_btn.onhover
            }

            //get inside btn
            var inside_btn = {
                                new_line:false,
                                pull:'right',
                                ok:"<i class='fa fa-check'></i>",
                                cancel:"<i class='fa fa-times'></i>"
                                }
            if(new_obj.hasOwnProperty('inside_btn')){
                if(new_obj.inside_btn.hasOwnProperty('new_line'))
                    inside_btn.new_line = new_obj.inside_btn.new_line
                if(new_obj.inside_btn.hasOwnProperty('pull'))
                    inside_btn.pull = new_obj.inside_btn.pull
                if(new_obj.inside_btn.hasOwnProperty('ok'))
                    inside_btn.ok = new_obj.inside_btn.ok
                if(new_obj.inside_btn.hasOwnProperty('cancel'))
                    inside_btn.cancel = new_obj.inside_btn.cancel
            }

            //Global Variable 
            $this.Global_tm = 
            {
                //Users Settings
                user_settings:
                {
                    theme:theme_name,
                    placeholder:i_placeholder,
                    validate:i_validate,
                    error_text:i_error,
                    target_div:'just_edit',
                    remover:i_remover,
                    remover_class:i_removerclass,
                    date:i_date,
                    full_length:full_length,
                    inside_btn:inside_btn,
                    outside_btn:outside_btn,
                    width:$this.width(),
                     init:{
                        before:function(){},
                        after:function(){}
                    },
                    ok:{
                        before:function(){
                            var deferred = $.Deferred();
                            deferred.resolve();
                            return deferred.promise();
                        },
                        after:function(){}
                    },
                    remove:{
                        before:function(){
                            var deferred = $.Deferred();
                            deferred.resolve();
                            return deferred.promise();
                        },
                        after:function(){}
                    }
                },

                //Default Settings
                 default_settings:
                {
                    theme:'basic-theme',
                    class_name:'',
                    placeholder:'',
                    validate:'nullable',
                    error_text:'',
                    target_div:'just_edit',
                    val:'',
                    remover:false,
                    remover_class:'.tm_editable_container',
                    date:false,
                    width:'auto',
                    full_length:true
                },

                //Already exists
                already_exists : $this.hasClass('has_tm_editable_container'),
                counter:tm_counter++

        };

        //set before after methods
        if(new_obj.hasOwnProperty('init'))
        {
            if(new_obj.init.hasOwnProperty('before'))
              $this.Global_tm.user_settings.init.before = new_obj.init.before;
            if(new_obj.init.hasOwnProperty('after'))
                $this.Global_tm.user_settings.init.after = new_obj.init.after;
        }
        if(new_obj.hasOwnProperty('ok'))
        {
            if(new_obj.ok.hasOwnProperty('before'))
                $this.Global_tm.user_settings.ok.before = new_obj.ok.before;
            if(new_obj.ok.hasOwnProperty('after'))
                $this.Global_tm.user_settings.ok.after = new_obj.ok.after;
        }
        if(new_obj.hasOwnProperty('remove'))
        {
            if(new_obj.remove.hasOwnProperty('before'))
                $this.Global_tm.user_settings.remove.before = new_obj.remove.before;
            if(new_obj.remove.hasOwnProperty('after'))
                $this.Global_tm.user_settings.remove.after = new_obj.remove.after;
        }

        //Set FInal Settings
        $this.Global_tm.final_settings = $.extend($this.Global_tm.default_settings, $this.Global_tm.user_settings)
        
        //Find type of element
        $this.Global_tm.final_settings.hunt_type = hunt_type();
        $this.Global_tm.final_settings.val = $this.Global_tm.final_settings.hunt_type['value'];

        if(option == 'init')
        {
            if(!$this.Global_tm.already_exists)
                init_method();
            //console.log($this.Global_tm);
        }

        //ALL METHODS

        //Init method START 

        function init_method(){
            $this.Global_tm.final_settings.init.before();
            $this.html('');
            $this.addClass('has_tm_editable_container '+$this.Global_tm.final_settings.theme).attr('my_rank',Global_tm_array.length);
            $this.Global_tm.counter++;
            
            $this.Global_tm.final_settings.final_val = make_my_clone()['value'];
            
            //**** UI *****
            make_my_clone = make_my_clone();
            
            //outside_btn
            var outside_btn_html = $this.Global_tm.final_settings.outside_btn.onshow+'<span class="i_edit_text">'+
                                    $this.Global_tm.final_settings.outside_btn.onhover
                                    +'</span>';
            var edit_btn = $('<a>').addClass('i_edit ').html(outside_btn_html);
            
            //outside text
            var input_field = $('<span>').addClass('i_text').html(make_my_clone['final_val']).attr('selected_val',make_my_clone['selected_val']);
            var just_edit = $('<div>').addClass('just_edit full_row');
            $this.Global_tm.final_settings.just_edit = just_edit;
            var i_loading = $('<div>').addClass('i_loading').css('display','none').html('<div class="vertical0"><div class="vertical1"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Loading</div></div>');
            
            //inside btn            
            var ok_i = $('<span>').html($this.Global_tm.final_settings.inside_btn.ok);
            var cancel_i = $('<span>').html($this.Global_tm.final_settings.inside_btn.cancel);
            var ok_btn = $('<a>').addClass('i_ok').append(ok_i);
            var cancel_btn = $('<a>').addClass('i_cancel').append(cancel_i);
            var btn_container = $('<span>').addClass('ibtn_container '+$this.Global_tm.final_settings.inside_btn.pull).append(ok_btn).append(cancel_btn);

            //inside text
            var single_input = make_my_clone['my_clone'];
            var error = $('<span>').addClass('error-text smg-text full_row').text($this.Global_tm.final_settings.error_text);

            //remover button
            if($this.Global_tm.final_settings.remover)
                var remover_btn = $('<a>').addClass('i_remover').html($this.Global_tm.final_settings.outside_btn.removebtn).attr('removerclass',$this.Global_tm.final_settings.removerclass);
            else
                var remover_btn = '';
           var outside_btncontainer = $('<span>').addClass('outside_btncontainer '+$this.Global_tm.final_settings.outside_btn.pull).append(edit_btn).append(remover_btn);
            //attach UI
            var no_edit = $('<div>').addClass('no_edit full_row').append(input_field).append(outside_btncontainer);
            $this.append(no_edit).append(just_edit).attr('id','tm-edit-'+$this.Global_tm.counter);
            var template_input = $('<div>').addClass('input-group full_row').append(single_input).append(error);
            $($this.Global_tm.final_settings.just_edit).append(i_loading).append(template_input).append(btn_container);
            
            //attach events
             
             //Edit Button
             $(input_field).click(function(){
                $(no_edit).slideToggle(1);
                $(just_edit).slideToggle(100);
                $closest_tm = $(this).closest('.tm_editable_container');
                $closest_tm.find('input').select();
                $closest_tm.find('textarea').select();
                $closest_tm.find('select').focus();
             });

             $(edit_btn).click(function(){
                $(no_edit).slideToggle(1);
                $(just_edit).slideToggle(100);
                $closest_tm = $(this).closest('.tm_editable_container');
                $closest_tm.find('input').select();
                $closest_tm.find('textarea').select();
                $closest_tm.find('select').focus();
             });

             //Remover Button
             $(remover_btn).click(function(){
                remover(this);
             });

             //Ok Button
             $(ok_btn).click(function(){
                my_rank = get_rank(this);
                after_ok(my_rank);
            });

             //On Enter
              $(single_input).keypress(function(event){
                  if(event.keycode == 13 || event.which == 13)
                  {
                    my_rank = get_rank(this);
                    after_ok(my_rank);
                  }
              });

             //Cancel Button
             $(cancel_btn).click(function(){
                $(no_edit).slideToggle(100);
                $(just_edit).slideToggle(1);
                my_rank = get_rank(this);
                cancel_update(my_rank,this);
            }); 


            
            //Make my clone
            function make_my_clone(){
                my_type = $this.Global_tm.final_settings.hunt_type['type'];
                switch(my_type)
                {
                    case 'text':
                       my_clone =  $this.Global_tm.final_settings.hunt_type.my_clone.attr({
                                      placeholder:$this.Global_tm.final_settings['placeholder'],
                                      value:$this.Global_tm.final_settings['val']
                                }).data('validate',$this.Global_tm.final_settings['validate']);
                        final_val = $this.Global_tm.final_settings.val == '' ? 'N/A' : $this.Global_tm.final_settings.val;
                        selected_val = '';
                    break;

                    case 'select':
                        my_clone = $this.Global_tm.final_settings.hunt_type.my_clone;
                        final_val = $this.Global_tm.final_settings.hunt_type['my_text'];
                        selected_val = $this.Global_tm.final_settings.val;
                    break;

                     case 'checkbox_container':
                        my_clone = $this.Global_tm.final_settings.hunt_type.my_clone;
                        final_val = $this.Global_tm.final_settings.hunt_type['my_text'];
                        selected_val =  $this.Global_tm.final_settings.hunt_type['value'];
                    break;

                    case 'checkbox':
                        my_clone = $this.Global_tm.final_settings.hunt_type.my_clone;
                        label = my_clone.find('label').text();
                        final_val = '<label>'+label+'</label> : '+$this.Global_tm.final_settings.hunt_type['my_text'];
                        selected_val = $this.Global_tm.final_settings.val;
                    break;

                    case 'radio':
                        my_clone = $this.Global_tm.final_settings.hunt_type.my_clone;
                        final_val = $this.Global_tm.final_settings.hunt_type['my_text'];
                        selected_val =  $this.Global_tm.final_settings.val;
                    break;

                     case 'textarea':
                       my_clone =  $this.Global_tm.final_settings.hunt_type.my_clone.attr({
                                      placeholder:$this.Global_tm.final_settings['placeholder'],
                                      value:$this.Global_tm.final_settings['val']
                                }).data('validate',$this.Global_tm.final_settings['validate']);
                        final_val = $this.Global_tm.final_settings.val == '' ? 'N/A' : $this.Global_tm.final_settings.val;
                        selected_val = '';
                    break;
                    
                }
                return {
                            my_clone:my_clone,
                            final_val:final_val,
                            selected_val:selected_val
                        };    
            }

             function set_width(){
                rank = Global_tm_array.length;
                theme_class = '.'+$this.Global_tm.final_settings.theme;
                $tm_selector = $('.tm_editable_container[my_rank="'+rank+'"]');
                $btn_container = $tm_selector.find('.ibtn_container');
                eve_width = $(no_edit).width();
                
                //if fulllength is true on outsides
                if($this.Global_tm.final_settings.full_length.outside){
                    if($this.Global_tm.final_settings.outside_btn.new_line){
                        outside_btn_width = 0;
                    }
                    else{
                            if($this.Global_tm.final_settings.remover)
                                outside_btn_width = $(edit_btn).outerWidth() + realWidth($(edit_btn).find('.i_edit_text'), theme_class) + 15 + realWidth($(remover_btn), theme_class);
                            else
                                outside_btn_width = $(edit_btn).outerWidth() + realWidth($(edit_btn).find('.i_edit_text'), theme_class) + 5;
                    }
                    $(input_field).css('width',eve_width - outside_btn_width);
                }
                else{
                    $(no_edit).css('width','auto');
                    $(input_field).css('width','auto');   
                }
                
                //if fulllength is true on inside
                if($this.Global_tm.final_settings.full_length.inside){    
                    if($this.Global_tm.final_settings.inside_btn.new_line){
                        inside_btn_width = 0;
                    }
                    else{
                        inside_btn_width = realWidth($btn_container, theme_class) +5;
                    }
                    $(template_input).css('width',eve_width - inside_btn_width);
                }
                else{
                    $(template_input).css('width','auto');   
                }
            
             }   
              set_width();
            //Before Init
            $this.Global_tm.final_settings.init.after();
        }


         Global_tm_array.push($this);
        //Init method END

        //Find Input Type
        function hunt_type(){
            if($this.children('input[type="text"]').length || $this.children('input[type="number"]').length || $this.children('input[type="email"]').length || $this.children('input[type="password"]').length)
            {
                my_type = 'text';
                my_clone = $this.children('input').clone(true);
                my_val = my_clone.val().trim();
                my_text = my_val;
            }
            else if($this.children('select').length)
            {
                my_type = 'select';
                my_clone = $this.children('select').clone(true);
                my_val = $this.find("option:selected").val();
                my_text = $this.find("option:selected").text();
            }
            else if($this.children('.checkbox_container').length)
            {
                my_type = 'checkbox_container';
                my_clone = $this.children('.checkbox_container').clone(true);
                my_val_array = [];
                my_text_array = [];
                my_clone.find('.single_checkbox').each(function(k2,v2){
                //alert($(v2).find('input').length);
                if($(v2).find('input:checked').length)
                    {
                        val1 = $(v2).find('input:checked').attr('value');
                        text1 = $(v2).find('label').text().trim();
                        my_val_array.push(val1);
                        my_text_array.push(text1);
                    }
                });
                my_val = my_val_array.join(',');
                my_text = my_text_array.join(', ');
            }
             else if($this.children('.single_checkbox').length)
            {
                my_type = 'checkbox';
                my_clone = $this.children('.single_checkbox').clone(true);
                my_val = $this.find("input[type='checkbox']").is(':checked');
                if(my_val)
                    my_text = 'Yes'
                else
                    my_text = 'No'
            }
             else if($this.children('.radio_container').length)
            {
                my_type = 'radio';
                my_clone = $this.children('.radio_container').clone(true);
                $this.find("input[type='radio']:checked").each(function(){
                    my_val = $(this).val();
                    current_id = $(this).attr('id');
                    my_text = $("label[for='"+current_id+"']").text().trim();    
                });
            }
            else if($this.children('textarea').length)
            {
                my_type = 'textarea';
                my_clone = $this.children('textarea').clone(true);
                my_val = my_clone.text().trim();
                my_text = my_val;
            }
            
            return {type:my_type,
                    value:my_val,
                    my_clone:my_clone,
                    my_text:my_text};
        }

        
    
 });   

};

//Other FUNCTIONS witch are binds with events

            //Remover
             function remover(eve){
                var r = confirm('Wanna Delete this ?');
                if(r)
                {
                 my_rank = get_rank(eve);
                 //$(i_loading).fadeIn('fast');
                    var promise = Global_tm_array[my_rank].Global_tm.final_settings.remove.before();
                    promise.done(function() {
                        $(eve).closest(Global_tm_array[my_rank].Global_tm.final_settings.remover_class).remove();
                        //$(i_loading).fadeOut('slow');
                        Global_tm_array[my_rank].Global_tm.final_settings.remove.after();
                    });
                }
            }
            
            //After Ok
            function after_ok(rank){
                $tm_selector = $('.tm_editable_container[my_rank="'+rank+'"]');
                get_id = $tm_selector.attr('id');
                type = Global_tm_array[rank].Global_tm.final_settings.hunt_type['type'];
                $i_loading = $tm_selector.find('.i_loading');
                $no_edit = $tm_selector.find('.no_edit');
                $just_edit = $tm_selector.find('.just_edit');
                    $tm_container = $('#'+get_id);
                    flag_val = validate('#'+get_id);
                    //check validation
                    if(flag_val)
                    {
                        var values = get_the_values(rank);
                        new_val_flag = values.real_value != values.shown_val ? true:false;
                        
                        //check old val
                        if(new_val_flag)
                        {
                           $i_loading.fadeIn('fast');
                            var promise = Global_tm_array[rank].Global_tm.final_settings.ok.before(real_val);
                            promise.done(function() {
                              update_it(rank,type,real_val);
                              $i_loading.fadeOut('slow');
                            });
                        }
                        else
                        {
                            $just_edit.slideToggle(1);
                            $no_edit.slideToggle(100);
                             setTimeout(function(){
                                Global_tm_array[rank].Global_tm.final_settings.ok.after(real_val); 
                            },100);
                        }
                       
                    }
            }

            //Update It
            function update_it(rank,type,real_val){
                $tm_selector = $('.tm_editable_container[my_rank="'+rank+'"]');
                $input_field = $tm_selector.find('.i_text');
                $i_loading = $tm_selector.find('.i_loading');
                $no_edit = $tm_selector.find('.no_edit');
                $just_edit = $tm_selector.find('.just_edit');

                switch(type)
                {
                    case 'text':
                             //if null value
                            if(real_val == '')
                            {
                                real_val = 'N/A';
                            }
                            $input_field.text(real_val);
                    break;
                    
                    case 'select':
                            my_text = $tm_selector.find("option:selected").text();
                            $input_field.text(my_text).attr('selected_val',real_val);
                    break;   

                    case 'radio':
                            $tm_selector.find("input[type='radio']:checked").each(function(){
                                 my_val = $(this).val();
                                current_id = $(this).attr('id');
                                my_text = $("label[for='"+current_id+"']").text().trim();
                            })
                            $input_field.text(my_text).attr('selected_val',real_val);
                    break;  

                    case 'checkbox':
                            $tm_selector.find("input[type='checkbox']").each(function(){
                                 my_val = $(this).is(':checked');
                                 my_show_val = my_val ? 'Yes':'No'; 
                                current_id = $(this).attr('id');
                                my_text = $("label[for='"+current_id+"']").text().trim();
                                my_text = '<label>'+my_text+'</label> : '+my_show_val;
                            })
                            $input_field.html(my_text).attr('selected_val',real_val);
                    break;  

                     case 'textarea':
                             //if null value
                            if(real_val == '')
                            {
                                real_val = 'N/A';
                            }
                            $input_field.text(real_val);
                    break; 
                }
               
                $just_edit.slideToggle(1);
                $no_edit.slideToggle(100);
                 setTimeout(function(){
                    Global_tm_array[rank].Global_tm.final_settings.ok.after(); 
                },100);
            }

            //cancel_update
            function cancel_update(rank,eve){
                $tm_selector = $('.tm_editable_container[my_rank="'+rank+'"]');
                type = Global_tm_array[rank].Global_tm.final_settings.hunt_type['type'];
                var values = get_the_values(rank);
                shown_value = values.shown_value;
                 switch(type)
                {
                    case 'text':
                            $tm_selector.find('input').val(shown_value);
                    break;
                    
                    case 'select':
                            $tm_selector.find("select").val(shown_value);
                    break;   

                    case 'radio':
                            $tm_selector.find("input[type='radio'][value='"+shown_value+"']").prop('checked',true);
                    break;  

                    case 'checkbox':
                            if(shown_value == true || shown_value == 'true')
                                $tm_selector.find("input[type='checkbox']").prop('checked',true);
                            else
                                $tm_selector.find("input[type='checkbox']").prop('checked',false);
                    break;  

                     case 'textarea':
                           $tm_selector.find('textarea').val(shown_value);
                    break; 
                }
            }

            //Get Rank
        function get_rank(eve)
        {
            return $(eve).closest('.has_tm_editable_container').attr('my_rank');
        }

        function realWidth(obj,container){
            var clone = obj.clone();
            clone.css("visibility","hidden");
            $('body '+container+':first').append(clone);
            var width = clone.outerWidth();
            clone.remove();
            return width;
        }

        function get_the_values(rank){
            $this = $('.tm_editable_container[my_rank="'+rank+'"]');
            type = Global_tm_array[rank].Global_tm.final_settings.hunt_type['type'];
            switch(type)
            {
                case 'text':
                        real_val = $this.find('input').val().trim();
                        shown_val = $this.find('.i_text').text().trim();
                    break;

                case 'textarea':
                        real_val = $this.find('textarea').val().trim();
                        shown_val = $this.find('.i_text').text().trim();
                    break;
                    
                case 'select':
                        real_val = $this.find('option:selected').val().trim();
                        shown_val = $this.find('.i_text').attr('selected_val').trim();
                    break;

                case 'radio':
                        real_val = $this.find('input[type="radio"]:checked').val();
                        shown_val = $this.find('.i_text').attr('selected_val').trim();
                    break;

                 case 'checkbox':
                        real_val = $this.find('input[type="checkbox"]').is(':checked');
                        shown_val = $this.find('.i_text').attr('selected_val').trim();
                    break;    
            }
            return {real_value:real_val,
                    shown_value:shown_val};    
        }
}( jQuery ));