$.fn.mobileMenu = function(options) {

    var param = $.extend({
        'overlayAnimationSpeed': 200,
        'animationSpeed': 300,
        'timingFunction': 'ease-out',
        'swipeDistance': 400,
        'mobileSwipeDistance': 200
    }, options);

    var $selector = $('.mobile-menu');

    var startPosition = 0;
    var endPosition = 0;

    // Init
    $selector.css('transition', 'all ' + param.overlayAnimationSpeed + 'ms linear');
    $selector.find('.menu-bar').css('transition', 'all ' + param.animationSpeed + 'ms ' + param.timingFunction);
    $selector.find('.dark').show(400);

    // Controllers
    function mobileMenuController(action) {
        if (action == 'show') {
            $selector.addClass('active');
            $selector.find('.menu-bar').addClass('active');
        } else if (action == 'hide') {
            $selector.removeClass('active');
            $selector.find('.menu-bar').removeClass('active');
        }
    }

    // Actions
    $('[data-mm-open]').click(function() {
        mobileMenuController('show');
    });
    $('[data-mm-close]').click(function() {
        mobileMenuController('hide');
    });
    $(window).mousedown(function(e) {
        startPosition = e.pageX;
    });
    $(window).mouseup(function(e) {
        endPosition = e.pageX;
        var distance = endPosition - startPosition;
        if (Math.abs(distance) >= param.swipeDistance) {
            if (distance > 0) {
                mobileMenuController('show');
            } else {
                mobileMenuController('hide');
            }
        }
    });
    window.addEventListener('touchstart', function(e) {
        startPosition = e.touches[0].pageX;
    });
    window.addEventListener('touchmove', function(e) {
        var endPosition = e.touches[0].pageX;
        var distance = endPosition - startPosition;
        if (Math.abs(distance) >= param.mobileSwipeDistance) {
            if (distance > 0) {
                mobileMenuController('show');
            } else {
                mobileMenuController('hide');
            }
        }
    });
}
