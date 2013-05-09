<script>
    function check_email()
    {
        var em=$('#email').val();
        $.ajax({
            url: '/ads/home/check_email',
            type: 'post',
            data: 'em='+em,
            success:function(response)
            {
                if(response=="1")
                {
                    $('#response').html('');
                }
                else
                {
                    $('#response').html('Email Already Exists');
                }
            } 
        });
    }
    function check()
    {
        var val = $('#response').html();
        alert(val);
        if(val=" ")
            return true;
        else
            return false;
    }
     function get_city()
    {
        var state = $('#state').val();
        $.ajax({
            url : '/ads/home/get_city',
            type: 'post',
            data: 'state='+state,
            success:function(response)
            {
                $('#city').html(response);
            }
        });
    }
</script>
<h1>Seekers Registrations</h1>
<form action="" method="post" id="Form" >
    Full Name : <input type="text" name="full_name" class="required" /><br />
    Company Name : <input type="text" name="company"  /><br />
    Address : <input type="text" name="address" class="required" /><br />
     State <select name="state" id="state" onchange="get_city()" class="required">
        <option value="">Please select</option>
        <?php 
            foreach($province as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>"><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?>
        </select><br />
    City : 
    <select name="city" id="city" class="required">
    <option value="">Please select</option>
    </select>
    <br />
    Social Media:<br />
    Facebook: <input type="text" name="facebook" />
    Twitter: <input type="text" name="twitter" /><br />
    Phone <input type="text" name="phone" class="required"  /><br />
    Mobile <input type="text" name="cell" /><br />
    Fax <input type="text" name="fax" /><br />
    Website <input type="text" name="website"  /><br />
    Account Settings:<br />
    Email <input type="text" name="email" id="email" class="required email" onchange="check_email()" /><span id="response"></span><br />
    Password : <input type="password" name="password" id="password" class="required" /><br />
    Confirm Password : <input type="password" name="c_password" id="c_password" /><br />
    <input type="submit" name="submit" value="Register" />
</form>