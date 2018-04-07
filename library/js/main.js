$( document ).ready(function() {

    $(function () {
        $('body').mobileMenu();
    });

    // $('.tabs div').click(function() {
    //     $('.tabs div').removeClass('active');
    //     $(this).addClass('active');
    //     var id = $(this).attr('id').slice(4);
    //     $('.tab-content').fadeOut();
    //     $('.' + id).fadeIn();

    //     if ($('#btn-contacs').hasClass('active')) {
    //         $('.filter-wrapper').fadeIn();
    //         $('.filter-wrapper').css('display', 'flex');
    //         $('.contacts').fadeIn();
    //         $('.contacts').css('display', 'flex');
    //     }
    //     else {
    //         $('.filter-wrapper').hide();
    //         $('.contacts').hide();
    //     }
    // });

    $('.filter span').click(function () {
        $('.filter span').removeClass('active');
        $(this).addClass('active');
    });

    $('.search-btn').click(function () {
        $('.searh-container input').fadeIn();
        $(this).hide();
        $('.close-btn').fadeIn();
    });

    $('.close-btn').click(function () {
        $('.searh-container input').hide();
        $(this).hide();
        $('.search-btn').fadeIn();
    });

    $('[data-miniBtn-open]').click(function () {
        if($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('.link').addClass('hide-btn');
            $(this).html('<span class="material-icons">favorite_border</span>');
        }
        else {
            $(this).addClass('active');
            $('.link').removeClass('hide-btn');
            $(this).html('<span class="material-icons">close</span>');
        }
    });

    $('[data-edit-open]').click(function () {
        $(this).addClass('active');
        $('.more.active ~ .edit-mask').fadeIn();
        $('.more.active ~ .edit-mask').css('display', 'flex');
    });
    $('[data-edit-close]').click(function () {
        $('.more.active ~ .edit-mask').fadeOut();
        $('.more').removeClass('active');
    });

    // табы фото видео   

    // $(".tab-item").not(":first").hide();
    // $(".tab").click(function() {
    // $(".tab").removeClass("active").eq($(this).index()).addClass("active");
    // $(".tab-item").hide().eq($(this).index()).fadeIn()
    // }).eq(0).addClass("active");

	// ÏÎËÅ ÔÀÉË ----------------------------------------------------------
    var inputs = document.querySelectorAll('#upload');
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label	 = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e )
        {
            var fileName = '';
            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                label.querySelector( 'span' ).innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
    });

		$(document).ready(function(){
 $("#upload").click(function(){
	 setInterval(function(){
	 	if($("#upload").val() == "") {
             return false;
           }
        else{
            $('.add-avatar').hide();
			$('.save-avatar').show();
         }
	 },100);
});

 });

});