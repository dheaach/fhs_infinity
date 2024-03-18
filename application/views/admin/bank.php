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
						<strong>Daftar Bank</strong>
						</h3>
					</div>
					<div class="add-cat-nav col-sm-2">
						<a class="btn btn-sm green-seagreen" data-toggle="modal" id="59B"><i class="fa fa-plus"></i> Bank Baru</a>
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
						<a href="<?php echo base_url('bank');?>">Master Bank</a>
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
															 <strong>Bank Aktif</strong>
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
															 <strong>Bank Non-Aktif</strong>
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
													<a class="btn green-seagreen dropdown-toggle btn-rounded btn-sm btn-border btn-actcl" data-toggle="dropdown" href="#" id="59D">
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
													<a class="btn green-seagreen btn-sm btn-rounded-left btn-border" id="59E">
														Import
													</a>
													<div class="btn-group">
														<a class="btn green-seagreen dropdown-toggle btn-rounded-right btn-sm btn-border" data-toggle="dropdown" href="#" id="59F">
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
														<button type="button" id="search-btn-bank" class="btn btn-default advance-toggle  btn-rounded-right"><i class="fa fa-angle-down" id="search-icn-bank"></i></button>
														
														<div class="advance-search-toggle" id="search-toggle-bank" style="min-width:250px;display: none;">
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
																			<a class="" style="color:#777;text-decoration:none;" id="btn-rf-bank">Hapus Filter</a>
																		</div>
																		<div class="col-sm-6" style="margin: 30px 0px 0px 0px;color: #777;padding: 0px 15px 0px 0px;">
																			<a class="btn green-seagreen btn-rounded" style="display:block;" id="btn-sf-bank">
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
										
										<div class="tab-content" id="59A" style="display:none;">
											<div class="tab-pane fade active in" id="tab_2_1">
												<div class="table-scrollable" style="border: 0px solid #dddddd;">
													<div class="table-actions-wrapper">
													</div>
													<table class="table table-hover" id="datatable_bank">
														<thead class="thead-dark">
															<tr role="row" class="heading">
																<th width="1%" style="background-color: #367a9a!important;">
																	<input type="checkbox" class="group-checkable checkall" onclick="calc();">
																</th>
																<th width="5%" style="background-color: #367a9a!important;color:white!important;">
																	 Kode&nbsp;Bank
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Nama&nbsp;Bank
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Account
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
           
            EcommerceBank.init();
            AccountList.init();

            $('#59').addClass('active');
            
        });

        var is_valid =1;

        var countCheckedBank = function($table, checkboxClass) {
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

        function checkBank() {
		  var result = countCheckedBank($('#datatable_bank'), '.chk-bank');
		  
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
		        $('.chk-bank').prop('checked', this.checked);
		        var $checkboxes = $('.chk-bank');
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
		    var container = $("#search-toggle-bank");
		    var btn = $("#search-btn-bank");
		    var icn = $("#search-icn-bank");
		    var x = document.getElementById("search-toggle-bank");

		    // if the target of the click isn't the container nor a descendant of the container
		    if (!container.is(e.target) && container.has(e.target).length === 0 && !btn.is(e.target) && !icn.is(e.target)) 
		    {
		        $("#search-toggle-bank").hide();
		    }else if(btn.is(e.target) || icn.is(e.target)){
		    	
				if (x.style.display === "none") {
				  $("#search-toggle-bank").show();
				} else {
				  $("#search-toggle-bank").hide();
				}
		    }
		});

		function reload_page() {
			setTimeout(function(){
			   window.location.reload();
			}, 1600);
		}
		//function for save and edit
		function save_bank() {
			var id_bank = $('#id_bank').val();
			var type = 1;

			if(id_bank !=""){
				type = 2;
			}

			var kode = $('#kode_bank').val();
			var nama = $('#nama_bank').val();
			var rek_no = $('#rek_no_bank').val();
			var is_active = $('#is_act_bank').prop('checked');
			var is_non = $('#is_non_bank').prop('checked');
			var is_jual = $('#is_jual_bank').prop('checked');

			is_jual = (is_jual == true) ? 1 : 0;

			if(is_active == true && is_non == false){
				var status = 0;
			}else{
				var status = 1;
			}

			if(kode!="" && nama!="" && rek_no!="" &&  (is_active !="" || is_non !="")){
				$("#btn-s-bank").attr("disabled", "disabled");
				$("#btn-rs-bank").attr("disabled", "disabled");
				$("#btn-r-bank").attr("disabled", "disabled");
				$.ajax({
					url: "<?php echo base_url("bank/action_bank");?>",
					type: "POST",
					data: {
						type: type,
						id_bank : id_bank,
						kode: kode,
						nama: nama,
						is_jual: is_jual,
						rek_no: rek_no,
						status : status
					},
					cache: false,
					success: function(dataResult){
						
						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							$("#btn-s-bank").removeAttr("disabled");
							$("#btn-rs-bank").removeAttr("disabled");
							$("#btn-r-bank").removeAttr("disabled");
							$('#frm-bank').find('input:text').val('');
							$("#success").show();
							$('#success').html('Data berhasil ditambahkan!');
							$("#success").fadeTo(1500, 500).slideUp(500, function() {
			                	$("#success").slideUp(500);
			                });	

			                is_valid = 1;		
						}else if(dataResult.statusCode==201){
							$("#btn-s-bank").removeAttr("disabled");
							$("#btn-rs-bank").removeAttr("disabled");
							$("#btn-r-bank").removeAttr("disabled");
							$('#frm-bank').find('input:text').val('');
						    $("#success").show();
							$('#success').html('Data berhasil diubah!');
							$("#success").fadeTo(1500, 500).slideUp(500, function() {
			                	$("#success").slideUp(500);
			                });	

			                $.uniform.update();

			                is_valid = 1;
			                
						}else if(dataResult.statusCode==405){
							$("#btn-s-bank").removeAttr("disabled");
							$("#btn-rs-bank").removeAttr("disabled");
							$("#btn-r-bank").removeAttr("disabled");
							alert('Username sudah digunakan!Ganti username lain!');
						}
					},
					error: function() {
						$("#btn-s-bank").removeAttr("disabled");
						$("#btn-rs-bank").removeAttr("disabled");
						$("#btn-r-bank").removeAttr("disabled");
						$('#frm-bank').find('input:text').val('');
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
				if(kode ==""){
					$("#btn-s-bank").removeAttr("disabled");
					$("#btn-rs-bank").removeAttr("disabled");
					$("#btn-r-bank").removeAttr("disabled");
					$("#validation-bank").show();
					$('#validation-bank').html('Kode Bank harus diisi!');
					$("#validation-bank").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-bank").slideUp(500);
	                });	
				}else if (nama =="") {
					$("#btn-s-bank").removeAttr("disabled");
					$("#btn-rs-bank").removeAttr("disabled");
					$("#btn-r-bank").removeAttr("disabled");
					$("#validation-bank").show();
					$('#validation-bank').html('Nama Bank harus diisi!');
					$("#validation-bank").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-bank").slideUp(500);
	                });	
				}else{
					$("#btn-s-bank").removeAttr("disabled");
					$("#btn-rs-bank").removeAttr("disabled");
					$("#btn-r-bank").removeAttr("disabled");
					$("#validation-bank").show();
					$('#validation-bank').html('Harap isi semua data yang dibutuhkan!');
					$("#validation-bank").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-bank").slideUp(500);
	                });
				}
				
                is_valid = 0;
			}
		}

		//action btn save
		$('#btn-s-bank').on('click', function(e) {
			e.preventDefault();

			save_bank();

			var kode = $('#kode_bank').val();
			var nama = $('#nama_bank').val();
			var rek_no = $('#rek_no_bank').val();
			
			var is_active = $('#is_act_bank').prop('checked');
			var is_non = $('#is_non_bank').prop('checked');
			if(is_active == true && is_non == false){
				var status = 0;
			}else{
				var status = 1;
			}

			if(kode!="" && nama!="" &&  (is_active !="" || is_non !="" ) && rek_no !=""){
				var oTable = $('#datatable_bank').DataTable();
				oTable.draw();

				$('#add_bank').modal('hide');
				$.uniform.update();	
			}else{
				if(kode ==""){
					$("#btn-s-bank").removeAttr("disabled");
					$("#btn-rs-bank").removeAttr("disabled");
					$("#btn-r-bank").removeAttr("disabled");
					$("#validation-bank").show();
					$('#validation-bank').html('Kode Bank harus diisi!');
					$("#validation-bank").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-bank").slideUp(500);
	                });	
				}else if (nama =="") {
					$("#btn-s-bank").removeAttr("disabled");
					$("#btn-rs-bank").removeAttr("disabled");
					$("#btn-r-bank").removeAttr("disabled");
					$("#validation-bank").show();
					$('#validation-bank').html('Nama Bank harus diisi!');
					$("#validation-bank").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-bank").slideUp(500);
	                });	
				}else if (rek_no =="") {
					$("#btn-s-bank").removeAttr("disabled");
					$("#btn-rs-bank").removeAttr("disabled");
					$("#btn-r-bank").removeAttr("disabled");
					$("#validation-bank").show();
					$('#validation-bank').html('Branch harus diisi!');
					$("#validation-bank").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-bank").slideUp(500);
	                });	
				}else{
					$("#btn-s-bank").removeAttr("disabled");
					$("#btn-rs-bank").removeAttr("disabled");
					$("#btn-r-bank").removeAttr("disabled");
					$("#validation-bank").show();
					$('#validation-bank').html('Harap isi semua data yang dibutuhkan!');
					$("#validation-bank").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-bank").slideUp(500);
	                });
				}
				
                is_valid = 0;
			}
			
		});

		//action btn save and add new
		$('#btn-rs-bank').on('click', function(e) {
			e.preventDefault();
			save_bank();
			if(is_valid != 0){
				$("#validation-s-bank").show();
				$('#validation-s-bank').html('Data berhasil ditambahkan!');
				$("#validation-s-bank").fadeTo(2000, 500).slideUp(500, function() {
                	$("#validation-s-bank").slideUp(500);
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
		$('#btn-r-bank').on('click', function(e) {
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

		$('#59F').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		$('#59E').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		$('#59D').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		// action edit clicked row
		function cae_bank(id_bank) {
			var x = document.getElementById("59C");
			if(check_user_right(x.id) == 0){
				$('#modal_unauthorized').modal('show');
			}else{
	            // Set data to Form Edit
	            $('#id_bank').val(id_bank);
	            $.ajax({
					url: "<?php echo base_url("bank/get_edit_data");?>",
					type: "POST",
					data: {
						id_bank: id_bank
					},
					cache: false,
					success: function(dataResult){
						// console.log(dataResult);
						var json_data = JSON.parse(dataResult);
						
						$('#id_bank').val(json_data.bank_no);
						$('#kode_bank').val(json_data.bank_code);
						$('#nama_bank').val(json_data.bank_name);
						$('#rek_no_bank').val(json_data.rek_no);
						$('#is_jual_bank').prop('checked',json_data.is_jual);
						$('#rek_bank_nama').val(json_data.rek_kode+" - "+json_data.rek_nama);

						var status = json_data.status;

						// console.log(status);
						if(status == 0 ){
							$('#is_act_bank').prop('checked', true);
							$('#is_non_bank').prop('checked', false);
						}else{
							$('#is_act_bank').prop('checked', false);
							$('#is_non_bank').prop('checked', true);
						}

						$.uniform.update();
					}
				});

				$('#add_bank').modal('show');
			}
		}

		$('#59B').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}else{
				$('#is_act_bank').attr('checked', true);
				$('#is_act_bank').closest('span').addClass('checked');
				$('#is_non_bank').attr('checked', false);
				$('#is_non_bank').closest('span').removeClass('checked');

				$('#add_bank').modal('show');
			}		
		});

		//btn delete item
		$('#btn-h-akses').on('click', function() {
			// Get userid from checked checkboxes
				var bank_arr = [];
				$(".chk-bank:checked").each(function(){
					var varid = $(this).val();

					bank_arr.push(varid);
				});

				// Array length
				var length = bank_arr.length;

				if(length > 0){

				// AJAX request
					$.ajax({
						url: "<?php echo base_url("bank/action_bank");?>",
						type: "POST",
						data: {
							type: 3,
							id_bank : bank_arr
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
		function search_bank() {
			var keyword = $("#keyword").val();
			if(keyword==''){
				keyword = 'none';
			}else{
				keyword  = keyword.replace(/ /g,"_");
			}
			
			var is_ar = $("#chk-arsip").prop("checked");
			var urlist = "<?php echo base_url('bank/page');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + keyword + "/" + is_ar + "/"
		    );
		    location.href = url.href;
		}

		//action btn arsip
		$('#btn-a-akses').on('click', function() {
			// Get userid from checked checkboxes
				var bank_arr = [];
				$(".chk-bank:checked").each(function(){
					var varid = $(this).val();

					bank_arr.push(varid);
				});

				// Array length
				var length = bank_arr.length;

				if(length > 0){

				// AJAX request
					$.ajax({
						url: "<?php echo base_url("bank/action_bank");?>",
						type: "POST",
						data: {
							type: 4,
							id_bank : bank_arr
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
		$('#btn-rf-bank').on('click', function(e) {
			$('#chk-arsip').prop("checked", false);
			$('#keyword').val("");
			$('#keyword-front').val("");

			$.uniform.update();

			search_bank();

		});

		//action btn cari
		$('#btn-sf-bank').on('click', function(e) {
			search_bank();
		});

		//action ketika enter search bar
		$("#keyword-front").on('keyup', function (e) {
		    if (e.key === 'Enter' || e.keyCode === 13) {
				var keyword = $("#keyword-front").val();
		    	$("#keyword").val(keyword);
		        search_bank();
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
			var urlist = "<?php echo base_url('bank/print_pdf');?>";
			
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
			var urlist = "<?php echo base_url('bank/print_csv');?>";
			
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
			var urlist = "<?php echo base_url('bank/print_exc');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + keyword + "/" + is_ar + "/"
		    );
		 	window.open(url);
		});

		$('#btn-b-bank').on('click', function(e) {
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
			$('#add_bank').modal('hide');
			var oTable = $('#datatable_bank').DataTable();
			oTable.draw();
		});

		$('#btn-bank-acc').on('click', function(e) {
			e.preventDefault();
			$("#rek_bank_gol").val(-2);

			$('#acclist_search').val('');
			var oTable = $('#datatable_acclist').DataTable();
            oTable.draw();

			$('#show_account').modal('show');
		});

		$('#acc_btl').on('click', function(e) {
			e.preventDefault();

            $('#acclist_search').val('');
            $("#rek_bank_gol").val(0);

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

    		// e.preventDefault();   		
    		$.ajax({
				url: "<?php echo base_url("category/getAccount");?>",
				type: "POST",
				data: {
					id_acc : id_acc
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					$('#rek_no_bank').val(dataResult.rek_no);
					$('#rek_bank_nama').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
				},
				error:function(){
				}
			});

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
    	}
</script>
<!-- END JAVASCRIPTS -->
<?php
    $this->load->view("_partials/end_body.php");
?>