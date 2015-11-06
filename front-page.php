<?php

/*
	Template Name: Full Page, No Sidebar
*/

get_header();  ?>

<div class="main">
  <div class="container">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300|Montserrat: 400,700' rel='stylesheet' type='text/css'>
  <svg class="logo" version="1.1" id="Layer_1" x="0px" y="0px" width="218.592px" height="220.092px" viewBox="0 0 218.592 220.092">
  <g>
  	<path class="path" fill="none" stroke="#000000" stroke-width="4" stroke-miterlimit="10" d="M109.296,6.546c57.161,0,103.5,46.339,103.5,103.5
  		s-46.339,103.5-103.5,103.5s-103.5-46.339-103.5-103.5S52.135,6.546,109.296,6.546"/>
  	<text transform="matrix(1 0 0 1 61.6328 100.438)"><tspan x="0" y="0" font-family="'Montserrat'" font-size="30" font-weight="bold" letter-spacing="">stacie </tspan><tspan x="-27.328" y="38.4" font-family="'Montserrat'" font-weight="bold" font-size="30">campbell</tspan></text>
  </g>
  </svg>

    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <!-- <h2><?php the_title(); ?></h2> -->
      <?php the_content(); ?>

    <?php endwhile; // end the loop?>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<div class="about">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 360 360" style="enable-background:new 0 0 360 360;" xml:space="preserve">
<style type="text/css">
	.st0{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
</style>
<g>
	<path class="st0" d="M49,14c0,14.8-20,14.8-20,29.6c0,14.8,20,14.8,20,29.6C49,88,29,88,29,102.8c0,14.8,20,14.8,20,29.6
		c0,14.8-20,14.8-20,29.6"/>
</g>
</svg>
	<div class="container">
		<a href="#" class="menu sticker" ><i class="fa fa-bars" id="go"></i></a>
		<nav class="nav-2 position position2">
			<a href=""><i class="fa fa-times exit"></i></a>
			<ul>
				<li><a href="#">home</a></li>
				<li><a href="#">about</a></li>
				<li><a href="#">portfolio</a></li>
				<li><a href="#">contact</a></li>
			</ul>
		</nav>
		<h1 class="title" id="about">about</h1>
		<div class="about-content">
			<p>Hi! I’m Stacie Campbell, a front-end developer and designer located in Toronto, Canada. Originally from Vancouver, I moved across the country for a new adventure and to pursue a career in design. After completing my degree in Fashion Communication (BDes) at Ryerson
			University</p>
			<p>I decided to diversify my skills and turned to front-end web development. I believe in creating user-friendly, aesthetically pleasing websites using the latest technologies and best practices. To view my resume click <a href="resume.html" class="resume">here.</a></p>
		</div>
	</div>
</div>

<div class="portfolio-header">
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

      // Next, let's build our custom query!

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
      		<div <?php post_class();?>>
     			<div class="details">
					<h2 class="portfolio"><?php the_field('project_title'); ?></h2>
					<h3 class="short-desc"><?php the_field('short_description'); ?></h3>
					<p class="description"><?php the_field('technologies'); ?></p>
					<p class="test"><a href="<?php the_field('view_live'); ?>" target="_blank" class="live">view it live</a></p>
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
</div>

<div class="contact">
	<div class="container">
		<h1 class="title">contact</h1>
		<!-- <h2 class="contact">or email me stacie@staciecampbell.ca</h2> -->
		<a href="http://twitter.com/staciecampbell" target="_blank"><i class="fa fa-twitter"></i></a>
		<a href="http://github.com/staciecampbell" target="_blank"><i class="fa fa-github-alt"></i></a>
		<a href="mailto:stacie@staciecampbell.ca"><i class="fa fa-envelope"></i></a>

	</div>
</div>

<?php get_footer(); ?>