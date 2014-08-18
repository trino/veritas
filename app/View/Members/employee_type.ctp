<table class="employee_more">
<tr><td><strong>Employee Type</strong></td></tr>
<tr>
    <td style="padding: 0;">
        <table>
            
        <tr>
        
        <?php if($employeestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'1','can_upload'=>'1')))){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="employee_canView[]" <?php if($employeestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'1','can_view'=>'1')))){?>checked="checked"<?php }?> value="1" /> <?php echo $this->requestAction('dashboard/translate/Job Descriptions');?> </span></td><?php }?>
        <?php if($employeestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'2','can_upload'=>'1')))){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="employee_canView[]" <?php if($employeestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'2','can_view'=>'1')))){?>checked="checked"<?php }?> value="2" /> <?php echo $this->requestAction('dashboard/translate/Drug Free Policy');?> </span></td><?php }?>
        <?php if($employeestat1->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'3','can_upload'=>'1')))){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="employee_canView[]" <?php if($employeestat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'3','can_view'=>'1')))){?>checked="checked"<?php }?> value="3" /> <?php echo $this->requestAction('dashboard/translate/Schedules');?> </span></td><?php }?>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        </table>
    </td>
</tr>
</table>
