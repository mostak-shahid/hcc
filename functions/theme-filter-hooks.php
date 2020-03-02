<?php
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) AND $post->post_type == 'page' ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    } else {
        $classes[] = $post->post_type . '-archive';
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

add_action( 'action_below_footer', 'back_to_top_fnc', 10, 1 );
function back_to_top_fnc () {
    global $hcc_options;
    if ($hcc_options['misc-back-top']) :
    ?>
    <a href="javascript:void(0)" class="scrollup" style="display: none;"><img width="40" height="40" src="<?php echo get_template_directory_uri() ?>/images/icon_top.png" alt="Back To Top"></a>
    <?php 
    endif;
}
function custom_admin_script(){
    $frontpage_id = get_option( 'page_on_front' );
    if ($_GET['post'] == $frontpage_id){ 
        ?>
        <script>
        jQuery(document).ready(function($){
            $('#_hcc_banner_details').hide();
        });
        </script>
        <?php 
    }
        
}
// add_action('admin_head', 'custom_admin_script');
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});

function contact_page_details( $page_details ) {
    // var_dump($page_details);
    if ($page_details['id'] == 12) : ?>
        <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="info-unit h-100 d-flex align-items-center">
                    <div class="wrapper">
                        <?php echo do_shortcode( "[address index=1]" ); ?>
                        <?php echo do_shortcode( "[phone index=1]" ); ?>
                        <?php echo do_shortcode( "[email index=1]" ); ?>
                        <?php echo do_shortcode( "[social-menu display='inline' title='0']" ); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="form-unit h-100">
                    <div class="form-title position-relative">Send Us a Message</div>
                    <div class="form-wrap"><?php echo do_shortcode('[contact-form-7 id="196" title="Contact Page Form" html_id="contact-form-196" html_class="contact-page-form needs-validation"]'); ?></div>                    
                </div>
            </div>
        </div>
    <?php endif;
}
add_action( 'action_after_content', 'contact_page_details');
function product_page_details( $page_details ) {
    // var_dump($page_details);
    $args = array( 
        'post_type'         => 'material',
        'posts_per_page' => 12,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    );
    $query = new WP_Query( $args );
    if ($page_details['id'] == 84 AND $query->have_posts()) : 
        ?>
        <div class="row products">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-lg-3 col-md-6">
                <div class="product-unit h-100 position-relative text-center">
                    <?php 
                    $atts = 'class="post-feature mb-4"';
                    echo do_shortcode( "[feature-image wrapper_atts='".$atts."' height='285' width='255']" ); 
                    ?>
                    <h4 class="post-title"><?php echo get_the_title(); ?></h4>
                    <a href="<?php echo get_the_permalink(); ?>" class="hidden-link">Read More</a>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
            <div class="pagination-wrapper product-pagination"> 
                <nav class="navigation pagination" role="navigation">
                    <div class="nav-links"> 
                    <?php $big = 999999999; // need an unlikely integer
                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $query->max_num_pages,
                        'prev_text'          => __('Prev'),
                        'next_text'          => __('Next')
                    ) );?>
                    </div>
                </nav>
            </div>
    <?php endif;
}
add_action( 'action_after_content', 'product_page_details');
function service_page_details( $page_details ) {
    // var_dump($page_details);
    if ($page_details['id'] == 16) : 
        global $hcc_options; 
        $class = $hcc_options['sections-service-class'];
        $title = $hcc_options['sections-service-title'];
        $content = $hcc_options['sections-service-content'];
        $slides = $hcc_options['sections-service-slides'];
        ?>
    <section id="section-service" class="<?php if(@$hcc_options['sections-service-background-type'] == 1) echo @$hcc_options['sections-service-background'] . ' ';?><?php if(@$hcc_options['sections-service-color-type'] == 1) echo @$hcc_options['sections-service-color'];?> <?php echo $class ?>">

        <div class="container">
                <?php if ($title) : ?>              
                    <div class="title-wrapper wow fadeInDown">
                        <h2 class="title"><?php echo do_shortcode( $title ); ?></h2>                
                    </div>
                <?php endif; ?>
                <?php if ($content) : ?>                
                    <div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
                <?php endif; ?>
                <?php if ($slides) : ?>                
                    <div class="slides-wrapper">
                    <?php foreach($slides as $slide) : ?>
                        <div class="services row align-items-center mb-4">
                        <?php if ($slide['attachment_id']) : ?>
                            <div class="col-lg-5">
                                <img class="img-fluid img-service" src="<?php echo aq_resize(wp_get_attachment_url( $slide['attachment_id'] ),445,250,true); ?>" alt="<?php echo strip_tags(do_shortcode( $slide['title'] )); ?>" width="445" height="250">
                            </div>
                        <?php endif; ?>
                            <div class="col-lg-<?php if ($slide['attachment_id']) echo 7; else echo 12 ?>">
                                <div class="wrap">
                                    <h3 class="unit-title"><?php echo do_shortcode( $slide['title'] ); ?></h3>
                                    <?php if ($slide['link_title']) : ?>
                                    <div class="unit-desc"><?php echo do_shortcode( $slide['description'] ); ?></div>
                                    <?php endif; ?>
                                    <?php if ($slide['link_title'] AND $slide['link_url']) : ?>
                                        <a href="<?php echo esc_url(do_shortcode($slide['link_url'])); ?>" class="btn rounded-0 btn-service"><?php echo do_shortcode($slide['link_title']); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endif; ?>
        </div>  

    </section>  
    <?php endif;
}
add_action( 'action_after_content', 'service_page_details');