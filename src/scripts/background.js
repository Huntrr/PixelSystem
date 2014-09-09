var stars = [];
var index = 0;

function canAnimate() {
	return true;
}

//Returns [x, y] for a given element
function getCenter(elem) {
	var pos = elem.offset();
	var center = [pos.left + (elem.width() / 2), pos.top + (elem.hasClass('page-earth') ? 0 : (elem.height() / 2))];
	return center;
}

function getDist(elem1, elem2) {
	var center1 = getCenter(elem1);
	var center2 = getCenter(elem2);
	var offsetWrong = elem1.parent().hasClass("home-background");
	var dx = center1[0] - center2[0] + (offsetWrong ? 0 : elem2.width() / 3);
	var dy = center1[1] - center2[1] + (offsetWrong ? 0 : elem2.width() / 3);

	var dist = Math.sqrt(dx * dx + dy * dy);
	return dist;
}

function getAngle(parent, child) {
	var center1 = getCenter(parent);
	var center2 = getCenter(child);
	var dx = center1[0] - center2[0];
	var dy = center1[1] - center2[1];

	var angle = Math.atan(-dx / dy) + Math.PI / 2;
	return angle;
}

function getPos(center, size, dist, start, time, speed) {
	var relX = dist * Math.cos(start + (time * speed)); //relative x of orbiting body
	var relY = dist * Math.sin(start + (time * speed)); //relative x of orbiting body

	var x = relX + center[0] - size / 2;
	var y = relY + center[1] - size / 2;
	return [x, y];
}

jQuery(document).ready(function($) {
	//Return random coords
	var getLeft = function(width) {
		var val = (Math.floor(Math.random() * 80) + 10);
		return "" + val + "%";
	}
	var getTop = function(height) {
		var val = (Math.floor(Math.random() * 80) + 10);
		return "" + val + "%";
	}

	var getSize = function(norm, variability) {
		var val = norm + (Math.floor(Math.random() * variability));
		return val;
	}


	//Draw the main features, like galaxies and nebulae
	var drawFeatures = function () {
		var features = $('#distant');
		var galaxyWidth = getSize(80, 100);
		features.append("<div class='galaxy' style='width: " + galaxyWidth + "px; height: " + galaxyWidth + "px; top: " + getTop(galaxyWidth) + "; left: " + getLeft(galaxyWidth) + "; '></div>");

		nebulaWidth = getSize(80, 100);
		features.append("<div class='nebula' style='width: " + galaxyWidth + "px; height: " + galaxyWidth + "px; top: " + getTop(galaxyWidth) + "; left: " + getLeft(galaxyWidth) + "; '></div>");
	}

	//Star functions
	var newStar = function() {
		var width = getSize(1, 5);
		var posY = getTop(width);
		var posX = getLeft(width);
		var opacity = Math.floor(Math.random() * 70) + 10;
		opacity = (opacity / 100);

		var val = "<div class='star' style='width: " + width + "px; height: " + width + "px; top: " + posY + "; left: " + posX + "; opacity: " + opacity + ";'></div>";
		return val;
	}

	var genStars = function(num) {
		stars = [];
		for(var i = 0; i < num; i++) {
			stars[i] = newStar();
		}
	}

	var drawStars = function() {
		$("#stars").html(stars.join(""));
	}

	var replStar = function(num) {
		if(stars.length > 0) {
			for(var i = 0; i < num; i++) {
				while(index >= stars.length) {
					index -= stars.length;
				}

				stars[index] = newStar();

				index++;
			}
		}

		drawStars();
	}

	//Don't forget the moon around the earth
	if(canAnimate()) {
		var earth = $('.earth');
		var moon = $('.moon');

		var dist = getDist(earth, moon);
		var start = getAngle(earth, moon);
		var size = moon.width();
		var speed = 0.1;
		var time = 0;

		//getPos(center, size, dist, start, time, speed)
		moon.css('position', 'absolute');
		moon.css('margin', '0');
		moon.detach().appendTo('#background');

		setInterval(function() {
			time++;
			var newPos = getPos(getCenter(earth), size, dist, start, time, speed);
			moon.css('left', newPos[0]);
			moon.css('top', newPos[1]);
		}, 100);

	}
	



	//Runtime
	drawFeatures();

	genStars(75);
	drawStars();

	setInterval(function() { replStar(1); }, 500); //because twinkling stars are cooler

});


//Definition for a planet element
var Planet = function(Elem, Star, Offset, Speed, btn) {
    var elem = Elem;
    var star = Star;

    var dist = getDist(star, elem);
	var start = getAngle(elem, star);
	var size = elem.width();
	var center = getCenter(star);
	var offset = Offset;
	var speed = -1 * Speed;
	var hovering = false;
	var time = Offset;

	var btnPos = btn.offset();
	var elemPos = elem.offset();
	var distFromBtn = [btnPos.left - elemPos.left, btnPos.top - elemPos.top];

	if(speed === 0) {
		var speed = (Math.random() * .05 + 0.02) * -1;
	}
    //init
    elem.css('position', 'absolute');
    elem.css('margin', '0');
    elem.css('padding', '0');

    if(btn !== 0) {
	    btn.hover( function() { 
	    	var windowsize = jQuery(window).width();
	    	if(windowsize > 700) {
	    		hovering = true;
	    	}
	    }, function() {
	    	//on leave
	    	hovering = false;

	    })
	}
    if(elem.parent().hasClass('home-item')) {
    	elem.parent().css('margin-left', size);
	}
    elem.detach().appendTo('#background');
    
    var newPos = getPos(center, size, dist, start, time, speed);
            elem.css('left', newPos[0]);
            elem.css('top', newPos[1]);

    var updater = function(t) {
    	oldPos = [elem.offset().left, elem.offset().top];
    	if(!hovering) {
	    	var newPos = getPos(center, size, dist, start, t, speed);
	        elem.css('left', (Math.abs(newPos[0] - oldPos[0]) > 60) ? (newPos[0] * 0.8 + oldPos[0] * 1.2) / 2 : newPos[0]);
	        elem.css('top', (Math.abs(newPos[1] - oldPos[1]) > 60) ? (newPos[1] * 0.8 + oldPos[1] * 1.2) / 2 : newPos[1]);
	    } else {
	    	time = 0.5;
	    	var newPos = getPos(center, size, dist, start, time, speed);
	        elem.css('left', (Math.abs(newPos[0] - oldPos[0]) > 60) ? (newPos[0] * 0.8 + oldPos[0] * 1.2) / 2 : newPos[0]);
	        elem.css('top', (Math.abs(newPos[1] - oldPos[1]) > 60) ? (newPos[1] * 0.8 + oldPos[1] * 1.2) / 2 : newPos[1]);
	    }
    }

    return {
        update: updater,
        addTime: function(t) {
        	time += t;
        	updater(time);
        },
        updatePos: function() {
        	center = getCenter(star);

        	btnPos = btn.offset();
        	elem.css('left', btnPos.left - distFromBtn[0]);
        	elem.css('top', btnPos.top - distFromBtn[1]);

        	dist = getDist(star, elem);
			start = getAngle(elem, star);

			updater(time);
        }
    };
};