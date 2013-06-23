
<?php     
if($job)
foreach($job as $j)
{
    ?>
    <div class="lists loading" style="width: 600px;">
        
        <div class="title"><b style="text-transform: uppercase;"><?php echo $j['Job']['title'];?></b></div>
        <?php
        $q = $jm->find('all',array('conditions'=>array('OR'=>array(array('job_id LIKE'=>$j['Job']['id'].',%'),array('job_id LIKE'=>'%,'.$j['Job']['id'].',%'),array('job_id LIKE'=>'%,'.$j['Job']['id']),array('job_id'=>$j['Job']['id'])))));        
        if($q)
        {
            ?>
            <div><div style="float:left;width:500px;"><div style="float:left;width:120px;"><strong>Full name</strong></div><div style="float:left;margin-left:5px;width:120px;"><strong>User name</strong></div><div style="float:left;margin-left:5px;width:120px;"><strong>Email</strong></div><div style="clear: both;"></div></div><div style="float:right;width:100px;">Choose</div><div style="clear: both;"></div></div>
            <?php
            foreach($q as $mem)
            {
                $m = $member->find('first',array('conditions'=>array('id'=>$mem['Jobmember']['member_id'],'full_name LIKE "%'.$name.'%"')));
                if($m){
                
                if(!$this->Session->read('admin')){
                if($this->Session->read('id')!=$m['Member']['id']){    
                echo "<div style='width:600px;'><div style='float:left;width:500px;'><div style='float:left;width:120px;'>&nbsp;".$m['Member']['fname']." ".$m['Member']['lname']."</div><div style='float:left;margin-left:5px;width:120px;'>&nbsp;".$m['Member']['full_name']."</div><div style='float:left;margin-left:5px;width:120px;'>&nbsp;".$m['Member']['email']."</div><div style='clear:both;'></div></div>";
                ?>
                <div style="float: right;width:100px;"><input type="checkbox" class="<?php echo $m['Member']['full_name'].'__'.$m['Member']['id'].'__'.$m['Member']['email'];?>" /></div>
                <div style="clear:both;"></div></div>
                <?php
            }
            }
            else
            {
               echo "<div style='width:600px;'><div style='float:left;width:500px;'><div style='float:left;width:120px;'>&nbsp;".$m['Member']['fname']." ".$m['Member']['lname']."</div><div style='float:left;margin-left:5px;width:120px;'>&nbsp;".$m['Member']['full_name']."</div><div style='float:left;margin-left:5px;width:120px;'>&nbsp;".$m['Member']['email']."</div><div style='clear:both;'></div></div>";
                ?>
                <div style="float: right;width:100px;"><input type="checkbox" class="<?php echo $m['Member']['full_name'].'__'.$m['Member']['id'].'__'.$m['Member']['email'];?>" /></div>
                <div style="clear:both;"></div></div>
                <?php 
            }
            
            }}
        }
        ?>
    </div>
    <hr />
    <?php
    
}

?>
<button class="close_modal btn btn-inverse" style="">Add</button>
