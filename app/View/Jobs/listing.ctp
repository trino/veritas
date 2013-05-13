<?php include_once('inc.php');?>

<h3 class="page-title">
	Assign Job to User
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/listing">Assign Job to User</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

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
<form action="" method="post">

<input type="text" name="search" placeholder="Members Search" /> <input type="submit" name="submit" value="Search" class="btn btn-primary" style="margin-top:-10px;"/>


<div id="table">

<table>
<tr><th>User</th>
<th>Options</th></tr>
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
    <tr><td style="width:140px;">
<?php
            echo $u['Member']['full_name']; ?></td><td><?php echo $this->Html->link('Assign','assign/'.$u['Member']['id'],array('class' =>'btn btn-primary' )) ?>
            </td></tr> 
            <?php
        }
    ?>
</table>
</div>
<input type="hidden" name="emp" id="emp" value="asc" />
<input type="hidden" name="sup" id="sup" value="asc" />
</form>





