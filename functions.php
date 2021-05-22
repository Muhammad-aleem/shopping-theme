<?php
/**
 * shoping_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shoping_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'mixbox_com_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mixbox_com_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on shoping_theme, use a find and replace
		 * to change 'mixbox-com' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mixbox-com', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __('Main menu' , 'Main Menu'),
				) 
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mixbox_com_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// add_theme_support(
		// 	'custom-logo',
		// 	array(
		// 		'height'      => 250,
		// 		'width'       => 250,
		// 		'flex-width'  => true,
		// 		'flex-height' => true,
		// 	)
		// );
	}
endif;
add_action( 'after_setup_theme', 'mixbox_com_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mixbox_com_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mixbox_com_content_width', 640 );
}
add_action( 'after_setup_theme', 'mixbox_com_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


/**
 * Enqueue scripts and styles.
 */
// function mixbox_com_scripts() {
// 	wp_enqueue_style( 'mixbox-com-style', get_stylesheet_uri(), array(), _S_VERSION );
// 	wp_style_add_data( 'mixbox-com-style', 'rtl', 'replace' );

// 	wp_enqueue_script( 'mixbox-com-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'mixbox_com_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



  
//   add the custom logo

function themename_custom_logo_setup() {
    $defaults = array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	   }
	   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
	
	//    End custom logo
require get_template_directory() . '/inc/wp_scripts.php';
require get_template_directory() . '/inc/setting_api.php';
require get_template_directory() . '/inc/testimonial_posttype/testimonial.php';
require get_template_directory() . '/inc/topbar_posttype/header_featured_logos.php';
require get_template_directory() . '/inc/add_product_postype/add_product.php';




