<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_tracer');
        $this->load->helper('url');
        $this->load->library('session');
	}
		
	public function index()
	{
		$this->load->view('login');
	}
	function login(){
		$username = $this->input->post('nim');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('nim','nim','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() != false){
			$where = array(
				'nimhsmsmh' => $username,
				'password' => md5($password)			
			);
			$data = $this->m_tracer->get_data($where,'tbl_datadiri2021');
			$d = $this->m_tracer->get_data($where,'tbl_datadiri2021')->row();
			$cek = $data->num_rows();
			if($cek > 0){
				$session = array(
					'nim'=> $d->nimhsmsmh,
					'status' => 'login'
				);
				$this->session->set_userdata($session);
				redirect(base_url().'user');
			}else{
				redirect(base_url().'login?pesan=gagal');			
			}
		}else{
			$this->load->view('login');
		}
	}


	public function insertReg()
	{

		# code...
		$nim = $this->input->post('nim');
		// $nama = $this->input->post('nama');
		$password = md5($this->input->post('password'));
		// $prodi = $this->input->post('prodi');
		$bekerja = $this->input->post('bekerja');
		$nama_p = $this->input->post('nama_p');
		$jabatan = $this->input->post('jabatan');
		$thn_lulus = $this->input->post('thn_lulus');
		$jeda = $this->input->post('jeda');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$domisili = $this->input->post('domisili');
		$nik = $this->input->post('nik');
		$npwp = $this->input->post('npwp');
		// $no_hp = $this->input->post('no_hp');
		$kdpt = "061056";
		 


		$where = array(
            'NIM' => $nim       
		); 
		$where2 = array(
            'nimhsmsmh' => $nim       
		); 
		$get_mhs = $this->m_tracer->get_data($where,'tmst_mahasiswa')->result();
		foreach ($get_mhs as $key) {
			# code...
			$kdprodi = $key->Kode_program_studi;
			$nama = $key->Nama_mahasiswa;

		}
		$cek=$this->m_tracer->get_data($where2,'tbl_datadiri2021')->num_rows();
		$cek_tmst=$this->m_tracer->get_data($where,'tmst_mahasiswa')->num_rows();
		$data = array(
			'kdptimsmh' => $kdpt,
			'kdpstmsmh' => $kdprodi,
			'nimhsmsmh' => $nim,
			'nmmhsmsmh' => $nama,
			'telpomsmh'	=> $no_telp,
			'emailmsmh' => $email,
			'tahun_lulus' => $thn_lulus,
			'nik' 		=> $nik,
			'npwp' 		=> $npwp,
			'nama_perusahaan' => $nama_p,
			'jabatan' 	=> $jabatan,
			'jeda' 		=> $jeda,
			'domisili' 	=> $domisili,
			'password' 	=> $password,
			'bekerja' 	=> $bekerja,
			
			);	
		if ($cek_tmst == null) {
			# code...
			$this->session->set_flashdata('message', '<div class="alert">
			  <span class="closebtn">&times;</span> 
			  <strong>Error!</strong>Anda bukan MAHATAR UNIMAR AMNI Semarang
			</div>');
			redirect("Login");
		} else {
			# code...
			if ($cek == null) {
				 	# code...			
			$this->m_tracer->input_data($data,'tbl_datadiri2021');
			$this->session->set_flashdata('message', '<div class="alert">
			  <span class="closebtn">&times;</span> 
			  <strong>Registrasi Sukses!</strong> Silakan lakukan Log in untuk mengisi Tracer Studi.
			</div>');
			redirect("Login");

				 }else{
		 	$this->session->set_flashdata('message', '<div class="alert">
			  <span class="closebtn">&times;</span> 
			  <strong>Error!</strong>NIM/NRP Ini sudah Terdaftar
			</div>');
			redirect("Login");
				 }			
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */