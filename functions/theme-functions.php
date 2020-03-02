<?php
function mos_home_url_replace($data) {
    $replace_fnc = str_replace('home_url()', home_url(), $data);
    $replace_br = str_replace('{{home_url}}', home_url(), $replace_fnc);
    return $replace_br;
}
/*Variables*/
$template_parts = array(
    'Enabled'  => array(
        'content' => 'Content Section',
        'partner' => 'Partner Section',
        'map' => 'Map Section',
    ),
    'Disabled' => array(
        'banner' => 'Home Banner',
        'about' => 'About Section',
        'offer' => 'Offers Section',
        'contact' => 'Contact Section',
        'why' => 'Why us Section',
        'product' => 'Product Section',
        'testimonial' => 'Testimonial Section',
        'find' => 'Find a Store',
        'blog' => 'Blog Section',
    ),
);
/*Variables*/