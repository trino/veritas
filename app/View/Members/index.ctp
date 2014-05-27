<?php include_once('inc.php');?>
<style>
.infos a:hover{text-decoration: none;}
</style>

<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/User Manager');?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members"><?php echo $this->requestAction('dashboard/translate/User Manager');?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<?php /*echo $this->Html->link(
					'Add User',
					'/members/add',
					array('class'=>'btn btn-primary reg-company')
				);*/
			?>

<div id="table">


<table>
            <tr>
				<th><?php echo $this->requestAction('dashboard/translate/User');?></th>
                <th><?php echo $this->requestAction('dashboard/translate/First Name');?></th>
                <th><?php echo $this->requestAction('dashboard/translate/Last Name');?></th>
                <th><?php echo $this->requestAction('dashboard/translate/Username');?></th>
                <th><?php echo $this->requestAction('dashboard/translate/Title');?></th>
                <!--th>Assigned Jobs</th-->
                <th style="width:250px;">Options</th>
                <?php
        if($this->Session->read('admin'))
        {
            ?>
            <th>
            <?php echo $this->requestAction('dashboard/translate/Make Admin');?>
            </th>
            <?php
        }
        ?>
            </tr>
<?php
if($mem){
foreach($mem as $m)
{
    ?>
  
    	<tr>
			<td style=""><div style="background-color:#dddddd;width:40px; height:40px; text-align:center;"><a href="<?php echo $base_url.'members/view/'.$m['Member']['id']; ?>"><?php echo $this->Html->image('uploads/'.$m['Member']['image'], array('alt' => '','style'=>"max-height: 100%; max-width:100%;")); ?></a></div> </td>
            <td style=""><?php echo $m['Member']['fname'];?></td>
            <td style=""><?php echo $m['Member']['lname'];?></td>
            <td style=""><?php echo $m['Member']['full_name'];?></td>
            <td style=""><?php echo $m['Member']['title'];?></td>
            <!--td style="">
            <?php
            $q = $job_m->find('first',array('conditions',array('member_id'=>$m['Member']['id'])));
            if($q)
            {
                $job_id = $q['Jobmember']['job_id'];
                $job_arr = explode(',',$job_id);
                if($job_arr)
                {
                    ?>
                    <table class="table table-bordered" style="margin:0px;" >
                    <?php
                    for($z=0;$z<count($job_arr);$z++)
                    {
                        $y=$z+1;
                        if($y%4 == 1)
                        {
                            ?>
                            <tr>
                            <?php
                        }
                        $q2 = $job->find('first',array('conditions'=>array('id'=>$job_arr[$z])));
                        $jobb = $q2['Job']['title'];
                        ?>
                        <td><?php echo $jobb;?></td>
                        <?php
                        if($y%4==0)
                        {
                            ?>
                            </tr>
                            <?php
                        }
                        
                    }
                    if(isset($y)){
                    if($y%4==1)
                    {
                        
                        echo "<td></td><td></td><td></td></tr>";
                        
                    }
                    if($y%4==2)
                    {
                        
                        echo "<td></td><td></td></tr>";
                        
                    }
                    if($y%4==3)
                    {
                        
                        echo "<td></td></tr>";
                        
                    }
                    }
                    ?>
                    </table>
                    <?php
                }
            }
            ?>
            </td-->
    		<!--<td class="infos"><a href="<?php echo $base_url.'members/view/'.$m['Member']['id']; ?>"><?php echo $m['Member']['title']." ".$m['Member']['full_name']; ?></a></td>-->
    		<td>
    <?php 	echo $this->Html->link(
					$this->requestAction('dashboard/translate/Edit'),
					'/members/edit/'.$m['Member']['id'],
					array('class'=>'btn btn-primary')
				);  
			echo " " . $this->Html->link(
					$this->requestAction('dashboard/translate/Delete'),
					'/members/delete/'.$m['Member']['id'],
					array('class'=>'btn btn-primary'),$this->requestAction('dashboard/translate/Delete Member')."?"
				); 
			echo " " . $this->Html->link(
					$this->requestAction('dashboard/translate/View'),
					'/members/view/'.$m['Member']['id'],
					array('class'=>'btn btn-primary')
				);
			?>
		</td>
        
        <?php
        if($this->Session->read('admin'))
        {
            ?>
            <td>
            <input type="checkbox" class="make_admin" value="<?php echo $m['Member']['id'];?>" <?php if($m['Member']['is_admin']==1){?>checked="checked"<?php }?> />
            </td>
            <?php
        }
        ?>
        
	</tr>


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

<?php } 
else
{
    ?>
    <?php echo $this->requestAction('dashboard/translate/No')." ";?> <?php echo $this->requestAction('dashboard/translate/Users');?>.
    <?php
}
?>
<script>
$(function(){
   $('.make_admin').change(function(){
    var mem = $(this).val();
    var admin = 0;
    if($(this).is(":checked")){
         admin = 1;       
    }
    $.ajax({
       url:'<?php echo $base_url?>members/make_admin/'+mem+'/'+admin 
    });
   }); 
});
</script>