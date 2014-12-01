<?php
include('inc.php');
if($this->Session->read('admin'))
    $module = $this->requestAction($base_url.'/dashboard/get_active_module');
$mems = $this->requestAction($base_url.'/dashboard/get_email_list');
$ad = $this->requestAction($base_url.'/dashboard/get_user');
$jobs = $this->requestAction($base_url.'/dashboard/get_jobs');
$job2 = $this->requestAction($base_url.'/dashboard/get_job2');
$upload = $this->requestAction($base_url.'/dashboard/upload');
$usr = $this->requestAction($base_url."/dashboard/getall");
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>    
	<title>
		Veritas | Intelligence on Demand
	</title>    
    
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('accodian');        
        echo $this->Html->css('style');
        echo $this->Html->css('jquery.timepicker');
        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery.dcjqaccordian');
        echo $this->Html->script('cookie');
        echo $this->Html->script('hoverintent');        
        echo $this->Html->script('ajaxupload.3.6');
        echo $this->Html->script('jquery.validate');
        echo $this->Html->script('jquery.timepicker');
        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css' />
    <script src="<?php echo $base_url;?>jwplayer/jwplayer.js"></script>
    
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <script type="text/javascript">jwplayer.key="N+fGwqE9+uBPKzrjO6qyGHWiJJRmw0UtbEU0iA==";</script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	<link rel="shortcut icon" href="/img/favicon.ico" />
    <?php if($this->Session->read('lang')){?>
    <style>
        .dashboard-stat .desc{font-size:11.3px!important;}
        .v1ButtonBarB{width:120px!important;}
        .v1ButtonBarB .caption{font-size:9px!important;}
        #table .btn{margin-top:3px;}
    </style>
        <?php
    }?>
    
    <script type="text/javascript">
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
        $('.changelang').change(function(){
           var lang = $(this).val();
           $.ajax({
                   'type':'post',
                   'url' : '<?php echo $this->webroot;?>dashboard/changelang/'+lang,
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
               if(ar[0])
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
           if(ar[0])
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
					   var last = value.substr(-1,1);
					   
						var em=$('#name').val();
						var ema=$('#recipients').val();
                        
						var e=value.split('__');
                        //alert(e.length);
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
						    if(e[2])
						    ema = ema.replace(e[2]+',','');
                            ema2 = ema2.replace('<a href="javascript:void(0)" id="'+e[2]+'__'+e[1]+'" class="del_email">'+e[0]+' [x],'+'</a> ','');
                            if(e[2])                         
							email=ema+e[2]+',';
                            del_em = ema2+'<a href="javascript:void(0)" id="'+e[2]+'__'+e[1]+'" class="del_email">'+e[0]+' [x],'+'</a> ';
                            
						}
						//alert(email);
						$('#receipient_id').val(id);
						$('#recipients').val(email);
						$('#name').html(del_em);
                        $('#send_email').removeAttr('disabled');
					}
    </script>
</head>
<body>
<div id="fullContainer">
<table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
	<tr><td style="width:230px; padding:0px; vertical-align:top;" valign="top">
	<div id="leftColumn">
		<?php if($this->Session->read('avatar') || $this->Session->read('user')){ ?>
			<div class="logo"><a href="<?php if(!$this->Session->read('job_id')){echo $base_url;?>dashboard<?php }else echo $base_url.'jobs/view/'.$this->Session->read('job_id');?>"><?php echo $this->Html->image('/img/logoVeritas01.png');?></a></div>
            <div class="poweredBy" style="background:transparent;" >
				<table cellspacing="0" cellpadding="0" border="0" width="100%" height="100%"><tr><td valign="middle" style="padding-top: 25px;"><img src="<?php echo $base_url;?>img/<?php if( $this->Session->read('logo')=="afimaclogo.png"){
				    echo "afimaclogo2.png";
				}else				{
				    echo "asap.png";
				} ?>" /></td></tr></table>
			</div>
			<div class="menu">
			<ul id="acc" style="margin: 0;" >
				<?php if($this->Session->read('avatar')){?>
					<li> <?php  echo $this->Html->link('<i class="icon-user"></i>'.$this->requestAction('dashboard/translate/List User'),'/members',array('escape' => false,)); ?>
                        <ul class="moreul">
                           <li><?php echo $this->Html->link('<i class="icon-arrow-right"></i>'.$this->requestAction('dashboard/translate/Add User'),'/members/add',array('escape'=>false));?></li>
                        </ul>
                    </li>
				<?php } ?>
				<li><?php  echo $this->Html->link('<i class="icon-globe"></i>'.$this->requestAction('dashboard/translate/List Jobs'),'/jobs',array('escape' => false,)); ?>
                    <?php if($this->Session->read('admin')){?>               
                    <ul class="moreul">                        
                        <li><?php echo $this->Html->link('<i class="icon-arrow-right"></i>'.$this->requestAction('dashboard/translate/Add Job'),'/jobs/add',array('escape'=>false));?></li>
                        <li><?php echo $this->Html->link('<i class="icon-arrow-right"></i>'.$this->requestAction('dashboard/translate/Assign Job to User'),'/jobs/listing',array('escape'=>false));?></li>
                    </ul>
                    <?php }?>
                </li>
				<li><?php  echo $this->Html->link('<i class="icon-envelope-alt"></i>'.$this->requestAction('dashboard/translate/Instant Message').'<span class="notific"></span>','/mail',array('escape' => false,)); ?>
                <ul class="moreul">
                    <li><?php echo $this->Html->link('<i class="icon-arrow-right"></i>'.$this->requestAction('dashboard/translate/Inbox'),'/mail',array('escape'=>false));?></li>
                    <li><?php echo $this->Html->link('<i class="icon-arrow-right"></i>'.$this->requestAction('dashboard/translate/Sent Mail'),'/mail/sent_mail',array('escape'=>false));?></li>
                </ul>
                </li>
                <li><?php echo $this->Html->link('<i class="icon-copy"></i>Documents','/search', array('escape'=>false));?>
                    <ul class="moreul">                        
                        <?php
                        if($this->Session->read('admin') || $this->Session->read('view'))
                        {
                            if($this->Session->read('admin') || $upload){
                                    $para = $this->request->params;
                                    if($para['controller']=='jobs' && $para['action']=='view')
                                    {
                                        $id = $para['pass'][0];
                                    }
                                    else
                                    $id = '';
                                    ?>
                                    <li><a href="<?php echo $base_url."/uploads/go/".$id;?>"><i class="icon-share"></i><?php echo $this->requestAction('dashboard/translate/Upload');?></a></li> 
                           <?php } ?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/contracts')){
                            ?><li><a href="<?php echo $base_url;?>search/index/contract"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Contract');?></a></li>
                            <?php
                            }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/evidence')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/evidence"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Evidence');?></a></li>
                            <?php 
                            }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/templates')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/template"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Template');?></a></li>
                            <?php }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/report')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/report"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Report');?></a></li>
                            <?php 
                            }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/site_orders')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/siteOrder"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Site Order');?></a></li>
                            <?php }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/training')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/training"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Training');?></a></li>
                            <?php }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/employee')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/employee"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Employee');?></a></li>
                            <?php }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/kpiaudits')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/KPIAudits"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/KPI Audits');?></a></li>
                            <?php }?>
                            
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/afimac_intel')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/special/afimac_intel"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/AFIMAC Intel');?></a></li>
                            <?php }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/news_media')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/special/news_media"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/News/Media');?></a></li>
                            <?php
                            }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/deployment_rate')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/deployment_rate"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Deployment');?></a></li>
                            <?php
                            }?>
                            <?php
                            /*
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/personal_inspection')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/personal_inspection"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Personal Inspection');?></a></li>
                            <?php
                            }?>

                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/mobile_log')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/mobile_log"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Mobile Log');?></a></li>
                            <?php
                            }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/inventory')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/mobile_vehicle_trunk_inventory"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?></a></li>
                            <?php
                            }?>
                            
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/mobile_inspection')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/mobile_inspection"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?></a></li>
                            <?php
                            }?>
                            <?php
                            if($this->requestAction($base_url.'uploads/checkAdminPerm/vehicle_inspection')){
                            ?>
                            <li><a href="<?php echo $base_url;?>search/index/vehicle_inspection"><i class="icon-arrow-right"></i><?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?></a></li>
                            <?php
                            } */?>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li>
                <?php if($this->Session->read('user') && $usr['Member']['canUpdate']==1 && $usr['Member']['Canupload']['report']=='1')  echo $this->Html->link('<i class="icon-time"></i>'.$this->requestAction('dashboard/translate/Saved Drafts'),'/uploads/draft',array('escape'=>false));?>
				<?php echo $this->Html->link('<i class="icon-star"></i>'.$this->requestAction('dashboard/translate/List Contacts'),'/contacts',array('escape'=>false));?>
                    <?php if($this->Session->read('admin')){?>   
                    <ul class="moreul">                        
                        <li><?php echo $this->Html->link('<i class="icon-arrow-right"></i>'.$this->requestAction('dashboard/translate/Add Contact'),'/contacts/add',array('escape'=>false));?></li>
                        <li><?php echo $this->Html->link('<i class="icon-arrow-right"></i>'.$this->requestAction('dashboard/translate/Upload contact'),'/contacts/upload',array('escape'=>false));?></li>
                    </ul>
                    <?php }?>
                </li>
                <?php if($this->Session->read('admin')){?>
                  <li>  <?php echo $this->Html->link('<i class="icon-briefcase"></i>'.$this->requestAction('dashboard/translate/Analytics'),'/uploads/stats',array('escape'=>false));?>
                  <ul class="moreul">
                    <li><?php echo $this->Html->link('<i class="icon-arrow-right"></i>'.$this->requestAction('dashboard/translate/Graphical Report'),'/uploads/graphs', array('escape'=>false));?></li>
                    <li><?php echo $this->Html->link('<i class="icon-arrow-right"></i>'.$this->requestAction('dashboard/translate/Regular Report'),'/uploads/stats', array('escape'=>false));?></li>
                  </ul>
                  </li>
                  <?php
                  if($module)
                  {
                    foreach($module as $mod)
                    {
                        ?>
                        <li>  <?php echo $this->Html->link('<i class="icon-copy"></i>'.$mod['AdminModule']['name'].' Module','/modules/view/'.$mod['AdminModule']['module_slug'],array('escape'=>false));?></li> 
                        <?php
                    }
                  }
                  ?>                  
                <?php }?>
			</ul>
            </div>
            <?php
            if($this->Session->read('special'))
            {
                ?>
                <div style="text-align: center;margin-top:40px;">
                <img src="<?php echo $base_url;?>img/brazil.png" />
                </div>
                <?php
            }
            ?>
		<?php } ?>
	</div>
	</td><td style="padding:0px;">	
	<div id="rightColumn">
		<div id="rightHeader">
			<?php if($this->Session->read('id')){?>
				<div class="headSearch">
				<form action="<?php echo $base_url;?>search" method="get" id="searchDocuments" style="float: left;">
					<div class="searchInput">
					<input type="text" name="search" style="margin-top: 10px;" placeholder="<?php echo $this->requestAction('dashboard/translate/Document Search');?>" />
					</div>
					<div class="searchButton">
					<a href="javascript:{}" onclick="document.getElementById('searchDocuments').submit();" class="btn icn-only"><i class="icon-search"></i></a>
					</div>
				</form>
                <div style="float: right;padding:10px 0 0 10px;">
                <select onchange="if($(this).val()){window.location = '<?php echo $base_url?>jobs/view/'+$(this).val();}">
                <option><?php echo $this->requestAction('dashboard/translate/Go To Job');?></option>
                <?php
                if($jobs)
                {
                    foreach($jobs as $jo)
                    {
                        ?>
                        <option value="<?php echo $jo['Job']['id'];?>"><?php echo $jo['Job']['title'];?></option>
                        <?php
                    }
                } 
                ?>                
                </select>
                <select class="changelang">
                    <option value="eng" <?php if($this->Session->read('lang')=='eng'){?>selected="selected"<?php }?>>English</option>
                    <option value="fre" <?php if($this->Session->read('lang')=='fre'){?>selected="selected"<?php }?>>French</option>
                </select>
                </div>
                <div class="clearfix"></div>
				</div>
			<?php }?>
			<?php if($this->Session->read('avatar')){?>
				<div class="userControlPanel">
					<div class="avatar">
					<?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => '', 'class'=>'image'))?>
					</div>					
					<div class="links">
                    <?php  echo $this->Html->link('<i class="icon-user"></i> '.' '.$this->Session->read('avatar'),'/dashboard/settings',array('escape' => false,)); ?><br/>
				    <?php  echo $this->Html->link('<i class="icon-off"></i> '.$this->requestAction('dashboard/translate/Logout'),'/admin/logout',array('escape' => false,)); ?><br/>				
				    <?php  echo $this->Html->link('<i class="icon-warning-sign"></i> '.$this->requestAction('dashboard/translate/User Support'),'/dashboard/contactus',array('escape' => false,)); ?>
					</div>
				</div>
			<?php }?>
            <?php if($this->Session->read('user')) {?>
				<div class="userControlPanel">			
					<div class="avatar">
					<?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => ''))?>
					</div>
					<div class="links">                    
					<?php  echo $this->Html->link('<i class="icon-user"></i>'.' '.$this->Session->read('user'),'/dashboard/settings',array('escape' => false,)); ?><br/>
					<?php  echo $this->Html->link('<i class="icon-off"></i> '.$this->requestAction('dashboard/translate/Logout'),'/admin/logout',array('escape' => false,)); ?><br/>
					<?php  echo $this->Html->link('<i class="icon-warning-sign"></i> '.$this->requestAction('dashboard/translate/User Support'),'/dashboard/contactus',array('escape' => false,)); ?>
					</div>
				</div>
			<?php } ?>
			<div id="email_reponse"></div>
		</div>
		<div id="rightContent">
        <?php
        if($this->Session->read('canEmail') || $this->Session->read('admin'))
        {
            ?>
            
				<div class="emailTab">					
					<div class="message-form" >
						<form id="Form" action="<?php echo $base_url.'mail/send?return='.urlencode($_SERVER['REQUEST_URI']);?>" method="post" class="messageform">							
							<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td width="50%">
								<div class="left inputs">
									<div class="recipientsLine" >
									
										<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td style="padding:0px; padding-bottom:4px;">
											<div id="name" style="height: 20px; background: none repeat scroll 0% 0% white; border: 1px solid rgb(204, 204, 204); padding: 1px 4px 2px; color: rgb(170, 170, 170); width:103%; float: left; font-family: 'Oxygen', sans-serif;"><?php echo $this->requestAction('dashboard/translate/To');?></div>
										</td><td style="width:30px;padding-top:5px; text-align:right;">
											<a id="contacts_modal" class="email btn btn-info" style="padding:0px;color:#FFF; width:100%; float:right; margin:0px; margin-top:-5px; margin-right:-18px; height:23px;" onclick="show_email();" href="javascript:void(0);">&nbsp;+&nbsp;</a>
										</td></tr></table> 
									</div>
									<div class="subjectLine">
										<input type="text" name="subject" placeholder="<?php echo $this->requestAction('dashboard/translate/Subject');?>" class="required" style="margin-bottom: 7px;" />
									</div>
                                    <input type="hidden" name="recipients" id="recipients" value="" />
									<input type="hidden" name="response" id="resp" />
									<input type="hidden" name="receipient_id" id="receipient_id" value="" />
									<input type="hidden" name="attachments" id="attachments" value="" />									
									<div class="clear"></div>									
								</div>
                                <div style="clear: both;"></div>
							</td><td width="50%" style="padding-right: 0;">
								<div class="left msg">
									<textarea placeholder="<?php echo $this->requestAction('dashboard/translate/Message');?>" name="message" class="required message" style="height:44%; width:98%;margin-bottom:10px"></textarea>
                                    <input style="float:right;" type="submit" name="submit" value="<?php echo $this->requestAction('dashboard/translate/Send');?>" class="buttonV" id="send_email" />
    								<a href="javascript:void(0);" class="buttonV attachment" style="float:right;margin-right:8px;"><i class="icon-book"></i><?php echo $this->requestAction('dashboard/translate/Attach Documents');?></a>					
                                    <div style="clear: both;"></div>
								</div>
                                <div style="clear: both;"></div>
							</td></tr></table>							
                            <div style="clear:both;"></div>
							</form>
                        <div style="">
							<b id="att" style="display: none;"><?php echo $this->requestAction('dashboard/translate/Attachments');?> :</b>
							<span class="attachments"></span>
						</div>
					</div>
					<div class="clearfix" ></div>
				</div>
				<?php
        }
        ?><div class="buttonBarContainer">
				<div class="buttonBar">
					<div class="v1ButtonBarB">
						<a href="<?=$base_url;?>dashboard" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">
								<div class="icon">
									<i class="icon-home"></i>
								</div>
								<div class="caption">
									<?php echo $this->requestAction('dashboard/translate/Home');?>
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>
					<div class="v1ButtonBarB">
						<a href="<?php echo $base_url;?>search?search=" class="fullLink">
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
<?php if($this->Session->read('admin') || $upload){
    $para = $this->request->params;
    if($para['controller']=='jobs' && $para['action']=='view')
    {
        $id = $para['pass'][0];
    }
    else
        $id = '';
    ?>
                    <div class="v1ButtonBarB">
						<a href="<?php echo $base_url;?>uploads/go/<?php echo $id;?>" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">
								<div class="icon active33">
									<i class="icon-upload-alt"></i>
								</div>
								<div class="caption active33">
									<?php echo $this->requestAction('dashboard/translate/Upload');?>
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>	
<?php }?>		 <?php if($this->Session->read('admin') || ($usr['Member']['canUpdate']==1 && $usr['Member']['Canupload']['client_feedback']=='1' && $upload)){ 
                        
                        
                                    if($this->Session->read('admin'))
                                    {
                                        $ur2 = $base_url.'feedback';
                                    }
                                    else
                                    {
                                        if($job2)
                                        {
                                            if(str_replace(',','',$job2)!=$job2)
                                            {
                                                $ur2 = $base_url.'jobs?client_feedback=1';    
                                            }
                                            else
                                            $ur2 = $ur2 = $base_url.'uploads/upload/'.$job2.'/client_feedback';
                                            
                                        } 
                                        else
                                        $ur2 = $base_url.'jobs?client_feedback=1';
                                    }
                                    
                        
                        ?>
					<div class="v1ButtonBarB">
                        <a href="<?php echo $ur2;?>" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon">
									<i class="icon-star-empty"></i>
								</div>
								<div class="caption">
									<?php echo $this->requestAction('dashboard/translate/Feedback');?>
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>
                    <?php }?>
                    <div class="v1ButtonBarB">
                                    <?php
                                    if($this->Session->read('admin'))
                                    {
                                        $ur = $base_url.'jobs';
                                    }
                                    else
                                    {
                                        if($job2)
                                        {
                                            if(str_replace(',','',$job2)!=$job2)
                                            {
                                                $ur = $base_url.'jobs?activity_log=1';    
                                            }
                                            else
                                                $ur = $ur = $base_url.'uploads/upload/'.$job2.'/activity_log';
                                            
                                        } 
                                        else
                                            $ur = $base_url.'jobs?activity_log=1';
                                    }
                                    ?>
                    <?php if($this->Session->read('admin')||($usr['Member']['canUpdate']==1 && $usr['Member']['Canupload']['report']=='1' && $upload)){?>
						<a href="<?php echo $ur?>" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">
								<div class="icon">
									<i class="icon-time"></i>
								</div>
								<div class="caption">
									<?php echo $this->requestAction('dashboard/translate/Activity Log');?>
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a><?php }?>
					</div>		
				</div>
				</div>
                <?php echo $this->Session->flash(); ?>
				<div class="mainContent">
				<?php echo $this->fetch('content'); ?>
				</div>
		</div>
		<div id="rightFooter">			
		</div>		
	</div>
	</td></tr></table>
	
    <div style="clear: both;"></div>
</div>
<div class="dialog-modals"></div>
	<?php echo "<div style='padding-left:400px;'>".$this->element('sql_dump')."</div>"; ?>
</body>
</html>