<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once(APPPATH . '../vendor/setasign/fpdf/fpdf.php');

class Varian extends CI_Controller {
	
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
		$this->load->view("admin/varian");
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
			'select' => array('count(tvarian.varian_id) as aktif'),
	    	'table' => 'tvarian',
	    	'where' => array(
							'tvarian.is_delete' => 0)
	    );
	    $ct2 = array(
			'select' => array('count(tvarian.varian_id) as non'),
	    	'table' => 'tvarian',
	    	'where' => array('tvarian.is_delete' => 1)
	    );

		if($keyword=='none'){$keyword = '';}else{$keyword = str_replace("_"," ",$keyword);}
		$data = array();

		$data['grp_aktif'] =  $this->setting_model->commonGet($ct1);
	    $data['grp_non'] =  $this->setting_model->commonGet($ct2);
		$data['keyw'] = $keyword;
		$data['is_arc'] = $chk;

		$this->load->view("admin/varian",$data);
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
			$like = array('tvarian.kode' => $keyword);
			$or_like = array('tvarian.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tvarian.varian_id',
								'tvarian.kode',
								'tvarian.nama'
							),
	    	'table' => 'tvarian',
	    	'where_in' => array(
							'tvarian.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
	    $option2 = array(
			'select' => array('count(tvarian.varian_id) as total'),
	    	'table' => 'tvarian',
	    	'where_in' => array(
							'tvarian.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = array();
		$data['grp'] = $this->setting_model->commonGet($option1);
		$data['tot'] = $this->setting_model->commonGet($option2);
		$this->load->view('admin/demo/ecommerce_varian',$data);
		
	}
	public function action_varian()
	{
		$id_var =$this->input->post('id_var');
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$status=$this->input->post('status');

		$chk_name = array('tvarian.kode' => $kode);
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
					'table' => 'tvarian'
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
					'table' => 'tvarian',
					'where' => array(
						'tvarian.varian_id' => $id_var
					)
			);
        	$this->setting_model->commonUpdate($update);

			echo json_encode(array(
				"statusCode"=>201
			));
		}elseif($this->input->post('type')==3) {//delete

			 foreach($id_var as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'tvarian',
						'where' => array(
							'tvarian.varian_id' => $id
						)
				);
	        	$this->setting_model->commonUpdate($update);
		     }
			echo json_encode(array(
				"statusCode"=>202
			));
		}elseif($this->input->post('type')==4) {//arsip

			 foreach($id_var as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1),
						'table' => 'tvarian',
						'where' => array(
							'tvarian.varian_id' => $id
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
			'select' => array('count(tvarian.varian_id) as hasil'),
	    	'table' => 'tvarian',
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
								'tvarian.varian_id',
								'tvarian.kode',
								'tvarian.nama',
								'tvarian.is_delete',
							),
	    	'table' => 'tvarian',
	    	'where' => array(
							'tvarian.varian_id' => $this->input->post('id_var')
						)
	    );
	    
		$data['get_data'] = $this->setting_model->commonGet($option);
		if( is_array($data['get_data']) || is_object($data['get_data']) ) {
		    foreach($data['get_data'] as $right) {
		    	echo json_encode(array(
					"varian_id" => $right->varian_id,
					"var_kode" => $right->kode,
					"var_nama" => $right->nama,
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
			$like = array('tvarian.kode' => $keyword);
			$or_like = array('tvarian.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tvarian.varian_id',
								'tvarian.kode',
								'tvarian.nama'
							),
	    	'table' => 'tvarian',
	    	'where_in' => array(
							'tvarian.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
	    $option2 = array(
			'select' => array('count(tvarian.varian_id) as total'),
	    	'table' => 'tvarian',
	    	'where_in' => array(
							'tvarian.is_delete' => $is_archive,
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
		$pdf->Cell($tableWidth, 10, 'DAFTAR SUB-VARIAN OHH_BAKERY', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($tableWidth * 0.05, 6, 'No', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.35, 6, 'Kode Sub-Varian', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.60, 6, 'Nama Sub-Varian', 1, 1, 'C');

		$pdf->SetFont('Arial', '', 8);

		$no = 0;
		foreach ($data['grp'] as $br) {
		    $no++;
		    $pdf->Cell($tableWidth * 0.05, 6, $no, 1, 0, 'C');
		    $pdf->Cell($tableWidth * 0.35, 6, $br->kode, 1, 0, 'L');
		    $pdf->Cell($tableWidth * 0.60, 6, $br->nama, 1, 1, 'L');
		}

		$filename = 'sub-varian_'.$now.'.pdf';
		$pdf->Output($filename, 'I');
        // $html = $this->load->view('print/sub_kategori', $data, true);
        // $this->pdf->createPDF($html, 'sub_kategori_'.$now, false);
	}
	public function print_csv($keyword = '',$is_archive = '')
	{
		// file name 
		$filename = 'sub-varian_'.date('d-m-Y').'.csv'; 
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
			$like = array('tvarian.kode' => $keyword);
			$or_like = array('tvarian.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tvarian.kode',
								'tvarian.nama'
							),
	    	'table' => 'tvarian',
	    	'where_in' => array(
							'tvarian.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = $this->setting_model->commonGet($option1);
		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("Kode Sub-Varian","Nama Sub-Varian"); 
		fputcsv($file, $header);
		foreach ($data as $key){ 
			fputcsv($file,(array)$key); 
		}
		fclose($file); 
		exit; 
	}

	public function print_exc($keyword = '',$is_archive = '')
	{
		$filename = 'sub-varian_'.date('d-m-Y');  
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
			$like = array('tvarian.kode' => $keyword);
			$or_like = array('tvarian.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tvarian.varian_id',
								'tvarian.kode',
								'tvarian.nama'
							),
	    	'table' => 'tvarian',
	    	'where_in' => array(
							'tvarian.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = $this->setting_model->commonGet($option1);

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Kode Sub-Varian');
        $sheet->setCellValue('B1', 'Nama Sub-Varian');   
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