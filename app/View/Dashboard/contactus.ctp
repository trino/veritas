<form class="formoid-default"  action="" method="post">
	<div class="element-text" ><h2 class="title"><?php echo $this->requestAction('dashboard/translate/User Support');?></h2></div>
    
	<div class="element-input"  title="Full Name"><label class="title"><?php echo $this->requestAction('dashboard/translate/Name');?><span class="required">*</span></label><input type="text" name="name" required="required" placeholder="Full Name"/></div>
	<div class="element-email"  title="Emial Address"><label class="title"><?php echo $this->requestAction('dashboard/translate/Email');?><span class="required">*</span></label><input type="email" name="email" value="" placeholder="Email Address" required="required"/></div>
	<div class="element-input"  title="Contact Number"><label class="title"><?php echo $this->requestAction('dashboard/translate/Phone');?></label><input type="text" name="phone" placeholder="Phone Number" /></div>
	<div class="element-textarea" ><label class="title"><?php echo $this->requestAction('dashboard/translate/Message');?><span class="required">*</span></label><textarea name="message" cols="20" rows="5" required="required" placeholder="Your Message"></textarea></div>
	<div class="element-submit" ><input type="submit" name="submit" value="<?php echo $this->requestAction('dashboard/translate/Contact Us');?>" class="btn btn-primary"/></div>

</form>
