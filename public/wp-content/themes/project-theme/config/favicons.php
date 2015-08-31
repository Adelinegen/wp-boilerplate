<?php

// Change site favicon sizes
function filter_site_icon_image_sizes($site_icon_sizes) {
    $site_icon_sizes = [32, 57, 72, 76, 114, 120, 144, 152, 180, 192];
    return $site_icon_sizes;
};

add_filter('site_icon_image_sizes', 'filter_site_icon_image_sizes', 10, 1);

// add favicon link
function link_favicon() {
    // Url of the favicon
    $favicon = get_site_icon_url();
    // Extension of the picture
    $partUrl = explode(".", $favicon);
    $faviconExtension = array_pop($partUrl);
    // Beginning of the URL favicon picture
    $pos_point = strrpos($favicon, '.');
    $faviconUrl = substr($favicon, 0, $pos_point);

    echo "<!-- For IE 9 and below. -->\n\r".
         "<!--[if IE]><link rel=\"shortcut icon\" href=\"".$faviconUrl."-32x32.".$faviconExtension."\" sizes=\"32x32\"><![endif]-->\n\r".
         "<!-- iPad retina icon -->\n\r".
         "<link rel=\"apple-touch-icon-precomposed\" href=\"".$faviconUrl."-152x152.".$faviconExtension."\" sizes=\"152x152\">\n\r".
         "<!-- iPad retina icon (iOS < 7) -->\n\r".
         "<link rel=\"apple-touch-icon-precomposed\" href=\"".$faviconUrl."-144x144.".$faviconExtension."\" sizes=\"144x144\">\n\r".
         "<!-- iPad non-retina icon -->\n\r".
         "<link rel=\"apple-touch-icon-precomposed\" href=\"".$faviconUrl."-76x76.".$faviconExtension."\" sizes=\"76x76\">\n\r".
         "<!-- iPad non-retina icon (iOS < 7) -->\n\r".
         "<link rel=\"apple-touch-icon-precomposed\" href=\"".$faviconUrl."-72x72.".$faviconExtension."\" sizes=\"72x72\">\n\r".
         "<!-- iPhone 6 Plus icon -->\n\r".
         "<link rel=\"apple-touch-icon-precomposed\" href=\"".$faviconUrl."-120x120.".$faviconExtension."\" sizes=\"120x120\">\n\r".
         "<!-- iPhone retina icon (iOS < 7) -->\n\r".
         "<link rel=\"apple-touch-icon-precomposed\" href=\"".$faviconUrl."-114x114.".$faviconExtension."\" sizes=\"114x114\">\n\r".
         "<!-- iPhone non-retina icon (iOS < 7) -->\n\r".
         "<link rel=\"apple-touch-icon-precomposed\" href=\"".$faviconUrl."-57x57.".$faviconExtension."\" sizes=\"57x57\">\n\r".
         "<!-- Windows 8 -->\n\r".
         "<meta name=\"msapplication-TileImage\" content=\"".$faviconUrl."-144x144.".$faviconExtension."\"/>\n\r".
         "<meta name=\"msapplication-TileColor\" content=\"#ffffff\"/>\n\r".
         "<meta name=\"theme-color\" content=\"#ffffff\">\n\r";
}

add_action('wp_head', 'link_favicon');
