<?php 
global $hcc_options; 
$class = $hcc_options['sections-about-class'];
$title = $hcc_options['sections-about-title'];
$content = $hcc_options['sections-about-content'];
$media = $hcc_options['sections-about-media'];
$link = $hcc_options['sections-about-link'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_about', $page_details ); 
?>
<section id="section-about" class="<?php if(@$hcc_options['sections-about-background-type'] == 1) echo @$hcc_options['sections-about-background'] . ' ';?><?php if(@$hcc_options['sections-about-color-type'] == 1) echo @$hcc_options['sections-about-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<!-- <div class="container-fluid"> -->
		<?php do_action( 'action_before_about', $page_details ); ?>
			<div class="row align-items-center no-gutters">
				<div class="col-lg-6">
					<?php if (@$media['id']) : ?>
						<img class="img-fluid img-about" src="<?php echo aq_resize(wp_get_attachment_url($media['id']),880,480,true); ?>" alt="<?php echo strip_tags(do_shortcode( $title )); ?>">
					<?php endif; ?>
				</div>
				<div class="col-lg-6">
					<div class="con-wrap">
						<?php if ($title) : ?>				
							<div class="title-wrapper wow fadeInDown">
								<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
							</div>
						<?php endif; ?>
						<?php if ($content) : ?>				
							<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
						<?php endif; ?>	
						<?php if ($link['text_field_1'] AND $link['text_field_2']) : ?>				
							<a href="<?php echo esc_url(do_shortcode($link['text_field_2'])); ?>" class="btn rounded-0 btn-about wow fadeInUp"><?php echo do_shortcode( $link['text_field_1'] ) ?></a>
						<?php endif; ?>						
					</div>
				</div>
			</div>

		<?php do_action( 'action_after_about', $page_details ); ?>
		<!-- </div> -->	
	</div>
</section>
<?php do_action( 'action_below_about', $page_details  ); ?>