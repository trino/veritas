<table style="border-bottom: 1px solid #DDD;">
        <tr><td>
        <table>
        <tr><td style="width: 350px;">Employee Name</td>
            <td><?php echo (isset($termination['Noticeoftermination']['name']))?$termination['Noticeoftermination']['name']:'';?></td></tr>
        <tr><td >Hire Date</td>
            <td><?php echo (isset($termination['Noticeoftermination']['hire_date']))?$termination['Noticeoftermination']['hire_date']:'';?></td></tr>
        <tr><td >Last Date Actually Worked</td>
            <td><?php echo (isset($termination['Noticeoftermination']['last_date']))?$termination['Noticeoftermination']['last_date']:'';?></td></tr>
        <tr><td>Termination Date</td>
            <td><?php echo (isset($termination['Noticeoftermination']['termination_date']))?$termination['Noticeoftermination']['termination_date']:'';?></td></tr>
        <tr>
            <td>Position</td>
            <td><?php echo (isset($termination['Noticeoftermination']['position']))?$termination['Noticeoftermination']['position']:'';?></td> 
        </tr>
        <tr>
            <td>Project Name</td>
            <td><?php echo (isset($termination['Noticeoftermination']['project_name']))?$termination['Noticeoftermination']['project_name']:'';?></td>
        </tr>
        <tr>
            <td>Project Job Number</td>
            <td><?php echo (isset($termination['Noticeoftermination']['project_job_no']))?$termination['Noticeoftermination']['project_job_no']:'';?></td>
        </tr>
        <tr>
            <td>Project Location</td>
            <td><?php echo (isset($termination['Noticeoftermination']['project_location']))?$termination['Noticeoftermination']['project_location']:'';?></td>
        </tr>
        <tr>
            <td>Direct Supervisor</td>
            <td><?php echo (isset($termination['Noticeoftermination']['direct_supervisor']))?$termination['Noticeoftermination']['direct_supervisor']:'';?></td>
        </tr>
        <tr>
            <td>Who is Completing this Report</td>
            <td><?php echo (isset($termination['Noticeoftermination']['who']))?$termination['Noticeoftermination']['who']:'';?></td>
        </tr>
        <tr>
            <td>Date of Report</td>
            <td><?php echo (isset($termination['Noticeoftermination']['date_report']))?$termination['Noticeoftermination']['date_report']:'';?></td>
        </tr>
        <tr>
            <td>Those Present During Termination Meeting</td>
            <td><?php echo (isset($termination['Noticeoftermination']['present_meeting']))?$termination['Noticeoftermination']['present_meeting']:'';?></td>
        </tr>
        </table>
        <table>
        <tr>
            <td><strong>Reason for Termination</strong></td>
        </tr>
        <tr><td><?php echo (isset($termination['Noticeoftermination']['lack_of_work']) && $termination['Noticeoftermination']['lack_of_work']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lack of Work/Reduction in Force/Project Ended</td></tr>
        <tr><td><?php echo (isset($termination['Noticeoftermination']['quit']) && $termination['Noticeoftermination']['quit']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Quit(check all the applies)</strong>
                <table style="display: <?php if(isset($termination['Noticeoftermination']['quit']) && $termination['Noticeoftermination']['quit']=='0')echo 'none';?>">
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['no_notice']) && $termination['Noticeoftermination']['no_notice']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Notice/Reason Given</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['other_work']) && $termination['Noticeoftermination']['other_work']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Accept Other Work</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['school_attendance']) && $termination['Noticeoftermination']['school_attendance']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Attendence</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['military_obligation']) && $termination['Noticeoftermination']['military_obligation']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Military Obligation</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['job_dissatisfaction']) && $termination['Noticeoftermination']['job_dissatisfaction']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job Dissatisfaction</td></tr>
                    <tr style="display: <?php if(isset($termination['Noticeoftermination']['job_dissatisfaction']) && $termination['Noticeoftermination']['job_dissatisfaction']=='0')echo 'none';?>"><td>Must Explain:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (isset($termination['Noticeoftermination']['explain1']) && $termination['Noticeoftermination']['explain1']!='')?$termination['Noticeoftermination']['explain1']:'';?></td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['family_emergency']) && $termination['Noticeoftermination']['family_emergency']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Emergency</td></tr>
                    <tr style="display: <?php if(isset($termination['Noticeoftermination']['family_emergency']) && $termination['Noticeoftermination']['family_emergency']=='0')echo 'none';?>"><td>Must Explain:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (isset($termination['Noticeoftermination']['explain2']) && $termination['Noticeoftermination']['explain2']!='')?$termination['Noticeoftermination']['explain2']:'';?></td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['illness']) && $termination['Noticeoftermination']['illness']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Illness/Injury</td></tr>
                    <tr style="display: <?php if(isset($termination['Noticeoftermination']['illness']) && $termination['Noticeoftermination']['illness']=='0')echo 'none';?>"><td>Must Explain:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (isset($termination['Noticeoftermination']['explain3']) && $termination['Noticeoftermination']['explain3']!='')?$termination['Noticeoftermination']['explain3']:'';?></td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['other']) && $termination['Noticeoftermination']['other']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other</td></tr>
                    <tr style="display: <?php if(isset($termination['Noticeoftermination']['other']) && $termination['Noticeoftermination']['other']=='0')echo 'none';?>"><td>Must Explain:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (isset($termination['Noticeoftermination']['explain4']) && $termination['Noticeoftermination']['explain4']!='')?$termination['Noticeoftermination']['explain4']:'';?></td></tr>
                </table>
            </td>
        </tr>
        <tr><td><?php echo (isset($termination['Noticeoftermination']['discharged']) && $termination['Noticeoftermination']['discharged']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Discharged (check all that applies)</strong>
                <table style="display: <?php if(isset($termination['Noticeoftermination']['discharged']) && $termination['Noticeoftermination']['discharged']=='0')echo 'none';?>">
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['poor_attendence']) && $termination['Noticeoftermination']['poor_attendence']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Poor Attendance</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['not_qualified']) && $termination['Noticeoftermination']['not_qualified']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not Qualified for Job</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['failed_drug']) && $termination['Noticeoftermination']['failed_drug']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Failed Drug Screen</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['insubordination']) && $termination['Noticeoftermination']['insubordination']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Insubordination</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['violation_of_policy']) && $termination['Noticeoftermination']['violation_of_policy']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Violation of Company Policy</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['unsatisfactory']) && $termination['Noticeoftermination']['unsatisfactory']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unsatisfactory Performance</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['client_request']) && $termination['Noticeoftermination']['client_request']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Requested Removal</td></tr>
                    <tr><td><?php echo (isset($termination['Noticeoftermination']['other2']) && $termination['Noticeoftermination']['other2']=='1')?"&#10004":'&times';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other</td></tr>
                    <tr style="display: <?php if(isset($termination['Noticeoftermination']['other2']) && $termination['Noticeoftermination']['other2']=='0')echo 'none';?>"><td>Must Explain:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (isset($termination['Noticeoftermination']['explain5']) && $termination['Noticeoftermination']['explain5']!='')?$termination['Noticeoftermination']['explain5']:'';?></td></tr>
                </table>
            </td>
        </tr>
        <tr><td><strong>Provide a Short Narrative on the Reason for Discharge to Include Company Policy Violated:</strong></td></tr>
        <tr><td><?php echo (isset($termination['Noticeoftermination']['reason_of_discharge']) && $termination['Noticeoftermination']['reason_of_discharge']!='')?$termination['Noticeoftermination']['reason_of_discharge']:'';?></td></tr>
        
        <tr><td><strong>Any Prior Warnings Related to this Discharge</strong> </td></tr>
        <tr><td><?php echo (isset($termination['Noticeoftermination']['warnings']) && $termination['Noticeoftermination']['warnings']=='1')?"&#10004":'';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</td></tr>
        <tr><td><?php echo (isset($termination['Noticeoftermination']['warnings']) && $termination['Noticeoftermination']['warnings']=='0')?"&#10004":'';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</td></tr>
        <tr class="yes"><td>If Yes Explain:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (isset($termination['Noticeoftermination']['warning_detail']) && $termination['Noticeoftermination']['warning_detail']!='')?$termination['Noticeoftermination']['warning_detail']:'';?></td></tr>
        <tr class="yes"><td>Dates of Prior Warnings:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (isset($termination['Noticeoftermination']['warning_date']) && $termination['Noticeoftermination']['warning_date']!='')?$termination['Noticeoftermination']['warning_date']:'';?></td></tr>
        
        <tr><td><strong>Is this Employee Eligible for Rehire</strong></td></tr>
        <tr><td><?php echo (isset($termination['Noticeoftermination']['rehire']) && $termination['Noticeoftermination']['rehire']=='1')?"&#10004":'';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</td></tr>
        <tr><td><?php echo (isset($termination['Noticeoftermination']['rehire']) && $termination['Noticeoftermination']['rehire']=='0')?"&#10004":'';?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</td></tr>
        <tr><td><strong>Employee Comments</strong></td></tr>
        <tr><td><?php echo (isset($termination['Noticeoftermination']['comments']) && $termination['Noticeoftermination']['comments']!='')?$termination['Noticeoftermination']['comments']:'';?></td></tr>
        </table>
</td></tr>
</table>
<div style="position: relative;padding:5px;">
                  
            <?php
            
                if(isset($termination) && $termination['Noticeoftermination']['signature'])
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $termination['Noticeoftermination']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>
<script>
<?php
if(isset($termination['Noticeoftermination']['warnings']) && $termination['Noticeoftermination']['warnings']=='0')
{?>
$('.yes').hide();
<?php }?>

</script>
