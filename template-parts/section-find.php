<?php 
global $hcc_options; 
$class = $hcc_options['sections-find-class'];
$title = $hcc_options['sections-find-title'];
$content = $hcc_options['sections-find-content'];
$link = $hcc_options['sections-find-link'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_find', $page_details ); 
?>
<section id="section-find" class="<?php if(@$hcc_options['sections-find-background-type'] == 1) echo @$hcc_options['sections-find-background'] . ' ';?><?php if(@$hcc_options['sections-find-color-type'] == 1) echo @$hcc_options['sections-find-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_find', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($link['text_field_1'] AND $link['text_field_2']) : ?>				
					<div class="link-wrapper text-center wow fadeInUp">
						<a href="<?php echo esc_url(do_shortcode($link['text_field_2'])); ?>" class="btn btn-find rounded-0"><?php echo do_shortcode( $link['text_field_1'] ); ?></a>
					</div>
				<?php endif; ?>
		<?php do_action( 'action_after_find', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_find', $page_details  ); ?>