function cf_add_classes_on_li($classes, $item, $args) {
	$classes[] = 'nav-item';
	return $classes;
	}
	add_filter('nav_menu_css_class','cf_add_classes_on_li',1,3);

	function cf_anchor_tag_class( $atts, $item, $args ) {
		$class = 'nav-link'; 
		$atts['class'] = $class;
		return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'cf_anchor_tag_class', 10, 3);




	// registre custom widgets Hear!

	function footer_heading_widgets_init() {
		register_sidebar(
			array(
				'id'            => 'get_in_touch',
				'name'          => esc_html__( 'Footer First widget', '' ),
				'description'   => esc_html__( 'Add widgets here.', '' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s ">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3',
			)
		);
	}
	add_action( 'widgets_init', 'footer_heading_widgets_init' );

	function footer_help_widgets_init() {
		register_sidebar(
			array(
				'id'            => 'help_widgets',
				'name'          => esc_html__( 'Footer Secound widget', '' ),
				'description'   => esc_html__( 'Add widgets here.', '' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s ">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3',
			)
		);
	}
	add_action( 'widgets_init', 'footer_help_widgets_init' );

	function footer_product_widgets_init() {
		register_sidebar(
			array(
				'id'            => 'product_widgets',
				'name'          => esc_html__( 'Footer three widget', '' ),
				'description'   => esc_html__( 'Add widgets here.', '' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s ">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3',
			)
		);
	}
	add_action( 'widgets_init', 'footer_product_widgets_init' );
	
	function footer_brand_widgets_init() {
		register_sidebar(
			array(
				'id'            => 'brand_widgets',
				'name'          => esc_html__( 'Footer Four widget', '' ),
				'description'   => esc_html__( 'Add widgets here.', '' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s ">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3',
			)
		);
	}
	add_action( 'widgets_init', 'footer_brand_widgets_init' );





	if(!function_exists('main_banner_scode')){
		function main_banner_scode(){
			ob_start();
			?>
<section class="shop_banner_section home_shopbanner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="shop_bannerimg">
                    <img src="<?php echo get_theme_mod("wp_banner_image_setting");?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
	
			$htmlRetu = ob_get_contents();
			  ob_end_clean();
			  return $htmlRetu;
		}
	
	}
	
	add_shortcode('banner_scode', 'main_banner_scode');


if(!function_exists('home_banner_logos')){
	function home_banner_logos(){
		ob_start();
		?>
<section class="shop_home_infosec">
    <div class="container">
        <div class="row">
            <?php

                 $get_data = array(  
                    'post_type' => 'topbar',
                    'post_status' => 'publish',
                    'posts_per_page' => 6, 
                );
                $shopheaderinfo = new WP_Query( $get_data ); 

                if ( $shopheaderinfo->have_posts() ) : 
                    // Start the Loop 
                    while ( $shopheaderinfo->have_posts() ) : $shopheaderinfo->the_post();
                    $thumbtop_id = get_post_thumbnail_id();
                    $thumb_url_array_infologo = wp_get_attachment_image_src($thumbtop_id, 'thumbnail-size', true);
                    $thumb_url=null;
                    if(!empty( $thumb_url_array_infologo)){
                        $get_top_thumb_url = $thumb_url_array_infologo[0]; 
                    }
                
                ?>
            <div class="col-lg-2 col-md-6 col-sm-4 col-xs-6 text-center col-6">
                <div class="shop_home_infotit">
                    <img src="<?php echo $get_top_thumb_url;?>" class="img-fluid" alt="">
                    <h6><?php the_title();?></h6>
                </div>
            </div>
            <?php
            
        endwhile;
       endif;
       wp_reset_postdata( );
       ?>
        </div>
    </div>
</section>


<?php
		$htmlRetu = ob_get_contents();
		ob_end_clean();
		return $htmlRetu;
	}

}


add_shortcode('banner_logo_scode', 'home_banner_logos');




// Home Product Scode


if(!function_exists('add_home_productscode')){

	function  add_home_productscode(){
		ob_start();
		?>
<section class="shop_home_product mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 mx-auto">
                <div class="home_product_tit">
                    <h1><?php echo get_theme_mod("add_product_title_section");?></h1>
                    <p><?php echo get_theme_mod("add_product_description_section");?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $get_product_data = array(  
            'post_type' => 'products',
            'post_status' => 'publish',
            'posts_per_page' => 3, 
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => 'custom_post_product', 
                    'compare' => 'EXISTS'   
                )),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'all-product',
                        'operator'  => 'in'
                )),

            );
            $all_home_product = new WP_Query( $get_product_data ); 

            if ( $all_home_product->have_posts() ) : 
                // Start the Loop 
                while ( $all_home_product->have_posts() ) : $all_home_product->the_post();
                $thumbproduct_id = get_post_thumbnail_id();
                $thumb_url_array_product_image = wp_get_attachment_image_src($thumbproduct_id, 'thumbnail-size', true);
                $thumb_url=null;
                if(!empty( $thumb_url_array_product_image)){
                    $product_image_thumb_url = $thumb_url_array_product_image[0]; 
                }
                $meta_url = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'product_second_featured_image', true),'thumbnail-size');
                // $meta_url=null;
                if(!empty($meta_url)){
                     $meta_url_src = $meta_url[0]; 
				}
            ?>
            <div class="col-md-4 col-sm-4 col-xs-12 product_wrap product_padding text-center ">
                <div class="product_shadow_view">
                    <?php
                            // $url = home_url().'/main-shop-page/?id='.get_the_ID().'';
                        ?>
                    <a href="<?= get_the_permalink();?>" class="product_hover">
                        <img src="<?php echo $product_image_thumb_url;?>" class="img-fluid" alt="">
                        <img src="<?php echo $meta_url_src;?>" class="img-fluid" alt="">
                    </a>
                    <div class="product_details">
                        <h2>
                            <?php 
								  echo wp_trim_words( get_the_title(), 10, '...' );
								?>
                        </h2>
                        <?php  $get_url = home_url().'/quote';?>
                        <a href="<?= $get_url;?>" class="product_read_more">Get a Quote</a>
                    </div>
                </div>
            </div>
            <?php
        
			endwhile;
            else:
            ?>
            <H1><?php _e( 'No Posts To Display.' ); ?></H1>
            <?php
            endif;
            ?>
        </div>
        <?php
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



add_shortcode('home_product_scode', 'add_home_productscode');




// Box Packing Scode


