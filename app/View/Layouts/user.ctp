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
        echo $this->Html->script('jquery.validate');
 

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
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
    <style>label.error{display: none !important;}

.required.error{border:1px solid red !important;}

</style>
</head>
<body>
	<div id="container" class="company">
		<div id="header">
            <div id="content">
        <?php 
            if($this->Session->read('company'))
            {?>
                <h1>Welcome : <?php echo $this->Session->read('company'); ?></h1>
                <div class="right user-panel">
                <?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => '', 'class'=>'image'))?>
                <div class="links">
                <?php  echo $this->Html->link('<i class="icon-user"></i> '.'Dashboard','/company/dashboard',array('escape' => false,)); ?>
                <?php  echo $this->Html->link('<i class="icon-group"></i> '.'User Preference','/company/settings',array('escape' => false,)); ?>
                <?php  echo $this->Html->link('<i class="icon-warning-sign"></i> '.'Logout','/company/logout',array('escape' => false,)); ?>
            
                </div>
            </div>
            <?php }
        ?>
    		
    </div>
</div>
        
		<div id="content">
        
            
            <div class="main user-main">
			

			<?php echo $this->fetch('content'); ?>
            </div>
            <div class="clear"></div>
		</div>
        
        
		<div id="footer">
			<?php /*echo $this->Html->link(
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
