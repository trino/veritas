<div class="path"><?php 

    function slug($str)
	{
		//Unwanted: {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
		$string = strtolower($str);
		//Strip any unwanted characters
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string; 
	}
    echo $category;
    if(isset($sub_category))
        echo ">>".$sub_category;
        echo $state['Province']['TITLE'].">>".$city['Province']['TITLE'];
     ?>
</div>
<div class="clear"></div>
<div id="content">
     <div id="business-ads">
     <h1>Business Ads</h1>
     <div class="adds">
     <?php   
        if(!empty($business_ad))
        {
            $k=1;
            foreach($business_ad as $b)
            {
             if($b['Ad']['type']=="1")
              {?>
                <div class="adding paid <?php if($k%2==0) echo "right"; ?>"> 
                <?php 
                foreach($image as $i)
                {
                if($b['Ad']['id']==$i['Image']['ad_id'])
                {
                    $im=explode('.',$i['Image']['image']);
                    $img=$im[0].'_small.'.$im[1];
                    echo $this->Html->image('ads/'.$img);
                    break;
                }
                }
                echo "<div class='txt'>";
                //echo $b['Ad']['title'];
                $slug = slug($b['Ad']['title']); 
                echo $this->Html->link($b['Ad']['title'],'/home/view_ad_details/'.$b['Ad']['id'].'-'.$slug);
                echo "<div class='clear'></div>";
                foreach($user as $u)
                {
                    if($u['Register']['id']==$b['Ad']['addedBy'])
                    {
                        echo "<p><strong>By:</strong> ".$u['Register']['full_name']."</p>";
                        echo "<div class='clear'></div>";
                    }
                }
                echo "<p><strong>Date:</strong> ".$b['Ad']['added_date']."</p>";
                echo "<div class='clear'></div>";
                echo "<p><b>Paid</b></p>";
                echo "</div>";
                echo "</div>";
                $k++;
              }//echo "</div>"; 
              
            } 
            //$k=1;
            foreach($business_ad as $b)
            {
             if($b['Ad']['type']=="2")
              {
                
                ?>
                <div class='adding <?php if($k%2==0) echo "right"; ?>'>
                <?php 
                foreach($image as $i)
                {
                if($b['Ad']['id']==$i['Image']['ad_id'])
                {
                    $im=explode('.',$i['Image']['image']);
                    $img=$im[0].'_small.'.$im[1];
                    echo $this->Html->image('ads/'.$img);
                    break;
                }
                }
                echo "<div class='txt'>";
                //echo $b['Ad']['title'];
                $slug = slug($b['Ad']['title']); 
                echo $this->Html->link($b['Ad']['title'],'/home/view_ad_details/'.$b['Ad']['id'].'-'.$slug);
                echo "<div class='clear'></div>";
                foreach($user as $u)
                {
                    if($u['Register']['id']==$b['Ad']['addedBy'])
                    {
                        echo "<p><strong>By:</strong> ".$u['Register']['full_name']."</p>";
                        echo "<div class='clear'></div>";
                    }
                }
                echo "<p><strong>Date:</strong> ".$b['Ad']['added_date']."</p>";
                echo "<div class='clear'></div>";
                echo "</div>";
                echo "</div>";
                $k++;
              }
              
            }
        }
        else
        {
            echo "No ad available";
        }
        ?>
        <div class="clear"></div>
        </div>
        </div>
        <div id="wants-ad">
        <h1>Want Ads</h1>
        <?php
        if(!empty($want_ad))
        {
            
            foreach($want_ad as $b)
            {
                if($b['Ad']['type']=="1")
                { 
                    ?>
                <div class='wanted paid'>
                <?php 
                foreach($image as $i)
                {
                if($b['Ad']['id']==$i['Image']['ad_id'])
                {
                    $im=explode('.',$i['Image']['image']);
                    $img=$im[0].'_small.'.$im[1];
                    echo $this->Html->image('ads/'.$img);
                    break;
                }
                }
                echo "<div class='txter'>";
                //echo $b['Ad']['title'];
                $slug = slug($b['Ad']['title']); 
                echo $this->Html->link($b['Ad']['title'],'/home/view_want_details/'.$b['Ad']['id'].'-'.$slug);
                echo "<div class='clear'></div>";
                foreach($user as $u)
                {
                    if($u['Register']['id']==$b['Ad']['addedBy'])
                    {
                        echo "<p>By: ".$u['Register']['full_name']."</p>";
                        echo "<div class='clear'></div>";
                        
                    }
                }
                echo "<p>Date: ".$b['Ad']['added_date']."</p>";
                echo "<div class='clear'></div>";
                echo "<p><b>Paid<b></p>";
                echo "</div>";
                echo "</div>";
            }
            
            }
            
            foreach($want_ad as $b)
            {
                if($b['Ad']['type']=="2")
                { 
                    ?>
                    <div class='wanted'>
                <?php 
                foreach($image as $i)
                {
                if($b['Ad']['id']==$i['Image']['ad_id'])
                {
                    $im=explode('.',$i['Image']['image']);
                    $img=$im[0].'_small.'.$im[1];
                    echo $this->Html->image('ads/'.$img);
                    break;
                }
                }
                echo "<div class='txter'>";
                //echo $b['Ad']['title'];
                $slug = slug($b['Ad']['title']); 
                echo $this->Html->link($b['Ad']['title'],'/home/view_want_details/'.$b['Ad']['id'].'-'.$slug);
                echo "<div class='clear'></div>";
                foreach($user as $u)
                {
                    if($u['Register']['id']==$b['Ad']['addedBy'])
                    {
                        echo "<p>By: ".$u['Register']['full_name']."</p>";
                        echo "<div class='clear'></div>";
                    }
                }
                echo "<p>Date: ".$b['Ad']['added_date']."</p>";
                echo "<div class='clear'></div>";
                echo "</div>";
                echo "</div>";
            }
            
            }
        }
        else
        {
            echo "No ad available";
        }
?>
</div>
</div></div></div>
</div>
</div>
<div class="clear"></div>