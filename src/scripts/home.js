// definition of planet = function(Elem, Star, Offset, Speed)

var planets = [];
jQuery(document).ready(function($) {
	if(canAnimate()) {
		var star = $('.sun');
		$('.planet').each(function(index) {
			planets.push([new Planet($(this), star, 0, 0.01, $(this).siblings('a')), Math.random() * 2 * Math.PI]);
		});

		var t = 0;
		setInterval(function() {
			t+=0.1;
			for(var i = 0; i < planets.length; i++) {
				if(t === 0.1) {
					planets[i][0].updatePos();
				}

				planets[i][0].update(Math.sin(t + planets[i][1]) * 5);
			}
		}, 100);


		$(window).resize(function() {
			for(var i = 0; i < planets.length; i++) {
				planets[i][0].updatePos();
			}
		});
	}
});