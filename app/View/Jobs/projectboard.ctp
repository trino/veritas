<h3 class="page-title">Project Board</h3>
<form method="post" action="">
<input type="hidden" name="job_id" value="<?php echo $job['Job']['id'];?>" />
<table class="table table-bordered">
<tr>
    <td style="width: 50%;"><strong>Include On Project Board</strong><br /><select name="Include_on_project_board"><option value="Yes">Yes</option><option value="No">No</option></select></td>
    <td style="width: 50%;"><strong>Client Name</strong><br /><input type="text" name="client_name" /></td>
</tr>
<tr>
    <td><strong>Notes</strong><br /><textarea name="notes" style="width: 450px; height:100px"></textarea></td>
    <td><strong>Job Number</strong><br /><input type="text" name="job_number" /></td>
</tr>
<tr>
    <td><strong>Job Status</strong><br /><select name="job_status"><option value="On Project Board">On Project Board</option><option value="Operation Prep">Operation Prep</option><option value="Deployed">Deployed</option><option value="Active">Active</option><option value="Complete">Complete</option></select></td>
    <td><strong>City</strong><br /><input type="text" name="city" /></td>
</tr>
<tr>
    <td><strong>State</strong><br /><input type="text" name="state" /></td>
    <td><strong>Latitude</strong><br /><input type="text" name="latitude" /></td>
</tr>
<tr>
    <td><strong>Longitude</strong><br /><input type="text" name="longitude" /></td>
    <td><strong>Expiration Date</strong><br /><input type="text" name="epiration_date" /></td>
</tr>
<tr>
    <td><strong>Completion Date</strong><br /><input type="text" name="completion_date" /></td>
    <td><strong>New Expiration date</strong><br /><input type="text" name="new_epiration_date" /></td>
</tr>
</table>
<hr />
<h3>Personal Section</h3>
<table class="table table-bordered">
<tr>
    <td style="width: 50%;"><strong>Security Projected</strong><br /><input type="text" name="security_projected" /></td>
    <td style="width: 50%;"><strong>Security Deployed</strong><br /><input type="text" name="security_deployed" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Logistics Projected</strong><br /><input type="text" name="logistics_projected" /></td>
    <td style="width: 50%;"><strong>Logistics Deployed</strong><br /><input type="text" name="logistics_deployed" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Replacement Workers Projected</strong><br /><input type="text" name="replacement_workers_projected" /></td>
    <td style="width: 50%;"><strong>Replacement Workers Deployed</strong><br /><input type="text" name="replacement_workers_deployed" /></td>
</tr>
</table>
<hr />
<h3>Equipment Section</h3>
<table class="table table-bordered">
<tr>
    <td style="width: 50%;"><strong>Dry Trailer Projected</strong><br /><input type="text" name="dry_trailer_projected" /></td>
    <td style="width: 50%;"><strong>Dry Trailer Deployed</strong><br /><input type="text" name="dry_trailer_deployed" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Box Truck Projected</strong><br /><input type="text" name="box_truck_projected" /></td>
    <td style="width: 50%;"><strong>Box Truck Deployed</strong><br /><input type="text" name="box_truck_deployed" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Box Reefer Projected</strong><br /><input type="text" name="box_reefer_projected" /></td>
    <td style="width: 50%;"><strong>Box Reefer Deployed</strong><br /><input type="text" name="box_reefer_deployed" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Kitchen Trailer Projected</strong><br /><input type="text" name="kitchen_trailer_projected" /></td>
    <td style="width: 50%;"><strong>Kitchen Trailer Deployed</strong><br /><input type="text" name="kitchen_trailer_deployed" /></td>
</tr>
<tr>
    <td style="width: 50%;"><strong>Refrigerated Trailer Projected</strong><br /><input type="text" name="refirgerated_trailer_projected" /></td>
    <td style="width: 50%;"><strong>Refrigerated Trailer Deployed</strong><br /><input type="text" name="refirgerated_trailer_deployed" /></td>
</tr>
</table>
</form>