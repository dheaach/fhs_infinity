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
						<strong>Daftar Supplier</strong>
						</h3>
					</div>
					<div class="add-sub-cat-nav col-sm-2">
						<a class="btn btn-sm green-seagreen" data-toggle="modal" id="54B"><i class="fa fa-plus"></i> Supplier Baru</a>
						<input type="hidden" id="id_page" value="54">
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
						<a href="<?php echo base_url('supplier');?>">Master Supplier</a>
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
															 <strong>Supplier Aktif</strong>
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
															 <strong>Supplier Non-Aktif</strong>
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
													<a class="btn green-seagreen dropdown-toggle btn-rounded btn-sm btn-border btn-actcl" data-toggle="dropdown" href="#" id="54D">
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
													<a class="btn green-seagreen btn-sm btn-rounded-left btn-border" id="54E">
														Import
													</a>
													<div class="btn-group">
														<a class="btn green-seagreen dropdown-toggle btn-rounded-right btn-sm btn-border" data-toggle="dropdown" href="#" id="54F">
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
														<button type="button" id="search-btn-supplier" class="btn btn-default advance-toggle  btn-rounded-right"><i class="fa fa-angle-down" id="search-icn-supplier"></i></button>
														
														<div class="advance-search-toggle" id="search-toggle-supplier" style="min-width:250px;display: none;">
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
																			<a class="" style="color:#777;text-decoration:none;" id="btn-rf-supplier">Hapus Filter</a>
																		</div>
																		<div class="col-sm-6" style="margin: 30px 0px 0px 0px;color: #777;padding: 0px 15px 0px 0px;">
																			<a class="btn green-seagreen btn-rounded" style="display:block;" id="btn-sf-supplier">
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
										
										<div class="tab-content" id="54A" style="display:none;">
											<div class="tab-pane fade active in" id="tab_2_1">
												<div class="table-scrollable" style="border: 0px solid #dddddd;">
													<div class="table-actions-wrapper">
													</div>
													<table class="table table-hover" id="datatable_supplier">
														<thead class="thead-dark">
															<tr role="row" class="heading">
																<th width="1%" style="background-color: #367a9a!important;">
																	<input type="checkbox" class="group-checkable checkall" onclick="calc();">
																</th>
																<th width="5%" style="background-color: #367a9a!important;color:white!important;">
																	 Kode&nbsp;Supplier
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Nama&nbsp;Supplier
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Contact
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Telepon
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Alamat
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
           
            EcommerceSupplier.init();
            AccountList.init();

            $('#54').addClass('active');
            
        });

        var is_valid =1;

        var countCheckedSupplier = function($table, checkboxClass) {
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

        function checkSupplier() {
		  var result = countCheckedSupplier($('#datatable_supplier'), '.chk-supplier');
		  
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
		        $('.chk-supplier').prop('checked', this.checked);
		        var $checkboxes = $('.chk-supplier');
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
		    var container = $("#search-toggle-supplier");
		    var btn = $("#search-btn-supplier");
		    var icn = $("#search-icn-supplier");
		    var x = document.getElementById("search-toggle-supplier");

		    // if the target of the click isn't the container nor a descendant of the container
		    if (!container.is(e.target) && container.has(e.target).length === 0 && !btn.is(e.target) && !icn.is(e.target)) 
		    {
		        $("#search-toggle-supplier").hide();
		    }else if(btn.is(e.target) || icn.is(e.target)){
		    	
				if (x.style.display === "none") {
				  $("#search-toggle-supplier").show();
				} else {
				  $("#search-toggle-supplier").hide();
				}
		    }
		});

		function reload_page() {
			setTimeout(function(){
			   window.location.reload();
			}, 1600);
		}
		//function for save and edit
		function save_supplier() {
			var id_person = $('#id_person').val();
			var type = 1;

			if(id_person !=""){
				type = 2;
			}

			var person_code = $('#person_code').val();
			var person_name = $('#person_name').val();
			var person_alamat = $('#person_alamat').val();
			var person_telp = $('#person_telp').val();
			var person_hp = $('#person_hp').val();
			var person_contact = $('#person_contact').val();
			var is_default = $('#is_default').prop('checked');
			var person_fax = $('#person_fax').val();
			var is_person_tax = $('#is_person_tax').prop('checked');
			var rek_hutang_no = $('#rek_hutang_no').val();
			var uang_id = $('#uang_id').val();
			var top_id = $('#top_id').val();
			var propinsi = $('#propinsi').val();
			var kota = $('#kota').val();
			var person_bank = $('#person_bank').val();
			var person_acc = $('#person_acc').val();
			var person_an = $('#person_an').val();
			var npwp = $('#npwp').val();
			var person_nm_wp = $('#person_nm_wp').val();
			var person_alamat_wp = $('#person_alamat_wp').val();
			var person_type = 0;
			var person_desc = $('#person_desc').val();
			
			var is_active = $('#is_act_supplier').prop('checked');
			var is_non = $('#is_non_supplier').prop('checked');

			is_default = (is_default == true) ? 1 : 0;
			is_person_tax = (is_person_tax == true) ? 1 : 0;

			if(is_active == true && is_non == false){
				var status = 0;
			}else{
				var status = 1;
			}

			if(person_name!="" &&  (is_active !="" || is_non !="")){
				$("#btn-s-supplier").attr("disabled", "disabled");
				$("#btn-rs-supplier").attr("disabled", "disabled");
				$("#btn-r-supplier").attr("disabled", "disabled");
				$.ajax({
					url: "<?php echo base_url("supplier/action_supplier");?>",
					type: "POST",
					data: {
						type: type,
						id_person : id_person,
						person_code : person_code,
						person_name : person_name,
						person_alamat : person_alamat,
						person_telp : person_telp,
						person_hp : person_hp,
						person_contact : person_contact,
						is_default : is_default,
						person_fax : person_fax,
						is_person_tax : is_person_tax,
						rek_hutang_no : rek_hutang_no,
						uang_id : uang_id,
						top_id : top_id,
						propinsi : propinsi,
						kota : kota,
						person_bank : person_bank,
						person_acc : person_acc,
						person_an : person_an,
						npwp : npwp,
						person_nm_wp : person_nm_wp,
						person_alamat_wp : person_alamat_wp,
						person_type : person_type,
						person_desc : person_desc,
						status : status
					},
					cache: false,
					success: function(dataResult){
						
						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							$("#btn-s-supplier").removeAttr("disabled");
							$("#btn-rs-supplier").removeAttr("disabled");
							$("#btn-r-supplier").removeAttr("disabled");
							$('#frm-supplier').find('input:text').val('');
							$("#success").show();
							$('#success').html('Data berhasil ditambahkan!');
							$("#success").fadeTo(1500, 500).slideUp(500, function() {
			                	$("#success").slideUp(500);
			                });	

			                is_valid = 1;		
						}else if(dataResult.statusCode==201){
							$("#btn-s-supplier").removeAttr("disabled");
							$("#btn-rs-supplier").removeAttr("disabled");
							$("#btn-r-supplier").removeAttr("disabled");
							$('#frm-supplier').find('input:text').val('');
						    $("#success").show();
							$('#success').html('Data berhasil diubah!');
							$("#success").fadeTo(1500, 500).slideUp(500, function() {
			                	$("#success").slideUp(500);
			                });	

			                $.uniform.update();

			                is_valid = 1;
			                
						}else if(dataResult.statusCode==405){
							$("#btn-s-supplier").removeAttr("disabled");
							$("#btn-rs-supplier").removeAttr("disabled");
							$("#btn-r-supplier").removeAttr("disabled");
							alert('Username sudah digunakan!Ganti username lain!');
						}
					},
					error: function() {
						$("#btn-s-supplier").removeAttr("disabled");
						$("#btn-rs-supplier").removeAttr("disabled");
						$("#btn-r-supplier").removeAttr("disabled");
						$('#frm-supplier').find('input:text').val('');
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
				if (person_name =="") {
					$("#btn-s-supplier").removeAttr("disabled");
					$("#btn-rs-supplier").removeAttr("disabled");
					$("#btn-r-supplier").removeAttr("disabled");
					$("#validation-supplier").show();
					$('#validation-supplier').html('Nama Supplier harus diisi!');
					$("#validation-supplier").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-supplier").slideUp(500);
	                });	
				}else{
					$("#btn-s-supplier").removeAttr("disabled");
					$("#btn-rs-supplier").removeAttr("disabled");
					$("#btn-r-supplier").removeAttr("disabled");
					$("#validation-supplier").show();
					$('#validation-supplier').html('Harap isi semua data yang dibutuhkan!');
					$("#validation-supplier").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-supplier").slideUp(500);
	                });
				}
				
                is_valid = 0;
			}
		}

		//action btn save
		$('#btn-s-supplier').on('click', function(e) {
			e.preventDefault();

			save_supplier();

			var person_name = $('#person_name').val();

			var is_active = $('#is_act_supplier').prop('checked');
			var is_non = $('#is_non_supplier').prop('checked');
			if(is_active == true && is_non == false){
				var status = 0;
			}else{
				var status = 1;
			}

			if(person_name!="" &&  (is_active !="" || is_non !="" )){
				var oTable = $('#datatable_supplier').DataTable();
				oTable.draw();

				$('#add_supplier').modal('hide');
				$.uniform.update();	
			}else{
				if (person_name =="") {
					$("#btn-s-supplier").removeAttr("disabled");
					$("#btn-rs-supplier").removeAttr("disabled");
					$("#btn-r-supplier").removeAttr("disabled");
					$("#validation-supplier").show();
					$('#validation-supplier').html('Nama Supplier harus diisi!');
					$("#validation-supplier").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-supplier").slideUp(500);
	                });	
				}else{
					$("#btn-s-supplier").removeAttr("disabled");
					$("#btn-rs-supplier").removeAttr("disabled");
					$("#btn-r-supplier").removeAttr("disabled");
					$("#validation-supplier").show();
					$('#validation-supplier').html('Harap isi semua data yang dibutuhkan!');
					$("#validation-supplier").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-supplier").slideUp(500);
	                });
				}
				
                is_valid = 0;
			}
			
		});

		//action btn save and add new
		$('#btn-rs-supplier').on('click', function(e) {
			e.preventDefault();
			save_supplier();
			if(is_valid != 0){
				$("#validation-s-supplier").show();
				$('#validation-s-supplier').html('Data berhasil ditambahkan!');
				$("#validation-s-supplier").fadeTo(2000, 500).slideUp(500, function() {
                	$("#validation-s-supplier").slideUp(500);
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
		$('#btn-r-supplier').on('click', function(e) {
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

		$('#54F').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		$('#54E').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		$('#54D').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		// action edit clicked row
		function cae_supplier(id_person) {
			var x = document.getElementById("54C");
			if(check_user_right(x.id) == 0){
				$('#modal_unauthorized').modal('show');
			}else{
	            // Set data to Form Edit
	            $('#id_person').val(id_person);
	            $.ajax({
					url: "<?php echo base_url("supplier/get_edit_data");?>",
					type: "POST",
					data: {
						id_person: id_person
					},
					cache: false,
					success: function(dataResult){
						// console.log(dataResult);
						var json_data = JSON.parse(dataResult);
						
						$('#id_person').val(json_data.person_no);
						$('#person_code').val(json_data.person_code);
						$('#person_name').val(json_data.person_name);
						$('#person_alamat').val(json_data.person_alamat);
						$('#person_telp').val(json_data.person_telp);
						$('#person_hp').val(json_data.person_hp);
						$('#person_contact').val(json_data.person_contact);
						$('#is_default').prop('checked',json_data.is_default);
						$('#person_fax').val(json_data.person_fax);
						$('#is_person_tax').prop('checked',json_data.is_person_tax);
						$('#rek_hutang_no').val(json_data.rek_hutang_no);
						$('#supplier_acc').val(json_data.rek_hutang_kode+" - "+json_data.rek_hutang_nama);
						$('#uang_id').val(json_data.uang_id).trigger('change');
						$('#top_id').val(json_data.top_id).trigger('change');
						$('#propinsi').val(json_data.propinsi);
						$('#kota').val(json_data.kota);
						$('#person_bank').val(json_data.person_bank);
						$('#person_acc').val(json_data.person_acc);
						$('#person_an').val(json_data.person_an);
						$('#person_nm_wp').val(json_data.person_nm_wp);
						$('#person_alamat_wp').val(json_data.person_alamat_wp);
						$('#person_desc').val(json_data.person_desc);
						$('#npwp').val(json_data.npwp);

						var status = json_data.status;

						// console.log(status);
						if(status == 0 ){
							$('#is_act_supplier').prop('checked', true);
							$('#is_non_supplier').prop('checked', false);
						}else{
							$('#is_act_supplier').prop('checked', false);
							$('#is_non_supplier').prop('checked', true);
						}

						$.uniform.update();
					}
				});

				$('#add_supplier').modal('show');
			}
		}

		$('#54B').on('click', function() {
			var id_page = $('#id_page').val();
				
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}else{
				if(id_page == '54' || id_page == 54){
					$('#is_act_supplier').attr('checked', true);
					$('#is_act_supplier').closest('span').addClass('checked');
					$('#is_non_supplier').attr('checked', false);
					$('#is_non_supplier').closest('span').removeClass('checked');

					$.ajax({
						url: "<?php echo base_url("supplier/get_rek_dasar");?>",
						type: "POST",
						cache: false,
						success: function(dataResult){
							// console.log(dataResult);
							var json_data = JSON.parse(dataResult);
							
							$('#rek_hutang_no').val(json_data.rek_no);
							$('#supplier_acc').val(json_data.rek_kode_acc+" - "+json_data.rek_nama_acc);

							$.uniform.update();
						}
					});
					
					$('#add_supplier').modal('show');	
				}
			}		
		});

		//btn delete item
		$('#btn-h-akses').on('click', function() {
			// Get userid from checked checkboxes
				var supplier_arr = [];
				$(".chk-supplier:checked").each(function(){
					var varid = $(this).val();

					supplier_arr.push(varid);
				});

				// Array length
				var length = supplier_arr.length;

				if(length > 0){

				// AJAX request
					$.ajax({
						url: "<?php echo base_url("supplier/action_supplier");?>",
						type: "POST",
						data: {
							type: 3,
							id_person : supplier_arr
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
		function search_supplier() {
			var keyword = $("#keyword").val();
			if(keyword==''){
				keyword = 'none';
			}else{
				keyword  = keyword.replace(/ /g,"_");
			}
			
			var is_ar = $("#chk-arsip").prop("checked");
			var urlist = "<?php echo base_url('supplier/page');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + keyword + "/" + is_ar + "/"
		    );
		    location.href = url.href;
		}

		//action btn arsip
		$('#btn-a-akses').on('click', function() {
			// Get userid from checked checkboxes
				var supplier_arr = [];
				$(".chk-supplier:checked").each(function(){
					var varid = $(this).val();

					supplier_arr.push(varid);
				});

				// Array length
				var length = supplier_arr.length;

				if(length > 0){

				// AJAX request
					$.ajax({
						url: "<?php echo base_url("supplier/action_supplier");?>",
						type: "POST",
						data: {
							type: 4,
							id_person : supplier_arr
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
		$('#btn-rf-supplier').on('click', function(e) {
			$('#chk-arsip').prop("checked", false);
			$('#keyword').val("");
			$('#keyword-front').val("");

			$.uniform.update();

			search_supplier();

		});

		//action btn cari
		$('#btn-sf-supplier').on('click', function(e) {
			search_supplier();
		});

		//action ketika enter search bar
		$("#keyword-front").on('keyup', function (e) {
		    if (e.key === 'Enter' || e.keyCode === 13) {
				var keyword = $("#keyword-front").val();
		    	$("#keyword").val(keyword);
		        search_supplier();
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
			var urlist = "<?php echo base_url('supplier/print_pdf');?>";
			
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
			var urlist = "<?php echo base_url('supplier/print_csv');?>";
			
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
			var urlist = "<?php echo base_url('supplier/print_exc');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + keyword + "/" + is_ar + "/"
		    );
		 	window.open(url);
		});

		$('#btn-b-supplier').on('click', function(e) {
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
			$('#add_supplier').modal('hide');
			var oTable = $('#datatable_supplier').DataTable();
			oTable.draw();
		});

		$('#btn-acc-supplier').on('click', function(e) {
			e.preventDefault();
			$("#supplier_acc_gol").val(-2);

			$('#acclist_search').val('');
			var oTable = $('#datatable_acclist').DataTable();
            oTable.draw();

			$('#show_account').modal('show');
		});

		function getAccNo(id_acc) {   		
    		$.ajax({
				url: "<?php echo base_url("category/getAccount");?>",
				type: "POST",
				data: {
					id_acc : id_acc
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
						$('#rek_hutang_no').val(dataResult.rek_no);
						$('#supplier_acc').val(dataResult.rek_kode+" - "+dataResult.rek_nama);	
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

			return false;
    	}

    	$('#acc_btl').on('click', function(e) {
			e.preventDefault();

            $('#acclist_search').val('');
            $("#supplier_acc_gol").val(0);

            var oTable = $('#datatable_acclist').DataTable();
            oTable.draw();
        });
</script>
<!-- END JAVASCRIPTS -->
<?php
    $this->load->view("_partials/end_body.php");
?>