
<div id="contents">
<h1>
<?php 
    echo $state;
    $state = str_replace(' ','-',$state);
?></h1>

<ul>
<?php 

    foreach($city as $c)
    {
        $slug = str_replace('_','-',$c['Province']['TITLE_URL']);
        ?>
        <?php echo $this->Html->link('<li class="btn wid">'.$c['Province']['TITLE'].'</li>','/ads/'.$state."/".$slug,array('escape' => false,)); ?>
        <?php
        /*?> <li><?php echo $this->Html->link($c['Province']['TITLE'],'/ads/'.$state."/".$slug);?></li><?php */
    }
?>
</ul>
</div>