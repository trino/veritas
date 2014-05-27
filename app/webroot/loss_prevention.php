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
<div class="loss_p" >
<h2>Loss Prevention Incident Report</h2>
<table class="table table-bordered loss" style="width: 100%;">
    <tr><th colspan="6"><strong>STORE INFORMATION</strong></th></tr>
    <tr><td>INCIDENT TITLE<br />
        <input type="text" name="store[incident_title]" value="<?php if(isset($store)) echo $store['StoreInfo']['incident_title'];?>" /></td>
        <td>DATE(YYYY-MM-DD)<br /><input class="required" type="text" name="store[date]" value="<?php if(isset($store)) echo $store['StoreInfo']['date'];?>" /></td>
        <td>DAY<br /><input type="text" name="store[day]" value="<?php if(isset($store)) echo $store['StoreInfo']['day'];?>" /></td>
        <td>TIME<br /><input type="text" name="store[time]" value="<?php if(isset($store)) echo $store['StoreInfo']['time'];?>" /></td>
        <td colspan="2">STORE NAME AND LOCATION<br />
        <input name="store[name]" type="text" value="<?php if(isset($store)) echo $store['StoreInfo']['name'];?>"  class="double" style="width: 300px!important;" /></td></tr>
    <tr><td>ADDRESS<br />
        <input type="text" name="store[address]" value="<?php if(isset($store)) echo $store['StoreInfo']['address'];?>" /></td>
        <td colspan="2">CITY AND PROVINCE<br />
        <input class="double" type="text" value="<?php if(isset($store)) echo $store['StoreInfo']['state'];?>" name="store[state]" style="width: 300px!important;" /></td>
        <td>PC<br />
        <input type="text" name="store[zip]" value="<?php if(isset($store)) echo $store['StoreInfo']['zip'];?>" /></td>
        <td>PHONE<br /><input type="text" name="store[phone]" value="<?php if(isset($store)) echo $store['StoreInfo']['phone'];?>" /></td>
        <td>EXTENSION<br /><input type="text" name="store[ext]" value="<?php if(isset($store)) echo $store['StoreInfo']['ext'];?>" /></td></tr>
