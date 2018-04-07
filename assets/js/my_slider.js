$(document).ready(function(){

	var autoplay = true;
	var autoDelay = 3000;

	function setSliderPosition(){
		var h = jQuery(window).width() / 3;
		//console.log(h);

		if ($(window).width() < 481) h = jQuery(window).width() / 2;
		if ($(window).width() < 900 && $(window).width() > 480) h = jQuery(window).width() / 2.5;

		jQuery(".my-slider-container").css({"overflow" : "hidden", "padding" : "100px 0"});
		if ($(window).width() < 481)
			jQuery(".my-slider-container").css({"padding" : "10px 0"});
		if ($(window).width() < 900 && $(window).width() > 480)
			jQuery(".my-slider-container").css({"padding" : "50px 0"});
		jQuery(".my-slider").css({"position" : "relative", "height" : h, "width" : "100%",  "margin" : "40px 0"});

		jQuery(".slide-item").css({"position" : "absolute", "height" : h, "opacity" : 0});

		jQuery(".slide-item > img").css({"height" : h});

		jQuery(".slide-item > h1").css({"text-align" : "center"});
		jQuery(".slide-item > h2").css({"text-align" : "center"});
		jQuery(".slide-item > h3").css({"text-align" : "center"});
		jQuery(".slide-item > h4").css({"text-align" : "center"});
		jQuery(".slide-item > p").css({"text-align" : "center"});

		jQuery(".ms-navigation").css({"width" : "145px","position" : "absolute", "left" : "calc(50% - 70px)", "margin" : "-35px auto"});


		for(var i = 1; i < jQuery(".slide-item").children().length + 1; i ++)
		{
			var otstup = (jQuery(window).width() - jQuery(".slide-item:nth-child("+i+")").width()) / 2;

			jQuery(".slide-item:nth-child("+i+")").css({"left" : otstup});

		}
	};

	setSliderPosition();
	

	jQuery(window).resize(function()
	{
		setSliderPosition();
		showFirst();
	});


	var animationIn = ['fadeInLeft',
	'bounceInDown',
	'bounceInLeft',
	'bounceInRight',
	'bounceInUp',
	'fadeIn',
	'fadeInDown',
	'fadeInDownBig',
	'fadeInLeft',
	'fadeInLeftBig',
	'fadeInRight',
	'fadeInRightBig',
	'fadeInUp',
	'fadeInUpBig',
	'flipInX',
	'flipInY',
	'lightSpeedIn',
	'rotateIn',
	'rotateInDownLeft',
	'rotateInDownRight',
	'rotateInUpLeft',
	'rotateInUpRight',
	'rollIn',
	'zoomIn',
	'zoomInDown',
	'zoomInLeft',
	'zoomInRight',
	'zoomInUp',
	'slideInDown',
	'slideInLeft',
	'slideInRight',
	'slideInUp',
	'rollIn'];

	var animationOut = [
	'fadeOutRight',
	'bounceOutDown',
	'bounceOutLeft',
	'bounceOutRight',
	'bounceOutUp',
	'fadeOut',
	'fadeOutDown',
	'fadeOutDownBig',
	'fadeOutLeft',
	'fadeOutLeftBig',
	'fadeOutRight',
	'fadeOutRightBig',
	'fadeOutUp',
	'fadeOutUpBig',
	'flipOutX',
	'flipOutY',
	'lightSpeedOut',
	'rotateOut',
	'rotateOutDownLeft',
	'rotateOutDownRight',
	'rotateOutUpLeft',
	'rotateOutUpRight',
	'rollOut',
	'zoomOut',
	'zoomOutDown',
	'zoomOutLeft',
	'zoomOutRight',
	'zoomOutUp',
	'slideOutDown',
	'slideOutLeft',
	'slideOutRight',
	'slideOutUp',
	'hinge'];

	var increment = 0;
	var incrementIn = 0;
	var incrementOut = 0;


	//if (autoplay === true)
      //setTimeout(function(){nextSlide()}, 3000);

	var locAnimFunIn = function(elem){
		//console.log("IN");
		//console.log(elem);
		
incrementIn ++;
		if(incrementIn > animationIn.length - 1) incrementIn = 0;
		$(elem).css({"opacity" : 1});
		$(elem).removeClass().addClass(animationIn[incrementIn] + ' animated slide-item').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass().addClass("slide-item"); 
      //console.log('In ',incrementIn);
      
      //increment ++;
      if(increment > jQuery(".my-slider").children().length - 1) increment = 0;
      /*if (autoplay === true)
      setTimeout(function(){
      	nextSlide();
      }, 
      autoDelay);
    */
    });
	};

	var locAnimFunOut = function(elem){
		//console.log(" OUT ");
		//console.log(elem);
		
incrementOut ++;
		if(incrementOut > animationOut.length - 1) incrementOut = 0;


		$(elem).removeClass().addClass(animationOut[incrementOut] + ' animated slide-item').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass().addClass("slide-item");

      //console.log('In ',incrementIn);
      
      if(incrementOut > animationOut.length - 1) incrementOut = 0;

      
      if(increment > jQuery(".my-slider").children().length - 1) increment = 0;
      //setTimeout(function(){console.log("locAnimFunOut")}, 500);
    }).css({"opacity" : 0});
	};


	

	var showFirst = function(){

		var currentSlide =  jQuery(".my-slider").children()[increment];
		

			$(currentSlide).css({"opacity" : 1});

		//console.log("SHOWFIRST");
	};
	showFirst();

	var nextSlide = function(){

		if (jQuery(".my-slider").children()[increment])
		{
			locAnimFunOut(jQuery(".my-slider").children()[increment]);
		}



		increment ++;
		if(increment > jQuery(".my-slider").children().length - 1) {increment = 0;}

		locAnimFunIn(jQuery(".my-slider").children()[increment]);

	};

	var previousSlide = function(){

		if (jQuery(".my-slider").children()[increment])
		{
			locAnimFunOut(jQuery(".my-slider").children()[increment]);
		}

		increment --;
		if(increment < 0) increment = jQuery(".my-slider").children().length - 1;

		locAnimFunIn(jQuery(".my-slider").children()[increment]);

	};

	

	var interval = setInterval(function()
		{
			//console.log(autoplay);
			if(autoplay === true)
			{
				

			nextSlide();
			}
		},
			autoDelay);


	var pauseInterval = 0;
	var needAuto = autoplay;
	jQuery(".ms-next").click(function()
	{
		clearTimeout(pauseInterval);

		if (autoplay || needAuto){needAuto = true;}
		autoplay = false;
		nextSlide();
		
		if(needAuto)
		{
			//clearTimeout(pauseInterval);
			pauseInterval = setTimeout(function(){

				autoplay = true;

			}, 3000);
		}
	});
	jQuery(".ms-prev").click(function()
	{
		clearTimeout(pauseInterval);

		if (autoplay || needAuto){needAuto = true;}
		autoplay = false;
		previousSlide();
		if(needAuto)
		{
			//clearTimeout(pauseInterval);
			pauseInterval = setTimeout(function(){

				autoplay = true;

			}, 3000);
		}
	});

	if(autoplay){jQuery(".ms-play").css({"display" : "none"});}
	else{jQuery(".ms-stop").css({"display" : "none"});}

	var playTimer = 0;
	jQuery(".ms-play").click(function(e){

		needAuto = true;

		clearTimeout(playTimer);
		clearTimeout(pauseInterval);

		if(!autoplay){nextSlide();}
		
		playTimer = setTimeout(function(){
			msPlay();
		}, autoDelay);
		
		jQuery(this).css({"display" : "none"});
		jQuery(".ms-stop").css({"display" : "unset"});
	});
	jQuery(".ms-stop").click(function(e){
		needAuto = false;
		
		clearTimeout(pauseInterval);
		clearTimeout(playTimer);
		msPause();
		jQuery(this).css({"display" : "none"});
		jQuery(".ms-play").css({"display" : "unset"});
	});

	var msPause = function(){

		autoplay = false;

	};
	var msPlay = function(){
		autoplay = true;
	};

	jQuery(".my-slider-container").click(function(){
		//console.log("click");
		//console.log(window.pageYOffset);
		//console.log(jQuery(".my-slider").offset().top);
		//console.log(document.documentElement.clientHeight);
		var ch = document.documentElement.clientHeight;
		var h = jQuery(window).width() / 3;
		var otst = (ch - h) / 2;
		var positionscroll = jQuery(".my-slider-container").offset().top - otst + 120;
		jQuery('body,html').animate({scrollTop: positionscroll}, 200);
	});
});
