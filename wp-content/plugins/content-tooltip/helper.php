<?php
if (!defined('ABSPATH')) exit('No direct script access allowed');

 /**
 * CodeNegar Content Tooltip functions
 *
 * Content Tooltip Helper Class
 *
 * @package    	WordPress Content Tooltip
 * @author      Farhad Ahmadi <ahm.farhad@gmail.com>
 * @license     http://codecanyon.net/licenses
 * @link		http://codenegar.com/wordpress-content-tooltip-plugin/
 * @version    	2.0.5
 */
 
class CodeNegar_ctt_helper{
	
	function __construct(){
		
	}
	
	/**
	* Converts string to int and makes sure string parameters are safe
	* @param string/int/array $input, user input value
	* @param boolean $is_int, force convert to int 
	* @return string/int safe parameter
	*/
	
	public function prepare_parameter($input, $is_int=false){
	
		if(is_array($input)){
			foreach($input as $key=>$value){
				if($is_int){
					$input[$key] = intval($value);
				}else{
					$input[$key] = trim(stripslashes(strip_tags($value)));
				}
			}
		}else{
			if($is_int){
				$input = intval($input);
			}else{
				$input = trim(stripslashes(strip_tags($input)));
			}
		}
		return $input;
	}
	
	/**
	* Return limit length of a Wordpress post
	* @param int $limit, number of maximum characters to return
	* @return string limited character of current wordpress post
	*/
	
	public function limit_str($str, $limit=100) {
        $str = trim(strip_tags($str));
		$str = strip_shortcodes($str);
		$excerpt = mb_substr($str,0,$limit);
		if (strlen($excerpt)<strlen($str)) {
			$excerpt .= '...';
		}
		return $excerpt;
	}
	
	
	/**
	* Converts stdClass to array
	* @return array of input
	*/
	
	public function object_to_array($input){
		if (is_object($input)) {
			$input = get_object_vars($input);
		}
		if (is_array($input)) {
			return array_map(array(&$this, 'object_to_array'), $input);
		}
		else {
			return $input;
		}
	}
	
	/**
	* Converts array to stdClass
	* @return stdClass of input
	*/
	
	public function array_to_object($input){
		if (is_array($input)) {
			return (object) array_map(array(&$this, 'array_to_object'), $input);
		}
		else {
			return $input;
		}
	}
	
	/**
	* Content Tooltip default options
	* @return array of default options
	*/
	
	public function default_options(){
		$prefix = '_cnctt_';
		$defaults = array(
			$prefix . 'title' => '',
			$prefix . 'data_src' => 'html',
			$prefix . 'element_type' => 'span',
			$prefix . 'theme' => 'white',
			$prefix . 'preferredPosition' => 'top',
			$prefix . 'min_width' => '20',
			$prefix . 'max_width' => '600',
			$prefix . 'title_image' => '',
			$prefix . 'href' => '#!',
			$prefix . 'css_class' => '',
			$prefix . 'cache_duration' => 5,
			$prefix . 'oembed' => '',
			$prefix . 'embed_height' => 460,
			$prefix . 'embed_width' => 400,
			$prefix . 'url' => '',
			$prefix . 'enable_expiration' => '',
			$prefix . 'expire_timestamp' => '',
			$prefix . 'expire_text' => '',
			$prefix . 'funcEase' => 'easeInOutQuad',
			$prefix . 'animation_speed' => 200,
			$prefix . 'remove_delay' => 2000,
			$prefix . 'enable_css_animations' => '',
			$prefix . 'show_css_animation' => 'fadeIn',
			$prefix . 'hide_css_animation' => 'fadeOut',
			$prefix . 'popupYOffset' => 0,
			$prefix . 'hideOnPopupClick' => '',
			$prefix . 'hideOnTriggerClick' => '',
			$prefix . 'hideTrigger' => '',
			$prefix . 'triggerOnClick' => '',
			$prefix . 'invertAnimation' => '',
			$prefix . 'popupDistance' => 20,
			$prefix . 'popupOffset' => 31,
			$prefix . 'display_inline' => ''
		);
		return $defaults;
	}
	
	public function clean_meta($post_custom){
		$return = array();
		foreach($post_custom as $key=>$val){
			$return[$key] = $val[0];
		}
		return $return;
	}

	public function post_update_messages( $messages ) {
	  global $post, $post_ID, $codeNegar_ctt;

	  $messages['content_tooltip'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Tooltip saved. Shortcode: %s', $codeNegar_ctt->text_domain), '[content_tooltip id="' . $post_ID . '"]'),
		2 => __('Custom field updated.', $codeNegar_ctt->text_domain),
		3 => __('Custom field deleted.', $codeNegar_ctt->text_domain),
		4 => __('Tooltip updated.', $codeNegar_ctt->text_domain),
		5 => isset($_GET['revision']) ? sprintf( __('Tooltip restored to revision from %s', $codeNegar_ctt->text_domain), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Tooltip saved. Shortcode: %s', $codeNegar_ctt->text_domain), '[content_tooltip id="' . $post_ID . '"]'),
		7 => __('Tooltip saved.', $codeNegar_ctt->text_domain),
		8 => __('Tooltip submitted.', $codeNegar_ctt->text_domain),
		9 => sprintf( __('Tooltip scheduled for: <strong>%1$s</strong>.', $codeNegar_ctt->text_domain), date_i18n( __( 'M j, Y @ G:i', $codeNegar_ctt->text_domain), strtotime( $post->post_date ) , esc_url( get_permalink($post_ID) ) )),
		10 => __('Tooltip draft updated.', $codeNegar_ctt->text_domain)
	  );
	  return $messages;
	}
	
	public function remove_row_actions( $actions ){
		if( get_post_type() === 'content_tooltip' ){
			unset( $actions['view'] );
			unset( $actions['inline hide-if-no-js'] );
		}
		return $actions;
	}
}
?>