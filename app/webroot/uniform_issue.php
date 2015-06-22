<td colspan="3" style="background: #f5f5f5;padding:0;">
<table style="border-bottom: 1px solid #DDD;" class="uniform">
    <thead>
        <td colspan="2"><strong>Guard Name</strong>: <input style="width: 190px;" type="text" name="guard_name" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['guard_name']:"";?>" /></td>
        <td colspan="3"><strong>Job Number</strong>: <input style="width: 190px;" type="text" name="job_number" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['job_number']:"";?>" /></td>
    </thead>
    <thead>
        <th><strong>Uniform Item</strong></th>
        <th><strong>Cost Per Item</strong></th>
        <th><strong>Number of Items</strong></th>
        <th>Total Cost</th>
        <th>Size</th>
    </thead>
    <tr>
        <td>Grey Security Shirt - Long Sleeve</td>
        <td>$20.25</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no1']:"";?>" name="uniform[no1]" class="number" /></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost1']:"";?>" name="uniform[cost1]" readonly="readonly" /></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size1']:"";?>" name="uniform[size1]" /></td>
    </tr>
    <tr>
        <td>Grey Security Shirt - Short Sleeve</td>
        <td>$19.75</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no2']:"";?>" name="uniform[no2]" class="number" /></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost2']:"";?>" name="uniform[cost2]"readonly="readonly" /></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size2']:"";?>" name="uniform[size2]" /></td>
    </tr>
    <tr>
        <td>Red Security Shirt</td>
        <td>$27.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no3']:"";?>" name="uniform[no3]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost3']:"";?>" name="uniform[cost3]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size3']:"";?>" name="uniform[size3]" /></td>
    </tr>
    <tr>
        <td>Black Security Sweater</td>
        <td>$49.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no4']:"";?>" name="uniform[no4]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost4']:"";?>" name="uniform[cost4]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size4']:"";?>" name="uniform[size4]" /></td>
    </tr>
     <tr>
        <td>Retro-reflective Vest</td>
        <td>$18.75</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no5']:"";?>" name="uniform[no5]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost5']:"";?>" name="uniform[cost5]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size5']:"";?>" name="uniform[size5]" /></td>
    </tr>
     <tr>
        <td>Black Jacket</td>
        <td>$129.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no6']:"";?>" name="uniform[no6]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost6']:"";?>" name="uniform[cost6]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size6']:"";?>" name="uniform[size6]" /></td>
    </tr>
     <tr>
        <td>Security Hat</td>
        <td>$7.20</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no7']:"";?>" name="uniform[no7]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost7']:"";?>" name="uniform[cost7]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size7']:"";?>" name="uniform[size7]" /></td>
    </tr>
     <tr>
        <td>Security Toque</td>
        <td>$5.50</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no8']:"";?>" name="uniform[no8]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost8']:"";?>" name="uniform[cost8]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size8']:"";?>" name="uniform[size8]" /></td>
    </tr>
     <tr>
        <td>Pants</td>
        <td>$30.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no9']:"";?>" name="uniform[no9]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost9']:"";?>" name="uniform[cost9]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size9']:"";?>" name="uniform[size9]" /></td>
    </tr>
     <tr>
        <td>Body Armour</td>
        <td>$541.27</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no10']:"";?>" name="uniform[no10]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost10']:"";?>" name="uniform[cost10]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size10']:"";?>" name="uniform[size10]" /></td>
    </tr>
     <tr>
        <td>Handcuffs</td>
        <td>$53.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no11']:"";?>" name="uniform[no11]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost11']:"";?>" name="uniform[cost11]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size11']:"";?>" name="uniform[size11]" /></td>
    </tr>
     <tr>
        <td>Hardhat</td>
        <td>$37.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no12']:"";?>" name="uniform[no12]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost12']:"";?>" name="uniform[cost12]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size12']:"";?>" name="uniform[size12]" /></td>
    </tr>
     <tr>
        <td>Flashlight</td>
        <td>$35.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no13']:"";?>" name="uniform[no13]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost13']:"";?>" name="uniform[cost13]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size13']:"";?>" name="uniform[size13]" /></td>
    </tr>
     <tr>
        <td>Duty Belt</td>
        <td>$40.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no14']:"";?>" name="uniform[no14]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost14']:"";?>" name="uniform[cost14]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size14']:"";?>" name="uniform[size14]" /></td>
    </tr>
     <tr>
        <td>Inner Belt</td>
        <td>$15.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no15']:"";?>" name="uniform[no15]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost15']:"";?>" name="uniform[cost15]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size15']:"";?>" name="uniform[size15]" /></td>
    </tr>
     <tr>
        <td>Handcuff Case</td>
        <td>$20.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no16']:"";?>" name="uniform[no16]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost16']:"";?>" name="uniform[cost16]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size16']:"";?>" name="uniform[size16]" /></td>
    </tr>
     <tr>
        <td>Key Holder</td>
        <td>$10.00</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no17']:"";?>" name="uniform[no17]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost17']:"";?>" name="uniform[cost17]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size17']:"";?>" name="uniform[size17]" /></td>
    </tr>
     <tr>
        <td>Black Suit</td>
        <td>$17.50</td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no18']:"";?>" name="uniform[no18]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost18']:"";?>" name="uniform[cost18]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size18']:"";?>" name="uniform[size18]" /></td>
    </tr>
    <tr>
        <td><input type="text" name="uniform[item1]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['item1']:"";?>"/></td>
        <td><input type="text" name="uniform[rate1]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['rate1']:"";?>" class="number" id="rate"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no19']:"";?>" name="uniform[no19]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost19']:"";?>" name="uniform[cost19]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size19']:"";?>" name="uniform[size19]" /></td>
    </tr>
    <tr>
        <td><input type="text" name="uniform[item2]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['item2']:"";?>"/></td>
        <td><input type="text" name="uniform[rate2]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['rate2']:"";?>" class="number" id="rate"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['no20']:"";?>" name="uniform[no20]" class="number"/></td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost20']:"";?>" name="uniform[cost20]" readonly="readonly"/></td>
        <td><input type="text" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['size20']:"";?>" name="uniform[size20]" /></td>
    </tr>
    
    <tr><td colspan="2"></td><td><strong>Total Cost <input id="tots" type="hidden" name="uniform[totalcost]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['totalcost']:"";?>"/></strong></td><td class="totalcost"><?php echo(isset($uniform))?"$ ".$uniform['UniformIssue']['totalcost']:"";?></td></tr>
   <tr><td colspan="5"></td></tr>
    <tr><td colspan="5">I, <input style="line-height: 0;border-radius: 0;box-shadow: none; height:15px;padding:0;" type="text" name="uniform[name]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['name']:"";?>"/>, agree that a total of <input type="text" name="uniform[val1]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['val1']:"";?>" style="width:50px;line-height: 0;border-radius: 0;box-shadow: none;height:15px;padding:0; " /> $50 <input type="text" name="uniform[val2]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['val2']:"";?>" style="width:50px;line-height: 0;border-radius: 0;box-shadow: none;height:15px;padding:0; "/> $75 <input type="text" name="uniform[val3]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['val3']:"";?>" style="width:50px;line-height: 0;border-radius: 0;box-shadow: none;height:15px;padding:0; "/> $ Full Amount, will be deducted from my pay until the total cost is deducted. Re-imbursement must be done within a reasonable amount of time, as per your supervisors’ discretion. 
    These deductions shall begin with my first pay period. Should my employment end for any reason with ASAP Secured Inc. prior to my uniform cost being fully paid, the total owing shall be deducted from my final pay. If your deduction is over $500, the amount deducted per pay is automatically $75.00.
    Upon full return of all ASAP Secured Inc. uniform pieces (with the exception of body armour), I will be refunded 50% of the total cost of the uniform. The remaining 50% will be used for dry cleaning and for the wear and tear of the uniform while in use. 
    </td></tr>
