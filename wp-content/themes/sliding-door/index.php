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
	        <form action="" class="main_search">
	            <input type="text" placeholder="what do you want to learn?">
	            <a href="javascript:void(0)" class="btn_search"></a>
	        </form>
	    </div>
	    <!--快捷链接-->
	    <div class="link_mod row mb10">
	        <div class="grid_6">
	            <a class="link active" href="javascript:void(0)">
	                <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/quick_menu_01.gif" alt=""></span>
	                <span class="text">Certificate lll Guarantee<i class="ico_arrow"></i></span>
	            </a>
	        </div>
	        <div class="grid_6">
	            <a class="link" href="javascript:void(0)">
	                <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/quick_menu_02.gif" alt=""></span>
	                <span class="text">Study Calendar<i class="ico_arrow"></i></span>
	            </a>
	        </div>
	        <div class="grid_6">
	            <a class="link" href="javascript:void(0)">
	                <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/quick_menu_03.gif" alt=""></span>
	                <span class="text">Traineeships<i class="ico_arrow"></i></span>
	            </a>
	        </div>
	        <div class="grid_6">
	            <a class="link" href="javascript:void(0)">
	                <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/quick_menu_04.gif" alt=""></span>
	                <span class="text">Student Handbook<i class="ico_arrow"></i></span>
	            </a>
	        </div>
	    </div>

	    <div class="row" style="height: 520px;background: #fff">
	        <div class="grid_18 ">

	            <div class="row sub_title"></div>



	            <div class="small_slide_mod" style="height:200px">

	                <div class="banner_index2">
	                    <a href="javascript:void(0);" class="btn btnPre" id="banner_index_pre"></a>
	                    <a href="javascript:void(0);" class="btn btnNext" id="banner_index_next"></a>
	                    <ul class="banner_wrap" id="banner_index2">
	                        <li>
	                            <a href="javascript:void(0)">
	                                <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/small_slide_01.gif" alt=""></span>
	                                <span class="text">Certificate IV in  1<i class="ico_arrow"></i></span>
	                            </a>
	                        </li>
	                        <li>
	                            <a href="javascript:void(0)">
	                                <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/small_slide_01.gif" alt=""></span>
	                                <span class="text">Certificate IV in  2<i class="ico_arrow"></i></span>
	                            </a>
	                        </li>
	                        <li>
	                            <a href="javascript:void(0)">
	                                <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/small_slide_01.gif" alt=""></span>
	                                <span class="text">Certificate IV in  3<i class="ico_arrow"></i></span>
	                            </a>
	                        </li>
	                        <li>
	                            <a href="javascript:void(0)">
	                                <span class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/small_slide_01.gif" alt=""></span>
	                                <span class="text">Certificate IV in  4<i class="ico_arrow"></i></span>
	                            </a>
	                        </li>
	                    </ul>
	                </div>

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
	            <form class="form" action="">
	                <div class="form_title">Course Enquires<img src="<?php echo get_template_directory_uri(); ?>/img/icon_chat.png" align="absmiddle" style="margin-left: 10px"></div>
	                <div class="form_content">
	                    <div class="form_cotroller">
	                        <label>Name</label>
	                        <input type="text">
	                    </div>
	                    <div class="form_cotroller">
	                        <label>Email</label>
	                        <input type="text">
	                    </div>
	                    <div class="form_cotroller">
	                        <label>Mobile</label>
	                        <input type="text">
	                    </div>
	                    <div class="form_cotroller">
	                        <label>Course</label>
	                        <select>
	                            <option></option>
	                            <option></option>
	                        </select>
	                    </div>
	                    <div class="form_cotroller">
	                        <label>Course</label>
	                        <textarea rows="" cols="" style="height: 65px">

	                        </textarea>
	                    </div>
	                </div>
	                <div><a class="btn_submit"><span>SEND TO US</span></a></div>
	            </form>
	        </div>
	    </div>

<?php get_footer(); ?>
