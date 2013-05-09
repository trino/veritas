<script type="text/javascript">
function get_city(state)
    {
        $('#state').val(state);
        //alert(state);
        $.ajax({
            url : '/ads/home/get_city',
            type: 'post',
            data: 'state='+state,
            success:function(response)
            {
                $('#city').html(response);
                $('#form').show();
            }
        });
    }
    function city(id)
    {
        $('#cit').val(id);
    }
    function check()
    {
        var id = $('#cit').val();
        if(id=="")
            return false;
        else
            return true;
    }
</script>
<div id="contents">
<h1>Choose Your Location</h1>
<ul>
<?php 
    foreach($province as $p)
    {
        //$slug = strtolower($p['Province']['TITLE_URL']);
        $slug =  str_replace('_','-',$p['Province']['TITLE_URL']);
        ?>
        <?php echo $this->Html->link('<li class="btn wid">'.$p['Province']['TITLE'].'</li>','/province/'.$slug,array('escape' => false,)); ?>
       
        <?php //echo $this->Html->link($p['Province']['TITLE'],'/province/'.$slug);?>
        
        <?php
    }
    
?>
</ul>
</div>
<div id="city">

</div>
<div id="form" style="display: none;">
    <form action="" method="post" onsubmit="return check()">
    <input type="hidden" name="state" id="state" value="" />
    <input type="hidden" name="city" value="" id="cit" />
    <input type="submit" class="btn btn-success floatright" name="province" value="Filter" />
    </form>
</div>
<!-- <form action="" method="post" id="Form">
    <label>State:</label> <select name="state" id="state" onchange="get_city()" class="required">
   <option value="">Please select</option>
        <?php 
            foreach($province as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>"><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?></select>
<div class="clear"></div>
       <label> City :</label> 
    <select name="city" id="city" >
    <option value="">Please select</option>
    </select>
<div class="clear"></div>
    <input type="submit" class="btn btn-success floatright" name="province" value="Filter" />
</form> -->
<div class="clear"></div>
<div class="result">
<?php /*
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
        echo "<li>".$this->Html->link($c['Category']['name'].'('.$i.')('.$j.')','/home/view_ads/main/'.$c['Category']['id']);
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
                echo "<li>".$this->Html->link($s['Category']['name'].'('.$k.')('.$l.')','/home/view_ads/sub/'.$s['Category']['id'])."</li>";
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
<?php */ ?>
<div class="clear"></div>
</div>
