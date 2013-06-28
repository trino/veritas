<?php include_once('inc.php');?>



<h3 class="page-title">
	Documents: <?=$title2;?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>uploads/view_doc/<?=$link;?>">Documents: <?=$title2;?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<?php 
if(isset($message))
{
    echo $message;
}
elseif(isset($doc))
{
    ?>
    <div id="table">
     <table>
        <tr>
            <th>Title</th>
            <th>Uploaded By</th>
            <th>Description</th>
            <!--<th>Job</th>-->
            <th>Option</th>
        </tr>
    <?php
    $m=0;
    foreach($doc as $k=>$d)
    {
        $m++;
        
        if($m==1)
        {
         $arr[]=$doc[$k]['Document']['job_id'];   
        ?>
        
        <tr style="background: grey;color:#FFF;"><td colspan="4"><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong></tr>
        
        <?php
        }
        else
        {
            if(!in_array($doc[$k]['Document']['job_id'],$arr))
            {
                $arr[]=$doc[$k]['Document']['job_id'];
                ?>
                <tr style="background: grey;color:#FFF;"><td colspan="4"><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong></tr>
                <?php
            }
        }
        $test = ($k == count($doc)-1) ? $doc[$k]['Document']['job_id'] : $doc[$k+1]['Document']['job_id'];

        /*if($doc[$k]['Document']['job_id'] != $test ) 
        {
            ?>
            
          <tr>
            <td><?php echo $d['Document']['title']; ?></td>
            <td><?php if($d['Document']['addedBy'] == 0)echo 'Admin';else{$get = $mems->find('first',array('conditions'=>array('id'=>$d['Document']['addedBy'])));if($get)echo $get['Member']['full_name'];} ?></td>
            <td><?php echo $d['Document']['description']; ?></td>
            <!--<td><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></td>-->
            <td><?php echo $this->Html->link('View Detail','/uploads/view_detail/'.$d['Document']['id'],array('class'=>'btn btn-primary'));  ?>
            
                <?php // if($update==1) echo $this->Html->link('Edit','/uploads/edit/'.$d['Document']['id']); ?>
            </td>
            
       </tr> 
        <?php 
        }
        else
        { 
            $brk = 1;*/
        ?>
       <tr>
            <td><?php echo $d['Document']['title']; ?></td>
            <td><?php if($d['Document']['addedBy'] == 0)echo 'Admin';else{$get = $mems->find('first',array('conditions'=>array('id'=>$d['Document']['addedBy'])));if($get)echo $get['Member']['full_name'];} ?></td>
            <td><?php echo $d['Document']['description']; ?></td>
            <!--<td><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></td>-->
            <td><?php echo $this->Html->link('View Detail','/uploads/view_detail/'.$d['Document']['id'],array('class'=>'btn btn-primary'));  ?>
            <?php
            if($this->Session->read('admin')){
                
            
            ?>
                <?php echo $this->Html->link('Edit','/uploads/document_edit/'.$d['Document']['id'],array('class'=>'btn btn-info'));  ?>
                <?php echo $this->Html->link('Delete','/uploads/delete/'.$d['Document']['id'],array('class'=>'btn btn-danger'),"Confirm Delete Document?");  ?>
                <?php }?>
                <?php // if($update==1) echo $this->Html->link('Edit','/uploads/edit/'.$d['Document']['id']); ?>
            </td>
            
       </tr> 
    <?php //}
        }
    }
?>
 </table>
</div>