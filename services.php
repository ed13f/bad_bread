<? /* Template Name: Services */ ?>
<?php get_header(); ?>
<main>
	<?php while ( have_posts() ) : the_post(); ?>
	    <section class="service-main-content">
	    	<h1 class="content-width">Pool Service Made Simple</h1>
	    	<article class="content-gutter content-wrapper content-width"><?php the_content(); ?></article>
	    </section>
	    <section id="Residential" class="services-section">
	    	<img class="section-image" src="<?php the_field('residential_image'); ?>" />
	    	<h2 class="section-header">Sweet Treats</h2>
	    	<article class="flex service-article content-width">
		    	<p class="content-gutter content"><?php the_field('residential_content')?></p>
		    	<artcile class="service-article-container">
		    		<h3>Our Favorites</h3>
			    	<?php the_field('residential_side_content')?>
			    </artcile>
		    </article>
	    </section>
	    <section id="Commercial" class="services-section">
	    	<img class="section-image" src="<?php the_field('commercial_image'); ?>" />
	    	<h2 class="section-header">Savory Meals</h2>
	    	<article class="flex service-article content-width">
		    	<p class="content-gutter content"><?php the_field('commercial_content')?></p>
		    	<artcile class="service-article-container">
		    		<h3>Our Favorites</h3>	
			    	<?php the_field('commercial_side_content')?>
			    </artcile>
		    </article>
	    </section>	
	    <section id="Repairs-remodels" class="services-section">
	    	<img class="section-image" src="<?php the_field('repairs_and_remodels_image'); ?>" />
	    	<h2 class="section-header">Unique dishes</h2>
	    	<article class="flex service-article content-width">
		    	<p class="content-gutter content"><?php the_field('repair_and_remodel_content')?></p>
		    	<artcile class="service-article-container">
		    		<h3>Our Favorites</h3>	
		    		<?php the_field('repair_and_remodel_side_content')?>
		    	<article>
		    </article>
	    </section>	
    <?php endwhile; ?>
</main>   
<?php get_footer(); ?>