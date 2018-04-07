<div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-6">
			<form method="POST" role="form">
				<legend>Авторизация</legend>

				<div class="form-group">
					<label for="">Логин</label>
					<input type="text" name="login" class="form-control" id="login" placeholder="Login">
				</div>
				<div class="form-group">
					<label for="">Пароль</label>
					<input type="password" name="password" class="form-control" id="password" placeholder="Password">
				</div>

				<button type="submit" class="btn btn-primary">Отправить</button>
			</form>
			<?php
			if (isset($_POST['login']) && isset($_POST['password']))
			{
				$login = addslashes(htmlspecialchars($_POST['login']));
				$password = md5($_POST['password']);

				$sql = mysqli_query($db, "SELECT id
					FROM administrators
					WHERE login = '$login' AND password = '$password'
					LIMIT 1");
				if (mysqli_num_rows($sql) == 1)
				{
					$row = mysqli_fetch_assoc($sql);
					$_SESSION['user_id'] = $row['id'];
					exit("<meta http-equiv='refresh' content='0; url= {$_SERVER['PHP_SELF']}'>");
				}
				else
				{
					die("<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>!</strong> Ошибка, неверные имя пользователя или пароль {$password}
						</div>");
				}
			}
			?>
		</div>