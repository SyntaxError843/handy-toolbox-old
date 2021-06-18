/**
 * Globalize jQuery as $ :D
 */

(($) => {
    /**
     * Execute code when document is ready
     */

    $(() => {

        /**
         * Turn all select dom elements with the class
         * 'select2'
         * into customized select2 elements
         */
        $( "select.select2" ).select2({

        placeholder: "Select a option...",
        allowClear: true,

        });

        /**
         * Clear all select 2 fields with class clear
         */
        $( 'select.select2.clear' ).val(null).change();

    });
    
})(jQuery);
