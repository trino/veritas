

<h1>ADS Expiry Settings</h1>
<form action="" method="post" id="Form">
Free Ad: <input type="text" name="free_ad" class="required number" value="<?php echo $s['Setting']['free_ad']; ?>" /> Days <br />
Paid Ad: <input type="text" name="paid_ad" class="required number" value="<?php echo $s['Setting']['paid_ad']; ?>" /> Days <br />
<input type="checkbox" name="auto_registration" value="1" <?php if($s['Setting']['auto_registration']=='1') echo "checked='checked'"; ?> /> Registration - Auto Approve <br />
<input type="checkbox" name="auto_ads" value="1" <?php if($s['Setting']['auto_ads']=='1') echo "checked='checked'"; ?> /> Ads - Auto Approve<br />
<input type="submit" name="submit" value="Change Settings" />
</form>