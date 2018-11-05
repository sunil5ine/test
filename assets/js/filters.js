 var slider = document.getElementById('test-slider'); noUiSlider.create(slider, {start: [0, 35], connect: true, step: 1, orientation: 'horizontal', range: {'min': 0, 'max': 50 }, format: wNumb({decimals: 0 }) }); 
$(document).ready(function(){
	$('select').select2({width: "100%"});
	$('#sel-location').change(function(){
       var val = $(this).val();
       $(this).attr('name','location['+val+']');
    });



     
        
       
        


            
	/****************************
	 Shortings 
	****************************/
	
		$('#fiters input[type=checkbox]').change(function(){

			if($(this).is(':checked') == true) {
				var val  = $(this).attr('fvalue');
				var name = '&'+$(this).attr('fname')+'['+val+']=';
	            var urlr = window.location.href+name+val;
                var url = urlr.split('&location[]=').join(''); 
	            window.location = url;

	        }
	        else if($(this).is(':checked') == false){
		        var val  = $(this).attr('fvalue');
				var name = '&'+$(this).attr('fname')+'['+val+']=';
	            var windowURL = window.location.href;
	            var url = windowURL.split(name+val).join('');             
	            window.location = url;
          }  
		});

		$('.select-list').change(function(){
			
				var val = $(this).val();
				var name = '&'+$(this).attr('fname')+'=';
				var url = window.location.href+name+val;
		        window.location = url;
	    	

		});
		slider.noUiSlider.on('set',function (values, handle) {
			setTimeout(function(){
				var val = values;
				var name = '&expr=';
				var url = window.location.href+name+val;
		    	window.location = url;
			},2000)
			
		});

/* filters items showing */
$('#cntlist').each(function(){
    var lis = $(this).find('.lablediv:gt(4)');
    if(!$(this).hasClass('expanded')) {
        lis.hide();
    } else {
        lis.show();
    }
    
    if(lis.length>0){
        $('.btn-more-contry a').click(function(event){
            var $expandible = $(this).parents('.expandible');
            $expandible.toggleClass('expanded');
            if ( !$expandible.hasClass('expanded')) {
                $(this).text('More');
            } else {
                $(this).text('Less');
            };
            lis.toggle();
            event.preventDefault();
        });
    }
});
$('#fun-area-box').each(function(){
    var lis = $(this).find('.lablediv:gt(4)');
    if(!$(this).hasClass('expanded')) {
        lis.hide();
    } else {
        lis.show();
    }
    
    if(lis.length>0){
        $('.btn-more-funarea a').click(function(event){
            var $expandible = $(this).parents('.expandible');
            $expandible.toggleClass('expanded');
            if ( !$expandible.hasClass('expanded')) {
                $(this).text('More');
            } else {
                $(this).text('Less');
            };
            lis.toggle();
            event.preventDefault();
        });
    }
});

});