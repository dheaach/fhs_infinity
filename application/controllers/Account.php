<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once(APPPATH . '../vendor/setasign/fpdf/fpdf.php');

class Account extends CI_Controller {
	
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
		$this->load->view("admin/account");
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
			'select' => array('count(trek.rek_no) as aktif'),
	    	'table' => 'trek',
	    	'where' => array('trek.is_delete' => 0)
	    );
	    $ct2 = array(
			'select' => array('count(trek.rek_no) as non'),
	    	'table' => 'trek',
	    	'where' => array('trek.is_delete' => 1)
	    );

	    $option1 = array(
			'select' => array(
								'tcat_gudang.cat_gud_no',
								'tcat_gudang.kode',
								'tcat_gudang.nama'),
	    	'table' => 'tcat_gudang',
	    	'where' => array(
							'tcat_gudang.is_delete' => 0),
	    	'order' => array('tcat_gudang.nama' => 'ASC')
	    );

		if($keyword=='none'){$keyword = '';}else{$keyword = str_replace("_"," ",$keyword);}
		$data = array();

		$data['grp_aktif'] =  $this->setting_model->commonGet($ct1);
	    $data['grp_non'] =  $this->setting_model->commonGet($ct2);
	    $data['kat'] =  $this->setting_model->commonGet($option1);
		$data['keyw'] = $keyword;
		$data['is_arc'] = $chk;

		$this->load->view("admin/account",$data);
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
			$like = array('trek.rek_kode' => $keyword);
			$or_like = array('trek.rek_nama' => $keyword
						);
		}

		$option1 = array(
			'select' => array('trek.*', 'rek_jen.rekjen_keterangan'),
	    	'table' => 'trek',
	    	'join' => array('rek_jen' => 'trek.rek_gol = rek_jen.rekjen_no'),
	    	'where_in' => array(
							'trek.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like,
	    	'order' => array('rek_kode' => 'ASC')
	    );

	    $option2 = array(
			'select' => array('count(trek.rek_no) as total'),
	    	'table' => 'trek',
	    	'where_in' => array(
							'trek.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like,
	    	'order' => array('rek_kode' => 'ASC')
	    );
		
		$data = array();
		$data['grp'] = $this->setting_model->commonGet($option1);
		$data['tot'] = $this->setting_model->commonGet($option2);
		$this->load->view('admin/demo/ecommerce_account',$data);
		
	}
	public function action_account()
	{
		$id_rek =$this->input->post('id_rek');
		$rek_kode=$this->input->post('rek_kode');
		$rek_nama=$this->input->post('rek_nama');
		$cab_no=$this->input->post('cab_no');
		$rek_type=$this->input->post('rek_type');
		$rek_gol=$this->input->post('rek_gol');
		$ket1=$this->input->post('ket1');
		$is_kas=$this->input->post('is_kas');
		$status=$this->input->post('status');

		$chk_name = array('trek.rek_kode' => $rek_kode);
		$is_name = $this->get_data($chk_name);
		
		$date = date('Y-m-d H:i:s');

		if($this->input->post('type')==1){// insert
			if ($is_name == 1) {
				echo json_encode(array(
					"statusCode"=>405
				));
			}else{
				$rek_no =$this->GetNoIDField('rek_no','trek');

				$insert = array(
					'insert' => array(
						'rek_no' => $rek_no,
						'iUpload' => 1,
						'create_date' => $date,
						'rek_kode' => $rek_kode,
						'rek_nama' => $rek_nama,
						'cab_no' => $cab_no,
						'rek_type' => $rek_type,
						'rek_gol' => $rek_gol,
						'ket1' => $ket1,
						'is_kas' => $is_kas,
						'is_delete' => $status,
					),
					'table' => 'trek'
				);

	        	$ins = $this->setting_model->commonInsert($insert);
	        	// print_r($ins);
	        	
	        	echo json_encode(array(
					"statusCode"=>200
				));
			}
		}elseif($this->input->post('type')==2) {//update
			$update = array(
					'update' => array(
						'rek_kode' => $rek_kode,
						'rek_nama' => $rek_nama,
						'cab_no' => $cab_no,
						'rek_type' => $rek_type,
						'rek_gol' => $rek_gol,
						'ket1' => $ket1,
						'is_kas' => $is_kas,
						'is_delete' => $status,
					),
					'table' => 'trek',
					'where' => array(
						'trek.rek_no' => $id_rek
					)
			);
        	$this->setting_model->commonUpdate($update);

			echo json_encode(array(
				"statusCode"=>201
			));
		}elseif($this->input->post('type')==3) {//delete

			 foreach($id_rek as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'trek',
						'where' => array(
							'trek.rek_no' => $id
						)
				);
	        	$this->setting_model->commonUpdate($update);
		     }
			echo json_encode(array(
				"statusCode"=>202
			));
		}elseif($this->input->post('type')==4) {//arsip

			 foreach($id_rek as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'trek',
						'where' => array(
							'trek.rek_no' => $id
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
			'select' => array('count(trek.rek_no) as hasil'),
	    	'table' => 'trek',
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
			'select' => array('trek.*'),
	    	'table' => 'trek',
	    	'where' => array(
							'trek.rek_no' => $this->input->post('id_rek')
						)
	    );
	    
		$data['get_data'] = $this->setting_model->commonGet($option);
		if( is_array($data['get_data']) || is_object($data['get_data']) ) {
		    foreach($data['get_data'] as $right) {
		    	$rek_kode_sub = substr($right->rek_kode, 1, 2);
				$rek_kode_id = substr($right->rek_kode, 3, 3);
				$rek_kode_rin = substr($right->rek_kode, 6, 3);
		    	echo json_encode(array(
					'rek_no' => $right->rek_no,
					'rek_kode_sub' => $rek_kode_sub,
					'rek_kode_id' => $rek_kode_id,
					'rek_kode_rin' => $rek_kode_rin,
					'rek_nama' => $right->rek_nama,
					'cab_no' => $right->cab_no,
					'rek_type' => $right->rek_type,
					'rek_gol' => $right->rek_gol,
					'ket1' => $right->ket1,
					'is_kas' => ($right->is_kas==0) ? false : true,
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
			$like = array('trek.rek_kode' => $keyword);
			$or_like = array('trek.rek_nama' => $keyword
						);
		}

		$option1 = array(
			'select' => array('trek.rek_kode',
								'trek.rek_nama', 
								'trek.cab_no', 
								'trek.rek_type', 
								'trek.rek_gol', 
								'trek.ket1'
							),
	    	'table' => 'trek',
	    	'where_in' => array(
							'trek.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );

	    $option2 = array(
			'select' => array('count(trek.rek_no) as total'),
	    	'table' => 'trek',
	    	'where_in' => array(
							'trek.is_delete' => $is_archive
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
		$pdf->Cell($tableWidth, 10, 'DAFTAR COA OHH_BAKERY', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($tableWidth * 0.05, 6, 'No', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.15, 6, 'Kode', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.20, 6, 'Nama', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.15, 6, 'Alamat', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.15, 6, 'Telp', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.15, 6, 'HP', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.15, 6, 'Contact', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 8);

		$no = 0;
		foreach ($data['grp'] as $br) {
		    $no++;
		    $pdf->Cell($tableWidth * 0.05, 6, $no, 1, 0, 'C');
		    $pdf->Cell($tableWidth * 0.15, 6, $br->rek_kode, 1, 0, 'L');
			$pdf->Cell($tableWidth * 0.20, 6, $br->rek_nama, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.15, 6, $br->cab_no, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.15, 6, $br->rek_type, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.15, 6, $br->rek_gol, 1, 1, 'L');
			$pdf->Cell($tableWidth * 0.15, 6, $br->ket1, 1, 1, 'L');
		}

		$filename = 'account_'.$now.'.pdf';
		$pdf->Output($filename, 'I');
        // $html = $this->load->view('print/sub_kategori', $data, true);
        // $this->pdf->createPDF($html, 'sub_kategori_'.$now, false);
	}
	public function print_csv($keyword = '',$is_archive = '')
	{
		// file name 
		$filename = 'account_'.date('d-m-Y').'.csv'; 
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
			$like = array('trek.rek_kode' => $keyword);
			$or_like = array('trek.rek_nama' => $keyword
						);
		}

		$option1 = array(
			'select' => array('trek.rek_kode',
								'trek.rek_nama', 
								'trek.cab_no', 
								'trek.rek_type', 
								'trek.rek_gol', 
								'trek.ket1'
							),
	    	'table' => 'trek',
	    	'where_in' => array(
							'trek.is_delete' => $is_archive
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = $this->setting_model->commonGet($option1);
		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("Kode","Nama","Alamat","Telp","HP","Contact"); 
		fputcsv($file, $header);
		foreach ($data as $key){ 
			fputcsv($file,(array)$key); 
		}
		fclose($file); 
		exit; 
	}

	public function print_exc($keyword = '',$is_archive = '')
	{
		$filename = 'account_'.date('d-m-Y');  
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
			$like = array('trek.rek_kode' => $keyword);
			$or_like = array('trek.rek_nama' => $keyword
						);
		}

		$option1 = array(
			'select' => array('trek.rek_kode',
								'trek.rek_nama', 
								'trek.cab_no', 
								'trek.rek_type', 
								'trek.rek_gol', 
								'trek.ket1'
							),
	    	'table' => 'trek',
	    	'where_in' => array(
							'trek.is_delete' => $is_archive
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

        $rows = 2;
        foreach ($data as $val){
            $sheet->setCellValue('A' . $rows, $val->rek_kode);
            $sheet->setCellValue('B' . $rows, $val->rek_nama);
            $sheet->setCellValue('C' . $rows, $val->cab_no);
            $sheet->setCellValue('D' . $rows, $val->rek_type);
            $sheet->setCellValue('E' . $rows, $val->rek_gol);
            $sheet->setCellValue('F' . $rows, $val->ket1);
            $rows++;
        } 

        $writer = new Xlsx($spreadsheet);
		
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        $writer->save('php://output');
	}

	
}