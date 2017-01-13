<?php
function toz_force_https () {
  if ( !is_ssl() ) {
    wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
    exit();
  }
}
add_action ( 'template_redirect', 'toz_force_https', 1 );
//$headers = 'From: no-reply <no-reply@cjaviationsafety.co.uk>' . "\r\n";
//wp_mail("daniel.oraca@gmail.com", "test", "only", $headers);

if ($_SERVER['REMOTE_ADDR'] == '83.103.200.163' && 1==2) {
    $subject = 'User login to CJ Aviation Safety';
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: daniel <daniel@cjaviationsafety.co.uk>' . "\r\n";
    //$headers .= 'Cc: myboss@example.com' . "\r\n";

    
    

    ob_start();


    $body = '<img class="alignnone size-full wp-image-257" src="http://www.cjaviationsafety.co.uk/wp-content/uploads/2015/01/cert_header2.jpg" alt="cert_header2" width="600" height="86" />
<div style="width: 100%; margin-top: 20px;">
<h1 style="background-color: #05519c; padding: 15px; color: #fff; margin-bottom: 0;">User Login</h1>
<div style="background-color: #bedbf4; padding: 15px;">Hello admin!The user {user} has logged in to website.</div>
<h4 style="background-color: #05519c; padding: 15px; color: #fff; margin-top: 0;">Copyright to CJ Aviation Safety Consultancy Limited 2014</h4>
</div>';

    echo $body;
    $message = ob_get_contents();
    ob_end_clean();

    $x = wp_mail("anthony@silvermarbles.co.uk", $subject, $message, $headers);
    #$x = wp_mail("kribbler@gmail.com", $subject, $message, $headers);
    var_dump($x);
}




wp_register_script('jquery', ("http://code.jquery.com/jquery-latest.min.js"), false, '');
wp_enqueue_script('jquery');

wp_register_script('backstretch', (get_stylesheet_directory_uri() . "/js/jquery.backstretch.min.js"), false, '');
wp_enqueue_script('backstretch');

/*
wp_register_script('jquery-uix', ("//code.jquery.com/ui/1.11.3/jquery-ui.js"), false, '');
wp_enqueue_script('jquery-uix');

wp_register_style( 'jquery-uix', '//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css' );
wp_enqueue_style( 'jquery-uix' );
*/

