$(document).ready(function(){
	$("a.mobile").click(function(){
		$(".sidebar").slideToggle('fast');
	});
	window.onrezise = function(event) {
		if ($(window).width() > 480) {
			$(".sidebar").show();
		}
	};
	$('#nav li').first().addClass("active").find('ul').show();
	var i=0;
	$('#nav > li > a').click(function(){
		if ($(this).attr('class') != 'active'){
			if (i==0)
			{
				$('#nav li ul').slideup();
				i=i+1;
			}
			else{
				$(this).next().slideToggle();
				i=i+1;
			}
			$('#nav li a').removeClass('active');
			$(rhis).addClass('active');
		}
		else {

		}
	});
});

function openNav() {
	document.getElementById("mysidebar").style.width = 25%;
	document.getElementById("mycontent").style.marginleft = 25%;
	document.getElementById("open").style.display = 25%;
}
function closeNav() {
	document.getElementById("mysidebar").style.width = "0";
	document.getElementById("mycontent").style.marginleft = "0";
	document.getElementById("open").style.display = "block";
}