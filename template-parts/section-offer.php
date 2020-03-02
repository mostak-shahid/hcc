<?php 
global $hcc_options; 
$class = $hcc_options['sections-offer-class'];
$title = $hcc_options['sections-offer-title'];
$content = $hcc_options['sections-offer-content'];
$slides = $hcc_options['sections-offer-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_offer', $page_details ); 
?>
<section id="section-offer" class="<?php if(@$hcc_options['sections-offer-background-type'] == 1) echo @$hcc_options['sections-offer-background'] . ' ';?><?php if(@$hcc_options['sections-offer-color-type'] == 1) echo @$hcc_options['sections-offer-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_offer', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if (@$slides) : ?>				
					<div class="row justify-content-center slides-wrapper">
					<?php foreach ($slides as $slide) : ?>
						<div class="col-lg-4 mb-3">
							<div class="unit h-100 w-100 position-relatgive text-center">
								<?php // var_dump($slide); ?>
								<?php if ($slide['attachment_id']) : ?>
									<img class="img-fluid img-offer" src="<?php echo aq_resize(wp_get_attachment_url( $slide['attachment_id'] ),330,330,true) ?>" alt="<?php echo strip_tags(do_shortcode($slide['title'])) ?>" width="330" height="330">
								<?php endif; ?>
								<?php if ($slide['title']) : ?>
									<h4 class="title-offer"><?php echo do_shortcode($slide['title']) ?></h4>
								<?php endif; ?>
								<?php if ($slide['link_title']) : ?>
									<span class="title-link-title"><?php echo do_shortcode($slide['link_title']) ?></span>
								<?php endif; ?>
								<?php if ($slide['link_url']) : ?>
									<a href="<?php echo esc_url(do_shortcode($slide['link_url']))?>" class="hidden-link">Read More</a>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
				<?php endif; ?>
		<?php do_action( 'action_after_offer', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_offer', $page_details  ); ?>