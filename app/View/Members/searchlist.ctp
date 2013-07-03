<div style="width: 770px;padding:5px;font-size:14px;"><div style="float:left;width:660px;"><div style="float:left;width:130px;"><strong>Full name</strong></div><div style="float:left;margin-left:5px;width:120px;"><strong>User name</strong></div><div style="float:left;margin-left:5px;width:220px;"><strong>Email</strong></div><div style="float: left;width:120px;"><strong>Job</strong></div><div style="clear: both;"></div></div><div style="float:right;width:100px;">Choose</div><div style="clear: both;"></div></div>
<?php     
if($job)
foreach($job as $j)
{
    if($jid)
                    {
                        if($jid!=$j['Job']['id'])
                        continue;
                        
                    }
    ?>
    <div class="lists loading" style="width: 770px;font-size:13px;">
        
        <!--<div class="title"><b style="text-transform: uppercase;"><?php echo $j['Job']['title'];?></b></div>-->
        
        <?php
        $q = $jm->find('all',array('conditions'=>array('OR'=>array(array('job_id LIKE'=>$j['Job']['id'].',%'),array('job_id LIKE'=>'%,'.$j['Job']['id'].',%'),array('job_id LIKE'=>'%,'.$j['Job']['id']),array('job_id'=>$j['Job']['id'])))));        
        if($q)
        {
            ?>
            
            <?php
            foreach($q as $mem)
            {
                if($jid && !$name)
                {
                    $m = $member->find('first',array('conditions'=>array('id'=>$mem['Jobmember']['member_id'])));
                }
                else
                $m = $member->find('first',array('conditions'=>array('id'=>$mem['Jobmember']['member_id'],'OR'=>array(array('full_name LIKE "%'.$name.'%"'),array('fname LIKE "%'.$name.'%"'),array('lname LIKE "%'.$name.'%"'),array('email LIKE "%'.$name.'%"')))));
                if($m){
                
                if(!$this->Session->read('admin')){
                if($this->Session->read('id')!=$m['Member']['id']){    
                echo "<div style='width:770px;'><div style='float:left;width:660px;'><div style='float:left;width:130px;'>&nbsp;".$m['Member']['fname']." ".$m['Member']['lname']."</div><div style='float:left;margin-left:5px;width:120px;'>&nbsp;".$m['Member']['full_name']."</div><div style='float:left;margin-left:5px;width:220px;'>&nbsp;".$m['Member']['email']."</div><div style='width:120px;margin-left:5px;float:left;'>".$j['Job']['title']."</div><div style='clear:both;'></div></div>";
                ?>
                <div style="float: right;width:80px;"><input type="checkbox" class="<?php echo $m['Member']['full_name'].'__'.$m['Member']['id'].'__'.$m['Member']['email'];?>" /></div>
                <div style="clear:both;"></div></div>
                <?php
            }
            }
            else
            {
               echo "<div style='width:770px;'><div style='float:left;width:660px;'><div style='float:left;width:130px;'>&nbsp;".$m['Member']['fname']." ".$m['Member']['lname']."</div><div style='float:left;margin-left:5px;width:120px;'>&nbsp;".$m['Member']['full_name']."</div><div style='float:left;margin-left:5px;width:220px;'>&nbsp;".$m['Member']['email']."</div><div style='width:120px;margin-left:5px;float:left;'>".$j['Job']['title']."</div><div style='clear:both;'></div></div>";
                ?>
                <div style="float: right;width:80px;"><input type="checkbox" class="<?php echo $m['Member']['full_name'].'__'.$m['Member']['id'].'__'.$m['Member']['email'];?>" /></div>
                <div style="clear:both;"></div></div>
                <?php 
            }
            
            }}
        }
        ?>
    </div>
    
    <?php
    
}

?>
<button class="close_modal btn btn-inverse" style="">Add</button>
