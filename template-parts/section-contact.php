<?php 
global $hcc_options; 
$class = $hcc_options['sections-contact-class'];
$title = $hcc_options['sections-contact-title'];
$content = $hcc_options['sections-contact-content'];
$shortcode = $hcc_options['sections-contact-shortcode'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_contact', $page_details ); 
?>
<section id="section-contact" class="<?php if(@$hcc_options['sections-contact-background-type'] == 1) echo @$hcc_options['sections-contact-background'] . ' ';?><?php if(@$hcc_options['sections-contact-color-type'] == 1) echo @$hcc_options['sections-contact-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_contact', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($shortcode) : ?>				
					<div class="shortcode-wrapper wow fadeInUp"><?php echo do_shortcode( $shortcode ) ?></div>
				<?php endif; ?>
		<?php do_action( 'action_after_contact', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_contact', $page_details  ); ?>