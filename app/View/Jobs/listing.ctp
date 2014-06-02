<?php include_once('inc.php');?>

<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Assign Job to User');?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs"><?php echo $this->requestAction('dashboard/translate/Job Manager');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/listing"><?php echo $this->requestAction('dashboard/translate/Assign Job to User');?></a> <!--span class="icon-angle-right"></span-->
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

<input type="text" name="search" placeholder="<?php echo $this->requestAction('dashboard/translate/Members Search');?>" /> <input type="submit" name="submit" value="<?php echo $this->requestAction('dashboard/translate/Search');?>" class="btn btn-primary" style="margin-top:-10px;"/>


<div id="table">

<table>
<tr><th><?php echo $this->requestAction('dashboard/translate/Username');?></th>
<th><?php echo $this->requestAction('dashboard/translate/First Name');?></th>
<th><?php echo $this->requestAction('dashboard/translate/Last Name');?></th>
<th><?php echo $this->requestAction('dashboard/translate/Email');?></th>
<th><?php echo $this->requestAction('dashboard/translate/Phone');?></th>
<th><?php echo $this->requestAction('dashboard/translate/Address');?></th>
<th><?php echo $this->requestAction('dashboard/translate/Options');?></th></tr>
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
        
            <?php echo $m['Member']['full_name']; echo $this->Html->link($this->requestAction('dashboard/translate/Assign'),'assign/'.$m['Member']['id'])."<br>";
        }  ?>
        </span>
    </td>
    <td id="supervisor">
        <?php 
        foreach($sup as $m)
        { ?>
        <?php echo $m['Member']['full_name']; echo $this->Html->link($this->requestAction('dashboard/translate/Assign'),'assign/'.$m['Member']['id'])."<br>";
        }  ?></td>
        </tr>    
       
</table> -->

    <?php 
        foreach($user as $u)
        { ?>
    <tr>
    <td style="width:140px;"><?php echo $u['Member']['full_name']; ?></td>
    <td><?php echo $u['Member']['fname']; ?></td>
    <td><?php echo $u['Member']['lname']; ?></td>
    <td><?php echo $u['Member']['email']; ?></td>
    <td><?php echo $u['Member']['phone']; ?></td>
    <td><?php echo $u['Member']['address']; ?></td>
    <td><?php echo $this->Html->link($this->requestAction('dashboard/translate/Assign'),'assign/'.$u['Member']['id'],array('class' =>'btn btn-primary' )) ?>
            </td></tr> 
            <?php
        }
    ?>
</table>
</div>
<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('«', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('»', array('tag' => 'li')); ?>
</ul>
</div>
<input type="hidden" name="emp" id="emp" value="asc" />
<input type="hidden" name="sup" id="sup" value="asc" />
</form>





