<?php 
$thenum = 3;$similar_heading = cwp('similar_heading');if(isset($similar_heading) && $similar_heading != '')
	$theheading = $similar_heading;
else 
	$theheading = 'Similar Posts';	
$args=array(
'post__not_in' => array($post->ID),
'showposts'=> $thenum,
'cat'=> $relatedCategory
);
$related_query = new WP_Query($args); 
?>
<?php if($related_query->have_posts()) : ?>
<div class="similarposts">
	<div class="similarheading"><?php echo $theheading; ?></div>
	<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
	<?php $smallimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small-thumb' ); ?>
	<div class="row similarpost">
    	<div class="sixteen columns">
        	<?php if($smallimage){ ?><a href="<?php the_permalink(); ?>"><img src="<?php echo $smallimage[0]; ?>" width="100" align="left" style="margin:0 10px 10px 0;" alt="<?php the_title(); ?>"></a><?php } ?>
        	<div class="righttitle"><?php the_title(); ?></div>
			<?php cwp_excerpt('20'); ?>
            <div class="readmore"><a href="<?php the_permalink(); ?>"><?php _e('Read More','cwp'); ?> &raquo;</a></div>
        </div>
	</div>
	<?php endwhile; ?>
	<div class="clear"></div>
</div>
<?php endif; wp_reset_query();?>