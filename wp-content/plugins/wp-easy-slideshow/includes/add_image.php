<?php
global $wpdb, $obj ;
if(!empty($_POST['submit'])){
	$result = $obj->add_image($_POST,$_FILES['wss_image']);
}
?>
<div>&nbsp;</div>
<form method="post" action="" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" class="block_table" width="100%">
		<tr>
			<th width="20%" ><strong>Add New Image:</strong> </th>
		</tr>
<div style="width: 200px; right: 0; float: right; position: relative; margin: 37px 30px 20px 0; background: #fff; border: 1px solid #e9e9e9; padding: 5px 5px 5px 5px; color: #008000; font-size: 11px;">
<h3 style="margin: 0 0 10px 0; border-bottom: 1px dashed #008000;">More Free Plugins:</h3>
<ul>
<li><a href="http://freebloggingtricks.com/wp-slick-tab/" target="_blank">WP Slick Tab</a></li>
	<li><a href="http://freebloggingtricks.com/really-simple-guest-post-plugin/" target="_blank">Really Simple Guest Post Plugin</a></li>
	<li><a href="http://freebloggingtricks.com/facebooktwittergoogle-plus-linkedin-buffer-share-buttons-wordpress/" target="_blank">WordPress Social Share Plugin</a></li>
	<li><a href="http://freebloggingtricks.com/import-woocommerce-csv-products-file/" target="_blank">Simple Woocommerce CSV Loader</a></li>
	<li><a href="http://freebloggingtricks.com/import-csv-products-jigoshop/" target="_blank">Jigoshop CSV Importer</a></li>
	<li><a href="http://freebloggingtricks.com/hide-comment-author-link/">Hide Comment Author Link</a></li>
</ul>
<h3 style="margin: 0 0 10px 0; border-bottom: 1px dashed #008000;">Check Our Main Site:</h3>
Check <a href="http://freebloggingtricks.com/">FreeBloggingTricks</a> for WordPress tutorials. Don't forget to follow us on <a href="http://www.twitter.com/freebtricks">Twitter</a>, <a href="http://facebook.com/freebloggingtricks">Facebook</a> and <a href="https://plus.google.com/109526129815752833990/">Google+</a>.
</div>
		<?php if($result){?>
		<tr>
			<td width="100%" style="padding:20px 20px 0px 20px;" valign="top">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr><td <?php if($result['status']=='error'){?>class="result error"<?php }else{?>class="result success"<?php }?>><?php echo $result['msg'];?></td></tr>
				</table>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td width="100%" style="padding:20px;" valign="top">
				<table cellpadding="0" cellspacing="0" width="60%">
					<tr><td><h3>Upload Image</h3></td></tr>
					<tr><td><input type="file" name="wss_image" id="wss_image" /></td></tr>
					<tr><td><h3>Content</h3></td></tr>
					<tr><td><?php the_editor(stripslashes($content),'desc_content','',false,2,false); ?></td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td><h3>Link to</h3></td></tr>
					<tr><td><input type="text" name="image_link" value="" size="60" /></td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td><input type="submit" name="submit" value="Submit" class="button-primary" /></td></tr>
				</table>
			</td>
		</tr>
	</table>
</form>