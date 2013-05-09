<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
    I want deal
	</title>
    <?php echo $this->Html->script('jquery'); ?>
    <?php echo $this->Html->css('stylesheet'); ?>
    <?php echo $this->Html->css('bootstrap'); ?>
    <?php echo $this->Html->script('jquery.validate'); ?>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	<?php
    echo $this->Html->script('ckeditor/ckeditor');
        echo $this->Html->script('ckfinder/ckfinder');
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
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
    <div id="container">
        <div id="wrap">
		<div id="header">
        <?php //echo $this->Html->link('Register','/home/register'); ?>
        <div class="logo">
           <a href="#">I want Deals</a>
        </div>
        <div class="login">
            <?php if($this->Session->read('error')|| $this->Session->read('user')){ echo $this->Html->link('My Account','/user'); } else{
            echo $this->Html->link('Register','/home/register');  
            echo $this->Html->link('Login','/user/login');
            ?>
        <!-- <form action="/ads/home/index" method="post">
            Username : <input type="text" name="username"  /><br />
            Password : <input type="password" name="password" /><br />
            <input type="submit" name="submit" value="Log In" /> <?php echo $this->Html->link('forget password','/home/forget_password'); ?>
        </form> -->
        
        
        
        <?php } ?>
        </div>
        <div class="clear"></div>        
        </div
		<div id="content">
            <?php if($this->Session->read('user')) { ?>
            <div id="breadcrum">
                <ul>
                    <li><?php echo $this->Html->link('Ads Manager','/user/ads'); ?></li>
                    <li><?php echo $this->Html->link('Settings','/user/settings'); ?></li>
                    <li><?php echo $this->Html->link('Logout','/user/logout') ?></li>
                </ul>
            </div>
            <?php } ?>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
        <div class="con"
			Copyright © Iwantdeals.ca 2013
			<?php echo $this->Html->link('Home','/'); ?> |
			<?php $posts = $this->requestAction('home/get_breadcrum');
               foreach($posts as $post): 
                ?><?php echo $this->Html->link($post['Page']['title'],'/'.$post['Page']['slug']); ?> |
                <?php endforeach;  
        ?>	<?php echo $this->Html->link('Contact','/contact'); ?>
        </div>
        </div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
