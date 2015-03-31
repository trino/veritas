
<td colspan="3" class="loss_p" style="padding: 0;">
<table class="table table-bordered loss" style="width: 100%;">
    <tr><td colspan="6"><h2><?php echo $this->requestAction('dashboard/translate/Loss Prevention Incident Report');?></h2></td></tr>
    <tr><th colspan="6"><strong><?php echo $this->requestAction('dashboard/translate/STORE INFORMATION');?></strong></th></tr>
    <tr><td><?php echo $this->requestAction('dashboard/translate/INCIDENT TITLE');?><br />
        <input type="text" name="store[incident_title]" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['incident_title'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/DATE');?>(YYYY-MM-DD)<br /><input class="required" type="text" name="store[date]" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['date'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/DAY');?><br /><input type="text" name="store[day]" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['day'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/TIME');?><br /><input type="text" name="store[time]" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['time'];?>" /></td>
        <td colspan="2"><?php echo $this->requestAction('dashboard/translate/STORE NAME AND LOCATION');?><br />
        <input name="store[name]" type="text" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['name'];?>"  class="double" style="width: 300px!important;" /></td></tr>
    <tr><td><?php echo $this->requestAction('dashboard/translate/ADDRESS');?><br />
        <input type="text" name="store[address]" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['address'];?>" /></td>
        <td colspan="2"><?php echo $this->requestAction('dashboard/translate/CITY AND PROVINCE');?><br />
        <input class="double" type="text" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['state'];?>" name="store[state]" style="width: 300px!important;" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/PC');?><br />
        <input type="text" name="store[zip]" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['zip'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/PHONE');?><br /><input type="text" name="store[phone]" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['phone'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/EXTENSION');?><br /><input type="text" name="store[ext]" value="<?php if(isset($store['StoreInfo'])) echo $store['StoreInfo']['ext'];?>" /></td></tr>
</table>
<table class="table table-bordered loss2" style="width: 100%;">
    <tr><th colspan="9"><strong><?php echo $this->requestAction('dashboard/translate/SUBJECT INFORMATION');?></strong></th></tr>
    <tr><td colspan="3"><?php echo $this->requestAction('dashboard/translate/LAST NAME');?><br />
        <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['last_name'];?>" name="subject[last_name]" style="width: 200px!important;" /></td>
        <td colspan="2"><?php echo $this->requestAction('dashboard/translate/FIRST NAME');?><br />
        <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['first_name'];?>" name="subject[first_name]" style="width: 200px!important;" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/MIDDLE');?><br />
        <input type="text" name="subject[middle_name]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['middle_name'];?>" /></td>
        <td colspan="2"><?php echo $this->requestAction('dashboard/translate/ALIAS MAIDEN NAME');?><br />
        <input type="text" name="subject[alias]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['alias'];?>" style="width: 200px!important;" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/HOME PHONE');?><br />
        <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['h_phone'];?>" name="subject[h_phone]" /></td></tr>
    <tr><td colspan="4"><?php echo $this->requestAction('dashboard/translate/ADDRESS');?><br />
        <input type="text" name="subject[address]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['address'];?>" style="width: 335px!important;" /></td>
        <td colspan="2"><?php echo $this->requestAction('dashboard/translate/CITY AND PROVINCE');?><br />
        <input class="double" type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['state'];?>" name="subject[state]" style="width: 200px!important;" /></td>
        <td colspan="2">PC/P.O BOX<br />
        <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['zip'];?>" name="subject[zip]" style="width: 200px;" /></td>

        <td><?php echo $this->requestAction('dashboard/translate/GENDER');?><br /><input type="radio" name="subject[gender]" value="male" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['gender']=='male') echo "checked='checked'";?> style="margin: 0 5px;" /><?php echo $this->requestAction('dashboard/translate/Male');?> 
        <input type="radio" name="subject[gender]" value="female" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['gender']=='female') echo "checked='checked'";?> style="margin: 0 5px;" /><?php echo $this->requestAction('dashboard/translate/Female');?></td></tr>

    <tr><td>D.O.B<br />
        <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['dob'];?>" name="subject[dob]" /></td>
        <td colspan="2"><?php echo $this->requestAction('dashboard/translate/AGE');?><br />
        <input type="text" name="subject[age]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['age'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/RACE');?><br />
        <input type="text" name="subject[race]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['race'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/HEIGHT');?><br />
        <input type="text" name="subject[height]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['height'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/WEIGHT');?><br />
        <input type="text" name="subject[weight]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['weight'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/HAIR');?><br />
        <input type="text" name="subject[hair]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['hair'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/EYES');?><br />
        <input type="text" name="subject[eyes]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['eyes'];?>" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/TATTOOS');?><br />
        <input type="text" name="subject[tattoos]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['tattoos'];?>" /></td></tr>
    <tr><td colspan="2"><?php echo $this->requestAction('dashboard/translate/SCARS');?>/<?php echo $this->requestAction('dashboard/translate/MARKS');?><br />
        <input type="text" name="subject[scar]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['scar'];?>" /></td>
        <td colspan="3"><?php echo $this->requestAction('dashboard/translate/DISTINGUISHING FEATURES');?><br />
        <input type="text" name="subject[distinguishing]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['distinguishing'];?>" style="width: 235px!important;" /></td>
        <td colspan="2"><input type="radio" name="subject[adult]" value="adult" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['adult']=='adult') echo "checked='checked'";?>style="margin:0 5px;" /> <?php echo $this->requestAction('dashboard/translate/ADULT');?><br />
        <input type="radio" name="subject[adult]" value="juvenile" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['adult']=='juvenile') echo "checked='checked'";?>style="margin:0 5px;" /> <?php echo $this->requestAction('dashboard/translate/JUVENILE');?></td>
        <td colspan="2"><?php echo $this->requestAction('dashboard/translate/PARENTS NAME(IF JUVENILE)');?><br />
        <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['parents'];?>" name="subject[parents]" style="width: 150px!important;" /></td></tr>
    <tr><td colspan="2"><?php echo $this->requestAction('dashboard/translate/DRIVER LICENCE');?><br />
        <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['d_licence'];?>" name="subject[d_licence]" style="width: 130px!important;" /></td>
        <td colspan="2"><?php echo $this->requestAction('dashboard/translate/VEHICLE LICENCE');?><br />
        <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['v_licence'];?>" name="subject[v_licence]" style="width: 130px!important;" /></td>
        <td><?php echo $this->requestAction('dashboard/translate/OTHER ID CARDS');?><br />
        <input type="text" name="subject[other_id]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['other_id'];?>" /></td>
        <td colspan="4"><?php echo $this->requestAction('dashboard/translate/Employer');?><br />
        <input type="text" name="subject[photograph]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['photograph'];?>" style="width: 130px!important;" /></td>
        </td>
    <tr><td colspan="2"><?php echo $this->requestAction('dashboard/translate/OCCUPATION');?><br />
        <input type="text" name="subject[occupation]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['occupation'];?>" style="width: 130px!important;" /></td>
        <td colspan="7"><?php echo $this->requestAction('dashboard/translate/CLOTHING WORN (COMPLETE DESCRIPTION)');?><br />
        <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['clothing'];?>" name="subject[clothing]" style="width: 500px!important;" /></td></tr>
    <tr><td colspan="4"><?php echo $this->requestAction('dashboard/translate/REQUEST');?> / <?php echo $this->requestAction('dashboard/translate/COMMENTS MADE BY SUBJECT');?><br />
        <textarea name="subject[comments]" style="width: 335px;"><?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['comments'];?></textarea></td>
        <td colspan="5">COMPLIANCE<br />
        <input type="radio" name="subject[compliance]" value="good" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['compliance']=='good') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/GOOD');?> 
        <input type="radio" name="subject[compliance]" value="fair" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['compliance']=='fair') echo "checked='checked'";?>style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/FAIR');?> 
        <input type="radio" name="subject[compliance]" value="poor" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['compliance']=='poor') echo "checked='checked'";?>style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/POOR');?> 
        <input type="radio" name="subject[compliance]" value="resist" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['compliance']=='resist') echo "checked='checked'";?>style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/RESIST');?>
        <input type="radio" name="subject[compliance]" value="belligerent" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['compliance']=='belligerent') echo "checked='checked'";?>style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/BELLIGERENT');?></td></tr>
    <tr><td colspan="7"><?php echo $this->requestAction('dashboard/translate/NAMES OF OTHERS APPREHENDED (SEPARATE CASE REPORT FOR EACH SUBJECT)');?><br />
        <input type="text" name="subject[other_name]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['other_name'];?>" style="width: 500px!important;" /></td>
        <td colspan="2"><?php echo $this->requestAction('dashboard/translate/RELATED CASE DATE')."/STORE";?><br />
        <input type="text" name="subject[case_no]" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['case_no'];?>" style="width: 200px!important;" /></td></tr>
    </table>
