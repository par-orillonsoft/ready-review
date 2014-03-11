<?php
/*
Template Name: Full Page
*/
?>
<?php get_header(); ?>

<!-- CONTENT -->
<div class="row content">
	<div class="sixteen columns leftcontent">
		
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-thumb' ); ?>
		
        <h1><?php the_title(); ?></h1>
		
        <!-- post -->
        <div class="post">
        
            <p><?php if($image){ ?><a href="<?php echo $postaffurl; ?>" rel="nofollow"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" align="left" class="affiliate-image"></a><?php } ?>
				<?php the_content();
                wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:','cwp'), 'after' => '</div>' ) );
                ?>
			</p>
        
        </div>
        <!-- end post -->
        
        <?php comments_template(); // Get wp-comments.php template ?>
		
		<?php endwhile; endif; ?>
	
		
	</div><!--end of .sixteen column -->
	
	<?php get_footer(); ?>