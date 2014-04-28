<?php
/**
 * Template Name: Form page
 *
 * A custom page template just has form.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */

get_header(); ?>

    <div class="banner_mod row">
        <img src="<?php echo get_template_directory_uri(); ?>/img/banner_form.gif" alt="" height="162">
    </div>
    <!--日历控件-->
    <div class="calendar_mod row">
        <div class="p15">
		   <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		   					<div class="entry-content">
		   						<?php the_content(); ?>
							</div><!-- .entry-content -->

		   				

		   <?php endwhile; ?>
        </div>
    </div>

<?php get_footer(); ?>
