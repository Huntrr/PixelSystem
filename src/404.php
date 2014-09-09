<?php get_header(); ?>

<!-- START "CONTENT" -->
<div id="content">
    <div class="post">
        <div class="date">
			<span class="day"><?php the_time('d'); ?></span>
			<span class="month"><?php the_time('M'); ?></span>
			<span class="year"><?php the_time('Y'); ?></span>
		</div>
        <div class="title">
            <h3>Error 404</h3>
            <h4>Whoops! Something went wrong!</h4>
        </div>

        <p>This is not the page you were looking for...</p>
    </div>
</div>
<!-- END OF CONTENT -->
    
<?php get_footer(); ?>

