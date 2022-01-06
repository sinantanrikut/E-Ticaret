	<?php include 'header.php';
	//BELİRLİ VERİYİ SEÇME İŞLEMİ
  $menusor=$db->prepare("SELECT * FROM menu ");
  $menusor->execute();
   ?>

	<!--div-->
			<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Anasayfa</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Menü</a></li>
								</ol>
							</div>

						</div>
	<?php if (isset($_GET['durum'])) {?>
										<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation mr-2" aria-hidden="true"></i>Menü Başarıyla Silindi
									</div>
									<?php } else {
										
									}
									 ?>

								<div class="card">
									<div class="card-header">
										<div class="card-title">Menüler</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
												<div class="col-6 mb-4">
														<a href="menu-add.php" class="btn btn-primary"><i class="fe fe-plus"></i> Yeni Menü Ekle</a>
													</div>
											<table id="example-1" class="table table-striped table-bordered text-nowrap">
												<thead>
													<tr>
														<th class="border-bottom-0">Menu ID</th>
														<th class="border-bottom-0">Menü Ad</th>
														<th class="border-bottom-0">Menü Sıra</th>
														<th class="border-bottom-0">Menü Durum</th>
														<th class="border-bottom-0">İşlem</th>
													
													</tr>
												</thead>
												<tbody>

													<?php while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){ ?>

													<tr>
														<td><?php echo $menucek['menu_id']; ?></td>
														<td><?php echo $menucek['menu_ad']; ?></td>
														<td><?php echo $menucek['menu_sira']; ?></td>
														<td><?php if ($menucek['menu_durum']==1) {
															echo "Aktif";
														} else {
															echo "Pasif";
														}
														  ?></td>
														<td><a href="menu-edit.php?menu_id=<?php echo $menucek['menu_id']; ?>"><button class="btn btn-warning">Düzenle</button></a>
															<a href="system/function.php?menusil=ok&menu_id=<?php echo $menucek['menu_id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
									
													</tr>
												
												<?php } ?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<?php include 'footer.php'; ?>