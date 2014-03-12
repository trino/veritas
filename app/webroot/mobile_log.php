<tr class="mobilelog_more" style="display: none;">
    <td colspan="2">
        <table class="table">
            <tr>
                <td colspan="4"><strong>Mobile Log</strong></td>
            </tr>
            <tr>
                <td width="20%">Mobile Guard:</td><td><input type="text" value="" class="required" /> </td>
                <td width="15%">Shift:</td><td><input type="text" class="time required" value="" placeholder="From" style="width: 150px;"  />
                    <input type="text" class="time required" value="" placeholder="To" style="width: 150px;" />
                </td>
                
            </tr>
            <tr>
                <td>Start Date</td><td><input type="text" name="" class="date_verify required" /></td>
                <td>End Date</td><td><input type="text" name="" class="date_verify required" /></td>
            </tr>
            <tr>
                <td rowspan="8"></td>
                <td colspan="2">Toyota Patrol (2330 - 0430) </td>
                <td rowspan="8"></td>
            </tr>
            <tr>
                <td><input type="text" class="time" style="width: 150px;" /></td>
                <td><input type="text" class="time" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td><input type="text" class="time" style="width: 150px;" /></td>
                <td><input type="text" class="time" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td><input type="text" class="time" style="width: 150px;" /></td>
                <td><input type="text" class="time" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td><input type="text" class="time" style="width: 150px;" /></td>
                <td><input type="text" class="time" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td colspan="2">Toyota/ 105 Nashdene (2330 - 0430)</td>
            </tr>
             <tr>
                <td><input type="text" class="time" style="width: 150px;" /></td>
                <td><input type="text" class="time" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td><input type="text" class="time" style="width: 150px;" /></td>
                <td><input type="text" class="time" style="width: 150px;" /></td>
            </tr>
            
        </table>
        <table class="table">
            <tr><td colspan="5">Mobile / Site Check In</td></tr>
            <tr><td>Arriaval</td><td>Depart</td><td>Site Adddress</td><td>Guard Onsite</td><td></td></tr>
            <tr>
                <td><input type="text" name="arrival[]" /></td>
                <td><input type="text" name="depart[]" /></td>
                <td><input type="text" name="siteaddress[]" /></td>
                <td><input type="text" name="guardonsite[]" /></td>
                <td><input type="button" value="+Add More" id="addcheck"/></td>
            </tr>
        </table>    
    </td>
</tr>
<script>
$(function(){
    
    $('.time').timepicker(); 
});
</script>