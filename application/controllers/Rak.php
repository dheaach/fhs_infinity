<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once(APPPATH . '../vendor/setasign/fpdf/fpdf.php');

class Rak extends CI_Controller {
	
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
		$this->load->view("admin/rak");
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
			'select' => array('count(tm_rak.rak_id) as aktif'),
	    	'table' => 'tm_rak',
	    	'where' => array(
							'tm_rak.is_delete' => 0)
	    );
	    $ct2 = array(
			'select' => array('count(tm_rak.rak_id) as non'),
	    	'table' => 'tm_rak',
	    	'where' => array('tm_rak.is_delete' => 1)
	    );

		if($keyword=='none'){$keyword = '';}else{$keyword = str_replace("_"," ",$keyword);}
		$data = array();

		$data['grp_aktif'] =  $this->setting_model->commonGet($ct1);
	    $data['grp_non'] =  $this->setting_model->commonGet($ct2);
		$data['keyw'] = $keyword;
		$data['is_arc'] = $chk;

		$this->load->view("admin/rak",$data);
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
			$like = array('tm_rak.kode' => $keyword);
			$or_like = array('tm_rak.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tm_rak.rak_id',
								'tm_rak.kode',
								'tm_rak.nama'
							),
	    	'table' => 'tm_rak',
	    	'where_in' => array(
							'tm_rak.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
	    $option2 = array(
			'select' => array('count(tm_rak.rak_id) as total'),
	    	'table' => 'tm_rak',
	    	'where_in' => array(
							'tm_rak.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = array();
		$data['grp'] = $this->setting_model->commonGet($option1);
		$data['tot'] = $this->setting_model->commonGet($option2);
		$this->load->view('admin/demo/ecommerce_rak',$data);
		
	}
	public function action_rak()
	{
		$id_rak =$this->input->post('id_rak');
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$status=$this->input->post('status');

		$chk_name = array('tm_rak.kode' => $kode);
		$is_name = $this->get_data($chk_name);

		$date = date('Y-m-d H:i:s');

		if($this->input->post('type')==1){// insert
			if ($is_name == 1) {
				echo json_encode(array(
					"statusCode"=>405
				));
			}else{

				$insert = array(
					'insert' => array(
						'iUpload' => 1,
						'create_date' => $date,
						'kode' => $kode,
						'nama' => $nama,
						'is_delete' => $status),
					'table' => 'tm_rak'
				);

	        	$this->setting_model->commonInsert($insert);
	        	
	        	echo json_encode(array(
					"statusCode"=>200
				));
			}
		}elseif($this->input->post('type')==2) {//update
			$update = array(
					'update' => array(
						'kode' => $kode,
						'nama' => $nama,
						'is_delete' => $status),
					'table' => 'tm_rak',
					'where' => array(
						'tm_rak.rak_id' => $id_rak
					)
			);
        	$this->setting_model->commonUpdate($update);

			echo json_encode(array(
				"statusCode"=>201
			));
		}elseif($this->input->post('type')==3) {//delete

			 foreach($id_rak as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'tm_rak',
						'where' => array(
							'tm_rak.rak_id' => $id
						)
				);
	        	$this->setting_model->commonUpdate($update);
		     }
			echo json_encode(array(
				"statusCode"=>202
			));
		}elseif($this->input->post('type')==4) {//arsip

			 foreach($id_rak as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'tm_rak',
						'where' => array(
							'tm_rak.rak_id' => $id
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
			'select' => array('count(tm_rak.rak_id) as hasil'),
	    	'table' => 'tm_rak',
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
								'tm_rak.rak_id',
								'tm_rak.kode',
								'tm_rak.nama',
								'tm_rak.is_delete',
							),
	    	'table' => 'tm_rak',
	    	'where' => array(
							'tm_rak.rak_id' => $this->input->post('id_rak')
						)
	    );
	    
		$data['get_data'] = $this->setting_model->commonGet($option);
		if( is_array($data['get_data']) || is_object($data['get_data']) ) {
		    foreach($data['get_data'] as $right) {
		    	echo json_encode(array(
					"rak_id" => $right->rak_id,
					"rak_kode" => $right->kode,
					"rak_nama" => $right->nama,
					"status" => $right->is_delete
				));
		    }
		}
		
		
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
			$like = array('tm_rak.kode' => $keyword);
			$or_like = array('tm_rak.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tm_rak.rak_id',
								'tm_rak.kode',
								'tm_rak.nama'
							),
	    	'table' => 'tm_rak',
	    	'where_in' => array(
							'tm_rak.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
	    $option2 = array(
			'select' => array('count(tm_rak.rak_id) as total'),
	    	'table' => 'tm_rak',
	    	'where_in' => array(
							'tm_rak.is_delete' => $is_archive,
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
		$pdf->Cell($tableWidth, 10, 'DAFTAR RAK OHH_BAKERY', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($tableWidth * 0.05, 6, 'No', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.35, 6, 'Kode Rak', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.60, 6, 'Nama Rak', 1, 1, 'C');

		$pdf->SetFont('Arial', '', 8);

		$no = 0;
		foreach ($data['grp'] as $br) {
		    $no++;
		    $pdf->Cell($tableWidth * 0.05, 6, $no, 1, 0, 'C');
		    $pdf->Cell($tableWidth * 0.35, 6, $br->kode, 1, 0, 'L');
		    $pdf->Cell($tableWidth * 0.60, 6, $br->nama, 1, 1, 'L');
		}

		$filename = 'rak_'.$now.'.pdf';
		$pdf->Output($filename, 'I');
        // $html = $this->load->view('print/sub_kategori', $data, true);
        // $this->pdf->createPDF($html, 'sub_kategori_'.$now, false);
	}
	public function print_csv($keyword = '',$is_archive = '')
	{
		// file name 
		$filename = 'rak_'.date('d-m-Y').'.csv'; 
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
			$like = array('tm_rak.kode' => $keyword);
			$or_like = array('tm_rak.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tm_rak.kode',
								'tm_rak.nama'
							),
	    	'table' => 'tm_rak',
	    	'where_in' => array(
							'tm_rak.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = $this->setting_model->commonGet($option1);
		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("Kode Rak","Nama Rak"); 
		fputcsv($file, $header);
		foreach ($data as $key){ 
			fputcsv($file,(array)$key); 
		}
		fclose($file); 
		exit; 
	}

	public function print_exc($keyword = '',$is_archive = '')
	{
		$filename = 'rak_'.date('d-m-Y');  
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
			$like = array('tm_rak.kode' => $keyword);
			$or_like = array('tm_rak.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tm_rak.rak_id',
								'tm_rak.kode',
								'tm_rak.nama'
							),
	    	'table' => 'tm_rak',
	    	'where_in' => array(
							'tm_rak.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = $this->setting_model->commonGet($option1);

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Kode Rak');
        $sheet->setCellValue('B1', 'Nama Rak');   
        $rows = 2;
        foreach ($data as $val){
            $sheet->setCellValue('A' . $rows, $val->kode);
            $sheet->setCellValue('B' . $rows, $val->nama);
            $rows++;
        } 

        $writer = new Xlsx($spreadsheet);
		
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        $writer->save('php://output');
	}
}