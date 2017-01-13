<?php if (get_theme_option('footer_show_widgets')) :
	if ('4' == get_theme_option('footer_widgets_columns')) {
		if (basename(get_page_template()) != 'page-dashboard.php' &&
			basename(get_page_template()) != 'page-questions.php' &&
			basename(get_page_template()) != 'page-questionnaire.php')
		get_template_part('includes/templates/footer/4columns');
	} else {
		get_template_part('includes/templates/footer/3columns');
	}
endif; ?>

<div class="footer-wrap">
	<div class="blue-line-wrap">
		<footer class="container">
			<div class="copyright pull-left">
				<?php echo get_theme_option('footer_note'); ?>
                
			</div>
		</footer>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>