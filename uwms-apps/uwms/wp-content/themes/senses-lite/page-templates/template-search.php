<?php
/**
 * Template Name: Search
 * @package Senses Lite 
*/

get_header(); ?>


    
<div id="primary" class="content-area">
    <main id="main" class="site-main" itemprop="mainContentOfPage">                
        <div class="container">
            <div class="row">
                <div class="col-md-12">     
					<?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                    
                    // Include the page content template.
                    get_template_part( 'template-parts/content', 'page' );
                    
			echo '<div class="search-form-wrapper">';
			  	get_search_form(); 
			  echo '</div>';
					
                    
                    // End the loop.
                    endwhile;
                    ?>  
                </div>       
            </div>
        </div>                                                    
    </main>
</div>


    
<?php get_footer(); ?>    