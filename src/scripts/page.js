// definition of planet = function(Elem, Star, Offset, Speed)

var planets = [];
jQuery(document).ready(function($) {
	if(canAnimate()) {
		var star = $('#background');
		$('.planet').each(function(index) {
			planets.push(new Planet($(this), star, Math.random() * 1000, 0, $(this).siblings('a')));
		});

		setInterval(function() {
			for(var i = 0; i < planets.length; i++) {
				planets[i].addTime(1);
			}
		}, 100);
	}
});