<tr class="personal_more" style="border-bottom:1px solid #ccc;">
    <td colspan="2" style="padding: 0;">
        <table>
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
                <strong class="overall"><?php echo $rate;?>/5</strong></td>
                
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
    
    </td>
    
</tr>