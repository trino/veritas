<?php include_once('inc.php');?>
<style>input[type="checkbox"]{margin-top:0;}</style>
<h3 class="page-title">
	Add User
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members"><?php echo $this->requestAction('dashboard/translate/User Manager');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members/add"><?php echo $this->requestAction('dashboard/translate/Add User');?></a> <!--span class="icon-angle-right"></span-->
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
 function loadmore(type, qq)
{
    
    if(qq.prop('checked'))
    {
        $('.morez').load('<?php echo $this->webroot;?>members/loadextra/'+type,function(){
             $('.loadmorez').append($('.morez').html());
            $('.morez').html("");
        });
       
        
    }
    else
    {
        $('.'+type+'_more').remove();
        
    }
}
function loadupload(type, qq)
{
    
    if(qq.prop('checked'))
    {
        
        $('.morez1').load('<?php echo $this->webroot;?>members/loadupload/'+type,function(){
            $('.loadmorez1').append($('.morez1').html());
            $('.morez1').html("");
        });
        
        
    }
    else
    {
        $('.'+type+'_more1').remove();
        
    }
}
</script>
<div id="table">
<form id="my_form"  autocomplete="off"  action="" method="post" enctype="multipart/form-data" onsubmit="return valid();">
<table>
<tr><td style="width:140px;"><b><?php echo $this->requestAction('dashboard/translate/First Name');?></b></td><td><input type="text" name="fname" id="fname" value="" class="required" /></td></tr>
<tr><td style="width:140px;"><b><?php echo $this->requestAction('dashboard/translate/Last Name');?></b></td><td><input type="text" name="lname" id="lname" value="" class="required" /></td></tr>
<tr><td style="width:140px;"><b><?php echo $this->requestAction('dashboard/translate/Username');?></b></td><td><input type="text" id="full_name" class="required" name="full_name" onchange="check_name()" /><span id="response1"></span></td></tr>
<!--<tr><td><b>Avatar</b></td><td><input type="text" name="avatar" value="" class="required" /></td></tr>-->
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Title');?></b></td><td><input type="text" class="" name="title" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Address');?></b></td><td><input type="text" class="" name="address" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Email');?></b></td><td><input type="text" id="emails" class="email required" name="email" onchange="check_email()" /><span id="response"></span></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Image');?></b></td><td><img src="<?php echo $base_url;?>img/uploads/male.png" style="width: 60px; height:60px;" /> <input type="radio" name="img_gender" value="male.png" /> &nbsp; &nbsp;<img src="<?php echo $base_url;?>img/uploads/female.png" style="width: 60px; height:60px;" /> <input type="radio" name="img_gender" value="female.png" /> &nbsp; &nbsp;<input type="file" class="" name="image" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Phone');?></b></td><td><input type="text" name="phone" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Password');?></b></td><td><input type="password" class="required" name="password" id="password" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Repeat Password');?></b></td><td><input type="password" class="required" name="c_password" /></td></tr>
<?php
$q = $job->find('all',array('conditions'=>array('is_special'=>0),'order'=>'title')); 
//$q2 = $job->find('first',array('conditions'=>array('is_special'=>1),'order'=>'title'));
$q2 = null; 
if($q || $q2){
?>
<tr>
    <td colspan="2" style="padding: 0;">
        <table class="jobb">
            <tr><td><strong><?php echo $this->requestAction('dashboard/translate/Assign Job to user');?></strong></td></tr>
            
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
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Can View Files');?></b></td><td><input type="checkbox" name="canView" id="canView"  /></td></tr>
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
<td colspan="2" class="" style="padding:0;background: #e5e5e5;">
<table width="50%">
<tr>
<td>
<?php if($admin_doc['AdminDoc']['contracts']=='0'){?><input type="hidden" name="canView_contracts" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Contracts');?> </span><input type="checkbox" name="canView_contracts" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['evidence']=='0'){?><input type="hidden" name="canView_evidence" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Evidence');?> </span><input type="checkbox" onclick="loadmore('evidence',$(this));" name="canView_evidence" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['templates']=='0'){?><input type="hidden" name="canView_templates" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Templates');?> </span><input type="checkbox" name="canView_templates" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['report']=='0'){?><input type="hidden" name="canView_client_memo" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Report');?> </span><input type="checkbox" onclick="loadmore('report',$(this));" name="canView_client_memo" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['site_orders']=='0'){?><input type="hidden" name="canView_siteOrder" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Site Orders');?> </span><input type="checkbox" onclick="loadmore('siteorder',$(this));" name="canView_siteOrder" class="vie" /><?php }?>

<?php if($admin_doc['AdminDoc']['training']=='0'){?><input type="hidden" name="canView_training" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Training');?> </span><input type="checkbox" name="canView_training" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['employee']=='0'){?><input type="hidden" name="canView_employee" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Employee');?> </span><input type="checkbox" onclick="loadmore('employee',$(this));" name="canView_employee" class="vie"  /><?php }?>

