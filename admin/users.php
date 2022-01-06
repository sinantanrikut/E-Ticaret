<?php include 'header.php'; ?>										<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Kullanıcılar</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-grid mr-2 fs-14"></i>Yönetim Paneli</a></li>
									<li class="breadcrumb-item"><a href="#">kullanıcı Listesi</a></li>
								
								</ol>
							</div>
						
						</div>
                        <!--End Page header-->
												<!-- Row -->
						<div class="row flex-lg-nowrap">
							<div class="col-12">
								<div class="row flex-lg-nowrap">
									<div class="col-12 mb-3">
										<div class="e-panel card">
											<div class="card-body">
												<div class="row">
													<div class="col-6 mb-4">
														<a href="user-add.php" class="btn btn-primary"><i class="fe fe-plus"></i> Yeni Kullanıcı Ekle</a>
													</div>
													<div class="col-6 col-auto">
														<div class="form-group">
															<div class="input-icon">
																<span class="input-icon-addon">
																	<i class="fe fe-search"></i>
																</span>
																<input type="text" class="form-control" placeholder="Search User">
															</div>
														</div>
													</div>
												</div>
												<div class="row">



<?php 
$userssor=$db->prepare("select * from user order by user_id ASC ");
$userssor->execute();

while($userscek=$userssor->fetch(PDO::FETCH_ASSOC)) {
?>
													<div class="col-lg-6">
														<div class="d-sm-flex align-items-center border p-3 mb-3 br-7">
															<div class="avatar avatar-lg brround d-block cover-image" data-image-src="<?php echo $userscek['user_photo']; ?>" >
															</div>
															<div class="wrapper ml-sm-3  mt-4 mt-sm-0">
																<p class="mb-0 mt-1 text-dark font-weight-semibold"><?php echo $userscek['name']." ".$userscek['surname']; ?></p>
																<small class="text-muted"><?php 

																	if ($userscek['user_yetki']=="3") {
																		echo "admin";
																	} else {
																		echo "satıcı";
																	}
																	


																 ?></small>
															</div>
															<div class="float-sm-right ml-auto mt-4 mt-sm-0">
																<a href="mesaj-gonder.php?user_id=<?php echo $userscek['user_id']; ?>" class="btn btn-outline-secondary">Mesaj</a>
																<a href="user-profil.php?user_id=<?php echo $userscek['user_id']; ?>" class="btn btn-primary">Profili Görüntüle</a>
															</div>
														</div>
													</div>
<?php } ?>





												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

					</div>
				</div><!-- end app-content-->
            </div>
<?php include 'footer.php'; ?>