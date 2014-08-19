<?php
include('../inc.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>jqScribble example</title>
		
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0;user-scalable=0;"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
			
		<script src="http://code.jquery.com/jquery-1.5.2.min.js" type="text/javascript" ></script>
		<script src="jquery.jqscribble.js" type="text/javascript"></script>
		<script src="jqscribble.extrabrushes.js" type="text/javascript"></script>
		
		<style>
			.links a {
				padding: 3px 10px;
                background:#007ECC;
                display: inline-block;
                border-radius:4px;
				text-decoration: none;
				color: #FFF;
                
			}
			.column-left {
				display: inline; 
				float: left;
			}
			.column-right {
				display: inline; 
				float: right;
			}
		</style>
	</head>
	<body>
		<div style="overflow: hidden; margin-bottom: 5px;">
			<div class="column-left links" style="display: none;">
				<strong>BRUSHES:</strong>
				<a href="#" onclick='$("#test").data("jqScribble").update({brush: BasicBrush});'>Basic</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brush: LineBrush});'>Line</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brush: CrossBrush});'>Cross</a>
			</div>
			<div class="column-right links" style="display: none;">
				<strong>COLORS:</strong>
				<a href="#" onclick='$("#test").data("jqScribble").update({brushColor: "rgb(0,0,0)"});'>Black</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brushColor: "rgb(255,0,0)"});'>Red</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brushColor: "rgb(0,255,0)"});'>Green</a>
				<a href="#" onclick='$("#test").data("jqScribble").update({brushColor: "rgb(0,0,255)"});'>Blue</a>
			</div>
		</div>
		<canvas id="test" style="border: 1px solid silver;border-radius: 5px;"></canvas>
		<div class="links" style="margin-top: 5px;">
			<strong style="display: none;">OPTIONS:</strong>
			<a href="#" onclick='addImage();' style="display: none;">Add Image</a>
			<a href="#" onclick='$("#test").data("jqScribble").clear();'>Clear</a>
			<a href="#" onclick='$("#test").data("jqScribble").save();' style="display: none;">Save</a>
			<a href="#" onclick='save();'>Save Signature</a>
            <br /><br />
            <span style="color: red;"><strong>Note:</strong> Please Save Signature Before Submitting Form</span>
		</div>
		<script type="text/javascript">
       
		function save()
		{
			$("#test").data("jqScribble").save(function(imageData)
			{
				$.post('image_save.php', {imagedata: imageData}, function(response)
					{
						alert("Signature Saved");
                        $.ajax({
                            url:'<?php echo $base_url;?>uploads/image_sess/'+response
                        });
					});	
				
			});
		}
		function addImage()
		{
			var img = prompt("Enter the URL of the image.");
			if(img !== '')$("#test").data("jqScribble").update({backgroundImage: img});
		}
		$(document).ready(function()
		{
			$("#test").jqScribble();
		});
		</script>
	</body>
</html>