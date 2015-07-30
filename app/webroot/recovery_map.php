
<?php
$first_hi = 0;
$second_hi = 0;
$third_hi = 0;
//var_dump($rn);
if(isset($rn) && $rn)
{
    foreach($rn as $v)
    {
          if($v['Recovery_note']['image']=='first')
          {
             $first_hi=1;  
             $varr['first'][$v['Recovery_note']['coords']] = $v['Recovery_note']['notes']; 
             $varr['fid'][$v['Recovery_note']['coords']] = $v['Recovery_note']['note_no'];                                
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
                    <strong>Date : <input type="text" class="datepicker" name="date" value="<?php if(isset($recovery))echo $recovery['Recovery_map']['date']?>" /></strong>
                </td>
                <td>    
                    <strong>Shift time <input type="text" name="shift_time" value="<?php if(isset($recovery))echo $recovery['Recovery_map']['shift_time']?>" /></strong>
                </td>
                <td colspan="2">    
                    <strong>Guard Name : <input type="text" name="guard_name" value="<?php if(isset($recovery))echo $recovery['Recovery_map']['guard_name']?>" /></strong>
                </td>
            </tr>
            
        </table>
        
        <table style="border-bottom: 1px solid #ddd;">
            
            <tr>
                <td colspan="2">
                    <img src="<?php echo $this->webroot;?>img/map.jpg" width="700" height="700" usemap="#frontmap" class="map" />
                    <map name="frontmap" class="f">
                        <area shape="rect" id="star_1" coords="0,102,100,208" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_2" coords="100,102,200,208" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_3" coords="200,102,300,208" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_4" coords="300,102,400,208" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_5" coords="400,102,500,208" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_6" coords="500,102,600,208" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_7" coords="600,102,700,208" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_8" coords="0,208,100,382" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_9" coords="100,208,200,314" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_10" coords="200,208,300,314" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_11" coords="300,208,400,314" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_12" coords="400,208,500,314" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_13" coords="500,208,600,314" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_14" coords="600,208,700,314" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_15" coords="0,314,100,488" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_16" coords="100,314,200,422" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_17" coords="200,314,300,422" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_18" coords="300,314,400,422" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_19" coords="400,314,500,422" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_20" coords="500,314,600,422" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_21" coords="600,314,700,422" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_22" coords="0,422,100,528" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_23" coords="100,422,200,528" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_24" coords="200,422,300,528" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_25" coords="300,422,400,528" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_26" coords="400,422,500,528" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_27" coords="500,422,600,528" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_28" coords="600,422,700,528" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star_29" coords="0,528,100,634" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_30" coords="100,528,200,634" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_31" coords="200,528,300,634" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_32" coords="300,528,400,634" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_33" coords="400,528,500,634" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_34" coords="500,528,600,634" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_35" coords="600,528,700,634" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <!--<area shape="rect" id="star_36" coords="0,600,100,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_37" coords="100,600,200,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_38" coords="200,600,300,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_39" coords="300,600,400,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_40" coords="400,600,500,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_41" coords="500,600,600,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_42" coords="600,600,700,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star_43" coords="0,600,100,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_44" coords="100,600,200,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_45" coords="200,600,300,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_46" coords="300,600,400,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_47" coords="400,600,500,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_48" coords="500,600,600,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_49" coords="600,600,700,700" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        -->
                    </map>
                    <input type="hidden" name="front" value="" class="front" value="<?php echo $f;?>" />
                    <div class="firsthidden" <?php if(!$first_hi){?>style="display: none;"<?php }?>>
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
<script src="<?php echo $this->webroot;?>js/highlight.js"></script>
<script src="<?php echo $this->webroot;?>js/highscript.js"></script>
<script>
$(function(){
    $('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
    $('.map').maphilight({
            fillColor: '008800'
        });
        });
        </script>    
<script>
$(function(){
    <?php
    
    if(isset($recovery) && $recovery)
    {
        ?>
        var front = '<?php echo $recovery['Recovery_map']['front'];?>';
        
        
        var arr_f = front.split('_');
        
       
        $('.front').val('');
        
        if(arr_f.length >0)
        {
            $('.f area').each(function(){
                var co = $(this).attr('coords');
                if(jQuery.inArray( co, arr_f )>=0)
                $(this).click() ;               
            });
        }
        
        <?php
    }
    ?>
    setInterval(function(){
        <?php
                        if(isset($rn) && $rn)
                        {
                            ?>
                            //alert('test');
                            <?php
                            foreach($rn as $v)
                            {
                                if($v['Recovery_note']['image']=='first')
                                {
                                    ?>
                                    $('.firsthidden input').each(function(){
                                        
                                        var cl = $(this).attr('class').replace(' valid');
                                       // alert(cl);
                                        <?php
                                        foreach($varr['first'] as $k=>$v)
                                        {
                                            ?>
                                            if(cl == '<?php echo $k;?>')
                                            {
                                                $('.'+cl).val('<?php echo $v?>');
                                            }
                                            <?php
                                        } 
                                        ?> 
                                    });
                                   <?php
                                }
                                
                            }
                        }
                        ?>    
    },3000);
$('.time').timepicker();
$('.date_verify').datepicker({dateFormat: 'yy-mm-dd'});

});
</script>