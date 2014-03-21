<tr class="personal_more">
    <td colspan="2" style="padding: 0;">
        <table>
            <tr>
                <td colspan="4"><strong>Employee Information</strong></td>
            </tr>
            <tr>
                <td>Name : </td><td><?php echo $perso['Personal_inspection']['emp_name1'];?></td>
                <td>Site : </td><td><?php echo $perso['Personal_inspection']['site'];?></td>
            </tr>
            <tr>
                <td>Job Title : </td><td>
                 <?php if(isset($perso) && $perso['Personal_inspection']['jobs_title']){$opt = $perso['Personal_inspection']['jobs_title'];}else $opt="";?>
                 <?php echo ucfirst($opt);?> 
                </td>
                <td>Date : </td><td><?php echo $perso['Personal_inspection']['date_submit'];?></td>
            </tr>
            <tbody  class="radios">
            <tr>
                <td colspan="2"><strong>Ratings</strong></td>
                <td colspan="2">
                    <div style="width: 15%;padding:1%;float:left;"><strong>1 = Poor</strong></div>
                    <div style="width: 15%;padding:1%;float:left;"><strong>2 = Fair</strong></div>
                    <div style="width: 21%;padding:1%;float:left;"><strong>3 = Satisfactory</strong></div>
                    <div style="width: 18%;padding:1%;float:left;"><strong>4 = Good</strong></div>
                    <div style="width: 18%;padding:1%;float:left;"><strong>5 = Excellent</strong></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">Uniform (neat, clean, pressed, shirt tucked in, etc)</td>
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
                <td colspan="2">Uniform Complete for site (black shoes/socks, tie)</td>
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
                <td colspan="2">Grooming (hair, clean shaven, good hygiene)</td>
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
                <td colspan="2">Proper Equipment (notebook, black pen, paperwork)</td>
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
                <td colspan="2">Piercing and Tattoos (nothing visible)</td>
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
                <td colspan="2">Positioning (Properly positioned for the role)</td>
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
            <tr>
                <td colspan="2"><strong>Overall rating</strong></td>
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
                <td colspan="2"><strong>Evaluation</strong><br />Additional Comments</td>
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
                <td colspan="4"><strong>Verification of review</strong></td>
                
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
                if(isset($perso) && $perso['Personal_inspection']['emp_name2'])
                {
                    $en2 = $perso['Personal_inspection']['emp_name2'];
                }
                else
                $en2 = '';
                ?>
                <td>Supervisor/Manager Name : </td><td><?php echo $mn; ?></td>
                <td>Date : </td><td><?php echo $df;?></td>
            </tr>
            <tr>
                
                <td>Employee Name : </td><td><?php echo $en2;?></td>
                <td></td>
            </tr>
            </tr>
        </table>
    
    </td>
    
</tr>