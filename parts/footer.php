<a href="#header">
	<div id="scrollup">
		<span title="Вверх " class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
	</div>
</a>

<!-- FOOTER                                        FOOTER -->
<footer>

	<div class="container text-center">
	<h3>Наши проекты</h3>
		<div class="row">
			<div class="slick-container">
				<section class="boxers slider1">
					<div>
						<a class="two" rel="group" href="http://selfiech.com/" target="_blank">
							<img src="/img/other/challenge_img_small.jpg" class="img-responsive">
						</a>
					</div>
					<div>
						<a class="two" rel="group" href="http://spaech.com/" >
							<img src="/img/other/spaech_img_small.jpg" class="img-responsive">
						</a>

					</div>
					<div>
						<a class="two" rel="group" href="http://seeach.com/" target="_blank">
							<img src="/img/other/seeach_img_small.jpg" class="img-responsive">
						</a>
					</div>
				</section>
			</div>
		</div>
	</div>
<div class="text-center">
	<img src="../img/mail_icon.png" alt="email_ico">

	<a href="mailto:up@1sil.com"><p>up@1sil.com</p></a>
</div>
<div style="height: 100vh; min-height:840px; width: 100%; background-color: #3d93d0;" class="header-div text-center">
	<img style="margin: auto;" class="img-responsive big-img" src="img/other/1487858058.png" alt="s_last">
	<p  class="text-center">
		<button  type="button" class="btn btn-success-custom flipInYCustom animated" data-toggle="modal" style="animation-iteration-count: infinite" data-target="#FCModalWindow_9912">ХОЧУ БЫТЬ В КУРСЕ ОБНОВЛЕНИЙ <span class="hidden-xs">ПРОЕКТА</span></button>
	</p>
</div>
</footer>
<div class="soc-wrapper" style="">
	<div class="margin-top-50">
	<h3 class="margin-top-50">Получай бонусы с каждой подписки!</h3><br />
		<a target="_blank" href="https://www.youtube.com/">
			<i class="fa fa-2x fa-youtube-play" aria-hidden="true"></i>
		</a>
		<a href="https://www.instagram.com/">
			<i class="fa fa-2x fa-instagram" aria-hidden="true"></i>
		</a>
		<a target="_blank" href="https://vk.com/sseeach">
			<i class="fa fa-2x fa-vk" aria-hidden="true"></i>
		</a>
		<a target="_blank" href="https://www.facebook.com/sseeach/">
			<i class="fa fa-2x fa-facebook" aria-hidden="true"></i>
		</a>
	</div>
</div>
<!-- END FOOTER -->
<script src="<?=ROOT?>assets/js/jquery1.11.3.min.js"></script>

