<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
		Veritas | Intelligence on Demand
	</title>
    <style>
        #acc ul{margin:0!important;padding-left:10px;}
    </style>
    
	<link href="/veritas/favicon.ico" type="image/x-icon" rel="icon" /><link href="/veritas/favicon.ico" type="image/x-icon" rel="shortcut icon" /><link rel="stylesheet" type="text/css" href="/veritas/css/bootstrap.min.css" /><link rel="stylesheet" type="text/css" href="/veritas/css/accodian.css" /><link rel="stylesheet" type="text/css" href="/veritas/css/style.css" /><link rel="stylesheet" type="text/css" href="/veritas/css/jquery.timepicker.css" /><script type="text/javascript" src="/veritas/js/jquery.js"></script><script type="text/javascript" src="/veritas/js/jquery.dcjqaccordian.js"></script><script type="text/javascript" src="/veritas/js/cookie.js"></script><script type="text/javascript" src="/veritas/js/hoverintent.js"></script><script type="text/javascript" src="/veritas/js/ajaxupload.3.6.js"></script><script type="text/javascript" src="/veritas/js/jquery.validate.js"></script><script type="text/javascript" src="/veritas/js/jquery.timepicker.js"></script>    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
    
    <script src="http://localhost/veritas/jwplayer/jwplayer.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <script type="text/javascript">jwplayer.key="N+fGwqE9+uBPKzrjO6qyGHWiJJRmw0UtbEU0iA==";</script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	<link rel="shortcut icon" href="/img/favicon.ico" />
    <style>
    .clear{clear:both;}
    </style>
