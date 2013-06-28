<?php include_once('inc.php');?>
<?php 
if(isset($message))
{
    echo $message;
}
else
{
    ?>
     <table>
        <tr>
            <th>Title</th>
            <th>Uploaded By</th>
            <th>Description</th>
            <th>Option</th>
        </tr>
    <?php
    foreach($doc as $d)
    {?>
       <tr>
            <td><?php echo $d['Document']['title']; ?></td>
            <td><?php if($d['Document']['addedBy'] == 0)echo 'Admin';else{$get = $mems->find('first',array('conditions'=>array('id'=>$d['Document']['addedBy'])));if($get)echo $get['Member']['full_name'];} ?></td>
            <td><?php echo $d['Document']['description']; ?></td>
            <td><?php echo $this->Html->link('View Detail','/uploads/view_detail/'.$d['Document']['id']);  ?>
                <?php // if($update==1) echo $this->Html->link('Edit','/uploads/edit/'.$d['Document']['id']); ?>
            </td>
       </tr> 
    <?php }
    }
?>
 </table>