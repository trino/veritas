<script>
$(function(){
    $( ".expire" ).datepicker({dateFormat: "yy-mm-dd"});
    });
</script>
<h3 class="page-title">Project Board</h3>
<form method="post" action="">
<input type="hidden" name="job_id" value="<?php echo $job['Job']['id'];?>" />
<table class="table table-bordered">
<tr>
    <td style="width: 50%;"><strong>Include On Project Board</strong><br /><select name="Include_on_project_board"><option value="Yes" <?php if($model['Projectboard']['Include_on_project_board'] == 'Yes'){?>selected="selected"<?php }?>>Yes</option><option value="No" <?php if($model['Projectboard']['Include_on_project_board'] == 'No'){?>selected="selected"<?php }?>>No</option></select></td>
    <td style="width: 50%;"><strong>Client Name</strong><br /><input type="text" name="client_name" value="<?php echo $job['Job']['title'];?>" readonly="readonly" /></td>
</tr>
<tr>
    <td><strong>Notes</strong><br /><textarea name="notes" style="width: 450px; height:100px"><?php echo $model['Projectboard']['notes'];?></textarea></td>
    <td><strong>Job Number</strong><br /><input type="text" name="job_number" value="<?php echo $model['Projectboard']['job_number'];?>" /></td>
</tr>
<tr>
    <td><strong>Job Status</strong><br /><select name="job_status"><option value="On Project Board" <?php if($model['Projectboard']['job_status'] == 'On Project Board'){?>selected="selected"<?php }?>>On Project Board</option><option value="Operation Prep" <?php if($model['Projectboard']['job_status'] == 'Operation Prep'){?>selected="selected"<?php }?>>Operation Prep</option><option value="Deployed" <?php if($model['Projectboard']['Deployed'] == 'Deployed'){?>selected="selected"<?php }?>>Deployed</option><option value="Active" <?php if($model['Projectboard']['job_status'] == 'Active'){?>selected="selected"<?php }?>>Active</option><option value="Complete" <?php if($model['Projectboard']['job_status'] == 'Complete'){?>selected="selected"<?php }?>>Complete</option></select></td>
    <td><strong>City</strong><br /><input type="text" name="city" value="<?php echo $model['Projectboard']['city'];?>"/></td>
</tr>
<tr>
    <td><strong>State</strong><br /><input type="text" name="state" value="<?php echo $model['Projectboard']['state'];?>"/></td>
    <td><strong>Latitude</strong><br /><input type="text" name="latitude" value="<?php echo $model['Projectboard']['latitude'];?>"/></td>
</tr>
<tr>
    <td><strong>Longitude</strong><br /><input type="text" name="longitude" value="<?php echo $model['Projectboard']['longitude'];?>"/></td>
    <td><strong>Expiration Date</strong><br /><input type="text" class="expire" name="expiration_date" value="<?php echo $model['Projectboard']['expiration_date'];?>"/></td>
</tr>
<tr>
    <td><strong>Completion Date</strong><br /><input type="text" class="expire" name="completion_date" value="<?php echo $model['Projectboard']['completion_date'];?>"/></td>
    <td><strong>New Expiration date</strong><br /><input type="text" class="expire" name="new_expiration_date" value="<?php echo $model['Projectboard']['new_expiration_date'];?>"/></td>
</tr>
</table>
<hr />
<h3>Personal Section</h3>
<table class="table table-bordered">
<tr>
    <td style="width: 50%;"><strong>Security Projected</strong><br /><input type="text" name="security_projected" value="<?php echo $model['Projectboard']['security_projected'];?>"/></td>
    <td style="width: 50%;"><strong>Security Deployed</strong><br /><input type="text" name="security_deployed" value="<?php echo $model['Projectboard']['security_deployed'];?>"/></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Logistics Projected</strong><br /><input type="text" name="logistics_projected" value="<?php echo $model['Projectboard']['logistics_projected'];?>"/></td>
    <td style="width: 50%;"><strong>Logistics Deployed</strong><br /><input type="text" name="logistics_deployed" value="<?php echo $model['Projectboard']['logistics_deployed'];?>"/></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Replacement Workers Projected</strong><br /><input type="text" name="replacement_workers_projected" value="<?php echo $model['Projectboard']['replacement_workers_projected'];?>" /></td>
    <td style="width: 50%;"><strong>Replacement Workers Deployed</strong><br /><input type="text" name="replacement_workers_deployed" value="<?php echo $model['Projectboard']['replacement_workers_deployed'];?>" /></td>
