<table class="employee_more1">
<tr><td><strong>Employee Type</strong></td></tr>
<tr>
    <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Job Descriptions');?> </span><input type="checkbox" name="employee_canUpload[]" <?php if($employeestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'1','can_upload'=>'1')))){?>checked="checked"<?php }?> value="1" />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Drug Free Policy');?> </span><input type="checkbox" name="employee_canUpload[]" <?php if($employeestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'2','can_upload'=>'1')))){?>checked="checked"<?php }?> value="2" />
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->requestAction('dashboard/translate/Schedules');?> </span><input type="checkbox" name="employee_canUpload[]" <?php if($employeestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'3','can_upload'=>'1')))){?>checked="checked"<?php }?> value="3" />
        
    </td>
</tr>
</table>
