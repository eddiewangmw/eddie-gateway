<?php
/**
 *  Template Name: Ajax template
 * The template for Ajax.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */

if ( have_posts() ) while ( have_posts() ) : the_post();

the_content();

endwhile; ?>

