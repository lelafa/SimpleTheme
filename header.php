<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php wp_title(); ?>
    </title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="header-inner-wrap">
            <div class="header-inner-wrap-logo">
                <?php the_custom_logo(); ?> 
            </div>
            <?php 
                if (is_home()) { ?>
                    <div class="header-inner-wrap-search">
                        <input type="text" id="search-input" placeholder="Search for posts...">
                    </div>
            <?php
                  }
            ?>
            

        </div>
    </header>