<?php include_once('inc.php');?>

<h3 class="page-title">
	Company Manager
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>comp">Company Manager</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<?php echo $this->Html->link('Register Company','/comp/register', array('class'=>'btn btn-primary reg-company')); ?>
<br/><br/>
<div id="table">


    <?php 
   
    if($company)
    { ?>
        <table>
            <tr>
                <th>Company</th>
                <th>Options</th>
            </tr>
        
    <?php 
        foreach($company as $c)
        { ?>
            <tr>
                <td><?php echo $this->Html->image('uploads/'.$c['Company']['image']).$c['Company']['company']; ?></td>
                <td><?php echo $this->Html->link('Edit','/comp/edit_company/'.$c['Company']['id'],array('class'=>'btn btn-primary')); ?>  <?php echo $this->Html->link('Delete','/comp/delete_company/'.$c['Company']['id'], array('class'=>'btn btn-primary')); ?> <?php echo $this->Html->link('View','/comp/view/'.$c['Company']['id'],array('class'=>'btn btn-primary')); ?></td>
            </tr>    
        <?php }
        ?></table><?php 
    }
    else
    {
        echo "No Company added";
    }
    ?>
</div>