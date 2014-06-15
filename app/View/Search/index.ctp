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
        echo $this->requestAction('dashboard/translate/Result for')." : ".$_GET['search'];
        if(isset($_GET['from'])&&$_GET['to'])
        {
            echo " <span style='font-size:17px;'>(".$this->requestAction('dashboard/translate/From')." : ".$_GET['from']." ".$this->requestAction('dashboard/translate/to')." ".$_GET['to'].")</span>";
        }
    } 
    else
    {
        echo $this->requestAction('dashboard/translate/All Document Search');
        if(isset($_GET['from'])&&$_GET['to'])
        {
            echo " <span style='font-size:17px;'>(".$this->requestAction('dashboard/translate/From')." : ".$_GET['from']." ".$this->requestAction('dashboard/translate/to')." ".$_GET['to'].")</span>";
        }
    }
    }
    else
    {
        if(isset($jobname))
        echo $jobname.'/';
        $type = ucfirst(str_replace(array('_','intel','News media'),array(' ','Intel','News/Media'),$type));
        echo str_replace('News media','News/Media',$this->requestAction('dashboard/translate/'.$type));
    }
    ?>
</h3>
<h3 class="" style="font-size: 19px;" ><em><strong><?php echo $count;?></strong> Result<?php if($count>1)echo "s";?></em></h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>search?search=">Documents <?php echo $this->requestAction('dashboard/translate/Search');?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<div><strong><?php echo $this->requestAction('dashboard/translate/Filter By');?></strong></div>
<form action="<?php echo $base_url;?>search" method="get" id="datefilter" style="float: left;margin-right:10px;">
    <input type="text" value="" name="from" placeholder="<?php echo $this->requestAction('dashboard/translate/Start Date');?>" style="width: 100px; margin-top:10px;" class="datepicker required" />
    <input type="text" value="" name="to" placeholder="<?php echo $this->requestAction('dashboard/translate/End Date');?>" style="width: 100px; margin-top: 10px;" class="datepicker required" />
    <input type="hidden" value="<?php if(isset($_GET['search']))echo $_GET['search'];?>" name="search" /> 
    <input type="submit" value="<?php echo $this->requestAction('dashboard/translate/Go');?>" class="btn btn-primary" />
</form>
<?php
if($this->Session->read('admin'))
{
    ?>
    <div style="float: left;margin-top:11px;">
    <?php
    if($u){
        ?>
        <select onchange="if($(this).val()!=''){window.location='<?php echo $base_url;?>search?search=&member='+$(this).val();}">
        <option value=""><?php echo $this->requestAction('dashboard/translate/Uploaded By');?></option>
        <option value="0">Admin</option>
        <?php
        foreach($u as $us)
        {
            
        
  ?>
  <option value="<?php echo $us['Member']['id']?>" <?php if(isset($_GET['member']) && $_GET['member']==$us['Member']['id']){?>selected="selected"<?php }?>><?php echo $us['Member']['full_name']?></option>
  
  <?php 
  }
  ?>
  </select>
  <?php 
  }
  ?>
  <select onchange="if($(this).val()!='afimac_intel' && $(this).val()!='news_media'){window.location='<?php echo $base_url;?>search/index/'+$(this).val();}else{window.location='<?php echo $base_url;?>search/special/'+$(this).val();}">
    <option value=""><?php echo $this->requestAction('dashboard/translate/Document type');?></option>
    <option value="contract"><?php echo $this->requestAction('dashboard/translate/Contract');?></option>
    <option value="evidence"><?php echo $this->requestAction('dashboard/translate/Evidence');?></option>
    <option value="template"><?php echo $this->requestAction('dashboard/translate/Template');?></option>
    <option value="report"><?php echo $this->requestAction('dashboard/translate/Report');?></option>
    <option value="siteOrder"><?php echo $this->requestAction('dashboard/translate/Site Order');?></option>
    <option value="training"><?php echo $this->requestAction('dashboard/translate/Training');?></option>
    <option value="employee"><?php echo $this->requestAction('dashboard/translate/Employee');?></option>
    <option value="KPIAudits"><?php echo $this->requestAction('dashboard/translate/KPI Audits');?></option>
    <option value="personal_inspection"><?php echo $this->requestAction('dashboard/translate/Personal Inspection');?></option>
    <option value="mobile_inspection"><?php echo $this->requestAction('dashboard/translate/Mobile Inspectio');?>n</option>
    <option value="afimac_intel"><?php echo $this->requestAction('dashboard/translate/AFIMAC Intel');?></option>
    <option value="vehicle_inspection"><?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?></option>
    
    <option value="news_media">News/Media</option>
    
    
  </select>
  
  <?php
  if($alljob)
  {
    ?>
    <select onchange="if($(this).val()!=''){window.location='<?php echo $base_url;?>search/?search=&job='+$(this).val();}">
    <option value=""><?php echo $this->requestAction('dashboard/translate/Job');?></option>
        <?php
        foreach($alljob as $aj)
        {
            ?>
            <option value="<?php echo $aj['Job']['id'];?>"><?php echo $aj['Job']['title'];?></option>
            <?php
        }
        ?>
    </select>
    <?php
  }
  ?>
  </div>
  <?php
}
?>

