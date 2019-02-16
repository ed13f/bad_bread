<? /* Template Name: Contact */ ?>
<?php get_header(); ?>
<main>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="flex content-width contact-content-wrapper">
			<section id="contact-main-section"> 
				<article class="content-wrapper">
					<h1>Lets Talk Business</h1>
					<?php the_content(); ?>	
				</article>
			</section>	
			<section id="contact-map">
				<aside id="contact-aside">					
					<article id="contact-wrapper">
						<h2 class="contact-h2">Contact Info</h2>
						<p>Phone Number:<em><?php the_field('phone_number'); ?></em></p>
						<p>Email:<em><?php the_field('email'); ?></em></p>
					</article>
					<article id="hours-wrapper">
					<h2 class="contact-h2">Operating Hours</h2>	
						<ul>
							<li><b>Monday:</b><span> <?php the_field('monday_hours'); ?></li></span>
							<li><b>Tuesday:</b><span> <?php the_field('tuesday_hours'); ?></li></span>
							<li><b>Wednesday:</b><span> <?php the_field('wednesday_hours'); ?></li></span>
							<li><b>Thursday:</b><span> <?php the_field('thursday_hours'); ?></li></span>
							<li><b>Friday:</b><span> <?php the_field('friday_hours'); ?></li></span>	
						</ul>	
					</article>		
				</aside>		
			</section>
		</div>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>