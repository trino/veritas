<table class="siteorder_more">
<tr><td><strong>Site Order Type</strong></td></tr>
<tr>
    <td style="padding: 0;">
        <table>
        <tr>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="siteorder_canView[]" <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'1','can_view'=>'1')))){?>checked="checked"<?php }?> value="1" /> <?php echo $this->requestAction('dashboard/translate/Post Orders');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="siteorder_canView[]" <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'2','can_view'=>'1')))){?>checked="checked"<?php }?> value="2" /> <?php echo $this->requestAction('dashboard/translate/Operational Memos');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="siteorder_canView[]" <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'3','can_view'=>'1')))){?>checked="checked"<?php }?> value="3" /> <?php echo $this->requestAction('dashboard/translate/Site Maps');?> </span></td>
        <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="siteorder_canView[]" <?php if($siteorderstat->find('first',array('conditions'=>array('user_id'=>$uid,'report_type'=>'4','can_view'=>'1')))){?>checked="checked"<?php }?> value="4" /> <?php echo $this->requestAction('dashboard/translate/Forms');?> </span></td>
        </tr>
        </table>
    </td>
</tr>
</table>
