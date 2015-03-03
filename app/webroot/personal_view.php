<tr class="personal_more" style="border-bottom:1px solid #ccc;">
    <td colspan="2" style="padding: 0;">
        <table style="border-bottom: 1px solid #ddd;">
            <tr>
                <td colspan="4" style="border-top: none;"><strong><?php echo $this->requestAction('dashboard/translate/Employee Information');?></strong></td>
            </tr>
            <tr>
                <td style="width: 95px;"><?php echo $this->requestAction('dashboard/translate/Name');?> : </td><td><?php echo $perso['Personal_inspection']['emp_name1'];?></td>
                <td style="width: 95px;"><?php echo $this->requestAction('dashboard/translate/Site');?> : </td><td><?php echo $perso['Personal_inspection']['site'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Job Title');?> : </td><td>
                 <?php if(isset($perso) && $perso['Personal_inspection']['jobs_title']){$opt = $perso['Personal_inspection']['jobs_title'];}else $opt="";?>
                 <?php echo ucfirst($opt);?> 
                </td>
                <td><?php echo $this->requestAction('dashboard/translate/Date');?> : </td><td><?php echo $perso['Personal_inspection']['date_submit'];?></td>
            </tr>
            <tr>
            <td colspan="4">
                <table>
                <thead><th colspan="4">General Compliance</th></thead>
                <tr>
                    <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['license']=='1'){?>&#10004;<?php }else echo " ";?> Yes</td>
                    <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['license']=='0'){?>&#10004;<?php }else echo " ";?> No</td>
                    <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['license']=='2'){?>&#10004;<?php }else echo " ";?> N/A</td>
                    <td>Does the employee have a valid security license and proper identification?</td>
                </tr>
                <tr>
                    <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['safe']=='1'){?>&#10004;<?php }else echo " ";?> Yes</td>
                    <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['safe']=='0'){?>&#10004;<?php }else echo " ";?> No</td>
                    <td></td>
                    <td>Is a safe workplace being maintained? *</td>
                </tr>
                </table>
            </td>
            </tr>
            <tbody  class="radios" style="border-top: none;">
            <tr>
                <td colspan="2"><strong><?php echo $this->requestAction('dashboard/translate/Ratings');?></strong></td>
                <td colspan="2">
                    <div style="width: 15%;padding:1%;float:left;"><strong>1 = <?php echo $this->requestAction('dashboard/translate/Poor');?></strong></div>
                    <div style="width: 15%;padding:1%;float:left;"><strong>2 = <?php echo $this->requestAction('dashboard/translate/Fair');?></strong></div>
                    <div style="width: 21%;padding:1%;float:left;"><strong>3 = <?php echo $this->requestAction('dashboard/translate/Satisfactory');?></strong></div>
                    <div style="width: 18%;padding:1%;float:left;"><strong>4 = <?php echo $this->requestAction('dashboard/translate/Good');?></strong></div>
                    <div style="width: 18%;padding:1%;float:left;"><strong>5 = <?php echo $this->requestAction('dashboard/translate/Excellent');?></strong></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $this->requestAction('dashboard/translate/Uniform (neat, clean, pressed, shirt tucked in, etc)');?></td>
                <td colspan="2">
                <?php
                if(isset($perso) && $perso['Personal_inspection']['uniform'])
                {
                    $rate = $perso['Personal_inspection']['uniform'];
                }
                else
                $rate = 1;
                ?>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?> </div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $this->requestAction('dashboard/translate/Uniform Complete for site (black shoes-socks, tie)');?></td>
                <td colspan="2">
                 <?php
                if(isset($perso) && $perso['Personal_inspection']['uniform2'])
                {
                    $rate = $perso['Personal_inspection']['uniform2'];
                }
                else
                $rate = 1;
                ?>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?> </div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $this->requestAction('dashboard/translate/Grooming (hair, clean shaven, good hygiene)');?></td>
                <td colspan="2">
                <?php
                if(isset($perso) && $perso['Personal_inspection']['grooming'])
                {
                    $rate = $perso['Personal_inspection']['grooming'];
                }
                else
                $rate = 1;
                ?>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?> </div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $this->requestAction('dashboard/translate/Proper Equipment (notebook, black pen, paperwork)');?></td>
                <td colspan="2">
                <?php
                if(isset($perso) && $perso['Personal_inspection']['proper_equipment'])
                {
                    $rate = $perso['Personal_inspection']['proper_equipment'];
                }
                else
                $rate = 1;
                ?>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?> </div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $this->requestAction('dashboard/translate/Piercing and Tattoos (nothing visible)');?></td>
                <td colspan="2">
                <?php
                if(isset($perso) && $perso['Personal_inspection']['piercing'])
                {
                    $rate = $perso['Personal_inspection']['piercing'];
                }
                else
                $rate = 1;
                ?>
                   <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?> </div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $this->requestAction('dashboard/translate/Positioning (Properly positioned for the role)');?></td>
                <td colspan="2">
                <?php
                if(isset($perso) && $perso['Personal_inspection']['positioning'])
                {
                    $rate = $perso['Personal_inspection']['positioning'];
                }
                else
                $rate = 1;
                ?>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?> </div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">Cleanliness of Workplace</td>
                <?php
                if(isset($perso) && $perso['Personal_inspection']['cow'])
                {
                    $rate = $perso['Personal_inspection']['cow'];
                }
                else
                $rate = 1;
                ?>
                <td colspan="2">
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>    
            <tr>
                <td colspan="2">Knowledge of site</td>
                <?php
                if(isset($perso) && $perso['Personal_inspection']['kos'])
                {
                    $rate = $perso['Personal_inspection']['kos'];
                }
                else
                $rate = 1;
                ?>
                <td colspan="2">
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>    
            <tr>
                <td colspan="2">Knowledge of Post Orders</td>
                <?php
                if(isset($perso) && $perso['Personal_inspection']['kpo'])
                {
                    $rate = $perso['Personal_inspection']['kpo'];
                }
                else
                $rate = 1;
                ?>
                <td colspan="2">
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>    
            <tr>
                <td colspan="2">Quality of Reports </td>
                <?php
                if(isset($perso) && $perso['Personal_inspection']['qor'])
                {
                    $rate = $perso['Personal_inspection']['qor'];
                }
                else
                $rate = 1;
                ?>
                <td colspan="2">
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>    
            <tr>
                <td colspan="2">Attitude and Demeanor </td>
                   <?php
                if(isset($perso) && $perso['Personal_inspection']['aad'])
                {
                    $rate = $perso['Personal_inspection']['aad'];
                }
                else
                $rate = 1;
                ?>
                <td colspan="2">
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
            </tr>    
            <tr>
                <td colspan="2">Customer Service Skills </td>
                   <?php
                if(isset($perso) && $perso['Personal_inspection']['css'])
                {
                    $rate = $perso['Personal_inspection']['css'];
                }
                else
                $rate = 1;
                ?>
                <td colspan="2">
                    <div style="width: 15%;padding:1%;float:left;"> <?php if($rate==1){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 15%;padding:1%;float:left;"> <?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"> <?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"> <?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"> <?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
                </tr>    
            <tr>
                <td colspan="2">Knowledge of Equipment </td>
                   <?php
                if(isset($perso) && $perso['Personal_inspection']['koe'])
                {
                    $rate = $perso['Personal_inspection']['koe'];
                }
                else
                $rate = 1;
                ?>
                <td colspan="2">
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==1){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 15%;padding:1%;float:left;"><?php if($rate==2){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 21%;padding:1%;float:left;"><?php if($rate==3){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==4){?>&#10004;<?php }else echo " ";?></div>
                    <div style="width: 18%;padding:1%;float:left;"><?php if($rate==5){?>&#10004;<?php }else echo " ";?></div>
                </td>
               
            </tr>
            </tbody>
            <tbody style="border-top: none;">
            <tr>
                <td colspan="2"><strong><?php echo $this->requestAction('dashboard/translate/Overall rating');?></strong></td>
                <td colspan="2">
                <?php
                if(isset($perso) && $perso['Personal_inspection']['overall_rating'])
                {
                    $rate = $perso['Personal_inspection']['overall_rating'];
                }
                else
                $rate = 1;
                ?>
                <strong class="overall"><?php echo $rate;?>/13</strong></td>
                
            </tr>
            <tr>
            <td colspan="4">
            <table>
            <thead><th colspan="2">IQA</th></thead>
            <tr>
                <td>What training/IQA did you conduct with the Security Officer?</td>
                <td><?php if(isset($perso['Personal_inspection']))echo $perso['Personal_inspection']['iqa'];?></td>
                
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td colspan="4">
                <table>
                    <thead>
                        <th colspan="3">Officer Feedback/Input</th>
                    </thead>
                    <tr>
                        <td>Are there any areas of your job function which you do not fully understand?</td>
                        <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['notinterested']=='1'){?>&#10004;<?php }else echo " ";?> Yes</td>
                        <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['notinterested']=='0'){?>&#10004;<?php }else echo " ";?> No</td>
                        
                    </tr>
                    <tr>
                        <td>Do you feel you are in need of any additional training?</td>
                        <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['training']=='1'){?>&#10004;<?php }else echo " ";?> Yes</td>
                        <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['training']=='0'){?>&#10004;<?php }else echo " ";?> No</td>
                        
                    </tr>
                    <tr>
                        <td>So you have any comments, concerns or recommendations? </td>
                        <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['ccr']=='1'){?>&#10004;<?php }else echo " ";?> Yes</td>
                        <td><?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['ccr']=='0'){?>&#10004;<?php }else echo " ";?> No</td>
                        
                    </tr>
                </table>
            </td>
            </tr>
            <tr>
                <td colspan="2"><strong><?php echo $this->requestAction('dashboard/translate/Evaluation');?></strong><br /><?php echo $this->requestAction('dashboard/translate/Additional Comments');?></td>
                <td colspan="2">
                <?php
                if(isset($perso) && $perso['Personal_inspection']['evaluation'])
                {
                    $eval = $perso['Personal_inspection']['evaluation'];
                }
                else
                $eval = '';?>
                <?php echo $eval;?></td>
            </tr>
            <tr>
                <td colspan="4"><strong><?php echo $this->requestAction('dashboard/translate/Verification of review');?></strong></td>
                
            </tr>
            <tr>
                 <?php
                if(isset($perso) && $perso['Personal_inspection']['manager_name'])
                {
                    $mn = $perso['Personal_inspection']['manager_name'];
                }
                else
                $mn = '';
                if(isset($perso) && $perso['Personal_inspection']['date_verify'])
                {
                    $df = $perso['Personal_inspection']['date_verify'];
                }
                else
                $df = '';
                if(isset($perso) && $perso['Personal_inspection']['date_verify2'])
                {
                    $df2 = $perso['Personal_inspection']['date_verify2'];
                }
                else
                    $df2 = '';  
                if(isset($perso) && $perso['Personal_inspection']['emp_name2'])
                {
                    $en2 = $perso['Personal_inspection']['emp_name2'];
                }
                else
                $en2 = '';
                ?>
                <td><?php echo $this->requestAction('dashboard/translate/Supervisor');?>/<?php echo $this->requestAction('dashboard/translate/Manager Name');?> : </td><td><?php echo $mn; ?></td>
                <td><?php echo $this->requestAction('dashboard/translate/Date');?> : </td><td><?php echo $df;?></td>
            </tr>
            <tr>
                
                <td><?php echo $this->requestAction('dashboard/translate/Employee Name');?> : </td><td><?php echo $en2;?></td>
                <td><?php echo $this->requestAction('dashboard/translate/Date');?> : </td><td><?php echo $df2;?></td>
            </tr>
            </tbody>
            
        </table>
        <div style="position: relative;padding:5px;">    
            <?php
            
                if(isset($perso['Personal_inspection']) && $perso['Personal_inspection']['signature'])
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $perso['Personal_inspection']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>
    </td>
    
</tr>