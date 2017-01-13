<?php get_header(); ?>
wow, I am on single-aviation-questions.php!!
<div class="white-wrap container">
	<section class="blog-style-wrap">
		<div class="row">
			<div class="span12">
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-wrap');?>>
						<h1 class="post-title-h1"><?php the_title(); ?></h1>
						<div class="simple-text-14"><?php the_content(); ?></div>
					</article>

					<?php appic_post_pagination(); ?>

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
<?php get_footer(); ?>