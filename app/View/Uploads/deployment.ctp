<?php
    $arr1 = array('Radio','Internet Stick','Tapes','SD Card','DVD','Hotel');     
    $arr2 = array('Security Vehicle Regular','Security Vehicle Large','15 Pessenger Van','School Bus','Coach Bus','Transport Truck');
?>
<td colspan="2" style="padding: 0;">
<table class="dep">
<tr>
<td colspan="10">
<select class="personnel" name="personnel" style="margin-bottom: 0;">
    <option value="" >Choose Personnel</option>
    <option value="Security Guard_<?php echo $rate['DeploymentRate']['securityguard_hr'];?>_<?php echo $rate['DeploymentRate']['securityguard_travel'];?>" class="securityguard">Security Guard</option>
    <option value="Private Investigator_<?php echo $rate['DeploymentRate']['privateinvestigator_hr'];?>_<?php echo $rate['DeploymentRate']['privateinvestigator_travel'];?>" class="privateinvestigator">Private Investigator</option>
    <option value="Evidence Handler_<?php echo $rate['DeploymentRate']['evidencehandler_hr'];?>_<?php echo $rate['DeploymentRate']['evidencehandler_travel'];?>" class="evidencehandler">Evidence Handler</option>
    <option value="Supervisor_<?php echo $rate['DeploymentRate']['supervisor_hr'];?>_<?php echo $rate['DeploymentRate']['supervisor_travel'];?>" class="supervisor">Supervisor</option>
    <option value="Coordinator_<?php echo $rate['DeploymentRate']['coordinator_hr'];?>_<?php echo $rate['DeploymentRate']['coordinator_travel'];?>" class="coordinator">Coordinator</option>
    <option value="Executive Protection_<?php echo $rate['DeploymentRate']['executiveprotection_hr'];?>_<?php echo $rate['DeploymentRate']['executiveprotection_travel'];?>" class="executiveprotection">Executive Protection</option>
    <option value="Van Driver_<?php echo $rate['DeploymentRate']['vandriver_hr'];?>_<?php echo $rate['DeploymentRate']['vandriver_travel'];?>" class="vandriver">Van Driver</option>
    <option value="15 Passenger Van Driver_<?php echo $rate['DeploymentRate']['15passengervandriver_hr'];?>_<?php echo $rate['DeploymentRate']['15passengervandriver_travel'];?>" class="15passengervandriver">15 Passenger Van Driver</option>
    <option class="truckdriver" value="Truck Driver_<?php echo $rate['DeploymentRate']['truckdriver_hr'];?>_<?php echo $rate['DeploymentRate']['truckdriver_travel'];?>">Truck Driver</option>
    <option class="schoolbusdriver" value="School Bus Driver_<?php echo $rate['DeploymentRate']['schoolbusdriver_hr'];?>_<?php echo $rate['DeploymentRate']['schoolbusdriver_travel'];?>">School Bus Driver</option>
    <option class="coachbusdriver" value="Coach Bus Driver_<?php echo $rate['DeploymentRate']['coachbusdriver_hr'];?>_<?php echo $rate['DeploymentRate']['coachbusdriver_travel'];?>">Coach Bus Driver</option>
</select>
<a href="javascript:void(0);" class="btn btn-primary addPersonnel">Add</a>
</td>
</tr>
<tr class="entries" style="<?php if(!isset($pers)){?>display: none;<?php }?>">
    <td colspan="10"><strong>Personnel</strong></td>
</tr>
<tr class="entries" style="<?php if(!isset($pers)){?>display: none;<?php }?>">
    <td><strong>Position</strong></td><td><strong>Number of Staff</strong></td><td><strong>Start Time</strong></td><td><strong>End Time</strong></td><td><strong>Total Hours</strong></td><td><strong>Hours Billable</strong></td><td><strong>Travel</strong></td><td><strong>Travel Billable</strong></td><td><strong>Meal</strong></td><td><strong>Meal Billable</strong></td>
