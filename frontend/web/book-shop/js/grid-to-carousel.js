/**
 * gridToCarousel [c]2016, @n_cholas, OmCore Ltd. MIT/GPL
 *
 * https://github.com/nicholaswright/grid-to-carousel.git
 */
;(function($) {
    'use strict';
    $.fn.gridToCarousel = function(options) {
        return this.each(function() {
            
            var defaults = {
                    //onComplete: function() {}
                    carouselInterval: false
                },
                settings = $.extend({}, defaults, options),
                
                container = $(this),
                grid = container.find('.grid'),
                contents = grid.find('.content'),
                carousel = container.find('.carousel'),
                closeButtons = carousel.find('.close-btn');
                
            carousel.carousel({
                interval: settings.carouselInterval
            })
            
            $.each(contents, function(key) {
                var el = $(this);
                el
                    .on('click', function() {
                        var pos = el.position(),
                            clone = el.clone();
                        
                        // We'll animate a clone so to leave the original content as is.
                        clone
                            // Set the clone to position absolute and insert it directly
                            // over the original element.
                            .css({
                                position: 'absolute',
                                left: pos.left,
                                top: pos.top,
                                width: el.outerWidth(true)
                            })
                            .appendTo(grid)
                            .children()
                                .remove();
                        
                        // Using a timeout allows the clone to be inserted before
                        // the animation class takes affect. Otherwise the animation
                        // won't occur.
                        setTimeout(function() {
                            clone
                                .addClass('animate')
                                .css({
                                    left: 0,
                                    top: 0,
                                    width: '100%',
                                    height: '100%'
                                });
                                
                            // Once the animation has completed show the carousel, make 
                            // the carousel's relevant slide and indicator active and hide
                            // the grid, finally removing the clone.
                            setTimeout(function() {
                                carousel.removeClass('hidden');
                                
                                carousel
                                    .find('.item')
                                    .removeClass('active')
                                    .eq(key)
                                    .addClass('active');
                                    
                                carousel
                                    .find('[data-slide-to]')
                                    .removeClass('active')
                                    .eq(key)
                                    .addClass('active');
                                
                                grid.addClass('hidden');
                                clone.remove();
                            }, 400);
                            
                        });
                    });
            });
            
            $.each(closeButtons, function(key) {
                $(this)
                    .on('click', function() { 
                        
                        // Hide the carousel and show the grid again.
                        carousel.addClass('hidden');
                        grid.removeClass('hidden');
                        
                        // The key of the button clicked will be the same 
                        // as the key of the box.
                        var content = contents.eq(key),
                            pos = content.position(),
                            clone = content.clone().appendTo(grid);
                            
                        clone.children().remove();
                        
                        // Expand the clone to fill the space before
                        // applying it with the animate class and setting
                        // it with the width and height of the original 
                        // element so its size shrinks back down.
                        clone
                            .css({
                                position: 'absolute',
                                left: 0,
                                top: 0,
                                width: '100%',
                                height: '100%'
                            })
                            .addClass('animate')
                            .css({
                                left: pos.left,
                                top: pos.top,
                                width: content.outerWidth(true),
                                height: content.outerHeight(true)
                            });
                        
                        // Remove the clone once the animation has completed.
                        setTimeout(function() {
                            clone.remove();
                        }, 400);
                    });
            });

        });
    };
})(jQuery);