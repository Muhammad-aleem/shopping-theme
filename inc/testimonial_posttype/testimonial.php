<?php

/* Our Team */
function my_post_type_team() {
    register_post_type( 'testimonial',
        array(
            'label'               => ("Testimonial Post"),
            'singular_label'      => ("testimonial"),
            '_builtin'            => false,
            'capability_type'     => 'page',
            'public'              => true,
            'show_ui'             => true,
            'show_in_nav_menus'   => false,
            'menu_position'       => 9,
            'menu_icon'           => ( version_compare( $GLOBALS['wp_version'], '3.8', '>=' ) ) ? 'dashicons-businessman' : '',
            'rewrite'             => array(
                                        'slug'       => 'testimonial-view',
                                        'with_front' => FALSE,
                                    ),
            'supports' => array(
                            'title',
                            'editor',
                        'thumbnail',
                        )
        )
    );
    }
    add_action('init', 'my_post_type_team');



    if(!function_exists('wp_custom_home_testimonial_scode')){
        function wp_custom_home_testimonial_scode(){
          ob_start();
          ?>
          <?php
        $args = array(  
          'post_type' => 'testimonial',
          'post_status' => 'publish',
          'posts_per_page' => 5, 
      );
      $loop = new WP_Query( $args ); 
      
      ?>
      <section class="testimonial-section">
                <div class="testimonials">
      <?php
      
      if ( $loop->have_posts() ) : 
          // Start the Loop 
          while ( $loop->have_posts() ) : $loop->the_post();
          $thumb_id = get_post_thumbnail_id();
          $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
          $thumb_url=null;
          if(!empty( $thumb_url_array)){
              $thumb_url = $thumb_url_array[0]; 
          }
      
      ?>

                  <div class="testimonial">
                    <img src="<?php echo $thumb_url;?>" alt="no image" class="img-fluid">
                    <p><?php the_content();?></p>
                    <div class="testimonial_rating">
                        <img src="<?php echo get_template_directory_uri();?>/assets/image/star_rating.png" alt="">
                    </div>
                    <div class="details">
                    <span><?php the_title();?></span>
                    </div>
                  </div>
      
      <?php
      
      
      
      
      
      
      endwhile;
      endif;
      
      // html code 
      wp_reset_postdata( );
      ?>
            </div>
        </section>
      <?php
       
          $htmlRetu = ob_get_contents();
          ob_end_clean();
          return $htmlRetu;
      
        }
      
      }
      
      add_shortcode('testimonial_shortcode', 'wp_custom_home_testimonial_scode');
      

add_filter( 'the_content', 'wti_remove_autop_for_image', 0 );

function wti_remove_autop_for_image( $content )
{
     global $post;

     // Check for single page and image post type and remove
     if ( is_single() && $post->post_type == 'testimonial' )
          remove_filter('the_content', 'wpautop');

     return $content;
}

