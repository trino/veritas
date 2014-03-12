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
   $('#myform').validate({
    rules:{
     npassword:{
        equalTo:'#passw'
     }   
    },
    messages:{
        npassword:{
            equalTo:'Please enter same password'
        }
    }
   });
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
            <tr><td style="width:140px;"><b>First name</b></td><td><input type="text" name="fname" value="<?php echo $fname ?>" class="required"<?php if($this->Session->read('user')) echo "readonly='readonly'" ;?>/></td></tr>
            <tr><td style="width:140px;"><b>List Name</b></td><td><input type="text" name="lname" value="<?php echo $lname ?>" class="required"<?php if($this->Session->read('user')) echo "readonly='readonly'" ;?>/></td></tr>    
            <?php
        }
        ?>
        
       <tr><td style="width:140px;"><b><?php if(!$this->Session->read('admin')){?>Username<?php }else{?>Name<?php }?></b></td><td><input type="text" name="name" value="<?php echo $name ?>" class="required"<?php if($this->Session->read('user')) echo "readonly='readonly'" ;?>/></td></tr>

        <!--<tr><td><b>Avatar</b></td><td><input type="text" name="avatar" value="<?php echo $avatar;?>"  /><br />-->
        <tr><td><b>Email</b></td><td><input type="text" name="email" value="<?php echo $email; ?>" id="email" class="email" <?php if($this->Session->read('user')) echo "readonly='readonly'" ;?> /><span id="email_response"></span></td></tr>
        <tr><td><b>Image</b></td><td><?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => '','style'=>'width:60px;height:60px;'))?></td></tr>
        <!--<tr><td><b>New Image</b></td><td><input type="file" name="image"  /><br />-->
        <tr><td><b>Old password</b></td><td><input type="password" name="old_password" id="old_password" class=""  /><span id="response"></span></td></tr>
       <tr><td><b> New Password </b></td><td><input type="password" id="passw" name="password" class="" /></td></tr>
       <tr><td><b> New Password Again </b></td><td><input type="password" id="npassw" name="npassword" class="" /></td></tr>
        <?php 
            if(!$this->Session->read('avatar'))
            { ?>
                <tr><td><b>Address</b></td><td><input type="text" name="address" value="<?php echo $user['Member']['address']; ?>" class="" <?php if($this->Session->read('user')) echo "readonly='readonly'" ;?> /></td></tr>
               <tr><td><b>Phone </b></td><td><input type="text" name="phone" value="<?php echo $user['Member']['phone']; ?>" class="" <?php if($this->Session->read('user')) echo "readonly='readonly'" ;?> /></td></tr>
        <?php if($user['Member']['canEdit']=='1')
        {?>
        <tr><td><b>Receive email when someone sends me message</b></td><td><input class="receive" type="checkbox" name="receive1" <?php if($user['Member']['receive1']==1){?>checked="checked"<?php }?> /></td></tr>
        <tr><td><b>Receive email when document is uploaded</b></td><td><input class="receive" type="checkbox" id="receive2" name="receive2" <?php if($user['Member']['receive2']==1){?>checked="checked"<?php }?> /></td></tr>
        <tr class="upload_more" style="display: none;" >
        <td colspan="2" >
        <table width="50%">
        <tr>
        <td>
        <?php if($admin_doc['AdminDoc']['contracts']=='0' ){?><input type="hidden" name="Email_contracts" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span><input type="checkbox" name="Email_contracts" <?php if(isset($e['Emailupload']['contract']) && $e['Emailupload']['contract']==1){?>checked="checked"<?php }?>/><?php }?>
        
        <?php if($admin_doc['AdminDoc']['evidence']=='0' ){?><input type="hidden" name="Email_evidence" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evidence </span><input type="checkbox" name="Email_evidence" <?php if(isset($e['Emailupload']['evidence']) && $e['Emailupload']['evidence']==1){?>checked="checked"<?php }?>  /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['templates']=='0' ){?><input type="hidden" name="Email_templates" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Templates </span><input type="checkbox" name="Email_templates" <?php if(isset($e['Emailupload']['template']) && $e['Emailupload']['template']==1){?>checked="checked"<?php }?> /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['report']=='0' ){?><input type="hidden" name="Email_client_memo" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report </span><input type="checkbox" name="Email_client_memo" <?php if(isset($e['Emailupload']['report']) && $e['Emailupload']['report']==1){?>checked="checked"<?php }?> /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['site_orders']=='0' ){?><input type="hidden" name="Email_siteOrder" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Site Orders </span><input type="checkbox" name="Email_siteOrder" <?php if(isset($e['Emailupload']['siteOrder']) && $e['Emailupload']['siteOrder']==1){?>checked="checked"<?php }?> /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['training']=='0' ){?><input type="hidden" name="Email_training" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training </span><input type="checkbox" name="Email_training" <?php if(isset($e['Emailupload']['training']) && $e['Emailupload']['training']==1){?>checked="checked"<?php }?> /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['employee']=='0' ){?><input type="hidden" name="Email_employee" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee </span><input type="checkbox" name="Email_employee" <?php if(isset($e['Emailupload']['employee']) && $e['Emailupload']['employee']==1){?>checked="checked"<?php }?> /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['kpiaudits']=='0' ){?><input type="hidden" name="Email_KPIAudits" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPI Audits </span><input type="checkbox" name="Email_KPIAudits" <?php if(isset($e['Emailupload']['KPIAudits']) && $e['Emailupload']['KPIAudits']==1){?>checked="checked"<?php }?> /><?php }?>
        
        <!--<?php if($admin_doc['AdminDoc']['personal_inspection']=='0' ){?><input type="hidden" name="Email_KPIAudits" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Personal Inspection </span><input type="checkbox" name="Email_personal_inspection" <?php if(isset($e['Emailupload']['personal_inspection']) && $e['Emailupload']['personal_inspection']==1){?>checked="checked"<?php }?> /><?php }?>-->

        <!--
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span><input type="checkbox" name="Email_contracts" <?php if(isset($e['Emailupload']['contract']) && $e['Emailupload']['contract']==1){?>checked="checked"<?php }?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evidence </span><input type="checkbox" name="Email_evidence" <?php if(isset($e['Emailupload']['evidence']) && $e['Emailupload']['evidence']==1){?>checked="checked"<?php }?>  />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Templates </span><input type="checkbox" name="Email_templates" <?php if(isset($e['Emailupload']['template']) && $e['Emailupload']['template']==1){?>checked="checked"<?php }?> />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report </span><input type="checkbox" name="Email_client_memo" <?php if(isset($e['Emailupload']['report']) && $e['Emailupload']['report']==1){?>checked="checked"<?php }?> />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Site Orders </span><input type="checkbox" name="Email_siteOrder" <?php if(isset($e['Emailupload']['siteOrder']) && $e['Emailupload']['siteOrder']==1){?>checked="checked"<?php }?> />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training </span><input type="checkbox" name="Email_training" <?php if(isset($e['Emailupload']['training']) && $e['Emailupload']['training']==1){?>checked="checked"<?php }?> />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee </span><input type="checkbox" name="Email_employee" <?php if(isset($e['Emailupload']['employee']) && $e['Emailupload']['employee']==1){?>checked="checked"<?php }?> />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPI Audits </span><input type="checkbox" name="Email_KPIAudits" <?php if(isset($e['Emailupload']['KPIAudits']) && $e['Emailupload']['KPIAudits']==1){?>checked="checked"<?php }?> />
        -->
        <!--<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Feedback </span><input type="checkbox" name="Email_client_memo1" <?php if(isset($e['Emailupload']['client_memo']) && $e['Emailupload']['client_memo']==1){?>checked="checked"<?php }?> />-->
        </td>
        
        <?php }?>
<?php }?>
        <?php
        if($this->Session->read('admin'))
        {
            ?>
        </tr>
        <tr><td><strong>Show Documents:</strong></td>
        <td> <span>Contracts </span><input type="checkbox" name="show[contracts]" value="1"  <?php if(isset($admin_doc['AdminDoc']['contracts']) && $admin_doc['AdminDoc']['contracts']=='1' ) echo "checked='checked'";?>  />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evidence </span><input type="checkbox" name="show[evidence]" value="1" <?php if(isset($admin_doc['AdminDoc']['evidence']) && $admin_doc['AdminDoc']['evidence']=='1' ) echo "checked='checked'";?>   />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Templates </span><input type="checkbox" name="show[templates]" value="1" <?php if(isset($admin_doc['AdminDoc']['templates']) && $admin_doc['AdminDoc']['templates']=='1' ) echo "checked='checked'";?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report </span><input type="checkbox" name="show[report]" value="1" <?php if(isset($admin_doc['AdminDoc']['report']) && $admin_doc['AdminDoc']['report']=='1' ) echo "checked='checked'";?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Site Orders </span><input type="checkbox" name="show[site_orders]" value="1" <?php if(isset($admin_doc['AdminDoc']['site_orders']) && $admin_doc['AdminDoc']['site_orders']=='1' ) echo "checked='checked'";?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training </span><input type="checkbox" name="show[training]" value="1" <?php if(isset($admin_doc['AdminDoc']['training']) && $admin_doc['AdminDoc']['training']=='1' ) echo "checked='checked'";?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee </span><input type="checkbox" name="show[employee]" value="1" <?php if(isset($admin_doc['AdminDoc']['employee']) && $admin_doc['AdminDoc']['employee']=='1' ) echo "checked='checked'";?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPI Audits </span><input type="checkbox" name="show[kpiaudits]" value="1" <?php if(isset($admin_doc['AdminDoc']['kpiaudits']) && $admin_doc['AdminDoc']['kpiaudits']=='1' ) echo "checked='checked'";?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Personal Inspection </span><input type="checkbox" name="show[personal_inspection]" value="1" <?php if(isset($admin_doc['AdminDoc']['personal_inspection']) && $admin_doc['AdminDoc']['personal_inspection']=='1' ) echo "checked='checked'";?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile Inspection </span><input type="checkbox" name="show[mobile_inspection]" value="1" <?php if(isset($admin_doc['AdminDoc']['mobile_inspection']) && $admin_doc['AdminDoc']['mobile_inspection']=='1' ) echo "checked='checked'";?>/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile Log </span><input type="checkbox" name="show[mobile_log]" value="1" <?php if(isset($admin_doc['AdminDoc']['mobile_log']) && $admin_doc['AdminDoc']['mobile_log']=='1' ) echo "checked='checked'";?>/>
</td></tr>
        <tr>
        <?php
        $logo = $l->find('first');
        ?>
            <td><strong>Powered By:</strong></td><td><input type="radio" name="logo" value="afimac" style="margin: 0;" <?php if($logo['Logo']['afimac']==1){?>checked="checked"<?php }?> /> <img src="<?php echo $base_url?>img/afimaclogo.png"  /> &nbsp; &nbsp; <input type="radio" name="logo" value="asap" style="margin: 0;" <?php if($logo['Logo']['asap']==1){?>checked="checked"<?php }?>  /> <img src="<?php echo $base_url?>img/asap.gif"  /></td>
        </tr>

            <?php
        } 
        ?>
        <tr><td><strong>Country</strong></td>
            <td><input type="radio" name="country" value="canada" style="margin: 0;" <?php if($user['User']['country']=='canada'){?>checked="checked"<?php }?> /> Canada &nbsp; &nbsp; <input type="radio" name="country" value="us" style="margin: 0;" <?php if($user['User']['country']=='us'){?>checked="checked"<?php }?>  /> US </td></tr>
        <tr><td><input style="margin:8px;" type="submit" name="submit" value="Save Changes" class="btn btn-primary" onclick="if($('#old_password').val() != '' && $('#passw').val() == ''){$('#passw').addClass('error');return false;}else return true;" /></td></tr>
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