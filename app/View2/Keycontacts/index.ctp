<?php include_once('inc.php');?>

<h3 class="page-title">
	Key Contacts
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>keycontacts">Key Contacts</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<?php
if($docs)
{
    /*
    if($date=='asc')
        $date = 'desc';
    else
        $date = 'asc'; 
        */  
    ?>
<div id="table">

    <table>
        <tr>
            <th><?php echo $this->Paginator->sort('title','Title');?></th>
            <th><?php echo $this->Paginator->sort('name','Name');?></th>
            <!--<th>Location</th>-->
            <th><?php echo $this->Paginator->sort('email','Email');?></th>
            <th><?php echo $this->Paginator->sort('cell','Cell');?></th>
            <th><?php echo $this->Paginator->sort('phone','Phone');?></th>
            <th><?php echo $this->Paginator->sort('company','Company');?></th>
        </tr>
    <?php
    
    $m=0;
    foreach($docs as $k=>$d)
    {
        $m++;
        
        if($m==1)
        {
            $arr[]=$docs[$k]['Key_contact']['job_id'];   
        ?>
        
        <tr style="background: grey;color:#FFF;"><td colspan="6"><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Key_contact']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong></tr>
        
        <?php
        }
        else
        {
            if(!in_array($docs[$k]['Key_contact']['job_id'],$arr))
            {
                $arr[]=$docs[$k]['Key_contact']['job_id'];
                ?>
                <tr style="background: grey;color:#FFF;"><td colspan="6"><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Key_contact']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong></tr>
                <?php
            }
        }
     
   
       ?>
    
       <tr>
            <td><?php echo $d['Key_contact']['title']; ?></td>
            <td><?php echo $d['Key_contact']['name']; ?></td>
            <td><?php echo $d['Key_contact']['email']; ?></td>
            <td><?php echo $d['Key_contact']['cell']; ?></td>
            <td><?php echo $d['Key_contact']['phone'];?></td>
            <td><?php echo $d['Key_contact']['company'];?></td>
            
                
            </td>
       </tr> 
    <?php }
    
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
    <?php
} else {echo"No Search Results";}
?>