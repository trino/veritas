<?php 
    if($ads)
    {
        ?>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Options</th>
                </tr>
        <?php
        foreach($ads as $a)
        { ?>
                <tr>
                    <td><?php echo $a['Ad']['title']; ?></td>
                    <td><?php echo substr($a['Ad']['description'],0,20); ?></td>
                    <td><?php echo $this->Html->link('Edit','/dashboard/edit_ad/'.$a['Ad']['id']); ?> | <?php echo $this->Html->link('Delete','/dashboard/delete_ad/'.$a['Ad']['id']); ?> | 
                    <?php
                    	foreach($user as $u)
                    	{
                    		if($u['Register']['id']==$a['Ad']['addedBy'])
                    		{
                    			if($u['Register']['type']=="1")
                    			{
                    				echo $this->Html->link('View','/dashboard/view_ad/'.$a['Ad']['id']);
                    			}
                    			else
                    			   echo $this->Html->link('View','/dashboard/view_want_ads/'.$a['Ad']['id']);
                    		
                    			
                    			
                    		}
                    	}
                     ?>
                    </td>
                    <td><?php echo $this->Html->link('Mark as no Spam','/dashboard/mark_as_no_spam/'.$a['Ad']['id']); ?></td>
                </tr>
        <?php }
    ?>
    </table>
    <?php
    }
    else
    {
        echo "No Ads added.";
    }