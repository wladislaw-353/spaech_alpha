<div class="modal fade bs-example-modal-lg" id="enter_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content text-center" id="enter_modal">

			<h3 class="wow slideInRight">Spaech</h3>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

			<form action="index.php?action=enter" method="post" id="cart-form">
					<div class="input-group">
						<input type="text" name="loginEnter" id="name" placeholder=" " required oninvalid="thisetCustomValidity('Enter login')" oninput="setCustomValidity('')">
						<label for="name">user name</label>
					</div>
					<div class="input-group">
						<input type="password" name="passwordEnter" id="password" placeholder=" " required oninvalid="thisetCustomValidity('Enter password')" oninput="setCustomValidity('')">
						<label for="password">password</label>
					</div>
					<button name="enter_now" class="gold-btn" id="enter_button">Sign in</button>
			</form>

			<a data-toggle="modal" onclick="self.close()" href="#forgot_password_modal">Forgot password</a>
		</div>
	  </div>
	</div>


	<!-- РЕГИСТРАЦИЯ -->
	<div class="modal fade bs-example-modal-lg" id="registration_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content text-center">

			<h3 class="wow slideInRight">Registration</h3>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

			<form action="myRating.php?action=registration" method="post" id="cart-form">
					<div class="input-group">
						<input type="text" name="login" id="login" placeholder=" " required  oninvalid="this.setCustomValidity('Enter login')" oninput="setCustomValidity('')">
						<label for="name">user name</label>
					</div>

					<div class="input-group">
						<input type="password" name="password" id="my_password" placeholder=" " required oninvalid="this.setCustomValidity('Enter password')" oninput="setCustomValidity('')">
						<label for="password">password</label>
					</div>
					<div class="input-group">
						<input type="password" name="confirm_password" id="confirm_password" placeholder=" " required  oninput="password_confirm()" >
						<label for="confirm">confirm password</label>
					</div>
					<div class="input-group">
						<input type="text" name="number" id="tel" placeholder=" " required oninvalid="this.setCustomValidity('Enter number')" oninput="setCustomValidity('')">
						<label for="tel">phone number</label>
					</div>
					<div class="radio-container">
						<label for="male">male</label>
						<input type="radio" id="male" name="pol" value="Man">
					</div>
					<div class="radio-container">
						<label for="female">female</label>
						<input type="radio" id="female" name="pol" value="Woman">
					</div>
					<button name="order_now" class="gold-btn" id="order_now">Sign up</button>
			</form>
		</div>
	  </div>
	</div>
	<script>
		function password_confirm() {
			var passcode_input = document.querySelector("#confirm_password");
			if (passcode_input.value != document.getElementById('my_password').value) {
				passcode_input.setCustomValidity("Your passwords aren't the same.");
			} else {
				passcode_input.setCustomValidity(""); // be sure to leave this empty!
			}
		}
	</script>

    <!-- ЗАБЫЛ ПАРОЛЬ -->
	<div class="modal fade bs-example-modal-lg" id="forgot_password_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content text-center">

			<h3 class="wow slideInRight">Forgot password</h3>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<br>
			<label>Enter your E-mail address</label>

			<form action="index.php?action=forgot_password" method="post" id="cart-form">
					<div class="input-group">
						<input type="text" name="email" id="phone" placeholder="..." required oninvalid="this.setCustomValidity('Enter E-mail')" oninput="setCustomValidity('')">
						<label for="email">E-mail address</label>
					</div>
					<button name="send_now" class="gold-btn" id="send_button">Send</button>
			</form>
		</div>
	  </div>
	</div>

		<!-- СПАСИБО -->
		<div class="modal fade bs-example-modal-lg" id="thank_you_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  		<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content text-center">

					<h3 class="wow slideInRight">Thank you</h3>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

					<label>for your registration</label>

					<form action="index.php?action=enter" method="post" id="cart-form">
						 <button name="go" class="gold-btn" id="go_button">Go</button>
					</form>
				</div>
			</div>
		</div>