<?php
if (!defined('ABSPATH')) exit('No direct script access allowed');

 /**
 * CodeNegar Content Tooltip functions
 *
 * Content Tooltip Metabox options
 *
 * @package    	WordPress Content Tooltip
 * @author      Farhad Ahmadi <ahm.farhad@gmail.com>
 * @license     http://codecanyon.net/licenses
 * @link		http://codenegar.com/wordpress-content-tooltip-plugin/
 * @version    	2.3
 */

add_filter( 'cmb_meta_boxes', 'codeNegar_ctt_metaboxes' );

/**
 * Define the metabox and field configurations.
 * @param  array $meta_boxes
 * @return array
 */
 
function codeNegar_ctt_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cnctt_'; // CodeNegar content tooltip
	global $codeNegar_ctt;
	$defaults = $codeNegar_ctt->helper->default_options();
	$meta_boxes[] = array(
		'id'         => 'content_tooltip_options',
		'title'      => __('General', $codeNegar_ctt->text_domain),
		'pages'      => array( 'content_tooltip' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __('Title Text', $codeNegar_ctt->text_domain),
				'desc' => __('Title for tooltip.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'title'],
				'id'   => $prefix . 'title',
				'type' => 'text'
			),
			array(
				'name'    => __('Data Source', $codeNegar_ctt->text_domain),
				'desc'    => 'Select how HoverCard data is gotten.',
				'std' => $defaults[$prefix . 'data_src'],
				'id'      => $prefix . 'data_src',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('HTML Content', $codeNegar_ctt->text_domain), 'value' => 'html' ),
					array( 'name' => __('Remote URL', $codeNegar_ctt->text_domain), 'value' => 'url' ),
					array( 'name' => __('oEmbed', $codeNegar_ctt->text_domain), 'value' => 'oembed' ),
					array( 'name' => __('HTML + URL', $codeNegar_ctt->text_domain), 'value' => 'html_url' ),
					array( 'name' => __('HTML + oEmbed', $codeNegar_ctt->text_domain), 'value' => 'html_oembed' )
				),
			),
			array(
				'name'    => __('Element Type', $codeNegar_ctt->text_domain),
				'desc'    => 'Select how title appears as a HTML element.',
				'std' => $defaults[$prefix . 'element_type'],
				'id'      => $prefix . 'element_type',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('Span', $codeNegar_ctt->text_domain), 'value' => 'span' ),
					array( 'name' => __('Link', $codeNegar_ctt->text_domain), 'value' => 'a' ),
					array( 'name' => __('Label', $codeNegar_ctt->text_domain), 'value' => 'label' ),
					array( 'name' => __('Div', $codeNegar_ctt->text_domain), 'value' => 'div' ),
					array( 'name' => __('Image', $codeNegar_ctt->text_domain), 'value' => 'img' ),
					array( 'name' => __('Link Image', $codeNegar_ctt->text_domain), 'value' => 'link_img' ),
					array( 'name' => __('Print HTML', $codeNegar_ctt->text_domain), 'value' => 'print_html' ) // Prints contents with no hover action and styling
				),
			),
			array(
				'name'    => __('Theme', $codeNegar_ctt->text_domain),
				'desc'    => 'Select the design of tooltip',
				'std' => $defaults[$prefix . 'theme'],
				'id'      => $prefix . 'theme',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('White', $codeNegar_ctt->text_domain), 'value' => 'white'),
					array( 'name' => __('Transparent White', $codeNegar_ctt->text_domain), 'value' => 'white whiteTransparent'),
					array( 'name' => __('White Fat Shadow', $codeNegar_ctt->text_domain), 'value' => 'white fatShadow'),
					array( 'name' => __('Transparent White Fat Shadow', $codeNegar_ctt->text_domain), 'value' => 'white whiteTransparent fatShadow'),
					array( 'name' => __('Black', $codeNegar_ctt->text_domain), 'value' => 'black'),
					array( 'name' => __('Black Fat Shadow', $codeNegar_ctt->text_domain), 'value' => 'black fatShadow'),
					array( 'name' => __('Blue', $codeNegar_ctt->text_domain), 'value' => 'blue'),
					array( 'name' => __('Blue Fat Shadow', $codeNegar_ctt->text_domain), 'value' => 'blue fatShadow'),
					array( 'name' => __('Orange', $codeNegar_ctt->text_domain), 'value' => 'orange'),
					array( 'name' => __('Orange Fat Shadow', $codeNegar_ctt->text_domain), 'value' => 'orange fatShadow'),
					array( 'name' => __('Dark', $codeNegar_ctt->text_domain), 'value' => 'default'),
					array( 'name' => __('Dark Fat Shadow', $codeNegar_ctt->text_domain), 'value' => 'default fatShadow')
				),
			),
			array(
				'name' => __('Title Image', $codeNegar_ctt->text_domain),
				'desc' => __('If you have selected image element type above, here you should set its image.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'title_image'],
				'id'   => $prefix . 'title_image',
				'type' => 'file'
			),
			array(
				'name' => __('Link Location', $codeNegar_ctt->text_domain),
				'desc' => __('If you have selected <b>Link</b> element type, you can enter a location to go on click event.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'href'],
				'id'   => $prefix . 'href',
				'type' => 'text',
			)
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'content_tooltip_layout',
		'title'      => __('Layout', $codeNegar_ctt->text_domain),
		'pages'      => array( 'content_tooltip' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Min Width', $codeNegar_ctt->text_domain),
				'desc' => __('Enter the minimum width of tooltip (px)', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'min_width'],
				'id'   => $prefix . 'min_width',
				'type' => 'text_medium'
			),
			array(
				'name' => __('Max Width', $codeNegar_ctt->text_domain),
				'desc' => __('Enter the maximum width of tooltip (px)', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'max_width'],
				'id'   => $prefix . 'max_width',
				'type' => 'text_medium'
			),
			array(
				'name'    => __('Preferred Position', $codeNegar_ctt->text_domain),
				'desc'    => 'You can set a preferred Position for the tooltip',
				'std' => $defaults[$prefix . 'preferredPosition'],
				'id'      => $prefix . 'preferredPosition',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('Top', $codeNegar_ctt->text_domain), 'value' => 'top' ),
					array( 'name' => __('Bottom', $codeNegar_ctt->text_domain), 'value' => 'bottom' ),
					array( 'name' => __('Left', $codeNegar_ctt->text_domain), 'value' => 'left' ),
					array( 'name' => __('Right', $codeNegar_ctt->text_domain), 'value' => 'right' ),
				),
			),
			array(
				'name' => __('Popup Horizontal offset', $codeNegar_ctt->text_domain),
				'desc' => __('Horizontal offset for the popup from the center of the trigger when the popup is aligned left or right.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'popupOffset'],
				'id'   => $prefix . 'popupOffset',
				'type' => 'text_small'
			),
			array(
				'name' => __('Popup Vertical Offset', $codeNegar_ctt->text_domain),
				'desc' => __('Vertical offset for the popup.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'popupYOffset'],
				'id'   => $prefix . 'popupYOffset',
				'type' => 'text_small'
			),
			array(
				'name' => __('Popup Distance', $codeNegar_ctt->text_domain),
				'desc' => __('Vertical distance when the popup appears and disappears.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'popupDistance'],
				'id'   => $prefix . 'popupDistance',
				'type' => 'text_small'
			),
			array(
				'name' => __('Display Inline', $codeNegar_ctt->text_domain),
				'desc' => __('Override WordPress behaviour and makes tooltip title to display inline', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'display_inline'],
				'id'   => $prefix . 'display_inline',
				'type' => 'checkbox'
			),
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'content_tooltip_advanced_options',
		'title'      => __('Advanced', $codeNegar_ctt->text_domain),
		'pages'      => array( 'content_tooltip' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Custom CSS Class', $codeNegar_ctt->text_domain),
				'desc' => __('Enter one or more CSS class to add to title element.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'css_class'],
				'id'   => $prefix . 'css_class',
				'type' => 'text'
			),
			array(
				'name' => __('Hide On Popup Click', $codeNegar_ctt->text_domain),
				'desc' => __('Hide tooltip when it is clicked.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'hideOnPopupClick'],
				'id'   => $prefix . 'hideOnPopupClick',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Hide On Trigger Click', $codeNegar_ctt->text_domain),
				'desc' => __('Hide tooltip when the trigger is clicked.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'hideOnTriggerClick'],
				'id'   => $prefix . 'hideOnTriggerClick',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Hide Trigger', $codeNegar_ctt->text_domain),
				'desc' => __('Hide the trigger when the popup is shown.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'hideTrigger'],
				'id'   => $prefix . 'hideTrigger',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Trigger On Click', $codeNegar_ctt->text_domain),
				'desc' => __('Disables the hover event for triggers and tooltip will be activated by clicking the trigger. A second click will trigger the default action on the trigger. I.e. open a link.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'triggerOnClick'],
				'id'   => $prefix . 'triggerOnClick',
				'type' => 'checkbox'
			),
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'content_tooltip_animation',
		'title'      => __('Animation', $codeNegar_ctt->text_domain),
		'pages'      => array( 'content_tooltip' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name'    => __('Easing', $codeNegar_ctt->text_domain),
				'desc'    => 'jQuery Easing for the animations. <br/> Check demo at <a href="http://gsgd.co.uk/sandbox/jquery/easing/">http://gsgd.co.uk/sandbox/jquery/easing/</a>',
				'std' => $defaults[$prefix . 'funcEase'],
				'id'      => $prefix . 'funcEase',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('jswing', $codeNegar_ctt->text_domain), 'value' => 'jswing' ),
					array( 'name' => __('easeInQuad', $codeNegar_ctt->text_domain), 'value' => 'easeInQuad' ),
					array( 'name' => __('easeOutQuad', $codeNegar_ctt->text_domain), 'value' => 'easeOutQuad' ),
					array( 'name' => __('easeInOutQuad', $codeNegar_ctt->text_domain), 'value' => 'easeInOutQuad' ),
					array( 'name' => __('easeInCubic', $codeNegar_ctt->text_domain), 'value' => 'easeInCubic' ),
					array( 'name' => __('easeOutCubic', $codeNegar_ctt->text_domain), 'value' => 'easeOutCubic' ),
					array( 'name' => __('easeInOutCubic', $codeNegar_ctt->text_domain), 'value' => 'easeInOutCubic' ),
					array( 'name' => __('easeInQuart', $codeNegar_ctt->text_domain), 'value' => 'easeInQuart' ),
					array( 'name' => __('easeOutQuart', $codeNegar_ctt->text_domain), 'value' => 'easeOutQuart' ),
					array( 'name' => __('easeInOutQuart', $codeNegar_ctt->text_domain), 'value' => 'easeInOutQuart' ),
					array( 'name' => __('easeInQuint', $codeNegar_ctt->text_domain), 'value' => 'easeInQuint' ),
					array( 'name' => __('easeOutQuint', $codeNegar_ctt->text_domain), 'value' => 'easeOutQuint' ),
					array( 'name' => __('easeInOutQuint', $codeNegar_ctt->text_domain), 'value' => 'easeInOutQuint' ),
					array( 'name' => __('easeInSine', $codeNegar_ctt->text_domain), 'value' => 'easeInSine' ),
					array( 'name' => __('easeOutSine', $codeNegar_ctt->text_domain), 'value' => 'easeOutSine' ),
					array( 'name' => __('easeInOutSine', $codeNegar_ctt->text_domain), 'value' => 'easeInOutSine' ),
					array( 'name' => __('easeInExpo', $codeNegar_ctt->text_domain), 'value' => 'easeInExpo' ),
					array( 'name' => __('easeOutExpo', $codeNegar_ctt->text_domain), 'value' => 'easeOutExpo' ),
					array( 'name' => __('easeInOutExpo', $codeNegar_ctt->text_domain), 'value' => 'easeInOutExpo' ),
					array( 'name' => __('easeInCirc', $codeNegar_ctt->text_domain), 'value' => 'easeInCirc' ),
					array( 'name' => __('easeOutCirc', $codeNegar_ctt->text_domain), 'value' => 'easeOutCirc' ),
					array( 'name' => __('easeInOutCirc', $codeNegar_ctt->text_domain), 'value' => 'easeInOutCirc' ),
					array( 'name' => __('easeInElastic', $codeNegar_ctt->text_domain), 'value' => 'easeInElastic' ),
					array( 'name' => __('easeOutElastic', $codeNegar_ctt->text_domain), 'value' => 'easeOutElastic' ),
					array( 'name' => __('easeInOutElastic', $codeNegar_ctt->text_domain), 'value' => 'easeInOutElastic' ),
					array( 'name' => __('easeInBack', $codeNegar_ctt->text_domain), 'value' => 'easeInBack' ),
					array( 'name' => __('easeOutBack', $codeNegar_ctt->text_domain), 'value' => 'easeOutBack' ),
					array( 'name' => __('easeInOutBack', $codeNegar_ctt->text_domain), 'value' => 'easeInOutBack' ),
					array( 'name' => __('easeInBounce', $codeNegar_ctt->text_domain), 'value' => 'easeInBounce' ),
					array( 'name' => __('easeOutBounce', $codeNegar_ctt->text_domain), 'value' => 'easeOutBounce' ),
					array( 'name' => __('easeInOutBounce', $codeNegar_ctt->text_domain), 'value' => 'easeInOutBounce' )
				),
			),
			array(
				'name' => __('Animation Speed', $codeNegar_ctt->text_domain),
				'desc' => __('How much time the popup needs to reach it\'s final animation position and opacity in milliseconds.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'animation_speed'],
				'id'   => $prefix . 'animation_speed',
				'type' => 'text_small'
			),
			array(
				'name' => __('Remove Delay', $codeNegar_ctt->text_domain),
				'desc' => __('How much time the popup needs to clean up from document.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'remove_delay'],
				'id'   => $prefix . 'remove_delay',
				'type' => 'text_small'
			),
			array(
				'name' => __('Enable CSS Animations', $codeNegar_ctt->text_domain),
				'desc' => __('<br/>These effects will only work in modern browsers if the browser doesn\'t support css animations the jQuery animations will be used as fallback. <br/> Check demo at <a href="http://daneden.me/animate/">http://daneden.me/animate/</a>.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'enable_css_animations'],
				'id'   => $prefix . 'enable_css_animations',
				'type' => 'checkbox'
			),
			array(
				'name'    => __('Show CSS Animation', $codeNegar_ctt->text_domain),
				'desc'    => 'Animation for showing tooltip.',
				'std' => $defaults[$prefix . 'show_css_animation'],
				'id'      => $prefix . 'show_css_animation',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('--- Attention seekers ---', $codeNegar_ctt->text_domain), 'value' => 'flash' ),
					array( 'name' => __('flash', $codeNegar_ctt->text_domain), 'value' => 'flash' ),
					array( 'name' => __('bounce', $codeNegar_ctt->text_domain), 'value' => 'bounce' ),
					array( 'name' => __('shake', $codeNegar_ctt->text_domain), 'value' => 'shake' ),
					array( 'name' => __('tada', $codeNegar_ctt->text_domain), 'value' => 'tada' ),
					array( 'name' => __('swing', $codeNegar_ctt->text_domain), 'value' => 'swing' ),
					array( 'name' => __('wobble', $codeNegar_ctt->text_domain), 'value' => 'wobble' ),
					array( 'name' => __('wiggle', $codeNegar_ctt->text_domain), 'value' => 'wiggle' ),
					array( 'name' => __('pulse', $codeNegar_ctt->text_domain), 'value' => 'pulse' ),
					array( 'name' => __('--- Flippers ---', $codeNegar_ctt->text_domain), 'value' => 'flip' ),
					array( 'name' => __('flip', $codeNegar_ctt->text_domain), 'value' => 'flip' ),
					array( 'name' => __('flipInX', $codeNegar_ctt->text_domain), 'value' => 'flipInX' ),
					array( 'name' => __('flipInY', $codeNegar_ctt->text_domain), 'value' => 'flipInY' ),
					array( 'name' => __('--- Fading ---', $codeNegar_ctt->text_domain), 'value' => 'fadeIn' ),
					array( 'name' => __('fadeIn', $codeNegar_ctt->text_domain), 'value' => 'fadeIn' ),
					array( 'name' => __('fadeInUp', $codeNegar_ctt->text_domain), 'value' => 'fadeInUp' ),
					array( 'name' => __('fadeInDown', $codeNegar_ctt->text_domain), 'value' => 'fadeInDown' ),
					array( 'name' => __('fadeInLeft', $codeNegar_ctt->text_domain), 'value' => 'fadeInLeft' ),
					array( 'name' => __('fadeInRight', $codeNegar_ctt->text_domain), 'value' => 'fadeInRight' ),
					array( 'name' => __('fadeInUpBig', $codeNegar_ctt->text_domain), 'value' => 'fadeInUpBig' ),
					array( 'name' => __('fadeInDownBig', $codeNegar_ctt->text_domain), 'value' => 'fadeInDownBig' ),
					array( 'name' => __('fadeInLeftBig', $codeNegar_ctt->text_domain), 'value' => 'fadeInLeftBig' ),
					array( 'name' => __('fadeInRightBig', $codeNegar_ctt->text_domain), 'value' => 'fadeInRightBig' ),
					array( 'name' => __('--- Bouncing ---', $codeNegar_ctt->text_domain), 'value' => 'bounceIn' ),
					array( 'name' => __('bounceIn', $codeNegar_ctt->text_domain), 'value' => 'bounceIn' ),
					array( 'name' => __('bounceInDown', $codeNegar_ctt->text_domain), 'value' => 'bounceInDown' ),
					array( 'name' => __('bounceInUp', $codeNegar_ctt->text_domain), 'value' => 'bounceInUp' ),
					array( 'name' => __('bounceInLeft', $codeNegar_ctt->text_domain), 'value' => 'bounceInLeft' ),
					array( 'name' => __('bounceInRight', $codeNegar_ctt->text_domain), 'value' => 'bounceInRight' ),
					array( 'name' => __('--- Rotating ---', $codeNegar_ctt->text_domain), 'value' => 'rotateIn' ),
					array( 'name' => __('rotateIn', $codeNegar_ctt->text_domain), 'value' => 'rotateIn' ),
					array( 'name' => __('rotateInDownLeft', $codeNegar_ctt->text_domain), 'value' => 'rotateInDownLeft' ),
					array( 'name' => __('rotateInDownRight', $codeNegar_ctt->text_domain), 'value' => 'rotateInDownRight' ),
					array( 'name' => __('rotateInUpLeft', $codeNegar_ctt->text_domain), 'value' => 'rotateInUpLeft' ),
					array( 'name' => __('rotateInUpRight', $codeNegar_ctt->text_domain), 'value' => 'rotateInUpRight' ),
					array( 'name' => __('--- Other ---', $codeNegar_ctt->text_domain), 'value' => 'lightSpeedIn' ),
					array( 'name' => __('lightSpeedIn', $codeNegar_ctt->text_domain), 'value' => 'lightSpeedIn' ),
					array( 'name' => __('rollIn', $codeNegar_ctt->text_domain), 'value' => 'rollIn' ),
				),
			),
			array(
				'name'    => __('Hide CSS Animation', $codeNegar_ctt->text_domain),
				'desc'    => 'Animation for hiding tooltip.',
				'std' => $defaults[$prefix . 'hide_css_animation'],
				'id'      => $prefix . 'hide_css_animation',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __('--- Attention seekers ---', $codeNegar_ctt->text_domain), 'value' => 'flash' ),
					array( 'name' => __('flash', $codeNegar_ctt->text_domain), 'value' => 'flash' ),
					array( 'name' => __('bounce', $codeNegar_ctt->text_domain), 'value' => 'bounce' ),
					array( 'name' => __('shake', $codeNegar_ctt->text_domain), 'value' => 'shake' ),
					array( 'name' => __('tada', $codeNegar_ctt->text_domain), 'value' => 'tada' ),
					array( 'name' => __('swing', $codeNegar_ctt->text_domain), 'value' => 'swing' ),
					array( 'name' => __('wobble', $codeNegar_ctt->text_domain), 'value' => 'wobble' ),
					array( 'name' => __('wiggle', $codeNegar_ctt->text_domain), 'value' => 'wiggle' ),
					array( 'name' => __('pulse', $codeNegar_ctt->text_domain), 'value' => 'pulse' ),
					array( 'name' => __('--- Flippers ---', $codeNegar_ctt->text_domain), 'value' => 'flip' ),
					array( 'name' => __('flip', $codeNegar_ctt->text_domain), 'value' => 'flip' ),
					array( 'name' => __('flipOutX', $codeNegar_ctt->text_domain), 'value' => 'flipOutX' ),
					array( 'name' => __('flipOutY', $codeNegar_ctt->text_domain), 'value' => 'flipOutY' ),
					array( 'name' => __('--- Fading ---', $codeNegar_ctt->text_domain), 'value' => 'fadeOut' ),
					array( 'name' => __('fadeOut', $codeNegar_ctt->text_domain), 'value' => 'fadeOut' ),
					array( 'name' => __('fadeOutUp', $codeNegar_ctt->text_domain), 'value' => 'fadeOutUp' ),
					array( 'name' => __('fadeOutDown', $codeNegar_ctt->text_domain), 'value' => 'fadeOutDown' ),
					array( 'name' => __('fadeOutLeft', $codeNegar_ctt->text_domain), 'value' => 'fadeOutLeft' ),
					array( 'name' => __('fadeOutRight', $codeNegar_ctt->text_domain), 'value' => 'fadeOutRight' ),
					array( 'name' => __('fadeOutUpBig', $codeNegar_ctt->text_domain), 'value' => 'fadeOutUpBig' ),
					array( 'name' => __('fadeOutDownBig', $codeNegar_ctt->text_domain), 'value' => 'fadeOutDownBig' ),
					array( 'name' => __('fadeOutLeftBig', $codeNegar_ctt->text_domain), 'value' => 'fadeOutLeftBig' ),
					array( 'name' => __('fadeOutRightBig', $codeNegar_ctt->text_domain), 'value' => 'fadeOutRightBig' ),
					array( 'name' => __('--- Bouncing ---', $codeNegar_ctt->text_domain), 'value' => 'bounceOut' ),
					array( 'name' => __('bounceOut', $codeNegar_ctt->text_domain), 'value' => 'bounceOut' ),
					array( 'name' => __('bounceOutDown', $codeNegar_ctt->text_domain), 'value' => 'bounceOutDown' ),
					array( 'name' => __('bounceOutUp', $codeNegar_ctt->text_domain), 'value' => 'bounceOutUp' ),
					array( 'name' => __('bounceOutLeft', $codeNegar_ctt->text_domain), 'value' => 'bounceOutLeft' ),
					array( 'name' => __('bounceOutRight', $codeNegar_ctt->text_domain), 'value' => 'bounceOutRight' ),
					array( 'name' => __('--- Rotating ---', $codeNegar_ctt->text_domain), 'value' => 'rotateOut' ),
					array( 'name' => __('rotateOut', $codeNegar_ctt->text_domain), 'value' => 'rotateOut' ),
					array( 'name' => __('rotateOutDownLeft', $codeNegar_ctt->text_domain), 'value' => 'rotateOutDownLeft' ),
					array( 'name' => __('rotateOutDownRight', $codeNegar_ctt->text_domain), 'value' => 'rotateOutDownRight' ),
					array( 'name' => __('rotateOutUpLeft', $codeNegar_ctt->text_domain), 'value' => 'rotateOutUpLeft' ),
					array( 'name' => __('rotateOutUpRight', $codeNegar_ctt->text_domain), 'value' => 'rotateOutUpRight' ),
					array( 'name' => __('--- Other ---', $codeNegar_ctt->text_domain), 'value' => 'lightSpeedOut' ),
					array( 'name' => __('lightSpeedOut', $codeNegar_ctt->text_domain), 'value' => 'lightSpeedOut' ),
					array( 'name' => __('rollOut', $codeNegar_ctt->text_domain), 'value' => 'rollOut' ),
					array( 'name' => __('hinge', $codeNegar_ctt->text_domain), 'value' => 'hinge' ),
				),
			),
			array(
				'name' => __('Invert Animation', $codeNegar_ctt->text_domain),
				'desc' => __('The popup will move up when an element is hovered and further up when fading out. If you set this to true, the popup will move down when fading out.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'invertAnimation'],
				'id'   => $prefix . 'invertAnimation',
				'type' => 'checkbox'
			),
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'content_tooltip_oembed',
		'title'      => __('Auto Embed', $codeNegar_ctt->text_domain),
		'pages'      => array( 'content_tooltip' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Embed URL', $codeNegar_ctt->text_domain),
				'desc' => __('Enter a youtube, twitter, or instagram URL,... Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'oembed'],
				'id'   => $prefix . 'oembed',
				'type' => 'oembed'
			),
			array(
				'name' => __('Height', $codeNegar_ctt->text_domain),
				'desc' => __('Set the maximum height of embed contents.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'embed_height'],
				'id'   => $prefix . 'embed_height',
				'type' => 'text_small'
			),
			array(
				'name' => __('Width', $codeNegar_ctt->text_domain),
				'desc' => __('Set the maximum width of embed contents.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'embed_width'],
				'id'   => $prefix . 'embed_width',
				'type' => 'text_small'
			),
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'content_tooltip_data_source',
		'title'      => __('Remote Data', $codeNegar_ctt->text_domain),
		'pages'      => array( 'content_tooltip' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Cache Duration', $codeNegar_ctt->text_domain),
				'desc' => __('Enter minutes to cache remote URL results.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'cache_duration'],
				'id'   => $prefix . 'cache_duration',
				'type' => 'text_small'
			),
			array(
				'name' => __('Remote URL', $codeNegar_ctt->text_domain),
				'desc' => __('Enter a URL so HoverCard loads contents each time page loads.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'url'],
				'id'   => $prefix . 'url',
				'type' => 'text'
			)
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'content_tooltip_expiration',
		'title'      => __('Expiration', $codeNegar_ctt->text_domain),
		'pages'      => array( 'content_tooltip' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Enable Expiration', $codeNegar_ctt->text_domain),
				'desc' => __('You can schedule this tooltip to automatically disappear from users view on certain date/time.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'enable_expiration'],
				'id'   => $prefix . 'enable_expiration',
				'type' => 'checkbox'
			),
			array(
				'name' => __('Expire Date/Time', $codeNegar_ctt->text_domain),
				'desc' => __('<br/>Select when to disappear tooltip from users view. HoverCard still remains at WordPress admin and you can edit or extend it.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'expire_timestamp'],
				'id'   => $prefix . 'expire_timestamp',
				'type' => 'text_datetime_timestamp',
			),
			array(
				'name' => __('After Expiration title', $codeNegar_ctt->text_domain),
				'desc' => __('Enter some text to display when tooltip is expired. If you don\'t want to display anything, leave this blank.', $codeNegar_ctt->text_domain),
				'std' => $defaults[$prefix . 'expire_text'],
				'id'   => $prefix . 'expire_text',
				'type' => 'text',
			)
		)
	);

	return $meta_boxes;
}

add_action( 'init', 'cn_ctt_cmb_initialize_cmb_meta_boxes', 9999 );

/**
 * Initialize the metabox class.
 */
 
function cn_ctt_cmb_initialize_cmb_meta_boxes() {
	global $codeNegar_ctt;
	if ( !class_exists( 'cmb_Meta_Box' ) )
		require_once $codeNegar_ctt->path . 'metabox/init.php';

}