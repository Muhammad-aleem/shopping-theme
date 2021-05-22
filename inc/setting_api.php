<?php
if(!function_exists('wp_cf_footer_api')){
    function wp_cf_footer_api($wp_customize) {
        $wp_customize->add_section('footer_shoptheme_section', array(
            'title' => esc_html__('About Footer'),
            'description' =>esc_html__('You can customize Your Footer Section'), 
            'priority'=> 35
        ));
        $wp_customize->add_setting( 'wp_footer_logo_setting', array(
            // 'default' => get_theme_file_uri('https://certifiedboc.com/wp-content/uploads/2020/11/certifiedcircle2424-1.png'), 
            'sanitize_callback' => 'esc_url_raw'
        ));
     
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diwp_logo_control', array(
            'label' => 'Upload Footer Logo',
            'priority' => 20,
            'section' => 'footer_shoptheme_section',
            'settings' => 'wp_footer_logo_setting'
        )));
        
        $wp_customize->add_setting('wp_footer_details_setting',array(
            'default'=>'',	 
        ));
        $wp_customize->add_control('wp_details_details',array(
            'label' => esc_html__('Add Your Footer Details'),
            'type'=> 'textarea',
            'section'=>'footer_shoptheme_section', 
            'settings' => 'wp_footer_details_setting'
        ));
    }

}
add_action('customize_register','wp_cf_footer_api');


if(!function_exists('wp_top_banner_api')){
    function wp_top_banner_api($wp_customize) {
        $wp_customize->add_section('shoptheme_banner_section', array(
            'title' => esc_html__('About Banner'),
            'description' =>esc_html__('You can customize Your Banner Section'), 
            'priority'=> 35
        ));
        $wp_customize->add_setting( 'wp_banner_image_setting', array(
            // 'default' => get_theme_file_uri('https://certifiedboc.com/wp-content/uploads/2020/11/certifiedcircle2424-1.png'), 
            'sanitize_callback' => 'esc_url_raw'
        ));
     
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_image_control', array(
            'label' => 'Upload Banner image',
            'priority' => 20,
            'section' => 'shoptheme_banner_section',
            'settings' => 'wp_banner_image_setting'
        )));
        
        $wp_customize->add_setting('banner_details_setting',array(
            'default'=>'',	 
        ));
        $wp_customize->add_control('wp_seobanner__details',array(
            'label' => esc_html__('Add Your Footer Details'),
            'type'=> 'text',
            'section'=>'shoptheme_banner_section', 
            'settings' => 'banner_details_setting'
        ));
    }

}
add_action('customize_register','wp_top_banner_api');

if(!function_exists('wp_top_bar_secapi')){
    function wp_top_bar_secapi($wp_customize) {
        $wp_customize->add_section('shoptheme_topbar_section', array(
            'title' => esc_html__('Top Bar'),
            'description' =>esc_html__('You can customize Your Top Bar Section'), 
            'priority'=> 35
        ));
        $wp_customize->add_setting('topbar_number_details_setting',array(
            'default'=>'',	 
        ));
        $wp_customize->add_control('wp_footer_details_details',array(
            'label' => esc_html__('Add Your Number'),
            'type'=> 'text',
            'section'=>'shoptheme_topbar_section', 
            'settings' => 'topbar_number_details_setting'
        ));
    }

}
add_action('customize_register','wp_top_bar_secapi');



if(!function_exists('home_page_parduct_tit')){

    function home_page_parduct_tit ($wp_customize){
        $wp_customize->add_section('home_product_tit', array(
            'title' => esc_html__('Add Product Title'),
            'description' =>esc_html__('You can customize Your Product Title and Descriptions'), 
            'priority'=> 35
        ));
        $wp_customize->add_setting('add_product_title_section',array(
            'default'=>'',	 
        ));
        $wp_customize->add_control('wp_add_product_tit_con',array(
            'label' => esc_html__('Add Product Heading'),
            'type'=> 'text',
            'section'=>'home_product_tit', 
            'settings' => 'add_product_title_section'
        ));
         $wp_customize->add_setting('add_product_description_section',array(
            'default'=>'',	 
        ));
        $wp_customize->add_control('wp_add_product_tit_description',array(
            'label' => esc_html__('Add Product Description'),
            'type'=> 'textarea',
            'section'=>'home_product_tit', 
            'settings' => 'add_product_description_section'
        ));


    }
}
add_action('customize_register','home_page_parduct_tit');


if(!function_exists('popular_styles_box_packaging_tit')){

    function popular_styles_box_packaging_tit ($wp_customize){
        $wp_customize->add_section('box_style_tit', array(
            'title' => esc_html__('Add Popular Styles Box Title'),
            'description' =>esc_html__('You can customize Your Popular Styles Box Title and Descriptions'), 
            'priority'=> 35
        ));
        $wp_customize->add_setting('add__title_box_section',array(
            'default'=>'',	 
        ));
        $wp_customize->add_control('wp_add_box_tit_con',array(
            'label' => esc_html__('Add Product Heading'),
            'type'=> 'text',
            'section'=>'box_style_tit', 
            'settings' => 'add__title_box_section'
        ));

        $wp_customize->add_setting('add_box_description_section',array(
            'default'=>'',	 
        ));
        $wp_customize->add_control('wp_add_homeproduct_tit_description',array(
            'label' => esc_html__('Add Product Description'),
            'type'=> 'textarea',
            'section'=>'box_style_tit', 
            'settings' => 'add_box_description_section'
        ));


    }
}
add_action('customize_register','popular_styles_box_packaging_tit');



//  testimonial Setting Api

if(!function_exists('wp_testimonial_tit')){
    function wp_testimonial_tit($wp_customize){
        $wp_customize->add_section('testimonial_style_tit', array(
            'title' => esc_html__('Add Testimonial Title'),
            'description' =>esc_html__('You can customize Your Testimonial Title and Descriptions'), 
            'priority'=> 35
        ));   
        $wp_customize->add_setting('add_testimonil_tit_section',array(
            'default'=>'',	 
        ));
        $wp_customize->add_control('wp_add_testimonial_tit_con',array(
            'label' => esc_html__('Add Testimonial Heading'),
            'type'=> 'text',
            'section'=>'testimonial_style_tit', 
            'settings' => 'add_testimonil_tit_section'
        ));
        $wp_customize->add_setting('add_testimonile_description_section',array(
            'default'=>'',	 
        ));
        $wp_customize->add_control('wp_add_testimo_tit_description',array(
            'label' => esc_html__('Add Testimonial About'),
            'type'=> 'textarea',
            'section'=>'testimonial_style_tit', 
            'settings' => 'add_testimonile_description_section'
        ));


    }
}

add_action('customize_register','wp_testimonial_tit');


//  Shop Product Tittle Setting Api

// if(!function_exists('wp_shop_product_tit')){
//     function wp_shop_product_tit($wp_customize){
//         $wp_customize->add_section('shop_produt_tit', array(
//             'title' => esc_html__('Add Shop Product Title'),
//             'description' =>esc_html__('You can customize Your  Shop Product Title'), 
//             'priority'=> 35
//         ));   
//         $wp_customize->add_setting('add_shop_pro_tit_section',array(
//             'default'=>'',	 
//         ));
//         $wp_customize->add_control('wp_add_testimo_tit_con',array(
//             'label' => esc_html__('Add Product Heading'),
//             'type'=> 'text',
//             'section'=>'shop_produt_tit', 
//             'settings' => 'add_shop_pro_tit_section'
//         ));

//     }
// }
// add_action('customize_register','wp_shop_product_tit');