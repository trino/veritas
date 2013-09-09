<?php include_once('inc.php');?>

<h3 class="page-title">
	Contacts
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>contacts">Contacts</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<?php
if($this->Session->read('avatar'))
{
 echo $this->Html->link(
					'Add Contact',
					'/contacts/add',
                    array('class'=>'btn btn-primary reg-company')
				) . "  ";
 echo $this->Html->link(
					'Upload Contact',
					'/contacts/upload',
                    array('class'=>'btn btn-primary reg-company')
				) . "<br><br>";
			?>
            <?php
            $jobs = $jbs->find('all'); 
            if($jobs){?><strong>Sort by Job</strong> : <select id="jobs"><option value="-1" <?php if($select == -1){?>selected="selected"<?php }?>>Select Job</option><option value="0" <?php if($select == 0){?>selected="selected"<?php }?>>No Job assigned</option><?php foreach($jobs as $js){?><option value="<?php echo $js['Job']['id'];?>" <?php if($select == $js['Job']['id']){?>selected="selected"<?php }?>><?php echo $js['Job']['title'];?></option><?php } ?></select><?php }?>
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
<div id="table">

    <table>
        <tr>
            <th><?php echo $this->Paginator->sort('title','Title');?></th>
            <th><?php echo $this->Paginator->sort('name','Name');?></th>
            <th><?php echo $this->Paginator->sort('email','Email');?></th>
            <th><?php echo $this->Paginator->sort('type','Contact type');?></th>
            <th>Select to send email</th>
            <!--<th><?php echo $this->Paginator->sort('job_id','Job');?></th>
            <th><?php echo $this->Paginator->sort('phone','Phone');?></th>
            <th><?php echo $this->Paginator->sort('company','Company');?></th>-->
            <th>Options</th>
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
    $type= array('Key Contacts','Staff Contacts','Third Party Contacts');
     foreach($docs as $k=>$d)
    {
    
?>
<tr>
            <td><?php echo $d['Key_contact']['title']; ?></td>
            <td><?php echo $d['Key_contact']['name']; ?></td>
            <td><?php echo $d['Key_contact']['email']; ?></td>
            <td><?php echo $type[$d['Key_contact']['type']];?></td>
            <td><input type="checkbox" value="<?php echo $d['Key_contact']['email'];?>" class="emails" /></td>
            <!--<td><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Key_contact']['job_id'])));if($get2)echo $get2['Job']['title']; ?></td>-->
            
            <td><a href="<?php echo $base_url.'contacts/edit/'.$d['Key_contact']['id'];?>" class="btn btn-primary">Edit</a> | <?php echo $this->Html->link(
					'Delete',
					'/contacts/delete/'.$d['Key_contact']['id'],
                    array('class'=>'btn btn-danger'),"Are you sure deleting this Contact?"
				)." ";?></td>
                
            </td>
       </tr> 
       <?php }?>
 </table>

</div>
<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('«', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('»', array('tag' => 'li')); ?>
</ul>
</div>
<div class="clear"></div>
<p>&nbsp;</p>
<div style="padding-top: 15px;">
    <strong>Message</strong><br />
    <textarea class="messages" style="width: 300px;height:90px;"></textarea><br />
    <a href="javascript:void(0);" class="btn btn-primary sendemail">Send Email</a> <img src="<?php echo $base_url;?>img/ajax-loader.gif" style="display: none;" id="img" />
</div>
    <?php
} else {echo"No Search Results";}
?>
<script>
$(function(){
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
            alert('Email sent successfully');
           } 
        });
       }
        
    });
   $('#jobs').change(function(){
    var id = $(this).val();
    var url = '<?php echo $base_url;?>contacts/index/'+id;
    window.location = url;
   }); 
});
</script>