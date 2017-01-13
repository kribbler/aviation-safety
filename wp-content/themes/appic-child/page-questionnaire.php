<?php
/*
 * Template Name: Questionnaire Page
 */

check_to_redirect_home();

// hiding breadcrumbs for this template
ThemeFlags::set('hide_breadcrumbs', true);

get_header('questions');
?>
<div class="clearfix"></div>

<?php $question = get_static_question( get_user_last_question() ); ?>

<div class="white-wrap container page-content">
	<div id="question_titleX"><?php echo $question['question_titleX'];?></div>
	<div id="delayed_question_display"></div>
	<div id="ajax_p"><?php echo $question['question_content'];?></div>
	<div id="right_answer"></div>
	<div id="wrong_answer"></div>
	<div id="my_navigation">
		<div id="navigation_prev">Back</div>
		<div id="navigation_next">Next</div>
		<div id="navigation_finish" style="display: none"><a href="<?php echo site_url();?>/certificates/c1/?print=pdf">Get Your Certificate</a></div>
	</div>
    
	<?php if (have_posts()): ?>
		<?php while(have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<div class="clearfix"></div>

<?php get_footer(); ?>