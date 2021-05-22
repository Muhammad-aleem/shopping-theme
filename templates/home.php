
<?php
/*
 * Template Name: Home
 * description:  Page template without sidebar
 */


 get_header();

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


 ?>
    <section class="shop_home_product mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 mx-auto">
                    <div class="home_product_tit">
                        <h1>Your Packaging Partner - Offering Custom Boxes with Logo</h1>
                        <p><?php the_title();?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php

            $get_product_data = array(  
            'post_type' => 'shop_product',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
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
                $meta_url = wp_get_attachment_image_src(get_post_meta( $post->ID, 'product_second_featured_image', true),'thumbnail-size');
                // $meta_url=null;
                if(!empty($meta_url)){
                     $meta_url_src = $meta_url[0]; 
                }
                // echo $meta_url_src;
            ?>
            <div class="col-md-4 col-sm-4 col-xs-12 product_wrap product_padding text-center ">
                    <div class="product_shadow_view">
                        <a href="#" class="product_hover">
                            <img src="<?php echo $product_image_thumb_url;?>" class="img-fluid" alt="">
                            <img src="<?php echo $meta_url_src;?>" class="img-fluid" alt="">
                        </a>
                        <div class="product_details">
                            <h2><?php the_title();?></h2>
                            <p><?php the_excerpt();?></p>
                            <a href="#" class="product_read_more">Get Started</a>
                        </div>
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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 mx-auto">
                    <div class="home_product_tit">
                        <h1>Popular Styles box packaging</h1>
                        <p>We provides you the best packaging solutions with customized printed box service, which matches your industry and product specific needs. Get high quality custom boxes with logo with a flexible and simple packaging process.</p>
                    </div>
                </div>
            </div>
            <div class="shophome_slider_wrapper">
                <div class="box_carousel">

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
            ?>

                        <div>
                            <div class="product_box_border">
                                <img src="<?php echo $product_image_thumb_url;?>" alt="">
                            </div>
                        </div>
                        
<?php

endwhile;
endif;
wp_reset_postdata( );?>

                </div>
            </div>
        </div>
    </section>



    <section class="testimonial_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 mx-auto text-center">
                    <div class="testimonial_tit">
                        <h5>OUR TESTIMONIAL</h5>
                        <h3>We care about your opinion</h3>
                    </div>
                </div>
            </div>
            <?php echo do_shortcode("[testimonial_shortcode]"); ?>
        </div>
    </section>



    
    <section class="footer_content">
        <div class="container-fluid">
            <div class="row shop_home_mb">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="footer_content_tit">
                        <h3>Why Use a Local Sign Shop in New York and New Jersey ?</h3>
                        <p>Signs remain the best communication channel available in a densely populated, diverse, and heavily foot trafficked place like New York-and perhaps the most vital part of advertising your retail space or commercial property to those passing right by your front door every day.</p>
                        <p>Signs allow you to capture the eyes, captivate the imagination, and endear your brand to the minds of potential customers in and around one of the busiest cities in the world.  You can choose signs that:</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                    </div>   
                    <div class="footer_content_tit">
                        <p>Signs allow you to capture the eyes, captivate the imagination, and endear your brand to the minds of potential customers in and around one of the busiest cities in the world.  You can choose signs that:</p>
                    </div>     
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="footer_content_tit">
                        <h3>WSome of our most popular signs request in NYC</h3>
                        <p>We feature over 20 different innovative varieties of signs for your business, some of which you may not have previously considered-or even known about. Our sign options include:</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer_content_tit">
                        <p>We have magnetic signs, metal and plastic letters, ADA compliant signs, vinyl banners, real estate signs, corrugated plastic signs, and channel letters. We also offer sign repair, cleaning, and maintenance services for both our own signs and those of our competitors. if it's a question related to visual advertising-lighted and non-lighted, indoors or out-chances are we have the answer. And as always, all of our work is covered by a written guarantee.</p>
                    </div>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="footer_content_tit">
                        <h3>Why Use a Local Sign Shop in New York and New Jersey ?</h3>
                        <p>Signs remain the best communication channel available in a densely populated, diverse, and heavily foot trafficked place like New York-and perhaps the most vital part of advertising your retail space or commercial property to those passing right by your front door every day.</p>
                        <p>Signs allow you to capture the eyes, captivate the imagination, and endear your brand to the minds of potential customers in and around one of the busiest cities in the world.  You can choose signs that:</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                    </div>   
                    <div class="footer_content_tit">
                        <p>Signs allow you to capture the eyes, captivate the imagination, and endear your brand to the minds of potential customers in and around one of the busiest cities in the world.  You can choose signs that:</p>
                    </div>     
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="footer_content_tit">
                        <h3>WSome of our most popular signs request in NYC</h3>
                        <p>We feature over 20 different innovative varieties of signs for your business, some of which you may not have previously considered-or even known about. Our sign options include:</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <ul class="home_footer_icn">
                                <li style="text-align: justify;"><a href="#"> Neon Signs </a></li>
                                <li style="text-align: justify;"><a href="#"> Aluminum Signs </a></li>
                                <li><a href="#"> Custom Vinyl Banners&nbsp;</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer_content_tit">
                        <p>We have magnetic signs, metal and plastic letters, ADA compliant signs, vinyl banners, real estate signs, corrugated plastic signs, and channel letters. We also offer sign repair, cleaning, and maintenance services for both our own signs and those of our competitors. if it's a question related to visual advertising-lighted and non-lighted, indoors or out-chances are we have the answer. And as always, all of our work is covered by a written guarantee.</p>
                    </div>
                    
                </div>
            </div>
        </div>

    </section>

    <main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
 <?php


 
// echo do_shortcode("[banner_scode]");

 get_footer();