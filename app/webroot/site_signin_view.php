
<table>
<tr><td style="color:red;font-size:18px;font-weight: bold;">A.S.A.P. SECURED</td>   <td style="font-size:18px;font-weight: bold;">SITE SIGN IN/OUT</td></tr>
<tr ><td colspan="2">
    <div style="float: left;width:465px;line-height: 27px;">
        <?php echo $this->requestAction('dashboard/translate/NOTE').":".$this->requestAction('dashboard/translate/A SEPARATE REPORT MUST BE COMPLETED FOR EACH CHANGE IN SECURITY PERSONNEL.USE ADDITIONAL PAGE IF MORE SPACE IS REQUIRED');?>.<br />
        <?php echo $this->requestAction('dashboard/translate/As an authorized representative signing onto this site I take full responsibility for the mandated compliance set forth under Ontario Health and Safety Act and do not hole ASAP Secured Inc. liable for any claims due to my noncompliance')?>.
    </div>
    <div style="float: right;width:335px;">
    <table <?php if($this->params['action']=='download_doc'){?>style="width:40%;"<?php }?>>
    <?php if($this->params['action']=='download_doc'){
        ?>
        <tr><td colspan="2"><p>&nbsp;</p></td></tr>
        <?php
    }?>
    <tr style="border-bottom: none;">
    <td style="border-top: none;"><strong><?php echo $this->requestAction('dashboard/translate/Guard Name');?></strong></td><td style="border-top: none;"><?php echo $static[0]['SiteSignin']['guard_name'];?></td></tr>
<tr style="border-bottom: none;">
    <td style="border-top: none;"><strong>Date(mm/dd/yy)</strong></td><td style="border-top: none;"><?php echo $static[0]['SiteSignin']['date'];?></td></tr>
<tr style="border-bottom: none;">
    <td style="border-top: none;"><strong><?php echo $this->requestAction('dashboard/translate/Loss Location');?></strong></td><td style="border-top: none;"><?php echo $static[0]['SiteSignin']['loss_location'];?></td></tr>
    <?php if($this->params['action']=='download_doc'){
        ?>
        <tr><td colspan="2"><p>&nbsp;</p></td></tr>
        <?php
    }?>
    </table>
</div>
<div class="clear"></div>
</table>

<!--<tr><td>Arrival Time(military time):</td></tr>

<tr><td>INSTRUCTIONS(include details on who initiated the changes and the time of changes):</td></tr>
<tr><td><input /></td></tr>-->

<table class="addmore_site" style="border-bottom: 1px solid #DDD; <?php if($this->params['action']=='download_doc'){?>width:70%;<?php }?>">
<tr><td> <strong><?php echo $this->requestAction('dashboard/translate/Arrival');?></strong></td>
<td> <strong><?php echo $this->requestAction('dashboard/translate/Depart')?></strong></td>
<td> <strong><?php echo $this->requestAction('dashboard/translate/Print Name')?>( <?php echo $this->requestAction('dashboard/translate/Clearly')?>)</strong></td>
<td> <strong><?php echo $this->requestAction('dashboard/translate/Phone No')?>.</strong></td>
<td> <strong><?php echo $this->requestAction('dashboard/translate/Company')?></strong></td><td>Signature</td></tr>
<?php 
//var_dump($static);
foreach($static as $k=>$v)
{?>
  <tr><td><?php echo $static[$k]['SiteSignin']['arrival']; ?></td><td><?php echo $static[$k]['SiteSignin']['depart'];?> </td>
    <td><?php echo $static[$k]['SiteSignin']['print_name'];?></td><td><?php echo $static[$k]['SiteSignin']['phone_no'];?></td>
    <td><?php echo $static[$k]['SiteSignin']['company'];?></td><td><?php echo $static[$k]['SiteSignin']['signature'];?></td></tr>  
<?php }?>
<?php if($this->params['action']=='download_doc'){?>
<tr><td colspan="6"><p>&nbsp;</p></td></tr>
<?php }?>
</table>
<?php
            if(isset($static[0]['SiteSignin']) && $static[0]['SiteSignin']['sign'])
            $signature = $static[0]['SiteSignin']['sign'];
            else
            $signature = '';
                if($signature && $this->params['action']!='download_doc')
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $signature;?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>   

<style>
.addmore_site input[type="text"]{width:145px;}
</style>

