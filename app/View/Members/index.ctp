<?php include_once('inc.php');?>
<style>
.infos a:hover{text-decoration: none;}
</style>

<h3 class="page-title">
	User Manager
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members">User Manager</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<?php echo $this->Html->link(
					'Add User',
					'/members/add',
					array('class'=>'btn btn-primary reg-company')
				);
			?>
<br/>
<br/>
<div id="table">


<table>
            <tr>
				<th colspan="2">User</th>
                <th style="width:250px;">Options</th>
            </tr>
<?php
if($mem){
foreach($mem as $m)
{
    ?>
  
    	<tr>
			<td style="width:40px;"><div style="background-color:#dddddd;width:40px; height:40px;"><a href="<?php echo $base_url.'members/view/'.$m['Member']['id']; ?>"><?php echo $this->Html->image('uploads/'.$m['Member']['image'], array('alt' => '')); ?></a></div> </td>
    		<td class="infos"><a href="<?php echo $base_url.'members/view/'.$m['Member']['id']; ?>"><?php echo $m['Member']['title']." ".$m['Member']['full_name']; ?></a></td>
    		<td>
    <?php 	echo $this->Html->link(
					'Edit',
					'/members/edit/'.$m['Member']['id'],
					array('class'=>'btn btn-primary')
				);  
			echo " " . $this->Html->link(
					'Delete',
					'/members/delete/'.$m['Member']['id'],
					array('class'=>'btn btn-primary')
				); 
			echo " " . $this->Html->link(
					'View',
					'/members/view/'.$m['Member']['id'],
					array('class'=>'btn btn-primary')
				);
			?>
		</td>
	</tr>


    <?php
}

?>
</table>
</div>
<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('«', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('»', array('tag' => 'li')); ?>
</ul>
</div>

<?php } 
else
{
    ?>
    No User added yet
    <?php
}
?>