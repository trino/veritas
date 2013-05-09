<h2>Deatil of <?php echo $b['Register']['company']; ?></h2>
<?php echo $this->Html->image('logo/'.$b['Register']['logo']); ?>

Full Name <?php echo $b['Register']['full_name']; ?><br />
Email <?php echo $b['Register']['email']; ?><br />
Address <?php echo $b['Register']['address']; ?><br />
Category : <?php 
                    foreach($category as $c)
                    {
                         if($c['Category']['id']==$b['Register']['category'])   echo $c['Category']['name']; 
                         }
                ?> <br />
State 
        <?php 
            foreach($province as $p)
            {
                if($p['Province']['ID']==$b['Register']['state'])echo $p['Province']['TITLE'];  
            }
        ?><br />
        
City :
    <?php 
    	foreach($city as $ci)
    	{ if($ci['Province']['ID']==$b['Register']['city'])  echo $ci['Province']['TITLE']; 
        }
    ?>
    <br />
No of years in Business : <?php echo $b['Register']['no_of_year']; ?><br />
    Operation Hour:<br />
    From <?php echo $b['Register']['operation_start']; ?> To: <?php echo $b['Register']['operation_end']; ?><br />
    No of Employee : <?php echo $b['Register']['no_of_employee']; ?><br />
    Partners : <?php echo $b['Register']['partners']; ?><br />
Phone <?php echo $b['Register']['phone']; ?><br />
Fax <?php echo $b['Register']['fax']; ?> <br />
Website <?php echo $b['Register']['website']; ?><br />
Description <?php echo $b['Register']['description']; ?><br />
Facebook : <?php echo $b['Register']['facebook']; ?><br />
Twitter : <?php echo $b['Register']['twitter']; ?>

<?php echo $this->Html->link('Go Back','/dashboard/business'); ?>