<?php
/**
 * Template Name: Full Width
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'page' ); ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->

    </div><!-- #primary -->

    <script>
        /* Adapt the page layout after construction - minimum impact and very easy implementation */
        jQuery(document).ready(function() {
            elem=jQuery('#masthead');
            if (elem.length) {
                elem.remove();
                jQuery('#primary').css('width','100%');
                jQuery('#content').css('width','100%');
            } else {
                /* element not found! Annina Theme? */
            }
        });
    </script>

<?php get_footer(); ?>