<div class="modal fade" id="FCModalWindow_9912" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Основная часть модального окна -->
			<div class="modal-body">
				<form method="post" class="register-form" id="FCForm_9912" name="form[FCForm_9912]" action="javascript:FCForm_9912(null);" enctype="multipart/form-data"><legend>Хочу быть в курсе обновлений проекта</legend>

				<button style="position:absolute; top:5px; right:5px; border: none;" type="button" class="btn btn-success-custom" data-dismiss="modal">
				<i class="fa fa-times" aria-hidden="true"></i>
				</button>

				<div class="form-group has-feedback">
					<label for="name" class="control-label">Имя</label>
					<input type="text" class="form-control" name="form_request[FCForm_9912][name][value]" id="name">
					<!-- <span class="glyphicon form-control-feedback"></span> -->
				</div>
				<input type="hidden" name="form_request[FCForm_9912][name][title]" value="Имя: ">
				<input type="hidden" name="form_request[FCForm_9912][name][name]" value="name">

				<div class="form-group has-feedback">
					<label for="email" class="control-label">E-mail <small>(Обязательно)</small></label>
					<input type="email" class="form-control" name="form_request[FCForm_9912][email][value]" id="email" required="required">
					<!-- <span class="glyphicon form-control-feedback"></span> -->
				</div>

				<div class="form-group has-feedback">
					<label for="name" class="control-label">Альтернативный вид связи<br /> (скайп, вайбер, ссылка на профиль в соцсети)</label>
					<input type="text" class="form-control" name="form_request[FCForm_9912][alternative][value]" id="alternative">
					<!-- <span class="glyphicon form-control-feedback"></span> -->
				</div>
				<input type="hidden" name="form_request[FCForm_9912][alternative][title]" value="Альтернативный вид связи: ">

				<input type="hidden" name="form_request[FCForm_9912][email][title]" value="E-mail: ">
				<input type="hidden" name="form_request[FCForm_9912][email][name]" value="email">

				<div class="form-group has-feedback">
				<label for="Android" class="control-label">&nbsp Жду официального выхода на:</label>
				<br />
				 <input type="checkbox" name="form_request[FCForm_9912][Android][value]" value="Жду официального выхода на Android" id="Android"><label for="Android">&nbsp Android</label>
				<br />
				 <input type="checkbox" name="form_request[FCForm_9912][IOS][value]" value="Жду официального выхода на IOS" id="IOS"><label for="IOS">&nbsp IOS</label>
				</div>

				<div class="form-group has-feedback">
				 <input type="checkbox" name="form_request[FCForm_9912][want_test][value]" value="Хочу тестировать beta-версию" id="want_test"><label for="want_test">&nbsp Хочу тестировать beta-версию</label>
				</div>
				<div class="form-group has-feedback">
				 <input type="checkbox" name="form_request[FCForm_9912][want_invest][value]" value="Хочу инвестировать в проект" id="want_invest"><label for="want_invest">&nbsp Хочу инвестировать в проект</label>
				</div>
				<div class="form-group has-feedback">
				 <input type="checkbox" name="form_request[FCForm_9912][want_update][value]" value="Хочу быть в курсе обновлений проекта" id="want_update"><label for="want_update">&nbsp Хочу быть в курсе обновлений проекта</label>
				</div>
				<!-- <input type="hidden" name="form_request[FCForm_9912][question][title]" value="Услуга"> -->
				<input type="hidden" name="form_request[FCForm_9912][question][name]" value="question">
				<input type="text" name="form_request[FCForm_9912][antibot]" id="antibot" style="display: none;">
				<div class="form-group">
					<button type="submit" id="FCSubmitButton_9912" class="btn btn-success-custom">Отправить</button>
				</div>
				<input type="hidden" name="form_request[form_id]" value="FCForm_9912">
				<input type="hidden" name="form_request[table_name]" value="customers">
				<input type="hidden" name="form_request[link_from]" value="/pages/uslugi">
				<input type="hidden" name="form_request[type_from]" value="pages">
				<input type="hidden" name="form_request[alias]" value="uslugi">
			</form><div class="FCForm_9912"></div>		<script>
			$(function() {
		    //при нажатии на кнопку с id="$this->submit_id"
		    $('#FCSubmitButton_9912').click(function() {
		      //переменная formValid
		      var formValid = true;
		      //перебрать все элементы управления input & textarea
		      $('#FCForm_9912 input, #FCForm_9912 textarea, #FCForm_9912 select').each(function() {
		      //найти предков, которые имеют класс .form-group, для установления success/error
		      var formGroup = $(this).parents('.form-group');
		      //найти glyphicon, который предназначен для показа иконки успеха или ошибки
		      var glyphicon = formGroup.find('.form-control-feedback');
		      //для валидации данных используем HTML5 функцию checkValidity
		      if (this.checkValidity()) {
		        //добавить к formGroup класс .has-success, удалить has-error
		        formGroup.addClass('has-success').removeClass('has-error');
		        //добавить к glyphicon класс glyphicon-ok, удалить glyphicon-remove
		        glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
		    } else {
		        //добавить к formGroup класс .has-error, удалить .has-success
		        formGroup.addClass('has-error').removeClass('has-success');
		        //добавить к glyphicon класс glyphicon-remove, удалить glyphicon-ok
		        glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
		        //отметить форму как невалидную
		        formValid = false;
		    }
		});
		    //если форма валидна, то
		    if (formValid) {
		      //сркыть модальное окно
		      //$('#myModal').modal('hide');
		      //отобразить сообщение об успехе
		      $('#success-alert').removeClass('hidden');
		  }
		});
		});
	</script>