<!--script type="text/javascript">
window.onbeforeunload = function(e) {
$.ajax({
url: 'http://localhost/veritas/admin/logout'
});

};
</script-->
    <script type="text/javascript">
    
    $(function(){
        $('#filter').live('change',function(){
        if($(this).val()!='')
        {
            $('.loads').text('Loading..');
            var id = $(this).val();
            var txt = $('.search').val();
            $.ajax({
                url: "http://localhost/veritas/uploads/searchlist/"+id,
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
        var urls = 'http://localhost/veritas/uploads/searchlist';
        if($('#filter').val()!='')
         urls = 'http://localhost/veritas/uploads/searchlist/'+$('#filter').val();
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
            
           url: "http://localhost/veritas/members/searchlist/"+id,
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
        var urls = 'http://localhost/veritas/members/searchlist';
        if($('#filter2').val()!='')
         urls = 'http://localhost/veritas/members/searchlist/'+$('#filter2').val();
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
         $('.dialog-modals').load('http://localhost/veritas/members/loadall');
               $('.dialog-modals').dialog({
                    
                    width: 800,
                    title:'Add Contacts to Instant Message',
                    
               });
               });
               $('#name').live('click',function(){
         $('.dialog-modals').load('http://localhost/veritas/members/loadall');
               $('.dialog-modals').dialog({
                    
                    width: 800,
                    title:'Add Contacts to Instant Message',
                    
               });
               });               
               $('.attachment').click(function(){
         $('.dialog-modals').load('http://localhost/veritas/uploads/loadall');
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
            
            url: 'http://localhost/veritas/admin/email_status',

          
            success:function(response)
            {
                var a='<a href="http://localhost/veritas//mail">You Have received '+response+' email(s)</a>'
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
            

            url: 'http://localhost/veritas/admin/email_status',

            success:function(response)
            {
                var a='<a href="http://localhost/veritas/mail">You Have received '+response+' email(s)</a>'
                if(response>0)
                $('.notific').html('&nbsp;'+response+'&nbsp;');
                else
                $('.notific').html('');
            }
        })
    },5000);
    </script>
    <style>label.error{color:red!important;}

</style>
    
</head>
<body>
<div id="fullContainer">
<table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
	<tr><td style="width:230px; padding:0px; vertical-align:top;" valign="top">
	<div id="leftColumn">

		
			<div class="logo"><a href="http://localhost/veritas/dashboard"><img src="/veritas/img/logoVeritas01.png" alt="" /></a></div>
			
			
			<div class="poweredBy" style="background:transparent;" >
				<table cellspacing="0" cellpadding="0" border="0" width="100%" height="100%"><tr><td valign="middle" style="padding-top: 25px;"><img src="http://localhost/veritas/img/asap.png" /></td></tr></table>
			</div>
			<div class="menu">
			<ul id="acc" style="margin: 0;" >
									<li> <a href="#"><i class="icon-user"></i>User Member</a>
                        <ul>
                        <li><a href="/veritas/members"><i class="icon-user"></i>List User</a></li>
                        <li><a href="/veritas/members/add"><i class="icon-arrow-right"></i>Add User</a></li>
                        </ul>
                    </li>
					
                    										   			
				<li><a href="#"><i class="icon-globe"></i>Job Manager</a>
                    <ul>
                        <li><a href="/veritas/jobs"><i class="icon-globe"></i>List Jobs</a></li>
                        <li><a href="/veritas/jobs/add"><i class="icon-arrow-right"></i>Add Job</a></li>
                        <li><a href="/veritas/jobs/listing"><i class="icon-arrow-right"></i>Assign Job to User</a></li>
                    </ul>
                </li>
				<li><a href="/veritas/mail"><i class="icon-envelope-alt"></i>Instant Message <span class="notific"></span></a></li>
                <li><a href="#"><i class="icon-copy"></i>Documents</a>
                    <ul>
                        <li><a href="/veritas/search"><i class="icon-copy"></i>Search</a></li>
                                                                                       <li><a href="http://localhost/veritas//uploads/go/"><i class="icon-share"></i>Upload</a></li> 
                                                                                                                                                                       <li><a href="http://localhost/veritas/search/index/report"><i class="icon-arrow-right"></i>Report</a></li>
                                                                                    <li><a href="http://localhost/veritas/search/index/site_orders"><i class="icon-arrow-right"></i>Site Order</a></li>
                                                                                    <li><a href="http://localhost/veritas/search/index/training"><i class="icon-arrow-right"></i>Training</a></li>
                                                                                                                
                                                                                
                    </ul>
                </li>
                
				                <li><a href="#"><i class="icon-star"></i>Contacts</a>
                    <ul>
                        <li><a href="/veritas/contacts"><i class="icon-star"></i>List Contacts</a></li>
                        <li><a href="/veritas/contacts/add"><i class="icon-arrow-right"></i>Add Contact</a></li>
                        <li><a href="/veritas/contacts/upload"><i class="icon-arrow-right"></i>Upload contact</a></li>
                    </ul>
                </li>
                                  <li>  <a href="#"><i class="icon-briefcase"></i>Analytics</a>                  <ul>
                    <li><a href="/veritas/uploads/graphs"><i class="icon-arrow-right"></i>Graphical Report</a></li>
                    <li><a href="/veritas/uploads/stats"><i class="icon-arrow-right"></i>Regular Report</a></li>
                  </ul>
                  </li>
                							</ul>
            </div>
                        
            <!-- menu -->

				
		
	</div><!-- leftColumn -->
    <script>
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
    });
    </script>

	</td><td style="padding:0px;">	
	
	<div id="rightColumn">
		<div id="rightHeader">
							<div class="headSearch">
				<form action="http://localhost/veritas/search" method="get" id="searchDocuments" style="float: left;">
					<div class="searchInput">
					<input type="text" name="search" style="margin-top: 10px;" placeholder="Document Search" />
                    <!--<input type="hidden" name="date" value="asc" /> -->
					</div>
					<div class="searchButton">
					<a href="javascript:{}" onclick="document.getElementById('searchDocuments').submit();" class="btn icn-only"><i class="icon-search"></i></a>
					</div>
				</form>
                <div style="float: right;padding:10px 0 0 10px;">
                <select onchange="if($(this).val()){window.location = 'http://localhost/veritas/jobs/view/'+$(this).val();}">
                <option>Go To Job</option>
                                        <option value="18">123</option>
                                                <option value="19">123</option>
                                                <option value="21">333</option>
                                                <option value="22">4444</option>
                                                <option value="9">test job new</option>
                                                <option value="20">tt</option>
                                        
                </select>
                </div>
                <div class="clearfix"></div>
				</div><!-- headSearch -->
						
			
							<!--h1>Welcome admin</h1-->
				<div class="userControlPanel">
					<div class="avatar">
					<img src="/veritas/img/uploads/male.png" alt="" class="image" />					</div>
					
					<div class="links">
					<a href="/veritas/dashboard/settings"><i class="icon-user"></i>  admin</a><br/>
				<a href="/veritas/admin/logout"><i class="icon-off"></i> Logout</a><br/>
				
				<a href="/veritas/dashboard/contactus"><i class="icon-warning-sign"></i> User Support</a>
					</div>
					
					<!--div class="companyLogo">
					<img src="/veritas/img/uploads/male.png" alt="" class="image" />					</div-->
				</div>
						
			
			
						
			<div id="email_reponse"></div>
		</div><!-- rightHeader -->

		
	
		
		<div id="rightContent">
                    
				<div class="emailTab">
					
					<script type="text/javascript">
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

					</script>
					<div class="message-form" >
						<form id="Form" action="http://localhost/veritas/mail/send?return=%2Fveritas%2Fjobs%2Fedit%2F9" method="post" class="messageform">
							
							<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td width="50%">
								<div class="left inputs">
									<div class="recipientsLine" >
									
										<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td style="padding:0px; padding-bottom:4px;">
											<div id="name" style="height: 20px; background: none repeat scroll 0% 0% white; border: 1px solid rgb(204, 204, 204); padding: 1px 4px 2px; color: rgb(170, 170, 170); width:103%; float: left; font-family: 'Oxygen', sans-serif;">Recipients</div>
										</td><td style="width:30px;padding-top:5px; text-align:right;">
											<a id="contacts_modal" class="email btn btn-info" style="padding:0px;color:#FFF; width:100%; float:right; margin:0px; margin-top:-5px; margin-right:-18px; height:23px;" onclick="show_email();" href="javascript:void(0);">&nbsp;+&nbsp;</a>
										</td></tr></table>
										
										<!--									<input type="text" name="name" id="name" placeholder="Recipients (Separate with comma)" class="required" />--> 
									</div>
									<!--<div style="float:left;margin-left:10px;"><a href="javascript:void(0)" id="contacts_modal" onclick="show_email();" class="email buttonV"><i class="icon-group"></i> Contacts</a></div><div style="clear:both;"></div>-->
									<div class="subjectLine">
										<input type="text" name="subject" placeholder="Subject Title" class="required" style="margin-bottom: 7px;" />
									</div>
									
									
									<!--<div id="email" style="display: none;">
										 
										
										<a class="buttonV" href="javascript:void(0)" onclick="list_email(this.id)" id="van_16_dvt1985@hotmail.com">van</a>
										 
										
										<a class="buttonV" href="javascript:void(0)" onclick="list_email(this.id)" id="jack_17_admin@trinoweb.com">jack</a>
										 
										
										<a class="buttonV" href="javascript:void(0)" onclick="list_email(this.id)" id="j_18_j@j.com">j</a>
																													</div>-->
								
									<!-- <div><div class="left"><input type="text" name="attachments" placeholder="Attachments" id="attachment" readonly="" style="background: #e5f5f5;" /></div><a class="left" href="javascript:void(0)" id="attach">Attach</a><div class="clear"></div></div>-->

									<input type="hidden" name="recipients" id="recipients" value="" />
									<input type="hidden" name="response" id="resp" />
									<input type="hidden" name="receipient_id" id="receipient_id" value="" />
									<input type="hidden" name="attachments" id="attachments" value="" />
									
									<div class="clear"></div>
									
								</div>
                                <div style="clear: both;"></div>
							</td><td width="50%" style="padding-right: 0;">
								<div class="left msg">
									<textarea placeholder="Instant Message - Type message here" name="message" class="required message" style="height:44%; width:98%;margin-bottom:10px"></textarea>
                                    <input style="float:right;" type="submit" name="submit" value="Send" class="buttonV" id="send_email" />
    								<a href="javascript:void(0);" class="buttonV attachment" style="float:right;margin-right:8px;"><i class="icon-book"></i> Attach Documents</a>					
                                    <div style="clear: both;"></div>
								</div>
                                <div style="clear: both;"></div>
							</td></tr></table>
							
                            <div style="clear:both;"></div>
							
                            <!--<div style="margin-top:-25px;padding-top:0px;">
								<input style="float:right;" type="submit" name="submit" value="Send" class="buttonV" id="send_email" />
								<a href="javascript:void(0);" class="buttonV attachment" style="float:right;margin-right:8px;"><i class="icon-book"></i> Attach Documents</a>					
                                <div style="clear: both;"></div>	
                            </div>-->
							
						</form>
                        <div style="">
							<b id="att" style="display: none;">Attachments :</b>
							<span class="attachments"></span>
						</div>
					</div>

					<div class="clearfix" ></div>
				</div><!-- emailTab -->
								
				
				
				
				<div class="buttonBarContainer">
				<div class="buttonBar">
					<div class="v1ButtonBarB">
						<a href="http://localhost/veritas/dashboard" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">
								<div class="icon">
									<i class="icon-home"></i>
								</div>
								<div class="caption">
									Home
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>
					<div class="v1ButtonBarB">
						<a href="http://localhost/veritas/search?search=" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon active33">
									<i class="icon-copy"></i>
								</div>
								<div class="caption active33">
									Documents
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>		
                    <div class="v1ButtonBarB">
						<a href="http://localhost/veritas/uploads/go/" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon active33">
									<i class="icon-upload-alt"></i>
								</div>
								<div class="caption active33">
									Upload
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>	
					
			<!--			<div class="v1ButtonBarB">
						<a href="http://localhost/veritas/keycontacts" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon">
									<i class="icon-group"></i>
								</div>
								<div class="caption">
									Contacts
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>				
				<div class="v1ButtonBarB">
						<a href="" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon">
									<i class="icon-time"></i>
								</div>
								<div class="caption">
									Key Contacts
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>				
					<div class="v1ButtonBarB">
						<a href="" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon">
									<i class="icon-headphones"></i>
								</div>
								<div class="caption">
									Button
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>				
					<div class="v1ButtonBarB">
						<a href="" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon">
									<i class="icon-cogs"></i>
								</div>
								<div class="caption">
									Button
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>			-->
                    					<div class="v1ButtonBarB">
                        <a href="http://localhost/veritas/feedback" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon">
									<i class="icon-star-empty"></i>
								</div>
								<div class="caption">
									Feedback
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>
                    					
			

					
					
									<div class="v1ButtonBarB">
                                                        						<a href="http://localhost/veritas/jobs" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon">
									<i class="icon-time"></i>
								</div>
								<div class="caption">
									Activity Log
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>					</div>		
					
					
				</div>
				</div><!-- buttonBarContainer -->
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<div class="mainContent">
				

<h3 class="page-title">
	Edit test job new</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="http://localhost/veritas/dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="http://localhost/veritas/jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="http://localhost/veritas/jobs/edit/9">Edit test job new</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $('#my_form').validate();
    });
