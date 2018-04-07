<?
function drowUserBlock($user){?>
	<div class="user-block"><a href="#tab-user<?echo $user['id'];?>" data-toggle="tab">
		<img src="img/<? echo $user['foto']; ?>" alt="">
		<div class="row user-block-footer">
			<div class="col-lg-7">
				<h2 align="left"><? echo $user['login']; ?></h2>
			</div>
			<div class="col-lg-5">
				<h2><? echo $user['rating'];?></h2>
			</div>
		</div></a>
	</div>
<?}

function drowUserFullBlock($user){?>
	<a align="center" href="#tab1" data-toggle="tab"><p align="center" class="users_back">Back</p></a>
	<div class="user-block-full">
		<img src="img/<? echo $user['foto']; ?>" alt="">
		<div class="row user-block-footer">
			<div class="col-lg-7">
				<h2 align="left"><? echo $user['login']; ?></h2>
			</div>
			<div class="col-lg-5">
				<h2><? echo  $user['rating'];?></h2>
			</div>
		</div>
	</div>

<?}?>