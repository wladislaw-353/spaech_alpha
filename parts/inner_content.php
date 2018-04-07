<?
switch($page_title){
	case 'account': //drawBlock(100); ?>
		<article>
                <div class="holder">
					<div class="accountAvatar-wrapper">
						<img src="img/<?=$currentUser->avatar?>" class="account_avatar">
						<form action="account.php?action=change_avatar" method="post" id="ava-form" enctype="multipart/form-data" class="hidden-xs">
							<div class="add-avatar">
								<input type="file" class="hide inputfile" id="upload" name="file_name" data-multiple-caption="{count} files selected" multiple />
								<span class="material-icons input" for="upload">add_a_photo</span>
							</div>
							<button type="submit" class="add-avatar save-avatar"><span>SAVE</span></button>
						</form>
					</div>
					<form action="account.php?action=change_info" method="post" id="cart-form" enctype="multipart/form-data" class="hidden-xs">
						<div class="input-group">
							<input type="text" id="login" placeholder=" " required name="loginChange" value="<?=$currentUser->login?>">
							<label for="name">user name</label>
						</div>
						<div class="input-group">
							<input type="text" id="tel" placeholder=" " required name="numberChange" value="<?=$currentUser->number?>">
							<label for="tel">phone number</label>
						</div>
						<div>
							<div class="radio-container">
								<label for="male">male</label>
								<input type="radio" id="male" name="pol" value="Man">
							</div>
							<div class="radio-container">
								<label for="female">female</label>
								<input type="radio" id="female" name="pol" value="Woman">
							</div>
						</div>
						<button style="margin-bottom: 30px">Save info</button>
					</form>

                </div>
            </article>
		<?break;

	case 'user':?>
		<article>
            <div class="holder">
                <div class="card big-card">
                    <div class="avatar">
                        <img src="img/<?=$target_user['foto']?>" alt="">
                    </div>
                    <div class="card-footer">
                        <span class="name"><?=$target_user['login']?></span>
                        <div class="likes">
                            <span><?if($target_user['rating']!="none") echo $target_user['rating']['total']?></span>
                            <span class="material-icons">favorite</span>
                        </div>
                    </div>
                </div>

                <div class="tab-content categories">
					<br><br>
					<? if($currentUser->getRating($user_id)=="none"){?>
						 <span class="error">User have no marks yet</span><br><br><br><br>
					<?}
				 	else{
						$marks = $currentUser->getRating($user_id);
						foreach($marks as $key=>$category){
							if($key!="total"){?>

							    <div class="item">
									<div class="flex-container">
										<span class="title"><?=$key?></span>
										<div class="likes">
											<?$count = floor($category['avarage']);
											for($i=0; $i<$count; $i++){?>
												<span class="material-icons">favorite</span>
											<?}
											for($j=0; $j<(5-$count); $j++){?>
											<span class="material-icons">favorite_border</span>
											<?}?>
										</div>
										<span><?=round($category['avarage'], 1)?></span>
									</div>
									<div class="progress">
										<div class="blue" style="width:<?=round($category['avarage'], 1)*20?>%"></div>
									</div>
								</div>

							<?}
						}
					}?>
                   <br>
                    <div class="user-gallery">
                        <div class="add" data-miniBtn-open>
                            <span class="material-icons">favorite_border</span>
                        </div>
                        <a href="tabs.php"><div class="link hide-btn" id="foto-gold-btn">
                            <span class="material-icons">photo</span>
						</div></a>
                        <a href="addcategory_main.php?id=<?=$user_id?>"><div class="link hide-btn" id="like-gold-btn">
                            <span class="material-icons">favorite_border</span>
                        </div></a>
                        <a href="myRating.php?action=add_contact&id=<?=$user_id?>"><div class="link hide-btn" id="video-gold-btn">
                            <span class="material-icons">person_add</span>
						</div></a>
						
						<a href="messanger.php?id=<?=$dialog_id?>"><div class="link hide-btn" id="note-gold-btn">
                            <span class="material-icons">sms</span>
						</div></a>
                        <!--<div class="link hide-btn" id="note-gold-btn">
                            <span class="material-icons">sms</span>
                        </div>-->
                    </div>

                </div>
            </div>
        </article>
		<?break;
	case 'myRating':?>
		<article>
            <div class="filter-wrapper">
                <span class="title">Contacts</span>
                <div class="filter">
                    <span class="active"><a href="myRating.php?action=contacts&case=all">All</a></span>
					<span class=""><a href="myRating.php?action=contacts&case=Man">Boys</a></span>
					<span class=""><a href="myRating.php?action=contacts&case=Woman">Girls</a></span>
                </div>
            </div>
            <div class="holder">
                <div class="tab-content contacts">
					<?
					$contacts = $currentUser->getContacts();
					if($contacts==false){?>
						<br><br><span class="error" align="center">You have no contacts</span><br><br><br><br>
					<?}
					else{
						foreach($contacts as $id){
							$id = (integer)$id;
							$user = $currentUser->getUserById($id);?>
							<a href="user.php?id=<?=$id?>">
								<div class="card">
									<div class="avatar">
										<img src="img/<?=$user['foto']?>" alt="">
									</div>
									<div class="card-footer">
										<span class="name"><?=$user['login']?></span>
										<div class="likes">
											<span><?if($user['rating']!="none") echo $user['rating']['total']?></span>
											<span class="material-icons">favorite</span>
										</div>
									</div>
								</div>
							</a>
						<?}
					}?>
					<a href="add_contact.php">
						<div class="add">
							<span class="material-icons">person_add</span>
						</div>
					</a>

                </div>

                <div class="tab-content categories">
					<?
					$currentUser = unserialize($_SESSION['user']);
				 	if($currentUser->getRating($currentUser->id)=="none"){?>
					<br><span class="error">You have not marks</span><br><br><br><br>
					<?}
				 	else{
						$marks = $currentUser->getRating($currentUser->id);
						foreach($marks as $key=>$category){
							if($key!="total"){?>
							  <div class="item">
								<div class="flex-container">
									<span class="title"><?=$key?></span>
									<div class="likes">
										<?$count = floor($category['avarage']);
										for($i=0; $i<$count; $i++){?>
											<span class="material-icons">favorite</span>
										<?}
										for($j=0; $j<(5-$count); $j++){?>
										<span class="material-icons">favorite_border</span>
										<?}?>
									</div>
									<span><?=round($category['avarage'], 1)?></span>
								</div>
								<div class="progress">
									<div class="blue" style="width:<?=round($category['avarage'], 1)*20?>%"></div>
								</div>
							</div>
				 		  <?}
						}
					}
					?>

                </div>
            </div>
        </article>
		<? break;?>
	<? case 'Add Category':?>
		<article>
            <div class="holder">
                <form action="addcategory_main.php?id=<?=$user_id?>&action=add_category" method="POST">
                 <div class="addinput input-group">
                     <input type="text" name="new_category" id="new_category_input" placeholder="Enter the name of the category">
                 </div>
               </form>

            </div>
        </article>
		<? break; ?>
	<? case 'Categories':?>
		<article>
            <div class="holder">

                <div class="add">
                     <a href="editcategory.php?id=<?=$user_id?>"><span class="material-icons">add</span></a>
                </div>

				<div class="tab-content categories">
					<br><br>
					<? //if($currentUser->getRating($user_id)=="none"){?>
						 <!--<span class="error">User have no marks yet</span><br><br><br><br>-->
					<?//}
				 	//else{
						$marks = $currentUser->getRatingFull($user_id);
		//print_r($marks);
						foreach($marks as $key=>$category){
							if($key!="total"){?>

							    <div class="item">
									<div class="flex-container">
										<span class="title"><?=$key?></span>
										<div class="likes" data-sender="<?=$currentUser->id;?>" data-recipient="<?=$user_id?>">
											<?
											if($category['avarage']==0){?>
												<span class="material-icons newmark" data-id="1" data-property="<?=$key;?>">favorite_border</span>
												<span class="material-icons newmark" data-id="2" data-property="<?=$key;?>">favorite_border</span>
												<span class="material-icons newmark" data-id="3" data-property="<?=$key;?>">favorite_border</span>
												<span class="material-icons newmark" data-id="4" data-property="<?=$key;?>">favorite_border</span>
												<span class="material-icons newmark" data-id="5" data-property="<?=$key;?>">favorite_border</span>
											<?} else{ ?>
												<?$count = floor($category['avarage']);
												for($i=0; $i<$count; $i++){?>
													<span class="material-icons">favorite</span>
												<?}
												for($j=0; $j<(5-$count); $j++){?>
												<span class="material-icons">favorite_border</span>
												<?}
											}?>
										</div>
										<span class="calendar-icon material-icons">date_range</span>
									</div>
									<div class="progress">
										<div class="blue" style="width:<?=round($category['avarage'], 1)*20?>%"></div>
									</div>
								</div>

							<?}
						}
					//}?>
				</div>
            </div>
        </article>
		<? break; ?>
	<?default:
		break;
}
?>