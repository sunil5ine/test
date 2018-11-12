
// droup down

$(document).ready(function(){
  $('.close-tost').click(function(){
      $('#snackbar').fadeOut(300);              
     });
     setTimeout(function(){
       $('#snackbar').addClass('show');
     }, 500);

     
	$('.dropdown-trigger').dropdown();
  $('.tooltipped').tooltip();
	// nav slider
	$('.sidenav').sidenav();

// droup down notification

    $(". hide-ref").click(function(){
      $("#dropdown3").css({'display':'block'});
    });
    $(". hide-ref1").click(function(){
      $("#dropdown2").css({'display':'block'});
    });
     $(". hide-ref2").click(function(){
      $("#dropdown4").css({'display':'block'});
    });

  

});


