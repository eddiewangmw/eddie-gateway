<?php
/**
 * slidingdoor functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, slidingdoor_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'slidingdoor_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */


/**
 * Color custom theme options
 */
require_once ( get_template_directory() . '/theme-options.php' );

add_action( 'after_setup_theme', 'slidingdoor_setup' );

if ( ! function_exists( 'slidingdoor_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Sliding Door 1.0
 */
function slidingdoor_setup() {
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
}
add_theme_support( 'menus' );

endif;
function gateway_get_categories($args = ''){
	$defaults = array(
		'show_option_all' => '', 'show_option_none' => __('No categories'),
		'orderby' => 'name', 'order' => 'ASC',
		'style' => 'list',
		'show_count' => 0, 'hide_empty' => 1,
		'use_desc_for_title' => 1, 'child_of' => 0,
		'feed' => '', 'feed_type' => '',
		'feed_image' => '', 'exclude' => '',
		'exclude_tree' => '', 'current_category' => 0,
		'hierarchical' => true, 'title_li' => __( 'Categories' ),
		'echo' => 1, 'depth' => 0,
		'taxonomy' => 'category'
	);

	$r = wp_parse_args( $args, $defaults );

	if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] )
		$r['pad_counts'] = true;

	if ( true == $r['hierarchical'] ) {
		$r['exclude_tree'] = $r['exclude'];
		$r['exclude'] = '';
	}

	if ( !isset( $r['class'] ) )
		$r['class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];

	extract( $r );

	if ( !taxonomy_exists($taxonomy) )
		return false;

	return	$categories = get_categories( $r );
}

function gateway_wp_list_categories( $args = '' ) {
	$defaults = array(
		'show_option_all' => '', 'show_option_none' => __('No categories'),
		'orderby' => 'name', 'order' => 'ASC',
		'style' => 'list',
		'show_count' => 0, 'hide_empty' => 1,
		'use_desc_for_title' => 1, 'child_of' => 0,
		'feed' => '', 'feed_type' => '',
		'feed_image' => '', 'exclude' => '',
		'exclude_tree' => '', 'current_category' => 0,
		'hierarchical' => true, 'title_li' => __( 'Categories' ),
		'echo' => 1, 'depth' => 0,
		'taxonomy' => 'category'
	);

	$r = wp_parse_args( $args, $defaults );

	if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] )
		$r['pad_counts'] = true;

	if ( true == $r['hierarchical'] ) {
		$r['exclude_tree'] = $r['exclude'];
		$r['exclude'] = '';
	}

	if ( !isset( $r['class'] ) )
		$r['class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];

	extract( $r );

	if ( !taxonomy_exists($taxonomy) )
		return false;

	$categories = get_categories( $r );

	$output = '';
	
	if ( empty( $categories ) ) {
		if ( ! empty( $show_option_none ) ) {
			if ( 'list' == $style )
				$output .= '<li class="cat-item-none">' . $show_option_none . '</li>';
			else
				$output .= $show_option_none;
		}
	} else {
		$categories =  reset_categories($categories);
		foreach($categories AS $cat){
			$output .= '<h3><a href="'.get_term_link($cat['detail']).'">'.$cat['detail']->name.'</a></h3>';
			if( $cat['child'] ){
				$output .= '<div><ul>';
				foreach($cat['child'] AS $sub_cat){
					$output .= '<li><a href="'.get_term_link($sub_cat).'">'.$sub_cat->name.'</a></li>';
				}       
                $output .= '</ul></div>';
			}
		}
	}

	if ( $title_li && 'list' == $style )
		$output .= '</ul></li>';

	$output = apply_filters( 'wp_list_categories', $output, $args );

	if ( $echo )
		echo $output;
	else
		return $output;
}

function reset_categories($categories){
	$return = array();
	foreach($categories AS $cat){
		if( $cat->parent == 0){
			$return[$cat->term_id]['detail'] = $cat;
		}else{
			$return[$cat->parent]['child'][] = $cat;
		}
	}
	return $return;
	
}
function the_breadcrumb() {
    global $post;
    echo '<ul>';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> <span class="divider"> > </span> </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> <span class="divider"> > </span> </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> <span class="divider"> > </span> </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

if ( ! function_exists( 'slidingdoor_posted_on' ) ) :
function slidingdoor_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'slidingdoor' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'slidingdoor' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;


class Gateway_Footer_Walker_Nav_Menu extends Walker_Nav_Menu{
	
	function start_el(&$output, $item, $depth, $args)
    {
        $classes = empty ($item->classes) ? array() : (array)$item->classes;

        $class_names = join(
            ' '
            , apply_filters(
                'nav_menu_css_class'
                , array_filter($classes), $item
            )
        );

        !empty ($class_names)
            and $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $item->menu_item_parent == 0 ? "<ul >" : "<li>";

        $attributes = '';

        !empty($item->attr_title)
            and $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
        !empty($item->target)
            and $attributes .= ' target="' . esc_attr($item->target) . '"';
        !empty($item->xfn)
            and $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
        !empty($item->url)
            and $attributes .= ' href="' . esc_attr($item->url) . '"';
        !empty($item->description)
            and $attributes .= ' id="' . esc_attr($item->description) . '"';

        // insert description for top level elements only
        $description = '';

        $title = apply_filters('the_title', $item->title, $item->ID);

		$args = (object)$args;
		if( $item->menu_item_parent == 0){
	        $item_output = '<h3 class="title">'. $title. '</h3>';
		}else{
		    $item_output = $args->before
		        . "<a $attributes>"
		        . $args->link_before
		        . $title
		        . '</a> '
		        . $args->link_after
		        . $description
		        . $args->after;
		}
        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            , $item_output
            , $item
            , $depth
            , $args
        );
    }
	

	/**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker::start_lvl()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent\n";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see Walker::end_lvl()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent\n";
	}
	
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= $item->menu_item_parent == 0 ? "</ul>\n" : "</li>\n";
	}
}

function dynamic_excerpt($length) {    
global $post;   
$text = $post->post_excerpt;   
if ( '' == $text ) {   
$text = get_the_content('');   
$text = apply_filters('the_content', $text);   
$text = str_replace(']]>', ']]>', $text);   
}   
$text = strip_shortcodes($text);    
$text = strip_tags($text);    
$text = mb_substr($text,0,$length).' ...';   
echo $text;    
}  