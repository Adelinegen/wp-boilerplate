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

echo <<<HTML
<!-- For IE 9 and below. -->
<!--[if IE]><link rel="shortcut icon" href="$faviconUrl-32x32.$faviconExtension" sizes="32x32"><![endif]-->
<!-- iPad retina icon -->
<link rel="apple-touch-icon-precomposed" href="$faviconUrl-152x152.$faviconExtension" sizes="152x152">
<!-- iPad retina icon (iOS < 7) -->
<link rel="apple-touch-icon-precomposed" href="$faviconUrl-144x144.$faviconExtension" sizes="144x144">
<!-- iPad non-retina icon -->
<link rel="apple-touch-icon-precomposed" href="$faviconUrl-76x76.$faviconExtension" sizes="76x76">
<!-- iPad non-retina icon (iOS < 7) -->
<link rel="apple-touch-icon-precomposed" href="$faviconUrl-72x72.$faviconExtension" sizes="72x72">
<!-- iPhone 6 Plus icon -->
<link rel="apple-touch-icon-precomposed" href="$faviconUrl-120x120.$faviconExtension" sizes="120x120">
<!-- iPhone retina icon (iOS < 7) -->
<link rel="apple-touch-icon-precomposed" href="$faviconUrl-114x114.$faviconExtension" sizes="114x114">
<!-- iPhone non-retina icon (iOS < 7) -->
<link rel="apple-touch-icon-precomposed" href="$faviconUrl-57x57.$faviconExtension" sizes="57x57">
<!-- Windows 8 -->
<meta name="msapplication-TileImage" content="$faviconUrl-144x144.$faviconExtension"/>
<meta name="msapplication-TileColor" content="#ffffff"/>
<meta name="theme-color" content="#ffffff">

HTML;
}

add_action('wp_head', 'link_favicon');
