<?php
//$static = $this->requestAction('/upload/getReportType/'.$did);
//var_dump($static);
if(isset($static) && $static)
{
    $mobile_supervisor = $static['StaticSiteAudit']['mobile_supervisor'];
    $shift = $static['StaticSiteAudit']['shift'];
    $date = $static['StaticSiteAudit']['date'];
    $site = $static['StaticSiteAudit']['site'];
    $time = $static['StaticSiteAudit']['time'];
    $guard_on_duty = $static['StaticSiteAudit']['guard_on_duty'];
    $guard_on_duty = $static['StaticSiteAudit']['guard_on_duty'];
    $final_score = $static['StaticSiteAudit']['final_score'];
    for($i=1;$i<9;$i++)
    {
        $j=$i;
        $score[$i] = $static['StaticSiteAudit']['score'.$j]; 
    }
    $ops = $static['StaticSiteAudit']['ops'];
    $guard_signature = $static['StaticSiteAudit']['guard_signature'];
    $comments = $static['StaticSiteAudit']['comments'];
    $total_score = $static['StaticSiteAudit']['total_score'];
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
        <td><strong><?php echo $this->requestAction("dashboard/translate/Mobile Supervisor")?></strong></td><td><?php echo $mobile_supervisor;?></td><td><strong><?php echo $this->requestAction("dashboard/translate/Shift")?></strong></td><td><?php echo $shift;?></td><td><strong>Date</strong></td><td><?php echo $date;?></td>
        
    </tr>
    <tr>
        <td><strong><?php echo $this->requestAction("dashboard/translate/Site")?> :</strong> <?php echo $site;?></td><td><strong><?php echo $this->requestAction("dashboard/translate/Time");?> : </strong><?php echo $time;?></td><td><strong><?php echo $this->requestAction("dashboard/translate/Guard on duty");?></strong></td><td><?php echo $guard_on_duty;?></td><td><strong>Final score</strong></td><td><?php echo $final_score;?>/10</td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Guard Memo book, up to date, correct format")?></strong><span style="display:block;float:left;"><?php echo $score[1];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[1]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[1]<=0){?>&#10004;<?php }?></td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/All site equipment is in good working order")?></strong><span style="display:block;float:left;"><?php echo $score[2];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[2]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[2]<=0){?>&#10004;<?php }?></td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Guard paperwork, up to date, activity logs, audit logs, etc…")?></strong><span style="display:block;float:left;"><?php echo $score[3];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[3]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[3]<=0){?>&#10004;<?php }?></td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Guard has ASAP guard manual or site specific manual on person")?></strong><span style="display:block;float:left;"><?php echo $score[4];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[4]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[4]<=0){?>&#10004;<?php }?></td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Guard aware of SOP, fully understands post orders")?></strong><span style="display:block;float:left;"><?php echo $score[5];?>/2</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[5]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[5]<=0){?>&#10004;<?php }?></td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Site secure, all doors, windows, showcases, locks, security devices")?></strong><span style="display:block;float:left;"><?php echo $score[6];?>/2</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[6]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[6]<=0){?>&#10004;<?php }?></td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Guard positioned in correct location")?></strong><span style="display:block;float:left;"><?php echo $score[7];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[7]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[7]<=0){?>&#10004;<?php }?></td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Ensure safety of workplace, check site fully for all hazards")?></strong><span style="display:block;float:left;"><?php echo $score[8];?>/1</span><div class="clear"></div></td><td><strong>Y</strong> <?php if($score[8]>0){?>&#10004;<?php }?> &nbsp; <strong>N</strong> <?php if($score[8]<=0){?>&#10004;<?php }?></td>
    </tr>
    <tr>
        <td colspan="3"><strong><?php echo $this->requestAction("dashboard/translate/Ops Manager Advised Via");?> : </strong><?php echo $ops;?></td>
        <td colspan="3"><strong><?php echo $this->requestAction("dashboard/translate/Guard signature");?> : </strong><?php echo $guard_signature;?></td>
    </tr>
    <tr>
        <td colspan="6">
            <strong><?php echo $this->requestAction("dashboard/translate/Comments")?> :</strong>
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
