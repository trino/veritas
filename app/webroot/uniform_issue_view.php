<table style="border-bottom: 1px solid #DDD;" class="uniform">
    <thead>
        <th><strong>Uniform Item</strong></th>
        <th><strong>Cost Per Item</strong></th>
        <th><strong>Number of Items</strong></th>
        <th>Total Cost</th>
        <th>Size</th>
    </thead>
    <tr>
        <td>Grey Security Shirt - Long Sleeve</td>
        <td>$17.50</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no1']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost1']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size1']:"";?></td>
    </tr>
    <tr>
        <td>Grey Security Shirt - Short Sleeve</td>
        <td>$17.50</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no2']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost2']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size2']:"";?></td>
    </tr>
    <tr>
        <td>Red Security Shirt</td>
        <td>$17.50</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no3']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost3']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size3']:"";?></td>
    </tr>
    <tr>
        <td>Black Security Sweater</td>
        <td>$42.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no4']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost4']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size4']:"";?></td>
    </tr>
     <tr>
        <td>Retro-reflective Vest</td>
        <td>$14.75</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no5']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost5']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size5']:"";?></td>
    </tr>
     <tr>
        <td>Black Jacket</td>
        <td>$87.50</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no6']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost6']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size6']:"";?></td>
    </tr>
     <tr>
        <td>Security Hat</td>
        <td>$5.15</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no7']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost7']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size7']:"";?></td>
    </tr>
     <tr>
        <td>Security Toque</td>
        <td>$5.15</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no8']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost8']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size8']:"";?></td>
    </tr>
     <tr>
        <td>Pants</td>
        <td>$30.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no9']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost9']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size9']:"";?></td>
    </tr>
     <tr>
        <td>Body Armour</td>
        <td>$541.27</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no10']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost10']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size10']:"";?><td>
    </tr>
     <tr>
        <td>Handcuffs</td>
        <td>$53.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no11']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost11']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size11']:"";?></td>
    </tr>
     <tr>
        <td>Hardhat</td>
        <td>$37.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no12']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost12']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size12']:"";?></td>
    </tr>
     <tr>
        <td>Flashlight</td>
        <td>$35.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no13']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost13']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size13']:"";?></td>
    </tr>
     <tr>
        <td>Duty Belt</td>
        <td>$20.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no14']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost14']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size14']:"";?></td>
    </tr>
     <tr>
        <td>Inner Belt</td>
        <td>$15.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no15']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost15']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size15']:"";?></td>
    </tr>
     <tr>
        <td>Handcuff Case</td>
        <td>$20.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no16']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost16']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size16']:"";?></td>
    </tr>
     <tr>
        <td>Key Holder</td>
        <td>$8.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no17']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost17']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size17']:"";?></td>
    </tr>
     <tr>
        <td>Black Suit</td>
        <td>$17.50</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no18']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost18']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size18']:"";?></td>
    </tr>
    <tr><td colspan="2"></td><td><strong>Total Cost</strong></td><td class="totalcost"><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['totalcost']:"";?></td></tr>
   <tr><td colspan="5"></td></tr>
    <tr><td colspan="5">I, <?php echo(isset($uniform))?$uniform['UniformIssue']['name']:"";?>, agree that a total of <?php echo(isset($uniform))?$uniform['UniformIssue']['val1']:"";?> $50 <?php echo(isset($uniform))?$uniform['UniformIssue']['val2']:"";?> $75 <?php echo(isset($uniform))?$uniform['UniformIssue']['val3']:"";?> $ Full Amount, will be deducted from my pay until the total cost is deducted. Re-imbursement must be done within a reasonable amount of time, as per your supervisors’ discretion. 
    These deductions shall begin with my first pay period. Should my employment end for any reason with ASAP Secured Inc. prior to my uniform cost being fully paid, the total owing shall be deducted from my final pay. If your deduction is over $500, the amount deducted per pay is automatically $75.00.
    Upon full return of all ASAP Secured Inc. uniform pieces (with the exception of body armour), I will be refunded 50% of the total cost of the uniform. The remaining 50% will be used for dry cleaning and for the wear and tear of the uniform while in use. 
    </td></tr>
<tr><td colspan="5"></td></tr>
<tr><td colspan="5">I <?php echo(isset($uniform))?$uniform['UniformIssue']['name2']:"";?> agree to return all ASAP’s uniform pieces including all logos, patches, insignias and any items labelled “Security” that were provided to me upon termination of my employment. 

By signing this document, I agree to the terms set out herein. 
</td></tr>
 <tr><td>&nbsp;Date: <?php echo(isset($uniform))?$uniform['UniformIssue']['date']:"";?></td></tr>   
</table>
<div style="position: relative;padding:5px;">
                
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


<style>
.uniform input{width:80px;}
</style>