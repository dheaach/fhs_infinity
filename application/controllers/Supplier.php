<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once(APPPATH . '../vendor/setasign/fpdf/fpdf.php');

class Supplier extends CI_Controller {
	
    public function __construct()
    {
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('login_model');
		$this->load->model('transaction_model');
		$this->load->model('setting_model');
	}

	public function index()
	{  
		$this->load->view("admin/supplier");
	}

	public function page($keyword = '',$is_archive = '' )
	{  
		if($is_archive <> ''){
			if($is_archive <> 'false'){
				$is_archive = array(1,0);
				$chk = 1;
			}else{
				$is_archive = array(0);
				$chk = 0;
			}
		}else{
			$is_archive = array(0);
			$chk = 0;
		}

		$ct1 = array(
			'select' => array('count(tperson.person_no) as aktif'),
	    	'table' => 'tperson',
	    	'where' => array(
							'tperson.is_delete' => 0,
							'tperson.person_type' => 0
						)
	    );
	    $ct2 = array(
			'select' => array('count(tperson.person_no) as non'),
	    	'table' => 'tperson',
	    	'where' => array('tperson.is_delete' => 1,
	    					'tperson.person_type' => 0
	    					)
	    );

		if($keyword=='none'){$keyword = '';}else{$keyword = str_replace("_"," ",$keyword);}
		$data = array();

		$option1 = array(
			'select' => array(
								'ttop.top_id',
								'ttop.kode',
								'ttop.ndays'),
	    	'table' => 'ttop',
	    	'where' => array(
							'ttop.is_delete' => 0),
	    	'order' => array('ttop.is_default' => 'DESC')
	    );

	    $option2 = array(
			'select' => array('*'),
	    	'table' => 'tm_uang',
	    	'where' => array(
							'tm_uang.is_delete' => 0),
	    	'order' => array('tm_uang.is_default' => 'DESC')
	    );

		$data['grp_aktif'] =  $this->setting_model->commonGet($ct1);
	    $data['grp_non'] =  $this->setting_model->commonGet($ct2);
	    $data['top'] =  $this->setting_model->commonGet($option1);
	    $data['uang'] =  $this->setting_model->commonGet($option2);
		$data['keyw'] = $keyword;
		$data['is_arc'] = $chk;
		$data['page'] = 54;

		$this->load->view("admin/supplier",$data);
	}

