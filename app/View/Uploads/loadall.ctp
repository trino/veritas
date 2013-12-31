<?php include('inc.php');?>
<style>
.ui-widget-content,.dialog-modals{background:#313A43!important;color:#FFF;}

hr{border-top:#313A43 1px solid;}
.ui-dialog-titlebar{background:#000;color:#EEE;border:1px solid #333;}
.lists div div div{padding: 3px 0;}
.title{color:#BBB;padding:10px 0;}
.ui-dialog-titlebar-close{background:#FFF;}

</style>

<input type="text" value="" class="search" placeholder="Search Documents" style="margin: 0;" /> <a href="javascript:void(0)" class="btn btn-inverse loads" style="color: #fff;">Load</a>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Filter By Job : </strong><?php if($this->Session->read('admin')){
    $jo = $job->find('all');
    if($jo){
        ?>
        <select id="filter">
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
            <select id="filter">
            <option value="">Select Job</option>
            <?php
            foreach($job_array as $j)
            {
                $q2 = $job->find('first',array('conditions'=>array('id'=>trim($j))));
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
<div class="searchlist" style="margin-bottom: 10px;" >
</div>
<button class="close_modal btn btn-inverse">Attach</button>
<script>
$(function(){    
    var arr_id = $('#attachments').val();
    
       var spl = arr_id.split(',');
       var size = spl.length;
       
    $('.doc').each(function(){
       var id = $(this).val();        
       for(var i =0;i<size;i++)
       {
        if(spl[i] == id && !($(this).is(':checked')))
        $(this).click();
        
       }    
       
    });
});
</script>