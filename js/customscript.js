jQuery(document).ready(function () {
	var full_width = 0;

    jQuery("ul.menu:first > li").each(function( index ) {    

        if((jQuery(this).width() + full_width) > 960) {

            jQuery(this).remove();

        }

        full_width = full_width + jQuery(this).width(); 

    });
});	

jQuery(document).ready(function($) {
	jQuery(".scroll").click(function(event){		
		event.preventDefault();
		jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top}, 500);
	});
});
	
jQuery(function(){
    jQuery(window).responsinav({ breakpoint: 650 });
});