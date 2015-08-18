<!-- 

Oh. I see. You're THAT kind of person. Well, fine then. Here, I left this just for you:
http://hunterlightman.com/blankpage.html

-->

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- For mobile devices -->
        <meta name="viewport" content="width=600, user-scalable=no, target-densitydpi=high-dpi" />
        <meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=utf-8" />
        <meta name="HandheldFriendly" content="true" />
        <meta name="apple-mobile-web-app-capable" content="yes" /> 
        <!-- End of mobile meta -->

        <link rel="stylesheet" type="text/css" href="style.css">
        
        <title><?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">

        <script type="text/javascript" src="scripts/jquery.min.js"></script>
        <script type="text/javascript" src="scripts/background.js"></script>
        <script type="text/javascript" src="scripts/home.js"></script>

        <?php wp_head(); ?>
    </head>

    <body>
        
        <!-- START "CONTENT" -->
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

        <div id="background" class="home-background">
            <div id="distant"></div>
            <div id="stars"></div>

            <div class="sun home-sun"></div>
        </div>

        <div id="home-header">
            <h1>HUNTER LIGHTMAN</h1>
            <h4>Why not click one?</h4>
        </div>

        <!--Hardcoded menu. Much less of a pain than a custom WordPress menu considering the custom layout and all that went into that-->
        <div id="home-menu">
            <div class="home-item" id="home-earth">
                <div class="planet">
                    <img class="earth" src="img/celestial/earth.png">
                    <img class="moon" src="img/celestial/moon.png">
                </div>
                <a class="menu-link" href="<?php echo esc_url( $blog ); ?>">&#62; Blog</a>
            </div>

            <div class="home-item" id="home-red">
                <div class="planet">
                    <img class="red" src="img/celestial/red.png">
                </div>
                <a class="menu-link" href="<?php echo esc_url( $code ); ?>">&#62; Code</a>
            </div>

            <div class="home-item" id="home-gas">
                <div class="planet">
                    <img class="gas" src="img/celestial/gas.png">
                </div>
                <a class="menu-link" href="<?php echo esc_url( $write ); ?>">&#62; Write</a>
            </div>

            <div class="home-item" id="home-ring">
                <a class="menu-link" href="<?php echo esc_url( $build ); ?>">Build &#60;</a>
                <div class="planet">
                    <img class="ring" src="img/celestial/ringed.png">
                </div>
            </div>

            <div class="home-item" id="home-cold">
                <a class="menu-link" href="<?php echo $about ?>">About &#60;</a>
                <div class="planet">
                    <img class="cold" src="img/celestial/cold.png">
                </div>
            </div>
        </div>


        <div id="home-footer">
            <p class="quote">"There is an art to flying, or rather a knack. Its knack lies in learning to throw yourself at the ground and miss."</p>
            <p class="quote-author">— Douglas Adams, <span class="italic">The Hitchhiker's Guide to the Galaxy</span></p>
        </div>

        <?php wp_footer() ?>
    </body>
</html>
