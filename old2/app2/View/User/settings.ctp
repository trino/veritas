<div id="contents">
<div class="setting">



<?php 

	echo $this->Html->link('<div class="btn btn-large btn-block btn-success"><i class=" icon-asterisk icon-white"></i>'.'Account Settings'.'</div>','/user/account_settings',array('escape' => false,));
    ?>
 
    <?php
	echo $this->Html->link('<div class="btn btn-large btn-block btn-success"><i class=" icon-wrench icon-white"></i>'.'General Settings'.'</div>','/user/general_settings',array('escape' => false,));
?>

 </div>
</div>