	<?php include 'header.php';
	//BELİRLİ VERİYİ SEÇME İŞLEMİ
  $urunsor=$db->prepare("SELECT * FROM urun ");
  $urunsor->execute();
   ?>

	<!--div-->
			<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Anasayfa</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="urunler.php"><i class="fe fe-layers mr-2 fs-14"></i>Ürünler</a></li>
								</ol>
							</div>

						</div>
	<?php if (isset($_GET['durum'])) {?>
										<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation mr-2" aria-hidden="true"></i>Ürün Başarıyla Silindi
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
														<a href="urun-add.php" class="btn btn-primary"><i class="fe fe-plus"></i> Yeni Ürün Ekle</a>
													</div>
											<table id="example-1" class="table table-striped table-bordered text-nowrap">
												<thead>
													<tr>
														<th class="border-bottom-0">Ürün ID</th>
														<th class="border-bottom-0">Ürün Resim</th>
														<th class="border-bottom-0">Ürün Ad</th>
														<th class="border-bottom-0">Ürün Fiyat</th>
														<th class="border-bottom-0">Ürün Adet</th>
														<th class="border-bottom-0">Ürün Satıcı</th>
														<th class="border-bottom-0">İşlemler</th>
													
													</tr>
												</thead>
												<tbody>

													<?php while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){ ?>

													<tr>
														<td><?php echo $uruncek['urun_id']; ?></td>
														<td><img width="100px" src="<?php echo $uruncek['urun_resim']; ?>"></td>
														<td><?php echo $uruncek['urun_ad']; ?></td>
														<td><?php echo $uruncek['urun_fiyat']; ?> TL</td>
														<td><?php echo $uruncek['urun_adet']; ?></td>
														<td><?php 
														$i=$uruncek['urun_satici'];
 													$kullanicisor=$db->prepare("select * from user where user_id=:id ");
        									        $kullanicisor->execute(array(

   													 'id' =>$i
 													 ) );

     												$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

     												echo $kullanicicek['name']." ".$kullanicicek['surname'];
													 ?></td>

													


														<td><a href="urun-edit.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-warning">Düzenle</button></a>
															<a href="system/function.php?urunsil=ok&urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-danger">Sil</button></a></td>
									
													</tr>
												
												<?php } ?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<?php include 'footer.php'; ?>