<?php
class wpslideshow{

	function get_image($id = null){ 
		global $wpdb;
		$prefix = $wpdb->prefix;
		if(!$id){
			$res = $wpdb->get_results('SELECT id, content, link, guid FROM '.$prefix.'wss_images ORDER BY id ASC');
		}
		else{
			$res = $wpdb->get_row('SELECT * FROM '.$prefix.'wss_images WHERE id = '.$id);
		}
		return $res;
	}
	
	function get_logo($id = null){ 
		global $wpdb;
		$prefix = $wpdb->prefix;
		if(!$id){
			$res = $wpdb->get_results('SELECT id, link, guid,content type FROM '.$prefix.'wss_logos ORDER BY id ASC');
		}
		else{
			$res = $wpdb->get_row('SELECT * FROM '.$prefix.'wss_logos WHERE id = '.$id);
		}
		return $res;
	}

	function add_image($postArray, $fileArray){
		global $wpdb;
		$prefix = $wpdb->prefix;
		
		$content = $postArray['desc_content'];
		$link = $postArray['image_link'];
		
		if($fileArray['error']) { 
			$res['status'] = 'error'; $res['msg'] = 'Upload a image'; 
		}
		else{
			$rs = $wpdb->insert($prefix.'wss_images', array( 'guid'=>'','content' => $content, 'link' => $link ));

			if(($fileArray["type"] == 'image/jpeg') || ($fileArray["type"] == 'image/pjpeg'))	{
				$suf = ".jpg";
			}
			elseif($fileArray["type"] == 'image/gif')	{
				$suf = ".gif";
			}
			elseif($fileArray["type"] == 'image/png')	{
				$suf = ".png";
			}
			
			$filename = WSS_UPLOADS_DIR.'/'.$wpdb->insert_id.$suf;
			move_uploaded_file($fileArray['tmp_name'], $filename);
			image_resize($filename,296,120,false,'thumb',WSS_UPLOADS_DIR);
			
			$wpdb->update($prefix.'wss_images',array( 'guid' => $wpdb->insert_id.$suf ), array( 'id' => $wpdb->insert_id ) );
			
			$res['status'] = 'success'; $res['msg'] = 'Image added successfully';
		}
		
		return $res;
	}
	
	function add_logo($postArray, $fileArray){
		global $wpdb;
		$prefix = $wpdb->prefix;
		
		$link = $postArray['image_link'];
		
		if($fileArray['error']) { 
			$res['status'] = 'error'; $res['msg'] = 'Upload a image'; 
		}
		else{
			$wpdb->insert($prefix.'wss_logos', array( 'link' => $link ));
			
			if(($fileArray["type"] == 'image/jpeg') || ($fileArray["type"] == 'image/pjpeg'))	{
				$suf = ".jpg";
			}
			elseif($fileArray["type"] == 'image/gif')	{
				$suf = ".gif";
			}
			elseif($fileArray["type"] == 'image/png')	{
				$suf = ".png";
			}
			
			$filename = WSS_UPLOADS_DIR.'/logos/'.$wpdb->insert_id.$suf;
			move_uploaded_file($fileArray['tmp_name'], $filename);
			image_resize($filename,150,86,false,'thumb',WSS_UPLOADS_DIR.'/logos');
			
			$wpdb->update($prefix.'wss_logos',array( 'guid' => $wpdb->insert_id.$suf ), array( 'id' => $wpdb->insert_id ) );
			
			$res['status'] = 'success'; $res['msg'] = 'Image added successfully';
		}
		
		return $res;
	}
	
	function edit_image($postArray, $fileArray){
		global $wpdb;
		$prefix = $wpdb->prefix;
		
		$id = $postArray['id'];
		$content = $postArray['desc_content'];
		$link = $postArray['image_link'];
		
		if(!$fileArray['error']) {
		
			if(($fileArray["type"] == 'image/jpeg') || ($fileArray["type"] == 'image/pjpeg'))	{
				$suf = ".jpg";
			}
			elseif($fileArray["type"] == 'image/gif')	{
				$suf = ".gif";
			}
			elseif($fileArray["type"] == 'image/png')	{
				$suf = ".png";
			}
			$filename = WSS_UPLOADS_DIR.'/'.$id.$suf;
			move_uploaded_file($fileArray['tmp_name'], $filename);
			image_resize($filename,296,120,false,'thumb',WSS_UPLOADS_DIR);
			
			$wpdb->update($prefix.'wss_images',array( 'guid' => $id.$suf ), array( 'id' => $id ) );
			
		}
		
		$wpdb->update($prefix.'wss_images',array( 'content' => $content, 'link' => $link ), array( 'id' => $id ) );
		
		$res['status'] = 'success'; $res['msg'] = 'Values updated successfully';
		
		return $res;
	}
	
	function edit_logo($postArray, $fileArray){
		global $wpdb;
		$prefix = $wpdb->prefix;
		
		$id = $postArray['id'];
		$link = $postArray['image_link'];
			
		if(!$fileArray['error']) {
		
			if(($fileArray["type"] == 'image/jpeg') || ($fileArray["type"] == 'image/pjpeg'))	{
				$suf = ".jpg";
			}
			elseif($fileArray["type"] == 'image/gif')	{
				$suf = ".gif";
			}
			elseif($fileArray["type"] == 'image/png')	{
				$suf = ".png";
			}
			
			$filename = WSS_UPLOADS_DIR.'/logos/'.$id.$suf;
			move_uploaded_file($fileArray['tmp_name'], $filename);
			image_resize($filename,150,86,false,'thumb',WSS_UPLOADS_DIR.'/logos');
			$wpdb->update($prefix.'wss_logos',array( 'guid' => $id.$suf ), array( 'id' => $id ) );
			
		}
		
		$wpdb->update($prefix.'wss_logos',array( 'link' => $link ), array( 'id' => $id ) );
		
		$res['status'] = 'success'; $res['msg'] = 'Values updated successfully';
		
		return $res;
	}
	
	function delete_image($id){
		global $wpdb;
		$prefix = $wpdb->prefix;
		$img = $this->get_image($id);
		@unlink(WSS_UPLOADS_DIR.'/'.$img->guid);
		@unlink(WSS_UPLOADS_DIR.'/'.preg_replace('/(.*)(\.[\w\d]{3})/', '$1-thumb$2', $img->guid));
		return $wpdb->query( $wpdb->prepare('DELETE FROM '.$prefix.'wss_images WHERE id = '.$id ,''));
	}
	
	function delete_logo($id){
		global $wpdb;
		$prefix = $wpdb->prefix;
		$img = $this->get_logo($id);
		@unlink(WSS_UPLOADS_DIR.'/logos/'.$img->guid);
		@unlink(WSS_UPLOADS_DIR.'/logos/'.preg_replace('/(.*)(\.[\w\d]{3})/', '$1-thumb$2', $img->guid));
		return $wpdb->query( $wpdb->prepare('DELETE FROM '.$prefix.'wss_logos WHERE id = '.$id ,''));
	}
	
	function show_slider(){
		global $wpdb, $post;
		$prefix = $wpdb->prefix;
		$res = $wpdb->get_results("SELECT content, link, guid FROM ".$prefix."wss_images");
		return $res;		
	}
	
	function show_logos(){
		global $wpdb, $post;
		$prefix = $wpdb->prefix;
		$res = $wpdb->get_results("SELECT content,link, guid FROM ".$prefix."wss_logos");
		return $res;		
	}
	
}
?>