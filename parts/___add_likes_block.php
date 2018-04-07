<?if(isset($_SESSION['user'])){
							$currentUser = unserialize($_SESSION['user']);
							$allProperies = $currentUser->getallProperies();
							foreach ($allProperies as $value) { ?>
									<h3 class="properties_title"><? echo $value['property_name']; ?></h3>
									<select name="<? echo $value['property_name']; ?>" id="format">
										<option value="choose">Choose</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select><br><br>
							<? } ?>
							<button name="enter_now" class="btn btn-success" id="estimate_user_modal_button">Save marks</button><br><br>
						<?}?>