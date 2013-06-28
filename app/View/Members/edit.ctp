<?php include_once('inc.php');?>
<script>
$(function(){
   $('#add_form').validate(); 
   
});
 function check_name()
    {
        //alert('test');
        var full_name = $('#full_name').val();
        
        $.ajax(
        {
            url: '<?php echo $base_url;?>members/check_name2',
            type: 'post',
            data: 'full_name='+full_name+'&id=<?php echo $m['Member']['id'];?>',
            success:function(response)
            {
                if(response=="1")
                {
                    $('.response1').html('Someone with the same name as yours is already signed up.');
                }
                else
                {
                    $('.response1').html('');
                }
            }
        });
    }
 function valid()
    {
        //var val=$('#response').html();
        var val1=$('.response1').html();
        if( val1=='')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
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
<form action="<?php echo $base_url."members/edit/".$m['Member']['id'];?>" method="post" id="add_form" enctype="multipart/form-data" onsubmit="return valid();">
<table>
<tr><td style="width:140px;"><b>First Name</b></td><td><input type="text" name="fname" id="fname" value="<?php echo $m['Member']['fname'];?>" class="" /></td></tr>
<tr><td style="width:140px;"><b>Last Name</b></td><td><input type="text" name="lname" id="lname" value="<?php echo $m['Member']['lname'];?>" class="" /></td></tr>
<tr><td style="width:140px;"><b>Username</b></td><td><input type="text" name="full_name" id="full_name" value="<?php echo $m['Member']['full_name'];?>" class="required" onchange="check_name()" /><span class="response1"></span></td></tr>
<!--<tr><td><b>Avatar</b></td><td><input type="text" name="avatar" value="<?php echo $m['Member']['name_avatar'];?>" class="required" /></td></tr>-->
<tr><td><b>Title</b></td><td><input type="text" name="title" value="<?php echo $m['Member']['title'];?>" class="required" /></td></tr>
<tr><td><b>Address</b></td><td><input type="text" name="address" value="<?php echo $m['Member']['address'];?>" class="required" /></td></tr>
<tr><td><b>Email</b></td><td><input type="text" name="email" value="<?php echo $m['Member']['email'];?>" class="" /></td></tr>
<tr><td><b>Image:</b></td><td><img src="<?php echo $base_url;?>img/uploads/male.png" style="width: 60px; height:60px;" /> <input type="radio" name="img_gender" value="male.png" <?php if($m['Member']['image'] == 'male.png'){?>checked="checked"<?php }?> /> &nbsp; &nbsp;<img src="<?php echo $base_url;?>img/uploads/female.png" style="width: 60px; height:60px;" /> <input type="radio" <?php if($m['Member']['image'] == 'female.png'){?>checked="checked"<?php }?> name="img_gender" value="female.png" /> &nbsp; &nbsp;<input type="file" class="" name="image" /> <?php if($m['Member']['image'] == 'male.png' || $m['Member']['image'] == 'female.png'){}else{?><img src="<?php echo $base_url."img/uploads/".$m['Member']['image'];?>" /><?php }?></td></tr>
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
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Report </span><input type="checkbox" name="canView_client_memo" <?php if(isset($v['Canview']['report']) && $v['Canview']['report']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Site Orders </span><input type="checkbox" name="canView_siteOrder" <?php if(isset($v['Canview']['siteOrder']) && $v['Canview']['siteOrder']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training </span><input type="checkbox" name="canView_training" <?php if(isset($v['Canview']['training']) && $v['Canview']['training']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee </span><input type="checkbox" name="canView_employee" <?php if(isset($v['Canview']['employee']) && $v['Canview']['employee']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPI Audits </span><input type="checkbox" name="canView_KPIAudits" <?php if(isset($v['Canview']['KPIAudits']) && $v['Canview']['KPIAudits']==1){?>checked="checked"<?php }?> />
</td>
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
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Site Orders </span><input type="checkbox" name="canUpload_siteOrder" <?php if(isset($u['Canupload']['siteOrder']) && $u['Canupload']['siteOrder']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training </span><input type="checkbox" name="canUpload_training" <?php if(isset($u['Canupload']['training']) && $u['Canupload']['training']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee </span><input type="checkbox" name="canUpload_employee" <?php if(isset($u['Canupload']['employee']) && $u['Canupload']['employee']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPI Audits </span><input type="checkbox" name="canUpload_KPIAudits" <?php if(isset($u['Canupload']['KPIAudits']) && $u['Canupload']['KPIAudits']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Client Feedback </span><input type="checkbox" name="canUpload_client_memo1" <?php if(isset($u['Canupload']['client_feedback']) && $u['Canupload']['client_feedback']==1){?>checked="checked"<?php }?> />
</td>
</tr>
</table>
</td>
</tr>

<tr><td><b>Can Send Message</b></td><td><input type="checkbox" name="canEmail" <?php if($m['Member']['canEmail']==1){?>checked="checked"<?php }?> /></td></tr>
<tr><td><b>Can Edit Notification</b></td><td><input type="checkbox" name="canEdit" id="canEdit" <?php if($m['Member']['canEdit']==1){?>checked="checked"<?php }?> /></td></tr>
<!--<tr class="canEdit" style="display: block;">
<td colspan="2">
<table width="50%">-->
<tr><td><b>Receive email when someone sends me message</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input class="receive" type="checkbox" name="receive1" <?php if($m['Member']['receive1']==1){?>checked="checked"<?php }?> /></td></tr>
<tr><td><b>Receive email when document is uploaded</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input class="receive" type="checkbox" id="receive2" name="receive2" <?php if($m['Member']['receive2']==1){?>checked="checked"<?php }?> /></td></tr>
<tr class="upload_more" style="display: none;" >
<td colspan="2" >
<table width="50%">
<tr>
<td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span><input type="checkbox" name="Email_contracts" <?php if(isset($e['Emailupload']['contract']) && $e['Emailupload']['contract']==1){?>checked="checked"<?php }?>/>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evidence </span><input type="checkbox" name="Email_evidence" <?php if(isset($e['Emailupload']['evidence']) && $e['Emailupload']['evidence']==1){?>checked="checked"<?php }?>  />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Templates </span><input type="checkbox" name="Email_templates" <?php if(isset($e['Emailupload']['template']) && $e['Emailupload']['template']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report </span><input type="checkbox" name="Email_client_memo" <?php if(isset($e['Emailupload']['report']) && $e['Emailupload']['report']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Site Orders </span><input type="checkbox" name="Email_siteOrder" <?php if(isset($e['Emailupload']['siteOrder']) && $e['Emailupload']['siteOrder']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training </span><input type="checkbox" name="Email_training" <?php if(isset($e['Emailupload']['training']) && $e['Emailupload']['training']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee </span><input type="checkbox" name="Email_employee" <?php if(isset($e['Emailupload']['employee']) && $e['Emailupload']['employee']==1){?>checked="checked"<?php }?> />
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPI Audits </span><input type="checkbox" name="Email_KPIAudits" <?php if(isset($e['Emailupload']['KPIAudits']) && $e['Emailupload']['KPIAudits']==1){?>checked="checked"<?php }?> />

<!--<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Feedback </span><input type="checkbox" name="Email_clint_memo1" <?php if(isset($e['Emailupload']['client_feedback']) && $e['Emailupload']['client_feedback']==1){?>checked="checked"<?php }?> />-->
</td>
</tr>
</table>
</td></tr>
<?php
$q = $job->find('all',array('order'=>'title')); 
if($q){
?>
<tr>
    <td colspan="2">
        <table>
            <tr><td><strong>Assign Jobs to user</strong></td></tr>
            <?php
            $i=0; 
            foreach($q as $j){
                $i++;
                if($i%6==1)
                {
                    ?>
                    <tr>
                    <?php
                }
               ?>
               <td style="width: 15%;"><?php echo $j['Job']['title']?> <input name="job[]" style="margin: 0;" type="checkbox"  <?php if(in_array($j['Job']['id'],$jm)){?>checked="checked"<?php }?> value="<?php echo $j['Job']['id'];?>" /></td>
               <?php
               if($i%6==0)
               {
                ?>
                </tr>
                <?php
               } 
            }
            if($i%6!=0){
            $i=$i%6;
            for($j=$i;$j<6;$j++)
            {
                ?>
                <td style="width: 15%;">&nbsp; &nbsp;</td>
                <?php
            }
            ?>
            </tr>
            <?php
            }            
            ?>
        </table>
    </td>
</tr>
<?php    
}
?>
<!--
</table>
</td></tr>-->
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
    /*
    if($('#canEdit').is(':checked'))
        $('.canEdit').show();
    */
        
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
    /*
     $('#canEdit').click(function(){
        if($('#canEdit').is(':checked'))
            $('.canEdit').show();
        else
        {
            $('.canEdit').hide();
            $('.canEdit input:checkbox').each(function(){
                $(this).removeAttr('checked');
            });
        }
    
    });                
     */  
   //$('#canView').toggle(function(){$('.canviewfiles').toogle;});
   //$('#canUpdate').toggle(function(){$('.canuploadfiles').toogle;});
        
        
    
});
</script>