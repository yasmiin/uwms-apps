<?php
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Senses Lite
 */

get_header(); ?>

 <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main" itemprop="mainContentOfPage">
        <div class="container">
          	<div class="row">
                  <div class="col-lg-8">        
                    <?php
						// Start the loop.
						while ( have_posts() ) : the_post();
						
						// Include the page content template.
						get_template_part( 'template-parts/content', 'page' );
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						
						// End the loop.
						endwhile;
						?>           
                  </div>
            
            	<div class="col-lg-4">        
              	<?php get_sidebar( 'right' ); ?>       
              	</div>
              
          </div>
            
        </div>
        
    </main>
</div>   

<?php get_footer(); ?>
