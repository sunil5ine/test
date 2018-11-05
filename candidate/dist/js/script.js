    $(document).ready(function(){
    	/* drang droup */
        $('.dropzone-input').change(function(e){
            var fileName = e.target.files[0].name;
            $('#filename').html('<h5>'+fileName+'</h5>');
        });

        /*  filerbox  */

        $('.filter-box').find('.filter-title').click(function(){
        	$(this).find('.dowicon, .upicon').toggle();
        	$(this).next('.filter-content').slideToggle();
        });

        $('.collapsible-header').click(function(){
            $(this).find('i').toggleClass('rotet');
        });

        $('.close').click(function(){
            $('.alert').fadeOut(300);
        });

       
    });

/*range */
 var slider = document.getElementById('test-slider');

noUiSlider.create(slider, {
	start: [20, 80],
	connect: true,
	step: 1,
	orientation: 'horizontal',
	range: {
		'min': 0,
		'max': 100
	},
	behaviour: 'tap-drag',
	tooltips: true,
});

 