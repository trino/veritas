<?php
//$static = $this->requestAction('/upload/getReportType/'.$did);
//var_dump($static);
if(isset($static) && $static)
{
    $mobile_supervisor = $static['InsuranceSiteAudit']['mobile_supervisor'];
    $shift = $static['InsuranceSiteAudit']['shift'];
    $date = $static['InsuranceSiteAudit']['date'];
    $site = $static['InsuranceSiteAudit']['site'];
    $time = $static['InsuranceSiteAudit']['time'];
    $guard_on_duty = $static['InsuranceSiteAudit']['guard_on_duty'];
    $guard_on_duty = $static['InsuranceSiteAudit']['guard_on_duty'];
    $final_score = $static['InsuranceSiteAudit']['final_score'];
    for($i=1;$i<9;$i++)
    {
        $j=$i;
        $score[$i] = $static['InsuranceSiteAudit']['score'.$j]; 
    }
    $ops = $static['InsuranceSiteAudit']['ops'];
    $guard_signature = $static['InsuranceSiteAudit']['guard_signature'];
    $comments = $static['InsuranceSiteAudit']['comments'];
    $total_score = $static['InsuranceSiteAudit']['total_score'];
}
else
{
    $mobile_supervisor = '';
    $shift = '';
    $date = '';
    $site = '';
    $time = '';
    $guard_on_duty = '';
    $guard_on_duty = '';
    $final_score = '';
    for($i=1;$i<9;$i++)
    {
        $j=$i;
        $score[$i] = 0; 
    }
    $ops = '';
    $guard_signature = '';
    $comments = '';
    $total_score = '';
}
?>
<tr>
<td colspan="2" style="background: #f5f5f5;padding:0;">
<table class="" style="font-size: 13px;">
    <tr>
        <td><strong><?php echo $this->requestAction("dashboard/translate/Mobile Supervisor");?></strong></td><td><?php echo $mobile_supervisor;?></td>
        <td><strong><?php echo $this->requestAction("dashboard/translate/Shift");?></strong></td><td><?php echo $shift;?></td>
        <td><strong>Date</strong></td><td><?php echo $date;?></td>
        
    </tr>
    <tr>
        <td><strong><?php echo $this->requestAction("dashboard/translate/Site");?> :</strong> <?php echo $site;?></td><td><strong><?php echo $this->requestAction("dashboard/translate/Time");?> : </strong><?php echo $time;?></td>
        <td><strong><?php echo $this->requestAction("dashboard/translate/Guard on duty");?></strong></td><td><?php echo $guard_on_duty;?></td><td><strong>Final score</strong></td><td><?php echo $final_score;?>/10</td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Paperwork up to date");?> </strong><span style="display:block;float:left;"><?php echo $score[1];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[1]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[1]<=0){?>&#10004;<?php }?></td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/communication with office, pictures sent, etc…");?></strong><span style="display:block;float:left;"><?php echo $score[2];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[2]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[2]<=0){?>&#10004;<?php }?></td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Guard positioned");?>/<?php echo $this->requestAction("dashboard/translate/parked in correct position");?></strong><span style="display:block;float:left;"><?php echo $score[3];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[3]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[3]<=0){?>&#10004;<?php }?></td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Supplies");?>?<?php echo $this->requestAction("dashboard/translate/Steel toes, hardhat, seals, paperwork, flashlight");?></strong><span style="display:block;float:left;"><?php echo $score[4];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[4]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[4]<=0){?>&#10004;<?php }?></td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Knowledge of site, guard fully aware of all site instructions, who is allowed on site");?>?</strong><span style="display:block;float:left;"><?php echo $score[5];?>/2</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[5]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[5]<=0){?>&#10004;<?php }?></td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Site secure");?>? <?php echo $this->requestAction("dashboard/translate/One point of access, seals, doors locked and secured, all sides monitored");?></strong><span style="display:block;float:left;"><?php echo $score[6];?>/2</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[6]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[6]<=0){?>&#10004;<?php }?></td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/ASAP guard sign in car window");?></strong><span style="display:block;float:left;"><?php echo $score[7];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[7]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[7]<=0){?>&#10004;<?php }?></td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Personal belongings");?></strong><span style="display:block;float:left;"><?php echo $score[8];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[8]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[8]<=0){?>&#10004;<?php }?></td>
    </tr>
    
    <tr>
        <td colspan="6">
            <strong><?php echo $this->requestAction("dashboard/translate/Comments");?> :</strong>
            <br />
            <?php echo $comments;?>
        </td>
    </tr>
    <tr>
        <td colspan="6"><strong>Total Score :</strong> <?php echo $total_score;?>%</td>
    </tr>
</table>
</td>
</tr>
