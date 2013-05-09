<?php 
    if($seek)
    {?>
        <table>
            <tr>
                <th>Company Name</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        
    <?php
        foreach($seek as $s)
        {?>
         <tr>
            <td><?php echo $s['Register']['full_name']; ?></td>
            <td><?php if($s['Register']['isApproved']=="0") echo "<b>Pending</b>"; else echo "<b>Approved</b>"; ?></td>
            <td><?php 
                echo $this->Html->link('Edit','/dashboard/edit_seeker/'.$s['Register']['id'])."|";
         echo $this->Html->link('Delete','/dashboard/remove_seeker/'.$s['Register']['id'],array('onclick'=>'return confirm("Are you sure?");'))."|";
         echo $this->Html->link('View','/dashboard/view_seeker/'.$s['Register']['id']); 
            ?></td>
         </tr>
         <?php
        }
         ?></table><?php
    }
    else
    {
        echo "No Seekers Registered yet.";
    }