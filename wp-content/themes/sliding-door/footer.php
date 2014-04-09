<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */
?>
	    <div class="contact_mod row mb20" style="line-height: 62px">
	        <div class="contact">
	            <div class="pull_left" style="font-size: 24px;font-weight: bold">EXPLORE GATEWAY</div>
	            <div style="float:right;margin-top: 20px">
	                <span class="mr20"><i class="ico_tel"></i>1300 881 932</span>
	                <i class="ico_facebook mr20"></i>
	                <i class="ico_tiwwer mr20"></i>
	            </div>
	        </div>
	    </div>

	    <div class="footer row" style="padding-bottom: 50px">
			<?php
			$defaults = array(
				'theme_location'  => '',
				'menu'            => '',
				'container'       => 'div',
				'container_class' => 'pull_left site_map',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<div>%3$s</div>',
				'depth'           => 0,
				'walker'          => new Gateway_Footer_Walker_Nav_Menu
			);

			wp_nav_menu( $defaults );
				
			?>

	        <div class="pull_right download">
	            <img src="<?php echo get_template_directory_uri(); ?>/img/download.PNG" alt="">
	        </div>
	    </div>



	</div>
	
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.ui.core.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.ui.widget.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.ui.tabs.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.ui.accordion.min.js"></script>
	<?php if(is_home()):?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slide.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bxCarousel.js"></script>
		
	<?php endif;?>
	<script type="text/javascript">
	    $(function() {
			
			<?php if(is_single()): ?>
			
	        $( "#tabs" ).tabs();
	        $( "#accordion2" ).accordion({});
			
			<?php endif;?>
			
			<?php if(is_category()):?>
		    $( "#accordion" ).accordion({
		          });
		          $( "#accordion2" ).accordion({
		          });
			
			<?php endif;?>
			
			<?php if(is_home()):?>
			$("#home-form .btn_submit span").click(function (){
				
				var myReg = /^[-_A-Za-z0-9]+@([_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/; 
				var nameReg = /^[ ]+$/; 
				
				if( $("#name").val() == ""){
					alert(' Name is empty!'); 
					$("#name").focus();
					return false;
				}else if( nameReg.test($("#name").val()) ){
					alert(' Name is empty!'); 
					$("#name").focus();
					return false;
				}else if( ! myReg.test($('#email').val())){
					alert(' Email is incorrect!'); 
					$("#email").focus();
					return false;
				}else{
					$("#home-form .btn_submit").removeClass('btn_submit').addClass('btn_sending');
					$(this).html('Sending...');
					$.post("/contact-page/",$("#home-form").serialize(), function(result){
					   $("#home-form .btn_sending").removeClass('btn_sending').addClass('btn_submit');
					   $(this).html('SEND TO US');
					   alert('Your message had sent.');
					  });
				}
			});
			$("#search .btn_search").click(function(){
				$("#search").submit();
			});
		    var ShowPre1 = new ShowPre({
		        box:"banner_index",
		        numIco:"index_numIco",
		        loop:1,
		        auto:1
		    });
			$('#banner_index2').bxCarousel({
			        display_num: 3,
			        move: 1
			    });
		    
			<?php endif;?>
	    });
	</script>
	<?php
	if(WP_DEBUG ==  true){
	    global $wpdb;
	    echo "<pre>";
	      print_r( $wpdb->queries );
	      echo "</pre>";
	  }
	?>
	</body>
	</html>
