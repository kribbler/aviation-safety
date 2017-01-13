<?php
/*
Plugin Name: Aviation Reports
Plugin URI: 
Description: Aviation Reports
Author: Silver Marbles
Version: 1.0
Author URI: 
License: 
*/

add_action( 'admin_menu', 'aviation_admin_actions' );
add_action( 'admin_init', 'aviation_admin_init' );

function aviation_admin_actions(){
	add_menu_page( 'Aviation Reports Admin', 'Aviation Reports', 'manage_options', 'custompage', 'reports_index', plugins_url( 'aviation-reports/images/logo.png' ), 6 );
	add_submenu_page( 'custompage', 'Aviation Settings', 'Aviation Settings', 'activate_plugins', 'aviation_settings', 'aviation_settings' );
	add_action( 'admin_init', 'register_aviation_settings' );

	add_action( 'admin_print_styles', 'my_plugin_admin_styles' );
}

function register_aviation_settings() {
	register_setting( 'aviation-settings-group', 'max_wrong_answer' );
	register_setting( 'aviation-settings-group', 'seconds_to_next' );
	register_setting( 'aviation-settings-group', 'initial_licences_number' );
	register_setting( 'aviation-settings-group', 'email_after_licence_reached' );
	register_setting( 'aviation-settings-group', 'aviation_admin_email' );
	//email templates::
	register_setting( 'aviation-settings-group', 'aviation_email_user_login' );
	register_setting( 'aviation-settings-group', 'aviation_missing_user_data' );
	register_setting( 'aviation-settings-group', 'aviation_message_correct_answer' );
	register_setting( 'aviation-settings-group', 'aviation_message_thank_you' );
	register_setting( 'aviation-settings-group', 'aviation_message_wrong_answer' );
	register_setting( 'aviation-settings-group', 'aviation_max_days' );
	register_setting( 'aviation-settings-group', 'aviation_max_days_reached' );

	register_setting( 'aviation-settings-group', 'aviation_course_finished' );
	register_setting( 'aviation-settings-group', 'aviation_course_not_finished' );
	register_setting( 'aviation-settings-group', 'aviation_organizations' );
	register_setting( 'aviation-settings-group', 'aviation_job_roles' );
	register_setting( 'aviation-settings-group', 'aviation_terms' );
	

	//register_setting( 'aviation-settings-group', 'aviation_avatar_names' );
	
	register_setting( 'aviation-settings-group', 'aviation_email_max_wrong_answer' );
	register_setting( 'aviation-settings-group', 'aviation_email_course_complete' );
	register_setting( 'aviation-settings-group', 'aviation_email_course_certificate' );
	register_setting( 'aviation-settings-group', 'aviation_email_print_certificate' );
	register_setting( 'aviation-settings-group', 'aviation_email_max_license' );

	register_setting( 'aviation-settings-group', 'aviation_email_final_questionnaire' );
}

