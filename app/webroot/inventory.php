<style>

.table-bordered input{width:100px;}
</style>
<tr class="inventory1_more" style="display: none;">
    <td colspan="2">
        <table class="table inventry_table">
            
            <tr>
                <td width="10%">Mobile Guard</td><td><input type="text" name="inventory[guard]" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['guard'];}?>" class="required" /></td>
            </tr>
            <tr>
                <td width="10%">Date</td><td><input type="text" name="inventory[date]" class="date_verify" value="<?php if(isset($inv) && $inv['MobileTrunk']['date']){echo $inv['MobileTrunk']['date'];}?>" /></td>
            </tr>
        </table>
        <?php if(isset($inv))
        {?>
           <input type="hidden" name="inv_id" value="<?php echo $inv['MobileTrunk']['id'];?>"/> 
       <?php  } ?>
        <table class="table table-bordered inventry_table">
            <tr>
                <td width="12.5%"><strong>Shirts - Grey</strong></td><td width="12.5%">Inventory</td><td width="12.5%">Start Time</td><td width="12.5%">End Time</td>
                <td width="12.5%"><strong>Shirts - Red</strong></td><td width="12.5%">Inventory</td><td width="12.5%">Start Time</td><td width="12.5%">End Time</td>
            </tr>
            <tr>
                <td>S</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv1']){echo $inv['MobileTrunk']['inv1'];}?>" name="inventory[inv1]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_s_start']){echo $inv['MobileTrunk']['grey2_s_start'];}?>" name="inventory[grey2_s_start]" class="time" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_s_end']){echo $inv['MobileTrunk']['grey2_s_end'];}?>" name="inventory[grey2_s_end]" /></td>
                <td>S</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv5']){echo $inv['MobileTrunk']['inv5'];}?>" name="inventory[inv5]" /></td>
                <td><input type="text"  value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_s_start']){echo $inv['MobileTrunk']['red2_s_start'];}?>" name="inventory[red2_s_start]" class="time" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_s_end']){echo $inv['MobileTrunk']['red2_s_end'];}?>" name="inventory[red2_s_end]" /></td>
            </tr>
            <tr>
                <td>M</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv2']){echo $inv['MobileTrunk']['inv2'];}?>" name="inventory[inv2]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_m_start']){echo $inv['MobileTrunk']['grey4_m_start'];}?>" class="time" name="inventory[grey4_m_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_m_end']){echo $inv['MobileTrunk']['grey4_m_end'];}?>" name="inventory[grey4_m_end]" /></td>
                <td>M</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv6']){echo $inv['MobileTrunk']['inv6'];}?>" name="inventory[inv6]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_m_start']){echo $inv['MobileTrunk']['red2_m_start'];}?>" class="time" name="inventory[red2_m_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_m_end']){echo $inv['MobileTrunk']['red2_m_end'];}?>" class="time" name="inventory[red2_m_end]" /></td>
            </tr>
            <tr>
                <td>L</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv3']){echo $inv['MobileTrunk']['inv3'];}?>" name="inventory[inv3]" /></td>
                <td><input type="text"  value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_l_start']){echo $inv['MobileTrunk']['grey4_l_start'];}?>" class="time" name="inventory[grey4_l_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_l_end']){echo $inv['MobileTrunk']['grey4_l_end'];}?>" class="time" name="inventory[grey4_l_end]" /></td>
                <td>L</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv7']){echo $inv['MobileTrunk']['inv7'];}?>" name="inventory[inv7]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_l_start']){echo $inv['MobileTrunk']['red2_l_start'];}?>" class="time" name="inventory[red2_l_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_l_end']){echo $inv['MobileTrunk']['red2_l_end'];}?>" class="time" name="inventory[red2_l_end]" /></td>
            </tr>
            <tr>
                <td>XL</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv4']){echo $inv['MobileTrunk']['inv4'];}?>" name="inventory[inv4]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_xl_start']){echo $inv['MobileTrunk']['grey4_xl_start'];}?>" class="time" name="inventory[grey4_xl_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_xl_end']){echo $inv['MobileTrunk']['grey4_xl_end'];}?>" name="inventory[grey4_xl_end]" /></td>
                <td>XL</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv8']){echo $inv['MobileTrunk']['inv8'];}?>" name="inventory[inv8]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_xl_start']){echo $inv['MobileTrunk']['red2_xl_start'];}?>" class="time" name="inventory[red2_xl_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_xl_end']){echo $inv['MobileTrunk']['red2_xl_end'];}?>" class="time" name="inventory[red2_xl_end]" /></td>
            </tr>
            <tr>
                <td>2XL</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv9']){echo $inv['MobileTrunk']['inv9'];}?>" name="inventory[inv9]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_2xl_start']){echo $inv['MobileTrunk']['grey2_2xl_start'];}?>" class="time" name="inventory[grey2_2xl_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_2xl_end']){echo $inv['MobileTrunk']['grey2_2xl_end'];}?>" name="inventory[grey2_2xl_end]" /></td>
                <td>2XL</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv10']){echo $inv['MobileTrunk']['inv10'];}?>" name="inventory[inv10]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_2xl_start']){echo $inv['MobileTrunk']['red2_2xl_start'];}?>" class="time" name="inventory[red2_2xl_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_2xl_end']){echo $inv['MobileTrunk']['red2_2xl_end'];}?>" class="time" name="inventory[red2_2xl_end]" /></td>
            </tr>
            <tr>
                <td>3XL</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv11']){echo $inv['MobileTrunk']['inv11'];}?>" name="inventory[inv11]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_3xl_start']){echo $inv['MobileTrunk']['grey2_3xl_start'];}?>" name="inventory[grey2_3xl_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_3xl_end']){echo $inv['MobileTrunk']['grey2_3xl_end'];}?>" name="inventory[grey2_3xl_end]" /></td>
                <td>3XL</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv12']){echo $inv['MobileTrunk']['inv12'];}?>" name="inventory[inv12]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_3xl_start']){echo $inv['MobileTrunk']['red2_3xl_start'];}?>" class="time" name="inventory[red2_3xl_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_3xl_end']){echo $inv['MobileTrunk']['red2_3xl_end'];}?>" name="inventory[red2_3xl_end]" /></td>
            </tr>
            <tr>
                <td><strong>Accessories</strong></td><td></td><td></td><td></td>
                <td><strong>Sweaters</strong></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>Ties</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv13']){echo $inv['MobileTrunk']['inv13'];}?>" name="inventory[inv13]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['ties_1bag_start']){echo $inv['MobileTrunk']['ties_1bag_start'];}?>" class="time" name="inventory[ties_1bag_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['ties_1bag_end']){echo $inv['MobileTrunk']['ties_1bag_end'];}?>" class="time" name="inventory[ties_1bag_end]" /></td>
                <td>S</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv14']){echo $inv['MobileTrunk']['inv14'];}?>" name="inventory[inv14]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater2_s_start']){echo $inv['MobileTrunk']['sweater2_s_start'];}?>" name="inventory[sweater2_s_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater2_s_end']){echo $inv['MobileTrunk']['sweater2_s_end'];}?>" name="inventory[sweater2_s_end]" /></td>
            </tr>
            <tr>
                <td>ID Holders</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv15']){echo $inv['MobileTrunk']['inv15'];}?>" name="inventory[inv15]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['idholder_1box_start']){echo $inv['MobileTrunk']['idholder_1box_start'];}?>" name="inventory[idholder_1box_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['idholder_1box_end'];}?>" class="time" name="inventory[idholder_1box_end]" /></td>
                <td>M</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv16']){echo $inv['MobileTrunk']['inv16'];}?>" name="inventory[inv16]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_m_start']){echo $inv['MobileTrunk']['sweater4_m_start'];}?>" class="time" name="inventory[sweater4_m_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_m_end']){echo $inv['MobileTrunk']['sweater4_m_end'];}?>" class="time" name="inventory[sweater4_m_end]" /></td>
            </tr>
            <tr>
                <td>ID Clips</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv17']){echo $inv['MobileTrunk']['inv17'];}?>" name="inventory[inv17]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['idclips_1box_start']){echo $inv['MobileTrunk']['idclips_1box_start'];}?>" class="time" name="inventory[idclips_1box_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['idclips_1box_end']){echo $inv['MobileTrunk']['idclips_1box_end'];}?>" class="time" name="inventory[idclips_1box_end]" /></td>
                <td>L</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv18']){echo $inv['MobileTrunk']['inv18'];}?>" name="inventory[inv18]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_l_start']){echo $inv['MobileTrunk']['sweater4_l_start'];}?>" class="time" name="inventory[sweater4_l_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_l_end']){echo $inv['MobileTrunk']['sweater4_l_end'];}?>" name="inventory[sweater4_l_end]" /></td>
            </tr>
            <tr>
                <td>Epaulettes</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv19']){echo $inv['MobileTrunk']['inv19'];}?>" name="inventory[inv19]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['epau_1pack_start']){echo $inv['MobileTrunk']['epau_1pack_start'];}?>" class="time" name="inventory[epau_1pack_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['epau_1pack_end']){echo $inv['MobileTrunk']['epau_1pack_end'];}?>" class="time" name="inventory[epau_1pack_end]" /></td>
                <td>XL</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv20']){echo $inv['MobileTrunk']['inv20'];}?>" name="inventory[inv20]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_xl_start']){echo $inv['MobileTrunk']['sweater4_xl_start'];}?>" class="time" name="inventory[sweater4_xl_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_xl_end']){echo $inv['MobileTrunk']['sweater4_xl_end'];}?>" class="time" name="inventory[sweater4_xl_end]" /></td>
            </tr>
            <tr>
                <td>Caps</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv21']){echo $inv['MobileTrunk']['inv21'];}?>" name="inventory[inv21]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['caps_3_start']){echo $inv['MobileTrunk']['caps_3_start'];}?>" name="inventory[caps_3_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['caps_3_end']){echo $inv['MobileTrunk']['caps_3_end'];}?>" class="time" name="inventory[caps_3_end]" /></td>
                <td>2XL</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv22']){echo $inv['MobileTrunk']['inv22'];}?>" name="inventory[inv22]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater2_2xl_start']){echo $inv['MobileTrunk']['sweater2_2xl_start'];}?>" class="time" name="inventory[sweater2_2xl_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater2_2xl_end']){echo $inv['MobileTrunk']['sweater2_2xl_end'];}?>" class="time" name="inventory[sweater2_2xl_end]" /></td>
            </tr>
            <tr>
                <td>Touques</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv23']){echo $inv['MobileTrunk']['inv23'];}?>" name="inventory[inv23]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['touques_3_start']){echo $inv['MobileTrunk']['touques_3_start'];}?>" name="inventory[touques_3_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['touques_3_end'];}?>" class="time" name="inventory[touques_3_end]" /></td>
                <td><strong>Books</strong></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>Hard Hats</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv24']){echo $inv['MobileTrunk']['inv24'];}?>" name="inventory[inv24]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['hats_3_start']){echo $inv['MobileTrunk']['hats_3_start'];}?>" name="inventory[hats_3_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['hards_3_end']){echo $inv['MobileTrunk']['hards_3_end'];}?>" name="inventory[hards_3_end]" /></td>
                <td>Memo Books</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv25']){echo $inv['MobileTrunk']['inv25'];}?>" name="inventory[inv25]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_memo_start']){echo $inv['MobileTrunk']['books3_memo_start'];}?>" name="inventory[books3_memo_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_memo_end']){echo $inv['MobileTrunk']['books3_memo_end'];}?>" class="time" name="inventory[books3_memo_end]" /></td>
            </tr>
            <tr>
                <td>Reflector Vests</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv26']){echo $inv['MobileTrunk']['inv26'];}?>" name="inventory[inv26]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['vests_1_start']){echo $inv['MobileTrunk']['vests_1_start'];}?>" name="inventory[vests_1_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['vests_1_end']){echo $inv['MobileTrunk']['vests_1_end'];}?>" name="inventory[vests_1_end]" /></td>
                <td>Mobile Insp. Books</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv27']){echo $inv['MobileTrunk']['inv27'];}?>" name="inventory[inv27]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_insp_start']){echo $inv['MobileTrunk']['books3_insp_start'];}?>" class="time" name="inventory[books3_insp_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_insp_end']){echo $inv['MobileTrunk']['books3_insp_end'];}?>" name="inventory[books3_insp_end]" /></td>
            </tr>
            <tr>
                <td>Fire Extinguisher</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv28']){echo $inv['MobileTrunk']['inv28'];}?>" name="inventory[inv28]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['fire_1_start']){echo $inv['MobileTrunk']['fire_1_start'];}?>" name="inventory[fire_1_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['fire_1_end']){echo $inv['MobileTrunk']['fire_1_end'];}?>" name="inventory[fire_1_end]" /></td>
                <td>Activity Log Books</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv29']){echo $inv['MobileTrunk']['inv29'];}?>" name="inventory[inv29]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_log_start']){echo $inv['MobileTrunk']['books3_log_start'];}?>" class="time" name="inventory[books3_log_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_log_end']){echo $inv['MobileTrunk']['books3_log_end'];}?>" class="time" name="inventory[books3_log_end]" /></td>
            </tr>
            <tr>
                <td>Pylons</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv30']){echo $inv['MobileTrunk']['inv30'];}?>" name="inventory[inv30]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['pylon_4_start']){echo $inv['MobileTrunk']['pylon_4_start'];}?>" name="inventory[pylon_4_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['pylon_4_end']){echo $inv['MobileTrunk']['pylon_4_end'];}?>" class="time" name="inventory[pylon_4_end]" /></td>
                <td>Sec. Occ. Reports</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv31']){echo $inv['MobileTrunk']['inv31'];}?>" name="inventory[inv31]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_report_start']){echo $inv['MobileTrunk']['books3_report_start'];}?>" class="time" name="inventory[books3_report_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_report_end']){echo $inv['MobileTrunk']['books3_report_end'];}?>" name="inventory[books3_report_end]" /></td>
            </tr>
            <tr>
                <td>Thermal Blanket</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv32']){echo $inv['MobileTrunk']['inv32'];}?>" name="inventory[inv32]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['thermal_1_start']){echo $inv['MobileTrunk']['thermal_1_start'];}?>" class="time" name="inventory[thermal_1_start]" /></td>
                <td><input type="text" class="time" value="<?php if(isset($inv) && $inv['MobileTrunk']['thermal_1_end']){echo $inv['MobileTrunk']['thermal_1_end'];}?>" name="inventory[thermal_1_end]" /></td>
                <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>Light Sticks</td><td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv33']){echo $inv['MobileTrunk']['inv33'];}?>" name="inventory[inv33]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['light_4_start']){echo $inv['MobileTrunk']['light_4_start'];}?>" class="time" name="inventory[light_4_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['light_4_end']){echo $inv['MobileTrunk']['light_4_end'];}?>" class="time" name="inventory[light_4_end]" /></td>
                <td></td><td></td><td></td><td></td>
            </tr>
            
            <tr>
                <td><strong>Inventory Given Out</strong></td><td></td><td></td><td></td><td></td><td rowspan="10" colspan="3"><strong>Notes:</strong><br /><textarea rows="20"  name="inventory[notes]"><?php if(isset($inv) && $inv['MobileTrunk']['notes']){echo $inv['MobileTrunk']['notes'];}?></textarea></td>
            </tr>
            <tr>
                <td>Guard Name</td><td>Type Of Guard</td><td>Inventory Item</td><td>Size</td><td>Quantity</td>
            </tr>
            <tr>
                <td><input type="text" name="inventory[inv_name1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_name1']){echo $inv['MobileTrunk']['inv_name1'];}?>" /></td>
                <td><input type="text" name="inventory[inv_type1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_type1']){echo $inv['MobileTrunk']['inv_type1'];}?>" /></td>
                <td><input type="text" name="inventory[inv_item1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_item1']){echo $inv['MobileTrunk']['inv_item1'];}?>" /></td>
                <td><input type="text" name="inventory[inv_size1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_size1']){echo $inv['MobileTrunk']['inv_size1'];}?>"/></td>
                <td><input type="text" name="inventory[inv_qty1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_qty1']){echo $inv['MobileTrunk']['inv_qty1'];}?>"/></td>
            </tr>
            <tr>
                <td><input type="text" name="inventory[inv_name2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['guard'];}?>"/></td>
                <td><input type="text" name="inventory[inv_type2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['guard'];}?>"/></td>
                <td><input type="text" name="inventory[inv_item2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['guard'];}?>"/></td>
                <td><input type="text" name="inventory[inv_size2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['guard'];}?>"/></td>
                <td><input type="text" name="inventory[inv_qty2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['guard'];}?>"/></td>
            </tr>
            <tr>
                <td><input type="text" name="inventory[inv_name3]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_name3']){echo $inv['MobileTrunk']['inv_name3'];}?>"/></td>
                <td><input type="text" name="inventory[inv_type3]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_type3']){echo $inv['MobileTrunk']['inv_type3'];}?>"/></td>
                <td><input type="text" name="inventory[inv_item3]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_item3']){echo $inv['MobileTrunk']['inv_item3'];}?>"/></td>
                <td><input type="text" name="inventory[inv_size3]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_size3']){echo $inv['MobileTrunk']['inv_size3'];}?>"/></td>
                <td><input type="text" name="inventory[inv_qty3]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_qty3']){echo $inv['MobileTrunk']['inv_qty3'];}?>"/></td>
            </tr>
            <tr>
                <td><input type="text" name="inventory[inv_name4]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_name4']){echo $inv['MobileTrunk']['inv_name4'];}?>"/></td>
                <td><input type="text" name="inventory[inv_type4]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_type4']){echo $inv['MobileTrunk']['inv_type4'];}?>"/></td>
                <td><input type="text" name="inventory[inv_item4]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_item4']){echo $inv['MobileTrunk']['inv_item4'];}?>"/></td>
                <td><input type="text" name="inventory[inv_size4]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_size4']){echo $inv['MobileTrunk']['inv_size4'];}?>"/></td>
                <td><input type="text" name="inventory[inv_qty4]" value="<?php if(isset($inv) && $inv['MobileTrunk']['inv_qty4']){echo $inv['MobileTrunk']['inv_qty4'];}?>"/></td>
            </tr>
            <tr>
                <td>Items Requested </td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>Guard Name</td><td>Type Of Guard</td><td>Inventory Item</td><td>Size</td><td>Quantity</td>
            </tr>
            <tr>
                <td><input type="text" name="inventory[item_name1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_name1']){echo $inv['MobileTrunk']['item_name1'];}?>"/></td>
                <td><input type="text" name="inventory[item_type1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_type1']){echo $inv['MobileTrunk']['item_type1'];}?>"/></td>
                <td><input type="text" name="inventory[item_item1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_item1']){echo $inv['MobileTrunk']['item_item1'];}?>"/></td>
                <td><input type="text" name="inventory[item_size1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_size1']){echo $inv['MobileTrunk']['item_size1'];}?>"/></td>
                <td><input type="text" name="inventory[item_qty1]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_qty1']){echo $inv['MobileTrunk']['item_qty1'];}?>"/></td>
            </tr>
            <tr>
                <td><input type="text" name="inventory[item_name2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_name2']){echo $inv['MobileTrunk']['item_name2'];}?>"/></td>
                <td><input type="text" name="inventory[item_type2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_type2']){echo $inv['MobileTrunk']['item_type2'];}?>"/></td>
                <td><input type="text" name="inventory[item_item2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_item2']){echo $inv['MobileTrunk']['item_item2'];}?>"/></td>
                <td><input type="text" name="inventory[item_size2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_size2']){echo $inv['MobileTrunk']['item_size2'];}?>"/></td>
                <td><input type="text" name="inventory[item_qty2]" value="<?php if(isset($inv) && $inv['MobileTrunk']['item_qty2']){echo $inv['MobileTrunk']['item_qty2'];}?>"/></td>
            </tr>
        </table>
    </td>
</tr>
<script>
$(function(){
<?php if($this->params['action'] == 'view_detail' ){ ?> 
    $('.inventory1_more').show();
    $('.inventry_table td').each(function(){
        
        if($(this).find('input').length >0 || $(this).find('textarea').length>0){
            var vaz = $(this).find('input').val();
            if($(this).find('textarea').length>0){
                var tex = $(this).find('textarea').val();
                $(this).html("<strong>Notes:</strong><br/>"+tex);
            }
            
            
            $(this).html(vaz);
        }
        
        
    });
    //$('.inventory1_more input').attr('disabled','disabled');
    //$('.inventory1_more textarea').attr('disabled','disabled');
    
   <?php } ?> 
   });
</script>