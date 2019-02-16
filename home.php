<?php /* Template Name: Home */ ?>
<?php $page_ids = get_all_page_ids(); ?>


<?php get_header(); ?>
<main>
	<section class="flex content-width home-content-container">
		<section id="home-main-content">
			<h1>5 Star Pool Care Inc.</h1>	
			<?php while ( have_posts() ) : the_post(); ?>	
				<article class="home-content-section">
					<?php the_content(); ?>
				</article>
				<?php foreach($page_ids as $page) { ?>
					<?php if (get_the_title($page) != "Home" && get_the_title($page) != "Private: WPForms Preview" && get_the_title($page) != "Contact") { ?>
						<article class="home-image-article">
							<div class="home-image-container">
								<h2 class="home-image-title"><?php echo get_the_title($page); ?></h2>
								<div class="home-image-screen active"></div>
								<a class="home-link-page slideRight" href="<?php  echo get_permalink($page); ?>">See More</a>
								<img class="home-page-img" src="<?php echo get_the_post_thumbnail_url($page); ?>" alt="<?php echo get_the_title($page); ?> Image" >		
							</div>
							<p><?php echo the_field("homepage_excerpt",$page);?></p>
						</article>
					<?php } ?>
				<?php } ?>	
			<?php endwhile; ?>
		</section>
		<section id="aside-hours">	
			<aside>
				<h2 class="service-header">Contact Us</h2>
		    	<p><?php the_field('service_locations')?></p>
		    	
			    
			</aside>
		</section>
	</section>
</main>
<?php get_footer(); ?>
