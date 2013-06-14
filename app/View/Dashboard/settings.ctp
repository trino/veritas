<?php include_once('inc.php');?>

<h3 class="page-title">
	User Preference
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>dashboard/settings">User Preference</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<?php 
    if($this->Session->read('avatar'))
    {
        $email = $user['User']['email'];
        $password = $user['User']['password'];
        $name = $user['User']['name_avatar'];
        $image = $user['User']['picture'];
        //$avatar = $user['User']['name_avatar'];
    }
    else
    {
        $email = $user['Member']['email'];
        $password = $user['Member']['password'];
        $name = $user['Member']['full_name'];
        $fname = $user['Member']['fname'];
        $lname = $user['Member']['lname'];
        $image = $user['Member']['image'];
        //$avatar = $user['User']['name_avatar'];
    }
?>

<script>
$(function(){
   $('#passw').val('');
   $('#old_password').val('');
   $('#myform').validate();
   $('#old_password').keypress(function(){
    if($(this).val() == '')
    {
        $('#passw').removeClass('required');
    }
    else
    {
        if($('#passw').attr('class').replace('required','') == $('#passw').attr('class'))
        $('#passw').addClass('required');
    }
    
   });  
   $('#old_password').change(function(){
    if($(this).val() == '')
    {
        $('#passw').removeClass('required');
    }    
   });
   $('#passw').change(function(){
    $('#passw').removeClass('error');
   });
   
});
</script>
<div id="table">
    <form action="" method="post" id="myform" enctype="multipart/form-data">
        <table>
        <?php
        if($this->Session->read('user'))
        {
            ?>
            <tr><td style="width:140px;"><b>First name</b></td><td><input type="text" name="name" value="<?php echo $fname ?>" class="required"<?php if($this->Session->read('user')) echo "readonly='readonly'" ;?>/></td></tr>
            <tr><td style="width:140px;"><b>List Name</b></td><td><input type="text" name="name" value="<?php echo $lname ?>" class="required"<?php if($this->Session->read('user')) echo "readonly='readonly'" ;?>/></td></tr>    
            <?php
        }
        ?>
        
       <tr><td style="width:140px;"><b><?php if(!$this->Session->read('admin')){?>Username<?php }else{?>Name<?php }?></b></td><td><input type="text" name="name" value="<?php echo $name ?>" class="required"<?php if($this->Session->read('user')) echo "readonly='readonly'" ;?>/></td></tr>

        <!--<tr><td><b>Avatar</b></td><td><input type="text" name="avatar" value="<?php echo $avatar;?>"  /><br />-->
        <tr><td><b>Email</b></td><td><input type="text" name="email" value="<?php echo $email; ?>" id="email" class="email" <?php if($this->Session->read('user')) echo "readonly='readonly'" ;?> /><span id="email_response"></span></td></tr>
        <tr><td><b>Image</b></td><td><?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => ''))?></td></tr>
        <!--<tr><td><b>New Image</b></td><td><input type="file" name="image"  /><br />-->
        <tr><td><b>Old password</b></td><td><input type="password" name="old_password" id="old_password" class=""  /><span id="response"></span></td></tr>
       <tr><td><b> New Password </b></td><td><input type="password" id="passw" name="password" class="" /></td></tr>
        <?php 
            if(!$this->Session->read('avatar'))
            { ?>
                <tr><td><b>Address</b></td><td><input type="text" name="address" value="<?php echo $user['Member']['address']; ?>" class="required" <?php if($this->Session->read('user')) echo "readonly='readonly'" ;?> /></td></tr>
               <tr><td><b>Phone </b></td><td><input type="text" name="phone" value="<?php echo $user['Member']['phone']; ?>" class="required" <?php if($this->Session->read('user')) echo "readonly='readonly'" ;?> /></td></tr>
            
        <tr><td><b>Receive email when someone sends me message</b></td><td><input class="receive" type="checkbox" name="receive1" <?php if($user['Member']['receive1']==1){?>checked="checked"<?php }?> /></td></tr>
        <tr><td><b>Receive email when document is uploaded</b></td><td><input class="receive" type="checkbox" id="receive2" name="receive2" <?php if($user['Member']['receive2']==1){?>checked="checked"<?php }?> /></td></tr>
        <tr class="upload_more" style="display: none;" >
        <td colspan="2" >
        <table width="50%">
        <tr>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span><input type="checkbox" name="Email_contracts" <?php if(isset($e['Emailupload']['contract']) && $e['Emailupload']['contract']==1){?>checked="checked"<?php }?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evidence </span><input type="checkbox" name="Email_evidence" <?php if(isset($e['Emailupload']['evidence']) && $e['Emailupload']['evidence']==1){?>checked="checked"<?php }?>  />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Templates </span><input type="checkbox" name="Email_templates" <?php if(isset($e['Emailupload']['template']) && $e['Emailupload']['template']==1){?>checked="checked"<?php }?> />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report </span><input type="checkbox" name="Email_client_memo" <?php if(isset($e['Emailupload']['report']) && $e['Emailupload']['report']==1){?>checked="checked"<?php }?> />
        <!--<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Feedback </span><input type="checkbox" name="Email_client_memo1" <?php if(isset($e['Emailupload']['client_memo']) && $e['Emailupload']['client_memo']==1){?>checked="checked"<?php }?> />-->
        </td>
        </tr>
        </table>
        </td></tr>
<?php }?>
        <tr><td><input type="submit" name="submit" value="Save Changes" class="btn btn-primary" onclick="if($('#old_password').val() != '' && $('#passw').val() == ''){$('#passw').addClass('error');return false;}else return true;" /></td></tr>
    </table>
    </form>
</div>
<script>
$(function(){
    if($('#receive2').is(':checked'))
        $('.upload_more').show();
    $('#receive2').click(function(){
        if($('#receive2').is(':checked'))
            $('.upload_more').show();
        else
        {
            $('.upload_more').hide();
            $('.upload_more input:checkbox').each(function(){
                $(this).removeAttr('checked');
            });
        }
            
    
    });       
});
</script>