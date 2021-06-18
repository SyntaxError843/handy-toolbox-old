<?php

/**
* Exit if accessed directly
*/
! defined( 'ABSPATH' ) && exit;

/**
 * This is a "toolbox" of handy functions that help
 * remove spaghetti code and make things neater hopefully
 */

if ( ! defined( 'HANDY_TOOLBOX_URL' ) ) {

    define( 'HANDY_TOOLBOX_URL', plugin_dir_url( __FILE__ ) );

}

if ( ! defined( 'HANDY_TOOLBOX_DIR' ) ) {

    define( 'HANDY_TOOLBOX_DIR', plugin_dir_path( __FILE__ ) );

}

/**
 * Enqueue Handy Toolbox Dummy Script
 */
add_action( 'admin_enqueue_scripts', function() {
    
    wp_register_script( 'handy-toolbox-dummy', '', [], '', true );
    wp_enqueue_script ( 'handy-toolbox-dummy', '', [], '', true );

} );

if ( ! function_exists( 'console_log' ) ) {

    /**
     * Adds an inline script to the dummy script to log a variable
     */
    function console_log( $variable ) {

        add_action( 'admin_enqueue_scripts', function() use ( $variable ) {

            wp_add_inline_script(

                'handy-toolbox-dummy',
                sprintf( 'console.log(%1$s)', json_encode( $variable ) )

            );

        } );

    }

}

if ( ! function_exists( 'simplexlsx_get_instance' ) ) {

    /**
     * Returns an instance of the SimpleXLSX class using a given xlsx file url.
     * 
     * @param   string      $file_url       Required, the url to the xlsx file,
     * 
     * @return  object  instance of SimpleXLSX
     */
    function simplexlsx_get_instance( $file_url ) {

        require_once HANDY_TOOLBOX_DIR . 'libs/simplexlsx/simplexlsx.php';

        return SimpleXLSX::parseData( file_get_contents( $file_url ) );

    }

}

if ( ! function_exists( 'get_menu_icon_svg' ) ) {

    /**
     * Returns a Base64 encoded version of the specified SVG Image, 
     * prefixed with `'data:image/svg+xml;base64,'` which makes it usable as an
     * admin menu icon, or false if the svg is not available.
     * 
     * Available SVGs
     * --
     * `lightbulb`
     * 
     * @param   string      $svg_name         Required. The name of the svg image, must be from within the "available svgs" list.
     * 
     * @return  string|bool string to use as `$icon_url` in `add_menu_page()`
     */
    function get_menu_icon_svg( $svg_name ) {

        $available_svgs = array(

            'lightbulb',

        );

        /**
         * Check if the requested svg is not available and return false
         */
        if ( ! in_array( $svg_name, $available_svgs ) ) return false;

        /**
         * Return base64 encoded version of the contents of the file
         * named $svg_name.svg in the 'assets/icons' directory
         * prefixed with `'data:image/svg+xml;base64,'`
         */
        return 'data:image/svg+xml;base64,' . base64_encode( file_get_contents( HANDY_TOOLBOX_DIR . 'assets/icons/' . $svg_name . '.svg' ) );

    }

}

if ( ! function_exists( 'enqueue_toasts_scripts' ) ) {

    /**
     * Enqueues the toasts.js library
     */
    function enqueue_toasts_scripts() {

        // Add toasts.js Script
        wp_enqueue_script( 'toasts-script', HANDY_TOOLBOX_URL . 'public/js/toasts.js' );

        // Add toasts.css style
        wp_enqueue_style( 'toasts-style', HANDY_TOOLBOX_URL . 'public/css/toasts.css' );

    }

}

if ( ! function_exists( 'enqueue_progressbar_scripts' ) ) {

    /**
     * Enqueues the ProgressBar.js library
     */
    function enqueue_progressbar_scripts() {

        // Add ProgressBar.js Script
        wp_enqueue_script( 'progressbar-script', HANDY_TOOLBOX_URL . 'public/js/progressbar.js' );

    }

}

if ( ! function_exists( 'enqueue_ribbon_scripts' ) ) {

    /**
     * Enqueues ribbon css
     */
    function enqueue_ribbon_scripts() {

        // Add Ribbon Style
        wp_enqueue_style( 'ribbon-style', HANDY_TOOLBOX_URL . 'public/css/ribbon.css' );

    }

}

if ( ! function_exists( 'enqueue_charts_scripts' ) ) {

    /**
     * Enqueues charts css
     */
    function enqueue_charts_scripts() {

        // Add Charts Style
        wp_enqueue_style( 'charts-style', HANDY_TOOLBOX_URL . 'public/css/charts.min.css' );

    }

}

