<?php include_once('inc.php');?>


<h3 class="page-title">
	Edit <?php echo stripslashes($j['Job']['title']); ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/edit/<?php echo $j['Job']['id']; ?>">Edit <?php echo stripslashes($j['Job']['title']); ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $('#my_form').validate();
    });
</script>
<form action="" method="post" id="my_form" enctype="multipart/form-data">
<div id="table">
<h2>Job Description</h2>
<table>
<tr><td style="width:140px;"><b>Job Title</b></td><td><input type="text" class="required" name="title" value="<?php echo $j['Job']['title']; ?>" /></td></tr>
<tr><td><b>Job Description</b></td><td><textarea name="description" class="required" ><?php echo $j['Job']['description']; ?></textarea></td></tr>
 
<input type="hidden" name="img" value="<?php echo $j['Job']['image']; ?>" />
<tr><td><b>Image</b></td><td><input type="file" name="image" class="" /> <?php echo $this->Html->image("uploads/".$j['Job']['image']); ?></td></tr>
<tr><td><b>Start Date</b></td><td><input type="text" class="" name="start_date" id="start_date" value="<?php echo $j['Job']['date_start']; ?>" /></td></tr>
<tr><td><b>End Date</b></td><td><input type="text" class="" name="end_date" id="end_date" value="<?php echo $j['Job']['date_end']; ?>" /></td></tr>
<tr><td><b>Job Status</b></td>
    <td>
      <table>
      <tr>
        <td><input type="radio" name="status" value="0" <?php if($j['Job']['status']=='0') echo "checked='checked'";?> /> Active - Recruitment Only</td>
        <td><input type="radio" name="status" value="1" <?php if($j['Job']['status']=='1') echo "checked='checked'";?> /> Proposal Submitted  </td>
        <td><input type="radio" name="status" value="2" <?php if($j['Job']['status']=='2') echo "checked='checked'";?> /> Signed Contract  </td>
        <td><input type="radio" name="status" value="3" <?php if($j['Job']['status']=='3') echo "checked='checked'";?> /> Proposal Settled</td>
      </tr>    
        <tr><td><input type="radio" name="status" value="4" <?php if($j['Job']['status']=='4') echo "checked='checked'";?>/> Lost to Competitor</td></tr>  
        </table>
    </td>
</tr>
<tr><td><strong>Add Members:</strong></td><td>
<?php if($member ){?>
<table>
    <?php
    
    $mc = 0;
    foreach($member as $me){
        $mc++; 
        
        if($mc%4 == 1){?>
        <tr>
        <?php }?>
            <td><input class="unch" type="checkbox" name="member[]" <?php if(in_array($me['Member']['id'],$mem_arr)){?>checked="checked"<?php }?> value="<?php echo $me['Member']['id'];?>" style="margin: 0;" /> <?php echo $me['Member']['fname'].' '.$me['Member']['lname'].'</td>';
            }
            if($mc%4==0){  ?>
        </tr>
        <?php }
            if($mc%4==1)
            {
                echo "<td></td><td></td><td></td></tr>";
            }
            if($mc%4==2)
            {
                echo "<td></td><td></td></tr>";
            }
            if($mc%4==3)
            {
                echo "<td></td></tr>";
            }
            
            }else{echo "<b>No Members added</b>";}?>
</table>
</td></tr>
</table>
</div>
<div id="table">
<table>
<tr><td colspan="2"><strong>Add Contacts</strong></td></tr>
<tr><td colspan="2">
<table>
<?php 
$c = 0;
$jcontact = array();
foreach($jc as $j)
{
    $jcontact[] = $j['Job_contact']['key_id'];
}
foreach($kc as $k)
{
    if($c==0)
    {?>
     <tr>   
    <?php }
    $c++;
    ?>

    <td>  <input type="checkbox" name="key_contact[]" value="<?php echo $k['Key_contact']['id'];?>" <?php if(in_array($k['Key_contact']['id'], $jcontact)) echo "checked='checked'";?> />  <?php echo $k['Key_contact']['name'];?></td>
<?php 
if($c%5==0)
{
    $c==0;
    echo "</tr>";
}
}
?>
</tr>
</table>
</td></tr>
</table>
</div>

<div class="add_more"></div>
<a href="javascript:void(0)" id="add_key" class="btn btn-primary"> +Add Quick Keycontacts </a> <br /><br />
<div class="submit"><input type="submit" class="btn btn-primary" value="Save Changes" name="submit"/></div>

</form>
<script>
$(function(){
    $('.unch').change(function(){
       if($(this).is(':checked'))
       {
        //do nothing
       } 
       else
       {
        var mem = $(this).val();
        var job = '<?php echo $jobid?>';
        $.ajax({
           url:'<?php echo $base_url;?>jobs/removefromjob/'+mem+'/'+job
        });
       }
    });
    var add =   '<table width="100%"><tr><td>Contact Type</td><td colspan="3"><select name="type[]" class="required">'+
                '<option value="0">Key Contacts</option><option value="1">Staff Contacts</option>'+
                '<option value="2">Third Part Contacts</option></select></td></tr>'+
                '<tr><td><b>Name</b><br/> <input type="text" name="key_name[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Title</b><br/> <input type="text" name="key_title[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Cell Number</b><br/> <input type="text" name="key_cell[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Cellular Carrier</b><br />'+
                '<select name="key_cellular[]" class="required">'+
                '    <option value="Rogers">Rogers</option>'+
                '    <option value="Bell">Bell</option>'+
                '    <option value="Fido">Fido</option>'+
                '    <option value="Telus Mobility">Telus Mobility</option>'+
                '    <option value="Koodo Mobile">Koodo Mobile</option>'+
                '    <option value="Wind Mobile">Wind Mobile</option>'+
                '    <option value="Lynx Mobility">Lynx Mobility</option>'+
                '    <option value="MTS Mobility">MTS Mobility</option>'+
                '    <option value="PC Telecom">PC Telecom</option>'+
                '    <option value="Aliant">Aliant</option>'+
                '    <option value="SaskTel">SaskTel</option>'+
                '    <option value="Virgin Mobile">Virgin Mobile</option>'+
                '</select>'+
                '</td>'+
                '<td><b>Phone Number</b><br/> <input type="text" name="key_number[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Email</b><br/> <input type="text" name="key_email[]" class="email" style="width: 100px;" /></td>'+
                '<td><b>Company</b><br/> <input type="text" name="key_company[]" class="" style="width: 100px;" /> </td><td><input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" style="margin-top:20px;" value="Remove"/></td></tr>'+
                '</table>';
   $('#add_key').click(function(){
        $('.add_more').append(add);
   }); 
});
</script>