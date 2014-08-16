 <tr style="border-bottom: 1px solid #DDD;">
<td colspan="3" style="padding: 0;">

<table style="border-bottom: 1px solid #ddd;">
<tr><td style="width: 220px; border-top:none;"><strong>Employee Name</strong></td><td style="border-top: none;"><?php if(isset($dw['Dispilinary'])) echo $dw['Dispilinary']['name'];?></td><td style="border-top: none;"></td><td style="border-top: none;"></td></tr>
<tr><td><strong>Incident Date</strong></td><td><?php if(isset($dw['Dispilinary'])) echo $dw['Dispilinary']['incident_date'];?></td><td><strong>Warning Date</strong></td><td><?php if(isset($dw['Dispilinary'])) echo $dw['Dispilinary']['warning_date'];?></td></tr>
<tr><td><strong>Site</strong></td><td><?php if(isset($dw['Dispilinary'])) echo $dw['Dispilinary']['site'];?></td><td><strong>Position</strong></td><td><?php if(isset($dw['Dispilinary'])) echo $dw['Dispilinary']['position'];?></td></tr>
<tr><td colspan="2" style="width: 50%;"><strong>Rules</strong></td><td colspan="2" style="border-left: 1px solid #ddd;"><strong>Type Of Warning</strong></td></tr>
<?php
$rules = $dw['Dispilinary']['rule'];
$r_arr = explode(',',$rules);
?>
<?php
$warn = $dw['Dispilinary']['warning'];
$w_arr = explode(',',$warn);
?>
<tr><td colspan="2"><?php if(in_array('1',$r_arr)){?>&#10004<?php }else echo "&times;";?> Voilation of Work Rules</td><td colspan="2" style="border-left: 1px solid #ddd;"><?php if(in_array('1',$w_arr)){?>&#10004<?php }else echo "&times;";?> Verbal Warning</td></tr>
<tr><td colspan="2"><?php if(in_array('2',$r_arr)){?>&#10004<?php }else echo "&times;";?> Violation of Company Policy</td><td colspan="2" style="border-left: 1px solid #ddd;"><?php if(in_array('2',$w_arr)){?>&#10004<?php }else echo "&times;";?> Written Warning</td></tr>
<tr><td colspan="2"><?php if(in_array('3',$r_arr)){?>&#10004<?php }else echo "&times;";?> Violation of Safety Rules</td><td colspan="2" style="border-left: 1px solid #ddd;"><?php if(in_array('3',$w_arr)){?>&#10004<?php }else echo "&times;";?> Final Written Warning</td></tr>
<tr><td colspan="2"><?php if(in_array('4',$r_arr)){?>&#10004<?php }else echo "&times;";?> Insubordination</td><td colspan="2" style="border-left: 1px solid #ddd;"><?php if(in_array('4',$w_arr)){?>&#10004<?php }else echo "&times;";?> Termination </td></tr>
<tr><td colspan="2"><?php if(in_array('5',$r_arr)){?>&#10004<?php }else echo "&times;";?> Under the influence of drugs/alcohol or in possessions of drugs/alcohol</td><td colspan="2" style="border-left: 1px solid #ddd;"></td></tr>
<tr><td colspan="2"><?php if(in_array('6',$r_arr)){?>&#10004<?php }else echo "&times;";?> Discourtesy or verbal abuse of guest or other employee</td><td colspan="2" style="border-left: 1px solid #ddd;"></td></tr>
<tr><td colspan="2"><?php if(in_array('7',$r_arr)){?>&#10004<?php }else echo "&times;";?> Damage to client/company property</td><td colspan="2" style="border-left: 1px solid #ddd;"></td></tr>
<tr><td colspan="2"><?php if(in_array('8',$r_arr)){?>&#10004<?php }else echo "&times;";?> Physical or Verbal assault and/or fighting</td><td colspan="2" style="border-left: 1px solid #ddd;"></td></tr>
<tr><td colspan="2"><strong>Other :</strong> <?php if(isset($dw['Dispilinary']['other']))echo $dw['Dispilinary']['other'];?></td><td colspan="2" style="border-left: 1px solid #ddd;"></td></tr>



<tr><td colspan="2"><strong>Supervisor/Manager Comments</strong></td><td colspan="2"><strong>Employee Comments</strong></td></tr>
<tr><td colspan="2"><?php if(isset($dw['Dispilinary'])) echo $dw['Dispilinary']['supervisor_comment'];?></td><td colspan="2"><?php if(isset($dw['Dispilinary'])) echo $dw['Dispilinary']['employee_comment'];?></td></tr>


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
            
                if(isset($dw['Dispilinary']) && $dw['Dispilinary']['signature'])
                {
                    
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $dw['Dispilinary']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>
</td>
</tr>
<script>
$(function(){
   $('#loss_prevention').remove(); 
});
</script>