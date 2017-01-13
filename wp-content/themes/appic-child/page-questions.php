<?php 
check_to_redirect_home();
nocache_headers();
$last_question = get_user_last_question();

if ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
	//$last_question = 5;
}
else if ($_SERVER['REMOTE_ADDR'] == '83.103.200.163'){
	//$last_question = 10;
} else {
	//$last_question = 10;
}

/*
 * Template Name: Questions Page
 */

// hiding breadcrumbs for this template
ThemeFlags::set('hide_breadcrumbs', true);

//get_header('questions');
?><!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--[if lt IE 8]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]--><!--Edge mode for IE8+-->
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title><!--Change Title-->
<meta name="description" content="<?php bloginfo('description'); ?>" /><!--Change content-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" /><!--Scale a webpage to a 1:1 pixel-->

<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>


<script src="<?php echo get_stylesheet_directory_uri() . '/js/jquery.base64.js';?>"></script>



<?php wp_head(); ?>

<!-- * ******** ******************* * -->
<!-- * ******** ******************* * -->
<!-- * ******** ******************* * -->
<?php 
if( esc_attr(get_the_author_meta( 'user_avatar_type', $current_user->ID )) !='No Avatar' ){
 ?>
<style type="text/css">
	#my_navigation{
		display: none;
	}
</style>
<?php } ?>

<!-- * ******** ******************* * -->
<!-- * ******** ******************* * -->
<!-- * ******** ******************* * -->
<script src="<?php echo get_stylesheet_directory_uri() . '/js/disableF5.js';?>"></script>
</head>
<body <?php body_class(); ?> id="body_questions"><?php render_google_analytics_code(); ?>
<!--[if lt IE 8]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<header>
<?php if (get_theme_option('show_top_lines')) : ?>
	<div class="top-nav">
		<div class="container">
			<p class="pull-left inline hidden-phone">
				<?php echo get_theme_option ('top_line_left_text'); ?>
			</p>
			<?php do_action('icl_language_selector'); ?>
			<p class="pull-right inline">
				<?php echo get_theme_option ('top_line_right_text'); ?>
			</p>
		</div>
	</div>
<?php  endif; ?>
	<div class="main-nav-wrap">
		<div class="blue-line-wrap">
			<nav class="main-navbar container">
				<div class="logo pull-left">
					<?php get_template_part('includes/templates/logo-link'); ?>
				</div><!-- .logo -->
				
				<div id="logo_right">
					<?php global $current_user; 
					if ($current_user){
						echo '<a href="' . get_site_url() . '/user-dashboard">' . $current_user->user_firstname . ' ' . $current_user->last_name . '</a> logged in. ';
						echo '<a href="' . wp_logout_url( home_url() ) . '">Logout</a>';
					}
					?>
					<br />
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/logo-bae-systems.jpg';?>" />
				</div>
				<div id="avatar_holder">
					<?php 
					$user_avatar_type = esc_attr(get_the_author_meta( 'user_avatar_type', $current_user->ID ));
					if ($user_avatar_type == 'No Avatar'){ ?>
						<style type="text/css">
							#avatar_holder {
								display: none;
							} 
							#avatar_repeat {
								display: none;
							}
						</style>
					<?php 
					} else if ($user_avatar_type == 'Arabic Avatar'){
						$uat_code = 2397137;
						$uat_lang = 1;
						$uat_voice = 5;
					} else if ($user_avatar_type == 'Expat Avatar'){
						$uat_code = 2397139;
						$uat_lang = 1;
						$uat_voice = 5;
					} else if ($user_avatar_type == 'iPad Avatar'){
						$uat_code = 2404023;
						$uat_lang = 1;
						$uat_voice = 5;
					} else if ($user_avatar_type == 'Expat Lady Avatar'){
						$uat_code = 2397141;
						$uat_lang = 1;
						$uat_voice = 6;
					} else {
						$uat_code = 2397141;
						$uat_lang = 1;
						$uat_voice = 6;
					} 

					if ($user_avatar_type != 'No Avatar'){
						if ($user_avatar_type == 'iPad Avatar') {


							?>
							<style type="text/css">
							#avatar_holder {
								top: -33px !important;
								height: 217px !important;
							}
							</style>
							<script language="JavaScript" type="text/javascript" src="//vhss-d.oddcast.com/fb_embed_functions_v3.php?acc=4942120&js=1&h=340&w=194&bc=&fs=1&lo=1&ss=2404023&sl=0&tr=1&min=0&eid=4ea640b091b3481c320093013537cc3f&fv=9"></script>
							<?php
						} else {?>

						<script language="JavaScript" type="text/javascript" src="//vhss-d.oddcast.com/vhost_embed_functions_v2.php?acc=4942120&js=1"></script><script language="JavaScript" type="text/javascript">AC_VHost_Embed(4942120,190,250,'',1,1, <?php echo $uat_code;?>, 0,1,0,'b4109d84b9dc48b9d69870cea8ee8efc',9);</script>
						<?php } ?>

					<?php } ?>
				</div>
				<div class="clear"></div>
				
			</nav>

			
		</div>
	</div>
</header>

<?php
// call to action block
$callToActionImage = null;
if (is_page() || (is_singular('service'))) {
	if (is_page()) {
		$caMetaObject = vp_metabox('page_call_action_meta');
	} else {
		$caMetaObject = vp_metabox('service_call_action_meta');
	}
	
	$caMetaData = $caMetaObject->meta;
	if (!empty($caMetaData['image_url'])) {
		$callToActionImage = $caMetaData['image_url'];
		$caPrimaryTitleEscaped = !empty($caMetaData['title1']) ? esc_html($caMetaData['title1']) : '';
		$caSecondaryTitleEscaped = !empty($caMetaData['title2']) ? esc_html($caMetaData['title2']) : '';
		$caBtnUrl = isset($caMetaData['btn_url']) ? $caMetaData['btn_url'] : '';
		$caBtnTitleEscaped = $caBtnUrl && !empty($caMetaData['btn_title']) ? esc_html($caMetaData['btn_title']) : '';
	}
}
?>
<!--
<section class="action-area-mini">
	<?php //echo appic_breadcrumbs(); ?>

