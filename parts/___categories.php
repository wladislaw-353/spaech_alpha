<?if(isset($_SESSION['user'])){
							$currentUser = unserialize($_SESSION['user']);?>
							<?$marks = $currentUser->getMarks();?>

							<?foreach($marks as $key=>$mark_category){?>
								<div class="tab-pane fade text-center full-user" id="tab-category-<?echo $key;?>">
									<a align="center" href="#tab2" data-toggle="tab"><p align="center" class="users_back">Back</p></a>
									<h3><?echo $key;?></h3>
									<?foreach($mark_category as $mark_key=>$mark){?>
										<?if($mark_key!="marks_sum" and $mark_key!="average" and $mark_key!="total_count"){
											$mark_recipient = $currentUser->getUserById($mark_key);
											//print_r($mark_recipient);
											?>
											<div class="mark_item">
												<div class="row">
													<div class="col-lg-3">
														<img src="../img/<?echo $mark_recipient[0]['foto'];?>" class="img_of_estimated_user">
													</div>
													<div class="col-lg-9">
														<h4><?echo $mark_recipient[0]['login']."   ".$mark;?></h4>
													</div>
												</div>
											</div>
										<?}
									}?>
								</div>
							<?}?>

							<div class="tab-pane fade" id="tab2">		
								<h2>Categories</h2>
								<div id="mark_category">
									<div class="row">
										<div class="col-lg-6">
											<h3>Categories</h3>
										</div>
										<div class="col-lg-3">
											<h3>Rating</h3>
										</div>
										<div class="col-lg-3">
											<h3>People</h3>
										</div>
									</div>
								</div>

								<? foreach($marks as $key=>$mark_category){?>
									<div id="mark_category"><a href="#tab-category-<?echo $key;?>" data-toggle="tab">
										<div class="row">
											<div class="col-lg-6">
												<h3><?echo $key;?></h3>
											</div>
											<div class="col-lg-3">
												<h3><?echo $mark_category['average'];?></h3>
											</div>
											<div class="col-lg-3">
												<h3><?echo $mark_category['total_count'];?></h3>
											</div>
										</div></a>
									</div>	
								<?}?>
							</div>
						<?}?>