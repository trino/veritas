
<?php include_once('inc.php');?>
<?php
$ad = $this->requestAction($base_url.'/dashboard/get_user');

        if(!$this->Session->read('admin'))
        {
            ?>
            <div class="title"><b>Administrator</b></div>
            <div class="lists loading" style="width: 300px;">
            <div style="float:right;"><input type="checkbox" class="<?php echo $ad['User']['name_avatar']."__0__".$ad['User']['email']; ?>" /></div>
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
<button class="close_modal" style="background: blue;padding:5px 15px;color:#FFF;border:none;border-radius:5px">Add</button>
<script>
$(function(){
    
    var arr_id = $('#receipient_id').val();
    
       var spl = arr_id.split(',');
       var size = spl.length;
       
    $('.loading input').each(function(){
       var cl = $(this).attr('class');
       var arr = cl.split('__'); 
       var id = arr[1];  
       for(var i =0;i<size;i++)
       {
        if(spl[i] == id && !($(this).is(':checked')))
        $(this).click();
        
       }    
       
    });
});
</script>