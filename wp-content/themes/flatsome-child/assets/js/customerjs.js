$ = jQuery;
$( document ).ready(function() {
    $('.counter').countUp();
    $('#horizontalTab').easyResponsiveTabs({
	    type: 'default',  
	    width: 'auto', 
	    fit: true,   
	    closed: 'accordion',
	    activate: function(event) { 
	    var $tab = $(this);
		    var $info = $('#tabInfo');
		    var $name = $('span', $info);
		    $name.text($tab.text());
		    $info.show();
		    }
	    });
	    $('#verticalTab').easyResponsiveTabs({
	    type: 'vertical',
	    width: 'auto',
	    fit: true   
    });
});

