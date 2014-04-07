<?php
class cpt_contact_form
	{
	
	function __construct()
		{
		load_plugin_textdomain('cpt-contact-form',false,dirname(plugin_basename(__FILE__)).'/lang/');
		add_action('init',array($this,'define_message_cpt'));
		add_shortcode('cpt-contact-form',array($this,'cpt_contact_form_shortcode'));
		add_action('add_meta_boxes',array($this,'add_meta_boxes'),10,2);
		add_filter("manage_contact-message_posts_columns",array($this,'columns_head'));
		add_action("manage_contact-message_posts_custom_column",array($this,'columns_content'),10,2);
		}
		
	function define_message_cpt()
		{
		register_post_type(
			'contact-message',
			array(
				'label'=>__('Contact Messages','cpt-contact-form'),
				'labels'=>array(
					'name'=>__('Contact Messages','cpt-contact-form'),
					'singular_name'=>__('Contact Message','cpt-contact-form'),
					'all_items'=>__('All Contact Messages','cpt-contact-form'),
					'add_new'=>__('New Contact Message','cpt-contact-form'),
					'add_new_item'=>__('Add new Contact Message','cpt-contact-form'),
					'edit_item'=>__('Edit Contact Message','cpt-contact-form'),
					'new_item'=>__('New Contact Message','cpt-contact-form'),
					'view_item'=>__('View Contact Message','cpt-contact-form'),
					'search_items'=>__('Search Contact Messages','cpt-contact-form'),
					'not_found'=>__('No Contact Messages Found','cpt-contact-form'),
					'not_found_in_trash'=>__('No Contact Messages Found in Trash','cpt-contact-form'),
					),
				'description'=>__('Messages from the Contact Form','cpt-contact-form'),
				'public'=>true,
				'exclude_from_search'=>true,
//				'publicly_queryable'=>false,
				'supports'=>false,//array('title'),
//				'rewrite' => array("slug"=>'contact-message'),
				)
			);
		}
		
	function cpt_contact_form_shortcode($atts)
	{
		if( isset($_POST['post-type']) AND ($_POST['post-type'] == 'ajax') ){
			
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
			
			if ( ! preg_match($regex, $_POST['youremail'])) {
			    return json_encode( array('status'=>'error', 'msg'=>' Email is incorrect.') );
			}
			
			if( !$_POST['yourname'] OR strlen($_POST['yourname']) > 100 ) {
				 return json_encode( array('status'=>'error', 'msg'=>' Name is incorrect.') );
			}
			
			if( $_POST['mobile'] AND strlen($_POST['mobile']) > 20 ) {
				 return json_encode( array('status'=>'error', 'msg'=>' Mobile is incorrect.') );
			}
			
			if( !$_POST['yourmessage'] OR strlen($_POST['yourmessage']) > 200 ) {
				 return json_encode( array('status'=>'error', 'msg'=>' Message is incorrect.') );
			}
			
			$msg=$this->save_message($_POST['yourname'],$_POST['youremail'],$_POST['yourmessage'],$_POST['course'],$_POST['mobile']);
			
			return json_encode(array('status'=>'true', 'msg'=>'Thank you for your communication'));
			
		}elseif(isset($_POST['cptcf-submit'])){
			if($_POST['yourname']&&$_POST['youremail']&&$_POST['mobile']&&$_POST['yourmessage'])
				{
				$msg=$this->save_message($_POST['yourname'],$_POST['youremail'],$_POST['yourmessage'],$_POST['course'],$_POST['mobile']);
				$this->notify_webmaster($msg);
				$r="<p>".__('Your message has been sent. Thank you for your communication.','cpt-contact-form')."</p>";
				}
			else
				$r=$this->render_form(array(__('All fields are mandatory!','cpt-contact-form')));
		}else{
			$r=$this->render_form();
			return $r;
		}
	}
		
	function render_form($errors=array())
		{
		$yourname=__('Your Name','cpt-contact-form');
		$youremail=__('Your e-mail','cpt-contact-form');
		$mobile = __('Mobile', 'cpt-contact-form');
		$yourmessage=__('Message','cpt-contact-form');
		$courses = __('Courese', 'cpt-contact-form');
		$submit=__('Submit','cpt-contact-form');
		$postedname=(isset($_POST['yourname'])?$_POST['yourname']:'');
		$postedemail=(isset($_POST['youremail'])?$_POST['youremail']:'');
		$postedmobile=(isset($_POST['mobile'])?$_POST['mobile']:'');
		$postedmessage=(isset($_POST['yourmessage'])?$_POST['yourmessage']:'');
		$postcourse = (isset($_POST['course'])?$_POST['course']:'');
		
		$courses_list  = array('Course A', 'Course B', 'Course C', 'Course D' );
		$dropdrown_html = '';
		foreach($courses_list AS $c){
			$dropdrown_html .= '<option '.($postcourse == $c ? 'selected' : '').'value="'.$c.'">'.$c.'</option>';
		}
		$errlist='';
		if(count($errors))
			{
			foreach($errors as $error)
				$errlist.="<li>$error</li>";
			$errlist="<ul class='errors'>$errlist</ul>";
			}
		return "
<div class='cptcf'>
	$errlist
	<form method='post'>
		<label>$yourname: <input type='text' name='yourname' value='$postedname'></label>
		<label>$youremail: <input type='text' name='youremail' value='$postedemail'></label>
		<label>$mobile: <input type='text' name='mobile' value='$postedmobile'></label>
		<label>$courses: <select name=\"course\">$dropdrown_html</select></label>
		<label>$yourmessage: <textarea name='yourmessage' cols='45' rows='5'>$postedmessage</textarea></label>
		<span class='submit'><input type='submit' name='cptcf-submit' value='$submit'></span>
	</form>
</div>
		";
		}
		
	function add_meta_boxes($post_type,$post)
		{
		add_meta_box("contact-message-main-meta",__("Contact Message",'cpt-contact-form'),array($this,"main_metabox"),'contact-message',"normal","high");
		}
		
	function main_metabox($post)
		{
		$email=get_post_meta($post->ID,'email',true);
		$name=get_post_meta($post->ID,'name',true);
		$mobile=get_post_meta($post->ID,'mobile',true);
		$course=get_post_meta($post->ID,'course',true);
		$mailto_url="$email";
		?>
		<p><?php _e('From','cpt-contact-form'); ?>: <a href="mailto:<?php echo $mailto_url ?>"><?php echo $name; ?></a></p>
		<h3><?php _e('Subject','cpt-contact-form'); ?>: <?php echo $post->post_title; ?></h3>
		<p>Mobile: <?php echo $mobile ?></p>
		<p>Course: <?php echo $course ?></p>
		<blockquote><?php echo nl2br($post->post_content); ?></blockquote>
		<?php
		}
		
	function columns_head($columns)
		{
		$columns['from']=__('From','cpt-contact-form');
		return $columns;
		}
		
	function columns_content($column,$id)
		{
		switch($column)
			{
			case 'from':
				$email=get_post_meta($id,'email',true);
				$name=get_post_meta($id,'name',true);
				?>
				<p><a href="mailto:<?php echo $email; ?>"><?php echo $name; ?></a></p>
				<?php
				break;
			}
		}
		
	// messages CRUD
	
	function save_message($name,$email,$message,$course,$mobile)
		{
		$id=wp_insert_post(
			array(
				'post_type'=>'contact-message',
				'post_title'=>'Courese enquire',
				'post_content'=>esc_attr(strip_shortcodes($message)),
				'post_status'=>'private',
				)
			);
		update_post_meta($id,'email',$email);
		update_post_meta($id,'name',$name);
		update_post_meta($id,'course',$course);
		update_post_meta($id,'mobile',$mobile);
		return get_post($id);
		}
		
	function notify_webmaster($message)
		{
		// get the admin account's email address
		$to=get_option('admin_email'); 
		$subject=$message->post_title;
		$from_name=get_post_meta($message->ID,'name',true);
		$from_email=get_post_meta($message->ID,'email',true);
		$body=__("There's a new contact message for you.",'cpt-contact-form');
		$headers="From: $from_name <$from_email>\r\n";
		mail($to,$subject,$body,$headers);
		}
		
	}
