<?php include_once('inc.php');?>
<div id="table">

<?php 
  
    $ty = $doc['Document']['document_type'];
    
?>

<table class="table">
    
    <?php $type =ucwords(str_replace('_',' ',$doc['Document']['document_type']));
        if($type == "Deployment Rate")
            $type = "Deployment";
    ?> 
    <tr>
        <td><b> <?php echo $this->requestAction('dashboard/translate/Document Type');?></b></td>
        <td><?php echo $type; ?></td>
    </tr>
       
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Job Title');?></b></td>
        <td><?php if($j = $job->findById($doc['Document']['job_id'])) echo stripslashes($j['Job']['title']) ; ?></td>
    </tr>
    
    
    <?php if($type == 'Report')
    { ?>
    
    
    <?php
     
    if($activity){
        
        
        $r_types = array('','Activity Log','Mobile Inspection','Mobile Security','Security Occurrence','Incident Reports','Sign-off Sheets','Loss Prevention','Static Site Audit','Insurance Site Audit','Site Signin Signout','Instructions And Site Assessment' ,'Personal Inspection','Mobile Inspection', 'Mobile Log', 'Mobile Vehicle Trunk Inventory', 'Vehicle Inspection','Disciplinary Warning','Injury and Illness','Notice of Termination','Uniform Issue - Static and Retail');
        ?>
        <tr>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Report Type');?></strong></td>
        <td><?php echo $r_types[$activity[0]['Activity']['report_type']];?></td>
        </tr>
        <?php if($activity[0]['Activity']['incident_type']!=""){
            ?>
        <tr>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Incident Report Type');?></strong></td>
        <td><?php echo $activity[0]['Activity']['incident_type'];?></td>
        </tr>
        <?php }
        
        
        if($activity[0]['Activity']['report_type']=='20'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('uniform_issue_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']!='8' && $activity[0]['Activity']['report_type']!='9'&& $activity[0]['Activity']['report_type']!='10'&& $activity[0]['Activity']['report_type']!='11'&& $activity[0]['Activity']['report_type']!='12'&& $activity[0]['Activity']['report_type']!='13'&& $activity[0]['Activity']['report_type']!='14'&& $activity[0]['Activity']['report_type']!='15'&& $activity[0]['Activity']['report_type']!='16'&& $activity[0]['Activity']['report_type']!='17'&& $activity[0]['Activity']['report_type']!='18'&& $activity[0]['Activity']['report_type']!='19'&& $activity[0]['Activity']['report_type']!='20')
        {
            ?>
        
        <tr><td colspan="2" style="padding: 0;">
        <table>
        <thead><th>Date</th><th><?php echo $this->requestAction('dashboard/translate/Time');?></th><th>Description</th></thead>
        <?php foreach($activity as $act)
              {?>
        <tr><td><?php echo $act['Activity']['date'];?></td><td><?php echo $act['Activity']['time'];?></td><td><?php echo $act['Activity']['desc'];?></td></tr>
        
        <?php } 
        
        ?> 
        </table></td></tr>
        
            <?php
        }
        ?>
    <?php } ?> 
     
    <?php }
 ?>    
    
    
    
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded By');?></b></td>
        <td><?php if($doc['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$doc['Document']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
    </tr>
    <tr style="border-bottom: 1px solid #DDD;">
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded On');?></b></td>
        <td><?php echo $doc['Document']['date']?></td>
    </tr>
    
    
    
</table>
</div>


<div class="clear"></div>