	public function list($keyword = '',$is_archive = '')
	{
		if($is_archive <> ''){
			if($is_archive <> 'false'){
				$is_archive = array(1,0);
			}else{
				$is_archive = array(0);
			}
		}else{
			$is_archive = array(0);
		}

		if($keyword == 'none' OR $keyword == ''){
			$like = '';
			$or_like = '';
		}else{
			$keyword = str_replace("_"," ",$keyword);
			$like = array('tperson.person_code' => $keyword);
			$or_like = array('tperson.person_name' => $keyword,
							'tperson.person_alamat' => $keyword,
							'tperson.person_telp' => $keyword,
							'tperson.person_contact' => $keyword
						);
		}

		$option1 = array(
			'select' => array('*'),
	    	'table' => 'tperson',
	    	'where' => array('tperson.person_type' => 0),
	    	'where_in' => array(
							'tperson.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );

	    $option2 = array(
			'select' => array('count(tperson.person_no) as total'),
	    	'table' => 'tperson',
	    	'where' => array('tperson.person_type' => 0),
	    	'where_in' => array(
							'tperson.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = array();
		$data['grp'] = $this->setting_model->commonGet($option1);
		$data['tot'] = $this->setting_model->commonGet($option2);
		$this->load->view('admin/demo/ecommerce_supplier',$data);
		
	}
	public function action_supplier()
	{
		$id_person =$this->input->post('id_person');
		$person_code=$this->input->post('person_code');
		$person_name=$this->input->post('person_name');
		$person_alamat=$this->input->post('person_alamat');
		$person_telp=$this->input->post('person_telp');
		$person_hp=$this->input->post('person_hp');
		$person_contact=$this->input->post('person_contact');
		$is_default=$this->input->post('is_default');
		$person_fax=$this->input->post('person_fax');
		$is_person_tax=$this->input->post('is_person_tax');
		$rek_hutang_no=$this->input->post('rek_hutang_no');
		$uang_id=$this->input->post('uang_id');
		$top_id=$this->input->post('top_id');
		$propinsi=$this->input->post('propinsi');
		$kota=$this->input->post('kota');
		$person_bank=$this->input->post('person_bank');
		$person_acc=$this->input->post('person_acc');
		$person_an=$this->input->post('person_an');
		$npwp=$this->input->post('npwp');
		$person_nm_wp=$this->input->post('person_nm_wp');
		$person_alamat_wp=$this->input->post('person_alamat_wp');
		$person_type=$this->input->post('person_type');
		$person_desc=$this->input->post('person_desc');
		$status=$this->input->post('status');

		$chk_name = array('tperson.person_code' => $person_code);
		$is_name = $this->get_data($chk_name);

		if ($person_code == '') {
			$person_code = $this->GetNoIDMasterBulan('SP','person_code','tperson');
		}

		$date = date('Y-m-d H:i:s');

		if($this->input->post('type')==1){// insert
			if ($is_name == 1) {
				echo json_encode(array(
					"statusCode"=>405
				));
			}else{
				$person_no =$this->GetNoIDField('person_no','tperson');

				$insert = array(
					'insert' => array(
						'person_no' => $person_no,
						'iUpload' => 1,
						'create_date' => $date,
						'person_code' => $person_code,
						'person_name' => $person_name,
						'person_alamat' => $person_alamat,
						'person_telp' => $person_telp,
						'person_hp' => $person_hp,
						'person_contact' => $person_contact,
						'is_default' => $is_default,
						'person_fax' => $person_fax,
						'is_person_tax' => $is_person_tax,
						'rek_hutang_no' => $rek_hutang_no,
						'uang_id' => $uang_id,
						'top_id' => $top_id,
						'propinsi' => $propinsi,
						'kota' => $kota,
						'person_bank' => $person_bank,
						'person_acc' => $person_acc,
						'person_an' => $person_an,
						'npwp' => $npwp,
						'person_nm_wp' => $person_nm_wp,
						'person_alamat_wp' => $person_alamat_wp,
						'person_type' => $person_type,
						'person_desc' => $person_desc,
						'is_save_harga' => 0,
						'is_delete' => $status,
					),
					'table' => 'tperson'
				);

	        	$this->setting_model->commonInsert($insert);
	        	
	        	echo json_encode(array(
					"statusCode"=>200
				));
			}
		}elseif($this->input->post('type')==2) {//update
			$update = array(
					'update' => array(
						'person_code' => $person_code,
						'person_name' => $person_name,
						'person_alamat' => $person_alamat,
						'person_telp' => $person_telp,
						'person_hp' => $person_hp,
						'person_contact' => $person_contact,
						'is_default' => $is_default,
						'person_fax' => $person_fax,
						'is_person_tax' => $is_person_tax,
						'rek_hutang_no' => $rek_hutang_no,
						'uang_id' => $uang_id,
						'top_id' => $top_id,
						'propinsi' => $propinsi,
						'kota' => $kota,
						'person_bank' => $person_bank,
						'person_acc' => $person_acc,
						'person_an' => $person_an,
						'npwp' => $npwp,
						'person_nm_wp' => $person_nm_wp,
						'person_alamat_wp' => $person_alamat_wp,
						'person_type' => $person_type,
						'person_desc' => $person_desc,
						'is_delete' => $status,
					),
					'table' => 'tperson',
					'where' => array(
						'tperson.person_no' => $id_person
					)
			);
        	$this->setting_model->commonUpdate($update);

			echo json_encode(array(
				"statusCode"=>201
			));
		}elseif($this->input->post('type')==3) {//delete

			 foreach($id_person as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'tperson',
						'where' => array(
							'tperson.person_no' => $id
						)
				);
	        	$this->setting_model->commonUpdate($update);
		     }
			echo json_encode(array(
				"statusCode"=>202
			));
		}elseif($this->input->post('type')==4) {//arsip

			 foreach($id_person as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'tperson',
						'where' => array(
							'tperson.person_no' => $id
						)
				);
	        	$this->setting_model->commonUpdate($update);
		     }
			echo json_encode(array(
				"statusCode"=>202
			));
		}
	}

	public function get_data($kondisi = array())
	{
		$option = array(
			'select' => array('count(tperson.person_no) as hasil'),
	    	'table' => 'tperson',
	    	'where' => $kondisi
	    );

		$data['get_data'] = $this->setting_model->commonGet($option);
		if( is_array($data['get_data']) || is_object($data['get_data'])) {
		    foreach($data['get_data'] as $right) {
		    	$is_name = $right->hasil;
		    }
		}

		return $is_name;
	}

	public function get_edit_data()
	{
		$option = array(
			'select' => array('tperson.*', 
								'trek.rek_kode', 'trek.rek_nama'),
	    	'table' => 'tperson',
	    	'join' => array('trek' => 'trek.rek_no = tperson.rek_hutang_no'),
	    	'where' => array(
							'tperson.person_no' => $this->input->post('id_person')
						)
	    );
	    
		$data['get_data'] = $this->setting_model->commonGet($option);
		if( is_array($data['get_data']) || is_object($data['get_data']) ) {
		    foreach($data['get_data'] as $right) {
		    	echo json_encode(array(
					'person_no' => $right->person_no,
					'person_code' => $right->person_code,
					'person_name' => $right->person_name,
					'person_alamat' => $right->person_alamat,
					'person_telp' => $right->person_telp,
					'person_hp' => $right->person_hp,
					'person_contact' => $right->person_contact,
					'is_default' => ($right->is_default==0) ? false : true,
					'person_fax' => $right->person_fax,
					'is_person_tax' => ($right->is_person_tax==0) ? false : true,
					'rek_hutang_no' => $right->rek_hutang_no,
					'rek_hutang_kode' => $right->rek_kode,
					'rek_hutang_nama' => $right->rek_nama,
					'uang_id' => $right->uang_id,
					'top_id' => $right->top_id,
					'propinsi' => $right->propinsi,
					'kota' => $right->kota,
					'person_bank' => $right->person_bank,
					'person_acc' => $right->person_acc,
					'person_an' => $right->person_an,
					'person_nm_wp' => $right->person_nm_wp,
					'person_alamat_wp' => $right->person_alamat_wp,
					'person_type' => $right->person_type,
					'person_desc' => $right->person_desc,
					'npwp' => $right->npwp,
					'status' => $right->is_delete,
				));
		    }
		}
		
		
	}

	public function GetNoIDField($field='', $table='')
	{
		$date = date('Y-m-d H:i:s');
		$bulan = date('m');
		$tahun = date('Y');
		$hari = date('d');
		$tgl = $bulan.' : '.$tahun.' : '.$hari;
		$user_id = $this->session->userdata('person_id');
		$no_prefix = '';
		$jumlah = '';
		$kata = '';
		$tots = '';

		$insert = array(
			'insert' => array(
				'tgl' => $date,
				'user_id' => $user_id,
				'ket' => $field.'-'.$table),
			'table' => 'tlog_trx'
		);
    	$this->setting_model->commonInsert($insert);

		$select = array(
			'select' => array('total'),
			'table' => 'ttotal_id',
			'where' => array('nama' => $table.'_'.$no_prefix,
						'bulan' => $bulan,
						'tahun' => $tahun,
						'hari' => $hari)
		);

    	$sc = $this->setting_model->commonGet($select);

    	if (is_array($sc) || is_object($sc)){
    		foreach ($sc as $abc){
				$tots = $abc->total;
			}

    		$update = array(
					'update' => array(
						'total' => $tots+1),
					'table' => 'ttotal_id',
					'where' => array('nama' => $table.'_'.$no_prefix,
						'bulan' => $bulan,
						'tahun' => $tahun,
						'hari' => $hari)
			);
        	$c = $this->setting_model->commonUpdate($update);
        	// print_r($c);

    	}else{
    		$insert2 = array(
				'insert' => array(
					'nama' => $table.'_'.$no_prefix,
					'total' => 1,
					'bulan' => $bulan,
					'tahun' => $tahun,
					'hari' => $hari),
				'table' => 'ttotal_id'
			);
			$this->setting_model->commonInsert($insert2);

    	}

    	$select2 = array(
			'select' => array('total'),
			'table' => 'ttotal_id',
			'like' => array('nama' => $table.'_'.$no_prefix),
			'where' => array('bulan' => $bulan,
						'tahun' => $tahun,
						'hari' => $hari)
		);
		$sc2 = $this->setting_model->commonGet($select2);
		foreach ($sc2 as $key){
			$jumlah = $key->total;
		}

		$vd = date("Y-m-d");
		$vh = date("H:i:s");

		$orderdate = explode('-', $vd);
		$year = substr($orderdate[0],-2);
		$month   = $orderdate[1];
		$date  = $orderdate[2];

		$getDate = $year.$month.$date;

		$orderhrs = explode(':', $vh);
		$hrs = $orderhrs[0];
		$mnt   = $orderhrs[1];
		$sc  = $orderhrs[2];

		$getTime = $hrs.$mnt.$sc;


		if($no_prefix <> ''){
			$kata = $no_prefix.'-'.$getDate.'-'.$getTime.'-'.sprintf("%04d", $jumlah);
		}else{
			$kata = 'ID-'.$getDate.'-'.$getTime.'-'.sprintf("%04d", $jumlah);
		}
		
		return $kata;

	}

	public function GetNoIDMasterBulan($dpn = '', $field='', $table='')
	{
		$date = date('Y-m-d H:i:s');
		$bulan = date('m');
		$tahun = date('Y');
		$hari = date('d');
		$tgl = $bulan.' : '.$tahun.' : '.$hari;
		$user_id = $this->session->userdata('person_id');
		$user_gud = $this->session->userdata('gud_no');
		$no_prefix = '';
		$jumlah = '';
		$kata = '';
		$tots = '';

		$select = array(
			'select' => array('no_prefix'),
			'table' => 'tcat_gudang',
			'where' => array('cat_gud_no' => $user_gud)
		);

    	$sc = $this->setting_model->commonGet($select);

    	if (is_array($sc) || is_object($sc)){
    		foreach ($sc as $abc){
				$no_prefix = $abc->no_prefix;
			}
    	}

    	$select2 = array(
			'select' => array('total'),
			'table' => 'ttotal_id',
			'where' => array('nama' => $table.'_'.$no_prefix,
						'bulan' => $bulan,
						'tahun' => $tahun,
						'hari' => $hari)
		);

    	$sc2 = $this->setting_model->commonGet($select2);

    	if (is_array($sc2) || is_object($sc2)){
    		foreach ($sc2 as $abc){
				$tots = $abc->total;
			}

    		$update = array(
					'update' => array(
						'total' => $tots+1),
					'table' => 'ttotal_id',
					'where' => array('nama' => $table.'_'.$no_prefix,
						'bulan' => $bulan,
						'tahun' => $tahun,
						'hari' => $hari)
			);
        	$c = $this->setting_model->commonUpdate($update);
    	}else{
    		$insert2 = array(
				'insert' => array(
					'nama' => $table.'_'.$no_prefix,
					'total' => 1,
					'bulan' => $bulan,
					'tahun' => $tahun,
					'hari' => $hari),
				'table' => 'ttotal_id'
			);
			$this->setting_model->commonInsert($insert2);

    	}

    	$select3 = array(
			'select' => array('total'),
			'table' => 'ttotal_id',
			'like' => array('nama' => $table.'_'.$no_prefix),
			'where' => array('bulan' => $bulan,
						'tahun' => $tahun,
						'hari' => $hari)
		);
		$sc3 = $this->setting_model->commonGet($select3);
		foreach ($sc3 as $key){
			$jumlah = $key->total;
		}

		$vd = date("Y-m-d");

		$orderdate = explode('-', $vd);
		$year = substr($orderdate[0],-2);
		$month   = $orderdate[1];

		$getDate = $year.$month;

		if($no_prefix <> ''){
			$kata = $no_prefix.'-'.$dpn.''.$getDate.''.sprintf("%03d", $jumlah);
		}else{
			$kata = $dpn.''.$getDate.''.sprintf("%03d", $jumlah);
		}
		
		return $kata;

	}

	public function print_pdf($keyword = '',$is_archive = '')
	{
		$now = date('d-m-Y');
		if($is_archive <> ''){
			if($is_archive <> 'false'){
				$is_archive = array(1,0);
			}else{
				$is_archive = array(0);
			}
		}else{
			$is_archive = array(0);
		}

		if($keyword == 'none' OR $keyword == ''){
			$like = '';
			$or_like = '';
		}else{
			$keyword = str_replace("_"," ",$keyword);
			$like = array('tperson.person_code' => $keyword);
			$or_like = array('tperson.person_name' => $keyword,
							'tperson.person_alamat' => $keyword,
							'tperson.person_telp' => $keyword,
							'tperson.person_contact' => $keyword
						);
		}

		$option1 = array(
			'select' => array('tperson.person_code',
								'tperson.person_name', 
								'tperson.person_alamat', 
								'tperson.person_telp', 
								'tperson.person_hp', 
								'tperson.person_contact',
								'tperson.kota', 
								'ttop.ndays', 
								'tperson.npwp'
							),
	    	'table' => 'tperson',
	    	'join' => array('ttop' => 'ttop.top_id = tperson.top_id'),
	    	'where' => array('tperson.person_type' => 0),
	    	'where_in' => array(
							'tperson.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );

	    $option2 = array(
			'select' => array('count(tperson.person_no) as total'),
	    	'table' => 'tperson',
	    	'join' => array('ttop' => 'ttop.top_id = tperson.top_id'),
	    	'where' => array('tperson.person_type' => 0),
	    	'where_in' => array(
							'tperson.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = array();
		$data['grp'] = $this->setting_model->commonGet($option1);
		$data['tot'] = $this->setting_model->commonGet($option2);

		$pdf = new FPDF();
		$pdf->AddPage('P', 'A4');
		$pdf->SetFont('Arial','B',12);
		$pageWidth = $pdf->GetPageWidth();

		// Define the desired margins
		$leftMargin = 5;
		$rightMargin = 5;

		// Calculate the table width based on the available space
		$tableWidth = $pageWidth - $leftMargin - $rightMargin;

		$pdf->SetLeftMargin($leftMargin);
		$pdf->SetRightMargin($rightMargin);

		// Calculate the X position to center the table
		$tableX = ($pageWidth - $tableWidth) / 2;

		$pdf->Cell($tableX);
		$pdf->Cell($tableWidth, 10, 'DAFTAR Supplier OHH_BAKERY', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($tableWidth * 0.05, 6, 'No', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.10, 6, 'Kode', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.15, 6, 'Nama', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.10, 6, 'Alamat', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.10, 6, 'Telp', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.10, 6, 'HP', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.10, 6, 'Contact', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.10, 6, 'Kota', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.10, 6, 'TOP', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.10, 6, 'NPWP', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 8);

		$no = 0;
		foreach ($data['grp'] as $br) {
		    $no++;
		    $pdf->Cell($tableWidth * 0.05, 6, $no, 1, 0, 'C');
		    $pdf->Cell($tableWidth * 0.10, 6, $br->person_code, 1, 0, 'L');
			$pdf->Cell($tableWidth * 0.15, 6, $br->person_name, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.10, 6, $br->person_alamat, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.10, 6, $br->person_telp, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.10, 6, $br->person_hp, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.10, 6, $br->person_contact, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.10, 6, $br->kota, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.10, 6, $br->nDays, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.10, 6, $br->npwp, 1, 1, 'L');
		}

		$filename = 'supplier_'.$now.'.pdf';
		$pdf->Output($filename, 'I');
        // $html = $this->load->view('print/sub_kategori', $data, true);
        // $this->pdf->createPDF($html, 'sub_kategori_'.$now, false);
	}
	public function print_csv($keyword = '',$is_archive = '')
	{
		// file name 
		$filename = 'supplier_'.date('d-m-Y').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

		if($is_archive <> ''){
			if($is_archive <> 'false'){
				$is_archive = array(1,0);
			}else{
				$is_archive = array(0);
			}
		}else{
			$is_archive = array(0);
		}

		if($keyword == 'none' OR $keyword == ''){
			$like = '';
			$or_like = '';
		}else{
			$keyword = str_replace("_"," ",$keyword);
			$like = array('tperson.person_code' => $keyword);
			$or_like = array('tperson.person_name' => $keyword,
							'tperson.person_alamat' => $keyword,
							'tperson.person_telp' => $keyword,
							'tperson.person_contact' => $keyword
						);
		}

		$option1 = array(
			'select' => array('tperson.person_code',
								'tperson.person_name', 
								'tperson.person_alamat', 
								'tperson.person_telp', 
								'tperson.person_hp', 
								'tperson.person_contact',
								'tperson.kota', 
								'ttop.ndays', 
								'tperson.npwp'
							),
	    	'table' => 'tperson',
	    	'join' => array('ttop' => 'ttop.top_id = tperson.top_id'),
	    	'where' => array('tperson.person_type' => 0),
	    	'where_in' => array(
							'tperson.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = $this->setting_model->commonGet($option1);
		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("Kode","Nama","Alamat","Telp","HP","Contact","Kota","TOP","NPWP"); 
		fputcsv($file, $header);
		foreach ($data as $key){ 
			fputcsv($file,(array)$key); 
		}
		fclose($file); 
		exit; 
	}

	public function print_exc($keyword = '',$is_archive = '')
	{
		$filename = 'supplier_'.date('d-m-Y');  
		if($is_archive <> ''){
			if($is_archive <> 'false'){
				$is_archive = array(1,0);
			}else{
				$is_archive = array(0);
			}
		}else{
			$is_archive = array(0);
		}

		if($keyword == 'none' OR $keyword == ''){
			$like = '';
			$or_like = '';
		}else{
			$keyword = str_replace("_"," ",$keyword);
			$like = array('tperson.person_code' => $keyword);
			$or_like = array('tperson.person_name' => $keyword,
							'tperson.person_alamat' => $keyword,
							'tperson.person_telp' => $keyword,
							'tperson.person_contact' => $keyword
						);
		}

		$option1 = array(
			'select' => array('tperson.person_code',
								'tperson.person_name', 
								'tperson.person_alamat', 
								'tperson.person_telp', 
								'tperson.person_hp', 
								'tperson.person_contact',
								'tperson.kota', 
								'ttop.ndays', 
								'tperson.npwp'
							),
	    	'table' => 'tperson',
	    	'join' => array('ttop' => 'ttop.top_id = tperson.top_id'),
	    	'where' => array('tperson.person_type' => 0),
	    	'where_in' => array(
							'tperson.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = $this->setting_model->commonGet($option1);

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Kode');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Alamat');
        $sheet->setCellValue('D1', 'Telp');
        $sheet->setCellValue('E1', 'HP');
        $sheet->setCellValue('F1', 'Contact');
        $sheet->setCellValue('G1', 'Kota');
        $sheet->setCellValue('H1', 'TOP');
        $sheet->setCellValue('I1', 'NPWP');

        $rows = 2;
        foreach ($data as $val){
            $sheet->setCellValue('A' . $rows, $val->person_code);
            $sheet->setCellValue('B' . $rows, $val->person_name);
            $sheet->setCellValue('C' . $rows, $val->person_alamat);
            $sheet->setCellValue('D' . $rows, $val->person_telp);
            $sheet->setCellValue('E' . $rows, $val->person_hp);
            $sheet->setCellValue('F' . $rows, $val->person_contact);
            $sheet->setCellValue('G' . $rows, $val->kota);
            $sheet->setCellValue('H' . $rows, $val->ndays);
            $sheet->setCellValue('I' . $rows, $val->npwp);
            $rows++;
        } 

        $writer = new Xlsx($spreadsheet);
		
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        $writer->save('php://output');
	}

	public function get_rek_dasar()
	{
		$rek_kode_acc = '';
		$rek_nama_acc = '';

		$RekDasar = $this->setting_model->GetRekDasar();

		$rek_acc = $this->setting_model->ControlRek($RekDasar['hutang_no']);
		if ($rek_acc <> '') {
			$select = array(
				'select' => array('rek_no',
									'rek_kode',
									'rek_nama',
									'rek_type'),
		    	'table' => 'trek',
		    	'where' => array('rek_no' => $rek_acc)
		    );

			$acc = $this->setting_model->commonGet($select);

			foreach ($acc as $key) {
				$rek_kode_acc = $key->rek_kode;
				$rek_nama_acc = $key->rek_nama;
			}
		}

		echo json_encode(array(
			"rek_no" => $rek_acc,
			"rek_kode_acc" => $rek_kode_acc,
			"rek_nama_acc" => $rek_nama_acc,
		));
	}
}