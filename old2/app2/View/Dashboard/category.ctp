<?php
    echo $this->Html->link('Add category','/dashboard/add_category');
     if($main)
     {?>
     <ul>
     <?php 
        foreach($main as $m)
        {?>
            <li><?php echo $m['Category']['name']; ?> <?php echo $this->Html->link('Edit','/dashboard/edit_category/'.$m['Category']['id']); ?> | <?php echo $this->Html->link('Delete','/dashboard/delete_category/'.$m['Category']['id'],array('onclick'=>'return confirm("Are you sure?");')); ?></li>
            <?php 
                foreach($sub as $s)
                {
                    if($s['Category']['parent_id']==$m['Category']['id'])
                    {?>
                        <ul>
                            <li><?php echo $s['Category']['name']; ?> <?php echo $this->Html->link('Edit','/dashboard/edit_category/'.$s['Category']['id']); ?> | <?php echo $this->Html->link('Delete','/dashboard/delete_category/'.$s['Category']['id'],array('onclick'=>'return confirm("Are you sure?");')); ?></li>
                        </ul>
                    <?php }
                }
            ?>
        <?php } ?>
        </ul>
        <?php
     }
     else
     {
        echo "No category Added";
     }