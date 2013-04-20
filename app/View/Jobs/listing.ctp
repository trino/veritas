<?php include_once('inc.php');?>
<script>
function sort(value)
{
    if(value=="employee")
        var order = $('#emp').val();
    else if(value=="supervisor") 
        var order = $('#sup').val();
       
      $.ajax({
        
        url : 'sorting',
        type: 'post',
        data: 'order='+order+'&type='+value,
        success: function(data)
        {
            if(value=="employee")
            {
                $('#employee').html(data);
                if(order=="asc")
                {
                    $('#emp').val('desc');
                }
                else
                {
                    $('#emp').val('asc');
                }
            }
            else if(value=="supervisor")
            {
                $('#supervisor').html(data);
                if(order=="asc")
                {
                    $('#sup').val('desc');
                }
                else
                {
                    $('#sup').val('asc');
                }
            }
        }
      });  
}
</script>
<div id="table">
<form action="" method="post">
<table>
<tr><td><label>Search Members</label><input type="text" name="search" /> <input type="submit" name="submit" value="Search" class="btn btn-primary"/></td></tr>
</form>
<!-- <table>
    <tr>
        <th><a href="javascript:void(0);" onclick="sort('employee');">Employee</a></th>
        <th><a href="javascript:void(0);" onclick="sort('supervisor');">Supervisor</a></th>
    </tr>
    <tr>
    <td>
    <span id="employee">
    <?php 
        foreach($emp as $m)
        { ?>
        
            <?php echo $m['Member']['full_name']; echo $this->Html->link('Assign','assign/'.$m['Member']['id'])."<br>";
        }  ?>
        </span>
    </td>
    <td id="supervisor">
        <?php 
        foreach($sup as $m)
        { ?>
        <?php echo $m['Member']['full_name']; echo $this->Html->link('Assign','assign/'.$m['Member']['id'])."<br>";
        }  ?></td>
        </tr>    
       
</table> -->

    <?php 
        foreach($user as $u)
        { ?>
    <tr><td>
<label><?php
            echo $u['Member']['full_name']; ?></label><?php echo $this->Html->link('Assign','assign/'.$u['Member']['id'],array('class' =>'btn btn-primary' )) ?>
            </td></tr> 
            <?php
        }
    ?>
</table>
<input type="hidden" name="emp" id="emp" value="asc" />
<input type="hidden" name="sup" id="sup" value="asc" />