</tr>
<?php
if(isset($pers) && $pers)
{
    
    foreach($pers as $pp)
    {
        $total = $pp['Personnel']['total'];
        $tax = $pp['Personnel']['tax'];
        $a_fee = $pp['Personnel']['a_fee'];
        $g_total = $pp['Personnel']['g_total'];
        if($pp['Personnel']['no_of_staff']<1)
            $pp['Personnel']['no_of_staff1'] =1;
        else
           $pp['Personnel']['no_of_staff1']=$pp['Personnel']['no_of_staff']; 
        if($pp['Personnel']['total_hours']<1)
            $pp['Personnel']['total_hours1']=1;
        else
           $pp['Personnel']['total_hours1']=$pp['Personnel']['total_hours']; 
        if($pp['Personnel']['travel']<1)
            $pp['Personnel']['travel1']=1;
        else
           $pp['Personnel']['travel1']=$pp['Personnel']['travel']; 
        
        ?>
        <tr><td id="<?php echo ($pp['Personnel']['hours_billable'])/($pp['Personnel']['no_of_staff1']*$pp['Personnel']['total_hours1']).'_'.($pp['Personnel']['travel_billable'])/($pp['Personnel']['travel1']);?>"><input class="sg"  type="text" style="width:160px;" name="Personnel[position][]" value="<?php echo $pp['Personnel']['position'];?>" readonly/></td><td><input class="staff" type="text" name="Personnel[no_of_staff][]" value="<?php echo $pp['Personnel']['no_of_staff'];?>"/></td><td><input name="Personnel[start_time][]" type="text" class="time" value="<?php echo $pp['Personnel']['start_time'];?>"/></td><td><input type="text" name="Personnel[end_time][]" class="time" value="<?php echo $pp['Personnel']['end_time'];?>"/></td><td><input type="text" class="total_hours" value="<?php echo $pp['Personnel']['total_hours'];?>" name="Personnel[total_hours][]" readonly /></td><td><input type="text" class="hours_billable total" name="Personnel[hours_billable][]" value="$<?php echo $pp['Personnel']['hours_billable'];?>"  readonly/></td><td><input type="text" name="Personnel[travel][]" class="travel" value="<?php echo $pp['Personnel']['travel'];?>"/></td><td><input type="text" name="Personnel[travel_billable][]" value="$<?php echo $pp['Personnel']['travel_billable'];?>" class="total" readonly/></td><td><input type="text" name="Personnel[meal_amount][]" class="meal" value="<?php echo $pp['Personnel']['meal_amount'];?>"/></td><td><input value="$<?php echo $pp['Personnel']['meal_billable'];?>" type="text" name="Personnel[meal_billable][]" readonly class="total"/><a href="javascript:void(0)" class ="btn btn-danger btn-small" style="margin:0 0 3px 10px;" onclick="$(this).closest('tr').remove();">X</a></td></tr>
        <?php
    }
}
?>

</table>
<!--<table>
    <tr><td><a href="javascript:void(0)" class="btn btn-success add_misc">Add Equipment</a></td></tr>
