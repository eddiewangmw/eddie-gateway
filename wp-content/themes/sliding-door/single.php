<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */

get_header(); ?>
<?php the_post();?>
    <!--banner-->
    <div class="banner_mod row">
        <img src="<?php echo get_template_directory_uri(); ?>/img/banner_courses2.gif" alt="" height="162">
    </div>
    <!--content-->
    <div class="content_mod row mb10">
        <div class="p15">
            <div class="left mb30">

                <div class="nav_breadcrumb">
					<?php echo the_breadcrumb();?>
                </div>
                <div class="course_detail mb30">
                    <h2><?php echo the_title();?></h2>
                    <p><?php the_content();?></p>
                </div>
                <!--tab开始-->
                <div id="tabs">
                    <ul>
                        <li style="width: 234px"><a href="#tabs-1">Course Details</a></li>
                        <li style="width: 234px"><a href="#tabs-2">Course Units</a></li>
                        <li style="width: 236px;margin-right: 0"><a href="#tabs-3">Related Occupation</a></li>
                    </ul>

                    <div id="tabs-1">

						<div id="accordion" class="accordion_style04">
                            <h3><a href="#">Participant Eligibility</a></h3>
                            <div>
                                <?php the_field('course_detail_part_1')?>
                            </div>
							<h3><a href="#">Course Outcome</a></h3>
							<div>
                                <?php the_field('course_detail_part_2')?>
                            </div>
						    <h3><a href="#">Course Cost</a></h3>
						    <div>
                                <?php the_field('course_detail_part_3')?>
                            </div>
                        </div>


                    </div>

                    <div id="tabs-2">

						<div id="accordion3" class="accordion_style04">
                            <h3><a href="#">Core Units</a></h3>
                            <div>
                              <?php the_field('course_units')?>
                            </div>
                            <h3><a href="#">Course Outcome</a></h3>
                            <div class="ui-accordion-content" style="display: block">
                               <?php the_field('course_outcome')?>
                            </div>
                        </div>

                    </div>

                    <div id="tabs-3">
                        <div class="tab_content p10">
                            <?php the_field('course_occupations')?>
                        </div>
                    </div>
                </div>
                <!--tab结束-->
            </div>

           <?php get_sidebar(); ?>

            <div class="row mb10"><a href="javascript:void(0)" class="btn_red"><span>Apply Now</span></a></div>
        </div>
    </div>

<?php get_footer(); ?>
