<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Check stock status.
$out_of_stock = ! $product->is_in_stock();

// Extra post classes.
$classes   = array();
$classes[] = 'product-small';
$classes[] = 'col';
$classes[] = 'has-hover';

if ( $out_of_stock ) $classes[] = 'out-of-stock';

?>

<div <?php fl_woocommerce_version_check( '3.4.0' ) ? wc_product_class( $classes, $product ) : post_class( $classes ); ?>>
	<div class="col-inner">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<div class="custom-padding product-men">
		<div class="men-pro-item product-small box <?php echo flatsome_product_box_class(); ?>">
			<div class="box-image">
				<div class="<?php echo flatsome_product_box_image_class(); ?>">
					<a href="<?php echo get_the_permalink(); ?>">
						<?php
							/**
							 *
							 * @hooked woocommerce_get_alt_product_thumbnail - 11
							 * @hooked woocommerce_template_loop_product_thumbnail - 10
							 */
							do_action( 'flatsome_woocommerce_shop_loop_images' );
						?>
					</a>
				</div>
				<div class="image-tools is-small top right show-on-hover">
					<?php do_action( 'flatsome_product_box_tools_top' ); ?>
				</div>
				<div class="image-tools is-small hide-for-small bottom left show-on-hover">
					<?php do_action( 'flatsome_product_box_tools_bottom' ); ?>
				</div>
				<div class="image-tools <?php echo flatsome_product_box_actions_class(); ?>">
					<?php do_action( 'flatsome_product_box_actions' ); ?>
				</div>
				<?php if ( $out_of_stock ) { ?><div class="out-of-stock-label"><?php _e( 'Out of stock', 'woocommerce' ); ?></div><?php } ?>
			</div><!-- box-image -->

			<div class="custom-box-info-cart item-info-product  box-text <?php echo flatsome_product_box_text_class(); ?>">
				<?php
					do_action( 'woocommerce_before_shop_loop_item_title' );

					echo '<div class="title-wrapper-custom title-wrapper">';
					echo '<h4><a href="'. get_the_permalink() .'">' . get_the_title() .'</a></h4>';
					// do_action( 'woocommerce_shop_loop_item_title' );
					echo '</div>';


					echo '<div class="price-wrapper-custom price-wrapper">';
					do_action( 'woocommerce_after_shop_loop_item_title' );
					echo '</div>';

					do_action( 'flatsome_product_box_after' );

					echo '<div class="hvr-outline-out">';
					echo '<div class="snipcart-details">';
					echo woocommerce_template_loop_add_to_cart();
					echo '</div>';
					echo '</div>';

				?>
			</div><!-- box-text -->
		</div><!-- box -->
	</div>
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</div><!-- .col-inner -->
</div><!-- col -->
