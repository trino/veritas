<table class="evidence_more1">
<tr><td><strong>Evidence Type</strong></td></tr>
<tr>
    <td style="padding: 0;">
    <table>
        <tr><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canUpload[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'1','can_upload'=>'1')))){?>checked="checked"<?php }?> value="1" /> <?php echo $this->requestAction('dashboard/translate/Incident Report');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canUpload[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'2','can_upload'=>'1')))){?>checked="checked"<?php }?> value="2" /> <?php echo $this->requestAction('dashboard/translate/Line Crossing Sheet');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canUpload[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'3','can_upload'=>'1')))){?>checked="checked"<?php }?> value="3" /> <?php echo $this->requestAction('dashboard/translate/Shift Summary');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canUpload[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'4','can_upload'=>'1')))){?>checked="checked"<?php }?> value="4" /> <?php echo $this->requestAction('dashboard/translate/Incident Video');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canUpload[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'5','can_upload'=>'1')))){?>checked="checked"<?php }?> value="5" /> <?php echo $this->requestAction('dashboard/translate/Executive Summary');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canUpload[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'6','can_upload'=>'1')))){?>checked="checked"<?php }?> value="6" /> <?php echo $this->requestAction('dashboard/translate/Average Picket Count');?> </span></td>
        </tr>
        <tr>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canUpload[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'7','can_upload'=>'1')))){?>checked="checked"<?php }?> value="7" /> <?php echo $this->requestAction('dashboard/translate/Victim Statement');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canUpload[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'8','can_upload'=>'1')))){?>checked="checked"<?php }?> value="8" /> <?php echo $this->requestAction('dashboard/translate/Miscellaneous');?> </span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        </table>
    </td>
</tr>
</table>
