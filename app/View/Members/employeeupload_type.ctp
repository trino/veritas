<table class="employee_more1">
<tr><td><strong>Employee Type</strong></td></tr>
<tr>
    <td style="padding: 0;">
        <table>
            
        <tr>
        
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="employee_canUpload[]" <?php if($employeestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'1','can_upload'=>'1')))){?>checked="checked"<?php }?> value="1" /> <?php echo $this->requestAction('dashboard/translate/Job Descriptions');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="employee_canUpload[]" <?php if($employeestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'2','can_upload'=>'1')))){?>checked="checked"<?php }?> value="2" /> <?php echo $this->requestAction('dashboard/translate/Drug Free Policy');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="employee_canUpload[]" <?php if($employeestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'3','can_upload'=>'1')))){?>checked="checked"<?php }?> value="3" /> <?php echo $this->requestAction('dashboard/translate/Schedules');?> </span></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        </table>
    </td>
</tr>
</table>
