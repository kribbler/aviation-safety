<?php 
send_email_when_printing_certificate();

include ( 'mpdf/mpdf.php' );
					$mpdf		=	new mPDF( get_bloginfo( 'charset' ) );
					$mpdf		=	new mPDF('+aCJK');
					$user_info	=	get_userdata( $post->post_author );
					$mpdf->SetAutoFont(AUTOFONT_ALL);
					$mpdf->SetAuthor( $user_info->display_name );
					$mpdf->SetTitle( $post->post_title );
					$mpdf->SetSubject( get_bloginfo( 'blogdescription' ) );

global $current_user;
				    get_currentuserinfo();

				    $user_id = get_current_user_id();
				    $user_clock_number = get_user_meta( $user_id, 'user_clock_number', true ); 
				    $user_organization = get_user_meta( $user_id, 'user_organization', true );
				    $user_firstname = $current_user->user_firstname;
				    $user_lastname = $current_user->user_lastname;
				    
				    $my_content = $post->post_content;
				    $my_content = str_replace("{USER_DATA}", $user_firstname . ' ' . $user_lastname . ' ' . $user_clock_number, $my_content);
				    $my_content = str_replace("{DATE}", date("d-m-Y"), $my_content);
				    $my_content = str_replace("{USER_ORANIZATION}", $user_organization, $my_content);

					$html = '<div class="container" >
								<!--<div class="title"><h1><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></h1></div><br/>-->
								<div class="content">' . apply_filters( 'the_content', $my_content ) . '</div>
								<div id="cert_bg"></div>
							</div>';
//echo $html;die();
$mpdf->WriteHTML( ( $html ) );
					$mpdf->Output('certificates/' . $user_firstname . '-' . $user_lastname . '-' . $user_clock_number . '.pdf', 'F');
					header('Location: '. 'http://cjaviationsafety.co.uk/certificates/' . $user_firstname . '-' . $user_lastname . '-' . $user_clock_number . '.pdf');
					$mPDF->Output();
					unset( $user_info );
					unset( $html );
					unset( $mpdf );
					die();
					
?>

<?php get_header(); ?>

<div class="whiteish margin_40">
	<div class="container page-content">
		<?php if (have_posts()): ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php //echo do_shortcode( '[printfriendly]' );?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part('404'); ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
