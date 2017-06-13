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
		<h1 class="firstRowHeader">WELCOME TO THE RURAL CHARTER SCHOOL COLLABORATIVE!</h1>
		<p class="firstRowText">Over the past year, the organizations involved in the Rural Charter Schools Collaborative have heard a lot about the challenges facing rural charter schools.  It quickly became clear that addressing those challenges starts with improving communications about and among rural charter schools.  The result is the Rural Charter Schools Collaborative, and we invite you and your school to learn more about its launch.</p>
	</div>
</div>

<hr>

<?php 
	//This is the featured article information that will move to the other template as this is a bit more than the header
	if ( is_front_page() ) {
		if ( get_theme_mod( 'display_slider', 1 ) == '1' ) {
			awaken_featured_posts();
		}
	}
?>


<hr>

<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="col-xs-12 col-sm-12 col-md-4 background">
			<div class="col-xs-12 col-md-10 col-md-offset-2 featureTile">
				<i class="fa fa-handshake-o fa-5x featureIcon" aria-hidden="true"></i>
				<h2 class="featureLabel">PARTICIPATE</h2>
				<div class="featureText noComment">
					This collaborative effort is designed to support school collaboration and networking.  We welcome your participation in whatever way works for you: via webinars, structured resource sharing, regional gatherings etc. 
				</div>
				<div class="featureLink col-sm-12">
					<a href="<?php echo get_page_link( get_page_by_title('Projects')->ID ); ?>">SEE MORE</a>
				</div>
			</div>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 background">
			<div class="col-xs-12 col-md-10 col-md-offset-1 featureTile">
				<i class="fa fa-cogs fa-5x featureIcon" aria-hidden="true"></i>
				<h2 class="featureLabel">RESOURCES</h2>
				<div class="featureText noComment">
					The RCSC site will continue to collect and share resources of particular interest and value to rural charter schools. The more feedback we receive from schools about existing or missing information, the more refined the resource collection can become. 
				</div>
				<div class="featureLink">
					<a href="<?php echo get_page_link( get_page_by_title('Resources')->ID ); ?>">SEE MORE</a>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 background">
			<div class="col-xs-12 col-md-10  featureTile">
				<i class="fa fa-connectdevelop fa-5x featureIcon" aria-hidden="true"></i>
				<h2 class="featureLabel">INFORM</h2>
				<?php
					//Define post to be displayed under Inform tab on home page with comment section on it for user input 
					//Need to install plugin to allow the post ID's to be shown without doing it through the code
					$post_id = 57;
					$queried_post = get_post($post_id);
				?>
				<?php //echo $queried_post->post_title; ?>
					<?php //echo $queried_post->post_content; 
				?>

				<div class="featureText">
					<?php //echo $queried_post->post_title; ?> 
					We want to hear form you! In your opinion, what role do charter schools take in rural communities?
				</div>

				<div class="featureReply">
					<?php comment_form(array(
										'title_reply' => '',
										'comment_notes_before' => '',
										'label_submit' => 'SEND' 
										), $post_id); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>

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

<hr>

<!--.resourcesLinkRow-->
<div class="row">
	<div class="col-xs-12 col-sm-12 resourcesRow">
		<div class="resourcesText">
			<h2>Improving awareness and understanding of rural charters schools and their role within America is essential. We want to collect and display this information by providing links to articles and sources that address the challenges these schools face. This complilation of resources brings leading information to the forefront and opens accessiblity to everyone. Check out the resources now! </h2>
		</div>
		<div class="resourcesButton col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
			<a class="resourcesLink" href="/resources">CLICK HERE TO SEE RESOURCES</a>
		</div>
	</div>
</div>

<hr>

<!--.testimonialRow-->
<div class="row">
	<div class="col-xs-12 col-sm-12 testimonialRow">
		<div class="testimonialText col-sm-12 col-md-8 col-md-offset-2">
			<i>The RCSC is a great resource for information and discussion to help find new solutions to age old problems. With a little help from you, we can all create something that helps our those that need it.</i>
		</div>
	</div>
</div>
<?php get_footer(); ?>
