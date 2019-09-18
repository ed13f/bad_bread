<?php /* Template Name: Gallery */ ?>
<?php $args = array(
       	'post_type' => 'galleries',
        'posts_per_page' => -1
    );
    $gallery = new WP_Query( $args );
    wp_reset_postdata();
?>      
<?php get_header(); ?>
<main>
	<?php while ( have_posts() ) : the_post(); ?>
	   <?php the_content(); ?>
	<?php endwhile; ?>
	<section  class="content-width">
		<h1>Check Out Our Favorite Meals</h1>
		<aside>
			<div id="img-show-screen"></div>
			<div id="right-arrow" class="arrow chevron right"></div>
			<div id="left-arrow" class="arrow chevron left"></div>
			<div class="exit-screen">&times;</div>
		</aside>	
		<?php $count = 0; ?>
		<div id="gallery-wrapper">
			<?php if( $gallery->have_posts() ) : while( $gallery->have_posts() ) : $gallery->the_post(); ?>
				<article id="image-card" class='gallery-img'>
					<div class="photo-screen image-hover"></div>
					<img id="image-<?php echo $count ?>" src="<?php the_field('image') ?>" >
					<h2><?php echo get_the_title(); ?></h2>
				</article>
				<?php $count += 1; ?>
			<?php endwhile; endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>