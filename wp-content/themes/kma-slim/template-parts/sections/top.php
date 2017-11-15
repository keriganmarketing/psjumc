<?php

use Includes\Modules\Navwalker\BulmaNavwalker;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
?>
<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'kmaslim'); ?></a>
<div id="app">
    <div id="MobileNavMenu" :class="[{ 'is-active': isOpen }, 'navbar']">
        <?php wp_nav_menu([
            'theme_location' => 'mobile-menu',
            'container'      => false,
            'menu_class'     => 'navbar-start',
            'fallback_cb'    => '',
            'menu_id'        => 'mobile-menu',
            'link_before'    => '',
            'link_after'     => '',
            'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
            'walker'         => new BulmaNavwalker()
        ]); ?>
        <div class="navbar-close" id="MobileNavClose" data-target="MobileNavMenu" @click="toggleMenu">
            <span class="delete"></span>&nbsp;close menu
        </div>
    </div>
    <div :class="['site-wrapper', { 'menu-open': isOpen }, {'full-height': footerStuck }, {'scrolling': isScrolling }]">
        <modal></modal>
        <div class="site-mobile-overlay"></div>

        <header id="top" class="header" >
            <div class="container">
                <nav class="navbar">

                    <div class="navbar-brand">
                        <a href="/">
                            <img src="<?= get_template_directory_uri() . '/img/psjumc-logo.svg'; ?>" alt="<?= get_bloginfo(); ?>" class="logo" >
                        </a>
                    </div>

                    <?php wp_nav_menu([
                        'theme_location' => 'main-menu',
                        'container'      => false,
                        'menu_class'     => 'navbar-end',
                        'fallback_cb'    => '',
                        'menu_id'        => 'main-menu',
                        'link_before'    => '',
                        'link_after'     => '',
                        'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
                        'walker'         => new BulmaNavwalker()
                    ]); ?>

                    <div class="navbar-end">
                        <div class="navbar-item ways-to-give">
                            <a href="/ways-to-give/">
                                <img src="<?= get_template_directory_uri() . '/img/ways-to-give-top.svg'; ?>" alt="ways to give to <?= get_bloginfo(); ?>" >
                            </a>
                        </div>
                        <div class="burger" id="MobileNavBurger" data-target="MobileNavMenu" @click="toggleMenu">
                            <span class="burger-label">MENU</span>
                                <span class="navbar-burger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                    </div>


                </nav>

            </div>
        </header>




