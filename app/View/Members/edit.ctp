<?php include_once('inc.php');?>
<script>
$(function(){
   $('#add_form').validate(); 
});
</script>
<h3 class="page-title">
	Edit <?php echo $m['Member']['full_name'];?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members">User Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members/edit/<?php echo $m['Member']['id'];?>">Edit <?php echo $m['Member']['full_name'];?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<div id="table">
<form action="" method="post" id="add_form" enctype="multipart/form-data">
<table>
<tr><td style="width:140px;"><b>Full Name</b></td><td><input type="text" name="full_name" id="full_name" value="<?php echo $m['Member']['full_name'];?>" class="required" /></td></tr>
<!--<tr><td><b>Avatar</b></td><td><input type="text" name="avatar" value="<?php echo $m['Member']['name_avatar'];?>" class="required" /></td></tr>-->
<tr><td><b>Title</b></td><td><input type="text" name="title" value="<?php echo $m['Member']['title'];?>" class="required" /></td></tr>
<tr><td><b>Address</b></td><td><input type="text" name="address" value="<?php echo $m['Member']['address'];?>" class="required" /></td></tr>
<tr><td><b>Email</b></td><td><input type="text" name="email" value="<?php echo $m['Member']['email'];?>" class="" /></td></tr>
<tr><td><b>Image</b></td><td><input type="file" class="" name="image" /> <img src="<?php echo $base_url."img/uploads/".$m['Member']['image'];?>" /></td></tr>
<tr><td><b>Phone</b></td><td><input type="text" name="phone" value="<?php echo $m['Member']['phone'];?>" /></td></tr>
<tr><td><b>Password</b></td><td><input type="password" name="password" value="<?php echo $m['Member']['password'];?>" class="required" /></td></tr>
<tr><td><b>Can View Files</b></td><td><input type="checkbox" name="canView" id="canView" <?php if($m['Member']['canView']==1){?>checked="checked"<?php }?> /></td></tr>
<tr class="canviewfiles" style="display: none;">
<td colspan="2">
<table width="50%">
<tr>
<td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span><input type="checkbox" name="canView_contracts" <?php if(isset($v['Canview']['contracts']) && $v['Canview']['contracts']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Evidence </span><input type="checkbox" name="canView_evidence" <?php if(isset($v['Canview']['evidence']) && $v['Canview']['evidence']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Templates </span><input type="checkbox" name="canView_templates" <?php if(isset($v['Canview']['templates']) && $v['Canview']['templates']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Report </span><input type="checkbox" name="canView_client_memo" <?php if(isset($v['Canview']['report']) && $v['Canview']['report']==1){?>checked="checked"<?php }?> /></td>
</tr>
</table>
</td>
</tr>

<tr><td><b>Can Upload Files</b></td><td><input type="checkbox" name="canUpdate" id="canUpdate" <?php if($m['Member']['canUpdate']==1){?>checked="checked"<?php }?> /></td></tr>
<tr class="canuploadfiles" style="display:none;">
<td colspan="2">
<table width="50%">
<tr>
<td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span>
<input type="checkbox" name="canUpload_contracts" <?php if(isset($u['Canupload']['contracts']) && $u['Canupload']['contracts']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Evidence </span><input type="checkbox" name="canUpload_evidence" <?php if(isset($u['Canupload']['evidence']) && $u['Canupload']['evidence']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Templates </span><input type="checkbox" name="canUpload_templates" <?php if(isset($u['Canupload']['templates']) && $u['Canupload']['templates']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Report </span><input type="checkbox" name="canUpload_client_memo" <?php if(isset($u['Canupload']['report']) && $u['Canupload']['report']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Client Feedback </span><input type="checkbox" name="canUpload_client_memo1" <?php if(isset($u['Canupload']['client_feedback']) && $u['Canupload']['client_feedback']==1){?>checked="checked"<?php }?> />
</td>
</tr>
</table>
</td>
</tr>

<tr><td><b>Can Send Email</b></td><td><input type="checkbox" name="canEmail" <?php if($m['Member']['canEmail']==1){?>checked="checked"<?php }?> /></td></tr>
<tr><td><b>Receive email when someone sends me message</b></td><td><input class="receive" type="checkbox" name="receive1" <?php if($m['Member']['receive1']==1){?>checked="checked"<?php }?> /></td></tr>
<tr><td><b>Receive email when document is uploaded</b></td><td><input class="receive" type="checkbox" id="receive2" name="receive2" <?php if($m['Member']['receive2']==1){?>checked="checked"<?php }?> /></td></tr>
<tr class="upload_more" style="display: none;" >
<td colspan="2" >
<table width="50%">
<tr>
<td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span><input type="checkbox" name="Email_contracts" <?php if(isset($e['Emailupload']['contract']) && $e['Emailupload']['contract']==1){?>checked="checked"<?php }?>/>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evidence </span><input type="checkbox" name="Email_evidence" <?php if(isset($e['Emailupload']['evidence']) && $e['Emailupload']['evidence']==1){?>checked="checked"<?php }?>  />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Templates </span><input type="checkbox" name="Email_templates" <?php if(isset($e['Emailupload']['template']) && $e['Emailupload']['template']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report </span><input type="checkbox" name="Email_client_memo" <?php if(isset($e['Emailupload']['report']) && $e['Emailupload']['report']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Feedback </span><input type="checkbox" name="Email_client_memo1" <?php if(isset($e['Emailupload']['client_feedback']) && $e['Emailupload']['client_feedback']==1){?>checked="checked"<?php }?> />
</td>
</tr>
</table>
</td></tr>
<!--<div class="checks"><div class="left">Is Supervisor</div><div class="right"><input type="checkbox" name="isSupervisor" <?php if($m['Member']['isSupervisor']==1){?>checked="checked"<?php }?> /></div><div class="clear"></div></div>
<div class="checks"><div class="left">Is Employee</div><div class="right"><input type="checkbox" name="isEmployee" <?php if($m['Member']['isEmployee']==1){?>checked="checked"<?php }?> /></div><div class="clear"></div></div> -->
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Save Changes" name="submit"/></div></td></tr>
</table>
</form>
</div>
<script>
$(function(){
   /*$('.receive').change(function(){
       var check = 0;
       $('.receive').each(function(){
        if($(this).is(':checked'))
        {
            check = 1;
        }
       }); 
       if(check == 1)
       {
        $('.email').addClass('required');
       }
       else
       $('.email').removeClass('required');
    });*/
   if($('#canUpdate').is(':checked'))
        $('.canuploadfiles').show();
   
   if($('#canView').is(':checked'))
        $('.canviewfiles').show();
    
    if($('#receive2').is(':checked'))
        $('.upload_more').show();
        
    $('#canUpdate').click(function(){
        if($('#canUpdate').is(':checked'))
            $('.canuploadfiles').show();
        else
        {
            $('.canuploadfiles').hide();
            $('.canuploadfiles input:checkbox').each(function(){
                $(this).removeAttr('checked');
            });
        }
    
    }); 
           
    $('#canView').click(function(){
        if($('#canView').is(':checked'))
            $('.canviewfiles').show();
        else
        {
            $('.canviewfiles').hide();
            $('.canviewfiles input:checkbox').each(function(){
                $(this).removeAttr('checked');
            });
        }
            
    
    });  
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
       
   //$('#canView').toggle(function(){$('.canviewfiles').toogle;});
   //$('#canUpdate').toggle(function(){$('.canuploadfiles').toogle;});
        
        
    
});
</script>