<table class="siteorder_more1">
<tr><td><strong>Site Order Type</strong></td></tr>
<tr>
    <td style="padding: 0;">
        <table>
        <tr>
        <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'1','can_upload'=>'1')))|| $a=='all'){?><td style="width:163px;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="siteorder_canUpload[]" <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'1','can_upload'=>'1')))){?>checked="checked"<?php }?> value="1" /> <?php echo $this->requestAction('dashboard/translate/Post Orders');?> </span></td><?php }?>
        <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'2','can_upload'=>'1')))|| $a=='all'){?><td style="width:163px;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="siteorder_canUpload[]" <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'2','can_upload'=>'1')))){?>checked="checked"<?php }?> value="2" /> <?php echo $this->requestAction('dashboard/translate/Operational Memos');?> </span></td><?php }?>
        <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'3','can_upload'=>'1')))|| $a=='all'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="siteorder_canUpload[]" <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'3','can_upload'=>'1')))){?>checked="checked"<?php }?> value="3" /> <?php echo $this->requestAction('dashboard/translate/Site Maps');?> </span></td><?php }?>
        <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>'4','can_upload'=>'1')))|| $a=='all'){?><td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="siteorder_canUpload[]" <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>'4','can_upload'=>'1')))){?>checked="checked"<?php }?> value="4" /> <?php echo $this->requestAction('dashboard/translate/Forms');?> </span></td><?php }?>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        </table>
    </td>
</tr>
</table>
