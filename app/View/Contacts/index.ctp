<?php include_once('inc.php');?>

<h3 class="page-title">
	Contacts
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>contacts">Contacts</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<?php
if($this->Session->read('avatar'))
{
 echo $this->Html->link(
					'Add Contact',
					'/contacts/add',
                    array('class'=>'btn btn-primary reg-company')
				) . "<br><br>";
			?>
            <?php 
   }

   ?>


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
            <th><?php echo $this->Paginator->sort('email','Email');?></th>
            <th><?php echo $this->Paginator->sort('type','Contact type');?></th>
            <!--<th><?php echo $this->Paginator->sort('job_id','Job');?></th>
            <th><?php echo $this->Paginator->sort('phone','Phone');?></th>
            <th><?php echo $this->Paginator->sort('company','Company');?></th>-->
            <th>Options</th>
        </tr>
    <?php
    /*
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
            <td><a href="<?php echo $base_url.'contacts/edit/'.$d['Key_contact']['id'];?>" class="btn btn-primary">Edit</a><a href="" class="btn btn-danger">Delete</a></td>
                
            </td>
       </tr> 
    <?php } */
    $type= array('Key Contacts','Staff Contacts','Third Party Contacts');
     foreach($docs as $k=>$d)
    {
    
?>
<tr>
            <td><?php echo $d['Key_contact']['title']; ?></td>
            <td><?php echo $d['Key_contact']['name']; ?></td>
            <td><?php echo $d['Key_contact']['email']; ?></td>
            <td><?php echo $type[$d['Key_contact']['type']];?></td>
            <!--<td><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Key_contact']['job_id'])));if($get2)echo $get2['Job']['title']; ?></td>-->
            
            <td><a href="<?php echo $base_url.'contacts/edit/'.$d['Key_contact']['id'];?>" class="btn btn-primary">Edit</a> | <?php echo $this->Html->link(
					'Delete',
					'/contacts/delete/'.$d['Key_contact']['id'],
                    array('class'=>'btn btn-danger'),"Are you sure deleting this Contact?"
				)." ";?></td>
                
            </td>
       </tr> 
       <?php }?>
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