
    <!--banner-->
    <div class="banner_mod row">
        <img src="<?php echo get_template_directory_uri(); ?>/img/banner_courses.gif" alt="" height="162">
    </div>
    <!--content-->
    <div class="content_mod row mb10">
        <div class="p15">
            <div class="left mb30">

                <div class="nav_breadcrumb">
                   <?php echo the_breadcrumb();?>
                </div>
                <div class="course_detail mb30">
                    <h2><?php echo single_cat_title()?></h2>
                    <p><?php echo category_description();?></p>
                </div>
                <!--accordion开始-->
				
				<?php $this_cat = (get_query_var('cat')) ? get_query_var('cat') : 0; ?>
				<?php $cats = get_categories( array('parent'=>$this_cat)); ?>
				<?php if(!$cats){ $cats[] = get_category($this_cat);}?>
				<?php if($cats):?>
					<div id="accordion" class="accordion_style02">
				<?php foreach($cats AS $cat):?>
                    <h3><a href="#"><?php echo $cat->name;?></a></h3>
                    <div>
						<?php 
						query_posts('cat='.$cat->term_id);
						$i = 0;
						while (have_posts()) : the_post();
						$i++;
						?>
                        <div class="course_detail_mod" <?php echo (($i > 1) AND ($i%3 == 0)) ? 'style="margin-right: 0"' : '';?> >
                            <span><a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/ex03.gif" alt=""></a></span>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <p><?php dynamic_excerpt(150);?></p>
                        </div>
                       <?php endwhile;?>
                    </div>
				<?php endforeach;?>
				</div>
				<?php endif;?>
            </div>

           <?php get_sidebar(); ?>

            <div class="row mb10"><a href="javascript:void(0)" class="btn_red"><span>Apply Now</span></a></div>
        </div>
    </div>