if ( ! function_exists( 'enqueue_bootstrap_scripts' ) ) {

    /**
     * Enqueues bootstrap css
     */
    function enqueue_bootstrap_scripts() {

        // Add Bootstrap Style
        wp_enqueue_style( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', [], '4.6.0' );

        // Add Bootstrap Script
        wp_enqueue_script( 'bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', array( 'jquery' ), '4.6.0' );

    }

}

if ( ! function_exists( 'enqueue_tailwindcss_scripts' ) ) {

    /**
     * Enqueues tailwindcss css
     */
    function enqueue_tailwindcss_scripts() {

        // Add tailwindcss Style
        wp_enqueue_style( 'tailwindcss-style', 'https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' );

    }

}

if ( ! function_exists( 'enqueue_vuejs_3_scripts' ) ) {

    /**
     * Enqueues the Vue.js library
     */
    function enqueue_vuejs_3_scripts() {

        // Add Vue.js Script
        wp_enqueue_script( 'vuejs-3-script', "https://unpkg.com/vue@next" );

    }

}

if ( ! function_exists( 'enqueue_font_awesome_scripts' ) ) {

    /**
     * Enqueues fontawesome css
     */
    function enqueue_font_awesome_scripts() {

        // Add Font Awesome Style
        wp_enqueue_style( 'font-awesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css', [], '5.15.2' );

    }

}

if ( ! function_exists( 'enqueue_font_awesome_local_scripts' ) ) {

    /**
     * Enqueues fontawesome css
     */
    function enqueue_font_awesome_local_scripts() {

        // Add Font Awesome Style
        wp_enqueue_style( 'font-awesome-style', HANDY_TOOLBOX_URL . 'public/css/font-awesome-5.css' );

    }

}

if ( ! function_exists( 'enqueue_typicons_scripts' ) ) {

    /**
     * Enqueues fontawesome css
     */
    function enqueue_typicons_scripts() {

        // Add Font Awesome Style
        wp_enqueue_style( 'typicons-style', 'https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css', [], '2.0.9' );

    }

}

if ( ! function_exists( 'enqueue_jquery_validation_scripts' ) ) {

    /**
     * Enqueues the jQuery Validation Plugin
     */
    function enqueue_jquery_validation_scripts() {

        // Add jQuery Validation Script
        wp_enqueue_script( 'jquery-validation-script', "https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js", array( 'jquery' ), '1.19.3' );

    }

}

if ( ! function_exists( 'enqueue_qr_scanner_scripts' ) ) {

    /**
     * Enqueues QR Scanner scripts
     */
    function enqueue_qr_scanner_scripts() {

        // Enqueue QR Scanner Script
        wp_enqueue_script( 'qr-scanner-script', HANDY_TOOLBOX_URL . 'public/js/html5-qrcode.min.js', [], '1.2.3' );

    }

}

if ( ! function_exists( 'enqueue_underscorejs_scripts' ) ) {

    /**
     * Enqueues the Underscore.js library
     */
    function enqueue_underscorejs_scripts() {

        // Add Underscore.js Script
        wp_enqueue_script( 'underscore-script', "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.12.0/underscore-min.js", [], '1.12.0' );

    }

}

if ( ! function_exists( 'enqueue_custom_toggle_button_scripts' ) ) {

    /**
     * Enqueues the custom toggle button css
     */
    function enqueue_custom_toggle_button_scripts() {

        // Add Custom Toggle Button Style
        wp_enqueue_style( 'custom-toggle-button-style', HANDY_TOOLBOX_URL . 'public/css/custom-toggle-button-style.css' );

    }

}

if ( ! function_exists( 'enqueue_custom_rangslider_scripts' ) ) {

    /**
     * Enqueues the required js scripts and css styles in order to turn all input elements of type range
     * into a custom made range slider, for further customization, edit the files below
     * 
     * @see HANDY_TOOLBOX_DIR_PATH/public/js/custom-slider.js
     * @see HANDY_TOOLBOX_DIR_PATH/public/css/custom-slider.css
     * 
     */
    function enqueue_custom_rangslider_scripts() {

        // Add Underscore.js Script [REQUIRED]
        wp_enqueue_script( 'underscore-script', "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.12.0/underscore-min.js", [], '1.12.0' );

        // Add Rangeslider.js Style
        wp_enqueue_style( 'rangeslider-style', "https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.3/rangeslider.css", [], '2.3.3' );
        
        // Add Custom Rangeslider Style
        wp_enqueue_style( "custom-rangeslider-style", HANDY_TOOLBOX_URL . "public/css/custom-slider.css", array( 'rangeslider-style' ) );

        // Add Rangeslider.js Script
        wp_enqueue_script( 'rangeslider-script', 'https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.3/rangeslider.js', array( 'jquery' ), '2.3.3' );
            
        // Add Rangeslider Init Script
        wp_enqueue_script( "rangeslider-init-script", HANDY_TOOLBOX_URL . "public/js/custom-slider.js", array( 'rangeslider-script', 'underscore-script' ) );

    }

}

if ( ! function_exists( 'enqueue_select2_scripts' ) ) {

    /**
     * Enqueues the required js scripts and css styles in order to have select2 functionality enabled,
     * by default the script initializes all select dom elements with the class `select2` into select2 elements
     * 
     * @see HANDY_TOOLBOX_DIR_PATH/public/js/select2-init-script.js
     * @see HANDY_TOOLBOX_DIR_PATH/public/css/select2-custom-style.css
     * 
     */
    function enqueue_select2_scripts() {

        // Add Select2 Style
        wp_enqueue_style( 'select2-style', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css', [], '4.1.0-beta.1' );

        // Add Custom Select2 Style
        wp_enqueue_style( 'select2-custom-style', HANDY_TOOLBOX_URL . 'public/css/select2-custom-style.css' );

        // Add Select2 Script
        wp_enqueue_script( 'select2-script', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js', array( 'jquery' ), '4.1.0-beta.1' );

        // Add Select2 Init Script
        wp_enqueue_script( 'select2-init-script', HANDY_TOOLBOX_URL . 'public/js/select2-init-script.js', array( 'select2-script' ) );

    }

}

if ( ! function_exists( 'enqueue_image_preview_scripts' ) ) {

    /**
     * Enqueues the required js scripts and css styles in order to add an on hover minipreview window to all link dom elements
     * that are located inside div elements with the class 'image-preview', so that the destination
     * of the href url gets preloaded into a mini popup window on hover.
     * 
     * @see HANDY_TOOLBOX_DIR_PATH/public/js/image-preview-init-script.js
     * 
     */
    function enqueue_image_preview_scripts() {

        // Add Image-Preview-For-Links Style
        wp_enqueue_style( 'image-preview-style', 'https://rawgit.com/shaneapen/Image-Preview-for-Links/master/image_preview_for_links.css', [], '1.0' );

        // Add Image-Preview-For-Links Script
        wp_enqueue_script( 'image-preview-script', 'https://rawgit.com/shaneapen/Image-Preview-for-Links/master/image_preview_for_links.js', array( 'jquery' ), '1.0' );

        // Add Image-Preview-For-Links Init Script
        wp_enqueue_script( 'image-preview-init-script', HANDY_TOOLBOX_URL . 'public/js/image-preview-init-script.js', array( 'image-preview-script' ) );

    }

}

if ( ! function_exists( 'generate_encryption_key' ) ) {

    /**
     * Generates a random encryption key and stores it in `HANDY_TOOLBOX_DIR/keys/secret.key`
     * 
     */
    function generate_encryption_key() {

        file_put_contents( HANDY_TOOLBOX_DIR . 'keys/secret.key', random_bytes( SODIUM_CRYPTO_SECRETBOX_KEYBYTES ) );

    }

}

if ( ! function_exists( 'encrypt_for_url' ) ) {

    /**
     * Encrypts a given string via `openssl_encrypt()` using the given key and optional method
     * and then encodes it for safe use in a url using `urlencode()`
     * 
     * @param string        $string         Required. The plaintext message to be encrypted,
     * @param string        $key            Required. the key to use to encrypt the string,
     * @param string        $method         Optinal. The cipher method. For a list of available cipher methods, use `openssl_get_cipher_methods()`,
     *                                               Default `AES-128-ECB`.
     * 
     * @return string The encrypted string.
     * 
     */
    function encrypt_for_url( $string, $key, $method = 'AES-128-ECB' ) {

        return urlencode( openssl_encrypt( $string, $method, $key ) );

    }

}

if ( ! function_exists( 'decrypt_openssl_cipher' ) ) {

    /**
     * Decrypts a given string via `openssl_decrypt()` using the given key and optional method
     * 
     * Note that the method is 'AES-128-ECB' by default
     * --
     * 
     * @param string        $string         Required. The plaintext message to be decrypted,
     * @param string        $key            Required. the key to use to decrypt the string,
     * @param string        $method         Optinal. The cipher method. For a list of available cipher methods, use `openssl_get_cipher_methods()`,
     *                                               Default `AES-128-ECB`.
     * 
     * @return string The decrypted string.
     * 
     */
    function decrypt_openssl_cipher( $string, $key, $method = 'AES-128-ECB' ) {

        return openssl_decrypt( $string, $method, $key );

    }

}

if ( ! function_exists( 'generate_invoice_num' ) ) {

    /**
     * Returns input with 7 zeros (by default) padded on the left, with an optional `$prefix` attached
     * 
     * @param string        $input          Required. The string to pad, most likely a number (id),
     * @param number        $pad_len        Optional. The amount of zeros used in padding, Default 7,
     * @param string        $prefix         Optional. The prefix to use, Default `null`
     * 
     * @return string The padded input
     */
    function generate_invoice_num( $input, $pad_len = 7, $prefix = null ) {

        if ( $pad_len <= strlen( $input ) ) {

            trigger_error( '<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR );

        }

        if ( is_string( $prefix ) ) {

            return sprintf( '%s%s', $prefix, str_pad( $input, $pad_len, '0', STR_PAD_LEFT ) );

        }

        return str_pad( $input, $pad_len, '0', STR_PAD_LEFT );

    }

}

if ( ! function_exists( 'array_column_ext' ) ) {

    /**
     * Returns the values from a single column of the array, identified by the column_key,
     * optionally, an index_key may be provided to index the values in the returned array by 
     * the values from the index_key column of the input array.
     * 
     * **NOTE: When given an $indexkey value of -1 it preserves the associated array key values.**
     * 
     * @param array             $array          Required, A multi-dimensional array or an array of objects from which to pull a column of values from. 
     *                                                    If an array of objects is provided, then public properties can be directly pulled. 
     *                                                    In order for protected or private properties to be pulled, 
     *                                                    the class must implement both the __get() and __isset() magic methods.
     * 
     * @param int|string|null   $column_key     Required, The column of values to return. 
     *                                                    This value may be an integer key of the column you wish to retrieve, 
     *                                                    or it may be a string key name for an associative array or property name. 
     *                                                    It may also be null to return complete arrays or objects 
     *                                                    (this is useful together with index_key to reindex the array).
     * 
     *                                                    **OR it could be -1 to preserve the keys**
     * 
     * @param int|string|null   $index_key      Optional, The column to use as the index/keys for the returned array. 
     *                                                    This value may be the integer key of the column, or it may be the string key name. 
     *                                                    The value is cast as usual for array keys 
     *                                                    (however, objects supporting conversion to string are also allowed).
     * 
     * @return array Returns an array of values representing a single column from the input array.
     * 
     */
    function array_column_ext( $array, $column_key, $index_key = null ) {

        $result = [];

        foreach ( $array as $sub_array_key => $sub_array ) {

            if ( array_key_exists( $column_key, $sub_array ) ) {
                
                $val = $array[ $sub_array_key ][ $column_key ];
            
            } else if ( $column_key === null ) { 
                
                $val = $sub_array;
            
            } else { continue; }
               
            if ( $index_key === null ) {
                
                $result[] = $val;
            
            } else if ( $index_key == -1 || array_key_exists( $index_key, $sub_array ) ) {

                $result[ ( $index_key == -1 ) ? $sub_array_key : $array[ $sub_array_key ][ $index_key ] ] = $val;

            }

        }

        return $result;

    }

}

if ( ! function_exists( 'array_all_columns' ) ) {

    /**
     * Returns all columns from `$array`, mapped to the value of `$index_key`
     * 
     * This is basically a function to map child arrays to a specific index, instead of numeric.
     * The index being the value of one of the child's own properties
     * 
     * @param array         $array              Required, The parent array.
     * @param string        $index_key          Required, One of the sub array's keys to index it by its value,
     * 
     * @return array A new version of `$array` with mapped children
     * 
     */
    function array_all_columns( $array, $index_key ) {

        $mapped_array = [];

        foreach( $array as $sub_array_key => $sub_array ) {

            if ( array_key_exists( $index_key, $sub_array ) ) {

                $mapped_array[ $sub_array[ $index_key ] ] = $sub_array;

            } else {

                $mapped_array[ $sub_array_key ] = $sub_array;

            }

        }

        return $mapped_array;

    }

}

if ( ! function_exists( 'array_add_if_missing' ) ) {

    /**
     * Adds an element to `$array` if it's not already in there
     * 
     * @param array             $array          Required, The array to search in and add the element to.
     * @param string|number     $element        Required, The element to look for and add if not found, 
     *                                                    **Only numbers and strings**
     * 
     */
    function array_add_if_missing( &$array, $element ) {

        if ( false === array_search( $element, $array ) ) $array[] = $element;

    }

}

if ( ! function_exists( 'array_splice_assoc' ) ) {

    /**
     * Returns a spliced version of `$input`, which is an associative array,
     * starting from the key `$offset`, and cutting out a `$length` amount of the array,
     * or until a key with a value of `$length` is found if it were a string, having the spliced
     * out elements optionally replaced with `$replacement` which can be anything.
     * 
     * @param array             $input          Required, The assoc array to splice.
     * @param string            $offset         Required, The string key to start splicing from.
     * @param string|number     $length         Required, The amount to splice out, or the key to splice to, but not included.
     * @param mixed             $replacement    Optional, The element to replace the spliced out elements with, Default empty array.
     * 
     * @return array The spliced array.
     */
    function array_splice_assoc( $input, $offset, $length, $replacement = [] ) {

        $replacement = (array) $replacement;
        $key_indices = array_flip( array_keys( $input ) );

        if ( isset( $input[ $offset ] ) && is_string( $offset ) ) {

            $offset = $key_indices[ $offset ];

        }

        if ( isset( $input[ $length ] ) && is_string( $length ) ) {

            $length = $key_indices[ $length ] - $offset;

        }

        $input = array_slice( $input, 0, $offset, TRUE )
                + $replacement
                + array_slice( $input, $offset + $length, NULL, TRUE );

        return $input;

    }

}

if ( ! function_exists( 'array_sort' ) ) {

    /**
     * Simple function to sort an array by a specific key in its sub-arrays. Maintains index association.
     * Ideal for sorting arrays of arrays based on a child array's key.
     * 
     * @param array     $array          Required. The associative array to sort through, can contain 1 sub-array level,
     * @param string    $by             Required. The key of the child arrays to sort on.
     * @param string    $order          Optional. The sort order, can be SORT_ASC or SORT_DESC.
     * 
     */
    function array_sort( $array, $by, $order = SORT_ASC ) {

        $new_array      = [];
        $sortable_array = [];

        if ( count( $array ) > 0 ) {

            foreach ( $array as $k => $v ) {

                if ( is_array( $v ) ) {

                    foreach ( $v as $k2 => $v2 ) {

                        if ( $k2 == $by ) {

                            $sortable_array[ $k ] = $v2;

                        }

                    }

                } else {

                    $sortable_array[ $k ] = $v;

                }

            }

            switch ( $order ) {

                case SORT_ASC:

                    asort( $sortable_array );

                break;

                case SORT_DESC:

                    arsort( $sortable_array );

                break;

            }

            foreach ( $sortable_array as $k => $v ) { 

                $new_array[ $k ] = $array[ $k ];

            }

        }

        return $new_array;
        
    }

}

if ( ! function_exists( 'return_info_tag' ) ) {

    /**
     * Returns HTML for an `<i>` tag that displays `$input` on hover
     * 
     * @param   string      $input      Required, The text to wrap in tags.
     * 
     * @return string HTML for an `<i>` tag with $input in it
     * 
     */
    function return_info_tag( $input ) {

        $info_html  = '<i class="fa fa-question-circle" ';
        $info_html .= 'style="font-size:16px" ';
        $info_html .= 'data-toggle="tooltip" ';
        $info_html .= 'data-placement="top" ';
        $info_html .= 'data-html="true" ';
        $info_html .= 'data-html="true" ';
        $info_html .= "title='$input'> ";
        $info_html .= '</i>';

        return $info_html;

    }

}

if ( ! function_exists( 'slug_to_label' ) ) {

    /**
     * Turn a Slug into a displayable label.
     * 
     * @param string        $slug       Required. The slug to generate the label out of.
     * 
     * @return string $label
     * 
     */
    function slug_to_label( $slug ) {

        return ucwords( trim( str_replace( array( '-', '_' ), ' ', $slug) ) );

    }

}

if ( ! function_exists( 'taxonomy_to_label' ) ) {

    /**
     * Turn a WooCommerce Taxonomy into a displayable label.
     * 
     * @param string        $taxonomy       Required. The taxonomy term to generate the label out of.
     * 
     * @return string $label
     * 
     */
    function taxonomy_to_label( $taxonomy ) {

        return ucwords( trim( str_replace( array( '-', '_' ), ' ', str_replace( 'pa_', '', $taxonomy ) ) ) );

    }

}

if ( ! function_exists( 'dump_die' ) ) {

    /**
     * Dump & Die
     * 
     * @param mixed     $variable_to_dump       Required. The variable to dump prior to dying, can be anything.
     * 
     */
    function dump_die( $variable_to_dump ) {

        wp_die( var_dump( $variable_to_dump ) );

    }

}

if ( ! function_exists( 'format_money' ) ) {

    /**
     * Returns the number with grouped thousands and 2 digits after the dot (i.e 12.50)
     * 
     * @param float|integer     $money      Required. The money to format.
     * 
     * @return string   A formatted version of money.
     * 
     */
    function format_money( $money ) {

        return number_format( abs( $money ), 2, '.', ',' );

    }

}

if ( ! function_exists( 'remove_wp_menu_items' ) ) {

    /**
     * Needs to be called in `admin_menu` hook
     * --
     * 
     * Removes all of the vanilla wordpress admin menu items except for any specified ones (see below)
     * 
     * Vanilla WordPress Admin Menu Items ( item_name => key )
     * 
     * * Dashboard         =>  2,
     * * seperator1        =>  4,
     * * Posts             =>  5,
     * * Media             =>  10,
     * * Links             =>  15,
     * * Comments          =>  25,
     * * Pages             =>  20,
     * * seperator2        =>  59,
     * * Appearance        =>  60,
     * * Plugins           =>  65,
     * * Users             =>  70,
     * * Tools             =>  75,
     * * Settings          =>  80,
     * * seperator-last    =>  99,
     * 
     * @param   Int       $items_to_keep      Optional. Item **KEYS** to keep (see above) passed in as comma separated args.
     * 
     */
    function remove_wp_menu_items( ...$items_to_keep ) {

        global $menu;

        /**
         * Check if no args were passed
         */
        if ( empty( $items_to_keep ) ) {

            $items_to_keep = [];

        }

        /**
         * Backwards compatibility
         * 
         * If the first argument passed in is an array
         * Set the $items_to_keep to it, discarding the rest
         */
        if ( ! empty( $items_to_keep[0] ) && is_array( $items_to_keep[0] ) ) {

            $items_to_keep = $items_to_keep[0];

        }

        /**
         * List of known vanilla wordpress menu items
         */
        $menu_items = array(

            'Dashboard'         =>  2,
            'seperator1'        =>  4,
            'Posts'             =>  5,
            'Media'             =>  10,
            'Links'             =>  15,
            'Comments'          =>  25,
            'Pages'             =>  20,
            'seperator2'        =>  59,
            'Appearance'        =>  60,
            'Plugins'           =>  65,
            'Users'             =>  70,
            'Tools'             =>  75,
            'Settings'          =>  80,
            'seperator-last'    =>  99,

        );

        /**
         * Compute items to remove
         */
        $items_to_remove = array_diff( $menu_items, $items_to_keep );

        /**
         * Unset items from the global menu array
         */
        foreach ( $items_to_remove as $item_to_remove ) unset( $menu[ $item_to_remove ] );

    }

}

if ( ! function_exists( 'add_admin_menu_seperator' ) ) {

    /**
     * Needs to be called in `admin_menu` hook
     * --
     *  
     * Adds an admin menu seperator
     * 
     * @param number    $pos        Required. The position of the seperator in the $menu array.
     * @param string    $name       Required. The name of the seperator, needs to be unique in the array.
     * 
     */
    function add_admin_menu_seperator( $pos, $name ) {

        $GLOBALS['menu'][ $pos ] = array( '', 'read', $name, '', 'wp-menu-separator toolbox-seperator' );

    }

}

if ( ! function_exists( 'save_qr_code' ) ) {

    /**
     * Generates a QR Code with given params and saves it to a given file, overwriting any existing ones.
     * 
     * @param string      $data           Required, the data to generate the qr code with,
     * @param string      $file_path      Required, the full path of the file to store,
     * @param string      $e_correction   Optional, the error correction level,
     *                                              available options are `L, M, Q, H`,
     *                                              `L` being the lowest yet smallest,
     *                                              and `H` being the highest and safest but largest in size and most complex.
     *                                              Default `L`.
     * @param number      $pixel_size     Optional, the size of each 'pixel' (the black squares), default `17`,
     * @param number      $frame_size     Optional, the size of the white frame (margin), default `2`,
     * 
     */
    function save_qr_code( $data, $file_path, $e_correction = 'L', $pixel_size = 17, $frame_size = 2 ) {

        require_once HANDY_TOOLBOX_DIR . 'libs/phpqrcode/qrlib.php';

        QRcode::png( $data, $file_path, $e_correction, $pixel_size, $frame_size );

    }

}

if ( ! function_exists( 'render_qr_code' ) ) {

    /**
     * TO BE USED IN APIs
     * --
     * 
     * Generates a QR Code image with given params and outputs it directly to the browser as Content-type: image/png.
     * 
     * @param string      $data           Required, the data to generate the qr code with,
     * @param string      $e_correction   Optional, the error correction level,
     *                                              available options are `L, M, Q, H`,
     *                                              `L` being the lowest yet smallest,
     *                                              and `H` being the highest and safest but largest in size and most complex.
     *                                              Default `L`.
     * @param number      $pixel_size     Optional, the size of each 'pixel' (the black squares), default `17`,
     * @param number      $frame_size     Optional, the size of the white frame (margin), default `2`,
     * 
     */
    function render_qr_code( $data, $e_correction = 'L', $pixel_size = 17, $frame_size = 2 ) {

        require_once HANDY_TOOLBOX_DIR . 'libs/phpqrcode/qrlib.php';

        QRcode::png( $data, false, $e_correction, $pixel_size, $frame_size );

    }

}

if ( ! function_exists( 'render_qr_code_googleapi' ) ) {

    /**
     * Returns HTML of an `<img>` displaying the QR Code generated by the google chart api using `$data`
     * 
     * @param string      $data       Required, the data to generate the qr code with,
     * 
     */
    function render_qr_code_googleapi( $data ) {

        return sprintf(

            '<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=%1$s&choe=UTF-8" alt="QR Code" title="QR Code" />',
            $data

        );

    }

}

if ( ! function_exists( 'render_nonce_field' ) ) {

    /**
     * Returns HTML of a hidden field with the name 'nonce' and value calculated from the supplied `$seed`
     * 
     * @param string    $seed       The string to use to calculate the nonce, can literally be anything
     *                              though its preferable for it to be the current page slug.
     */
    function render_nonce_field( $seed ) {

        $nonce = wp_create_nonce( $seed );

        $nonce_html  = "<input ";
        $nonce_html .= "id='nonce' ";
        $nonce_html .= "name='nonce' ";
        $nonce_html .= "type='hidden' ";
        $nonce_html .= "value='$nonce' ";
        $nonce_html .= "/>";

        echo $nonce_html;

    }

}

if ( ! function_exists( 'danger_submit_button' ) ) {

    /**
     * Returns HTML of a "Danger" version of the wordpress "Primary" button.
     * 
     * @param string    $text           Required. The text of the button.
     * @param string    $name           Required. The name of the button.
     * @param bool      $wrap           Optional. True if the output button should be wrapped in a paragraph tag, false otherwise. Defaults to true.
     * @param array     $extra_style    Optional. Additional style attributes for the button,
     *                                            mapping attributes to their values, such as `array( 'margin-left' => '40px' )`.
     *                                            These attributes will be output as `attribute: value;`, such as `margin-left: 40px;`.
     *                                            Default empty. 
     * @param bool      $return         Optional. Whether to return the html instead of echoing it. Default false.    
     *      
     */
    function danger_submit_button( $text, $name, $wrap = true, $extra_style = '', $return = false ) {

        $style = 'background: #DC3232; color: #fff; border: 1px solid #DC3232; ';

        if ( is_array( $extra_style ) ) {
            foreach ( $extra_style as $style_name => $style_value ) {
                $style .= $style_name . ': ' . esc_attr( $style_value ) . '; ';
            }
        }
        
        if ( $return ) return get_submit_button( $text, 'primary', $name, $wrap, array( 'style' => $style ) );

        submit_button( $text, 'primary', $name, $wrap, array( 'style' => $style ) );

    }

}

if ( ! function_exists( 'sanitize_form_text_field' ) ) {

    /**
     * Returns sanitized version of $string.
     * 
     * @param string    $string  Required. The string of text to sanitize, usually a form's text field
     * 
     * @return string 
     */
    function sanitize_form_text_field( $string ) {
            
        return trim( stripslashes( sanitize_text_field( $string ) ) );

    }

}

if ( ! function_exists( 'render_page_heading' ) ) {

    /**
     * Prints a page's heading (title) and possible description text.
     * 
     * @param string    $title            Required. Page title to be displayed.
     * @param array     $description      Optional. Array of strings to be enclosed in `<p>` tags.
     * @param string    $list_slug        Optional. The list slug to use in the 'back to list' button generation.
     * 
     */
    function render_page_heading( $title, $description = '', $list_slug = '' ) {

        $heading  = '<h1>';
        $heading .= __( $title );

        if ( $list_slug ) $heading .= " <a href='?page=$list_slug' class='page-title-action'>Back to List</a>";

        $heading .= '</h1>';
        $heading .= '<hr />';
        
        if ( is_array( $description ) ) {

            $heading .= '<div style="background:#ECECEC; border:1px solid #CCC; padding:0 15px; margin:15px 0; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">';
            foreach ( $description as $text ) $heading .= "<p style='margin: 1em 0;'>$text</p>";
            $heading .= '</div>';

        }

        echo $heading;

    }

}

if ( ! function_exists( 'echo_form_messages' ) ) {

    /**
     * Prints a list of error messages from $errors, or a success message if there are no errors.
     * 
     * 
     * Note: `$component_name_singular` and `$list_page_slug` are used to construct the success message.
     * 
     * @param WP_Error      $errors                     Required. An instance of the WP_Error class containing error 
     *                                                  messages to display.
     * @param string        $component_name_singular    Required. The component's name in singular.
     * @param string        $list_page_slug             Required. The list page slug to link to.
     * 
     * @uses $_POST
     */
    function echo_form_messages( $errors, $component_name_singular, $list_page_slug ) {

        $success_message  = ucwords( $component_name_singular );
        $success_message .= ' ';
        $success_message .= isset( $_POST[ $component_name_singular . '-update-submit' ] ) ? 'updated successfully' : 'added successfully';
        $success_message  = __( $success_message ) . '!';
        $success_message .= '<span>';
        $success_message .= "<a href='?page=$list_page_slug' style='color:#00a0d2; text-decoration:none; margin-left:3px;'>";
        $success_message .= 'View in list';
        $success_message .= '</a>';
        $success_message .= '</span>';
        
        if ( is_wp_error( $errors ) && empty( $errors->errors ) ) {
            ?>
                <div class="notice notice-info is-dismissible inline">
                    <p>
                        <?php echo $success_message ?>
                    </p>
                </div>
            <?php

        } else {

            if ( is_wp_error( $errors ) && ! empty( $errors->errors ) ) {
                
                $error_messages = $errors->get_error_messages();

                foreach ( $error_messages as $error_message ) {
                    ?>
                        <div class="notice notice-error inline">
                            <p>
                                <?php echo $error_message ?>
                            </p>
                        </div>
                    <?php
                }
            }
        }

    }

}

if ( ! function_exists( 'render_input_field' ) ) {

    /**
     * Prints HTML of an input field that's customized according to arguments specified.
     *
     * @param string            $id                  Required. The id of the field which doubles as the name.
     * @param string            $type                Required. The input type of the field, supported types are
     *                                                         'text', 'password', 'email', 'checkbox' and 'number'.
     * @param string            $label               Optional. The label of the field, if empty, no label will be printed.
     * @param string            $placeholder         Optional. The placeholder for the input field, default is blank.
     * @param string|number     $value               Optional. The default value for the input field.
     * @param bool              $required            Optional. Default false, makes the field required and also
     *                                                         will put a little (required) note next to the label if true.
     * @param bool              $wrap_in_table_tags  Optional. Default false,
     *                                                         if true, the whole field will be wrapped in a `<tr>` tag,
     *                                                         with the label and the input wrapped in `<th>` and `<td>` tags respectfully,
     *                                                         thus making the field a table row.
     * @param array             $other_attributes    Optional. Extra attributes for the input field,
     *                                                         mapping attributes to their values, such as `array( 'max' => '100' )`.
     *                                                         These attributes will be output as `attribute="value"`, such as `max="100"`.
     *                                                         Default empty.
     */
    function render_input_field( $id, $type, $label = '', $placeholder = '', $value = '', $required = false, $wrap_in_table_tags = false, $other_attributes= [] ) {

        $value = esc_attr( $value );
        
        $extra_attributes = '';

        if ( $other_attributes ) {
            foreach ( $other_attributes as $attribute_name => $attribute_value ) {
                $extra_attributes .= $attribute_name. "='" . esc_attr( $attribute_value ) . "' "; // Trailing space is important.
            }
        }

        $label_html = '';

        if ( $label ) {

            if ( $required ) {
            
                $label .= " ";
                $label .= "<span class='description'>";
                $label .= "*";
                $label .= "</span>";
                
            }
        
            $label_html .= "<label for=$id>";
            $label_html .= $label;
            $label_html .= "</label>";

        }

        $field_html  = "<input ";
        $field_html .= "id='$id' ";
        $field_html .= "name='$id' ";
        $field_html .= "type='$type' ";
        $field_html .= $value != '' ? "value='$value' " : '';
        $field_html .= $required ? 'required ' : '';
        $field_html .= $placeholder ? "placeholder='$placeholder' " : '';
        $field_html .= $extra_attributes;
        $field_html .= "/>";

        if ( $wrap_in_table_tags ) {

            ?>
                <tr class="form-field form-required">
                    <th scope="row">
                        <?php echo $label_html ?>
                    </th>
                    <td>
                        <?php echo $field_html ?>
                    </td>
                </tr>

            <?php

        } else {

            echo $label_html;
            echo $field_html;

        }

    }

}

if ( ! function_exists( 'render_toggle_button' ) ) {

    /**
     * Requires `custom-toggle-button-style.css`, see `enqueue_custom_toggle_button_scripts()`
     * --
     * Returns HTML of a custom styled checkbox input field, customized according to arguments specified.
     *
     * @param string            $id                  Required. The id of the field which doubles as the name.
     * @param string            $label               Optional. The label of the field.
     * @param bool              $is_checked          Optional. The whether the field is checked or not, Default false.
     * @param bool              $wrap_in_table_tags  Optional. Default false,
     *                                                         if true, the whole field will be wrapped in a `<tr>` tag,
     *                                                         with the label and the input wrapped in `<th>` and `<td>` tags respectfully,
     *                                                         thus making the field a table row.
     */
    function render_toggle_button( $id, $label = '', $is_checked = false, $wrap_in_table_tags = false ) {

        $label_html = '';

        if ( $label ) {
        
            $label_html .= "<label for=$id>";
            $label_html .= $label;
            $label_html .= "</label>";

        }

        $field_html  = "<label class='toggle-control'>";

        $field_html .= "<input ";
        $field_html .= "id='$id' ";
        $field_html .= "name='$id' ";
        $field_html .= "type='checkbox' ";
        $field_html .= $is_checked ? "checked='checked'" : "";
        $field_html .= "/>";

        $field_html .= "<span class='control'></span>";
        $field_html .= "</label>";

        if ( $wrap_in_table_tags ) {

            ?>
                <tr class="form-field form-required">
                    <th scope="row">
                        <?php echo $label_html ?>
                    </th>
                    <td>
                        <?php echo $field_html ?>
                    </td>
                </tr>

            <?php

        } else {

            echo $label_html;
            echo $field_html;

        }

    }

}

if ( ! function_exists( 'render_select_field' ) ) {

    /**
     * Returns HTML of a select field that's customized according to arguments specified.
     *
     * @param string            $id                  Required. The id of the field which doubles as the name.
     * @param string            $label               Optional. The label of the field.
     * @param array             $data                Required. The values to display in the select, of format `value => name`.
     * @param string            $form_slug           Optional. The slug of an 'Add New Item' form, if provided,
     *                                                         a link will be displayed that redirects to the form,
     * 
     *                                                         **UPDATE**: can also be full url, though it must contain the .php file path
     *                                                         (i.e admin.php, edit.php, post.php and so on).
     * 
     * @param string|number     $value               Optional. The default value for the input field.
     * @param bool              $required            Optional. Default false,
     *                                                         will put a little (required) note next to the label if true.
     * @param bool              $wrap_in_table_tags  Optional. Default false,
     *                                                         if true, the whole field will be wrapped in a `<tr>` tag,
     *                                                         with the label and the input wrapped in `<th>` and `<td>` tags respectfully,
     * @param bool              $is_select2          Optional. Default false, whether to output a select2 type field or just a regular select,
     *                                                         for more info visit https://select2.org
     * @param array             $other_attributes    Optional. Extra attributes for the input field,
     *                                                         mapping attributes to their values, such as `array( 'max' => '100' )`.
     *                                                         These attributes will be output as `attribute="value"`, such as `max="100"`.
     *                                                         Default empty.
     * 
     * @param bool              $return              Optional. Whether to return the html instead of echoing it. Default false.  
     * 
     */
    function render_select_field( $id, $label = '', $data, $form_slug = '', $value = '', $required = false, $wrap_in_table_tags = false, $is_select2 = false, $other_attributes = [], $return = false ) {

        $value = esc_attr( $value );
        
        $extra_attributes = '';

        if ( $is_select2 ) {

            isset( $other_attributes['class'] ) ? $other_attributes['class'] .= ' ' . 'select2' . ' ' : $other_attributes['class'] = 'select2';

        }

        if ( $other_attributes ) {
            foreach ( $other_attributes as $attribute_name => $attribute_value ) {
                $extra_attributes .= $attribute_name. "='" . esc_attr( $attribute_value ) . "' "; // Trailing space is important.
            }
        }

        $label_html = '';

        if ( $label ) {

            if ( $required ) {
            
                $label .= " ";
                $label .= "<span class='description'>";
                $label .= "*";
                $label .= "</span>";
                
            }
        
            $label_html .= "<label for=$id>";
            $label_html .= $label;
            $label_html .= "</label>";

        }

        $field_html  = "<select ";
        $field_html .= "id='$id' ";
        $field_html .= "name='$id' ";
        $field_html .= $required ? 'required ' : '';
        $field_html .= $extra_attributes;
        $field_html .= ">";

        foreach( $data as $item_value => $item_name ) {

            $item_value = esc_attr( $item_value );
            $field_html .= "<option value='$item_value' ";
            $field_html .= $item_value == $value ? 'selected' : '';
            $field_html .= ">";
            $field_html .= $item_name;
            $field_html .= "</option>";

        }

        $field_html .= "</select>";

        if ( $form_slug ) {

            $add_new_html = '<br><small>';
            $style        = 'color:dodgerblue; text-decoration:none; margin-left:5px';
            $link_id      = "$id-add-new";

            if ( ( strpos( $form_slug, '#' ) === FALSE ) && ( strpos( $form_slug, '.php' ) === FALSE ) ) {

                $add_new_html .= "<a id='$link_id' href='?page=$form_slug' style='$style'>";

            } else {

                $add_new_html .= "<a id='$link_id' href='$form_slug' style='$style'>";

            }

            $add_new_html .= "Add New...";
            $add_new_html .= "</a>";
            $add_new_html .= "</small>";

        } else {

            $add_new_html  = '';

        }

        if ( $wrap_in_table_tags ) {

            if ( $return ) {

                return sprintf( '<tr class="form-field form-required"><th scope="row">%1$s</th><td>%2$s %3$s</td></tr>', $label_html, $field_html, $add_new_html );

            } else {

            ?>
                <tr class="form-field form-required">
                    <th scope="row">
                        <?php echo $label_html ?>
                    </th>
                    <td>
                        <?php echo $field_html ?>
                        <?php echo $add_new_html ?>
                    </td>
                </tr>

            <?php

            }


        } else {

            if ( $return ) {

                return "{$label_html}{$field_html}{$add_new_html}";

            } else {

                echo $label_html;
                echo $field_html;
                echo $add_new_html;

            }

        }

    }

}

if ( ! function_exists( 'render_checkbox' ) ) {

    /**
     * Returns HTML of a checkbox with label customized according to arguments specified.
     *
     * @param string            $id                  Required. The id of the field which doubles as the name.
     * @param string            $label               Optional. The label of the field.
     * 
     * @param bool              $checked             Optional. Whether the checkbox is checked, Default false.
     * @param bool              $required            Optional. Default false, will put a little (*) note next to the label if true.
     * 
     *                                                         UPDATE: will also add the HTML `required` attribute
     * 
     * @param array             $other_attributes    Optional. Extra attributes for the input field,
     *                                                         mapping attributes to their values, such as `array( 'max' => '100' )`.
     *                                                         These attributes will be output as `attribute="value"`, such as `max="100"`.
     *                                                         Default empty.
     */
    function render_checkbox( $id, $label = '', $checked = false, $required = false, $other_attributes= [] ) {

        isset( $other_attributes['style'] ) ? $other_attributes['style'] .= '; ' . 'margin-right: 15px; width: auto;' . ' ' : $other_attributes['style'] = 'margin-right: 15px; width: auto;';
        
        $extra_attributes = '';

        if ( $other_attributes ) {
            foreach ( $other_attributes as $attribute_name => $attribute_value ) {
                $extra_attributes .= $attribute_name. "='" . esc_attr( $attribute_value ) . "' "; // Trailing space is important.
            }
        }

        if ( $required ) {
            
            $label .= " ";
            $label .= "<abbr class='description required'>";
            $label .= "*";
            $label .= "</abbr>";
            
        }

        $field_html  = '<div>';
        $field_html .= "<label for='$id'>";
        $field_html .= "<input type='checkbox' ";
        $field_html .= "id='$id' ";
        $field_html .= "name='$id' ";
        $field_html .= "value='1' ";
        $field_html .= $checked ? "checked='checked' " : '';
        $field_html .= $required ? 'required ' : '';
        $field_html .= $extra_attributes;
        $field_html .= ' />';
        $field_html .= $label;
        $field_html .= '</label>';
        $field_html .= '</div>';

        echo $field_html;

    }

}

if ( ! function_exists( 'render_radio_buttons' ) ) {

    /**
     * Returns HTML of the radio buttons supplied that are customized according to arguments specified.
     *
     * @param string            $name                Required. The shared name between the radio buttons, Note that the ids are auto generated.
     * @param string            $label               Optional. The label of the field.
     * @param array             $data                Required. The radio buttons to display, of format `value => display_name`.
     * 
     * @param string|number     $value               Optional. The default value for the input field.
     * @param bool              $required            Optional. Default false,
     *                                                         will put a little (*) note next to the label if true.
     * 
     *                                                         UPDATE: will also add the HTML `required` attribute
     * 
     * @param bool              $wrap_in_table_tags  Optional. Default false,
     *                                                         if true, the whole field will be wrapped in a `<tr>` tag,
     *                                                         with the label and the input wrapped in `<th>` and `<td>` tags respectfully,
     * @param array             $other_attributes    Optional. Extra attributes for the input field,
     *                                                         mapping attributes to their values, such as `array( 'max' => '100' )`.
     *                                                         These attributes will be output as `attribute="value"`, such as `max="100"`.
     *                                                         Default empty.
     */
    function render_radio_buttons( $name, $label = '', $data, $value = '', $required = false, $wrap_in_table_tags = false, $other_attributes= [] ) {

        $value      = esc_attr( $value );
        $field_id   = esc_attr( $name ) . '_' . esc_attr( current( array_keys( $data ) ) );

        isset( $other_attributes['style'] ) ? $other_attributes['style'] .= '; ' . 'margin-right: 15px; width: auto;' . ' ' : $other_attributes['style'] = 'margin-right: 15px; width: auto;';
        
        $extra_attributes = '';

        if ( $other_attributes ) {
            foreach ( $other_attributes as $attribute_name => $attribute_value ) {
                $extra_attributes .= $attribute_name. "='" . esc_attr( $attribute_value ) . "' "; // Trailing space is important.
            }
        }

        $label_html = '';

        if ( $label ) {

            if ( $required ) {
            
                $label .= " ";
                $label .= "<abbr class='description required'>";
                $label .= "*";
                $label .= "</abbr>";
                
            }
        
            $label_html .= "<label for='$field_id'>";
            $label_html .= $label;
            $label_html .= "</label>";

        }

        $field_html = '';

        foreach( $data as $item_value => $item_name ) {

            $item_value  = esc_attr( $item_value );
            $input_id    = esc_attr( $name ) . '_' . esc_attr( $item_value );

            $field_html .= '<div>';
            $field_html .= "<label for='$input_id'>";
            $field_html .= "<input type='radio' ";
            $field_html .= "id='$input_id' ";
            $field_html .= "name='$name' ";
            $field_html .= "value='$item_value' ";
            $field_html .= $item_value == $value ? "checked='checked' " : '';
            $field_html .= $required ? 'required ' : '';
            $field_html .= $extra_attributes;
            $field_html .= ' />';
            $field_html .= $item_name;
            $field_html .= '</label>';
            $field_html .= '</div>';

        }

        if ( $wrap_in_table_tags ) {

            ?>
                <tr class="form-field form-required">
                    <th scope="row">
                        <?php echo $label_html ?>
                    </th>
                    <td>
                        <?php echo $field_html ?>
                    </td>
                </tr>

            <?php

        } else {

            echo $label_html;
            echo $field_html;

        }

    }

}

if ( ! function_exists( 'render_textarea_field' ) ) {

    /**
     * Returns HTML of a textarea field that's customized according to arguments specified.
     *
     * @param string            $id                  Required. The id of the field which doubles as the name.
     * @param string            $label               Optional. The label of the field.
     * @param string            $placeholder         Optional. The placeholder for the input field, default is blank.
     * @param string|number     $value               Optional. The default value for the input field.
     * @param bool              $required            Optional. Default false,
     *                                                         will put a little (required) note next to the label if true.
     * @param bool              $wrap_in_table_tags  Optional. Default false,
     *                                                         if true, the whole field will be wrapped in a `<tr>` tag,
     *                                                         with the label and the input wrapped in `<th>` and `<td>` tags respectfully,
     *                                                         thus making the field a table row.
     * @param array             $other_attributes    Optional. Extra attributes for the input field,
     *                                                         mapping attributes to their values, such as `array( 'max' => '100' )`.
     *                                                         These attributes will be output as `attribute="value"`, such as `max="100"`.
     *                                                         Default empty.
     */
    function render_textarea_field( $id, $label = '', $placeholder = '', $value = '', $required = false, $wrap_in_table_tags = false, $other_attributes= [] ) {

        $value = esc_attr( $value );

        $extra_attributes = '';

        if ( $other_attributes ) {
            foreach ( $other_attributes as $attribute_name => $attribute_value ) {
                $extra_attributes .= $attribute_name. "='" . esc_attr( $attribute_value ) . "' "; // Trailing space is important.
            }
        }

        
        $label_html = '';

        if ( $label ) {

            if ( $required ) {
            
                $label .= " ";
                $label .= "<span class='description'>";
                $label .= "*";
                $label .= "</span>";
                
            }
        
            $label_html .= "<label for=$id>";
            $label_html .= $label;
            $label_html .= "</label>";

        }

        $field_html  = "<textarea ";
        $field_html .= "id='$id' ";
        $field_html .= "name='$id' ";
        $field_html .= $required ? 'required ' : '';
        $field_html .= "placeholder='$placeholder' ";
        $field_html .= $extra_attributes;
        $field_html .= ">";
        $field_html .= $value;
        $field_html .= "</textarea>";

        if ( $wrap_in_table_tags ) {

            ?>
                <tr class="form-field form-required">
                    <th scope="row">
                        <?php echo $label_html ?>
                    </th>
                    <td>
                        <?php echo $field_html ?>
                    </td>
                </tr>

            <?php

        } else {

            echo $label_html;
            echo $field_html;

        }

    }

}

if ( ! function_exists( 'render_ul_list' ) ) {

    /**
     * Returns HTML of an unorganized list, customized according to arguments specified.
     * 
     * @param array     $data           Required. The array to loop through and construct the list.
     * @param string    $title          Optional. The title of the list enclosed in `<h4>` tags, default is blank
     * @param string    $style_type     Optional. The `list-style-type` value, default is `disc` (i.e bullets)
     * @param array     $extra_style    Optional. Additional style attributes for the list,
     *                                            mapping attributes to their values, such as `array( 'margin-left' => '40px' )`.
     *                                            These attributes will be output as `attribute: value;`, such as `margin-left: 40px;`.
     *                                            Default empty. 
     * @param bool      $return         Optional. Whether to return the html instead of echoing it or not. Default false.
     */
    function render_ul_list( $data, $title = '', $style_type = 'disc', $extra_style = [], $return = false ) {

        $style = $style_type ? "list-style-type: $style_type; " : 'list-style-type: none; ';

        if ( $extra_style ) {
            foreach ( $extra_style as $style_name => $style_value ) {
                $style .= $style_name . ": " . esc_attr( $style_value ) . "; ";
            }
        }
        
        $list_html  = $title ? '<h4>' . $title . ':</h4>' : '';
        $list_html .= $style ? "<ul style='$style'>" : '<ul>';

        foreach( $data as $item ) $list_html .= "<li>$item</li>";
        
        $list_html .= "</ul>";

        if ( $return ) return $list_html;

        echo $list_html;

    }

}

if ( ! function_exists( 'render_delete_page' ) ) {

    /**
     * Returns customized DELETE page.
     * 
     * @param string    $title              Required. Title of the page.
     * @param array     $record             Required. Record to delete as an associative array of format `[ 'id'  =>  id, 'name'  =>  name ]`
     * @param array     $submit_btn         Required. Associative array containing HTML attributes about the submit button.
     *                                                The only attributes needed are `name` and `text` really.
     * @param string    $nonce_seed         Optional. Will generate a hidden nonce field using it if supplied, see `render_nonce_field` function.
     * @param array     $related_tables     Optional. **SEE `get_related_records()`** 
     * 
     * 
     *                                      Tables containing records that will be deleted with the deletion of `$record`,
     *                                      If supplied, a descriptive list will be displayed showing all affected records.
     *                                      It also looks pretty cool! :D
     */
    function render_delete_page( $title, $record, $submit_btn, $nonce_seed = '', $related_tables = '' ) {

        $related_records = is_array( $related_tables ) ? get_related_records( $record['id'], $related_tables ) : [];

        $description = array(

            sprintf(
                "Are you sure you want to delete <strong>%s</strong> <span style=\"color:silver\">(id: %s)</span>?",
                $record['name'],
                $record['id']
            ),
            $related_records ? "This will also delete the following:" : '',

        );

        render_page_heading( $title, $description );
        
        echo '<form method="POST" action="#">';

        if ( $nonce_seed ) {
            
            render_nonce_field( $nonce_seed );
            wp_referer_field();

        }

        if ( $related_records ) {

            echo '<div style="background:#ECECEC; border:1px solid #CCC; padding: 15px; margin:15px 0; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">';

            foreach( $related_records as $table_name => $related_record ) {

                $name_field = $related_tables[$table_name]['fields_to_be_selected'][1];

                render_ul_list( 
                    array_map( function ( $record ) use ( $name_field ) { return $record->$name_field; }, $related_record ),
                    ucfirst( str_replace( $GLOBALS['wpdb']->prefix, "", $table_name ) ),
                    'disc',
                    array(
                        'margin-left'   =>  '40px',
                    )
                );

            }

            echo '</div>';

        }

        danger_submit_button( $submit_btn['text'], $submit_btn['name'] );

        echo '</form>';

    }

}

if ( ! function_exists( 'render_form_buttons' ) ) {

    /**
     * Returns a form's Update, Create and Delete buttons depending on`$edit_mode`,
     * customized according to arguments specified.
     * 
     * @param bool      $edit_mode                  Required. Whether the form is in edit more or not.
     * @param string    $component_name_singular    Required. The component name in singular.
     * 
     */
    function render_form_buttons( $edit_mode, $component_name_singular ) {

        ?>
            <div class="tablenav bottom">

                <div class="alignleft actions">

                    <?php           
                        if ( $edit_mode ) {
                            
                            submit_button(
                                __( 'Update ' . ucfirst( $component_name_singular ) ),
                                'primary',
                                $component_name_singular . '-update-submit',
                                false
                            );

                            danger_submit_button(
                                __( 'Delete ' . ucfirst( $component_name_singular ) ),
                                $component_name_singular . '-delete-submit',
                                false,
                                array(
                                    'margin-left'   =>  '13px',
                                )
                            );
                            
                        } else {
                            
                            submit_button(
                                __( 'Add ' . ucfirst( $component_name_singular ) ),
                                'primary',
                                $component_name_singular . '-add-submit',
                                false
                            );         
                        
                        }
                    ?>
                
                </div>

            </div>
        <?php
    }

}

if ( ! function_exists( 'fetch_record_or_404' ) ) {

    /**
     * Returns the record with id = `$id` from `$table_name` as an object,
     * or exits the script with a 404 message if no record was found.
     * 
     * @param int       $id                         Required. The id of the record to look for.
     * @param string    $table_name                 Required. The name of the datatable.
     * @param string    $component_name_singular    Required. The name of the component in singular,
     *                                                        this is used to construct the 404 message.
     * @param string    $output                     Optional. The required return type. One of OBJECT, 
     *                                                        ARRAY_A, or ARRAY_N, which correspond to an stdClass object,
     *                                                        an associative array, or a numeric array, respectively.
     *                                                        Default value: OBJECT
     * 
     * @uses $wpdb
     * 
     * @return Object
     */
    function fetch_record_or_404( $id, $table_name, $component_name_singular, $output = OBJECT ) {

        global $wpdb;

        $sql = $wpdb->prepare( "SELECT *
                                FROM $table_name
                                WHERE id = %d",  
                                $id
                            );

        $result = $wpdb->get_row( $sql, $output );

        if ( is_null( $result ) ) {

            $message  = '<h1>';
            $message .= __( ucfirst( $component_name_singular ) . ' ' . 'Not Found' ) . ' ' . '>:(';
            $message .= '</h1>';

            echo $message;
            exit;

        }

        return $result;

    }

}

if ( ! function_exists( 'fetch_parent_records_or_404' ) ) {

    /**
     * Returns all records of `$parent_table`, ideally to be used in a dropdown select field
     * or exits the script with a custom 404 message if no records were found.
     * 
     * Note: `$records_label` and `$form_slug` are used to create the 404 message
     * 
     * @param string    $parent_table               Required. The id of the record to look for.
     * @param string    $records_label              Required. The label of the records.
     * @param string    $form_slug                  Required. The slug of the records 'Add New' form.
     * @param string    $output                     Optional. The required return type. One of OBJECT, 
     *                                                        ARRAY_A, or ARRAY_N, which correspond to an stdClass object,
     *                                                        an associative array, or a numeric array, respectively.
     *                                                        Default value: OBJECT
     * 
     * @uses $wpdb
     * 
     * @return array|void
     */
    function fetch_parent_records_or_404( $parent_table, $records_label, $form_slug, $output = OBJECT ) {

        global $wpdb;

        $sql = "SELECT * FROM $parent_table";
        
        $results = $wpdb->get_results( $sql, $output );

        if ( ! $results ) {

            $message  = "<h1 class='wp-heading-inline'>";
            $message .= __( 'No ' . ucfirst( $records_label ) . ' Available' ) . '!';
            $message .= '</h1>';
            $message .= "<a href='?page=$form_slug' class='page-title-action'>";
            $message .= "Add New";
            $message .= '</a>';

            echo $message;
            exit;

        }

        return $results;

    }

}

if ( ! function_exists( 'get_related_records' ) ) {

    /**
     * Returns an array of records related to the record of specified `$main_id`.
     *
     * The function takes in `$main_id` and an associative array `$related_tables` formatted as follows:
     * 
     * `'table_name' => array( 'fields_to_be_selected' => array( field1, field2, ... ), 'foreign_key_field_name' => foreign_key_field_name )`
     * 
     * Where `$main_id` is the id of the main record and `table_name` is the name of the table to check if the value of
     * it's `foreign_key_field_name` checks out with `$main_id`;
     * 
     * The function then fetches a list of `fields_to_be_selected` of the found records
     * 
     * **MAKE SURE IT CONTAINS THE ID FIELD AND THAT ITS THE FIRST ONE** 
     * 
     * it then loops through them, performing the same
     * id check but this time with the id of every record returned, instead of the `$main_id`,
     * with the next `$table_name` in the `$related_tables` list.
     * Thus it is **VERY IMPORTANT** to list the tables in the array properly!
     * 
     * @uses $wpdb
     * 
     * @param int       $main_id            Required. The id of the main record.
     * @param array     $related_tables     Required. The list of table to look through **READ ABOVE**.
     * 
     * @return array an array containing arrays of records from each table formatted as: `'table_name' => array( record1, record2, ... )`
     */
    function get_related_records( $main_id, $related_tables ) {

        global $wpdb;

        $buffer     = array();
        $results    = array();
        $ids        = array( $main_id );

        foreach ( $related_tables as $table_name => $fields ) {

            $id_field_name          = $fields['fields_to_be_selected'][0];
            $fields_to_be_selected  = implode( ', ',  $fields['fields_to_be_selected']);
            $foreign_key_field_name = $table_name . '.' . $fields['foreign_key_field_name'];

            foreach ( $ids as $id ) {

                $sql = "SELECT $fields_to_be_selected 
                        FROM $table_name 
                        WHERE $foreign_key_field_name = $id";

                $buffer = array_merge( $buffer, $wpdb->get_results( $sql ) );
                
            }
            
            $ids = array();
            
            foreach ( $buffer as $record ) {

                $results[ $table_name ][] = $record;
                $ids[] = $record->$id_field_name;

            }

            $buffer = array();

        }

        return $results;

    }

}

if ( ! function_exists( 'validate_form' ) ) {

    /**
     * Returns an instance of the WP_Error class, prefilled with any errors that resulted from failed validations.
     * 
     * This function aims to enforce database constraints on $_POST data and is always being updated to support more...
     * 
     * It takes in an array of fields descriptions categorized according to their constraints,
     * e.g [ 'not_null' => not_null_fields_descriptions ] more explanation below
     * 
     * Currently supported constraints are: `Not Null` and `Unique`
     * 
     * The `Not Null` Constraint (key: 'not_null'):
     * -------------------------------------------
     * 
     * Not null fields are to be listed in an array with the following format `[ $field_slug =>  $field_name ]`
     * 
     * a full example will look something like this 
     * 
     * `$fields_to_validate = array( 'not_null' => array( $field1_slug => $field1_name, $field2_slug => $field2_name, ... ) )`
     * 
     * The function will check the `$_POST` array for `$field_slug` key and return a **field_slug_required** error
     * if either the key is not set or is set but contains no value.
     * 
     * The `Unique` Constraint (key: 'unique'):
     * ---------------------------------------
     * 
     * Unique fields are to be listed in an array with the following format `[ $field_slug =>  $field_name ]`, 
     * that array needs to be nested in a parent array, associated with the key `fields`, alongside `datatable_name` which
     * holds the name of the datatable and `current_record` which holds the id of the record that's being edited
     * however if there's no record being edited (i.e a new one is being added) it is recommended to input `0` in its place.
     * 
     * There are also optinal keys that, if provided, will make the error message more verbose, **this is only available for child components**.
     * Those keys compose of the `parent_component_datatable_name`, the `parent_component_name_singular`, the `parent_default_datatable_field`
     * AND FINALLY the `foreign_key`, the values they hold are pretty self explanatory keep in mind this is just for child components
     * 
     * a full example will look something like this
     * 
     * `$fields_to_validate = array( 'unique' => array( 'fields' => array( $field1_slug => $field1_name, $field2_slug => $field2_name, ... ), 'datatable_name' => $datatable_name, 'current_record' => $current_record_id or 0 ) )`
     * 
     * The function will check the value of each `$field_slug` in the `$_POST` array against that of the existing records
     * in the database, excluding the record with an id of `$current_record_id`, and return a **field_slug_exists** error
     * if a match is found.
     * 
     * @param array         $fields_to_validate     Required. Just read the description.
     * 
     * @uses WP_Error
     * 
     * @return WP_Error $errors
     */
    function validate_form( $fields_to_validate ) {
                
        global $wpdb;
            
        $errors = new WP_Error();

        if ( isset( $fields_to_validate['not_null'] ) ) {

            $required_fields = $fields_to_validate['not_null'];

            foreach( $required_fields as $field_slug => $field_name ) {

                if ( ! isset( $_POST[ $field_slug ] ) || ( isset( $_POST[ $field_slug ] ) && $_POST[ $field_slug ] === '' ) ) {

                    $error_code = $field_slug . "_required";
                    $error_msg  = sprintf( "Sorry, field <strong>%s</strong> is required.", $field_name );

                    $errors->add( $error_code, __( $error_msg ) );

                }

            }

        }

        if ( isset( $fields_to_validate['unique'] ) ) {

            $unique_fields = $fields_to_validate['unique'];

            foreach( $unique_fields['fields'] as $field_slug => $field_name ) {

                $column_name            = $field_slug;
                $record_id              = $unique_fields['current_record'];
                $datatable_name         = $unique_fields['datatable_name'];

                if ( isset( $_POST[ $field_slug ] ) && $_POST[ $field_slug ] !== '' ) {

                    if ( isset( $unique_fields['foreign_key'] ) ) {

                        $foreign_key                    = $unique_fields['foreign_key']; 
                        $parent_datatable_name          = $unique_fields['parent_component_datatable_name'];
                        $parent_default_datatable_field = $unique_fields['parent_default_datatable_field'];
                        $parent_component_name_singular = $unique_fields['parent_component_name_singular'];

                        $query = $wpdb->prepare( "SELECT $column_name, $parent_default_datatable_field
                                                FROM $datatable_name, $parent_datatable_name
                                                WHERE $datatable_name.$foreign_key = $parent_datatable_name.id
                                                AND $datatable_name.id <> %d
                                                AND $column_name = %s",
                                                array(
                                                    
                                                    $record_id,
                                                    sanitize_form_text_field( $_POST[ $field_slug ] ),
                                                    
                                                    )
                                                );

                    } else {

                        $query = $wpdb->prepare( "SELECT $column_name
                                                FROM $datatable_name
                                                WHERE id <> %d
                                                AND $column_name = %s",
                                                array(
            
                                                    $record_id,
                                                    sanitize_form_text_field( $_POST[ $field_slug ] ),
            
                                                )
                                                );

                    }
            
                    $result = $wpdb->get_row( $query );
            
                    if ( $result ) {

                        $error_code = $field_slug . "_exists";

                        if ( isset( $unique_fields['foreign_key'] ) ) {

                            $error_msg  = sprintf(
                                
                                "Sorry, %s <strong>%s</strong> already exists in %s <strong>%s</strong>.",
                                $field_name,
                                $result->$column_name,
                                ucfirst( $parent_component_name_singular ),
                                $result->$parent_default_datatable_field
                            
                            );

                        } else {

                            $error_msg  = sprintf(
                                
                                "Sorry, %s <strong>%s</strong> already exists in the database.",
                                $field_name,
                                $result->$column_name
                            
                            );

                        }

                        $errors->add( $error_code, __( $error_msg ) );
                        
                    }
            
                }        

            }

        }

        return $errors;

    }

}

if ( ! function_exists( 'get_wc_attributes_or_404' ) ) {

    /**
     * Returns all custom attributes added by the admin with their
     * related terms by default, or without them if specified, or 404 if none were found.
     * 
     * ***THE TERMS ARE AN ARRAY OF ASSOCIATIVE ARRAYS***
     * 
     * **The returned array is of format**
     * 
     * `[ ['attribute_id' => id, 'attribute_name' => name, 'attribute_label' => label, 'taxonomy' => 'pa_' . 'attribute_name' [, 'terms' => [ 'term_id' => id, 'name' => name, 'slug' => slug ], ...] ], ... ]`
     * 
     * @param bool      $with_terms     Whether or not to fetch the related terms also, Default true.
     * 
     * @return array $attributes
     */
    function get_wc_attributes_or_404( $with_terms = true ) {

        global $wpdb;

        $terms_table                = $wpdb->prefix . 'terms';
        $term_taxonomy_table        = $wpdb->prefix . 'term_taxonomy';
        $wc_attr_taxonomies_table   = $wpdb->prefix . 'woocommerce_attribute_taxonomies';
        
        $sql = "SELECT attribute_id, attribute_name, attribute_label, CONCAT('pa_', attribute_name) AS 'taxonomy' FROM $wc_attr_taxonomies_table";

        $attributes = $wpdb->get_results( $sql, ARRAY_A );

        if ( is_null( $attributes ) ) {

            $message  = '<h1>';
            $message .= __( 'No Custom Attributes Found' ) . ' ' . '>:(';
            $message .= '</h1>';

            echo $message;
            exit;

        }

        if ( $with_terms ) {

            foreach ( $attributes as $index => $attribute ) {

                $sql = $wpdb->prepare( "SELECT $terms_table.term_id, $terms_table.name, $terms_table.slug
                                        FROM $terms_table, $term_taxonomy_table
                                        WHERE $terms_table.term_id = $term_taxonomy_table.term_id
                                        AND $term_taxonomy_table.taxonomy = %s",
        
                                        $attribute['taxonomy'] );
        
                $terms = $wpdb->get_results( $sql, ARRAY_A );
        
                $attributes[ $index ]['terms'] = $terms;
        
            }

        }

        return $attributes;

    }

}

if ( ! function_exists( 'get_hardware_attributes' ) ) {

    /**
     * CUSTOM FUNCTION
     * ---
     * Returns a list of all available hardware ids with their attributes and terms
     * mapped to them, all in one array! :D
     * 
     * The returned array is of format
     * 
     * `[ hardware_id => [ [ 'attribute' => attribute_label, 'term' => term ], [ 'attribute' => attribute_label, 'term' => term ], ... ], ... ]`
     * 
     * @param string    $attributes_datatable_name      The name of the hardware attributes datatable.
     * 
     * @return array $hardware_attributes
     */
    function get_hardware_attributes( $attributes_datatable_name ) {

        global $wpdb;

        $terms_table                = $wpdb->prefix . 'terms';
        $wc_attr_taxonomies_table   = $wpdb->prefix . 'woocommerce_attribute_taxonomies';
        
        $sql = "SELECT hardware_id, $wc_attr_taxonomies_table.attribute_label, $terms_table.name AS term
                FROM $attributes_datatable_name, $wc_attr_taxonomies_table, $terms_table 
                WHERE $attributes_datatable_name.attribute_id = $wc_attr_taxonomies_table.attribute_id 
                AND $attributes_datatable_name.term_id = $terms_table.term_id";

        $buffer = $wpdb->get_results( $sql );

        $hardware_attributes = [];

        foreach ( $buffer as $attribute ) {

            $hardware_attributes[ $attribute->hardware_id ][] = array(

                'attribute'     =>  $attribute->attribute_label,
                'term'          =>  $attribute->term,

            );

        }

        return $hardware_attributes;

    }

}

/**
 * 
 * PHP String Encryption with Libsodium
 * 
 */

if ( ! function_exists( 'safe_encrypt' ) ) {

    /**
     * Encrypt a message
     * 
     * @param   string      $message    Required. Message to encrypt
     * @param   string      $key        Required. Encryption key
     * 
     * @return  string
     * 
     * @throws RangeException
     * 
     */
    function safe_encrypt( string $message, string $key ): string {

        if ( mb_strlen($key, '8bit') !== SODIUM_CRYPTO_SECRETBOX_KEYBYTES ) {

            throw new RangeException( 'Key is not the correct size (must be 32 bytes).' );

        }

        $nonce  = random_bytes( SODIUM_CRYPTO_SECRETBOX_NONCEBYTES );
        $cipher = base64_encode(

            $nonce.
            sodium_crypto_secretbox(

                $message,
                $nonce,
                $key

            )

        );

        sodium_memzero($message);
        sodium_memzero($key);

        return $cipher;

    }

}

if ( ! function_exists( 'safe_decrypt' ) ) {

    /**
     * Decrypt a message
     * 
     * @param   string      $encrypted  Required, message encrypted with `safeEncrypt()`
     * @param   string      $key        Required, encryption key
     * 
     * @return  string
     * 
     * @throws  Exception
     * 
     */
    function safe_decrypt( string $encrypted, string $key ): string {   

        $decoded    = base64_decode( $encrypted );
        $nonce      = mb_substr( $decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit' );
        $ciphertext = mb_substr( $decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit' );
        
        $plain = sodium_crypto_secretbox_open(

            $ciphertext,
            $nonce,
            $key

        );

        if ( ! is_string( $plain ) ) {

            throw new Exception( 'Invalid MAC' );

        }

        sodium_memzero($ciphertext);
        sodium_memzero($key);

        return $plain;

    }

}

if ( ! function_exists( 'get_page_by_slug' ) ) {

    /**
    * Retrieve a page given its slug.
    *
    * @global wpdb $wpdb WordPress database abstraction object.
    *
    * @param string       $page_slug  Page slug
    * @param string       $output     Optional. Output type. OBJECT, ARRAY_N, or ARRAY_A.
    *                                 Default OBJECT.
    * @param string|array $post_type  Optional. Post type or array of post types. Default 'page'.
    * @return WP_Post|null WP_Post on success or null on failure
    */
    function get_page_by_slug( $page_slug, $output = OBJECT, $post_type = 'page' ) {
        global $wpdb;

        if ( is_array( $post_type ) ) {
            $post_type = esc_sql( $post_type );
            $post_type_in_string = "'" . implode( "','", $post_type ) . "'";
            $sql = $wpdb->prepare( "
                SELECT ID
                FROM $wpdb->posts
                WHERE post_name = %s
                AND post_type IN ($post_type_in_string)
            ", $page_slug );
        } else {
            $sql = $wpdb->prepare( "
                SELECT ID
                FROM $wpdb->posts
                WHERE post_name = %s
                AND post_type = %s
            ", $page_slug, $post_type );
        }

        $page = $wpdb->get_var( $sql );

        if ( $page )
            return get_post( $page, $output );

        return null;
    }

}

if ( ! function_exists( 'is_strong_password' ) ) {

    /**
     * Function to check whether or not a string passes a simple password strength test.
     * 
     * The string will be checked to make sure it is:
     * 
     * - At least 8 characters long,
     * - Contains at least one UPPERCASE letter [A-Z],
     * - Contains at least one number [0-9],
     * - Contains at least one special character [ !, ", #, $, %, &, ', (, ), *, +, ,, -, ., /, :, ;, <, =, >, ?, @, [, \, ], ^, _, `, {, |, }, ~ ]
     * 
     * @param String    $password_to_check      Required. The password string to check,
     * 
     * @return Bool    True if the password passes the basic strength test, false otherwise.
     * 
     */
    function is_strong_password( $password_to_check ) {

        $min_char_amount = 8;
        
        $special_chars = array(

            '!', '"', '#',
            '$', '%', '&',
            "'", '(', ')',
            '*', '+', ',',
            '-', '.', '/',
            ':', ';', '<',
            '=', '>', '?',
            '@', '[', '\\',
            ']', '^', '_',
            '`', '{', '|',
            '}', '~',

        );
        
        $is_strong_password = true;
        
        /**
         * Check password length, if it contains uppercase,
         */
        if ( strlen( $password_to_check ) < $min_char_amount
        || ( ! preg_match( '/[A-Z]/', $password_to_check ) )
        || ( ! preg_match( '/[0-9]/', $password_to_check ) ) 
        || ( ! str_contains_array( $password_to_check, $special_chars ) ) ) {

            $is_strong_password = false;

        }

        return $is_strong_password;

    }

}

if ( ! function_exists( 'str_contains_array' ) ) {

    /**
     * Function to check if a character (needle) in a given array is present in a string (haystack)
     * 
     * @param String    $string     Required. The string to search in (the haystack),
     * @param Array     $needles    Required. The array of strings to find (the needles).
     * 
     * @return Bool True if at least one needle was found in the haystack, false otherwise.
     */
    function str_contains_array( $string, array $needles ) {

        /**
         * Loop through needles
         */
        foreach( $needles as $needle ) {

            /**
             * If any needle was found at any position in the string then return true
             */
            if ( stripos( $string, $needle ) !== false ) {

                return true;

            }

        }

        /**
         * If no needles were found then return false
         */
        return false;

    }

}
