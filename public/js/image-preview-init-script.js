/**
 * Globalize jQuery as $ :D
 */

(($) => {
    /**
     * Execute code when document is ready
     */

    $(() => {
        /**
         * Add an on hover minipreview window to all link dom elements that are
         * located inside div elements with the class 'image-preview',
         * so that the destination of the href url gets preloaded into a
         * popup mini window on hover.
         */

        $( 'div.image-preview a' ).miniPreview({
            
            width: 256,             // default 256
            height: 144,            // default 144
            scale: 0.25,            // default 0.25
            prefetch: 'pageload'    // options are 'pageload', 'parenthover' and 'none'
        
        });

    });
    
})(jQuery);
