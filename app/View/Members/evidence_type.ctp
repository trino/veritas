<table class="evidence_more">
<tr><td><strong>Evidence Type</strong></td></tr>
<tr>
    <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Incident Report');?> </span><input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'1','can_view'=>'1')))){?>checked="checked"<?php }?> value="1" />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Line Crossing Sheet');?> </span><input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'2','can_view'=>'1')))){?>checked="checked"<?php }?> value="2" />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Shift Summary');?> </span><input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'3','can_view'=>'1')))){?>checked="checked"<?php }?> value="3" />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Incident Video');?> </span><input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'4','can_view'=>'1')))){?>checked="checked"<?php }?> value="4" />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Executive Summary');?> </span><input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'5','can_view'=>'1')))){?>checked="checked"<?php }?> value="5" />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Average Picket Count');?> </span><input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'6','can_view'=>'1')))){?>checked="checked"<?php }?> value="6" />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Victim Statement');?> </span><input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'7','can_view'=>'1')))){?>checked="checked"<?php }?> value="7" />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Miscellaneous');?> </span><input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'8','can_view'=>'1')))){?>checked="checked"<?php }?> value="8" />
    </td>
</tr>
</table>
