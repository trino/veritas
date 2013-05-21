<?php include_once('inc.php');?>

<h3 class="page-title">
	Documents Search
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>search?search=">Documents Search</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<?php
if($docs)
{
    ?>
<div id="table">

    <table>
        <tr>
            <th>Title</th>
            <!--<th>Location</th>-->
            <th>Description</th>
            <th>Uploaded By</th>
            <th>Uploaded On</th>
            <th>Option</th>
        </tr>
    <?php
    
    $m=0;
    foreach($docs as $k=>$d)
    {
        $m++;
        
        if($m==1)
        {
         $arr[]=$docs[$k]['Document']['job_id'];   
        ?>
        
        <tr style="background: grey;color:#FFF;"><td colspan="5"><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong></tr>
        
        <?php
        }
        else
        {
            if(!in_array($docs[$k]['Document']['job_id'],$arr))
            {
                $arr[]=$docs[$k]['Document']['job_id'];
                ?>
                <tr style="background: grey;color:#FFF;"><td colspan="5"><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong></tr>
                <?php
            }
        }
     
   
       ?>
    
       <tr>
            <td><?php echo $d['Document']['title']; ?></td>
            <!--<td><?php echo $d['Document']['location']; ?></td>-->
            <td><?php echo $d['Document']['description']; ?></td>
            <td><?php if($d['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$d['Document']['addedBy'])));if($q){echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";}}else echo "Admin";?></td>
            <td><?php echo $d['Document']['date'];?></td>
            <td><?php echo $this->Html->link('View','/uploads/view_detail/'.$d['Document']['id'], array('class'=>'btn btn-primary'));  ?>
                
            </td>
       </tr> 
    <?php }
    
?>
 </table>

</div>

    <?php
} else {echo"No Search Results";}
?>