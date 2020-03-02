<?php 
global $hcc_options;
if (is_home()) $page_id = get_option( 'page_for_posts' );
else $page_id = get_the_ID();

$from_theme_option = $hcc_options['archive-page-sections'];
$from_page_option = get_post_meta( $page_id, '_hcc_page_section_layout', true );
$sections = (@$from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];
?><?php get_header() ?>
<section id="archive" class="page-content <?php if(@$hcc_options['sections-content-background-type'] == 1) echo @$hcc_options['sections-content-background'] . ' ';?><?php if(@$hcc_options['sections-content-color-type'] == 1) echo @$hcc_options['sections-content-color'];?>">
	<div class="content-wrap">
		<div class="container">
			<?php if ( have_posts() ) :?>
				<div id="blogs" class="row">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-lg-6 mb-5">
							<div class="post-<?php echo get_the_ID();?> position-relative post-unit">
								<?php
								$atts = 'class="post-feature position-relative"';
								echo do_shortcode( "[feature-image wrapper_atts='".$atts."' height='350' width='540']" );
								?>
								<div class="post-meta d-table w-100 pt-3 pb-3">
									<div class="post-author d-table-cell">Post by : <?php echo get_author_name()?></div>
									<div class="post-date d-table-cell">Date : <?php echo get_post_time('d-m-Y'); ?></div>
								</div>
								<h4 class="post-header"><?php echo get_the_title() ?></h4>						
								<a class="hidden-link" href="<?php echo get_the_permalink(); ?>">Read More</a>
							</div>														
							<?php // get_template_part( 'content', get_post_format() ) ?>
						</div>
					<?php endwhile;?>						
				</div>
				<div class="pagination-wrapper">
				<?php
					the_posts_pagination( array(
						'show_all' => false,
						'screen_reader_text' => " ",
						'prev_text'          => '<i class="fa fa-angle-left"></i>',
						'next_text'          => '<i class="fa fa-angle-right"></i>',
					) );
				?>
				</div>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif;?>			
		</div>	
	</div>
</section>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>