</div>
<!-- Нижняя часть модального окна -->
<!-- <div class="modal-footer">
	<input id="FCSubmitButton_9912" type="hidden" class="btn btn-primary" data-target="#FCModalWindow_9912">
	<button type="button" class="btn btn-success-custom" data-dismiss="modal">Закрыть</button>
</div> -->
</div>
</div>
</div>

<script type="text/javascript">
	function FCForm_9912() {
		var msg;
		msg = $('#FCForm_9912').serializeArray();
		console.log(msg);
		$.ajax({
			type: 'POST',
			url: "/ajax/mailResult.php",
			data: msg,
			success: function(data) {
				$('.FCForm_9912').html(data);
			},
			error:  function(xhr, str){
				alert('Возникла ошибка: ' + xhr.responseCode);
			}
		});

	}
</script>

<script src="<?=ROOT?>assets/js/bootstrap.min.js"></script>
<script src="<?=ROOT?>assets/js/owl.carousel.js"></script>
<script src="<?=ROOT?>assets/js/jgallery.min.js?v=1.5.0"></script>

<script src="<?=ROOT?>assets/wow_animate/wow.min.js"></script>
<script src="<?=ROOT?>assets/js/numscroller.js"></script>
<!-- selfmadekarusel -->
<script src="<?=ROOT?>assets/js/my_slider.js"></script>
<!-- Prettyphoto Lightbox -->

<script src="<?=ROOT?>assets/js/jquery.prettyPhoto.js"></script>
<!-- <script src="<?=ROOT?>assets/js/jquery.isotope.js"></script> -->
<!-- <script src="<?=ROOT?>assets/js/lightbox.js"></script> -->
<script src="<?=ROOT?>assets/js/common.js"></script>

<script src="<?=ROOT?>assets/js/slick.js"></script>
<script src="<?=ROOT?>assets/js/coockie.js"></script>

<!-- <script src="<?=ROOT?>assets/js/main.js"></script> -->

<script>
	new WOW(
	{
		offset:       50,          // default
		mobile:       true,       // default
		live:         true        // default
	}
	).init();
</script>
<script>
	$(".boxers").slick({
		dots: true,
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 3,
		// centerMode: true,
		responsive: [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
				    // You can unslick at a given breakpoint now by adding:
				    // settings: "unslick"
				    // instead of a settings object
				    ]
	});
</script>


<script>
	jQuery( document ).ready(function() {
		jQuery('#scrollup').mouseover( function(){
			jQuery( this ).animate({opacity: 0.65},100);
		}).mouseout( function(){
			jQuery( this ).animate({opacity: 1},100);
		});

		jQuery(window).scroll(function(){
			if ( jQuery(document).scrollTop() > 500 ) {
				jQuery('#scrollup').fadeIn('fadeIn');
			} else {
				jQuery('#scrollup').fadeOut('fadeIn');
			}
		});
	});
</script>

<script>
	$(document).ready(function(){
		$('a[href*=#]').bind("click", function(e){
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top
			}, 1000);
			e.preventDefault();
		});
		return false;
	});
</script>
<script>
	$(function(){
		$(window).scroll(function() {
			if($(this).scrollTop() >= 480) {
				$('.main-menu').addClass('stickytop')
			}
			else{
				$('.main-menu').removeClass('stickytop');
			}
		});
	});
</script>
</body>
</html>