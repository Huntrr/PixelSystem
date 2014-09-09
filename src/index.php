<?php get_header(); ?>


<!-- START "CONTENT" -->
<div id="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <div class="post">
	        <div class="date">
				<span class="day"><?php the_time('d'); ?></span>
				<span class="month"><?php the_time('M'); ?></span>
				<span class="year"><?php the_time('Y'); ?></span>
			</div>
	        <div class="title">
	            <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
	            <h4>
	            	<?php if ( is_single() || is_page() ) : ?>written by <a href="<?php get_site_url(); ?>/about/" title="About <?php the_author(); ?>"><?php the_author(); ?></a> | <?php endif; ?><?php the_tags(); ?>
	            </h4>
	        </div>
	        <p><?php the_content(); ?></p>
	    </div>
	<?php endwhile; else: ?>
	    <div class="post">
	        <div class="title">
	            <h3>Sorry!</h3>
	        </div>
	        <p><?php _e('No posts matched your criteria.'); ?></p>
	    </div>
	<?php endif; ?>

	<?php if ( !is_single() ) : ?>
	    <div class="post">
	        <p class="aligner"><?php previous_posts_link('&laquo; Previous') ?> | <?php next_posts_link('Next &raquo;') ?></p>
	    </div>
	<?php endif; ?>
</div>

<!-- END OF CONTENT -->
    
<?php get_footer(); ?>