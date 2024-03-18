<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
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
		$rek_unbill_gr = '';
		$rek_ppn_masukan = '';
		$rek_pot_hutang = '';
		$rek_koreksi_hutang = '';
		$rek_hutang_giro = '';
		$rek_cair_giro1 = '';
		$rek_uang_muka_beli = '';
		$rek_ongkos_kirim = '';
		$rek_hutang_ppn = '';
		$rek_pot_piutang = '';
		$rek_koreksi_piutang = '';
		$rek_piutang_giro = '';
		$rek_cair_giro2 = '';
		$rek_uang_muka_jual = ''; 
		$rek_credit_note = '';
		$rek_prive = '';
		$rek_lr_bulan = '';
		$rek_lr_tahun = '';
		$rek_modal_no = '';
		$rek_selisih_desimal = '';
		$rek_tunai = '';

		$data['rek_unbill_gr'] = '';
		$data['rek_ppn_masukan'] = '';
		$data['rek_pot_hutang'] = '';
		$data['rek_koreksi_hutang'] = '';
		$data['rek_hutang_giro'] = '';
		$data['rek_cair_giro1'] = '';
		$data['rek_uang_muka_beli'] = '';
		$data['rek_ongkos_kirim'] = '';
		$data['rek_hutang_ppn'] = '';
		$data['rek_pot_piutang'] = '';
		$data['rek_koreksi_piutang'] = '';
		$data['rek_piutang_giro'] = '';
		$data['rek_cair_giro2'] = '';
		$data['rek_uang_muka_jual'] = ''; 
		$data['rek_credit_note'] = '';
		$data['rek_prive'] = '';
		$data['rek_lr_bulan'] = '';
		$data['rek_lr_tahun'] = '';
		$data['rek_modal_no'] = '';
		$data['rek_selisih_desimal'] = '';
		$data['rek_tunai'] = '';

		$select = array(
			'select' => array( 'pro_Id', 'faktur_pajak_nama','faktur_pajak_alamat', 
								'faktur_pajak_alamat2','telp','mail','faktur_pajak_npwp',
								'pro_head_1','pro_head_2','pro_head_3','pro_head_4',
								'pro_foot_1','pro_foot_2','pro_foot_3','pro_foot_4',
								'rek_unbill_gr', 'rek_ppn_masukan','rek_pot_hutang', 'rek_koreksi_hutang',
								'rek_hutang_giro', 'rek_cair_giro1','rek_uang_muka_beli', 'rek_ongkos_kirim',
								'rek_hutang_ppn', 'rek_pot_piutang','rek_koreksi_piutang', 'rek_piutang_giro',
								'rek_cair_giro2', 'rek_uang_muka_jual','rek_cn_beli','rek_unbill_gi',
								'rek_prive', 'rek_lr_bulan','rek_lr_tahun', 'rek_modal_no', 'rek_selisih_desimal', 'rek_tunai'
						),
			'table' => 'tprofile'
		);

		$data['get_prof'] = $this->setting_model->commonGet($select);
		if(is_array($data['get_prof'])||is_object($data['get_prof'])){
			foreach ($data['get_prof'] as $profile) {
				$rek_unbill_gr = $profile->rek_unbill_gr;
				$rek_unbill_gi = $profile->rek_unbill_gi;
				$rek_ppn_masukan = $profile->rek_ppn_masukan;
				$rek_pot_hutang = $profile->rek_pot_hutang; 
				$rek_koreksi_hutang = $profile->rek_koreksi_hutang;
				$rek_hutang_giro = $profile->rek_hutang_giro; 
				$rek_cair_giro1 = $profile->rek_cair_giro1;
				$rek_uang_muka_beli = $profile->rek_uang_muka_beli; 
				$rek_ongkos_kirim = $profile->rek_ongkos_kirim;
				$rek_hutang_ppn = $profile->rek_hutang_ppn; 
				$rek_pot_piutang = $profile->rek_pot_piutang;
				$rek_koreksi_piutang = $profile->rek_koreksi_piutang; 
				$rek_piutang_giro = $profile->rek_piutang_giro;
				$rek_cair_giro2 = $profile->rek_cair_giro2; 
				$rek_uang_muka_jual = $profile->rek_uang_muka_jual;
				$rek_credit_note = $profile->rek_cn_beli;
				$rek_prive = $profile->rek_prive; 
				$rek_lr_bulan = $profile->rek_lr_bulan;
				$rek_lr_tahun = $profile->rek_lr_tahun; 
				$rek_modal_no = $profile->rek_modal_no; 
				$rek_selisih_desimal = $profile->rek_selisih_desimal; 
				$rek_tunai = $profile->rek_tunai;
			}
		}

		if($rek_unbill_gr <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_unbill_gr)
			);
			$data['rek_unbill_gr'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_unbill_gi <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_unbill_gi)
			);
			$data['rek_unbill_gi'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_ppn_masukan <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_ppn_masukan)
			);
			$data['rek_ppn_masukan'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_pot_hutang <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_pot_hutang)
			);
			$data['rek_pot_hutang'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_koreksi_hutang <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_koreksi_hutang)
			);
			$data['rek_koreksi_hutang'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_hutang_giro <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_hutang_giro)
			);
			$data['rek_hutang_giro'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_cair_giro1 <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_cair_giro1)
			);
			$data['rek_cair_giro1'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_uang_muka_beli <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_uang_muka_beli)
			);
			$data['rek_uang_muka_beli'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_ongkos_kirim <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_ongkos_kirim)
			);
			$data['rek_ongkos_kirim'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_hutang_ppn <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_hutang_ppn)
			);
			$data['rek_hutang_ppn'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_pot_piutang <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_pot_piutang)
			);
			$data['rek_pot_piutang'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_koreksi_piutang <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_koreksi_piutang)
			);
			$data['rek_koreksi_piutang'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_piutang_giro <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_piutang_giro)
			);
			$data['rek_piutang_giro'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_cair_giro2 <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_cair_giro2)
			);
			$data['rek_cair_giro2'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_uang_muka_jual <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_uang_muka_jual)
			);
			$data['rek_uang_muka_jual'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_credit_note <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_credit_note)
			);
			$data['rek_credit_note'] = $this->setting_model->commonGet($select2);	
		}

		if($rek_prive <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_prive)
			);
			$data['rek_prive'] = $this->setting_model->commonGet($select2);	
		}

		if($rek_lr_bulan <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_lr_bulan)
			);
			$data['rek_lr_bulan'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_lr_tahun <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_lr_tahun)
			);
			$data['rek_lr_tahun'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_modal_no <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_modal_no)
			);
			$data['rek_modal_no'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_selisih_desimal <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_selisih_desimal)
			);
			$data['rek_selisih_desimal'] = $this->setting_model->commonGet($select2);	
		}
		if($rek_tunai <> ''){
			$select2 = array(
				'select' => array('concat(rek_kode," - ", rek_nama) as nama', 'rek_no'),
				'table' => 'trek',
				'where' => array('rek_no' => $rek_tunai)
			);
			$data['rek_tunai'] = $this->setting_model->commonGet($select2);	
		}


		$this->load->view("admin/profil",$data);
	}

	public function action_profile()
	{
		$nama =$this->input->post('nama');
		$alamat1 =$this->input->post('alamat1');
		$alamat2=$this->input->post('alamat2');
		$telp=$this->input->post('telp');
		$email=$this->input->post('email');
		$npwp=$this->input->post('npwp');

		$update = array(
				'update' => array(
					'faktur_pajak_nama' => $nama,
					'faktur_pajak_alamat' => $alamat1,
					'faktur_pajak_alamat2' => $alamat2,
					'telp' => $telp,
					'mail' => $email,
					'faktur_pajak_npwp' => $npwp
				),
				'table' => 'tprofile'
		);
    	$up = $this->setting_model->commonUpdate($update);
	}
}