function child_ts_theme_widgets_init(){

    register_sidebar( array(
        'name' => __( 'Header Text', 'liva' ),
        'id' => 'header-text',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Header Right', 'liva' ),
        'id' => 'header-right',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Copyright area 1', 'liva' ),
        'id' => 'coyright-area-1',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Copyright area 2', 'liva' ),
        'id' => 'coyright-area-2',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Above Home', 'liva' ),
        'id' => 'footer-above-home',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Above Inner', 'liva' ),
        'id' => 'footer-above-inner',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );

    register_sidebar(array(
        'name' => __( 'Victor Avatar', 'theretailer' ),
        'id' => 'cb_avatar_victor',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar(array(
        'name' => __( 'Angela Avatar', 'theretailer' ),
        'id' => 'cb_avatar_angela',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar(array(
        'name' => __( 'Abdul Avatar', 'theretailer' ),
        'id' => 'cb_avatar_abdul',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar(array(
        'name' => __( 'iPad Avatar', 'theretailer' ),
        'id' => 'cb_avatar_ipad',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar(array(
        'name' => __( 'No Avatar', 'theretailer' ),
        'id' => 'cb_avatar_none',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action( 'widgets_init', 'child_ts_theme_widgets_init' );

function redirect_user_to_dashboard(){
    if (is_user_logged_in()){
        $current_user = wp_get_current_user();
        $userRole = ($current_user->caps);
        if ($userRole['subscriber']){
            wp_redirect( get_permalink( get_page_by_path( 'user-dashboard' ) ) );
        }
    }
}

function check_to_redirect_home(){
    if (!is_user_logged_in()){
        wp_redirect( home_url() );
        exit();
    }
}

function get_my_next_post(){
    $next_post = get_next_post();
}

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'aviation-questions',
        array(
            'labels' => array(
            'name' => __( 'Questions' ),
            'singular_name' => __( 'Question' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'custom-fields', 'wp_custom_post_template_meta_box'),
        )   
    );

    
}

add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'certificate',
    array(
      'labels' => array(
        'name' => __( 'Certificates' ),
        'singular_name' => __( 'Certificate' )
      ),
      'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'custom-fields', 'wp_custom_post_template_meta_box'),
            'rewrite' => array('slug' => 'certificates'),
    )
  );

  flush_rewrite_rules();
}

function wpse73190_gist_adjacent_post_where($sql) {
  if ( !is_main_query() || !is_singular() )
    return $sql;

  $the_post = get_post( get_the_ID() );
  $patterns = array();
  $patterns[] = '/post_date/';
  $patterns[] = '/\'[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}\'/';
  $replacements = array();
  $replacements[] = 'menu_order';
  $replacements[] = $the_post->menu_order;
  return preg_replace( $patterns, $replacements, $sql );
}
add_filter( 'get_next_post_where', 'wpse73190_gist_adjacent_post_where' );
add_filter( 'get_previous_post_where', 'wpse73190_gist_adjacent_post_where' );

function wpse73190_gist_adjacent_post_sort($sql) {
  if ( !is_main_query() || !is_singular() )
    return $sql;

  $pattern = '/post_date/';
  $replacement = 'menu_order';
  return preg_replace( $pattern, $replacement, $sql );
}
add_filter( 'get_next_post_sort', 'wpse73190_gist_adjacent_post_sort' );
add_filter( 'get_previous_post_sort', 'wpse73190_gist_adjacent_post_sort' );

add_shortcode( 'show_question', 'show_questions' );

function show_questions( $atts, $content = null){
    extract(shortcode_atts(array(
        'for_slide'       => '',
        'taxonomy' => '',
        'term'     => ''
    ), $atts ) );

    $questions = set_questions();
    $question = $questions['q' . $for_slide];

    //echo "<pre>";var_dump($question);echo "</pre>";
    $output = "";
    $output .= '<h3 class="question_body">' . $question['body'] . '</h3>';
    if ($question['type'] == 'radio'){
        shuffle($question['options']);

        $output .= '<div class="question_answers">';
            $output .= '<input type="hidden" id="question_type" value="'.$question['type'].'" />';
            $output .= '<input type="hidden" id="question_answer" value="'.base64_encode($question['answer']).'" />';
            foreach ($question['options'] as $key => $value) {
                $output .= '<div class="question_option">';
                $output .= '<div class="question_option_text">' . $value . '</div>';
                $output .= '<input id="jop_'.$key.'" class="radio_answer" type="radio" name="radio_answer" value="'.$value.'" />';

                $output .= '<br />';
                $output .= '</div>';
            }
        $output .= '</div>'; //<div class="question_answers">

    }
    wp_reset_postdata();
    return $output;
}

function set_questions(){
    $questions = array(
        //simple radio questions
        'q8' => array(
            'type' => 'radio',
            'body' => 'What does Human Factors refer to the study of?',
            'options' => array(
                1 => 'a) Human capabilities and limitations in the workplace',
                2 => 'b) Human capabilities and stress in the workplace',
                3 => 'c) Human culpability and limitations in the workplace',
                4 => 'd) Human culpability and stress in the workplace'
            ),
            'answer' => 'd) Human culpability and stress in the workplace'
        ),
        'q19' => array(
            'type' => 'radio',
            'body' => 'What is THE ICEBERG ratio for UNSAFE ACT TO FATAL ACCIDENTS?',
            'options' => array(
                1 => '30 to 1',
                2 => '60 to 1',
                3 => '10 to 1',
                4 => '000\'s to 1'
            ),
            'answer' => '000\'s to 1'
        ),
        'q28' => array(
            'type' => 'radio',
            'body' => 'The ERROR CHAIN refers to?',
            'options' => array(
                1 => 'There are no problems for the maintenance staff carrying out the work.',
                2 => 'A collection of things that go wrong leading to an accident breaking the chain.',
                3 => 'All the links of the chain need to be in place for the accident to happen.',
                4 => 'Break one link in the chain cause the accident not to happen.'
            ),
            'answer' => 'Break one link in the chain cause the accident not to happen.'
        ),
        'q30' => array(
            'type' => 'radio',
            'body' => 'What does Murphy’s Law refer to?',
            'options' => array(
                1 => 'If something can go right it will',
                2 => 'If something can’t go wrong it will',
                3 => 'If something can go wrong it will',
                4 => 'If things go wrong leave them'
            ),
            'answer' => 'If something can go wrong it will'
        ),
        'q32' => array(
            'type' => 'radio',
            'body' => 'What is a Error?',
            'options' => array(
                1 => 'An error is a human action (or human behaviour) that unintentionally deviates from the expected action (or behaviour).',
                2 => 'A error is something that is done intentionally.',
                3 => 'A error is a cause done in a reckless manner.',
                4 => 'A error is a deliberate act.'
            ),
            'answer' => 'An error is a human action (or human behaviour) that unintentionally deviates from the expected action (or behaviour).'
        ),
        'q34' => array(
            'type' => 'radio',
            'body' => 'What are latent failures?',
            'options' => array(
                1 => 'Ones that have been made in the past and lay dormant',
                2 => 'Ones that have an immediate impact',
                3 => 'Ones where we can see results straight away',
                4 => 'Ones that happen as we are working'
            ),
            'answer' => 'Ones that have been made in the past and lay dormant'
        ),
        'q36' => array(
            'type' => 'radio',
            'body' => 'A violation is what?',
            'options' => array(
                1 => 'Carried out the work and made a mistake during it.',
                2 => 'Was committed unintentionally by a person.',
                3 => 'Is a human action (or human behaviour) that intentionally deviates from the expected action (or behaviour).',
                4 => 'Carrying out a job with the wrong procedure un- intentionally'
            ),
            'answer' => 'Is a human action (or human behaviour) that intentionally deviates from the expected action (or behaviour).'
        ),
        'q42' => array(
            'type' => 'radio',
            'body' => 'Why are Human factors important in the aeronautical engineering workplace?',
            'options' => array(
                1 => 'To preserve the managers responsibility',
                2 => 'To preserve the safety of people, assets, health and efficiency',
                3 => 'To save money',
                4 => 'Create more work with less time'
            ),
            'answer' => 'To preserve the safety of people, assets, health and efficiency'
        ),
        'q54' => array(
            'type' => 'radio',
            'body' => 'What is a disadvantage of shift work?',
            'options' => array(
                1 => 'Working unsociable hours so less time to spend with our family',
                2 => 'More days off',
                3 => 'Avoiding peak traffic when travelling to work',
                4 => 'Does not affect the persons body clock'
            ),
            'answer' => 'Working unsociable hours so less time to spend with our family'
        ),
        'q59' => array(
            'type' => 'radio',
            'body' => 'What are circadian rhythms?',
            'options' => array(
                1 => 'Circadian rhythms are physiological and behavioural functions and processes in the body that have a regular cycle',
                2 => 'Circadian rhythms are physiological and behavioural functions and processes in the body that have an irregular cycle',
                3 => 'Circadian rhythms are physiological and behavioural functions and processes in the body that have do not have a cycle',
                4 => 'Circadian rhythms are physical and mental functions and  processes in    the body that have do not have a cycle'
            ),
            'answer' => 'Circadian rhythms are physiological and behavioural functions and processes in the body that have a regular cycle'
        ),
        'q65' => array(
            'type' => 'radio',
            'body' => 'Why is written communication inefficient?',
            'options' => array(
                1 => 'Because there is no feedback, tone of voice or body language',
                2 => 'Because it is easy to make spelling mistakes',
                3 => 'Because verbal communication doesn’t allow feedback',
                4 => 'Because there is feedback and body language'
            ),
            'answer' => 'Because there is no feedback, tone of voice or body language'
        ),
        'q72' => array(
            'type' => 'radio',
            'body' => 'What is the definition of stress?',
            'options' => array(
                1 => 'A mental force, that when applied to a system, causes some minor modification of its form, where forces can only be due to social pressures',
                2 => 'Any force, that when applied to a system, causes some significant modification of its form, where forces can be physical, psychological or due to social pressures',
                3 => 'The aircraft maintenance engineer does not suffer from stress so a definition does not apply',
                4 => 'No force, that when applied to a system, causes no minor modification of its form, where forces are not due to social pressures'
            ),
            'answer' => 'A mental force, that when applied to a system, causes some minor modification of its form, where forces can only be due to social pressures'
        ),
        'q88' => array(
            'type' => 'radio',
            'body' => 'What are the three main types of violations?',
            'options' => array(
                1 => 'They are Random, accidental and unintentional',
                2 => 'Routine, Situational and Exceptional',
                3 => 'Reckless, dangerous and lack of care',
                4 => 'Sabotage, unintentional, Reckless act'
            ),
            'answer' => 'Routine, Situational and Exceptional'
        ),
        //multiple select questions
        'q83' => array(
            'type' => 'simple_multiple_select',
            'body' => 'Select four causes of FATIGUE<br />Mark the correct options from the listing',
            'options' => array(
                1 => 'Excessive hours of work',
                2 => 'Only working short hours per day',
                3 => 'Mental and physically',
                4 => 'Insufficient out of hours rest/sleep',
                5 => 'Being correctly hydrated',
                6 => 'Organisational',
                7 => 'Poor planning of work',
                8 => 'Well planned work',
                9 => 'Insufficient personnel',
                10 => 'Good shift pattern',
                11 => 'Poor shift pattern',
                12 => 'Temperature, humidity, noise'
            ),
            'answer' => array(
                'Only working short hours per day',
                'Being correctly hydrated',
                'Well planned work',
                'Good shift pattern'
            )
        )
    );

    return $questions;
}

function pr($s){
    echo "<pre>"; var_dump($s); echo "</pre>";
}

/** start ajaxing the questions **/
add_action('wp_ajax_incrementErrorsNumber', 'incrementErrorsNumber');
add_action('wp_ajax_nopriv_incrementErrorsNumber', 'incrementErrorsNumber');
function incrementErrorsNumber(){
    global $wpdb;
    
    $query = "SELECT errors FROM " . $wpdb->prefix . "courses WHERE user_id = " . get_current_user_id();
    $result = $wpdb->get_row($query);
    
    $error = $result->errors + 1;

    if ($error >= get_option( 'max_wrong_answer' )){
        send_email_when_max_errors_reached();
    }
    echo $error;
    $wpdb->update(
        $wpdb->prefix . 'courses',
        array(
            'errors'   => $error,
        ),
        array( 'user_id' => get_current_user_id() ),
        array(
            '%d'
        )
    );
    die();
}

add_action('wp_ajax_emailCertificate', 'emailCertificate');
add_action('wp_ajax_nopriv_emailCertificate', 'emailCertificate');
function emailCertificate() {
    global $current_user; 
    get_currentuserinfo();
    $user_id = get_current_user_id();
    $user_clock_number = get_user_meta( $user_id, 'user_clock_number', true ); 
    $user_organization = get_user_meta( $user_id, 'user_organization', true );
    $user_firstname = $current_user->user_firstname;
    $user_lastname = $current_user->user_lastname;

    //$certificate_url = $_SERVER['DOCUMENT_ROOT'] . '/certificates/' . $user_firstname . '-' . $user_lastname . '-' . $user_clock_number . '.pdf';
    //var_dump($certificate_url);die();
    send_certificate_email();
    die();
}


add_action('wp_ajax_lastQuestionEmail', 'lastQuestionEmail');
add_action('wp_ajax_nopriv_lastQuestionEmail', 'lastQuestionEmail');

function lastQuestionEmail() {
    //also save the user having the course complete!

    update_user_meta( get_current_user_id(),'user_course_finished', 1 );

    send_email_when_reaching_last_question();
    die();
}

function get_avatar_type(){
    global $current_user; 
    $user_avatar_type = esc_attr(get_the_author_meta( 'user_avatar_type', $current_user->ID ));
    $av_code = "";
    if ($user_avatar_type == 'Arabic Avatar')
        $av_code = 'avatar_text_arabic';
    else if ($user_avatar_type == 'Expat Avatar')
        $av_code = 'avatar_text_expat';
    else if ($user_avatar_type == 'iPad Avatar')
        $av_code = 'avatar_text_ipad';
    else if ($user_avatar_type == 'Expat Lady Avatar')
        $av_code = 'avatar_text_expat_lady';
    else if ($user_avatar_type == 'No Avatar')
        $av_code = '';    

    return $av_code;
}

add_action('wp_ajax_getQuestionAvatarText', 'getQuestionAvatarText');
add_action('wp_ajax_nopriv_getQuestionAvatarText', 'getQuestionAvatarText');

function getQuestionAvatarText(){
    global $wpdb;
    
    $args = array(
        'post_type'     => 'aviation-questions',
        'posts_per_page' => -1
    );

    $posts = query_posts( $args );
    $total_posts = count($posts);

    $next_question_index = $_POST['last_question'] + 1;
    $prev_question_index = $_POST['last_question'] - 1;
    $question = $posts[$_POST['last_question']];

    $av_code = get_avatar_type();
    if ($av_code) {
        $text = get_post_meta($question->ID, $av_code, true);
        if (!$text) {
            $text = get_post_meta($question->ID, 'avatar_text_arabic', true) . '...&nbsp;...&nbsp;...&nbsp;...&nbsp;...&nbsp;';
        }
    } else {
        $text = "";
    }
    echo json_encode($text);
    die();
}

add_action('wp_ajax_sendFinalQuestionnaire', 'sendFinalQuestionnaire');
add_action('wp_ajax_nopriv_sendFinalQuestionnaire', 'sendFinalQuestionnaire');

function sendFinalQuestionnaire(){
    $emails = get_option( 'aviation_admin_email' );
    $emails = explode("|", $emails);

    $subject = 'CJ Aviation Safety - User final questionnaire';
    $headers = 'From: no-reply <no-reply@cjaviationsafety.co.uk>' . "\r\n";
    

    ob_start();

    $user = wp_get_current_user();
    
    $body = get_option( 'aviation_email_final_questionnaire' );
    $body = str_replace("{user}", $user->user_firstname . ' ' . $user->user_lastname, $body, $count);

    $body = str_replace("{radio_answer_01}", $_POST['radio_answer_01'], $body, $count);
    $body = str_replace("{radio_answer_02}", $_POST['radio_answer_02'], $body, $count);
    $body = str_replace("{radio_answer_03}", $_POST['radio_answer_03'], $body, $count);
    $body = str_replace("{radio_answer_04}", $_POST['radio_answer_04'], $body, $count);
    $body = str_replace("{radio_answer_05}", $_POST['radio_answer_05'], $body, $count);
    $body = str_replace("{radio_answer_06}", $_POST['radio_answer_06'], $body, $count);
    $body = str_replace("{radio_answer_07}", $_POST['radio_answer_07'], $body, $count);
    $body = str_replace("{radio_answer_08}", $_POST['radio_answer_08'], $body, $count);
    $body = str_replace("{radio_answer_09}", $_POST['radio_answer_09'], $body, $count);
    $body = str_replace("{radio_answer_10}", $_POST['radio_answer_10'], $body, $count);
    $body = str_replace("{radio_answer_11}", $_POST['radio_answer_11'], $body, $count);
    $body = str_replace("{radio_answer_12}", $_POST['radio_answer_12'], $body, $count);
    $body = str_replace("{radio_answer_13}", $_POST['radio_answer_13'], $body, $count);
    $body = str_replace("{radio_answer_14}", $_POST['radio_answer_14'], $body, $count);
    
    $body = str_replace("{textarea_answer_15}", $_POST['textarea_answer_15'], $body, $count);
    $body = str_replace("{textarea_answer_16}", $_POST['textarea_answer_16'], $body, $count);
    $body = str_replace("{textarea_answer_17}", $_POST['textarea_answer_17'], $body, $count);
    $body = str_replace("{textarea_answer_18}", $_POST['textarea_answer_18'], $body, $count);
    $body = str_replace("{textarea_answer_19}", $_POST['textarea_answer_19'], $body, $count);
    $body = str_replace("{textarea_answer_20}", $_POST['textarea_answer_20'], $body, $count);
    $body = str_replace("{textarea_answer_21}", $_POST['textarea_answer_21'], $body, $count);

    echo $body; 
    
    $message = ob_get_contents();
    ob_end_clean();

    foreach ($emails as $email){
        wp_mail($email, $subject, $message, $headers);
    }

    //update feedback sent
    update_user_meta( get_current_user_id(), 
        'user_feedback_sent', 
        1
    );
    die();
}



add_action('wp_ajax_getQuestionContent', 'getQuestionContent');
add_action('wp_ajax_nopriv_getQuestionContent', 'getQuestionContent');

function getQuestionContent(){
    
}

add_filter('the_content', 'my_content_manipulator');

function my_content_manipulator($content){

//do stuff here

return do_shortcode($content);

}

add_action('wp_ajax_getQuestion', 'getQuestion');
add_action('wp_ajax_nopriv_getQuestion', 'getQuestion');

function getQuestion() {
    global $wpdb;

    check_if_max_errors();

    $args = array(
        'post_type'     => 'aviation-questions',
        'posts_per_page' => -1
    );

    $posts = query_posts( $args );
    $total_posts = count($posts);

    $next_question_index = $_POST['last_question'] + 1;
    $prev_question_index = $_POST['last_question'] - 1;
    $question = $posts[$_POST['last_question']];

    $return_array = array();
    
    $return_array['max_errors_reached'] = false;

    $return_array['question_background'] = get_post_meta($question->ID, 'background_image', true);
    $return_array['question_title'] = get_post_meta($question->ID, "slide_header", true);
    $return_array['question_content'] = apply_filters('the_content', $question->post_content);
    //$return_array['question_content'] = do_shortcode( $question->post_content );
    //pr($return_array['question_background']);
    //$return_array['question_content'] = $question->post_content;
    $return_array['has_next_question'] = (isset($posts[$next_question_index])) ? true: false;
    $return_array['progress'] = round( $next_question_index / count($posts) * 100 );
    $return_array['has_prev_question'] = (isset($posts[$prev_question_index])) ? true : false;
    /*if ($_SERVER['REMOTE_ADDR'] != '83.103.200.163' || 1==1){
        $return_array['avatar_text'] = get_post_meta($question->ID, get_avatar_type(), true);
    } else {
        $return_array['avatar_text'] = "";
    }*/
    //$return_array['avatar_text'] = get_post_meta($question->ID, get_avatar_type(), true);
    $return_array['avatar_text'] = get_post_meta($question->ID, 'avatar_text_arabic', true) . '...&nbsp;...&nbsp;...&nbsp;...&nbsp;...&nbsp;';
    $return_array['change_next_to_skip'] = get_post_meta($question->ID, "change_next_to_skip", true);

    $return_array['av_code'] = get_avatar_type();
    if ($return_array['av_code'] == '') {
        $return_array['avatar_text'] = "";
    }
    //$return_array['avatar_text'] = get_post_meta($question->ID, "avatar_text", true);
    if (get_post_meta($question->ID, "question_type", true) && 
        get_post_meta($question->ID, "question_type", true) == 'radio'){
        $return_array['question_content'] = '<h3 class="question_body">' . get_post_meta($question->ID, "question_body", true) . '</h3>';
        $return_array['question_content'] .= display_radio_question($question->ID);
    } 
    if (get_post_meta($question->ID, "question_type", true) && 
        get_post_meta($question->ID, "question_type", true) == 'checkbox'){
        $return_array['question_content'] = '<h3 class="question_body">' . get_post_meta($question->ID, "question_body", true) . '</h3>';
        $return_array['question_content'] .= display_checkbox_question($question->ID);
    } 
    if (get_post_meta($question->ID, "question_type", true) && 
        get_post_meta($question->ID, "question_type", true) == 'drag_cross'){
        $return_array['question_content'] = '<h3 class="question_body">' . get_post_meta($question->ID, "question_body", true) . '</h3>';
        $return_array['question_content'] .= display_drag_cross_question($question->ID);
    }

    if (get_post_meta($question->ID, "question_type", true) && 
        get_post_meta($question->ID, "question_type", true) == 'drag_chain_order'){
        $return_array['question_content'] = '<h3 class="question_body">' . get_post_meta($question->ID, "question_body", true) . '</h3>';
        $return_array['question_content'] .= display_drag_chain_order_question($question->ID);
    }

    if (get_post_meta($question->ID, "question_type", true) && 
        get_post_meta($question->ID, "question_type", true) == 'drag_hexagon'){
        $return_array['question_content'] = '<h3 class="question_body">' . get_post_meta($question->ID, "question_body", true) . '</h3>';
        $return_array['question_content'] .= display_drag_hexagon_question($question->ID);
    }

    if (get_post_meta($question->ID, "question_type", true) && 
        get_post_meta($question->ID, "question_type", true) == 'drag_pentagon'){
        $return_array['question_content'] = '<h3 class="question_body">' . get_post_meta($question->ID, "question_body", true) . '</h3>';
        $return_array['question_content'] .= display_drag_pentagon_question($question->ID);
    }

    if (get_post_meta($question->ID, "question_type", true) && 
        get_post_meta($question->ID, "question_type", true) == 'drag_pyramid'){
        $return_array['question_content'] = '<h3 class="question_body">' . get_post_meta($question->ID, "question_body", true) . '</h3>';
        $return_array['question_content'] .= display_drag_pyramid_question($question->ID);
    }
    //pr($return_array);

    $return_array['question_type'] = get_post_meta($question->ID, "question_type", true);
    $return_array['question_titleX'] = $question->post_title;
    $return_array['delay_next'] = get_post_meta($question->ID, 'delay_next', true);
    $return_array['youtube_video'] = get_post_meta($question->ID, 'youtube_video', true);    
    save_current_question_number($_POST['last_question']);
    echo json_encode($return_array);
    die();
}

function check_if_max_errors(){
    global $wpdb;
    $query = "SELECT errors FROM " . $wpdb->prefix . "courses WHERE user_id = " . get_current_user_id();
    $result = $wpdb->get_row($query);

    $return_array = array();
    if ($result->errors >= get_option( 'max_wrong_answer' )){
        $return_array['max_errors_reached'] = true; 
        echo json_encode($return_array);
        die();
    }
    return true;
}

function save_current_question_number($question_id){
    global $wpdb;
    $wpdb->update(
        $wpdb->prefix . 'courses',
        array(
            'question_id'   => $question_id,
        ),
        array( 'user_id' => get_current_user_id() ),
        array(
            '%d'
        )
    );

    update_user_meta( get_current_user_id(), 
        'user_last_question', 
        sanitize_text_field( $question_id ) 
    );
}

function get_user_last_question(){
    global $wpdb;

    $fake = get_the_author_meta( 'user_last_question', get_current_user_id() );
    if ($fake) {
        return $fake;
    }

    $query = "SELECT question_id FROM " . $wpdb->prefix . "courses WHERE user_id = " . get_current_user_id();
    $question_ = $wpdb->get_row($query);
    if ($question_)
        return $question_->question_id;
    else return 0;
}

function display_drag_pyramid_question($id){
    $question_type = get_post_meta($id, "question_type", true);
    $question_answer = get_post_meta($id, "question_answer", true);
    $options = get_post_meta($id, "question_options", true);
    $options = explode("|", $options);
    shuffle($options);

    $output = "";
    $output .= '<input type="hidden" id="question_type" value="'.$question_type.'" />';
    $output .= '<input type="hidden" id="question_answer" value="'.base64_encode($question_answer).'" />';

    $output .= '<div id="draggable_pyramid_options">';
    foreach ($options as $key => $value){
        $output .= '<div class="draggable drag_pyramid_options" id="drag_pyramid_option_'.$key.'"><span><br /><br /><br />' . str_replace(" ", "<br>", $value) . '</span></div>';
    }
    $output .= '</div>'; //<div id="draggable_options">
    $output .= '<div class="clear"></div>';

    $answers = get_post_meta($id, "question_answer", true);
    $answers_k = $answers;

    $answers_k = str_replace(" ", "", $answers_k);
    $answers = explode("|", $answers);

    $exploded_answers = array();
    foreach ($answers as $answer) {
        $answer = explode("::", $answer);
        $exploded_answers[$answer[0]] = $answer[1];
    }

    $output .= '<div class="pyramid_holder">';
        $output .= '<div id="pyramid_0" class="droppable pyramid_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="pyramid_1" class="droppable pyramid_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="pyramid_2" class="droppable pyramid_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="pyramid_3" class="droppable pyramid_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
    $output .= '</div>'; //'<div class="cross_to_drag">';

    return $output;
}

function display_drag_pentagon_question($id){
    $question_type = get_post_meta($id, "question_type", true);
    $question_answer = get_post_meta($id, "question_answer", true);
    $options = get_post_meta($id, "question_options", true);
    $options = explode("|", $options);
    shuffle($options);

    $output = "";
    $output .= '<input type="hidden" id="question_type" value="'.$question_type.'" />';
    $output .= '<input type="hidden" id="question_answer" value="'.base64_encode($question_answer).'" />';

    $output .= '<div id="draggable_pentagon_options">';
    foreach ($options as $key => $value){
        $output .= '<div class="draggable drag_pentagon_options" id="drag_pentagon_option_'.$key.'"><span><br /><br /><br />' . str_replace(" ", "<br>", $value) . '</span></div>';
    }
    $output .= '</div>'; //<div id="draggable_options">
    $output .= '<div class="clear"></div>';

    $answers = get_post_meta($id, "question_answer", true);
    $answers_k = $answers;

    $answers_k = str_replace(" ", "", $answers_k);
    $answers = explode("|", $answers);

    $exploded_answers = array();
    foreach ($answers as $answer) {
        $answer = explode("::", $answer);
        $exploded_answers[$answer[0]] = $answer[1];
    }

    $output .= '<div class="pentagon_holder">';
        $output .= '<div id="pentagon_0" class="droppable pentagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="pentagon_1" class="droppable pentagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="pentagon_2" class="droppable pentagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="pentagon_3" class="droppable pentagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="pentagon_4" class="droppable pentagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        //$output .= '<div id="pentagon_5" class="droppable pentagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
    $output .= '</div>'; //'<div class="cross_to_drag">';

    return $output;
}

function display_drag_hexagon_question($id){
    $question_type = get_post_meta($id, "question_type", true);
    $question_answer = get_post_meta($id, "question_answer", true);
    $options = get_post_meta($id, "question_options", true);
    $options = explode("|", $options);
    shuffle($options);

    $output = "";
    $output .= '<input type="hidden" id="question_type" value="'.$question_type.'" />';
    $output .= '<input type="hidden" id="question_answer" value="'.base64_encode($question_answer).'" />';

    $output .= '<div id="draggable_hexagon_options">';
    foreach ($options as $key => $value){
        $output .= '<div class="draggable drag_hexagon_options" id="drag_hexagon_option_'.$key.'"><span><br /><br /><br />' . str_replace(" ", "<br>", $value) . '</span></div>';
    }
    $output .= '</div>'; //<div id="draggable_options">
    $output .= '<div class="clear"></div>';

    $answers = get_post_meta($id, "question_answer", true);
    $answers_k = $answers;

    $answers_k = str_replace(" ", "", $answers_k);
    $answers = explode("|", $answers);

    $exploded_answers = array();
    foreach ($answers as $answer) {
        $answer = explode("::", $answer);
        $exploded_answers[$answer[0]] = $answer[1];
    }
//PR($exploded_answers);
    $output .= '<div class="hexagon_holder">';
        $output .= '<div id="hexagon_0" class="droppable hexagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="hexagon_1" class="droppable hexagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="hexagon_2" class="droppable hexagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="hexagon_3" class="droppable hexagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="hexagon_4" class="droppable hexagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
        $output .= '<div id="hexagon_5" class="droppable hexagon_drag_to"><span class="hidden">'.base64_encode($answers_k).'</span></div>';
    $output .= '</div>'; //'<div class="cross_to_drag">';

    return $output;
}

function display_drag_cross_question($id){
    $question_type = get_post_meta($id, "question_type", true);
    $question_answer = get_post_meta($id, "question_answer", true);
    $options = get_post_meta($id, "question_options", true);
    $options = explode("|", $options);
    shuffle($options);

    $output = "";
    $output .= '<input type="hidden" id="question_type" value="'.$question_type.'" />';
    $output .= '<input type="hidden" id="question_answer" value="'.base64_encode($question_answer).'" />';

    $output .= '<div id="draggable_options" class="cross_drag_d">';
    foreach ($options as $key => $value){
        $output .= '<div class="draggable drag_cross_options" id="drag_cross_option_'.$key.'">' . $value . '</div>';
    }
    $output .= '<div class="clear"></div>';
    $output .= '</div>'; //<div id="draggable_options">
    

    $answers = get_post_meta($id, "question_answer", true);
    $answers = explode("|", $answers);
    $exploded_answers = array();
    foreach ($answers as $answer) {
        $answer = explode("::", $answer);
        $exploded_answers[$answer[0]] = $answer[1];
    }

    $output .= '<div class="cross_holder">';
        $output .= '<div id="cross_left" class="droppable cross_drag_to">S<span class="hidden">'.base64_encode($exploded_answers['left']).'</span></div>';
        $output .= '<div id="cross_top" class="droppable cross_drag_to">H<span class="hidden">'.base64_encode($exploded_answers['top']).'</span></div>';
        $output .= '<div id="cross_right" class="droppable cross_drag_to">E<span class="hidden">'.base64_encode($exploded_answers['right']).'</span></div>';
        $output .= '<div id="cross_bottom" class="droppable cross_drag_to">L<span class="hidden">'.base64_encode($exploded_answers['bottom']).'</span></div>';
    $output .= '</div>'; //'<div class="cross_to_drag">';
    return $output;
}

function display_drag_chain_order_question($id){
    $question_type = get_post_meta($id, "question_type", true);
    $question_answer = get_post_meta($id, "question_answer", true);
    $options = get_post_meta($id, "question_options", true);
    $options = explode("|", $options);
    shuffle($options);

    $output = "";
    $output .= '<input type="hidden" id="question_type" value="'.$question_type.'" />';
    $output .= '<input type="hidden" id="question_answer" value="'.base64_encode($question_answer).'" />';

    $output .= '<div id="draggable_chain_options">';
    foreach ($options as $key => $value){
        $output .= '<div class="draggable drag_chain_options" id="drag_chain_option_'.$key.'"><br /><br /><br />' . $value . '</div>';
    }
    $output .= '</div>'; //<div id="draggable_options">
    $output .= '<div class="clear"></div>';

    $answers = get_post_meta($id, "question_answer", true);
    $answers = explode("|", $answers);
    $exploded_answers = array();
    foreach ($answers as $answer) {
        $answer = explode("::", $answer);
        $exploded_answers[$answer[0]] = $answer[1];
    }

    $output .= '<div class="chain_holder">';
        $output .= '<div id="chain_0" class="droppable chain_drag_to"><span class="hidden">'.base64_encode($exploded_answers['0']).'</span></div>';
        $output .= '<div id="chain_1" class="droppable chain_drag_to"><span class="hidden">'.base64_encode($exploded_answers['1']).'</span></div>';
        $output .= '<div id="chain_2" class="droppable chain_drag_to"><span class="hidden">'.base64_encode($exploded_answers['2']).'</span></div>';
        $output .= '<div id="chain_3" class="droppable chain_drag_to"><span class="hidden">'.base64_encode($exploded_answers['3']).'</span></div>';
        $output .= '<div id="chain_4" class="droppable chain_drag_to"><span class="hidden">'.base64_encode($exploded_answers['4']).'</span></div>';
    $output .= '</div>'; //'<div class="cross_to_drag">';

    return $output;
}

function display_radio_question($id){
    $question_type = get_post_meta($id, "question_type", true);
    $question_answer = get_post_meta($id, "question_answer", true);
    $options = get_post_meta($id, "question_options", true);
    $options = explode("|", $options);
    shuffle($options);

    $first_char = 97;

    $output = "";
    $output .= '<div class="question_answers">';
        $output .= '<input type="hidden" id="question_type" value="'.$question_type.'" />';
        $output .= '<input type="hidden" id="question_answer" value="'.base64_encode($question_answer).'" />';
        foreach ($options as $key => $value) {
            $output .= '<div class="question_option">';
            $output .= '<div class="question_option_text">' . chr($first_char++) . ') ' . trim($value) . '</div>';
            $output .= '<input id="jop_'.$key.'" class="radio_answer" type="radio" name="radio_answer" value="'.$value.'" />';
            $output .= '<label for="jop_'.$key.'"><span></span>&nbsp;</label>';
            $output .= '<br />';
            $output .= '</div>';
        }
    $output .= '</div>'; //<div class="question_answers">
    return $output;
}

function display_checkbox_question($id){
    $question_type = get_post_meta($id, "question_type", true);
    $question_answer = get_post_meta($id, "question_answer", true);
    $options = get_post_meta($id, "question_options", true);
    $options = explode("|", $options);

    $columns = get_post_meta($id, "checkbox_columns", true);
    $extra_class = "";
    if ($columns == 2)
        $extra_class = 'double_column';
    shuffle($options);

    $first_char = 97;

    $output = "";
    $output .= '<div class="question_answers">';
        $output .= '<input type="hidden" id="question_type" value="'.$question_type.'" />';
        $output .= '<input type="hidden" id="question_answer" value="'.base64_encode($question_answer).'" />';
        foreach ($options as $key => $value) {
            $output .= '<div class="question_option row_checkbox '.$extra_class.'">';
            $output .= '<input id="jop_'.$key.'" class="checkbox_answer" type="checkbox" name="checkbox_answer" value="'.$value.'" />';
            $output .= '<label for="jop_'.$key.'"><span></span>&nbsp;</label>';
            
            $output .= '<div class="question_option_text checkboxes">' . /*chr($first_char++) . ') ' .*/ trim($value) . '</div>';
            $output .= '</div>';
            
        }
    $output .= '</div>'; //<div class="question_answers">
    return $output;
}

/** generate report - after questionnaire is done**/
/** start ajaxing the questions **/
add_action('wp_ajax_generateReport', 'generateReport');
add_action('wp_ajax_nopriv_generateReport', 'generateReport');

function generateReport() {
    global $wpdb;

    $return_array = array();
    
    echo json_encode($return_array);
    die();
}




/*
global $wpdb;
$user = wp_get_current_user();
$query = "SELECT * FROM " . $wpdb->prefix . "courses WHERE user_id = " . $user->ID;
$results = $wpdb->get_results($query, OBJECT);
echo "<b>Course started at:</b> " . $results[0]->start_at . '<br />';
    echo "<b>Course ended at:</b> " . $results[0]->end_at . '<br />';
    echo "<b>Total errors:</b> " . $results[0]->errors . '<br />';

*/




/** initiate report - when questionnaire is started **/
/** start ajaxing the questions **/
add_action('wp_ajax_initiateReport', 'initiateReport');
add_action('wp_ajax_nopriv_initiateReport', 'initiateReport');

function initiateReport() {
    global $wpdb;

    $query = "SELECT * FROM " . $wpdb->prefix . "courses WHERE user_id = " . get_current_user_id();
    $report = $wpdb->get_row($query);
    if ($report){
        die();
    }
    $wpdb->insert(
        $wpdb->prefix . 'courses',
        array(
            'user_id'   => get_current_user_id(),
            'start_at'  => date("Y-m-d H:i:s")
        ),
        array(
            '%d',
            '%s'
        )
    );

    die();
}

add_action('wp_head','ajaxurl');
function ajaxurl() { ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
<?php }
/** end ajaxing the questions **/

/** User extra fields - licences number **/
add_action( 'show_user_profile', 'add_licences_number' );
add_action( 'edit_user_profile', 'add_licences_number' );

function add_licences_number( $user ){
    ?>
    <h3>User Custom Data</h3>
    <table class="form-table">
        <tr style="display: none">
            <th><label for="licences_number">Licences Number</label></th>
            <td><input type="text" name="licences_number" value="<?php echo esc_attr(get_the_author_meta( 'licences_number', $user->ID )); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="user_organization">Organization</label></th>
            <td>
                <!--<input type="text" name="user_organization" value="<?php echo esc_attr(get_the_author_meta( 'user_organization', $user->ID )); ?>" class="regular-text" />-->
                <?php 
                $user_organization = get_the_author_meta( 'user_organization', $user->ID );
                $organizations = explode("|", get_option('aviation_organizations'));
                ?>
                <select name="user_organization">
                    <?php foreach ($organizations as $key=>$value){
                        echo '<option value="'.$value.'"';
                        if ($value == $user_organization){
                            echo ' selected';
                        }
                        echo  '>' . $value.'</option>';
                    }
                    ?>
                </select>
                </td>
        </tr>

        <tr>
            <th><label for="user_job_role">Job Role</label></th>
            <td>
                <?php 
                $user_job_role = get_the_author_meta( 'user_job_role', $user->ID );
                $job_roles = explode("|", get_option('aviation_job_roles'));
                ?>
                <select name="user_job_role">
                    <?php foreach ($job_roles as $key=>$value){
                        echo '<option value="'.$value.'"';
                        if ($value == $user_job_role){
                            echo ' selected';
                        }
                        echo  '>' . $value.'</option>';
                    }
                    ?>
                </select>
                </td>
        </tr>

        <tr>
            <th><label for="user_clock_number">Clock / Service / Staff Number</label></th>
            <td><input type="text" name="user_clock_number" value="<?php echo esc_attr(get_the_author_meta( 'user_clock_number', $user->ID )); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="user_avatar_type">Avatar Type</label></th>
            <td>
                <?php $uat = esc_attr(get_the_author_meta( 'user_avatar_type', $user->ID ));?>
                <select name="user_avatar_type">
                    <option value="No Avatar">Please Select</option>
                    <?php $types = array('Arabic Avatar', 'Expat Avatar', 'Expat Lady Avatar', 'iPad Avatar');
                    foreach ($types as $type) {
                        echo '<option value="' . $type . '"';
                        if ($uat == $type) 
                            echo ' selected="selected" ';
                        echo '>' . $type . '</option>';
                    }
                    ?>
                </select>
            </td>
            
        </tr>

        <tr>
            <th><label for="user_start_time">Started the course on</label></th>
            <td><input type="text" name="user_start_time" value="<?php echo esc_attr(get_the_author_meta( 'user_start_time', $user->ID )); ?>" class="regular-text" /></td>
        </tr>

        <tr>
            <th><label for="user_course_finished">Course Finished</label></th>
            <td>
                <?php
                    $complete = get_the_author_meta( 'user_course_finished', $user->ID );
                    //pr($complete);
                    $c1 = $c2 = "";
                    if ($complete == 'on'){
                        $c1 = "checked";
                    } else {
                        $c2 = "x";
                    }
                ?>
                <input type="checkbox" name="user_course_finished" <?php echo $c1;?> /> Completed
                <!--<input type="radio" name="user_course_finished" <?php echo $c2; ?>/> Completed-->
                <!--<input type="text" name="user_course_finished" value="<?php echo esc_attr(get_the_author_meta( 'user_course_finished', $user->ID )); ?>" class="regular-text" />-->
            </td>

        </tr>

        <tr>
            <th><label for="user_feedback_sent">Feedback Sent</label></th>
            <td>
                <?php
                    $feedback_sent = get_the_author_meta( 'user_feedback_sent', $user->ID );
                    echo ($feedback_sent) ? "Yes" : "No";
                ?>
                
            </td>

        </tr>

        <tr>
            <th><label for="user_pilot_testing">Pilot testing</label></th>
            <td>
                <?php
                    $pilot = get_the_author_meta( 'user_pilot_testing', $user->ID );
                    //pr($complete);
                    $p1 = $p2 = "";
                    if ($pilot == 'on'){
                        $c1 = "checked";
                    } else {
                        $c2 = "x";
                    }
                ?>
                <input type="checkbox" name="user_pilot_testing" <?php echo $c1;?> /> Show secondary "Next" button
            </td>

        </tr>

        <tr>
            <th><label for="user_manager_name">User Manager Name</label></th>
            <td><input type="text" name="user_manager_name" value="<?php echo esc_attr(get_the_author_meta( 'user_manager_name', $user->ID )); ?>" class="regular-text" /></td>
        </tr>

        <tr>
            <th><label for="user_clock_number">Last Question</label></th>
            <td><input type="text" name="user_last_question" value="<?php echo esc_attr(get_the_author_meta( 'user_last_question', $user->ID )); ?>" class="regular-text" /></td>
        </tr>


    </table>
    <?php
}

add_action( 'edit_user_profile_update', 'save_licences_number' );

function save_licences_number( $user_id ){
    global $wpdb;
    $wpdb->update(
        $wpdb->prefix . 'courses',
        array(
            'question_id'   => $_POST['user_last_question'],
        ),
        array( 'user_id' => $user_id ),
        array(
            '%d'
        )
    );
    //echo 'here'; die();
    update_user_meta( $user_id,'licences_number', sanitize_text_field( $_POST['licences_number'] ) );
    update_user_meta( $user_id,'user_organization', sanitize_text_field( $_POST['user_organization'] ) );
    update_user_meta( $user_id,'user_clock_number', sanitize_text_field( $_POST['user_clock_number'] ) );
    update_user_meta( $user_id,'user_avatar_type', sanitize_text_field( $_POST['user_avatar_type'] ) );
    update_user_meta( $user_id,'user_last_question', sanitize_text_field( $_POST['user_last_question'] ) );
    update_user_meta( $user_id,'user_start_time', sanitize_text_field( $_POST['user_start_time'] ) );
    update_user_meta( $user_id,'user_course_finished', sanitize_text_field( $_POST['user_course_finished'] ) );
    update_user_meta( $user_id,'user_pilot_testing', sanitize_text_field( $_POST['user_pilot_testing'] ) );
    update_user_meta( $user_id,'user_manager_name', sanitize_text_field( $_POST['user_manager_name'] ) );
    //pr($_POST['user_course_finished']);die();
}

/** decrease licences number on user login **/
add_action('wp_login', 'decrease_licences_on_login', 1, 2);

function decrease_licences_on_login($user_login, $user){
    $licences = get_user_meta( $user->ID, 'licences_number', true ); 
    $new = $licences - 1;
    $x = update_user_meta( 
        $user->ID, 
        'licences_number', 
        $new
    );

    $started_at = get_the_author_meta( 'user_start_time', $user->ID );
    if (!$started_at) {
        update_user_meta( $user->ID,'user_start_time', sanitize_text_field( date('Y-m-d') ) );
    }

    //new way of handling licences (global)
    $result = count_users();
    $total_subscribers = $result['avail_roles']['subscriber'];
    $max = get_option('email_after_licence_reached');
    //var_dump($max); var_dump($total_subscribers);
    if ($max <= $total_subscribers) {
        //email for max licences number reached
        send_email_when_max_license();
        //echo 'here';
    }

    //die();
}

/** shortcode to show user licences on its profile **/
add_shortcode( 'get_licences_number', 'get_licences_number' );

function get_licences_number(){
    $licences = get_user_meta( get_current_user_id(), 'licences_number', true ); 
    return $licences;
}

add_shortcode( 'show_start_course_button', 'show_start_course_button' );
function show_start_course_button(){
    global $current_user;
    get_currentuserinfo();

    $user_id = get_current_user_id();
    $user_clock_number = get_user_meta( $user_id, 'user_clock_number', true ); 
    $user_avatar_type = get_user_meta( $user_id, 'user_avatar_type', true ); 
    $user_organization = get_user_meta( $user_id, 'user_organization', true );
    $user_manager_name = get_user_meta( $user_id, 'user_manager_name', true );
    $user_job_role = get_user_meta( $user_id, 'user_job_role', true );
    $user_firstname = $current_user->user_firstname;
    $user_lastname = $current_user->user_lastname;

    $output = "";
    $output .= "<h5>Please update your details below.</h5>";
    $output .= '<h6>THIS INFORMATION WILL BE USED TO FORM YOUR CERTIFICATE ON FINISHING THE COURSE</h6>';
    $output .= '<form method="post" id="user_info">';
    
    $output .= '<div class="row-fluid">';
        $output .= '<div class="span4">';
            $output .= '<label>Organization: </label>';
            $organizations = explode("|", get_option('aviation_organizations'));

            $output .= '<select name="user_organization" id="user_organization" class="user_info_input">';
                foreach ($organizations as $key => $value) {
                    $output .= '<option value="'.$value.'"';
                    if ($value == $user_organization) {
                        $output .= ' selected="selected" ';
                    }
                    $output .= '>'.$value.'</option>';
                }
            $output .= '</select>';

            $output .= '<label>Job Role: </label>';
            $job_roles = explode("|", get_option('aviation_job_roles'));
            $output .= '<select name="user_job_role" id="user_job_role" class="user_info_input">';
                foreach ($job_roles as $key => $value) {
                    $output .= '<option value="'.$value.'"';
                    if ($value == $user_job_role) {
                        $output .= ' selected="selected" ';
                    }
                    $output .= '>'.$value.'</option>';
                }
            $output .= '</select>';

        //<input type="text" name="user_organization" id="user_organization" value="'.$user_organization.'" class="user_info_input" />';
            
            $course_complete = get_the_author_meta( 'user_course_finished', $user_id );
            
            if ($course_complete){ $disabled_field = "disabled"; } else { $disabled_field = ""; }
            
            $output .= '<span id="error_organization" class="user_form_error">Please fill in <b>Organization</b></span>';
            $output .= '<label>First Name: </label><input type="text" name="user_first_name" id="user_first_name" value="'.$user_firstname.'" class="user_info_input" '.$disabled_field.' />';
            if ($course_complete){ $output .= '<input name="user_first_name" id="user_first_name" type="hidden" value="'.$user_firstname.'" />'; }
            $output .= '<span id="error_first_name" class="user_form_error">Please fill in <b>First Name</b></span>';
            $output .= '<label>Last Name: </label><input type="text" name="user_last_name" id="user_last_name" value="'.$user_lastname.'" class="user_info_input" '.$disabled_field.' />';
            if ($course_complete){ $output .= '<input name="user_last_name" id="user_last_name" type="hidden" value="'.$user_lastname.'" />'; }
            $output .= '<span id="error_last_name" class="user_form_error">Please fill in <b>Last Name</b></span>';
            $output .= '<label>Clock / Service / Staff Number: </label><input type="text" name="user_clock_number" id="user_clock_number" value="'.$user_clock_number.'" class="user_info_input" />';
            $output .= '<span id="error_clock_number" class="user_form_error">Please fill in <b>Clock / Service / Staff Number</b></span>';
            $output .= '<label>Your manager name: </label><input type="text" name="user_manager_name" id="user_manager_name" value="'.$user_manager_name.'" class="user_manager_name" />';
            $output .= '<span id="error_manager_name" class="user_form_error">Please fill in <b>Your manager name</b></span>';
        $output .= '</div>';
        $output .= '<div class="span8">';
            $output .= '<label>Choose your avatar</label>';
            $output .= '<p>If you are using an iPad or Android device, please select “Fahad” as your avatar.</p>';
            $avatar_type = get_the_author_meta( 'user_avatar_type', $user_id );
            $av3_checked = ($avatar_type == 'Arabic Avatar') ? 'checked' : '';
            $av1_checked = ($avatar_type == 'Expat Avatar') ? 'checked' : '';
            $av2_checked = ($avatar_type == 'Expat Lady Avatar') ? 'checked' : '';
            $av4_checked = ($avatar_type == 'iPad Avatar') ? 'checked' : '';
            $av5_checked = ($avatar_type == 'No Avatar') ? 'checked' : '';

            ob_start();
            dynamic_sidebar('cb_avatar_victor');
            $content_victor = ob_get_contents();
            ob_end_clean();

            ob_start();
            dynamic_sidebar('cb_avatar_angela');
            $content_angela = ob_get_contents();
            ob_end_clean();

            ob_start();
            dynamic_sidebar('cb_avatar_abdul');
            $content_abdul = ob_get_contents();
            ob_end_clean();

            ob_start();
            dynamic_sidebar('cb_avatar_ipad');
            $content_ipad = ob_get_contents();
            ob_end_clean();

            ob_start();
            dynamic_sidebar('cb_avatar_none');
            $content_none = ob_get_contents();
            ob_end_clean();
            
            $output .= '
            <div class="row-fluid">


                <div class="span2"><input type="radio" name="user_avatar_type" class="radio_answer" id="av_1" '.$av1_checked.' value="Expat Avatar" /><label class="me_inline" for="av_1"><span></span></label>&nbsp;&nbsp;Victor</div>
                <div class="span2"><input type="radio" name="user_avatar_type" class="radio_answer" id="av_2" '.$av2_checked.' value="Expat Lady Avatar" /><label class="me_inline" for="av_2"><span></span></label>&nbsp;&nbsp;Angela</div>
                <div class="span2"><input type="radio" name="user_avatar_type" class="radio_answer" id="av_3" '.$av3_checked.' value="Arabic Avatar" /><label class="me_inline" for="av_3"><span></span></label>&nbsp;Waleed</div>
                <div class="span2"><input type="radio" name="user_avatar_type" class="radio_answer" id="av_4" '.$av4_checked.' value="iPad Avatar" /><label class="me_inline" for="av_4"><span></span></label>&nbsp;&nbsp;Fahad</div>
                <div class="span3"><input type="radio" name="user_avatar_type" class="radio_answer" id="av_5" '.$av5_checked.' value="No Avatar" /><label class="me_inline" for="av_5"><span></span></label>&nbsp;&nbsp;No Avatar</div>
            </div>

            <div id="avatar_explain_victor" class="avatar_explain">'. $content_victor .'</div>
            
            <div id="avatar_explain_angela" class="avatar_explain">'. $content_angela .'</div>
            
            <div id="avatar_explain_abdul" class="avatar_explain">'. $content_abdul .'</div>

            <div id="avatar_explain_ipad" class="avatar_explain">'. $content_ipad .'</div>

            <div id="avatar_explain_none" class="avatar_explain">'. $content_none .'</div>

            ';
            $output .= '<p>Please click <b>Save your info</b> button below to save the changes.</p>';
        $output .= '</div>';
    $output .= '</div>';
    
    /*$output .= '<label>Avatar Type</label>';

    $output .= '<select id="user_avatar_type" name="user_avatar_type">';
        $types = array('Arabic Avatar', 'Expat Avatar', 'Expat Lady Avatar');
        foreach ($types as $type) {
            $output .= '<option value="' . $type . '"';
            if ($type == get_the_author_meta( 'user_avatar_type', $user_id )){
                $output .= ' selected="selected" ';
            }
            $output .= '>' . $type . '</option>';
        }
    $output .= '</select>';
    $output .= '<span id="error_avatar_type" class="user_form_error">Please select an <b>Avatar Type</b></span>';*/

    $output .= '<input type="submit" value="Save your info" class="user_info_submit" />';
    
    
    if ($user_clock_number &&
        $user_avatar_type &&
        $user_organization &&
        $user_manager_name &&
        $user_firstname &&
        $user_lastname) {
        $question_title = get_question_title(get_user_last_question());

        $days_left = get_days_left();
        //pr($days_left);
        //pr(get_option('aviation_max_days'));
        $output .= '<ul id="dashboard_items">';

        if (get_option('aviation_max_days') >= $days_left && $days_left >= 0){
            

            $course_complete = get_the_author_meta( 'user_course_finished', $user_id );

            if ($course_complete){
                $output .= '<li>'.get_option('aviation_course_finished').'</li>';
                $output .= '<li><a class="button" target="_blank" href="' . site_url() . '/certificates/c1/?print=pdf">Print Your Certificate</a></li>';
                $output .= '<li><a class="button" href="javascript:void(0);" id="email_certificate">Email Your Certificate</a><span id="ajax_loading"></span><div id="email_certificate_sent" style="display: none">Please check your inbox.</div></li>';
            }

            else {
                if (get_user_last_question()){
                    $output .= '<li class="warning">You have ' . get_days_left() . ' days left to finish the course.</li>';
                    $output .= '<li><a class="button" title="Questions" href="' . get_site_url() . '/questions/">Continue Course <!--(from <b>'.$question_title.'</b>)--></a></li>';
                    //$output .= '<li><a id="start_course" class="button" title="Questions" href="' . get_site_url() . '/questions/">Start</a>'.get_option('aviation_terms').'<input type="checkbox" id="term_agree" /></li>';
                } else {
                    $output .= '<li><a id="start_course" class="button" title="Questions" href="' . get_site_url() . '/questions/">Start</a>&nbsp;&nbsp;'.get_option('aviation_terms').'<input type="checkbox" class="radio_answer" id="term_agree" name="term_agree" /><label for="term_agree"><span></span></label></li>';
                    //$output .= '<li></li>';
                }
            }

        } else {
            $output .= '<li><h2>' . get_option('aviation_max_days_reached') . '</h2></li>';
            $course_complete = get_the_author_meta( 'user_course_finished', $user->ID );

            if ($course_complete)
                $output .= '<li>'.get_option('aviation_course_finished').'</li>';
            else 
                $output .= '<li>' . get_option('aviation_course_not_finished') . '</li>';
        }

        $output .= '</ul>';
    } 
    
    $output .= '</form>';
    return $output;
}

function get_days_left(){
    global $current_user;
    get_currentuserinfo();

    $user_id = get_current_user_id();
    $start_time = get_the_author_meta( 'user_start_time', $user_id );

    $start_time = new DateTime($start_time);
    $end_time = $start_time->add(new DateInterval('P2D'));

    //$end_time = new DateTime(date('Y-m-d'));
    $diff = $start_time->diff($end_time);

$Date1 = get_the_author_meta( 'user_start_time', $user_id );
$date = new DateTime($Date1);
$date->add(new DateInterval('P'.get_option('aviation_max_days').'D')); // P1D means a period of 1 day
$Date2 = $date->format('Y-m-d');

//pr($Date1);
//pr($Date2);

$start_time = new DateTime($Date1);
$end_time = new DateTime($Date2);
$diff = $start_time->diff($end_time);

$today = new DateTime(date('Y-m-d'));
$passed = $start_time->diff($today);
//pr($start_time);
    return get_option('aviation_max_days') - $passed->days;
}

function save_user_info(){
    //echo "<pre>"; var_dump($_POST); echo "</pre>"; die();
    if ($_POST){
        global $current_user;
        get_currentuserinfo();

        $user_id = get_current_user_id();

        update_user_meta( $user_id,'licences_number', sanitize_text_field( get_option( 'initial_licences_number' ) ) );
        update_user_meta( $user_id,'user_organization', sanitize_text_field( $_POST['user_organization'] ) );
        update_user_meta( $user_id,'user_job_role', sanitize_text_field( $_POST['user_job_role'] ) );
        update_user_meta( $user_id,'user_clock_number', sanitize_text_field( $_POST['user_clock_number'] ) );
        update_user_meta( $user_id,'user_avatar_type', sanitize_text_field( $_POST['user_avatar_type'] ) );
        update_user_meta( $user_id,'first_name', sanitize_text_field( $_POST['user_first_name'] ) );
        update_user_meta( $user_id,'last_name', sanitize_text_field( $_POST['user_last_name'] ) );
        update_user_meta( $user_id,'user_manager_name', sanitize_text_field( $_POST['user_manager_name'] ) );

        return "<h5>Your user info is now saved.<br />You may start your course.</h6>";
    }
}

function get_question_title($last_question){
    global $wpdb;

    $args = array(
        'post_type'     => 'aviation-questions',
        'posts_per_page' => -1
    );

    $posts = query_posts( $args );

    $question = $posts[$last_question];
    if ($question){
        return get_post_meta($question->ID, "slide_header", true);
    } else {
        return NULL;
    }
}

add_shortcode( 'news-widget', 'get_latest_articles' );

function get_latest_articles($atts, $content = null) {
    extract(shortcode_atts(array(
        'numberposts' => 2,
        'category' => get_cat_ID( 'Blog' )
    ), $atts ) );

    $limit = 2;

    $query_args = array(
        'numberposts' => 2,
        'category' => get_cat_ID( 'News' )
    );

    $posts = get_posts( $query_args );

    $output = "";

    foreach ( $posts as $post ) : setup_postdata( $post );
        $output .= '<div class="footer_article">';
            $output .= '<a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a><br />';
            $output .= get_the_excerpt();
            $output .= '<br /><br />';
        $output .= '</div>';
    endforeach;

    //pr($posts);

    return $output;
}

function show_force_next(){
    $user_id = get_current_user_id();
    $pilot = get_the_author_meta( 'user_pilot_testing', $user_id );
    if ($pilot) { ?>
        <div id="force_next">Next</div>
    <?php } 
}

function __my_registration_redirect()
{
    return home_url( '/user-dashboard/' );
}
add_filter( 'registration_redirect', '__my_registration_redirect' );

