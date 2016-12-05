<?php
	focuson_ninzio_global_variables();
	$nz_shop_rp             = ($GLOBALS['focuson_ninzio']['shop-rp'] && $GLOBALS['focuson_ninzio']['shop-rp'] == 1) ? "true" : "false";
	$nz_shop_rpn            = ($GLOBALS['focuson_ninzio']['shop-rpn']) ? $GLOBALS['focuson_ninzio']['shop-rpn'] : 3;
 ?>
<?php if ($nz_shop_rp == "true"): ?>
	<?php
		$posts_number = ($GLOBALS['focuson_ninzio']['shop-rpn']) ? $GLOBALS['focuson_ninzio']['shop-rpn'] : 4;
		$terms        = get_the_terms( $post->ID , 'product_tag');
	?>
	<?php if ($terms): ?>
		<?php

			$tagids = array();
			foreach($terms as $tag) {$tagids[] = $tag->term_id;}

			$args = array(
				'post_type' => 'product',
				'tax_query' => array(
		            array(
		                'taxonomy' => 'product_tag',
		                'field'    => 'id',
		                'terms'    => $tagids,
		                'operator' => 'IN'
		             )
		        ),
				'posts_per_page'      => $posts_number,
				'ignore_sticky_posts' => 1,
				'orderby'             => 'date',
				'post__not_in'        => array($post->ID)
			);

		    $related_products = new WP_Query($args);

		?>
		<?php if ($related_products->have_posts()): ?>
			<div class="nz-related-products column-<?php echo $posts_number; ?>">
				<div class="related-products-title"><h3><?php echo esc_html__('Related products', 'focuson'); ?></h3></div>	
				<ul class="products nz-clearfix">
					<?php while ( $related_products->have_posts() ) : $related_products->the_post(); ?>
						<li class="mix product nz-clearfix" data-grid="ninzio_01">
							<?php global $product; ?>
							<?php if ( $product->is_on_sale() ) : ?>
			                    <?php
			                    
			                        $sale_price = get_post_meta( $product->id, '_price', true);
			                        $regular_price = get_post_meta( $product->id, '_regular_price', true);

			                        if (empty($regular_price)){ //then this is a variable product
			                            $available_variations = $product->get_available_variations();
			                            $variation_id=$available_variations[0]['variation_id'];
			                            $variation= new WC_Product_Variation( $variation_id );
			                            $regular_price = $variation ->regular_price;
			                            $sale_price = $variation ->sale_price;
			                        }
			                        $sale = ceil(( ($regular_price - $sale_price) / $regular_price ) * 100);
			                    ?>
			                    <?php if ( !empty( $regular_price ) && !empty( $sale_price ) && $regular_price > $sale_price ) : ?>
			                        <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="product-status onsale">-' . $sale . '%</span>', $post, $product ); ?>
			                    <?php endif ?>
			                <?php endif; ?>
			                <a href="<?php echo get_the_permalink(); ?>">
				                <div class="nz-thumbnail">
				                    <?php echo woocommerce_get_product_thumbnail();?>
				                    <?php
				                        if (class_exists('MultiPostThumbnails')) {
				                            if (MultiPostThumbnails::has_post_thumbnail('product', 'feature-image-2')) {
				                            $thumb_2 = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post->ID);

				                            echo '<img class="hover-img" src="'.$thumb_2.'" alt="'.get_the_title().'">';
				                            }
				                        }
				                    ?>
				                </div>
			                </a>
			                <div class="product-details">

								<div class="product-title nz-clearfix">
									<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
									<?php if ( $price_html = $product->get_price_html() ): ?>
										<span class="price"><?php echo $price_html; ?></span>
									<?php endif; ?>
								</div>
								<div class="cart-wrap nz-clearfix">
			            			<div class="shop-loader">&nbsp;</div>
		                        	<?php woocommerce_template_loop_add_to_cart(); ?>
			                    </div>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endif ?>
	<?php endif ?>
<?php endif; ?>