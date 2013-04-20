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
include_once('inc.php');


$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		V Management
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
    <script type="text/javascript">
    $(document).ready(function(){
     $('#Form').validate({
    rules: {
            password: 'required',
            c_password: {
                  required: true,
                  equalTo: '#password'
            }
      }
 });  
     });
    $(function(){
        $.ajax({
            
            url: '<?php echo $base_url;?>admin/email_status',

          
            success:function(response)
            {
                var a='<a href="<?php echo $base_url;?>/mail">You Have received '+response+' email(s)</a>'
                if(response>0)
                $('.notific').html(' ('+response+')');
                else
                $('.notific').html('');
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
                $('.notific').html(' ('+response+')');
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
	<div id="container">
		<div id="header">
        <?php 
        if($this->Session->read('avatar')){?>
			<h1>Welcome <?php echo $this->Session->read('avatar');?></h1>
            <div class="right user-panel" style="border:1px solid green;width:200px; float:right;">
                <?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => '', 'class'=>'image'))?>
                <div class="links">
                <?php  echo $this->Html->link('<i class="icon-user"></i> '.'User Preference','/dashboard/settings',array('escape' => false,)); ?>
                <?php  echo $this->Html->link('<i class="icon-group"></i> '.'Manage My team','/dashboard/settings',array('escape' => false,)); ?>
                <?php  echo $this->Html->link('<i class="icon-warning-sign"></i> '.'User Support','/dashboard/settings',array('escape' => false,)); ?>
            </div>
            </div>
            <div class="clear"></div>
            <?php }?>
        <?php 
            if($this->Session->read('user'))
            {
                ?>

                <div class="right user-panel" style="border:1px solid green;width:200px; float:right;">
				                <div class="left" style="color:#999;">Welcome <strong><?php echo $this->Session->read('user');?></strong></div>

                    <?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => ''))?>
                    <div class="links">
                     <?php  echo $this->Html->link('<i class="icon-user"></i>'.'User Preference','/dashboard/settings',array('escape' => false,)); ?>
                    <?php  echo $this->Html->link('<i class="icon-group"></i> '.'Manage My team','/dashboard/settings',array('escape' => false,)); ?>
                <?php  echo $this->Html->link('<i class="icon-warning-sign"></i> '.'User Support','/dashboard/settings',array('escape' => false,)); ?>
                </div>
                </div>
            
                <div class="clear"></div>
                <?php
            }
        ?>
        <div id="email_reponse"></div>
		</div>
        
		<div id="content">
        <?php
            if($this->Session->read('avatar') || $this->Session->read('user'))
            {
         ?>
        <div id="sidebar">
            <a href="<?php echo $base_url;?>dashboard"><h2 style="color:#FFF; font-size:40px;">LOGO</h2></a>
        <?php if($this->Session->read('avatar')){?>
            

            <?php  echo $this->Html->link('<i class="icon-globe"></i>'.'User Manager','/members',array('escape' => false,)); ?>
            <?php  echo $this->Html->link('<i class="icon-user"></i>'.'Company Manager','/comp',array('escape' => false,)); ?>
            <?php // echo $this->Html->link('<i class="icon-list"></i>'.'Pages','/dashboard/home',array('escape' => false,)); ?>
            <?php }?>
            <?php  echo $this->Html->link('<i class="icon-flag"></i>'.'Job Manager','/jobs',array('escape' => false,)); ?>
            <?php  echo $this->Html->link('<i class="icon-envelope-alt"></i>'.'Mail<span class="notific"></span>','/mail',array('escape' => false,)); ?>
            <?php  echo $this->Html->link('<i class="icon-off"></i>'.'Logout','/admin/logout',array('escape' => false,)); ?>
            <?php //echo $this->Html->link('Document','/uploads'); ?>

            </div>
            
            <div class="main"><?php }?>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
            </div>
            <div class="clear"></div>
		</div>
        
        
		<div id="footer">
			<?php /* echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				); */
			?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
