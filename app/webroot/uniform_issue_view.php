<table style="border-bottom: 1px solid #DDD;" class="uniform">
    <tr>
        <td colspan="5">
            <table style="width: 100%;">
            <thead>
                <th style="width: 62%;">
                    <table style="width: 60%;">
                    <tr style="border-bottom: 0px;">
                    <td>Employee name : </td><td><?php if(isset($uniform)){echo $uniform['UniformIssue']['empname'];}?></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Division Number : </td><td><?php if(isset($uniform)){echo $uniform['UniformIssue']['divno'];}?></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Province : </td><td>
                    <?php if(isset($uniform)){echo $uniform['UniformIssue']['province_uni'];}?>></td>
                    </tr>
                    </table>
                </th>
                
                <th>
                    <table style="">
                    <tr style="border-bottom: 0px;">
                    <td>Employee ID # : </td><td><?php if(isset($uniform)){echo $uniform['UniformIssue']['empid']; }?></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Job # : </td><td><?php if(isset($uniform)){echo $uniform['UniformIssue']['jobno']; }?></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Deductible : </td><td>
                    <?php if(isset($uniform)){echo $uniform['UniformIssue']['deductible'];}?></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Grand Total issued  : </td><td>$<?php if(isset($uniform)){echo $uniform['UniformIssue']['totalcost']; }?></td>
                    </tr>
                    </table>
                </th>
            </thead>
            </table>
        </td>
    </tr>
    <thead>
        <td colspan="2"><strong>Guard Name</strong>: <?php echo(isset($uniform))?$uniform['UniformIssue']['guard_name']:"";?></td>
        <td colspan="3"><strong>Job Number</strong>: <?php echo(isset($uniform))?$uniform['UniformIssue']['job_number']:"";?></td>
    </thead>
    <thead>
        <td><strong>Uniform Item</strong></td>
        <td><strong>Cost Per Item</strong></td>
        <td><strong>Number of Items</strong></td>
        <td>Total Cost</td>
        <td>Size</td>
    </thead>
    <tr>
        <td>Grey Security Shirt - Long Sleeve</td>
        <td>$20.25</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no1']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost1']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size1']:"";?></td>
    </tr>
    <tr>
        <td>Grey Security Shirt - Short Sleeve</td>
        <td>$19.75</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no2']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost2']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size2']:"";?></td>
    </tr>
    <tr>
        <td>Red Security Shirt - Long Sleve</td>
        <td>$27.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no3']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost3']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size3']:"";?></td>
    </tr>
    <tr>
        <td>Red Security Shirt - Short Sleve</td>
        <td>$26.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no25']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost25']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size25']:"";?></td>
    </tr>
    <tr>
        <td>White Security Shirt - Short Sleve</td>
        <td>$228.50</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no26']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost26']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size26']:"";?></td>
    </tr>
    <tr>
        <td>White Security Shirt - Long Sleve</td>
        <td>$25.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no27']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost27']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size27']:"";?></td>
    </tr>
    <tr>
        <td>Black Security Sweater</td>
        <td>$49.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no4']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost4']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size4']:"";?></td>
    </tr>
     <tr>
        <td>Retro-reflective Vest</td>
        <td>$48.75</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no5']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost5']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size5']:"";?></td>
    </tr>
     <tr>
        <td>Black Reversible HV 4 in 1 Jacket</td>
        <td>$129.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no6']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost6']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size6']:"";?></td>
    </tr>
     <tr>
        <td>Security Hat</td>
        <td>$7.20</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no7']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost7']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size7']:"";?></td>
    </tr>
     <tr>
        <td>Security Toque</td>
        <td>$5.50</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no8']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost8']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size8']:"";?></td>
    </tr>
     <tr>
        <td>Helly Hansen Jacket/pants</td>
        <td>$200.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no9']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost9']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size9']:"";?></td>
    </tr>
     <tr>
        <td>Body Armour</td>
        <td>$615.00</td>
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
        <td>Tie</td>
        <td>$3.50</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no13']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost13']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size13']:"";?></td>
    </tr>
     <tr>
        <td>Epaulette's (Per Pair)</td>
        <td>$7.50</td>
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
        <td>$10.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no17']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost17']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size17']:"";?></td>
    </tr>
    <tr>
        <td>511 Grey Pants</td>
        <td>$70.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no18']:"";?></td>
        <td><?php echo(isset($uniform))? "$".$uniform['UniformIssue']['cost18']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size18']:"";?></td>
    </tr>
    <tr>
        <td>Security Hand Book</td>
        <td>$5.00</td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no28']:"";?></td>
        <td><?php echo(isset($uniform))? "$".$uniform['UniformIssue']['cost28']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size28']:"";?></td>
    </tr>
    <tr>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['item1']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['rate1']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no19']:"";?></td>
        <td><?php echo(isset($uniform))? "$".$uniform['UniformIssue']['cost19']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size19']:"";?></td>
    </tr>
    <tr>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['item2']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['rate2']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no20']:"";?></td>
        <td><?php echo(isset($uniform))? "$".$uniform['UniformIssue']['cost20']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size20']:"";?></td>
    </tr>
    <tr>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['item3']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['rate3']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no29']:"";?></td>
        <td><?php echo(isset($uniform))? "$".$uniform['UniformIssue']['cost29']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size29']:"";?></td>
    </tr>
    <tr>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['item4']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['rate4']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no30']:"";?></td>
        <td><?php echo(isset($uniform))? "$".$uniform['UniformIssue']['cost30']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size30']:"";?></td>
    </tr>
    <tr>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['item5']:"";?></td>
        <td><?php echo(isset($uniform))?"$".$uniform['UniformIssue']['rate5']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['no31']:"";?></td>
        <td><?php echo(isset($uniform))? "$".$uniform['UniformIssue']['cost31']:"";?></td>
        <td><?php echo(isset($uniform))?$uniform['UniformIssue']['size31']:"";?></td>
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
 <tr><td colspan="5">&nbsp;Date: <?php echo(isset($uniform))?$uniform['UniformIssue']['date']:"";?></td></tr>
 <tr><td colspan="5">&nbsp;Charged?: <?php if(isset($uniform)&&$uniform['UniformIssue']['charged'])echo "&#10004;";else echo '&times;';?></td></tr>
 <tr>
    <td colspan="5">
        <p>
        I, <?php echo(isset($uniform))?$uniform['UniformIssue']['namefinal']:"";?>, agree that one of the following sums of money will be deducted from my pay until
        the total cost is deducted. Reimbursement will be done within a reasonable amount of time, as per        
        your supervisors' decision. 
        </p>
         
        <p>
        These deductions shall begin with my first pay period. Should my employment end for any reason         
        with A.S.A.P Secured Inc. prior to my uniform cost being fully paid, the total owing shall be deducted         
        from my final pay. 
        </p>
         
        <p>
        Upon full refund of all A.S.A.P Secured Inc. uniform pieces (with the exception of body armor) I will         
        be refunded 50% of the total cost of the uniform. The remaining 50% will be used for dry cleaning         
        and for the wear and tear of the uniform while in use.
        </p> 
        
         
        <p>
        I agree to return all A.S.A.P Secured Inc's uniform pieces including all logos, patches, insignias and         
        any items labelled "Security" that were provided to be upon termination of my employment 
        </p>
         
        <p>
        The employee is responsible for the purchase of black approved shoes or boots and cargo pants         
        prior to working his/her first shift. If you are unable to find the proper pants we are able to order         
        them for you.
        </p>
        
        <p>
        By clicking one of the boxes below, the employee gives consent for that specific amount to be         
        deducted from every paycheck until the total cost of the uniform has been paid.
        </p>
        <p><input type="radio" name="radioamt" value="25" disabled="disabled" <?php if((isset($uniform) && $uniform['UniformIssue']['radioamt']==25) || !isset($uniform)){?>checked="checked"<?php }?>  /> $25 &nbsp; &nbsp; &nbsp; <input disabled="disabled" type="radio" name="radioamt" value="50" <?php if(isset($uniform) && $uniform['UniformIssue']['radioamt']==50){?>checked="checked"<?php }?>   /> $50 &nbsp; &nbsp; &nbsp; <input disabled="disabled" type="radio" name="radioamt" value="75" <?php if(isset($uniform) && $uniform['UniformIssue']['radioamt']==75){?>checked="checked"<?php }?>   /> $75 &nbsp; &nbsp; &nbsp; <input disabled="disabled" type="radio" name="radioamt" value="full" <?php if(isset($uniform) && $uniform['UniformIssue']['radioamt']=='full'){?>checked="checked"<?php }?>   /> Full Amount &nbsp; &nbsp; &nbsp; <input disabled="disabled" type="radio" name="radioamt" value="N/A" <?php if(isset($uniform) && $uniform['UniformIssue']['radioamt']=='N/A'){?>checked="checked"<?php }?>   /> N/A</p>
        
    </td>
</tr>   
</table>
<div style="position: relative;padding:5px;">
                
            <?php
            
                if(isset($uniform) && $uniform['UniformIssue']['signature'])
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php if(isset($base_urls))echo $base_urls.'/';else echo $this->webroot;?>canvas/<?php echo $uniform['UniformIssue']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>


<style>
.uniform input{width:80px;}
.uniform input[type="radio"] {
    margin-top: 0;
    width: 33px;
}
</style>