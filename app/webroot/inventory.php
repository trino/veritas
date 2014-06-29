    <td colspan="3" style="padding: 0;border-top:none;">
        <table class="inventry_table" style="border-left:none!important;<?php if($this->params['action'] != 'view_detail'){?>border-bottom:1px solid #ddd;<?php }?>">
            
            <tr>
                <td width="10%" style="border-top: none;"><?php echo $this->requestAction('dashboard/translate/Mobile Guard');?></td><td style="border-top: none;border-right:none!important;"><input type="text" name="inventory[guard]" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['guard'];}?>" class="required" /></td>
            </tr>
            <tr style="">
                <td width="10%"><?php echo $this->requestAction('dashboard/translate/Date');?></td><td style="border-right:none!important;"><input type="text" name="inventory[date]" class="date_verify" value="<?php if(isset($inv) && $inv['MobileTrunk']['date']){echo $inv['MobileTrunk']['date'];}?>" /></td>
            </tr>
        </table>
        <?php if(isset($inv))
        {?>
           <input type="hidden" name="inv_id" value="<?php echo $inv['MobileTrunk']['id'];?>"/> 
       <?php  } ?>
        <table class="inventry_table righton" style="border-radius:0;border-bottom:1px solid #ddd;">
            <tr>
                <td><strong><?php echo $this->requestAction('dashboard/translate/Shirts - Grey');?></strong></td><td ><?php echo $this->requestAction('dashboard/translate/Inventory');?></td><td ><?php echo $this->requestAction('dashboard/translate/Start Time');?></td><td ><?php echo $this->requestAction('dashboard/translate/End Time');?></td>
                <td ><strong><?php echo $this->requestAction('dashboard/translate/Shirts - Red');?></strong></td><td ><?php echo $this->requestAction('dashboard/translate/Inventory');?></td><td ><?php echo $this->requestAction('dashboard/translate/Start Time');?></td><td style="border-right: none;"><?php echo $this->requestAction('dashboard/translate/End Time');?></td>
            </tr>
            <tr>
                <td>S</td><td><input type="text" value="2" name="inventory[inv1]" readonly="readonly" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_s_start']){echo $inv['MobileTrunk']['grey2_s_start'];}?>" name="inventory[grey2_s_start]" class="" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_s_end']){echo $inv['MobileTrunk']['grey2_s_end'];}?>" name="inventory[grey2_s_end]" /></td>
                <td>S</td><td><input type="text" value="2" name="inventory[inv5]" readonly="readonly"  /></td>
                <td><input type="text"  value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_s_start']){echo $inv['MobileTrunk']['red2_s_start'];}?>" name="inventory[red2_s_start]" class="" /></td>
                <td style="border-right: none;"><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_s_end']){echo $inv['MobileTrunk']['red2_s_end'];}?>" name="inventory[red2_s_end]" /></td>
            </tr>
            <tr>
                <td>M</td><td><input type="text" value="4" name="inventory[inv2]" readonly="readonly"  /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_m_start']){echo $inv['MobileTrunk']['grey4_m_start'];}?>" class="" name="inventory[grey4_m_start]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_m_end']){echo $inv['MobileTrunk']['grey4_m_end'];}?>" name="inventory[grey4_m_end]" /></td>
                <td>M</td><td><input type="text" value="2" readonly="readonly"  name="inventory[inv6]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_m_start']){echo $inv['MobileTrunk']['red2_m_start'];}?>" class="" name="inventory[red2_m_start]" /></td>
                <td style="border-right: none;"><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_m_end']){echo $inv['MobileTrunk']['red2_m_end'];}?>" class="" name="inventory[red2_m_end]" /></td>
            </tr>
            <tr>
                <td>L</td><td><input type="text" value="4" readonly="readonly"  name="inventory[inv3]" /></td>
                <td><input type="text"  value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_l_start']){echo $inv['MobileTrunk']['grey4_l_start'];}?>" class="" name="inventory[grey4_l_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_l_end']){echo $inv['MobileTrunk']['grey4_l_end'];}?>" class="" name="inventory[grey4_l_end]" /></td>
                <td>L</td><td><input type="text" value="2" readonly="readonly"  name="inventory[inv7]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_l_start']){echo $inv['MobileTrunk']['red2_l_start'];}?>" class="" name="inventory[red2_l_start]" /></td>
                <td style="border-right: none;"><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_l_end']){echo $inv['MobileTrunk']['red2_l_end'];}?>" class="" name="inventory[red2_l_end]" /></td>
            </tr>
            <tr>
                <td>XL</td><td><input type="text" value="4" readonly="readonly" name="inventory[inv4]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_xl_start']){echo $inv['MobileTrunk']['grey4_xl_start'];}?>" class="" name="inventory[grey4_xl_start]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey4_xl_end']){echo $inv['MobileTrunk']['grey4_xl_end'];}?>" name="inventory[grey4_xl_end]" /></td>
                <td>XL</td><td><input type="text" value="2" readonly="readonly" name="inventory[inv8]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_xl_start']){echo $inv['MobileTrunk']['red2_xl_start'];}?>" class="" name="inventory[red2_xl_start]" /></td>
                <td style="border-right: none;"><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_xl_end']){echo $inv['MobileTrunk']['red2_xl_end'];}?>" class="" name="inventory[red2_xl_end]" /></td>
            </tr>
            <tr>
                <td>2XL</td><td><input type="text" value="2" readonly="readonly"  name="inventory[inv9]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_2xl_start']){echo $inv['MobileTrunk']['grey2_2xl_start'];}?>" class="" name="inventory[grey2_2xl_start]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_2xl_end']){echo $inv['MobileTrunk']['grey2_2xl_end'];}?>" name="inventory[grey2_2xl_end]" /></td>
                <td>2XL</td><td><input type="text" value="2" readonly="readonly"  name="inventory[inv10]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_2xl_start']){echo $inv['MobileTrunk']['red2_2xl_start'];}?>" class="" name="inventory[red2_2xl_start]" /></td>
                <td style="border-right: none;"><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_2xl_end']){echo $inv['MobileTrunk']['red2_2xl_end'];}?>" class="" name="inventory[red2_2xl_end]" /></td>
            </tr>
            <tr>
                <td>3XL</td><td><input type="text" value="2" readonly="readonly"  name="inventory[inv11]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_3xl_start']){echo $inv['MobileTrunk']['grey2_3xl_start'];}?>" name="inventory[grey2_3xl_start]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['grey2_3xl_end']){echo $inv['MobileTrunk']['grey2_3xl_end'];}?>" name="inventory[grey2_3xl_end]" /></td>
                <td>3XL</td><td><input type="text" value="2" readonly="readonly"  name="inventory[inv12]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_3xl_start']){echo $inv['MobileTrunk']['red2_3xl_start'];}?>" class="" name="inventory[red2_3xl_start]" /></td>
                <td style="border-right: none;"><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['red2_3xl_end']){echo $inv['MobileTrunk']['red2_3xl_end'];}?>" name="inventory[red2_3xl_end]" /></td>
            </tr>
            <tr>
                <td colspan="4"><strong><?php echo $this->requestAction('dashboard/translate/Accessories');?></strong></td>
                <td colspan="4" style="border-right: none;"><strong><?php echo $this->requestAction('dashboard/translate/Sweaters');?></strong></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Ties');?></td><td><input type="text" value="1 Bag" readonly="readonly"  name="inventory[inv13]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['ties_1bag_start']){echo $inv['MobileTrunk']['ties_1bag_start'];}?>" class="" name="inventory[ties_1bag_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['ties_1bag_end']){echo $inv['MobileTrunk']['ties_1bag_end'];}?>" class="" name="inventory[ties_1bag_end]" /></td>
                <td>S</td><td><input type="text" value="2" readonly="readonly"  name="inventory[inv14]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater2_s_start']){echo $inv['MobileTrunk']['sweater2_s_start'];}?>" name="inventory[sweater2_s_start]" /></td>
                <td style="border-right: none;"><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater2_s_end']){echo $inv['MobileTrunk']['sweater2_s_end'];}?>" name="inventory[sweater2_s_end]" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/ID Holders');?></td><td><input type="text" value="1 Box" readonly="readonly"  name="inventory[inv15]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['idholder_1box_start']){echo $inv['MobileTrunk']['idholder_1box_start'];}?>" name="inventory[idholder_1box_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['idholder_1box_end'];}?>" class="" name="inventory[idholder_1box_end]" /></td>
                <td>M</td><td><input type="text" value="4" readonly="readonly"  name="inventory[inv16]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_m_start']){echo $inv['MobileTrunk']['sweater4_m_start'];}?>" class="" name="inventory[sweater4_m_start]" /></td>
                <td style="border-right: none;"><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_m_end']){echo $inv['MobileTrunk']['sweater4_m_end'];}?>" class="" name="inventory[sweater4_m_end]" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/ID Clips');?></td><td><input type="text" value="1 Box" readonly="readonly"  name="inventory[inv17]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['idclips_1box_start']){echo $inv['MobileTrunk']['idclips_1box_start'];}?>" class="" name="inventory[idclips_1box_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['idclips_1box_end']){echo $inv['MobileTrunk']['idclips_1box_end'];}?>" class="" name="inventory[idclips_1box_end]" /></td>
                <td>L</td><td><input type="text" value="4" readonly="readonly"  name="inventory[inv18]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_l_start']){echo $inv['MobileTrunk']['sweater4_l_start'];}?>" class="" name="inventory[sweater4_l_start]" /></td>
                <td style="border-right: none;"><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_l_end']){echo $inv['MobileTrunk']['sweater4_l_end'];}?>" name="inventory[sweater4_l_end]" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Epaulettes');?></td><td><input type="text" value="1 Package" readonly="readonly"  name="inventory[inv19]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['epau_1pack_start']){echo $inv['MobileTrunk']['epau_1pack_start'];}?>" class="" name="inventory[epau_1pack_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['epau_1pack_end']){echo $inv['MobileTrunk']['epau_1pack_end'];}?>" class="" name="inventory[epau_1pack_end]" /></td>
                <td>XL</td><td><input type="text" value="4" readonly="readonly"  name="inventory[inv20]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_xl_start']){echo $inv['MobileTrunk']['sweater4_xl_start'];}?>" class="" name="inventory[sweater4_xl_start]" /></td>
                <td style="border-right: none;"><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater4_xl_end']){echo $inv['MobileTrunk']['sweater4_xl_end'];}?>" class="" name="inventory[sweater4_xl_end]" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Caps');?></td><td><input type="text" value="3" readonly="readonly"  name="inventory[inv21]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['caps_3_start']){echo $inv['MobileTrunk']['caps_3_start'];}?>" name="inventory[caps_3_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['caps_3_end']){echo $inv['MobileTrunk']['caps_3_end'];}?>" class="" name="inventory[caps_3_end]" /></td>
                <td>2XL</td><td><input type="text" value="2" readonly="readonly"  name="inventory[inv22]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater2_2xl_start']){echo $inv['MobileTrunk']['sweater2_2xl_start'];}?>" class="" name="inventory[sweater2_2xl_start]" /></td>
                <td style="border-right: none;"><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['sweater2_2xl_end']){echo $inv['MobileTrunk']['sweater2_2xl_end'];}?>" class="" name="inventory[sweater2_2xl_end]" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Touques');?></td><td><input type="text" value="3" readonly="readonly"  name="inventory[inv23]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['touques_3_start']){echo $inv['MobileTrunk']['touques_3_start'];}?>" name="inventory[touques_3_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['guard']){echo $inv['MobileTrunk']['touques_3_end'];}?>" class="" name="inventory[touques_3_end]" /></td>
                <td colspan="4" style="border-right: none;"><strong><?php echo $this->requestAction('dashboard/translate/Books');?></strong></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Hard Hats');?></td><td><input type="text" value="3" readonly="readonly"  name="inventory[inv24]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['hats_3_start']){echo $inv['MobileTrunk']['hats_3_start'];}?>" name="inventory[hats_3_start]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['hards_3_end']){echo $inv['MobileTrunk']['hards_3_end'];}?>" name="inventory[hards_3_end]" /></td>
                <td>Memo Books</td><td><input type="text" value="3" readonly="readonly"  name="inventory[inv25]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_memo_start']){echo $inv['MobileTrunk']['books3_memo_start'];}?>" name="inventory[books3_memo_start]" /></td>
                <td style="border-right: none;"><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_memo_end']){echo $inv['MobileTrunk']['books3_memo_end'];}?>" class="" name="inventory[books3_memo_end]" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Reflector Vests');?></td><td><input type="text" value="1" readonly="readonly"  name="inventory[inv26]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['vests_1_start']){echo $inv['MobileTrunk']['vests_1_start'];}?>" name="inventory[vests_1_start]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['vests_1_end']){echo $inv['MobileTrunk']['vests_1_end'];}?>" name="inventory[vests_1_end]" /></td>
                <td><?php echo $this->requestAction('dashboard/translate/Mobile Insp. Books');?></td><td><input type="text" value="3" readonly="readonly"  name="inventory[inv27]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_insp_start']){echo $inv['MobileTrunk']['books3_insp_start'];}?>" class="" name="inventory[books3_insp_start]" /></td>
                <td style="border-right: none;"><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_insp_end']){echo $inv['MobileTrunk']['books3_insp_end'];}?>" name="inventory[books3_insp_end]" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Fire Extinguisher');?></td><td><input type="text" value="1" readonly="readonly"  name="inventory[inv28]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['fire_1_start']){echo $inv['MobileTrunk']['fire_1_start'];}?>" name="inventory[fire_1_start]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['fire_1_end']){echo $inv['MobileTrunk']['fire_1_end'];}?>" name="inventory[fire_1_end]" /></td>
                <td><?php echo $this->requestAction('dashboard/translate/Activity Log Books');?></td><td><input type="text" value="3" readonly="readonly"  name="inventory[inv29]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_log_start']){echo $inv['MobileTrunk']['books3_log_start'];}?>" class="" name="inventory[books3_log_start]" /></td>
                <td style="border-right: none;"><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_log_end']){echo $inv['MobileTrunk']['books3_log_end'];}?>" class="" name="inventory[books3_log_end]" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Pylons');?></td><td><input type="text" value="4" readonly="readonly"  name="inventory[inv30]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['pylon_4_start']){echo $inv['MobileTrunk']['pylon_4_start'];}?>" name="inventory[pylon_4_start]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['pylon_4_end']){echo $inv['MobileTrunk']['pylon_4_end'];}?>" class="" name="inventory[pylon_4_end]" /></td>
                <td><?php echo $this->requestAction('dashboard/translate/Sec. Occ. Reports');?></td><td><input type="text" value="3" readonly="readonly"  name="inventory[inv31]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_report_start']){echo $inv['MobileTrunk']['books3_report_start'];}?>" class="" name="inventory[books3_report_start]" /></td>
                <td style="border-right: none;"><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['books3_report_end']){echo $inv['MobileTrunk']['books3_report_end'];}?>" name="inventory[books3_report_end]" /></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Thermal Blanket');?></td><td><input type="text" value="1" readonly="readonly"  name="inventory[inv32]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['thermal_1_start']){echo $inv['MobileTrunk']['thermal_1_start'];}?>" class="" name="inventory[thermal_1_start]" /></td>
                <td><input type="text" class="" value="<?php if(isset($inv) && $inv['MobileTrunk']['thermal_1_end']){echo $inv['MobileTrunk']['thermal_1_end'];}?>" name="inventory[thermal_1_end]" /></td>
                <td colspan="4" rowspan="2" style="border-right: none;"></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Light Sticks');?></td><td><input type="text" value="4" readonly="readonly"  name="inventory[inv33]" /></td>
                <td><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['light_4_start']){echo $inv['MobileTrunk']['light_4_start'];}?>" class="" name="inventory[light_4_start]" /></td>
                <td style=""><input type="text" value="<?php if(isset($inv) && $inv['MobileTrunk']['light_4_end']){echo $inv['MobileTrunk']['light_4_end'];}?>" class="" name="inventory[light_4_end]" /></td>
                
            </tr>
            
            <tr>
                <td colspan="5"><strong><?php echo $this->requestAction('dashboard/translate/Inventory Given Out');?></strong></td><td rowspan="10" colspan="3" style="border-right: none;"><strong><?php echo $this->requestAction('dashboard/translate/Notes');?>:</strong><br /><textarea rows="20"  name="inventory[notes]"><?php if(isset($inv) && $inv['MobileTrunk']['notes']){echo $inv['MobileTrunk']['notes'];}?></textarea></td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Guard Name');?></td><td><?php echo $this->requestAction('dashboard/translate/Type Of Guard');?></td><td><?php echo $this->requestAction('dashboard/translate/Inventory Item');?></td><td><?php echo $this->requestAction('dashboard/translate/Size');?></td><td><?php echo $this->requestAction('dashboard/translate/Quantity');?></td>
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
                <td colspan="5"><strong><?php echo $this->requestAction('dashboard/translate/Items Requested');?></strong> </td>
            </tr>
            <tr>
                <td><?php echo $this->requestAction('dashboard/translate/Guard Name');?></td><td><?php echo $this->requestAction('dashboard/translate/Type Of Guard');?></td><td><?php echo $this->requestAction('dashboard/translate/Inventory Item');?></td><td><?php echo $this->requestAction('dashboard/translate/Size');?></td><td><?php echo $this->requestAction('dashboard/translate/Quantity');?></td>
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
        <div style="position: relative;padding:5px;">
        <?php if($this->params['action'] != 'view_detail' ){ ?> 
            <div style="width: 50%;float:left;">
                <strong>SIGNATURE:</strong><br />
                    <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                        
                    </iframe>
            </div>        
        <?php }?>    
            <?php
            
                if(isset($inv) && $inv['MobileTrunk']['signature'])
                {
                    
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $inv['MobileTrunk']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div> 
    </td>
<script>
$(function(){
<?php if($this->params['action'] == 'view_detail' ){ ?> 
    $('.inventory1_more').show();
    $('.inventry_table td').each(function(){
        
        if($(this).find('input').length >0 || $(this).find('textarea').length>0){
            var vaz = $(this).find('input').val();
            if($(this).find('textarea').length>0){
                var tex = $(this).find('textarea').val();
                $(this).html("<strong><?php echo $this->requestAction('dashboard/translate/Notes');?>:</strong><br/>"+tex);
            }
            
            
            $(this).html(vaz);
        }
        
        
    });
    //$('.inventory1_more input').attr('disabled','disabled');
    //$('.inventory1_more textarea').attr('disabled','disabled');
    
   <?php } ?> 

$('.date_verify').datepicker({dateFormat: 'yy-mm-dd'});


   });
</script>
<style>

.inventry_table input{width:100px;}
.righton td{border-right: 1px solid #ddd;}
</style>
