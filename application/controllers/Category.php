<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once(APPPATH . '../vendor/setasign/fpdf/fpdf.php');

class Category extends CI_Controller {
	
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
		$this->load->view("admin/kategori");
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
			'select' => array('count(tcat.cat_id) as aktif'),
	    	'table' => 'tcat',
	    	'where' => array(
							'tcat.is_delete' => 0)
	    );
	    $ct2 = array(
			'select' => array('count(tcat.cat_id) as non'),
	    	'table' => 'tcat',
	    	'where' => array('tcat.is_delete' => 1)
	    );


		if($keyword=='none'){$keyword = '';}else{$keyword = str_replace("_"," ",$keyword);}
		$data = array();
		$data['keyw'] = $keyword;
		$data['is_arc'] = $chk;
		$data['cat_aktif'] =  $this->setting_model->commonGet($ct1);
	    $data['cat_non'] =  $this->setting_model->commonGet($ct2);
		$this->load->view("admin/kategori",$data);
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
			$like = array('tcat.kode' => $keyword);
			$or_like = array('tcat.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tcat.cat_id',
								'tcat.kode',
								'tcat.nama'
							),
	    	'table' => 'tcat',
	    	'where_in' => array(
							'tcat.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
	    $option2 = array(
			'select' => array('count(tcat.cat_id) as total'),
	    	'table' => 'tcat',
	    	'where_in' => array(
							'tcat.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = array();
		$data['cat'] = $this->setting_model->commonGet($option1);
		$data['tot'] = $this->setting_model->commonGet($option2);
		$this->load->view('admin/demo/ecommerce_category',$data);
		
	}
	public function action_category()
	{
		$user_id = $this->session->userdata('person_id');
		$id_kat =$this->input->post('id_kat');
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$status=$this->input->post('status');
		$rek_brg = $this->input->post('acc_pers');
		$rek_jual = $this->input->post('acc_jual');
		$rek_retur = $this->input->post('acc_ret');
		$rek_pot = $this->input->post('acc_pot');
		$rek_hpp = $this->input->post('acc_hpp');


		$chk_name = array('tcat.kode' => $kode, 'tcat.is_delete' => 0);
		$is_name = $this->get_data($chk_name);

		$date = date('Y-m-d H:i:s');

		$RekDasar = $this->setting_model->GetRekDasar();

		// $rek_brg = $this->setting_model->ControlRek($RekDasar['brg_no']);
		// $rek_jual = $this->setting_model->ControlRek($RekDasar['jual_no']);
		// $rek_retur = $this->setting_model->ControlRek($RekDasar['retur_jual_no']);
		// $rek_pot = $this->setting_model->ControlRek($RekDasar['pot_jual_no']);
		// $rek_hpp = $this->setting_model->ControlRek($RekDasar['hpp_no']);

		if ($rek_brg == '') {
			$rek_brg = $this->setting_model->ControlRek($RekDasar['brg_no']);
		}

		if ($rek_jual == '') {
			$rek_jual = $this->setting_model->ControlRek($RekDasar['jual_no']);
		}

		if ($rek_retur == '') {
			$rek_retur = $this->setting_model->ControlRek($RekDasar['retur_jual_no']);
		}

		if ($rek_pot == '') {
			$rek_pot = $this->setting_model->ControlRek($RekDasar['pot_jual_no']);
		}

		if ($rek_hpp == '') {
			$rek_hpp = $this->setting_model->ControlRek($RekDasar['hpp_no']);
		}

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
						'is_delete' => $status,
						'user_id' => $user_id, 
						'rek_no' => $rek_brg, 
						'rek_jual' => $rek_jual, 
						'rek_retur_jual' => $rek_retur, 
						'rek_pot_jual' => $rek_pot, 
						'rek_hpp' => $rek_hpp
					),
					'table' => 'tcat'
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
						'is_delete' => $status,
						'user_edit' => $user_id,
						'edit_date' => $date, 
						'rek_no' => $rek_brg, 
						'rek_jual' => $rek_jual, 
						'rek_retur_jual' => $rek_retur, 
						'rek_pot_jual' => $rek_pot, 
						'rek_hpp' => $rek_hpp),
					'table' => 'tcat',
					'where' => array(
						'tcat.cat_id' => $id_kat
					)
			);
        	$this->setting_model->commonUpdate($update);

			echo json_encode(array(
				"statusCode"=>201
			));
		}elseif($this->input->post('type')==3) {//delete

			 foreach($id_kat as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1,
							'user_delete' => $user_id,
							'delete_date' => $date),
						'table' => 'tcat',
						'where' => array(
							'tcat.cat_id' => $id
						)
				);
	        	$this->setting_model->commonUpdate($update);
		     }
			echo json_encode(array(
				"statusCode"=>202
			));
		}elseif($this->input->post('type')==4) {//arsip

			 foreach($id_kat as $id){
				$update = array(
						'update' => array(
							'is_delete' => 1,
							'user_delete' => $user_id,
							'delete_date' => $date),
						'table' => 'tcat',
						'where' => array(
							'tcat.cat_id' => $id
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
			'select' => array('count(tcat.cat_id) as hasil'),
	    	'table' => 'tcat',
	    	'where' => $kondisi
	    );

		$data['get_data'] = $this->setting_model->commonGet($option);
		if( is_array($data['get_data']) || is_object($data['get_data']) ) {
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
								'tcat.cat_id',
								'tcat.kode',
								'tcat.nama',
								'tcat.is_delete',
								'tcat.rek_no as rek_brg', 
								'a.rek_nama as rek_nama_pers',
								'a.rek_kode as rek_kode_pers',
								'tcat.rek_jual', 
								'b.rek_nama as rek_nama_jual',
								'b.rek_kode as rek_kode_jual',
								'tcat.rek_retur_jual as rek_retur', 
								'c.rek_nama as rek_nama_ret',
								'c.rek_kode as rek_kode_ret',
								'tcat.rek_pot_jual as rek_pot', 
								'd.rek_nama as rek_nama_pot',
								'd.rek_kode as rek_kode_pot',
								'tcat.rek_hpp',
								'e.rek_nama as rek_nama_hpp',
								'e.rek_kode as rek_kode_hpp',

							),
	    	'table' => 'tcat',
	    	'join' => array('trek a' => 'a.rek_no = tcat.rek_no',
	    					'trek b' => 'b.rek_no = tcat.rek_jual',
	    					'trek c' => 'c.rek_no = tcat.rek_retur_jual',
	    					'trek d' => 'd.rek_no = tcat.rek_pot_jual',
	    					'trek e' => 'e.rek_no = tcat.rek_hpp'),
	    	'where' => array('tcat.cat_id' => $this->input->post('id_kat'))
	    );
	    
		$data['get_data'] = $this->setting_model->commonGet($option);
		if( is_array($data['get_data']) || is_object($data['get_data']) ) {
		    foreach($data['get_data'] as $right) {
		    	echo json_encode(array(
					"kat_id" => $right->cat_id,
					"kat_kode" => $right->kode,
					"kat_nama" => $right->nama,
					"status" => $right->is_delete,
					"rek_no_pers" => $right->rek_brg,
					"rek_kode_pers" => $right->rek_kode_pers,
					"rek_nama_pers" => $right->rek_nama_pers,
					"rek_no_jual" => $right->rek_jual,
					"rek_kode_jual" => $right->rek_kode_jual,
					"rek_nama_jual" => $right->rek_nama_jual,
					"rek_no_ret" => $right->rek_retur,
					"rek_kode_ret" => $right->rek_kode_ret,
					"rek_nama_ret" => $right->rek_nama_ret,
					"rek_no_pot" => $right->rek_pot,
					"rek_kode_pot" => $right->rek_kode_pot,
					"rek_nama_pot" => $right->rek_nama_pot,
					"rek_no_hpp" => $right->rek_hpp,
					"rek_kode_hpp" => $right->rek_kode_hpp,
					"rek_nama_hpp" => $right->rek_nama_hpp
				));
		    }
		}
		
		
	}

	public function show_list_account()
	{
		$key = $this->input->post('searchField');
		$gol = $this->input->post('searchGol');

		// $key = 'pendapatan';
		// $gol = -2;

		$search = $key;

		$where = '';
		$golRek = 0;

		if ($gol >= 0) {
	        $where = array('is_delete' => 0,
		                'rek_gol' => $golRek + 1
		            );
	    } elseif ($gol == -1) {
	        $where = array('is_delete' => 0,
		                '(rek_gol <= 5 AND rek_gol >= 4) OR rek_gol' => 10
		            );
	    } elseif ($gol == -2) {
	        $where = array('is_delete' => 0);
	    }

		if($search == 'none' OR $search == ''){
			$like = '';
			$or_like = '';
		}else{
			$like = array('rek_kode' => $search);
			$or_like = array('rek_nama' => $search);
		}

		$option1 = array(
			'select' => array('rek_no',
			 				'rek_kode as kode', 
			 				'rek_nama', 
			 				'rek_type'),
	    	'table' => 'trek',
	    	'where' => $where,
	    	'like' => $like,
	    	'or_like' => $or_like,
	    	'order' => array('rek_kode' => 'ASC')
	    );

	    $option2 = array(
			'select' => array('count(rek_no) as total'),
	    	'table' => 'trek',
	    	'where' => $where,
	    	'like' => $like,
	    	'or_like' => $or_like,
	    	'order' => array('rek_kode' => 'ASC')
	    );
		
		$data = array();
		// $data['grp'] = $this->generate_treeview($this->setting_model->commonGet($option1), 1);
		$data['grp'] = $this->setting_model->commonGet($option1);
		$data['tot'] = $this->setting_model->commonGet($option2);

		// Format data for treeview
	    // $formattedData = $this->formatDataForTreeview($data['grp']);
    	// $data['formattedData'] = json_encode($formattedData); 

		$this->load->view('admin/demo/accountlist',$data);
	}

	private function generate_treeview($data, $parent_type)
	{
		// print_r($data);
	    $tree = array();

	    foreach ($data as $node) {
	        if ($node->rek_type == $parent_type) {
	            $children = $this->generate_treeview($data, $node->rek_type + 1);
	            if (!empty($children)) {
	                $node->children = $children;
	            }
	            $tree[] = $node;
	        }
	    }

	    return $tree;
	}

	private function formatDataForTreeview($data)
	{
	    $formattedData = [];

	    foreach ($data as $row) {
	        $formattedData[$row['rek_no']] = [
	            'id' => $row['rek_no'],
	            'parent' => $row['parent_id'], // Assuming you have a 'parent_id' field indicating parent-child relationships
	            'text' => $row['rek_nama'],
	            // Add other relevant fields as needed
	        ];
	    }

	    return $formattedData;
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
			$like = array('tcat.kode' => $keyword);
			$or_like = array('tcat.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tcat.cat_id',
								'tcat.kode',
								'tcat.nama'
							),
	    	'table' => 'tcat',
	    	'where_in' => array(
							'tcat.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
	    $option2 = array(
			'select' => array('count(tcat.cat_id) as total'),
	    	'table' => 'tcat',
	    	'where_in' => array(
							'tcat.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );
		
		$data = array();
		$data['cat'] = $this->setting_model->commonGet($option1);
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
		$pdf->Cell($tableWidth, 10, 'DAFTAR KATEGORI OHH_BAKERY', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell($tableWidth * 0.05, 6, 'No', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.35, 6, 'Kode Kategori', 1, 0, 'C');
		$pdf->Cell($tableWidth * 0.60, 6, 'Nama Kategori', 1, 1, 'C');

		$pdf->SetFont('Arial', '', 8);

		$no = 0;
		foreach ($data['cat'] as $br) {
		    $no++;
		    $pdf->Cell($tableWidth * 0.05, 6, $no, 1, 0, 'C');
		    $pdf->Cell($tableWidth * 0.35, 6, $br->kode, 1, 0, 'L');
		    $pdf->Cell($tableWidth * 0.60, 6, $br->nama, 1, 1, 'L');
		}

		$filename = 'kategori_'.$now.'.pdf';
		$pdf->Output($filename, 'I');
        // $html = $this->load->view('print/kategori', $data, true);
        // $this->pdf->createPDF($html, 'kategori_'.$now, false);
	}
	public function print_csv($keyword = '',$is_archive = '')
	{
		// file name 
		$filename = 'kategori_'.date('d-m-Y').'.csv'; 
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
			$like = array('tcat.kode' => $keyword);
			$or_like = array('tcat.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tcat.kode',
								'tcat.nama'
							),
	    	'table' => 'tcat',
	    	'where_in' => array(
							'tcat.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );

		$data = $this->setting_model->commonGet($option1);
		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("Kode Kategori","Nama Kategori"); 
		fputcsv($file, $header);
		foreach ($data as $key){ 
			fputcsv($file,(array)$key); 
		}
		fclose($file); 
		exit; 
	}

	public function print_exc($keyword = '',$is_archive = '')
	{
		$filename = 'kategori_'.date('d-m-Y');  
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
			$like = array('tcat.kode' => $keyword);
			$or_like = array('tcat.nama' => $keyword);
		}
		$option1 = array(
			'select' => array(
								'tcat.kode',
								'tcat.nama'
							),
	    	'table' => 'tcat',
	    	'where_in' => array(
							'tcat.is_delete' => $is_archive,
						),
	    	'like' => $like,
	    	'or_like' => $or_like
	    );

		$data = $this->setting_model->commonGet($option1);

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Kode Kategori');
        $sheet->setCellValue('B1', 'Nama Kategori');   
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

	public function test_rek()
	{
		$RekDasar = $this->setting_model->GetRekDasar();

		$rek_brg = $this->setting_model->ControlRek($RekDasar['brg_no']);
		$rek_jual = $this->setting_model->ControlRek($RekDasar['jual_no']);
		$rek_retur = $this->setting_model->ControlRek($RekDasar['retur_jual_no']);
		$rek_pot = $this->setting_model->ControlRek($RekDasar['pot_jual_no']);
		$rek_hpp = $this->setting_model->ControlRek($RekDasar['hpp_no']);

		print_r(array(
			'rek_brg' => $rek_brg,
			'rek_jual' => $rek_jual,
			'rek_retur' => $rek_retur,
			'rek_pot' => $rek_pot,
			'rek_hpp' => $rek_hpp));
	}

	public function getAccount()
	{
		$id_acc = $this->input->post('id_acc');
		$select = array(
			'select' => array('rek_no',
								'rek_kode',
								'rek_nama',
								'rek_type'),
	    	'table' => 'trek',
	    	'where' => array('rek_no' => $id_acc)
	    );

		$acc = $this->setting_model->commonGet($select);

		foreach ($acc as $key) {
			$rek_kode = $key->rek_kode;
			$rek_nama = $key->rek_nama;
		}

		echo json_encode(array(
			"rek_no" => $id_acc,
			"rek_kode" => $rek_kode,
			"rek_nama" => $rek_nama
		));
	}

	public function get_rek_dasar()
	{
		$rek_kode_pers = '';
		$rek_nama_pers = '';
		$rek_kode_jual = '';
		$rek_nama_jual = '';
		$rek_kode_ret = '';
		$rek_nama_ret = '';
		$rek_kode_pot = '';
		$rek_nama_pot = '';
		$rek_kode_hpp = '';
		$rek_nama_hpp = '';

		$RekDasar = $this->setting_model->GetRekDasar();

		$rek_brg = $this->setting_model->ControlRek($RekDasar['brg_no']);
		if ($rek_brg <> '') {
			$select = array(
				'select' => array('rek_no',
									'rek_kode',
									'rek_nama',
									'rek_type'),
		    	'table' => 'trek',
		    	'where' => array('rek_no' => $rek_brg)
		    );

			$acc = $this->setting_model->commonGet($select);

			foreach ($acc as $key) {
				$rek_kode_pers = $key->rek_kode;
				$rek_nama_pers = $key->rek_nama;
			}
		}
		$rek_jual = $this->setting_model->ControlRek($RekDasar['jual_no']);
		if ($rek_jual <> '') {
			$select = array(
				'select' => array('rek_no',
									'rek_kode',
									'rek_nama',
									'rek_type'),
		    	'table' => 'trek',
		    	'where' => array('rek_no' => $rek_jual)
		    );

			$acc = $this->setting_model->commonGet($select);

			foreach ($acc as $key) {
				$rek_kode_jual = $key->rek_kode;
				$rek_nama_jual = $key->rek_nama;
			}
		}
		$rek_retur = $this->setting_model->ControlRek($RekDasar['retur_jual_no']);
		if ($rek_retur <> '') {
			$select = array(
				'select' => array('rek_no',
									'rek_kode',
									'rek_nama',
									'rek_type'),
		    	'table' => 'trek',
		    	'where' => array('rek_no' => $rek_retur)
		    );

			$acc = $this->setting_model->commonGet($select);

			foreach ($acc as $key) {
				$rek_kode_ret = $key->rek_kode;
				$rek_nama_ret = $key->rek_nama;
			}
		}
		$rek_pot = $this->setting_model->ControlRek($RekDasar['pot_jual_no']);
		if ($rek_pot <> '') {
			$select = array(
				'select' => array('rek_no',
									'rek_kode',
									'rek_nama',
									'rek_type'),
		    	'table' => 'trek',
		    	'where' => array('rek_no' => $rek_pot)
		    );

			$acc = $this->setting_model->commonGet($select);

			foreach ($acc as $key) {
				$rek_kode_pot = $key->rek_kode;
				$rek_nama_pot = $key->rek_nama;
			}
		}
		$rek_hpp = $this->setting_model->ControlRek($RekDasar['hpp_no']);
		if ($rek_hpp <> '') {
			$select = array(
				'select' => array('rek_no',
									'rek_kode',
									'rek_nama',
									'rek_type'),
		    	'table' => 'trek',
		    	'where' => array('rek_no' => $rek_hpp)
		    );

			$acc = $this->setting_model->commonGet($select);

			foreach ($acc as $key) {
				$rek_kode_hpp = $key->rek_kode;
				$rek_nama_hpp = $key->rek_nama;
			}
		}

		echo json_encode(array(
			"rek_no_pers" => $rek_brg,
			"rek_kode_pers" => $rek_kode_pers,
			"rek_nama_pers" => $rek_nama_pers,
			"rek_no_jual" => $rek_jual,
			"rek_kode_jual" => $rek_kode_jual,
			"rek_nama_jual" => $rek_nama_jual,
			"rek_no_ret" => $rek_retur,
			"rek_kode_ret" => $rek_kode_ret,
			"rek_nama_ret" => $rek_nama_ret,
			"rek_no_pot" => $rek_pot,
			"rek_kode_pot" => $rek_kode_pot,
			"rek_nama_pot" => $rek_nama_pot,
			"rek_no_hpp" => $rek_hpp,
			"rek_kode_hpp" => $rek_kode_hpp,
			"rek_nama_hpp" => $rek_nama_hpp
		));
	}
}