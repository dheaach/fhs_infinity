<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once(APPPATH . '../vendor/setasign/fpdf/fpdf.php');

class Bank extends CI_Controller {
	
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
		$this->load->view("admin/bank");
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
			'select' => array('count(tbank.bank_no) as aktif'),
	    	'table' => 'tbank',
	    	'where' => array(
							'tbank.is_delete' => 0)
	    );
	    $ct2 = array(
			'select' => array('count(tbank.bank_no) as non'),
	    	'table' => 'tbank',
	    	'where' => array('tbank.is_delete' => 1)
	    );

		if($keyword=='none'){$keyword = '';}else{$keyword = str_replace("_"," ",$keyword);}
		$data = array();

		$data['grp_aktif'] =  $this->setting_model->commonGet($ct1);
	    $data['grp_non'] =  $this->setting_model->commonGet($ct2);
		$data['keyw'] = $keyword;
		$data['is_arc'] = $chk;

		$this->load->view("admin/bank",$data);
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
		}else{
			$keyword = str_replace("_"," ",$keyword);
			$like = array('tbank.bank_code' => $keyword);
		}

		$option1 = array(
			'select' => array(
								'tbank.bank_no',
								'tbank.bank_code',
								'tbank.bank_name',
								'concat(trek.rek_kode, " - ", trek.rek_nama) as rek',
							),
	    	'table' => 'tbank',
	    	'join' => array('trek' => 'tbank.rek_no = trek.rek_no'),
	    	'where_in' => array(
							'tbank.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    );

	    $option2 = array(
			'select' => array('count(tbank.bank_no) as total'),
	    	'table' => 'tbank',
	    	'join' => array('trek' => 'tbank.rek_no = trek.rek_no'),
	    	'where_in' => array(
							'tbank.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    );
		
		$data = array();
		$data['grp'] = $this->setting_model->commonGet($option1);
		$data['tot'] = $this->setting_model->commonGet($option2);
		$this->load->view('admin/demo/ecommerce_bank',$data);
		
	}
	public function action_bank()
	{
		$id_bank =$this->input->post('id_bank');
		$bank_code=$this->input->post('kode');
		$bank_name=$this->input->post('nama');
		$rek_no=$this->input->post('rek_no');
		$is_jual=$this->input->post('is_jual');
		$status=$this->input->post('status');

		$chk_name = array('tbank.bank_code' => $bank_code);
		$is_name = $this->get_data($chk_name);

		$date = date('Y-m-d H:i:s');

		if($this->input->post('type')==1){// insert
			if ($is_name == 1) {
				echo json_encode(array(
					"statusCode"=>405
				));
			}else{
				$bank_no =$this->GetNoIDField('bank_no','tbank');
				$insert = array(
					'insert' => array(
						'bank_no' => $bank_no,
						'iUpload' => 1,
						'create_date' => $date,
						'bank_code' => $bank_code,
						'bank_name' => $bank_name,
						'is_jual' => $is_jual,
						'is_delete' => $status,
						'rek_no' => $rek_no,
					),
					'table' => 'tbank'
				);

	        	$ins = $this->setting_model->commonInsert($insert);
	        	
	        	echo json_encode(array(
					"statusCode"=>200
				));
			}
		}elseif($this->input->post('type')==2) {//update
			$update = array(
					'update' => array(
						'bank_code' => $bank_code,
						'bank_name' => $bank_name,
						'is_jual' => $is_jual,
						'is_delete' => $status,
						'rek_no' => $rek_no,
					),
					'table' => 'tbank',
					'where' => array(
						'tbank.bank_no' => $id_bank
					)
			);
        	$this->setting_model->commonUpdate($update);

			echo json_encode(array(
				"statusCode"=>201
			));
		}elseif($this->input->post('type')==3) {//delete

			 foreach($id_bank as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'tbank',
						'where' => array(
							'tbank.bank_no' => $id
						)
				);
	        	$this->setting_model->commonUpdate($update);
		     }
			echo json_encode(array(
				"statusCode"=>202
			));
		}elseif($this->input->post('type')==4) {//arsip

			 foreach($id_bank as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'tbank',
						'where' => array(
							'tbank.bank_no' => $id
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
			'select' => array('count(tbank.bank_no) as hasil'),
	    	'table' => 'tbank',
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
			'select' => array(
								'tbank.bank_no',
								'tbank.bank_code',
								'tbank.bank_name',
								'tbank.is_delete',
								'tbank.is_jual',
								'tbank.rek_no',
								'trek.rek_nama',
								'trek.rek_kode',
							),
	    	'table' => 'tbank',
	    	'join' => array('trek' => 'tbank.rek_no = trek.rek_no'),
	    	'where' => array(
							'tbank.bank_no' => $this->input->post('id_bank')
						)
	    );
	    
		$data['get_data'] = $this->setting_model->commonGet($option);
		if( is_array($data['get_data']) || is_object($data['get_data']) ) {
		    foreach($data['get_data'] as $right) {
		    	echo json_encode(array(
					"bank_no" => $right->bank_no,
					"bank_code" => $right->bank_code,
					"bank_name" => $right->bank_name,
					"status" => $right->is_delete,
					"is_jual" => ($right->is_jual==0) ? false : true,
					"rek_no" => $right->rek_no,
					"rek_kode" => $right->rek_kode,
					"rek_nama" => $right->rek_nama,

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
		}else{
			$keyword = str_replace("_"," ",$keyword);
			$like = array('tbank.bank_code' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tbank.bank_no',
								'tbank.bank_code',
								'tbank.bank_name',
								'concat(trek.rek_kode, " - ", trek.rek_nama) as rek',
							),
	    	'table' => 'tbank',
	    	'join' => array('trek' => 'tbank.rek_no = trek.rek_no'),
	    	'where_in' => array(
							'tbank.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    );

	    $option2 = array(
			'select' => array('count(tbank.bank_no) as total'),
	    	'table' => 'tbank',
	    	'join' => array('trek' => 'tbank.rek_no = trek.rek_no'),
	    	'where_in' => array(
							'tbank.is_delete' => $is_archive,
						),
	    	'like' => $like,
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
		$pdf->Cell($tableWidth, 10, 'DAFTAR Bank OHH_BAKERY', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($tableWidth * 0.05, 6, 'No', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.20, 6, 'Kode Bank', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.35, 6, 'Nama Bank', 1, 1, 'C');
		$pdf->Cell($tableWidth * 0.40, 6, 'Nama Bank', 1, 1, 'C');

		$pdf->SetFont('Arial', '', 8);

		$no = 0;
		foreach ($data['grp'] as $br) {
		    $no++;
		    $pdf->Cell($tableWidth * 0.05, 6, $no, 1, 0, 'C');
		    $pdf->Cell($tableWidth * 0.02, 6, $br->bank_code, 1, 0, 'L');
		    $pdf->Cell($tableWidth * 0.35, 6, $br->bank_name, 1, 1, 'L');
		    $pdf->Cell($tableWidth * 0.40, 6, $br->rek, 1, 1, 'L');
		}

		$filename = 'bank_'.$now.'.pdf';
		$pdf->Output($filename, 'I');
        // $html = $this->load->view('print/sub_kategori', $data, true);
        // $this->pdf->createPDF($html, 'sub_kategori_'.$now, false);
	}
	public function print_csv($keyword = '',$is_archive = '')
	{
		// file name 
		$filename = 'bank_'.date('d-m-Y').'.csv'; 
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
		}else{
			$keyword = str_replace("_"," ",$keyword);
			$like = array('tbank.bank_code' => $keyword);
		}

		$option1 = array(
			'select' => array(
								'tbank.bank_no',
								'tbank.bank_code',
								'tbank.bank_name',
								'concat(trek.rek_kode, " - ", trek.rek_nama) as rek',
							),
	    	'table' => 'tbank',
	    	'join' => array('trek' => 'tbank.rek_no = trek.rek_no'),
	    	'where_in' => array(
							'tbank.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    );
		
		$data = $this->setting_model->commonGet($option1);
		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("Kode Bank","Nama Bank", "Account"); 
		fputcsv($file, $header);
		foreach ($data as $key){ 
			fputcsv($file,(array)$key); 
		}
		fclose($file); 
		exit; 
	}

	public function print_exc($keyword = '',$is_archive = '')
	{
		$filename = 'bank_'.date('d-m-Y');  
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
		}else{
			$keyword = str_replace("_"," ",$keyword);
			$like = array('tbank.bank_code' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tbank.bank_no',
								'tbank.bank_code',
								'tbank.bank_name',
								'concat(trek.rek_kode, " - ", trek.rek_nama) as rek',
							),
	    	'table' => 'tbank',
	    	'join' => array('trek' => 'tbank.rek_no = trek.rek_no'),
	    	'where_in' => array(
							'tbank.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    );
		
		$data = $this->setting_model->commonGet($option1);

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Kode Bank');
        $sheet->setCellValue('B1', 'Nama Bank'); 
        $sheet->setCellValue('C1', 'Acoount'); 
        $rows = 2;
        foreach ($data as $val){
            $sheet->setCellValue('A' . $rows, $val->bank_code);
            $sheet->setCellValue('B' . $rows, $val->bank_name);
            $sheet->setCellValue('B' . $rows, $val->rek);
            $rows++;
        } 

        $writer = new Xlsx($spreadsheet);
		
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        $writer->save('php://output');
	}


}