</tr>
</table>
<hr />
<h3>Equipment Section</h3>
<table class="table table-bordered">
<tr>
    <td style="width: 50%;"><strong>Dry Trailer Projected</strong><br /><input type="text" name="dry_trailer_projected"  value="<?php echo $model['Projectboard']['dry_trailer_projected'];?>" /></td>
    <td style="width: 50%;"><strong>Dry Trailer Deployed</strong><br /><input type="text" name="dry_trailer_deployed"  value="<?php echo $model['Projectboard']['dry_trailer_deployed'];?>" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Box Truck Projected</strong><br /><input type="text" name="box_truck_projected" value="<?php echo $model['Projectboard']['box_truck_projected'];?>" /></td>
    <td style="width: 50%;"><strong>Box Truck Deployed</strong><br /><input type="text" name="box_truck_deployed" value="<?php echo $model['Projectboard']['box_truck_deployed'];?>" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Box Reefer Projected</strong><br /><input type="text" name="box_reefer_projected" value="<?php echo $model['Projectboard']['box_reefer_projected'];?>" /></td>
    <td style="width: 50%;"><strong>Box Reefer Deployed</strong><br /><input type="text" name="box_reefer_deployed" value="<?php echo $model['Projectboard']['box_reefer_deployed'];?>" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Kitchen Trailer Projected</strong><br /><input type="text" name="kitchen_trailer_projected" value="<?php echo $model['Projectboard']['kitchen_trailer_projected'];?>" /></td>
    <td style="width: 50%;"><strong>Kitchen Trailer Deployed</strong><br /><input type="text" name="kitchen_trailer_deployed" value="<?php echo $model['Projectboard']['kitchen_trailer_deployed'];?>" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Refrigerated Trailer Projected</strong><br /><input type="text" name="refrigerated_trailer_projected" value="<?php echo $model['Projectboard']['refrigerated_trailer_projected'];?>" /></td>
    <td style="width: 50%;"><strong>Refrigerated Trailer Deployed</strong><br /><input type="text" name="refrigerated_trailer_deployed" value="<?php echo $model['Projectboard']['refrigerated_trailer_deployed'];?>" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Laundry Trailer Projected</strong><br /><input type="text" name="laundry_trailer_projected"  value="<?php echo $model['Projectboard']['laundry_trailer_projected'];?>"/></td>
    <td style="width: 50%;"><strong>Laundry Trailer Deployed</strong><br /><input type="text" name="laundry_trailer_deployed"  value="<?php echo $model['Projectboard']['laundry_trailer_deployed'];?>"/></td>
</tr>
<tr>  
    <td style="width: 50%;"><strong>Shower Trailer Projected</strong><br /><input type="text" name="shower_trailer_projected"  value="<?php echo $model['Projectboard']['shower_trailer_projected'];?>" /></td>
    <td style="width: 50%;"><strong>Shower Trailer Deployed</strong><br /><input type="text" name="shower_trailer_deployed"  value="<?php echo $model['Projectboard']['shower_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Housing Trailer Projected</strong><br /><input type="text" name="housing_trailer_projected"  value="<?php echo $model['Projectboard']['shower_trailer_projected'];?>"/></td>
    <td style="width: 50%;"><strong>Housing Trailer Deployed</strong><br /><input type="text" name="housing_trailer_deployed"  value="<?php echo $model['Projectboard']['shower_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Dining Trailer Projected</strong><br /><input type="text" name="dining_trailer_projected"  value="<?php echo $model['Projectboard']['dining_trailer_projected'];?>"/></td>
    <td style="width: 50%;"><strong>Dining Trailer Deployed</strong><br /><input type="text" name="dining_trailer_deployed"  value="<?php echo $model['Projectboard']['dining_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Deployment Start Date</strong><br /><input type="text" class="expire" name="deployment_start_date"  value="<?php echo $model['Projectboard']['deployment_start_date'];?>"/></td>
    <td style="width: 50%;"><strong>Tombstone/Man Hours</strong><br /><input type="text" name="tombstone_man_hours"  value="<?php echo $model['Projectboard']['tombstone_man_hours'];?>"/></td>
</tr>
<tr>
    <td colspan="2"><strong>Contact Info</strong><br /><textarea name="contact_info" style="width: 450px; height:100px"><?php echo $model['Projectboard']['contact_info'];?></textarea></td>    
</tr>
</table>
<input type="submit" value="Submit" class="btn btn-primary" />
</form>