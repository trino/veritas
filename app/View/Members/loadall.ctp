
<?php include_once('inc.php');?>
<?php
$ad = $this->requestAction($base_url.'/dashboard/get_user');

        if(!$this->Session->read('admin'))
        {
            ?>
            <div class="title"><b>Administrator</b></div>
            <div class="lists" style="width: 300px;">
            <div style="float:right;"><input type="checkbox" class="contact_check" id="<?php echo $ad['User']['name_avatar']."__0__".$ad['User']['email']; ?>" /></div>
            <div style="float:left">Admin</div>
            <div style="clear:both;"></div>
            </div>
            <hr />
            <?php
        }
        
if($job)
foreach($job as $j)
{
    ?>
    <div class="lists loading" style="width: 300px;">
        
        <div class="title"><b><?php echo $j['Job']['title'];?></b></div>
        <?php
        $q = $jm->find('all',array('conditions'=>array('OR'=>array(array('job_id LIKE'=>$j['Job']['id'].',%'),array('job_id LIKE'=>'%,'.$j['Job']['id'].',%'),array('job_id LIKE'=>'%,'.$j['Job']['id']),array('job_id'=>$j['Job']['id'])))));        
        if($q)
        {
            foreach($q as $mem)
            {
                $m = $member->find('first',array('conditions'=>array('id'=>$mem['Jobmember']['member_id'])));
                if($m){
                if(!$this->Session->read('admin')){
                if($this->Session->read('id')!=$m['Member']['id']){    
                echo "<div><div style='float:left'>".$m['Member']['full_name']."</div>";
                ?>
                <div style="float: right;"><input type="checkbox" class="<?php echo $m['Member']['full_name'].'__'.$m['Member']['id'].'__'.$m['Member']['email'];?>" /></div>
                <div style="clear:both;"></div></div>
                <?php
            }
            }
            else
            {
               echo "<div><div style='float:left'>".$m['Member']['full_name']."</div>";
                ?>
                <div style="float: right;"><input type="checkbox" class="<?php echo $m['Member']['full_name'].'__'.$m['Member']['id'].'__'.$m['Member']['email'];?>" /></div>
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
