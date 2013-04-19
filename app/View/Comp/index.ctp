<div id="table">
<h2>Company Manager</h2>
<?php echo $this->Html->link('Register Company','/comp/register', array('class'=>'btn btn-primary reg-company')); ?>
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