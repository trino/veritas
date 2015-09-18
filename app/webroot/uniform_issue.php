<?php
$sizes = array('S','M','L','XL','2XL','3XL','4XL','5XL');
$qtys = array(1,2,3,4,5,6,7,8,9);
?>
<td colspan="3" style="background: #f5f5f5;padding:0;">
<table style="border-bottom: 1px solid #DDD;" class="uniform">
    <tr>
        <td colspan="5">
            <table style="width: 100%;">
            <thead>
                <th style="width: 62%;">
                    <table style="width: 60%;">
                    <tr style="border-bottom: 0px;">
                    <td>Employee name : </td><td><input style="wdith:205px" type="text" name="uniform[empname]" placeholder="Firstname, Lastname" value="<?php if(isset($uniform)){echo $uniform['UniformIssue']['empname'];}?>" /></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Division Number : </td><td><select name="uniform[divno]"><option value="02" <?php if(isset($uniform) && $uniform['UniformIssue']['divno']=='02'){?>selected="selected"<?php }?>>02</option><option value="04" <?php if(isset($uniform) && $uniform['UniformIssue']['divno']=='04'){?>selected="selected"<?php }?>>04</option><option value="05" <?php if(isset($uniform) && $uniform['UniformIssue']['divno']=='05'){?>selected="selected"<?php }?>>05</option><option value="07" <?php if(isset($uniform) && $uniform['UniformIssue']['divno']=='07'){?>selected="selected"<?php }?>>07</option></select></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Province : </td><td>
                    <select name="uniform[province_uni]">
                        <option value="Ontorio" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='Ontorio'){?>selected="selected"<?php }?>>Ontorio</option>
                        <option value="Quebec" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='Quebec'){?>selected="selected"<?php }?>>Quebec</option>
                        <option value="British Colombia" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='British Colombia'){?>selected="selected"<?php }?>>British Colombia</option>
                        <option value="Alberta" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='Alberta'){?>selected="selected"<?php }?>>Alberta</option>
                        <option value="Nova Scotia" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='Nova Scotia'){?>selected="selected"<?php }?>>Nova Scotia</option>
                        <option value="Manitoba" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='Manitoba'){?>selected="selected"<?php }?>>Manitoba</option>
                        <option value="Newfoundland and Labrador" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='Newfoundland and Labrador'){?>selected="selected"<?php }?>>Newfoundland and Labrador</option>
                        <option value="Prince Edward Island" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='Prince Edward Island'){?>selected="selected"<?php }?>>Prince Edward Island</option>
                        <option value="Saskatchewan" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='Saskatchewan'){?>selected="selected"<?php }?>>Saskatchewan</option>
                        <option value="New Brunswick" <?php if(isset($uniform) && $uniform['UniformIssue']['province_uni']=='New Brunswick'){?>selected="selected"<?php }?>>New Brunswick</option>         
                        
                    </select></td>
                    </tr>
                    </table>
                </th>
                
                <th>
                    <table style="">
                    <tr style="border-bottom: 0px;">
                    <td>Employee ID # : </td><td><input type="text" name="uniform[empid]" placeholder="" value="<?php if(isset($uniform)){echo $uniform['UniformIssue']['empid']; }?>" /></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Job # : </td><td><input type="text" name="uniform[jobno]" placeholder="" value="<?php if(isset($uniform)){echo $uniform['UniformIssue']['jobno']; }?>" /></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Deductible : </td><td>
                    <select name="uniform[deductible]">
                        <option value="Yes" <?php if(isset($uniform) && $uniform['UniformIssue']['deductible']=='Yes'){?>selected="selected"<?php }?>>Yes</option>
                        <option value="No" <?php if(isset($uniform) && $uniform['UniformIssue']['deductible']=='No'){?>selected="selected"<?php }?>>No</option>
                               
                        
                    </select></td>
                    </tr>
                    <tr style="border-bottom: 0px;">
                    <td>Grand Total issued  : </td><td><input type="text" id="grandtotissued" placeholder="$" readonly=""  value="$<?php if(isset($uniform)){echo $uniform['UniformIssue']['totalcost']; }?>" /></td>
                    </tr>
                    </table>
                </th>
            </thead>
            </table>
        </td>
    </tr>
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
        <td>
        <select name="uniform[no1]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no1']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost1']:"";?>" name="uniform[cost1]" readonly="readonly" /></td>
        <td>
        <select name="uniform[size1]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size1']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td>Grey Security Shirt - Short Sleeve</td>
        <td>$19.75</td>
        <td>
        <select name="uniform[no2]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no2']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost2']:"";?>" name="uniform[cost2]"readonly="readonly" /></td>
        <td>
        <select name="uniform[size2]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size2']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td>Red Security Shirt - Long Sleve</td>
        <td>$27.00</td>
        <td>
        <select name="uniform[no3]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no3']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost3']:"";?>" name="uniform[cost3]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size3]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size3']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td>Red Security Shirt - Short Sleve</td>
        <td>$26.00</td>
        <td>
        <select name="uniform[no25]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no25']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost25']:"";?>" name="uniform[cost25]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size25]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size25']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td>White Security Shirt - Long Sleve</td>
        <td>$228.50</td>
        <td>
        <select name="uniform[no26]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no26']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost26']:"";?>" name="uniform[cost26]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size26]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size26']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td>White Security Shirt - Short Sleve</td>
        <td>$25.00</td>
        <td>
        <select name="uniform[no27]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no27']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost27']:"";?>" name="uniform[cost25]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size27]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size27']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td>Black Security Sweater</td>
        <td>$49.00</td>
        <td>
        <select name="uniform[no4]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no4']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost4']:"";?>" name="uniform[cost4]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size4]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size4']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Retro-reflective Vest</td>
        <td>$48.75</td>
        <td>
        <select name="uniform[no5]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no5']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost5']:"";?>" name="uniform[cost5]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size5]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size5']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Black Reversible HV 4 in 1 Jacket</td>
        <td>$129.00</td>
        <td>
        <select name="uniform[no6]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no6']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost6']:"";?>" name="uniform[cost6]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size6]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size6']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Security Hat</td>
        <td>$7.20</td>
        <td>
        <select name="uniform[no7]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no7']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost7']:"";?>" name="uniform[cost7]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size7]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size7']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Security Toque</td>
        <td>$5.50</td>
        <td>
        <select name="uniform[no8]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no8']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost8']:"";?>" name="uniform[cost8]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size8]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size8']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Helly Hansen Jacket/pants</td>
        <td>$200.00</td>
        <td>
        <select name="uniform[no9]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no9']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost9']:"";?>" name="uniform[cost9]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size9]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size9']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Body Armour</td>
        <td>$615.00</td>
        <td>
        <select name="uniform[no10]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no10']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost10']:"";?>" name="uniform[cost10]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size10]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size10']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Handcuffs</td>
        <td>$53.00</td>
        <td>
        <select name="uniform[no11]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no11']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost11']:"";?>" name="uniform[cost11]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size11]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size11']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Hardhat</td>
        <td>$37.00</td>
        <td>
        <select name="uniform[no12]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no12']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost12']:"";?>" name="uniform[cost12]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size12]">
        <?php

        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size12']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Tie</td>
        <td>$3.50</td>
        <td>
        <select name="uniform[no13]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no13']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost13']:"";?>" name="uniform[cost13]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size13]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size13']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Epaulette's (Per Pair)</td>
        <td>$7.50</td>
        <td>
        <select name="uniform[no14]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no14']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost14']:"";?>" name="uniform[cost14]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size14]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size14']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Inner Belt</td>
        <td>$15.00</td>
        <td>
        <select name="uniform[no15]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no15']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost15']:"";?>" name="uniform[cost15]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size15]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size15']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Handcuff Case</td>
        <td>$20.00</td>
        <td>
        <select name="uniform[no16]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no16']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost16']:"";?>" name="uniform[cost16]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size16]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size16']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>Key Holder</td>
        <td>$10.00</td>
        <td>
        <select name="uniform[no17]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no17']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost17']:"";?>" name="uniform[cost17]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size17]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size17']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
     <tr>
        <td>511 Grey Pants</td>
        <td>$70.00</td>
        <td>
        <select name="uniform[no18]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no18']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost18']:"";?>" name="uniform[cost18]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size18]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size18']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td>Security Hand Book</td>
        <td>$5.00</td>
        <td>
        <select name="uniform[no28]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no28']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost28']:"";?>" name="uniform[cost18]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size28]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size28']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td><input type="text" name="uniform[item1]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['item1']:"";?>"/></td>
        <td><input type="text" name="uniform[rate1]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['rate1']:"";?>" class="number" id="rate"/></td>
        <td>
        <select name="uniform[no19]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no19']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost19']:"";?>" name="uniform[cost19]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size19]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size19']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td><input type="text" name="uniform[item2]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['item2']:"";?>"/></td>
        <td><input type="text" name="uniform[rate2]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['rate2']:"";?>" class="number" id="rate"/></td>
        <td>
        <select name="uniform[no20]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no20']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost20']:"";?>" name="uniform[cost20]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size20]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size20']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td><input type="text" name="uniform[item3]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['item3']:"";?>"/></td>
        <td><input type="text" name="uniform[rate3]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['rate3']:"";?>" class="number" id="rate"/></td>
        <td>
        <select name="uniform[no29]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no29']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost29']:"";?>" name="uniform[cost29]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size29]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size29']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td><input type="text" name="uniform[item4]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['item4']:"";?>"/></td>
        <td><input type="text" name="uniform[rate4]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['rate4']:"";?>" class="number" id="rate"/></td>
        <td>
        <select name="uniform[no30]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no30']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost30']:"";?>" name="uniform[cost30]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size30]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size30']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
    </tr>
    <tr>
        <td><input type="text" name="uniform[item5]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['item5']:"";?>"/></td>
        <td><input type="text" name="uniform[rate5]" value="<?php echo(isset($uniform))?$uniform['UniformIssue']['rate5']:"";?>" class="number" id="rate"/></td>
        <td>
        <select name="uniform[no31]" class="number">
        <option>Select Quantity</option>
        <?php
        foreach($qtys as $qty)
        {
            ?>
            <option value="<?php echo $qty;?>" <?php if(isset($uniform) && $qty==$uniform['UniformIssue']['no31']){?>selected=""<?php }?>><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        </td>
        <td><input class="cost" type="text" value="<?php echo(isset($uniform))?"$".$uniform['UniformIssue']['cost31']:"";?>" name="uniform[cost20]" readonly="readonly"/></td>
        <td>
        <select name="uniform[size31]">
        <?php
        foreach($sizes as $size)
        {
            ?>
            <option value="<?php echo $size;?>" <?php if(isset($uniform) && $size==$uniform['UniformIssue']['size31']){?>selected="selected"<?php }?>><?php echo $size;?></option>
            <?php
        }
        ?>
        
        </select>
        </td>
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
 <tr>
 <td colspan="5">
    <p>
        I, <?php echo(isset($uniform))?$uniform['UniformIssue']['name']:"";?>, agree that one of the following sums of money will be deducted from my pay until
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
        <p><input type="radio" name="uniform[radioamt]" value="25" readonly="" <?php if(isset($uniform) && $uniform['UniformIssue']['radioamt']==25){?>checked="checked"<?php }?>  /> $25 &nbsp; &nbsp; &nbsp; <input readonly="" type="radio" name="uniform[radioamt]" value="50" <?php if(isset($uniform) && $uniform['UniformIssue']['radioamt']==50){?>checked="checked"<?php }?>   /> $50 &nbsp; &nbsp; &nbsp; <input readonly="" type="radio" name="uniform[radioamt]" value="75" <?php if(isset($uniform) && $uniform['UniformIssue']['radioamt']==75){?>checked="checked"<?php }?>   /> $75 &nbsp; &nbsp; &nbsp; <input readonly="" type="radio" name="uniform[radioamt]" value="full" <?php if(isset($uniform) && $uniform['UniformIssue']['radioamt']=='full'){?>checked="checked"<?php }?>   /> Full Amount &nbsp; &nbsp; &nbsp; <input readonly="" type="radio" name="uniform[radioamt]" value="N/A" <?php if(isset($uniform) && $uniform['UniformIssue']['radioamt']=='N/A'){?>checked="checked"<?php }?>   /> N/A</p>
 </td>
 </tr>   
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
    $('#grandtotissued').val(tots);
    $('.totalcost').html('$'+tots);
})
</script>
<style>
.uniform input{width:80px;}

</style>