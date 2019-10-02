<?php include "header.php"; ?>

<!-- <div class="section-home-slide" style=""> -->
	<!-- <div class="container" style=" background-image: url(<?php echo base_url('assets/images/emas/Banner.png') ?>);width: auto;height: 345px;background-size: cover;"> -->
	<!-- <div class="container"> -->
		<!-- <div class="row"> -->
			<!-- <div class=""> -->
				<!-- <div class="kt_home_slide slide-home5 nav-center" data-nav="true"  data-autoplay="true" data-loop="true" data-responsive='{"0":{"items":"1"},"768":{"items":"1","nav":false},"992":{"items":"1"}}'> -->
					<!-- <img src="<?php echo base_url('assets') ?>/images/emas/Banner.jpg" style="margin-top:-20px;" /> -->
					<!-- </div> -->
				<!-- </div> -->
			<!-- </div> -->
		<!-- </div> -->
	<!-- </div> -->


	<div class="container" style="margin-top:70px">
			<div class="row row-offcanvas row-offcanvas-left">

				<div class="col-xs-4 col-sm-3 sidebar-offcanvas sidebar" id="">
						<p class="pull-left visible-xs">
							<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Sidebar</button>
						</p>
						<div class="">
								<br>

								<ul class="nav nav-sidebar" style="padding-top:10px;">
										<li><a href="https://ladaraindonesia.com"><img src="<?php echo base_url('assets') ?>/images/emas/icon-1.png" /><br> LadaraIndonesia.com</a></li>
										<li><a href="<?php echo base_url('profil_register') ?>"><img src="<?php echo base_url('assets') ?>/images/emas/profil.png" /> <br>Profil</a></li>
										<li><a href="#"><img src="<?php echo base_url('assets') ?>/images/emas/invest.png" /> <br>Investasi Lainnya</a></li>
								</ul>
								<ul class="nav nav-sidebar" style="padding-top:10px;background-color:#f5f5f5;box-shadow:-5px 10px #8888884a;border-radius:10px;">
										<li><a href="#">Transaksi Emas</a></li>
										<li><a href="#">Riwayat Transaksi</a></li>
								</ul>

						</div>
				</div>

					<div class="col-xs-8 col-sm-9" style="padding-top:20px;">
				<div class="list-group">

					<div class="row">
						 <div class="col-md-12">

								<div class="panel with-nav-tabs panel-default">
									 <div class="panel-heading single-project-nav">
											<ul class="nav nav-tabs">
													 <li class="active">
															<a href="#user-profile-info" data-toggle="tab">Harga Jual/Beli</a>
													 </li>
													 <li>
															<a href="#user-profile-payments" data-toggle="tab">Grafik Jual</a>
													 </li>
													 <li>
															<a href="#user-profile-examples" data-toggle="tab">Grafik Beli</a>
													 </li>
											 </ul>
										</div>
									 <div class="panel-body">
											 <div class="tab-content">
													<div class="tab-pane fade in active" id="user-profile-info">
														<div class="row" align="center">
															<div class="col-sm-5">
																<h2>Harga Beli/Gr</h2>
																<h3><b>RP. 717.000</b></h3>
															</div>
															<div class="col-sm-5">
																<h2>Harga Jual/Gr</h2>
																	<h3><b>Rp. 618.000</b></h3>
															</div>
														</div>
													</div>
													<div class="tab-pane fade" id="user-profile-payments">
														<div id="chart" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
													</div>
													<div class="tab-pane fade" id="user-profile-examples">
														<div id="chartBuy" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
													</div>
											</div>
									 </div>
							 </div>
						 </div>
					</div>

					<div class="row">
						 <div class="col-md-12">
								<div class="panel with-nav-tabs panel-default">
									 <div class="panel-heading single-project-nav" style="">
											<ul class="nav nav-tabs">
											 <li class="active">
													<a href="#beli" data-toggle="tab">Beli</a>
											 </li>
											 <li>
													<a href="#jual" data-toggle="tab">Jual</a>
											 </li>
									 </ul>
								</div>
									 <div class="panel-body">
										 <div class="tab-content">
											<div class="tab-pane fade in active" id="beli">
												<div class="row" align="center">
													<div class="col-sm-5">
														<h2>Nominal (Rp.)</h2>
														 <input type="text" name="nominalBeli"  placeholder="Rp.1000.000">
													</div>
													<div class="col-sm-5">
														<h2>Nilai Emas (Gram)</h2>
															 <input type="text" name="nilaiBeli" placeholder="0">
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="jual">
												<div class="row" align="center">
													<div class="col-sm-5">
														<h2>Nilai Emas (Gram)</h2>
															<input type="text" name="nilaiJual" placeholder="0">
													</div>
													<div class="col-sm-5">
														<h2>Nominal (Rp.)</h2>
														<input type="text" name="nominalJual" placeholder="Rp.1000.000">
													</div>
												</div>
												<div class="row" align="center">
												</div>
												<div class="row" align="center">
													<div class="col-sm-8">
														<p>Hasil penjualan akan dikirim ke: Saldo LadaraPay (Bisa Ditarik ke Akun Bank).</p>
													</div>
												</div>
											</div>
									</div>
								 </div>
							 </div>

							 <button class="btn btn-primary btn-block btn-large">Lanjut</button>
							 <p align="center">Dengan menekan tombol diatas. Anda telah menyetujui <b style="color:#0066ff;">Syarat & Ketentuan</b> berlaku.</p>

						 </div>
					 </div>


				</div>
			</div>
		</div>
		</div>

		<hr>


			<!-- <div class="container-fluid">
	        <div class="row">
	            <div class="col-sm-3 col-md-2 sidebar">
	                <ul class="nav nav-sidebar" style="padding-top:10px;">
	                    <li><a href="https://ladaraindonesia.com"><img src="<?php echo base_url('assets') ?>/images/emas/icon-1.png" /><br> LadaraIndonesia.com</a></li>
											<li><a href="<?php echo base_url('profil_register') ?>"><img src="<?php echo base_url('assets') ?>/images/emas/profil.png" /> <br>Profil</a></li>
											<li><a href="#"><img src="<?php echo base_url('assets') ?>/images/emas/invest.png" /> <br>Investasi Lainnya</a></li>
	                </ul>
									<ul class="nav nav-sidebar" style="padding-top:10px;background-color:#f5f5f5;box-shadow:-5px 10px #8888884a;border-radius:10px;">
											<li><a href="#">Transaksi Emas</a></li>
	                    <li><a href="#">Riwayat Transaksi</a></li>
	                </ul>
	            </div>
	            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

									<div class="row">
										 <div class="col-md-11">

												<div class="panel with-nav-tabs panel-default">
													 <div class="panel-heading single-project-nav">
															<ul class="nav nav-tabs">
																	 <li class="active">
																			<a href="#user-profile-info" data-toggle="tab">Harga Jual/Beli</a>
																	 </li>
																	 <li>
																			<a href="#user-profile-payments" data-toggle="tab">Grafik Jual</a>
																	 </li>
																	 <li>
																			<a href="#user-profile-examples" data-toggle="tab">Grafik Beli</a>
																	 </li>
															 </ul>
														</div>
													 <div class="panel-body">
															 <div class="tab-content">
																	<div class="tab-pane fade in active" id="user-profile-info">
																		<div class="row" align="center">
																			<div class="col-sm-5">
																				<h2>Harga Beli/Gr</h2>
																				<h3><b>RP. 717.000</b></h3>
																			</div>
																			<div class="col-sm-5">
																				<h2>Harga Jual/Gr</h2>
																					<h3><b>Rp. 618.000</b></h3>
																			</div>
																		</div>
																	</div>
																	<div class="tab-pane fade" id="user-profile-payments">
																		<div id="chart" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
																	</div>
																	<div class="tab-pane fade" id="user-profile-examples">
																		<div id="chartBuy" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
																	</div>
															</div>
													 </div>
											 </div>
										 </div>
									</div>

									<div class="row">
										 <div class="col-md-11">
												<div class="panel with-nav-tabs panel-default">
													 <div class="panel-heading single-project-nav" style="">
															<ul class="nav nav-tabs">
															 <li class="active">
																	<a href="#beli" data-toggle="tab">Beli</a>
															 </li>
															 <li>
																	<a href="#jual" data-toggle="tab">Jual</a>
															 </li>
													 </ul>
												</div>
													 <div class="panel-body">
														 <div class="tab-content">
															<div class="tab-pane fade in active" id="beli">
																<div class="row" align="center">
																	<div class="col-sm-5">
																		<h2>Nominal (Rp.)</h2>
																		 <input type="text" name="nominalBeli"  placeholder="Rp.1000.000">
																	</div>
																	<div class="col-sm-5">
																		<h2>Nilai Emas (Gram)</h2>
																			 <input type="text" name="nilaiBeli" placeholder="0">
																	</div>
																</div>
															</div>
															<div class="tab-pane fade" id="jual">
																<div class="row" align="center">
																	<div class="col-sm-5">
																		<h2>Nilai Emas (Gram)</h2>
																			<input type="text" name="nilaiJual" placeholder="0">
																	</div>
																  <div class="col-sm-5">
																		<h2>Nominal (Rp.)</h2>
																		<input type="text" name="nominalJual" placeholder="Rp.1000.000">
																	</div>
																</div>
																<div class="row" align="center">
																</div>
																<div class="row" align="center">
																	<div class="col-sm-8">
																		<p>Hasil penjualan akan dikirim ke: Saldo LadaraPay (Bisa Ditarik ke Akun Bank).</p>
																	</div>
																</div>
															</div>
													</div>
												 </div>
											 </div>
										 </div>
									 </div>

									 <div class="container margin-top-30">
							 			<div class="row margin-0">
							 				<div class="col-sm-11 col-md-11 col-lg-11 padding-0">
							 					<button class="btn btn-primary btn-block btn-large">Lanjut</button>
							 					<p align="center">Dengan menekan tombol diatas. Anda telah menyetujui <b style="color:#0066ff;">Syarat & Ketentuan</b> berlaku.</p>
							 				</div>
							 			</div>
							 		</div>

	            </div>
	        </div>
	    </div> -->


	<!-- <div class="container margin-top-30">
		<div class="row margin-0">
			<div class="col-sm-12 col-md-12 col-lg-12 padding-0">

					 <div class="row">
							<div class="col-md-12">

								 <div class="panel with-nav-tabs panel-default">
										<div class="panel-heading single-project-nav">
											 <ul class="nav nav-tabs">
														<li class="active">
															 <a href="#user-profile-info" data-toggle="tab">Harga Jual/Beli</a>
														</li>
														<li>
															 <a href="#user-profile-payments" data-toggle="tab">Grafik Jual</a>
														</li>
														<li>
															 <a href="#user-profile-examples" data-toggle="tab">Grafik Beli</a>
														</li>
												</ul>
										 </div>
										<div class="panel-body">
												<div class="tab-content">
													 <div class="tab-pane fade in active" id="user-profile-info">
														 <div class="row" align="center">
															 <div class="col-sm-5">
																 <h2>Harga Beli/Gr</h2>
																 <h3><b>RP. 717.000</b></h3>
															 </div>
															 <div class="col-sm-5">
																 <h2>Harga Jual/Gr</h2>
																	 <h3><b>Rp. 618.000</b></h3>
															 </div>
														 </div>
													 </div>
													 <div class="tab-pane fade" id="user-profile-payments">
														 <div id="chart" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
													 </div>
													 <div class="tab-pane fade" id="user-profile-examples">
														 <div id="chartBuy" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
													 </div>
											 </div>
									 	</div>
								</div>
							</div>
					 </div>

			</div>
		</div>
	</div>

		<div class="container margin-top-30">
			<div class="row margin-0">
				<div class="col-sm-12 col-md-12 col-lg-12 padding-0">

					<div class="row">
						 <div class="col-md-12">
								<div class="panel with-nav-tabs panel-default">
									 <div class="panel-heading single-project-nav" style="">
											<ul class="nav nav-tabs">
											 <li class="active">
													<a href="#beli" data-toggle="tab">Beli</a>
											 </li>
											 <li>
													<a href="#jual" data-toggle="tab">Jual</a>
											 </li>
									 </ul>
								</div>
									 <div class="panel-body">
										 <div class="tab-content">
											<div class="tab-pane fade in active" id="beli">
												<div class="row" align="center">
												  <div class="col-sm-5">
														<h2>Nominal</h2>
														<b>RP. 250.000</b>
													</div>
												  <div class="col-sm-5">
														<h2>Nilai Emas</h2>
															<b>0,2789 Gram</b>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="jual">
												<div class="row" align="center">
												  <div class="col-sm-5">
														<h2>Nominal</h2>
														<b>RP. 750.000</b>
													</div>
												  <div class="col-sm-5">
														<h2>Nilai Emas</h2>
															<b>0,3000 Gram</b>
													</div>
												</div>
											</div>
									</div>
								 </div>
							 </div>
						 </div>
					 </div>

			 </div>
		 </div>
		</div>

		<div class="container margin-top-30">
			<div class="row margin-0">
				<div class="col-sm-12 col-md-12 col-lg-12 padding-0">
					<button class="btn btn-primary btn-block btn-large">Lanjut</button>
					<p align="center">Dengan menekan tombol diatas. Anda telah menyetujui <b style="color:#0066ff;">Syarat & Ketentuan</b> berlaku.</p>
				</div>
			</div>
		</div> -->

<?php include "footer.php"; ?>
