<?php 
	echo "<h1>Business Ads</h1>";
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
                    <td><?php echo substr($a['Ad']['description'],0,150); ?></td>
                    <td><?php echo $this->Html->link('Edit','/dashboard/edit_ad/'.$a['Ad']['id']); ?> | <?php echo $this->Html->link('Delete','/dashboard/delete_ad/'.$a['Ad']['id'],array('onclick'=>'return confirm("Are you sure?");')); ?> | <?php echo $this->Html->link('View','/dashboard/view_ad/'.$a['Ad']['id']); ?></td>
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
    echo "<h1>Wants Ads</h1>";
    if($w_ads)
    {
        ?>
        
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Options</th>
                </tr>
        <?php
        foreach($w_ads as $a)
        { ?>
                <tr>
                    <td><?php echo $a['Ad']['title']; ?></td>
                    <td><?php echo substr($a['Ad']['description'],0,150); ?></td>
                    <td><?php echo $this->Html->link('Edit','/dashboard/edit_ad/'.$a['Ad']['id']); ?> | <?php echo $this->Html->link('Delete','/dashboard/delete_ad/'.$a['Ad']['id'],array('onclick'=>'return confirm("Are you sure?");')); ?> | <?php echo $this->Html->link('View','/dashboard/view_want_ads/'.$a['Ad']['id']); ?></td>
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