<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shoping_theme
 */

?>

<section class="shopfooter">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="shopfooter_logo">
                    <a href="<?php bloginfo('url')?>">
						<img src="<?php echo get_theme_mod("wp_footer_logo_setting");?>" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="shopfooter_logo_detls">
                    <p><?php echo get_theme_mod("wp_footer_details_setting");?></p>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">

			<?php if ( is_active_sidebar( 'get_in_touch' ) ) : ?>
                 <?php 
                    dynamic_sidebar( 'get_in_touch' );
                 ?>
                 <?php else : ?>
					<div class="footer_wedg_tit">
                    	<h3>get in touch</h3>
                	</div>
					<div class="footer_wedg_content">
						<ul>
							<li class="phn_wedg_content"><span><a href="#"><i class="fas fa-phone"></i>(877) 300-2405</a></span></li>
							<li class="emain_wedg_content"><span><a href="#"><i class="fas fa-envelope"></i>Email Support</a></span></li>
							<li class="emain_wedg_content"><span><a href="#"><i class="fas fa-map-marker-alt"></i> dummy 39899 Balentine Drive Suite 200,900</a></span></li>
							<li class=""><span><a href="#"><i class="fas fa-comment-alt"></i>contact us</a></span></li>
						</ul>
					</div>
                <?php endif; ?> 
				
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">


			<?php if ( is_active_sidebar( 'help_widgets' ) ) : ?>
                 <?php 
                    dynamic_sidebar( 'help_widgets' );
                 ?>
                 <?php else : ?>
					<div class="footer_wedg_tit">
                   		<h3> Help<h3>
                	</div>
					<div class="footer_helpwedg">
						<ul>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class=""> <a href="#">our process</a></li>
						</ul>
					</div>
                <?php endif; ?> 				
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">
			<?php if ( is_active_sidebar( 'product_widgets' ) ) : ?>
                 <?php 
                    dynamic_sidebar( 'product_widgets' );
                 ?>
                 <?php else : ?>
					<div class="footer_wedg_tit">
                    	<h3> Product<h3>
                	</div>
					<div class="footer_helpwedg">
						<ul>
							<li class="footer_helpwedgmb"> <a href="#"> Blcnk Vape cartridge</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#"> Blcnk Vape cartridge</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#"> Blcnk Vape cartridge</a></li>
							<li class="footer_helpwedgmb"> <a href="#"> Blcnk Vape cartridge</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#"> Vape cartridge</a></li>
							<li class=""> <a href="#"> cartridge</a></li>
						</ul>
					</div>
                <?php endif; ?> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
			<?php if ( is_active_sidebar( 'brand_widgets' ) ) : ?>
                 <?php 
                    dynamic_sidebar( 'brand_widgets' );
                 ?>
                 <?php else : ?>
					<div class="footer_wedg_tit">
                    	<h3> our brands<h3>
                	</div>
					<div class="footer_helpwedg">
						<ul>
							<li class="footer_helpwedgmb"> <a href="#"> Blcnk Vape cartridge</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#"> Blcnk Vape cartridge</a></li>
							<li class="footer_helpwedgmb"> <a href="#">our process</a></li>
							<li class="footer_helpwedgmb"> <a href="#"> Blcnk Vape cartridge</a></li>
							<li class=""> <a href="#"> Blcnk Vape cartridge</a></li>
							
						</ul>
					</div>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>

</body>
</html>
