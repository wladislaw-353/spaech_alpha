"use strict";
$(document).ready(function() {
    console.log("HELLO");

    //ASIDE (#sidebar) sticy on footer
    var topNow = $("#sidebar").css("top");
    var topNowNumber = Number(topNow.slice(0, topNow.length-2));
    $(window).scroll(function(){

        if (window.innerWidth <= 992){return;}
        if (topNowNumber == 0){topNowNumber = 110}
        $("#sidebar").css({"top": topNowNumber+"px"});
    
        if (window.pageYOffset + $(window).height() > $(document).height() - $("footer").height())
        {

            var difer = Math.floor(Math.abs((window.pageYOffset + $(window).height()) - ($(document).height() - $("footer").height())));
            var topPx = topNowNumber - difer;
            $("#sidebar").css({"top": topPx+"px"});
        }
        else $("#sidebar").css({"top": topNowNumber+"px"});
    });
//END ASIDE sticy on footer

    

    //aside toggle image onHover
    $(".block-aside1").hover(function(){
    $(".block-aside1 img").addClass("animated zoomIn");
    }, function(){
     
    $(".block-aside1 img").removeClass("animated zoomIn");
    });
    $(".block-aside2").hover(function(){
    $(".block-aside2 img").addClass("animated zoomIn");
    }, function(){
     
    $(".block-aside2 img").removeClass("animated zoomIn");
    });
    $(".block-aside3").hover(function(){
    $(".block-aside3 img").addClass("animated zoomIn");
    }, function(){
     
    $(".block-aside3 img").removeClass("animated zoomIn");
    });
    $(".block-aside4").hover(function(){
    $(".block-aside4 img").addClass("animated zoomIn");
    }, function(){
     
    $(".block-aside4 img").removeClass("animated zoomIn");
    });
    /* MAIN.CSS at 151 line

    $(".block-aside1").hover(function(){
        //console.log("asd");
        $(".white_1").css({"visibility":"hidden"});
        $(".block-aside1").css({"transform":"scale(1.05, 1.05)"});
    }, function(){
        $(".white_1").css({"visibility":"visible"});
        $(".block-aside1").css({"transform":"scale(1, 1)"});
    });
    $(".block-aside2").hover(function(){
        //console.log("asd");
        $(".white_2").css({"visibility":"hidden"});
        $(".block-aside2").css({"transform":"scale(1.2, 1.2)"});
    }, function(){
        $(".white_2").css({"visibility":"visible"});
        $(".block-aside2").css({"transform":"scale(1, 1)"});
    });
    $(".block-aside3").hover(function(){
        //console.log("asd");
        $(".white_3").css({"visibility":"hidden"});
        $(".block-aside3").css({"transform":"scale(1.2, 1.2)", "overflow":"visible"});
        $(".block-aside3 img").css({"width":"60px"});
        $(".block-aside3 span").css({"top":"70px", "left":"60px"});
    }, function(){
        $(".white_3").css({"visibility":"visible"});
        $(".block-aside3").css({"transform":"scale(1, 1)"});
        $(".block-aside3 img").css({"width":"100px", "left":"20px"});
        $(".block-aside3 span").css({"top":"94px", "left":"80px"});
    });
    $(".block-aside4").hover(function(){
        //console.log("asd");
        $(".white_4").css({"visibility":"hidden"});
        $(".block-aside4").css({"transform":"scale(1.2, 1.2)"});
    }, function(){
        $(".white_4").css({"visibility":"visible"});
        $(".block-aside4").css({"transform":"scale(1, 1)"});
    });
    */
    //END of aside toggle image

    


    //pagination item active toggle
    $("a.pager_item").click(function(e){
        $("a.pager_item").removeClass("active_page");
        $(this).addClass("active_page");
    });
    //END pagination item active toggle


//toggle button
    var menuListLi = $(".main_menu ul .li-menu");
    var menuList = $(".main_menu ul");
    var togleOn = false;

    $(".top-navbar-toggle").click(function(){
        //console.log("CLICK");


        if(togleOn == false)
        {

            menuListLi.addClass("mobile-ul-li-visible");
            menuListLi.removeClass("mobile-ul-li-hidden");
            menuListLi.removeClass("fadeOutUp animated");
            menuListLi.addClass("fadeInDown animated");


            togleOn = true;
            console.log(togleOn);
        }
        else
        {

            menuListLi.removeClass("fadeInDown animated");
            menuListLi.addClass("fadeOutUp animated").one('animationend webkitAnimationEnd oAnimationEnd', function(){
                if (togleOn == true) {return;}

            menuListLi.removeClass("mobile-ul-li-visible");
            menuListLi.addClass("mobile-ul-li-hidden");
            console.log("jhsjhdf");

            });
            togleOn = false;
            console.log(togleOn);
        }
    });
    var  resiseFunc = function(){
            console.log(window.innerWidth);
            if (window.innerWidth < 993){
                menuListLi.addClass("mobile-ul-li-hidden");
            }
            else{
                menuListLi.removeClass("mobile-ul-li-hidden mobile-ul-li-visible fadeOutUp fadeInDown animated");
            }
            if (window.innerWidth < 768) {
            }
            
        }


        //ON RESIZE FUNCTION
    //window.onresize  = resiseFunc;

    resiseFunc();
    
    //end of toggle button



     //UPPER BIG OWL CAROUSEL 
    $(".next").click(function(){
    owlBig.trigger('owl.next');
    });
    $(".prev").click(function(){
    owlBig.trigger('owl.prev');
    });


    var owlBig = $("#owl-carousel-upbig");
    owlBig.owlCarousel({
      items : 1,
    itemsCustom : false,
    itemsDesktop : [1199,1],
    itemsDesktopSmall : [980,1],
    itemsTablet: [768,1],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : false,
    itemsScaleUp : true,
 
    //Basic Speeds
    slideSpeed : 200,
    paginationSpeed : 800,
    rewindSpeed : 1000,
 
    //Autoplay
    autoPlay : 2000,
    stopOnHover : false,
 
    // Navigation
    navigation : false,
    navigationText : ["prev","next"],
    rewindNav : true,
    scrollPerPage : false,
 
    //Pagination
    pagination : true,
    paginationNumbers: false,
 
    // Responsive 
    responsive: true,
    responsiveRefreshRate : 200,
    responsiveBaseWidth: window,
 
    // CSS Styles
    baseClass : "owl-carousel",
    theme : "owl-theme",
 
    //Lazy load
    lazyLoad : false,
    lazyFollow : true,
    lazyEffect : "fade",
 
    //Auto height
    autoHeight : true,
 
    //JSON 
    jsonPath : false, 
    jsonSuccess : false,
 
    //Mouse Events
    dragBeforeAnimFinish : true,
    mouseDrag : true,
    touchDrag : true,
 
    //Transitions
    transitionStyle : false,
 
    // Other
    addClassActive : false,
 
    //Callbacks
    beforeUpdate : false,
    afterUpdate : false,
    beforeInit: false, 
    afterInit: false, 
    beforeMove: false, 
    afterMove: false,
    afterAction: false,
    startDragging : false,
    afterLazyLoad : false

   });

    //position TOP of prev and next btn CENTRED BY VERTICAL
    var setPositionOfOwlBtn = function(){
        var btnsOwl = $(".owl-upbig .next ,.owl-upbig .prev");
        var helfOfBtnHeight = btnsOwl.height() / 2;
        //console.log(helfOfBtnHeight);
        var heightOwlImg = $(".owl-item img").height();
        var positionOfBtn =  -heightOwlImg / 2 - helfOfBtnHeight;
        btnsOwl.css({"top":""+positionOfBtn+"px"});
    }
    setPositionOfOwlBtn();
     //ON RESIZE FUNCTION setPositionOfOwlBtn
    //window.onresize  = setPositionOfOwlBtn;
    // //END UPPER BIG OWL CAROUSEL


    //down carousel

    $(".down-next").click(function(){
    owlDown.trigger('owl.next');
    });
    $(".down-prev").click(function(){
    owlDown.trigger('owl.prev');
    });

    var owlDown = $("#owl-carousel-down");
    owlDown.owlCarousel({
    items : 3,
    itemsCustom : false,
    itemsDesktop : [1199,1],
    itemsDesktopSmall : [980,1],
    itemsTablet: [768,1],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : false,
    itemsScaleUp : true,
    autoPlay : 2000,

    responsive: true,
    responsiveRefreshRate : 200,
    });


    //feedBack OWL

    $(".down-next").click(function(){
    owlDown.trigger('owl.next');
    });
    $(".down-prev").click(function(){
    owlDown.trigger('owl.prev');
    });

    var feedbackOwl = $("#owl-carousel-feedback");
    feedbackOwl.owlCarousel({
    items : 1,
    itemsCustom : false,
    itemsDesktop : [1199,1],
    itemsDesktopSmall : [980,1],
    itemsTablet: [768,1],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : false,
    itemsScaleUp : true,
    autoPlay : 2000,

    responsive: true,
    responsiveRefreshRate : 200,
    });

//onRsize Functions
    window.onresize = function(){
        setPositionOfOwlBtn();
        resiseFunc();
    }

});