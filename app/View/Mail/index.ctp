<?php include('inc.php');?>

<h3 class="page-title">
	Inbox
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>mail">Inbox</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<div id="table">
<h2>Inbox</h2>
<?php echo $this->Html->link('Inbox','/mail', array('class'=>'btn btn-primary reg-company')); ?>
<?php echo $this->Html->link('Sent Mail','/mail/sent_mail', array('class'=>'btn btn-primary reg-company')); ?>

<?php if($email) { ?>
<table>
    <tr>
        <th>Sent By</th>
        <th>Subject</th>
        <th>Date</th>
        <th>Option</th>
    </tr>

<?php 
    foreach($email as $e)
    {  
        if($e['Mail']['parent'] == 0)
        $check_child_status = $mails->find('first',array('conditions'=>array('parent'=>$e['Mail']['id'],'status'=>'unread')));
        else
        $check_child_status = false;
        if($e['Mail']['status']=='unread' || $check_child_status){$style="";}else{$style="background-color:#e5e5f5;";}
        $cnt = $count->find('count',array('conditions'=>array('parent'=>$e['Mail']['id']))); 
        ?>
        
    <tr style="<?php echo $style;?>">
        <td><?php echo $this->Html->link($e['Mail']['sender'],'/mail/read/'.$e['Mail']['id'],array('style'=>'')); if($e['Mail']['status']=='unread'){echo "</b>";} ?></td>
        <td><?php echo $this->Html->link($e['Mail']['subject'].(($cnt!=0)? "(".$cnt.")" : ""),'/mail/read/'.$e['Mail']['id'],array('style'=>'')); ?></td>
        <td><?php echo $e['Mail']['date']; ?></td>
        <td><?php echo $this->Html->link('Delete','/mail/delete_mail/reciever/'.$e['Mail']['id'],array('class'=>'btn btn-primary')); ?></td>
    </tr>
        
    <?php  }
?>
</table>
</div>
<div id="pagination">
<?php echo $this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'btn btn-inverse disabled')); ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'btn btn-inverse disabled')); ?>
</div>
<?php }
    else
    {
        echo "No mail received";
    }
 ?>