if(!function_exists('popular_styles_box_packaging')){

	function  popular_styles_box_packaging(){
		ob_start();
		?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 mx-auto">
                <div class="home_product_tit">
                    <h1><?php echo get_theme_mod("add__title_box_section");?></h1>
                    <p><?php echo get_theme_mod("add_box_description_section");?></p>
                </div>
            </div>
        </div>
        <div class="shophome_slider_wrapper">
            <div class="box_carousel">

                <?php

                    $get_product_imgdata = array(  
                        'post_type' => 'products',
                        'post_status' => 'publish',
                        'posts_per_page' => -1, 
                        'meta_query' => array(
                            array(
                                'key' => 'custom_post_product', 
                                'compare' => 'EXISTS'   
                            )
                            ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => 'box-by-style',
                                    'operator'  => 'in'
                            )),

                        );
            $all_home_product_image = new WP_Query( $get_product_imgdata ); 

           if ( $all_home_product_image->have_posts() ) : 
                // Start the Loop 
                while ( $all_home_product_image->have_posts() ) : $all_home_product_image->the_post();
                $thumbproduct_id = get_post_thumbnail_id();
                $thumb_url_array_product_image = wp_get_attachment_image_src($thumbproduct_id, 'thumbnail-size', true);
                $thumb_url=null;
                if(!empty( $thumb_url_array_product_image)){
                    $product_image_thumb_url = $thumb_url_array_product_image[0]; 
                }
            ?>

                <div>
                    <?php
                            ?>
                    <div class="product_box_border">
                        <a href="<?php the_permalink();?>">
                            <img src="<?php echo $product_image_thumb_url;?>" alt="">
                        </a>
                    </div>
                </div>

                <?php
				endwhile;
				endif;
				wp_reset_postdata( );
			?>

            </div>
        </div>
    </div>
</section>



<?php

		$htmlRetu = ob_get_contents();
		ob_end_clean();
		return $htmlRetu;
	}
}

add_shortcode('popular_styles_scode', 'popular_styles_box_packaging');




// TESTIMONIAL Scode


if(!function_exists('add_testimonial_scode')){

	function  add_testimonial_scode(){ 
		ob_start();

		?>


<section class="testimonial_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 mx-auto text-center">
                <div class="testimonial_tit">
                    <h5><?php echo get_theme_mod("add_testimonil_tit_section");?></h5>
                    <h3><?php echo get_theme_mod("add_testimonile_description_section");?></h3>
                </div>
            </div>
        </div>
        <?php echo do_shortcode("[testimonial_shortcode]"); ?>
    </div>
</section>
<?php
		$htmlRetu = ob_get_contents();
		ob_end_clean();
		return $htmlRetu;
	}
}




add_shortcode('testimonial_scode', 'add_testimonial_scode');




// Shop Page Product Sections