</table>
<table class="table table-bordered loss2" style="width: 100%;">
    <tr><th colspan="9"><strong>SUBJECT INFORMATION</strong></th></tr>
    <tr><td colspan="3">LAST NAME<br />
        <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['last_name'];?>" name="subject[last_name]" style="width: 200px!important;" /></td>
        <td colspan="2">FIRST NAME<br />
        <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['first_name'];?>" name="subject[first_name]" style="width: 200px!important;" /></td>
        <td>MIDDLE<br />
        <input type="text" name="subject[middle_name]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['middle_name'];?>" /></td>
        <td colspan="2">ALIAS MAIDEN NAME<br />
        <input type="text" name="subject[alias]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['alias'];?>" style="width: 200px!important;" /></td>
        <td>HOME PHONE<br />
        <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['h_phone'];?>" name="subject[h_phone]" /></td></tr>
    <tr><td colspan="4">ADDRESS<br />
        <input type="text" name="subject[address]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['address'];?>" style="width: 335px!important;" /></td>
        <td colspan="2">CITY AND PROVINCE<br />
        <input class="double" type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['state'];?>" name="subject[state]" style="width: 200px!important;" /></td>
        <td colspan="2">PC/P.O BOX<br />
        <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['zip'];?>" name="subject[zip]" style="width: 200px;" /></td>
        <td>GENDER<br /><input type="radio" name="subject[gender]" value="male" <?php if(isset($subject) && $subject['SubjectInfo']['gender']=='male') echo "checked='checked'";?> style="margin: 0 5px;" />Male 
        <input type="radio" name="subject[gender]" value="female" <?php if(isset($subject) && $subject['SubjectInfo']['gender']=='female') echo "checked='checked'";?> style="margin: 0 5px;" />Female</td></tr>
    <tr><td>D.O.B<br />
        <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['dob'];?>" name="subject[dob]" /></td>
        <td colspan="2">AGE<br />
        <input type="text" name="subject[age]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['age'];?>" /></td>
        <td>RACE<br />
        <input type="text" name="subject[race]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['race'];?>" /></td>
        <td>HEIGHT<br />
        <input type="text" name="subject[height]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['height'];?>" /></td>
        <td>WEIGHT<br />
        <input type="text" name="subject[weight]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['weight'];?>" /></td>
        <td>HAIR<br />
        <input type="text" name="subject[hair]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['hair'];?>" /></td>
        <td>EYES<br />
        <input type="text" name="subject[eyes]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['eyes'];?>" /></td>
        <td>TATTOOS<br />
        <input type="text" name="subject[tattoos]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['tattoos'];?>" /></td></tr>
    <tr><td colspan="2">SCARS/MARKS<br />
        <input type="text" name="subject[scar]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['scar'];?>" /></td>
        <td colspan="3">DISTINGUISHING FEATURES<br />
        <input type="text" name="subject[distinguishing]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['distinguishing'];?>" style="width: 235px!important;" /></td>
        <td colspan="2"><input type="radio" name="subject[adult]" value="adult" <?php if(isset($subject) && $subject['SubjectInfo']['adult']=='adult') echo "checked='checked'";?>style="margin:0 5px;" /> ADULT<br />
        <input type="radio" name="subject[adult]" value="juvenile" <?php if(isset($subject) && $subject['SubjectInfo']['adult']=='juvenile') echo "checked='checked'";?>style="margin:0 5px;" /> JUVENILE</td>
        <td colspan="2">PARENTS NAME(IF JUVENILE)<br />
        <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['parents'];?>" name="subject[parents]" style="width: 150px!important;" /></td></tr>
    <tr><td colspan="2">DRIVER LICENCE<br />
        <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['d_licence'];?>" name="subject[d_licence]" style="width: 130px!important;" /></td>
        <td colspan="2">VEHICLE LICENCE<br />
        <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['v_licence'];?>" name="subject[v_licence]" style="width: 130px!important;" /></td>
        <td>OTHER ID CARDS<br />
        <input type="text" name="subject[other_id]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['other_id'];?>" /></td>
        <td colspan="2">PHOTOGRAPH<br />
        <input type="text" name="subject[photograph]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['photograph'];?>" style="width: 130px!important;" /></td>
        <td colspan="2"><input type="radio" name="subject[employed]" value="employed" <?php if(isset($subject) && $subject['SubjectInfo']['employed']=='employed') echo "checked='checked'";?>style="margin:0 5px;" /> EMPLOYED<br />
        <input type="radio" name="subject[employed]" value="unemployed" <?php if(isset($subject) && $subject['SubjectInfo']['employed']=='unemployed') echo "checked='checked'";?>style="margin:0 5px;" /> UNEMPLOYED</td></tr>
    <tr><td colspan="2">OCCUPATION<br />
        <input type="text" name="subject[occupation]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['occupation'];?>" style="width: 130px!important;" /></td>
        <td colspan="7">CLOTHING WORN (COMPLETE DESCRIPTION)<br />
        <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['clothing'];?>" name="subject[clothing]" style="width: 500px!important;" /></td></tr>
    <tr><td colspan="4">REQUEST / COMMENTS MADE BY SUBJECT<br />
        <textarea name="subject[comments]" style="width: 335px;"><?php if(isset($subject)) echo $subject['SubjectInfo']['comments'];?></textarea></td>
        <td colspan="5">COMPLIANCE<br />
        <input type="radio" name="subject[compliance]" value="good" <?php if(isset($subject) && $subject['SubjectInfo']['compliance']=='good') echo "checked='checked'";?> style="margin: 0 5px;" /> GOOD 
        <input type="radio" name="subject[compliance]" value="fair" <?php if(isset($subject) && $subject['SubjectInfo']['compliance']=='fair') echo "checked='checked'";?>style="margin: 0 5px;" /> FAIR 
        <input type="radio" name="subject[compliance]" value="poor" <?php if(isset($subject) && $subject['SubjectInfo']['compliance']=='poor') echo "checked='checked'";?>style="margin: 0 5px;" /> POOR 
        <input type="radio" name="subject[compliance]" value="resist" <?php if(isset($subject) && $subject['SubjectInfo']['compliance']=='resist') echo "checked='checked'";?>style="margin: 0 5px;" /> RESIST
        <input type="radio" name="subject[compliance]" value="belligerent" <?php if(isset($subject) && $subject['SubjectInfo']['compliance']=='belligerent') echo "checked='checked'";?>style="margin: 0 5px;" /> BELLIGERENT</td></tr>
    <tr><td colspan="7">NAMES OF OTHERS APPREHENDED (SEPARATE CASE REPORT FOR EACH SUBJECT)<br />
        <input type="text" name="subject[other_name]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['other_name'];?>" style="width: 500px!important;" /></td>
        <td colspan="2">RELATED CASE NUMBER<br />
        <input type="text" name="subject[case_no]" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['case_no'];?>" style="width: 200px!important;" /></td></tr>
    </table>
