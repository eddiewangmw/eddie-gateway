<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */

get_header(); ?>

	    <!--幻灯片-->
	    <div class="slide_mod row mb10">
	        <div class="banner_mod row banner_index">
	           <?php echo show_slider(); ?>
	        </div>
	        <div class="indexBanner_num" id="index_numIco"></div>
	    </div>
	    <!--搜索-->
	    <div class="search_mod row mb10">
	        <form action="" class="main_search" id="search">
	            <input type="text" placeholder="what do you want to learn?" name="s">
	            <a href="javascript:void(0)" class="btn_search"></a>
	        </form>
	    </div>
	    <!--快捷链接-->
	    <div class="link_mod row mb10">
			<?php $posts = get_posts(array(
				'post_type'		=> 'post',
				'posts_per_page'	=> -1,
				'meta_key'		=> 'recommend_in_home_page',
				'meta_value'		=> 1
			));
			?>
			<?php foreach($posts AS $post):?>
	        <div class="grid_6">
	            <a class="link active" href="<?php echo get_permalink();?>">
	                <span class="img"><?php the_post_thumbnail(array(240,197));?></span>
	                <span class="text"><?php echo the_title();?><i class="ico_arrow"></i></span>
	            </a>
	        </div>
		<?php endforeach;?>
	    </div>

	    <div class="row" style="height: 520px;background: #fff">
	        <div class="grid_18 ">

	            <div class="row sub_title"></div>
	            <div class="small_slide_mod" style="height:200px">
					
	               
					<?php $scroll_posts = get_posts(array(
						'post_type'		=> 'post',
						'posts_per_page'	=> -1,
						'meta_key'		=> 'display_in_scroll_area',
						'meta_value'		=> 1
					));
					?>
					<?php if($scroll_posts):?>
		                <div class="demo">
		                     <div class="bx_wrap">
		                         <div class="bx_container">
		                             <ul class="" id="banner_index2">
											<?php foreach($scroll_posts AS $post):?>
					                        <li>
					                            <a href="<?php echo get_permalink();?>">
					                                <span class="img"><?php the_post_thumbnail(array(206,206));?></span>
					                                <span class="text"><?php echo the_title();?><i class="ico_arrow"></i></span>
					                            </a>
					                        </li>
							
										<?php endforeach;?>
		                                 
		                             </ul>
		                         </div>
		                     </div>
		                </div>
				<?php endif;?>
	            </div>

	            <div class="quick_link_mod">
	                <div class="grid_1_3">
	                    <a href="javascript:void(0)" style="background:#444 ">
	                        <span class="text">Sdutent<br>Login</span>
	                        <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/small_link01.png" alt=""></span>
	                        <i class="ico_arrow2"></i>
	                    </a>
	                </div>
	                <div class="grid_1_3">
	                    <a href="javascript:void(0)" >
	                        <span class="text">Online <br> E-learning(Moodle)</span>
	                        <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/small_link02.png" alt=""></span>
	                        <i class="ico_arrow2"></i>
	                    </a>
	                </div>
	                <div class="grid_1_3">
	                    <a href="javascript:void(0)"  style="background:#8d8d8d ">
	                        <span class="text">Online <br>  E-learning(Catapult)</span>
	                        <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/small_link03.png" alt=""></span>
	                        <i class="ico_arrow2"></i>
	                    </a>
	                </div>
	            </div>
	        </div>

	        <div class="grid_6">
				<form action="/contact-page/" method="post" class="form" novalidate="novalidate" id="home-form">
					<input type="hidden" name="post-type" value="ajax">
	                <div class="form_title">Course Enquires<img src="<?php echo get_template_directory_uri(); ?>/img/icon_chat.png" align="absmiddle" style="margin-left: 10px"></div>
	                <div class="form_content">
                    <div class="form_cotroller">
                        <label>Name</label>
                        <input type="text" name="yourname" id="name">
                    </div>
                    <div class="form_cotroller">
                        <label>Email</label>
                        <input type="text" name="youremail" id="email">
                    </div>
                    <div class="form_cotroller">
                        <label>Mobile</label>
                        <input type="text" name="mobile" id="mobile">
                    </div>
                    <div class="form_cotroller">
                        <label>Course</label>
                        <select name="course">
                            <option value="Courese A"> Course A</option>
                            <option value="Courese B"> Course B</option>
                        </select>
                    </div>
                    <div class="form_cotroller">
                        <label>Message</label>
                        <textarea name="yourmessage" style="height: 65px" id="message">
                        </textarea>
                    </div>	                   
	                </div>
	                <div><a class="btn_submit"><span>SEND TO US</span></a></div>
					<div class="wpcf7-response-output wpcf7-display-none"></div>
	            </form>
	        </div>
	    </div>

<?php get_footer(); ?>
