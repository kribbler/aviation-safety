<?php
/*
 * Template Name: Page Popup
 */


// hiding breadcrumbs for this template
ThemeFlags::set('hide_breadcrumbs', true);

//get_header();
?>

<style type="text/css">
body{
	font-family: 'Lato', sans-serif;
	background-color: #fff;
}

li {
	line-height: 22px;
}
</style>

<div class="clearfix"></div>

<div class="white-wrap container page-content home-bg">
	<?php if (have_posts()): ?>
		<?php while(have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<div class="clearfix"></div>

<?php //get_footer(); ?>