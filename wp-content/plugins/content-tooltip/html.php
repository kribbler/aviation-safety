<?php
if (!defined('ABSPATH')) exit('No direct script access allowed');

 /**
 * CodeNegar Content Tooltip functions
 *
 * Content Tooltip HTML Class
 *
 * @package    	WordPress Content Tooltip
 * @author      Farhad Ahmadi <ahm.farhad@gmail.com>
 * @license     http://codecanyon.net/licenses
 * @link		http://codenegar.com/wordpress-content-tooltip-plugin/
 * @version    	2.3
 */
 
class CodeNegar_ctt_html{
	
	function __construct(){
		
	}
	
	public function get_html($post_id, $post_title, $post_content, $post_custom){
		$prefix = '_cnctt_';
		$return = '';
		$common_attrs = 'id="cn-cct-%post_id%" 
						data-ctt-id="%post_id%" 
						data-funcease="%funcEase%" 
						data-theme="%theme%" 
						data-animation-speed="%animation_speed%" 
						data-remove-delay="%remove_delay%" 
						data-preferredposition="%preferredPosition%" 
						data-enable-css-animations="%enable_css_animations%" 
						data-show-css-animation="%show_css_animation%" 
						data-hide-css-animation="%hide_css_animation%" 
						data-source="%data_src%" 
						data-min-width="%min-width%" 
						data-max-width="%max-width%" 
						data-popup-y-offset="%popupYOffset%" 
						data-popup-offset="%popupOffset%" 
						data-hide-on-popup-click="%hideOnPopupClick%" 
						data-hide-on-trigger-click="%hideOnTriggerClick%" 
						data-hide-trigger="%hideTrigger%" 
						data-trigger-on-click="%triggerOnClick%" 
						data-invert-animation="%invertAnimation%" 
						data-popup-distance="%popupDistance%" 
						data-display-inline="%display_inline%" 
						';
		$common_attrs = str_replace(array("\r", "\n", "\t"),"", $common_attrs);
		$common_attrs = str_replace("  "," ", $common_attrs);
		if($post_custom[$prefix . 'element_type'] == 'a'){ // link needs href
			$return = '<%element_type% href="%href%" title="" %title_image% class="codenegar-ctt-element %css_class%" '.$common_attrs.' >%title% </%element_type%>%content%';
		}else if($post_custom[$prefix . 'element_type'] == 'img'){ // img needs src
			$return = '<%element_type% class="codenegar-ctt-element codenegar-image-hover %css_class%" src="%title_image%" alt="%title%" '.$common_attrs.' />%content%';
			if(strlen(trim($post_custom[$prefix . 'title_image']))>0){
			}
		}else if($post_custom[$prefix . 'element_type'] == 'link_img'){ // link_img needs href & src
			$return = '<a href="%href%" '.$common_attrs.' class="codenegar-ctt-element codenegar-image-hover %css_class%" title="" ><img src="%title_image%" alt="%title%"/></a>%content%';
			if(strlen(trim($post_custom[$prefix . 'title_image']))>0){
			}
		}else{
			$return = '<%element_type% class="codenegar-ctt-element %css_class%" '. $common_attrs .' >%title%</%element_type%>%content%';
		}

		$data = array(
			'%element_type%' => $post_custom[$prefix . 'element_type'],
			'%funcEase%' => $post_custom[$prefix . 'funcEase'],
			'%theme%' => $post_custom[$prefix . 'theme'],
			'%preferredPosition%' => $post_custom[$prefix . 'preferredPosition'],
			'%href%' => $post_custom[$prefix . 'href'],
			'%title_image%' => $post_custom[$prefix . 'title_image'],
			'%css_class%' => trim($post_custom[$prefix . 'css_class']),
			'%min-width%' => $post_custom[$prefix . 'min_width'],
			'%max-width%' => $post_custom[$prefix . 'max_width'],
			'%animation_speed%' => $post_custom[$prefix . 'animation_speed'],
			'%remove_delay%' => $post_custom[$prefix . 'remove_delay'],
			'%enable_css_animations%' => $post_custom[$prefix . 'enable_css_animations'],
			'%show_css_animation%' => $post_custom[$prefix . 'show_css_animation'],
			'%hide_css_animation%' => $post_custom[$prefix . 'hide_css_animation'],
			'%data_src%' => $post_custom[$prefix . 'data_src'],
			'%popupYOffset%' => $post_custom[$prefix . 'popupYOffset'],
			'%popupOffset%' => $post_custom[$prefix . 'popupOffset'],
			'%hideOnPopupClick%' => $post_custom[$prefix . 'hideOnPopupClick'],
			'%hideOnTriggerClick%' => $post_custom[$prefix . 'hideOnTriggerClick'],
			'%hideTrigger%' => $post_custom[$prefix . 'hideTrigger'],
			'%triggerOnClick%' => $post_custom[$prefix . 'triggerOnClick'],
			'%invertAnimation%' => $post_custom[$prefix . 'invertAnimation'],
			'%popupDistance%' => $post_custom[$prefix . 'popupDistance'],
			'%display_inline%' => $post_custom[$prefix . 'display_inline'],
			'%post_id%' => $post_id,
			'%title%' => apply_filters('the_title',(strlen($post_custom[$prefix . 'title'])>0)? $post_custom[$prefix . 'title'] : $post_title),
			'%content%' => $this->get_content($post_id, $post_content, $post_custom)
		);
		$return = str_replace(
			array_keys($data),
			array_values($data),
			$return
		);
		return $return;
	}
	
