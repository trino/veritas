<?php 
include_once('inc.php');
?>

<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Contacts');?>
</h3>
<ul class="breadcrumb" >
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>contacts"><?php echo $this->requestAction('dashboard/translate/Contacts');?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<?php
if($this->Session->read('avatar'))
{
 /*echo $this->Html->link(
					'Add Contact',
					'/contacts/add',
                    array('class'=>'btn btn-primary reg-company')
				) . "  ";
 echo $this->Html->link(
					'Upload Contact',
					'/contacts/upload',
                    array('class'=>'btn btn-primary reg-company')
				) . "<br><br>";*/
			?>
            <?php
            $jobs = $jbs->find('all'); 
            if($jobs){?><strong><?php echo $this->requestAction('dashboard/translate/Filter Job');?></strong> : <select id="jobs"><option value="-1" <?php if($select == -1){?>selected="selected"<?php }?>><?php echo $this->requestAction('dashboard/translate/Select Job');?></option><option value="0" <?php if($select == 0){?>selected="selected"<?php }?>><?php echo $this->requestAction('dashboard/translate/No Job assigned');?></option><?php foreach($jobs as $js){?><option value="<?php echo $js['Job']['id'];?>" <?php if($select == $js['Job']['id']){?>selected="selected"<?php }?>><?php echo $js['Job']['title'];?></option><?php } ?></select><?php }?>
            &nbsp; &nbsp;<strong><?php echo $this->requestAction('dashboard/translate/Filter Contact');?></strong> : <select id="con_type" class="required">
                <option value=""><?php echo $this->requestAction('dashboard/translate/Select Type');?></option>
                <option value="0"<?php if($type=='0')echo "Selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Key Contacts');?></option>
                <option value="1"<?php if($type=='1')echo "Selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Staff Contacts');?></option>
                <option value="2"<?php if($type=='2')echo "Selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Third Part Contacts');?></option>
            </select> 
            <?php
             
   }

   ?>


