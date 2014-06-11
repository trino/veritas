
    <td colspan="2" style="padding: 0;">
        <table>
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
                <strong class="overall"><?php echo $rate;?>/5</strong><input type="hidden" class="overallr" name="overall_rating" value="<?php echo $rate;?>/5" /></td>
            </tr>
            </tbody>
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
    </td>
    <script>
$('.date_verify').datepicker({dateFormat: 'yy-mm-dd'});
</script>