
    <table style="border-bottom: 1px solid #DDD;">
        <thead>
            <tr>
                <th colspan="2">Checklist</th>                
            </tr>            
        </thead>
        <tbody>
        <?php
        if(isset($ii))
        {
            $ch = $ii['InjuryIllness'];
            $check1 = $ch['check1'];
            $check2 = $ch['check2'];
            $check3 = $ch['check3'];
            $check4 = $ch['check4'];
            $check5 = $ch['check5'];
            $check6 = $ch['check6'];
            $check7 = $ch['check7'];
            $check8 = $ch['check8'];
        }
        else
        {
            $check1 = '';
            $check2 = '';
            $check3 = '';
            $check4 = '';
            $check5 = '';
            $check6 = '';
            $check7 = '';
            $check8 = '';
        }
        ?>
                     <tr><td style="width: 15px;"><?php if($check1==1){?>&#10004;<?php }else{?>&times;<?php }?></td><td>Confirm employee received prompt medical attention</td></tr>     
                     <tr><td style="width: 15px;"><?php if($check2==1){?>&#10004;<?php }else{?>&times;<?php }?></td><td>If employee “refused treatment” have him sign a statement stating such & contact corporate HR & OPS for return to work authorization.</td></tr>
                     <tr><td style="width: 15px;"><?php if($check3==1){?>&#10004;<?php }else{?>&times;<?php }?></td><td>Complete the Injury and Illness Report in entirety</td></tr>
                     <tr><td style="width: 15px;"><?php if($check4==1){?>&#10004;<?php }else{?>&times;<?php }?></td><td>Drug Screen completed by treating facility for any injuries beyond first aid requiring outside medical attention.</td></tr>
                     <tr><td style="width: 15px;"><?php if($check5==1){?>&#10004;<?php }else{?>&times;<?php }?></td><td>Witness Statementscompleted and include name and contact info</td></tr>
                     <tr><td style="width: 15px;"><?php if($check6==1){?>&#10004;<?php }else{?>&times;<?php }?></td><td>Pictures of Accident Scene have been taken</td></tr>
                     <tr><td style="width: 15px;"><?php if($check7==1){?>&#10004;<?php }else{?>&times;<?php }?></td><td>NotifyCorporate HR & Operations by direct email or phone within the first 24 hours.</td></tr>
                     <tr><td style="width: 15px;"><?php if($check8==1){?>&#10004;<?php }else{?>&times;<?php }?></td><td>Within 24 hours hold a tool box meeting with employees to discuss incident and preventive measures</td></tr>
                     
        </tbody>
    </table>
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="4">Employee Information</th>
            </tr>
            
        </thead>
        
        
            <tr><td style="">Name</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_name'];}?></td>
                <td style="">Home Address</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_home'];}?></td></tr>
            <tr><td style="">City</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_city'];}?></td>
                <td style="">State</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_state'];}?></td></tr>
            <tr><td style="">Zip</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_zip'];}?></td>
                <td style="">Home Phone</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_home_phone'];}?></td></tr>
            <tr><td style="">Cell Phone</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_cell_phone'];}?></td>
                <td style="">Social Security Number</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_ssn'];}?></td></tr>
            <tr><td style="">Date Of Birth</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_dob'];}?></td>
                <td style="">Gender</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_gender'];}?></td></tr>
            <tr><td style="">Marital Status</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_marital_status'];}?></td>
                <td style="">Date Of Hire</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_doh'];}?></td></tr>
            <tr><td style="">Position</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_position'];}?></td>
                <td style="">Hourly Wage</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_hourly_wage'];}?></td></tr>
            <tr><td style="">Hours Worked Per Shift</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['emp_hwps'];}?></td>
        
            <tr>
                <th colspan="4">Project Information</th>
            </tr>
            
        
            <tr><td style="">Project Name</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['project_name'];}?></td> 
                <td style="">Project Address</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['project_address'];}?></td></tr>
            <tr><td style="">City</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['project_city'];}?></td>    
                <td style="">State</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['project_state'];}?></td></tr>
            <tr><td style="">Zip</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['project_zip'];}?></td>   
                <td style="">Hotel where Temporarily House</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['project_hwth'];}?></td></tr>
            <tr><td style="">Project Manager Name</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['project_manager_name'];}?></td>    
                <td style="">Employees Direct Supervisor Name</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['project_edsn'];}?></td></tr>
            
        
    
            <tr>
                <th colspan="4">Medical Information</th>
            </tr>
            
        
            <tr><td style="">Hospital/Clinic Name</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_name'];}?></td>    
                <td style="">Hospital/Clinic Address</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_address'];}?></td></tr>
            <tr><td style="">City</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_city'];}?></td>
                <td style="">State</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_state'];}?></td></tr>
            <tr><td style="">Zip</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_zip'];}?></td>
                <td style="">Phone Number</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_phone'];}?></td></tr>
            <tr><td style="">Treating Physician Name</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_physician'];}?></td>
                <td style="">First Day Of Treatment</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_fdot'];}?></td></tr>
            <tr><td style="">Length Of Stay</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_los'];}?></td>
                <td style="">Did They Go By Ambulance</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_dtgba'];}?></td></tr>
            <tr><td style="">Initial Medical Diagnosis</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_imd'];}?></td>
            
        
            <tr>
                <th colspan="4">Injury Information</th>
            </tr>
            
       
            <tr><td style="">Date Of Injury</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_date'];}?></td>
                <td>Time Of Injury</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_time'];}?></td></tr>
            <tr><td>Time Shift Started</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_tss'];}?></td>
                <td>Did This Injury Result In Death</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_dtirin'];}?></td></tr>
            <tr><td>Where in Facility did Injury Happen</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wifdih'];}?></td>
                <td>Was the employee doing his/her regular duties</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wtedhrd'];}?></td></tr>
            <tr><td>Who did the employee report the Injury to</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wdtertit'];}?></td>
                <td>Length Of Stay</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wwedatoi'];}?></td></tr>
            <tr><td>What was employee doing at time of Injury</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wdcti'];}?></td>
                <td>How and Why did Injury Occur</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_hawdio'];}?></td></tr>
            <tr><td>Exact part of body affected</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_epoda'];}?></td>
                <td>Did employee lose consciousness</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_delc'];}?></td></tr>
            <tr><td>Was Proper PPE being worn at time of Injury</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wppbwatoi'];}?></td>
                <td>Did Employee miss any days of work due to injury</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_demadowdti'];}?></td></tr>
            <tr><td>Estimated return to work date</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['medical_imd'];}?></td>
                <td>Is the employee on light duty restriction</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_iteoldr'];}?></td></tr>
            <tr><td>If so for how long</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['injury_isfhl'];}?></td></tr>
        
            <tr>
                <th colspan="4">Witness</th>
            </tr>
            
        
            <tr><td style="">Name</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['witness_name'];}?></td>
                <td style="">Name</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['witness_name2'];}?></td></tr>
            <tr><td style="">Address</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['witness_address'];}?></td>
                <td style="">Address</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['witness_address2'];}?></td></tr>
            <tr><td style="">Phone</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['witness_phone2'];}?></td>
                <td style="">Phone</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['witness_phone'];}?></td></tr>
             <tr>   
                <td style="">Attach Statement</td>
                <td><?php if(isset($ii)){echo $ii['InjuryIllness']['witness_attach_statement2'];}?></td>
                <td style="">Attach Statement</td>
                <td><?php if(isset($ii)){echo $ii['InjuryIllness']['witness_attach_statement'];}?></td>
             </tr>
                
                <!--<a href="javascript:void(0);" class="btn btn-info attach" id="attach1">Browse</a><input type="hidden" id="a1" name="witness_attach_statement" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_attach_statement'];}?>" /><span class="attach1"><?php if(isset($ii)){echo '&nbsp; '.$ii['InjuryIllness']['witness_attach_statement'];}?></span></td></tr>-->
            <tr><td colspan="2"></td></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <!--<tr>
                <a href="javascript:void(0);" class="btn btn-info attach" id="attach2">Browse</a><input type="hidden" id="a2" name="witness_attach_statement2" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_attach_statement2'];}?>" /><span class="attach2"><?php if(isset($ii)){echo '&nbsp; '.$ii['InjuryIllness']['witness_attach_statement2'];}?></span></td></tr>-->
        
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="4">Supporting Documentation</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td style="width:200px;">Pictures</td><td><span class="picture"><?php if(isset($ip)){foreach($ip as $pic){?><span style="display:inline-block;">&nbsp; <a href="<?php echo $this->webroot;?>img/uploads/<?php echo $pic['InjuryPicture']['file'];?>" target="_blank"><img src="<?php echo $this->webroot;?>img/uploads/<?php echo $pic['InjuryPicture']['file'];?>" style="height:100px;"/></a>&nbsp; </span><?php }}?></span></td></tr>
            <tr><td style="">Medical Forms</td><td><span class="medical_forms"><?php if(isset($if)){foreach($if as $pic){?><strong>&nbsp; <a href="<?php echo $this->webroot;?>img/uploads/<?php echo $pic['InjuryForm']['file'];?>" target="_blank"><?php echo $pic['InjuryForm']['file'];?></a>, </strong><?php }}?></span></td></tr>
        </tbody>
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th>Employee Direct Comments</th><th>Additional Comments Of Report Writer</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td><?php if(isset($ii)){echo $ii['InjuryIllness']['edc'];}?></td>
                <td><?php if(isset($ii)){echo $ii['InjuryIllness']['acorw'];}?></td>
            </tr>
        </tbody>
    </table>
    
    
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="4">Report Completed By</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td style="">Report Completed By</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['report_by'];}?></td>
                <td style="">Date</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['report_date'];}?></td></tr>
            <tr><td style="">Time</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['report_time'];}?></td>
                <td style="">Contact Number</td><td><?php if(isset($ii)){echo $ii['InjuryIllness']['report_contact'];}?></td></tr>
        </tbody>
    </table>
    <div style="position: relative;padding:5px;">
                  
            <?php
            
                if(isset($ii) && $ii['InjuryIllness']['signature'])
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $ii['InjuryIllness']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>