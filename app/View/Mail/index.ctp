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
    {  ?>
    <tr>
        <td><?php echo $this->Html->link($e['Mail']['sender'],'/mail/read/'.$e['Mail']['id'],array('class'=>'text-decoration: none;')); ?></td>
        <td><?php echo $this->Html->link($e['Mail']['subject'],'/mail/read/'.$e['Mail']['id'],array('style'=>'text-decoration: none;')); ?></td>
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
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
</div>
<?php }
    else
    {
        echo "No mail received";
    }
 ?>

