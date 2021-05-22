<?php
/*
 * description:  single product
 */


 get_header();

$get_url = get_template_directory_uri();


 ?>



<section class="shop_banner_section home_shopbanner  d-sm-none d-lg-block d-md-block d-none">
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
										wp_reset_postdata();
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
										wp_reset_postdata();
                                        endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                while ( have_posts() ) :
                    the_post();
            ?>
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


                            $get_post_meta_id = get_the_ID();
                            $get_all_post_id =  get_post_meta($get_post_meta_id ,'custom_post_product', true );
                            if(!empty($get_all_post_id)){
                                $get_all_post_id = $get_all_post_id;

								$count = 0;
								$get_product_data = array( 
								'post_type' => 'products',
								'post_status' => 'publish',
								'posts_per_page' => -1, 
								'post__in' => $get_all_post_id,
                            
                        );

                       
                        $all_home_product = new WP_Query( $get_product_data ); 

                        if ( $all_home_product->have_posts() ) : 
                            // Start the Loop 
                            while ( $all_home_product->have_posts() ) : $all_home_product->the_post();
                            $count++;
                            $thumbproduct_id = get_post_thumbnail_id();
                            $thumb_url_array_product_image = wp_get_attachment_image_src($thumbproduct_id, 'thumbnail-size', true);
                            $thumb_url=null;
                            if(!empty( $thumb_url_array_product_image)){
                                $product_image_thumb_url = $thumb_url_array_product_image[0]; 
                            }
                            $meta_url = wp_get_attachment_image_src(get_post_meta(get_the_ID(), 'product_second_featured_image', true),'thumbnail-size');
                            // $meta_url=null;
                            if(!empty($meta_url)){
                                 $meta_url_src = $meta_url[0]; 
                            }

                  ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 product_wrap product_padding text-center ">
                        <div class="product_shadow_view">
                            <a href="<?php echo $product_image_thumb_url;?>" class="product_hover produt_pop" title="<?php the_title();?>">
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
                     if ($count >= 3) {
                        $count = 0;
					 }
                        endwhile;
                        else:
                        ?>
                    <div class="col-md-12 col-sm-2 col-xs-12 product_wrap product_padding text-center ">
                        <p>Sorry! no product found </p>
                    </div>
                    <?php
                         endif;
                        
					 }else{
						 ?>
                     <div class="col-md-12 col-sm-2 col-xs-12 product_wrap product_padding text-center ">
                        <p>Sorry! no product found</p>
                    </div>
                    <?php
                     }
                     wp_reset_postdata( );
                    ?>
                </div>

            </div>
        </div>
</section>


<section class="shop_content  d-sm-none d-lg-block d-md-block d-none">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 ml-auto">
            <?php the_excerpt();?>
        </div>
        </div>
    </div>
</section>

<section class="d-sm-none d-lg-block d-md-block d-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 ml-auto">
                <div class="">

                </div>
                <div class="wrapper">
                    <div class="carousel">
                        <?php

                $get_post_meta_id = get_the_ID();
                $get_all_post_id =  get_post_meta($get_post_meta_id ,'custom_post_product', true );
                if(!empty($get_all_post_id)){
                    $get_all_post_id = $get_all_post_id;
                    $get_product_imgdata = array(  
                    'post_type' => 'products',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => -1, 
                    'post__in' => $get_all_post_id,
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
                        $meta_url = wp_get_attachment_image_src(get_post_meta( $post->ID, 'product_second_featured_image', true),'thumbnail-size');
                        if(!empty($meta_url)){
                            $meta_url_src = $meta_url[0]; 
                        }
                    ?>




                        <div>
                            <div class="header">
                                <img src="<?php echo $meta_url_src;?>">
                            </div>
                        </div>

                        <?php
                        endwhile;
                        endif;
                        wp_reset_postdata( );
                    }
                        
                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="shop_fotercontent  d-sm-none d-lg-block d-md-block d-none">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 ml-auto">
            <?php the_content();?>
        </div>  
        </div>
    </div>
</section>
<?php

endwhile; 
wp_reset_postdata();
?>
<section class="related_product  d-sm-none d-lg-block d-md-block d-none">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 ml-auto">
                <div class="related_product_tit">
                    <h1>Related Product</h1>
                </div>

                <div class="row mb_shop">
                    <?php
                     $get_allrelated_post =  get_post_meta( $post->ID,'posts_related_product', true );
                    if( $get_allrelated_post):
                     foreach( $get_allrelated_post as $related_postdata ):
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span>></span> <a href="<?= get_the_permalink($related_postdata);?>"><?php echo get_the_title($related_postdata);?></a>
                        </div>
                    </div>
                    <?php endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer_titsec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 mx-auto">
                <div class="footer_sectit">
                    <h1>Let us Quote you happy</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<?php  get_footer();?>