<table class="loss table table-bordered">
<tr><th colspan="8">LOSS PREVENTION SPECIALIST INFORMATION</th></tr>
<tr><td>LAST NAME<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['last_name'];?>" name="specialist[last_name]" /></td>
    <td colspan="2">FIRST NAME<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['first_name'];?>" name="specialist[first_name]" /></td>
    <td>ID<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['spec_id'];?>" name="specialist[spec_id]" /></td>
    <td colspan="3">INTERVIEW BY<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['int_by'];?>" name="specialist[int_by]" /></td>
    <td>ID<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['int_id'];?>" name="specialist[int_id]" /></td></tr>
<tr><td>INTERVIEW WITNESS<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['witness'];?>" name="specialist[witness]" /></td>
    <td colspan="2">APPREHENDED BY<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['app_by'];?>" name="specialist[app_by]" /></td>
    <td>ID<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['app_id'];?>" name="specialist[app_id]" /></td>
    <td colspan="3">ASSISTED BY<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['assisted_by'];?>" name="specialist[assisted_by]" /></td>
    <td>ID<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['assisted_id'];?>" name="specialist[assisted_id]" /></td></tr>
<tr><td>WEAPON SEARCH CONDUCTED BY<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['searched_by'];?>" name="specialist[searched_by]" /></td>
    <td colspan="2">NAME OF WITNESS<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['witness_name'];?>" name="specialist[witness_name]" /></td>
    <td colspan="2">HANDCUFFED USED<br />
    <input type="radio" name="specialist[handcuffed]" value="yes" <?php if(isset($special) && $special['SpecialistInfo']['handcuffed']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="specialist[handcuffed]" value="no" <?php if(isset($special) && $special['SpecialistInfo']['handcuffed']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
    <td colspan="3">WHERE APPREHENDED<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['where'];?>" name="specialist[where]" style="width: 200px!important;" /></td></tr>
<tr><td>PROSECUTED<br />
    <input type="radio" name="specialist[prosecuted]" value="yes" <?php if(isset($special) && $special['SpecialistInfo']['prosecuted']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="specialist[prosecuted]" value="no" <?php if(isset($special) && $special['SpecialistInfo']['prosecuted']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
    <td>APPROVED BY<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['approved_by'];?>" name="specialist[approved_by]" /></td>
    <td colspan="2">INTERVIEW TIME BEGAN<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['time_began'];?>" name="specialist[time_began]" /></td>
    <td colspan="2">TIME COMPLETED<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['time_completed'];?>" name="specialist[time_completed]" /></td>
    <td colspan="2">OTHERS INVOLVED<br />
    <input type="text" value="<?php if(isset($special)) echo $special['SpecialistInfo']['others'];?>" name="specialist[others]" /></td></tr>
</table>
<table class="table table-bordered loss3">
<tr><th colspan="4">SUBJECT POSSESSIONS</th></tr>
<tr><td>CASH ON SUBJECT<br />
<input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['cash'];?>" name="subject[cash]" /></td>
    <td>WEAPONS<br />
    <input type="radio" name="subject[weapons]" value="yes" <?php if(isset($subject) && $subject['SubjectInfo']['weapons']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="subject[weapons]" value="no" <?php if(isset($subject) && $subject['SubjectInfo']['weapons']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No </td>
    <td>DESCRIBE<br />
    <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['weapon_desc'];?>" name="subject[weapon_desc]" /></td>
    <td>METHOD OF CONCEALMENT<br />
    <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['concealment'];?>" name="subject[concealment]" /></td></tr>
<tr><td>BANK CARDS<br />
    <input type="radio" name="subject[bankcards]" value="yes" <?php if(isset($subject) && $subject['SubjectInfo']['bankcards']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="subject[bankcards]" value="no" <?php if(isset($subject) && $subject['SubjectInfo']['bankcards']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No </td>
    <td>TYPE OF CARD(s)<br />
    <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['card_type'];?>" name="subject[card_type]" /></td>
    <td colspan="2">ADDITIONAL ITEMS IN POSESSIONS<br />
    <input type="text" value="<?php if(isset($subject)) echo $subject['SubjectInfo']['add_item'];?>" name="subject[add_item]" style="width: 335px!important;" /></td></tr>
</table>
<table class="table table-bordered">
<tr><th colspan="3">PRODUCT DISPOSITION</th></tr>
<tr><td>PHOTOGRAPHED<br />
    <input type="radio" name="product[photographed]" value="yes" <?php if(isset($product) && $product['ProductDInfo']['photographed']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="product[photographed]" value="no" <?php if(isset($product) && $product['ProductDInfo']['photographed']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
<td>RELEASED TO PD<br />
    <input type="radio" name="product[released]" value="yes" <?php if(isset($product) && $product['ProductDInfo']['released']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="product[released]" value="no" <?php if(isset($product) && $product['ProductDInfo']['released']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
    <td>RETAINED AT STORE<br />
    <input type="radio" name="product[retained]" value="yes" <?php if(isset($product) && $product['ProductDInfo']['retained']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="product[retained]" value="no" <?php if(isset($product) && $product['ProductDInfo']['retained']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td></tr>
</table>
<table class="table table-bordered loss">
<tr><th colspan="6">POLICE DEPARTMENT INFORMATION</th></tr>
<tr><td>POLICE OFFICER NAME<br />
    <input type="text" value="<?php if(isset($police)) echo $police['PoliceInfo']['name'];?>" name="police[name]" /></td>
    <td>POLICE AGENCY<br />
    <input type="text" value="<?php if(isset($police)) echo $police['PoliceInfo']['agency'];?>" name="police[agency]" /></td>
    <td colspan="4">TIME (POLICE) MILITARY TIME ONLY<br />
    <input type="text" value="<?php if(isset($police)) echo $police['PoliceInfo']['time'];?>" name="police[time]" style="width: 500px!important;"/></td></tr>
<tr><td>POLICE BADGE<br />
    <input type="text" value="<?php if(isset($police)) echo $police['PoliceInfo']['badge'];?>" name="police[badge]" /></td>
    <td>INCIDENT<br />
    <input type="text" value="<?php if(isset($police)) echo $police['PoliceInfo']['incident'];?>" name="police[incident]" /></td>
    <td>CALLED<br />
    <input type="text" value="<?php if(isset($police)) echo $police['PoliceInfo']['called'];?>" name="police[called]" /></td>
    <td>ETA<br />
    <input type="text" value="<?php if(isset($police)) echo $police['PoliceInfo']['eta'];?>" name="police[eta]" /></td>
    <td>ARRIVED<br />
    <input type="text" value="<?php if(isset($police)) echo $police['PoliceInfo']['arrived'];?>" name="police[arrived]" /></td>
    <td>LEFT<br />
    <input type="text" value="<?php if(isset($police)) echo $police['PoliceInfo']['left'];?>" name="police[left]" /></td></tr>
</table>
<table class="table table-bordered loss">
<tr><th colspan="6">JUVENILES RELEASE TO PARENT / GUARDIAN OR AUTHORIZED ADULT ONLY</th></tr>
<tr><td>LAST NAME OF ADULT<br />
    <input type="text" value="<?php if(isset($juv)) echo $juv['JuvenileInfo']['l_name_adult'];?>" name="juvenile[l_name_adult]" /></td>
    <td>FIRSTNAME OF ADULT<br />
    <input type="text" value="<?php if(isset($juv)) echo $juv['JuvenileInfo']['f_name_adult'];?>" name="juvenile[f_name_adult]" /></td>
    <td colspan="4">TIME (GUARDIAN) MILITARY TIME ONLY<br />
    <input type="text" value="<?php if(isset($juv)) echo $juv['JuvenileInfo']['time'];?>" name="juvenile[time]" style="width: 500px!important;"/></td></tr>
<tr><td>I.D. PRESENTED / EXPIRATION DATE<br />
    <input type="text" value="<?php if(isset($juv)) echo $juv['JuvenileInfo']['adult_id'];?>" name="juvenile[adult_id]" /></td>
    <td>PARENT / GUARDIAN SIGNATURE <br />
    <input type="text" value="<?php if(isset($juv)) echo $juv['JuvenileInfo']['p_sign'];?>" name="juvenile[p_sign]" /></td>
    <td>CALLED<br />
    <input type="text" value="<?php if(isset($juv)) echo $juv['JuvenileInfo']['called'];?>" name="juvenile[called]" /></td>
    <td>ETA<br />
    <input type="text" value="<?php if(isset($juv)) echo $juv['JuvenileInfo']['eta'];?>" name="juvenile[eta]" /></td>
    <td>ARRIVED<br />
    <input type="text" value="<?php if(isset($juv)) echo $juv['JuvenileInfo']['arrived'];?>" name="juvenile[arrived]" /></td>
    <td>LEFT<br />
    <input type="text" value="<?php if(isset($juv)) echo $juv['JuvenileInfo']['left'];?>" name="juvenile[left]" /></td></tr>
</table>
<table class="table table-bordered loss">
<tr><th>CIVIL DEMAND NOTICE</th></tr>
<tr><td>GIVEN TO SUBJECT 
    <input type="radio" name="notice[given]" value="yes" <?php if(isset($notice) && $notice['NoticeInfo']['given']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
    <input type="radio" name="notice[given]" value="no" <?php if(isset($notice) && $notice['NoticeInfo']['given']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td></tr>
<tr><td>IF NO, WHY NOT? 
    <textarea style="width: 500px;" name="notice[desc]"><?php if(isset($notice)) echo $notice['NoticeInfo']['desc'];?></textarea></td></tr>
</table>
<table class="table table-bordered loss">
    <tr><th colspan="5">ADDITIONAL INCIDENT INFORMATION</th></tr>
    <tr><td>ORC 
        <input type="radio" name="additional[orc]" value="yes" <?php if(isset($add) && $add['AdditionalInfo']['orc']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
        <input type="radio" name="additional[orc]" value="no" <?php if(isset($add) && $add['AdditionalInfo']['orc']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
        <td>FORCE 
        <input type="radio" name="additional[force]" value="yes" <?php if(isset($add) && $add['AdditionalInfo']['force']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
        <input type="radio" name="additional[force]" value="no" <?php if(isset($add) && $add['AdditionalInfo']['force']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
        <td>SHOPLIFT TOOL 
        <input type="radio" name="additional[shoplift]" value="yes" <?php if(isset($add) && $add['AdditionalInfo']['shoplift']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
        <input type="radio" name="additional[shoplift]" value="no" <?php if(isset($add) && $add['AdditionalInfo']['shoplift']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
        <td>WEAPON USED 
        <input type="radio" name="additional[weapon_used]" value="yes" <?php if(isset($add) && $add['AdditionalInfo']['weapon_used']=='yes') echo "checked='checked'";?> style="margin: 0 5px;" /> Yes 
        <input type="radio" name="additional[weapon_used]" value="no" <?php if(isset($add) && $add['AdditionalInfo']['weapon_used']=='no') echo "checked='checked'";?> style="margin: 0 5px;" /> No</td>
        <td></td></tr>
</table>
<table class="table table-bordered loss">
<tr><th colspan="8">ITEM DESCRIPTION</th></tr>
<tr><td colspan="6" style="border-top:none;border-left:none;"></td>
    <td colspan="2" style="border-top: none;">CASE<br />
    <input type="text" name="item_case" value="<?php if(isset($item)) echo $item[0]['ItemInfo']['case'];?>" /></td></tr>
<tr><td>#</td><td>ITEM DESCRIPTION</td><td>SKU NUMBER</td><td>PRICE $</td><td>#</td><td>ITEM DESCRIPTION</td><td>SKU NUMBER</td><td>PRICE $</td></tr>
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
    <tr><td colspan="4" style=""></td><td colspan="2" style=""></td><td>TOTAL</td>
    <td><input type="text" value="" /></td></tr>
</table>
<table class="table table-bordered">
<tr><th>NARRATIVE</th></tr>
<tr><td><textarea  name="additional[narrative]" style="width: 95%;height: 500px;"><?php if(isset($add)) echo $add['AdditionalInfo']['narrative'];?> </textarea></td></tr>
</table>
</div>