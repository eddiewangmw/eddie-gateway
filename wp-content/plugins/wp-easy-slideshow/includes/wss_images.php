<?php
global $wpdb, $obj ;
if($_REQUEST['del_id']){$del_res = $obj->delete_image($_REQUEST['del_id']);}
?>
<div>&nbsp;</div>
<form method="post" action="" enctype="multipart/form-data">
	<table cellpadding="10" cellspacing="0" class="images_table" width="100%">
		
		<tr>
			<th width="3%">ID</th>
			<th width="10%">Image</th>
			<th width="40%">Content</th>
			<th width="25%">Link</th>
			<th width="10%">Actions</th>
		</tr>
		<?php if($del_res == 1){?>
		<tr><td class="result success last" colspan="5" align="center">One Row Deleted Successfully.</td></tr>
		<?php }$up = wp_upload_dir(); $images = $obj->get_image();if($images){ foreach($images as $key => $img){ ?>
		<tr <?php if($key%2 != 0){?>class="odd"<?php }?>>
			<td valign="top" align="center"><?php echo $img->id;?></td>
			<td valign="top" align="center">
				<img src="<?php echo $up['baseurl'].'/wpslideshow/'.preg_replace('/(.*)(\.[\w\d]{3})/', '$1-thumb$2', $img->guid);?>" width="150" height="50"  />
			</td>
			<td><?php if($img->content){echo substr(strip_tags($img->content),0,200).'...';}?></td>
			<td><?php echo $img->link;?></td>
			<td align="center" class="last">
				<a href="admin.php?page=wss-edit-image&id=<?php echo $img->id;?>">Edit</a> | 
				<a href="admin.php?page=wss-images&del_id=<?php echo $img->id;?>">Delete</a>
			</td>
		</tr>
		<?php }}else{?>
		<tr><td class="last" colspan="6" align="center">- No image - <a href="admin.php?page=wss-add-image">Add New</a></td></tr>
		<?php }?>
				
	</table>
</form>