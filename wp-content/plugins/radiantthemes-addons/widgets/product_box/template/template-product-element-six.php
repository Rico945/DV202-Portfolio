<?php
if ( 1 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box col-md-12">';
} elseif ( 2 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box col-md-6">';
} elseif ( 3 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box col-md-4">';
} elseif ( 4 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box col-md-3">';
} elseif ( 5 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box colmd2">';
} else {
}
// START OF LAYOUT Six
if ( 'true' === $settings['product_allow_carousel'] ) {
	echo '<article class="product-item swiper-slide">';
} else {
	echo '<article class="product-item">';
}
$hoverimage = get_post_meta( $product->get_id(), 'product_image_for_hover', true );
?>
<div class="holder">
	<div class="pic">
		<?php
		if ( $product->is_on_sale() ) {
			echo '<span class="onsale"> Sale</span>';
		}
		echo '<div class="action-buttons">
        
        <div class="button-area"><a  href="' . $product->add_to_cart_url() . '" class="rt-add-to-cart"><i class="lnr-cart"></i><span>' . esc_html__( 'Add To Cart', 'dello' ) . '</span></a></div>
        </div>';
		if ( $product->is_on_sale() && ! is_admin() && ! $product->is_type( 'variable' ) ) {
			// Get product prices
			$regular_price = (float) $product->get_regular_price(); // Regular price
			$sale_price    = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)
			// "Saving price" calculation and formatting
			$saving_price  = $regular_price - $sale_price;
			$saving_price1 = ( $saving_price * 100 ) / $regular_price;
			$saving_price1 = round( $saving_price1 );
			echo '<div class="offer">' . $saving_price1 . ' % Off</div>';
		}
		?>
		<?php
		echo ' <a href="' . get_permalink( $product->get_id() ) . '">';
		$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' );
		echo '<img alt="custom-image" class="primary-img" src="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . '" alt="No Image Found" srcset="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . ' 1x, ' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'shop_single' )[0] . ' 2x" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '">';
		echo '<img alt="custom-image" class="primary-hover-img" src="' . wp_get_attachment_image_src( $hoverimage, 'medium' )[0] . '" alt="Hover Image" srcset="' . wp_get_attachment_image_src( $hoverimage, 'medium' )[0] . ' 1x, ' . wp_get_attachment_image_src( $hoverimage, 'shop_single' )[0] . ' 2x" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '">';
		echo ' </a>';
		echo ' </div>';
		echo '<div class="product-description">';
		echo '<div class="product-description-inner ">';
		echo '<div class="product-title"><a href="' . get_permalink( $product->get_id() ) . '">' . $product->get_title() . '</a></div>';
		$sale_price = get_post_meta( get_the_ID(), '_price', true );
		if ( $sale_price == '' ) {
		} else {
			echo '<p class="price">' . $product->get_price_html() . '</p>';
		}
		if ( $average = $product->get_average_rating() ) :
			echo '<div class="star-rating" title="' . sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $average ) . '"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __( 'out of 5', 'woocommerce' ) . '</span></div>';
		endif;
		?>
		<div class="meta-wrapper">
			<?php //radiantthemes_shop_color(); ?>
		</div>
		<?php
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</article>';
		if ( 'false' === $settings['product_allow_carousel'] ) {
			echo '</div>';
		} else {
		}