<tr><td colspan="5"></td></tr>
<tr><td colspan="5">I <input type="text" style="line-height: 0;border-radius: 0;box-shadow: none; height:15px;padding:0;"  name="uniform[name2]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['name2']:"";?>"/> agree to return all ASAP’s uniform pieces including all logos, patches, insignias and any items labelled “Security” that were provided to me upon termination of my employment. 

By signing this document, I agree to the terms set out herein. 
</td></tr>
 <tr><td colspan="5">&nbsp;Date:<input type="text" style="line-height: 0;border-radius: 0;box-shadow: none; height:15px;padding:0;" name="uniform[date]" class="date" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['date']:"";?>" /></td></tr>
 <tr><td colspan="5">&nbsp;Charged?:<input type="checkbox"  name="uniform[charged]" <?php if(isset($uniform) && $uniform['UniformIssue']['charged']){?>checked="checked"<?php }?> class="" value="1" /></td></tr>   
</table>
<div style="position: relative;padding:5px;">
            <div style="width: 50%;float:left;">
                <strong>SIGNATURE:</strong><br />
                    <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                        
                    </iframe>
            </div>        
            <?php
            
                if(isset($uniform) && $uniform['UniformIssue']['signature'])
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $uniform['UniformIssue']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>
</td>
<script>
$('.date').datepicker({dateFormat: 'yy-mm-dd'});
$('.number').change(function(){
    
    var id = $(this).attr('id');
    if(id == 'rate')
    {
        var no = $(this).parent().closest('tr').children(':nth-child(3)').children().val();
        if(isNaN(no))
            no = 0;
        var price = $(this).val();
            price = price.replace("$","");
        if(isNaN(price))
            price = 0;
        
    }
    else
    {
        var no = $(this).val();
        if(isNaN(no))
            no = 0;
        if($(this).parent().closest('tr').children(':nth-child(2)').children().attr('id') == 'rate')
            var price = $(this).parent().closest('tr').children(':nth-child(2)').children().val();
        else
            var price = $(this).parent().closest('tr').children(':nth-child(2)').text();
            price = price.replace("$","");
            if(isNaN(price))
            price = 0;
    }
    
    var cost = price * no;
        cost = cost.toFixed(2);
    //alert(cost);
    $(this).parent().closest('tr').children(':nth-child(4)').children().val("$"+cost);
    var tots = 0;
    $('.cost').each(function(){
        var v = $(this).val();
            v = v.replace('$',"");
        tots = Number(tots) + Number(v);
        
    });
    tots = tots.toFixed(2);
    $('#tots').val(tots);
    $('.totalcost').html('$'+tots);
})
</script>
<style>
.uniform input{width:80px;}

</style>