<?php include_once('inc.php');?>

<h3 class="page-title">
	Add Job
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/add">Add Job</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $('#my_form').validate();
    });
</script>
<div id="table">
<form action="" method="post" id="my_form" enctype="multipart/form-data" >
	<table>
<tr><td style="width:140px;"><b>Job Title</b></td><td><input type="text" name="title" class="required" /></td></tr>
<tr><td><b>Job Description</b></td><td><textarea name="description" class="required" ></textarea></td></tr>
<tr><td><b>Image</b></td><td><input type="file" name="image" class="" /></td></tr>
<tr><td><b>Start Date</b></td><td><input type="text" name="start_date" id="start_date" class="" /></td></tr>
<tr><td><b>End Date</b></td><td><input type="text" name="end_date" id="end_date" class="" /></td></tr>
<tr><td>Add Members:</td><td>
<?php if($member){?>
<table>
    <?php 
    $mc = 0;
    foreach($member as $me){
        $mc++; 
        if($mc%4==0){  ?>
        </tr>
        <?php }
        if($mc%4 == 1){?>
        <tr>
        <?php }?>
            <td><input type="checkbox" name="member[]" value="<?php echo $me['Member']['id'];?>" style="margin: 0;" /> <?php echo $me['Member']['fname'].' '.$me['Member']['lname'].'</td>';
            }
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
            }else{"<b>No Members added</b>";}?>
</table>
</td></tr>
<!--<tr><td colspan="2" class="add_more"></td></tr>
<tr><td colspan="2"><a href="javascript:void(0);" id="add_key"><strong>+ Add Key Contact</strong></a></td></tr>-->
<tr><td colspan="2"><strong>Add Contacts</strong></td></tr>
<tr><td colspan="2">
<table>
<?php 
$c = 0;
foreach($kc as $k)
{
    if($c==0)
    {?>
     <tr>   
    <?php }
    $c++;
    ?>

    <td>  <input type="checkbox" name="key_contact[]" value="<?php echo $k['Key_contact']['id'];?>" class="keysc" />  <?php echo $k['Key_contact']['name'];?></td>
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

<div class="add_more"></div>

<a href="javascript:void(0)" id="add_key" class="btn btn-primary"> +Add Quick Keycontacts </a><br /><br /> 

<div class="submit"><input type="submit" id="submit" class="btn btn-primary" value="Add Job" name="submit"  />

</div>

</form>
<script>
$(function(){
    /*
    $('.submit input').attr('disabled','disabled');
$('.fff').change(function(){
if($(this).val()!='')
{
$('.submit input').removeAttr('disabled');
}
else
$('.submit input').attr('disabled','disabled');
});*/
    var cnt = 0;
    var add =   '<table width="100%"><tr><td>Contact Type</td><td colspan="3"><select name="type[]" class="required">'+
                '<option value="0">Key Contacts</option><option value="1">Staff Contacts</option>'+
                '<option value="2">Third Part Contacts</option></select></td></tr>'+
                '<tr><td><b>Name</b><br/> <input type="text" name="key_name[]" class="required" style="width: 100px;" /></td>'+
                '<td><b>Title</b><br/> <input type="text" name="key_title[]" class="required" style="width: 100px;" /></td>'+
                '<td><b>Cell Number</b><br/> <input type="text" name="key_cell[]" class="required" style="width: 100px;" /></td>'+
                '<td><b>Phone Number</b><br/> <input type="text" name="key_number[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Email</b><br/> <input type="text" name="key_email[]" class="email" style="width: 100px;" /></td>'+
                '<td><b>Company</b><br/> <input type="text" name="key_company[]" class="" style="width: 100px;" /> </td><td><input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" style="margin-top:20px;" value="Remove"/></td></tr>'+
                '</table>';
   $('#add_key').click(function(){
        $('.add_more').append(add);
        cnt++;
   });
   
   $('#submit').click(function(){
   /*
   $('.keysc').each(function(){
            
        if ($(this).attr("checked")) {
            cnt++;
            }
        
   });
   //alert(cnt);
   if(cnt==0)
        {
            alert("Please Select contact.");
            $('.keysc').focus();
            return false;
            
        }
        else
            $('#my_form').submit();
    });
    */
});
</script>