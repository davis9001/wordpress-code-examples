<?php
$args = array(
	'post_type'=> 'product',
	'posts_per_page' => 30,
	'order'    => 'ASC'
);
query_posts( $args );

while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
$productSku = get_post_meta(get_the_ID(), 'wpcf-sku', true);
?>
<a href="<?php the_permalink(); ?>">
 <div class="productsPageSmallBox">
 <div><img height="115px" src="<?php echo $thumb_url[0]; ?>" /></div>
 <div><p class="productTitle"><?php the_title() ?></p></div>
 </div>
</a>
<?php
endwhile;


wp_reset_query();
