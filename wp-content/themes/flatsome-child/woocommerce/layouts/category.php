<div class="row category-page-row">
		<!-- class hide-for-medium -->
		<div class="col large-3 products-left  <?php flatsome_sidebar_classes(); ?>">
			<div class="filter-price">
				<h3>Filter By <span>Price</span></h3>
			</div>
			<div id="shop-sidebar" class="sidebar-inner col-inner">
				<?php
				  if(is_active_sidebar('shop-sidebar')) {
				  		dynamic_sidebar('shop-sidebar');
				  	} else{ echo '<p>You need to assign Widgets to <strong>"Shop Sidebar"</strong> in <a href="'.get_site_url().'/wp-admin/widgets.php">Appearance > Widgets</a> to show anything here</p>';
				  }
				?>
			</div>
		</div>

		<div class="col large-9 products-right">
			
	 
 		<?php
		/**
		 * Hook: woocommerce_before_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20 (FL removed)
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		do_action( 'woocommerce_before_main_content' );

		?>

		<?php
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		// do_action( 'woocommerce_archive_description' );
		?>

		<h5>Product <span>Compare(0)</span></h5>

		<?php

		if ( fl_woocommerce_version_check( '3.4.0' ) ? woocommerce_product_loop() : have_posts() ) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked wc_print_notices - 10
			 * @hooked woocommerce_result_count - 20 (FL removed)
			 * @hooked woocommerce_catalog_ordering - 30 (FL removed)
			 */
			do_action( 'woocommerce_before_shop_loop' ); ?>


			<?php
			if ( is_product_category() ){
			    global $wp_query;
			    $cat = $wp_query->get_queried_object();
			    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
			    $image = wp_get_attachment_url( $thumbnail_id ); 
				$prod_term=get_term($cat->term_id,'product_cat');
				$description=$prod_term->description;
				$title = get_term_meta($cat->term_id, 'cat_meta', true);
				$itemTitle = isset($title['cat_header']) ? $title['cat_header'] : '';
			} ?>
			
			<div class="<?php echo isset($image) ? 'men-wear-bottom' : 'd-none' ?>">
				<div class="col-sm-4 men-wear-left">
					<img class="img-responsive" src='<?php echo $image ?>' alt=" ">
				</div>
				<div class="col-sm-8 men-wear-right">
					<h4><?php echo $itemTitle; ?></h4>
					<p><?php echo $description; ?></p>
					 
				</div>
				<div class="clearfix"></div>
			</div>

	<?php   woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 *
					 * @hooked WC_Structured_Data::generate_product_data() - 10
					 */
					do_action( 'woocommerce_shop_loop' );

					wc_get_template_part( 'content', 'product' );
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		}
		?>

		<?php
			/**
			 * Hook: flatsome_products_after.
			 *
			 * @hooked flatsome_products_footer_content - 10
			 */
			do_action( 'flatsome_products_after' );
			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		</div>
</div>
