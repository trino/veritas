<?php include('inc.php');?>

<h3 class="page-title">
	Inbox
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>mail">Inbox</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<?php //echo $this->Html->link('Inbox','/mail', array('class'=>'btn btn-primary reg-company')); ?> 
<?php //echo $this->Html->link('Sent Mail','/mail/sent_mail', array('class'=>'btn btn-primary reg-company')); ?>


<div id="table">


<?php if($email) { ?>
<table>
    <tr>
        <th>From</th>
        <th>To</th>
        <th>Subject</th>
        <th>Date</th>
        <th>Options</th>
    </tr>

<?php 
    foreach($email as $e)
    {  
        
        //echo $e['Mail']['parent'];
        
        if($this->Session->read('admin')&& !$this->Session->read('FMember')){if($e['Mail']['sender_id']!=0 && $e['Mail']['status']=='unread')$stcheck=true;}
        if($e['Mail']['parent'] == 0)
        {
        $userr = $this->Session->read('id');
        if($this->Session->read('admin')){
            
        $userr = 0;
        if($this->Session->read('FMember'))
        $userr = $this->Session->read('FMember');
        }
        $check_child_status = $read->find('first',array('conditions'=>array('user'=>$userr,'parent'=>$e['Mail']['id'],'status'=>0)));
        }
        else
        $check_child_status = false;
        
        if($check_child_status){$style="background-color:#e5e5f5;";}else{$style="";}
        $cnt = $count->find('count',array('conditions'=>array('parent'=>$e['Mail']['id']))); 
        ?>
        
    <tr style="<?php echo $style;?>">
        <td><?php echo $this->Html->link($e['Mail']['sender'],'/mail/read/'.$e['Mail']['id'],array('style'=>'')); if($e['Mail']['status']=='unread'){echo "</b>";} ?></td>
        <td>
        
        <?php
        //if(!$this->Session->read('admin'))
            $allto = $ls->find('all',array('conditions'=>array('parent'=>$e['Mail']['id'],'first <>'=>$e['Mail']['sender_id'])));
        
        
           /*$reply_arr = $count->find('all',array('conditions'=>array('parent'=>0,'subject'=>$e['Mail']['subject'],'message'=>$e['Mail']['message'],'date'=>$e['Mail']['date'])));
        
        
            $reply_arr2 = $count->find('all',array('conditions'=>array('parent'=>$e['Mail']['id'])));
        
        $reply = array();
            if($reply_arr)
            {
                
                
                foreach($reply_arr as $ras)
                {
                    $ra=$ras['Mail']['recipients_id'];
                
                    if($this->Session->read('admin')){
                    if($ra!=$e['Mail']['sender_id']){  
                    if(!in_array($ra,$reply))    
                    $reply[] = $ra;
                    }
                    }
                    else
                    {
                        if($ra!=$e['Mail']['sender_id'])
                        {
                            if(!in_array($ra,$reply))
                            $reply[] = $ra;
                            
                        }
                    }
                    
                }
                unset($reply_arr);
                
                
            }
            if($reply_arr2)
            {
                foreach($reply_arr2 as $ras)
                {
                    $ra=$ras['Mail']['recipients_id'];
                    if($ra!=$e['Mail']['sender_id']){
                    if($ra != 0){
                    if(!in_array($ra,$reply))
                    $reply[] = $ra;
                    
                    }
                    else
                    {
                        if( $ra!=$e['Mail']['sender_id'])
                        {
                            if(!in_array($ra,$reply))
                            $reply[] = $ra;
                            
                        }
                    }
                }
            }
            unset($reply_arr2);
            }
        if($reply)
        {
            $z=0;
            foreach($reply as $r)
            {
                $z++;
                if($z!=1)
                {
                    echo ', ';
                }
                if($r == 0)echo 'Admin';else{$get = $mems->find('first',array('conditions'=>array('id'=>$r)));if($get)echo "<a href='".$base_url."mail/read/".$e['Mail']['id']."'>".$get['Member']['full_name']."</a>";  }
                      
            }
        }*/
        $z=0;
        foreach($allto as $re)
            {
                $r = $re['Lastsender']['first'];
                $z++;
                if($z!=1)
                {
                    echo ', ';
                }
                if($r == 0)echo 'Admin';else{$get = $mems->find('first',array('conditions'=>array('id'=>$r)));if($get)echo "<a href='".$base_url."mail/read/".$e['Mail']['id']."'>".$get['Member']['full_name']."</a>";  }
                      
            }
        ?>
        
        </td>
        <td><?php echo $this->Html->link($e['Mail']['subject']/*.(($cnt!=0)? "(".$cnt.")" : "")*/,'/mail/read/'.$e['Mail']['id'],array('style'=>'')); ?></td>
        <td><?php echo $e['Mail']['date']; ?></td>
        <td>
		<?php echo $this->Html->link('View','/mail/read/'.$e['Mail']['id'],array('class'=>'btn btn-primary')); ?>
		<?php //echo $this->Html->link('Delete','/mail/delete_mail/reciever/'.$e['Mail']['id'],array('class'=>'btn btn-primary')); ?>
        </td>
    </tr>
        
    <?php  }
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
        echo "No mail received";
    }
 ?>

