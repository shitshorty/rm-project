<?php
/**
 * single-news
 *
 * @package WordPress
 * @subpackage IDEE EDAY Visual Design
 * @since RMUTR by IDEE EDAY 1.0
 */

get_header();
// Start the loop.
while ( have_posts() ) :
	the_post();
?>
<div class="<?php echo esc_attr( visualcomposerstarter_get_content_container_class() ); ?>">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="main-content">
					<article class="entry-full-content">
						<div class="row">
							<div class="<?php echo esc_attr( visualcomposerstarter_get_maincontent_block_class() ); ?>">
								<div class="col-md-2">
									<?php
									//Disable Author Picture
										//get_template_part( 'template-parts/video/biography' );
									?>
								</div><!--.col-md-2-->
								<div class="col-md-10">
									<?php
									
									get_template_part( 'template-parts/video/content', 'single' );;?>
									<div class ="entry-meta">
										<span class ="date"> วันที่: <?php the_date('j/n/Y');?> เวลา: <?php the_time('G:i:s:T'); ?><br /></span></div>
									<?php
									/*
									 * Add category link
									 */
									echo 'หมวดหมู่: '; customtype_get_terms( $post->ID, 'news-type' ); echo '<br />';
									/*
									 * Add tags link
									 */
									echo 'ป้าย: '; customtype_get_terms( $post->ID, 'news-tag' );
									if ( is_singular( 'video' ) ) : ?>
										<div class="nav-links post-navigation">
											<div class="row">
												<div class="col-md-5">
													<div class="nav-previous">
														<?php
														previous_post_link(
															'%link',
															'<span class="meta-nav">' . esc_html__( 'ก่อนหน้า', 'visual-composer-starter' ) . '</span><span class="screen-reader-text">' . esc_html__( 'Previous post:', 'visual-composer-starter' ) . '</span><span class="post-title">%title</span>'
														);
														?>
													</div><!--nav-previous-->
												</div><!--.col-md-5-->
												<div class="col-md-5 col-md-offset-2">
													<div class="nav-next">
														<?php
														next_post_link(
															'%link',
															'<span class="meta-nav">' . esc_html__( 'ถัดไป', 'visual-composer-starter' ) . '</span><span class="screen-reader-text">' . esc_html__( 'Next post:', 'visual-composer-starter' ) . '</span><span class="post-title">%title</span>'
														);
														?>
													</div><!--.nav-next-->
												</div><!--.col-md-5-->
											</div><!--.row-->
										</div><!--.nav-links post-navigation-->
									<?php endif; ?>
								</div><!--.col-md-10-->
								<?php
								/*
								 *Add custom category
								 */
								 $terms_list = wp_get_post_terms($post->ID, 'news');
										foreach($terms_list as $term){
											echo $term->name;}
											?>
								
							</div><!--.<?php echo esc_html( visualcomposerstarter_get_maincontent_block_class() ); ?>-->
							<?php if ( visualcomposerstarter_get_sidebar_class() ) : ?>
								<?php get_sidebar(); ?>
							<?php endif; ?>
						</div><!--.row-->
					</article><!--.entry-full-content-->
				</div><!--.main-content-->
			</div>
		</div><!--.row-->
	</div><!--.content-wrapper-->
</div><!--.<?php echo esc_html( visualcomposerstarter_get_content_container_class() ); ?>-->
<?php
//No more wp comment
	/*
	if ( comments_open() || get_comments_number() ) {
	comments_template();
		
}
	*/
// End of the loop.
endwhile;
get_footer();
