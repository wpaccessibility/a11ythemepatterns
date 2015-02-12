<?php


    /**
     * Adds "inner" id to the site-inner content/sidebar wrap element on HTML5 child themes.
     * Using inner, since Genesis uses this id when HTML5 is disabled.
     * @param  array $attributes Array of element attributes
     * @return array             Same array of element attributes with the id added
     */
    function theme_add_content_id( $attributes ) {
        $attributes['id'] = "inner";

        return $attributes;
    }
    add_filter( 'genesis_attr_site-inner', 'theme_add_content_id', 15 );


    /**
     * Add a link first thing after the body element that will skip to the inner element.
     */
    function theme_add_skip_link() {
        echo '<a class="skip-link" href="#inner">Skip to content</a>';
    }
    add_action( 'get_header', 'theme_add_skip_link', 1 );

    /**
     * Semi-optional, tabindex fix for specific browsers. 
     * Feel free to move it to your JS file instead. It's too short to warrant its own file enqueue.
     * Read more: http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
     */
    function theme_fix_tabindex() {
    ?>

    <script async type="text/javascript">
        window.addEventListener("hashchange", function(event) {
            var element = document.getElementById(location.hash.substring(1));

            if (element) {
                if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
                    element.tabIndex = -1;
                }

                element.focus();
            }
        }, false);
    </script>
    
    <?php
    }
    add_action( 'wp_footer', 'theme_fix_tabindex' );