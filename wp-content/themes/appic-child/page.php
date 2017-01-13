<?php 
ThemeFlags::set('hide_breadcrumbs', true);
?>

<?php get_header(); ?>
<style type="text/css">
	.action-area-mini{
		display: none !important;
	}
</style>
<div class="white-wrap container page-content home-bg">
	<?php echo do_shortcode('[rev_slider home-page]');?>
	<div id="home-page-inside">
	<?php if (have_posts()): ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="row-fluid">
				<div class="span8">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>

<div class="clearfix"></div>

<?php get_footer('home'); ?>
