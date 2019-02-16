<?php 
$id     = get_the_ID();
$bgopt  = get_post_meta( absint( $id ), '_repair_builderpage_headerimg', true );

$glob_class = ' global-banner';
$setbgurl   = '';

if ( $bgopt == 'featured' ) {
	$setbgurl  = get_the_post_thumbnail_url( absint( $id ) );
	$glob_class = '';
}
?>
<section class="banner-area relative<?php echo esc_attr( $glob_class  ); ?>" <?php echo repair_inline_bg_img( $setbgurl ); ?>>
	<?php 
	if( repair_opt( 'repair-headeroverlay-toggle-settings' ) ) {
		echo '<div class="overlay overlay-bg"></div>';
	}
	?>
	
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<?php 
				if ( is_archive() ) {
					the_archive_title('<h1>', '</h1>');
				} elseif ( is_home() ) {
					echo '<h1>'.esc_html__( 'Blog', 'repair' ).'</h1>';
				} elseif ( is_search() ) {
					echo '<h1>'.esc_html__( 'Search Result', 'repair' ).'</h1>';
				} else {
					the_title( '<h1>', '</h1>' );
				}
				// breadcrumbs
				echo repair_breadcrumbs();
				?>	
			</div>											
		</div>
	</div>
</section>

<?php

