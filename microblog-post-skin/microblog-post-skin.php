<?php
/*
Plugin Name: Micro Post Support

Adds a new type of posts to the workpress blog - Micro Posts - and adds a class 
to these entries so their appearance can be adapted on the blog front page.

This is quick'n dirty code, crafted for my own blog/theme only. It's not a
fully functional wordpress plugin. Ah yes, and Wordpress does all the work :)
 
Installation: copy this directory into the plugins directory and off you go...

Free software, @imifos, 2/2017
*/


/*
Adds new post type to wordpress. wordpress has everything built in and provides the entire user interface.
Sources: http://www.wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/
*/

add_action( 'init', 'create_my_post_type' );

function create_my_post_type() {
    register_post_type( 'microposts',
      array(
        'labels' => array(
                    'name' => __( 'Micro Posts' ),
                    'singular_name' => __( 'Micro Post' )
                ),
        'supports' => array( 'editor','title' ),
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'microposts'),
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
      )
    );
}

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'microposts' ) );
    return $query;
}


/*
Adds a custom class to our microposts type posts.

Source: http://wpengineer.com/2180/use-wordpress-custom-post-type-in-css-class-for-styling/

Using this class, we can customize the appearance of our micro posts using CSS in the sub-themes files.
Example:

   .type-microposts .content-annina {
      background: #CCCCCC;
      border: 2px solid #990404;
   }

   .type-microposts .content-annina:before {
     content: "Micro Post";
     color:#990404;
   }

   .type-microposts .entry-header {
     display:none;
   }

   .type-microposts .entry-footer {
     display:none;
   }
*/

function fb_add_body_class( $class ) {
    $post_type = 'microposts';
    if ( get_query_var('post_type') === $post_type ) {
        $class[] = $post_type;
        $class[] = 'type-' . $post_type;
    }
    return $class;
}
add_filter( 'body_class', 'fb_add_body_class' );




/*
Replace the front page excerpt by the full text - which is supposed to be short of course.
*/
function micropost_excerpt( $output ) {
   if ( 'microposts' == get_post_type() ) {
       $post = get_post($id);
       $ret='<span style="font-size:medium;"><b>' . $post->post_title . '</b></span><br><br>' . $post->post_content . '<p><span style="font-size:xx-small;">' . $post->post_date . '</span>';
       return $ret;
   }
   else {
      return $output;
   }
}
add_filter( 'get_the_excerpt', 'micropost_excerpt');


?>
