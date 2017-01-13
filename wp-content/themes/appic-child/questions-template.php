<?php
/**
* WP Post Template: Question Post Template
*/
?>
<?php get_header(); ?>

	<section class="action-area-mini">
		<div class="container heading">
			<?php $slide_header = get_post_meta( $post->ID, 'slide_header', true ); ?>
			<?php echo $slide_header; ?>
		</div>
	</section>

wow, I am on questions-template.php!!
<div class="white-wrap container">
	<section class="blog-style-wrap">
		<div class="row">
			<div class="span12">
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-wrap');?>>
						<!--<h1 class="post-title-h1"><?php the_title(); ?></h1>-->
						<div class="simple-text-14"><?php the_content(); ?></div>

					</article>

					<?php //appic_post_pagination(); ?>


				<?php endwhile; ?>
			<?php endif; ?>

			</div>
			<aside class="span4" style="display: none">
				<div class="aside-wrap">
				<?php get_sidebar(); ?>
				</div>
			</aside>
		</div>
	</section>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function($){
	console.log('touched');
	$("#drag .draggable").draggable({
		cursor: 'move',
		revert: 'invalid',
		revertDuration: 900,
		opacity: 0.5,
		create: function(){$(this).data('position',$(this).position())},
		//cursorAt:{left:15},
		start:function(){$(this).stop(true,true)}
	});

	/*
	$("#drop_1").droppable({
		accept: '.draggable',
		activeClass: 'drp',
		//tolerance: 100,
		drop: function(event, ui){
			snapToMiddle(ui.draggable,$(this));
			$(this).addClass('highlight');
			$(this).removeClass('droppable');
		}
	});

	$("#drop_2").droppable({
		accept: '.draggable',
		activeClass: 'drp',
		//tolerance: 100,
		drop: function(event, ui){
			snapToMiddle(ui.draggable,$(this));
			$(this).addClass('highlight');
			$(this).removeClass('droppable');
		}
	});

	$("#drop_3").droppable({
		accept: '.draggable',
		activeClass: 'drp',
		//tolerance: 100,
		drop: function(event, ui){
			snapToMiddle(ui.draggable,$(this));
			$(this).addClass('highlight');
			$(this).removeClass('droppable');
		}
	});*/

	
	$(".droppable").droppable({
		accept: ".draggable",
		activeClass: "drp",
		//tolerance: 'pointer',
		drop: function(event, ui){
			snapToMiddle(ui.draggable,$(this));
			$(this).addClass('highlight');
			var dragged_id = $(ui.draggable).attr("id");
			//disable this box to accept other drops
			$(this).droppable('option', 'disabled', true);
			$("#drag_" + dragged_id).removeClass('draggable');
		}
	});
	
	function snapToMiddle(dragger, target){
	    var topMove = target.position().top - dragger.data('position').top + (target.outerHeight(true) - dragger.outerHeight(true)) / 2;
	    var leftMove= target.position().left - dragger.data('position').left + (target.outerWidth(true) - dragger.outerWidth(true)) / 2;
	    dragger.animate({top:topMove,left:leftMove},{duration:600,easing:'easeOutBack'});
	}

});
</script>

<script type="text/javascript">
jQuery(document).ready(function(){
	//first disable next link
	$('.wp-post-navigation-next a').bind('click', false);
	
	var can_go_next = true;

	window.setInterval(show_next_button, 2000);

	if ($('#question_type')){
		var question_type = $('#question_type').val();
		if (question_type){
			can_go_next = false;
		}
		var question_answer = $('#question_answer').val();
		question_answer = atob(question_answer);
		if (question_type == 'radio'){
			$('.radio_answer').click(function(){
				if (question_answer == $('input[name=radio_answer]:checked').val()){
					can_go_next = true;
					show_next_button();
				} else {
					can_go_next = false;
					$('.wp-post-navigation-next').hide();
					$("input[type=radio]").attr('disabled', true);
				}
			})
			
		}
	}

	function show_next_button(){
		if (can_go_next){
			$('.wp-post-navigation-next').show();
			$('.wp-post-navigation-next a').css('color', '#fff');
			$('.wp-post-navigation-next a').unbind('click');
		}
	}
});
</script>
<?php get_footer(); ?>