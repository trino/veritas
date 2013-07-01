<?php include_once('inc.php');?>
<script>
$(function(){
   $('#datefilter').validate(); 
});
</script>
<h3 class="page-title">
	<?php
    if(!$type){
    if(isset($_GET['search']) && $_GET['search'])
    {
        echo "Result for : ".$_GET['search'];
    } 
    else
    {
        echo "All Document Search";
    }
    }
    else
    {
        echo ucfirst($type).'s';
    }
    ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>search?search=">Documents Search</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<form action="<?php echo $base_url;?>search" method="get" id="datefilter">
    <input type="text" value="" name="from" placeholder="Start Date" style="width: 100px; margin-top:10px;" class="datepicker required" />
    <input type="text" value="" name="to" placeholder="End Date" style="width: 100px; margin-top: 10px;" class="datepicker required" />
    <input type="hidden" value="<?php if(isset($_GET['search']))echo $_GET['search'];?>" name="search" /> 
    <input type="submit" value="Go" class="btn btn-primary" />
</form>

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
<?php
if((isset($canView) && !isset($noView)) || $this->Session->read('admin'))
{
$uri = $_SERVER['REQUEST_URI'];    
$uri = str_replace(array('/veritas/','veritas/','?order=document_type','&order=document_type','?order=description','&order=description','?order=title','&order=title','?order=addedBy','&order=addedBy','?order=`date`','&order=`date`','?order=%60date%60','&order=%60date%60','&ty=ASC','&ty=DESC'),array('','','','','','','','','',''),$uri);
if(str_replace('search=','',$uri) == $uri)
{
    $or = '?order=';
}
else
$or = '&order=';
?>    
<div id="table">

    <table>
        <tr>
            
            <th><a href="<?php echo str_replace('ca//','ca/',$base_url.$uri.$or).'document_type&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='document_type') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>">Document Type</a><?php //echo $this->Paginator->sort('document_type','Document Type');?></th>
            <th><a href="<?php echo str_replace('ca//','ca/',$base_url.$uri.$or).'description&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='description') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>">Description</a><?php //echo $this->Paginator->sort('description','Description');?></th> 
            <th><a href="<?php echo str_replace('ca//','ca/',$base_url.$uri.$or).'title&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='title') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>">Title</a><?php //echo $this->Paginator->sort('title','Title');?></th>           
            <th width="10%"><a href="<?php echo str_replace('ca//','ca/',$base_url.$uri.$or).'addedBy&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='addedBy') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>">Uploaded By</a><?php //echo $this->Paginator->sort('addedBy','Uploaded By');?></th>
            
            <th><a href="<?php echo str_replace('ca//','ca/',$base_url.$uri.$or).'`date`&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='`date`') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>">Uploaded On</a><?php //echo $this->Paginator->sort('date','Uploaded On');?><!--</a>--></th>
            <th>File</th>
            <th>Option</th>
        </tr>
    <?php
    
    $m=0;
    foreach($docs as $k=>$d)
    {
        $m++;
        
        if($m==1)
        {
            $arr[]=$docs[$k]['Document']['job_id'];   
        ?>
        
        <tr style="background: grey;color:#FFF;"><td colspan="7"><?php if($d['Document']['job_id']=='-1'){ ?><strong>Deleted Job</strong><?php }else{?><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong><?php }?></tr>
        
        <?php
        }
        else
        {
            if(!in_array($docs[$k]['Document']['job_id'],$arr))
            {
                $arr[]=$docs[$k]['Document']['job_id'];
                ?>
                <tr style="background: grey;color:#FFF;"><td colspan="7"><?php if($d['Document']['job_id']=='-1'){ ?><strong>Deleted Job</strong><?php }else{?><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong><?php }?></tr>
                <?php
            }
        }
     
   
       ?>
    
       <tr>
            <td><?php echo $d['Document']['document_type']; if($d['Document']['document_type']=='evidence')echo " (".$d['Document']['evidence_type'].")";elseif($d['Document']['document_type']=='report'){$act = $activity->find('first',array('conditions'=>array('document_id'=>$d['Document']['id'])));if($act){if($act['Activity']['report_type']==1)echo " (Activity Log)";if($act['Activity']['report_type']==2)echo " (Mobile Inspection)";if($act['Activity']['report_type']==3)echo " (Mobile Security)";if($act['Activity']['report_type']==4)echo " (Mobile Occurence)";}} ?></td>
            <!--<td><?php echo $d['Document']['location']; ?></td>-->
            <td><?php echo $d['Document']['description']; ?></td>
            <td><?php echo $d['Document']['title'];?></td>
            <td><?php if($d['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$d['Document']['addedBy'])));if($q){echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";}}else echo "Admin";?></td>
            
            
            <td><?php echo $d['Document']['date'];?></td>
            <td>
            <?php 
            $q = $do->find('first',array('conditions'=>array('document_id'=>$d['Document']['id'])));
            if($q)
            {
                echo "<a href='".$base_url."uploads/view_detail/".$d['Document']['id']."'>".$q['Doc']['doc']."</a>";
            }
            else
            {
               $q2 = $im->find('first',array('conditions'=>array('document_id'=>$d['Document']['id'])));
                if($q2)
                {
                    echo "<a href='".$base_url."uploads/view_detail/".$d['Document']['id']."'>".$q2['Image']['image']."</a>";
                }
                else
                {
                    $q3 = $v->find('first',array('conditions'=>array('document_id'=>$d['Document']['id'])));
                    if($q3)
                    {
                        echo "<a href='".$base_url."uploads/view_detail/".$d['Document']['id']."'>".$q3['Video']['video']."</a>";
                    }
                    
                }   
            }
            ?>
            </td>
            <td><?php echo $this->Html->link('View','/uploads/view_detail/'.$d['Document']['id'], array('class'=>'btn btn-primary'));  ?>
                
            </td>
       </tr> 
    <?php }
    
?>
 </table>

</div>

<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('�', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('�', array('tag' => 'li')); ?>
</ul>
</div>
<?php
}
else
{
    ?>
    <div><strong>You do not have permission to view documents.</strong></div>
    <?php
}

?>
    <?php
} else {echo"No Search Results";}
?>