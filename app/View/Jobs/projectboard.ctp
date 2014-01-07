<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script>
function getloc()
{
    var addres = $('.city').val() + ',' + $('.state').val(); 
    var geocoder =  new google.maps.Geocoder();
    geocoder.geocode( { 'address': addres}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            $('.lat').val(results[0].geometry.location.lat());
            $('.long').val(results[0].geometry.location.lng());
            //alert("location : " + results[0].geometry.location.lat() + " " +results[0].geometry.location.lng()); 
          } 
        });
}
$(function(){
    $( ".expire" ).datepicker({dateFormat: "m-d-yy"});
    $('.expire').each(function(){
       if($(this).val()=='0000-00-00')
       {
            $(this).val('');
       } 
    });
    });
</script>
<h3 class="page-title">Project Board</h3>
<form method="post" action="">
<input type="hidden" name="job_id" value="<?php echo $job['Job']['id'];?>" />
<table class="table table-bordered">
<tr>
    <td style="width: 33%;"><strong>Include On Project Board</strong><br /><select name="Include_on_project_board"><option value="Yes" <?php if($model['Projectboard']['Include_on_project_board'] == 'Yes'){?>selected="selected"<?php }?>>Yes</option><option value="No" <?php if($model['Projectboard']['Include_on_project_board'] == 'No'){?>selected="selected"<?php }?>>No</option></select></td>
    <td style="width: 33%;"><strong>Client Name</strong><br /><input type="text" name="client_name" value="<?php echo $job['Job']['title'];?>" readonly="readonly" /></td>
    <td style="width: 34%;"><strong>Job Number</strong><br /><input type="text" name="job_number" value="<?php echo $model['Projectboard']['job_number'];?>" /></td>
</tr>

<tr>
    <td><strong>Job Status</strong><br /><select name="job_status">
	<option value="On Project Board" <?php if($model['Projectboard']['job_status'] == 'On Project Board'){?>selected="selected"<?php }?>>On Project Board</option>
	<option value="Operation Prep" <?php if($model['Projectboard']['job_status'] == 'Operation Prep'){?>selected="selected"<?php }?>>Operation Prep</option>
	<option value="Deployed" <?php if($model['Projectboard']['Deployed'] == 'Deployed'){?>selected="selected"<?php }?>>Deployed</option>
	<option value="Active" <?php if($model['Projectboard']['job_status'] == 'Active'){?>selected="selected"<?php }?>>Active</option>
	<option value="Complete" <?php if($model['Projectboard']['job_status'] == 'Complete'){?>selected="selected"<?php }?>>Complete</option>
	<option value="Contract Ratification" <?php if($model['Projectboard']['job_status'] == 'Contract Ratification'){?>selected="selected"<?php }?>>Contract Ratification</option>
	</select></td>
	
    <td><strong>City</strong><br /><input type="text" class="city" name="city" value="<?php echo $model['Projectboard']['city'];?>"/></td>
    <td><strong>State/Province</strong><br /><input type="text" class="state" name="state" value="<?php echo $model['Projectboard']['state'];?>" onchange="getloc()"/></td>
</tr>
<tr>
    <td><strong>Latitude</strong><br /><input type="text" class="lat" name="latitude" value="<?php echo $model['Projectboard']['latitude'];?>"/></td>
    <td><strong>Longitude</strong><br /><input type="text" class="long" name="longitude" value="<?php echo $model['Projectboard']['longitude'];?>"/></td>
    <td><strong>Expiration Date</strong><br /><input type="text" class="expire" name="expiration_date" value="<?php echo $model['Projectboard']['expiration_date'];?>"/></td>
</tr>
<tr>
    <td><strong>Proposal Date</strong><br /><input type="text" class="expire" name="proposal_date" value="<?php echo $model['Projectboard']['proposal_date'];?>"/></td>
    <td><strong>Contract Date</strong><br /><input type="text" class="expire" name="contract_date" value="<?php echo $model['Projectboard']['contract_date'];?>"/></td>
    <td><strong>Competition Date</strong><br /><input type="text" class="expire" name="competition_date" value="<?php echo $model['Projectboard']['competition_date'];?>"/></td>
</tr>
<tr>
    <td><strong>Active Start Date</strong><br /><input type="text" class="expire" name="active_start_date" value="<?php echo $model['Projectboard']['active_start_date'];?>" /></td>
    <td><strong>Completion Date</strong><br /><input type="text" class="expire" name="completion_date" value="<?php echo $model['Projectboard']['completion_date'];?>"/></td>
    <td><strong>New Expiration Date</strong><br /><input type="text" class="expire" name="new_expiration_date" value="<?php echo $model['Projectboard']['new_expiration_date'];?>"/></td>
    
</tr>
<tr>
    <td colspan="3"><strong>Notes</strong> &nbsp; <textarea name="notes" style="width: 500px; height:100px"><?php echo $model['Projectboard']['notes'];?></textarea></td>    
