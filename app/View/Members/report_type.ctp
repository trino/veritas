
<table class="report_more">
<tr><td><strong>Report Type</strong></td></tr>
<tr>
    <td style="padding: 0;">
        <table><tr>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'1','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="1" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'1','can_view'=>'1')))){?>checked="checked"<?php }?> value="1" /> <?php echo $this->requestAction('dashboard/translate/Activity Log');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'4','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="4" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'4','can_view'=>'1')))){?>checked="checked"<?php }?> value="4" /> <?php echo $this->requestAction('dashboard/translate/Security Occurance');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'5','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="5" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'5','can_view'=>'1')))){?>checked="checked"<?php }?> value="5" /> <?php echo $this->requestAction('dashboard/translate/Incident Report');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'6','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="6" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'6','can_view'=>'1')))){?>checked="checked"<?php }?> value="6" /> <?php echo $this->requestAction('dashboard/translate/Sign-off Sheets');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'7','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="7" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'7','can_view'=>'1')))){?>checked="checked"<?php }?> value="7" /> <?php echo $this->requestAction('dashboard/translate/Loss Prevention');?> </span></td><?php }?>
        
        </tr>
        <tr>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'8','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="8" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'8','can_view'=>'1')))){?>checked="checked"<?php }?> value="8" /> <?php echo $this->requestAction('dashboard/translate/Static Site Audit');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'9','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="9" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'9','can_view'=>'1')))){?>checked="checked"<?php }?> value="9" /> <?php echo $this->requestAction('dashboard/translate/Insurance Site Audit');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'10','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="10" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'10','can_view'=>'1')))){?>checked="checked"<?php }?> value="10" /> <?php echo $this->requestAction('dashboard/translate/Site Signin Signout');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'11','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="11" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'11','can_view'=>'1')))){?>checked="checked"<?php }?> value="11" /> <?php echo $this->requestAction('dashboard/translate/Instructions and site Assessment');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'12','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="12" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'12','can_view'=>'1')))){?>checked="checked"<?php }?> value="12" /> <?php echo $this->requestAction('dashboard/translate/Personal Inspection');?> </span></td><?php }?>
        
        </tr>
        <tr>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'13','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="13" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'13','can_view'=>'1')))){?>checked="checked"<?php }?> value="13" /> <?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'14','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="14" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'14','can_view'=>'1')))){?>checked="checked"<?php }?> value="14" /> <?php echo $this->requestAction('dashboard/translate/Mobile Log');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'15','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="15" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'15','can_view'=>'1')))){?>checked="checked"<?php }?> value="15" /> <?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?> </span></td><?php }?>    
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'16','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="16" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'16','can_view'=>'1')))){?>checked="checked"<?php }?> value="16" /> <?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?> </span></td><?php }?>
        <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'17','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="17" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'17','can_view'=>'1')))){?>checked="checked"<?php }?> value="17" /> <?php echo $this->requestAction('dashboard/translate/Disciplinary Warning');?> </span></td><?php }?>
        
        </tr>
        
        <tr>
            <?php if($reportstat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'18','can_upload'=>'1')))){?><td><input type="hidden" name="report_type[]" value="18" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="report_canView[]" <?php if($reportstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'18','can_view'=>'1')))){?>checked="checked"<?php }?> value="18" /> <?php echo $this->requestAction('dashboard/translate/Injury And Illness');?> </span></td><?php }?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </table>
    </td>
</tr>
</table>