</table>-->
<table class="misc" >
    <tr>
        <td colspan="6">
            <select class="misc_opt" style="margin-bottom: 0;">
                <option value="">Choose Equipment/Hotel</option>
                <option value="Radio_<?php echo $rate['DeploymentRate']['radio_day'];?>" class="radio_day">Radio</option>
                <option value="Internet Stick_<?php echo $rate['DeploymentRate']['internetstick_day'];?>" class="internetstick_day">Internet Stick</option>
                <option value="Tapes_<?php echo $rate['DeploymentRate']['tapes_day'];?>" class="tapes_day">Tapes</option>
                <option value="SD Card_<?php echo $rate['DeploymentRate']['sdcard_day'];?>" class="sdcard_day">SD Card</option>
                <option value="DVD_<?php echo $rate['DeploymentRate']['dvd_day'];?>" class="dvd_day">DVD</option>
                <option value="Hotel_<?php echo $rate['DeploymentRate']['hotelcost_day'];?>" class="hotelcost_day">Hotel</option>                
            </select>
            <a href="javascript:void(0);" class="btn btn-primary go_misc">Add</a>
        </td>
    </tr>
    <tr class="misc_entries" style="<?php if(!isset($pers)){?>display: none;<?php }?>"><td colspan="6"><strong>Equipment/Hotel</strong></td></tr>
    <tr class="misc_entries" style="<?php if(!isset($pers)){?>display: none;<?php }?>"><td><strong>Item</strong></td><td><strong>Quantity</strong></td><td></td><td></td><td></td><td><strong>Amount Billable</strong></td></tr>
    <?php
    if(isset($equip))
    foreach($equip as $eq)
    {
         $total = $eq['Equipment']['total'];
        $tax = $eq['Equipment']['tax'];
        $a_fee = $eq['Equipment']['a_fee'];
        $g_total = $eq['Equipment']['g_total'];
        if(in_array($eq['Equipment']['items'],$arr1)){
            if($eq['Equipment']['qty']<1)
                $eq['Equipment']['qty1']=1;
             else
                $eq['Equipment']['qty1']=$eq['Equipment']['qty'];
            
      ?>
    <tr><td id="<?php echo $eq['Equipment']['amount_billable']/$eq['Equipment']['qty1'];?>"><input type="text" style="width:160px;" name="Equipment[items][]" value="<?php echo $eq['Equipment']['items'];?>" readonly /></td><td><input class="quantity" type="text" name="Equipment[qty][]" value="<?php echo $eq['Equipment']['qty'];?>"/></td><td></td><td></td><td></td><td><input value="$<?php echo $eq['Equipment']['amount_billable'];?>" type="text" name="Equipment[amount_billable][]" class="total" readonly /><a href="javascript:void(0)" class ="btn btn-danger btn-small" style="margin:0 0 3px 10px;" onclick="$(this).closest('tr').remove();">X</a></td></tr>  
      <input type="hidden" name="Equipment[kms][]" /><input type="hidden" name="Equipment[fuel_cost][]" />
      <?php  
      }
    }
    ?>
</table>

<table class="misc2" >
    <tr>
        <td colspan="6">
            <select class="misc_opt2" style="margin-bottom: 0;">
                <option value="">Choose Vehicle</option>
                <option value="Security Vehicle Regular_<?php echo $rate['DeploymentRate']['securityvehicleregular_day'];?>" class="securityvehicleregular_day">Security Vehicle Regular</option>
                <option value="Security Vehicle Large_<?php echo $rate['DeploymentRate']['securityvehiclelarge_day'];?>" class="securityvehiclelarge_day">Security Vehicle Large</option>
                <option value="15 Pessenger Van_<?php echo $rate['DeploymentRate']['15passengervan_day'];?>" class="15passengervan_day">15 Pessenger Van</option>
                <option value="School Bus_<?php echo $rate['DeploymentRate']['schoolbus_day'];?>" class="schoolbus_day">School Bus</option>
                <option value="Coach Bus_<?php echo $rate['DeploymentRate']['coachbus_day'];?>" class="coachbus_day">Coach Bus</option>
                <option value="Transport Truck_<?php echo $rate['DeploymentRate']['transporttruck_day'];?>" class="transporttruck_day">Transport Truck</option>
                                
            </select>
            <a href="javascript:void(0);" class="btn btn-primary go_misc2">Add</a>
        </td>
    </tr>
    <tr class="misc_entries2" style="<?php if(!isset($pers)){?>display: none;<?php }?>"><td colspan="6"><strong>Vehicle</strong></td></tr>
    <tr class="misc_entries2" style="<?php if(!isset($pers)){?>display: none;<?php }?>"><td><strong>Item</strong></td><td><strong>Quantity</strong></td><td><strong>KM's</strong></td><td><strong>Fuel Costing (excluding tax and admin)</strong></td><td></td><td><strong>Amount Billable</strong></td></tr>
    <?php
    if(isset($equip))
    foreach($equip as $eq)
    {
        
        if(in_array($eq['Equipment']['items'],$arr2)){
             $total = $eq['Equipment']['total'];
            $tax = $eq['Equipment']['tax'];
            $a_fee = $eq['Equipment']['a_fee'];
            $g_total = $eq['Equipment']['g_total'];
             if($eq['Equipment']['qty']<1)
                $eq['Equipment']['qty1']=1;
             else
                $eq['Equipment']['qty1']=$eq['Equipment']['qty'];
      ?>
    <tr><td id="<?php echo $eq['Equipment']['amount_billable']/$eq['Equipment']['qty1'];?>"><input type="text" style="width:160px;" name="Equipment[items][]" value="<?php echo $eq['Equipment']['items'];?>" readonly /></td><td><input class="quantity" type="text" name="Equipment[qty][]" value="<?php echo $eq['Equipment']['qty'];?>"/></td><td><input type="text" name="Equipment[kms][]" value="<?php echo $eq['Equipment']['kms'];?>"/></td><td><input value="<?php echo $eq['Equipment']['fuel_cost'];?>" type="text" name="Equipment[fuel_cost][]" class="total fuel_cost"/></td><td></td><td><input value="$<?php echo $eq['Equipment']['amount_billable'];?>" type="text" name="Equipment[amount_billable][]" class="total" readonly/><a href="javascript:void(0)" class ="btn btn-danger btn-small" style="margin:0 0 3px 10px;" onclick="$(this).closest('tr').remove();">X</a></td></tr>  
      <?php  
      }
    }
    ?>
    
