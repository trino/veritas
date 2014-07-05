
<td colspan="3" style="padding: 0;">
<table>
<tr><td style="color:red;font-size:18px;font-weight: bold;">A.S.A.P. SECURED</td>   <td style="font-size:18px;font-weight: bold;">SITE SIGN IN/OUT</td></tr>
<tr ><td colspan="2">
    <div style="float: left;width:400px;line-height: 27px;">
        <?php echo $this->requestAction('dashboard/translate/NOTE').":".$this->requestAction('dashboard/translate/A SEPARATE REPORT MUST BE COMPLETED FOR EACH CHANGE IN SECURITY PERSONNEL.USE ADDITIONAL PAGE IF MORE SPACE IS REQUIRED');?>.<br />
        <?php echo $this->requestAction('dashboard/translate/As an authorized representative signing onto this site I take full responsibility for the mandated compliance set forth under Ontario Health and Safety Act and do not hole ASAP Secured Inc. liable for any claims due to my noncompliance')?>.
    </div>
    <div style="float: right;width:435px;">
    <table>
    <tr style="border-bottom: none;">
    <td>
    <?php echo $this->requestAction('dashboard/translate/Guard Name')?></td><td><input type="text" name="guard_name" value="<?php if(isset($static[0]['SiteSignin'])&& $static[0]['SiteSignin']!="") echo $static[0]['SiteSignin']['guard_name'];?>" /></td></tr>
<tr style="border-bottom: none;">
    <td>Date(mm/dd/yy)</td><td><input type="text" name="date" value="<?php if(isset($static[0]['SiteSignin'])&& $static[0]['SiteSignin']!="") echo $static[0]['SiteSignin']['date'];?>" /></td></tr>
<tr style="border-bottom: none;">
    <td><?php echo $this->requestAction('dashboard/translate/Loss Location')?></td><td><input type="text" name="loss_location" value="<?php if(isset($static[0]['SiteSignin'])&& $static[0]['SiteSignin']!="") echo $static[0]['SiteSignin']['loss_location'];?>" /></td></tr>
    </table>
</div>
<div class="clear"></div>
</table>

<!--<tr><td>Arrival Time(military time):</td></tr>

<tr><td>INSTRUCTIONS(include details on who initiated the changes and the time of changes):</td></tr>
<tr><td><input /></td></tr>-->

<table class="addmore_site">
<tr style="border-top: 1px solid #CCC;"><td><?php echo $this->requestAction('dashboard/translate/Arrival');?></td>
<td><?php echo $this->requestAction('dashboard/translate/Depart');?></td>
<td><?php echo $this->requestAction('dashboard/translate/Print Name');?>(<?php echo $this->requestAction('dashboard/translate/Clearly')?>)</td>
<td><?php echo $this->requestAction('dashboard/translate/Phone No')?>.</td>
<td><?php echo $this->requestAction('dashboard/translate/Company')?></td>
<td><?php echo $this->requestAction('dashboard/translate/Signature')?></td></tr>
<?php 
if(isset($static)){
   
    $count = count($static);
foreach($static as $k=>$v)
{
    
    ?>
  <tr><td><input type="text" name="arrival[]" value="<?php echo $static[$k]['SiteSignin']['arrival']; ?>"/></td>
    <td><input type="text" name="depart[]" value="<?php echo $static[$k]['SiteSignin']['depart'];?>"/> </td>
    <td><input type="text" name="name[]" value="<?php echo $static[$k]['SiteSignin']['print_name'];?>"/></td>
    <td><input type="text" name="phone[]" value="<?php echo $static[$k]['SiteSignin']['phone_no'];?>"/></td>
    <td><input type="text" name="company[]" value="<?php echo $static[$k]['SiteSignin']['company'];?>" /></td>
    <td><input type="text" name="sign[]" value="<?php echo $static[$k]['SiteSignin']['signature'];?>"/></td></tr>  
<?php }

}else{
    
?>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td>
    <td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td>
    <td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /></td></tr>
<?php }?>
</table>
<table class="table" style="border-bottom: 1px solid #DDD;">
    <tr><td style="text-align: right;"><a href="javascript:void(0);"id="addm" class="btn btn-primary">+Add More</a></td></tr>
</table>
<div style="position: relative;padding:5px;">
    <div style="width: 50%;float:left;">
        <strong>SIGNATURE:</strong><br />
            <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                
            </iframe>
    </div>        
            <?php
            if(isset($static[0]['SiteSignin']) && $static[0]['SiteSignin']['sign'])
            $signature = $static[0]['SiteSignin']['sign'];
            else
            $signature = '';
                if($signature)
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $signature;?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>
</td>
<style>
.addmore_site input[type="text"]{width:145px;}
</style>
<script>

 $('#addm').click(function(){
    $('.addmore_site').append('<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td><td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td><td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /><br/><a href="javascript:void(0)" class="btn btn-danger" onclick="$(this).closest(\'tr\').remove();">Remove</a></td></tr>')
 });  

</script>
