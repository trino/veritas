<?php include_once('inc.php');?>
<script>
function approve(id)
{
    $.ajax({
        url: 'approve',
        type: 'post',
        data: 'id='+id,
        success:function(response)
        {
            if(response=="1")
            {
                $('#approve').html('');
                $('#approve').html('Job Approved');   
            }
        }
    });
}
</script>
<div id="table">
<h2>Pending Jobs</h2>
<table>
<?php 
    if($jobs)
    {
        foreach($jobs as $j)
        { ?><tr><td><?php
            echo $this->Html->image('uploads/'.$j['Job']['image'], array('alt' => '')); echo $j['Job']['title'];
            ?>
            <span id="approve"><a href="javascript:void(0);" id="<?php echo $j['Job']['id'] ?>" onclick="approve(this.id)" class="btn btn-primary btn-mini">Approve</a><?php echo $this->Html->link('View','/jobs/view/'.$j['Job']['id'],array('class'=>'btn btn-primary btn-mini'));?> <?php echo $this->Html->link('Remove','/jobs/delete/'.$j['Job']['id'],array('class'=>'btn btn-primary btn-mini')); ?></span></td></tr>
            <?php 
        }
    }
    else
    {
        echo "<tr><td>No Pending Jobs</td></tr>";
    }
?>
 </table>
    </div>