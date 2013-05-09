<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	Ads Management | Administrator
	</title>
    <?php echo $this->Html->script('jquery'); ?>
    <?php echo $this->Html->script('jquery.validate'); ?>
    <?php echo $this->Html->css('style'); ?>
	<?php
       echo $this->Html->script('ckeditor/ckeditor.js');
        echo $this->Html->script('ckfinder/ckfinder.js');
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <link rel="stylesheet" href="jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
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
     </script>
 </head>
 <body>
    <div id="header">
    
    </div>
    <div id="content" >
        <div id="sidebar">
        <?php 
            if($this->Session->read('admin'))
            {
            ?>
            <ul>
            <li><?php echo $this->Html->link('Page Manager','/dashboard/pages'); ?></li>
            <li><?php echo $this->Html->link('Category','/dashboard/category'); ?></li>
            <li><?php echo $this->Html->link('Account Settings','/dashboard/settings'); ?></li>
            <li><?php echo $this->Html->link('Company Manager','/dashboard/business'); ?></li>
            <li><?php echo $this->Html->link('Seekers Manager','/dashboard/seekers'); ?></li>
            <li><?php echo $this->Html->link('General Settings','/dashboard/general_settings'); ?></li>
            <li><?php echo $this->Html->link('Ads Manager','/dashboard/ads'); ?></li>
            <li><?php echo $this->Html->link('Spam Ad','/dashboard/spam'); ?></li>
            <li><?php echo $this->Html->link('Logout','/admin/logout'); ?></li>
            </ul>
       <?php } ?>
        </div>
        <div id="main">
            <?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
        </div>
    </div>
 </body>