<?php
if($docs)
{
    /*
    if($date=='asc')
        $date = 'desc';
    else
        $date = 'asc'; 
        */  
    ?>
    
<div id="">

    <table class="table table-bordered">
        <tr>
            <th><?php echo $this->Paginator->sort('title',$this->requestAction('dashboard/translate/Title'));?></th>
            <th><?php echo $this->Paginator->sort('name',$this->requestAction('dashboard/translate/Name'));?></th>
            <th><?php echo $this->Paginator->sort('email',$this->requestAction('dashboard/translate/Email'));?></th>
            <th><?php echo $this->Paginator->sort('type',$this->requestAction('dashboard/translate/Contact type'));?></th>
            <th><?php echo $this->requestAction('dashboard/translate/Cell Number');?></th>
            <th><?php echo $this->requestAction('dashboard/translate/Phone');?></th>

            <?php
            if($this->Session->read('avatar'))
            {
            ?>
            <th><?php echo $this->requestAction('dashboard/translate/Cell Carrier');?></th>
            <th><?php echo $this->requestAction('dashboard/translate/Send To');?>  <input type="checkbox" class="all" /> <span style="font-size: 12px;">(<?php echo $this->requestAction('dashboard/translate/Select All');?>)</span></th>
            <!--<th><?php echo $this->Paginator->sort('job_id','Job');?></th>
            <th><?php echo $this->Paginator->sort('phone',$this->requestAction('dashboard/translate/Phone'));?></th>
            <th><?php echo $this->Paginator->sort('company',$this->requestAction('dashboard/translate/Company'));?></th>-->
            <th style="width: 150px;">Options</th>
            <th style="width: 300px;"><?php echo $this->requestAction('dashboard/translate/Message');?></th>
            <?php }?>
        </tr>
    <?php
    /*
    $m=0;
    foreach($docs as $k=>$d)
    {
        $m++;
        
        if($m==1)
        {
            $arr[]=$docs[$k]['Key_contact']['job_id'];   
        ?>
        
        <tr style="background: grey;color:#FFF;"><td colspan="6"><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Key_contact']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong></tr>
        
        <?php
        }
        else
        {
            if(!in_array($docs[$k]['Key_contact']['job_id'],$arr))
            {
                $arr[]=$docs[$k]['Key_contact']['job_id'];
                ?>
                <tr style="background: grey;color:#FFF;"><td colspan="6"><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Key_contact']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong></tr>
                <?php
            }
        }
     
   
       ?>
    
       <tr>
            <td><?php echo $d['Key_contact']['title']; ?></td>
            <td><?php echo $d['Key_contact']['name']; ?></td>
            <td><?php echo $d['Key_contact']['email']; ?></td>
            <td><?php echo $d['Key_contact']['cell']; ?></td>
            <td><?php echo $d['Key_contact']['phone'];?></td>
            <td><?php echo $d['Key_contact']['company'];?></td>
            <td><a href="<?php echo $base_url.'contacts/edit/'.$d['Key_contact']['id'];?>" class="btn btn-primary">Edit</a><a href="" class="btn btn-danger">Delete</a></td>
                
            </td>
       </tr> 
    <?php } */
    $type= array($this->requestAction('dashboard/translate/Key Contacts'),$this->requestAction('dashboard/translate/Staff Contacts'),$this->requestAction('dashboard/translate/Third Party Contacts'));
    $cc=0;
     foreach($docs as $k=>$d)
    {
        $cc++;
    
?>
<tr>
            <td><?php echo $d['Key_contact']['title']; ?></td>
            <td><?php echo $d['Key_contact']['name']; ?></td>
            <td><?php echo $d['Key_contact']['email']; ?></td>
            <td><?php echo $type[$d['Key_contact']['type']];?></td>
            <td><?php echo phone_number($d['Key_contact']['cell']); ?></td>
            <td><?php echo phone_number($d['Key_contact']['phone']);?></td>

            <?php
            if($this->Session->read('avatar'))
            {
                ?>
            <td><?php echo $d['Key_contact']['cellular_provider']; ?></td>
            <td><input type="checkbox" value="<?php echo $d['Key_contact']['email'];?>" class="emails" /></td>
            <!--<td><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Key_contact']['job_id'])));if($get2)echo $get2['Job']['title']; ?></td>-->
            
            <td><a href="<?php echo $base_url.'contacts/edit/'.$d['Key_contact']['id'];?>" class="btn btn-primary"><?php echo $this->requestAction('dashboard/translate/Edit');?></a> | 
            <?php echo $this->Html->link(
					$this->requestAction('dashboard/translate/Delete'),
					'/contacts/delete/'.$d['Key_contact']['id'],
                    array('class'=>'btn btn-danger'),$this->requestAction('dashboard/translate/Delete this Contact')."?"
				)." ";?></td>
            <?php if($cc==1){?>    
            <td rowspan="<?php echo count($docs);?>">
			<?php echo $this->requestAction('dashboard/translate/Select recipients before sending message.');?> <?php echo $this->requestAction('dashboard/translate/Checkbox to the left.');?><br><br>
			<textarea class="messages" style="height: 300px;width:94%;"></textarea>
            <br />
            <br />
            <a href="javascript:void(0);" class="btn btn-primary sendemail"><?php echo $this->requestAction('dashboard/translate/Send Email');?></a> <a href="javascript:void(0);" class="btn btn-primary sendtxt"><?php echo $this->requestAction('dashboard/translate/Send Text Message');?></a>
            
			
			<br /><br />
            <img src="<?php echo $base_url;?>img/ajax-loader.gif" style="display: none;" id="img" />
            
            
            </td>
            <?php }?>
            <?php
            }
            ?>
       </tr> 
       <?php }?>
 </table>
<?php
if(isset($employee) && $employee && !$this->Session->read('special'))
{
    ?>
    <h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Employee');?>
</h3>
    <table class="table table-bordered">
        <tr>
            <th><?php echo $this->requestAction('dashboard/translate/Title');?></th>
            <th><?php echo $this->requestAction('dashboard/translate/Name');?></th>
            <th><?php echo $this->requestAction('dashboard/translate/Email');?></th>
            <th><?php echo $this->requestAction('dashboard/translate/Phone');?></th>
            <!--th>Assigned to Job(s)</th-->
        </tr>
    <?php
    $cc=0;
     foreach($employee as $k=>$d)
    {
        $cc++;
    
?>
<tr>
            <td><?php echo $d['Member']['title']; ?></td>
            <td><?php echo $d['Member']['full_name']; ?></td>
            <td><?php echo $d['Member']['email']; ?></td>
            <td><?php echo phone_number($d['Member']['phone']);?></td>

            
       </tr> 
       <?php }?>
 </table>
    <?php
}
?>
</div>
<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('�', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('�', array('tag' => 'li')); ?>
</ul>
</div>
<div class="clear"></div>

    <?php
} else {echo "No Search Results";}
?>
<script>
$(function(){
    $('.all').change(function(){
       if($(this).is(':checked'))
       {
        $('.emails').each(function(){
           if($(this).is(':checked'))
           {
            //
           } 
           else
           $(this).click();
        });
       }
       else
       {
        $('.emails').each(function(){
           if($(this).is(':checked'))
           {
            $(this).click();
           } 
           
           
        });
       }
        
    });
    $('.sendemail').click(function(){
        var ema = '';
       $('.emails').each(function(){
        if($(this).is(':checked')){
        var vall = $(this).val();    
        ema = ema+vall+',';
        }
        else
        ema = ema.replace(vall+',','');
                
       });
       if(ema == ''){
       alert('Please select a key contact');
       return;
       }
       else
       if($('.messages').val()=='')
       {
        alert('Please enter a message');
        return;
       }
       else
       {
        $('.sendemail').text('Sending..');
        $('#img').show();
        $('.sendemail').attr('disabled','disabled');
        $.ajax({
           url:'<?php echo $base_url;?>/contacts/email',
           data:'email='+ema+'&msg='+$('.messages').val(),
           type:'post',
           success:function(){
            $('.sendemail').text('Send Email');
            $('.sendemail').removeAttr('disabled');
            $('#img').hide();
            window.location = '';
           } 
        });
       }
        
    });
    $('.sendtxt').click(function(){
        var ema = '';
       $('.emails').each(function(){
        if($(this).is(':checked')){
        var vall = $(this).val();    
        ema = ema+vall+',';
        }
        else
        ema = ema.replace(vall+',','');
                
       });
       if(ema == ''){
       alert('Please select a key contact');
       return;
       }
       else
       if($('.messages').val()=='')
       {
        alert('Please enter a message');
        return;
       }
       else
       {
        $('.sendtxt').text('Sending..');
        $('#img').show();
        $('.sendtxt').attr('disabled','disabled');
        $.ajax({
           url:'<?php echo $base_url;?>/contacts/sms',
           data:'email='+ema+'&msg='+$('.messages').val(),
           type:'post',
           success:function(res){
            //alert(res);
            $('.sendtxt').text('Send Text Message');
            $('.sendtxt').removeAttr('disabled');
            $('#img').hide();
            window.location = '';
           } 
        });
       }
        
    });
   $('#jobs').change(function(){
    var id = $(this).val();
    var url = '<?php echo $base_url;?>contacts/index/'+id;
    window.location = url;
   });
   $('#con_type').change(function(){
    var id = $(this).val();
    var url = '<?php echo $base_url;?>contacts/index/<?php echo $select;?>/'+id;
    window.location = url;
   }); 
});
</script>
