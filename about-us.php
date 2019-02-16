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
		    		<?php the_content(); ?>
		    	</article>	
		    	<article id="about-below-content" class="content-wrapper">
		    		<h2 class="about-header">Testimonials</h2>
					<article id="quote-container">
						<ul class="quote-wrapper">
							<?php if( $quotes->have_posts() ) : while( $quotes->have_posts() ) : $quotes->the_post(); ?>
									<li><?php the_field('quote')?>&nbsp;<span class="quote-marks"> <img src="http://psp.ricodesantis.com/wp-content/uploads/2018/04/quote-marks-upright.png"></span>
									<div class="author">- <?php the_field('author')?></div>
									</li>
								<?php $count += 1; ?>
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
				    		
				    		<p class="phone-number"><i class="fa fa-phone" style="font-size:20px;color:#3a3a3a;"></i>&nbsp;<em><?php echo $phone_number; ?></em></p>
							<p class="email"><i class="fa fa-address-card-o" style="font-size:18px;color:#3a3a3a;"></i>&nbsp;<em><?php echo $email; ?></em></p>
						</div>
					</div>	
					</article>
					<article id="hours-wrapper">
		    	</article>
			</section>
		</div>	
		<section id="contact-form" class="content-wrapper">
    		<h2 class="about-header">Lets Connect</h2>
			<form class="form" action="/action_page.php">
				<div class="row row-1">
					<div class="column-1">
						<label>Name:</label>
				  		<input type="text" name="firstname">
			  		</div>
			  		<div class="column-2">
						<label>Location:</label>
				  		<input type="text" name="lastname">
			  		</div>
			  			<div class="column-2">
						<label>Phone Number:</label>
				  		<input type="text" name="lastname">
			  		</div>
			  			<div class="column-2">
						<label>Email:</label>
				  		<input type="text" name="lastname">
			  		</div>
				</div>
				<di class="row row-3">
					<div class="column-1 comment-input">
						<label>Description:</label>
				  		<input type="text" name="firstname">
			  		</div>
			  		<div class="column-2 submit">
						<input type="submit" value="Submit">
			  		</div>
				</div>		
			</form> 
    	</section>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>