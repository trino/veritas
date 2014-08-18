<table class="evidence_more">
<tr><td><strong>Evidence Type </strong></td></tr>
<tr>
    <td style="padding: 0;">
    <table>
        <tr>
        <?php if($evidencestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'1','can_upload'=>'1'))) || $this->params['controller']=='dashboard'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'1','can_view'=>'1')))){?>checked="checked"<?php }?> value="1" /> <?php echo $this->requestAction('dashboard/translate/Incident Report');?> </span></td><?php }?>
        <?php if($evidencestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'2','can_upload'=>'1'))) || $this->params['controller']=='dashboard'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'2','can_view'=>'1')))){?>checked="checked"<?php }?> value="2" /> <?php echo $this->requestAction('dashboard/translate/Line Crossing Sheet');?> </span></td><?php }?>
        <?php if($evidencestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'3','can_upload'=>'1'))) || $this->params['controller']=='dashboard'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'3','can_view'=>'1')))){?>checked="checked"<?php }?> value="3" /> <?php echo $this->requestAction('dashboard/translate/Shift Summary');?> </span></td><?php }?>
        <?php if($evidencestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'4','can_upload'=>'1'))) || $this->params['controller']=='dashboard'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'4','can_view'=>'1')))){?>checked="checked"<?php }?> value="4" /> <?php echo $this->requestAction('dashboard/translate/Incident Video');?> </span></td><?php }?>
        <?php if($evidencestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'5','can_upload'=>'1'))) || $this->params['controller']=='dashboard'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'5','can_view'=>'1')))){?>checked="checked"<?php }?> value="5" /> <?php echo $this->requestAction('dashboard/translate/Executive Summary');?> </span></td><?php }?>
        <?php if($evidencestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'6','can_upload'=>'1'))) || $this->params['controller']=='dashboard'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'6','can_view'=>'1')))){?>checked="checked"<?php }?> value="6" /><?php echo $this->requestAction('dashboard/translate/Average Picket Count');?> </span></td><?php }?>
        </tr>
        <tr>
        <?php if($evidencestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'7','can_upload'=>'1'))) || $this->params['controller']=='dashboard'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'7','can_view'=>'1')))){?>checked="checked"<?php }?> value="7" /> <?php echo $this->requestAction('dashboard/translate/Victim Statement');?> </span></td><?php }?>
        <?php if($evidencestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'8','can_upload'=>'1'))) || $this->params['controller']=='dashboard'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="evidence_canView[]" <?php if($evidencestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'8','can_view'=>'1')))){?>checked="checked"<?php }?> value="8" /> <?php echo $this->requestAction('dashboard/translate/Miscellaneous');?> </span></td><?php }?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        </table>
    </td>
</tr>
</table>
