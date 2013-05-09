<div id="contents">
<div class="add_new">
<div class="heading">
<h1>Ads Manager</h1><div class="btn floatright btn-success"><?php echo $this->Html->link('Add New Ad','/user/add_ad'); ?></div>
</div>
<div class="clear"></div>

<?php 
    if($ads)
    {
        
        foreach($ads as $a)
        {
            ?>
            <div class="add_new_sub">
            <?php
            echo $a['Ad']['title'];
            echo substr($a['Ad']['description'],0,150);
?>
<div class='clear'></div>
<div class="appr">
 <span class="btn" disabled><i class="icon-ok"></i>
<?php
            if($a['Ad']['isApproved']=="1"){   
             echo "Approved";  } else echo "Pending";
 ?>
</span>
<span class="btn" disabled>
<?php
            if($a['Ad']['type']=="1") echo "Paid"; else echo "Free";
?>
</span></div>
<div class="editer">
            <span class="btn"><i class="icon-edit"></i><?php
            echo $this->Html->link('Edit','/user/ads_edit/'.$a['Ad']['id']);
            ?></span>
            <span class="btn btn-danger btn-white"><i class="icon-remove icon-white"></i><?php
            echo $this->Html->link('Remove','/user/ads_remove/'.$a['Ad']['id'],array('onclick' => "return confirm('Are you Sure?')" ));
            ?></span>
            <span class="btn btn-info"><i class=" icon-info-sign icon-white "></i><?php
            echo $this->Html->link('View','/user/view_ads/'.$a['Ad']['id']);
            ?></span>
            <?php
            if($a['Ad']['expiry']=='1')
            {
                if($a['Ad']['type']=='1')
                {
                    echo $this->Html->link('Renew Ad','/user/renew_paid_ad/'.$a['Ad']['id']);
                }
                else
                {
                    echo $this->Html->link('Renew Ad','/user/renew_free_add/'.$a['Ad']['id']);    
                }
            } ?>
                </div>
                <div class="clear"></div>
            </div>
   <?php     }
   
    }
    else
        echo "No ads Available";
        
        ?>


</div>
</div>