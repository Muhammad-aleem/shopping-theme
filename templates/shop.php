<?php
/*
 * Template Name: Shop
 * description:  Page template without sidebar
 */


 get_header();

$get_url = get_template_directory_uri();



 ?>
    <section class="shop_banner_section home_shopbanner  d-sm-none d-lg-block d-md-block d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 my-auto">
                    <div class="shop_bannertext">
                        <h1><?php echo get_theme_mod("banner_details_setting");?></h1>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="shop_bannerimg">
                        <img src="<?php echo get_theme_mod("wp_banner_image_setting");?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop_content_section ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-12 col-sm-12">
                <div class="pop_product">
                    <h2>popular Product </h2>
                </div>
                <?php
                    $terms = get_terms(array('taxonomy'=> 'product_cat'));  ?>
                    <div id="shop_accordion">
                            <?php            
                            foreach ( $terms as $term ) {
                                // if ($term->parent == 0 ) {
                                    echo '<div class="shop_border_bottom">';
                                    echo ' <h4 class="shop_accordion-toggle">
                                                '.$term->name.'
                                                <i class="fas fa-chevron-down"></i>
                                            </h4>';

                                     echo '<div class="accordion-content">';
                                     echo ' <ul>';
                                     $subterms = get_terms(array('taxonomy'=> 'product_cat','hide_empty' => false,'parent'=> $term->term_id));
                                    foreach ($subterms as $key => $value) 
                                    {
                                       echo '<li><a href="#">'.$value->name.'</a></li>';
                                    }
                                    echo "</ul>";                       
                                    echo "</div>";   
                                    echo '</div>';                    
                                // }                   
                            
                                } 
                        ?>
                </div>
            
            <?php  
                ?>
                   
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="shop_product_top">
                            <h5>Home > Empty vape cart packaging</h5>
                            <h2>Your Local Vinyl Graphics Printing and Signage Services</h2>
                        </div>
                    </div>
                </div>
                <div class="row shop_promb">

                  <?php
                   $count = 0;
                    $get_product_data = array(  
                        'post_type' => 'shop_product',
                        'post_status' => 'publish',
                        'posts_per_page' => -1, 
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
                            $meta_url = wp_get_attachment_image_src(get_post_meta( $post->ID, 'product_second_featured_image', true),'thumbnail-size');
                            // $meta_url=null;
                            if(!empty($meta_url)){
                                 $meta_url_src = $meta_url[0]; 
                            }
                  
                  ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="postt">
                            <div id="f1_container">
                                <div id="f1_card">
                                    <div class="front face al_imgfrnt">
                                        <img src="<?php echo $product_image_thumb_url;?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="back face al_imgfrnt">
                                        <img src="<?php echo $meta_url_src;?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pop_product_tit">
                            <a href="#"><?php the_title();?></a>
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
                    wp_reset_postdata( );
                   ?>  
                </div>
                <!-- <div class="row shop_promb">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="postt">
                        <div id="f1_container">
                            <div id="f1_card">
                                <div class="front face al_imgfrnt">
                                    <img src="assets/image/2.jpg" alt="" class="img-fluid">
                                  </div>
                                  <div class="back face al_imgfrnt">
                                    <img src="assets/image/aboutbg.jpg" alt="" class="img-fluid">
                                  </div>
                            </div>
                        </div>
                    </div>
        
                        <div class="pop_product_tit">
                            <a href="#">Product tittle</a>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-12">
                        <div id="f1_container">
                            <div id="f1_card">
                                <div class="front face al_imgfrnt">
                                    <img src="assets/image/aboutbg.jpg" alt="" class="img-fluid">
                                  </div>
                                  <div class="back face  al_imgfrnt">
                                    <img src="assets/image/2.jpg" alt="" class="img-fluid">
                                  </div>
                            </div>
                        </div>
                         <div class="pop_product_tit">
                            <a href="#">Product tittle</a>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-12">
                        <div id="f1_container">
                            <div id="f1_card">
                                <div class="front face al_imgfrnt">
                                    <img src="assets/image/aboutbg.jpg" alt="" class="img-fluid">
                                  </div>
                                  <div class="back face al_imgfrnt">
                                    <img src="assets/image/2.jpg" alt="" class="img-fluid">
                                  </div>
                            </div>
                        </div>
                        <div class="pop_product_tit">
                            <a href="#">Product tittle</a>
                            </div>
                     </div>
                </div>
                <div class="row shop_promb">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="postt">
                        <div id="f1_container">
                            <div id="f1_card">
                                <div class="front face al_imgfrnt">
                                    <img src="assets/image/2.jpg" alt="" class="img-fluid">
                                  </div>
                                  <div class="back face al_imgfrnt">
                                    <img src="assets/image/aboutbg.jpg" alt="" class="img-fluid">
                                  </div>
                            </div>
                        </div>
                    </div>
        
                        <div class="pop_product_tit">
                            <a href="#">Product tittle</a>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-12">
                        <div id="f1_container">
                            <div id="f1_card">
                                <div class="front face al_imgfrnt">
                                    <img src="assets/image/aboutbg.jpg" alt="" class="img-fluid">
                                  </div>
                                  <div class="back face  al_imgfrnt">
                                    <img src="assets/image/2.jpg" alt="" class="img-fluid">
                                  </div>
                            </div>
                        </div>
                         <div class="pop_product_tit">
                            <a href="#">Product tittle</a>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-12">
                        <div id="f1_container">
                            <div id="f1_card">
                                <div class="front face al_imgfrnt">
                                    <img src="assets/image/aboutbg.jpg" alt="" class="img-fluid">
                                  </div>
                                  <div class="back face al_imgfrnt">
                                    <img src="assets/image/2.jpg" alt="" class="img-fluid">
                                  </div>
                            </div>
                        </div>
                        <div class="pop_product_tit">
                            <a href="#">Product tittle</a>
                            </div>
                     </div>
                </div>  -->
            </div>
        </div>
    </div>
</section>


<section class="shop_content  d-sm-none d-lg-block d-md-block d-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 ml-auto">
                <div class="shop_content_tit">
                    <h2>Empty Vape cartridge Packaging</h2>
                </div>
                <div class="shop_content_text">
                    <p>Below is a sample of “Lorem ipsum dolor sit” dummy copy text often used to show font face samples, for page layout and design as sample layout text by printers, graphic designers, Web designers, people creating Microsoft Word templates, and many other uses. It mimics the look of real text quite well as you design and set up your page layouts.</p>
                </div>
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

                    $get_product_imgdata = array(  
                    'post_type' => 'shop_product',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => -1, 
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
                        ?>                            
    

                            <!-- <div>
                                <div class="header">
                                <img src="assets/image/aboutbg.jpg">
                                </div>
                            </div>
                            <div>
                                <div class="header">
                                <img src="assets/image/aboutbg.jpg">
                                </div>
                            </div>
                            <div>
                                <div class="header">
                                <img src="assets/image/aboutbg.jpg">
                                </div>
                            </div>
                            <div>
                                <div class="header">
                                    <img src="assets/image/aboutbg.jpg">
                                </div> 
                            </div>
                            <div>
                                <div class="header">
                                    <img src="assets/image/aboutbg.jpg">
                                </div>
                            </div>
                            <div>
                                <div class="header">
                                    <img src="assets/image/aboutbg.jpg">
                                </div>
                            </div>     -->
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
                <div class="shop_pro_details_tit">
                    <h3>Contant signs NYC Today to Get Started</h3>
                </div>
                <div class="shop_pro_details">
                    <ul>
                        <li class="shop_wdth">
                            <i class="fas fa-arrow-alt-circle-right"></i>
                        </li>
                        <li class="shop_content_wdth"><span>OXO Packaging</span> is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with OXO Packaging is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with </li>
                    </ul>
                </div>
                <div class="shop_pro_details">
                    <ul>
                        <li class="shop_wdth">
                            <i class="fas fa-arrow-alt-circle-right"></i>
                        </li>
                        <li class="shop_content_wdth"><span>OXO Packaging</span> is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with OXO Packaging is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with </li>
                    </ul>
                </div>
                <div class="shop_pro_details">
                    <ul>
                        <li class="shop_wdth">
                            <i class="fas fa-arrow-alt-circle-right"></i>
                        </li>
                        <li class="shop_content_wdth"><span>OXO Packaging</span> is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with OXO Packaging is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with </li>
                    </ul>
                </div>
                <div class="shop_pro_details">
                    <ul>
                        <li class="shop_wdth">
                            <i class="fas fa-arrow-alt-circle-right"></i>
                        </li>
                        <li class="shop_content_wdth"><span>OXO Packaging</span> is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with OXO Packaging is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with </li>
                    </ul>
                </div>
                <div class="shop_pro_details shop_pro_detailsmb">
                    <ul>
                        <li class="shop_wdth">
                            <i class="fas fa-arrow-alt-circle-right"></i>
                        </li>
                        <li class="shop_content_wdth shop_pro_detailsmb"><span>OXO Packaging</span> is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with OXO Packaging is a USA- based manufacturers’ hub for the production of all sorts of Custom Boxes with </li>
                    </ul>
                </div>
                <div class="shop_foter_more">
                    <h3>Contant signs NYC Today to Get Started</h3>
                    <p>Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur  adipisicing elit. Porro nostrum suscipit optio accusantium assumenda earum, fugit sequi eos aperiam, alias dicta harum quam iure dolores doloribus ratione perferendis mollitia. Rerum?</p>
                    <p>Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur <b>Lorem ipsum dolor sit amet</b> Lorem ipsum dolor sit amet consectetur  adipisicing elit. Porro nostrum suscipit optio accusantium assumenda earum, fugit sequi eos aperiam, alias dicta harum quam iure dolores doloribus ratione perferendis mollitia. Rerum?
                        <span><a href="#">Read More</a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related_product  d-sm-none d-lg-block d-md-block d-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 ml-auto">
                <div class="related_product_tit">
                    <h1>Related Product</h1>
                </div>
                <div class="row mb_shop">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span>  <a href="#">Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span><a href="#"> Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span><a href="#"> Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                </div>
                <div class="row mb_shop">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span> <a href="#">Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span> <a href="#"> Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span>  <a href="#"> Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                </div>
                <div class="row mb_shop">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span><a href="#"> Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span> <a href="#"> Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span><a href="#"> Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                </div>
                <div class="row mb_shop">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span> <a href="#">Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span> <a href="#">Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span>  <a href="#">Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                </div>
                <div class="row mb_shop">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                          <span> ></span> <a href="#">Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span> <a href="#"> Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="related_product_detls">
                            <span> ></span>   <a href="#"> Blcnk Vape cartridge packaging</a>
                        </div>
                    </div>
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