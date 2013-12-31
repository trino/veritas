<?php include_once('inc.php');?>

<h3 class="page-title">
	Add User
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members">User Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members/add">Add User</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<script>
 $(document).ready(function(){
     $('#my_form').validate({
    rules: {
            password: 'required',
            c_password: {
                  required: true,
                  equalTo: '#password'
            }
      }
      
 }); 
 $('#full_name').change(function(){
        if($(this).val()=='')
        {
            $('#emails').addClass('required');
        }
        else
        {
            $('#emails').removeClass('required');
        }
      });
      $('#emails').change(function(){
        if($(this).val()=='')
        {
            $('#full_name').addClass('required');
        }
        else
        {
            $('#full_name').removeClass('required');
        }
      }); 
     });
    function check_email()
    {
        //alert('test');
        var email = $('#emails').val();
        if(email != "")
        $.ajax(
        {
            url: 'check_email',
            type: 'post',
            data: 'email='+email,
            success:function(response)
            {
                if(response=="1")
                {
                    $('#response').html('Email already exits');
                }
                else
                {
                    $('#response').html('');
                }
            }
        });
    }
     function check_name()
    {
        //alert('test');
        var full_name = $('#full_name').val();
        if(full_name != "")
        $.ajax(
        {
            url: 'check_name',
            type: 'post',
            data: 'full_name='+full_name,
            success:function(response)
            {
                if(response=="1")
                {
                    $('#response1').html('Someone with the same name as yours is already signed up.');
                }
                else
                {
                    $('#response1').html('');
                }
            }
        });
    }
    function valid()
    {
        var val=$('#response').html();
        var val1=$('#response1').html();
        if(val=="" && val1=='')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
<div id="table">
<form id="my_form"  autocomplete="off"  action="" method="post" enctype="multipart/form-data" onsubmit="return valid();">
<table>
<tr><td style="width:140px;"><b>First Name</b></td><td><input type="text" name="fname" id="fname" value="" class="required" /></td></tr>
<tr><td style="width:140px;"><b>Last Name</b></td><td><input type="text" name="lname" id="lname" value="" class="required" /></td></tr>
<tr><td style="width:140px;"><b>Username</b></td><td><input type="text" id="full_name" class="required" name="full_name" onchange="check_name()" /><span id="response1"></span></td></tr>
<!--<tr><td><b>Avatar</b></td><td><input type="text" name="avatar" value="" class="required" /></td></tr>-->
<tr><td><b>Title</b></td><td><input type="text" class="" name="title" /></td></tr>
<tr><td><b>Address</b></td><td><input type="text" class="" name="address" /></td></tr>
<tr><td><b>Email</b></td><td><input type="text" id="emails" class="email required" name="email" onchange="check_email()" /><span id="response"></span></td></tr>
<tr><td><b>Image:</b></td><td><img src="<?php echo $base_url;?>img/uploads/male.png" style="width: 60px; height:60px;" /> <input type="radio" name="img_gender" value="male.png" /> &nbsp; &nbsp;<img src="<?php echo $base_url;?>img/uploads/female.png" style="width: 60px; height:60px;" /> <input type="radio" name="img_gender" value="female.png" /> &nbsp; &nbsp;<input type="file" class="" name="image" /></td></tr>
<tr><td><b>Phone</b></td><td><input type="text" name="phone" /></td></tr>
<tr><td><b>Password</b></td><td><input type="password" class="required" name="password" id="password" /></td></tr>
<tr><td><b>Repeat Password</b></td><td><input type="password" class="required" name="c_password" /></td></tr>
<?php
$q = $job->find('all',array('conditions'=>array('is_special'=>0),'order'=>'title')); 
$q2 = $job->find('first',array('conditions'=>array('is_special'=>1),'order'=>'title'));
if($q || $q2){
?>
<tr>
    <td colspan="2">
        <table class="jobb">
            <tr><td><strong>Assign Jobs to user</strong></td></tr>
            
            <?php
            if($q2)
            {
                ?>
                <tr><td><?php echo $q2['Job']['title']?> <input class="special" name="job[]" style="margin: 0;" type="checkbox" value="<?php echo $q2['Job']['id'];?>" </td></tr>
                <tr><td><strong>OR</strong></td></tr>
                <?php
            }
            $i=0; 
            if($q)
            foreach($q as $j){
                $i++;
                if($i%6==1)
                {
                    ?>
                    <tr>
                    <?php
                }
               ?>
               <td style="width: 15%;"><?php echo $j['Job']['title']?> <input name="job[]" style="margin: 0;" type="checkbox" value="<?php echo $j['Job']['id'];?>" /></td>
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
<tr><td><b>Can View Files</b></td><td><input type="checkbox" name="canView" id="canView"  /></td></tr>
<tr class="canviewfiles yesspecial" style="display: none;">
<td colspan="2" class="">
<table width="50%">
    <tr>
        <td>
        <?php if($admin_doc['AdminDoc']['afimac_intel']=='0'){?><input type="hidden" name="canView_afimac_intel" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AFIMAC Intel </span><input type="checkbox" name="canView_afimac_intel" class="vie"  /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['news_media']=='0'){?><input type="hidden" name="canView_news_media" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;News/Media </span><input type="checkbox" name="canView_news_media" class="vie"  /><?php }?>
        </td>
    </tr>
</table>
</td>
</tr>
<tr class="canviewfiles nospecial" style="display: none;">
<td colspan="2" class="">
<table width="50%">
<tr>
<td>
<?php if($admin_doc['AdminDoc']['afimac_intel']=='0'){?><input type="hidden" name="canView_contracts" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span><input type="checkbox" name="canView_contracts" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['evidence']=='0'){?><input type="hidden" name="canView_evidence" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Evidence </span><input type="checkbox" name="canView_evidence" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['templates']=='0'){?><input type="hidden" name="canView_templates" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Templates </span><input type="checkbox" name="canView_templates" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['report']=='0'){?><input type="hidden" name="canView_client_memo" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Report </span><input type="checkbox" name="canView_client_memo" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['site_orders']=='0'){?><input type="hidden" name="canView_siteOrder" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Site Orders </span><input type="checkbox" name="canView_siteOrder" class="vie" /><?php }?>

<?php if($admin_doc['AdminDoc']['training']=='0'){?><input type="hidden" name="canView_training" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training </span><input type="checkbox" name="canView_training" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['employee']=='0'){?><input type="hidden" name="canView_employee" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee </span><input type="checkbox" name="canView_employee" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['kpiaudits']=='0'){?><input type="hidden" name="canView_KPIAudits" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPI Audits </span><input type="checkbox" name="canView_KPIAudits" class="vie" /><?php }?>

</td>
</tr>
</table>
</td>
</tr>

<tr><td><b>Can Upload Files</b></td><td><input type="checkbox" name="canUpdate" id="canUpdate"  /></td></tr>
<tr class="canuploadfiles yesspecial2" style="display: none;">
<td colspan="2" class="">
<table width="50%">
    <tr>
        <td>
        <?php if($admin_doc['AdminDoc']['afimac_intel']=='0'){?><input type="hidden" name="canUpload_afimac_intel" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AFIMAC Intel </span><input type="checkbox" name="canUpload_afimac_intel" class="vie"  /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['news_media']=='0'){?><input type="hidden" name="canUpload_news_media" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;News/Media </span><input type="checkbox" name="canUpload_news_media" class="vie"  /><?php }?>
        </td>
    </tr>
</table>
</td>
</tr>
<tr class="canuploadfiles nospecial2" style="display:none;">
<td colspan="2">
<table width="50%">
<tr>
<td>
<?php if($admin_doc['AdminDoc']['contracts']=='0'){?><input type="hidden" name="canUpload_contracts" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span><input type="checkbox" name="canUpload_contracts" class="upl"/><?php } ?>

<?php if($admin_doc['AdminDoc']['evidence']=='0'){?><input type="hidden" name="canUpload_evidence" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evidence </span><input type="checkbox" name="canUpload_evidence" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['templates']=='0'){?><input type="hidden" name="canUpload_templates" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Templates </span><input type="checkbox" name="canUpload_templates" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['report']=='0'){?><input type="hidden" name="canUpload_client_memo" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report </span><input type="checkbox" name="canUpload_client_memo" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['site_orders']=='0'){?><input type="hidden" name="canUpload_siteOrder" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Site Orders </span><input type="checkbox" name="canUpload_siteOrder" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['training']=='0'){?><input type="hidden" name="canUpload_training" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training </span><input type="checkbox" name="canUpload_training" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['employee']=='0'){?><input type="hidden" name="canUpload_employee" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee </span><input type="checkbox" name="canUpload_employee" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['kpiaudits']=='0'){?><input type="hidden" name="canUpload_KPIAudits" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPI Audits </span><input type="checkbox" name="canUpload_KPIAudits" class="upl" /><?php } ?>

<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Feedback </span><input type="checkbox" name="canUpload_client_memo1" class="upl"  />
</td>
</tr>
</table>
</td>
</tr>
<!--<tr><td><b>Can View Files</b></td><td><input type="checkbox" name="canView" /></td></tr>
<tr><td><b>Can Upload Files</b></td><td><input type="checkbox" name="canUpdate" /></td></tr>-->
<tr><td><b>Can Send Message</b></td><td><input type="checkbox" name="canEmail" /></td></tr>
<tr><td><b>Can Edit Notification</b></td><td><input type="checkbox" name="canEdit" id="canEdit" /></td></tr>
<!--<tr class="canEdit" style="display: block;">
<td colspan="2">
<table width="100%">-->
<tr><td><b>Receive email when someone sends me message</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input class="receive" type="checkbox" name="receive1" /></td></tr>
<tr><td><b>Receive email when document is uploaded</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input class="receive" type="checkbox" name="receive2" id="receive2" /></td></tr>
<tr class="upload_more yesspecial3" style="display: none;">
<td colspan="2" class="">
<table width="50%">
    <tr>
        <td>
        <?php if($admin_doc['AdminDoc']['afimac_intel']=='0'){?><input type="hidden" name="Email_afimac_intel" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AFIMAC Intel </span><input type="checkbox" name="Email_afimac_intel" class="rec_email"  /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['news_media']=='0'){?><input type="hidden" name="Email_news_media" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;News/Media </span><input type="checkbox" name="Email_news_media" class="rec_email"  /><?php }?>
        </td>
    </tr>
</table>
</td>
</tr>
<tr class="upload_more nospecial3" style="display: none;" >
<td colspan="2" >
<table width="50%">
<tr>
<td>
<?php if($admin_doc['AdminDoc']['contracts']=='0'){?><input type="hidden" name="Email_contracts" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts </span><input type="checkbox" name="Email_contracts" class="rec_email"/><?php }?>

<?php if($admin_doc['AdminDoc']['evidence']=='0'){?><input type="hidden" name="Email_evidence" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evidence </span><input type="checkbox" name="Email_evidence"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['templates']=='0'){?><input type="hidden" name="Email_templates" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Templates </span><input type="checkbox" name="Email_templates"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['report']=='0'){?><input type="hidden" name="Email_client_memo" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Report </span><input type="checkbox" name="Email_client_memo"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['site_orders']=='0'){?><input type="hidden" name="Email_siteOrder" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Site Orders </span><input type="checkbox" name="Email_siteOrder"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['training']=='0'){?><input type="hidden" name="Email_training" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training </span><input type="checkbox" name="Email_training"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['employee']=='0'){?><input type="hidden" name="Email_employee" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Employee </span><input type="checkbox" name="Email_employee"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['kpiaudits']=='0'){?><input type="hidden" name="Email_KPIAudits" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KPI Audits </span><input type="checkbox" name="Email_KPIAudits"  class="rec_email" /><?php }?>

<!--<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Feedback </span><input type="checkbox" name="Email_client_memo1"  />-->
</td>
</tr>
</table>
</td></tr>


<!--</table>
</td></tr>-->
<!-- <div class="checks"><div class="left">Is Supervisor</div><div class="right"><input type="checkbox" name="isSupervisor" /></div><div class="clear"></div></div>
<div class="checks"><div class="left">Is Employee</div><div class="right"><input type="checkbox" name="isEmployee" /></div><div class="clear"></div></div> -->
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Add User" name="submit"/></div></td></tr>
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
        
    $('#canUpdate').click(function(){
        if($('#canUpdate').is(':checked')){
            $('.canuploadfiles').show();
            if($('.special').is(':checked')){
            $('.yesspecial2').show();
            $('.yesspecial2 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
            $('.nospecial2').hide();
            $('.nospecial2 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
            }
            else
            {
            $('.yesspecial2').hide();
            $('.yesspecial2 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
            $('.nospecial2').show();
            $('.nospecial2 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
            }
            
            }
        else
        {
            $('.canuploadfiles').hide();
            $('.canuploadfiles input:checkbox').each(function(){
                $(this).removeAttr('checked');
            });
        }
    
    }); 
           
    $('#canView').click(function(){
        if($('#canView').is(':checked')){
            $('.canviewfiles').show();
            if($('.special').is(':checked')){
            $('.yesspecial').show();
            $('.yesspecial input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
            $('.nospecial').hide();
            $('.nospecial input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
            }
            else
            {
            $('.yesspecial').hide();
            $('.yesspecial input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
            $('.nospecial').show();
            $('.nospecial input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
            }
            
            $('.vie').each(function(){
               if(!($(this).is(':checked')))
               $(this).click() ;
            });
            }
        else
        {
            $('.canviewfiles').hide();
            $('.canviewfiles input:checkbox').each(function(){
                $(this).removeAttr('checked');
            });
        }
            
    
    }); 
    
    $('#receive2').click(function(){
        if($('#receive2').is(':checked')){
            $('.upload_more').show();
            if($('.special').is(':checked')){
            $('.yesspecial3').show();
            $('.yesspecial3 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
            $('.nospecial3').hide();
            $('.nospecial3 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
            }
            else
            {
            $('.yesspecial3').hide();
            $('.yesspecial3 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
            $('.nospecial3').show();
            $('.nospecial3 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
            }
			   $('.rec_email').each(function(){
               if(!($(this).is(':checked')))
               $(this).click() ;
            });
			}
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
    $('.jobb input[type="checkbox"]').click(function(){
                
       if($(this).attr('class') == 'special' && $(this).is(':checked'))
       {
        $('.jobb input[type="checkbox"]').each(function(){
            if($(this).attr('class') != 'special')
            {
                $(this).removeAttr('checked');
            }
        }); 
           
       }
       else
       if($(this).attr('class')!='special' && $('.special').is(':checked'))
       {
         $('.special').removeAttr('checked');
         
       }
       if($(this).attr('class') == 'special')
        {
            if($(this).is(':checked'))
            {
                if($('#receive2').is(':checked'))
                {
                    $('.yesspecial3').show();
                    $('.yesspecial3 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
                    $('.nospecial3').hide();
                    $('.nospecial3 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                }
                
                if($('#canView').is(':checked'))
                {
                    $('.yesspecial').show();
                    $('.yesspecial input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
                    $('.nospecial').hide();
                    $('.nospecial input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                }
                
                
                
                
                if($('#canUpdate').is(':checked'))
                {
                    $('.yesspecial2').show();
                    $('.yesspecial2 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
                    $('.nospecial2').hide();
                    $('.nospecial2 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                }
                
            }
            else
            {
                if($('#receive2').is(':checked'))
                {
                    $('.yesspecial3').hide();
                    $('.yesspecial3 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                    $('.nospecial3').show();
                    $('.nospecial3 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
                }
                
                
                if($('#canView').is(':checked'))
                {
                    $('.yesspecial').hide();
                    $('.yesspecial input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                    $('.nospecial').show();
                    $('.nospecial input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
                }
                
                
                
                if($('#canUpdate').is(':checked'))
                {
                    $('.yesspecial2').hide();
                    $('.yesspecial2 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                    $('.nospecial2').show();
                    $('.nospecial2 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
                }
            }
            
        }
        else
        {
           if($('#receive2').is(':checked'))
                {
                    $('.yesspecial3').hide();
                    $('.yesspecial3 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                    $('.nospecial3').show();
                    $('.nospecial3 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
                }
                
                
                if($('#canView').is(':checked'))
                {
                    $('.yesspecial').hide();
                    $('.yesspecial input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                    $('.nospecial').show();
                    $('.nospecial input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
                }
                
                
                
                if($('#canUpdate').is(':checked'))
                {
                    $('.yesspecial2').hide();
                    $('.yesspecial2 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                    $('.nospecial2').show();
                    $('.nospecial2 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
                }
                
        }
        
    });   
  
        
        
    
});
</script>
