	<?php include 'header.php';
	//BELİRLİ VERİYİ SEÇME İŞLEMİ
  $slidersor=$db->prepare("SELECT * FROM slider ");
  $slidersor->execute();
   ?>

	<!--div-->
			<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Anasayfa</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="slider.php"><i class="fe fe-layers mr-2 fs-14"></i>Ürünler</a></li>
								</ol>
							</div>

						</div>
	<?php if (isset($_GET['durum'])) {?>
										<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation mr-2" aria-hidden="true"></i>Slider Başarıyla Silindi
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
														<a href="slider-add.php" class="btn btn-primary"><i class="fe fe-plus"></i> Yeni Slider Ekle</a>
													</div>
											<table id="example-1" class="table table-striped table-bordered text-nowrap">
												<thead>
													<tr>
														<th class="border-bottom-0">Slider ID</th>
														<th class="border-bottom-0">Slider Resim</th>
														<th class="border-bottom-0">Slider Link</th>
														<th class="border-bottom-0">İşlemler</th>
													
													</tr>
												</thead>
												<tbody>

													<?php while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){ ?>

													<tr>
														<td><?php echo $slidercek['slider_id']; ?></td>
														<td><img width="100px" src="../<?php echo $slidercek['slider_resim']; ?>"></td>
														<td><?php echo $slidercek['slider_link']; ?></td>
												
														

														<td><a href="slider-edit.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><button class="btn btn-warning">Düzenle</button></a>
															<a href="system/function.php?slidersil=ok&slider_id=<?php echo $slidercek['slider_id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
									
													</tr>
												
												<?php } ?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<?php include 'footer.php'; ?>