<?php 
ThemeFlags::set('hide_breadcrumbs', true);
?>

<?php get_header(); ?>
<style type="text/css">
	.action-area-mini{
		display: none !important;
	}
</style>
<div class="white-wrap container page-content home-bg">
	<?php echo do_shortcode('[rev_slider home-page]');?>
	<div id="home-page-inside">
	<?php if (have_posts()): ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="row-fluid">
				<div class="span8">
					<br /><h1><?php echo the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>

<div class="clearfix"></div>

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
<?php get_footer('home'); ?>