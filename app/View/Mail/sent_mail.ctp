<?php include_once('inc.php');?>

<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Sent Mail');?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>mail"><?php echo $this->requestAction('dashboard/translate/Inbox');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>mail/sent_mail"><?php echo $this->requestAction('dashboard/translate/Sent Mail');?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<?php echo $this->Html->link($this->requestAction('dashboard/translate/Inbox'),'/mail', array('class'=>'btn btn-primary reg-company')); ?> 
<?php echo $this->Html->link($this->requestAction('dashboard/translate/Sent Mail'),'/mail/sent_mail', array('class'=>'btn btn-primary reg-company')); ?>
<br/><br/>

<div id="table">


<?php if($email) { ?>
<table>
    <tr>
        <th><?php echo $this->requestAction('dashboard/translate/From');?></th>
        <th><?php echo $this->requestAction('dashboard/translate/To');?></th>
        <th><?php echo $this->requestAction('dashboard/translate/Subject');?></th>
        <th><?php echo $this->requestAction('dashboard/translate/Date');?></th>
        <th>Options</th>
    </tr>

<?php 
    foreach($email as $e)
    {  ?>
    <tr>
        <td><?php echo $this->Html->link($e['Mail']['sender'],'/mail/read/'.$e['Mail']['id'].'/?sent=1',array('style'=>'text-decoration: none;')); ?></td>
        <td><?php if($e['Mail']['recipients_id'] == 0)echo 'Admin';else{$get = $mems->find('first',array('conditions'=>array('id'=>$e['Mail']['recipients_id'])));if($get)echo "<a href='".$base_url."mail/read/".$e['Mail']['id']."/?sent=1'>".$get['Member']['full_name']."</a>";}?></td>
        <td><?php echo $this->Html->link($e['Mail']['subject'],'/mail/read/'.$e['Mail']['id'].'/?sent=1',array('style'=>'text-decoration: none;')); ?></td>
        <td><?php echo $e['Mail']['date']; ?></td>
        <td>
		<?php echo $this->Html->link($this->requestAction('dashboard/translate/View'),'/mail/read/'.$e['Mail']['id'].'/?sent=1', array('class'=>'btn btn-primary')); ?>
		<?php echo $this->Html->link($this->requestAction('dashboard/translate/Delete'),'/mail/delete_mail/sender/'.$e['Mail']['id'], array('class'=>'btn btn-primary')); ?></td>
    </tr>
        
    <?php  }
?>
</table>

<?php } else echo $this->requestAction('dashboard/translate/No mail Sent')."."; ?>

</div>

<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('«', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('»', array('tag' => 'li')); ?>
</ul>
</div>