<td colspan="3" style="padding: 0;" class="chk">
    <table>
        
        <tr><td>Employee Name</td>
            <td><input type="text" name="termination[name]" value="<?php echo (isset($termination['Noticeoftermination']['name']))?$termination['Noticeoftermination']['name']:'';?>"/></td>
            <td>Hire Date</td>
            <td><input type="text" name="termination[hire_date]" class="activity_date" value="<?php echo (isset($termination['Noticeoftermination']['hire_date']))?$termination['Noticeoftermination']['hire_date']:'';?>"/></td></tr>
        <tr><td>Last Date Actually Worked</td>
            <td><input type="text" name="termination[last_date]" class="activity_date" value="<?php echo (isset($termination['Noticeoftermination']['last_date']))?$termination['Noticeoftermination']['last_date']:'';?>"/></td>
            <td>Termination Date</td>
            <td><input type="text" name="termination[termination_date]" class="activity_date" value="<?php echo (isset($termination['Noticeoftermination']['termination_date']))?$termination['Noticeoftermination']['termination_date']:'';?>"/></td></tr>
        <tr>
            <td>Position</td>
            <td><input type="text" name="termination[position]" value="<?php echo (isset($termination['Noticeoftermination']['position']))?$termination['Noticeoftermination']['position']:'';?>"/></td> 
       
            <td>Project Name</td>
            <td><input type="text" name="termination[project_name]" value="<?php echo (isset($termination['Noticeoftermination']['project_name']))?$termination['Noticeoftermination']['project_name']:'';?>"/></td>
        </tr>
        <tr>
            <td>Project Job Number</td>
            <td><input type="text" name="termination[project_job_no]" value="<?php echo (isset($termination['Noticeoftermination']['project_job_no']))?$termination['Noticeoftermination']['project_job_no']:'';?>"/></td>
       
            <td>Project Location</td>
            <td><input type="text" name="termination[project_location]" value="<?php echo (isset($termination['Noticeoftermination']['project_location']))?$termination['Noticeoftermination']['project_location']:'';?>"/></td>
        </tr>
        <tr>
            <td>Direct Supervisor</td>
            <td><input type="text" name="termination[direct_supervisor]" value="<?php echo (isset($termination['Noticeoftermination']['direct_supervisor']))?$termination['Noticeoftermination']['direct_supervisor']:'';?>"/></td>
       
            <td>Who is Completing this Report</td>
            <td><input type="text" name="termination[who]" value="<?php echo (isset($termination['Noticeoftermination']['who']))?$termination['Noticeoftermination']['who']:'';?>"/></td>
        </tr>
        <tr>
            <td>Date of Report</td>
            <td><input type="text" class="activity_date" name="termination[date_report]" value="<?php echo (isset($termination['Noticeoftermination']['date_report']))?$termination['Noticeoftermination']['date_report']:'';?>"/></td>
       
            <td>Those Present During Termination Meeting</td>
            <td><input type="text" name="termination[present_meeting]" value="<?php echo (isset($termination['Noticeoftermination']['present_meeting']))?$termination['Noticeoftermination']['present_meeting']:'';?>"/></td>
        </tr>
        </table>
        <table>
        <tr>
            <td><strong>Reason for Termination</strong></td>
        </tr>
        <tr><td><input type="checkbox" value="1" name="termination[lack_of_work]" <?php echo (isset($termination['Noticeoftermination']['lack_of_work']) && $termination['Noticeoftermination']['lack_of_work']=='1')?"checked='checked'":'';?> /><strong>&nbsp;Lack of Work/Reduction in Force/Project Ended</strong></td></tr>
        <tr><td><input type="checkbox" value="1"  name="termination[quit]" <?php echo (isset($termination['Noticeoftermination']['quit']) && $termination['Noticeoftermination']['quit']=='1')?"checked='checked'":'';?> />&nbsp;<strong>Quit (check all the applies)</strong>
                       </td></tr>
        <tr><td style="padding: 0;">
                <table >
                    
            <!--<td><input type="checkbox" value="1" onclick="if(this.checked){$(this).parent().children().show('slow');}else{$(this).parent().children(':not(:input,strong)').hide('slow');}" name="termination[quit]" <?php echo (isset($termination['Noticeoftermination']['quit']) && $termination['Noticeoftermination']['quit']=='1')?"checked='checked'":'';?> />&nbsp;<strong>Quit(check all the applies)</strong>
                <table style="display: <?php if(isset($termination['Noticeoftermination']['quit']) && $termination['Noticeoftermination']['quit']=='0')echo 'none';?>">-->
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[no_notice]" <?php echo (isset($termination['Noticeoftermination']['no_notice']) && $termination['Noticeoftermination']['no_notice']=='1')?"checked='checked'":'';?> />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Notice/Reason Given</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[other_work]" <?php echo (isset($termination['Noticeoftermination']['other_work']) && $termination['Noticeoftermination']['other_work']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Accept Other Work</td></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[school_attendance]" <?php echo (isset($termination['Noticeoftermination']['school_attendance']) && $termination['Noticeoftermination']['school_attendance']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Attendence</td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[military_obligation]" <?php echo (isset($termination['Noticeoftermination']['military_obligation']) && $termination['Noticeoftermination']['military_obligation']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Military Obligation</td></tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"  value="1" name="termination[job_dissatisfaction]" <?php echo (isset($termination['Noticeoftermination']['family_emergency']) && $termination['Noticeoftermination']['job_dissatisfaction']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job Dissatisfaction
                        <table >
                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="if(this.checked){$(this).parent().children().show('slow');}else{$(this).parent().children(':not(:input)').hide('slow');}" value="1" name="termination[job_dissatisfaction]" <?php echo (isset($termination['Noticeoftermination']['job_dissatisfaction']) && $termination['Noticeoftermination']['job_dissatisfaction']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job Dissatisfaction
                        <table width="100%" style="display: <?php if(isset($termination['Noticeoftermination']['job_dissatisfaction']) && $termination['Noticeoftermination']['job_dissatisfaction']=='0')echo 'none';?>">-->
                            <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Must Explain&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="termination[explain1]" value="<?php echo (isset($termination['Noticeoftermination']['explain1']) && $termination['Noticeoftermination']['explain1']!='')?$termination['Noticeoftermination']['explain1']:'';?>"/></td></tr>
                        </table>
                    </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"  value="1" name="termination[family_emergency]" <?php echo (isset($termination['Noticeoftermination']['family_emergency']) && $termination['Noticeoftermination']['family_emergency']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Emergency
                        <table >
                        
                    <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="if(this.checked){$(this).parent().children().show('slow');}else{$(this).parent().children(':not(:input)').hide('slow');}" value="1" name="termination[family_emergency]" <?php echo (isset($termination['Noticeoftermination']['family_emergency']) && $termination['Noticeoftermination']['family_emergency']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Emergency
                        <table width="100%" style="display: <?php if(isset($termination['Noticeoftermination']['family_emergency']) && $termination['Noticeoftermination']['family_emergency']=='0')echo 'none';?>">-->
                        <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Must Explain&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="termination[explain2]" value="<?php echo (isset($termination['Noticeoftermination']['explain2']) && $termination['Noticeoftermination']['explain2']!='')?$termination['Noticeoftermination']['explain2']:'';?>"/></td></tr>
                        </table>
                    </td></tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"  value="1" name="termination[illness]" <?php echo (isset($termination['Noticeoftermination']['illness']) && $termination['Noticeoftermination']['illness']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Illness/Injury
                        <table >
                        
                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="if(this.checked){$(this).parent().children().show('slow');}else{$(this).parent().children(':not(:input)').hide('slow');}" value="1" name="termination[illness]" <?php echo (isset($termination['Noticeoftermination']['illness']) && $termination['Noticeoftermination']['illness']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Illness/Injury
                        <table width="100%" style="display: <?php if(isset($termination['Noticeoftermination']['illness']) && $termination['Noticeoftermination']['illness']=='0')echo 'none';?>">-->
                        <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Must Explain&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="termination[explain3]" value="<?php echo (isset($termination['Noticeoftermination']['explain3']) && $termination['Noticeoftermination']['explain3']!='')?$termination['Noticeoftermination']['explain3']:'';?>"/></td></tr>
                        </table>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[other]" <?php echo (isset($termination['Noticeoftermination']['other']) && $termination['Noticeoftermination']['other']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other
                        <table >
                        
                        <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="if(this.checked){$(this).parent().children().show('slow');}else{$(this).parent().children(':not(:input)').hide('slow');}" value="1" name="termination[other]" <?php echo (isset($termination['Noticeoftermination']['other']) && $termination['Noticeoftermination']['other']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other
                        <table style="display: <?php if(isset($termination['Noticeoftermination']['other']) && $termination['Noticeoftermination']['other']=='0')echo 'none';?>">-->
                        <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Must Explain&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="termination[explain4]" value="<?php echo (isset($termination['Noticeoftermination']['explain4']) && $termination['Noticeoftermination']['explain4']!='')?$termination['Noticeoftermination']['explain4']:'';?>"/></td></tr>
                        </table>
                    </td></tr>
                </table>
            </td>
        </tr>
        <tr><td><input type="checkbox" value="1" name="termination[discharged]"  <?php echo (isset($termination['Noticeoftermination']['discharged']) && $termination['Noticeoftermination']['discharged']=='1')?"checked='checked'":'';?>/>&nbsp;<strong>Discharged (check all that applies)</strong>
             </td></tr>
        <tr><td style="padding: 0;">
            <table >
                    
        <!--<td><input type="checkbox" onclick="if(this.checked){$(this).parent().children().show('slow');}else{$(this).parent().children(':not(:input,strong)').hide('slow');}" value="1" name="termination[discharged]"  <?php echo (isset($termination['Noticeoftermination']['discharged']) && $termination['Noticeoftermination']['discharged']=='1')?"checked='checked'":'';?>/>&nbsp;<strong>Discharged (check all that applies)</strong>
                <table style="display: <?php if(isset($termination['Noticeoftermination']['discharged']) && $termination['Noticeoftermination']['discharged']=='0')echo 'none';?>">-->
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[poor_attendence]"  <?php echo (isset($termination['Noticeoftermination']['poor_attendence']) && $termination['Noticeoftermination']['poor_attendence']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Poor Attendance</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[not_qualified]"  <?php echo (isset($termination['Noticeoftermination']['not_qualified']) && $termination['Noticeoftermination']['not_qualified']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not Qualified for Job</td></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[failed_drug]"  <?php echo (isset($termination['Noticeoftermination']['failed_drug']) && $termination['Noticeoftermination']['failed_drug']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Failed Drug Screen</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[insubordination]"  <?php echo (isset($termination['Noticeoftermination']['insubordination']) && $termination['Noticeoftermination']['insubordination']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Insubordination</td></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[violation_of_policy]"  <?php echo (isset($termination['Noticeoftermination']['violation_of_policy']) && $termination['Noticeoftermination']['violation_of_policy']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Violation of Company Policy</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[unsatisfactory]"  <?php echo (isset($termination['Noticeoftermination']['unsatisfactory']) && $termination['Noticeoftermination']['unsatisfactory']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unsatisfactory Performance</td></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[client_request]"  <?php echo (isset($termination['Noticeoftermination']['client_request']) && $termination['Noticeoftermination']['client_request']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Requested Removal</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="termination[other2]"  <?php echo (isset($termination['Noticeoftermination']['other2']) && $termination['Noticeoftermination']['other2']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other
                        <table >
                    <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="if(this.checked){$(this).parent().children().show('slow');}else{$(this).parent().children(':not(:input)').hide('slow');}" value="1" name="termination[other2]"  <?php echo (isset($termination['Noticeoftermination']['other2']) && $termination['Noticeoftermination']['other2']=='1')?"checked='checked'":'';?>/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other
                        <table style="display: <?php if(isset($termination['Noticeoftermination']['other2']) && $termination['Noticeoftermination']['other2']=='0')echo 'none';?>">-->
                        <tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>Must Explain&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="termination[explain5]" value="<?php echo (isset($termination['Noticeoftermination']['explain5']) && $termination['Noticeoftermination']['explain5']!='')?$termination['Noticeoftermination']['explain5']:'';?>"/></td></tr>
                        </table>
                    </td></tr>
                </table>
         </td></tr>
        <tr><td><strong>Provide a Short Narrative on the Reason for Discharge to Include Company Policy Violated:</strong></td></tr>
        <tr><td><textarea name="termination[reason_of_discharge]"><?php echo (isset($termination['Noticeoftermination']['reason_of_discharge']) && $termination['Noticeoftermination']['reason_of_discharge']!='')?$termination['Noticeoftermination']['reason_of_discharge']:'';?></textarea></td></tr>
        
        <tr><td><strong>Any Prior Warnings Related to this Discharge</strong> </td></tr>
        <tr><td><input type="radio" value="1" onclick="$('.yes').show('slow');" name="termination[warnings]"  <?php echo (isset($termination['Noticeoftermination']['warnings']) && $termination['Noticeoftermination']['warnings']=='1')?"checked='checked'":'';?>/>&nbsp;Yes</td></tr>
        <tr><td><input type="radio" value="0" onclick="$('.yes').hide('slow');" name="termination[warnings]"  <?php echo (isset($termination['Noticeoftermination']['warnings']) && $termination['Noticeoftermination']['warnings']=='0')?"checked='checked'":'';?>/>&nbsp;No</td></tr>
        <tr class="yes" ><td>If Yes Explain:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="termination[warning_detail]" value="<?php echo (isset($termination['Noticeoftermination']['warning_detail']) && $termination['Noticeoftermination']['warning_detail']!='')?$termination['Noticeoftermination']['warning_detail']:'';?>"/></td></tr>
        <tr class="yes"><td>Dates of Prior Warnings:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="termination[warning_date]" class="activity_date" value="<?php echo (isset($termination['Noticeoftermination']['warning_date']) && $termination['Noticeoftermination']['warning_date']!='')?$termination['Noticeoftermination']['warning_date']:'';?>"/></td></tr>
        
        <tr><td><strong>Is this Employee Eligible for Rehire</strong></td></tr>
        <tr><td><input type="radio" value="1" name="termination[rehire]"  <?php echo (isset($termination['Noticeoftermination']['rehire']) && $termination['Noticeoftermination']['rehire']=='1')?"checked='checked'":'';?>/>&nbsp;Yes</td></tr>
        <tr><td><input type="radio" value="0" name="termination[rehire]"  <?php echo (isset($termination['Noticeoftermination']['rehire']) && $termination['Noticeoftermination']['rehire']=='0')?"checked='checked'":'';?>/>&nbsp;No</td></tr>
        <tr><td><strong>Employee Comments</strong></td></tr>
        <tr><td><textarea name="termination[comments]"><?php echo(isset($termination['Noticeoftermination']['comments']) && $termination['Noticeoftermination']['comments']!='')?$termination['Noticeoftermination']['comments']:'';?></textarea></td></tr>
        </table>
        <div style="position: relative;padding:5px;">
            <div style="width: 50%;float:left;">
                <strong>SIGNATURE:</strong><br />
                    <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                        
                    </iframe>
            </div>        
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
</td>
<style>
.chk input[type='checkbox']{margin:0px;}
.chk textarea{width:600px; height:100px}
</style>
<script>
$('.activity_date').datepicker({dateFormat: 'yy-mm-dd'});
<?php
if(isset($termination['Noticeoftermination']['warnings']) && $termination['Noticeoftermination']['warnings']=='0')
{?>
$('.yes').hide();
<?php }?>

</script>