<?php if($admin_doc['AdminDoc']['kpiaudits']=='0'){?><input type="hidden" name="canView_KPIAudits" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/KPI Audits');?> </span><input type="checkbox" name="canView_KPIAudits" class="vie" /><?php }?>
<!--
<?php if($admin_doc['AdminDoc']['personal_inspection']=='0' ){?><input type="hidden" name="canView_personal_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Personal Inspection');?> </span><input type="checkbox" name="canView_personal_inspection" <?php if(isset($v['Canview']['personal_inspection']) && $v['Canview']['personal_inspection']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['mobile_inspection']=='0' ){?><input type="hidden" name="canView_mobile_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?> </span><input type="checkbox" name="canView_mobile_inspection" <?php if(isset($v['Canview']['mobile_inspection']) && $v['Canview']['mobile_inspection']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['mobile_log']=='0' ){?><input type="hidden" name="canView_mobile_log" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Log');?> </span><input type="checkbox" name="canView_mobile_log" <?php if(isset($v['Canview']['mobile_log']) && $v['Canview']['mobile_log']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['inventory']=='0' ){?><input type="hidden" name="canView_inventory" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Truck Inventory');?> </span><input type="checkbox" name="canView_inventory" <?php if(isset($u['Canupload']['inventory']) && $u['Canupload']['inventory']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['vehicle_inspection']=='0' ){?><input type="hidden" name="canView_vehicle_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?> </span><input type="checkbox" name="canView_vehicle_inspection" <?php if(isset($u['Canupload']['vehicle_inspection']) && $u['Canupload']['vehicle_inspection']==1){?>checked="checked"<?php }?> /><?php }?>
-->
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Deployment');?> </span><input type="checkbox" name="canView_deployment_rate" <?php if(isset($v['Canview']['deployment_rate']) && $v['Canview']['deployment_rate']==1){?>checked="checked"<?php }?> />
</td>
</tr>
</table>
<div class="morez"></div>
<table class="loadmorez" width="50%"></table>
</td>
</tr>

<tr><td><b><?php echo $this->requestAction('dashboard/translate/Can Upload Files');?></b></td><td><input type="checkbox" name="canUpdate" id="canUpdate"  /></td></tr>
<tr class="canuploadfiles yesspecial2" style="display: none;">
<td colspan="2" class="" style="padding: 0;">
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
<td colspan="2" style="padding: 0;background:#e5e5e5;">
<table width="50%">
<tr>
<td>
<?php if($admin_doc['AdminDoc']['contracts']=='0'){?><input type="hidden" name="canUpload_contracts" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Contracts');?> </span><input type="checkbox" name="canUpload_contracts" class="upl"/><?php } ?>

<?php if($admin_doc['AdminDoc']['evidence']=='0'){?><input type="hidden" name="canUpload_evidence" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Evidence');?> </span><input type="checkbox" onclick="loadupload('evidence',$(this));" name="canUpload_evidence" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['templates']=='0'){?><input type="hidden" name="canUpload_templates" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Templates');?> </span><input type="checkbox" name="canUpload_templates" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['report']=='0'){?><input type="hidden" name="canUpload_client_memo" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Report');?> </span><input type="checkbox" onclick="loadupload('report',$(this));" name="canUpload_client_memo" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['site_orders']=='0'){?><input type="hidden" name="canUpload_siteOrder" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Site Orders');?> </span><input type="checkbox" onclick="loadupload('siteorder',$(this));" name="canUpload_siteOrder" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['training']=='0'){?><input type="hidden" name="canUpload_training" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Training');?> </span><input type="checkbox" name="canUpload_training" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['employee']=='0'){?><input type="hidden" name="canUpload_employee" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Employee');?> </span><input type="checkbox" onclick="loadupload('employee',$(this));" name="canUpload_employee" class="upl"  /><?php } ?>

<?php if($admin_doc['AdminDoc']['kpiaudits']=='0'){?><input type="hidden" name="canUpload_KPIAudits" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/KPI Audits');?> </span><input type="checkbox" name="canUpload_KPIAudits" class="upl" /><?php } ?>

<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Client Feedback');?> </span><input type="checkbox" name="canUpload_client_memo1" class="upl"  />
<!--
<?php if($admin_doc['AdminDoc']['personal_inspection']=='0' ){?><input type="hidden" name="canUpload_personal_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Personal Inspection');?> </span><input type="checkbox" name="canUpload_personal_inspection" <?php if(isset($u['Canupload']['personal_inspection']) && $u['Canupload']['personal_inspection']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['mobile_inspection']=='0' ){?><input type="hidden" name="canUpload_mobile_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?> </span><input type="checkbox" name="canUpload_mobile_inspection" <?php if(isset($u['Canupload']['mobile_inspection']) && $u['Canupload']['mobile_inspection']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['mobile_log']=='0' ){?><input type="hidden" name="canUpload_mobile_log" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Log');?> </span><input type="checkbox" name="canUpload_mobile_log" <?php if(isset($u['Canupload']['mobile_log']) && $u['Canupload']['mobile_log']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['inventory']=='0' ){?><input type="hidden" name="canUpload_inventory" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?> </span><input type="checkbox" name="canUpload_inventory" <?php if(isset($u['Canupload']['inventory']) && $u['Canupload']['inventory']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['vehicle_inspection']=='0' ){?><input type="hidden" name="canUpload_vehicle_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?> </span><input type="checkbox" name="canUpload_vehicle_inspection" <?php if(isset($u['Canupload']['canUpload_vehicle_inspection']) && $u['Canupload']['canUpload_vehicle_inspection']==1){?>checked="checked"<?php }?> /><?php }?>
-->
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Deployment');?> </span><input type="checkbox" name="canUpload_deployment_rate" <?php if(isset($u['Canupload']['deployment_rate']) && $u['Canupload']['deployment_rate']==1){?>checked="checked"<?php }?> />
</td>
</tr>
</table>
<div class="morez1"></div>
<table class="loadmorez1" width="50%"></table>
</td>
</tr>
<!--<tr><td><b>Can View Files</b></td><td><input type="checkbox" name="canView" /></td></tr>
<tr><td><b>Can Upload Files</b></td><td><input type="checkbox" name="canUpdate" /></td></tr>-->
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Can Send Message');?></b></td><td><input type="checkbox" name="canEmail" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Can Edit Notification');?></b></td><td><input type="checkbox" name="canEdit" id="canEdit" /></td></tr>
<!--<tr class="canEdit" style="display: block;">
<td colspan="2">
<table width="100%">-->
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Receive email when someone sends me message');?></b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input class="receive" type="checkbox" name="receive1" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Receive email when document is uploaded');?></b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input class="receive" type="checkbox" name="receive2" id="receive2" /></td></tr>
<tr class="upload_more yesspecial3" style="display: none;">
<td colspan="2" class="" style="padding: 0;">
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
<td colspan="2" style="padding: 0;">
<table width="50%">
<tr>
<td>
<?php if($admin_doc['AdminDoc']['contracts']=='0'){?><input type="hidden" name="Email_contracts" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Contracts');?> </span><input type="checkbox" name="Email_contracts" class="rec_email"/><?php }?>

<?php if($admin_doc['AdminDoc']['evidence']=='0'){?><input type="hidden" name="Email_evidence" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Evidence');?> </span><input type="checkbox" name="Email_evidence"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['templates']=='0'){?><input type="hidden" name="Email_templates" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Templates');?> </span><input type="checkbox" name="Email_templates"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['report']=='0'){?><input type="hidden" name="Email_client_memo" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Report');?> </span><input type="checkbox" name="Email_client_memo"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['site_orders']=='0'){?><input type="hidden" name="Email_siteOrder" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Site Orders');?> </span><input type="checkbox" name="Email_siteOrder"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['training']=='0'){?><input type="hidden" name="Email_training" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Training');?> </span><input type="checkbox" name="Email_training"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['employee']=='0'){?><input type="hidden" name="Email_employee" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Employee');?> </span><input type="checkbox" name="Email_employee"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['kpiaudits']=='0'){?><input type="hidden" name="Email_KPIAudits" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/KPI Audits');?> </span><input type="checkbox" name="Email_KPIAudits"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['deployment_rate']=='0' ){?><input type="hidden" name="Email_deployment" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Deployment');?> </span><input type="checkbox" name="Email_deployment" class="rec_email" /><?php }?>

