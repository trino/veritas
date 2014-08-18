<?php include_once('inc.php');?>
<script>
$(function(){
   $('#add_form').validate();
   <?php if(isset($v['Canview']['report']) && $v['Canview']['report']==1){?>

        $('.morez').load('<?php echo $this->webroot;?>members/loadextra/report/<?php echo $m['Member']['id'];?>',function(){
           $('.loadmorez').append($('.morez').html());
           $('.morez').html("");
        });
        
        
<?php }?>
<?php if(isset($v['Canview']['evidence']) && $v['Canview']['evidence']==1){?>

        $('.morez').load('<?php echo $this->webroot;?>members/loadextra/evidence/<?php echo $m['Member']['id'];?>',function(){
           $('.loadmorez').append($('.morez').html());
           $('.morez').html(""); 
            
        });
        
        
<?php }?>
<?php if(isset($v['Canview']['employee']) && $v['Canview']['employee']==1){?>

        $('.morez').load('<?php echo $this->webroot;?>members/loadextra/employee/<?php echo $m['Member']['id'];?>',function(){
           $('.loadmorez').append($('.morez').html());
           $('.morez').html(""); 
            
        });
        
        
<?php }?>
<?php if(isset($v['Canview']['siteOrder']) && $v['Canview']['siteOrder']==1){?>

        $('.morez').load('<?php echo $this->webroot;?>members/loadextra/siteorder/<?php echo $m['Member']['id'];?>',function(){
           $('.loadmorez').append($('.morez').html());
           $('.morez').html(""); 
            
        });
        
        
<?php }?>

<?php if(isset($u['Canupload']['report']) && $u['Canupload']['report']==1){?>
        $('.morez1').load('<?php echo $this->webroot;?>members/loadupload/report/<?php echo $m['Member']['id'];?>',function(){
            $('.loadmorez1').append($('.morez1').html());
        $('.morez1').html("");
        });
        
<?php }?>
<?php if(isset($u['Canupload']['evidence']) && $u['Canupload']['evidence']==1){?>
    $('.morez1').load('<?php echo $this->webroot;?>members/loadupload/evidence/<?php echo $m['Member']['id'];?>',function(){
            $('.loadmorez1').append($('.morez1').html());
        $('.morez1').html("");
        });
<?php }?>
<?php if(isset($u['Canupload']['employee']) && $u['Canupload']['employee']==1){?>
    $('.morez1').load('<?php echo $this->webroot;?>members/loadupload/employee/<?php echo $m['Member']['id'];?>',function(){
            $('.loadmorez1').append($('.morez1').html());
        $('.morez1').html("");
        });
<?php }?>
<?php if(isset($u['Canupload']['siteOrder']) && $u['Canupload']['siteOrder']==1){?>
    $('.morez1').load('<?php echo $this->webroot;?>members/loadupload/siteorder/<?php echo $m['Member']['id'];?>',function(){
            $('.loadmorez1').append($('.morez1').html());
        $('.morez1').html("");
        });
<?php }?>
   
});
 function check_name()
    {
        //alert('test');
        var full_name = $('#full_name').val();
        if(full_name != "")
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
//Load Extra Permissions

function loadmore(type, qq)
{
    
    if(qq.prop('checked'))
    {
        
        $('.morez').load('<?php echo $this->webroot;?>members/loadextra/'+type+'/<?php echo $m['Member']['id'];?>',function(){
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
        
        $('.morez1').load('<?php echo $this->webroot;?>members/loadupload/'+type+'/<?php echo $m['Member']['id'];?>',function(){
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
<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Edit');?> <?php echo $m['Member']['full_name'];?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members"><?php echo $this->requestAction('dashboard/translate/User Manager');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members/edit/<?php echo $m['Member']['id'];?>"><?php echo $this->requestAction('dashboard/translate/Edit');?> <?php echo $m['Member']['full_name'];?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<div id="table">
<form action="<?php echo $base_url."members/edit/".$m['Member']['id'];?>" method="post" id="add_form" enctype="multipart/form-data" onsubmit="return valid();">
<table>
<tr><td style="width:140px;"><b><?php echo $this->requestAction('dashboard/translate/First Name');?></b></td><td><input type="text" name="fname" id="fname" value="<?php echo $m['Member']['fname'];?>" class="" /></td></tr>
<tr><td style="width:140px;"><b><?php echo $this->requestAction('dashboard/translate/Last Name');?></b></td><td><input type="text" name="lname" id="lname" value="<?php echo $m['Member']['lname'];?>" class="" /></td></tr>
<tr><td style="width:140px;"><b><?php echo $this->requestAction('dashboard/translate/Username');?></b></td><td><input type="text" name="full_name" id="full_name" value="<?php echo $m['Member']['full_name'];?>" class="required" onchange="check_name()" /><span class="response1"></span></td></tr>
<!--<tr><td><b>Avatar</b></td><td><input type="text" name="avatar" value="<?php echo $m['Member']['name_avatar'];?>" class="required" /></td></tr>-->
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Title');?></b></td><td><input type="text" name="title" value="<?php echo $m['Member']['title'];?>" class="" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Address');?></b></td><td><input type="text" name="address" value="<?php echo $m['Member']['address'];?>" class="" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Email');?></b></td><td><input type="text" name="email" value="<?php echo $m['Member']['email'];?>" class="" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Image');?></b></td><td><img src="<?php echo $base_url;?>img/uploads/male.png" style="width: 60px; height:60px;" /> <input type="radio" name="img_gender" value="male.png" <?php if($m['Member']['image'] == 'male.png'){?>checked="checked"<?php }?> /> &nbsp; &nbsp;<img src="<?php echo $base_url;?>img/uploads/female.png" style="width: 60px; height:60px;" /> <input type="radio" <?php if($m['Member']['image'] == 'female.png'){?>checked="checked"<?php }?> name="img_gender" value="female.png" /> &nbsp; &nbsp;<input type="file" class="" name="image" /> <?php if($m['Member']['image'] == 'male.png' || $m['Member']['image'] == 'female.png'){}else{?><img src="<?php echo $base_url."img/uploads/".$m['Member']['image'];?>" /><?php }?></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Phone');?></b></td><td><input type="text" name="phone" value="<?php echo $m['Member']['phone'];?>" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Password');?></b></td><td><input type="password" name="password" value="<?php echo $m['Member']['password'];?>" class="required" /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Can View Files');?></b></td><td><input type="checkbox" name="canView" id="canView" <?php if($m['Member']['canView']==1){?>checked="checked"<?php }?> /></td></tr>
<tr class="canviewfiles" style="display: none;">
<?php
if(!isset($sid)){
?>
<td colspan="2" style="padding: 0;background:#e5e5e5;">
<table width="50%">

<td><?php if($admin_doc['AdminDoc']['contracts']=='0'){?><input type="hidden" name="canView_contracts" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Contracts');?> </span><input type="checkbox" name="canView_contracts" <?php if(isset($v['Canview']['contracts']) && $v['Canview']['contracts']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['evidence']=='0' ){?><input type="hidden" name="canView_evidence" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Evidence');?> </span><input type="checkbox" name="canView_evidence" onclick="loadmore('evidence',$(this));" <?php if(isset($v['Canview']['evidence']) && $v['Canview']['evidence']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['templates']=='0' ){?><input type="hidden" name="canView_templates" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Templates');?> </span><input type="checkbox" name="canView_templates"  <?php if(isset($v['Canview']['templates']) && $v['Canview']['templates']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['report']=='0' ){?><input type="hidden" name="canView_client_memo" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Report');?> </span><input type="checkbox" onclick="loadmore('report',$(this));" name="canView_client_memo"  <?php if(isset($v['Canview']['report']) && $v['Canview']['report']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['site_orders']=='0' ){?><input type="hidden" name="canView_siteOrder" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Site Orders');?> </span><input type="checkbox" onclick="loadmore('siteorder',$(this));" name="canView_siteOrder" <?php if(isset($v['Canview']['siteOrder']) && $v['Canview']['siteOrder']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['training']=='0' ){?><input type="hidden" name="canView_training" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Training');?> </span><input type="checkbox" name="canView_training" <?php if(isset($v['Canview']['training']) && $v['Canview']['training']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['employee']=='0' ){?><input type="hidden" name="canView_employee" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Employee');?> </span><input type="checkbox" onclick="loadmore('employee',$(this));" name="canView_employee" <?php if(isset($v['Canview']['employee']) && $v['Canview']['employee']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['kpiaudits']=='0' ){?><input type="hidden" name="canView_KPIAudits" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/KPI Audits');?> </span><input type="checkbox" name="canView_KPIAudits" <?php if(isset($v['Canview']['KPIAudits']) && $v['Canview']['KPIAudits']==1){?>checked="checked"<?php }?> /><?php }?>
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
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?> </span><input type="checkbox" name="canView_vehicle_inspection" <?php if(isset($u['Canupload']['vehicle_inspection']) && $u['Canupload']['vehicle_inspection']==1){?>checked="checked"<?php }?> /><?php }?>
-->
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Deployment');?> </span><input type="checkbox" name="canView_deployment_rate" <?php if(isset($v['Canview']['deployment_rate']) && $v['Canview']['deployment_rate']==1){?>checked="checked"<?php }?> />

</td>

</tr>
</table>
<div class="morez"></div>
<table class="loadmorez" width="50%"></table>
</td>
<?php }
else
{
    ?>
    <td colspan="2" class="" style="padding: 0;">
<table width="50%">
    <tr>
        <td>
        <?php if($admin_doc['AdminDoc']['afimac_intel']=='0'){?><input type="hidden" name="canView_afimac_intel" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AFIMAC Intel </span><input type="checkbox" name="canView_afimac_intel" <?php if(isset($v['Canview']['afimac_intel']) && $v['Canview']['afimac_intel']==1){?>checked="checked"<?php }?> /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['news_media']=='0'){?><input type="hidden" name="canView_news_media" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;News/Media </span><input type="checkbox" name="canView_news_media" <?php if(isset($v['Canview']['news_media']) && $v['Canview']['news_media']==1){?>checked="checked"<?php }?>  /><?php }?>
        </td>
    </tr>
</table>
</td>
    <?php
}
?>
</tr>

<tr><td><b><?php echo $this->requestAction('dashboard/translate/Can Upload Files');?></b></td><td><input type="checkbox" name="canUpdate" id="canUpdate" <?php if($m['Member']['canUpdate']==1){?>checked="checked"<?php }?> /></td></tr>
<tr class="canuploadfiles" style="display:none;background:#e5e5e5;">
<?php
if(!isset($sid))
{
    ?>
    
<td colspan="2" style="padding: 0;">
<table width="50%">
<tr>
<td>
<?php if($admin_doc['AdminDoc']['contracts']=='0'){?><input type="hidden" name="canUpload_contracts" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Contracts');?> </span><input type="checkbox" name="canUpload_contracts" <?php if(isset($u['Canupload']['contracts']) && $u['Canupload']['contracts']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['evidence']=='0' ){?><input type="hidden" name="canUpload_evidence" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Evidence');?> </span><input type="checkbox" onclick="loadupload('evidence',$(this));" name="canUpload_evidence" <?php if(isset($u['Canupload']['evidence']) && $u['Canupload']['evidence']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['templates']=='0' ){?><input type="hidden" name="canUpload_templates" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Templates');?> </span><input type="checkbox" name="canUpload_templates" <?php if(isset($u['Canupload']['templates']) && $u['Canupload']['templates']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['report']=='0' ){?><input type="hidden" name="canUpload_client_memo" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Report');?> </span><input type="checkbox" onclick="loadupload('report',$(this));" name="canUpload_client_memo" <?php if(isset($u['Canupload']['report']) && $u['Canupload']['report']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['site_orders']=='0' ){?><input type="hidden" name="canUpload_siteOrder" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Site Orders');?> </span><input type="checkbox" onclick="loadupload('siteorder',$(this));" name="canUpload_siteOrder" <?php if(isset($u['Canupload']['siteOrder']) && $u['Canupload']['siteOrder']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['training']=='0' ){?><input type="hidden" name="canUpload_training" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Training');?> </span><input type="checkbox" name="canUpload_training" <?php if(isset($u['Canupload']['training']) && $u['Canupload']['training']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['employee']=='0' ){?><input type="hidden" name="canUpload_employee" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Employee');?> </span><input type="checkbox" onclick="loadupload('employee',$(this));" name="canUpload_employee" <?php if(isset($u['Canupload']['employee']) && $u['Canupload']['employee']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['kpiaudits']=='0' ){?><input type="hidden" name="canUpload_KPIAudits" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/KPI Audits');?> </span><input type="checkbox" name="canUpload_KPIAudits" <?php if(isset($u['Canupload']['KPIAudits']) && $u['Canupload']['KPIAudits']==1){?>checked="checked"<?php }?> /><?php }?>


<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Client Feedback');?> </span><input type="checkbox" name="canUpload_client_memo1" <?php if(isset($u['Canupload']['client_feedback']) && $u['Canupload']['client_feedback']==1){?>checked="checked"<?php }?> />
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
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?> </span><input type="checkbox" name="canUpload_vehicle_inspection" <?php if(isset($u['Canupload']['vehicle_inspection']) && $u['Canupload']['vehicle_inspection']==1){?>checked="checked"<?php }?> /><?php }?>
-->
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Deployment');?> </span><input type="checkbox" name="canUpload_deployment_rate" <?php if(isset($u['Canupload']['deployment_rate']) && $u['Canupload']['deployment_rate']==1){?>checked="checked"<?php }?> />
</td>
</tr>
</table>
<div class="morez1"></div>
<table class="loadmorez1" width="50%"></table>
</td>
<?php
}
else
{
    ?>
    <td colspan="2" class="" style="padding: 0;">
<table width="50%">
    <tr>
        <td>
        <?php if($admin_doc['AdminDoc']['afimac_intel']=='0'){?><input type="hidden" name="canUpload_afimac_intel" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AFIMAC Intel </span><input type="checkbox" name="canUpload_afimac_intel" <?php if(isset($u['Canupload']['afimac_intel']) && $u['Canupload']['afimac_intel']==1){?>checked="checked"<?php }?>  /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['news_media']=='0'){?><input type="hidden" name="canUpload_news_media" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;News/Media </span><input type="checkbox" name="canUpload_news_media" <?php if(isset($u['Canupload']['news_media']) && $u['Canupload']['news_media']==1){?>checked="checked"<?php }?>  /><?php }?>
        </td>
    </tr>
</table>
</td>
    <?php
}
?>
</tr>

