<?php
/**
 * The category code template file.
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main" itemprop="mainEntityOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
    
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                
					<?php if ( have_posts() ) : ?>
                    
                    <?php if ( is_home() && ! is_front_page() ) : ?>
                        <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>
                    
                    <?php while ( have_posts() ) : the_post(); ?>
                    
                    <?php
                    /*
                    * Include the Post-Format-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                    */
                    get_template_part( 'template-parts/content', get_post_format() );
                    ?>
                    
                    <?php endwhile; ?>
                    
                    	<?php the_posts_navigation(); ?>
                    
                    <?php else : ?>
                    
                    	<?php get_template_part( 'template-parts/content', 'none' ); ?>
                    
                    <?php endif; ?>
                    
                </div>
                
                <?php get_sidebar( 'right' ); ?>
            
            </div><!-- .row -->
        </div><!-- .container -->
    </main>
</div>
<?php get_footer(); ?>