<table class="loss table table-bordered">
<tr><th colspan="8"><?php echo $this->requestAction('dashboard/translate/LOSS PREVENTION SPECIALIST INFORMATION');?></th></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/LAST NAME');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['last_name'];?>" name="specialist[last_name]" /></td>
    <td colspan="2"><?php echo $this->requestAction('dashboard/translate/FIRST NAME');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['first_name'];?>" name="specialist[first_name]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/Employee')."#";?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['spec_id'];?>" name="specialist[spec_id]" /></td>
    <td colspan="3"><?php echo $this->requestAction('dashboard/translate/INTERVIEW BY');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['int_by'];?>" name="specialist[int_by]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/Employee')."#";?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['int_id'];?>" name="specialist[int_id]" /></td></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/INTERVIEW WITNESS');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['witness'];?>" name="specialist[witness]" /></td>
    <td colspan="2"><?php echo $this->requestAction('dashboard/translate/APPREHENDED BY');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['app_by'];?>" name="specialist[app_by]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/Employee')."#";?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['app_id'];?>" name="specialist[app_id]" /></td>
    <td colspan="3"><?php echo $this->requestAction('dashboard/translate/ASSISTED BY');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['assisted_by'];?>" name="specialist[assisted_by]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/Employee')."#";?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['assisted_id'];?>" name="specialist[assisted_id]" /></td></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/WEAPON SEARCH CONDUCTED BY');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['searched_by'];?>" name="specialist[searched_by]" /></td>
    <td colspan="2"><?php echo $this->requestAction('dashboard/translate/NAME OF WITNESS');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['witness_name'];?>" name="specialist[witness_name]" /></td>
    <td colspan="2"><?php echo $this->requestAction('dashboard/translate/HANDCUFFED USED');?><br />
    <input type="radio" name="specialist[handcuffed]" value="yes" <?php if(isset($special['SpecialistInfo']) && $special['SpecialistInfo']['handcuffed']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="specialist[handcuffed]" value="no" <?php if(isset($special['SpecialistInfo']) && $special['SpecialistInfo']['handcuffed']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
    <td colspan="3"><?php echo $this->requestAction('dashboard/translate/WHERE APPREHENDED');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['where'];?>" name="specialist[where]" style="width: 200px!important;" /></td></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/PROSECUTED');?><br />
    <input type="radio" name="specialist[prosecuted]" value="yes" <?php if(isset($special['SpecialistInfo']) && $special['SpecialistInfo']['prosecuted']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="specialist[prosecuted]" value="no" <?php if(isset($special['SpecialistInfo']) && $special['SpecialistInfo']['prosecuted']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
    <td colspan="2"><?php echo $this->requestAction('dashboard/translate/INTERVIEW TIME BEGAN');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['time_began'];?>" name="specialist[time_began]" /></td>
    <td colspan="2"><?php echo $this->requestAction('dashboard/translate/TIME COMPLETED');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['time_completed'];?>" name="specialist[time_completed]" /></td>
    <td colspan="2"><?php echo $this->requestAction('dashboard/translate/OTHERS INVOLVED');?><br />
    <input type="text" value="<?php if(isset($special['SpecialistInfo'])) echo $special['SpecialistInfo']['others'];?>" name="specialist[others]" /></td></tr>
</table>
<table class="table table-bordered loss3">
<tr><th colspan="4"><?php echo $this->requestAction('dashboard/translate/SUBJECT POSSESSIONS');?></th></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/WEAPONS');?><br />
    <input type="radio" name="subject[weapons]" value="yes" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['weapons']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?>  
    <input type="radio" name="subject[weapons]" value="no" <?php if(isset($subject['SubjectInfo']) && $subject['SubjectInfo']['weapons']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?> </td>
    <td><?php echo $this->requestAction('dashboard/translate/DESCRIBE');?><br />
    <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['weapon_desc'];?>" name="subject[weapon_desc]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/METHOD OF CONCEALMENT');?><br />
    <input type="text" value="<?php if(isset($subject['SubjectInfo'])) echo $subject['SubjectInfo']['concealment'];?>" name="subject[concealment]" /></td></tr>

</table>
<table class="table table-bordered">
<tr><th colspan="3"><?php echo $this->requestAction('dashboard/translate/PRODUCT DISPOSITION');?></th></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/PHOTOGRAPHED');?><br />
    <input type="radio" name="product[photographed]" value="yes" <?php if(isset($product['ProductDInfo']) && $product['ProductDInfo']['photographed']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
    <input type="radio" name="product[photographed]" value="no" <?php if(isset($product['ProductDInfo']) && $product['ProductDInfo']['photographed']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td>
<td><?php echo $this->requestAction('dashboard/translate/RELEASED TO PD');?><br />
    <input type="radio" name="product[released]" value="yes" <?php if(isset($product['ProductDInfo']) && $product['ProductDInfo']['released']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
    <input type="radio" name="product[released]" value="no" <?php if(isset($product['ProductDInfo']) && $product['ProductDInfo']['released']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td>
    <td><?php echo $this->requestAction('dashboard/translate/RETAINED AT STORE');?><br />
    <input type="radio" name="product[retained]" value="yes" <?php if(isset($product['ProductDInfo']) && $product['ProductDInfo']['retained']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
    <input type="radio" name="product[retained]" value="no" <?php if(isset($product['ProductDInfo']) && $product['ProductDInfo']['retained']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td></tr>
</table>
<table class="table table-bordered loss">
<tr><th colspan="6"><?php echo $this->requestAction('dashboard/translate/POLICE DEPARTMENT INFORMATION');?></th></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/POLICE OFFICER NAME');?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['name'];?>" name="police[name]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/POLICE AGENCY');?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['agency'];?>" name="police[agency]" /></td>
    <td colspan="4"><?php echo $this->requestAction('dashboard/translate/TIME (POLICE) MILITARY TIME ONLY');?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['time'];?>" name="police[time]" style="width: 500px!important;"/></td></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/POLICE BADGE');?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['badge'];?>" name="police[badge]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/INCIDENT');?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['incident'];?>" name="police[incident]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/CALL')." #1";?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['called'];?>" name="police[called]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/ETA');?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['eta'];?>" name="police[eta]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/ARRIVED');?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['arrived'];?>" name="police[arrived]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/LEFT');?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['left'];?>" name="police[left]" /></td></tr>
<tr>
    <td><?php echo $this->requestAction('dashboard/translate/CALL')."#2";?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['called2'];?>" name="police[called2]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/CALL')."#3";?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['called3'];?>" name="police[called3]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/CALL')."#4";?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['called4'];?>" name="police[called4]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/CALL')."#5";?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['called5'];?>" name="police[called5]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/CALL')."#6";?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['called6'];?>" name="police[called6]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/CALL')."#7";?><br />
    <input type="text" value="<?php if(isset($police['PoliceInfo'])) echo $police['PoliceInfo']['called7'];?>" name="police[called7]" /></td>
    
</tr>
</table>
<table class="table table-bordered loss">
<tr><th colspan="6"><?php echo $this->requestAction('dashboard/translate/YOUNG OFFENDERS RELEASE TO PARENT');?> / <?php echo $this->requestAction('dashboard/translate/GUARDIAN OR AUTHORIZED ADULT ONLY');?></th></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/LAST NAME OF ADULT');?><br />
    <input type="text" value="<?php if(isset($juv['JuvenileInfo'])) echo $juv['JuvenileInfo']['l_name_adult'];?>" name="juvenile[l_name_adult]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/FIRSTNAME OF ADULT');?><br />
    <input type="text" value="<?php if(isset($juv['JuvenileInfo'])) echo $juv['JuvenileInfo']['f_name_adult'];?>" name="juvenile[f_name_adult]" /></td>
    <td colspan="4"><?php echo $this->requestAction('dashboard/translate/TIME (GUARDIAN) MILITARY TIME ONLY');?><br />
    <input type="text" value="<?php if(isset($juv['JuvenileInfo'])) echo $juv['JuvenileInfo']['time'];?>" name="juvenile[time]" style="width: 500px!important;"/></td></tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/I.D. PRESENTED');?> / <?php echo $this->requestAction('dashboard/translate/EXPIRATION DATE');?><br />
    <input type="text" value="<?php if(isset($juv['JuvenileInfo'])) echo $juv['JuvenileInfo']['adult_id'];?>" name="juvenile[adult_id]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/PARENT');?> / <?php echo $this->requestAction('dashboard/translate/GUARDIAN IDENTIFICATION PICTURE TAKEN');?> <br />
    <input type="radio" name="juvenile[p_sign]" value="yes" <?php if(isset($juv['JuvenileInfo']) && $juv['JuvenileInfo']['p_sign']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
    <input type="radio" name="juvenile[p_sign]" value="no" <?php if(isset($juv['JuvenileInfo']) && $juv['JuvenileInfo']['p_sign']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td>
    <td><?php echo $this->requestAction('dashboard/translate/CALLED');?><br />
    <input type="text" value="<?php if(isset($juv['JuvenileInfo'])) echo $juv['JuvenileInfo']['called'];?>" name="juvenile[called]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/ETA');?><br />
    <input type="text" value="<?php if(isset($juv['JuvenileInfo'])) echo $juv['JuvenileInfo']['eta'];?>" name="juvenile[eta]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/ARRIVED');?><br />
    <input type="text" value="<?php if(isset($juv['JuvenileInfo'])) echo $juv['JuvenileInfo']['arrived'];?>" name="juvenile[arrived]" /></td>
    <td><?php echo $this->requestAction('dashboard/translate/LEFT');?><br />
    <input type="text" value="<?php if(isset($juv['JuvenileInfo'])) echo $juv['JuvenileInfo']['left'];?>" name="juvenile[left]" /></td></tr>
</table>
<table class="table table-bordered loss">
<tr><th>CHARGES</th>
    <th><?php echo $this->requestAction('dashboard/translate/CIVIL DEMAND NOTICE');?></th>
    <th>GSOC INTEL</th>
</tr>
<tr><td><?php echo $this->requestAction('dashboard/translate/ACCUSED CHARGED');?> 
    <input type="radio" name="notice[accused_charged]" value="yes" <?php if(isset($notice['NoticeInfo']) && $notice['NoticeInfo']['accused_charged']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
    <input type="radio" name="notice[accused_charged]" value="no" <?php if(isset($notice['NoticeInfo']) && $notice['NoticeInfo']['accused_charged']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?>
    </td>
    
    <td><?php echo $this->requestAction('dashboard/translate/GIVEN TO SUBJECT');?> 
    <input type="radio" name="notice[given]" value="yes" <?php if(isset($notice['NoticeInfo']) && $notice['NoticeInfo']['given']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
    <input type="radio" name="notice[given]" value="no" <?php if(isset($notice['NoticeInfo']) && $notice['NoticeInfo']['given']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?>
    </td>
    <td><?php echo $this->requestAction('dashboard/translate/CONTACT')." (424) 702-4512";?> 
    <input type="radio" name="notice[contact]" value="yes" <?php if(isset($notice['NoticeInfo']) && $notice['NoticeInfo']['contact']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
    <input type="radio" name="notice[contact]" value="no" <?php if(isset($notice['NoticeInfo']) && $notice['NoticeInfo']['contact']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?>
    <br />
    <?php echo $this->requestAction('dashboard/translate/IF NO, WHY NOT');?>? 
    <textarea name="notice[desc]"><?php if(isset($notice['NoticeInfo'])) echo $notice['NoticeInfo']['desc'];?></textarea></td>

    
</tr>
<tr>
    <td colspan="2"></td>
    <td>
    <?php echo $this->requestAction('dashboard/translate/POSITIVE HIT')." (424) 702-4512";?> 
    <input type="radio" name="notice[positive]" value="yes" <?php if(isset($notice['NoticeInfo']) && $notice['NoticeInfo']['positive']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
    <input type="radio" name="notice[positive]" value="no" <?php if(isset($notice['NoticeInfo']) && $notice['NoticeInfo']['positive']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td>
</tr>    
</table>
<table class="table table-bordered loss">
    <tr><th colspan="5"><?php echo $this->requestAction('dashboard/translate/ADDITIONAL INCIDENT INFORMATION');?></th></tr>
    <tr><td>ORC 
        <input type="radio" name="additional[orc]" value="yes" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['orc']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
        <input type="radio" name="additional[orc]" value="no" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['orc']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td>
        <td><?php echo $this->requestAction('dashboard/translate/FORCE');?> 
        <input type="radio" name="additional[force]" value="yes" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['force']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
        <input type="radio" name="additional[force]" value="no" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['force']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td>
        <td><?php echo $this->requestAction('dashboard/translate/SHOPLIFT TOOL');?> 
        <input type="radio" name="additional[shoplift]" value="yes" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['shoplift']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
        <input type="radio" name="additional[shoplift]" value="no" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['shoplift']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td>
        <td><?php echo $this->requestAction('dashboard/translate/WEAPON USED');?> 
        <input type="radio" name="additional[weapon_used]" value="yes" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['weapon_used']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
        <input type="radio" name="additional[weapon_used]" value="no" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['weapon_used']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td>
        <td><?php echo $this->requestAction('dashboard/translate/DEFEATED SENSOR');?> 
        <input type="radio" name="additional[defeated_sensor]" value="yes" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['defeated_sensor']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/Yes');?> 
        <input type="radio" name="additional[defeated_sensor]" value="no" <?php if(isset($add['AdditionalInfo']) && $add['AdditionalInfo']['defeated_sensor']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> <?php echo $this->requestAction('dashboard/translate/No');?></td>
        </td>
    </tr>
</table>
<table class="table table-bordered loss">
<?php //var_dump($item);?>
<tr><th colspan="8"><?php echo $this->requestAction('dashboard/translate/ITEM DESCRIPTION');?></th></tr>
<tr><td colspan="6" style="border-top:none;border-left:none;"></td>
    <td colspan="2" style="border-top: none;"><?php echo $this->requestAction('dashboard/translate/CASE');?><br />
    <input type="text" name="item_case" value="<?php if(isset($item)) echo $item[0]['ItemInfo']['case'];?>" /></td></tr>
<tr><td>#</td><td><?php echo $this->requestAction('dashboard/translate/ITEM DESCRIPTION');?></td><td><?php echo $this->requestAction('dashboard/translate/SKU NUMBER');?></td><td><?php echo $this->requestAction('dashboard/translate/PRICE');?> $</td><td>#</td><td><?php echo $this->requestAction('dashboard/translate/ITEM DESCRIPTION');?></td><td><?php echo $this->requestAction('dashboard/translate/SKU NUMBER');?></td><td><?php echo $this->requestAction('dashboard/translate/PRICE');?> $</td></tr>
<tr><td>1<input type="hidden" name="item[id][]" value="1" /></td>
    <td><input type="text" name="item[desc][]" value="<?php if(isset($item)) echo $item[0]['ItemInfo']['desc'];?>"  /></td>
    <td><input type="text" name="item[sku][]" value="<?php if(isset($item)) echo $item[0]['ItemInfo']['sku'];?>" style="width: 100px!important;" /></td>
    <td><input type="text" name="item[price][]" value="<?php if(isset($item)) echo $item[0]['ItemInfo']['price'];?>" style="width: 100px!important;" /></td>
    <td>2<input type="hidden" name="item[id][]" value="2" /></td>
    <td><input type="text" name="item[desc][]" value="<?php if(isset($item)) echo $item[1]['ItemInfo']['desc'];?>"  /></td>
    <td><input type="text" name="item[sku][]" value="<?php if(isset($item)) echo $item[1]['ItemInfo']['sku'];?>" style="width: 100px!important;" /></td>
    <td><input type="text"  name="item[price][]" value="<?php if(isset($item)) echo $item[1]['ItemInfo']['price'];?>" style="width: 100px!important;" /></td></tr>
<tr><td>3<input type="hidden" name="item[id][]" value="3" /></td>
    <td><input type="text" name="item[desc][]" value="<?php if(isset($item)) echo $item[2]['ItemInfo']['desc'];?>"  /></td>
    <td><input type="text" name="item[sku][]" value="<?php if(isset($item)) echo $item[2]['ItemInfo']['sku'];?>" style="width: 100px!important;" /></td>
    <td><input type="text" name="item[price][]" value="<?php if(isset($item)) echo $item[2]['ItemInfo']['price'];?>" style="width: 100px!important;" /></td>
    <td>4<input type="hidden" name="item[id][]" value="4" /></td>
    <td><input type="text" name="item[desc][]" value="<?php if(isset($item)) echo $item[3]['ItemInfo']['desc'];?>"  /></td>
    <td><input type="text" name="item[sku][]" value="<?php if(isset($item)) echo $item[3]['ItemInfo']['sku'];?>" style="width: 100px!important;" /></td>
    <td><input type="text" name="item[price][]" value="<?php if(isset($item)) echo $item[3]['ItemInfo']['price'];?>" style="width: 100px!important;" /></td></tr>
<tr><td>5<input type="hidden" name="item[id][]" value="5" /></td>
    <td><input type="text" name="item[desc][]" value="<?php if(isset($item)) echo $item[4]['ItemInfo']['desc'];?>"  /></td>
    <td><input type="text" name="item[sku][]" value="<?php if(isset($item)) echo $item[4]['ItemInfo']['sku'];?>" style="width: 100px!important;" /></td>
    <td><input type="text" name="item[price][]" value="<?php if(isset($item)) echo $item[4]['ItemInfo']['price'];?>" style="width: 100px!important;" /></td>
    <td>6<input type="hidden" name="item[id][]" value="6" /></td>
    <td><input type="text" name="item[desc][]" value="<?php if(isset($item)) echo $item[5]['ItemInfo']['desc'];?>" /></td>
    <td><input type="text" name="item[sku][]" value="<?php if(isset($item)) echo $item[5]['ItemInfo']['sku'];?>" style="width: 100px!important;" /></td>
    <td><input type="text" name="item[price][]" value="<?php if(isset($item)) echo $item[5]['ItemInfo']['price'];?>" style="width: 100px!important;" /></td></tr>
<tr><td>7<input type="hidden" name="item[id][]" value="7" /></td>
    <td><input type="text" name="item[desc][]" value="<?php if(isset($item)) echo $item[6]['ItemInfo']['desc'];?>"  /></td>
    <td><input type="text" name="item[sku][]" value="<?php if(isset($item)) echo $item[6]['ItemInfo']['sku'];?>" style="width: 100px!important;" /></td>
    <td><input type="text" name="item[price][]" value="<?php if(isset($item)) echo $item[6]['ItemInfo']['price'];?>" style="width: 100px!important;" /></td>
    <td>8<input type="hidden" name="item[id][]" value="8" /></td>
    <td><input type="text" name="item[desc][]"  value="<?php if(isset($item)) echo $item[7]['ItemInfo']['desc'];?>"  /></td>
    <td><input type="text" name="item[sku][]" value="<?php if(isset($item)) echo $item[7]['ItemInfo']['sku'];?>" style="width: 100px!important;" /></td>
    <td><input type="text" name="item[price][]" value="<?php if(isset($item)) echo $item[7]['ItemInfo']['price'];?>" style="width: 100px!important;" /></td></tr>
    <tr><td colspan="4" style=""></td><td colspan="2" style=""></td><td><?php echo $this->requestAction('dashboard/translate/TOTAL');?></td>
    <td><input type="text" value="<?php if(isset($item)) echo $item[0]['ItemInfo']['total'];?>" name="total" /></td></tr>
</table>
<table class="table table-bordered">
<tr><th><?php echo $this->requestAction('dashboard/translate/NARRATIVE');?></th></tr>
<tr><td><textarea  name="additional[narrative]" style="width: 95%;height: 500px;"><?php if(isset($add['AdditionalInfo'])) echo $add['AdditionalInfo']['narrative'];?> </textarea></td></tr>
</table>
</td>
<style>
.loss input[type="text"]{width:145px!important;}
.loss2 input[type="text"]{width:90px!important;}
.loss3 input[type="text"]{width:235px!important;}
.double{width:300px!important;}
</style>
<script>
$(function(){
   <?php if($this->params['action']=='view_detail')
   {?>
   
   $('.loss_p input').attr('readonly','readonly');
   $('.loss_p textarea').attr('readonly','readonly');
   $('.loss_p input:radio').attr('disabled','disabled');
   <?php } ?> 
});
</script>