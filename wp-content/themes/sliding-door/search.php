<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */

get_header(); ?>
    <div class="banner_mod row">
        <img src="<?php echo get_template_directory_uri(); ?>/img/search-banner.png" alt="" height="162">
    </div>
    <div class="content_mod row mb10">
        <div class="p15">
		    <div class="row mb10">
				<div style="height:100px;">
		        <form action="" class="main_search search_result" id="search">
		            <input type="text" placeholder="<?php echo get_search_query();?>" name="s" style="border-top: solid 1px #555;border-left: solid 1px #555;border-bottom: solid 1px #555;">
		            <a href="javascript:void(0)" class="btn_search " style="border-top: solid 1px #555;border-right: solid 1px #555;border-bottom: solid 1px #555;"></a>
		        </form>
				</div>
				<?php if ( have_posts() ) : ?>
								<div class="search-header">
									Your search for "<?php echo get_search_query();?>" returened <?php echo $wp_query->post_count;?> results.
								</div>
				<?php else : ?>
								<div class="search-header">
									Your search for "<?php echo get_search_query();?>" returened 0 results.
								</div>
				<?php endif; ?>
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="search-item">
					<div class="num">1</div>
					<div class="content">
						<p><?php the_title(); ?></p>
						<p>
							<?php dynamic_excerpt(200); ?>
						</p>
						<p class="link">
							<a href="<?php the_permalink(); ?>" class="btn_red btn-link"><span>Go to the link</span></a>
						</p>
					</div>
				</div>
			<?php endwhile;?>
				<?php endif; ?>
		    </div>
            <div class="left mb30">
				
			</div>
		</div>
	</div>

<?php get_footer(); ?>
