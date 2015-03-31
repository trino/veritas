<td colspan="3" class="loss_p" style="padding: 0;">
<table class="table table-bordered payroll" style="width: 100%;">
    <tr>
        <th>Personal Information</th>
    </tr>
    <tr>
        <td>First Name </td>
        <td>
            <input type="text" name="payrol[f_name]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['f_name'];?>" />
        </td>
        <td>Last Name</td>
        <td>
            <input type="text" name="payrol[l_name]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['l_name'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Sex</td>
        <td colspan="3">
            <input type="radio" name="payrol[gender]" value="1" <?php if(isset($payroll['Payroll'])&& $payroll['Payroll']['gender']=='1')echo "checked='checked'";?>/> Male
            <input type="radio" name="payrol[gender]" value="0" <?php if(isset($payroll['Payroll'])&& $payroll['Payroll']['gender']=='0')echo "checked='checked'";?>/> Female
        </td>
    </tr>

    <tr>
        <td>Home</td>
        <td colspan="3">
            <input type="text" name="payrol[home]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['home'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Address (Line 2)</td>
        <td colspan="3"><input type="text" name="payrol[address]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['address'];?>"/></td>
    </tr>
    <tr>
        <td>City</td>
        <td colspan="3">
            <input type="text" name="payrol[city]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['city'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Province</td>
        <td >
            <input type="text" name="payrol[province]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['province'];?>"/>
        </td>
        <td>Postal Code</td>
        <td>
            <input type="text" name="payrol[postal]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['postal'];?>"/>
        </td>
    </tr>

    <tr>
        <td>Home Phone</td>
        <td>
            <input type="text" name="payrol[phone]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['phone'];?>"/>
        </td>
        <td>Cell Phone</td>
        <td>
            <input type="text" name="payrol[cell]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['cell'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td colspan="3">
            <input type="text" name="payrol[email]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['email'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Date of Birth</td>
        <td colspan="3">
            <input type="text" name="payrol[dob]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['dob'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Social Insurance Number</td>
        <td colspan="3">
            <input type="text" name="payrol[sin]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['sin'];?>"/>
        </td>
    </tr>
    
    <tr>
        <th colspan="4">Emergency Contact</th>
    </tr>
    <tr>
        <td>First Name</td>
        <td>
            <input type="text" name="payrol[e_fname]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['e_fname'];?>"/>
        </td>
        <td>Last Name</td>
        <td>
            <input type="text" name="payrol[e_lname]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['e_lname'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Relationship</td>
        <td colspan="3">
            <input type="text" name="payrol[relationship]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['relationship'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Home Phone</td>
        <td>
            <input type="text" name="payrol[e_phone]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['e_phone'];?>"/>
        </td>
        <td>Cell Phone</td>
        <td>
            <input type="text" name="payrol[e_cell]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['e_cell'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Work Phone</td>
        <td>
            <input type="text" name="payrol[w_phone]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['w_phone'];?>"/>
        </td>
        <td>Email</td>
        <td>
            <input type="text" name="payrol[e_email]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['e_email'];?>"/>
        </td>
    </tr>

    <tr>
        <td>Driver's License #</td>
        <td>
            <input type="text" name="payrol[license]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['license'];?>"/>
        </td>
        <td>Expiry Date</td>
        <td>
            <input type="text" name="payrol[expiry]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['expiry'];?>"/>
        </td>
    </tr>
    
    <tr>
        <td>Guard License #</td>
        <td>
            <input type="text" name="payrol[g_license]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['g_license'];?>"/>
        </td>
        <td>Expiry Date</td>
        <td>
            <input type="text" name="payrol[expiry1]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['expiry1'];?>"/>
        </td>
    </tr>

    <tr>
        <th colspan="4">ASAP Management to Complete ONLY</th>
    </tr>
    <tr>
        <td>First Day Worked</td>
        <td>
            <input type="text" name="payrol[fday]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['fday'];?>"/>
        </td>
        <td>Hourly Pay</td>
        <td>
            <input type="text" name="payrol[hourly]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['hourly'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Entitled to Benefits</td>
        <td>
            <input type="radio" name="payrol[benefit]" value="1" <?php if(isset($payroll['Payroll'])&& $payroll['Payroll']['benefit']=='1')echo "checked='checked'";?>/>Yes
            <input type="radio" name="payrol[benefit]" value="0" <?php if(isset($payroll['Payroll'])&& $payroll['Payroll']['benefit']=='0')echo "checked='checked'";?>/>No
        </td>
        <td>Benefits Effective</td>
        <td>
            <input type="text" name="payrol[effective]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['effective'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Completed By</td>
        <td>
            <input type="text" name="payrol[completed_by]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['completed_by'];?>"/>
        </td>
        <td>Date Completed</td>
        <td>
            <input type="text" name="payrol[completed_date]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['completed_date'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Job Classification</td>
        <td colspan="3">
            <input type="text" name="payrol[job]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['job'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Designated Site</td>
        <td colspan="3">
            <input type="text" name="payrol[site]" value="<?php if(isset($payroll['Payroll'])) echo $payroll['Payroll']['site'];?>"/>
        </td>
    </tr>

    <tr>
        <td colspan="4">Attachments</td>
    </tr>
    <tr>
        <td colspan="4">
            <input type="checkbox" name="payrol[td1f]" value="1" <?php if(isset($payroll['Payroll'])&& $payroll['Payroll']['td1f']=='1')echo "checked='checked'";?> /> TD1 Federal
            <input type="checkbox" name="payrol[tda1p]" value="1" <?php if(isset($payroll['Payroll'])&& $payroll['Payroll']['tda1p']=='1')echo "checked='checked'";?>/> TD1 Provincial
            <input type="checkbox" name="payrol[cpas]" value="1" <?php if(isset($payroll['Payroll'])&& $payroll['Payroll']['cpas']=='1')echo "checked='checked'";?>/> CPAS Card
            <input type="checkbox" name="payrol[voidc]" value="1" <?php if(isset($payroll['Payroll'])&& $payroll['Payroll']['voidc']=='1')echo "checked='checked'";?>/> Void Cheque
        </td>
    </tr>
</table>
</td>
<script>
$(function(){
   <?php if($this->params['action']=='view_detail')
   {?>
   
   $('.payroll input').attr('readonly','readonly');
   
   <?php } ?> 
});
</script>