<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
include('inc.php');
$mems = $this->requestAction($base_url.'/dashboard/get_email_list');
$ad = $this->requestAction($base_url.'/dashboard/get_user');
//echo  $base_url;
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

		//echo $this->Html->css('cake.generic');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('style');
        echo $this->Html->script('jquery');
        echo $this->Html->script('ajaxupload.3.6');
        echo $this->Html->script('jquery.validate');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
    <script src="<?php echo $base_url;?>jwplayer/jwplayer.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <script type="text/javascript">jwplayer.key="N+fGwqE9+uBPKzrjO6qyGHWiJJRmw0UtbEU0iA==";</script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	<link rel="shortcut icon" href="/img/favicon.ico" />
	
    <script type="text/javascript">
   
    $(function(){
        $('.close_modal').live('click',function(){
            $('.ui-dialog-titlebar-close').click();
        });
        $('.doc').live('change',function(){
           var val = $(this).val();
           if($(this).is(':checked'))
           {
            if($('#attachments').val() != ''){
            var txts = $('#attachments').val()+','+$(this).val();
            $('#attachments').val($('#attachments').val()+','+$(this).val());
            $('.attachments').text(txts);
            }
            else{
            $('#attachments').val($(this).val());
            $('.attachments').html($(this).val());
            }
           }
           else
           {
            var txt = $('#attachments').val().replace(','+$(this).val(),'');
            $('#attachments').val($('#attachments').val().replace(','+$(this).val(),''));
            $('.attachments').text(txt);
            $('#attachments').val($('#attachments').val().replace($(this).val()+',',''));
            var txt2 = $('#attachments').val().replace($(this).val()+',','');            
            $('.attachments').text(txt2);
            $('#attachments').val($('#attachments').val().replace($(this).val(),''));
            var txt3 = $('#attachments').val().replace($(this).val(),'');            
            $('.attachments').text(txt3);
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
                $('#send_email').attr('disabled','disabled');
               }
           }
           
        });
        $('#contacts_modal').click(function(){
         $('.dialog-modals').load('<?php echo $base_url.'members/loadall';?>');
               $('.dialog-modals').dialog({
                    
                    width: 550,
                    height:500,
                    title:'Add Contacts to Email',
                    
               });
               });
               $('.attachment').click(function(){
         $('.dialog-modals').load('<?php echo $base_url.'uploads/loadall';?>');
               $('.dialog-modals').dialog({
                    
                    width: 550,
                    height:500,
                    title:'Attach files to Email',
                    
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
    </script>
    <style>label.error{display: none !important;}

.required.error{border:1px solid red !important;}

</style>
    
</head>
<body>



<div id="fullContainer">
	<div id="leftColumn">

		<?php if($this->Session->read('avatar') || $this->Session->read('user')){ ?>

			<div class="logo"><a href="<?php echo $base_url;?>dashboard"><?php echo $this->Html->image('/img/logoVeritas01.png');?></a></div>
			
			
			<div class="poweredBy">
				<table cellspacing="0" cellpadding="0" border="0" width="100%" height="100%"><tr><td valign="middle">Powered By <br/><img src="<?php echo $base_url;?>img/afimaclogo.png" alt=""/></td></tr></table>
			</div>
			
			<div class="menu">
				<?php if($this->Session->read('avatar')){?>
					<?php  echo $this->Html->link('<i class="icon-globe"></i>'.'User Manager','/members',array('escape' => false,)); ?>
					<?php  //echo $this->Html->link('<i class="icon-user"></i>'.'Company Manager','/comp',array('escape' => false,)); ?>
					<?php // echo $this->Html->link('<i class="icon-list"></i>'.'Pages','/dashboard/home',array('escape' => false,)); ?>
				<?php }?>
				
				<?php  echo $this->Html->link('<i class="icon-flag"></i>'.'Job Manager','/jobs',array('escape' => false,)); ?>
				<?php  echo $this->Html->link('<i class="icon-envelope-alt"></i>'.'Mail <span class="notific"></span>','/mail',array('escape' => false,)); ?>
				<?php  echo $this->Html->link('<i class="icon-off"></i>'.'Logout','/admin/logout',array('escape' => false,)); ?>
				<?php //echo $this->Html->link('Document','/uploads'); ?>
			</div><!-- menu -->

		<?php } ?>
		
		
	</div><!-- leftColumn -->


	<div id="rightColumn">
		<div id="rightHeader">
			<?php if($this->Session->read('id')){?>
				<div class="headSearch">
				<form action="<?php echo $base_url;?>search" method="get" id="searchDocuments">
					<div class="searchInput">
					<input type="text" name="search" style="margin-top: 10px;" placeholder="Documents Search" />
                    <!--<input type="hidden" name="date" value="asc" /> -->
					</div>
					<div class="searchButton">
					<a href="javascript:{}" onclick="document.getElementById('searchDocuments').submit();" class="btn icn-only"><i class="icon-search"></i></a>
					</div>
				</form>
				</div><!-- headSearch -->
			<?php }?>
			
			
			<?php if($this->Session->read('avatar')){?>
				<!--h1>Welcome <?php echo $this->Session->read('avatar');?></h1-->
				<div class="userControlPanel">
					<div class="avatar">
					<?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => '', 'class'=>'image'))?>
					</div>
					
					<div class="links">
					<?php  echo $this->Html->link('<i class="icon-user"></i> '.' '.$this->Session->read('avatar'),'/dashboard/settings',array('escape' => false,)); ?><br/>
					<?php  echo $this->Html->link('<i class="icon-warning-sign"></i> '.'User Support','/dashboard/contactus',array('escape' => false,)); ?>
					</div>
					
					<!--div class="companyLogo">
					<?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => '', 'class'=>'image'))?>
					</div-->
				</div>
			<?php }?>
			
			
			
			<?php if($this->Session->read('user')) {?>
				<div class="userControlPanel">
					<!--div class="" style="">Welcome <?php echo $this->Session->read('user');?></div-->
					<div class="avatar">
					<?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => ''))?>
					</div>
					<div class="links">
					<?php  echo $this->Html->link('<i class="icon-user"></i>'.' '.$this->Session->read('user'),'/dashboard/settings',array('escape' => false,)); ?><br/>
					<?php  echo $this->Html->link('<i class="icon-warning-sign"></i> '.'User Support','/dashboard/contact',array('escape' => false,)); ?>
					</div>
					<!--div class="companyLogo">
					<?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => '', 'class'=>'image'))?>
					</div-->
				</div>
			<?php } ?>
			
			<div id="email_reponse"></div>
		</div><!-- rightHeader -->

		
		
		
		<div id="rightContent">
        <?php
        if($this->Session->read('canEmail') || $this->Session->read('admin'))
        {
            ?>
            
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
					<div class="message-form">
						<form id="Form" action="<?php echo $base_url.'mail/send?return='.urlencode($_SERVER['REQUEST_URI']);?>" method="post">
							<div class="left msg">
								<textarea placeholder="Quick message - Type message here" name="message" class="required message" style=""></textarea>
							</div>
							
							<div class="left inputs">
								<div class="subjectLine">
									<input type="text" name="subject" placeholder="Subject" class="required" style="margin-bottom: 0;width: calc(100% - 10px);" />
								</div>
								<div class="recipientsLine">
                                    <div id="name" style="height: 19px; width: calc(100% - 10px); background: white; border: 1px solid #ccc;padding:2px 4px;margin-bottom: 1px;color:#AAA;">Recipients</div>
<!--									<input type="text" name="name" id="name" placeholder="Recipients (Separate with comma)" class="required" />--> 
								</div>
							
								<a href="javascript:void(0)" id="contacts_modal" onclick="show_email();" class="email buttonV"><i class="icon-group"></i> Contacts</a> <!--<a href="javascript:void(0);" class="buttonV attachment">Attach Documents</a>-->
								
								<!--<div id="email" style="display: none;">
									<?php foreach($mems as $m) {
									   if(!$this->Session->read('admin'))
                                       {
                                        if($m['Member']['id'] == $this->Session->read('id'))
                                        {
                                            continue;
                                        }
                                       }
									   ?> 
                                    
									<a class="buttonV" href="javascript:void(0)" onclick="list_email(this.id)" id="<?php echo $m['Member']['full_name']."_".$m['Member']['id']."_".$m['Member']['email'];?>"><?php echo $m['Member']['full_name']; ?></a>
									<?php } ?>
									<?php 
										if(!$this->Session->read('avatar'))
										{?>
											<a class="buttonV" href="javascript:void(0)" onclick="list_email(this.id)" id="<?php echo $ad['User']['name_avatar']."_0_".$ad['User']['email']; ?>"><?php echo $ad['User']['name_avatar']; ?></a>
										<?php }
									?>
								</div>-->
							
								<!-- <div><div class="left"><input type="text" name="attachments" placeholder="Attachments" id="attachment" readonly="" style="background: #e5f5f5;" /></div><a class="left" href="javascript:void(0)" id="attach">Attach</a><div class="clear"></div></div>-->

								<input type="hidden" name="recipients" id="recipients" value="" />
								<input type="hidden" name="response" id="resp" />
								<input type="hidden" name="receipient_id" id="receipient_id" value="" />
                                <input type="hidden" name="attachments" id="attachments" value="" />
								<input type="submit" name="submit" value="Send" class="buttonV" id="send_email" />
                                <div class="clear"></div>
                                
							</div>
						</form>
                        <!--<div><b>Attachments :</b><span class="attachments"></span></div>-->
					</div>

					<div class="clearfix" ></div>
				</div><!-- emailTab -->
				<?php
        }
        ?>
				
				
				
				
				<!--<div class="buttonBarContainer">
				<div class="buttonBar">
					<div class="v1ButtonBarB">
						<a href="<?=$base_url;?>dashboard" class="fullLink">
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
						<a href="" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon active33">
									<i class="icon-copy"></i>
								</div>
								<div class="caption active33">
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
									<i class="icon-group"></i>
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
									<i class="icon-time"></i>
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
					</div>			
					<div class="v1ButtonBarB">
						<a href="" class="fullLink">
							<div  class="glassButton">
							<div  class="full8ButtonB">

								<div class="icon">
									<i class="icon-star-empty"></i>
								</div>
								<div class="caption">
									Button
								</div>
								<div class="dusk"></div> 
							</div>
							</div>
						</a>
					</div>			

				</div>
				</div><!-- buttonBarContainer -->
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<?php echo $this->Session->flash(); ?>

				
				<div class="mainContent">
				<?php echo $this->fetch('content'); ?>
				</div>

		</div><!-- rightColumn -->

		<div id="rightFooter">
			<?php /* echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				); */
			?>
		</div>
		
	</div><!-- rightContent -->
</div><!-- fullContainer -->
<div class="dialog-modals"></div>

	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
