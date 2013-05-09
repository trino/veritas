<h2>Deatil of <?php echo $b['Register']['full_name']; ?></h2>

Company <?php echo $b['Register']['company']; ?><br />
Email <?php echo $b['Register']['email']; ?><br />
Address <?php echo $b['Register']['address']; ?><br />
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
Phone <?php echo $b['Register']['phone']; ?><br />
Fax <?php echo $b['Register']['fax']; ?> <br />
Website <?php echo $b['Register']['website']; ?><br />
Facebook : <?php echo $b['Register']['facebook']; ?><br />
Twitter : <?php echo $b['Register']['twitter']; ?>

<?php echo $this->Html->link('Go Back','/dashboard/seekers'); ?>