function aviation_settings() {
	$settings = array(
	    'teeny' => false,
	    'textarea_rows' => 15,
	    'tabindex' => 1,
	    'tinymce' => array(
        	'theme_advanced_buttons1' => 'bold, italic, ul, pH, temp',
      	),
	);
?>
<div class="wrap">
<h2>Aviation Settings</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'aviation-settings-group' ); ?>
    <?php do_settings_sections( 'aviation-settings-group' ); ?>
    <table class="form-table d_table">
        <tr valign="top">
        <th scope="row">Max Wrong Answers</th>
        <td><input type="text" name="max_wrong_answer" value="<?php echo esc_attr( get_option('max_wrong_answer') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Seconds to wait before showing "Next"</th>
        <td><input type="text" name="seconds_to_next" value="<?php echo esc_attr( get_option('seconds_to_next') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Initial licences number</th>
        <td><input type="text" name="initial_licences_number" value="<?php echo esc_attr( get_option('initial_licences_number') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Email after licences number used</th>
        <td><input type="text" name="email_after_licence_reached" value="<?php echo esc_attr( get_option('email_after_licence_reached') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Aviation Admin Email</th>
        <td><input type="text" name="aviation_admin_email" value="<?php echo esc_attr( get_option('aviation_admin_email') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Message for missing user info</th>
        <td><input type="text" name="aviation_missing_user_data" value="<?php echo esc_attr( get_option('aviation_missing_user_data') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Message for correct answer</th>
        <td><input type="text" name="aviation_message_correct_answer" value="<?php echo esc_attr( get_option('aviation_message_correct_answer') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Message for submitting feedback form</th>
        <td><input type="text" name="aviation_message_thank_you" value="<?php echo esc_attr( get_option('aviation_message_thank_you') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Message for wrong answer</th>
        <td><input type="text" name="aviation_message_wrong_answer" value="<?php echo esc_attr( get_option('aviation_message_wrong_answer') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Max Days to Finish the Course</th>
        <td><input type="text" name="aviation_max_days" value="<?php echo esc_attr( get_option('aviation_max_days') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Max Days Reached Warning</th>
        <td><input type="text" name="aviation_max_days_reached" value="<?php echo esc_attr( get_option('aviation_max_days_reached') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Course Finished</th>
        <td><input type="text" name="aviation_course_finished" value="<?php echo esc_attr( get_option('aviation_course_finished') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Course Not Finished</th>
        <td><input type="text" name="aviation_course_not_finished" value="<?php echo esc_attr( get_option('aviation_course_not_finished') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Organizations</th>
        <td><input type="text" name="aviation_organizations" value="<?php echo esc_attr( get_option('aviation_organizations') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Job Roles</th>
        <td><input type="text" name="aviation_job_roles" value="<?php echo esc_attr( get_option('aviation_job_roles') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Terms &amp; Conditions text</th>
        <td><input type="text" name="aviation_terms" value="<?php echo esc_attr( get_option('aviation_terms') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Email Template User Login</th>
        <td><?php wp_editor(get_option('aviation_email_user_login'), 'aviation_email_user_login', $settings); ?>
        </tr>

        <tr valign="top">
        <th scope="row">Email Template Max Wrong Answers</th>
        <td><?php wp_editor(get_option('aviation_email_max_wrong_answer'), 'aviation_email_max_wrong_answer', $settings); ?>
        </tr>

        <tr valign="top">
        <th scope="row">Email Template Course Complete</th>
        <td><?php wp_editor(get_option('aviation_email_course_complete'), 'aviation_email_course_complete', $settings); ?>
        </tr>

        <tr valign="top">
        <th scope="row">Email Template Course Certificate</th>
        <td><?php wp_editor(get_option('aviation_email_course_certificate'), 'aviation_email_course_certificate', $settings); ?>
        </tr>

        <tr valign="top">
        <th scope="row">Email Template Print Certificate</th>
        <td><?php wp_editor(get_option('aviation_email_print_certificate'), 'aviation_email_print_certificate', $settings); ?>
        </tr>

        <tr valign="top">
        <th scope="row">Email Template Max License</th>
        <td><?php wp_editor(get_option('aviation_email_max_license'), 'aviation_email_max_license', $settings); ?>
        </tr>

        <tr valign="top">
        <th scope="row">Email Template Final Questionnaire</th>
        <td><?php wp_editor(get_option('aviation_email_final_questionnaire'), 'aviation_email_final_questionnaire', $settings); ?>
        </tr>
        
    </table>
  
    <?php submit_button(); ?>

</form>
</div>
<?php } 

