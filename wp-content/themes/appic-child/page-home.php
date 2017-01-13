<?php
/*
 * Template Name: Home Page Child
 */

redirect_user_to_dashboard();

// hiding breadcrumbs for this template
ThemeFlags::set('hide_breadcrumbs', true);

get_header();
?>
<div class="clearfix"></div>

<div class="white-wrap container page-content home-bg">
	<?php echo do_shortcode('[rev_slider home-page]');?>
	<div id="home-page-inside">
	<?php if (have_posts()): ?>
		<?php while(have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>

<div class="clearfix"></div>

<?php get_footer('home'); ?>