<div class="clear"></div>

<?php
if(isset($noView))
{
    ?>
    <div><strong><?php echo $this->requestAction('dashboard/translate/You do not have permission to view documents.');?></strong></div>
    <?php
}
else
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
if(!isset($sid)){    
    
$uri = $_SERVER['REQUEST_URI'];    
$uri = str_replace(array('/veritas/','veritas/','?order=document_type','&order=document_type','?order=job_title','&order=job_title','?order=description','&order=description','?order=title','&order=title','?order=addedBy','&order=addedBy','?order=incident_date','&order=incident_date','&order=evidence_author','?order=evidence_author','?order=`date`','&order=`date`','?order=%60date%60','&order=%60date%60','&ty=ASC','&ty=DESC'),array('','','','','','','','','','','','','','','',''),$uri);
if(isset($_GET['member']))
{
    $me = $_GET['member'];
    $uri = str_replace('&member='.$me,'',$uri);
}
if(isset($_GET['job']))
{
    $me = $_GET['job'];
    $uri = str_replace('&job='.$me,'',$uri);
}
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
            
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'document_type&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='document_type') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Document Type');?></a><?php //echo $this->Paginator->sort('document_type','Document Type');?></th>
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'job_title&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='job_title') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Job');?></a><?php //echo $this->Paginator->sort('job_title','Document Type');?></th>
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'evidence_author&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='evidence_author') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>">Author</a><?php //echo $this->Paginator->sort('document_type','Document Type');?></th>
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'description&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='description') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Description');?></a><?php //echo $this->Paginator->sort('description','Description');?></th> 
            <!--<th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'title&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='title') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>">Title</a><?php //echo $this->Paginator->sort('title','Title');?></th>-->           
            <th width="10%"><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'addedBy&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='addedBy') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Uploaded By');?></a><?php //echo $this->Paginator->sort('addedBy','Uploaded By');?></th>
            
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'`date`&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='`date`') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Uploaded On');?></a><?php //echo $this->Paginator->sort('date','Uploaded On');?><!--</a>--></th>
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'incident_date&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='incident_date') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Incident Date');?></a><?php //echo $this->Paginator->sort('date','Uploaded On');?><!--</a>--></th>
            <th><?php echo $this->requestAction('dashboard/translate/File');?></th>
            <th style="width: 185px;">Option</th>
        </tr>
    <?php
    
    $m=0;
    foreach($docs as $k=>$d)
    {
        if(strtolower($d['Document']['document_type'])=='client_feedback' && !$this->Session->read('admin'))
        continue ;
        $m++;
        
        /*if($m==1)
        {
            $arr[]=$docs[$k]['Document']['job_id'];   
        ?>
        
        <tr style="background: grey;color:#FFF;"><td colspan="8"><?php if($d['Document']['job_id']=='-1'){ ?><strong>Deleted Job</strong><?php }else{?><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong><?php }?></tr>
        
        <?php
        }
        else
        {
            if(!in_array($docs[$k]['Document']['job_id'],$arr))
            {
                $arr[]=$docs[$k]['Document']['job_id'];
                ?>
                <tr style="background: grey;color:#FFF;"><td colspan="8"><?php if($d['Document']['job_id']=='-1'){ ?><strong>Deleted Job</strong><?php }else{?><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$d['Document']['job_id'])));if($get2)echo $get2['Job']['title']; ?></strong><?php }?></tr>
                <?php
            }
        }*/
     
       
       ?>
            
       <tr>
            <td><?php  if($d['Document']['document_type']=='evidence')echo "Evidence (".$d['Document']['evidence_type'].')';elseif($d['Document']['document_type']=='report'){$act = $activity->find('first',array('conditions'=>array('document_id'=>$d['Document']['id'])));if($act){ echo "Report (";if($act['Activity']['report_type']==1)echo "Activity Log";if($act['Activity']['report_type']==2)echo "Mobile Inspection";if($act['Activity']['report_type']==3)echo "Mobile Security";if($act['Activity']['report_type']==4)echo "Security Occurence";if($act['Activity']['report_type']==5)echo "Incident Report";if($act['Activity']['report_type']==6)echo "Sign Off";if($act['Activity']['report_type']==7)echo "Loss Prevention";if($act['Activity']['report_type']==8)echo "Static Site Audit";if($act['Activity']['report_type']==9)echo "Insurance Site Audit";if($act['Activity']['report_type']==10)echo "Site Sign In/Out";if($act['Activity']['report_type']==11)echo "Instructions And Site Assessment";echo ")";}}else echo $d['Document']['document_type']; ?></td>
            <td><?php echo $d['Document']['job_title'];?></td>
            <td><?php echo $d['Document']['evidence_author'];?></td>
            <!--<td><?php echo $d['Document']['location']; ?></td>-->
            <td><?php if($d['Document']['document_type']!='client_feedback' || $this->Session->read('admin'))echo $d['Document']['description']; ?></td>
            <!--<td><?php echo $d['Document']['title'];?></td>-->
            <td><?php if($d['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$d['Document']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
            
            
            <td><?php if($d['Document']['date']!='0000-00-00')echo $d['Document']['date'];?></td>
            <td><?php if($d['Document']['incident_date']!='0000-00-00')echo $d['Document']['incident_date'];?></td>
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
            <td>
            <?php echo $this->Html->link($this->requestAction('dashboard/translate/View'),'/uploads/view_detail/'.$d['Document']['id'], array('class'=>'btn btn-primary'));  ?>
            
            <?php if($this->Session->read('admin') || $this->Session->read('id')== $d['Document']['addedBy'] )
            { 
                   //if(($this->Session->read('admin') && $d['Document']['document_type']!='client_feedback')|| $this->Session->read('user')) {
                   if(($this->Session->read('admin') && $d['Document']['document_type']!='client_feedback')) {
                     echo $this->Html->link($this->requestAction('dashboard/translate/Edit'),'/uploads/document_edit/'.$d['Document']['id'],array('class'=>'btn btn-info'));                 
                    echo " " . $this->Html->link($this->requestAction('dashboard/translate/Delete'),'/uploads/delete/'.$d['Document']['id'],array('class'=>'btn btn-danger'),$this->requestAction('dashboard/translate/Confirm Delete Document')."?");
					}
                    else
                    if(!$this->Session->read('admin'))
                     echo $this->Html->link($this->requestAction('dashboard/translate/Edit'),'/uploads/document_edit/'.$d['Document']['id'],array('class'=>'btn btn-info'));
                    
            } ?>    
            </td>
       </tr> 
    <?php }
    
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
<?php
}





else
{
        
    
$uri = $_SERVER['REQUEST_URI'];    
$uri = str_replace(array('/veritas/','veritas/','?order=document_type','?order=job_title','&order=job_title','&order=author','?order=dop','&order=`desc`','&order=%60desc%60','?order=doc','&ty=ASC','&ty=DESC'),array('','','','','','','','','','','',''),$uri);
if(isset($_GET['member']))
{
    $me = $_GET['member'];
    $uri = str_replace('&member='.$me,'',$uri);
}
if(isset($_GET['job']))
{
    $me = $_GET['job'];
    $uri = str_replace('&job='.$me,'',$uri);
}
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
            
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'document_type&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='document_type') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Document Type');?></a><?php //echo $this->Paginator->sort('document_type','Document Type');?></th>
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'job_title&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='job_title') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Job');?></a><?php //echo $this->Paginator->sort('document_type','Document Type');?></th>
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'author&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='author') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Author');?></a><?php //echo $this->Paginator->sort('document_type','Document Type');?></th>
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'`desc`&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='`desc`') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/Description');?></a><?php //echo $this->Paginator->sort('description','Description');?></th> 
             <th>Added By</th>          
            <th width="10%"><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'dop&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='dop') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>">Date</a><?php //echo $this->Paginator->sort('addedBy','Uploaded By');?></th>
            
            <th><a href="<?php echo str_replace('com//','com/',$base_url.$uri.$or).'doc&ty=';?><?php echo ((isset($_GET['order']) && $_GET['order']=='doc') && (isset($_GET['ty'])&& $_GET['ty']=='ASC'))? 'DESC':'ASC';?>"><?php echo $this->requestAction('dashboard/translate/File');?></a><?php //echo $this->Paginator->sort('date','Uploaded On');?><!--</a>--></th>
            
            
            <th>Option</th>
        </tr>
    <?php
    
    $m=0;
    foreach($docs as $k=>$d)
    {
        
        $m++;
        
        /*if($m==1)
        {
               
        ?>
        
        <tr style="background: grey;color:#FFF;"><td colspan="8"><strong>Job :</strong><strong><?php $get2 = $jo_bs->find('first',array('conditions'=>array('id'=>$sid)));if($get2)echo $get2['Job']['title']; ?></strong></tr>
        
        <?php
        }
        */
     
       
       ?>
            
       <tr>
            <td><?php echo $d['SpecJob']['document_type'];?></td>
            <td><?php echo $d['SpecJob']['job_title'];?></td>
            <td><?php echo $d['SpecJob']['author'];?></td>
            
            <td><?php echo $d['SpecJob']['desc']; ?></td>
            
            <td><?php if($d['SpecJob']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$d['SpecJob']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
            
            
            <td><?php if($d['SpecJob']['dop']!='0000-00-00')echo $d['SpecJob']['dop'];?></td>
            <td><?php echo $d['SpecJob']['doc'];?></td>
            
            <td>
            <?php echo $this->Html->link($this->requestAction('dashboard/translate/View'),'/uploads/view_detail/'.$d['SpecJob']['id'].'/special', array('class'=>'btn btn-primary'));  ?>
            
            <?php if($this->Session->read('admin') || $this->Session->read('id')== $d['SpecJob']['addedBy'] )
            { 
                   //if(($this->Session->read('admin') && $d['Document']['document_type']!='client_feedback')|| $this->Session->read('user')) {
                   if($this->Session->read('admin')) {
                     echo $this->Html->link($this->requestAction('dashboard/translate/Edit'),'/uploads/special_doc/'.$d['SpecJob']['id'],array('class'=>'btn btn-info'));                 
                    echo " " . $this->Html->link($this->requestAction('dashboard/translate/Delete'),'/search/delete/'.$d['SpecJob']['id'],array('class'=>'btn btn-danger'),$this->requestAction('dashboard/translate/Confirm Delete Document')."?");
					}
                    else
                    if($this->Session->read('id')== $d['SpecJob']['addedBy'])
                    echo $this->Html->link($this->requestAction('dashboard/translate/Edit'),'/uploads/special_doc/'.$d['SpecJob']['id'],array('class'=>'btn btn-info'));
                    
                    
            } ?>    
            </td>
       </tr> 
    <?php }
    
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
<?php
}
}
else
{
    ?>
    <div><strong><?php echo $this->requestAction('dashboard/translate/You do not have permission to view documents.');?></strong></div>
    <?php
}

?>
    <?php
} else {echo $this->requestAction('dashboard/translate/No Search Results');}
?>