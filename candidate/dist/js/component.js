$(document).ready(function(){
/*conponent*/
    $('.sidenav').sidenav();
	$('select').formSelect();
	$('.parallax').parallax();
	$('.collapsible').collapsible();
	$('.slider').slider();
	$('ul.tabs').tabs();
	$('.scrollspy').scrollSpy();
	$('.datepicker').datepicker();
	$('.modal').modal({
		dismissible: true,
		startingTop: '20%', 
      	out_duration: 200,
      	preventScrolling: false
	});
	$('.chips').chips();



/*slide nav*/
if ($(window).width() < 993 ) 
{
	$('html').click(function() {
	  $('.dashboard-sildebar').hide(200,function(){$(".arrow-up, .arrow-down").toggle(0);});
	});
	$('.dashboard-button').click(function(event){
		 event.stopPropagation();
		$('.dashboard-sildebar').toggle(200);
		$(".arrow-up, .arrow-down").toggle(0);
	});
	$('.dashboard-sildebar').click(function(event) {
		event.preventDefault();
		event.stopPropagation();
	});
}
  });