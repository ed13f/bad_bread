<?php /* Template Name: About Us */ 
$portrait = get_field('portrait_picture');
$founder_info = get_field('founder_info');
$phone_number = get_field('phone_number');
$email = get_field('email');

?>
<?php $args = array(
       	'post_type' => 'testimonials',
        'posts_per_page' => -1
    );
    $quotes = new WP_Query( $args );
    wp_reset_postdata();
?>      
<?php get_header(); ?>
<main>
		
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="flex content-width">
			<section id="about-content-section">
				<h1 class="about-header">Who We Are</h1>
				<article id="about-main-content" class="content-wrapper">
					<div class="slider-wrapper mobile-info">
			    		<div class="sider-column-1">
			    			<img class="portrait-image" src="<?php echo $portrait ?>" />
			    		</div>
			    		<div class="sider-column-2">
			    			<div class="name"><strong>B</strong>renda <strong>A</strong>. <strong>D</strong>e Santis</div>	
			    			<div class="title">Owner/Operator</div>		
				    		
				    		<p class="phone-number"><i class="fa fa-phone"></i>&nbsp;<em><?php echo $phone_number; ?></em></p>
							<p class="email"><i class="fa fa-envelope"></i>&nbsp;<em><?php echo $email; ?></em></p>
						</div>
					</div>
		    		<?php the_content(); ?>
		    	</article>	
		    	<article id="about-below-content" class="content-wrapper">
		    		<h2 class="about-header">Testimonials</h2>
					<article id="quote-container">
						<ul class="quote-wrapper">
							<?php if( $quotes->have_posts() ) : while( $quotes->have_posts() ) : $quotes->the_post(); ?>
									<li><?php the_field('quote')?>
									<div class="author">- <?php the_field('author')?></div>
									</li>
							<?php endwhile; endif; ?>
						</ul>
					</article>
		    	</article>

		    </section>
		    <section id="about-location-section">	
		    	<article id="about-locations-content" class="content-wrapper">
		    		<h2 class="service-header">Lets Connect</h2>
		    		<div class="slider-wrapper">
			    		<div class="sider-column-1">
			    			<img class="portrait-image" src="<?php echo $portrait ?>" />
			    		</div>
			    		<div class="sider-column-2">
			    			<div class="name"><strong>B</strong>renda <strong>A</strong>. <strong>D</strong>e Santis</div>	
			    			<div class="title">Owner/Operator</div>		
				    		
				    		<p class="phone-number"><i class="fa fa-phone"></i>&nbsp;<em><?php echo $phone_number; ?></em></p>
							<p class="email"><i class="fa fa-envelope"></i>&nbsp;<em><?php echo $email; ?></em></p>
						</div>
					</div>	
				</article>
			</section>
		</div>	
		<section id="contact-form" class="content-wrapper">
    		<h2 class="about-header">Lets Connect</h2>
			<form class="form" id="mailchimp" method="post" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
				<input type="hidden" name="action" value="mailchimpsubscribe" />
				<div class="row row-1">
					<div class="column">
						<label for="fullname">Name*</label>
				  		<input id="fullname" type="text" name="fullname" autocomplete="off">
			  		</div>
			  		<div class="column">
						<label for="location">Location*</label>
				  		<input id="location" type="text" name="location" autocomplete="off">
			  		</div>
			  			<div class="column">
						<label for="phone_number">Phone Number*</label>
				  		<input id="phone_number" type="text" name="phone_number" autocomplete="off">
			  		</div>
			  			<div class="column">
						<label for="email">Email*</label>
				  		<input id="email" type="text" name="email" autocomplete="off">
			  		</div>
				</div>
				<div class="row row-3">
					<div class="column comment-input">
						<label for="description">Description*</label>
				  		<input id="description" type="text" name="description" autocomplete="off">
			  		</div>
			  		<div class="column submit">
						<input type="submit" value="Submit">
			  		</div>
				</div>		
			</form> 
    	</section>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>