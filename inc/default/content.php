<?php while(has_sub_field("content")): $e++; ?>
<?php $layout = get_row_layout(); ?>

	<?php if(get_row_layout() == "row"): ?>

	<div id="<?php the_sub_field('anchor'); ?>" class="row clearfix <?php the_sub_field('classname'); ?>" style="background: url(<?php the_sub_field('row_background'); ?>);">
		<div class="container">
			<?php $total_columns = count( get_sub_field('column')); ?>
			<?php while (has_sub_field('column')) : ?>

				<div class="break-on-mobile span <?php if( get_sub_field('center_box') ): ?>four<?php else:  ?>six<?php endif; ?> <?php if( get_sub_field('hideonmobile') ): ?>hide-on-mobile<?php else:  ?><?php endif; ?>" style="<?php the_sub_field('css'); ?>;">
					<?php if( get_sub_field('center_box') ): ?>
						<div class="center-container ">
					        <div class="center"></div>
					        <div class="centered">
					        	<div class="box">
					        		<div class="inner">
						        		<span class="icon-star"></span>
						        		<?php the_sub_field('content'); ?>
					        		</div>
					        		<div class="bottom"></div>
					        	</div>
					        </div>
				        </div>	
					<?php else:  ?>
						<div class="content clearfix">
							<?php the_sub_field('content'); ?>
						</div>
					<?php endif; ?>	
				</div>
			<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>
<?php endwhile; ?>