<?php

// Wordpress settings
add_theme_support('menus');
add_theme_support('custom-logo');

// Load main JS file
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('custom.min.js', get_template_directory_uri() . '/scripts.min.js', array('jquery'));
});

// Allow to upload SVG
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

// Remove "JQMIGRATE: Migrate is installed, version 1.4.1" notification from console
add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, array('jquery-migrate'));
    }
});

// Hide admin bar
show_admin_bar(false);

// Custom icons nav menu
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects($items, $args) {
	// loop
	foreach( $items as $item ) {
		// vars
        $icon = get_field('icons', $item);
		// append icon
		if($icon) {
			$item->title .= $icon;
		}
	}
	// return
	return $items;
}

?>

<?php function topCompanies() { ?>
    <div class="top-casino-container">
        <div class="title">
            <h2>TOP CASINO offers </h2>
        </div>
        <div class="apply-18plus">
            <h3>18+ T&C’s Apply. Gamble Responsibly.</h3>
        </div>
        <?php foreach(get_field('top_casinos') as $casino) : ?>
            <div class="casino-block">
            <div class="casino-block-inside">
                <div class="logo">
                    <a href="<?php echo get_field('affiliate_link', $casino->ID); ?>" target="_blank">
                        <img src="<?php echo get_field('logo', $casino->ID); ?>" alt="casino-logo.">
                    </a>
                </div>
                <div class="bonus-container">
                    <h4><?php echo $casino->post_title; ?></h4>
                    <h3><?php echo get_field('bonus', $casino->ID); ?></h3>
                    <h5><?php echo get_field('bonus_type', $casino->ID); ?></h5>
                </div>
                <div class="btn-container">
                    <div class="btn">
                        <a href="<?php echo get_field('affiliate_link', $casino->ID); ?>" target="_blank">
                            PLAY
                        </a>
                    </div>
                    <div class="terms-apply">
                        <a href="<?php echo get_field('terms_link', $casino->ID); ?>" target="_blank">
                            <p>18+ T&C’s apply.</p>
                        </a>
                    </div>
                </div>
            </div>
            <?php if (get_field('terms_text', $casino->ID) != null) : ?>
                <div class="paragraf-container">
                    <p><?php echo get_field('terms_text', $casino->ID); ?></p>
                </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
<?php } ?>

<?php function bottomCompanies() { ?>
    <div class="bottom-casino-containers">
        <?php $featured_group = get_field('featured_group'); ?>
        <?php foreach ($featured_group as $featured) : ?>
	        <?php $casino = $featured['casino']; ?>
            <div class="bottom-casino-container">
            <div class="title">
                <h2><?php echo $featured['title']; ?></h2>
            </div>
            <div class="apply-18plus">
                <h3>18+ T&C’s Apply. Gamble Responsibly.</h3>
            </div>
            <div class="casino-block">
                <div class="logo-container-outside">
                    <div class="logo-container" style="background: url(<?php  if ($featured['background'] != null) : ?><?php echo $featured['background']; ?><?php else : ?><?php echo 'wp-content/themes/featuredbonuses/assets/images/casino-bg.png' ?><?php endif; ?>) no-repeat center center / cover;">
                        <div class="darkner"></div>
                    </div>
                    <div class="logo">
                        <a href="<?php echo get_field('affiliate_link', $casino); ?>" target="_blank">
                            <img src="<?php echo get_field('logo', $casino); ?>" alt="casino-logo">
                        </a>
                    </div>
                </div>
                <div class="bonus-btn-container">
                    <div class="bonus-container">
                        <h3><?php echo $casino->post_title; ?></h3>
                        <h2><?php echo get_field('bonus', $casino); ?></h2>
                        <h4><?php echo get_field('bonus_type', $casino); ?></h4>
                    </div>
                    <div class="btn-container">
                        <div class="btn">
                            <a href="<?php echo get_field('affiliate_link', $casino); ?>" target="_blank">
                                PLAY
                            </a>
                        </div>
                        <div class="terms-apply">
                            <a href="<?php echo get_field('terms_link', $casino); ?>" target="_blank">
                                <p>18+ T&C’s apply.</p>
                            </a>
                        </div>
                    </div>
                </div>
                <?php if (get_field('terms_text', $casino->ID) != null) : ?>
                    <div class="paragraf-container">
                        <p><?php echo get_field('terms_text', $casino); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php } ?>

<?php function slider() { ?>
    <div class="slider">
        <div class="slider-container">
            <div class="slider-bg" style="background: url('wp-content/themes/featuredbonuses/assets/images/slider-bg.png') no-repeat center center / cover">
                <div class="slider-darkner"></div>
            </div>
            <div class="slider-slide">
                <?php foreach(get_field('banner') as $banner) : ?>
                    <div class="slider-notice">
                        <div class="logo">
                            <a href="<?php echo get_field('affiliate_link', $banner->ID); ?>" target="_blank">
                                <img src="<?php echo get_field('logo', $banner->ID); ?>" alt="slider-logo.">
                            </a>
                        </div>
                        <div class="bonuses">
                            <h3><?php echo get_field('bonus_type', $banner->ID); ?></h3>
                            <h2><?php echo get_field('bonus', $banner->ID); ?></h2>
                        </div>
                        <div class="btn">
                            <a href="<?php echo get_field('affiliate_link', $banner->ID); ?>" target="_blank">
                                PLAY now
                            </a>
                        </div>
                        <?php if (get_field('terms_text', $banner->ID) != null) : ?>
                            <div class="paragraf-container">
                                <p><?php echo get_field('terms_text', $banner->ID); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slider-dots"></div>
            <div class="slick-next">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" class="svg-inline--fa fa-chevron-left fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill=" #f5f5f5" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>
            </div>
            <div class="slick-prev">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="#f5f5f5" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
            </div>
        </div>
    </div>
<?php } ?>

