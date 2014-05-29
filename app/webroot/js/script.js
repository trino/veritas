$(function(){
     $('.datepicker').datepicker({dateFormat: 'yy-mm-dd'}); 
       $('#acc').dcAccordion({
            eventType: 'click',
            autoClose: true,
            saveState: true,
            disableLink: false,
            showCount: false,
            speed: 'fast'
            });
        $('.changelang').click(function(){
           var lang = $(this).attr('id');
           $.ajax({
                   'type':'post',
                   'url' : 'dashboard/changelang/'+lang,
                   'success':function(){
                            location.reload();
                   } 
            
           })
           
           
            
        });
        
        $('#filter').live('change',function(){
        if($(this).val()!='')
        {
            $('.loads').text('Loading..');
            var id = $(this).val();
            var txt = $('.search').val();
            $.ajax({
                url: "<?php echo $base_url;?>uploads/searchlist/"+id,
           type: "post",
           data: "name="+txt,
           success:function(msg)
           {
                $('.loads').text('Load');
                $('.searchlist').html(msg);
           } 
            });
            
        }
        
    });
        $('.loads').live('click',function(){
        var name = $('.search').val();
        var urls = '<?php echo $base_url;?>uploads/searchlist';
        if($('#filter').val()!='')
         urls = '<?php echo $base_url;?>uploads/searchlist/'+$('#filter').val();
        $('.loads').text('Loading..');
        $.ajax({
            
           url: urls,
           type: "post",
           data: "name="+name,
           success:function(msg)
           {
                $('.loads').text('Load');
                $('.searchlist').html(msg);
           } 
            
        });
    });
    $('#filter2').live('change',function(){
        var id = $(this).val();
        if($(this).val()!='')
        {
            var name = $('.search2').val();
        
        $('.loads').text('Loading..');
        $.ajax({
            
           url: "<?php echo $base_url;?>members/searchlist/"+id,
           type: "post",
           data: "name="+name,
           success:function(msg)
           {
                $('.loads').text('Load');
                $('.searchlist').html(msg);
                $('.admin').show();
           } 
            
        });
        }
    });
        $('.loads2').live('click',function(){
            
        var name = $('.search2').val();
        
        $('.loads').text('Loading..');
        var urls = '<?php echo $base_url;?>members/searchlist';
        if($('#filter2').val()!='')
         urls = '<?php echo $base_url;?>members/searchlist/'+$('#filter2').val();
        $.ajax({
            
           url: urls,
           type: "post",
           data: "name="+name,
           success:function(msg)
           {
                $('.admin').show();
                $('.loads').text('Load');
                $('.searchlist').html(msg);
           } 
            
        });
    });
        $('.pagination2 .prev a').text('<');
        $('.pagination2 .next a').text('>');
        if($('.next').html() == '')
        {
            $('.pagination2 .next').text('>');
        }
        if($('.prev').html() == '')
        {
            $('.pagination2 .prev').text('<');
        }
        $('.messageform').validate();
        $('.close_modal').live('click',function(){
            $('.ui-dialog-titlebar-close').click();
        });
        if($('#attachments').val() != ''){
                $('#att').show();
            }
            else
                $('#att').hide();
        $('.doc').live('change',function(){
           var val = $(this).val();
           if($(this).is(':checked'))
           {
            if($('#attachments').val() != ''){
            if($('#attachments').val()!=$(this).val()){
            txtss = $('#attachments').val().replace(', '+$(this).val(),''); 
            txtss = txtss.replace($(this).val()+', ',''); 
            txtss = txtss.replace($(this).val(),'');  
            var txts = txtss+', '+$(this).val();
            $('#attachments').val(txts);
            $('.attachments').text(txts);
            $('#att').show();
            }
            
            }
            else{
            $('#att').show();    
            $('#attachments').val($(this).val());
            $('.attachments').html($(this).val());
            }
           }
           else
           {
            
            var txt = $('#attachments').val().replace(', '+$(this).val(),'');
            $('#attachments').val($('#attachments').val().replace(', '+$(this).val(),''));
            $('.attachments').text(txt);
            $('#attachments').val($('#attachments').val().replace($(this).val()+', ',''));
            var txt2 = $('#attachments').val().replace($(this).val()+', ','');            
            $('.attachments').text(txt2);
            $('#attachments').val($('#attachments').val().replace($(this).val(),''));
            var txt3 = $('#attachments').val().replace($(this).val(),'');            
            $('.attachments').text(txt3);
            if($('#attachments').val() != ''){
                $('#att').show();
                }
                else
                $('#att').hide();
           } 
        });
        $('.loading input').live('change',function(){
           var id_con = $(this).attr('class');
           var ar_con = id_con.split('__'); 
           if($(this).is(':checked')) 
           list_email($(this).attr('class'));
           else
           {
            var cl = $(this).attr('class');
            var arr_cl = cl.split(' ');
            cl = arr_cl[0];
            $('.'+cl).each(function(){
               if($(this).is(':checked'))
               {
                $(this).click();
               } 
            });
            
            $('.del_email').each(function(){
                if($(this).attr('id') == ar_con[2]+'__'+ar_con[1])
                $(this).remove();
            });
                
               var ar = new Array();
               ar[0] = ar_con[2];
               ar[1] = ar_con[1];
               
               $('#receipient_id').val($('#receipient_id').val().replace(ar[1]+',',''));
               $('#recipients').val($('#recipients').val().replace(' ',''));
    	       $('#recipients').val($('#recipients').val().replace(ar[0]+',',''));
               if($('#name').html().replace(' ','') == '' || $('#name').html().replace(' ','') == ' ' )
               {
                $('#name').html('Recipients');
                $('#send_email').attr('disabled','disabled');
               }
           }
           
        });
        $('#contacts_modal').live('click',function(){
         $('.dialog-modals').load('<?php echo $base_url.'members/loadall';?>');
               $('.dialog-modals').dialog({
                    
                    width: 800,
                    title:'Add Contacts to Instant Message',
                    
               });
               });
               $('#name').live('click',function(){
         $('.dialog-modals').load('<?php echo $base_url.'members/loadall';?>');
               $('.dialog-modals').dialog({
                    
                    width: 800,
                    title:'Add Contacts to Instant Message',
                    
               });
               });               
               $('.attachment').click(function(){
         $('.dialog-modals').load('<?php echo $base_url.'uploads/loadall';?>');
               $('.dialog-modals').dialog({
                    
                    width: 1030,
                    
                    title:'Attach files to Instant Message',
                    
               });
               });
        $('#send_email').attr('disabled','disabled');
        $('.del_email').live('click',function(){
           var ems = $(this).attr('id');
           $(this).remove(); 
           var ar = ems.split('__');
           $('#receipient_id').val($('#receipient_id').val().replace(ar[1]+',',''));
	       $('#recipients').val($('#recipients').val().replace(ar[0]+',',''));
           if($('#name').html().replace(' ','') == '' || $('#name').html().replace(' ','') == ' ' )
           {
            $('#name').html('Recipients');
            $('#send_email').attr('disabled','disabled');
           }
           
        });
        $.ajax({
            
            url: '<?php echo $base_url;?>admin/email_status',

          
            success:function(response)
            {
                var a='<a href="<?php echo $base_url;?>/mail">You Have received '+response+' email(s)</a>'
                if(response>0){
                $('.notific').html('&nbsp;'+response+'&nbsp;');
                $('.notific').css('background-color','#F03D25');
                $('.notific').css('border-color','#E23923 #D83722 #C0311E');
                
                }
                else
                {
                $('.notific').css('background','none');
                $('.notific').css('border','none');    
                $('.notific').html('');
                }
            }
        });
    });
    setInterval(function(){
        $.ajax({
            

            url: '<?php echo $base_url;?>admin/email_status',

            success:function(response)
            {
                var a='<a href="<?php echo $base_url;?>mail">You Have received '+response+' email(s)</a>'
                if(response>0)
                $('.notific').html('&nbsp;'+response+'&nbsp;');
                else
                $('.notific').html('');
            }
        })
    },5000);
    function show_email()
					{
						$('#email').show();
					}

					function list_email(value)
					{
						var em=$('#name').val();
						var ema=$('#recipients').val();
						var e=value.split('__');
						var i= $('#receipient_id').val();
						var id;
                        var ema2 = $('#name').html();
                        //var del_em = '';
						if(em=="")
						{
						    //name = name.replace(e[0],'');
							name=e[0]+', ';
						}
						else
						{
						name = name.replace(e[0],'');  
						name = em+e[0]+', ';
						}
						if(i=="")
						{
						  
							id=e[1]+',';
						}
						else
						{
						    i = i.replace(e[1]+',','')
							id=i+e[1]+',';
						}
						if(ema=="")
						{
						  
							email=e[2]+',';
                            var ema2 = '<a href="javascript:void(0)" id="'+e[2]+'__'+e[1]+'" class="del_email">'+e[0]+' [x],'+'</a> ';
                            del_em = ema2;
						}
						else
						{
						  
						    ema = ema.replace(e[2]+',','');
                            ema2 = ema2.replace('<a href="javascript:void(0)" id="'+e[2]+'__'+e[1]+'" class="del_email">'+e[0]+' [x],'+'</a> ','');                            
							email=ema+e[2]+',';
                            del_em = ema2+'<a href="javascript:void(0)" id="'+e[2]+'__'+e[1]+'" class="del_email">'+e[0]+' [x],'+'</a> ';
                            //alert(del_em);
						}
						//alert(email);
						$('#receipient_id').val(id);
						$('#recipients').val(email);
						$('#name').html(del_em);
                        $('#send_email').removeAttr('disabled');
					}