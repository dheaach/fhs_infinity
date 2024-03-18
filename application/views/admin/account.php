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
						<strong>Daftar Account</strong>
						</h3>
					</div>
					<div class="add-sub-cat-nav col-sm-2">
						<a class="btn btn-sm green-seagreen" data-toggle="modal" id="58B"><i class="fa fa-plus"></i> Account Baru</a>
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
						<a href="<?php echo base_url('account');?>">Master Account</a>
					</li>
				</ul>
			</div>
			<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
			</div>
			<div class="alert alert-danger alert-dismissible" id="failed" style="display:none;">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
			</div>
			<!-- BEGIN PAGE CONTENT -->
			<div class="row mycard">
				<div class="col-md-12">
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-body">
							<div class="tabbable-line">
								<div class="tab-content">
									<div class="tab-pane active" id="tab_15_1">
										<div class="row">
											<h5 class="page-title title-tab">
											<strong>Ringkasan</strong>
											</h5>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
												<div class="dashboard-stat db-table">
													<div class="visual db-ic">
														<i class="fa fa-cube fa-icon-medium"></i>
													</div>
													<div class="details db-lbl ">
														<div class="number db-number">
															 <?php
																if( !empty($grp_aktif) ) {
																	foreach($grp_aktif as $ua) {
																		echo"<strong>".$ua->aktif." Jenis</strong>";
																	}
																}
															?>
														</div>
														<div class="desc db-desc">
															 <strong>Account Aktif</strong>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
												<div class="dashboard-stat db-table">
													<div class="visual db-ic">
														<i class="fa fa-cube fa-icon-medium"></i>
													</div>
													<div class="details db-lbl ">
														<div class="number db-number">
															 <?php
																if( !empty($grp_non) ) {
																	foreach($grp_non as $ua) {
																		echo"<strong>".$ua->non." Jenis</strong>";
																	}
																}
															?>
														</div>
														<div class="desc db-desc">
															 <strong>Account Non-Aktif</strong>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<!--< ul class="nav nav-pills">
													<li class="active">
														<a href="#tab_2_1" data-toggle="tab" class="btn green-seagreen btn-sm btn-rounded-left btn-border">
														Kategori </a>
													</li>
													<li>
														<a href="#tab_2_2" data-toggle="tab" class="btn green-seagreen btn-sm btn-rounded-right btn-border">
														Sub-Kategori </a>
													</li>
												</ul> -->
												<div class="btn-group" id="btn_act" style="display:none;">
													<a class="btn green-seagreen dropdown-toggle btn-rounded btn-sm btn-border btn-actcl" data-toggle="dropdown" href="#" id="58D">
													Aksi
													</a>
													<ul class="dropdown-menu pull-left dropdown-action">
														<!-- <li>
															<a class="user-target" data-toggle="modal" href="#ars_akses">
															Arsip </a>
														</li> -->
														<li>
															<a class="user-target" data-toggle="modal" href="#del_akses">
															Hapus </a>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-sm-3 pdg-btn">
												<div class="btn-group">
													<a class="btn green-seagreen btn-sm btn-rounded-left btn-border" id="58E">
														Import
													</a>
													<div class="btn-group">
														<a class="btn green-seagreen dropdown-toggle btn-rounded-right btn-sm btn-border" data-toggle="dropdown" href="#" id="58F">
														Eksport
														</a>
														<ul class="dropdown-menu pull-right">
															<!-- <li>
																<a href="#" id="btn-exc-grp">
																Export to Excel </a>
															</li> -->
															<li>
																<a href="#" id="btn-csv-grp">
																Export to Excel </a>
															</li>
															<li>
																<a href="#" id="btn-pdf-grp">
																Export to PDF </a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="col-sm-3 pdg-search">
												<div class="input-group">
													<div class="input-icon">
														<i class="fa fa-search"></i>
														<input type="text" class="form-control input-rounded-left" id="keyword-front" value="<?php echo $keyw;?>">
													</div>
													<div class="input-group-btn">
														<button type="button" id="search-btn-account" class="btn btn-default advance-toggle  btn-rounded-right"><i class="fa fa-angle-down" id="search-icn-account"></i></button>
														
														<div class="advance-search-toggle" id="search-toggle-account" style="min-width:250px;display: none;">
															<div class="row">
																<div class="col-sm-12" style="margin:12px 5px 15px;padding-right: 23px;">
																	<div class="form-group">
																		<label class="col-md-12 control-label" style="margin-top:10px;color:#777;">Kata Kunci</label>
																		<div class="col-md-12">
																			<input type="text" class="form-control input-sm dropdown-input" name="keyword" id="keyword" placeholder="" value="<?php echo $keyw;?>">
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-md-9 control-label" style="margin-top:10px;color:#777;">Tampilkan Arsip</label>
																		<div class="col-md-3" style="margin-top:10px;">
																			<input type="checkbox" class="form-control input-sm" name="chk-arsip" id="chk-arsip" <?php if($is_arc <>'' || $is_arc <> false){echo 'checked';}?>>
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-sm-6" style="margin: 30px 0px 0px 0px;padding: 3px 8px 0px 15px;text-align: right;">
																			<a class="" style="color:#777;text-decoration:none;" id="btn-rf-account">Hapus Filter</a>
																		</div>
																		<div class="col-sm-6" style="margin: 30px 0px 0px 0px;color: #777;padding: 0px 15px 0px 0px;">
																			<a class="btn green-seagreen btn-rounded" style="display:block;" id="btn-sf-account">
																				Cari
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="tab-content" id="58A" style="display:none;">
											<div class="tab-pane fade active in" id="tab_2_1">
												<div class="table-scrollable" style="border: 0px solid #dddddd;">
													<div class="table-actions-wrapper">
													</div>
													<table class="table table-hover" id="datatable_account">
														<thead class="thead-dark">
															<tr role="row" class="heading">
																<th width="1%" style="background-color: #367a9a!important;">
																	<input type="checkbox" class="group-checkable checkall" onclick="calc();">
																</th>
																<th width="5%" style="background-color: #367a9a!important;color:white!important;">
																	 Kode&nbsp;Account
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Nama&nbsp;Account
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Klasifikasi
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Keterangan
																</th>
															</tr>
															
														</thead>
														<tbody>
														</tbody>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="tab_2_2">
												<p id="myText"></p>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<!-- End: life time stats -->
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
           
            EcommerceAccount.init();
            AccountList.init();

            $('#58').addClass('active');
            
        });

        var is_valid =1;

        var countCheckedAccount = function($table, checkboxClass) {
		  if ($table) {
		    // Find all elements with given class
		    var chkAll = $table.find(checkboxClass);
		    // Count checked checkboxes
		    var checked = chkAll.filter(':checked').length;
		    // Count total
		    var total = chkAll.length;    
		    // Return an object with total and checked values
		    return {
		      total: total,
		      checked: checked
		    }
		  }
		}

        function checkAccount() {
		  var result = countCheckedAccount($('#datatable_account'), '.chk-account');
		  
		  $('#myText').html(result.checked);
		  var p = document.getElementById('myText');
		  var text = p.textContent;
		  var number = Number(text);

		  if (number > 0){
		    btn_act.style.display = "block";
		  } else {
		    btn_act.style.display = "none";
		  }
		}

		function calc()
		{
			$('.checkall').click(function (event) {    
		        $('.chk-account').prop('checked', this.checked);
		        var $checkboxes = $('.chk-account');
		        var number = $checkboxes.filter(':checked').length;
		        
		        var p = document.getElementById('myText');
		  		
		        if (number > 0){
				    btn_act.style.display = "block";
				  } else {
				    btn_act.style.display = "none";
				  }
		    });
		}

		$(document).mouseup(function(e) 
		{
		    var container = $("#search-toggle-account");
		    var btn = $("#search-btn-account");
		    var icn = $("#search-icn-account");
		    var x = document.getElementById("search-toggle-account");

		    // if the target of the click isn't the container nor a descendant of the container
		    if (!container.is(e.target) && container.has(e.target).length === 0 && !btn.is(e.target) && !icn.is(e.target)) 
		    {
		        $("#search-toggle-account").hide();
		    }else if(btn.is(e.target) || icn.is(e.target)){
		    	
				if (x.style.display === "none") {
				  $("#search-toggle-account").show();
				} else {
				  $("#search-toggle-account").hide();
				}
		    }
		});

		function reload_page() {
			setTimeout(function(){
			   window.location.reload();
			}, 1600);
		}
		//function for save and edit
		function save_account() {
			var id_rek = $('#id_rek').val();
			var type = 1;

			if(id_rek !=""){
				type = 2;
			}

			var rek_kode_head = $('#rek_kode_head').val();
			var rek_kode_sub = $('#rek_kode_sub').val();
			var rek_kode_id = $('#rek_kode_id').val();
			var rek_kode_rin = $('#rek_kode_rin').val();
			var rek_kode = rek_kode_head+rek_kode_sub+rek_kode_id+rek_kode_rin;
			var rek_nama = $('#rek_nama').val();
			var cab_no = $('#cab_no').val();
			var rek_type = 0;
			var is_sub_acc = $('#is_sub_acc').prop('checked');
			var is_id_acc = $('#is_id_acc').prop('checked');
			var is_rin_acc = $('#is_rin_acc').prop('checked');
			
			if(is_sub_acc == true){
				rek_type = 1;
			}else if(is_id_acc == true){
				rek_type = 2;
			}else if(is_rin_acc == true){
				rek_type = 3;
			}
			
			var rek_gol = $('#rek_gol').val();
			var ket1 = $('#ket1').val();
			var is_kas = $('#is_kas').prop('checked');
				
			var is_active = $('#is_act_account').prop('checked');

			is_kas = (is_kas == true) ? 1 : 0;
			rek_gol  = rek_gol + 1;

			if(is_active == true){
				var status = 0;
			}else{
				var status = 1;
			}

			if(rek_nama!=""){
				$("#btn-s-account").attr("disabled", "disabled");
				$("#btn-rs-account").attr("disabled", "disabled");
				$("#btn-r-account").attr("disabled", "disabled");
				$.ajax({
					url: "<?php echo base_url("account/action_account");?>",
					type: "POST",
					data: {
						type: type,
						id_rek : id_rek,
						rek_kode : rek_kode,
						rek_nama : rek_nama,
						cab_no : cab_no,
						rek_type : rek_type,
						rek_gol : rek_gol,
						ket1 : ket1,
						is_kas : is_kas,
						status : status
					},
					cache: false,
					success: function(dataResult){
						
						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							$("#btn-s-account").removeAttr("disabled");
							$("#btn-rs-account").removeAttr("disabled");
							$("#btn-r-account").removeAttr("disabled");
							$('#frm-account').find('input:text').val('');
							$("#success").show();
							$('#success').html('Data berhasil ditambahkan!');
							$("#success").fadeTo(1500, 500).slideUp(500, function() {
			                	$("#success").slideUp(500);
			                });	

			                is_valid = 1;		
						}else if(dataResult.statusCode==201){
							$("#btn-s-account").removeAttr("disabled");
							$("#btn-rs-account").removeAttr("disabled");
							$("#btn-r-account").removeAttr("disabled");
							$('#frm-account').find('input:text').val('');
						    $("#success").show();
							$('#success').html('Data berhasil diubah!');
							$("#success").fadeTo(1500, 500).slideUp(500, function() {
			                	$("#success").slideUp(500);
			                });	

			                $.uniform.update();

			                is_valid = 1;
			                
						}else if(dataResult.statusCode==405){
							$("#btn-s-account").removeAttr("disabled");
							$("#btn-rs-account").removeAttr("disabled");
							$("#btn-r-account").removeAttr("disabled");
							alert('Username sudah digunakan!Ganti username lain!');
						}
					},
					error: function() {
						$("#btn-s-account").removeAttr("disabled");
						$("#btn-rs-account").removeAttr("disabled");
						$("#btn-r-account").removeAttr("disabled");
						$('#frm-account').find('input:text').val('');
						$("#failed").show();
						$('#failed').html('Gagal melakukan aksi!');
						$("#failed").fadeTo(2000, 500).slideUp(500, function() {
		                	$("#failed").slideUp(500);
		                });

		                $.uniform.update();
		                reload_page();
					}
				});

			}else{
				if (rek_kode =="") {
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('Kode Account harus diisi!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });	
				}else if (rek_nama =="") {
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('Nama Account harus diisi!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });	
				}else if (cab_no =="") {
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('Alamat Account harus diisi!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });	
				}else if (rek_type =="") {
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('No. Telp Account harus diisi!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });	
				}else{
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('Harap isi semua data yang dibutuhkan!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });
				}
				
                is_valid = 0;
			}
		}

		//action btn save
		$('#btn-s-account').on('click', function(e) {
			e.preventDefault();

			save_account();

			var rek_kode_sub = $('#rek_kode_sub').val();
			var rek_kode_id = $('#rek_kode_id').val();
			var rek_kode_rin = $('#rek_kode_rin').val();
			var rek_nama = $('#rek_nama').val();
			var cab_no = $('#cab_no').val();
			var rek_type = $('#rek_type').val();
			var ket1 = $('#ket1').val();

			var is_active = $('#is_act_account').prop('checked');
			if(is_active == true){
				var status = 0;
			}else{
				var status = 1;
			}

			if(rek_kode_sub!="" && rek_kode_id!="" && rek_kode_rin!="" && rek_nama!="" && cab_no!="" && rek_type!=""){
				var oTable = $('#datatable_account').DataTable();
				oTable.draw();

				$('#add_account').modal('hide');
				$.uniform.update();	
			}else{
				if (rek_kode_sub =="0" || rek_kode_sub =="00" || rek_kode_sub =="000" || rek_kode_sub =="000") {
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('Kode Account harus diisi!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });	
				}else if (rek_nama =="") {
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('Nama Account harus diisi!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });	
				}else if (cab_no =="") {
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('Alamat Account harus diisi!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });	
				}else if (rek_type =="") {
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('No. Telp Account harus diisi!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });	
				}else{
					$("#btn-s-account").removeAttr("disabled");
					$("#btn-rs-account").removeAttr("disabled");
					$("#btn-r-account").removeAttr("disabled");
					$("#validation-account").show();
					$('#validation-account').html('Harap isi semua data yang dibutuhkan!');
					$("#validation-account").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-account").slideUp(500);
	                });
				}
				
                is_valid = 0;
			}
			
		});

		//action btn save and add new
		$('#btn-rs-account').on('click', function(e) {
			e.preventDefault();
			save_account();
			if(is_valid != 0){
				$("#validation-s-account").show();
				$('#validation-s-account').html('Data berhasil ditambahkan!');
				$("#validation-s-account").fadeTo(2000, 500).slideUp(500, function() {
                	$("#validation-s-account").slideUp(500);
                });
			}
			var $t = $(this),
			target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

			$(target)
				.find("input,textarea,select")
					.val('')
					.end()
				.find("input[type=checkbox], input[type=radio]")
					.prop("checked", "")
					.end();
			$.uniform.update();
		});

		//action btn reset
		$('#btn-r-account').on('click', function(e) {
			e.preventDefault();
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
		});

		$('#58F').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		$('#58E').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		$('#58D').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		// action edit clicked row
		function cae_account(id_rek) {
			var x = document.getElementById("58C");
			if(check_user_right(x.id) == 0){
				$('#modal_unauthorized').modal('show');
			}else{
	            // Set data to Form Edit
	            $('#id_rek').val(id_rek);
	            $.ajax({
					url: "<?php echo base_url("account/get_edit_data");?>",
					type: "POST",
					data: {
						id_rek: id_rek
					},
					cache: false,
					success: function(dataResult){
						// console.log(dataResult);
						var json_data = JSON.parse(dataResult);
						var rek_gol = json_data.rek_gol;
						rek_gol = rek_gol - 1;
						$('#id_rek').val(json_data.rek_no);
						$('#rek_gol').val(rek_gol).trigger('change');
						$('#rek_kode_sub').val(json_data.rek_kode_sub);
						$('#rek_kode_id').val(json_data.rek_kode_id);
						$('#rek_kode_rin').val(json_data.rek_kode_rin);
						$('#rek_nama').val(json_data.rek_nama);
						$('#cab_no').val(json_data.cab_no).trigger('change');
						if(json_data.rek_type == 1){
							$('#is_sub_acc').prop('checked', true).trigger('change');
						}else if(json_data.rek_type == 2){
							$('#is_id_acc').prop('checked', true).trigger('change');
						}else if(json_data.rek_type == 3){
							$('#is_rin_acc').prop('checked', true).trigger('change');
						}
						
						$('#ket1').val(json_data.ket1);
						$('#is_kas').prop('checked',json_data.is_kas);

						var status = json_data.status;

						// console.log(status);
						if(status == 0 ){
							$('#is_act_account').prop('checked', true);
						}else{
							$('#is_act_account').prop('checked', false);
						}

						$.uniform.update();
					}
				});

				$('#add_account').modal('show');
			}
		}

		$('#58B').on('click', function() {
				
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}else{
				$('#is_act_account').attr('checked', true);
				$('#is_act_account').closest('span').addClass('checked');
				$('#rek_gol').val(0).trigger('change');
				$('#is_sub_acc').prop('checked', true).trigger('change');
				$('#is_sub_acc').closest('span').addClass('checked');
				$("#rek_kode_sub").val("00");
				$("#rek_kode_id").val("000");
				$("#rek_kode_rin").val("000");
				
				$('#add_account').modal('show');	
			}		
		});

		$("#rek_gol").change(function () {
			var rek_gol = $("#rek_gol").val();
			rek_gol = Number(rek_gol) + 1;
			$("#rek_kode_head").val(rek_gol);
		});

		$("#is_sub_acc").change(function () {
			$("#rek_kode_sub").prop('disabled', false);
	    	$("#rek_kode_id").prop('disabled', true);
	    	$("#rek_kode_rin").prop('disabled', true);	
		});

		$("#is_id_acc").change(function () {
			$("#rek_kode_sub").prop('disabled', false);
	    	$("#rek_kode_id").prop('disabled', false);
	    	$("#rek_kode_rin").prop('disabled', true);	
		});

		$("#is_rin_acc").change(function () {
			$("#rek_kode_sub").prop('disabled', false);
	    	$("#rek_kode_id").prop('disabled', false);
	    	$("#rek_kode_rin").prop('disabled', false);
		});
		
		$('#rek_kode_sub').on('keypress', function(e){
			var keyCode = e.which;
			var letter = String.fromCharCode(keyCode).toLowerCase();
			var isAlpha = /^[a-z]+$/i.test(letter);
			var length = this.value.length;
			if(isAlpha || length > 1) {
				e.preventDefault();
			}
		});

		$('#rek_kode_id').on('keypress', function(e){
			var keyCode = e.which;
			var letter = String.fromCharCode(keyCode).toLowerCase();
			var isAlpha = /^[a-z]+$/i.test(letter);
			var length = this.value.length;
			if(isAlpha || length > 2) {
				e.preventDefault();
			}
		});

		$('#rek_kode_rin').on('keypress', function(e){
			var keyCode = e.which;
			var letter = String.fromCharCode(keyCode).toLowerCase();
			var isAlpha = /^[a-z]+$/i.test(letter);
			var length = this.value.length;
			if(isAlpha || length > 2) {
				e.preventDefault();
			}
		});

		$('#btn-h-akses').on('click', function() {
			// Get userid from checked checkboxes
				var account_arr = [];
				$(".chk-account:checked").each(function(){
					var varid = $(this).val();

					account_arr.push(varid);
				});

				// Array length
				var length = account_arr.length;

				if(length > 0){

				// AJAX request
					$.ajax({
						url: "<?php echo base_url("account/action_account");?>",
						type: "POST",
						data: {
							type: 3,
							id_rek : account_arr
						},
						cache: false,
						success: function(dataResult){

							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==202){
							    $("#success").show();
								$('#success').html('Data berhasil dihapus!');
								$("#success").fadeTo(1500, 500).slideUp(500, function() {
				                	$("#success").slideUp(500);
				                });
							}
						},
						error: function() {
							$("#failed").show();
							$('#failed').html('Gagal melakukan aksi!');
							$("#failed").fadeTo(2000, 500).slideUp(500, function() {
			                	$("#failed").slideUp(500);
			                });
						}
					});
					$('#del_akses').modal('hide');

					setTimeout(function(){
					   window.location.reload();
					}, 1600);
				}
		});

		//function search akses
		function search_account() {
			var keyword = $("#keyword").val();
			if(keyword==''){
				keyword = 'none';
			}else{
				keyword  = keyword.replace(/ /g,"_");
			}
			
			var is_ar = $("#chk-arsip").prop("checked");
			var urlist = "<?php echo base_url('account/page');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + keyword + "/" + is_ar + "/"
		    );
		    location.href = url.href;
		}

		//action btn arsip
		$('#btn-a-akses').on('click', function() {
			// Get userid from checked checkboxes
				var account_arr = [];
				$(".chk-account:checked").each(function(){
					var varid = $(this).val();

					account_arr.push(varid);
				});

				// Array length
				var length = account_arr.length;

				if(length > 0){

				// AJAX request
					$.ajax({
						url: "<?php echo base_url("account/action_account");?>",
						type: "POST",
						data: {
							type: 4,
							id_rek : account_arr
						},
						cache: false,
						success: function(dataResult){

							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==202){
							    $("#success").show();
								$('#success').html('Data berhasil diarsipkan!');
								$("#success").fadeTo(1500, 500).slideUp(500, function() {
				                	$("#success").slideUp(500);
				                });
							}
						},
						error: function() {
							$("#failed").show();
							$('#failed').html('Gagal melakukan aksi!');
							$("#failed").fadeTo(2000, 500).slideUp(500, function() {
			                	$("#failed").slideUp(500);
			                });
						}
					});
					$('#del_akses').modal('hide');

					setTimeout(function(){
					   window.location.reload();
					}, 1600);
				}
		});

		//action btn reset filter
		$('#btn-rf-account').on('click', function(e) {
			$('#chk-arsip').prop("checked", false);
			$('#keyword').val("");
			$('#keyword-front').val("");

			$.uniform.update();

			search_account();

		});

		//action btn cari
		$('#btn-sf-account').on('click', function(e) {
			search_account();
		});

		//action ketika enter search bar
		$("#keyword-front").on('keyup', function (e) {
		    if (e.key === 'Enter' || e.keyCode === 13) {
				var keyword = $("#keyword-front").val();
		    	$("#keyword").val(keyword);
		        search_account();
		    }
		});

		$(document).on('click', '#btn-pdf-grp', function(e){
		 	e.preventDefault();
		 	var keyword = $("#keyword").val();
			if(keyword==''){
				keyword = 'none';
			}else{
				keyword  = keyword.replace(/ /g,"_");
			}
			
			var is_ar = $("#chk-arsip").prop("checked");
			var urlist = "<?php echo base_url('account/print_pdf');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + keyword + "/" + is_ar + "/"
		    );
		 	window.open(url);
		});

		$(document).on('click', '#btn-csv-grp', function(e){
		 	e.preventDefault();
		 	var keyword = $("#keyword").val();
			if(keyword==''){
				keyword = 'none';
			}else{
				keyword  = keyword.replace(/ /g,"_");
			}
			
			var is_ar = $("#chk-arsip").prop("checked");
			var urlist = "<?php echo base_url('account/print_csv');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + keyword + "/" + is_ar + "/"
		    );
		 	window.open(url);
		});

		$(document).on('click', '#btn-exc-grp', function(e){
		 	e.preventDefault();
		 	var keyword = $("#keyword").val();
			if(keyword==''){
				keyword = 'none';
			}else{
				keyword  = keyword.replace(/ /g,"_");
			}
			
			var is_ar = $("#chk-arsip").prop("checked");
			var urlist = "<?php echo base_url('account/print_exc');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + keyword + "/" + is_ar + "/"
		    );
		 	window.open(url);
		});

		$('#btn-b-account').on('click', function(e) {
			e.preventDefault();
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
			$('#add_account').modal('hide');
			var oTable = $('#datatable_account').DataTable();
			oTable.draw();
		});
		
</script>
<!-- END JAVASCRIPTS -->
<?php
    $this->load->view("_partials/end_body.php");
?>