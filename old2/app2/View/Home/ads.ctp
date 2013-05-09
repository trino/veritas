<div class="path"><?php echo $state; ?>>><?php echo $city; ?></div><br>
<div class="result">

<?php 
if(isset($category))
{
    foreach($category as $c)
    {
        
        $i=0;
        $j=0;
        //echo $c['Category']['name'];
        
        
        foreach($ads as $a)
        {
            if($a['Ad']['category_id']==$c['Category']['id'])
            {
                $i++;   
            }
        }
        //echo "(".$i.")";
        
        foreach($want_ad as $w)
        {
            if($w['Ad']['category_id']==$c['Category']['id'])
            {
                $j++;   
            }
        }
        echo "<ul>";
        echo "<li>".$this->Html->link($c['Category']['name'].'<span class="red">('.$i.')('.$j.')</span>','/home/view_ads/main/'.$c['Category']['id'],array('escape' => false,));?>
            
        <?php
        echo "<ul class='sub-category'>";
        foreach($sub_category as $s)
        {
            
            $k=0;
                $l=0;
            if($c['Category']['id']==$s['Category']['parent_id'])
            {
                
                //echo $s['Category']['name'];
                foreach($ads as $a)
                {
                    if($a['Ad']['subcategory_id']==$s['Category']['id'])
                    {
                        $k++;   
                    }
                }
                //echo "(".$k.")";
                
                foreach($want_ad as $w)
                {
                    if($w['Ad']['subcategory_id']==$s['Category']['id'])
                    {
                        $l++;   
                    }
                }
                //echo "(".$l.") <br>";
                echo "<li>".$this->Html->link($s['Category']['name'].'<span class="red">('.$k.')('.$l.')</span>','/home/view_ads/sub/'.$s['Category']['id'],array('escape' => false,))."</li>";
                ?>
                
                <?php
            }
            
        }
        echo "</ul></li>";
        echo "</ul>";
    }
    
?> 
<div class="clear"></div>
<div class="paginations">
<div class="btn floatleft space"><?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?></div>
<div class="pagin floatleft"><?php echo $this->Paginator->numbers(); ?></div>
<!-- Shows the next and previous links -->

<div class="btn floatleft space"><?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?></div> 
<?php } ?>
<div class="clear"></div>
</div>

<div class="clear"></div>
</div>