function reports_index(){
	global $wpdb;
	echo '<div class="wrap">';
	echo '<h2>Aviation Reports</h2>';

	$query = "SELECT * FROM " . $wpdb->prefix . "courses ORDER BY user_id";
	$results = $wpdb->get_results($query, OBJECT);
	
	if ($results){
		echo "<table class='wp-list-table widefat fixed posts'>";
		echo "<thead>";
		echo "<tr>";
			echo "<th>User Name</th>";
			echo "<th>Started at</th>";
			echo "<th>Finished at</th>";
			echo "<th>Total Time</th>";
			echo "<th>Current Question</th>";
			echo "<th>Errors</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tfoot>";
		echo "<tr>";
			echo "<th>User Name</th>";
			echo "<th>Started at</th>";
			echo "<th>Finished at</th>";
			echo "<th>Total Time</th>";
			echo "<th>Current Question</th>";
			echo "<th>Errors</th>";
		echo "</tr>";
		echo "</tfoot>";
		echo "<tbody>";
		$k = 0;
		foreach ($results as $course) {?>
			<tr <?php echo ($k++%2 == 0) ? 'class="alternate"' : '';?>>
			<td><?php show_user_name($course->user_id);?></td>
			<td><?php echo $course->start_at; ?></td>
			<td><?php echo $course->end_at; ?></td>
			<td><?php show_time_passed($course->start_at, $course->end_at); ?></td>
			<td><?php echo show_question_title($course->question_id);?></td>
			<td><?php echo $course->errors;?></td>
			</tr>
			<?php
		}
		echo "</tbody>";
		echo "</table>";
	} else {
		echo '<h3>No Courses yet.</h3>';
	}
	echo '</div>';
}

function show_question_title($question_number){
	global $wpdb;
	$args = array(
        'post_type'     => 'aviation-questions',
        'posts_per_page' => -1
    );
    $posts = query_posts( $args );
    return $posts[$question_number]->post_title;
}
function show_user_name($user_id){
	$user = get_user_by( 'id', $user_id );
	echo $user->data->display_name;
}

function show_time_passed($t1, $t2){
	$diff = strtotime($t2) - strtotime($t1);
	echo date('H:i:s', $diff);
}

function aviation_admin_init(){
	wp_register_style( 'myPluginStylesheet', plugins_url('style.css', __FILE__) );
}

function my_plugin_admin_styles() {
	wp_enqueue_style( 'myPluginStylesheet' );
}

add_filter('wp_mail_content_type','set_content_type');

function set_content_type($content_type){
	return 'text/html';
}

add_action('wp_login', 'send_email_when_user_logges_in', 1, 2);

function send_email_when_user_logges_in($user_login, $user){
	////////
	$emails = get_option( 'aviation_admin_email' );
	$emails = explode("|", $emails);
	//var_dump($emails);die();
	$subject = 'User login to CJ Aviation Safety';
	$headers = 'From: no-reply <no-reply@cjaviationsafety.co.uk>' . "\r\n";
	

	ob_start();

	$body = get_option( 'aviation_email_user_login' );
	$body = str_replace("{user}", $user->user_firstname . ' ' . $user->user_lastname, $body, $count);
	
	//$body = str_replace("<h1>", '<h1 style="background-color: #05519c; padding: 15px; color: #fff; margin-bottom: 0;">', $body);
	echo $body; //die();
	//echo '';

	$message = ob_get_contents();
	ob_end_clean();

	//$x = wp_mail("daniel.oraca@gmail.com", $subject, $message, $headers);
	//if ($_SERVER['REMOTE_ADDR'] == '83.103.200.163') {
		//var_dump($x); die();
	//}
	foreach ($emails as $email){
		wp_mail($email, $subject, $message, $headers);
	}
}

function send_email_when_max_errors_reached(){
	$user = wp_get_current_user();

	$emails = get_option( 'aviation_admin_email' );
	$emails = explode("|", $emails);

	$subject = 'User max error number reached on CJ Aviation Safety';
	$headers = 'From: no-reply <no-reply@cjaviationsafety.co.uk>' . "\r\n";
	ob_start();

	$body = get_option( 'aviation_email_max_wrong_answer' );
	$body = str_replace("{user}", $user->user_firstname . ' ' . $user->user_lastname, $body);
	$body = str_replace("{max_number}", get_option( 'max_wrong_answer' ), $body);
	echo $body;
	
	$message = ob_get_contents();
	ob_end_clean();
	foreach ($emails as $email){
		wp_mail($email, $subject, $message, $headers);
	}
}

