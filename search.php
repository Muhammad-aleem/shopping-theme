<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package shoping_theme
 */

get_header();
?>

<div class="container">
	<div class="row">
		<?php if ( have_posts() ) : ?>

		
					<?php
					/* translators: %s: search query. */
					//printf( esc_html__( 'Search Results for: %s', 'mixbox-com' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
					<div class="col-md-4 col-sm-4 col-xs-12 product_wrap product_padding text-center ">
                <div class="product_shadow_view">
                    <?php
                            $url = home_url().'/main-shop-page/?id='.get_the_ID().'';
                        ?>
                    <a href="<?= $url;?>" class="product_hover search_img">
						<?php the_post_thumbnail(); ?>
                    </a>
                    <div class="product_details">
                        <h2><?php 
                                  echo wp_trim_words( the_title(),6, '...' );
                                  
								?>
                        </h2>
                        <?php  $get_url = home_url().'/quote';?>
                        <a href="<?= $get_url;?>" class="product_read_more">Get a Quote</a>
                    </div>
                </div>
            </div>
				<?php

			
			endwhile;

			the_posts_navigation();

		else :

			?>
			<div class="container mt-5 mb-5">
				<div class="row">
					<div class="col-md-12">
						<h2 class="mt-5 mb-5">Search Error Message: </h2>
						<h6>
							<?php  esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mixbox-com' ); ?>
						</h6>
					</div>
				</div>

			</div>


			<?php

		endif;
		?>

	</div>
</div>

<?php
get_sidebar();
get_footer();