if(!function_exists('add_shop_page_scode')){

	function  add_shop_page_scode(){ 
		ob_start();
		?>
<section class="shop_content_section ">
    <div class="container-fluid  shop_content_container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12">

                <div class="pop_product">
                    <h2>popular Product</h2>
                </div>
                <?php
                 $get_product_data_all = array(  
                    'post_type' => 'products',
                    'post_status' => 'publish',
                    'meta_query' => array(
                        array(
                            'key' => 'custom_post_product',   
                            'compare' => 'EXISTS' 
                        )),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => 'all-product',
                                'operator'  => 'in'
                        )),
                    );
                ?>
                <?php
                $all_home_product_all_pro = new WP_Query( $get_product_data_all ); 
                    ?>


                <div class="mobile_slider">
                    <div id="shop_accordion" class="">
                        <div class="shop_border_bottom">
                            <h4 class="shop_accordion-toggle">
                                All Product
                                <i class="fas fa-sort-down"></i>
                            </h4>
                            <div class="accordion-content">
                                <ul>
                                    <?php
                                      if ( $all_home_product_all_pro->have_posts() ) : 
                                      
                                        while ( $all_home_product_all_pro->have_posts() ) : $all_home_product_all_pro->the_post();
                                        $url = home_url().'/main-shop-page/?id='.get_the_ID().'';
                                    
                                    ?>
                                    <li><a href="<?= $url;?>"><?php the_title();?></a></li>
                                    <?php
                                        endwhile;
                                        endif;    
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php  
                ?>
                    <?php
                 $get_product_imgdata_box = array(  
                    'post_type' => 'products',
                    'post_status' => 'publish',
                    'meta_query' => array(
                        array(
                            'key' => 'custom_post_product',    
                            'compare' => 'EXISTS'
                        )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => 'box-by-style',
                                'operator'  => 'in'
                        )),

                    );

                    $all_home_product_image_box = new WP_Query( $get_product_imgdata_box ); 
                        ?>

                    <div id="shop_accordion" class="shop_accordion_replace">
                        <div class="shop_border_bottom">
                            <h4 class="shop_accordion-toggle">
                                Box by Style
                                <i class="fas fa-sort-down"></i>
                            </h4>
                            <div class="accordion-content">
                                <ul>
                                    <?php
                                    
                                    if ( $all_home_product_image_box->have_posts() ) : 
                                        while ( $all_home_product_image_box->have_posts() ) : $all_home_product_image_box->the_post();?>
                                    <?php
                                        $url = home_url().'/main-shop-page/?id='.get_the_ID().'';
                                    
                                    ?>
                                    <li><a href="<?=  $url;?>"><?php the_title();?></a></li>
                                    <?php
                                        endwhile;
                                        endif;
                                        wp_reset_postdata();
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="shop_product_top">
                            <h5><?php the_breadcrumb(); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row shop_promb">
                    <?php
                    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                    $get_product_data = array(  
                    'post_type' => 'products',
                    'post_status' => 'publish',
                    'posts_per_page' => 15,
                    'paged' => $paged, 
                    'meta_query' => array(
                        array(
                            'key' => 'custom_post_product', 
                            'compare' => 'EXISTS'   
                        )),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => array('all-product','box-by-style'),
                                'operator'  => 'in'
                        )),
        
                    );
                    $all_home_product = null;
                    $all_home_product = new WP_Query( $get_product_data ); 
        
                    if ( $all_home_product->have_posts() ) : 
                        // Start the Loop 
                        while ( $all_home_product->have_posts() ) : $all_home_product->the_post();
                        $thumbproduct_id = get_post_thumbnail_id();
                        $thumb_url_array_product_image = wp_get_attachment_image_src($thumbproduct_id, 'thumbnail-size', true);
                        $thumb_url=null;
                        if(!empty( $thumb_url_array_product_image)){
                            $product_image_thumb_url = $thumb_url_array_product_image[0]; 
                        }
                        $meta_url = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'product_second_featured_image', true),'thumbnail-size');
                        // $meta_url=null;
                        if(!empty($meta_url)){
                             $meta_url_src = $meta_url[0]; 
                        }
                  ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 product_wrap product_padding text-center ">
                        <div class="product_shadow_view">
                                <?php
                                    $url = home_url().'/main-shop-page/?id='.get_the_ID().'';
                                ?>
                                <a href="<?= get_the_permalink();?>" class="product_hover">
                                    <img src="<?php echo $product_image_thumb_url;?>" class="img-fluid" alt="">
                                    <img src="<?php echo $meta_url_src;?>" class="img-fluid" alt="">
                                </a>
                                <div class="product_details">
                                    <h2><?php  echo wp_trim_words( the_title(),6, '...' );  ?></h2>
                                    <?php  $get_url = home_url().'/quote';?>
                                    <a href="<?= $get_url;?>" class="product_read_more">Get a Quote</a>
                                </div>
                        </div>
                    </div>
                    <?php 
                     if ($count >= 3) {
                        $count = 0;
                        ?>
                </div>
                <div class="row shop_promb">
                    <?php
                     }
                     ?>

                    <?php
                    endwhile;
                    endif;
                        ?>
                    <!-- <div class="row"> -->
                    <div class="col-lg-10 col-md-12 col-sm-12 mx-auto text-center">
                        <div class="product_paggbtn">
                            <span class="PREVIOUS_btn">
                                <?php previous_posts_link('PREVIOUS PAGE', $all_home_product->max_num_pages); ?>
                            </span>
                            <span class="next_btn">
                                <?php next_posts_link('Next Page', $all_home_product->max_num_pages); ?>
                            </span>
                        </div>
                        <!-- </div> -->
                        <?php
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php
		$htmlRetu = ob_get_contents();
		ob_end_clean();
		return $htmlRetu;
    }
}

add_shortcode('shop_product_scode', 'add_shop_page_scode');



// Shop Page Slider