function send_email_when_printing_certificate(){
	$user = wp_get_current_user();

	$emails = get_option( 'aviation_admin_email' );
	$emails = explode("|", $emails);

	$subject = 'Certificate print on CJ Aviation Safety';
	$headers = 'From: no-reply <no-reply@cjaviationsafety.co.uk>' . "\r\n";
	ob_start();

	$body = get_option( 'aviation_email_print_certificate' );
	$body = str_replace("{user}", $user->user_firstname . ' ' . $user->user_lastname, $body);
	
	echo $body;
	
	$message = ob_get_contents();
	ob_end_clean();
	foreach ($emails as $email){
		wp_mail($email, $subject, $message, $headers);
	}
	//var_dump($x);die();
}

//aviation_email_max_license
function send_email_when_max_license(){
	$user = wp_get_current_user();

	$emails = get_option( 'aviation_admin_email' );
	$emails = explode("|", $emails);

	$subject = 'Maximum number of licences on CJ Aviation Safety';
	$headers = 'From: no-reply <no-reply@cjaviationsafety.co.uk>' . "\r\n";
	ob_start();

	$body = get_option( 'aviation_email_max_license' );
	//$body = str_replace("{user}", $user->user_firstname . ' ' . $user->user_lastname, $body);
	
	echo $body;
	
	$message = ob_get_contents();
	ob_end_clean();
	foreach ($emails as $email){
		$x = wp_mail($email, $subject, $message, $headers);
		//var_dump($x); die();
	}
	//var_dump($x);die();
}

function send_email_when_reaching_last_question(){
	global $wpdb;

	$user = wp_get_current_user();

	$query = "SELECT * FROM " . $wpdb->prefix . "courses WHERE user_id = " . $user->ID;
	$results = $wpdb->get_results($query, OBJECT);

	$emails = get_option( 'aviation_admin_email' );
	$emails = explode("|", $emails);

	$subject = 'Course complete on CJ Aviation Safety';
	$headers = 'From: no-reply <no-reply@cjaviationsafety.co.uk>' . "\r\n";
	//ob_start();

	$body = get_option( 'aviation_email_course_complete' );
	$body = str_replace("{user}", $user->user_firstname . ' ' . $user->user_lastname, $body);
	
	$body = str_replace("{started_at}", $results[0]->start_at, $body);
	$body = str_replace("{nr_errors}", $results[0]->errors, $body);
	$body = str_replace("{ended_at}", date("Y-m-d h:i:s"), $body);
	

	echo $body;
	
	$message = ob_get_contents();
	ob_end_clean();
	foreach ($emails as $email){
		wp_mail($email, $subject, $message, $headers);
	}
	//var_dump($x);die();
}

function send_certificate_email(){
	global $wpdb;
	global $current_user;
	get_currentuserinfo();
	$user = wp_get_current_user();
	$user_id = get_current_user_id();

	$query = "SELECT * FROM " . $wpdb->prefix . "courses WHERE user_id = " . $user->ID;
	$results = $wpdb->get_results($query, OBJECT);

	$user_clock_number = get_user_meta( $user_id, 'user_clock_number', true ); 
    $user_organization = get_user_meta( $user_id, 'user_organization', true );
    $user_firstname = $current_user->user_firstname;
    $user_lastname = $current_user->user_lastname;

	$url = $_SERVER['DOCUMENT_ROOT'] . '/certificates/' . $user_firstname . '-' . $user_lastname . '-' . $user_clock_number . '.pdf';

	//echo $url;die();
	$email = $current_user->user_email;
	
	//$email = "daniel.oraca@gmail.com";

	$subject = 'CJ Aviation Safety Certificate';
	$headers = 'From: no-reply <no-reply@cjaviationsafety.co.uk>' . "\r\n";
	ob_start();

	$body = get_option( 'aviation_email_course_certificate' );
	$body = str_replace("{user}", $user->user_firstname . ' ' . $user->user_lastname, $body);
	
	
	

	echo $body;
	//echo $url;die();
	$message = ob_get_contents();
	ob_end_clean();
	$x = wp_mail($email, $subject, $message, $headers, $url);
	//var_dump($x);die();
}

