<td colspan="3" style="padding: 0;">

<table class="disciplinary">
<tr><td style="width: 220px;"><strong>Employee Name</strong></td><td><input type="text" name="disp[name]" value="<?php if(isset($vi['Dispilinary'])) echo $vi['Dispilinary']['name'];?>" /></td><td></td><td></td></tr>
<tr><td><strong>Incident Date</strong></td><td><input type="text" name="disp[incident_date]" class="date" value="<?php if(isset($vi['Dispilinary'])) echo $vi['Dispilinary']['incident_date'];?>" /></td><td><strong>Warning Date</strong></td><td><input class="date" type="text" value="<?php if(isset($vi['Dispilinary'])) echo $vi['Dispilinary']['warning_date'];?>" name="disp[warning_date]" /></td></tr>
<tr><td><strong>Site</strong></td><td><input type="text" name="disp[site]" class="" value="<?php if(isset($vi['Dispilinary'])) echo $vi['Dispilinary']['site'];?>" /></td><td><strong>Position</strong></td><td><input class="" type="text" name="disp[position]" value="<?php if(isset($vi['Dispilinary'])) echo $vi['Dispilinary']['position'];?>" /></td></tr>
<tr><td colspan="4">Rules</td></tr>
<?php
$rules = $vi['Dispilinary']['rule'];
$r_arr = explode(',',$rules);
?>
<tr><td colspan="4"><input type="checkbox" name="disp[rules][]" value="1" <?php if(in_array('1',$r_arr)){?>checked="checked"<?php }?> /> Voilation of Work Rules</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[rules][]" value="2" <?php if(in_array('2',$r_arr)){?>checked="checked"<?php }?> /> Violation of Company Policy</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[rules][]" value="3" <?php if(in_array('3',$r_arr)){?>checked="checked"<?php }?> /> Violation of Safety Rules</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[rules][]" value="4" <?php if(in_array('4',$r_arr)){?>checked="checked"<?php }?> /> Insubordination</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[rules][]" value="5" <?php if(in_array('5',$r_arr)){?>checked="checked"<?php }?> /> Under the influence of drugs/alcohol or in possessions of drugs/alcohol</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[rules][]" value="6" <?php if(in_array('6',$r_arr)){?>checked="checked"<?php }?> /> Discourtesy or verbal abuse of guest or other employee</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[rules][]" value="7" <?php if(in_array('7',$r_arr)){?>checked="checked"<?php }?> /> Damage to client/company property</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[rules][]" value="8" <?php if(in_array('8',$r_arr)){?>checked="checked"<?php }?> /> Physical or Verbal assault and/or fighting</td></tr>
<tr><td colspan="4"><strong>Other</strong> <input type="text" name="disp[other]" value="<?php if(isset($vi['Dispilinary']['other']))echo $vi['Dispilinary']['other'];?>" /> </td></tr>
<tr><td colspan="4"><strong>Type Of Warning</strong></td></tr>
<?php
$warn = $vi['Dispilinary']['warning'];
$w_arr = explode(',',$warn);
?>
<tr><td colspan="4"><input type="checkbox" name="disp[warnings][]" value="1" <?php if(in_array('1',$w_arr)){?>checked="checked"<?php }?> /> Verbal Warning</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[warnings][]" value="2" <?php if(in_array('2',$w_arr)){?>checked="checked"<?php }?> /> Written Warning</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[warnings][]" value="3" <?php if(in_array('3',$w_arr)){?>checked="checked"<?php }?> /> Final Written Warning</td></tr>
<tr><td colspan="4"><input type="checkbox" name="disp[warnings][]" value="4" <?php if(in_array('4',$w_arr)){?>checked="checked"<?php }?> /> Termination </td></tr>
<tr><td colspan="4"><strong>Supervisor/Manager Comments</strong></td></tr>
<tr><td colspan="4"><textarea name="disp[supervisor_comment]" ><?php if(isset($vi['Dispilinary'])) echo $vi['Dispilinary']['supervisor_comment'];?></textarea></td></tr>
<tr><td colspan="4"><strong>Employee Comments</strong></td></tr>
<tr><td colspan="4"><textarea name="disp[employee_comment]"><?php if(isset($vi['Dispilinary'])) echo $vi['Dispilinary']['employee_comment'];?></textarea></td></tr>

</table>
<div style="position: relative;padding:5px;">
        <?php if($this->params['action'] != 'view_detail' ){ ?> 
            <div style="width: 50%;float:left;">
                <strong>SIGNATURE:</strong><br />
                    <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                        
                    </iframe>
            </div>        
        <?php }?>    
            <?php
            
                if(isset($vi['Dispilinary']) && $vi['Dispilinary']['signature'])
                {
                    
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $vi['Dispilinary']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>
</td>
<script>
$('.date').datepicker({dateFormat:'yy-mm-dd'});
</script>
<style>
.disciplinary input[type="checkbox"]{margin-top:0;margin-right:10px;}
</style>