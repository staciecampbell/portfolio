<?php

/*
	Template Name: Full Page, No Sidebar
*/

get_header();  ?>
  
</div> <!-- /.main -->

<div class="about" id="about">
	<div class="container">
		<a href="#" class="menu sticker" ><i class="fa fa-bars" id="go"></i></a>

		<nav class="nav-2 position position2">
			<a href=""><i class="fa fa-times exit"></i></a>
			<ul>
				<li><a href="#top">home</a></li>
				<li><a href="#about">about</a></li>
				<li><a href="#portfolio">portfolio</a></li>
				<li><a href="#contact">contact</a></li>
			</ul>
		</nav>
		<h1 class="title" id="about2">about</h1>
		<div class="about-content">
			<p class="right">Hi! I’m Stacie Campbell, a front-end developer and designer located in Toronto, Canada. Originally from Vancouver, I moved across the country for a new adventure and to pursue a career in design. After completing my degree in Fashion Communication (BDes) at Ryerson
			University,</p>
			<p class="left">I decided to diversify my skills and turned to front-end web development. I believe in creating user-friendly, aesthetically pleasing websites using the latest technologies and best practices. To view my resume click <a href="http://staciecampbell.ca/resume.pdf" target="_blank" class="resume"><strong>here.</strong></a></p>
		</div>

		<div class="about-mobile">
			<p>Hi! I’m Stacie Campbell, a front-end developer and designer located in Toronto, Canada. Originally from Vancouver, I moved across the country for a new adventure and to pursue a career in design. After completing my degree in Fashion Communication (BDes) at Ryerson
			University, I decided to diversify my skills and turned to front-end web development. I believe in creating user-friendly, aesthetically pleasing websites using the latest technologies and best practices. To view my resume click <a href="http://staciecampbell.ca/resume.pdf" target="_blank" class="resume"><strong>here.</strong></a></p>
		</div>
		<svg class="line4" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
		<style type="text/css">
			.st0{fill:none;stroke:#000000;stroke-width:3;stroke-miterlimit:10;}
		</style>
		<g>
			<path class="st0" d="M55.3,5.2c0,8.9-10,8.9-10,17.8c0,8.9,10,8.9,10,17.8c0,8.9-10,8.9-10,17.8c0,8.9,10,8.9,10,17.8
				c0,8.9-10,8.9-10,17.8"/>
		</g>
		</svg>

		<a href="#home" class="sticker2 top"><i class="fa fa-chevron-up"></i></a>
	</div>
</div>

<div class="portfolio-header" id="portfolio">
	<div class="container">
		<h1 class="title">portfolio</h1>

		 <?php if (have_posts()) while (have_posts()): the_post(); ?>
		 	 	<?php the_field('project_title'); ?>
		 		<?php the_field('short_description'); ?>
		 		<?php the_field('technologies'); ?>
		 		<?php the_field('portfolio_image'); ?>
      <?php endwhile; ?>
	  <?php
      $projectTerms = wp_get_post_terms( $post->ID, 'project_type' );	

      $projectQuery = new WP_Query( 
      	array( 
      		'posts_per_page' => 4, 
      		'post_type' => 'portfolio', 
      		'project_type' => $projectTerms, 
      		'post__not_in' => array( $post->ID )  
      		) 
      ); ?>

	<div class="flex-parent">
      <?php if ( $projectQuery->have_posts() ) : ?>
      	<?php while ($projectQuery->have_posts()) : $projectQuery->the_post(); ?>
      		<?php $current_post_id = $post->ID; ?>
      		<div class="flex-parent">
      		<div <?php post_class();?> id="<?php echo $current_post_id; ?>">
     			<div class="details">
					<h2 class="portfolio"><?php the_field('project_title'); ?></h2>
					<h3 class="short-desc"><?php the_field('short_description'); ?></h3>
					<p class="description"><?php the_field('technologies'); ?></p>
					<p class="test"><a href=" <?php the_field('view_live'); ?> " target="_blank" class="live">view it live</a></p>
				</div>
			</div>
		
			<div class="images">
			      <?php $image = get_field('portfolio_image'); ?>
			      <img src="<?php echo $image['sizes']['large'] ?>">
			</div>
	
      		<?php echo get_the_post_thumbnail( $post->ID); ?> 
      		<a href="<?php the_permalink(); ?>">
      			<?php  ?>
      		</a>
      		</div>
      	<?php endwhile; ?>



      	
      	<?php wp_reset_postdata(); ?>
      	
      <?php else:  ?>
      	
      <?php endif; ?>

   	</div>


	</div>
	<svg class="line5" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
		<style type="text/css">
			.st0{fill:none;stroke:#000000;stroke-width:3;stroke-miterlimit:10;}
		</style>
		<g>
			<path class="st0" d="M55.3,5.2c0,8.9-10,8.9-10,17.8c0,8.9,10,8.9,10,17.8c0,8.9-10,8.9-10,17.8c0,8.9,10,8.9,10,17.8
				c0,8.9-10,8.9-10,17.8"/>
		</g>
		</svg>
</div>


<div class="contact" id="contact">
	<div class="container">
		<h1 class="title">contact</h1>
	
		
		<!--   <?php // Start the loop ?>
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		    <!-- <h2><?php the_title(); ?></h2> -->
		    <?php the_content(); ?>

		  <?php endwhile; // end the loop?>
	</div>
</div>

<?php get_footer(); ?>