<!--
<?php if($admin_doc['AdminDoc']['personal_inspection']=='0'){?><input type="hidden" name="Email_personal_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Personal Inspection');?> </span><input type="checkbox" name="Email_personal_inspection"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['mobile_inspection']=='0'){?><input type="hidden" name="Email_mobile_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?> </span><input type="checkbox" name="Email_mobile_inspection"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['mobile_log']=='0'){?><input type="hidden" name="Email_mobile_log" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Log');?> </span><input type="checkbox" name="Email_mobile_log"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['inventory']=='0'){?><input type="hidden" name="Email_mobile_vehicle_trunk_inventory" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?>  </span><input type="checkbox" name="Email_mobile_vehicle_trunk_inventory"  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['vehicle_inspection']=='0'){?><input type="hidden" name="Email_vehicle_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?> </span><input type="checkbox" name="Email_vehicle_inspection"  class="rec_email" /><?php }?>
-->
<!--<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Feedback </span><input type="checkbox" name="Email_client_memo1"  />-->
</td>
</tr>
</table>
</td></tr>


<!--</table>
</td></tr>-->
<!-- <div class="checks"><div class="left">Is Supervisor</div><div class="right"><input type="checkbox" name="isSupervisor" /></div><div class="clear"></div></div>
<div class="checks"><div class="left">Is Employee</div><div class="right"><input type="checkbox" name="isEmployee" /></div><div class="clear"></div></div> -->
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="<?php echo $this->requestAction('dashboard/translate/Add User');?>" name="submit"/></div></td></tr>
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
            /*$('.nospecial2 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });*/
            }
            
            }
        else
        {
            $('.loadmorez1').html("");
            $('.canuploadfiles').hide();
            $('.canuploadfiles input:checkbox').each(function(){
                $(this).removeAttr('checked');
            });
        }
    
    }); 
           
    $('#canView').click(function(){
        if($('#canView').is(':checked')){
            $('.canviewfiles').show();
            /*$('.vie').each(function(){
               if(!($(this).is(':checked')))
               $(this).click() ;
            });*/
            if($('.special').is(':checked')){
            $('.yesspecial').show();
            $('.yesspecial input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });
            $('.nospecial').hide();
            /*$('.nospecial input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
                //alert('removed');
            });*/
            }
            else
            {
            $('.yesspecial').hide();
            $('.yesspecial input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
            $('.nospecial').show();
            /*$('.nospecial input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });*/
            }
            
            
            }
        else
        {
            $('.loadmorez').html("");
            $('.canviewfiles').hide();
            $('.canviewfiles input:checkbox').each(function(){
                $(this).removeAttr('checked');
            });
        }
            
    
    }); 
    
    $('#receive2').click(function(){
        if($('#receive2').is(':checked')){
            $('.upload_more').show();
            $('.rec_email').each(function(){
               if(!($(this).is(':checked')))
               $(this).click() ;
            });
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
                    /*$('.nospecial input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });*/
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
                    /*$('.nospecial input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });*/
                }
                
                
                
                if($('#canUpdate').is(':checked'))
                {
                    $('.yesspecial2').hide();
                    $('.yesspecial2 input[type="checkbox"]').each(function(){
                $(this).removeAttr('checked');
            });
                    $('.nospecial2').show();
                    /*$('.nospecial2 input[type="checkbox"]').each(function(){
                $(this).attr('checked','checked');
            });*/
                }
                
        }
        
    });   
  
        
        
    
});
</script>
