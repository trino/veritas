
<?php
$first_hi = 0;
$second_hi = 0;
$third_hi = 0;

if(isset($rn) && $rn)
{
    foreach($rn as $v)
    {
          if($v['Recovery_note']['image']=='first')
          {
             $first_hi=1;  
             $varr['first'][$v['Recovery_note']['coords']] = $v['Recovery_note']['notes']; 
             $varr['number'][$v['Recovery_note']['coords']]['first'] = $v['Recovery_note']['note_no'];                                
          }
    }
    
}
if(isset($vehicle) && $vehicle){

$veh = $vehicle['Vehicle_inspection'];
$f = $veh['front'];
}
else
{
    $f = '';
}

?>

    <td colspan="3" style="padding: 0;">
        <table class="table">
            <tr>
                <td colspan="4">    
                    <strong><?php echo $this->requestAction('dashboard/translate/Known Theft-Recovery Map');?></strong>
                </td>
            </tr>
            <tr>
                <td>    
                    <strong>Date : <input disabled="" type="text" class="required datepicker" name="date" value="<?php if(isset($recovery))echo $recovery['Recovery_map']['date']?>" /></strong>
                </td>
                <td>    
                    <strong>Shift time <input disabled="" type="text" name="shift_time" value="<?php if(isset($recovery))echo $recovery['Recovery_map']['shift_time']?>" /></strong>
                </td>
                <td colspan="2">    
                    <strong>Guard Name : <input disabled="" type="text" name="guard_name" value="<?php if(isset($recovery))echo $recovery['Recovery_map']['guard_name']?>" /></strong>
                </td>
            </tr>
            
        </table>
        
        <table style="border-bottom: 1px solid #ddd;">
            
            <tr>
                <td colspan="2">
                    <img src="<?php echo $this->webroot;?>img/map.jpg" usemap="#frontmap" class="map" />
                    <div class="notes">
                    <?php
                        if(isset($varr['first']) && $varr['first']){
                            $i=0;
                            echo "<br/>";
                                        foreach($varr['first'] as $k=>$v)
                                        {
                                         $i++;
                                         echo "<strong>Note for area ".$varr['number'][$k]['first'].'</strong><br/>'.$v.'<br/><br/>';   
                                                                                        
                                        } 
                                        
                                }
                        
                      ?>
                    </div>
                    </div>
                </td>
                
            </tr>
            
            
        </table>    
        <!--<div style="position: relative;padding:5px;">
            <div style="width: 50%;float:left;">
                <strong>SIGNATURE:</strong><br />
                    <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                        
                    </iframe>
            </div>        
            <?php
            
                if($signature)
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $signature;?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>  -->  
    </td>
    <script>
    $(function(){

$('.time').timepicker();
$('.date_verify').datepicker({dateFormat: 'yy-mm-dd'});

});
</script>