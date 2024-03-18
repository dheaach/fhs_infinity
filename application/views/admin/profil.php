<?php
	$this->load->view("_partials/header.php");
?> 
<!-- BEGIN HEADER -->
<?php
	$this->load->view("_partials/navbar.php");
?>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php
		$this->load->view("_partials/sidebar.php");
	?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<?php
				$this->load->view("_partials/modal.php");
			?>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<?php
				// $this->load->view("_partials/theme.php");
			?>
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			
			<div class="page-bar">
				<div class="row">
					<div class="col-sm-10">
						<h3 class="page-title font-green-seagreen">
						<strong>Profil Outlet</strong>
						</h3>
					</div>
					<div class="add-product-nav col-sm-2">
						<!-- <a class="btn btn-sm green-seagreen filter-submit" data-toggle="modal" href="#add_product"><i class="fa fa-plus"></i> Barang Baru</a> -->
					</div>
				</div>
				<div class="page-toolbar"></div>
			</div>
			<!-- END PAGE HEADER-->
			<div class="page-bar pg-breadcrumb">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url('login/dashboard');?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url('profil');?>">Profil</a>
					</li>
				</ul>
			</div>
			<!-- BEGIN PAGE CONTENT -->
			<div class="row" id="51A" style="display:none;">
				<div class="col-md-12">				
					<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
					</div>
					<div class="alert alert-danger alert-dismissible" id="failed" style="display:none;">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
					</div>
				</div>
				<div class="col-md-12">
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-3">
								<div class="col-sm-12" style="padding-left: 0px;padding-right: 0px;">
									<div class="portlet light profile-sidebar-portlet own">
										<!-- SIDEBAR USERPIC -->
										<div class="profile-userpic own">
											<img class="images own" id="user-image" src="<?php echo base_url();?>assets/admin/layout/img/logo_ohh_dark.png" class="img-responsive" alt="">
											<!-- <img id="user-image" src="<?php echo base_url();?>assets/images/logo/no-image.jpg" class="img-responsive" alt=""> -->
										</div>

									</div>
								</div>
								<div class="col-sm-12" style="padding-left: 0px;padding-right: 0px;">
									<div class="portlet light">
										<div class="portlet-body">
											<div class="profile-userbuttons">
												<button id="btn-pilih-logo" type="button" class="btn btn-circle green-seagreen btn-sm">Pilih Logo</button>
												<button id="btn-hps-logo" type="button" class="btn btn-circle btn-danger btn-sm">Hapus Logo</button>
											</div>
										</div>
									</div>
									
								</div>
								<div class="col-sm-12" style="padding-left: 0px;padding-right: 0px;">
									<div class="portlet light">
										<div class="portlet-body">
											<div class="profile-userbuttons">
												<button id="btn-update-prof" type="button" class="btn btn-circle green-seagreen">Update</button>
												<button id="btn-cancel-prof" type="button" class="btn btn-circle green-seagreen">Cancel</button>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<div class="col-md-9">
								<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
									<!-- BEGIN PORTLET -->
									<div class="portlet light" style="min-height: 241px;">
										<div class="portlet-title tabbable-line">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_1_1" data-toggle="tab">
													Data Outlet </a>
												</li>
												<li>
													<a href="#tab_1_2" data-toggle="tab">
													Header & Footer </a>
												</li>
											</ul>
										</div>
										<?php
											$nama = '';
											$alamat = '';
											$telp = '';
											$email = '';
											$npwp = '';
											$head_1 = '';
											$head_2 = '';
											$head_3 = '';
											$head_4 = '';
											$foot_1 = '';
											$foot_2 = '';
											$foot_3 = '';
											$foot_4 = '';

											if(is_array($get_prof)||is_object($get_prof)){
												foreach ($get_prof as $profile) {
													$nama = $profile->faktur_pajak_nama;
													$alamat1 = $profile->faktur_pajak_alamat;
													$alamat2 = $profile->faktur_pajak_alamat2;
													$telp = $profile->telp;
													$email = $profile->mail;
													$email = $profile->mail;
													$npwp = $profile->faktur_pajak_npwp;
													$head_1 = $profile->pro_head_1;
													$head_2 = $profile->pro_head_2;
													$head_3 = $profile->pro_head_3;
													$head_4 = $profile->pro_head_4;
													$foot_1 = $profile->pro_foot_1;
													$foot_2 = $profile->pro_foot_2;
													$foot_3 = $profile->pro_foot_3;
													$foot_4 = $profile->pro_foot_4;
													
												}
											}
										?>
										<div class="portlet-body">
											<!--BEGIN TABS-->
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_1">
													<div class="form-body">
														<div class="row">	
															<div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Nama Outlet
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="nama" placeholder="" value="<?php echo $nama;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Alamat
																	</label>
																	<div class="col-md-8"  style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="alamat1" placeholder="" value="<?php echo $alamat1;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label" style="color:white;">abc
																	</label>
																	<div class="col-md-8">
																		<input type="text" class="form-control input-sm" id="alamat2" placeholder="" value="<?php echo $alamat2;?>">
																	</div>
																</div>
															</div>
															<div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
																<div class="form-group">
																	<label class="col-md-3 control-label text-align-reverse">Telp
																	</label>
																	<div class="col-md-9" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="telp" placeholder="" value="<?php echo $telp;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-3 control-label text-align-reverse">Email
																	</label>
																	<div class="col-md-9" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="email" placeholder="" value="<?php echo $email;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-3 control-label text-align-reverse">NPWP
																	</label>
																	<div class="col-md-9" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="npwp_profile" placeholder="" value="<?php echo $npwp;?>">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab_1_2">
													<div class="form-body">
														<div class="row">	
															<div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Header 1
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="header1" placeholder="" value="<?php echo $head_1;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Header 2
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="header2" placeholder=""  value="<?php echo $head_2;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Header 3
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="header3" placeholder="" value="<?php echo $head_3;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Header 4
																	</label>
																	<div class="col-md-8">
																		<input type="text" class="form-control input-sm" id="header4" placeholder="" value="<?php echo $head_4;?>">
																	</div>
																</div>
															</div>
															<div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
																<div class="form-group">
																	<label class="col-md-3 control-label text-align-reverse">Footer 1
																	</label>
																	<div class="col-md-9" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="footer1" placeholder="" value="<?php echo $foot_1;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-3 control-label text-align-reverse">Footer 2
																	</label>
																	<div class="col-md-9" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="footer2" placeholder="" value="<?php echo $foot_2;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-3 control-label text-align-reverse">Footer 3
																	</label>
																	<div class="col-md-9" style="margin-bottom:10px;">
																		<input type="text" class="form-control input-sm" id="footer3" placeholder="" value="<?php echo $foot_3;?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-3 control-label text-align-reverse">Footer 4
																	</label>
																	<div class="col-md-9">
																		<input type="text" class="form-control input-sm" id="footer4" placeholder="" value="<?php echo $foot_4;?>">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--END TABS-->
										</div>
									</div>
									<!-- END PORTLET -->
								</div>
								<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
									<!-- BEGIN PORTLET -->
									<div class="portlet light" style="min-height: 241px;">
										<div class="portlet-title tabbable-line">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_2_1" data-toggle="tab">
													Pembelian </a>
												</li>
												<li>
													<a href="#tab_2_2" data-toggle="tab">
													Penjualan </a>
												</li>
												<li>
													<a href="#tab_2_3" data-toggle="tab">
													Lain-lain </a>
												</li>
											</ul>
										</div>
										
										<div class="portlet-body">
											<!--BEGIN TABS-->
											<div class="tab-content">
												<div class="tab-pane active" id="tab_2_1">
													<div class="form-body">
														<div class="row">	
															<div class="col-md-12">
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Unbilling Goods Received : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_unbill_gr)||is_object($rek_unbill_gr)){
																				foreach ($rek_unbill_gr as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_ugr" id="rek_nama_ugr" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_ugr" id="rek_no_ugr" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_ugr" id="rek_gol_ugr">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ugr"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ugr"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_ugr" id="rek_nama_ugr">
																			<input type="hidden" class="form-control" name="rek_no_ugr" id="rek_no_ugr">
																			<input type="hidden" class="form-control" name="rek_gol_ugr" id="rek_gol_ugr">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ugr"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ugr"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Input Tax : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_ppn_masukan)||is_object($rek_ppn_masukan)){
																				foreach ($rek_ppn_masukan as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_it" id="rek_nama_it" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_it" id="rek_no_it" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_it" id="rek_gol_it">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-it"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-it"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_it" id="rek_nama_it">
																			<input type="hidden" class="form-control" name="rek_no_it" id="rek_no_it">
																			<input type="hidden" class="form-control" name="rek_gol_it" id="rek_gol_it">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-it"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-it"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Potongan Hutang : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_pot_hutang)||is_object($rek_pot_hutang)){
																				foreach ($rek_pot_hutang as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_ph" id="rek_nama_ph" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_ph" id="rek_no_ph" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_ph" id="rek_gol_ph">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ph"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ph"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_ph" id="rek_nama_ph">
																			<input type="hidden" class="form-control" name="rek_no_ph" id="rek_no_ph">
																			<input type="hidden" class="form-control" name="rek_gol_ph" id="rek_gol_ph">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ph"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ph"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Koreksi Hutang : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_koreksi_hutang)||is_object($rek_koreksi_hutang)){
																				foreach ($rek_koreksi_hutang as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_kh" id="rek_nama_kh" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_kh" id="rek_no_kh" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_kh" id="rek_gol_kh">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-kh"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-kh"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_kh" id="rek_nama_kh">
																			<input type="hidden" class="form-control" name="rek_no_kh" id="rek_no_kh">
																			<input type="hidden" class="form-control" name="rek_gol_kh" id="rek_gol_kh">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-kh"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-kh"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Hutang Giro : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_hutang_giro)||is_object($rek_hutang_giro)){
																				foreach ($rek_hutang_giro as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_hg" id="rek_nama_hg" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_hg" id="rek_no_hg" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_hg" id="rek_gol_hg">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-hg"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-hg"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_hg" id="rek_nama_hg">
																			<input type="hidden" class="form-control" name="rek_no_hg" id="rek_no_hg">
																			<input type="hidden" class="form-control" name="rek_gol_hg" id="rek_gol_hg">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-hg"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-hg"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Pencairan Giro : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_cair_giro1)||is_object($rek_cair_giro1)){
																				foreach ($rek_cair_giro1 as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_phg" id="rek_nama_phg" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_phg" id="rek_no_phg" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_phg" id="rek_gol_phg">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-phg"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-phg"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_phg" id="rek_nama_phg">
																			<input type="hidden" class="form-control" name="rek_no_phg" id="rek_no_phg">
																			<input type="hidden" class="form-control" name="rek_gol_phg" id="rek_gol_phg">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-phg"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-phg"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Uang Muka Supplier : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_uang_muka_beli)||is_object($rek_uang_muka_beli)){
																				foreach ($rek_uang_muka_beli as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_ums" id="rek_nama_ums" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_ums" id="rek_no_ums" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_ums" id="rek_gol_ums">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ums"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ums"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>

																			<input type="text" class="form-control" name="rek_nama_ums" id="rek_nama_ums">
																			<input type="hidden" class="form-control" name="rek_no_ums" id="rek_no_ums">
																			<input type="hidden" class="form-control" name="rek_gol_ums" id="rek_gol_ums">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ums"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ums"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Biaya Kirim : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_ongkos_kirim)||is_object($rek_ongkos_kirim)){
																				foreach ($rek_ongkos_kirim as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_bk" id="rek_nama_bk" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_bk" id="rek_no_bk" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_bk" id="rek_gol_bk">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-bk"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-bk"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_bk" id="rek_nama_bk">
																			<input type="hidden" class="form-control" name="rek_no_bk" id="rek_no_bk">
																			<input type="hidden" class="form-control" name="rek_gol_bk" id="rek_gol_bk">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-bk"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-bk"><i class="fa fa-times"></i></button>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab_2_2">
													<div class="form-body">
														<div class="row">	
															<div class="col-md-12">
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Unbilling Goods Issue : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_unbill_gi)||is_object($rek_unbill_gi)){
																				foreach ($rek_unbill_gi as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_ugi" id="rek_nama_ugi" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_ugi" id="rek_no_ugi" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_ugi" id="rek_gol_ugi">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ugi"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ugi"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_ugi" id="rek_nama_ugi">
																			<input type="hidden" class="form-control" name="rek_no_ugi" id="rek_no_ugi">
																			<input type="hidden" class="form-control" name="rek_gol_ugi" id="rek_gol_ugi">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ugi"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ugi"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Output Tax : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_hutang_ppn)||is_object($rek_hutang_ppn)){
																				foreach ($rek_hutang_ppn as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_ot" id="rek_nama_ot" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_ot" id="rek_no_ot" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_ot" id="rek_gol_ot">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ot"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ot"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_ot" id="rek_nama_ot">
																			<input type="hidden" class="form-control" name="rek_no_ot" id="rek_no_ot">
																			<input type="hidden" class="form-control" name="rek_gol_ot" id="rek_gol_ot">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ot"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ot"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Potongan Piutang : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_pot_piutang)||is_object($rek_pot_piutang)){
																				foreach ($rek_pot_piutang as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_pp" id="rek_nama_pp" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_pp" id="rek_no_pp" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_pp" id="rek_gol_pp">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-pp"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-pp"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_pp" id="rek_nama_pp">
																			<input type="hidden" class="form-control" name="rek_no_pp" id="rek_no_pp">
																			<input type="hidden" class="form-control" name="rek_gol_pp" id="rek_gol_pp">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-pp"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-pp"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Klaim Piutang : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_koreksi_piutang)||is_object($rek_koreksi_piutang)){
																				foreach ($rek_koreksi_piutang as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_kp" id="rek_nama_kp" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_kp" id="rek_no_kp" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_kp" id="rek_gol_kp">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-kp"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-kp"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_kp" id="rek_nama_kp">
																			<input type="hidden" class="form-control" name="rek_no_kp" id="rek_no_kp">
																			<input type="hidden" class="form-control" name="rek_gol_kp" id="rek_gol_kp">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-kp"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-kp"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Piutang Giro : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_piutang_giro)||is_object($rek_piutang_giro)){
																				foreach ($rek_piutang_giro as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_pg" id="rek_nama_pg" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_pg" id="rek_no_pg" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_pg" id="rek_gol_pg">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-pg"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-pg"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_pg" id="rek_nama_pg">
																			<input type="hidden" class="form-control" name="rek_no_pg" id="rek_no_pg">
																			<input type="hidden" class="form-control" name="rek_gol_pg" id="rek_gol_pg">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-pg"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-pg"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Pencairan Giro : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_cair_giro2)||is_object($rek_cair_giro2)){
																				foreach ($rek_cair_giro2 as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_ppg" id="rek_nama_ppg" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_ppg" id="rek_no_ppg" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_ppg" id="rek_gol_ppg">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ppg"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ppg"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_ppg" id="rek_nama_ppg">
																			<input type="hidden" class="form-control" name="rek_no_ppg" id="rek_no_ppg">
																			<input type="hidden" class="form-control" name="rek_gol_ppg" id="rek_gol_ppg">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ppg"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ppg"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>

																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Uang Muka Customer : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_uang_muka_jual)||is_object($rek_uang_muka_jual)){
																				foreach ($rek_uang_muka_jual as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_umc" id="rek_nama_umc" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_umc" id="rek_no_umc" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_umc" id="rek_gol_umc">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-umc"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-umc"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_umc" id="rek_nama_umc">
																			<input type="hidden" class="form-control" name="rek_no_umc" id="rek_no_umc">
																			<input type="hidden" class="form-control" name="rek_gol_umc" id="rek_gol_umc">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-umc"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-umc"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Credit Note : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_credit_note)||is_object($rek_credit_note)){
																				foreach ($rek_credit_note as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_cn" id="rek_nama_cn" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_cn" id="rek_no_cn" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_cn" id="rek_gol_cn">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-cn"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-cn"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_cn" id="rek_nama_cn">
																			<input type="hidden" class="form-control" name="rek_no_cn" id="rek_no_cn">
																			<input type="hidden" class="form-control" name="rek_gol_cn" id="rek_gol_cn">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-cn"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-cn"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Tunai : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_tunai)||is_object($rek_tunai)){
																				foreach ($rek_tunai as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_tn" id="rek_nama_tn" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_tn" id="rek_no_tn" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_tn" id="rek_gol_tn">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-tn"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-tn"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_tn" id="rek_nama_tn">
																			<input type="hidden" class="form-control" name="rek_no_tn" id="rek_no_tn">
																			<input type="hidden" class="form-control" name="rek_gol_tn" id="rek_gol_tn">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-tn"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-tn"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab_2_3">
													<div class="form-body">
														<div class="row">	
															<div class="col-md-12">
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Prive : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_prive)||is_object($rek_prive)){
																				foreach ($rek_prive as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_prive" id="rek_nama_prive" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_prive" id="rek_no_prive" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_prive" id="rek_gol_prive">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-prive"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-prive"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_prive" id="rek_nama_prive">
																			<input type="hidden" class="form-control" name="rek_no_prive" id="rek_no_prive">
																			<input type="hidden" class="form-control" name="rek_gol_prive" id="rek_gol_prive">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-prive"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-prive"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Laba Bulan Berjalan : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_lr_bulan)||is_object($rek_lr_bulan)){
																				foreach ($rek_lr_bulan as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_lmb" id="rek_nama_lmb" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_lmb" id="rek_no_lmb" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_lmb" id="rek_gol_lmb">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-lmb"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-lmb"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_lmb" id="rek_nama_lmb">
																			<input type="hidden" class="form-control" name="rek_no_lmb" id="rek_no_lmb">
																			<input type="hidden" class="form-control" name="rek_gol_lmb" id="rek_gol_lmb">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-lmb"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-lmb"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Laba Tahun Berjalan : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_lr_tahun)||is_object($rek_lr_tahun)){
																				foreach ($rek_lr_tahun as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_ltb" id="rek_nama_ltb" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_ltb" id="rek_no_ltb" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_ltb" id="rek_gol_ltb">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ltb"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ltb"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_ltb" id="rek_nama_ltb">
																			<input type="hidden" class="form-control" name="rek_no_ltb" id="rek_no_ltb">
																			<input type="hidden" class="form-control" name="rek_gol_ltb" id="rek_gol_ltb">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ltb"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ltb"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Modal Awal : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_modal_no)||is_object($rek_modal_no)){
																				foreach ($rek_modal_no as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_ma" id="rek_nama_ma" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_ma" id="rek_no_ma" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_ma" id="rek_gol_ma">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ma"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ma"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_ma" id="rek_nama_ma">
																			<input type="hidden" class="form-control" name="rek_no_ma" id="rek_no_ma">
																			<input type="hidden" class="form-control" name="rek_gol_ma" id="rek_gol_ma">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-ma"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-ma"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-4 control-label text-align-reverse">Selisih Kurs : 
																	</label>
																	<div class="col-md-8" style="margin-bottom:10px;">
																		<div class="input-group">
																		<?php
																			if(is_array($rek_selisih_desimal)||is_object($rek_selisih_desimal)){
																				foreach ($rek_selisih_desimal as $ab) {
																		?>
																			<input type="text" class="form-control" name="rek_nama_sk" id="rek_nama_sk" value="<?php echo $ab->nama;?>">
																			<input type="hidden" class="form-control" name="rek_no_sk" id="rek_no_sk" value="<?php echo $ab->rek_no;?>">
																			<input type="hidden" class="form-control" name="rek_gol_sk" id="rek_gol_sk">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-sk"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-sk"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																				}
																			}else{
																		?>
																			<input type="text" class="form-control" name="rek_nama_sk" id="rek_nama_sk">
																			<input type="hidden" class="form-control" name="rek_no_sk" id="rek_no_sk">
																			<input type="hidden" class="form-control" name="rek_gol_sk" id="rek_gol_sk">
																			<span class="input-group-btn">
																				<button class="btn green-seagreen" id="btn-rek-sk"><i class="fa fa-ellipsis-h"></i></button>
																				<button class="btn yellow-gold" id="btn-del-sk"><i class="fa fa-times"></i></button>
																			</span>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--END TABS-->
										</div>
									</div>
									<!-- END PORTLET -->
								</div>
							</div>
							
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
			
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<?php
	    $this->load->view("_partials/quick_sidebar.php");
	?>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<?php
    $this->load->view("_partials/footer.php");
?>
<script>
        jQuery(document).ready(function() {    
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
            AccountList.init();
            Profile.init();
        });
</script>
<script>

	function reload_page() {
	  	setTimeout(function(){
		   window.location.reload();
		}, 2000);
	}

	$('#btn-update-profile').on('click', function(e) {

	  	e.preventDefault();

	  	var nama = $('#nama').val();
		var alamat1 = $('#alamat1').val();
		var alamat2 = $('#alamat2').val();
		var telp = $('#telp').val();
		var email = $('#email').val();
		var npwp = $('#npwp').val();

		if(nama!="" ){
			$.ajax({
				url: "<?php echo base_url("profile/action_profile");?>",
				type: "POST",
				data: {
					nama : nama,
					alamat1 : alamat1,
					alamat2 : alamat2,
					telp : telp,
					email : email,
					npwp : npwp
				},
				cache: false,
				success: function(dataResult){
					$("#success").show();
					$('#success').html('Data berhasil diubah!');
					$("#success").fadeTo(1500, 500).slideUp(500, function() {
	                	$("#success").slideUp(500);
	                });	
				},
				error: function() {
					$("#failed").show();
					$('#failed').html('Gagal melakukan aksi!');
					$("#failed").fadeTo(1500, 500).slideUp(500, function() {
	                	$("#failed").slideUp(500);
	                });
				}
			});

			reload_page();
		}
	});

  	$('#btn-rek-ugr').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_ugr").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(1);
	});

	$('#btn-del-ugr').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_ugr").val(0);
		$("#rek_nama_ugr").val('');
		$("#rek_no_ugr").val('');

	});

	$('#btn-rek-it').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_it").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(2);
	});

	$('#btn-del-it').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_it").val(0);
		$("#rek_nama_it").val('');
		$("#rek_no_it").val('');

	});

	$('#btn-rek-ph').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_ph").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(3);
	});

	$('#btn-del-ph').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_ph").val(0);
		$("#rek_nama_ph").val('');
		$("#rek_no_ph").val('');

	});

	$('#btn-rek-kh').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_kh").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(4);
	});

	$('#btn-del-kh').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_kh").val(0);
		$("#rek_nama_kh").val('');
		$("#rek_no_kh").val('');

	});

	$('#btn-rek-hg').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_hg").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(5);
	});

	$('#btn-del-hg').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_hg").val(0);
		$("#rek_nama_hg").val('');
		$("#rek_no_hg").val('');

	});

	$('#btn-rek-phg').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_phg").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(6);
	});

	$('#btn-del-phg').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_phg").val(0);
		$("#rek_nama_phg").val('');
		$("#rek_no_phg").val('');

	});

	$('#btn-rek-ums').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_ums").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(7);
	});

	$('#btn-del-ums').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_ums").val(0);
		$("#rek_nama_ums").val('');
		$("#rek_no_ums").val('');

	});

	$('#btn-rek-bk').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_bk").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(8);
	});

	$('#btn-del-bk').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_bk").val(0);
		$("#rek_nama_bk").val('');
		$("#rek_no_bk").val('');

	});

	$('#btn-rek-ugi').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_ugi").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(9);
	});

	$('#btn-del-ugi').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_ugi").val(0);
		$("#rek_nama_ugi").val('');
		$("#rek_no_ugi").val('');

	});

	$('#btn-rek-ot').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_ot").val(-2);

		$('#acclist_search').val('');
		var oTable = $('#datatable_acclist').DataTable();
	    oTable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(10);
	});

	$('#btn-del-ot').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_ot").val(0);
		$("#rek_nama_ot").val('');
		$("#rek_no_ot").val('');

	});

	$('#btn-rek-kp').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_kp").val(-2);

		$('#acclist_search').val('');
		var kpable = $('#datatable_acclist').DataTable();
	    kpable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(11);
	});

	$('#btn-del-kp').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_kp").val(0);
		$("#rek_nama_kp").val('');
		$("#rek_no_kp").val('');

	});

	$('#btn-rek-pg').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_pg").val(-2);

		$('#acclist_search').val('');
		var pgable = $('#datatable_acclist').DataTable();
	    pgable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(12);
	});

	$('#btn-del-pg').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_pg").val(0);
		$("#rek_nama_pg").val('');
		$("#rek_no_pg").val('');

	});

	$('#btn-rek-pp').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_pp").val(-2);

		$('#acclist_search').val('');
		var ppable = $('#datatable_acclist').DataTable();
	    ppable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(13);
	});

	$('#btn-del-pp').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_pp").val(0);
		$("#rek_nama_pp").val('');
		$("#rek_no_pp").val('');

	});

	$('#btn-rek-ppg').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_ppg").val(-2);

		$('#acclist_search').val('');
		var ppgable = $('#datatable_acclist').DataTable();
	    ppgable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(14);
	});

	$('#btn-del-ppg').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_ppg").val(0);
		$("#rek_nama_ppg").val('');
		$("#rek_no_ppg").val('');

	});

	$('#btn-rek-umc').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_umc").val(-2);

		$('#acclist_search').val('');
		var umcable = $('#datatable_acclist').DataTable();
	    umcable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(15);
	});

	$('#btn-del-umc').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_umc").val(0);
		$("#rek_nama_umc").val('');
		$("#rek_no_umc").val('');

	});

	$('#btn-rek-cn').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_cn").val(-2);

		$('#acclist_search').val('');
		var cnable = $('#datatable_acclist').DataTable();
	    cnable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(16);
	});

	$('#btn-del-cn').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_cn").val(0);
		$("#rek_nama_cn").val('');
		$("#rek_no_cn").val('');

	});

	$('#btn-rek-tn').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_tn").val(-2);

		$('#acclist_search').val('');
		var tnable = $('#datatable_acclist').DataTable();
	    tnable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(17);
	});

	$('#btn-del-tn').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_tn").val(0);
		$("#rek_nama_tn").val('');
		$("#rek_no_tn").val('');

	});

	$('#btn-rek-prive').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_prive").val(-2);

		$('#acclist_search').val('');
		var priveable = $('#datatable_acclist').DataTable();
	    priveable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(18);
	});

	$('#btn-del-prive').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_prive").val(0);
		$("#rek_nama_prive").val('');
		$("#rek_no_prive").val('');

	});

	$('#btn-rek-lmb').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_lmb").val(-2);

		$('#acclist_search').val('');
		var lmbable = $('#datatable_acclist').DataTable();
	    lmbable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(19);
	});

	$('#btn-del-lmb').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_lmb").val(0);
		$("#rek_nama_lmb").val('');
		$("#rek_no_lmb").val('');

	});

	$('#btn-rek-ltb').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_ltb").val(-2);

		$('#acclist_search').val('');
		var ltbable = $('#datatable_acclist').DataTable();
	    ltbable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(20);
	});

	$('#btn-del-ltb').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_ltb").val(0);
		$("#rek_nama_ltb").val('');
		$("#rek_no_ltb").val('');

	});

	$('#btn-rek-ma').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_ma").val(-2);

		$('#acclist_search').val('');
		var maable = $('#datatable_acclist').DataTable();
	    maable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(21);
	});

	$('#btn-del-ma').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_ma").val(0);
		$("#rek_nama_ma").val('');
		$("#rek_no_ma").val('');

	});

	$('#btn-rek-sk').on('click', function(e) {
		e.preventDefault();
		$("#rek_gol_sk").val(-2);

		$('#acclist_search').val('');
		var maable = $('#datatable_acclist').DataTable();
	    maable.draw();

		$('#show_account').modal('show');
		$("#id_btn").val(22);
	});

	$('#btn-del-sk').on('click', function(e) {
		e.preventDefault();
		
		$("#rek_gol_sk").val(0);
		$("#rek_nama_sk").val('');
		$("#rek_no_sk").val('');

	});

	$('#acc_btl').on('click', function(e) {
		e.preventDefault();

        $('#acclist_search').val('');
        $("#kat_pers_gol").val(0);

        var oTable = $('#datatable_acclist').DataTable();
        oTable.draw();
    });

    $('#acclist_searchbtn').on('click', function(e) {
    	e.preventDefault();

        var oTable = $('#datatable_acclist').DataTable();
        oTable.draw();
    });

    $("#acclist_search").on('keypress', function (e) {
	    if (e.key === 'Enter' || e.keyCode === 13) {
	    	e.preventDefault();
			var oTable = $('#datatable_acclist').DataTable();
        	oTable.draw();
	    }
	});

    function getAccNo(id_acc) {
		var id_btn = $('#id_btn').val();    		
		$.ajax({
			url: "<?php echo base_url("category/getAccount");?>",
			type: "POST",
			data: {
				id_acc : id_acc
			},
			cache: false,
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(id_btn == 1){
					$('#rek_no_ugr').val(dataResult.rek_no);
					$('#rek_nama_ugr').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 2){
					$('#rek_no_it').val(dataResult.rek_no);
					$('#rek_nama_it').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 3){
					$('#rek_no_ph').val(dataResult.rek_no);
					$('#rek_nama_ph').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 4){
					$('#rek_no_kh').val(dataResult.rek_no);
					$('#rek_nama_kh').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 5){
					$('#rek_no_hg').val(dataResult.rek_no);
					$('#rek_nama_hg').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 6){
					$('#rek_no_phg').val(dataResult.rek_no);
					$('#rek_nama_phg').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 7){
					$('#rek_no_ums').val(dataResult.rek_no);
					$('#rek_nama_ums').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 8){
					$('#rek_no_bk').val(dataResult.rek_no);
					$('#rek_nama_bk').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 9){
					$('#rek_no_ugi').val(dataResult.rek_no);
					$('#rek_nama_ugi').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 10){
					$('#rek_no_ot').val(dataResult.rek_no);
					$('#rek_nama_ot').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 11){
					$('#rek_no_kp').val(dataResult.rek_no);
					$('#rek_nama_kp').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 12){
					$('#rek_no_pg').val(dataResult.rek_no);
					$('#rek_nama_pg').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 13){
					$('#rek_no_pp').val(dataResult.rek_no);
					$('#rek_nama_pp').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 14){
					$('#rek_no_ppg').val(dataResult.rek_no);
					$('#rek_nama_ppg').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 15){
					$('#rek_no_umc').val(dataResult.rek_no);
					$('#rek_nama_umc').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 16){
					$('#rek_no_cn').val(dataResult.rek_no);
					$('#rek_nama_cn').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 17){
					$('#rek_no_tn').val(dataResult.rek_no);
					$('#rek_nama_tn').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 18){
					$('#rek_no_prive').val(dataResult.rek_no);
					$('#rek_nama_prive').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 19){
					$('#rek_no_lmb').val(dataResult.rek_no);
					$('#rek_nama_lmb').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 20){
					$('#rek_no_ltb').val(dataResult.rek_no);
					$('#rek_nama_ltb').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 21){
					$('#rek_no_ma').val(dataResult.rek_no);
					$('#rek_nama_ma').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}else if(id_btn == 22){
					$('#rek_no_sk').val(dataResult.rek_no);
					$('#rek_nama_sk').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				}
			},
			error:function(){
			}
		});

    	$('#id_kat').val(id_kat);
    	var $t = $(this),

		target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

		$(target)
			.find('input,textarea,select')
				.val('')
				.end()
			.find('input[type="checkbox"], input[type="radio"]')
				.prop("checked", false)
				.change();

		$.uniform.update();

		$('#show_account').modal('hide');

		return false;
	}

</script>
<!-- END JAVASCRIPTS -->
<?php
    $this->load->view("_partials/end_body.php");
?>