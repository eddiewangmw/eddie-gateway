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
	        <div class="pull_left site_map">
	            <ul>
	                <h3 class="title">Gateway</h3>
	                <li><a href="javascript:void(0)">Home</a></li>
	                <li><a href="javascript:void(0)">About Us</a></li>
	                <li><a href="javascript:void(0)">Courses</a></li>
	                <li><a href="javascript:void(0)">Careers</a></li>
	                <li><a href="javascript:void(0)">Contact</a></li>
	            </ul>
	            <ul>
	                <h3 class="title">Coures</h3>
	                <li><a href="javascript:void(0)">Home</a></li>
	                <li><a href="javascript:void(0)">About Us</a></li>
	            </ul>
	            <ul>
	                <h3 class="title">Dounload</h3>
	                <li><a href="javascript:void(0)">Home</a></li>
	                <li><a href="javascript:void(0)">About Us</a></li>
	            </ul>
	            <ul>
	                <h3 class="title">Blog</h3>
	                <li><a href="javascript:void(0)">Home</a></li>
	                <li><a href="javascript:void(0)">About Us</a></li>
	                <li><a href="javascript:void(0)">Courses</a></li>
	            </ul>
	        </div>

	        <div class="pull_right download">
	            <img src="assets/img/download.PNG" alt="">
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
		    var ShowPre1 = new ShowPre({
		        box:"banner_index",
		        numIco:"index_numIco",
		        loop:1,
		        auto:1
		    });
		    var ShowPre2 = new ShowPre({
		        box:"banner_index2",
		        Pre:"banner_index_pre",
		        Next:"banner_index_next",
		        loop:1
		    });
			<?php endif;?>
	    });
	</script>
	</body>
	</html>
