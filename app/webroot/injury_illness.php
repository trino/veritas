
<td colspan="3" class="loss_p" style="padding: 0;">

    <table style="border-bottom: 1px solid #DDD;">
        <thead>
            <tr>
                <th colspan="2">CHECKLIST</th>                
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
                     <tr><td style="width: 15px;"><input <?php if($check1==1){?>checked="checked"<?php }?> type="checkbox" value="1" name="check1" style="margin-top:0;" /></td><td>Confirm employee received prompt medical attention</td></tr>     
                     <tr><td style="width: 15px;"><input <?php if($check2==1){?>checked="checked"<?php }?>  type="checkbox" value="1" name="check2" style="margin-top:0;" /></td><td>If employee “refused treatment” have him sign a statement stating such & contact corporate HR & OPS for return to work authorization.</td></tr>
                     <tr><td style="width: 15px;"><input <?php if($check3==1){?>checked="checked"<?php }?>  type="checkbox" value="1" name="check3" style="margin-top:0;" /></td><td>Complete the Injury and Illness Report in entirety</td></tr>
                     <tr><td style="width: 15px;"><input <?php if($check4==1){?>checked="checked"<?php }?>  type="checkbox" value="1" name="check4" style="margin-top:0;" /></td><td>Drug Screen completed by treating facility for any injuries beyond first aid requiring outside medical attention.</td></tr>
                     <tr><td style="width: 15px;"><input <?php if($check5==1){?>checked="checked"<?php }?>  type="checkbox" value="1" name="check5" style="margin-top:0;" /></td><td>Witness Statementscompleted and include name and contact info</td></tr>
                     <tr><td style="width: 15px;"><input <?php if($check6==1){?>checked="checked"<?php }?>  type="checkbox" value="1" name="check6" style="margin-top:0;" /></td><td>Pictures of Accident Scene have been taken</td></tr>
                     <tr><td style="width: 15px;"><input <?php if($check7==1){?>checked="checked"<?php }?>  type="checkbox" value="1" name="check7" style="margin-top:0;" /></td><td>NotifyCorporate HR & Operations by direct email or phone within the first 24 hours.</td></tr>
                     <tr><td style="width: 15px;"><input <?php if($check8==1){?>checked="checked"<?php }?>  type="checkbox" value="1" name="check8" style="margin-top:0;" /></td><td>Within 24 hours hold a tool box meeting with employees to discuss incident and preventive measures</td></tr>
                     
        </tbody>
    </table>
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="2">Employee Information</th>
            </tr>
            
        </thead>
        <tbody>
        
            <tr><td style="width: 200px;">Name</td><td><input type="text" name="emp_name" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_name'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Home Address</td><td><input type="text" name="emp_home" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_home'];}?>" /></td></tr>
            <tr><td style="width: 200px;">City</td><td><input type="text" name="emp_city" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_city'];}?>" /></td></tr>
            <tr><td style="width: 200px;">State</td><td><input type="text" name="emp_state" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_state'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Zip</td><td><input type="text" name="emp_zip" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_zip'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Home Phone</td><td><input type="text" name="emp_home_phone" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_home_phone'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Cell Phone</td><td><input type="text" name="emp_cell_phone" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_cell_phone'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Social Security Number</td><td><input type="text" name="emp_ssn" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_ssn'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Date Of Birth</td><td><input type="text" name="emp_dob" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_dob'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Gender</td><td><input type="text" name="emp_gender" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_gender'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Marital Status</td><td><input type="text" name="emp_marital_status" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_marital_status'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Date Of Hire</td><td><input class="date" type="text" name="emp_doh" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_doh'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Position</td><td><input type="text" name="emp_position" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_position'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Hourly Wage</td><td><input type="text" name="emp_hourly_wage" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_hourly_wage'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Hours Worked Per Shift</td><td><input type="text" name="emp_hwps" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['emp_hwps'];}?>" /></td></tr>
        </tbody>
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="2">Project Information</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td style="width: 200px;">Project Name</td><td><input type="text" name="project_name" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['project_name'];}?>"/></td></tr>
            <tr><td style="width: 200px;">Project Address</td><td><input type="text" name="project_address" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['project_address'];}?>" /></td></tr>
            <tr><td style="width: 200px;">City</td><td><input type="text" name="project_city" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['project_city'];}?>" /></td></tr>
            <tr><td style="width: 200px;">State</td><td><input type="text" name="project_state" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['project_state'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Zip</td><td><input type="text" name="project_zip" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['project_zip'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Hotel where Temporarily House</td><td><input type="text" name="project_hwth" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['project_hwth'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Project Manager Name</td><td><input type="text" name="project_manager_name" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['project_manager_name'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Employees Direct Supervisor Name</td><td><input type="text" name="project_edsn" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['project_edsn'];}?>" /></td></tr>
            
        </tbody>
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="2">Medical Information</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td style="width: 200px;">Hospital/Clinic Name</td><td><input type="text" name="medical_name" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_name'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Hospital/Clinic Address</td><td><input type="text" name="medical_address" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_address'];}?>" /></td></tr>
            <tr><td style="width: 200px;">City</td><td><input type="text" name="medical_city" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_city'];}?>" /></td></tr>
            <tr><td style="width: 200px;">State</td><td><input type="text" name="medical_state" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_state'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Zip</td><td><input type="text" name="medical_zip" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_zip'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Phone Number</td><td><input type="text" name="medical_phone" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_phone'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Treating Physician Name</td><td><input type="text" name="medical_physician" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_physician'];}?>" /></td></tr>
            <tr><td style="width: 200px;">First Day Of Treatment</td><td><input type="text" name="medical_fdot" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_fdot'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Length Of Stay</td><td><input type="text" name="medical_los" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_los'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Did They Go By Ambulance</td><td><input type="text" name="medical_dtgba" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_dtgba'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Initial Medical Diagnosis</td><td><input type="text" name="medical_imd" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_imd'];}?>" /></td></tr>
            
        </tbody>
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="2">Injury Information</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td style="width: 350px;">Date Of Injury</td><td><input type="text" class="date" name="injury_date" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_date'];}?>" /></td></tr>
            <tr><td>Time Of Injury</td><td><input type="text" name="injury_time" class="time" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_time'];}?>" /></td></tr>
            <tr><td>Time Shift Started</td><td><input type="text" class="time" name="injury_tss" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_tss'];}?>" /></td></tr>
            <tr><td>Did This Injury Result In Death</td><td><input type="text" name="injury_dtirin" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_dtirin'];}?>" /></td></tr>
            <tr><td>Where in Facility did Injury Happen</td><td><input type="text" name="injury_wifdih" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wifdih'];}?>" /></td></tr>
            <tr><td>Was the employee doing his/her regular duties</td><td><input type="text" name="injury_wtedhrd" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wtedhrd'];}?>" /></td></tr>
            <tr><td>Who did the employee report the Injury to</td><td><input type="text" name="injury_wdtertit" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wdtertit'];}?>" /></td></tr>
            <tr><td>Length Of Stay</td><td><input type="text" name="injury_wwedatoi" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wwedatoi'];}?>" /></td></tr>
            <tr><td>What was employee doing at time of Injury</td><td><input type="text" name="injury_wdcti" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wdcti'];}?>" /></td></tr>
            <tr><td>How and Why did Injury Occur</td><td><input type="text" name="injury_hawdio" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_hawdio'];}?>" /></td></tr>
            <tr><td>Exact part of body affected</td><td><input type="text" name="injury_epoda" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_epoda'];}?>" /></td></tr>
            <tr><td>Did employee lose consciousness</td><td><input type="text" name="injury_delc" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_delc'];}?>" /></td></tr>
            <tr><td>Was Proper PPE being worn at time of Injury</td><td><input type="text" name="injury_wppbwatoi" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_wppbwatoi'];}?>" /></td></tr>
            <tr><td>Did Employee miss any days of work due to injury</td><td><input type="text" name="injury_demadowdti" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_demadowdti'];}?>" /></td></tr>
            <tr><td>Estimated return to work date</td><td><input class="date" type="text" name="injury_ertwd" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['medical_imd'];}?>" /></td></tr>
            <tr><td>Is the employee on light duty restriction</td><td><input type="text" name="injury_iteoldr" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_iteoldr'];}?>" /></td></tr>
            <tr><td>If so for how long</td><td><input type="text" name="injury_isfhl" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['injury_isfhl'];}?>" /></td></tr>
        </tbody>
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="2">Witness</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td style="width: 200px;">Name</td><td><input type="text" name="witness_name" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_name'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Address</td><td><input type="text" name="witness_address" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_address'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Phone</td><td><input type="text" name="witness_phone" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_phone'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Attach Statement</td><td><a href="javascript:void(0);" class="btn btn-info attach" id="attach1">Browse</a><input type="hidden" id="a1" name="witness_attach_statement" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_attach_statement'];}?>" /><span class="attach1"><?php if(isset($ii)){echo '&nbsp; '.$ii['InjuryIllness']['witness_attach_statement'];}?></span></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td style="width: 200px;">Name</td><td><input type="text" name="witness_name2" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_name2'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Address</td><td><input type="text" name="witness_address2" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_address2'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Phone</td><td><input type="text" name="witness_phone2" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_phone2'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Attach Statement</td><td><a href="javascript:void(0);" class="btn btn-info attach" id="attach2">Browse</a><input type="hidden" id="a2" name="witness_attach_statement2" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['witness_attach_statement2'];}?>" /><span class="attach2"><?php if(isset($ii)){echo '&nbsp; '.$ii['InjuryIllness']['witness_attach_statement2'];}?></span></td></tr>
        </tbody>
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="2">Supporting Documentation</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td style="width: 200px;">Pictures</td><td><a href="javascript:void(0);" class="btn btn-info attach" id="pictures">Browse</a><span class="picture"><?php if(isset($ip)){foreach($ip as $pic){?><span style="display:inline-block;">&nbsp; <img src="<?php echo $this->webroot;?>img/uploads/<?php echo $pic['InjuryPicture']['file'];?>" style="height:100px;"/>&nbsp; </span><input type="hidden" name="picture[]" value="<?php echo $pic['InjuryPicture']['file'];?>" /><?php }}?></span></td></tr>
            <tr><td style="width: 200px;">Medical Forms</td><td><a href="javascript:void(0);" class="btn btn-info attach" id="medical_forms">Browse</a><span class="medical_forms"><?php if(isset($if)){foreach($if as $pic){?><strong>&nbsp; <?php echo $pic['InjuryForm']['file'];?>, </strong><input type="hidden" name="medical_forms[]" value="<?php echo $pic['InjuryForm']['file'];?>" /><?php }}?></span></td></tr>
        </tbody>
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th>Employee Direct Comments</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td><textarea style="width: 300px;height:100px;" name="edc"><?php if(isset($ii)){echo $ii['InjuryIllness']['edc'];}?></textarea></td></tr>
        </tbody>
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th>Additional Comments Of Report Writer</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td><textarea style="width: 300px;height:100px;" name="acorw"><?php if(isset($ii)){echo $ii['InjuryIllness']['acorw'];}?></textarea></td></tr>
        </tbody>
    </table>
    
    <table style="border-bottom: 1px solid #ddd;">
        <thead>
            <tr>
                <th colspan="2">Report Completed By</th>
            </tr>
            
        </thead>
        <tbody>
            <tr><td style="width: 200px;">Report Completed By</td><td><input type="text" name="report_by" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['report_by'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Date</td><td><input type="text" class="date" name="report_date" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['report_date'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Time</td><td><input type="text" class="time" name="report_time" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['report_time'];}?>" /></td></tr>
            <tr><td style="width: 200px;">Contact Number</td><td><input type="text" name="report_contact" value="<?php if(isset($ii)){echo $ii['InjuryIllness']['report_contact'];}?>" /></td></tr>
        </tbody>
    </table>
    <div style="position: relative;padding:5px;">
            <div style="width: 50%;float:left;">
                <strong>SIGNATURE:</strong><br />
                    <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                        
                    </iframe>
            </div>        
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
</td>
<script>
$(function(){
   initiate_ajax_upload1('attach1'); 
initiate_ajax_upload2('attach2');
initiate_ajax_upload3('pictures');
initiate_ajax_upload4('medical_forms');
$('.time').timepicker();
$('.date').datepicker();
});
    function initiate_ajax_upload1(button_id){                
                var button = $('#'+button_id), interval;
                //var id = button_id.replace('uploadimage','');
                new AjaxUpload(button,{
                    action: "<?php echo $this->webroot;?>uploads/attachment_statement1/",                      
                    name: 'myfile',
                    onSubmit : function(file, ext){
                        button.text('Uploading');
                        this.disable();
                        interval = window.setInterval(function(){
                            var text = button.text();
                            if (text.length < 13){
                                button.text(text + '.');					
                            } else {
                                button.text('Uploading');				
                            }
                        }, 200);
                    },
                    onComplete: function(file, response){
                            //alert(response);
                            button.text('Browse');
                            window.clearInterval(interval);
                            this.enable();
                            
                            $(".attach1").html('<strong>&nbsp; '+file+'</strong>');
                            $('#a1').val(response);
                            }                        		
                    });                
            }
            function initiate_ajax_upload2(button_id){                
                var button = $('#'+button_id), interval;
                //var id = button_id.replace('uploadimage','');
                new AjaxUpload(button,{
                    action: "<?php echo $this->webroot;?>uploads/attachment_statement1/",                      
                    name: 'myfile',
                    onSubmit : function(file, ext){
                        button.text('Uploading');
                        this.disable();
                        interval = window.setInterval(function(){
                            var text = button.text();
                            if (text.length < 13){
                                button.text(text + '.');					
                            } else {
                                button.text('Uploading');				
                            }
                        }, 200);
                    },
                    onComplete: function(file, response){
                            //alert(response);
                            button.text('Browse');
                            window.clearInterval(interval);
                            this.enable();
                            
                            $(".attach2").html('&nbsp;<strong> '+file+'</strong>');
                            $('#a2').val(response);
                            }                        		
                    });                
            }
            
            function initiate_ajax_upload3(button_id){                
                var button = $('#'+button_id), interval;
                //var id = button_id.replace('uploadimage','');
                new AjaxUpload(button,{
                    action: "<?php echo $this->webroot;?>uploads/attachment_statement1/",                  
                    name: 'myfile',
                    onSubmit : function(file, ext){
                        button.text('Uploading');
                        this.disable();
                        interval = window.setInterval(function(){
                            var text = button.text();
                            if (text.length < 13){
                                button.text(text + '.');					
                            } else {
                                button.text('Uploading');				
                            }
                        }, 200);
                    },
                    onComplete: function(file, response){
                            //alert(response);
                            button.text('Browse');
                            window.clearInterval(interval);
                            this.enable();
                            
                            $(".picture").append('<span style="display:inline-block;">&nbsp; <img src="<?php echo $this->webroot;?>img/uploads/'+response+'" style="height:100px;"/>&nbsp; </span><input type="hidden" name="picture[]" value="'+response+'" />');
                            
                            }                        		
                    });                
            }
            
            function initiate_ajax_upload4(button_id){                
                var button = $('#'+button_id), interval;
                //var id = button_id.replace('uploadimage','');
                new AjaxUpload(button,{
                    action: "<?php echo $this->webroot;?>uploads/attachment_statement1/",                     
                    name: 'myfile',
                    onSubmit : function(file, ext){
                        button.text('Uploading');
                        this.disable();
                        interval = window.setInterval(function(){
                            var text = button.text();
                            if (text.length < 13){
                                button.text(text + '.');					
                            } else {
                                button.text('Uploading');				
                            }
                        }, 200);
                    },
                    onComplete: function(file, response){
                            //alert(response);
                            button.text('Browse');
                            window.clearInterval(interval);
                            this.enable();                            
                            $(".medical_forms").append('<span style="display:inline-block;">&nbsp <strong>'+file+',</strong></span><input type="hidden" name="medical_forms[]" value="'+response+'" />');
                            }                        		
                    });                
            }
            
</script>