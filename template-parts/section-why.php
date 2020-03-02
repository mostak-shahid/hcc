<?php 
global $hcc_options; 
$class = $hcc_options['sections-why-class'];
$title = $hcc_options['sections-why-title'];
$content = $hcc_options['sections-why-content'];
$slides = $hcc_options['sections-why-slides'];
$media = $hcc_options['sections-why-media'];
$link = $hcc_options['sections-why-link'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_why', $page_details ); 
?>
<section id="section-why" class="<?php if(@$hcc_options['sections-why-background-type'] == 1) echo @$hcc_options['sections-why-background'] . ' ';?><?php if(@$hcc_options['sections-why-color-type'] == 1) echo @$hcc_options['sections-why-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_why', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<div class="row justify-content-center">
				<?php if($media['id']) : ?>
					<div class="col-lg-4">
						<img class="img-fluid img-why" src="<?php echo wp_get_attachment_url($media['id']) ?>" alt="<?php echo strip_tags(do_shortcode( $title )); ?>" width="<?php echo $media['width'] ?>" height="<?php echo $media['height'] ?>">
					</div>
				<?php endif; ?>
				<?php if($slides) : ?>
					<?php 
					$total = sizeof($slides);
					$half = round($total/2);
					$n = 1;
					?>
					<div class="col-lg-4">
					<?php foreach($slides as $slide) : ?>
						<?php if ($slide['title']) : ?>
							<div class="unit position-relative d-table mb-3">
								<div class="d-table-cell align-middle w90">
									<span class="unit-number"><?php echo $n ?></span>
								</div>
								<div class="d-table-cell align-middle">
								<?php if ($slide['title']) : ?>
									<h4 class="unit-title"><?php echo do_shortcode( $slide['title'] ); ?></h4>
								<?php endif; ?>
								<?php if ($slide['description']) : ?>
									<div class="unit-desc"><?php echo do_shortcode( $slide['description'] ); ?></div>
								<?php endif; ?>
								<?php if ($slide['link_title']) : ?>
									<span><?php echo do_shortcode( $slide['link_title'] ); ?></span>	
								<?php endif; ?>
								</div>
							<?php if ($slide['link_url']) : ?>
								<a href="<?php echo esc_url(do_shortcode($slide['link_url'] )); ?>" class="hidden-link">Read More</a>
							<?php endif; ?>
							</div>

							<?php if ($n==$half) : ?>
								</div><div class="col-lg-4">
							<?php endif; ?>
							<?php $n++; ?>
						<?php endif; ?>
					<?php endforeach; ?>
					</div>
				<?php endif; ?>
				</div>
				<?php if ($link['text_field_1'] AND $link['text_field_2']) : ?>
					<div class="why-btn-wrap"><a href="<?php echo esc_url(do_shortcode($link['text_field_2'])); ?>" class="btn btn-block btn-why"><?php echo do_shortcode( $link['text_field_1'] ); ?></a></div>
				<?php endif; ?>
		<?php do_action( 'action_after_why', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_why', $page_details  ); ?>