
<table class="report_more1">
<tr><td><strong>Report Type</strong></td></tr>
<tr>
    <td><input type="hidden" name="report_type1[]" value="1" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Activity Log');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'1','can_upload'=>'1')))){?>checked="checked"<?php }?> value="1" />
        <input type="hidden" name="report_type1[]" value="4" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Security Occurance');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'4','can_upload'=>'1')))){?>checked="checked"<?php }?>value="4" />
        <input type="hidden" name="report_type1[]" value="5" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Incident Report');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'5','can_upload'=>'1')))){?>checked="checked"<?php }?>value="5" />
        <input type="hidden" name="report_type1[]" value="6" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Sign-off Sheets');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'6','can_upload'=>'1')))){?>checked="checked"<?php }?>value="6" />
        <input type="hidden" name="report_type1[]" value="7" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Loss Prevention');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'7','can_upload'=>'1')))){?>checked="checked"<?php }?>value="7" />
        <input type="hidden" name="report_type1[]" value="8" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Static Site Audit');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'8','can_upload'=>'1')))){?>checked="checked"<?php }?>value="8" />
        <input type="hidden" name="report_type1[]" value="9" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Insurance Site Audit');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'9','can_upload'=>'1')))){?>checked="checked"<?php }?> value="9" />
    </td>
</tr>
<tr>
    <td><input type="hidden" name="report_type1[]" value="10" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Site Signin Signout');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'10','can_upload'=>'1')))){?>checked="checked"<?php }?> value="10" />
        <input type="hidden" name="report_type1[]" value="11" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Instructions and site Assessment');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'11','can_upload'=>'1')))){?>checked="checked"<?php }?> value="11" />
        <input type="hidden" name="report_type1[]" value="12" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Personal Inspection');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'12','can_upload'=>'1')))){?>checked="checked"<?php }?>value="12" />
        <input type="hidden" name="report_type1[]" value="13" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'13','can_upload'=>'1')))){?>checked="checked"<?php }?> value="13"/>
        <input type="hidden" name="report_type1[]" value="14" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Log');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'14','can_upload'=>'1')))){?>checked="checked"<?php }?> value="14" />
        <input type="hidden" name="report_type1[]" value="15" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'15','can_upload'=>'1')))){?>checked="checked"<?php }?> value="15" />
    </td>
<tr>
    <td>    
        <input type="hidden" name="report_type1[]" value="16" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'16','can_upload'=>'1')))){?>checked="checked"<?php }?> value="16" />
        <input type="hidden" name="report_type1[]" value="17" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Disciplinary Warning');?> </span><input type="checkbox" name="report_canUpload[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'17','can_upload'=>'1')))){?>checked="checked"<?php }?> value="17" />
        
    </td>
</tr>
</table>