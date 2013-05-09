<div>
    <form action="" method="post" id="Form">
    Select Category : <select name="parent"><option value="0">Choose Parent Category</option>
        <?php 
            foreach($category as $c)
            { 
                ?>
            
                <option value="<?php echo $c['Category']['id']; ?>" <?php if($cat['Category']['parent_id']==$c['Category']['id']) echo "selected='selected'"; ?>><?php echo $c['Category']['name']; ?></option>
            <?php }
        ?>
    </select><br />
    Category Name : <input type="text" name="name" id="name" class="required" value="<?php echo $cat['Category']['name']; ?>" /><br />
    Category Description : <textarea name="description" id="editor1" class="description"><?php echo $cat['Category']['description']; ?></textarea><br />
    <script>
    
    CKEDITOR.replace( 'editor1', {
   
    filebrowserBrowseUrl : '/ads/js/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/ads/js/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/ads/js/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '/ads/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/ads/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/ads/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
    </script>
    <input type="submit" name="submit" value="Save" />
    </form>
</div>