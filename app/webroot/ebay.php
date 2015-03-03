<td colspan="3" style="background: #f5f5f5;padding:0;" class="ebay">

<table>
<tr>
    <td>Name</td> 
    <td><input type="text" name="ebay[name]" value="<?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['name'];?>"/></td> 
    <td colspan="2">Employee's Supervisor</td> 
    <td colspan="2"><input type="text" name="ebay[supervisor]" value="<?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['supervisor'];?>"/></td>
</tr>
<tr>
    <td>Start Date</td>
    <td><input type="text" name="ebay[start_date]" value="<?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['start_date'];?>"/></td>
    <td>Position</td>
    <td><input type="text" name="ebay[position]" value="<?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['position'];?>"/></td>
    <td>Location</td>
    <td><input type="text" name="ebay[location]" value="<?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['location'];?>"/></td>
    
    
</tr>
</table>
<table>
<thead><th colspan="4"><h2>General Compliance</h2></th></thead>
<tr>
    <td><input type="radio" name="ebay[license]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['license']=='1')echo "checked='checked'";?> />Yes</td>
    <td><input type="radio" name="ebay[license]" value="0" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['license']=='0')echo "checked='checked'";?>/>No</td>
    <td><input type="radio" name="ebay[license]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['license']=='2')echo "checked='checked'";?>/>N/A</td>
    <td>Does the employee have a valid security license and proper identification?</td>
</tr>
<tr>
    <td><input type="radio" name="ebay[safe]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['safe']=='1')echo "checked='checked'";?>/>Yes</td>
    <td><input type="radio" name="ebay[safe]" value="0" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['safe']=='0')echo "checked='checked'";?>/>No</td>
    <td></td>
    <td>Is a safe workplace being maintained? *</td>
</tr>
</table>
<table>
<thead><th><h2>Appraisal Ratings</h2></th><th colspan="5"><h2>Rating</h2></th></thead>
<tr>
    <td>Rating Category</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
</tr>
<tr>
    <td>Knowledge of Mission and Values (automatic score of "1" if no card in possession)</td>
    <td><input type="radio" name="ebay[kmv]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kmv']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kmv]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kmv']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kmv]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kmv']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kmv]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kmv']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kmv]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kmv']=='5')echo "checked='checked'";?>/></td>
</tr>
<tr>
    <td>Quality of Uniform Appearance</td>
    <td><input type="radio" name="ebay[qua]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qua']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qua]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qua']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qua]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qua']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qua]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qua']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qua]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qua']=='5')echo "checked='checked'";?>/></td>
</tr>
<tr>
    <td>Quality of Grooming Standards</td>
    <td><input type="radio" name="ebay[qgs]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qgs']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qgs]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qgs']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qgs]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qgs']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qgs]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qgs']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qgs]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qgs']=='5')echo "checked='checked'";?>/></td>
</tr>    
<tr>
    <td>Cleanliness of Workplace</td>
    <td><input type="radio" name="ebay[cow]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['cow']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[cow]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['cow']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[cow]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['cow']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[cow]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['cow']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[cow]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['cow']=='5')echo "checked='checked'";?>/></td>
</tr>    
<tr>
    <td>Knowledge of site</td>
    <td><input type="radio" name="ebay[kos]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kos']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kos]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kos']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kos]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kos']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kos]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kos']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kos]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kos']=='5')echo "checked='checked'";?>/></td>
</tr>    
<tr>
    <td>Knowledge of Post Orders</td>
    <td><input type="radio" name="ebay[kpo]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kpo']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kpo]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kpo']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kpo]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kpo']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kpo]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kpo']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[kpo]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['kpo']=='5')echo "checked='checked'";?>/></td>
</tr>    
<tr>
    <td>Quality of Reports </td>
    <td><input type="radio" name="ebay[qor]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qor']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qor]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qor']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qor]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qor']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qor]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qor']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[qor]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['qor']=='5')echo "checked='checked'";?>/></td>
</tr>    
<tr>
    <td>Attitude and Demeanor </td>
    <td><input type="radio" name="ebay[aad]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['aad']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[aad]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['aad']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[aad]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['aad']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[aad]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['aad']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[aad]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['aad']=='5')echo "checked='checked'";?>/></td>
