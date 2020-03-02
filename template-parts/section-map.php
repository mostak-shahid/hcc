<?php 
global $hcc_options; 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_map', $page_details ); 
?>
<section id="section-map">
	<?php if ($hcc_options['contact-address'][0]['embeded_link']) : ?>
		<div class="embed-responsive embed-responsive-350">
			<iframe class="embed-responsive-item" src="<?php echo esc_url($hcc_options['contact-address'][0]['embeded_link']); ?>"></iframe>
		</div>
	<?php endif; ?>
</section>
<?php do_action( 'action_below_map', $page_details  ); ?>