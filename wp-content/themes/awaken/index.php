<?php
/**
 * The main template file.
 *
 *This is the main template and affects the home page 
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Awaken
 */

get_header(); ?>

<div class="row">
	<div class="col-xs-12 col-sm-12">
		<h1>ADD YOUR VOICE TO THE NARRITIVE BY CONTRIBUTING TO THE RURAL CHARTER SCHOOL FORUM</h1>
		<p>Throughout 2016, there has been a series of discussions with rural charter schools and support organizations who identified a number of challenges facing charters in rural communities.  While participants identified a number of consistent, substantive challenges, it was also clear that any effort to address those challenges had to begin by improving communications about and among rural charter schools.  To that end, a variety of organizations have committed to work together as the Rural Charter Schools Forum, and we invite you and your school to learn more about our work. </p>
	</div>
</div>

	<?php 
		//This is the featured article information that will move to the other template as this is a bit more than the header
		if ( is_front_page() ) {
			if ( get_theme_mod( 'display_slider', 1 ) == '1' ) {
				awaken_featured_posts();
			}
		}
	?>
<div class="row">
	<?php is_rtl() ? $rtl = 'awaken-rtl' : $rtl = ''; ?>
	<div class="col-xs-12 col-sm-12"<?php echo $rtl ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				
				<?php /* Start the Loop */ 
					$counter = 0;
				?>
			
				<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>
					
					<?php 
						$counter++;
						if ($counter % 2 == 0) {
							echo '</div><div class="row">';
					 	} 
					?>
					<?php endwhile; ?>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<?php awaken_paging_nav(); ?>
					</div>
				</div><!-- .row -->

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .bootstrap cols -->


	<div class="col-xs-12 col-sm-6 col-md-4">
		<?php //get_sidebar(); ?>
	</div><!-- .bootstrap cols -->

</div><!-- .row -->
<?php get_footer(); ?>
