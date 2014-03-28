<?php
global $wpdb, $obj ;
if(!empty($_POST['submit'])){
	$result = $obj->edit_image($_POST,$_FILES['wss_image']);
}
?>
<div>&nbsp;</div>
<form method="post" action="" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
	<table cellpadding="0" cellspacing="0" class="block_table" width="100%">
		<tr>
			<th width="20%" ><strong>Edit Image:</strong> <span><a href="admin.php?page=wss-images">Back</a></span></th>
		</tr>
		<?php if($result){?>
		<tr>
			<td width="100%" style="padding:20px 20px 0px 20px;" valign="top">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr><td <?php if($result['status']=='error'){?>class="result error"<?php }else{?>class="result success"<?php }?>><?php echo $result['msg'];?></td></tr>
				</table>
			</td>
		</tr>
		<?php }$up = wp_upload_dir(); $res = $obj->get_image($_REQUEST['id']);?>
		<tr>
			<td width="100%" style="padding:20px;" valign="top">
				<table cellpadding="0" cellspacing="0" width="60%">
					<tr><td><h3>Current Image</h3></td></tr>
					<tr>
						<td>
							<img src="<?php echo $up['baseurl'].'/wpslideshow/'.preg_replace('/(.*)(\.[\w\d]{3})/', '$1-thumb$2', $res->guid);?>" width="150" height="50"  />
						</td>
					</tr>
					<tr><td><h3>New Image</h3></td></tr>
					<tr><td><input type="file" name="wss_image" id="wss_image" /></td></tr>
					<tr><td><h3>Content</h3></td></tr>
					<tr><td><?php the_editor(stripslashes($res->content),'desc_content','',false,2,false); ?></td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td><h3>Link to</h3></td></tr>
					<tr><td><input type="text" name="image_link" value="<?php echo $res->link;?>" size="60" /></td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td><input type="submit" name="submit" value="Update" class="button-primary" /></td></tr>
				</table>
			</td>
		</tr>
	</table>
</form>