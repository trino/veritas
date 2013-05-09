<?php 
    if($biz)
    {?>
        <table>
            <tr>
                <th>Company Name</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        
    <?php
        foreach($biz as $b)
        {?>
         <tr>
            <td><?php echo $b['Register']['company']; ?></td>
            <td><?php if($b['Register']['isApproved']=="0") echo "<b>Pending</b>"; else echo "<b>Approved</b>"; ?></td>
            <td><?php 
                echo $this->Html->link('Edit','/dashboard/edit_company/'.$b['Register']['id'])."|";
         echo $this->Html->link('Delete','/dashboard/remove_company/'.$b['Register']['id'],array('onclick'=>'return confirm("Are you sure?");'))."|";
         echo $this->Html->link('View','/dashboard/view_company/'.$b['Register']['id']); 
            ?></td>
         </tr>
         <?php
        }
         ?></table><?php
    }
    else
    {
        echo "No business Registered yet.";
    }