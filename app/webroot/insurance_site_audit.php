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
<td colspan="3" style="background: #f5f5f5;padding:0;">
<table class="" style="font-size: 13px;">
    <tr>
        <td><strong><?php echo $this->requestAction("dashboard/translate/Mobile Supervisor");?></strong></td>
        <td><input type="text" name="mobile_supervisor" style="width: 145px;" value="<?php echo $mobile_supervisor;?>" /></td>
        <td><strong><?php echo $this->requestAction("dashboard/translate/Shift");?></strong></td><td><input type="text" name="shift" value="<?php echo $shift;?>" /></td>
        <td><strong>Date</strong></td><td><input type="text" name="date" class="datepicker" value="<?php echo $date;?>" /></td>
        
    </tr>
    <tr>
        <td><strong><?php echo $this->requestAction("dashboard/translate/Site");?> :</strong> <input type="text" name="site" style="width: 120px;" value="<?php echo $site;?>" /></td>
        <td><strong><?php echo $this->requestAction("dashboard/translate/Time");?> : </strong><input type="text" name="time" class="timepicker" style="width:100px;" value="<?php echo $time;?>" /></td><td><strong>Guard on duty</strong></td><td><input type="text" name="guard_on_duty" value="<?php echo $guard_on_duty;?>" /></td><td><strong>Final score</strong></td><td><input type="text" name="final_score" class="final_score" readonly="" value="<?php echo $final_score;?>" style="background:#FFF;border:1px solid #fff;width:30px;" />/10</td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Paperwork up to date");?></strong><span style="display:block;float:left;"><input value="<?php echo $score[1];?>" type="text" style="width: 30px;background:#FFF;border:1px solid #fff;" name="score1" class="score1" readonly="" />/1</span><div class="clear"></div></td><td><strong>Y</strong> <input type="radio" class="check" name="check1" value="1" <?php if($score[1]>0){?>checked="checked"<?php }?> /> &nbsp; <strong>N</strong> <input <?php if($score[1]<=0){?>checked="checked"<?php }?> type="radio" class="check" name="check1" value="-1" /> </td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/communication with office, pictures sent, etc…");?></strong><span style="display:block;float:left;"><input value="<?php echo $score[2];?>" type="text" style="width: 30px;background:#FFF;border:1px solid #fff;" name="score2" class="score2" readonly="" />/1</span><div class="clear"></div></td><td><strong>Y</strong> <input type="radio" class="check" name="check2" value="1" <?php if($score[2]>0){?>checked="checked"<?php }?> /> &nbsp; <strong>N</strong> <input <?php if($score[2]<=0){?>checked="checked"<?php }?> type="radio" class="check" name="check2" value="-1" /> </td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Guard positioned");?>/<?php echo $this->requestAction("dashboard/translate/parked in correct position");?></strong><span style="display:block;float:left;"><input value="<?php echo $score[3];?>" type="text" style="width: 30px;background:#FFF;border:1px solid #fff;" name="score3" class="score3" readonly="" />/1</span><div class="clear"></div></td><td><strong>Y</strong> <input type="radio" class="check" name="check3" value="1" <?php if($score[3]>0){?>checked="checked"<?php }?> /> &nbsp; <strong>N</strong> <input <?php if($score[3]<=0){?>checked="checked"<?php }?> type="radio" class="check" name="check3" value="-1" /> </td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Supplies");?>?<?php echo $this->requestAction("dashboard/translate/Steel toes, hardhat, seals, paperwork, flashlight");?></strong><span style="display:block;float:left;"><input value="<?php echo $score[4];?>" type="text" style="width: 30px;background:#FFF;border:1px solid #fff;" name="score4" class="score4" readonly="" />/1</span><div class="clear"></div></td><td><strong>Y</strong> <input type="radio" class="check" name="check4" value="1" <?php if($score[4]>0){?>checked="checked"<?php }?> /> &nbsp; <strong>N</strong> <input <?php if($score[4]<=0){?>checked="checked"<?php }?> type="radio" class="check" name="check4" value="-1" /> </td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Knowledge of site, guard fully aware of all site instructions, who is allowed on site");?>?</strong><span style="display:block;float:left;"><input value="<?php echo $score[5];?>" type="text" style="width: 30px;background:#FFF;border:1px solid #fff;" name="score5" class="score5" readonly="" />/2</span><div class="clear"></div></td><td><strong>Y</strong> <input type="radio" class="check" name="check5" value="2" <?php if($score[5]>0){?>checked="checked"<?php }?> /> &nbsp; <strong>N</strong> <input <?php if($score[5]<=0){?>checked="checked"<?php }?> type="radio" class="check" name="check5" value="-2" /> </td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Site secure");?>? <?php echo $this->requestAction("dashboard/translate/One point of access, seals, doors locked and secured, all sides monitored");?></strong><span style="display:block;float:left;"><input value="<?php echo $score[6];?>" type="text" style="width: 30px;background:#FFF;border:1px solid #fff;" name="score6" class="score6" readonly="" />/2</span><div class="clear"></div></td><td><strong>Y</strong> <input type="radio" class="check" name="check6" value="2" <?php if($score[6]>0){?>checked="checked"<?php }?> /> &nbsp; <strong>N</strong> <input <?php if($score[6]<=0){?>checked="checked"<?php }?> type="radio" class="check" name="check6" value="-2" /> </td>
    </tr>
    <tr>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/ASAP guard sign in car window");?></strong><span style="display:block;float:left;"><input value="<?php echo $score[7];?>" type="text" style="width: 30px;background:#FFF;border:1px solid #fff;" name="score7" class="score7" readonly="" />/1</span><div class="clear"></div></td><td><strong>Y</strong> <input type="radio" class="check" name="check7" value="1" <?php if($score[7]>0){?>checked="checked"<?php }?> /> &nbsp; <strong>N</strong> <input <?php if($score[7]<=0){?>checked="checked"<?php }?> type="radio" class="check" name="check7" value="-1" /> </td>
        <td colspan="2"><strong style="display: block;float:left;width:220px;padding-right:10px;"><?php echo $this->requestAction("dashboard/translate/Personal belongings");?></strong><span style="display:block;float:left;"><input value="<?php echo $score[8];?>" type="text" style="width: 30px;background:#FFF;border:1px solid #fff;" name="score8" class="score8" readonly="" />/1</span><div class="clear"></div></td><td><strong>Y</strong> <input type="radio" class="check" name="check8" value="1" <?php if($score[8]>0){?>checked="checked"<?php }?> /> &nbsp; <strong>N</strong> <input <?php if($score[8]<=0){?>checked="checked"<?php }?> type="radio" class="check" name="check8" value="-1" /> </td>
    </tr>
    <!--<tr>
        <td colspan="3"><strong>Ops Manager Advised Via : </strong><input type="text" name="ops" value="<?php echo $ops;?>"  /></td>
        <td colspan="3"><strong>Guard signature : </strong><input type="text" name="guard_signature" value="<?php echo $guard_signature;?>" /></td>
    </tr>-->
    <tr>
        <td colspan="6">
            <strong><?php echo $this->requestAction("dashboard/translate/Comments");?> :</strong>
            <br />
            <textarea name="comments" style="width: 50%;"><?php echo $comments;?></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="6"><strong>Total Score :</strong> <input value="<?php echo $total_score;?>" type="text" style="width:30px;border:1px solid:#fff;background:#fff;" readonly="" name="total_score" class="total_score" /> %</td>
    </tr>
</table>
</td>
<script>
$(function(){
   $('.datepicker').datepicker({dateFormat: 'dd-mm-yy'});  
   $('.timepicker').timepicker();
   $('.check').change(function(){
        var val = parseInt($(this).val());
        if($('.final_score').val()=='')
        var final_sc = 0;
        else
        var final_sc = parseInt($('.final_score').val());
        final_sc = final_sc + val;
        $('.final_score').val(final_sc);
        var num = $(this).attr('name').replace('check','');
        if(parseInt(val)<0)
        val=0;
        
        $('.score'+num).val(val);
        var tot = 100*parseFloat(parseFloat(final_sc)/10.0);
        $('.total_score').val(tot);
        
   });
});
</script>