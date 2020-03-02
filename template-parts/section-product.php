<?php 
global $hcc_options; 
$class = $hcc_options['sections-product-class'];
$title = $hcc_options['sections-product-title'];
$content = $hcc_options['sections-product-content'];
$slides = $hcc_options['sections-product-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_product', $page_details ); 
?>
<section id="section-product" class="<?php if(@$hcc_options['sections-product-background-type'] == 1) echo @$hcc_options['sections-product-background'] . ' ';?><?php if(@$hcc_options['sections-product-color-type'] == 1) echo @$hcc_options['sections-product-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container-fluid">
			<div class="row justify-content-md-center">
				<div class="col-lg-10">
				<?php do_action( 'action_before_product', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($slides) : ?>				
					<div class="row">
						<?php foreach( $slides as $slide ) : ?>
							<div class="col-lg-3 col-md-6 mb-4">
								<div class="unit h-100 position-relative">
									<img class="img-fluid img-product" src="<?php echo aq_resize(wp_get_attachment_url( $slide['attachment_id'] ),376,450,true) ?>" alt="<?php echo strip_tags(do_shortcode($slide['title'])) ?>">
									<?php if ($slide['link_url']) :?>
										<a href="<?php echo esc_url(do_shortcode($slide['link_url'])) ?>" class="hidden-link">Read More</a>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>							
					</div>
				<?php endif; ?>
				<?php do_action( 'action_after_product', $page_details ); ?>					
				</div>
			</div>

		</div>	
	</div>
</section>
<?php do_action( 'action_below_product', $page_details  ); ?>