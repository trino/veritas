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
        if(isset($_GET['from'])&&$_GET['to'])
        {
            echo " <span style='font-size:17px;'>(From : ".$_GET['from']." to ".$_GET['to'].")</span>";
        }
    } 
    else
    {
        echo "All Document Search";
        if(isset($_GET['from'])&&$_GET['to'])
        {
            echo " <span style='font-size:17px;'>(From : ".$_GET['from']." to ".$_GET['to'].")</span>";
        }
    }
    }
    else
    {
        if(isset($jobname))
        echo $jobname.'/';
        $type = ucfirst(str_replace(array('_','intel','News media'),array(' ','Intel','News/Media'),$type));
        echo str_replace('News media','News/Media',$type);
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


<form action="<?php echo $base_url;?>search/special/<?php echo $type;?>" method="get" id="datefilter" style="float: left;margin-right:10px;">
    <input type="text" value="" name="from" placeholder="Start Date" style="width: 100px; margin-top:10px;" class="datepicker required" />
    <input type="text" value="" name="to" placeholder="End Date" style="width: 100px; margin-top: 10px;" class="datepicker required" />
    <input type="hidden" value="<?php if(isset($_GET['search']))echo $_GET['search'];?>" name="search" /> 
    <input type="submit" value="Go" class="btn btn-primary" />
</form>
<?php
if($this->Session->read('admin'))
{
    ?>
    <div style="float: left;margin-top:11px;">
    <?php
    if($u){
        ?>
        <select onchange="if($(this).val()!=''){window.location='<?php echo $base_url;?>search/special/<?php echo $t;?>/?member='+$(this).val();}">
        <option value="">Uploaded By</option>
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
    <option value="">Document type</option>
    <option value="contract">Contract</option>
    <option value="evidence">Evidence</option>
    <option value="template">Template</option>
    <option value="report">Report</option>
    <option value="siteOrder">Site Order</option>
    <option value="training">Training</option>
    <option value="employee">Employee</option>
    <option value="KPIAudits">KPI Audits</option>
    <option value="personal_inspection">Personal Inspection</option>
    <option value="mobile_inspection">Mobile Inspection</option>
    <option value="afimac_intel">AFIMAC Intel</option>
    <option value="vehicle_inspection">Vehicle Inspection</option>
    <option value="news_media">News/Media</option>
  </select>
  <?php
}
?>
</div>
<?php
if(count($doc)>0)
{?>
<div id="table">
<table>
<tr>
    <th><?php echo $this->Paginator->sort('document_type','Document Type');?> </th>
    <th><?php echo $this->Paginator->sort('author','Authour/Source');?></th>
    <th><?php echo $this->Paginator->sort('desc','Description');?></th>
    <th><?php echo $this->Paginator->sort('dop','Publication Date');?></th>
    <th><?php echo $this->Paginator->sort('doc','File');?></th>
    <th>Options</th>
</tr>
<?php foreach($doc as $d)
{?>
<tr>
    <td><?php echo $d['SpecJob']['document_type'];?> </td>
    <td><?php echo $d['SpecJob']['author'];?> </td>
    <td><?php echo $d['SpecJob']['desc'];?> </td>
    <td><?php echo $d['SpecJob']['dop'];?> </td>
    <td><?php echo $d['SpecJob']['doc'];?> </td>
    <td><?php echo $this->Html->link('View','/uploads/view_detail/'.$d['SpecJob']['id'].'/special', array('class'=>'btn btn-primary'));  ?>
            
            <?php if($this->Session->read('admin') || $this->Session->read('id')== $d['SpecJob']['addedBy'] )
            { 
                   //if(($this->Session->read('admin') && $d['Document']['document_type']!='client_feedback')|| $this->Session->read('user')) {
                   if(($this->Session->read('admin') && $d['SpecJob']['document_type']!='client_feedback')) {
                     echo $this->Html->link('Edit','/uploads/special_doc/'.$d['SpecJob']['id'],array('class'=>'btn btn-info'));                 
                    echo " " . $this->Html->link('Delete','/search/delete/'.$d['SpecJob']['id'],array('class'=>'btn btn-danger'),"Confirm Delete Document?");
					}
                    else
                    if(!$this->Session->read('admin'))
                     echo $this->Html->link('Edit','/uploads/special_doc/'.$d['SpecJob']['id'],array('class'=>'btn btn-info'));
                    
            } ?>     </td>
</tr>
<?php }?>
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
} else {echo"No Search Results";}
?>