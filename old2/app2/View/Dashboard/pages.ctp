<div>
    <?php echo $this->Html->link('Add Page','/dashboard/add_page'); ?>
    <?php 
        if($page)
        {?>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Options</th>
                </tr>
                <?php 
                    foreach($page as $p)
                    {?>
                        <tr>
                            <td><?php echo $p['Page']['title']; ?></td>
                            <td><?php echo $this->Html->link('Edit','/dashboard/edit_page/'.$p['Page']['id']); ?> | <?php /*echo $this->Html->link('Delete','/dashboard/delete_page/'.$p['Page']['id']);  */ ?> </td>
                        </tr>
                    <?php }
                ?>
            </table>
        <?php }
        else
        {
            echo "No Page Available";
        }
    ?>
</div>