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
					<div class="col-sm-9">
						<h3 class="page-title font-green-seagreen">
						<strong>Daftar Order Pembelian</strong>
						</h3>
					</div>
					<!-- <a class="btn btn-sm green-seagreen" data-toggle="modal" href="#" id="qty-modal">Qty Modal </a> -->
					<div class="add-subcat-nav col-sm-3">
						<a class="btn btn-sm green-seagreen" data-toggle="modal" id="60B"><i class="fa fa-plus"></i> Order Baru</a>
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
						<a href="<?php echo base_url('purchase/order');?>">Order Pembelian</a>
					</li>
				</ul>
			</div>
			
			<!-- <input type="text" id="test_uom"> -->

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
							<div class="tapoable-line">
								<div class="tab-content">
									<div class="tab-pane active" id="tab_15_1">
										<div class="row">
											<h5 class="page-title title-tab">
											<strong>Ringkasan</strong>
											</h5>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 margin-bottom-20">
												<div class="dashboard-stat db-table">
													<div class="visual db-ic">
														<i class="fa fa-cube fa-icon-medium"></i>
													</div>
													<div class="details db-lbl ">
														<div class="number db-number">
															<?php
																if(is_array($open)||is_object($open)) {
																	foreach($open as $ua) {
																		echo"<strong>".$ua->open." Jenis</strong>";
																	}
																}
															?>
														</div>
														<div class="desc db-desc">
															 <strong>Order Open</strong>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 margin-bottom-20">
												<div class="dashboard-stat db-table">
													<div class="visual db-ic">
														<i class="fa fa-cube fa-icon-medium"></i>
													</div>
													<div class="details db-lbl ">
														<div class="number db-number">
															<?php
																if(is_array($progres)||is_object($progres)) {
																	foreach($progres as $ua) {
																		echo"<strong>".$ua->progres." Jenis</strong>";
																	}
																}
															?>
														</div>
														<div class="desc db-desc">
															 <strong>Order On Progress</strong>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 margin-bottom-20">
												<div class="dashboard-stat db-table">
													<div class="visual db-ic">
														<i class="fa fa-cube fa-icon-medium"></i>
													</div>
													<div class="details db-lbl ">
														<div class="number db-number">
															<?php
																if(is_array($komplit)||is_object($komplit)) {
																	foreach($komplit as $ua) {
																		echo"<strong>".$ua->komplit." Jenis</strong>";
																	}
																}
															?>
														</div>
														<div class="desc db-desc">
															 <strong>Order Complete</strong>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 margin-bottom-20">
												<div class="dashboard-stat db-table">
													<div class="visual db-ic">
														<i class="fa fa-cube fa-icon-medium"></i>
													</div>
													<div class="details db-lbl ">
														<div class="number db-number">
															<?php
																if(is_array($close)||is_object($close)) {
																	foreach($close as $ua) {
																		echo"<strong>".$ua->close." Jenis</strong>";
																	}
																}
															?>
														</div>
														<div class="desc db-desc">
															 <strong>Order Close</strong>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-7">
												<!-- <ul class="nav nav-pills">
													<li class="active">
														<a href="#tab_2_1" data-toggle="tab" class="btn green-seagreen btn-sm btn-rounded-left btn-border">
														Daftar </a>
													</li>
													<li>
														<a href="#tab_2_2" data-toggle="tab" class="btn green-seagreen btn-sm btn-rounded-right btn-border">
														Baru </a>
													</li>
												</ul> -->
												<div class="btn-group" id="btn_act" style="display:none;">
													<a class="btn green-seagreen dropdown-toggle btn-rounded btn-sm btn-border btn-actcl" data-toggle="dropdown" href="#" id="60D">
													Aksi
													</a>
													<ul class="dropdown-menu pull-left dropdown-action">
														<li>
															<a class="user-target" data-toggle="modal" href="#ars_akses">
															Arsip </a>
														</li>
														<li>
															<a class="user-target" data-toggle="modal" href="#del_akses">
															Hapus </a>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-sm-2 pdg-btn">
												<div class="btn-group">
													<!-- <a class="btn green-seagreen btn-sm btn-rounded-left btn-border" id="60E">
														Import
													</a>
													<div class="btn-group">
														<a class="btn green-seagreen dropdown-toggle btn-rounded-right btn-sm btn-border" data-toggle="dropdown" href="#" id="60F">
														Eksport
														</a>
														<ul class="dropdown-menu pull-right">
															<li>
																<a href="#">
																Export to Excel </a>
															</li>
															<li>
																<a href="#">
																Export to CSV </a>
															</li>
															<li>
																<a href="#">
																Export to PDF </a>
															</li>
														</ul>
													</div> -->
												</div>
											</div>
											<div class="col-sm-3 pdg-search">
												<div class="input-group">
													<div class="input-icon">
														<i class="fa fa-search"></i>
														<input type="text" class="form-control input-rounded-left" id="keyword-front" value="<?php echo $keyw;?>">
													</div>
													<div class="input-group-btn">
														<button type="button" id="search-btn-po" class="btn btn-default advance-toggle  btn-rounded-right"><i class="fa fa-angle-down" id="search-icn-po"></i></button>
														
														<div class="advance-search-toggle" id="search-toggle-bahan" style="min-width:250px;display: none;">
															<div class="row">
																<div class="col-sm-12" style="margin:12px 5px 15px;padding-right: 23px;">
																	<div class="form-group">
																		<label class="col-md-12 control-label" style="margin-top:10px;color:#777;">Kata Kunci</label>
																		<div class="col-md-12">
																			<input type="text" class="form-control input-sm dropdown-input" id="keyword" placeholder="" value="<?php echo $keyw;?>">
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-md-2" style="margin-top:10px;">
																			<input type="checkbox" class="form-control input-sm" id="chk_tgl" <?php if($is_date==1){ echo " checked";}?>>
																		</div>
																		<label class="col-md-10 control-label" style="margin-top:10px;color:#777;">Tanggal</label>
																		<div class="col-md-9">
																			<input type="date" class="form-control input-sm dropdown-input" id="tgl_mulai" placeholder="" <?php echo 'value="'.$start_date.'"';if($is_date <> 1){ echo "disabled"; }?>>
																		</div>
																		<label class="col-md-3 control-label" style="margin-top:10px;color:#777;">s/d</label>
																		<div class="col-md-9" style="margin-top:8px">
																			<input type="date" class="form-control input-sm dropdown-input" id="tgl_selesai" placeholder="" <?php echo 'value="'.$end_date.'"'; if($is_date <> 1){  echo "disabled"; }?>>
																		</div>
																		<div class="col-md-3"></div>
																	</div>
																	<div class="form-group">
																		<label class="col-md-12 control-label" style="margin-top:10px;color:#777;">Status</label>
																		<div class="col-md-12">
																			<select class="form-control input-sm dropdown-input" id="status_trans">
																				<option value="0" <?php if($status == 0){ echo "selected='selected'";}?>>ALL</option>
																				<option value="1" <?php if($status == 1){ echo "selected='selected'";}?>>Open</option>
																				<option value="2" <?php if($status == 2){ echo "selected='selected'";}?>>On Progress</option>
																				<option value="2" <?php if($status == 3){ echo "selected='selected'";}?>>Complete</option>
																				<option value="2" <?php if($status == 4){ echo "selected='selected'";}?>>Close</option>
																			</select>
																		</div>
																		<div class="col-md-12" style="margin-top:10px;">
																			<select class="form-control input-sm dropdown-input" id="type_trans">
																				<option value="0" <?php if($type == 0){ echo "selected='selected'";}?>>Active</option>
																				<option value="1" <?php if($type == 1){ echo "selected='selected'";}?>>Deactive</option>
																			</select>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="col-md-9 control-label" style="margin-top:10px;color:#777;">Tampilkan Semua User</label>
																		<div class="col-md-3" style="margin-top:10px;">
																			<input type="checkbox" class="form-control input-sm" id="is_user" <?php if($is_user==1){ echo " checked";}?>>
																		</div>
																		<div class="col-md-12">
																			<select class="form-control input-sm dropdown-input" id="user_id" <?php if($is_user <> 1){ echo "disabled"; };?>>
																				<option value="0" <?php if($type == 0){ echo "selected='selected'";}?>> * All User</option>
																				<?php
																					if( !empty($user) ) {
		    																			foreach($user as $au) {
		    																	?>
																							<option value="<?php echo $au->user_id;?>" <?php if($user_id == $au->user_id){echo "selected='selected'";}?>><?php echo $au->user_name;?></option>
																				<?php
																						}
																					}
																				?>
																			</select>
																		</div>

																	</div>
																	<div class="form-group">
																		<div class="col-sm-6" style="margin: 30px 0px 0px 0px;padding: 3px 8px 0px 15px;text-align: right;">
																			<a class="" id="btn-rf-po" style="color:#777;text-decoration:none;">Hapus Filter</a>
																		</div>
																		<div class="col-sm-6" style="margin: 30px 0px 0px 0px;color: #777;padding: 0px 15px 0px 0px;">
																			<a class="btn green-seagreen btn-rounded" style="display:block;" id="btn-sf-po">
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
										
										
										<div class="tab-content" id="60A" style="display:none;">
											<div class="tab-pane fade active in" id="tab_2_1">
												<div class="table-scrollable" style="border: 0px solid #dddddd;">
													<div class="table-actions-wrapper">
													</div>
													<table class="table table-hover" id="datatable_purchaseorder">
														<thead class="thead-dark">
															<tr role="row" class="heading">
																<th width="1%" style="background-color: #367a9a!important;">
																	<input type="checkbox" class="group-checkable checkall" onclick="calc();">
																</th>
																<th width="10%" style="background-color: #367a9a!important;color:white!important;">
																	 Tanggal
																</th>
																<th width="15%" style="background-color: #367a9a!important;color:white!important;">
																	 No.&nbsp;Faktur
																</th>
																<th width="20%" style="background-color: #367a9a!important;color:white!important;">
																	 Supplier
																</th>
																<th width="10%" style="background-color: #367a9a!important;color:white!important;">
																	 Status Order
																</th>
																<th width="10%" style="background-color: #367a9a!important;color:white!important;">
																	 User Create
																</th>
																<th width="10%" style="background-color: #367a9a!important;color:white!important;">
																	 Create Date
																</th>
																<th width="10%" style="background-color: #367a9a!important;color:white!important;">
																	 User Edit
																</th>
																<th width="10%" style="background-color: #367a9a!important;color:white!important;">
																	 Edit Date
																</th>
															</tr>
														</thead>
														<tbody>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										
									</div>
									<div class="tab-pane fade" id="tab_2_2">
										<p id="myText"></p>
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
            
            Productlist.init();
            ProductlistSingle.init();
            PurchaseOrder.init();
            SupplierList.init();
            // TableEditableBahanBaku.init();
            
        });

        var is_valid = 1;
        var selectedRows = [];

        function footer_sum3() {
        	let sumColumn = 0;
   
			$('#tbl_bahanbakudetail').find('td#col-qty-satuan').each(function(){
			    
			    $('#tbl_bahanbakudetail tbody tr').each(function(){
			        $('td', this).eq(3).each(function(){
			            if($('div', this).length==1)
			            	sumColumn += Number( ($('div', this).data('value')!="" ? $('div', this).data('value'): 0 ) );
			        });
			    });

			    $(this).text(parseFloat(sumColumn.toFixed(5)));
			    sumColumn = 0;
			});
        }

        function footer_sum4() {
        	let sumColumn = 0;
   
			$('#tbl_bahanbakudetail').find('td#col-qty-pakai').each(function(){
			    
			    $('#tbl_bahanbakudetail tbody tr').each(function(){
			        $('td', this).eq(4).each(function(){
			            if($('div', this).length==1){
			                let num = Number( ($('div', this).data('value')!="" ? $('div', this).data('value'): 0 ) );
			             	sumColumn += num;
			            }
			        });
			    });
			    $(this).text(parseFloat(sumColumn.toFixed(5)));
			    sumColumn = 0;
			});
        }

        function footer_sum5() {
        	let sumColumn = 0;

			$('#tbl_bahanbakudetail').find('td#col-qty-butuh').each(function(){
			    
			    $('#tbl_bahanbakudetail tbody tr').each(function(){
			        $('td', this).eq(5).each(function(){
			            if($('div', this).length==1){
			                let num = Number( ($('div', this).data('value')!="" ? $('div', this).data('value'): 0 ) );
			             	sumColumn += num;
			            }
			        });
			    });
			    $(this).text(parseFloat(sumColumn.toFixed(5)));
			    sumColumn = 0;
			});
        }

        var countCheckedPo = function($table, checkboxClass) {
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

        function checkPo() {
		  var result = countCheckedPo($('#datatable_purchaseorder'), '.chk-po');
		  
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
		        $('.chk-po').prop('checked', this.checked);
		        var $checkboxes = $('.chk-po');
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
		    var container = $("#search-toggle-bahan");
		    var btn = $("#search-btn-po");
		    var icn = $("#search-icn-po");
		    var x = document.getElementById("search-toggle-bahan");

		    // if the target of the click isn't the container nor a descendant of the container
		    if (!container.is(e.target) && container.has(e.target).length === 0 && !btn.is(e.target) && !icn.is(e.target)) 
		    {
		        x.style.display = "none";
		    }else if(btn.is(e.target) || icn.is(e.target)){
		    	
				if (x.style.display === "none") {
				  x.style.display = "block";
				} else {
				  x.style.display = "none";
				}
		    }
		});

		$('#60F').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		$('#60E').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		$('#60D').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}			
		});
		function cae_bahanbaku(id_po) {
			var x = document.getElementById("21C");
			if(check_user_right(x.id) == 0){
				$('#modal_unauthorized').modal('show');
			}else{
				let sat = 0;
				let pak = 0;
				let but = 0;
				// Set data to Form Edit
				$('#id_po').val(id_po);

				$.ajax({
					url: "<?php echo base_url("purchase/get_edit_data_po");?>",
					type: "POST",
					data: {
						id_po: id_po
					},
					cache: false,
					success: function(dataResult){
						// console.log(dataResult);
						var json_data = JSON.parse(dataResult);
						
						var tgl = json_data.parent_prod.trans_date;

						// var day = ("0" + tgl.getDate()).slice(-2);
						// var month = ("0" + (tgl.getMonth() + 1)).slice(-2);
						var today = tgl.replace(" ","T");

						console.log(today);

						$('#po_tgl').val(today);
						$('#po_noproses').val(json_data.parent_prod.trans_no);
						$('#po_kodeprod').val(json_data.parent_prod.prod_code0);
						$('#po_idprod').val(json_data.parent_prod.prod_no);
						$('#po_prodname').val(json_data.parent_prod.prod_name0);
						$('#po_ket').val(json_data.parent_prod.keterangan);

						sat = new Number(json_data.detail_sum.qty_satuan);
						pak = new Number(json_data.detail_sum.qty_pakai);
						but = new Number(json_data.detail_sum.qty_butuh);
						
						$('#col-qty-satuan').text(parseFloat(sat.toFixed(5)));
						$('#col-qty-pakai').text(parseFloat(pak.toFixed(5)));
						$('#col-qty-butuh').text(parseFloat(but.toFixed(5)));

						$.uniform.update();

						$('#tbl_bahanbakudetail').DataTable().destroy();
						fetch_detail_po();
					}
				});
				
				$('#add_purchaseorder').modal('show');
			}
		}

		$('#po_tgl').on('change', function() {
			
			var mydate = $('#po_tgl').val();
			var dt = mydate.split("T");
			var tgl_inpt = new Date(dt[0]);
		    var hr = tgl_inpt.getDate();
		    var bln = tgl_inpt.getMonth() + 1;
		    var thn = tgl_inpt.getFullYear();

			var nopro = "po-"+thn+bln+hr+"-00000#";
			$('#po_noproses').val(nopro);

		});

		$('#60B').on('click', function() {
			if(check_user_right(this.id) == 0){
				$('#modal_unauthorized').modal('show');
			}else{
				$.ajax({
					url: "<?php echo base_url("purchase/getProsesPo");?>",
					type: "POST",
					data: {},
					cache: false,
					success: function(){
						var now = new Date();
						var day = ("0" + now.getDate()).slice(-2);
						var month = ("0" + (now.getMonth() + 1)).slice(-2);
						var year = now.getFullYear();
						var hour = ''+now.getHours();
                		var minute = ''+now.getMinutes();
                		var second = now.getSeconds();
                		var today = (year)+"-"+(month)+"-"+(day)+"T"+(hour.padStart(2,"0"))+":"+(minute.padStart(2,"0"));

						$('#po_tgl').val(today);
						console.log(today);

						var mydate = $('#po_tgl').val();
						var dt = mydate.split("T");
						var tgl_inpt = new Date(dt[0]);
					    var hr = tgl_inpt.getDate();
					    var bln = tgl_inpt.getMonth() + 1;
					    var thn = tgl_inpt.getFullYear();

						var nopro = "PO-"+thn+bln+hr+"-00000#";
						$('#po_noproses').val(nopro);
						$('#term_po option:eq(0)').prop('selected', true);

						$('#sub_total_po').val(0);
						$('#disc_persen_po').val(0);
						$('#disc_rp_po').val(0);
						$('#ppn_po').val(1).trigger('change');
						$('#ppn_persen_po').val(11);
						$('#ppn_rp_po').val(0);
						$('#total_po').val(0);

						$('#add_purchaseorder').modal('show');

					},
					error:function(){
					}
				});

				
			}		
		});

		$('#po_show_supplier').on('click', function(e) {
			e.preventDefault();

			var oTable = $('#datatable_supplierlist').DataTable();
            oTable.draw();
			
			$('#show_supplier').modal('show');		
		});

		$(document).on('click', '#suplist_searchbtn', function(e){
            e.preventDefault();
            var oTable = $('#datatable_supplierlist').DataTable();
            oTable.draw();
            // console.log(key);
        });

		$(document).on('keydown', '#suplist_search', function(e){
            if (e.key === 'Enter' || e.keyCode === 13) {
            	e.preventDefault();
                var oTable = $('#datatable_supplierlist').DataTable();
                oTable.draw();
            }
        });

        $('#sup_btl').on('click', function() {
            $('#suplist_search').val('');
            var oTable = $('#datatable_supplierlist').DataTable();
            oTable.draw();
        });

        $(document).on('click', '#btn-productlistmp_search', function(e){
            e.preventDefault();
            var oTable = $('#datatable_productslist').DataTable();
            oTable.draw();
        });

        $(document).on('keydown', '#productlistmp_search', function(e){
            if (e.key === 'Enter' || e.keyCode === 13) {
                e.preventDefault();
                var oTable = $('#datatable_productslist').DataTable();
                oTable.draw();
            }
        });

        $('#btn_plh_prod').on('click', function(e) {
        	e.preventDefault();

        	save_tbl_temp();

        	$('#status_modal_sp').val('');

        	selectedRows = [];
			
			$('#opt_all_ml').attr("checked", true);
			$('#opt_all_ml').closest('span').addClass('checked');
			$('#opt_brg_ml').attr("checked", false);
			$('#opt_brg_ml').closest('span').removeClass('checked');
			$('#opt_mnf_ml').attr("checked", false);
			$('#opt_mnf_ml').closest('span').removeClass('checked');

			$.uniform.update();

			var oTable = $('#datatable_productslist').DataTable();
			oTable.ajax.reload();

			$('#show_product').modal('show');

        });
        
        $('#btl_prod_ml').on('click', function(e) {
        	e.preventDefault();

        	save_tbl_temp();

        	$('#status_modal_sp').val('clear');

        	selectedRows = [];

            var $t = $(this),
			target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

			$(target)
				.find('input[type="checkbox"], input[type="radio"]')
					.prop("checked", false)
					.change();

			$.uniform.update();

            $('#productlistmp_search').val('');

            $('#opt_all_ml').attr("checked", true);
			$('#opt_all_ml').closest('span').addClass('checked');
			$('#opt_brg_ml').attr("checked", false);
			$('#opt_brg_ml').closest('span').removeClass('checked');
			$('#opt_mnf_ml').attr("checked", false);
			$('#opt_mnf_ml').closest('span').removeClass('checked');

            footer_sum3();
            footer_sum4();
            footer_sum5();

			var oTable = $('#datatable_productslist').DataTable();
			oTable.ajax.reload();

            $('#show_product').modal('hide');
        });

    	function getProdNo(id_prod) {

    		// e.preventDefault();
    		if ($('#po_kodeprod').val() != '') {
				var id_po = $('#id_po').val();
				// if(id_brg == ""){
					$.ajax({
						url: "<?php echo base_url("purchase/delete_all_detail_po");?>",
						type: "POST",
						data: {},
						cache: false,
						success: function(){
							$('#tbl_bahanbakudetail').DataTable().destroy();
							fetch_detail_po();
						},
						error:function(){
						}
					});
				// }

				var $t = $(this),
				target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

				$(target)
					.find('input')
						.val('')
						.end()
					.find('input[type="checkbox"], input[type="radio"]')
						.prop("checked", false)
						.change();

				$.uniform.update();
    		}

    		$.ajax({
				url: "<?php echo base_url("product/getProduct");?>",
				type: "POST",
				data: {
					id_prod : id_prod
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					$('#po_kodeprod').val(dataResult.prod_code);
					$('#po_prodname').val(dataResult.prod_name);
					$('#po_ket').val(dataResult.prod_code+" "+dataResult.prod_name);
				},
				error:function(){
				}
			});

        	$('#po_idprod').val(id_prod);
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
			$('#show_product_single').modal('hide');

			// console.log(id_prod);

			return false;
    	}

    	function getPersonNo(id_person) {

    		// e.preventDefault();
    		if ($('#po_personid').val() != '') {
				var id_po = $('#id_po').val();
				// if(id_brg == ""){
					$.ajax({
						url: "<?php echo base_url("purchase/delete_all_detail_po");?>",
						type: "POST",
						data: {},
						cache: false,
						success: function(){
							$('#tbl_podetail').DataTable().destroy();
							fetch_detail_po();
						},
						error:function(){
						}
					});
				// }

				var $t = $(this),
				target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

				$(target)
					.find('input')
						.val('')
						.end()
					.find('input[type="checkbox"], input[type="radio"]')
						.prop("checked", false)
						.change();

				$.uniform.update();
    		}

    		$.ajax({
				url: "<?php echo base_url("purchase/getPerson");?>",
				type: "POST",
				data: {
					id_person : id_person
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					$('#po_personname').val(dataResult.person_name);
				},
				error:function(){
				}
			});

        	$('#po_personid').val(id_person);
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
			$('#show_supplier').modal('hide');

			return false;
    	}

    	$('#add_new_prod_bahan_detail').on("click", function(e) {
    		e.preventDefault();
    		$('#tbl_bahanbakudetail').DataTable().destroy();
    		fetch_detail_po();
    	});
        
        function fetch_detail_po(){
        	
			var dataTable = $('#tbl_podetail').DataTable({
				"processing" : true,
				"serverSide" : true,
				"filter": false,
		        "paging": false,
		        "ordering": false,
		        "info": false,
		        "searching":false,
				"order" : [],
				"ajax" : {
					url:"<?= base_url('purchase/fetch_detail_po') ?>",
					type:"POST"
				}
			});
		}

		var countChecked = function($table, checkboxClass) {
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

        function check(chk_val) {

		    var result = countChecked($('#datatable_productslist'), '.chk-prodml');

		    $('#myTextBb').html(result.checked);
		    $('#myTextBb').val(result.checked);
		    var p = document.getElementById('myTextBb');
		    var text = p.textContent;
		    var number = Number(text);

		    var set = jQuery(this).attr("data-set");
		    // var checked = jQuery(this).is(":checked");
		    var checked = $('.chk-prodml[value="'+chk_val+'"]').is(":checked");

		    jQuery(set).each(function () {
		        if (checked) {
		            $(this).attr("checked", true);
		            $(this).parents('tr').addClass("active");
		        } else {
		            $(this).attr("checked", false);
		            $(this).parents('tr').removeClass("active");
		        }
		    });
		    jQuery.uniform.update(set);

		    var val = $('.chk-prodml[value="'+chk_val+'"]').is(':checked');

		    if(val == false){
		    	var index = selectedRows.indexOf(chk_val);

	            if (index > -1) {
	                selectedRows.splice(index, 1);
	            }

		    }else{
		    	$(".chk-prodml:checked").each(function(){
		            var brgid = $(this).val();
		            if(selectedRows.indexOf(brgid) === -1){
		              selectedRows.push(brgid);
		            }
		        });
		    }
		   
	        // console.log(selectedRows);
		}

        $('#pilih_prod_ml').on("click", function(e) {
        	e.preventDefault();

        	save_tbl_temp();
        	
        	var brg_arr = [];

			brg_arr = selectedRows;

			var length = brg_arr.length;

			var id_po = $('#id_po').val();

			if(length > 0){
				$.ajax({
					url: "<?php echo base_url("purchase/insert_detailpo");?>",
					type: "POST",
					data: {
						id_brg : brg_arr,
						id_po : id_po
					},
					cache: false,
					success: function(){
						$('#tbl_podetail').DataTable().destroy();
						fetch_detail_po();
					},
					error: function() {
						$("#failed").show();
						$('#failed').html('Gagal melakukan aksi!');
						$("#failed").fadeTo(2000, 500).slideUp(500, function() {
		                	$("#failed").slideUp(500);
		                });
					}
				});	
			}

			selectedRows = [];

            var $t = $(this),
			target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

			$(target)
				.find('input[type="checkbox"], input[type="radio"]')
					.prop("checked", false)
					.change();

			var oTable = $('#datatable_productslist').dataTable();
			$('input[type="checkbox"]', oTable.fnGetNodes()).removeAttr('checked');

			$.uniform.update();

            $('#productlistmp_search').val('');

            $('#opt_all_ml').attr("checked", true);
			$('#opt_all_ml').closest('span').addClass('checked');
			$('#opt_brg_ml').attr("checked", false);
			$('#opt_brg_ml').closest('span').removeClass('checked');
			$('#opt_mnf_ml').attr("checked", false);
			$('#opt_mnf_ml').closest('span').removeClass('checked');
			
			$('#status_modal_sp').val('clear');

            var oTable = $('#datatable_productslist').DataTable();
            oTable.ajax.reload();

			$('#show_product').modal('hide');
        });

        $(document).on('click', '.delete', function(e){
			e.preventDefault();

			var id = $(this).attr("id");
			// console.log(id);
			$.ajax({
				url:"<?= base_url('purchase/delete_po_detail') ?>",
				method:"POST",
				data:{
					id_det:id
				},
				success:function(dataResult){

					$('#tbl_podetail').DataTable().destroy();
					fetch_detail_po();
				}
			});

			hitungAll();

		});

		function check_detail_po() {
			var tableData = [];

			var hasil = 0;

			$('#tbl_podetail_body tr').each(function(row, tr){
			  tableData[row] = {
			    "prod_code": $(tr).find('td:eq(0) div').text(),
			    "prod_name": $(tr).find('td:eq(1) div').text(),
			    "satuan": $(tr).find('td:eq(2) div').text(),
			    "qty_satuan": $(tr).find('td:eq(3) div').text(),
			    "harga": $(tr).find('td:eq(4) div').text(),
			    "sub_total": $(tr).find('td:eq(5) div').text(),
			    "disc1_persen": $(tr).find('td:eq(6) div').text(),
			    "disc1_rp": $(tr).find('td:eq(7) div').text(),
			    "disc2_persen": $(tr).find('td:eq(8) div').text(),
			    "disc2_rp": $(tr).find('td:eq(9) div').text(),
			    "disc3_persen": $(tr).find('td:eq(10) div').text(),
			    "disc3_rp": $(tr).find('td:eq(11) div').text(),
			    "total": $(tr).find('td:eq(12) div').text(),
			    "keterangan": $(tr).find('td:eq(13) div').text(),
			    "id_det" : $(tr).find('td:eq(0) div').data('id')
			  }
			});

			var hasEmptyColumn = false;
			if(tableData.length > 0){
				for (var i = 0; i < tableData.length; i++) {
				  if (
				    tableData[i].prod_code === "" ||
				    tableData[i].prod_name === "" ||
				    tableData[i].satuan === "" ||
				    tableData[i].qty_satuan === "" 
				  ) {
				    hasEmptyColumn = true;
				    break;
				  }
				}

				if (hasEmptyColumn) {
					hasil = 1;
				  	return hasil;
				}
			}else{
				hasil = 11;
				return hasil;
			}
		}

        function save_po() {
        	var id_po = $('#id_po').val();
			var type = 1;

			if(id_po !=""){
				type = 2;
			}
			var person_no = $('#po_personid').val();
			var date = $('#po_tgl').val();
			var term = $('#term_po').val();
			var ket = $('#po_ket').val();

			save_tbl_temp();

			var checkTbl = check_detail_po();

			if(checkTbl == 1){
				$("#btn-s-po").removeAttr("disabled");
				$("#btn-rs-po").removeAttr("disabled");
				$("#btn-r-po").removeAttr("disabled");
				$("#validation-po").show();
				$('#validation-po').html('Harap isi semua data yang dibutuhkan!');
				$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
                	$("#validation-po").slideUp(500);
                });

                is_valid = 0;

                return;
			}else if (checkTbl == 11) {
				$("#btn-s-po").removeAttr("disabled");
				$("#btn-rs-po").removeAttr("disabled");
				$("#btn-r-po").removeAttr("disabled");
				$("#validation-po").show();
				$('#validation-po').html('Detail Order Pembelian masih kosong!');
				$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
                	$("#validation-po").slideUp(500);
                });

                is_valid = 0;

                return;
			}
			
			if(person_no!="" && date!="" && trem!=""){
				$("#btn-s-po").attr("disabled", "disabled");
				$("#btn-rs-po").attr("disabled", "disabled");
				$("#btn-r-po").attr("disabled", "disabled");
				$.ajax({
					url: "<?php echo base_url("purchase/action_po");?>",
					type: "POST",
					data: {
						type: type,
						id_po : id_po,
						person_no: person_no,
						date: date,
						term: term,
						ket: ket
					},
					cache: false,
					success: function(dataResult){
						
						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){

							$("#btn-s-po").removeAttr("disabled");
							$("#btn-rs-po").removeAttr("disabled");
							$("#btn-r-po").removeAttr("disabled");
							$('#frm-po').find('input:text').val('');
							$("#success").show();
							$('#success').html('Data berhasil ditambahkan!');
							$("#success").fadeTo(1500, 500).slideUp(500, function() {
			                	$("#success").slideUp(500);
			                });

			                is_valid = 1;

			                			
						}else if(dataResult.statusCode==201){

							$("#btn-s-po").removeAttr("disabled");
							$("#btn-rs-po").removeAttr("disabled");
							$("#btn-r-po").removeAttr("disabled");
							$('#frm-po').find('input:text').val('');
						    $("#success").show();
							$('#success').html('Data berhasil diubah!');
							$("#success").fadeTo(1500, 500).slideUp(500, function() {
			                	$("#success").slideUp(500);
			                });	

			                $.uniform.update();

			                is_valid = 1;
						}else if(dataResult.statusCode==405){
							$("#btn-s-po").removeAttr("disabled");
							$("#btn-rs-po").removeAttr("disabled");
							$("#btn-r-po").removeAttr("disabled");
							alert('Barang sudah digunakan! Silahkan pilih bahan yang lain/hapus bahan sebelumnya!');
						}
					},
					error: function() {
						$("#btn-s-po").removeAttr("disabled");
						$("#btn-rs-po").removeAttr("disabled");
						$("#btn-r-po").removeAttr("disabled");
						$('#frm-po').find('input:text').val('');
						$("#failed").show();
						$('#failed').html('Gagal melakukan aksi!');
						$("#failed").fadeTo(2000, 500).slideUp(500, function() {
		                	$("#failed").slideUp(500);
		                });

		                $.uniform.update();
		                
					}
				});

			}else{
				if (peron_no == "") {
					$("#btn-s-po").removeAttr("disabled");
					$("#btn-rs-po").removeAttr("disabled");
					$("#btn-r-po").removeAttr("disabled");
					$("#validation-po").show();
					$('#validation-po').html('Supplier harus diisi!');
					$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-po").slideUp(500);
	                });
				}else if (date=="") {
					$("#btn-s-po").removeAttr("disabled");
					$("#btn-rs-po").removeAttr("disabled");
					$("#btn-r-po").removeAttr("disabled");
					$("#validation-po").show();
					$('#validation-po').html('Tanggal wajib diisi!');
					$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-po").slideUp(500);
	                });
				}else if (term=="") {
					$("#btn-s-po").removeAttr("disabled");
					$("#btn-rs-po").removeAttr("disabled");
					$("#btn-r-po").removeAttr("disabled");
					$("#validation-po").show();
					$('#validation-po').html('Termin wajib diisi!');
					$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-po").slideUp(500);
	                });
				}else{
					$("#btn-s-po").removeAttr("disabled");
					$("#btn-rs-po").removeAttr("disabled");
					$("#btn-r-po").removeAttr("disabled");
					$("#validation-po").show();
					$('#validation-po').html('Harap isi semua data yang dibutuhkan!');
					$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-po").slideUp(500);
	                });
				}
				
                is_valid = 0;
			}
        }

        $('#btn-s-po').on('click', function(e) {
        	e.preventDefault();
			save_po();

			var person_no = $('#po_personid').val();
			var term = $('#term').val();
			var date = $('#po_tgl').val();

			var checkTbl = check_detail_po();

			if(checkTbl == 1){
				$("#btn-s-po").removeAttr("disabled");
				$("#btn-rs-po").removeAttr("disabled");
				$("#btn-r-po").removeAttr("disabled");
				$("#validation-po").show();
				$('#validation-po').html('Harap isi semua data yang dibutuhkan!');
				$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
                	$("#validation-po").slideUp(500);
                });

                is_valid = 0;

                return;
			}else if (checkTbl == 11) {
				$("#btn-s-po").removeAttr("disabled");
				$("#btn-rs-po").removeAttr("disabled");
				$("#btn-r-po").removeAttr("disabled");
				$("#validation-po").show();
				$('#validation-po').html('Detail Order Pembelian masih kosong!');
				$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
                	$("#validation-po").slideUp(500);
                });

                is_valid = 0;

                return;
			}
			
			if(person_no!="" && date!="" && term!=""){
				$('#add_purchaseorder').modal('hide');

				$.uniform.update();

				$('#sub_total_po').val(0);
				$('#disc_persen_po').val(0);
				$('#disc_rp_po').val(0);
				$('#ppn_po').val(1).trigger('change');
				$('#ppn_persen_po').val(11);
				$('#ppn_rp_po').val(0);
				$('#total_po').val(0);
			
				setTimeout(function(){
				   window.location.reload();
				}, 2100);
			}else{
				if (person_no == "") {
					$("#btn-s-po").removeAttr("disabled");
					$("#btn-rs-po").removeAttr("disabled");
					$("#btn-r-po").removeAttr("disabled");
					$("#validation-po").show();
					$('#validation-po').html('Supplier harus diisi!');
					$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-po").slideUp(500);
	                });
				}else if (date=="") {
					$("#btn-s-po").removeAttr("disabled");
					$("#btn-rs-po").removeAttr("disabled");
					$("#btn-r-po").removeAttr("disabled");
					$("#validation-po").show();
					$('#validation-po').html('Tanggal transaksi harus diisi!');
					$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-po").slideUp(500);
	                });
				}else if (term=="") {
					$("#btn-s-po").removeAttr("disabled");
					$("#btn-rs-po").removeAttr("disabled");
					$("#btn-r-po").removeAttr("disabled");
					$("#validation-po").show();
					$('#validation-po').html('Termin harus diisi!');
					$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-po").slideUp(500);
	                });
				}else{
					$("#btn-s-po").removeAttr("disabled");
					$("#btn-rs-po").removeAttr("disabled");
					$("#btn-r-po").removeAttr("disabled");
					$("#validation-po").show();
					$('#validation-po').html('Harap isi semua data yang dibutuhkan!');
					$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
	                	$("#validation-po").slideUp(500);
	                });
				}
				
                is_valid = 0;
			}
		});

		//action btn save and add new
		$('#btn-rs-po').on('click', function(e) {
			e.preventDefault();
			save_po();

			var checkTbl = check_detail_po();

			if(checkTbl == 1){
				$("#btn-s-po").removeAttr("disabled");
				$("#btn-rs-po").removeAttr("disabled");
				$("#btn-r-po").removeAttr("disabled");
				$("#validation-po").show();
				$('#validation-po').html('Harap isi semua data yang dibutuhkan!');
				$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
                	$("#validation-po").slideUp(500);
                });

                is_valid = 0;

                return;
			}else if (checkTbl == 11) {
				$("#btn-s-po").removeAttr("disabled");
				$("#btn-rs-po").removeAttr("disabled");
				$("#btn-r-po").removeAttr("disabled");
				$("#validation-po").show();
				$('#validation-po').html('Detail Order Pembelian masih kosong!');
				$("#validation-po").fadeTo(2000, 500).slideUp(500, function() {
                	$("#validation-po").slideUp(500);
                });

                is_valid = 0;

                return;
			}

			var id_po = $('#id_po').val();

			if(id_po == ""){
				$.ajax({
					url: "<?php echo base_url("purchase/delete_all_detail_po");?>",
					type: "POST",
					data: {},
					cache: false,
					success: function(){
						$('#tbl_bahanbakudetail').DataTable().destroy();
						fetch_detail_po();
					},
					error:function(){
					}
				});
			}

			if(is_valid != 0){
				$("#validation-s-po").show();
				$('#validation-s-po').html('Data berhasil ditambahkan!');
				$("#validation-s-po").fadeTo(2000, 500).slideUp(500, function() {
	            	$("#validation-s-po").slideUp(500);
	            });

	            $.ajax({
					url: "<?php echo base_url("purchase/getProsesPo");?>",
					type: "POST",
					data: {},
					cache: false,
					success: function(){
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

						var now = new Date();
						var day = ("0" + now.getDate()).slice(-2);
						var month = ("0" + (now.getMonth() + 1)).slice(-2);
						var year = now.getFullYear();
						var hour = ''+now.getHours();
                		var minute = ''+now.getMinutes();
                		var second = now.getSeconds();
                		var today = (year)+"-"+(month)+"-"+(day)+"T"+(hour.padStart(2,"0"))+":"+(minute.padStart(2,"0"));

						$('#po_tgl').val(today);
						console.log(today);

						var mydate = $('#po_tgl').val();
						var dt = mydate.split("T");
						var tgl_inpt = new Date(dt[0]);
					    var hr = tgl_inpt.getDate();
					    var bln = tgl_inpt.getMonth() + 1;
					    var thn = tgl_inpt.getFullYear();

						var nopro = "PO-"+thn+bln+hr+"-00000#";
						$('#po_noproses').val(nopro);
						$('#term_po option:eq(0)').prop('selected', true);
						
						$('#sub_total_po').val(0);
						$('#disc_persen_po').val(0);
						$('#disc_rp_po').val(0);
						$('#ppn_po').val(1).trigger('change');
						$('#ppn_persen_po').val(11);
						$('#ppn_rp_po').val(0);
						$('#total_po').val(0);

						// $('#add_purchaseorder').modal('show');
					},
					error:function(){
					}
				});

				$('#sub_total_po').val(0);
				$('#disc_persen_po').val(0);
				$('#disc_rp_po').val(0);
				$('#ppn_po').val(1).trigger('change');
				$('#ppn_persen_po').val(11);
				$('#ppn_rp_po').val(0);
				$('#total_po').val(0);
			}
		});

		//action btn reset
		$('#btn-r-po').on('click', function(e) {
			e.preventDefault();
			
			var id_po = $('#id_po').val();

			if(id_po == ""){
				$.ajax({
					url: "<?php echo base_url("purchase/delete_all_detail_po");?>",
					type: "POST",
					data: {},
					cache: false,
					success: function(){
						$('#tbl_podetail').DataTable().destroy();
						fetch_detail_po();
					},
					error:function(){
					}
				});
			}

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

			$.ajax({
					url: "<?php echo base_url("purchase/getProsesPo");?>",
					type: "POST",
					data: {},
					cache: false,
					success: function(){
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

						var now = new Date();
						var day = ("0" + now.getDate()).slice(-2);
						var month = ("0" + (now.getMonth() + 1)).slice(-2);
						var year = now.getFullYear();
						var hour = ''+now.getHours();
                		var minute = ''+now.getMinutes();
                		var second = now.getSeconds();
                		var today = (year)+"-"+(month)+"-"+(day)+"T"+(hour.padStart(2,"0"))+":"+(minute.padStart(2,"0"));

						$('#po_tgl').val(today);
						console.log(today);

						var mydate = $('#po_tgl').val();
						var dt = mydate.split("T");
						var tgl_inpt = new Date(dt[0]);
					    var hr = tgl_inpt.getDate();
					    var bln = tgl_inpt.getMonth() + 1;
					    var thn = tgl_inpt.getFullYear();

						var nopro = "PO-"+thn+bln+hr+"-00000#";
						$('#po_noproses').val(nopro);
						$('#term_po option:eq(0)').prop('selected', true);

						$('#sub_total_po').val(0);
						$('#disc_persen_po').val(0);
						$('#disc_rp_po').val(0);
						$('#ppn_po').val(1).trigger('change');
						$('#ppn_persen_po').val(11);
						$('#ppn_rp_po').val(0);
						$('#total_po').val(0);

						$('#add_purchaseorder').modal('show');
					},
					error:function(){
					}
				});
		});

		$('#chk_tgl').on('change', function(e) {
			e.preventDefault();
			document.getElementById('tgl_mulai').disabled = !this.checked;
			document.getElementById('tgl_selesai').disabled = !this.checked;
		});

		$('#is_user').on('change', function(e) {
			e.preventDefault();
			document.getElementById('user_id').disabled = !this.checked;
		});

		//function search akses
		function search_po() {
			var keyword = $("#keyword").val();
			if(keyword==''){
				keyword = 'none';
			}else{
				keyword  = keyword.replace(/ /g,"_");
			}
			var is_date = $("#chk_tgl").prop("checked");
			var start_date = $("#tgl_mulai").val();
        	var end_date = $("#tgl_selesai").val();
        	var status = $("#status_trans").val();
        	var type = $("#type_trans").val();
        	var is_user = $("#is_user").prop("checked");
        	var user_id = $("#user_id").val();

        	if(is_user == true){
        		is_user = 1;
        	}else{
        		is_user = 0;
        	}

			if(is_date == true){
        		is_date = 1;
        	}else{
        		is_date = 0;
        	}        	

			var urlist = "<?php echo base_url('purchase/order');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + keyword + "/" + is_date + "/" + start_date + "/" + end_date + "/" + status + "/" + type + "/" + is_user + "/"+ user_id + "/"
		    );
		    location.href = url.href;
		}

		$('#btn-rf-po').on('click', function(e) {
			var now = new Date();
			var day = ("0" + now.getDate()).slice(-2);
			var month = ("0" + (now.getMonth() + 1)).slice(-2);
			var year = now.getFullYear();
    		var today = (year)+"-"+(month)+"-"+(day);

			$('#chk_tgl').prop("checked", false);
			$('#keyword').val("");
			$('#keyword-front').val("");
			$("#tgl_mulai").val(today);
        	$("#tgl_selesai").val(today);
        	$("#status").val("");
        	$("#is_user").prop("checked", false);

			$.uniform.update();

			search_po();

		});

		//action btn cari
		$('#btn-sf-po').on('click', function(e) {
			search_po();
		});

		//action ketika enter search bar
		$("#keyword-front").on('keyup', function (e) {
		    if (e.key === 'Enter' || e.keyCode === 13) {
				var keyword = $("#keyword-front").val();
		    	$("#keyword").val(keyword);
		        search_po();
		    }
		});

		//action btn arsip
		$('#btn-a-akses').on('click', function() {
			// Get userid from checked checkboxes
				var id_arr = [];
				$(".chk-po:checked").each(function(){
					var poid = $(this).val();

					id_arr.push(poid);
				});

				// Array length
				var length = id_arr.length;

				if(length > 0){

				// AJAX request
					$.ajax({
						url: "<?php echo base_url("purchase/action_po");?>",
						type: "POST",
						data: {
							type: 4,
							id_po : id_arr
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

		//btn delete item
		$('#btn-h-akses').on('click', function() {
			// Get userid from checked checkboxes
				var id_arr = [];
				$(".chk-po:checked").each(function(){
					var poid = $(this).val();

					id_arr.push(poid);
				});

				// Array length
				var length = id_arr.length;

				if(length > 0){

				// AJAX request
					$.ajax({
						url: "<?php echo base_url("purchase/action_po");?>",
						type: "POST",
						data: {
							type: 3,
							id_po : id_arr
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

		function save_tbl_temp() {
			var tableData = [];

			$('#tbl_podetail_body tr').each(function(row, tr){
			  tableData[row] = {
			    "prod_code": $(tr).find('td:eq(0) div').text(),
			    "prod_name": $(tr).find('td:eq(1) div').text(),
			    "satuan": $(tr).find('td:eq(2) div').text(),
			    "qty_satuan": $(tr).find('td:eq(3) div').text(),
			    "harga": $(tr).find('td:eq(4) div').text(),
			    "sub_total": $(tr).find('td:eq(5) div').text(),
			    "disc1_persen": $(tr).find('td:eq(6) div').text(),
			    "disc1_rp": $(tr).find('td:eq(7) div').text(),
			    "disc2_persen": $(tr).find('td:eq(8) div').text(),
			    "disc2_rp": $(tr).find('td:eq(9) div').text(),
			    "disc3_persen": $(tr).find('td:eq(10) div').text(),
			    "disc3_rp": $(tr).find('td:eq(11) div').text(),
			    "total": $(tr).find('td:eq(12) div').text(),
			    "keterangan": $(tr).find('td:eq(13) div').text(),
			    "id_det" : $(tr).find('td:eq(0) div').data('id')
			  }
			});

			$.ajax({
			url:"<?= base_url('purchase/add_detail_po') ?>",
				method:"POST",
				data:{tableData: tableData},
				success:function(data){
				}
			});
		}

		function qty_calculation(id, column, value) {

			$.ajax({
				url:"<?= base_url('purchase/update_po_change') ?>",
				method:"POST",
				data:{
					id:id,
					column:column,
					value:value
				},
				success:function(){
					
				}
			});

		}

		$(document).on('keypress', '.update-qty, .update-harga, .update-disc1-persen, .update-disc1-rp, .update-disc2-persen, .update-disc2-rp, .update-disc3-persen, .update-disc3-rp, .update-ket', function(e){
		// $(document).on('click', '.update-qty', function(e){
			var keyCode = e.which;
			var letter = String.fromCharCode(keyCode).toLowerCase();
			var isAlpha = /^[a-z0-9]+$/i.test(letter);
			var id = $(this).data('id');
			var column = $(this).data('column');
			var value = $(this).text();

			if (keyCode == 13) {

				e.preventDefault();
				qty_calculation(id, column, value);

				$('#tbl_podetail').DataTable().destroy();
				fetch_detail_po();

				hitungAll();
			}
		});

		$(document).on('focus', '.update-qty, .update-harga, .update-disc1-persen, .update-disc1-rp, .update-disc2-persen, .update-disc2-rp, .update-disc3-persen, .update-disc3-rp, .update-ket', function(e){
			var range = document.createRange();
		    range.selectNodeContents(this);

		    var selection = window.getSelection();
		    selection.removeAllRanges();
		    selection.addRange(range);
		});

		$(document).on('change', '.sel_satuan', function(e) {
			e.preventDefault();

		    var konversi;
		    var id = $(this).data('id');
			var column = $(this).data('column');
			var value = $(this).val();
			var kon1 = $(this).data('kon1');
			var kon2 = $(this).data('kon2');
			var kon3 = $(this).data('kon3');

			if (value == 1) {
		        konversi = kon1;
		    } else if (value == 2) {
		        konversi = kon2;
		    } else if (value == 3) {
		        konversi = kon3;
		    } else {
		        konversi = kon1;
		    }

		    qty_calculation(id,'konversi',konversi);
		    console.log("Konversi : ",konversi);
		    qty_calculation(id, column, value);

		    $('#tbl_podetail').DataTable().destroy();
			fetch_detail_po();
		});

		function set_option(data, ele) {
			const selopt = document.getElementById(ele);

			for (let key in data) {
				let option = document.createElement("option");
			    let optionText = document.createTextNode(key);

			    option.setAttribute('value', data[key]);
			    option.appendChild(optionText);
			    selopt.appendChild(option);
			}
		}

		$('#btn-b-po').on('click', function(e) {
			e.preventDefault();
			var id_po = $('#id_po').val();
			// if(id_brg == ""){
				$.ajax({
					url: "<?php echo base_url("purchase/delete_all_detail_po");?>",
					type: "POST",
					data: {},
					cache: false,
					success: function(){
						$('#tbl_podetail').DataTable().destroy();
						fetch_detail_po();
					},
					error:function(){
					}
				});
			// }
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
			$('#add_purchaseorder').modal('hide');

			// $("#col-qty-satuan").val(0);
			// $("#col-qty-pakai").val(0);
			// $("#col-qty-butuh").val(0);
		});

		//action ketika enter search bar
		$("#keyword-front").on('keyup', function (e) {
		    if (e.key === 'Enter' || e.keyCode === 13) {
				var keyword = $("#keyword-front").val();
		    	$("#keyword").val(keyword);
		        search_brg();
		    }
		});

		
		$(document).on('click', '#btn-c-po', function(e){
		 	e.preventDefault();
		 	var id_po = $('#id_po').val();
			var urlist = "<?php echo base_url('purchase/print_po_pdf');?>";
			
			let hostName = window.location.hostname + ":" + window.location.port;
		    let url = new URL(
		      urlist + "/" + id_po + "/"
		    ); 
		 	window.open(url);
		});

		$("#disc_persen_po").on('keypress', function (e) {
			e.preventDefault();
            if (e.key === 'Enter' || e.keyCode === 13) {
            	
            	var disc = 0;
            	var subTotal = 0;
            	var total = 0;
            	subTotal = $('#sub_total_po').val();
            	disc = $('#disc_persen_po').val();
            	total = (disc/ 100) * subTotal;

            	$('#disc_rp_po').val(0)
            	$('#disc_rp_po').val(parseFloat(total.toFixed(5)));
            	$('#disc_rp_po').focus();
            	hitungAll();

            }
        });

        $("#disc_rp_po").on('keypress', function (e) {
        	
            if (e.key === 'Enter' || e.keyCode === 13) {
            	e.preventDefault();
            	var disc = 0;
            	var subTotal = 0;
            	var total = 0;
            	subTotal = $('#sub_total_po').val();
            	disc = $('#disc_rp_po').val();
            	total = (disc/subTotal) * 100;

            	$('#disc_persen_po').val(0);
            	$('#disc_persen_po').val(parseFloat(total.toFixed(5)));
            	$('#ppn_rp_po').focus();
            	hitungAll();
            }
        });

        $("#ppn_persen_po").on('keypress', function (e) {
        	
            if (e.key === 'Enter' || e.keyCode === 13) {
            	e.preventDefault();
            	
            	$('#ppn_rp_po').focus();
            	hitungAll();
            }
        });

        $("#ppn_rp_po").on('keypress', function (e) {
        	
            if (e.key === 'Enter' || e.keyCode === 13) {
            	e.preventDefault();
            	
            	hitungAll();
            }
        });

		function hitungAll() {
        	let subTotal = 0;
        	var disc = 0;
        	var discRp = 0;
        	var ppn = 0;
        	var ppn_type = 0;
        	var ppnRp = 0;
        	var grandTotal = 0;

        	$.ajax({
				url:"<?= base_url('purchase/getFooterData') ?>",
				method:"POST",
				success:function(dataResult){
					var dataResult = JSON.parse(dataResult);
					let sub_total_po = dataResult.sub_total;
					
					$('#sub_total_po').text(parseFloat(sub_total_po.toFixed(5)));
					$('#sub_total_po').val(parseFloat(sub_total_po.toFixed(5)));

					subTotal = $('#sub_total_po').text();

				    discRp = $('#disc_rp_po').val();
				    disc = (discRp/subTotal) * 100;
				    ppn_type = $('#ppn_po').val();
				    ppn = $('#ppn_persen_po').val();
				    if(ppn_type == 2){ //ppn include
				    	ppnRp = (((parseFloat(subTotal)-parseFloat(discRp))/((parseFloat(ppn)+100)/100))*(parseFloat(ppn)/100));
				    	grandTotal = parseFloat(subTotal) - parseFloat(discRp);
				    }else if(ppn_type == 1){//ppn exclude
				    	ppnRp = ((parseFloat(subTotal)-parseFloat(discRp))*(parseFloat(ppn)/100));
				    	grandTotal = parseFloat(subTotal) - parseFloat(discRp) - parseFloat(ppnRp);
				    }else{
				    	grandTotal = parseFloat(subTotal) - parseFloat(discRp) - parseFloat(ppnRp);
				    }

					$('#disc_persen_po').val(parseFloat(disc.toFixed(5)));
				    $('#ppn_rp_po').val(parseFloat(ppnRp.toFixed(5)));
				    $('#total_po').val(parseFloat(grandTotal.toFixed(5)));
				    $('#total_po').text(parseFloat(grandTotal.toFixed(5)));
				}
			});
        	
		}

		$(document).on('change', '#ppn_po', function(e) {
			e.preventDefault();

		    hitungAll();
		});
</script>
<!-- END JAVASCRIPTS -->
<?php
    $this->load->view("_partials/end_body.php");
?>