</tr>
</table>

<h3>Personnel Section</h3>
<table class="table table-bordered">
<tr>
    <td style=""><strong>Security Projected</strong><br /><input type="text" name="security_projected" value="<?php echo $model['Projectboard']['security_projected'];?>"/></td>
    <td style=""><strong>Security Deployed</strong><br /><input type="text" name="security_deployed" value="<?php echo $model['Projectboard']['security_deployed'];?>"/></td>
	
	</tr>
<tr>   
    <td style=""><strong>Transportation Projected</strong><br /><input type="text" name="logistics_projected" value="<?php echo $model['Projectboard']['logistics_projected'];?>"/></td>
 
    <td style=""><strong>Transportation Deployed</strong><br /><input type="text" name="logistics_deployed" value="<?php echo $model['Projectboard']['logistics_deployed'];?>"/></td>
	
	</tr>
<tr>   
    <td style=""><strong>Replacement Workers Projected</strong><br /><input type="text" name="replacement_workers_projected" value="<?php echo $model['Projectboard']['replacement_workers_projected'];?>" /></td>
    <td style=""><strong>Replacement Workers Deployed</strong><br /><input type="text" name="replacement_workers_deployed" value="<?php echo $model['Projectboard']['replacement_workers_deployed'];?>" /></td>
</tr>
</table>

<h3>Equipment Section</h3>
<table class="table table-bordered">
<tr>
    <td style=""><strong>Dry Trailer Projected</strong><br /><input type="text" name="dry_trailer_projected"  value="<?php echo $model['Projectboard']['dry_trailer_projected'];?>" /></td>
    <td style=""><strong>Dry Trailer Deployed</strong><br /><input type="text" name="dry_trailer_deployed"  value="<?php echo $model['Projectboard']['dry_trailer_deployed'];?>" /></td>
</tr>
<tr>  

    <td style=""><strong>Box Truck Projected</strong><br /><input type="text" name="box_truck_projected" value="<?php echo $model['Projectboard']['box_truck_projected'];?>" /></td>
  
    <td style=""><strong>Box Truck Deployed</strong><br /><input type="text" name="box_truck_deployed" value="<?php echo $model['Projectboard']['box_truck_deployed'];?>" /></td>
	
	</tr>
<tr>
    <td style=""><strong>Box Reefer Projected</strong><br /><input type="text" name="box_reefer_projected" value="<?php echo $model['Projectboard']['box_reefer_projected'];?>" /></td>
    <td style=""><strong>Box Reefer Deployed</strong><br /><input type="text" name="box_reefer_deployed" value="<?php echo $model['Projectboard']['box_reefer_deployed'];?>" /></td>
</tr>
<tr>
    <td style=""><strong>Kitchen Trailer Projected</strong><br /><input type="text" name="kitchen_trailer_projected" value="<?php echo $model['Projectboard']['kitchen_trailer_projected'];?>" /></td>
    <td style=""><strong>Kitchen Trailer Deployed</strong><br /><input type="text" name="kitchen_trailer_deployed" value="<?php echo $model['Projectboard']['kitchen_trailer_deployed'];?>" /></td>
	
	</tr>
<tr>
    <td style=""><strong>Refrigerated Trailer Projected</strong><br /><input type="text" name="refrigerated_trailer_projected" value="<?php echo $model['Projectboard']['refrigerated_trailer_projected'];?>" /></td>

    <td style=""><strong>Refrigerated Trailer Deployed</strong><br /><input type="text" name="refrigerated_trailer_deployed" value="<?php echo $model['Projectboard']['refrigerated_trailer_deployed'];?>" /></td>
	
	</tr>
<tr>
    <td style=""><strong>Laundry Trailer Projected</strong><br /><input type="text" name="laundry_trailer_projected"  value="<?php echo $model['Projectboard']['laundry_trailer_projected'];?>"/></td>
    <td style=""><strong>Laundry Trailer Deployed</strong><br /><input type="text" name="laundry_trailer_deployed"  value="<?php echo $model['Projectboard']['laundry_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>Shower Trailer Projected</strong><br /><input type="text" name="shower_trailer_projected"  value="<?php echo $model['Projectboard']['shower_trailer_projected'];?>" /></td>
    <td style=""><strong>Shower Trailer Deployed</strong><br /><input type="text" name="shower_trailer_deployed"  value="<?php echo $model['Projectboard']['shower_trailer_deployed'];?>"/></td>
	
	</tr>
<tr>
    <td style=""><strong>Housing Trailer Projected</strong><br /><input type="text" name="housing_trailer_projected"  value="<?php echo $model['Projectboard']['shower_trailer_projected'];?>"/></td>

    <td style=""><strong>Housing Trailer Deployed</strong><br /><input type="text" name="housing_trailer_deployed"  value="<?php echo $model['Projectboard']['shower_trailer_deployed'];?>"/></td>
	
	</tr>
