<?php include_once('inc.php');?>

<h3 class="page-title">
	Sent Mail
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>mail">Inbox</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>mail/sent_mail">Sent Mail</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<div id="table">
<h2>Sent Mail</h2>

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
        <td><?php echo $this->Html->link($e['Mail']['sender'],'/mail/read/'.$e['Mail']['id'],array('style'=>'text-decoration: none;')); ?></td>
        <td><?php echo $this->Html->link($e['Mail']['subject'],'/mail/read/'.$e['Mail']['id'],array('style'=>'text-decoration: none;')); ?></td>
        <td><?php echo $e['Mail']['date']; ?></td>
        <td><?php echo $this->Html->link('Delete','/mail/delete_mail/sender/'.$e['Mail']['id']); ?></td>
    </tr>
        
    <?php  }
?>
</table>

<?php } else echo "No mail Sent."?>

</div>

<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('«', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('»', array('tag' => 'li')); ?>
</ul>
</div>