</script>
<form action="" method="post" id="my_form" enctype="multipart/form-data">
<div id="table">
<h2>Job Description</h2>
<table>
<tr><td style="width:140px;"><b>Job Title</b></td><td><input type="text" class="required" name="title" value="test job new" /></td></tr>
<tr><td><b>Job Description</b></td><td><textarea name="description" class="required" >asd</textarea></td></tr>
 
<input type="hidden" name="img" value="afimaclogo.png" />
<tr><td><b>Image</b></td><td><input type="file" name="image" class="" /> <img src="/veritas/img/uploads/afimaclogo.png" alt="" /></td></tr>
<tr><td><b>Start Date</b></td><td><input type="text" class="" name="start_date" id="start_date" value="2014-01-03" /></td></tr>
<tr><td><b>End Date</b></td><td><input type="text" class="" name="end_date" id="end_date" value="2014-01-24" /></td></tr>
<tr><td><strong>Add Members:</strong></td><td>
<b>No Members added</b></table>
</td></tr>
</table>

<table>
<tr><td colspan="2"><strong>Add Contacts</strong></td></tr>
<tr><td colspan="2">
<table>
     <tr>   
    
    <td>  <input type="checkbox" name="key_contact[]" value="94"  />  Van Trinh</td>

    <td>  <input type="checkbox" name="key_contact[]" value="95"  />  Joe Smith</td>

    <td>  <input type="checkbox" name="key_contact[]" value="96"  />  Joe Smith</td>

    <td>  <input type="checkbox" name="key_contact[]" value="98"  />  Van Trinh</td>

    <td>  <input type="checkbox" name="key_contact[]" value="99"  />  Van Trinh</td>
