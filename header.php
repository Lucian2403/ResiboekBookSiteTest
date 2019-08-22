<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Resiboek
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">

		<div class="container site-branding">
            <div class="logo_text">
                <?php
                the_custom_logo(); ?>
                <?php
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                endif; ?>
            </div>
            <?php echo get_search_form() ?>
        </div>

        <div class="border-grey"></div>

        <nav id="site-navigation" class="container main-navigation">

            <div class="logo_text_mobile">
                <?php the_custom_logo(); ?>
            </div>

            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                ) );

            wp_nav_menu( array(
                'theme_location' => 'menu-2',
                'menu_id'        => 'mobile-menu',
            ) );

            $socialUrl   = get_field('social_url'  , 'option');
            $socialIcon  = get_field('social_icon' , 'option');
            $socialColor = get_field('social_color', 'option');
            ?>
            <div class="social_item">
                <a href="<?php echo $socialUrl ?>" target="_blank" style="color:<?php echo $socialColor ?>">
                         <?php echo $socialIcon ?>
                </a>
            </div>
        </nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
