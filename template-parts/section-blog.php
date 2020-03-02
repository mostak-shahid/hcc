<?php 
global $hcc_options; 
$class = $hcc_options['sections-blog-class'];
$title = $hcc_options['sections-blog-title'];
$content = $hcc_options['sections-blog-content'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_blog', $page_details ); 
?>
<section id="section-blog" class="<?php if(@$hcc_options['sections-blog-background-type'] == 1) echo @$hcc_options['sections-blog-background'] . ' ';?><?php if(@$hcc_options['sections-blog-color-type'] == 1) echo @$hcc_options['sections-blog-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_blog', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3,
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) : ?>
				    <div class="blog-wrapper row">
				    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
				        <div class="col-lg-4 mb-3">
				        	<div class="unit h-100 position-relative">
				        		<?php 
				        		$atts = 'class="unit-feature"';
				        		echo do_shortcode( "[feature-image wrapper_atts='{$atts}' height='350' width='350']" );
				        		?>
				        		<div class="unit-meta d-table w-100">
				        			<div class="unit-author d-table-cell">Post by: <?php echo get_author_name(); ?></div>
				        			<div class="unit-date d-table-cell">Date: <?php echo get_post_time( 'd-m-Y' ) ?></div>
				        		</div>
				        		<h4 class="unit-title"><?php echo get_the_title() ?></h4>
				        		<a href="<?php echo get_the_permalink(); ?>" class="hidden-link">Read More</a>
				        	</div>
				        </div>
				    <?php endwhile; ?>
				    </div>
				<?php endif; ?>
				<?php wp_reset_postdata();?>
				
		<?php do_action( 'action_after_blog', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_blog', $page_details  ); ?>