</tr>
    <td>  <input type="checkbox" name="key_contact[]" value="100"  />  Test User</td>

    <td>  <input type="checkbox" name="key_contact[]" value="101"  />  ddd</td>
    <td>  <input type="checkbox" name="key_contact[]" value="96"  />  Joe Smith</td>

    <td>  <input type="checkbox" name="key_contact[]" value="98"  />  Van Trinh</td>

    <td>  <input type="checkbox" name="key_contact[]" value="99"  />  Van Trinh</td>
</tr>
</table>
</td></tr>
</table>
<div class="add_more"></div>
<a href="javascript:void(0)" id="add_key" class="btn btn-primary"> +Add Quick Keycontacts </a> <br /><br />
<div class="submit"><input type="submit" class="btn btn-primary" value="Save Changes" name="submit"/></div>
</div>






</form>
<script>
$(function(){
    $('.unch').change(function(){
       if($(this).is(':checked'))
       {
        //do nothing
       } 
       else
       {
        var mem = $(this).val();
        var job = '9';
        $.ajax({
           url:'http://localhost/veritas/jobs/removefromjob/'+mem+'/'+job
        });
       }
    });
    var add =   '<table width="100%"><tr><td>Contact Type</td><td colspan="3"><select name="type[]" class="required">'+
                '<option value="0">Key Contacts</option><option value="1">Staff Contacts</option>'+
                '<option value="2">Third Part Contacts</option></select></td></tr>'+
                '<tr><td><b>Name</b><br/> <input type="text" name="key_name[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Title</b><br/> <input type="text" name="key_title[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Cell Number</b><br/> <input type="text" name="key_cell[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Cellular Carrier</b><br />'+
                '<select name="key_cellular[]" class="required">'+
                '    <option value="Rogers">Rogers</option>'+
                '    <option value="Bell">Bell</option>'+
                '    <option value="Fido">Fido</option>'+
                '    <option value="Telus Mobility">Telus Mobility</option>'+
                '    <option value="Koodo Mobile">Koodo Mobile</option>'+
                '    <option value="Wind Mobile">Wind Mobile</option>'+
                '    <option value="Lynx Mobility">Lynx Mobility</option>'+
                '    <option value="MTS Mobility">MTS Mobility</option>'+
                '    <option value="PC Telecom">PC Telecom</option>'+
                '    <option value="Aliant">Aliant</option>'+
                '    <option value="SaskTel">SaskTel</option>'+
                '    <option value="Virgin Mobile">Virgin Mobile</option>'+
                '</select>'+
                '</td>'+
                '<td><b>Phone Number</b><br/> <input type="text" name="key_number[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Email</b><br/> <input type="text" name="key_email[]" class="email" style="width: 100px;" /></td>'+
                '<td><b>Company</b><br/> <input type="text" name="key_company[]" class="" style="width: 100px;" /> </td><td><input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" style="margin-top:20px;" value="Remove"/></td></tr>'+
                '</table>';
   $('#add_key').click(function(){
        $('.add_more').append(add);
   }); 
});
</script>				</div>

		</div><!-- rightColumn -->

		<div id="rightFooter">
					</div>
		
	</div><!-- rightContent -->
	</td></tr></table>
	
    <div style="clear: both;"></div>
</div><!-- fullContainer -->
<div class="dialog-modals"></div>

	<div style='padding-left:400px;'></div></body>
</html>
