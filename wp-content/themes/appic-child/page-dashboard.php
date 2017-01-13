<?php
/*
 * Template Name: Page Dashboard
 */

check_to_redirect_home();

// hiding breadcrumbs for this template
ThemeFlags::set('hide_breadcrumbs', true);

get_header();
?>
<style type="text/css">
	#navigation-box{
		display: none;
	}
	</style>

<div class="clearfix"></div>

<?php
save_user_info();
?>
<div class="whiteish margin_40 min_500">
	<div class="container page-content top_less">
		<?php if (have_posts()): ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part('404'); ?>
		<?php endif; ?>

		<!--dashboard content-->
		<!--<h3>This is your dashboard</h3>-->
		<!--<ul id="dashboard_items">-->
			<?php echo do_shortcode( '[show_start_course_button]' );?>
			<!--<li><a title="Questions" href="<?php echo get_site_url();?>/questions/">Start Course</a></li>-->
			<!--<li style="display: none;"><a title="Question 1" href="http://localhost/aviation-safety/questions/question-1/">Start Questionnaire</a></li>-->
			<!--<li style="display: none"><a title="Reports" href="http://localhost/aviation-safety/reports/">Reports</a></li>-->
		<!--</ul>-->
		<!--<strong>Number of available licences:</strong> <?php //echo do_shortcode(' [get_licences_number] ');?>-->

	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#start_course').css('color', '#777');
		$('#start_course').click(function(){
			var agree = $('#term_agree').attr('checked');
			console.log(agree);
			if (agree) return true;
			else {

				return false;
			}
			
		});
		$('#term_agree').click(function(){
			var agree = $('#term_agree').attr('checked');
			if (agree == 'checked'){
				$('#start_course').css('color', '#fff');
			} else {
				$('#start_course').css('color', '#777');
			}
		});

		$('#user_info').submit(function(){
			var errors = false;
			var organization = $('#user_organization').val();
			if (!organization){
				errors = true;
				$('#error_organization').fadeIn('fast');
			} else {
				$('#error_organization').hide();
			}

			var first_name = $('#user_first_name').val();
			if (!first_name){
				errors = true;
				$('#error_first_name').fadeIn('fast');
			} else {
				$('#error_first_name').hide();
			}

			var last_name = $('#user_last_name').val();
			if (!last_name){
				errors = true;
				$('#error_last_name').fadeIn('fast');
			} else {
				$('#error_last_name').hide();
			}

			var clock_number = $('#user_clock_number').val();
			if (!clock_number){
				errors = true;
				$('#error_clock_number').fadeIn('fast');
			} else {
				$('#error_clock_number').hide();
			}

			var manager_name = $('#user_manager_name').val();
			if (!manager_name){
				errors = true;
				$('#error_manager_name').fadeIn('fast');
			} else {
				$('#error_manager_name').hide();
			}

			if (errors)
				return false;
			else return true;
		});

		$('input[name="user_avatar_type"]:radio').change(function(){
			var av_type = $(this).val();

			if (av_type == 'Expat Avatar'){
				$('#avatar_explain_angela').hide();
				$('#avatar_explain_abdul').hide();
				$('#avatar_explain_ipad').hide();
				$('#avatar_explain_none').hide();
				$('#avatar_explain_victor').fadeIn('fast');
			}

			if (av_type == 'Expat Lady Avatar'){
				$('#avatar_explain_abdul').hide();
				$('#avatar_explain_victor').hide();
				$('#avatar_explain_ipad').hide();
				$('#avatar_explain_none').hide();
				$('#avatar_explain_angela').fadeIn('fast');
			}

			if (av_type == 'Arabic Avatar'){
				$('#avatar_explain_victor').hide();
				$('#avatar_explain_angela').hide();
				$('#avatar_explain_ipad').hide();
				$('#avatar_explain_none').hide();
				$('#avatar_explain_abdul').fadeIn('fast');
			}

			if (av_type == 'iPad Avatar'){
				$('#avatar_explain_victor').hide();
				$('#avatar_explain_angela').hide();
				$('#avatar_explain_abdul').hide();
				$('#avatar_explain_none').hide();
				$('#avatar_explain_ipad').fadeIn('fast');
			}

			if (av_type == 'No Avatar'){
				$('#avatar_explain_victor').hide();
				$('#avatar_explain_angela').hide();
				$('#avatar_explain_abdul').hide();
				$('#avatar_explain_ipad').hide();
				$('#avatar_explain_none').fadeIn('fast');
			}
		});
		var av_type = "<?php echo get_the_author_meta( 'user_avatar_type', get_current_user_id() );?>";
		console.log('av_type: ' + av_type);
		if (av_type == 'Expat Avatar'){
			$('#avatar_explain_victor').fadeIn('fast');
		}

		if (av_type == 'Expat Lady Avatar'){
			$('#avatar_explain_angela').fadeIn('fast');
		}

		if (av_type == 'Arabic Avatar'){
			$('#avatar_explain_abdul').fadeIn('fast');
		}
		if (av_type == 'iPad Avatar'){
			$('#avatar_explain_ipad').fadeIn('fast');
		}

		if (av_type == 'No Avatar'){
			$('#avatar_explain_none').fadeIn('fast');
		}
	});

$('#email_certificate').click(function(){
	$('#ajax_loading').show();
	$.post(ajaxurl, { action: 'emailCertificate' }, function(output, is_ok) {
		$('#ajax_loading').hide();
		$('#email_certificate_sent').fadeIn('fast');
	});
});
</script>
<?php get_footer(); ?>
