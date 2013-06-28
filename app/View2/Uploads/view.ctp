<div>
    <table>
        <tr>
            <td>Job Title</td>
            <td><?php echo $job['Job']['title']; ?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><?php echo $job['Job']['description']; ?></td>
        </tr>
        <tr>
            <td><?php echo $this->Html->link('Upload Document','/uploads/upload/'.$job['Job']['id']); ?></td>
        </tr>
    </table>
</div>