<tr>
    <td style=""><strong>Dining Trailer Projected</strong><br /><input type="text" name="dining_trailer_projected"  value="<?php echo $model['Projectboard']['dining_trailer_projected'];?>"/></td>
    <td style=""><strong>Dining Trailer Deployed</strong><br /><input type="text" name="dining_trailer_deployed"  value="<?php echo $model['Projectboard']['dining_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>Coach Busses Projected</strong><br /><input type="text" name="coach_trailer_projected"  value="<?php echo $model['Projectboard']['coach_trailer_projected'];?>"/></td>
    <td style=""><strong>Coach Busses Deployed</strong><br /><input type="text" name="coach_trailer_deployed"  value="<?php echo $model['Projectboard']['coach_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>School Busses Projected</strong><br /><input type="text" name="school_trailer_projected"  value="<?php echo $model['Projectboard']['school_trailer_projected'];?>"/></td>
    <td style=""><strong>School Busses Deployed</strong><br /><input type="text" name="school_trailer_deployed"  value="<?php echo $model['Projectboard']['school_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>15 Passenger Van Projected</strong><br /><input type="text" name="15pess_trailer_projected"  value="<?php echo $model['Projectboard']['15pess_trailer_projected'];?>"/></td>
    <td style=""><strong>15 Passenger Van Deployed</strong><br /><input type="text" name="15pess_trailer_deployed"  value="<?php echo $model['Projectboard']['15pess_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>5 Tonne Truck Projected</strong><br /><input type="text" name="5tone_trailer_projected"  value="<?php echo $model['Projectboard']['5tone_trailer_projected'];?>"/></td>
    <td style=""><strong>5 Tonne Truck Deployed</strong><br /><input type="text" name="5tone_trailer_deployed"  value="<?php echo $model['Projectboard']['5tone_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>Security Vehicles/Mini-Vans Projected</strong><br /><input type="text" name="minivans_trailer_projected"  value="<?php echo $model['Projectboard']['minivans_trailer_projected'];?>"/></td>
    <td style=""><strong>Security Vehicles/Mini-Vans Deployed</strong><br /><input type="text" name="minivans_trailer_deployed"  value="<?php echo $model['Projectboard']['minivans_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>Large SUV Projected</strong><br /><input type="text" name="suv_trailer_projected"  value="<?php echo $model['Projectboard']['suv_trailer_projected'];?>"/></td>
    <td style=""><strong>Large SUV Deployed</strong><br /><input type="text" name="suv_trailer_deployed"  value="<?php echo $model['Projectboard']['suv_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>Transport Truck Projected</strong><br /><input type="text" name="transport_trailer_projected"  value="<?php echo $model['Projectboard']['transport_trailer_projected'];?>"/></td>
    <td style=""><strong>Transport Truck Deployed</strong><br /><input type="text" name="transport_trailer_deployed"  value="<?php echo $model['Projectboard']['transport_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>Reffer Projected</strong><br /><input type="text" name="reffer_trailer_projected"  value="<?php echo $model['Projectboard']['reffer_trailer_projected'];?>"/></td>
    <td style=""><strong>Reffer Deployed</strong><br /><input type="text" name="reffer_trailer_deployed"  value="<?php echo $model['Projectboard']['reffer_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>Flatbed Trailer Projected</strong><br /><input type="text" name="flatbed_trailer_projected"  value="<?php echo $model['Projectboard']['flatbed_trailer_projected'];?>"/></td>
    <td style=""><strong>Flatbed Trailer Deployed</strong><br /><input type="text" name="flatbed_trailer_deployed"  value="<?php echo $model['Projectboard']['flatbed_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>Cots Projected</strong><br /><input type="text" name="cots_trailer_projected"  value="<?php echo $model['Projectboard']['cots_trailer_projected'];?>"/></td>
    <td style=""><strong>Cots Deployed</strong><br /><input type="text" name="cots_trailer_deployed"  value="<?php echo $model['Projectboard']['cots_trailer_deployed'];?>"/></td>
</tr>
<tr>
    <td style=""><strong>Deployment Start Date</strong><br /><input type="text" class="expire" name="deployment_start_date"  value="<?php echo $model['Projectboard']['deployment_start_date'];?>"/></td>
    <td style=""><strong>Tombstone/Man Hours</strong><br /><input type="text" name="tombstone_man_hours"  value="<?php echo $model['Projectboard']['tombstone_man_hours'];?>"/></td>
    
</tr>
<tr>
    <td colspan="3"><strong>Contact Info</strong><br /><textarea name="contact_info" style="width: 500px; height:100px"><?php echo $model['Projectboard']['contact_info'];?></textarea></td>
</tr>

</table>
<input type="submit" value="Submit" class="btn btn-primary" />
</form>