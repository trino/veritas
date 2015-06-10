
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
            
        </table>
        
        <table style="border-bottom: 1px solid #ddd;">
            <tr>
                <td colspan="2"><strong><?php echo $this->requestAction('dashboard/translate/Highlight area with noticeable dents or scratches');?>Highlight area with noticeable dents or scratches</strong></td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="<?php echo $this->webroot;?>img/map.jpg" usemap="#frontmap" class="map" />
                    <map name="frontmap" class="f">
                        <area shape="rect" id="star_1" coords="0,0,100,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_2" coords="100,0,200,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_3" coords="200,0,300,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_4" coords="300,0,400,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_5" coords="400,0,500,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_6" coords="500,0,600,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_7" coords="600,0,700,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_8" coords="0,109,100,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_9" coords="100,109,200,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_10" coords="200,109,300,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_11" coords="300,109,400,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_12" coords="400,109,500,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_13" coords="500,109,600,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_14" coords="600,109,700,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_15" coords="0,218,100,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_16" coords="100,218,200,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_17" coords="200,218,300,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_18" coords="300,218,400,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_19" coords="400,218,500,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_20" coords="500,218,600,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_21" coords="600,218,700,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_22" coords="0,327,100,436" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_23" coords="100,327,200,436" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_24" coords="200,327,300,436" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_25" coords="300,327,400,436" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_26" coords="400,327,500,436" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_27" coords="500,327,600,436" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_28" coords="600,327,700,436" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star_29" coords="0,436,100,545" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_30" coords="100,436,200,545" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_31" coords="200,436,300,545" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_32" coords="300,436,400,545" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_33" coords="400,436,500,545" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_34" coords="500,436,600,545" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_35" coords="600,436,700,545" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star_36" coords="0,545,100,654" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_37" coords="100,545,200,654" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_38" coords="200,545,300,654" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_39" coords="300,545,400,654" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_40" coords="400,545,500,654" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_41" coords="500,545,600,654" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_42" coords="600,545,700,654" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star_43" coords="0,654,100,763" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_44" coords="100,654,200,763" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_45" coords="200,654,300,763" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_46" coords="300,654,400,763" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_47" coords="400,654,500,763" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_48" coords="500,654,600,763" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_49" coords="600,654,700,763" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
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