	public function prepare_oembed($oembed, $post_custom){
		$before = '[embed width="'.intval($post_custom['_cnctt_embed_width']).'" height="'.intval($post_custom['_cnctt_embed_height']).'"]';
		$after = '[/embed]';
		$oembed = apply_filters('the_content', $before . $oembed . $after);
		return $oembed;
	}
	
	public function get_content($post_id, $post_content, $post_custom){
		$prefix = '_cnctt_';
		$data = array(
			'detailsHTML' => ''
		);
		
		switch($post_custom[$prefix . 'data_src']){
			case 'html':
				$data['detailsHTML'] = $post_content;
				break;
			case 'url':
				$result = '';
				if(preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $post_custom[$prefix . 'url'])){ // If is valid url
					$cache_name = "cnhc_url_$post_id";
					$result = get_transient($cache_name);
					if ($result === false || $result === ''){ // No cache or empty or expired
						$result = wp_remote_get($post_custom[$prefix . 'url']);
						if( is_wp_error( $result ) ) {
							$result = '';
						}else{
							$result = $result['body'];
						}
						set_transient($cache_name, $result, max(1, intval($post_custom[$prefix . 'cache_duration'])) * 60); // Sets minimum 60 seconds cache
					}	
				}
				$data['detailsHTML'] = $result;
				break;
			case 'oembed':
				$oembed = $this->prepare_oembed($post_custom[$prefix . 'oembed'], $post_custom);
				$data['detailsHTML'] = $oembed;
				break;
			case 'html_url':
				$data['detailsHTML'] = $post_content;
				$result = '';
				if(preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $post_custom[$prefix . 'url'])){ // If is valid url
					$cache_name = "cnhc_url_$post_id";
					$result = get_transient($cache_name);
					if ($result === false || $result === ''){ // No cache or empty or expired
						$result = wp_remote_get($post_custom[$prefix . 'url']);
						if( is_wp_error( $result ) ) {
							$result = '';
						}else{
							$result = $result['body'];
						}
						set_transient($cache_name, $result, max(1, intval($post_custom[$prefix . 'cache_duration'])) * 60); // Sets minimum 60 seconds cache
					}
				}
				$data['detailsHTML'] .= ' ' . $result; // Append to html
				break;
			case 'html_oembed':
				$data['detailsHTML'] = $post_content;
				$oembed = $this->prepare_oembed($post_custom[$prefix . 'oembed'], $post_custom);
				$data['detailsHTML'] .= $oembed;
				break;
			case 'print_html':
				// Oh! You shouldn't be here!
				break;
		}
		return '<div class="smallipopHint" style="display:none;"> <span id="data-cn-cct-'. $post_id .'" class="data-cn-cct">' . $data['detailsHTML'] . ' </span> </div>';
	}
}
?>