if(!function_exists('add_shop_slider_scode')){

	function  add_shop_slider_scode(){ 
		ob_start();
		?>
<section class="d-sm-none d-lg-block d-md-block d-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 ml-auto">
                <div class="">
                </div>

                <?php
                  
                            $get_product_imgdata = array( 
                            'post_type' => 'products',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                array(
                                    'key' => 'custom_post_product', 
                                    'compare' => 'EXISTS'   
                                )),
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'slug',
                                        'terms' => array('all-product','box-by-style'),
                                        'operator'  => 'in'
                                )),
                         
                        );
                        
                        ?>
                <div class="wrapper">
                    <div class="carousel">
                        <?php
                    $all_home_product_image = new WP_Query( $get_product_imgdata ); 
                    if ( $all_home_product_image->have_posts() ) : 
                        // Start the Loop 
                        while ( $all_home_product_image->have_posts() ) : $all_home_product_image->the_post();
                        $thumbproduct_id = get_post_thumbnail_id();
                        $thumb_url_array_product_image = wp_get_attachment_image_src($thumbproduct_id, 'thumbnail-size', true);
                        $thumb_url=null;
                        if(!empty( $thumb_url_array_product_image)){
                            $product_image_thumb_url = $thumb_url_array_product_image[0]; 
                        }
                        $meta_url = wp_get_attachment_image_src(get_post_meta(get_the_ID(), 'product_second_featured_image', true),'thumbnail-size');
                        if(!empty($meta_url)){
                            $meta_url_src = $meta_url[0]; 
                        }
                    ?>

                        <div>
                            <div class="header">
                                <a href="<?php the_permalink();?>">
                                    <img src="<?php echo $meta_url_src;?>">
                                </a>
                            </div>
                        </div>

                        <?php
                        endwhile;
                        endif;
                        wp_reset_postdata( );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
		$htmlRetu = ob_get_contents();
		ob_end_clean();
		return $htmlRetu;
	}
}	


add_shortcode('shop_slider_scode', 'add_shop_slider_scode');




function the_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&#187;";
        the_category(' &bull; ');
            if (is_single()) {
                // echo "&nbsp;&#187;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&#187;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&#187;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}









// All Product






if(!function_exists('all_product_scode')){

	function  all_product_scode(){ 
        ob_start();
        ?>
        <section class="shop_home_product mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 mx-auto">
                <div class="home_product_tit">
                    <h1><?php echo get_theme_mod("add_product_title_section");?></h1>
                    <p><?php echo get_theme_mod("add_product_description_section");?></p>
                </div>
            </div>
        </div>
        <div class="row">
<?php
                        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                        $get_product_data = array(  
                        'post_type' => 'products',
                        'post_status' => 'publish',
                        'posts_per_page' => 15,
                        'paged' => $paged, 
                        'meta_query' => array(
                            array(
                                'key' => 'custom_post_product', 
                                'compare' => 'EXISTS'   
                            )),

                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => 'all-product',
                                    'operator'  => 'in'
                            )),
            
                        );
                        $all_home_product = null;
                        $all_home_product = new WP_Query( $get_product_data ); 
            
                        if ( $all_home_product->have_posts() ) : 
                            // Start the Loop 
                            while ( $all_home_product->have_posts() ) : $all_home_product->the_post();
                            $thumbproduct_id = get_post_thumbnail_id();
                            $thumb_url_array_product_image = wp_get_attachment_image_src($thumbproduct_id, 'thumbnail-size', true);
                            $thumb_url=null;
                            if(!empty( $thumb_url_array_product_image)){
                                $product_image_thumb_url = $thumb_url_array_product_image[0]; 
                            }
                            $meta_url = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'product_second_featured_image', true),'thumbnail-size');
                            // $meta_url=null;
                            if(!empty($meta_url)){
                                 $meta_url_src = $meta_url[0]; 
                            }
                        ?>
                                <div class="col-md-4 col-sm-4 col-xs-12 product_wrap product_padding text-center ">
                                    <div class="product_shadow_view">
                                   
                                        <a href="<?php the_permalink();?>" class="product_hover">
                                            <img src="<?php echo $product_image_thumb_url;?>" class="img-fluid" alt="">
                                            <img src="<?php echo $meta_url_src;?>" class="img-fluid" alt="">
                                        </a>
                                        <div class="product_details">
                                            <h2><?php  echo wp_trim_words( the_title(),6, '...' );?>
                                            </h2>
                                            <?php  $get_url = home_url().'/quote';?>
                                            <a href="<?= $get_url;?>" class="product_read_more">Get a Quote</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                        endwhile;
                        else:
                        ?>
                    <H1><?php _e( 'No Posts To Display.' ); ?></H1>
                    <?php
                    endif;
                    ?>
                     <div class="col-lg-10 col-md-12 col-sm-12 mx-auto text-center">
                        <div class="product_paggbtn">
                            <span class="PREVIOUS_btn">
                                <?php previous_posts_link('PREVIOUS PAGE', $all_home_product->max_num_pages); ?>
                            </span>
                            <span class="next_btn">
                                <?php next_posts_link('Next Page', $all_home_product->max_num_pages); ?>
                            </span>
                        </div>
                    <?php

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

