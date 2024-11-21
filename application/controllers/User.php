<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'welcome?pesan=belumlogin');
		}
		$this->load->model('m_tracer');
        $this->load->helper('url');
        $this->load->library('session');
        
	}
	public function index()
	{
		// get data from session
        $nim = $this->session->userdata('nim');
        //cek 
        $where2 = array(
            'nimhsmsmh' => $nim       
        );
		$d = $this->m_tracer->get_data($where2,'tbl_f_2021')->num_rows();
		//select
		$where = array(
            'tbl_datadiri2021.nimhsmsmh' => $nim       
        );
        $data['d'] = $d;
        $data['catar'] = $this->m_tracer->get_data_join_where2021($where)->result();
		$this->load->view('user/header',$data);
		$this->load->view('user/home',$data);
		$this->load->view('user/footer');
	}

	public function index_2018()
	{
		// get data from session
        $nim = $this->session->userdata('nim');
        //cek 
        $where2 = array(
            'nim' => $nim       
        );
		$d = $this->m_tracer->get_data($where2,'tbl_f4')->num_rows();
		//select
		$where = array(
            'tbl_datadiri2021.Nim' => $nim       
        );
        $data['d'] = $d;
        $data['catar'] = $this->m_tracer->get_data_join_where2021($where)->result();
		$this->load->view('user/header',$data);
		$this->load->view('user/home',$data);
		$this->load->view('user/footer');
	}
	 function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'user?pesan=logout');
	}
	public function get_kabkota(){
        $id=$this->input->post('id');
        $data=$this->m_tracer->get_kabkota($id);
        echo json_encode($data);
    }
	public function kuesioner()
	{
		$nim = $this->session->userdata('nim');
		$where2 = array(
            'nimhsmsmh' => $nim       
        );
		$d = $this->m_tracer->get_data($where2,'tbl_f_2021')->num_rows();
		// get data from session
		$where = array(
            'tbl_datadiri2021.nimhsmsmh' => $nim       
        );
        $data['d'] = $d;
        $data['catar'] = $this->m_tracer->get_data_join_where2021($where)->result();

        //get propinsi
        $data['propinsi'] = $this->m_tracer->get_data_all('tbl_propinsi')->result();

        if ($d > 0) {
        	# code...
        	$this->load->view('user/header',$data);
			$this->load->view('user/kues_selesai');
			$this->load->view('user/footer');
        }else{
        	$this->load->view('user/header',$data);
			$this->load->view('user/kues2021',$data);
			$this->load->view('user/footer');
        }
		
	}
	public function kuesioner_2018()
	{
		$nim = $this->session->userdata('nim');
		$where2 = array(
            'nim' => $nim       
        );
		$d = $this->m_tracer->get_data($where2,'tbl_f')->num_rows();
		// get data from session
		$where = array(
            'tbl_datadiri.Nim' => $nim       
        );
        $data['d'] = $d;
        $data['catar'] = $this->m_tracer->get_data_join_where($where)->result();
        if ($d > 0) {
        	# code...
        	$this->load->view('user/header',$data);
			$this->load->view('user/kues_selesai');
			$this->load->view('user/footer');
        }else{
        	$this->load->view('user/header',$data);
			$this->load->view('user/kues2021',$data);
			$this->load->view('user/footer');
        }
		
	}
	// public function InsertKues()
	// {
	// 	# code...
	// 	#  get form
	// 	# for table tbl_f23
	// 	$nim = $this->input->post('nim');
	// 	$f21 = $this->input->post('f21');	
	// 	$f22 = $this->input->post('f22');	
	// 	$f23 = $this->input->post('f23');	
	// 	$f24 = $this->input->post('f24');	
	// 	$f25 = $this->input->post('f25');	
	// 	$f26 = $this->input->post('f26');	
	// 	$f27 = $this->input->post('f27');	
	// 	$f301 = $this->input->post('f301');
	// 	$f302 = $this->input->post('f302');
	// 	$f303 = $this->input->post('f303');	

	// 	# for table tbl_f4
	// 	$f401z = $this->input->post('f401');	
	// 	$f402z = $this->input->post('f402');	
	// 	$f403z = $this->input->post('f403');	
	// 	$f404z = $this->input->post('f404');	
	// 	$f405z = $this->input->post('f405');	
	// 	$f406z = $this->input->post('f406');	
	// 	$f407z = $this->input->post('f407');	
	// 	$f408z = $this->input->post('f408');	
	// 	$f409z = $this->input->post('f409');	
	// 	$f410z = $this->input->post('f410');	
	// 	$f411z = $this->input->post('f411');	
	// 	$f412z = $this->input->post('f412');	
	// 	$f413z = $this->input->post('f413');	
	// 	$f414z = $this->input->post('f414');	
	// 	$f415z = $this->input->post('f415');	
	// 	$f416z = $this->input->post('f416');
	// 	#convert
	// 	$f401 = $f401z = 1 ? '1' : '0';
	// 	$f402 = $f402z = 1 ? '1' : '0';	
	// 	$f403 = $f403z = 1 ? '1' : '0';	
	// 	$f404 = $f404z = 1 ? '1' : '0';	
	// 	$f405 = $f405z = 1 ? '1' : '0';	
	// 	$f406 = $f406z = 1 ? '1' : '0';	
	// 	$f407 = $f407z = 1 ? '1' : '0';	
	// 	$f408 = $f408z = 1 ? '1' : '0';	
	// 	$f409 = $f409z = 1 ? '1' : '0';	
	// 	$f410 = $f410z = 1 ? '1' : '0';	
	// 	$f411 = $f411z = 1 ? '1' : '0';	
	// 	$f412 = $f412z = 1 ? '1' : '0';	
	// 	$f413 = $f413z = 1 ? '1' : '0';	
	// 	$f414 = $f414z = 1 ? '1' : '0';	
	// 	$f415 = $f415z = 1 ? '1' : '0';	
	// 	$f416 = $f416z = 1 ? '1' : '0';

	// 	# for table tbl_f69
	// 	$f6 = $this->input->post('f6');
	// 	$f501 = $this->input->post('f501');	
	// 	$f502 = $this->input->post('f502'); 	
	// 	$f503 = $this->input->post('f503'); 	
	// 	$f7 = $this->input->post('f7'); 	
	// 	$f7a = $this->input->post('f7a');	
	// 	$f8 = $this->input->post('f8');	
	// 	$f901z = $this->input->post('f901');	
	// 	$f902z = $this->input->post('f902');	
	// 	$f903z = $this->input->post('f903');	
	// 	$f904z = $this->input->post('f904');	
	// 	$f905z = $this->input->post('f905');	
	// 	$f906 = $this->input->post('f906');
	// 	#convert
	// 	$f901 = $f901z = 1 ? '1' : '0';
	// 	$f902 = $f902z = 1 ? '1' : '0';	
	// 	$f903 = $f903z = 1 ? '1' : '0';	
	// 	$f904 = $f904z = 1 ? '1' : '0';	
	// 	$f905 = $f905z = 1 ? '1' : '0';	
		

	// 	# for table tbl_f1016
	// 	$f1001 = $this->input->post('f1001');	
	// 	$f1002 = $this->input->post('f1002');	
	// 	$f1101 = $this->input->post('f1101');	
	// 	$f1102 = $this->input->post('f1102');	
	// 	$f1201 = $this->input->post('f1201');	
	// 	$f1202 = $this->input->post('f1202');	
	// 	$f1301 = $this->input->post('f1301'); 	
	// 	$f1302 = $this->input->post('f1302'); 	
	// 	$f1303 = $this->input->post('f1303'); 	
	// 	$f14 = $this->input->post('f14');	
	// 	$f15 = $this->input->post('f15');	
	// 	$f1601z = $this->input->post('f1601');	
	// 	$f1602z = $this->input->post('f1602');	
	// 	$f1603z = $this->input->post('f1603');	
	// 	$f1604z = $this->input->post('f1604');	
	// 	$f1605z = $this->input->post('f1605');	
	// 	$f1606z = $this->input->post('f1606');	
	// 	$f1607z = $this->input->post('f1607');	
	// 	$f1608z = $this->input->post('f1608');	
	// 	$f1609z = $this->input->post('f1609');	
	// 	$f1610z = $this->input->post('f1610');	
	// 	$f1611z = $this->input->post('f1611');	
	// 	$f1612z = $this->input->post('f1612');	
	// 	$f1613z = $this->input->post('f1613');	
	// 	$f1614z = $this->input->post('f1614');
	// 	#convert
	// 	$f1601 = $f1601z = 1 ? '1' : '0';
	// 	$f1602 = $f1602z = 1 ? '1' : '0';
	// 	$f1603 = $f1603z = 1 ? '1' : '0';
	// 	$f1604 = $f1604z = 1 ? '1' : '0';
	// 	$f1605 = $f1605z = 1 ? '1' : '0';
	// 	$f1606 = $f1606z = 1 ? '1' : '0';
	// 	$f1607 = $f1607z = 1 ? '1' : '0';
	// 	$f1608 = $f1608z = 1 ? '1' : '0';
	// 	$f1609 = $f1609z = 1 ? '1' : '0';
	// 	$f1610 = $f1610z = 1 ? '1' : '0';
	// 	$f1611 = $f1611z = 1 ? '1' : '0';
	// 	$f1612 = $f1612z = 1 ? '1' : '0';
	// 	$f1613 = $f1613z = 1 ? '1' : '0';
	// 	$f1614 = $f1614z = 1 ? '1' : '0';
	// 	$f1615 = $f1615z = 1 ? '1' : '0';
	// 	$f1616 = $f1616z = 1 ? '1' : '0';

	// 	# for table tbl_f17_1
	// 	$f1701z = $this->input->post('f1701');	
	// 	$f1702bz = $this->input->post('f1702b');	
	// 	$f1703z = $this->input->post('f1703');	
	// 	$f1704bz = $this->input->post('f1704b');	
	// 	$f1705z = $this->input->post('f1705');	
	// 	$f1705az = $this->input->post('f1705a');	
	// 	$f1706z = $this->input->post('f1706');	
	// 	$f1706baz = $this->input->post('f1706ba');	
	// 	$f1707z = $this->input->post('f1707');	
	// 	$f1708bz = $this->input->post('f1708b');	
	// 	$f1709z = $this->input->post('f1709');	
	// 	$f1710bz = $this->input->post('f1710b');	
	// 	$f1711z = $this->input->post('f1711');	
	// 	$f1711az = $this->input->post('f1711a');	
	// 	$f1712bz = $this->input->post('f1712b');	
	// 	$f1712az = $this->input->post('f1712a');	
	// 	$f1713z = $this->input->post('f1713');	
	// 	$f1714bz = $this->input->post('f1714b');	
	// 	$f1715z = $this->input->post('f1715');	
	// 	$f1716bz = $this->input->post('f1716b');	
	// 	$f1717z = $this->input->post('f1717');	
	// 	$f1718bz = $this->input->post('f1718b');	
	// 	$f1719z = $this->input->post('f1719');	
	// 	$f1720bz = $this->input->post('f1720b');	
	// 	$f1721z = $this->input->post('f1721');	
	// 	$f1722bz = $this->input->post('f1722b');	
	// 	$f1723z = $this->input->post('f1723');	
	// 	$f1724bz = $this->input->post('f1724b');	
	// 	$f1725z = $this->input->post('f1725');	
	// 	$f1726bz = $this->input->post('f1726b');

	// 	#convert
	// 	$f1701 = $f1701z = 1 ? '1' : '0';	
	// 	$f1702b = $f1702bz = 1 ? '1' : '0';	
	// 	$f1703 = $f1703z = 1 ? '1' : '0';	
	// 	$f1704b = $f1704bz = 1 ? '1' : '0';	
	// 	$f1705 = $f1705z = 1 ? '1' : '0';	
	// 	$f1705a = $f1705az = 1 ? '1' : '0';	
	// 	$f1706 = $f1706z = 1 ? '1' : '0';	
	// 	$f1706ba = $f1706baz = 1 ? '1' : '0';	
	// 	$f1707 = $f1707z = 1 ? '1' : '0';
	// 	$f1708b = $f1708bz = 1 ? '1' : '0';	
	// 	$f1709 = $f1709z = 1 ? '1' : '0';	
	// 	$f1710b = $f1710bz = 1 ? '1' : '0';	
	// 	$f1711 = $f1711z = 1 ? '1' : '0';	
	// 	$f1711a = $f1711az = 1 ? '1' : '0';	
	// 	$f1712a = $f1712az = 1 ? '1' : '0';
	// 	$f1712b = $f1712bz = 1 ? '1' : '0';	
	// 	$f1713 = $f1713z = 1 ? '1' : '0';	
	// 	$f1714b =$f1714bz = 1 ? '1' : '0';	
	// 	$f1715 = $f1715z = 1 ? '1' : '0';	
	// 	$f1716b = $f1716bz = 1 ? '1' : '0';	
	// 	$f1717 = $f1717z = 1 ? '1' : '0';	
	// 	$f1718b = $f1718bz = 1 ? '1' : '0';	
	// 	$f1719 = $f1719z = 1 ? '1' : '0';	
	// 	$f1720b = $f1720bz = 1 ? '1' : '0';	
	// 	$f1721 = $f1721z = 1 ? '1' : '0';	
	// 	$f1722b = $f1722bz = 1 ? '1' : '0';	
	// 	$f1723 = $f1723z = 1 ? '1' : '0';	
	// 	$f1724b = $f1724bz = 1 ? '1' : '0';	
	// 	$f1725 = $f1725z = 1 ? '1' : '0';	
	// 	$f1726b = $f1726bz = 1 ? '1' : '0';
			

	// 	# for table tbl_f17_2
	// 	$f1727z = $this->input->post('f1727');	
	// 	$f1728bz = $this->input->post('f1728b');	
	// 	$f1729z = $this->input->post('f1729');	
	// 	$f1730bz = $this->input->post('f1730b');	
	// 	$f1731z = $this->input->post('f1731');	
	// 	$f1732bz = $this->input->post('f1732b');	
	// 	$f1733z = $this->input->post('f1733');	
	// 	$f1734bz = $this->input->post('f1734b');	
	// 	$f1735z = $this->input->post('f1735');	
	// 	$f1736bz = $this->input->post('f1736b');	
	// 	$f1737z = $this->input->post('f1737');	
	// 	$f1737az = $this->input->post('f1737a');	
	// 	$f1738z = $this->input->post('f1738');	
	// 	$f1738baz = $this->input->post('f1738ba');	
	// 	$f1739z = $this->input->post('f1739');	
	// 	$f1740bz = $this->input->post('f1740b');	
	// 	$f1741z = $this->input->post('f1741');	
	// 	$f1742bz = $this->input->post('f1742b');	
	// 	$f1743z = $this->input->post('f1743');	
	// 	$f1744bz = $this->input->post('f1744b');	
	// 	$f1745z = $this->input->post('f1745');	
	// 	$f1746bz = $this->input->post('f1746b');	
	// 	$f1747z = $this->input->post('f1747');	
	// 	$f1748bz = $this->input->post('f1748b');	
	// 	$f1749z = $this->input->post('f1749');	
	// 	$f1750bz = $this->input->post('f1750b');	
	// 	$f1751z = $this->input->post('f1751');	
	// 	$f1752bz = $this->input->post('f1752b');	
	// 	$f1753z = $this->input->post('f1753');	
	// 	$f1754bz = $this->input->post('f1754b');

	// 	#convert
	// 	$f1727 = $f1727z = 1 ? '1' : '0';	
	// 	$f1728b = $f1728bz = 1 ? '1' : '0';	
	// 	$f1729 = $f1729z = 1 ? '1' : '0';
	// 	$f1730b = $f1730z = 1 ? '1' : '0';
	// 	$f1731 = $f1731z = 1 ? '1' : '0';
	// 	$f1732b = $f1732bz = 1 ? '1' : '0';
	// 	$f1733 = $f1733z = 1 ? '1' : '0';
	// 	$f1734b = $f1734bz = 1 ? '1' : '0';
	// 	$f1735 = $f1735z = 1 ? '1' : '0';
	// 	$f1736b = $f1736bz = 1 ? '1' : '0';
	// 	$f1737 = $f1737z = 1 ? '1' : '0';
	// 	$f1737a = $f1737az = 1 ? '1' : '0';
	// 	$f1738 = $f1738z = 1 ? '1' : '0';
	// 	$f1738ba = $f1738baz = 1 ? '1' : '0';
	// 	$f1739 = $f1739z = 1 ? '1' : '0';
	// 	$f1740b = $f1740bz = 1 ? '1' : '0';
	// 	$f1741 = $f1741z = 1 ? '1' : '0';
	// 	$f1742b = $f1742bz = 1 ? '1' : '0';
	// 	$f1743 = $f1743z = 1 ? '1' : '0';
	// 	$f1744b = $f1744bz = 1 ? '1' : '0';
	// 	$f1745 = $f1745z = 1 ? '1' : '0';
	// 	$f1746b = $f1746bz = 1 ? '1' : '0';
	// 	$f1747 = $f1747z = 1 ? '1' : '0';
	// 	$f1748b = $f1748bz = 1 ? '1' : '0';
	// 	$f1749 = $f1749z = 1 ? '1' : '0';
	// 	$f1750b = $f1750bz = 1 ? '1' : '0';
	// 	$f1751 = $f1751z = 1 ? '1' : '0';
	// 	$f1752b = $f1752bz = 1 ? '1' : '0';
	// 	$f1753 = $f1753z = 1 ? '1' : '0';
	// 	$f1754b = $f1754bz = 1 ? '1' : '0';

	// 	$tbl_f23 = array(

	// 		'nim' => $nim,
	// 		'f21' => $f21,
	// 		'f22' => $f22,
	// 		'f23' => $f23,
	// 		'f24' => $f24,
	// 		'f25' => $f25,
	// 		'f26' => $f26,
	// 		'f27' => $f27,
	// 		'f301' => $f301,
	// 		);	
	// 	$tbl_f4 = array(

	// 		'nim' => $nim,
	// 		'f401' => $f401,
	// 		'f402' => $f402,
	// 		'f403' => $f403,
	// 		'f404' => $f404,
	// 		'f405' => $f405,
	// 		'f406' => $f406,
	// 		'f407' => $f407,
	// 		'f408' => $f408,
	// 		'f409' => $f409,
	// 		'f410' => $f410,
	// 		'f411' => $f411,
	// 		'f412' => $f412,
	// 		// 'f4013' => $f4013,
	// 		'f414' => $f414,
	// 		'f415' => $f415,
	// 		'f416' => $f416,		
	// 	);	
	// 	$tbl_f69 = array(

	// 		'nim'  => $nim,
	// 		'f6'   => $f6,
	// 		'f501' => $f501,
	// 		'f502' => $f502,
	// 		'f503' => $f503,
	// 		'f7'   => $f7,
	// 		'f7a'  => $f7a,
	// 		'f8'   => $f8,
	// 		'f901' => $f901,
	// 		'f902' => $f902,
	// 		'f903' => $f903,
	// 		'f904' => $f904,
	// 		'f905' => $f905,
	// 		'f906' => $f906,
	// 	);
	// 	$tbl_f1016 = array(

	// 		'nim'  => $nim,
	// 		'f1001'   => $f1001,
	// 		'f1002' => $f1002,
	// 		'f1101' => $f1101,
	// 		'f1102' => $f1102,
	// 		'f1201'   => $f1201,
	// 		'f1202'  => $f1202,
	// 		'f1301'   => $f1301,
	// 		'f1302' => $f1302,
	// 		'f1303' => $f1303,
	// 		'f14' => $f14,
	// 		'f15' => $f15,
	// 		'f1601' => $f1601,
	// 		'f1602' => $f1602,
	// 		'f1603' => $f1603,
	// 		'f1604' => $f1604,
	// 		'f1605' => $f1605,
	// 		'f1606' => $f1606,
	// 		'f1607' => $f1607,
	// 		'f1608' => $f1608,
	// 		'f1609' => $f1609,
	// 		'f1610' => $f1610,
	// 		'f1611' => $f1611,
	// 		'f1612' => $f1612,
	// 		'f1613' => $f1613,
	// 		'f1614' => $f1614,
	// 	);
	// 	$tbl_f117_1 = array(

	// 		'nim'  => $nim,
	// 		'f1701'   => $f1701,
	// 		'f1702b' => $f1702b,
	// 		'f1703' => $f1703,
	// 		'f1704b' => $f1704b,
	// 		'f1705'   => $f1705,
	// 		'f1705a'  => $f1705a,
	// 		'f1706'   => $f1706,
	// 		// 'f1706a' => $f1706a,
	// 		'f1707' => $f1707,
	// 		'f1708b' => $f1708b,
	// 		'f1709' => $f1709,
	// 		'f1710b' => $f1710b,
	// 		'f1711' => $f1711,
	// 		'f1711a' => $f1711a,
	// 		'f1712b' => $f1712b,
	// 		'f1712a' => $f1712a,
	// 		'f1713' => $f1713,
	// 		'f1714b' => $f1714b,
	// 		'f1715' => $f1715,
	// 		'f1716b' => $f1716b,
	// 		'f1717' => $f1717,
	// 		'f1718b' => $f1718b,
	// 		'f1719' => $f1719,
	// 		'f1720b' => $f1720b,
	// 		'f1721' => $f1721,
	// 		'f1722b' => $f1722b,
	// 		'f1723' => $f1723,
	// 		'f1724b' => $f1724b,
	// 		'f1725' => $f1725,
	// 		'f1726b' => $f1726b,
	// 	);
	// 	$tbl_f117_2 = array(

	// 		'nim'  => $nim,
	// 		'f1727'   => $f1727,
	// 		'f1728b' => $f1728b,
	// 		'f1729' => $f1729,
	// 		'f1730b' => $f1730b,
	// 		'f1731'   => $f1731,
	// 		'f1732b'  => $f1732b,
	// 		'f1733'   => $f1733,
	// 		'f1734b' => $f1734b,
	// 		'f1735' => $f1735,
	// 		'f1736b' => $f1736b,
	// 		'f1737' => $f1737,
	// 		'f1737a' => $f1737a,
	// 		'f1738' => $f1738,
	// 		'f1738ba' => $f1738ba,
	// 		'f1739' => $f1739,
	// 		'f1740b' => $f1740b,
	// 		'f1741' => $f1741,
	// 		'f1742b' => $f1742b,
	// 		'f1743' => $f1743,
	// 		'f1744b' => $f1744b,
	// 		'f1745' => $f1745,
	// 		'f1746b' => $f1746b,
	// 		'f1747' => $f1747,
	// 		'f1748b' => $f1748b,
	// 		'f1749' => $f1749,
	// 		'f1750b' => $f1750b,
	// 		'f1751' => $f1751,
	// 		'f1752b' => $f1752b,
	// 		'f1753' => $f1753,
	// 		'f1754b' => $f1754b,
	// 	);

	// 		# insert to table
	// 	$this->m_tracer->input_data($tbl_f23,'tbl_f23');
	// 	$this->m_tracer->input_data($tbl_f4,'tbl_f4');
	// 	$this->m_tracer->input_data($tbl_f69,'tbl_f69');
	// 	$this->m_tracer->input_data($tbl_f1016,'tbl_f1016');
	// 	$this->m_tracer->input_data($tbl_f117_1,'tbl_f17_1');
	// 	$this->m_tracer->input_data($tbl_f117_2,'tbl_f17_2');

	// 	$this->session->set_flashdata('message', '<div class="alert">
	// 		  <span class="closebtn">&times;</span> 
	// 		  <strong>Proses Pengisian Kuesioner Telah Selesai!</strong> Terima Kasih telah berpatisipasi.
	// 		</div>');
	// 	redirect("user/kuesioner");
					
			
		
	// }
	public function InsertKues2021()
	{
		# code...
		#  get form
		# for table tbl_f23


		$nimhsmsmh = $this->input->post('nimhsmsmh');
		$f8 = $this->input->post('f8');

		$f504 = $this->input->post('f504');	
		$f502 = $this->input->post('f502');	
		$f505 = $this->input->post('f505');	
		$f506 = $this->input->post('f506');	

		// $f504 = $f504z = 1 ? '1' : '0';

		$f5a1 = $this->input->post('f5a1');	
		$f5a2 = $this->input->post('f5a2');	

		$f1101 = $this->input->post('f1101');
		$f1102 = $this->input->post('f1102');

		// $f1101 = $f1101z = 1 ? '1' : '0';

		$f5b = $this->input->post('f5b');
		$f5c = $this->input->post('f5c');
		$f5d = $this->input->post('f5d');

		$f18a = $this->input->post('f18a');
		$f18bz = $this->input->post('f18b');
		$f18cz = $this->input->post('f18c');
		$f18d = $this->input->post('f18d');

		// $f18a = $f18az = 1 ? '1' : '0';
		$f18b = $f18bz = null ? $f18bz : '0';
		$f18c = $f18cz = null ? $f18cz : '0';
		// $f18d = $f18dz = 1 ? '1' : '0';

		$f1201z = $this->input->post('f1201');
		$f1202z = $this->input->post('f1202');

		$f1201 = $f1201z > "0" ? $f1201z : '0';
		$f1202 = $f1202z > "0" ? $f1202z : '0';

		// $f1201 = $f1201z = 1 ? '1' : '0';


		$f14 = $this->input->post('f14');
		$f15 = $this->input->post('f15');

		// $f14 = $f14z = 1 ? '1' : '0';
		// $f15 = $f15z = 1 ? '1' : '0';

		$f1761 = $this->input->post('f1761');
		$f1762 = $this->input->post('f1762');	
		$f1763 = $this->input->post('f1763');
		$f1764 = $this->input->post('f1764');
		$f1765 = $this->input->post('f1765');
		$f1766 = $this->input->post('f1766');
		$f1767 = $this->input->post('f1767');
		$f1768 = $this->input->post('f1768');
		$f1769 = $this->input->post('f1769');
		$f1770 = $this->input->post('f1770');
		$f1771 = $this->input->post('f1771');
		$f1772 = $this->input->post('f1772');
		$f1773 = $this->input->post('f1773');
		$f1774 = $this->input->post('f1774');

		// $f1762 = $f1762z = 1 ? '1' : '0';
		// $f1763 = $f1763z = 1 ? '1' : '0';
		// $f1764 = $f1764z = 1 ? '1' : '0';
		// $f1765 = $f1765z = 1 ? '1' : '0';
		// $f1766 = $f1766z = 1 ? '1' : '0';
		// $f1767 = $f1767z = 1 ? '1' : '0';
		// $f1768 = $f1768z = 1 ? '1' : '0';
		// $f1769 = $f1769z = 1 ? '1' : '0';
		// $f1770 = $f1770z = 1 ? '1' : '0';
		// $f1771 = $f1771z = 1 ? '1' : '0';
		// $f1772 = $f1772z = 1 ? '1' : '0';
		// $f1773 = $f1773z = 1 ? '1' : '0';
		// $f1774 = $f1774z = 1 ? '1' : '0';

		$f21 = $this->input->post('f21');
		$f22 = $this->input->post('f22');
		$f23 = $this->input->post('f23');
		$f24 = $this->input->post('f24');
		$f25 = $this->input->post('f25');
		$f26 = $this->input->post('f26');
		$f27 = $this->input->post('f27');

		// $f21 = $f21z = 1 ? '1' : '0';
		// $f22 = $f22z = 1 ? '1' : '0';
		// $f23 = $f23z = 1 ? '1' : '0';
		// $f24 = $f24z = 1 ? '1' : '0';
		// $f25 = $f25z = 1 ? '1' : '0';
		// $f26 = $f26z = 1 ? '1' : '0';
		// $f27 = $f27z = 1 ? '1' : '0';

		$f301 = $this->input->post('f301');
		$f302 = $this->input->post('f302');
		$f303 = $this->input->post('f303');

		$f401z = $this->input->post('f401');
		$f402z = $this->input->post('f402');
		$f403z = $this->input->post('f403');
		$f404z = $this->input->post('f404');
		$f405z = $this->input->post('f405');
		$f406z = $this->input->post('f406');
		$f407z = $this->input->post('f407');
		$f408z = $this->input->post('f408');
		$f409z = $this->input->post('f409');
		$f410z = $this->input->post('f410');
		$f411z = $this->input->post('f411');
		$f412z = $this->input->post('f412');
		$f413z = $this->input->post('f413');
		$f414z = $this->input->post('f414');
		$f415z = $this->input->post('f415');
		$f416z = $this->input->post('f416');

		// $f301 = $f301z = 1 ? '1' : '0';
		$f401 = $f401z > "0" ? $f401z : '0';
		$f402 = $f402z > "0" ? $f402z : '0';
		$f403 = $f403z > "0" ? $f403z : '0';
		$f404 = $f404z > "0" ? $f404z : '0';
		$f405 = $f405z > "0" ? $f405z : '0';
		$f406 = $f406z > "0" ? $f406z : '0';
		$f407 = $f407z > "0" ? $f407z : '0';
		$f408 = $f408z > "0" ? $f408z : '0';
		$f409 = $f409z > "0" ? $f409z : '0';
		$f410 = $f410z > "0" ? $f410z : '0';
		$f411 = $f411z > "0" ? $f411z : '0';
		$f412 = $f412z > "0" ? $f412z : '0';
		$f413 = $f413z > "0" ? $f413z : '0';
		$f414 = $f414z > "0" ? $f414z : '0';
		$f415 = $f415z > "0" ? $f415z : '0';
		$f416 = $f416z > "0" ? $f416z : '0';

		$f6 = $this->input->post('f6');
		$f7 = $this->input->post('f7');
		$f7a = $this->input->post('f7a');

		$f1001z = $this->input->post('f1001');
		$f1002 = $this->input->post('f1002');

		$f1601z = $this->input->post('f1601');
		$f1602z = $this->input->post('f1602');
		$f1603z = $this->input->post('f1603');
		$f1604z = $this->input->post('f1604');
		$f1605z = $this->input->post('f1605');
		$f1606z = $this->input->post('f1606');
		$f1607z = $this->input->post('f1607');
		$f1608z = $this->input->post('f1608');
		$f1609z = $this->input->post('f1609');
		$f1610z = $this->input->post('f1610');
		$f1611z = $this->input->post('f1611');
		$f1612z = $this->input->post('f1612');
		$f1613z = $this->input->post('f1613');
		$f1614z = $this->input->post('f1614');
		
		$f1001 = $f1001z > "0" ? $f1001z : '0';
		$f1601 = $f1601z > "0" ? '1' : '0';
		$f1602 = $f1602z > "0" ? '2' : '0';
		$f1603 = $f1603z > "0" ? '3' : '0';
		$f1604 = $f1604z > "0" ? '4' : '0';
		$f1605 = $f1605z > "0" ? '5' : '0';
		$f1606 = $f1606z > "0" ? '6' : '0';
		$f1607 = $f1607z > "0" ? '7' : '0';
		$f1608 = $f1608z > "0" ? '8' : '0';
		$f1609 = $f1609z > "0" ? '9' : '0';
		$f1610 = $f1610z > "0" ? '10' : '0';
		$f1611 = $f1611z > "0" ? '11' : '0';
		$f1612 = $f1612z > "0" ? '12' : '0';
		$f1613 = $f1613z > "0" ? '13' : '0';
		$f1614 = $f1614z > "0" ? $f1614z : '0';
		
		if ($f8 == "5" && $f8 == "2") {
			# code...
			$tbl_f_2021 = array(

			'nimhsmsmh' => $nimhsmsmh,
			'f8' => $f8,
			'f504' => "0",
			'f502' => "0",
			'f505' => "0",
			'f506' => "0",
			'f5a1' => "0",
			'f5a2' => "0",
			'f1101' => "0",
			'f1102' => "0",
			'f5b' => "0",
			'f5c' => "0",
			'f5d' => "0",
			'f18a' => "0",
			'f18b' => "0",
			'f18c' => "0",
			'f18d' => "0",
			'f1201' => "0",
			'f1202' => "0",
			'f14' => "0",
			'f15' => "0",
			'f1761' => "0",
			'f1762' => "0",
			'f1763' => "0",
			'f1764' => "0",
			'f1765' => "0",
			'f1766' => "0",
			'f1767' => "0",
			'f1768' => "0",
			'f1769' => "0",
			'f1770' => "0",
			'f1771' => "0",
			'f1772' => "0",
			'f1773' => "0",
			'f1774' => "0",
			'f21' => "0",
			'f22' => "0",
			'f23' => "0",
			'f24' => "0",
			'f25' => "0",
			'f26' => "0",
			'f27' => "0",
			'f301' => "0",
			'f302' => "0",
			'f303' => "0",
			'f401' => "0",
			'f402' => "0",
			'f403' => "0",
			'f404' => "0",
			'f405' => "0",
			'f406' => "0",
			'f407' => "0",
			'f408' => "0",
			'f409' => "0",
			'f410' => "0",
			'f411' => "0",
			'f412' => "0",
			'f413' => "0",
			'f414' => "0",
			'f415' => "0",
			'f416' => "0",
			'f6' => "0",
			'f7' => "0",
			'f7a' => "0",
			'f1001' => "0",
			'f1002' => "0",
			'f1601' => "0",
			'f1602' => "0",
			'f1603' => "0",
			'f1604' => "0",
			'f1605' => "0",
			'f1606' => "0",
			'f1607' => "0",
			'f1608' => "0",
			'f1609' => "0",
			'f1610' => "0",
			'f1611' => "0",
			'f1612' => "0",
			'f1613' => "0",
			'f1614' => "0",

			);
		}else{
		$tbl_f_2021 = array(

			'nimhsmsmh' => $nimhsmsmh,
			'f8' => $f8,
			'f504' => $f504,
			'f502' => $f502,
			'f505' => $f505,
			'f506' => $f506,
			'f5a1' => $f5a1,
			'f5a2' => $f5a2,
			'f1101' => $f1101,
			'f1102' => $f1102,
			'f5b' => $f5b,
			'f5c' => $f5c,
			'f5d' => $f5d,
			'f18a' => $f18a,
			'f18b' => $f18b,
			'f18c' => $f18c,
			'f18d' => $f18d,
			'f1201' => $f1201,
			'f1202' => $f1202,
			'f14' => $f14,
			'f15' => $f15,
			'f1761' => $f1761,
			'f1762' => $f1762,
			'f1763' => $f1763,
			'f1764' => $f1764,
			'f1765' => $f1765,
			'f1766' => $f1766,
			'f1767' => $f1767,
			'f1768' => $f1768,
			'f1769' => $f1769,
			'f1770' => $f1770,
			'f1771' => $f1771,
			'f1772' => $f1772,
			'f1773' => $f1773,
			'f1774' => $f1774,
			'f21' => $f21,
			'f22' => $f22,
			'f23' => $f23,
			'f24' => $f24,
			'f25' => $f25,
			'f26' => $f26,
			'f27' => $f27,
			'f301' => $f301,
			'f302' => $f302,
			'f303' => $f303,
			'f401' => $f401,
			'f402' => $f402,
			'f403' => $f403,
			'f404' => $f404,
			'f405' => $f405,
			'f406' => $f406,
			'f407' => $f407,
			'f408' => $f408,
			'f409' => $f409,
			'f410' => $f410,
			'f411' => $f411,
			'f412' => $f412,
			'f413' => $f413,
			'f414' => $f414,
			'f415' => $f415,
			'f416' => $f416,
			'f6' => $f6,
			'f7' => $f7,
			'f7a' => $f7a,
			'f1001' => $f1001,
			'f1002' => $f1002,
			'f1601' => $f1601,
			'f1602' => $f1602,
			'f1603' => $f1603,
			'f1604' => $f1604,
			'f1605' => $f1605,
			'f1606' => $f1606,
			'f1607' => $f1607,
			'f1608' => $f1608,
			'f1609' => $f1609,
			'f1610' => $f1610,
			'f1611' => $f1611,
			'f1612' => $f1612,
			'f1613' => $f1613,
			'f1614' => $f1614,

			);	
			}

			# insert to table
		$this->m_tracer->input_data($tbl_f_2021,'tbl_f_2021');
		

		$this->session->set_flashdata('message', '<div class="alert">
			  <span class="closebtn">&times;</span> 
			  <strong>Proses Pengisian Kuesioner Telah Selesai!</strong> Terima Kasih telah berpatisipasi.
			</div>');
		redirect("user/kuesioner");
					
			
		
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */