<?php 
global $hcc_options; 
$class = $hcc_options['sections-partner-class'];
$title = $hcc_options['sections-partner-title'];
$content = $hcc_options['sections-partner-content'];
$slides = $hcc_options['sections-partner-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_partner', $page_details ); 
?>
<section id="section-partner" class="<?php if(@$hcc_options['sections-partner-background-type'] == 1) echo @$hcc_options['sections-partner-background'] . ' ';?><?php if(@$hcc_options['sections-partner-color-type'] == 1) echo @$hcc_options['sections-partner-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_partner', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($slides) : ?>				
					<div class="slides-wrapper wow fadeInUp">
						<?php if(sizeof($slides) > 1) : ?>
							<div class="row partners">
								<?php foreach($slides as $slide) : ?>
									<div class="col-lg-3 col-md-6 mb-3">
										<div class="unit h-100 position-relative text-center">
											<?php if ($slide["link_url"]) : ?><a target="_blank" href="<?php echo esc_url(do_shortcode($slide["link_url"])); ?>"><?php endif ?>
											<img class="img-fluid img-partner" src="<?php echo aq_resize(wp_get_attachment_url( $slide['attachment_id'] ),255,100,true);?>" alt="<?php echo strip_tags(do_shortcode($slide['title'])) ?>" width="255" height="100">
											<?php if ($slide["link_url"]) : ?></a><?php endif ?>									
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>					
					</div>
				<?php endif; ?>
		<?php do_action( 'action_after_partner', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_partner', $page_details  ); ?>