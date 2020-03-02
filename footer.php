<?php 
global $hcc_options;
$class = $hcc_options['sections-footer-class'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
?>
  <?php get_template_part( 'template-parts/section', 'widgets' ); ?>
  <footer id="footer" class="<?php if(@$hcc_options['sections-footer-background-type'] == 1) echo @$hcc_options['sections-footer-background'] . ' ';?><?php if(@$hcc_options['sections-footer-color-type'] == 1) echo @$hcc_options['sections-footer-color'];?> <?php echo $class ?>">
    <div class="content-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="unit h-100 text-center">
              <?php echo do_shortcode( "[address index=1]" ); ?>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="unit h-100 text-center">
              <?php echo do_shortcode( "[phone index=1]" ); ?>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="unit h-100 text-center">
              <?php echo do_shortcode( "[email index=1]" ); ?>
            </div>
          </div>
        </div>
        <div class="footer-menu mt-4 mb-4 pt-4 pb-4 border-top border-bottom">
          <?php echo wp_nav_menu([
            'menu'            => 'footermenu',
            'theme_location'  => 'footermenu',
            'container'       => false,
            'menu_id'         => false,
            'menu_class'      => 'footer-menu w-100',
            'depth'           => 1,
            'fallback_cb'     => 'bs4navwalker::fallback',
            ]);
          ?>
        </div>
        <div class="row align-items-center pt-4">
          <div class="col-lg-4 order-lg-last text-center text-lg-right"><?php echo do_shortcode("[social-menu display='inline' title='0']"); ?></div>
          <div class="col-lg-8 order-lg-first text-center text-lg-left copywrite"><?php echo do_shortcode( "[copyright-symbol]" . " " . "[this-year]" . " " . "[site-name link=1]" . ", All Rights Reserved." . "Digital Transformation by " . "[theme-credit name='AI Script' url='https://www.aiscript.com.au/']" ); ?></div>
        </div>
        <?php echo do_shortcode( $hcc_options['sections-footer-content'] ); ?>
      </div>
    </div>
  </footer>
<?php
if ($hcc_options['misc-back-top']) :
    ?>
    <a href="javascript:void(0)" class="scrollup" style="display: none;"><img width="40" height="40" src="<?php echo get_template_directory_uri() ?>/images/icon_top.png" alt="Back To Top"></a>
    <?php 
    endif;
?>
<?php wp_footer(); ?> 
<?php if ($hcc_options['misc-settings-css']) : ?>
  <style>
    <?php echo $hcc_options['misc-settings-css'] ?>    
  </style>
<?php endif; ?>
<?php if ($hcc_options['misc-settings-js']) : ?>
  <script>
    <?php echo $hcc_options['misc-settings-js'] ?> 
  </script>
<?php endif; ?>
</body>
</html>