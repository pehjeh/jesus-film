(function( $ ) {
    $.fn.elementDV = function(options) {
        var settings = $.extend( {
            'default_value' : '',
            'replace_with' : ''
        }, options);
        
        $(this).attr('value',settings.default_value);

        $(this).focus(function(){
            value = $(this).attr('value');

            if (value == settings.default_value)
                $(this).attr('value',settings.replace_with);
        });
        
        $(this).blur(function(){
            value = $(this).attr('value');
            
            if (value == '' || value == settings.replace_with)
                $(this).attr('value',settings.default_value);
                
        });
    
        return this;
    };
})( jQuery );