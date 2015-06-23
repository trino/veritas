<?php include_once('inc.php');?>
<style>
#table{border: none!important;}
.table{border-left:1px solid #ddd!important;border-right:1px solid #ddd!important;}
@media print {    
  body * {
    visibility:hidden;
  }
  .printlogo,#table, #table * {
    visibility:visible;
    
  }
  
  #table {
    position:absolute;
    left:0;
    top:0;
    text-align:left;
  }
  .addrow{display:none;}
  .removelast{display:none;}
  
}
</style>

<?php echo $this->Html->script('jquery.prettyPhoto'); ?>

<div id="table" style="padding-bottom: 10px;">

    
    <?php
    $ty = 'report';
    $type ='report';
    
    
    ?>
    <?php
    if($a1)
    {
        ?>
        <h2>Daily activity log</h2>
        
        <?php
    }
    
    if($a1)
    foreach($a1 as $a)
    {
        //var_dump($a);
        //var_dump(;./b nhmj[]$a);die();
        $doc = $a['doc'];
        $activity = $a['act'];
        $asap = $a['asap'];
        $logs = $a['logs'];
        //$logs = array();
        ?>
        
    
    <table class="table">
    <tr><td colspan="2"><p>&nbsp;</p> </td></tr>
    <tr>
        <td>
        <b> <?php echo $this->requestAction('dashboard/translate/Document Type');?></b></td>
        <td><?php echo $type; ?></td>
    </tr>
    <tr>
        <td><b>Description</b></td>
        <td><?php echo $doc['Document']['description']; ?></td>
    </tr>
    
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Job Title');?></b></td>
        <td><?php if($j = $job->findById($id)) echo stripslashes($j['Job']['title']) ; ?></td>
    </tr>
    
    
    
    <?php if($activity){
        //var_dump($activity);
        $r_types = array('','Activity Log','Mobile Inspection','Mobile Security','Security Occurrence','Incident Reports','Sign-off Sheets','Loss Prevention','Static Site Audit','Insurance Site Audit','Site Signin Signout','Instructions And Site Assessment' ,'Personal Inspection','Mobile Inspection', 'Mobile Log', 'Mobile Vehicle Trunk Inventory', 'Vehicle Inspection','Disciplinary Warning','Injury and Illness','Notice of Termination','Uniform Issue - Static and Retail','Payroll','Daily Activity Log','Known Theft-Recovery Map');
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
        <?php }?>
        
         <?php if($activity[0]['Activity']['report_type']=='5'){?>
        <tr >
        <td><strong>Incident Date</strong></td>
        <td><?php echo $doc['Document']['incident_date'];?></td>
        </tr>
        <?php }?>
        <?php if($activity[0]['Activity']['report_type']=='7'){?>
        <tr id="loss_prevention">
         <?php include('loss_prevention.php');?>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='8'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('static_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='9'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('insurance_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        <?php if($activity[0]['Activity']['report_type']=='10'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('site_signin_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='11'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('instruction_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='12'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('personal_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='13'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('mobile_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='14'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('log_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='15'){?>
        <tr id="loss_prevention">
         <?php include('inventory.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='16'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('vehicle_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='17'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('disciplinary_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='18'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('injury_illness_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='19'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('notice_of_termination_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='20'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('uniform_issue_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='21'){?>
        <tr id="loss_prevention">
         <?php include('payroll.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='22'){?>
        <tr id="loss_prevention">
         <?php include('asap.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='23'){?>
        <tr id="loss_prevention">
         <?php include('recovery_view.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']< 7)
        {
            ?>
        
        <tr><td colspan="2" style="padding: 0;">
        <table>
        <thead><th>Date</th><th><?php echo $this->requestAction('dashboard/translate/Time');?></th><th>Description</th></thead>
        <?php foreach($activity as $act)
              {?>
        <tr><td><?php echo $act['Activity']['date'];?></td><td><?php echo $act['Activity']['time'];?></td><td><?php echo $act['Activity']['desc'];?></td></tr>
        
        <?php } ?> 
        </table></td></tr>
        
            <?php
        }
        ?>
    <?php } ?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded By');?></b></td>
        <td><?php if($doc['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$doc['Document']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
    </tr>
    <tr style="border-bottom: 1px solid #DDD;">
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded On');?></b></td>
        <td><?php echo $doc['Document']['date']?></td>
    </tr> 
    
    
    </table>
    <?php
    }
    ?>
    
    
    <?php
    if($a2)
    {
        ?>
        <p>&nbsp;</p>
        <hr />
        <p>&nbsp;</p>
        <h2>Site Signin Sigout</h2>
        
        <?php
    }
    if($a2)
    foreach($a2 as $a)
    {
        $doc = $a['doc'];
        $activity = $a['act'];
        $static = $a['static'];
        ?>
        
    
    <table class="table">
    <tr><td colspan="2"><p>&nbsp;</p> </td></tr>
    <tr>
        <td><b> <?php echo $this->requestAction('dashboard/translate/Document Type');?></b></td>
        <td><?php echo $type; ?></td>
    </tr>
    <tr>
        <td><b>Description</b></td>
        <td><?php echo $doc['Document']['description']; ?></td>
    </tr>
    
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Job Title');?></b></td>
        <td><?php if($j = $job->findById($id)) echo stripslashes($j['Job']['title']) ; ?></td>
    </tr>
    
    
    
    <?php if($activity){
        //var_dump($activity);
        $r_types = array('','Activity Log','Mobile Inspection','Mobile Security','Security Occurrence','Incident Reports','Sign-off Sheets','Loss Prevention','Static Site Audit','Insurance Site Audit','Site Signin Signout','Instructions And Site Assessment' ,'Personal Inspection','Mobile Inspection', 'Mobile Log', 'Mobile Vehicle Trunk Inventory', 'Vehicle Inspection','Disciplinary Warning','Injury and Illness','Notice of Termination','Uniform Issue - Static and Retail','Payroll','Daily Activity Log','Known Theft-Recovery Map');
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
        <?php }?>
        
         <?php if($activity[0]['Activity']['report_type']=='5'){?>
        <tr >
        <td><strong>Incident Date</strong></td>
        <td><?php echo $doc['Document']['incident_date'];?></td>
        </tr>
        <?php }?>
        <?php if($activity[0]['Activity']['report_type']=='7'){?>
        <tr id="loss_prevention">
         <?php include('loss_prevention.php');?>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='8'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('static_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='9'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('insurance_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        <?php if($activity[0]['Activity']['report_type']=='10'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('site_signin_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='11'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('instruction_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='12'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('personal_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='13'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('mobile_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='14'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('log_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='15'){?>
        <tr id="loss_prevention">
         <?php include('inventory.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='16'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('vehicle_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='17'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('disciplinary_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='18'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('injury_illness_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='19'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('notice_of_termination_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='20'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('uniform_issue_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='21'){?>
        <tr id="loss_prevention">
         <?php include('payroll.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='22'){?>
        <tr id="loss_prevention">
         <?php include('asap.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='23'){?>
        <tr id="loss_prevention">
         <?php include('recovery_view.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']< 7)
        {
            ?>
        
        <tr><td colspan="2" style="padding: 0;">
        <table>
        <thead><th>Date</th><th><?php echo $this->requestAction('dashboard/translate/Time');?></th><th>Description</th></thead>
        <?php foreach($activity as $act)
              {?>
        <tr><td><?php echo $act['Activity']['date'];?></td><td><?php echo $act['Activity']['time'];?></td><td><?php echo $act['Activity']['desc'];?></td></tr>
        
        <?php } ?> 
        </table></td></tr>
        
            <?php
        }
        ?>
    <?php } ?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded By');?></b></td>
        <td><?php if($doc['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$doc['Document']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
    </tr>
    <tr style="border-bottom: 1px solid #DDD;">
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded On');?></b></td>
        <td><?php echo $doc['Document']['date']?></td>
    </tr> 
    
    
    </table>
    <?php
    }
    ?>
    
    
    
    <?php
    if($a4)
    {
        ?>
        <p>&nbsp;</p>
        <hr />
        <p>&nbsp;</p>
        <h2>Security occurance</h2>
        
        <?php
    }
    if($a4)
    foreach($a4 as $a)
    {
        $doc = $a['doc'];
        $activity = $a['act'];
        ?>
        
    
    <table class="table" style="width: 40%;">
    <tr><td colspan="2"><p>&nbsp;</p> </td></tr>
    <tr>
        <td><b> <?php echo $this->requestAction('dashboard/translate/Document Type');?></b></td>
        <td><?php echo $type; ?></td>
    </tr>
    <tr>
        <td><b>Description</b></td>
        <td><?php echo $doc['Document']['description']; ?></td>
    </tr>
    
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Job Title');?></b></td>
        <td><?php if($j = $job->findById($id)) echo stripslashes($j['Job']['title']) ; ?></td>
    </tr>
    
    
    
    <?php if($activity){
        //var_dump($activity);
        $r_types = array('','Activity Log','Mobile Inspection','Mobile Security','Security Occurrence','Incident Reports','Sign-off Sheets','Loss Prevention','Static Site Audit','Insurance Site Audit','Site Signin Signout','Instructions And Site Assessment' ,'Personal Inspection','Mobile Inspection', 'Mobile Log', 'Mobile Vehicle Trunk Inventory', 'Vehicle Inspection','Disciplinary Warning','Injury and Illness','Notice of Termination','Uniform Issue - Static and Retail','Payroll','Daily Activity Log','Known Theft-Recovery Map');
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
        <?php }?>
        
         <?php if($activity[0]['Activity']['report_type']=='5'){?>
        <tr >
        <td><strong>Incident Date</strong></td>
        <td><?php echo $doc['Document']['incident_date'];?></td>
        </tr>
        <?php }?>
        <?php if($activity[0]['Activity']['report_type']=='7'){?>
        <tr id="loss_prevention">
         <?php include('loss_prevention.php');?>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='8'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('static_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='9'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('insurance_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        <?php if($activity[0]['Activity']['report_type']=='10'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('site_signin_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='11'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('instruction_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='12'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('personal_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='13'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('mobile_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='14'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('log_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='15'){?>
        <tr id="loss_prevention">
         <?php include('inventory.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='16'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('vehicle_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='17'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('disciplinary_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='18'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('injury_illness_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='19'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('notice_of_termination_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='20'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('uniform_issue_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='21'){?>
        <tr id="loss_prevention">
         <?php include('payroll.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='22'){?>
        <tr id="loss_prevention">
         <?php include('asap.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='23'){?>
        <tr id="loss_prevention">
         <?php include('recovery_view.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']< 7)
        {
            ?>
        
        <tr><td colspan="2" style="padding: 0;">
        <table style="width: 100%;">
        <tr><td colspan="3"><p>&nbsp;</p></td></tr>
        <thead><th style="text-align: left;">Date</th><th style="text-align: left;"><?php echo $this->requestAction('dashboard/translate/Time');?></th><th style="text-align: left;">Description</th></thead>
        <?php foreach($activity as $act)
              {?>
        <tr><td><?php echo $act['Activity']['date'];?></td><td><?php echo $act['Activity']['time'];?></td><td><?php echo $act['Activity']['desc'];?></td></tr>
        
        <?php } ?> 
        <tr><td colspan="3"><p>&nbsp;</p></td></tr>
        </table></td></tr>
        
            <?php
        }
        ?>
    <?php } ?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded By');?></b></td>
        <td><?php if($doc['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$doc['Document']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
    </tr>
    <tr style="border-bottom: 1px solid #DDD;">
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded On');?></b></td>
        <td><?php echo $doc['Document']['date']?></td>
    </tr> 
    
    
    </table>
    <?php
    }
    ?>
    
    
    <?php
    if($a5)
    {
        ?>
        <p>&nbsp;</p>
        <hr />
        <p>&nbsp;</p>
        <h2>Incident Reports</h2>
               
        <?php
    }
    if($a5)
    foreach($a5 as $a)
    {
        $doc = $a['doc'];
        $activity = $a['act'];
        ?>
        
    
    <table class="table" style="width: 40%;">
    <tr><td colspan="2"><p>&nbsp;</p> </td></tr>
    <tr>
        <td><b> <?php echo $this->requestAction('dashboard/translate/Document Type');?></b></td>
        <td><?php echo $type; ?></td>
    </tr>
    <tr>
        <td><b>Description</b></td>
        <td><?php echo $doc['Document']['description']; ?></td>
    </tr>
    
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Job Title');?></b></td>
        <td><?php if($j = $job->findById($id)) echo stripslashes($j['Job']['title']) ; ?></td>
    </tr>
    
    
    
    <?php if($activity){
        //var_dump($activity);
        $r_types = array('','Activity Log','Mobile Inspection','Mobile Security','Security Occurrence','Incident Reports','Sign-off Sheets','Loss Prevention','Static Site Audit','Insurance Site Audit','Site Signin Signout','Instructions And Site Assessment' ,'Personal Inspection','Mobile Inspection', 'Mobile Log', 'Mobile Vehicle Trunk Inventory', 'Vehicle Inspection','Disciplinary Warning','Injury and Illness','Notice of Termination','Uniform Issue - Static and Retail','Payroll','Daily Activity Log','Known Theft-Recovery Map');
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
        <?php }?>
        
         <?php if($activity[0]['Activity']['report_type']=='5'){?>
        <tr >
        <td><strong>Incident Date</strong></td>
        <td><?php echo $doc['Document']['incident_date'];?></td>
        </tr>
        <?php }?>
        <?php if($activity[0]['Activity']['report_type']=='7'){?>
        <tr id="loss_prevention">
         <?php include('loss_prevention.php');?>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='8'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('static_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='9'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('insurance_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        <?php if($activity[0]['Activity']['report_type']=='10'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('site_signin_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='11'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('instruction_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='12'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('personal_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='13'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('mobile_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='14'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('log_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='15'){?>
        <tr id="loss_prevention">
         <?php include('inventory.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='16'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('vehicle_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='17'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('disciplinary_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='18'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('injury_illness_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='19'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('notice_of_termination_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='20'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('uniform_issue_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='21'){?>
        <tr id="loss_prevention">
         <?php include('payroll.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='22'){?>
        <tr id="loss_prevention">
         <?php include('asap.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='23'){?>
        <tr id="loss_prevention">
         <?php include('recovery_view.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']< 7)
        {
            ?>
        
        <tr><td colspan="2" style="padding: 0;">
        <table style="width: 100%;">
        <tr><td colspan="3"><p>&nbsp;</p></td></tr>
        <thead><th style="text-align: left;">Date</th><th style="text-align: left;"><?php echo $this->requestAction('dashboard/translate/Time');?></th><th style="text-align: left;">Description</th></thead>
        <?php foreach($activity as $act)
              {?>
        <tr><td><?php echo $act['Activity']['date'];?></td><td><?php echo $act['Activity']['time'];?></td><td><?php echo $act['Activity']['desc'];?></td></tr>
        
        <?php } ?> 
        <tr><td colspan="3"><p>&nbsp;</p></td></tr>
        </table></td></tr>
        
            <?php
        }
        ?>
    <?php } ?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded By');?></b></td>
        <td><?php if($doc['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$doc['Document']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
    </tr>
    <tr style="border-bottom: 1px solid #DDD;">
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded On');?></b></td>
        <td><?php echo $doc['Document']['date']?></td>
    </tr> 
    
    
    </table>
    <?php
    }
    if($this->params['action']!='download_doc')
    {
        ?>
    <div style="margin-bottom: 15px;">
        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-primary">Print Report</a>
        <a href="<?php echo $this->webroot;?>jobs/download_doc/<?php echo $id;?>" class="btn btn-primary"><?php echo $this->requestAction('dashboard/translate/Word Doc');?></a>
        </div>
        
        <?php
    }
    ?>
</div>