add_shortcode('all_product_scode', 'all_product_scode');



if(!function_exists('all_productby_boxscode')){

	function  all_productby_boxscode(){ 
        ob_start();
        ?>
        <section class="shop_home_product mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 mx-auto">
                <div class="home_product_tit">
                    <h1><?php echo get_theme_mod("add__title_box_section");?></h1>
                    <p><?php echo get_theme_mod("add_box_description_section");?></p>
                </div>
            </div>
        </div>
        <div class="row">
<?php
                        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                        $get_product_data = array(  
                        'post_type' => 'products',
                        'post_status' => 'publish',
                        'posts_per_page' => 15,
                        'paged' => $paged, 
                        'meta_query' => array(
                            array(
                                'key' => 'custom_post_product', 
                                'compare' => 'EXISTS'   
                            )),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => 'box-by-style',
                                    'operator'  => 'in'
                            )),
            
                        );
                        $all_home_product = null;
                        $all_home_product = new WP_Query( $get_product_data ); 
            
                        if ( $all_home_product->have_posts() ) : 
                            // Start the Loop 
                            while ( $all_home_product->have_posts() ) : $all_home_product->the_post();
                            $thumbproduct_id = get_post_thumbnail_id();
                            $thumb_url_array_product_image = wp_get_attachment_image_src($thumbproduct_id, 'thumbnail-size', true);
                            $thumb_url=null;
                            if(!empty( $thumb_url_array_product_image)){
                                $product_image_thumb_url = $thumb_url_array_product_image[0]; 
                            }
                            $meta_url = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'product_second_featured_image', true),'thumbnail-size');
                            // $meta_url=null;
                            if(!empty($meta_url)){
                                 $meta_url_src = $meta_url[0]; 
                            }
                        ?>
                                <div class="col-md-4 col-sm-4 col-xs-12 product_wrap product_padding text-center ">
                                    <div class="product_shadow_view">
                                        <a href="<?php the_permalink();?>" class="product_hover">
                                            <img src="<?php echo $product_image_thumb_url;?>" class="img-fluid" alt="">
                                            <img src="<?php echo $meta_url_src;?>" class="img-fluid" alt="">
                                        </a>
                                        <div class="product_details">
                                            <h2><?php  echo wp_trim_words( the_title(),6, '...' );?>
                                            </h2>
                                            <?php  $get_url = home_url().'/quote';?>
                                            <a href="<?= $get_url;?>" class="product_read_more">Get a Quote</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                        endwhile;
                        else:
                        ?>
                    <H1><?php _e( 'No Posts To Display.' ); ?></H1>
                    <?php
                    endif;
                    ?>
                     <div class="col-lg-10 col-md-12 col-sm-12 mx-auto text-center">
                        <div class="product_paggbtn">
                            <span class="PREVIOUS_btn">
                                <?php previous_posts_link('PREVIOUS PAGE', $all_home_product->max_num_pages); ?>
                            </span>
                            <span class="next_btn">
                                <?php next_posts_link('Next Page', $all_home_product->max_num_pages); ?>
                            </span>
                        </div>
                    <?php


                   
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

add_shortcode('all_product_boxscode', 'all_productby_boxscode');


// Remove the br tag in the_excerpt 
remove_filter( 'the_excerpt', 'wpautop' );