</table>

<table>
<tr><td><strong>Total: <span class="g_tot"><?php if(isset($pers)) echo $total;?></span></strong><input type="hidden" name="total" value="<?php if(isset($pers)) echo $total;?>" id="g_tot"  /></td></tr>
<tr><td><strong>Tax: <span class="tax">$<?php if(isset($pers)) echo $tax;?></span></strong><input type="hidden" name="tax" value="<?php if(isset($pers)) echo $tax;?>" id="tax"  /></td></tr>
<tr><td><strong>Admin Fee: <span class="a_fee">$<?php if(isset($pers)) echo $a_fee;?></span></strong><input type="hidden" name="a_fee" value="<?php if(isset($pers)) echo $a_fee;?>" id="a_fee"  /></td></tr>
<tr><td><strong>Grand Total: <span class="g2_tot">$<?php if(isset($pers)) echo $g_total;?></span></strong><input type="hidden" name="g2_tot" value="<?php if(isset($pers)) echo $g_total;?>" id="g2_tot"  /></td></tr>
</table>
</td>
<style>
.misc2 input[type="text"],.misc input[type="text"],.dep input[type="text"]{width:55px;}
</style>
<script>
    
    $(function(){
       $('.time').timepicker();
        
        var tot = 0;
        var n_tot =0;
        $('.total').each(function(){
           tot= $(this).val();
           if(tot == '$' || !tot)
              tot = 0;
           else
           if(isNaN(tot))
           {
                tot_arr = tot.split("$");
                tot = tot_arr[1];
                //alert(tot);
           }
           tot = parseFloat(tot);
           n_tot = parseFloat(n_tot)+tot;
        $('.g_tot').html("$"+n_tot.toFixed(2));   
        });
        $('.addPersonnel').click(function(){
            if($('.personnel').val()=="")
            return false;
           
            var opts = $('.personnel').val().split("_");
            var main_val = opts[0];
            var hr_rate = opts[1];
            var travel_rate = opts[2];
       $('.entries').show();
       $('.dep').append('<tr><td id="'+hr_rate+'_'+travel_rate+'"><input class="sg"  type="text" style="width:160px;" name="Personnel[position][]" value="'+main_val+'" readonly/></td><td><input class="staff" type="text" name="Personnel[no_of_staff][]" value=""/></td><td><input name="Personnel[start_time][]" type="text" class="time"/></td><td><input type="text" name="Personnel[end_time][]" class="time"/></td><td><input type="text" class="total_hours" name="Personnel[total_hours][]" readonly/></td><td><input type="text" class="hours_billable total" name="Personnel[hours_billable][]" value="$"  readonly/></td><td><input type="text" name="Personnel[travel][]" class="travel"/></td><td><input type="text" name="Personnel[travel_billable][]" value="$" class="total" readonly/></td><td><input type="text" name="Personnel[meal_amount][]" class="meal"/></td><td><input value="$" type="text" name="Personnel[meal_billable][]" readonly class="total"/><a href="javascript:void(0)" class ="btn btn-danger btn-small" style="margin:0 0 3px 10px;" onclick="$(this).closest(\'tr\').remove();">X</a></td></tr>') 
        $('.time').timepicker();
    });
    
    $('.time').live('change',function(){
        var str_time = $(this).closest('tr').children('td:nth-child(3)').children('input').val();
        var end_time = $(this).closest('tr').children('td:nth-child(4)').children('input').val();
        
        var st_arr = str_time.split(":");
        //alert(st_arr);
        var start_sec = st_arr[0]*60*60 + (st_arr[1]*60);
        var end_arr = end_time.split(":");
        //alert(end_arr);
        var end_sec = end_arr[0]*60*60+(end_arr[1]*60);
        //alert('1:'+start_sec+"2:"+end_sec);
        if(start_sec > end_sec)
        {
            alert("End time can't be less than start time.");
            $(this).val("");
            $(this).closest('tr').children('td:nth-child(5)').children('input').val(0);
        }
        else
        {
            var m_min = (end_sec-start_sec)/3600;
            if(!m_min)
                m_min = 0;
            else
                m_min = m_min.toFixed(2);
            if(m_min)
            $(this).closest('tr').children('td:nth-child(5)').children('input').val(m_min);
        }
        
        
        
        var st = $(this).closest('tr').children('td:nth-child(2)').children('input').val();
        
        if(!st)
            st=0;
        else
            st = parseFloat(st);
         //alert(st);   
        var hr = $(this).closest('tr').children('td:nth-child(5)').children('input').val();
        
        if(!hr)
            hr=0;
        else
            hr = parseFloat(hr);
        //alert(hr);
            
        var pers = $(this).closest('tr').children('td:first').attr('id');
        var optn = pers.split("_");
        var hr_rate = parseFloat(optn[0]);
        if(!hr_rate)
        hr_rate = 0;
        //alert(hr_rate);
        //alert(st);
        //alert(hr);
        var travel_rate = parseFloat(optn[1]);
        var hours_billable = hr_rate*st*hr;
        //alert(hours_billable);
        $(this).closest('tr').children('td:nth-child(6)').children('input').val('$'+hours_billable);
        var tot = 0;
        var n_tot =0;
        $('.total').each(function(){
           tot= $(this).val();
           if(tot == '$' || !tot)
              tot = 0;
           else
           if(isNaN(tot))
           {
                tot_arr = tot.split("$");
                tot = tot_arr[1];
                //alert(tot);
           }
           tot = parseFloat(tot);
           n_tot = parseFloat(n_tot)+tot;
           var tax = parseFloat(n_tot)*.13;
           var a_tax = parseFloat('<?php echo $rate['DeploymentRate']['admin'];?>');
           var a_fee = parseFloat(n_tot)* a_tax/100;
           var g2 = n_tot + tax + a_fee;
        $('.g_tot').html("$"+n_tot.toFixed(2)); 
        $('.tax').html("$"+tax.toFixed(2)); 
        $('.a_fee').html("$"+a_fee.toFixed(2)); 
        $('.g2_tot').html("$"+g2.toFixed(2)); 
        $('#g_tot').val(n_tot.toFixed(2)); 
        $('#tax').val(tax.toFixed(2)); 
        $('#a_fee').val(a_fee.toFixed(2)); 
        $('#g2_tot').val(g2.toFixed(2)); 
          
        });
       
        
        
    });
        $('.add_misc').click(function(){
            $('.misc').show();
            
        });
        $('.go_misc').click(function(){
              
               if($('.misc_opt').val()=="")
                return false;
               $('.misc_entries').show();
               var newopt = $('.misc_opt').val().split('_');
               var mv = newopt[0];
               var mid = newopt[1];
               if(mv=='Hotel')
               {
                var cost = '<?php echo $rate['DeploymentRate']['hotelcost_day'];?>';
               }
               else
               cost ='';
               if(cost)
               cost= parseFloat(cost);
               $('.misc').append('<tr><td id="'+mid+'"><input type="hidden" name="Equipment[kms][]" /><input type="hidden" name="Equipment[fuel_cost][]" /><input type="text" style="width:160px;" name="Equipment[items][]" value="'+mv+'" readonly/></td><td><input class="quantity" type="text" name="Equipment[qty][]"/></td><td></td><td></td><td></td><td><input value="$" type="text" name="Equipment[amount_billable][]" class="total" readonly/><a href="javascript:void(0)" class ="btn btn-danger btn-small" style="margin:0 0 3px 10px;" onclick="$(this).closest(\'tr\').remove();">X</a></td></tr>'); 
            });
            $('.go_misc2').click(function(){
              
               if($('.misc_opt2').val()=="")
                return false;
               $('.misc_entries2').show();
               var newopt = $('.misc_opt2').val().split('_');
               var mv = newopt[0];
               var mid = newopt[1];
               if(mv=='Hotel')
               {
                var cost = '<?php echo $rate['DeploymentRate']['hotelcost_day'];?>';
               }
               else
               cost ='';
               if(cost)
               cost= parseFloat(cost);
               $('.misc2').append('<tr><td id="'+mid+'"><input type="text" style="width:160px;" name="Equipment[items][]" value="'+mv+'" readonly/></td><td><input class="quantity" type="text" name="Equipment[qty][]"/></td><td><input type="text" name="Equipment[kms][]"/></td><td><input value="$" type="text" name="Equipment[fuel_cost][]" class="total fuel_cost"/></td><td></td><td><input value="$" type="text" name="Equipment[amount_billable][]" class="total" readonly/><a href="javascript:void(0)" class ="btn btn-danger btn-small" style="margin:0 0 3px 10px;" onclick="$(this).closest(\'tr\').remove();">X</a></td></tr>'); 
            });
    });
    var st=0;
    var hr=0;
    $('.staff').live('keyup',function(){
        
        var st = $(this).closest('tr .staff').val();
        
        if(!st)
            st=0;
        else
            st = parseFloat(st);
            
        var hr = $(this).closest('tr').children('td:nth-child(5)').children('input').val();
        
        if(!hr)
            hr=0;
        else
            hr = parseFloat(hr);
        
            
        var pers = $(this).closest('tr').children('td:first').attr('id');
        var optn = pers.split("_");
        var hr_rate = parseFloat(optn[0]);
        //alert(hr_rate);
        var travel_rate = parseFloat(optn[1]);
        var hours_billable = hr_rate*st*hr;
        //alert(hours_billable);

        $(this).closest('tr').children('td:nth-child(6)').children('input').val(hours_billable.toFixed(2));
        var tot = 0;
        var n_tot =0;
        $('.total').each(function(){
           tot= $(this).val();
           if(tot == '$' || !tot)
              tot = 0;
           else
           if(isNaN(tot))
           {
                tot_arr = tot.split("$");
                tot = tot_arr[1];
                //alert(tot);
           }
           tot = parseFloat(tot);
           n_tot = parseFloat(n_tot)+tot;
            var tax = parseFloat(n_tot)*.13;
           var a_tax = parseFloat('<?php echo $rate['DeploymentRate']['admin'];?>');
           var a_fee = parseFloat(n_tot)* a_tax/100;
           var g2 = n_tot + tax + a_fee;
        $('.g_tot').html("$"+n_tot.toFixed(2)); 
        $('.tax').html("$"+tax.toFixed(2)); 
        $('.a_fee').html("$"+a_fee.toFixed(2)); 
        $('.g2_tot').html("$"+g2.toFixed(2)); 
        $('#g_tot').val(n_tot.toFixed(2)); 
        $('#tax').val(tax.toFixed(2)); 
        $('#a_fee').val(a_fee.toFixed(2)); 
        $('#g2_tot').val(g2.toFixed(2)); 
        });
        
        

        
            
        
        //$(par+' .hours_billable').val()
    });
    $('.total_hours').live('change',function(){
        
        var st = $(this).closest('tr').children('td:nth-child(2)').children('input').val();
        
        if(!st)
            st=0;
        else
            st = parseFloat(st);
         //alert(st);   
        var hr = $(this).closest('tr .total_hours').val();
        
        if(!hr)
            hr=0;
        else
            hr = parseFloat(hr);
        //alert(hr);
            
        var pers = $(this).closest('tr').children('td:first').attr('id');
        var optn = pers.split("_");
        var hr_rate = parseFloat(optn[0]);
        //alert(hr_rate);
        var travel_rate = parseFloat(optn[1]);
        var hours_billable = hr_rate*st*hr;
        //alert(hours_billable);

        $(this).closest('tr').children('td:nth-child(6)').children('input').val(hours_billable.toFixed(2));
       var tot = 0;
        var n_tot =0;
        $('.total').each(function(){
           tot= $(this).val();
           if(tot == '$' || !tot)
              tot = 0;
           else
           if(isNaN(tot))
           {
                tot_arr = tot.split("$");
                tot = tot_arr[1];
                //alert(tot);
           }
           tot = parseFloat(tot);
           n_tot = parseFloat(n_tot)+tot;
        var tax = parseFloat(n_tot)*.13;
           var a_tax = parseFloat('<?php echo $rate['DeploymentRate']['admin'];?>');
           var a_fee = parseFloat(n_tot)* a_tax/100;
           var g2 = n_tot + tax + a_fee;
        $('.g_tot').html("$"+n_tot.toFixed(2)); 
        $('.tax').html("$"+tax.toFixed(2)); 
        $('.a_fee').html("$"+a_fee.toFixed(2)); 
        $('.g2_tot').html("$"+g2.toFixed(2));
        $('#g_tot').val(n_tot.toFixed(2)); 
        $('#tax').val(tax.toFixed(2)); 
        $('#a_fee').val(a_fee.toFixed(2)); 
        $('#g2_tot').val(g2.toFixed(2));  
        });
        

        
            
        
        //$(par+' .hours_billable').val()
    });
    $('.travel').live('keyup',function(){
        
        var st = $(this).val();
        
        if(!st)
            st=0;
        else
            st = parseFloat(st);
            
       
        
            
        var pers = $(this).closest('tr').children('td:first').attr('id');
        var optn = pers.split("_");
        var hr_rate = parseFloat(optn[0]);
        //alert(hr_rate);
        var travel_rate = parseFloat(optn[1]);
        var hours_billable = travel_rate*st;
        //alert(hours_billable);

        $(this).closest('tr').children('td:nth-child(8)').children('input').val('$'+hours_billable.toFixed(2));
        var tot = 0;
        var n_tot =0;
        $('.total').each(function(){
           tot= $(this).val();
           if(tot == '$' || !tot)
              tot = 0;
           else
           if(isNaN(tot))
           {
                tot_arr = tot.split("$");
                tot = tot_arr[1];
                //alert(tot);
           }
           tot = parseFloat(tot);
           n_tot = parseFloat(n_tot)+tot;
        var tax = parseFloat(n_tot)*.13;
           var a_tax = parseFloat('<?php echo $rate['DeploymentRate']['admin'];?>');
           var a_fee = parseFloat(n_tot)* a_tax/100;
           var g2 = n_tot + tax + a_fee;
        $('.g_tot').html("$"+n_tot.toFixed(2)); 
        $('.tax').html("$"+tax.toFixed(2)); 
        $('.a_fee').html("$"+a_fee.toFixed(2)); 
        $('.g2_tot').html("$"+g2.toFixed(2)); 
        $('#g_tot').val(n_tot.toFixed(2)); 
        $('#tax').val(tax.toFixed(2)); 
        $('#a_fee').val(a_fee.toFixed(2)); 
        $('#g2_tot').val(g2.toFixed(2));    
        });
        

        
            
        
        //$(par+' .hours_billable').val()
    });
    $('.quantity').live('keyup',function(){
        
        var st = $(this).val();
        
        if(!st)
            st=0;
        else
            st = parseFloat(st);
            
       
        
            
        var pers = $(this).closest('tr').children('td:first').attr('id');
        
        var hr_rate = parseFloat(pers);
        if(!hr_rate)
        hr_rate = 0;
        //alert(hr_rate);
        
        var hours_billable = hr_rate*st;
        //alert(hours_billable);

        $(this).closest('tr').children('td:nth-child(6)').children('input').val(hours_billable.toFixed(2));
        var tot = 0;
        var n_tot =0;
        $('.total').each(function(){
           tot= $(this).val();
           if(tot == '$' || !tot)
              tot = 0;
           else
           if(isNaN(tot))
           {
                tot_arr = tot.split("$");
                tot = tot_arr[1];
                //alert(tot);
           }
           tot = parseFloat(tot);
           n_tot = parseFloat(n_tot)+tot;
        var tax = parseFloat(n_tot)*.13;
           var a_tax = parseFloat('<?php echo $rate['DeploymentRate']['admin'];?>');
           var a_fee = parseFloat(n_tot)* a_tax/100;
           var g2 = n_tot + tax + a_fee;
        $('.g_tot').html("$"+n_tot.toFixed(2)); 
        $('.tax').html("$"+tax.toFixed(2)); 
        $('.a_fee').html("$"+a_fee.toFixed(2)); 
        $('.g2_tot').html("$"+g2.toFixed(2));
        $('#g_tot').val(n_tot.toFixed(2)); 
        $('#tax').val(tax.toFixed(2)); 
        $('#a_fee').val(a_fee.toFixed(2)); 
        $('#g2_tot').val(g2.toFixed(2));  
        });
     
        //$(par+' .hours_billable').val()
    });
    $('.fuel_cost').live('keyup', function(){
         var tot = 0;
        var n_tot =0;
        $('.total').each(function(){
           tot= $(this).val();
           if(tot == '$' || !tot)
              tot = 0;
           else
           if(isNaN(tot))
           {
                tot_arr = tot.split("$");
                tot = tot_arr[1];
                //alert(tot);
           }
           tot = parseFloat(tot);
           n_tot = parseFloat(n_tot)+tot;
            var tax = parseFloat(n_tot)*.13;
           var a_tax = parseFloat('<?php echo $rate['DeploymentRate']['admin'];?>');
           var a_fee = parseFloat(n_tot)* a_tax/100;
           var g2 = n_tot + tax + a_fee;
            $('.g_tot').html("$"+n_tot.toFixed(2)); 
            $('.tax').html("$"+tax.toFixed(2)); 
            $('.a_fee').html("$"+a_fee.toFixed(2)); 
            $('.g2_tot').html("$"+g2.toFixed(2));
            $('#g_tot').val(n_tot.toFixed(2)); 
            $('#tax').val(tax.toFixed(2)); 
            $('#a_fee').val(a_fee.toFixed(2)); 
            $('#g2_tot').val(g2.toFixed(2));  
            
        });
    });
    $('.meal').live('keyup',function(){
        
        var st = $(this).val();
        
        if(!st)
            st=0;
        else
            st = parseFloat(st);
            
       
        
            
        var pers = $(this).closest('tr').children('td:first').attr('id');
        var optn = pers.split("_");
        var hr_rate = parseFloat(optn[0]);
        //alert(hr_rate);
        var travel_rate = parseFloat(optn[1]);
        var meal_rate = '<?php echo $rate['DeploymentRate']['mealperdiems_day']?>';
        
        meal_rate = parseFloat(meal_rate);
        var hours_billable = meal_rate*st;
        //alert(hours_billable);

        $(this).closest('tr').children('td:nth-child(10)').children('input').val('$'+hours_billable.toFixed(2));
        var tot = 0;
        var n_tot =0;
        $('.total').each(function(){
           tot= $(this).val();
           if(tot == '$' || !tot)
              tot = 0;
           else
           if(isNaN(tot))
           {
                tot_arr = tot.split("$");
                tot = tot_arr[1];
                //alert(tot);
           }
           tot = parseFloat(tot);
           n_tot = parseFloat(n_tot)+tot;
        var tax = parseFloat(n_tot)*.13;
           var a_tax = parseFloat('<?php echo $rate['DeploymentRate']['admin'];?>');
           var a_fee = parseFloat(n_tot)* a_tax/100;
           var g2 = n_tot + tax + a_fee;
        $('.g_tot').html("$"+n_tot.toFixed(2)); 
        $('.tax').html("$"+tax.toFixed(2)); 
        $('.a_fee').html("$"+a_fee.toFixed(2)); 
        $('.g2_tot').html("$"+g2.toFixed(2)); 
        $('#g_tot').val(n_tot.toFixed(2)); 
        $('#tax').val(tax.toFixed(2)); 
        $('#a_fee').val(a_fee.toFixed(2)); 
        $('#g2_tot').val(g2.toFixed(2)); 
        });
        

            
        
        //$(par+' .hours_billable').val()
    });
    
    
</script>