
    <td colspan="3" style="padding: 0;">
        <table style="border-bottom: 1px sol #ddd;">
            <tr>
                <td colspan="4" style="border-top: none;"><strong><?php echo $this->requestAction('dashboard/translate/Employee Information');?></strong></td>
            </tr>
            <tr>
                <td style="width: 95px;"><?php echo $this->requestAction('dashboard/translate/Name');?> : </td><td><input type="text" name="emp_name1" class="" value="<?php if(isset($perso) && $perso['Personal_inspection']['emp_name1']){echo $perso['Personal_inspection']['emp_name1'];}?>" /></td>
                <td style="width: 95px;"><?php echo $this->requestAction('dashboard/translate/Site');?> : </td><td><input type="text" name="site" class="" value="<?php if(isset($perso) && $perso['Personal_inspection']['site']){echo $perso['Personal_inspection']['site'];}?>" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Job Title');?> : </td><td><select name="jobs_title" class="">
                 <?php if(isset($perso) && $perso['Personal_inspection']['jobs_title']){$opt = $perso['Personal_inspection']['jobs_title'];}else $opt="";?>
                <option value=""><?php echo $this->requestAction('dashboard/translate/Choose Job');?></option>
                <option value="insurance" <?php if($opt == 'insurance'){?>selected="selected"<?php }?> >Insurance</option>
                <option value="static" <?php if($opt == 'static'){?>selected="selected"<?php }?>>Static</option>
                <option value="retail" <?php if($opt == 'retail'){?>selected="selected"<?php }?>>Retail</option>
                <option value="mobile" <?php if($opt == 'mobile'){?>selected="selected"<?php }?>>Mobile</option>
                </select></td>
                <td><?php echo $this->requestAction('dashboard/translate/Date');?> : </td><td><input type="text" name="date_submit" value="<?php if(isset($perso) && $perso['Personal_inspection']['date_submit']){echo $perso['Personal_inspection']['date_submit'];}else{echo date('Y-m-d H:i:s');}?>" readonly="readonly" /></td>
            </tr>
            <tr>
            <td colspan="4">
                <table>
                <thead><th colspan="4">General Compliance</th></thead>
                <tr>
                    <td><input type="radio" name="license" value="1" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['license']=='1')echo "checked='checked'";?> />Yes</td>
                    <td><input type="radio" name="license" value="0" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['license']=='0')echo "checked='checked'";?>/>No</td>
                    <td><input type="radio" name="license" value="2" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['license']=='2')echo "checked='checked'";?>/>N/A</td>
                    <td>Does the employee have a valid security license and proper identification?</td>
                </tr>
                <tr>
                    <td><input type="radio" name="safe" value="1" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['safe']=='1')echo "checked='checked'";?>/>Yes</td>
                    <td><input type="radio" name="safe" value="0" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['safe']=='0')echo "checked='checked'";?>/>No</td>
                    <td></td>
                    <td>Is a safe workplace being maintained? *</td>
                </tr>
                </table>
            </td>
            </tr>
            <tbody  class="radios" style="border-top: 1px solid #d5d5d5;">
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
                <?php
                if(isset($perso) && $perso['Personal_inspection']['kmv'])
                {
                    $rate = $perso['Personal_inspection']['kmv'];
                }
                else
                    $rate = 1;
                ?>
                <td colspan="2">Knowledge of Mission and Values (automatic score of "1" if no card in possession)</td>
                <td colspan="2"><div style="width: 15%;padding:1%;float:left;"><input type="radio" name="kmv" class="uniform" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="kmv" class="uniform" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="kmv" class="uniform" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="kmv" class="uniform" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="kmv" class="uniform" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="uniform" class="uniform" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="uniform" class="uniform" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="uniform" class="uniform" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="uniform" class="uniform" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="uniform" class="uniform" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="uniform2" class="uniform2" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="uniform2" class="uniform2" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="uniform2" class="uniform2" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="uniform2" class="uniform2" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="uniform2" class="uniform2" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="grooming" class="grooming" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="grooming" class="grooming" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="grooming" class="grooming" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="grooming" class="grooming" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="grooming" class="grooming" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="proper_equipment" class="proper_equipment" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="proper_equipment" class="proper_equipment" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="proper_equipment" class="proper_equipment" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="proper_equipment" class="proper_equipment" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="proper_equipment" class="proper_equipment" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="piercing" class="piercing" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="piercing" class="piercing" value="2" <?php if($rate==2){?>checked="checked"<?php }?>  /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="piercing" class="piercing" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="piercing" class="piercing" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="piercing" class="piercing" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="positioning" class="positioning" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="positioning" class="positioning" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="positioning" class="positioning" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="positioning" class="positioning" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="positioning" class="positioning" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="cow" class="positioning" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="cow" class="positioning" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="cow" class="positioning" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="cow" class="positioning" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="cow" class="positioning" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="kos" class="positioning" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="kos" class="positioning" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="kos" class="positioning" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="kos" class="positioning" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="kos" class="positioning" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="kpo" class="positioning" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="kpo" class="positioning" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="kpo" class="positioning" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="kpo" class="positioning" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="kpo" class="positioning" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="qor" class="positioning" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="qor" class="positioning" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="qor" class="positioning" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="qor" class="positioning" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="qor" class="positioning" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="aad" class="positioning" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="aad" class="positioning" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="aad" class="positioning" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="aad" class="positioning" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="aad" class="positioning" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="css" class="positioning" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="css" class="positioning" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="css" class="positioning" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="css" class="positioning" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="css" class="positioning" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
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
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="koe" class="positioning" value="1" <?php if($rate==1){?>checked="checked"<?php }?> /></div>
                    <div style="width: 15%;padding:1%;float:left;"><input type="radio" name="koe" class="positioning" value="2" <?php if($rate==2){?>checked="checked"<?php }?> /></div>
                    <div style="width: 21%;padding:1%;float:left;"><input type="radio" name="koe" class="positioning" value="3" <?php if($rate==3){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="koe" class="positioning" value="4" <?php if($rate==4){?>checked="checked"<?php }?> /></div>
                    <div style="width: 18%;padding:1%;float:left;"><input type="radio" name="koe" class="positioning" value="5" <?php if($rate==5){?>checked="checked"<?php }?> /></div>
                </td>
               
            </tr>
            </tbody>
            <tbody style="border-top: 1px solid #d5d5d5;">
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
                <strong class="overall"><?php echo $rate;?>/12</strong><input type="hidden" class="overallr" name="overall_rating" value="<?php echo $rate;?>/5" /></td>
            </tr>
            </tbody>
            <tr>
            <td colspan="4">
            <table>
            <thead><th colspan="2"><h2>IQA</h2></th></thead>
            <tr>
                <td>What training/IQA did you conduct with the Security Officer?</td>
                <td><input type="text" name="iqa" value="<?php if(isset($perso['Personal_inspection']))echo $perso['Personal_inspection']['iqa'];?>" /></td>
                
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td colspan="4">
                <table>
                    <thead>
                        <th colspan="3"><h2>Officer Feedback/Input</h2></th>
                    </thead>
                    <tr>
                        <td>Are there any areas of your job function which you do not fully understand?</td>
                        <td><input type="radio" name="notinterested" value="1" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['notinterested']=='1')echo "checked='checked'";?>/>Yes</td>
                        <td><input type="radio" name="notinterested" value="0" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['notinterested']=='0')echo "checked='checked'";?>/>No</td>
                        
                    </tr>
                    <tr>
                        <td>Do you feel you are in need of any additional training?</td>
                        <td><input type="radio" name="training" value="1" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['training']=='1')echo "checked='checked'";?>/>Yes</td>
                        <td><input type="radio" name="training" value="0" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['training']=='0')echo "checked='checked'";?>/>No</td>
                        
                    </tr>
                    <tr>
                        <td>So you have any comments, concerns or recommendations? </td>
                        <td><input type="radio" name="ccr" value="1" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['ccr']=='1')echo "checked='checked'";?>/>Yes</td>
                        <td><input type="radio" name="ccr" value="0" <?php if(isset($perso['Personal_inspection']) &&$perso['Personal_inspection']['ccr']=='0')echo "checked='checked'";?>/>No</td>
                        
                    </tr>
                </table>
            </td>
            </tr>
            
            <tbody style="border-top: 1px solid #d5d5d5;">
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
                <textarea name="evaluation" class=""><?php echo $eval;?></textarea></td>
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
                <td><?php echo $this->requestAction('dashboard/translate/Supervisor');?>/<?php echo $this->requestAction('dashboard/translate/Manager Name');?> : </td><td><input type="text" name="manager_name" value="<?php echo $mn; ?>" class="" /></td>
                <td><?php echo $this->requestAction('dashboard/translate/Date');?> : </td><td><input type="text" name="date_verify" value="<?php echo $df;?>" class="date_verify" /></td>
            </tr>
            <tr style="border-bottom: none;">
                <td><?php echo $this->requestAction('dashboard/translate/Employee Name');?> : </td><td><input type="text" name="emp_name2" value="<?php echo $en2;?>" class="" /></td>
                <td><?php echo $this->requestAction('dashboard/translate/Date');?> : </td><td><input type="text" name="date_verify2" value="<?php echo $df2;?>" class="date_verify" /></td>
            </tr>
            </tbody>
          </table>
          <div style="position: relative;padding:5px;">
            <div style="width: 50%;float:left;">
                <strong>SIGNATURE:</strong><br />
                    <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                        
                    </iframe>
            </div>        
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
    <script>
$('.date_verify').datepicker({dateFormat: 'yy-mm-dd'});
 $('.client_more input').each(function(){
        $(this).click();
        $(this).blur();
        });
        var checked = 0.0;
        var radcount = 0;
        $('.radios input').click(function(){
        $('.radios input:checked').each(function(){
            radcount++;
          checked = checked + parseFloat($(this).val());
          if(radcount==15)
          {
            var avg = (checked/30.0)*5;
            avg = avg.toFixed(2); 
            $('.overall').text(avg+'/14');
            $('.overallr').val(avg+'/14');
            checked = 0.0;
            radcount = 0;
          }
       }); });
</script>