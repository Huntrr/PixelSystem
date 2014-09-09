<!-- 

Oh. I see. You're THAT kind of person. Well, fine then. Here, I left this just for you:
http://hunterlightman.com/blankpage.html

-->


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>  
    
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
            
        <!-- FOR MOBILE DEVICES -->
        <meta name="viewport" content="width=600, user-scalable=no, target-densitydpi=high-dpi" />
        <meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=utf-8" />
        <meta name="HandheldFriendly" content="true" />
        <meta name="apple-mobile-web-app-capable" content="yes" /> 
        <!-- END MOBILE META -->
        
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
                
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        
        <?php wp_head(); ?>
    </head>
    
    <body> 
        
        <?php
            // Get the ID of a given category
            $category_id = get_cat_ID( 'Blog' );
            // Get the URL of this category
            $blog = get_category_link( $category_id );
            
            // Get the ID of a given category
            $category_id = get_cat_ID( 'Code' );
            // Get the URL of this category
            $code = get_category_link( $category_id );
            
            // Get the ID of a given category
            $category_id = get_cat_ID( 'Write' );
            // Get the URL of this category
            $write = get_category_link( $category_id );
            
            // Get the ID of a given category
            $category_id = get_cat_ID( 'Build' );
            // Get the URL of this category
            $build = get_category_link( $category_id );

            $about = "//hunterlightman.com/about/";
        ?>
        
        <div id="background" class="page-background">
            <div id="distant"></div>
            <div id="stars"></div>

            <div class="sun page-sun"></div>
        </div>

        <div id="page-header">
            <a href="<?php echo home_url('/') ?>"><h1>HUNTER LIGHTMAN</h1></a>
        </div>


        <!-- Hardcoded menu. Because the different planets and such would have made a dynamic WordPress menu a pain to implement, and this worked for my purposes -->
        <div id="sidebar">
            <ul id="menu">
                <li class="menu-item">
                    <div class="planet">
                        <img class="earth page-earth" src="<?php bloginfo('template_directory') ?>/img/celestial/earth.png">
                        <img class="moon" src="<?php bloginfo('template_directory') ?>/img/celestial/moon.png">
                    </div>
                    <a class="menu-link" href="<?php echo esc_url( $blog ); ?>">Blog</a>
                </li>
                <li class="menu-item">
                    <div class="planet">
                        <img class="red" src="<?php bloginfo('template_directory') ?>/img/celestial/red.png">
                    </div>
                    <a class="menu-link" href="<?php echo esc_url( $code ); ?>">Code</a>
                </li>
                <li class="menu-item">
                    <div class="planet">
                        <img class="gas" src="<?php bloginfo('template_directory') ?>/img/celestial/gas.png">
                    </div>
                    <a class="menu-link" href="<?php echo esc_url( $write ); ?>">Write</a>
                </li>
                <li class="menu-item">
                    <div class="planet">
                        <img class="ring" src="<?php bloginfo('template_directory') ?>/img/celestial/ringed.png">
                    </div>
                    <a class="menu-link" href="<?php echo esc_url( $build ); ?>">Build</a>
                </li>
                <li class="menu-item">
                    <div class="planet">
                        <img class="cold" src="<?php bloginfo('template_directory') ?>/img/celestial/cold.png">
                    </div>
                    <a class="menu-link" href="<?php echo esc_url( $about ); ?>">About</a>
                </li>
            </ul>
        </div>

        <div id="main">