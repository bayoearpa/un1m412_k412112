<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_tracer');
		$this->load->helper('url');
    	$this->load->library('session');
    	$this->load->helper('judul_seo');
	}

	public function index()
	{
		
	}
	public function getProdi($prodi)
	{
		# code...
		//get nama
		$where = array(
			'Kode_program_studi' => $prodi,			       
        );
		$getP = $this->m_tracer->get_data($where,'tmst_program_studi')->result();
		foreach ($getP as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $p->Nama_program_studi;
		}
	}
	public function report_khorizontal()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_khorizontal');
    $this->load->view('admin/footer');
  	}
  	public function report_kvertikal()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_kvertikal');
    $this->load->view('admin/footer');
  	}
  	public function report_k_e()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_k_etika');
    $this->load->view('admin/footer');
  	}
  	public function report_k_bi()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_k_bi');
    $this->load->view('admin/footer');
  	}
  	public function report_k_bing()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_k_bing');
    $this->load->view('admin/footer');
  	}
  	public function report_k_tek()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_k_tek');
    $this->load->view('admin/footer');
  	}
  	public function report_k_kom()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_k_kom');
    $this->load->view('admin/footer');
  	}
  	public function report_k_ks()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_k_ks');
    $this->load->view('admin/footer');
  	}
  	public function report_k_pd()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_k_pd');
    $this->load->view('admin/footer');
  	}
  	public function report_lamatunggu()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_lamatunggu');
    $this->load->view('admin/footer');
  	}
  	public function report_stakeholder()
  	{
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/report_stakeholder');
    $this->load->view('admin/footer');
  	}

  	public function reportKHorizontal()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$item		 = "f14";

		$data['prodi']= $this->getProdi($prodi);
		//countall
		$whereCA = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,   
          );
		$countAll = $this->m_tracer->get_join_report_count_2022($whereCA,$item)->result();
		foreach ($countAll as $key) {
			# code...
			$all = $key->jml;
		}


		//countvalue
		$whereV1 = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_f_2021.'.$item => '1',    
          );
		$countV1 = $this->m_tracer->get_join_report_count_2022($whereV1,$item)->result();
		foreach ($countV1 as $key) {
			# code...
			$jmlV1 = $key->jml;
		}

		$whereV2 = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_f_2021.'.$item => '2',    
          );
		$countV2 = $this->m_tracer->get_join_report_count_2022($whereV2,$item)->result();
		foreach ($countV2 as $key) {
			# code...
			$jmlV2 = $key->jml;
		}

		$whereV3 = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_f_2021.'.$item => '3',    
          );
		$countV3 = $this->m_tracer->get_join_report_count_2022($whereV3,$item)->result();
		foreach ($countV3 as $key) {
			# code...
			$jmlV3 = $key->jml;
		}

		$whereV4 = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_f_2021.'.$item => '4',    
          );
		$countV4 = $this->m_tracer->get_join_report_count_2022($whereV4,$item)->result();
		foreach ($countV4 as $key) {
			# code...
			$jmlV4 = $key->jml;
		}

		$whereV5 = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_f_2021.'.$item => '5',    
          );
		$countV5 = $this->m_tracer->get_join_report_count_2022($whereV5,$item)->result();
		foreach ($countV5 as $key) {
			# code...
			$jmlV5 = $key->jml;
		}


		//hitung

		$data['v1'] = round(($jmlV1 / $all)*100);
		$data['v2'] = round(($jmlV2 / $all)*100);
		$data['v3'] = round(($jmlV3 / $all)*100);
		$data['v4'] = round(($jmlV4 / $all)*100);
		$data['v5'] = round(($jmlV5 / $all)*100);


	$this->load->view('admin/header');
    $this->load->view('admin/report_khorizontal');
    $this->load->view('admin/report_khorizontalp',$data);
    $this->load->view('admin/footer');
        $this->load->view('admin/report_khorizontalp_js',$data);

  	}

  		public function reportKVertikal()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$item		 = "f15";

		$data['prodi']= $this->getProdi($prodi);
		//countall
		$whereCA = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,   
          );
		$countAll = $this->m_tracer->get_join_report_count_2022($whereCA,$item)->result();
		foreach ($countAll as $key) {
			# code...
			$all = $key->jml;
		}


		//countvalue
		$whereV1 = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_f_2021.'.$item => '1',    
          );
		$countV1 = $this->m_tracer->get_join_report_count_2022($whereV1,$item)->result();
		foreach ($countV1 as $key) {
			# code...
			$jmlV1 = $key->jml;
		}

		$whereV2 = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_f_2021.'.$item => '2',    
          );
		$countV2 = $this->m_tracer->get_join_report_count_2022($whereV2,$item)->result();
		foreach ($countV2 as $key) {
			# code...
			$jmlV2 = $key->jml;
		}

		$whereV3 = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_f_2021.'.$item => '3',    
          );
		$countV3 = $this->m_tracer->get_join_report_count_2022($whereV3,$item)->result();
		foreach ($countV3 as $key) {
			# code...
			$jmlV3 = $key->jml;
		}

		$whereV4 = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_f_2021.'.$item => '4',    
          );
		$countV4 = $this->m_tracer->get_join_report_count_2022($whereV4,$item)->result();
		foreach ($countV4 as $key) {
			# code...
			$jmlV4 = $key->jml;
		}


		//hitung

		$data['v1'] = round(($jmlV1 / $all)*100);
		$data['v2'] = round(($jmlV2 / $all)*100);
		$data['v3'] = round(($jmlV3 / $all)*100);
		$data['v4'] = round(($jmlV4 / $all)*100);


	$this->load->view('admin/header');
    $this->load->view('admin/report_kvertikal');
    $this->load->view('admin/report_kvertikalp',$data);
    $this->load->view('admin/footer');
        $this->load->view('admin/report_kvertikalp_js',$data);

  	}
  	public function countItem($prodi,$tahun_lulus,$item,$angka)
  	{
  		# code...
  		//countall
		$whereCA = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,   
          );
		$countAll = $this->m_tracer->get_join_report_count_2022($whereCA,$item)->result();
		foreach ($countAll as $key) {
			# code...
			$all = $key->jml;
		}
			//val1
				$value = $angka;
		  		$w = array(
		        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
		        'tbl_datadiri2021.kdpstmsmh' => $prodi,
		        'tbl_f_2021.'.$item => $value    
		          );
				$c = $this->m_tracer->get_join_report_count_2022($w,$item)->result();
				foreach ($c as $key) {
					# code...
					$j = $key->jml;
				}
				return $v = round(($j/ $all)*100);
  		
  	}
  	public function reportKompetensiEtika()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$a 			 = $this->input->post('a');
		$b 			 = $this->input->post('b');

		$data['prodi']= $this->getProdi($prodi);

		$data['f1761_v1'] = $this->countItem($prodi,$tahun_lulus,$a,1);
		$data['f1761_v2'] = $this->countItem($prodi,$tahun_lulus,$a,2);
		$data['f1761_v3'] = $this->countItem($prodi,$tahun_lulus,$a,3);
		$data['f1761_v4'] = $this->countItem($prodi,$tahun_lulus,$a,4);
		$data['f1761_v5'] = $this->countItem($prodi,$tahun_lulus,$a,5);

		$data['f1762_v1'] = $this->countItem($prodi,$tahun_lulus,$b,1);
		$data['f1762_v2'] = $this->countItem($prodi,$tahun_lulus,$b,2);
		$data['f1762_v3'] = $this->countItem($prodi,$tahun_lulus,$b,3);
		$data['f1762_v4'] = $this->countItem($prodi,$tahun_lulus,$b,4);
		$data['f1762_v5'] = $this->countItem($prodi,$tahun_lulus,$b,5);


		$this->load->view('admin/header');
	    $this->load->view('admin/report_k_etika');
	    $this->load->view('admin/report_k_etikap',$data);
	    $this->load->view('admin/footer');
        $this->load->view('admin/report_k_etikap_js',$data);
		
  	}
  	public function reportKompetensiBidangIlmu()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$a 			 = $this->input->post('a');
		$b 			 = $this->input->post('b');

		$data['prodi']= $this->getProdi($prodi);

		$data['f1763_v1'] = $this->countItem($prodi,$tahun_lulus,$a,1);
		$data['f1763_v2'] = $this->countItem($prodi,$tahun_lulus,$a,2);
		$data['f1763_v3'] = $this->countItem($prodi,$tahun_lulus,$a,3);
		$data['f1763_v4'] = $this->countItem($prodi,$tahun_lulus,$a,4);
		$data['f1763_v5'] = $this->countItem($prodi,$tahun_lulus,$a,5);

		$data['f1764_v1'] = $this->countItem($prodi,$tahun_lulus,$b,1);
		$data['f1764_v2'] = $this->countItem($prodi,$tahun_lulus,$b,2);
		$data['f1764_v3'] = $this->countItem($prodi,$tahun_lulus,$b,3);
		$data['f1764_v4'] = $this->countItem($prodi,$tahun_lulus,$b,4);
		$data['f1764_v5'] = $this->countItem($prodi,$tahun_lulus,$b,5);


		$this->load->view('admin/header');
	    $this->load->view('admin/report_k_bi');
	    $this->load->view('admin/report_k_bip',$data);
	    $this->load->view('admin/footer');
        $this->load->view('admin/report_k_bip_js',$data);
		
  	}
  	public function reportKompetensiBahasaInggris()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$a 			 = $this->input->post('a');
		$b 			 = $this->input->post('b');

		$data['prodi']= $this->getProdi($prodi);

		$data['f1765_v1'] = $this->countItem($prodi,$tahun_lulus,$a,1);
		$data['f1765_v2'] = $this->countItem($prodi,$tahun_lulus,$a,2);
		$data['f1765_v3'] = $this->countItem($prodi,$tahun_lulus,$a,3);
		$data['f1765_v4'] = $this->countItem($prodi,$tahun_lulus,$a,4);
		$data['f1765_v5'] = $this->countItem($prodi,$tahun_lulus,$a,5);

		$data['f1766_v1'] = $this->countItem($prodi,$tahun_lulus,$b,1);
		$data['f1766_v2'] = $this->countItem($prodi,$tahun_lulus,$b,2);
		$data['f1766_v3'] = $this->countItem($prodi,$tahun_lulus,$b,3);
		$data['f1766_v4'] = $this->countItem($prodi,$tahun_lulus,$b,4);
		$data['f1766_v5'] = $this->countItem($prodi,$tahun_lulus,$b,5);


		$this->load->view('admin/header');
	    $this->load->view('admin/report_k_bing');
	    $this->load->view('admin/report_k_bingp',$data);
	    $this->load->view('admin/footer');
        $this->load->view('admin/report_k_bingp_js',$data);
		
  	}
  	public function reportKompetensiTeknologiInformasi()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$a 			 = $this->input->post('a');
		$b 			 = $this->input->post('b');

		$data['prodi']= $this->getProdi($prodi);

		$data['f1767_v1'] = $this->countItem($prodi,$tahun_lulus,$a,1);
		$data['f1767_v2'] = $this->countItem($prodi,$tahun_lulus,$a,2);
		$data['f1767_v3'] = $this->countItem($prodi,$tahun_lulus,$a,3);
		$data['f1767_v4'] = $this->countItem($prodi,$tahun_lulus,$a,4);
		$data['f1767_v5'] = $this->countItem($prodi,$tahun_lulus,$a,5);

		$data['f1768_v1'] = $this->countItem($prodi,$tahun_lulus,$b,1);
		$data['f1768_v2'] = $this->countItem($prodi,$tahun_lulus,$b,2);
		$data['f1768_v3'] = $this->countItem($prodi,$tahun_lulus,$b,3);
		$data['f1768_v4'] = $this->countItem($prodi,$tahun_lulus,$b,4);
		$data['f1768_v5'] = $this->countItem($prodi,$tahun_lulus,$b,5);


		$this->load->view('admin/header');
	    $this->load->view('admin/report_k_tek');
	    $this->load->view('admin/report_k_tekp',$data);
	    $this->load->view('admin/footer');
        $this->load->view('admin/report_k_tekp_js',$data);
		
  	}
  	public function reportKompetensiKomunikasi()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$a 			 = $this->input->post('a');
		$b 			 = $this->input->post('b');

		$data['prodi']= $this->getProdi($prodi);

		$data['f1769_v1'] = $this->countItem($prodi,$tahun_lulus,$a,1);
		$data['f1769_v2'] = $this->countItem($prodi,$tahun_lulus,$a,2);
		$data['f1769_v3'] = $this->countItem($prodi,$tahun_lulus,$a,3);
		$data['f1769_v4'] = $this->countItem($prodi,$tahun_lulus,$a,4);
		$data['f1769_v5'] = $this->countItem($prodi,$tahun_lulus,$a,5);

		$data['f1770_v1'] = $this->countItem($prodi,$tahun_lulus,$b,1);
		$data['f1770_v2'] = $this->countItem($prodi,$tahun_lulus,$b,2);
		$data['f1770_v3'] = $this->countItem($prodi,$tahun_lulus,$b,3);
		$data['f1770_v4'] = $this->countItem($prodi,$tahun_lulus,$b,4);
		$data['f1770_v5'] = $this->countItem($prodi,$tahun_lulus,$b,5);


		$this->load->view('admin/header');
	    $this->load->view('admin/report_k_kom');
	    $this->load->view('admin/report_k_komp',$data);
	    $this->load->view('admin/footer');
        $this->load->view('admin/report_k_komp_js',$data);
		
  	}
  	public function reportKompetensiKerjaSama()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$a 			 = $this->input->post('a');
		$b 			 = $this->input->post('b');

		$data['prodi']= $this->getProdi($prodi);

		$data['f1771_v1'] = $this->countItem($prodi,$tahun_lulus,$a,1);
		$data['f1771_v2'] = $this->countItem($prodi,$tahun_lulus,$a,2);
		$data['f1771_v3'] = $this->countItem($prodi,$tahun_lulus,$a,3);
		$data['f1771_v4'] = $this->countItem($prodi,$tahun_lulus,$a,4);
		$data['f1771_v5'] = $this->countItem($prodi,$tahun_lulus,$a,5);

		$data['f1772_v1'] = $this->countItem($prodi,$tahun_lulus,$b,1);
		$data['f1772_v2'] = $this->countItem($prodi,$tahun_lulus,$b,2);
		$data['f1772_v3'] = $this->countItem($prodi,$tahun_lulus,$b,3);
		$data['f1772_v4'] = $this->countItem($prodi,$tahun_lulus,$b,4);
		$data['f1772_v5'] = $this->countItem($prodi,$tahun_lulus,$b,5);


		$this->load->view('admin/header');
	    $this->load->view('admin/report_k_ks');
	    $this->load->view('admin/report_k_ksp',$data);
	    $this->load->view('admin/footer');
        $this->load->view('admin/report_k_ksp_js',$data);
		
  	}
  	public function reportKompetensiPengembanganDiri()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$a 			 = $this->input->post('a');
		$b 			 = $this->input->post('b');

		$data['prodi']= $this->getProdi($prodi);

		$data['f1773_v1'] = $this->countItem($prodi,$tahun_lulus,$a,1);
		$data['f1773_v2'] = $this->countItem($prodi,$tahun_lulus,$a,2);
		$data['f1773_v3'] = $this->countItem($prodi,$tahun_lulus,$a,3);
		$data['f1773_v4'] = $this->countItem($prodi,$tahun_lulus,$a,4);
		$data['f1773_v5'] = $this->countItem($prodi,$tahun_lulus,$a,5);

		$data['f1774_v1'] = $this->countItem($prodi,$tahun_lulus,$b,1);
		$data['f1774_v2'] = $this->countItem($prodi,$tahun_lulus,$b,2);
		$data['f1774_v3'] = $this->countItem($prodi,$tahun_lulus,$b,3);
		$data['f1774_v4'] = $this->countItem($prodi,$tahun_lulus,$b,4);
		$data['f1774_v5'] = $this->countItem($prodi,$tahun_lulus,$b,5);


		$this->load->view('admin/header');
	    $this->load->view('admin/report_k_pd');
	    $this->load->view('admin/report_k_pdp',$data);
	    $this->load->view('admin/footer');
        $this->load->view('admin/report_k_pdp_js',$data);
		
  	}
  	///////////////////// lama tunggu /////////////////////////////////////////
  	public function reportLtunggu()
  	{
  		# code...
  		$prodi 		 = $this->input->post('prodi');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$item 		 = $this->input->post('item');

		$data['prodi']= $this->getProdi($prodi);

		$data['k6b']=$this->countItem($prodi,$tahun_lulus,$item,1);
		$data['l6b']=$this->countItem($prodi,$tahun_lulus,$item,2);

		$where = array(
        'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
        'tbl_datadiri2021.kdpstmsmh' => $prodi,   
          );
		$count = $this->m_tracer->get_join_report_count_wt_avg_2022($where)->result();
		foreach ($count as $key) {
			# code...
			$data['f502'] = $key->avg_f502;
			$data['f506'] = $key->avg_f506;
		}

		$this->load->view('admin/header');
	    $this->load->view('admin/report_lamatunggu');
	    $this->load->view('admin/report_lamatunggup',$data);
	    $this->load->view('admin/footer');


  	}


}

/* End of file Admin_report.php */
/* Location: ./application/controllers/Admin_report.php */