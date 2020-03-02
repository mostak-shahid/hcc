<?php 
global $hcc_options;
$from_theme_option = $hcc_options['archive-page-sections'];
$sections = $from_theme_option['Enabled'];
unset($sections['content']);
?><?php get_header() ?>
<section id="blogs" class="page-content <?php if(@$hcc_options['sections-content-background-type'] == 1) echo @$hcc_options['sections-content-background'];?>">
	<div class="content-wrap">
		<div class="container">

			<?php if ( have_posts() ) :?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php // get_template_part( 'content', get_post_format() ) ?>
					<div class="post-<?php echo get_the_ID();?>">
						<div class="content">
							<?php the_content()?>					
						</div>						
					</div>
				<?php endwhile;?>	


			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif;?>
			<div class="post-linking">
				<div class="row">
					<div class="col-md-6 text-left">								
						<?php previous_post_link("%link", "Previous Product") ; ?>
					</div>
					<div class="col-md-6 text-right">
						<?php next_post_link("%link", "Next Product"); ?>
					</div>						
				</div>
			</div>
			<?php if (comments_open() || '0' != get_comments_number()) : comments_template(); endif;?>			

		</div>	
	</div>
</section>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>