
<td colspan="3" style="padding: 0;">
<table>
<tr><td style="color:red;font-size:18px;font-weight: bold;">A.S.A.P. SECURED</td>   <td style="font-size:18px;font-weight: bold;">SITE SIGN IN/OUT</td></tr>
<tr ><td rowspan="3"  >
        <?php echo $this->requestAction('dashboard/translate/NOTE').":".$this->requestAction('dashboard/translate/A SEPARATE REPORT MUST BE COMPLETED FOR EACH CHANGE IN SECURITY PERSONNEL.USE ADDITIONAL PAGE IF MORE SPACE IS REQUIRED');?>.<br /><br />
        <?php echo $this->requestAction('dashboard/translate/As an authorized representative signing onto this site I take full responsibility for the mandated compliance set forth under Ontario Health and Safety Act and do not hole ASAP Secured Inc. liable for any claims due to my noncompliance')?>.
    </td>
    <td><?php echo $this->requestAction('dashboard/translate/Guard Name')?>:<input type="text" name="guard_name" value="<?php if(isset($static)&& $static[0]['SiteSignin']!="") echo $static[0]['SiteSignin']['guard_name'];?>" /></td></tr>
<tr><td>Date(mm/dd/yy):<input type="text" name="date" value="<?php if(isset($static)&& $static[0]['SiteSignin']!="") echo $static[0]['SiteSignin']['date'];?>" /></td></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/Loss Location')?>:<input type="text" name="loss_location" value="<?php if(isset($static)&& $static[0]['SiteSignin']!="") echo $static[0]['SiteSignin']['loss_location'];?>" /></td></tr>
</table>

<!--<tr><td>Arrival Time(military time):</td></tr>

<tr><td>INSTRUCTIONS(include details on who initiated the changes and the time of changes):</td></tr>
<tr><td><input /></td></tr>-->

<table class="addmore_site">
<tr><td><?php echo $this->requestAction('dashboard/translate/Arrival');?></td>
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
    <td><input type="text" name="sign[]" value="<?php echo $static[$k]['SiteSignin']['signature'];?>"/><?php if($k+1==$count)echo "<a href='javascript:void(0);' class='btn btn-primary' id='addm'>+Add more</a>";?></td></tr>  
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
<table class="table">
    <tr><td style="text-align: right;"><a href="javascript:void(0);"id="addm" class="btn btn-primary">+Add More</a></td></tr>
</table>
</td>
<style>
.addmore_site input[type="text"]{width:145px;}
</style>
<script>

 $('#addm').click(function(){
    $('.addmore_site').append('<tr><td><input type="text" name="arrival[]"/></td><td><input type="text" name="depart[]" /></td><td><input type="text" name="name[]"/></td><td><input name="phone[]" type="text"/></td><td><input type="text" name="company[]" /></td><td><input type="text" name="sign[]" /><a href="javascript:void(0)" class="btn btn-danger" onclick="$(this).closest(\'tr\').remove();">Remove</a></td></tr>')
 });  

</script>
