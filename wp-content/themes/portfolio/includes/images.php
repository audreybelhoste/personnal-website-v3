<?php

/**
 * Thumbnails
 */
function ci_add_thumbnails()
{

    remove_image_size('1536x1536');
    remove_image_size('2048x2048');

    add_theme_support('post-thumbnails');

    add_image_size('image_hd', 1920, 0, true);
    // add_image_size('image_desktop',				1440,	0,	true);
    add_image_size('image_tablet',				768,	0,	true);

}

/**
 * Images
 */
function ci_rewrite_img_svg($filetype_ext_data, $file, $filename, $mimes)
{
    if (substr($filename, -4) === '.svg') {
        $filetype_ext_data['ext'] = 'svg';
        $filetype_ext_data['type'] = 'image/svg+xml';
    }
    return $filetype_ext_data;
}

function ci_allow_svg_mime_types($mimes)
{

    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

function prefix_remove_default_images($sizes)
{
    unset($sizes['medium']);       // 300px
    unset($sizes['medium_large']); // 768px
    unset($sizes['large']);        // 1024px
    return $sizes;
}