</section>
-->

<?php 
$post_template = get_post_meta($post->ID,'_post_template',true);
if ($post_template != 'questions-template.php'){?>

	<section class="action-area-mini">
		<?php //echo appic_breadcrumbs(); ?>
		<div class="container heading">
			<div class="row">
				<div class="span10">
					<div id="question_title">
						Loading...<?php //echo $post->post_title;?>
					</div>
				</div>
				<div class="span2">
					Course progress <span id="course_progress">loading...</span>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<div class="clearfix"></div>
<?php
if (!is_user_logged_in()) {
	echo do_shortcode( '[wppb-login]' );
	return false;
}
?>

<div id="question_background">
	<div class="white-wrap container page-content no-top-padding">
		
		<div id="delayed_question_display"></div>
		<div id="ajax_p"></div>
		<div id="right_answer"></div>
		<div id="wrong_answer"></div>
		
		<div id="question_titleX"></div>
		<?php if (have_posts()): ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div id="my_navigation">
		<div class="white-wrap container page-content no-top-padding">
			<div id="navigation_prev">Back</div>
			<div id="avatar_repeat">Repeat</div>
			<div id="navigation_next">Next</div>
			<div style="display: none" id="video_delay"></div>
			<?php show_force_next(); ?>

			<div id="navigation_finish" style="display: none"><a href="<?php echo site_url();?>/certificates/c1/?print=pdf">Print Your Certificate</a></div>
		</div>
	</div>
</div>

<div class="clearfix"></div>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>

<script src="<?php echo get_stylesheet_directory_uri() . '/js/base64.js';?>"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script>// HOTFIX: We can't upgrade to jQuery UI 1.8.6 (yet)
// This hotfix makes older versions of jQuery UI drag-and-drop work in IE9
(function($){var a=$.ui.mouse.prototype._mouseMove;$.ui.mouse.prototype._mouseMove=function(b){if($.browser.msie&&document.documentMode>=9){b.button=1};a.apply(this,[b]);}}(jQuery));</script>
<script type="text/javascript">
/** BEGIN::this function fixes jQuery UI 1.8.13 sudden error "c.curcss is not a function" **/
jQuery.curCSS = function (element, attrib, val) {
    jQuery(element).css(attrib, val);
};
/** END::this function fixes jQuery UI 1.8.13 sudden error "c.curcss is not a function" **/

	function voki_sceneLoaded(){
		console.log('scene voki_sceneLoaded');
	}
//jQuery(document).ready(function($) {

	var can_go_next = true;
	var last_question = <?php echo $last_question;?>; //edit this number to show a specific question
	//var last_question = 9;
	var current_question = last_question;
	do_drag_cross();

	initiate_report();
	
	

	function show_page_after_scene_is_loaded(last_question) {
		////console.log('showing page after scene is loaded!');
		display_question(last_question);

		jQuery('#navigation_next').click(function(){
			if ( jQuery(this).attr('class') != 'disabled' && can_go_next){
				//console.log(last_question);
				last_question++;
				//console.log(last_question);
				jQuery('.ui-widget-overlay').hide();
				jQuery('.ui-dialog').html("");
				display_question(last_question);
			}
		});

		jQuery('#force_next').click(function(){
			jQuery('.ui-widget-overlay').hide();
			jQuery('.ui-dialog').html("");
			last_question++;
			display_question(last_question);
		});

		jQuery('#navigation_prev').click(function(){
			if ( jQuery(this).attr('class') != 'disabled'){
				last_question--;
				display_question(last_question);
			}
		});
	}

	function increment_errors_number(){
		//console.log('hereee');
		$.post(ajaxurl, { action: 'incrementErrorsNumber' }, function(output, is_ok) {
			//console.log(output);
			if (output >= <?php echo get_option( 'max_wrong_answer' );?>){
				show_failed_course();
				return false;
			}
		});
	}

	function show_failed_course(){
		$('#ajax_p').html('You have failed your test');
		$('#my_navigation').hide();
	}

	function show_delayed_content(content){		
		//NOT USED
		content = content.split('[delay_show]');

		var total = content.length;
		var i = 0;

		myLoop();
		
		function myLoop () {
			$('#delayed_question_display').append(content[i]);
			$('.hidden').show();
			setTimeout(function () {
				//console.log(i);
				i++;
				if (i < total){
					setTimeout( myLoop, 500 );
				}
			}, 1000);
		}
	}
	

	function append_entry(entry){
		$('#delayed_question_display').append(entry);
	}
	function vh_slideBegin(sceneNumber){
						sayText("Welcome to my website!",1,1,1); 
					}
	/*function vh_sceneLoaded(){
		console.log('scene vh_sceneLoaded');
	}*/


	function say_correct(){
		<?php if ($user_avatar_type != 'No Avatar'){ ?>
			stopSpeech();
			sayText('<?php echo get_option( 'aviation_message_correct_answer' );?>',<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
		<?php } ?>
	}

	function say_incorrect(){
		<?php if ($user_avatar_type != 'No Avatar'){ ?>
			stopSpeech();
			sayText('<?php echo get_option( 'aviation_message_wrong_answer' );?>',<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
		<?php } ?>
	}

	<?php if ($user_avatar_type != 'No Avatar'){ ?>

	jQuery('#avatar_repeat').click(function(){
						<?php if ($user_avatar_type != 'No Avatar'){ ?>
							stopSpeech();
						<?php } ?>
						$.post(ajaxurl, { action: 'getQuestionAvatarText', last_question: current_question }, function(output, is_ok) {
							if (output){
								output = output.replace("\\/", "/");
								console.log('1. avatar text: ' + output);
								//return false;
								$('#avatar_holder').show();
								sayText(output,<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
							}
						});
						//stopSpeech();
						//sayText(text_to_repeat,<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
					});
	<?php } ?>
	function display_question(last_question){
		////console.log('Displaying question: ' + last_question);
		$('#ajax_p').html("");
		//$('#avatar_repeat').hide();
		$.post(ajaxurl, { action: 'getQuestion', last_question: last_question }, function(output, is_ok) {
			if (is_ok){
				
				current_question = last_question;
				<?php if ($user_avatar_type != 'No Avatar'){ ?>
					stopSpeech();
				<?php } ?>
				$('#navigation_finish').hide();
				$('#right_answer').hide();
				$('#wrong_answer').hide();
				output = JSON.parse(output);
				//console.log(output);
				if (output.question_background){
					$('#question_background').css("background-image", "url("+output.question_background+")");  
				} else {
					$('#question_background').css("background-image", "none");
				}

				if (output.change_next_to_skip == 1) {
					enable_next();
					console.log('over here');
					jQuery('#navigation_next').show();
					jQuery('#navigation_next').removeClass('disabled');

				}
				//console.log('output.avatar_text: ' + output.avatar_text);
				if (!output.avatar_text){
					$('#avatar_holder').addClass('avatar_hidden');
				} else {
					$('#avatar_holder').removeClass('avatar_hidden');
					<?php if ($user_avatar_type != 'No Avatar'){ ?>
						stopSpeech();
					<?php } ?>
					////console.log('say: ' + output.avatar_text);
					<?php if ($_SERVER['REMOTE_ADDR'] != '83.103.200.163' || 1==1){?>
						//console.log('Voice: ' + '<?php echo $uat_voice;?>');
						//console.log('Lang: ' + '<?php echo $uat_lang;?>');
						text_to_speak = output.avatar_text;
						text_to_speak = text_to_speak.replace("\\/", "/");
						

						//console.log('1. text to speak: ' + text_to_speak);


						//sayText(text_to_speak,<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
						$('#avatar_repeat').trigger('click');
						
					<?php } ?>
					//console.log('should show the repeat');
					var text_to_repeat = output.avatar_text;
					$('#avatar_repeat').show();
					//$('#avatar_repeat').live('click',function(){
					
				} 
				//console.log('last question:' + last_question);
				/*
				if (last_question == 9){
					stopSpeech();
					sayText(text_to_speak_10,5,1,2);	
				} else if (last_question == 10){
					stopSpeech();
					sayText(text_to_speak_11,5,1,2);	
				} else if (last_question == 11){
					stopSpeech();
					sayText(text_to_speak_12, 5, 1, 2);
				}	else {
					//$('#avatar_holder').html('');
				}*/

				////console.log(output);
				if (!output.max_errors_reached){
					$('#question_title').html( output.question_title );
					$('#question_titleX').html( output.question_titleX );
					//show_delayed_content(output.question_content);

					$('#ajax_p').css('background-image', 'none');
					$('#ajax_p').html(output.question_content);
					$('#ajax_p').fadeIn();
				<?php if( $user_avatar_type !='No Avatar'){ ?>
					$('iframe#player').hide();
				<?php } ?>
					//console.log('inside disla');
					jQuery(".codenegar-ctt-element").each(function(){
						codenegar_make_tooltip(jQuery(this));
					});

					$('#course_progress').html(output.progress + '%');
					can_go_next = true;

					//if ($('#question_type') != ''){
					if (output.question_type != ''){
						hide_next();
						//var question_type = $('#question_type').val();
						var question_type = output.question_type;
						if (question_type){
							can_go_next = false;
						} else {
							enable_next();
						}
						var question_answer = $('#question_answer').val();

						if (question_answer){
							question_answer = Base64.decode(question_answer);
						}
						////console.log(question_answer);
						if (question_type == 'radio'){
							$('.radio_answer').click(function(){
								if (question_answer == $('input[name=radio_answer]:checked').val()){
									can_go_next = true;
									$('#right_answer').fadeIn('fast');
									enable_next();
									$("input[type=radio]").attr('disabled', true);
									<?php if ($user_avatar_type != 'No Avatar'){ ?>
										stopSpeech();
									<?php } ?>
									//sayText('<?php echo get_option( 'aviation_message_correct_answer' );?>',<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
									say_correct();
								} else {
									increment_errors_number();
									can_go_next = false;
									$('#wrong_answer').fadeIn('fast');
									disable_next();
									<?php if ($user_avatar_type != 'No Avatar'){ ?>
										stopSpeech();
									<?php } ?>
									//sayText('<?php echo get_option( 'aviation_message_wrong_answer' );?>',<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
									say_incorrect();
									$("input[type=radio]").attr('disabled', true);
								}
							})
						} 

						if (question_type == 'checkbox'){
							var total_ok = 0;

							$('.checkbox_answer').click(function(){
								var good_answers = question_answer.split("|");
								if (good_answers.indexOf($(this).val()) >=0) {
									$(this).addClass('correctDragHexagon_' + $(this).attr("id"));
									$(this).attr("disabled", true);
									total_ok++;
									if (total_ok == 4){
										//console.log('move forward');
										$('#right_answer').fadeIn('fast');
										can_go_next = true;
										enable_next();
										<?php if ($user_avatar_type != 'No Avatar'){ ?>
											stopSpeech();
										<?php } ?>
										say_correct();
										//$("span").hide();
									}
								} else if (total_ok < 4) {
									increment_errors_number();
									can_go_next = false;
									$('#wrong_answer').fadeIn('fast');
									disable_next();
									<?php if ($user_avatar_type != 'No Avatar'){ ?>
										stopSpeech();
									<?php } ?>
									//sayText('<?php echo get_option( 'aviation_message_wrong_answer' );?>',<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
									say_incorrect();
									$("input[type=checkbox]").attr('disabled', true);

								}
							})
						} 

						if (question_type == 'drag_cross'){
							can_go_next = false;
							disable_next();
							do_drag_cross();
						}

						if (question_type == 'drag_chain_order'){
							can_go_next = false;
							disable_next();
							do_drag_chain_order();
						}

						if (question_type == 'drag_hexagon'){
							can_go_next = false;
							disable_next();
							do_drag_hexagon();
						}

						if (question_type == 'drag_pentagon'){
							can_go_next = false;
							disable_next();
							do_drag_pentagon();
						}

						if (question_type == 'drag_pyramid'){
							can_go_next = false;
							disable_next();
							do_drag_pyramid();
						}

						if (question_type == 'questionnaire'){
							can_go_next = false;
							disable_next();
						}
					}

					mark_disabled_navigation(output);

					
					jQuery('.drag_cross_options').draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					jQuery('.drag_cross_options').live('mouseover',function(){
				    	jQuery(this).draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					});

					jQuery('.drag_chain_options').draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					jQuery('.drag_chain_options').live('mouseover',function(){
				    	jQuery(this).draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					});

					jQuery('.drag_hexagon_options').draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					jQuery('.drag_hexagon_options').live('mouseover',function(){
				    	jQuery(this).draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					});

					jQuery('.drag_pyramid_options').draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					jQuery('.drag_pyramid_options').live('mouseover',function(){
				    	jQuery(this).draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					});

					
					jQuery('.drag_pentagon_options').draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					jQuery('.drag_pentagon_options').live('mouseover',function(){
				    	jQuery(this).draggable({
				    		containment: "parent",
							cursor: 'move',
							revert: 'invalid',
							revertDuration: 900,
							opacity: 0.5,
							create: function(){jQuery(this).data('position',jQuery(this).position())},
							start:function(){jQuery(this).stop(true,true)}
						});
					});

				} else {
					show_failed_course();
				}
			} else {
				////console.log('the end?');
			}

			<?php if ($user_avatar_type != 'No Avatar'){ ?>
			//$('#avatar_repeat').live('click',function(){
			jQuery('.explain_button').live('click',function(){
			//jQuery('.explain_button').click(function(){
				////console.log(jQuery(this).html());
				var user_avatar_type = "<?php echo $user_avatar_type; ?>";
				//console.log(user_avatar_type);
				if (user_avatar_type == 'Arabic Avatar'){
					var the_explain = jQuery(this).find(".avatar_text_arabic").html();
				} else if (user_avatar_type == 'Expat Avatar'){
					var the_explain = jQuery(this).find(".avatar_text_expat").html();
				} else if (user_avatar_type == 'iPad Avatar'){
					var the_explain = jQuery(this).find(".avatar_text_expat").html();
				} else if (user_avatar_type == 'Expat Lady Avatar'){
					var the_explain = jQuery(this).find(".avatar_text_expat_lady").html();
				} else {
					var the_explain = "";
				}

				//console.log(the_explain);
				<?php if ($user_avatar_type != 'No Avatar'){ ?>
					stopSpeech();
				<?php } ?>
				sayText(the_explain,<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
			});

			jQuery('.explain_button_tooltip').live('click', function(){
				var user_avatar_type = "<?php echo $user_avatar_type; ?>";
				var text_to_speak = $(this).next().text();
				if (user_avatar_type == 'Arabic Avatar'){
					var the_explain = text_to_speak;
				} else if (user_avatar_type == 'Expat Avatar'){
					var the_explain = text_to_speak;
				} else if (user_avatar_type == 'iPad Avatar'){
					var the_explain = text_to_speak;
				} else if (user_avatar_type == 'Expat Lady Avatar'){
					var the_explain = text_to_speak;
				} else {
					var the_explain = "";
				}

				//console.log(the_explain);
				<?php if ($user_avatar_type != 'No Avatar'){ ?>
					stopSpeech();
				<?php } ?>
				sayText(the_explain,<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);

			});
			<?php } ?>
			jQuery('#send_answers').click(function(){
				
				var radio_answer_01 = jQuery('input:radio[name=radio_answer_01]:checked').val();
				var radio_answer_02 = jQuery('input:radio[name=radio_answer_02]:checked').val();
				var radio_answer_03 = jQuery('input:radio[name=radio_answer_03]:checked').val();
				var radio_answer_04 = jQuery('input:radio[name=radio_answer_04]:checked').val();
				var radio_answer_05 = jQuery('input:radio[name=radio_answer_05]:checked').val();
				var radio_answer_06 = jQuery('input:radio[name=radio_answer_06]:checked').val();
				var radio_answer_07 = jQuery('input:radio[name=radio_answer_07]:checked').val();
				var radio_answer_08 = jQuery('input:radio[name=radio_answer_08]:checked').val();
				var radio_answer_09 = jQuery('input:radio[name=radio_answer_09]:checked').val();
				var radio_answer_10 = jQuery('input:radio[name=radio_answer_10]:checked').val();
				var radio_answer_11 = jQuery('input:radio[name=radio_answer_11]:checked').val();
				var radio_answer_12 = jQuery('input:radio[name=radio_answer_12]:checked').val();
				var radio_answer_13 = jQuery('input:radio[name=radio_answer_13]:checked').val();
				var radio_answer_14 = jQuery('input:radio[name=radio_answer_14]:checked').val();

				var textarea_answer_15 = jQuery('#textarea_answer_15').val();
				var textarea_answer_16 = jQuery('#textarea_answer_16').val();
				var textarea_answer_17 = jQuery('#textarea_answer_17').val();
				var textarea_answer_18 = jQuery('#textarea_answer_18').val();
				var textarea_answer_19 = jQuery('#textarea_answer_19').val();
				var textarea_answer_20 = jQuery('#textarea_answer_20').val();
				var textarea_answer_21 = jQuery('#textarea_answer_21').val();

				<?php if ($_SERVER['REMOTE_ADDR'] != '83.103.200.163') { ?>
				if (!radio_answer_01 || !radio_answer_02 || !radio_answer_03 || !radio_answer_04 ||
					!radio_answer_05 || !radio_answer_06 || !radio_answer_07 || !radio_answer_08 ||
					!radio_answer_09 || !radio_answer_10 || !radio_answer_11 || !radio_answer_12 ||
					!radio_answer_13 || !radio_answer_14 || !textarea_answer_15 ||
					!textarea_answer_16 || !textarea_answer_17 || !textarea_answer_18 ||
					!textarea_answer_19 || !textarea_answer_20 || !textarea_answer_21 ){
					jQuery("#error_submit").fadeIn().delay(2000).fadeOut();
					return false;
				}
				<?php } ?>

				jQuery('#ajax_loading').show();

				$.post(ajaxurl, { 
						action: 'sendFinalQuestionnaire', 
						radio_answer_01: radio_answer_01,
						radio_answer_02: radio_answer_02, 
						radio_answer_03: radio_answer_03,
						radio_answer_04: radio_answer_04,
						radio_answer_05: radio_answer_05,
						radio_answer_06: radio_answer_06,
						radio_answer_07: radio_answer_07,
						radio_answer_08: radio_answer_08,
						radio_answer_09: radio_answer_09,
						radio_answer_10: radio_answer_10,
						radio_answer_11: radio_answer_11,
						radio_answer_12: radio_answer_12,
						radio_answer_13: radio_answer_13,
						radio_answer_14: radio_answer_14,
						textarea_answer_15: textarea_answer_15,
						textarea_answer_16: textarea_answer_16,
						textarea_answer_17: textarea_answer_17,
						textarea_answer_18: textarea_answer_18,
						textarea_answer_19: textarea_answer_19,
						textarea_answer_20: textarea_answer_20,
						textarea_answer_21: textarea_answer_21,
					}, function(output, is_ok) {
					jQuery('#ajax_loading').hide();
					<?php if ($user_avatar_type != 'No Avatar'){ ?>
						stopSpeech();
					
					sayText('<?php echo get_option( 'aviation_message_thank_you' );?>',<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
					<?php } ?>
					$('#navigation_next').html("Next");
					can_go_next = true;
					jQuery('#ajax_p').fadeOut('fast');
					var the_thanks = '<div class="questionnaire_thanks"><br /><br /><br /><br /><h1>Thank you...</h1><br /><br /><h2>Your feedback has been received.</h2><br />Please click Next to continue.&nbsp;&nbsp;&nbsp;&nbsp;</div>';					
					jQuery('#ajax_p').css('padding-top', '0px');
					jQuery('#ajax_p').html(the_thanks);

					jQuery('#ajax_p').fadeIn();
					enable_next();

				});
			});
		});
	}

	(function(g){g.Zebra_Tooltips=function(j,s){var b=this,k,h,q;b.settings={};b.hide=function(c,a){var b=c.data("Zebra_Tooltip");b&&(b.sticky=!1,a&&(b.destroy=!0),c.data("Zebra_Tooltip",b),l(c))};b.show=function(b,a){var d=b.data("Zebra_Tooltip");d&&(d.sticky=!0,d.muted=!1,a&&(d.destroy=!0),b.data("Zebra_Tooltip",d),n(b))};var m=function(c){var a=c.data("Zebra_Tooltip");if(!a.tooltip){var d=jQuery("<div>",{"class":"Zebra_Tooltip",css:{opacity:0,display:"block"}}),f=jQuery("<div>",{"class":"Zebra_Tooltip_Message", css:{"max-width":b.settings.max_width,"background-color":b.settings.background_color,color:b.settings.color}}).html(b.settings.content?b.settings.content:a.content).appendTo(d),a=jQuery("<div>",{"class":"Zebra_Tooltip_Arrow"}).appendTo(d),e=jQuery("<div>").appendTo(a);b.settings.keep_visible&&(d.bind("mouseleave"+(b.settings.close_on_click?" click":""),function(){l(c)}),d.bind("mouseenter",function(){n(c)}));d.appendTo("body");var p=d.outerWidth(),j=d.outerHeight(),m=e.outerWidth(),r=e.outerHeight(), a={tooltip:d,tooltip_width:p,tooltip_height:j+r/2,message:f,arrow_container:a,arrow_width:m,arrow_height:r,arrow:e},e=f.outerWidth(),p=f.outerHeight();d.css({width:a.tooltip_width,height:a.tooltip_height});a.tooltip_width+=f.outerWidth()-e;a.tooltip_height+=f.outerHeight()-p;d.css({width:a.tooltip_width,height:a.tooltip_height,display:"none"});a=g.extend(c.data("Zebra_Tooltip"),a);c.data("Zebra_Tooltip",a)}a.sticky&&!a.close&&(jQuery("<a>",{"class":"Zebra_Tooltip_Close",href:"javascript:void(0)"}).html("x").bind("click", function(a){a.preventDefault();a=c.data("Zebra_Tooltip");a.sticky=!1;c.data("Zebra_Tooltip",a);l(c)}).appendTo(a.message),a.close=!0,a=g.extend(c.data("Zebra_Tooltip"),a),c.data("Zebra_Tooltip",a));if(a.window_resized||a.window_scrolled)d=g(window),a.window_resized&&(k=d.width(),d.height(),f=c.offset(),g.extend(a,{element_left:f.left,element_top:f.top,element_width:c.outerWidth(),element_height:c.outerHeight()})),q=d.scrollTop(),h=d.scrollLeft(),d="left"==b.settings.position?a.element_left-a.tooltip_width+ a.arrow_width:"right"==b.settings.position?a.element_left+a.element_width-a.arrow_width:a.element_left+(a.element_width-a.tooltip_width)/2,f=a.element_top-a.tooltip_height,e="left"==b.settings.position?a.tooltip_width-a.arrow_width-a.arrow_width/2:"right"==b.settings.position?a.arrow_width/2:(a.tooltip_width-a.arrow_width)/2,d+a.tooltip_width>k+h&&(e-=k+h-(d+a.tooltip_width)-6,d=k+h-a.tooltip_width-6,e+a.arrow_width>a.tooltip_width-6&&(e=a.tooltip_width-6-a.arrow_width),d+e+a.arrow_width/2<a.element_left&& (e=-1E4)),d<h&&(e-=h-d,d=h+2,0>e&&(e=a.arrow_width/2),d+e+a.arrow_width/2>a.element_left+a.element_width&&(e=-1E4)),a.arrow_container.removeClass("Zebra_Tooltip_Arrow_Top"),a.arrow_container.addClass("Zebra_Tooltip_Arrow_Bottom"),a.message.css("margin-top",""),a.arrow.css("borderColor",b.settings.background_color+" transparent transparent"),f<q?(f=a.element_top+a.element_height-b.settings.vertical_offset,a.animation_offset=Math.abs(a.animation_offset),a.message.css("margin-top",a.arrow_height/2), a.arrow_container.removeClass("Zebra_Tooltip_Arrow_Bottom"),a.arrow_container.addClass("Zebra_Tooltip_Arrow_Top"),a.arrow.css("borderColor","transparent transparent "+b.settings.background_color)):(a.animation_offset=-Math.abs(a.animation_offset),f+=b.settings.vertical_offset),a.arrow_container.css("left",e),a.tooltip.css({left:d,top:f}),g.extend(a,{tooltip_left:d,tooltip_top:f,arrow_left:e}),a.window_resized=!1,a.window_scrolled=!1,a=g.extend(c.data("Zebra_Tooltip"),a),c.data("Zebra_Tooltip",a); return a},l=function(c){var a=c.data("Zebra_Tooltip");clearTimeout(a.hide_timeout);a.sticky||(clearTimeout(a.show_timeout),a.hide_timeout=setTimeout(function(){if(a.tooltip){if(b.settings.onBeforeHide&&"function"==typeof b.settings.onBeforeHide)b.settings.onBeforeHide(c);a.close=!1;a.destroy&&(a.muted=!0);c.data("Zebra_Tooltip",a);g("a.Zebra_Tooltip_Close",a.tooltip).remove();a.tooltip.stop();a.tooltip.animate({opacity:0,top:a.tooltip_top+a.animation_offset},b.settings.animation_speed,function(){g(this).css("display", "none");if(b.settings.onHide&&"function"==typeof b.settings.onHide)b.settings.onHide(c)})}},b.settings.hide_delay))},n=function(c){var a=c.data("Zebra_Tooltip");clearTimeout(a.show_timeout);a.muted||(clearTimeout(a.hide_timeout),a.show_timeout=setTimeout(function(){a=m(c);if(b.settings.onBeforeShow&&"function"==typeof b.settings.onBeforeShow)b.settings.onBeforeShow(c);"block"!=a.tooltip.css("display")&&a.tooltip.css({top:a.tooltip_top+a.animation_offset});a.tooltip.css("display","block");a.tooltip.stop(); a.tooltip.animate({top:a.tooltip_top,opacity:b.settings.opacity},b.settings.animation_speed,function(){if(b.settings.onShow&&"function"==typeof b.settings.onShow)b.settings.onShow(c)})},b.settings.show_delay))};b.settings=g.extend({},{animation_speed:250,animation_offset:20,background_color:"#000",close_on_click:!0,color:"#FFF",content:!1,hide_delay:100,keep_visible:!0,max_width:250,opacity:0.95,position:"center",prerender:!1,show_delay:100,vertical_offset:0,onBeforeHide:null,onHide:null,onBeforeShow:null, onShow:null},s);j.each(function(){var c=g(this);c.bind({mouseenter:function(){n(c)},mouseleave:function(){l(c)}});c.data("Zebra_Tooltip",{tooltip:null,content:c.attr("title")||"",window_resized:!0,window_scrolled:!0,show_timeout:null,hide_timeout:null,animation_offset:b.settings.animation_offset,sticky:!1,destroy:!1,muted:!1});c.attr("title","");b.settings.prerender&&m(c)});g(window).bind("scroll resize",function(b){j.each(function(){var a=g(this).data("Zebra_Tooltip");"scroll"==b.type?a.window_scrolled= !0:a.window_resized=!0;g(this).data("Zebra_Tooltip",a)})})}})(jQuery);

	function mark_disabled_navigation(output){
		if (output.change_next_to_skip == 1) {
			$('#navigation_next').html("SKIP");
			can_go_next = true;
			enable_next();
		}
		else if (!output.has_next_question){
			$('#navigation_next').html("Next");
			jQuery('#navigation_next').hide();
			$.post(ajaxurl, { action: 'lastQuestionEmail' }, function(output, is_ok) {});
			generate_report();
		} else {
			//console.log('output.delay_next: ' + output.delay_next);
			$('#navigation_next').html("Next");
			disable_next();
			if (can_go_next && output.youtube_video){
				disable_next();
				show_youtube();
			}
			else if (can_go_next && !output.delay_next){
				////console.log('can go next');
				setTimeout(function (){
					enable_next();
				}, <?php echo ($SERVER['REMOTE_ADDR'] == '83.103.200.163xx') ? '100' : get_option( 'seconds_to_next' );?> * 1000);
			} 
			if (can_go_next && output.delay_next > 0 && !output.youtube_video){
				<?php if ($_SERVER['REMOTE_ADDR'] != '83.103.200.163xx'){ ?>
					setTimeout(function (){
						enable_next();
					}, output.delay_next * 1000);
				<?php } else {?>
					//console.log('override the override');
					enable_next();
				<?php } ?>
			}

			
		}

		if (!output.has_prev_question){
			jQuery('#navigation_prev').addClass('disabled');
		} else {
			jQuery('#navigation_prev').removeClass('disabled');
		}
	}

	

	function show_youtube() {
		var player;
		player = new YT.Player('player', {
			playerVars: { 'autoplay': 0, 'controls': 0 },
			events: {
				'onReady': onPlayerReady,
				'onStateChange': onPlayerStateChange,
				'onEnded': onPlayerEnded
			},
		});

		function onPlayerEnded(event) {	

		}

		function onPlayerReady(event) {
			disable_next();
			$('#my_navigation').hide();

		}

		var done = false;
		function onPlayerStateChange(event) {

			if (event.data == YT.PlayerState.PLAYING && !done) {
				stopSpeech();
				
			}
			if (event.data == YT.PlayerState.UNSTARTED && !done) {
			}
			if (event.data == YT.PlayerState.ENDED && !done) {
				$('#my_navigation').show();
				enable_next();
			}
		}

		function stopVideo() {
			player.stopVideo();
		}
	}

	function do_drag_cross(){
		var total_ok = 0;

		jQuery(".droppable").droppable({
			accept: ".draggable",
			activeClass: "drp",
			//tolerance: 'pointer',
			drop: function(event, ui){
				//snapToMiddle(ui.draggable,jQuery(this));
				jQuery(this).addClass('highlight');
				var dragged_id = jQuery(ui.draggable).attr("id");
				dragged_html = jQuery(ui.draggable).html();
				answer = Base64.decode(jQuery(jQuery(this).html()).text());

				if (answer == dragged_html) {
					jQuery(this).html(answer);
					jQuery(this).addClass('correctDragCross');
					jQuery(ui.draggable).hide();
					total_ok++;
					if (total_ok == 4){
						//console.log('move forward');
						jQuery('#right_answer').fadeIn('fast');
						can_go_next = true;
						enable_next();
						say_correct();
					}
				} else {
					increment_errors_number();
					jQuery('#wrong_answer').fadeIn('fast');
					can_go_next = false;
					jQuery(this).html(answer);
					jQuery(this).addClass('wrongDragCross');
					jQuery(ui.draggable).hide();
					jQuery('.draggable').addClass('disabled');
					jQuery('.droppable').droppable('disable');
					say_incorrect();
				}
				//disable this box to accept other drops
				jQuery(this).droppable('option', 'disabled', true);
				jQuery("#drag_" + dragged_id).removeClass('draggable');
			}
		});
	}

	function do_drag_chain_order(){
		var total_ok = 0;

		jQuery(".droppable").droppable({
			accept: ".draggable",
			activeClass: "drp------",
			//tolerance: 'pointer',
			drop: function(event, ui){
				//snapToMiddle(ui.draggable,jQuery(this));
				jQuery(this).addClass('highlight_chain');
				var dragged_id = jQuery(ui.draggable).attr("id");
				dragged_html = jQuery(ui.draggable).html();
				answer = '<br><br><br>' + Base64.decode(jQuery(jQuery(this).html()).text());
				//console.log(answer);
				//console.log(dragged_html);
				if (answer == dragged_html) {
					jQuery(this).html(answer);
					jQuery(this).addClass('correctDragChain');
					jQuery(ui.draggable).hide();
					total_ok++;
					if (total_ok == 5){
						//console.log('move forward');
						jQuery('#right_answer').fadeIn('fast');
						can_go_next = true;
						enable_next();
						say_correct();
					}
				} else {
					increment_errors_number();
					jQuery('#wrong_answer').fadeIn('fast');
					can_go_next = false;
					jQuery(this).html(answer);
					jQuery(this).addClass('wrongDragChain');
					jQuery(ui.draggable).hide();
					jQuery('.draggable').addClass('disabled');
					jQuery('.droppable').droppable('disable');
					say_incorrect();
				}
				//disable this box to accept other drops
				jQuery(this).droppable('option', 'disabled', true);
				jQuery("#drag_" + dragged_id).removeClass('draggable');
			}
		});
	}

	function do_drag_hexagon(){
		var total_ok = 0;
		
		jQuery(".droppable").droppable({
			accept: ".draggable",
			activeClass: "drp",
			//tolerance: 'pointer',
			drop: function(event, ui){
				//snapToMiddle(ui.draggable,jQuery(this));
				jQuery(this).addClass('highlight');
				var dragged_id = jQuery(ui.draggable).attr("id");
				dragged_html = jQuery(ui.draggable).html();
				answer = Base64.decode(jQuery(jQuery(this).html()).text());

				var good_answers = answer.split("|");
				dragged_html_clean = dragged_html.replace(/(<([^>]+)>)/ig,"");
				if (good_answers.indexOf(dragged_html_clean) >=0) {
					jQuery(this).html(dragged_html);
					jQuery(this).addClass('correctDragHexagon_' + jQuery(this).attr("id"));
					jQuery(ui.draggable).hide();
					total_ok++;
					if (total_ok == 6){
						//console.log('move forward');
						jQuery('#right_answer').fadeIn('fast');
						can_go_next = true;
						enable_next();
						say_correct();
					}
				} else {
					increment_errors_number();
					jQuery('#wrong_answer').fadeIn('fast');
					can_go_next = false;
					jQuery(this).html(dragged_html);
					jQuery(this).addClass('wrongDragHexagon_' + jQuery(this).attr("id"));
					jQuery(ui.draggable).hide();
					jQuery('.draggable').addClass('disabled');
					jQuery('.droppable').droppable('disable');
					say_incorrect();
				}
				//disable this box to accept other drops
				jQuery(this).droppable('option', 'disabled', true);
				jQuery("#drag_" + dragged_id).removeClass('draggable');
			}
		});
	}

	function do_drag_pentagon(){
		var total_ok = 0;
		
		jQuery(".droppable").droppable({
			accept: ".draggable",
			activeClass: "drp",
			//tolerance: 'pointer',
			drop: function(event, ui){
				//snapToMiddle(ui.draggable,jQuery(this));
				jQuery(this).addClass('highlight');
				var dragged_id = jQuery(ui.draggable).attr("id");
				dragged_html = jQuery(ui.draggable).html();
				answer = Base64.decode(jQuery(jQuery(this).html()).text());

				var good_answers = answer.split("|");
				dragged_html_clean = dragged_html.replace(/(<([^>]+)>)/ig,"");
				if (good_answers.indexOf(dragged_html_clean) >=0) {
					jQuery(this).html(dragged_html);
					jQuery(this).addClass('correctDragPentagon_' + jQuery(this).attr("id"));
					jQuery(ui.draggable).hide();
					total_ok++;
					if (total_ok == 5){
						//console.log('move forward');
						jQuery('#right_answer').fadeIn('fast');
						can_go_next = true;
						enable_next();
						say_correct();
					}
				} else {
					increment_errors_number();
					jQuery('#wrong_answer').fadeIn('fast');
					can_go_next = false;
					jQuery(this).html(dragged_html);
					jQuery(this).addClass('wrongDragPentagon_' + jQuery(this).attr("id"));
					jQuery(ui.draggable).hide();
					jQuery('.draggable').addClass('disabled');
					jQuery('.droppable').droppable('disable');
					say_incorrect();
				}
				//disable this box to accept other drops
				jQuery(this).droppable('option', 'disabled', true);
				jQuery("#drag_" + dragged_id).removeClass('draggable');
			}
		});
	}

	function do_drag_pyramid(){
		var total_ok = 0;
		
		jQuery(".droppable").droppable({
			accept: ".draggable",
			activeClass: "drp",
			//tolerance: 'pointer',
			drop: function(event, ui){
				//snapToMiddle(ui.draggable,jQuery(this));
				jQuery(this).addClass('highlight');
				var dragged_id = jQuery(ui.draggable).attr("id");
				dragged_html = jQuery(ui.draggable).html();
				answer = Base64.decode(jQuery(jQuery(this).html()).text());

				var good_answers = answer.split("|");
				dragged_html_clean = dragged_html.replace(/(<([^>]+)>)/ig,"");
				if (good_answers.indexOf(dragged_html_clean) >=0) {
					jQuery(this).html(dragged_html);
					jQuery(this).addClass('correctDragPyramid_' + jQuery(this).attr("id"));
					jQuery(ui.draggable).hide();
					total_ok++;
					if (total_ok == 4){
						//console.log('move forward');
						jQuery('#right_answer').fadeIn('fast');
						can_go_next = true;
						enable_next();
						say_correct();
					}
				} else {
					increment_errors_number();
					jQuery('#wrong_answer').fadeIn('fast');
					can_go_next = false;
					jQuery(this).html(dragged_html);
					jQuery(this).addClass('wrongDragPyramid_' + jQuery(this).attr("id"));
					jQuery(ui.draggable).hide();
					jQuery('.draggable').addClass('disabled');
					jQuery('.droppable').droppable('disable');
					say_incorrect();
				}
				//disable this box to accept other drops
				jQuery(this).droppable('option', 'disabled', true);
				jQuery("#drag_" + dragged_id).removeClass('draggable');
			}
		});
	}

	function snapToMiddle(dragger, target){
	    var topMove = target.position().top - dragger.data('position').top + (target.outerHeight(true) - dragger.outerHeight(true)) / 2;
	    var leftMove= target.position().left - dragger.data('position').left + (target.outerWidth(true) - dragger.outerWidth(true)) / 2;
	    dragger.animate({top:topMove,left:leftMove},{duration:600,easing:'easeOutBack'});
	}
	
	

	function generate_report(){
		$.post(ajaxurl, { action: 'generateReport' }, function(output, is_ok) {
		});
	}

	function initiate_report(){
		$.post(ajaxurl, { action: 'initiateReport' }, function(output, is_ok) {
		});
	}

	function enable_next(){
		jQuery('#navigation_next').show();
		jQuery('#navigation_next').removeClass('disabled');
	}

	function disable_next(){
		jQuery('#navigation_next').addClass('disabled');
	}	

	function hide_next(){
		jQuery('#navigation_next').hide();
	}

	document.onkeydown = checkKeycode
    function checkKeycode(e) {
        var keycode;
        if (window.event)
            keycode = window.event.keyCode;
        else if (e)
            keycode = e.which;

        // Mozilla firefox
        if (jQuery.browser.mozilla) {
            if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
                if (e.preventDefault)
                {
                    e.preventDefault();
                    e.stopPropagation();
                }
            }
        } 
        // IE
        else if (jQuery.browser.msie) {
            if (keycode == 116 || (window.event.ctrlKey && keycode == 82)) {
                window.event.returnValue = false;
                window.event.keyCode = 0;
                window.status = "Refresh is disabled";
            }
        }
    }


//});


/* ******** ******** *************** */
/* ******** ******** *************** */
/* ******** ******** *************** */
/* ******** ******** *************** */

<?php  if ($user_avatar_type == 'No Avatar'){ ?>
	//no avator
	
	var last_question = <?php echo $last_question; ?>;
	show_page_after_scene_is_loaded(last_question);

<?php } else { ?>

$('#my_navigation').hide();
function vh_sceneLoaded(){
	$('#my_navigation').hide();
	var last_question = <?php echo $last_question;?>;
	show_page_after_scene_is_loaded(last_question);


}

function vh_talkStarted(){
	$('#my_navigation').hide();
}

function vh_talkEnded(){
	$('#my_navigation').show();
	$('iframe#player').show();
}

$(document).on('click', '#navigation_prev', function(e){
	$('#my_navigation').hide();
});

$(document).on('click', '#navigation_next', function(e){
	$('#my_navigation').hide();
});

<?php } ?>
/* ******** ******** *************** */
/* ******** ******** *************** */
/* ******** ******** *************** */
/* ******** ******** *************** */



/*function vh_sceneLoaded(){
	var last_question = <?php echo $last_question;?>;
	//var last_question = 9;
	console.log('hey! scene is loaded!');
	show_page_after_scene_is_loaded(last_question);
	<?php if ($_SERVER['REMOTE_ADDR'] != '83.103.200.163' || 1==1){?>
	$.post(ajaxurl, { action: 'getQuestionAvatarText', last_question: last_question }, function(output, is_ok) {
		if (output && 1==2){
			output = output.replace("\\/", "/");
			console.log('2. avatar text: ' + output);
			//return false;
			jQuery('#avatar_holder').show();
			//console.log('Saying...');
			stopSpeech();
			sayText(output,<?php echo $uat_voice;?>,<?php echo $uat_lang;?>,2);	
		}
	});

	<?php } ?>
	
}*/


</script>
<script type="text/javascript">
$(document).ready(function() {
	var width = $(this).width();
	////console.log('width: ' + width);
	$.each($('.my_tooltip'), function($key, value){
		var location = $(this).offset();
		var top = location.top;
	    var left = location.left;
	    
	    left = left - $('span').width();
	    //console.log('initial: ' + left);
	    if (left < -100) {
	    	left = left + 100;
	    	$(this).find("span").css({
		        'margin-left': left + 'px'
		    });
	    } else {
	    	var x = left + $('span').width();
	    	var y = width - $('span').width();
	    	//console.log('hmm.. ' + x); 
		   	if ( x > y) {
		    	left = left - 340;
		    	$(this).find("span").css({
			        'margin-left': left + 'px'
			    });
		    }
		}

	    //console.log('aftrr: ' + left);
	});
    

    
});
</script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.ui.touch-punch.min.js"></script> 
<?php get_footer('questions'); ?>