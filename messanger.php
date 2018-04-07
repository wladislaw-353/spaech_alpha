<?
session_start();
if(!isset($_SESSION['user'])){
	session_destroy();
	header('Location: /index.php');
}
include 'config.php';
include 'library/main.php';
include 'library/blocks.php';
$currentUser = unserialize($_SESSION['user']);
$page_title = "Messanger";
$back_url = "messanger.php";
include 'parts/messanger_header.php';
$messanger_bg = "background:#fff";
?>

<style>
	html, body {
		overflow: hidden;
    height: 100vh;
	}
</style>

<? include "library/dialogs_builder.php"; ?>

<?if(isset($_GET['id'])){?>
	<button id="open_dialog" data-dialogid="<?=$_GET['id']?>" style="display:none;"></button>
<? } ?>


<article>
	<div class="container text-center messanger">
		<div class="dialog-header">
			<!-- <h1>Dialogs</h1> -->
		</div>
		<div class="dialogs-list" data-count="<?=count($dialogs)?>" data-dialogsid="<?=$_SESSION['dialogs_id'];?>">
			<?
			foreach($dialogs as $dialog){?>
				<div class="container dialog" id="<?="dialog_".$dialog['id'];?>" data-id="<?=$dialog['id'];?>">
						<div class="short_view" id="short_view_<?=$dialog['id'];?>" data-id="<?=$dialog['id'];?>" data-friend="<?=$dialog['friend'];?>">
							<img class="short_view_avatar" src="img/<?=$dialog['friend_avatar']?>">
							<span class="title_friend"><?=$dialog['friend'];?></span>
							<span class="title_message"><?=$dialog['messages'][count($dialog['messages'])-1]['text'];?></span>
							<?//=$dialog['messages'][count($dialog['messages'])-1]['text'];?></span>
							<!--<h3 class="" id="<?//=$dialog['id'];?>" data-id="<?//=$dialog['id'];?>">
								<?//=$dialog['friend']." | ".$dialog['messages'][count($dialog['messages'])-1]['text'];?>
							</h3>-->
						</div>
						<div class="full_view" style="<?php echo $messanger_bg ?>">
							<div class="messages_container messages_container_<?=$dialog['id']?>">
								<? foreach($dialog['messages'] as $message){?>
									<? if($message['type']=="image"){ ?>
										<? if($message['sender']==$currentUser->login){ ?>
											<p class="message_item1"><span class="time_sms"><?=$message['time']?></span><img src="messanger/img/<?=$message['text']?>"><? if($message['is_read']){ ?><span class="material-icons">done</span><? } ?></p>
										<? } ?>
										<? if($message['sender']!=$currentUser->login){ ?>
											<p class="message_item2"><span class="time_sms"><?=$message['time']?></span><img src="messanger/img/<?=$message['text']?>"><? if($message['is_read']){ ?><span class="material-icons">done</span><? } ?></p>
										<? } ?>
									<? } ?>
									<? if($message['type']=="text"){ ?>
										<? if($message['sender']==$currentUser->login){ ?>
											<p class="message_item1"><span class="time_sms"><?=$message['time']?></span><span class="message_sms"><?=$message['text']?></span><? if($message['is_read']){ ?><span class="material-icons">done</span><? } ?></p>
										<? } ?>
										<? if($message['sender']!=$currentUser->login){ ?>
											<p class="message_item2"><span class="time_sms"><?=$message['time']?></span><span class="message_sms"><?=$message['text']?></span><? if($message['is_read']){ ?><span class="material-icons">done</span><? } ?></p>
										<? } ?>
									<? } ?>
								<? }?>
							</div>
							<div class="full_view_footer">
							<div class="flex-container">
								<img src="img/<?=unserialize($_SESSION['user'])->avatar?>" alt="">
								<textarea class="messanger_textarea new_message_<?=$dialog['id']?>" placeholder="Write a message.." data-id="<?=$dialog['id']?>"></textarea>
								<!--<textarea id="messanger_textarea" placeholder="Write a message.." data-id="<?//=$dialog['id']?>" class="new_message_<?//=$dialog['id']?>"></textarea>-->
								<button class="send_message send_message_<?=$dialog['id']?>" id="send-messanger" data-sender="<?=$currentUser->login;?>" data-recipient="<?=$dialog['friend'];?>" data-dialogid="<?=$dialog['id'];?>"><span class="material-icons">send</span></button>
							</div>
								<div class="full_view_footer_files">
									<span class="material-icons messanger_add_foto messanger_add_foto_<?=$dialog['id']?>" id="messanger_add_foto" data-dialogid="<?=$dialog['id']?>">photo_camera<input class="messanger_foto_<?=$dialog['id']?>" data-friend="<?=$dialog['friend']?>" data-dialogid="<?=$dialog['id']?>" type="file" name="file"></span><button id="upload" class="upload_<?=$dialog['id']?>" style="display:none" data-friend="<?=$dialog['friend']?>"></button>
									<span class="material-icons">tag_faces</span>

								</div>
							</div>
						</div>
				</div>
			<? } ?>
		</div>
	</div>
</article>

<? include 'parts/messanger_mobile_menu.php';?>