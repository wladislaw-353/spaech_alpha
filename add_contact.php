<?
session_start();
include 'config.php';
include 'library/main.php';
include 'library/blocks.php';
$currentUser = unserialize($_SESSION['user']);
$page_title = "Add contact";
include 'parts/inner_header.php';
//include 'parts/inner_content.php';?>

<form action="add_contact.php" method="post" id="ava-form" enctype="multipart/form-data" class="hidden-xs">
	<div class="container text-center" id="search_people_container">
		<!-- <h4 align="center">Enter user name</h4> -->
		<!-- <input align="center" id="search_people_input" type="text" placeholder="Login..." required> -->
		<div class="input-group">
			<input type="text" id="search_people_input" placeholder=" "required>
			<label for="name">User name</label>
		</div>
		<!--<button id="search_people_button">Search</button>-->
	</div>
	<!--<br><br><br><br>
	<div class="add-avatar" style="margin:left: 10px;">
		<br>
		<input type="file" class="hide inputfile" id="upload" name="file_name" data-multiple-caption="{count} files selected" multiple />
		<span class="material-icons input" for="upload">Upload photo</span>
	</div>
	<button type="submit" class="add-avatar save-avatar"><span>SAVE</span></button>
	<label><input type="checkbox">Estimate later</label>
	<button>Ok</button>-->
</form>
<br>
<div id="search_people_result" style="display:none">
	<p align="center">Search result:</p>
	<div align="center" class="search_people_result_body1 tab-content contacts" style="display:none"></div>
	<div align="center" class="search_people_result_body2 tab-content contacts" style="display:none">
		<p>Nothing found</p>
		<button class="add_user" style="margin-top: 30px;">Add user</button>
	</div>
	<div class="container holder">
		<form action="add_contact.php?action=add_user" method="POST" class="add_user_form" enctype="multipart/form-data" style="display:none;">
			<br><br><br><br><br>
			<div class="add-avatar" style="margin:0 auto;left:auto;">
				<input type="file" class="hide inputfile" id="upload" name="file_name" data-multiple-caption="{count} files selected" multiple />
				<span class="material-icons input" for="upload">add_a_photo</span>
			</div>
			<button class="add-avatar save-avatar" onclick="return false;" style="cursor:default;padding-left:27px;margin-top:-100px;position:unset;background-color:#27ae60 !important;box-shadow:none !important;"><span class="material-icons">done</span></button>
						<div class="input-group">
							<input type="text" name="login" id="login" placeholder=" " required  oninvalid="this.setCustomValidity('Enter login')" oninput="setCustomValidity('')">
							<label for="name">user name</label>
						</div>
						<div class="input-group">
							<input type="text" name="number" id="tel" placeholder=" " oninvalid="this.setCustomValidity('Enter number')" oninput="setCustomValidity('')">
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

			<!-- <label><input type="checkbox" name="estimate">Estimate later</label> -->
			<button>Ok</button>
		</form>
	</div>
</div>


<? include 'parts/inner_mobile_menu.php';?>