<?php function companies($margin_page_onlne_casino) { ?>
    <?php $companies_group = get_field('companies_group')?>
    <div class="list-casino-container <?php echo $margin_page_onlne_casino; ?>">
        <div class="title">
            <h1><?php echo $companies_group['title']; ?></h1>
            <p><?php echo $companies_group['text']; ?></p>
        </div>
        <div class="outside-list-container">
            <?php foreach ($companies_group['casino'] as $casino) : ?>
            <div class="list-container">
                <div class="fixed-container">
                    <?php if (get_field('tags_block', $casino->ID) == 'none') : ?>
                    <?php elseif (get_field('tags_block', $casino->ID) == 'hot') : ?>
                        <div class="strip-line">
                            <img src="wp-content/themes/featuredbonuses/assets/images/list-orange.png" alt="list">
                            <div class="text">
                                <p>hot</p>
                            </div>
                        </div>
                    <?php elseif (get_field('tags_block', $casino->ID) == 'new casino') : ?>
                        <div class="strip-line">
                            <img src="wp-content/themes/featuredbonuses/assets/images/list-red.png" alt="list">
                            <div class="text">
                                <p>new casino</p>
                            </div>
                        </div>
                    <?php elseif (get_field('tags_block', $casino->ID) == 'recommended') : ?>
                        <div class="strip-line">
                            <img src="wp-content/themes/featuredbonuses/assets/images/list-green.png" alt="list">
                            <div class="text">
                                <p>recommended</p>
                            </div>
                        </div>
                    <?php elseif (get_field('tags_block', $casino->ID) == 'exclusive') : ?>
                        <div class="strip-line">
                            <img src="wp-content/themes/featuredbonuses/assets/images/list-green.png" alt="list">
                            <div class="text">
                                <p>exclusive</p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="list-container-inside">
                        <div class="logo">
                            <a href="<?php echo get_field('affiliate_link', $casino->ID); ?>" target="_blank">
                                <img src="<?php echo get_field('logo', $casino->ID); ?>" alt="casino-logo.">
                            </a>
                        </div>
                        <div class="bonus-flag-container">
                            <div class="name-casino-flag">
                                <h2><?php echo $casino->post_title; ?></h2>
                                <div class="flag-large-container">
                                    <?php if(get_field('flags', $casino->ID) != null) : ?>
                                        <?php foreach (get_field('flags', $casino->ID) as $flag) : ?>
                                            <div class="flag-container">
                                                <img src="wp-content/themes/featuredbonuses/assets/images/<?php echo $flag; ?>-flag.png" alt="flag">
                                            </div>
                                        <?php endforeach;?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="star-ratings">
                                <div class="fill-ratings" style="width: <?php echo (((get_field('rating', $casino->ID) * 20) / 100) * 100); ?>%">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>☆☆☆☆☆</span>  HTML izņemu šo arā, lai samazinot rating, lai paliek tikai pilnās zvaigznes, SCSS koda no .fill-rating izņemu arā position: absolute;
                                </div
                            </div>
                            <div class="bonus-container">
                                <h3><?php echo get_field('bonus', $casino->ID); ?></h3>
                                <h4><?php echo get_field('bonus_type', $casino->ID); ?></h4>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="btn">
                                <a href="<?php echo get_field('affiliate_link', $casino->ID); ?>" target="_blank">
                                    PLAY NOW
                                </a>
                            </div>
                            <div class="terms-apply">
                                <a href="<?php echo get_field('terms_link', $casino->ID); ?>" target="_blank">
                                    <p>18+ T&C’s apply.</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (get_field('terms_text', $casino->ID) != null) : ?>
                    <div class="paragraf">
                        <p><?php echo get_field('terms_text', $casino->ID); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>

<?php function text() { ?>
    <?php $text_box = get_field('text_group'); ?>
    <?php foreach ($text_box as $text) : ?>
        <div class="paragraf-container-large">
            <?php echo $text['text']; ?>
        </div>
    <?php endforeach; ?>
<?php } ?>

<?php function tricks() { ?>
	<?php $posts_group = get_field('posts_group')?>
    <div class="tips-tricks-container">
        <div class="title">
            <h1><?php echo $posts_group['title']; ?></h1>
            <p><?php echo $posts_group['text']; ?></p>
        </div>
        <div class="outside-container">
            <?php foreach ($posts_group['posts'] as $posts) : ?>
            <div class="container">
                <div class="title-text">
                    <div class="title">
                        <h2><?php echo $posts->post_title; ?></h2>
                    </div>
                    <div class="text-container">
                        <p><?php echo get_field('intro', $posts->ID); ?></p>
                    </div>
                </div>
                <div class="btn">
                    <a href="<?php echo get_permalink($posts->ID); ?>">
                        read more
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>