<tr><td><b><?php echo $this->requestAction('dashboard/translate/Can Send Message');?></b></td><td><input type="checkbox" name="canEmail" <?php if($m['Member']['canEmail']==1){?>checked="checked"<?php }?> /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Can Edit Notification');?></b></td><td><input type="checkbox" name="canEdit" id="canEdit" <?php if($m['Member']['canEdit']==1){?>checked="checked"<?php }?> /></td></tr>
<!--<tr class="canEdit" style="display: block;">
<td colspan="2">
<table width="50%">-->
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Receive email when someone sends me message');?></b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input class="receive" type="checkbox" name="receive1" <?php if($m['Member']['receive1']==1){?>checked="checked"<?php }?> /></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Receive email when document is uploaded');?></b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input class="receive" type="checkbox" id="receive2" name="receive2" <?php if($m['Member']['receive2']==1){?>checked="checked"<?php }?> /></td></tr>
<tr class="upload_more" style="display: none;" >
<?php
if(!isset($sid))
{
    ?>
<td colspan="2" style="padding: 0;">
<table width="50%">
<tr>
<td>
<?php if($admin_doc['AdminDoc']['contracts']=='0' ){?><input type="hidden" name="Email_contracts" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Contracts');?> </span><input type="checkbox" name="Email_contracts" <?php if(isset($e['Emailupload']['contract']) && $e['Emailupload']['contract']==1){?>checked="checked"<?php }?>/><?php }?>

<?php if($admin_doc['AdminDoc']['evidence']=='0' ){?><input type="hidden" name="Email_evidence" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Evidence');?> </span><input type="checkbox" name="Email_evidence" <?php if(isset($e['Emailupload']['evidence']) && $e['Emailupload']['evidence']==1){?>checked="checked"<?php }?>  /><?php }?>

<?php if($admin_doc['AdminDoc']['templates']=='0' ){?><input type="hidden" name="Email_templates" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Templates');?> </span><input type="checkbox" name="Email_templates" <?php if(isset($e['Emailupload']['template']) && $e['Emailupload']['template']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['report']=='0' ){?><input type="hidden" name="Email_client_memo" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Report');?> </span><input type="checkbox" name="Email_client_memo" <?php if(isset($e['Emailupload']['report']) && $e['Emailupload']['report']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['site_orders']=='0' ){?><input type="hidden" name="Email_siteOrder" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Site Orders');?> </span><input type="checkbox" name="Email_siteOrder" <?php if(isset($e['Emailupload']['siteOrder']) && $e['Emailupload']['siteOrder']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['training']=='0' ){?><input type="hidden" name="Email_training" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Training');?> </span><input type="checkbox" name="Email_training" <?php if(isset($e['Emailupload']['training']) && $e['Emailupload']['training']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['employee']=='0' ){?><input type="hidden" name="Email_employee" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Employee');?> </span><input type="checkbox" name="Email_employee" <?php if(isset($e['Emailupload']['employee']) && $e['Emailupload']['employee']==1){?>checked="checked"<?php }?> /><?php }?>

<?php if($admin_doc['AdminDoc']['kpiaudits']=='0' ){?><input type="hidden" name="Email_KPIAudits" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/KPI Audits');?> </span><input type="checkbox" name="Email_KPIAudits" <?php if(isset($e['Emailupload']['KPIAudits']) && $e['Emailupload']['KPIAudits']==1){?>checked="checked"<?php }?> /><?php }?>
<!--
<?php if($admin_doc['AdminDoc']['personal_inspection']=='0'){?><input type="hidden" name="Email_personal_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Personal Inspection');?> </span><input type="checkbox" name="Email_personal_inspection" <?php if(isset($e['Emailupload']['personal_inspection']) && $e['Emailupload']['personal_inspection']==1){?>checked="checked"<?php }?>  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['mobile_inspection']=='0'){?><input type="hidden" name="Email_mobile_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?> </span><input type="checkbox" name="Email_mobile_inspection" <?php if(isset($e['Emailupload']['mobile_inspection']) && $e['Emailupload']['mobile_inspection']==1){?>checked="checked"<?php }?> class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['mobile_log']=='0'){?><input type="hidden" name="Email_mobile_log" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Log');?></span><input type="checkbox" name="Email_mobile_log" <?php if(isset($e['Emailupload']['mobile_log']) && $e['Emailupload']['mobile_log']==1){?>checked="checked"<?php }?>  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['inventory']=='0'){?><input type="hidden" name="Email_mobile_vehicle_trunk_inventory" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?>  </span><input type="checkbox" name="Email_mobile_vehicle_trunk_inventory" <?php if(isset($e['Emailupload']['mobile_vehicle_trunk_inventory']) && $e['Emailupload']['mobile_vehicle_trunk_inventory']==1){?>checked="checked"<?php }?>  class="rec_email" /><?php }?>

<?php if($admin_doc['AdminDoc']['vehicle_inspection']=='0'){?><input type="hidden" name="Email_vehicle_inspection" value="0"/><?php }else{?>
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?> </span><input type="checkbox" name="Email_vehicle_inspection" <?php if(isset($e['Emailupload']['vehicle_inspection']) && $e['Emailupload']['vehicle_inspection']==1){?>checked="checked"<?php }?>  class="rec_email" /><?php }?>
-->
<!--<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Feedback </span><input type="checkbox" name="Email_clint_memo1" <?php if(isset($e['Emailupload']['client_feedback']) && $e['Emailupload']['client_feedback']==1){?>checked="checked"<?php }?> />-->
</td>
</tr>
</table>

</td>

    <?php
}
else
{
    ?>
    <td colspan="2" class="" style="padding: 0;">
<table width="50%">
    <tr>
        <td>
        <?php if($admin_doc['AdminDoc']['afimac_intel']=='0'){?><input type="hidden" name="Email_afimac_intel" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AFIMAC Intel </span><input type="checkbox" name="Email_afimac_intel" <?php if(isset($e['Emailupload']['afimac_intel']) && $e['Emailupload']['afimac_intel']==1){?>checked="checked"<?php }?>  /><?php }?>
        
        <?php if($admin_doc['AdminDoc']['news_media']=='0'){?><input type="hidden" name="Email_news_media" value="0"/><?php }else{?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;News/Media </span><input type="checkbox" name="Email_news_media" <?php if(isset($e['Emailupload']['news_media']) && $e['Emailupload']['news_media']==1){?>checked="checked"<?php }?>  /><?php }?>
        </td>
    </tr>
</table>
</td>
    <?php
}
?>
</tr>
<?php
$q = $job->find('all',array('conditions'=>array('is_special'=>0),'order'=>'title')); 
if($q || isset($sid)){
     
?>
<input type="hidden" name="jmid" value="<?php echo $jmid; ?>" />
<tr>
    <td colspan="2" style="padding: 0;">
        <table>
            <tr><td colspan="2"><strong><?php echo $this->requestAction('dashboard/translate/Assign Job to user');?></strong></td></tr>
            <?php
            $i=0;
            if(isset($sid))
            {
               ?>
               <td style="width: 15%;"><?php echo $stit?> 
               <input name="job[]" style="margin: 0;" type="checkbox"  checked="checked" value="<?php echo $sid;?>" />
               </td>
               <?php 
            }
            else 
            foreach($q as $j){
                $i++;
                if($i%6==1)
                {
                    ?>
                    <tr>
                    <?php
                }
               ?>
               <td style="width: 15%;"><?php echo $j['Job']['title']?> 
               <input name="job[]" style="margin: 0;" type="checkbox"  <?php if(in_array($j['Job']['id'],$jm)){?>checked="checked"<?php }?> value="<?php echo $j['Job']['id'];?>" />
               </td>
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
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="<?php echo $this->requestAction('dashboard/translate/Save Changes');?>" name="submit"/></div></td></tr>
</table>
</form>
</div>
<script>
$(function(){
   
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