</tr>    
<tr>
    <td>Customer Service Skills </td>
    <td><input type="radio" name="ebay[css]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['css']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[css]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['css']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[css]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['css']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[css]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['css']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[css]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['css']=='5')echo "checked='checked'";?>/></td>
</tr>    
<tr>
    <td>Knowledge of Equipment </td>
    <td><input type="radio" name="ebay[koe]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['koe']=='1')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[koe]" value="2" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['koe']=='2')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[koe]" value="3" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['koe']=='3')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[koe]" value="4" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['koe']=='4')echo "checked='checked'";?>/></td>
    <td><input type="radio" name="ebay[koe]" value="5" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['koe']=='5')echo "checked='checked'";?>/></td>
</tr>      
<tr>
    <td>Overall Average Score (this is the score that will be entered on the Truth Report)</td>
    <td colspan="5"></td>
</tr>      
<tr>
    <td colspan="6">Scoring Matrix: 5=Excellent 4=Very Good 3=Good 2=Average 1=Below Average</td>
    
</tr>      

</table>

<table>
<thead><th colspan="2"><h2>IQA</h2></th></thead>
<tr>
    <td>What training/IQA did you conduct with the Security Officer?</td>
    <td><input type="text" name="ebay[iqa]" value="<?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['iqa'];?>" /></td>
    
</tr>
</table>

<table>
<thead>
    <th colspan="3"><h2>Officer Feedback/Input</h2></th>
</thead>
<tr>
    <td>Are there any areas of your job function which you do not fully understand?</td>
    <td><input type="radio" name="ebay[notinterested]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['notinterested']=='1')echo "checked='checked'";?>/>Yes</td>
    <td><input type="radio" name="ebay[notinterested]" value="0" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['notinterested']=='0')echo "checked='checked'";?>/>No</td>
    
</tr>
<tr>
    <td>Do you feel you are in need of any additional training?</td>
    <td><input type="radio" name="ebay[training]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['training']=='1')echo "checked='checked'";?>/>Yes</td>
    <td><input type="radio" name="ebay[training]" value="0" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['training']=='0')echo "checked='checked'";?>/>No</td>
    
</tr>
<tr>
    <td>So you have any comments, concerns or recommendations? </td>
    <td><input type="radio" name="ebay[ccr]" value="1" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['ccr']=='1')echo "checked='checked'";?>/>Yes</td>
    <td><input type="radio" name="ebay[ccr]" value="0" <?php if(isset($ebay['EbayReport']) &&$ebay['EbayReport']['ccr']=='0')echo "checked='checked'";?>/>No</td>
    
</tr>
</table>
<table>
    <thead><th><h2>Comments</h2></th></thead>
    <tr>
        <td><textarea name="ebay[comment]"><?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['comment'];?></textarea></td>
    </tr>
</table>

<table>
    <tr>
        <td>Employee Name</td>
        <td><input type="text" name="ebay[emp_name]" value="<?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['emp_name'];?>" /></td>
        <td>Time</td>
        <td><input type="text" name="ebay[time]" value="<?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['time'];?>" /></td>
    </tr>
    <tr>
        <td>Employee Signature</td>
        <td>        <div style="position: relative;padding:5px;">
            <div style="width: 100%;float:left;" class="view_sign">
                <strong>SIGNATURE:</strong><br />
                    <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                        
                    </iframe>
            </div>        
            <?php
            
                if(isset($ebay) && $ebay['EbayReport']['signature'])
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $ebay['EbayReport']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div></td>
        <td>Time</td>
        <td><input type="text" name="ebay[sig_time]" value="<?php if(isset($ebay['EbayReport']))echo $ebay['EbayReport']['sig_time'];?>" /></td>
    </tr>
</table>
</td>
<style>
input[type="radio"]{margin-right: 5px; }
</style>
<script>
$(function(){
    <?php if($this->params['action']=='view_detail'){
        ?>
        $('.view_sign').hide();
         $('.ebay input, textarea').attr('disabled','disabled');
    <?php
    }?>
})
</script>