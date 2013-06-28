<div id="table">
<h2>Detail of <?php echo $j['Job']['title']; ?></h2>
<table>
<tr><td><?php echo $this->Html->image('uploads/'.$j['Job']['image']); ?></td></tr>
<tr><td><?php echo $j['Job']['description']; ?></td></tr>
<tr><td>Start Date : <?php echo $j['Job']['date_start']; ?></td></tr>
<tr><td>End Date : <?php echo $j['Job']['date_end']; ?></td></tr>
</table>
</div>