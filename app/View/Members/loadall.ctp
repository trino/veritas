<style>
.ui-widget-content,.dialog-modals{background:#313A43!important;color:#FFF;}
hr{border-top:#313A43 1px solid;}
.ui-dialog-titlebar{background:#000;color:#EEE;border:1px solid #333;}
.lists div div div{padding: 3px 0;}
.title{color:#BBB;padding:10px 0;}
.ui-dialog-titlebar-close{background:#FFF;}

</style>
<?php include_once('inc.php');?>
<input type="text" value="" class="search2" placeholder="Search Members" style="margin: 0;" /> <a href="javascript:void(0)" class="btn btn-inverse loads" style="color: #FFF;">Load</a>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Filter By Job : </strong><?php if($this->Session->read('admin')){
    $jo = $job;
    if($jo){
        ?>
        <select id="filter2">
        <option value="">Select Job</option>
        
        <?php
    foreach($jo as $jj)
    {
        ?>
        <option value="<?php echo $jj['Job']['id']?>"><?php echo $jj['Job']['title']?></option>
        <?php
    }
    ?>
    </select>
    <?php
    }
    
    }else{
    $id = $this->Session->read('id');
    $q = $jm->find('first',array('conditions'=>array('member_id'=>$id)));
    if($q)
    {
        $job_array = explode(',',$q['Jobmember']['job_id']);
        if(!empty($job_array))
        {
            ?>
            <select id="filter2">
            <option value="">Select Job</option>
            <?php
            foreach($job_array as $j)
            {
                $q2 = $job_model->find('first',array('conditions'=>array('id'=>trim($j))));
                if($q2)
                {
                    ?>
                    <option value="<?php echo $q2['Job']['id'];?>"><?php echo $q2['Job']['title'];?></option>
                   <?php
                }
            }
            ?>
            </select>
            <?php
    
}}}?>

<ul style="list-style: none;margin:0;background:#e5e5e5;width:210px;padding:5px;display:none;" id="searchlist">
</ul>
<hr />
<?php
$ad = $this->requestAction($base_url.'/dashboard/get_user');

        if(!$this->Session->read('admin'))
        {
            ?>
            <div class="admin" style="display: none;">
            <div class="title"><b>Administrator</b></div>
            <div class="lists loading" style="width: 300px;">
            <div style="float:right;"><input type="checkbox" class="<?php echo $ad['User']['name_avatar']."__0__".$ad['User']['email']; ?>" /></div>
            <div style="float:left">Admin</div>
            <div style="clear:both;"></div>
            </div>
            </div>
            
            <?php
        }
?>
<div class="searchlist">
<!--
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
                $m = $member->find('first',array('conditions'=>array('id'=>$mem['Jobmember']['member_id'])));
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
    
    <?php
    
}

?>
<button class="close_modal btn btn-inverse">Add</button>-->
</div>
<script>
$(function(){
    $('#search_mem').change(function(){
        var term = $(this).val();
        $.ajax({
           url:'<?php echo $base_url;?>search/member',
           data:'term='+term,
           type:'post',
           success:function(res){
            $('.admin').show();
            $('#searchlist').show();
            
           } 
        });
    });
    
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