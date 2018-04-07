

$( document ).ready(function() {

	$('.input-group').click(function() {
		$(this).find('input').focus();
	});


	//alert();
	+function(){
		//alert("!!");
		var timerId = setInterval(function() {
			//alert("!");
				var dialogs_amount = $('.dialogs-list').data('count');

				var dialogs_id = String($('.dialogs-list').data('dialogsid'));

				var container_class = ".messages_container_";//1";//+Math.round(j);
				//var dialog_id=j;
				//alert(container_class);
				$.ajax({
					url: '../library/refresh_messages.php',
					data: {dialogs_id: dialogs_id},
					type: 'GET',
					success: function(res){
						res = jQuery.parseJSON(res);

						for(var i=0; i<dialogs_id.length; i++){
							var container_class_full = container_class+Math.round(Number(dialogs_id[i]));
							$(container_class_full).html(res[Math.round(Number(dialogs_id[i]))]);
							//alert(container_class_full);
						}
						//$(container_class).html(res[1]);
						//alert(res[3]);
						//alert(res[0]);
						//alert('success');
					},
					error: function(){
						//alert('error');
					}
				});
				$.ajax({
					url: '../library/refresh_dialog_titles.php',
					data: {dialogs_id: dialogs_id},
					type: 'GET',
					success: function(res){
						res = jQuery.parseJSON(res);

						for(var i=0; i<dialogs_id.length; i++){
							var title_full = "#short_view_"+Math.round(Number(dialogs_id[i]));
							$(title_full).html(res[Math.round(Number(dialogs_id[i]))]);
							//alert(container_class_full);
						}
						//$(container_class).html(res[1]);
						//alert(res[3]);
						//alert(res[0]);
						//alert('success');
					},
					error: function(){
						//alert('error');
					}
				});
		}, 2000);

	}();

    $(function () {
        $('body').mobileMenu();
	});
	

	// $('.full_view').animate({
	// 	scrollTop: ($('.full_view_footer').offset().top)
	// }, 500);
	// $('#send-messanger').click(function() {
	// 	$('.full_view').animate({
	// 		scrollTop: ($('.full_view_footer').offset().top)
	// 	}, 500);
	// });
	// $document.onkeyup = function (e) {
	// 	e = e || window.event;
	// 	if (e.keyCode === 13) {
	// 		$('#send-messanger').trigger('click');
	// 	}
	// }


	
		
	$('.back_to_dialogs').click(function(e){
		e.preventDefault();
		var dialog_id = "dialog_"+$(this).data('id');
		document.getElementById(dialog_id).style.height = "65px";
		$('.dialog').fadeIn();
		$('.short_view').fadeIn();
		$('.full_view').hide();
	});
	$('.short_view').click(function(){
		$('.dialog').hide();
		this_id = "#dialog_"+$(this).data('id');
		$(this_id).fadeIn();

		$('.short_view').hide();
		$('.full_view').fadeIn();
		document.getElementById("dialog_"+$(this).data('id')).style.height = "500px";
	});
	$('.send_message').click(function(){
		var message_textarea = ".new_message_"+$(this).data('dialogid');
		var new_message = $(message_textarea).val();
		var sender = $(this).data('sender');
		var recipient = $(this).data('recipient');
		var dialog_id = $(this).data('dialogid');

		//alert(typeof dialog_id);
		var container_class = ".messages_container_"+dialog_id;
		//alert(new_message);
		$.ajax({
			url: '../send_message.php',
			data: {message: new_message, sender: sender, recipient: recipient, dialog_id: dialog_id},
			type: 'GET',
			success: function(res){
				//alert();
				$(message_textarea).val("");
				$(container_class).html(res);
			},
			error: function(){
				//alert('error');
			}
		});
	});



	$('#search_people_input').on('input', function(){
		var entered_login = $('#search_people_input').val();
		if(entered_login.trim()==""){ return false; }
		$.ajax({
			url: '../search_contacts.php',
			data: {login: entered_login},
			type: 'GET',
			success: function(res){
				//alert(res);
				$('#search_people_result').fadeIn();
				if(!res == ''){
					$('.search_people_result_body1').html(res);
					$('.search_people_result_body2').hide();
					$('.search_people_result_body1').fadeIn();
				}
				else{
					$('.add_user_form').hide();
					$('.search_people_result_body1').hide();
					$('.search_people_result_body2').fadeIn();
				}
			},
			error: function(){
				//alert('error');
			}
		});
	});

	$('#search_people_button').click(function(e){
		e.preventDefault();
		//alert("!");
		var entered_login = $('#search_people_input').val();
		if(entered_login.trim()==""){ return false; }
		$.ajax({
			url: '../search_contacts.php',
			data: {login: entered_login},
			type: 'GET',
			success: function(res){
				//alert(res);
				$('#search_people_result').fadeIn();
				if(!res == ''){
					$('.search_people_result_body1').html(res);
					$('.search_people_result_body2').hide();
					$('.search_people_result_body1').fadeIn();
				}
				else{
					$('.add_user_form').hide();
					$('.search_people_result_body1').hide();
					$('.search_people_result_body2').fadeIn();
				}
			},
			error: function(){
				//alert('error');
			}
		});
	});

	$('.add_user').click(function(){
		//alert("add!");
		$('.add_user_form').fadeIn();
		var login = $('#search_people_input').val();
		$('#login').val(login);
	});

	$('#new_category_save').click(function(){
		var new_property = $('#new_category_input').val();
		$('#new_category_input_fake').val(new_property);
	});

	$('.newmark').click(function(){
		var id = $(this).data('id');
		if(!id){ return false; }
		var property = $(this).data('property');
		var sender = $('.likes').data('sender');
		var recipient = $('.likes').data('recipient');
		$.ajax({
			url: '../add_new_mark.php',
			data: {id: id,
				   property: property,
				   sender: sender,
				   recipient: recipient
				  },
			type: 'GET',
			success: function(res){
				//alert(res);
				//console.log(res);
				//alert(res);
				//showCart(res);
				//$('#cart .modal-body').html(res);
				//$('#cart').modal();
				//alert('777');
			},
			error: function(){
				alert('error');
			}
		});
	});

    $('.tabs div').click(function() {
        $('.tabs div').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('id').slice(4);
        $('.tab-content').fadeOut();
        $('.' + id).fadeIn();

        if ($('#btn-contacs').hasClass('active')) {
            $('.filter-wrapper').fadeIn();
            $('.filter-wrapper').css('display', 'flex');
            $('.contacts').fadeIn();
            $('.contacts').css('display', 'flex');
        }
        else {
            $('.filter-wrapper').hide();
            $('.contacts').hide();
        }
    });

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

	// ПОЛЕ ФАЙЛ ----------------------------------------------------------
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

	// табы фото видео

    $(".tab-item-3").not(":first").hide();
    $(".tab-3").click(function() {
    $(".tab-3").removeClass("active").eq($(this).index()).addClass("active");
    $(".tab-item-3").hide().eq($(this).index()).fadeIn()
    }).eq(0).addClass("active");

    // Модальное изображение
    $(function() {

    $(".library .item").magnificPopup({
        type : 'image',
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });

    $("img, a").on("dragstart", function(event) { event.preventDefault(); });

    });

});