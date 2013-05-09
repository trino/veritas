<div>
    <form action="" method="post" id="Form">
    Page Title:<input type="text" name="title" id="title" class="required" /><br />
    Page Description : <textarea name="description" id="editor1" class="description"></textarea><br />
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
    SEO Title: <input type="text" name="seo_title" id="seo_title" class="required" /><br />
    Meta Keywords : <input type="text" name="meta_keyword" id="meta_keyword" class="required" /><br />
    Meta Description : <textarea name="meta_description" id="meta_description"></textarea><br />
    <input type="submit" name="submit" value="ADD" />
    </form>
</div>