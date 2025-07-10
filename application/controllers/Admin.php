<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('admin/login');
	}
	public function login()
	{
		# code...
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() != false){
			$where = array(
				'username' => $username,
				'password' => md5($password)			
			);
			$data = $this->m_tracer->get_data($where,'admin');
			$d = $this->m_tracer->get_data($where,'admin')->row();
			$cek = $data->num_rows();
			if($cek > 0){
				$session = array(
					'nama'=> $d->nama,
					'status' => 'login'
				);
				$this->session->set_userdata($session);
				redirect(base_url().'admin/home');
			}else{
				redirect(base_url().'admin?pesan=gagalz');			
			}
		}else{
			$this->load->view('login');
		}
	}
	 function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'admin?pesan=logout');
	}
	public function home()
	{
		# code...
		$this->load->view('admin/header');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
  ///////////////////////////////////////////////////// Akun //////////////////////////////////////////////////////
    public function akuna()
    {
      # code...
    $this->load->view('admin/header');
    $this->load->view('admin/akuna');
    $this->load->view('admin/footer');
    }
    public function akun()
    {
      # code...
        $prodi        = $this->input->post('prodi');
        $tahun_lulus  = $this->input->post('tahun_lulus');
        $nim          = $this->input->post('nim');
        
        if($nim > 0) {
            $where = array(
            'tmst_mahasiswa.nim' => $nim,
            // 'prodi'     => $prodi,                 
             );
            $data['lulusan'] = $this->m_tracer->get_data_join_where2021($where)->result();
            // $data['label'] = "by Nomor Pendaftaran";
            $this->load->view('admin/header');
            $this->load->view('admin/akuna');
            $this->load->view('admin/akun',$data);
            $this->load->view('admin/footer');
            $this->load->view('admin/akun_js');

        }elseif ($prodi == 0) {
             # code...
            $where = array(
            'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
            // 'prodi'     => $prodi,                 
             );
            $data['lulusan'] = $this->m_tracer->get_data_join_where2021($where)->result();
            // $data['label'] = "by Nomor Pendaftaran";
            $this->load->view('admin/header');
            $this->load->view('admin/akuna');
            $this->load->view('admin/akun',$data);
            $this->load->view('admin/footer');
            $this->load->view('admin/akun_js');
         }elseif ($tahun_lulus == null) {
             # code...
             $where = array(
            // 'gelombang' => $gelombang,
            'tmst_mahasiswa.prodi'     => $prodi,                 
             );
           $data['lulusan'] = $this->m_tracer->get_data_join_where2021($where)->result();
            // $data['label'] = "by Nomor Pendaftaran";
            $this->load->view('admin/header');
            $this->load->view('admin/akuna');
            $this->load->view('admin/akun',$data);
            $this->load->view('admin/footer');
            $this->load->view('admin/akun_js');
         }else{
            $where = array(
            'tbl_datadiri2021.tahun_lulus' => $tahun_lulus,
            'tbl_datadiri2021.prodi'     => $prodi,                 
            );
           $data['lulusan'] = $this->m_tracer->get_data_join_where2021($where)->result();
            // $data['label'] = "by Nomor Pendaftaran";
            $this->load->view('admin/header');
            $this->load->view('admin/akuna');
            $this->load->view('admin/akun',$data);
            $this->load->view('admin/footer');
            $this->load->view('admin/akun_js');
         } 
    }

   ///////////////////////////////////////////////////// .Akun //////////////////////////////////////////////////////
	public function export()
	{
		# code...
		$this->load->view('admin/header');
		$this->load->view('admin/fexport');
		$this->load->view('admin/footer');
	}
  public function export2021()
  {
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/fexport2021');
    $this->load->view('admin/footer');
  }
  public function jobinfo()
  {
    # code...
    $data['jobinfo'] = $this->m_tracer->get_data_all('tbl_jobinfo')->result(); 
    $this->load->view('admin/header');
    $this->load->view('admin/jobinfo',$data);
    $this->load->view('admin/footer');
  }
  public function tambahjobinfo()
  {
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/ijobinfo');
    $this->load->view('admin/footer');
  }
  public function editjobinfo($id)
  {
    # code...
    $where = array(
        'id_job' => $id,      
      );
    $data['job']=$this->m_tracer->get_data($where,'tbl_jobinfo')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/ejobinfo',$data);
    $this->load->view('admin/footer');
  }
  public function berita()
  {
    # code...
    $data['jobinfo'] = $this->m_tracer->get_data_all('tbl_berita')->result(); 
    $this->load->view('admin/header');
    $this->load->view('admin/berita',$data);
    $this->load->view('admin/footer');
  }
  public function tambahberita()
  {
    # code...
    $this->load->view('admin/header');
    $this->load->view('admin/iberita');
    $this->load->view('admin/footer');
  }
  public function editberita($id)
  {
    # code...
    $where = array(
        'id_berita' => $id,      
      );
    $data['berita']=$this->m_tracer->get_data($where,'tbl_berita')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/eberita',$data);
    $this->load->view('admin/footer');
  }
  public function jobinfoip()
  {
    # code...
    /* Jika file upload tidak kosong*/
        /* 4 adalah menyatakan tidak ada file yang diupload*/
        if ($_FILES['file']['error'] <> 4) 
        {
          $nama = $this->input->post('nama');
          $tanggal = $this->input->post('tanggal');
          $gabungan = $nama.$tanggal;
          $nmfile = judul_seo($gabungan);

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/upload/jobinfo';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['max_width']        = '3000'; //pixels
          $config['max_height']       = '5000'; //pixels
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);
          
          if (!$this->upload->do_upload('file'))
          {   //file gagal diupload -> kembali ke form tambah
            // $this->insert();
            echo "GAGAL COKKK!!!";
          } 
            //file berhasil diupload -> lanjutkan ke query INSERT
            else 
            { 
              $userfile = $this->upload->data();
              $thumbnail                = $config['file_name']; 
              // library yang disediakan codeigniter
              $config['image_library']  = 'gd2'; 
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/upload/jobinfo'.$userfile['file_name'].''; 
              // membuat thumbnail
              $config['create_thumb']   = TRUE;               
              // rasio resolusi
              $config['maintain_ratio'] = FALSE; 
              // lebar
              $config['width']          = 400; 
              // tinggi
              $config['height']         = 200; 

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $data = array(
                  'tanggal'   => $this->input->post('tanggal'),
                  'nama'      => $this->input->post('nama'),
                  'keterangan'=> $this->input->post('keterangan'),
                  'uploader'  => $this->input->post('uploader'),
                  

                  'file'      => $nmfile,
                  'file_type' => $userfile['file_ext'],
                  'file_size' => $userfile['file_size']
              );

              // eksekusi query INSERT
              $this->m_tracer->input_data($data,'tbl_jobinfo');
              // set pesan data berhasil dibuat

              redirect('admin/jobinfo');
            }
        }else // Jika file upload kosong
        {
          $data = array(
                  'tanggal'   => $this->input->post('tanggal'),
                  'nama'      => $this->input->post('nama'),
                  'keterangan'=> $this->input->post('keterangan'),
                  'uploader'  => $this->input->post('uploader'),
          );

          // eksekusi query INSERT
          $this->m_tracer->input_data($data,'tbl_jobinfo');
          // set pesan data berhasil dibuat
          redirect('admin/jobinfo');
        }
  }
  public function jobinfoep()
    {
      # code...
        # code...
    /* Jika file upload tidak kosong*/
        /* 4 adalah menyatakan tidak ada file yang diupload*/
        $ididan=$this->input->post('id_job');
        if ($_FILES['file']['error'] <> 4) 
        {

          //identifikasi folder
          $where = array(
            'id_job' => $ididan    
              );
          
            $this->db->select("file, file_type");
            $this->db->where($where);
            $query = $this->db->get('tbl_jobinfo');
            $row2 = $query->row();        

            // menyimpan lokasi gambar dalam variable
            $dir = "assets/upload/jobinfo".$row2->file.$row2->file_type;

             if ($row2) 
                {
                  // Hapus foto
                  unlink($dir);
                }  // Jika data tidak ada
                  else 
                  {
                    $this->session->set_flashdata('message', 'Data tidak ditemukan');
                    redirect(site_url('admin/jobinfo'));
                  }

          $nama = $this->input->post('nama');
          $tanggal = $this->input->post('tanggal');
          $gabungan = $nama.$tanggal;
          $nmfile = judul_seo($gabungan);

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/upload/jobinfo';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['max_width']        = '3000'; //pixels
          $config['max_height']       = '5000'; //pixels
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);
          
          if (!$this->upload->do_upload('file'))
          {   //file gagal diupload -> kembali ke form tambah
            // $this->insert();
            echo "GAGAL COKKK!!!";
          } 
            //file berhasil diupload -> lanjutkan ke query INSERT
            else 
            { 
              $userfile = $this->upload->data();
              $thumbnail                = $config['file_name']; 
              // library yang disediakan codeigniter
              $config['image_library']  = 'gd2'; 
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/upload/jobinfo'.$userfile['file_name'].''; 
              // membuat thumbnail
              $config['create_thumb']   = TRUE;               
              // rasio resolusi
              $config['maintain_ratio'] = FALSE; 
              // lebar
              $config['width']          = 400; 
              // tinggi
              $config['height']         = 200; 

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $where = array(
                'id_job' => $ididan,  
              );

              $data = array(
                  'tanggal'   => $this->input->post('tanggal'),
                  'nama'      => $this->input->post('nama'),
                  'keterangan'=> $this->input->post('keterangan'),
                  'uploader'  => $this->input->post('uploader'),

                  'file'      => $nmfile,
                  'file_type' => $userfile['file_ext'],
                  'file_size' => $userfile['file_size']
              );

              // eksekusi query INSERT
              // $this->m_hki->input_data($data,'hki');
              $this->m_tracer->update_data($where, $data, 'tbl_jobinfo');
              // set pesan data berhasil dibuat

              redirect('admin/jobinfo');
            }
        }else // Jika file upload kosong
        {
          $where = array(
            'id_job' => $ididan,  
          );
          $data = array(
                  'tanggal'   => $this->input->post('tanggal'),
                  'nama'      => $this->input->post('nama'),
                  'keterangan'=> $this->input->post('keterangan'),
                  'uploader'  => $this->input->post('uploader'),

          );

          // eksekusi query INSERT
          // $this->m_hki->input_data($data,'hki');
          $this->m_tracer->update_data($where, $data, 'tbl_jobinfo');
          // set pesan data berhasil dibuat
          redirect('admin/jobinfo');
        }
    }
    public function deletejobinfo($id) 
    {
        $where = array(
        'id_job' => $id    
          );
      
        $this->db->select("file, file_type");
        $this->db->where($where);
        $query = $this->db->get('tbl_jobinfo');
        $row2 = $query->row();        

        // menyimpan lokasi gambar dalam variable
        $dir = "assets/upload/jobinfo".$row2->file.$row2->file_type;

        // Jika data ditemukan, maka hapus foto dan record nya
        if ($row2) 
        {
          // Hapus foto
          unlink($dir);

          $this->m_tracer->delete_data($where,'tbl_jobinfo');
          redirect(base_url().'admin/jobinfo');
        } 
          // Jika data tidak ada
          else 
          {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/jobinfo'));
          }
  
    }
   public function beritaip()
  {
    # code...
    /* Jika file upload tidak kosong*/
        /* 4 adalah menyatakan tidak ada file yang diupload*/
        if ($_FILES['file']['error'] <> 4) 
        {
          $nama = $this->input->post('nama');
          $tanggal = $this->input->post('tanggal');
          $gabungan = $nama.$tanggal;
          $nmfile = judul_seo($gabungan);

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/upload/berita';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['max_width']        = '3000'; //pixels
          $config['max_height']       = '5000'; //pixels
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);
          
          if (!$this->upload->do_upload('file'))
          {   //file gagal diupload -> kembali ke form tambah
            // $this->insert();
            echo "GAGAL COKKK!!!";
          } 
            //file berhasil diupload -> lanjutkan ke query INSERT
            else 
            { 
              $userfile = $this->upload->data();
              $thumbnail                = $config['file_name']; 
              // library yang disediakan codeigniter
              $config['image_library']  = 'gd2'; 
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/upload/berita'.$userfile['file_name'].''; 
              // membuat thumbnail
              $config['create_thumb']   = TRUE;               
              // rasio resolusi
              $config['maintain_ratio'] = FALSE; 
              // lebar
              $config['width']          = 400; 
              // tinggi
              $config['height']         = 200; 

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $data = array(
                  'tanggal'   => $this->input->post('tanggal'),
                  'nama'      => $this->input->post('nama'),
                  'keterangan'=> $this->input->post('keterangan'),
                  'uploader'  => $this->input->post('uploader'),
                  

                  'file'      => $nmfile,
                  'file_type' => $userfile['file_ext'],
                  'file_size' => $userfile['file_size']
              );

              // eksekusi query INSERT
              $this->m_tracer->input_data($data,'tbl_berita');
              // set pesan data berhasil dibuat

              redirect('admin/berita');
            }
        }else // Jika file upload kosong
        {
          $data = array(
                  'tanggal'   => $this->input->post('tanggal'),
                  'nama'      => $this->input->post('nama'),
                  'keterangan'=> $this->input->post('keterangan'),
                  'uploader'  => $this->input->post('uploader'),
          );

          // eksekusi query INSERT
          $this->m_tracer->input_data($data,'tbl_berita');
          // set pesan data berhasil dibuat
          redirect('admin/berita');
        }
  }
  public function beritaep()
    {
      # code...
        # code...
    /* Jika file upload tidak kosong*/
        /* 4 adalah menyatakan tidak ada file yang diupload*/
        $ididan=$this->input->post('id_berita');
        if ($_FILES['file']['error'] <> 4) 
        {

          //identifikasi folder
          $where = array(
            'id_berita' => $ididan    
              );
          
            $this->db->select("file, file_type");
            $this->db->where($where);
            $query = $this->db->get('tbl_berita');
            $row2 = $query->row();        

            // menyimpan lokasi gambar dalam variable
            $dir = "assets/upload/berita".$row2->file.$row2->file_type;

             if ($row2) 
                {
                  // Hapus foto
                  unlink($dir);
                }  // Jika data tidak ada
                  else 
                  {
                    $this->session->set_flashdata('message', 'Data tidak ditemukan');
                    redirect(site_url('admin/berita'));
                  }

          $nama = $this->input->post('nama');
          $tanggal = $this->input->post('tanggal');
          $gabungan = $nama.$tanggal;
          $nmfile = judul_seo($gabungan);

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/upload/berita';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['max_width']        = '3000'; //pixels
          $config['max_height']       = '5000'; //pixels
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);
          
          if (!$this->upload->do_upload('file'))
          {   //file gagal diupload -> kembali ke form tambah
            // $this->insert();
            echo "GAGAL COKKK!!!";
          } 
            //file berhasil diupload -> lanjutkan ke query INSERT
            else 
            { 
              $userfile = $this->upload->data();
              $thumbnail                = $config['file_name']; 
              // library yang disediakan codeigniter
              $config['image_library']  = 'gd2'; 
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/upload/berita'.$userfile['file_name'].''; 
              // membuat thumbnail
              $config['create_thumb']   = TRUE;               
              // rasio resolusi
              $config['maintain_ratio'] = FALSE; 
              // lebar
              $config['width']          = 400; 
              // tinggi
              $config['height']         = 200; 

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $where = array(
                'id_berita' => $ididan,  
              );

              $data = array(
                  'tanggal'   => $this->input->post('tanggal'),
                  'nama'      => $this->input->post('nama'),
                  'keterangan'=> $this->input->post('keterangan'),
                  'uploader'  => $this->input->post('uploader'),

                  'file'      => $nmfile,
                  'file_type' => $userfile['file_ext'],
                  'file_size' => $userfile['file_size']
              );

              // eksekusi query INSERT
              // $this->m_hki->input_data($data,'hki');
              $this->m_tracer->update_data($where, $data, 'tbl_berita');
              // set pesan data berhasil dibuat

              redirect('admin/berita');
            }
        }else // Jika file upload kosong
        {
          $where = array(
            'id_berita' => $ididan,  
          );
          $data = array(
                  'tanggal'   => $this->input->post('tanggal'),
                  'nama'      => $this->input->post('nama'),
                  'keterangan'=> $this->input->post('keterangan'),
                  'uploader'  => $this->input->post('uploader'),

          );

          // eksekusi query INSERT
          // $this->m_hki->input_data($data,'hki');
          $this->m_tracer->update_data($where, $data, 'tbl_berita');
          // set pesan data berhasil dibuat
          redirect('admin/berita');
        }
    }
    public function deleteberita($id) 
    {
        $where = array(
        'id_berita' => $id    
          );
      
        $this->db->select("file, file_type");
        $this->db->where($where);
        $query = $this->db->get('tbl_berita');
        $row2 = $query->row();        

        // menyimpan lokasi gambar dalam variable
        $dir = "assets/upload/berita".$row2->file.$row2->file_type;

        // Jika data ditemukan, maka hapus foto dan record nya
        if ($row2) 
        {
          // Hapus foto
          unlink($dir);

          $this->m_tracer->delete_data($where,'tbl_berita');
          redirect(base_url().'admin/berita');
        } 
          // Jika data tidak ada
          else 
          {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('admin/berita'));
          }
  
    }
	public function test()
	{
		# code...
	$prodi = $this->input->post('prodi');
	$tanggal_lulus = $this->input->post('tahun_lulus');
	//convert date
    // $dateconvert = $tanggal_lulus->format("Y");

    $where = array(
				'tmst_mahasiswa.Kode_program_studi' => $prodi );
				// 'tmst_mahasiswa.Tanggal_lulus' => $tanggal_lulus
    $data['tracer'] = $this->m_tracer->get_join_where_prodi($where)->result();

	
		$this->load->view('admin/test',$data);
	
	}
	public function exportp(){
    // Load plugin PHPExcel nya
    ob_start();
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
				    // $excel->getProperties()->setCreator('My Notes Code')
				    //              ->setLastModifiedBy('My Notes Code')
				    //              ->setTitle("Data Siswa")
				    //              ->setSubject("Siswa")
				    //              ->setDescription("Laporan Semua Data Siswa")
				    //              ->setKeywords("Data Siswa");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
				    // $style_col = array(
				    //   'font' => array('bold' => true), // Set font nya jadi bold
				    //   'alignment' => array(
				    //     'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				    //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				    //   ),
				    //   'borders' => array(
				    //     'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				    //     'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				    //     'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				    //     'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				    //   )
				    // );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
				    // $style_row = array(
				    //   'alignment' => array(
				    //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				    //   ),
				    //   'borders' => array(
				    //     'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				    //     'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				    //     'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				    //     'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				    //   )
				    // );
				    // $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
				    // $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
				    // $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
				    // $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
				    // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 1
				    $excel->setActiveSheetIndex(0)->setCellValue('A1', "kdptimsmh"); // Set kolom A3 dengan tulisan "NO"
				    $excel->setActiveSheetIndex(0)->setCellValue('B1', "kdpstmsmh"); // Set kolom B3 dengan tulisan "NIS"
				    $excel->setActiveSheetIndex(0)->setCellValue('C1', "nimhsmsmh"); // Set kolom C3 dengan tulisan "NAMA"
				    $excel->setActiveSheetIndex(0)->setCellValue('D1', "nmmhsmsmh"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
				    $excel->setActiveSheetIndex(0)->setCellValue('E1', "telpomsmh");
				    $excel->setActiveSheetIndex(0)->setCellValue('F1', "emailmsmh");
				    $excel->setActiveSheetIndex(0)->setCellValue('G1', "tahun_lulus");
				    $excel->setActiveSheetIndex(0)->setCellValue('H1', "f21");
				    $excel->setActiveSheetIndex(0)->setCellValue('I1', "f22");
				    $excel->setActiveSheetIndex(0)->setCellValue('J1', "f23");
				    $excel->setActiveSheetIndex(0)->setCellValue('K1', "f24");
				    $excel->setActiveSheetIndex(0)->setCellValue('L1', "f25");
				    $excel->setActiveSheetIndex(0)->setCellValue('M1', "f26");
				    $excel->setActiveSheetIndex(0)->setCellValue('N1', "f27");
				    $excel->setActiveSheetIndex(0)->setCellValue('O1', "f301");
				    $excel->setActiveSheetIndex(0)->setCellValue('P1', "f302");
				    $excel->setActiveSheetIndex(0)->setCellValue('Q1', "f303");
				    $excel->setActiveSheetIndex(0)->setCellValue('R1', "f401");
				    $excel->setActiveSheetIndex(0)->setCellValue('S1', "f402");
				    $excel->setActiveSheetIndex(0)->setCellValue('T1', "f403");
				    $excel->setActiveSheetIndex(0)->setCellValue('U1', "f404");
				    $excel->setActiveSheetIndex(0)->setCellValue('V1', "f405");
				    $excel->setActiveSheetIndex(0)->setCellValue('W1', "f406");
				    $excel->setActiveSheetIndex(0)->setCellValue('X1', "f407");
				    $excel->setActiveSheetIndex(0)->setCellValue('Y1', "f408");
				    $excel->setActiveSheetIndex(0)->setCellValue('Z1', "f409");
				    $excel->setActiveSheetIndex(0)->setCellValue('AA1', "f410");
				    $excel->setActiveSheetIndex(0)->setCellValue('AB1', "f411");
				    $excel->setActiveSheetIndex(0)->setCellValue('AC1', "f412");
				    $excel->setActiveSheetIndex(0)->setCellValue('AD1', "f413");
				    $excel->setActiveSheetIndex(0)->setCellValue('AE1', "f414");
				    $excel->setActiveSheetIndex(0)->setCellValue('AF1', "f415");
				    $excel->setActiveSheetIndex(0)->setCellValue('AG1', "f416");
				    $excel->setActiveSheetIndex(0)->setCellValue('AH1', "f6");
				    $excel->setActiveSheetIndex(0)->setCellValue('AI1', "f501");
				    $excel->setActiveSheetIndex(0)->setCellValue('AJ1', "f502");
				    $excel->setActiveSheetIndex(0)->setCellValue('AK1', "f503");
				    $excel->setActiveSheetIndex(0)->setCellValue('AL1', "f7");
				    $excel->setActiveSheetIndex(0)->setCellValue('AM1', "f7a");
				    $excel->setActiveSheetIndex(0)->setCellValue('AN1', "f8");
				    $excel->setActiveSheetIndex(0)->setCellValue('AO1', "f901");
				    $excel->setActiveSheetIndex(0)->setCellValue('AP1', "f902");
				    $excel->setActiveSheetIndex(0)->setCellValue('AQ1', "f903");
				    $excel->setActiveSheetIndex(0)->setCellValue('AR1', "f904");
				    $excel->setActiveSheetIndex(0)->setCellValue('AS1', "f905");
				    $excel->setActiveSheetIndex(0)->setCellValue('AT1', "f906");
				    $excel->setActiveSheetIndex(0)->setCellValue('AU1', "f1001");
				    $excel->setActiveSheetIndex(0)->setCellValue('AV1', "f1002");
				    $excel->setActiveSheetIndex(0)->setCellValue('AW1', "f1101");
				    $excel->setActiveSheetIndex(0)->setCellValue('AX1', "f1102");
				    $excel->setActiveSheetIndex(0)->setCellValue('AY1', "f1201");
				    $excel->setActiveSheetIndex(0)->setCellValue('AZ1', "f1202");
				    $excel->setActiveSheetIndex(0)->setCellValue('BA1', "f1301");
				    $excel->setActiveSheetIndex(0)->setCellValue('BB1', "f1302");
				    $excel->setActiveSheetIndex(0)->setCellValue('BC1', "f1303");
				    $excel->setActiveSheetIndex(0)->setCellValue('BD1', "f14");
				    $excel->setActiveSheetIndex(0)->setCellValue('BE1', "f15");
				    $excel->setActiveSheetIndex(0)->setCellValue('BF1', "f1601");
				    $excel->setActiveSheetIndex(0)->setCellValue('BG1', "f1602");
				    $excel->setActiveSheetIndex(0)->setCellValue('BH1', "f1603");
				    $excel->setActiveSheetIndex(0)->setCellValue('BI1', "f1604");
				    $excel->setActiveSheetIndex(0)->setCellValue('BJ1', "f1605");
				    $excel->setActiveSheetIndex(0)->setCellValue('BK1', "f1606");
				    $excel->setActiveSheetIndex(0)->setCellValue('BL1', "f1607");
				    $excel->setActiveSheetIndex(0)->setCellValue('BM1', "f1608");
				    $excel->setActiveSheetIndex(0)->setCellValue('BN1', "f1609");
				    $excel->setActiveSheetIndex(0)->setCellValue('BO1', "f1610");
				    $excel->setActiveSheetIndex(0)->setCellValue('BP1', "f1611");
				    $excel->setActiveSheetIndex(0)->setCellValue('BQ1', "f1612");
				    $excel->setActiveSheetIndex(0)->setCellValue('BR1', "f1613");
				    $excel->setActiveSheetIndex(0)->setCellValue('BS1', "f1614");
				    $excel->setActiveSheetIndex(0)->setCellValue('BT1', "f1701");
				    $excel->setActiveSheetIndex(0)->setCellValue('BU1', "f1702b");
				    $excel->setActiveSheetIndex(0)->setCellValue('BV1', "f1703");
				    $excel->setActiveSheetIndex(0)->setCellValue('BW1', "f1704b");
				    $excel->setActiveSheetIndex(0)->setCellValue('BX1', "f1705");
				    $excel->setActiveSheetIndex(0)->setCellValue('BY1', "f1705a");
				    $excel->setActiveSheetIndex(0)->setCellValue('BZ1', "f1706");
				    $excel->setActiveSheetIndex(0)->setCellValue('CA1', "f1706ba");
				    $excel->setActiveSheetIndex(0)->setCellValue('CB1', "f1707");
				    $excel->setActiveSheetIndex(0)->setCellValue('CC1', "f1708b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CD1', "f1709");
				    $excel->setActiveSheetIndex(0)->setCellValue('CE1', "f1710b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CF1', "f1711");
				    $excel->setActiveSheetIndex(0)->setCellValue('CG1', "f1711a");
				    $excel->setActiveSheetIndex(0)->setCellValue('CH1', "f1712b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CI1', "f1712a");
				    $excel->setActiveSheetIndex(0)->setCellValue('CJ1', "f1713");
				    $excel->setActiveSheetIndex(0)->setCellValue('CK1', "f1714b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CL1', "f1715");
				    $excel->setActiveSheetIndex(0)->setCellValue('CM1', "f1716b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CN1', "f1717");
				    $excel->setActiveSheetIndex(0)->setCellValue('CO1', "f1718b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CP1', "f1719");
				    $excel->setActiveSheetIndex(0)->setCellValue('CQ1', "f1720b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CR1', "f1721");
				    $excel->setActiveSheetIndex(0)->setCellValue('CS1', "f1722b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CT1', "f1723");
				    $excel->setActiveSheetIndex(0)->setCellValue('CU1', "f1724b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CV1', "f1725");
				    $excel->setActiveSheetIndex(0)->setCellValue('CW1', "f1726b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CX1', "f1727");
				    $excel->setActiveSheetIndex(0)->setCellValue('CY1', "f1728b");
				    $excel->setActiveSheetIndex(0)->setCellValue('CZ1', "f1729");
				    $excel->setActiveSheetIndex(0)->setCellValue('DA1', "f1730b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DB1', "f1731");
				    $excel->setActiveSheetIndex(0)->setCellValue('DC1', "f1732b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DD1', "f1733");
				    $excel->setActiveSheetIndex(0)->setCellValue('DE1', "f1734b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DF1', "f1735");
				    $excel->setActiveSheetIndex(0)->setCellValue('DG1', "f1736b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DH1', "f1737");
				    $excel->setActiveSheetIndex(0)->setCellValue('DI1', "f1737a");
				    $excel->setActiveSheetIndex(0)->setCellValue('DJ1', "f1738");
				    $excel->setActiveSheetIndex(0)->setCellValue('DK1', "f1738ba");
				    $excel->setActiveSheetIndex(0)->setCellValue('DL1', "f1739");
				    $excel->setActiveSheetIndex(0)->setCellValue('DM1', "f1740b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DN1', "f1741");
				    $excel->setActiveSheetIndex(0)->setCellValue('DO1', "f1742b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DP1', "f1743");
				    $excel->setActiveSheetIndex(0)->setCellValue('DQ1', "f1744b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DR1', "f1745");
				    $excel->setActiveSheetIndex(0)->setCellValue('DS1', "f1746b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DT1', "f1747");
				    $excel->setActiveSheetIndex(0)->setCellValue('DU1', "f1748b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DV1', "f1749");
				    $excel->setActiveSheetIndex(0)->setCellValue('DW1', "f1750b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DX1', "f1751");
				    $excel->setActiveSheetIndex(0)->setCellValue('DY1', "f1752b");
				    $excel->setActiveSheetIndex(0)->setCellValue('DZ1', "f1753");
				    $excel->setActiveSheetIndex(0)->setCellValue('EA1', "f1754b");
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
				    // $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
				    // $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
				    // $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
				    // $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
				    // $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $prodi = $this->input->post('prodi');
	   $tanggal_lulus = $this->input->post('tahun_lulus');

    $where = array(
				'tbl_datadiri2021.kdpstmsmh' => $prodi,
				'tbl_datadiri2021.tahun_lulus' => $tanggal_lulus );
				// 'tmst_mahasiswa.Tanggal_lulus' => $tanggal_lulus
    $siswa = $this->m_tracer->get_join_where_prodi_2021($where)->result();
    // $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 1
    $kodept = "061056";
    // $excel->setActiveSheetIndex(0)->setCellValue('A1', 'bayu');
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa 
    	//DATA DIRI
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $kodept);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kdpstmsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nimhsmsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nmmhsmsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->telpomsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->emailmsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tahun_lulus);

      
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->nik);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->npwp);
      //MULAI MASUKKAN DATA KUESIONER DISINI
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->f8);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->f504);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->f502);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->f505);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->f506);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->f5a1);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->f5a2);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->f1101);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->f1102);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->f5b);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->f5c);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->f5d);
      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->f18a);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->f18b);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->f18c);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->f18d);
      $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->f1201);
      $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->f1202);
      $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->f14);
      $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->f15);
      $excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->f1761);
      $excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->f1762);
      $excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data->f1763);
      $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->f1764);
      $excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->f1765);
      $excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->f1766);
      $excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->f1767);
      $excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->f1768);
      $excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->f1769);
      $excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data->f1770);
      $excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->f1771);
      $excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->f1772);
      $excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->f1773);
      $excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->f1774);
      $excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data->f21);
      $excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->f22);
      $excel->setActiveSheetIndex(0)->setCellValue('AT'.$numrow, $data->f23);
      $excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->f24);
      $excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, $data->f25);
      $excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data->f26);
      $excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data->f27);
      $excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data->f301);
      $excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data->f302);
      $excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->f303);
      $excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->f401);
      $excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->f1402);
      $excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, $data->f403);
      $excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->f404);
      $excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->f405);
      $excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->f406);
      $excel->setActiveSheetIndex(0)->setCellValue('BH'.$numrow, $data->f407);
      $excel->setActiveSheetIndex(0)->setCellValue('BI'.$numrow, $data->f408);
      $excel->setActiveSheetIndex(0)->setCellValue('BJ'.$numrow, $data->f409);
      $excel->setActiveSheetIndex(0)->setCellValue('BK'.$numrow, $data->f410);
      $excel->setActiveSheetIndex(0)->setCellValue('BL'.$numrow, $data->f411);
      $excel->setActiveSheetIndex(0)->setCellValue('BM'.$numrow, $data->f412);
      $excel->setActiveSheetIndex(0)->setCellValue('BN'.$numrow, $data->f413);
      $excel->setActiveSheetIndex(0)->setCellValue('BO'.$numrow, $data->f414);
      $excel->setActiveSheetIndex(0)->setCellValue('BP'.$numrow, $data->f415);
      $excel->setActiveSheetIndex(0)->setCellValue('BQ'.$numrow, $data->f416);
      $excel->setActiveSheetIndex(0)->setCellValue('BR'.$numrow, $data->f6);
      $excel->setActiveSheetIndex(0)->setCellValue('BS'.$numrow, $data->f7);
      $excel->setActiveSheetIndex(0)->setCellValue('BT'.$numrow, $data->f7a);
      $excel->setActiveSheetIndex(0)->setCellValue('BU'.$numrow, $data->f1001);
      $excel->setActiveSheetIndex(0)->setCellValue('BV'.$numrow, $data->f1002);
      $excel->setActiveSheetIndex(0)->setCellValue('BW'.$numrow, $data->f1601);
      $excel->setActiveSheetIndex(0)->setCellValue('BX'.$numrow, $data->f1602);
      $excel->setActiveSheetIndex(0)->setCellValue('BY'.$numrow, $data->f1603);
      $excel->setActiveSheetIndex(0)->setCellValue('BZ'.$numrow, $data->f1604);
      $excel->setActiveSheetIndex(0)->setCellValue('CA'.$numrow, $data->f1605);
      $excel->setActiveSheetIndex(0)->setCellValue('CB'.$numrow, $data->f1606);
      $excel->setActiveSheetIndex(0)->setCellValue('CC'.$numrow, $data->f1607);
      $excel->setActiveSheetIndex(0)->setCellValue('CD'.$numrow, $data->f1608);
      $excel->setActiveSheetIndex(0)->setCellValue('CE'.$numrow, $data->f1609);
      $excel->setActiveSheetIndex(0)->setCellValue('CF'.$numrow, $data->f1610);
      $excel->setActiveSheetIndex(0)->setCellValue('CG'.$numrow, $data->f1611);
      $excel->setActiveSheetIndex(0)->setCellValue('CH'.$numrow, $data->f1612);
      $excel->setActiveSheetIndex(0)->setCellValue('CI'.$numrow, $data->f1613);
      $excel->setActiveSheetIndex(0)->setCellValue('CJ'.$numrow, $data->f1614);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			      // $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			      // $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			      // $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			      // $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			      // $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      
      // $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
			    // $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
			    // $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
			    // $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
			    // $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
			    // $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Export Tracer");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    
    // Redirect output to a client’s web browser (Excel5)
        // header('Content-Type: application/vnd.ms-excel');
        // header('Content-Disposition: attachment;filename="Data Tracer "'.$tanggal_lulus.'".xlsx"');
        // header('Cache-Control: max-age=0');
        // $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        // $writer->save('php://output');
    //old
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean();
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="Data Tracer "'.$tanggal_lulus.'".xlsx"'); // Set nama file excel nya
        // header('Cache-Control: max-age=0');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Data Tracer "'.$tanggal_lulus.'".xlsx"');
        $write->save('php://output');
  }

  public function exportp2021(){
    // Load plugin PHPExcel nya
    ob_start();
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
            // $excel->getProperties()->setCreator('My Notes Code')
            //              ->setLastModifiedBy('My Notes Code')
            //              ->setTitle("Data Siswa")
            //              ->setSubject("Siswa")
            //              ->setDescription("Laporan Semua Data Siswa")
            //              ->setKeywords("Data Siswa");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            // $style_col = array(
            //   'font' => array('bold' => true), // Set font nya jadi bold
            //   'alignment' => array(
            //     'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            //   ),
            //   'borders' => array(
            //     'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            //     'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            //     'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            //     'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            //   )
            // );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            // $style_row = array(
            //   'alignment' => array(
            //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            //   ),
            //   'borders' => array(
            //     'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            //     'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            //     'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            //     'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            //   )
            // );
            // $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
            // $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
            // $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            // $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 1
            $excel->setActiveSheetIndex(0)->setCellValue('A1', "kdptimsmh"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('B1', "kdpstmsmh"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('C1', "nimhsmsmh"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('D1', "nmmhsmsmh"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('E1', "telpomsmh");
            $excel->setActiveSheetIndex(0)->setCellValue('F1', "emailmsmh");
            $excel->setActiveSheetIndex(0)->setCellValue('G1', "tahun_lulus");
            $excel->setActiveSheetIndex(0)->setCellValue('H1', "nik");
            $excel->setActiveSheetIndex(0)->setCellValue('I1', "npwp");
            $excel->setActiveSheetIndex(0)->setCellValue('J1', "f8");
            $excel->setActiveSheetIndex(0)->setCellValue('K1', "f504");
            $excel->setActiveSheetIndex(0)->setCellValue('L1', "f502");
            $excel->setActiveSheetIndex(0)->setCellValue('M1', "f505");
            $excel->setActiveSheetIndex(0)->setCellValue('N1', "f506");
            $excel->setActiveSheetIndex(0)->setCellValue('O1', "f5a1");
            $excel->setActiveSheetIndex(0)->setCellValue('P1', "f5a2");
            $excel->setActiveSheetIndex(0)->setCellValue('Q1', "f1101");
            $excel->setActiveSheetIndex(0)->setCellValue('R1', "f1102");
            $excel->setActiveSheetIndex(0)->setCellValue('S1', "f5b");
            $excel->setActiveSheetIndex(0)->setCellValue('T1', "f5c");
            $excel->setActiveSheetIndex(0)->setCellValue('U1', "f5d");
            $excel->setActiveSheetIndex(0)->setCellValue('V1', "f18a");
            $excel->setActiveSheetIndex(0)->setCellValue('W1', "f18b");
            $excel->setActiveSheetIndex(0)->setCellValue('X1', "f18c");
            $excel->setActiveSheetIndex(0)->setCellValue('Y1', "f18d");
            $excel->setActiveSheetIndex(0)->setCellValue('Z1', "f1201");
            $excel->setActiveSheetIndex(0)->setCellValue('AA1', "f1202");
            $excel->setActiveSheetIndex(0)->setCellValue('AB1', "f14");
            $excel->setActiveSheetIndex(0)->setCellValue('AC1', "f15");
            $excel->setActiveSheetIndex(0)->setCellValue('AD1', "f1761");
            $excel->setActiveSheetIndex(0)->setCellValue('AE1', "f1762");
            $excel->setActiveSheetIndex(0)->setCellValue('AF1', "f1763");
            $excel->setActiveSheetIndex(0)->setCellValue('AG1', "f1764");
            $excel->setActiveSheetIndex(0)->setCellValue('AH1', "f1765");
            $excel->setActiveSheetIndex(0)->setCellValue('AI1', "f1766");
            $excel->setActiveSheetIndex(0)->setCellValue('AJ1', "f1767");
            $excel->setActiveSheetIndex(0)->setCellValue('AK1', "f1768");
            $excel->setActiveSheetIndex(0)->setCellValue('AL1', "f1769");
            $excel->setActiveSheetIndex(0)->setCellValue('AM1', "f1770");
            $excel->setActiveSheetIndex(0)->setCellValue('AN1', "f1771");
            $excel->setActiveSheetIndex(0)->setCellValue('AO1', "f1772");
            $excel->setActiveSheetIndex(0)->setCellValue('AP1', "f1773");
            $excel->setActiveSheetIndex(0)->setCellValue('AQ1', "f1774");
            $excel->setActiveSheetIndex(0)->setCellValue('AR1', "f21");
            $excel->setActiveSheetIndex(0)->setCellValue('AS1', "f22");
            $excel->setActiveSheetIndex(0)->setCellValue('AT1', "f23");
            $excel->setActiveSheetIndex(0)->setCellValue('AU1', "f24");
            $excel->setActiveSheetIndex(0)->setCellValue('AV1', "f25");
            $excel->setActiveSheetIndex(0)->setCellValue('AW1', "f26");
            $excel->setActiveSheetIndex(0)->setCellValue('AX1', "f27");
            $excel->setActiveSheetIndex(0)->setCellValue('AY1', "f301");
            $excel->setActiveSheetIndex(0)->setCellValue('AZ1', "f302");
            $excel->setActiveSheetIndex(0)->setCellValue('BA1', "f303");
            $excel->setActiveSheetIndex(0)->setCellValue('BB1', "f401");
            $excel->setActiveSheetIndex(0)->setCellValue('BC1', "f402");
            $excel->setActiveSheetIndex(0)->setCellValue('BD1', "f403");
            $excel->setActiveSheetIndex(0)->setCellValue('BE1', "f404");
            $excel->setActiveSheetIndex(0)->setCellValue('BF1', "f405");
            $excel->setActiveSheetIndex(0)->setCellValue('BG1', "f406");
            $excel->setActiveSheetIndex(0)->setCellValue('BH1', "f407");
            $excel->setActiveSheetIndex(0)->setCellValue('BI1', "f408");
            $excel->setActiveSheetIndex(0)->setCellValue('BJ1', "f409");
            $excel->setActiveSheetIndex(0)->setCellValue('BK1', "f410");
            $excel->setActiveSheetIndex(0)->setCellValue('BL1', "f411");
            $excel->setActiveSheetIndex(0)->setCellValue('BM1', "f412");
            $excel->setActiveSheetIndex(0)->setCellValue('BN1', "f413");
            $excel->setActiveSheetIndex(0)->setCellValue('BO1', "f414");
            $excel->setActiveSheetIndex(0)->setCellValue('BP1', "f415");
            $excel->setActiveSheetIndex(0)->setCellValue('BQ1', "f416");
            $excel->setActiveSheetIndex(0)->setCellValue('BR1', "f6");
            $excel->setActiveSheetIndex(0)->setCellValue('BS1', "f7");
            $excel->setActiveSheetIndex(0)->setCellValue('BT1', "f7a");
            $excel->setActiveSheetIndex(0)->setCellValue('BU1', "f1001");
            $excel->setActiveSheetIndex(0)->setCellValue('BV1', "f1002");
            $excel->setActiveSheetIndex(0)->setCellValue('BW1', "f1601");
            $excel->setActiveSheetIndex(0)->setCellValue('BX1', "f1602");
            $excel->setActiveSheetIndex(0)->setCellValue('BY1', "f1603");
            $excel->setActiveSheetIndex(0)->setCellValue('BZ1', "f1604");
            $excel->setActiveSheetIndex(0)->setCellValue('CA1', "f1605");
            $excel->setActiveSheetIndex(0)->setCellValue('CB1', "f1606");
            $excel->setActiveSheetIndex(0)->setCellValue('CC1', "f1607");
            $excel->setActiveSheetIndex(0)->setCellValue('CD1', "f1608");
            $excel->setActiveSheetIndex(0)->setCellValue('CE1', "f1609");
            $excel->setActiveSheetIndex(0)->setCellValue('CF1', "f1610");
            $excel->setActiveSheetIndex(0)->setCellValue('CG1', "f1611");
            $excel->setActiveSheetIndex(0)->setCellValue('CH1', "f1612");
            $excel->setActiveSheetIndex(0)->setCellValue('CI1', "f1613");
            $excel->setActiveSheetIndex(0)->setCellValue('CJ1', "f1614");
            
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            // $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            // $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            // $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            // $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            // $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $prodi = $this->input->post('prodi');
     $tanggal_lulus = $this->input->post('tahun_lulus');

    $where = array(
        'tbl_datadiri2021.kdpstmsmh' => $prodi,
        'tbl_datadiri2021.tahun_lulus' => $tanggal_lulus );
        // 'tmst_mahasiswa.Tanggal_lulus' => $tanggal_lulus
    $siswa = $this->m_tracer->get_join_where_prodi_2021($where)->result();
    // $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 1
    $kodept = "061056";
    // $excel->setActiveSheetIndex(0)->setCellValue('A1', 'bayu');
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa 
      //DATA DIRI
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->kdptimsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kdpstmsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nimhsmsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nmmhsmsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->telpomsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->emailmsmh);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tahun_lulus);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->nik);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->npwp);

      //MULAI MASUKKAN DATA KUESIONER DISINI
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->f8);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->f504);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->f502);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->f505);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->f506);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->f5a1);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->f5a2);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->f1101);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->f1102);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->f5b);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->f5c);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->f5d);
      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->f18a);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->f18b);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->f18c);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->f18d);
      $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->f1201);
      $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->f1202);
      $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->f14);
      $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->f15);
      $excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->f1761);
      $excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->f1762);
      $excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data->f1763);
      $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->f1764);
      $excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->f1765);
      $excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->f1766);
      $excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->f1767);
      $excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->f1768);
      $excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->f1769);
      $excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data->f1770);
      $excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->f1771);
      $excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->f1772);
      $excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->f1773);
      $excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->f1774);
      $excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data->f21);
      $excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->f22);
      $excel->setActiveSheetIndex(0)->setCellValue('AT'.$numrow, $data->f23);
      $excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->f24);
      $excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, $data->f25);
      $excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data->f26);
      $excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data->f27);
      $excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data->f301);
      $excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data->f302);
      $excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->f303);
      $excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->f401);
      $excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->f402);
      $excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, $data->f403);
      $excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->f404);
      $excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->f405);
      $excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->f406);
      $excel->setActiveSheetIndex(0)->setCellValue('BH'.$numrow, $data->f407);
      $excel->setActiveSheetIndex(0)->setCellValue('BI'.$numrow, $data->f408);
      $excel->setActiveSheetIndex(0)->setCellValue('BJ'.$numrow, $data->f409);
      $excel->setActiveSheetIndex(0)->setCellValue('BK'.$numrow, $data->f410);
      $excel->setActiveSheetIndex(0)->setCellValue('BL'.$numrow, $data->f411);
      $excel->setActiveSheetIndex(0)->setCellValue('BM'.$numrow, $data->f412);
      $excel->setActiveSheetIndex(0)->setCellValue('BN'.$numrow, $data->f413);
      $excel->setActiveSheetIndex(0)->setCellValue('BO'.$numrow, $data->f414);
      $excel->setActiveSheetIndex(0)->setCellValue('BP'.$numrow, $data->f415);
      $excel->setActiveSheetIndex(0)->setCellValue('BQ'.$numrow, $data->f416);
      $excel->setActiveSheetIndex(0)->setCellValue('BR'.$numrow, $data->f6);
      $excel->setActiveSheetIndex(0)->setCellValue('BS'.$numrow, $data->f7);
      $excel->setActiveSheetIndex(0)->setCellValue('BT'.$numrow, $data->f7a);
      $excel->setActiveSheetIndex(0)->setCellValue('BU'.$numrow, $data->f1001);
      $excel->setActiveSheetIndex(0)->setCellValue('BV'.$numrow, $data->f1002);
      $excel->setActiveSheetIndex(0)->setCellValue('BW'.$numrow, $data->f1601);
      $excel->setActiveSheetIndex(0)->setCellValue('BX'.$numrow, $data->f1602);
      $excel->setActiveSheetIndex(0)->setCellValue('BY'.$numrow, $data->f1603);
      $excel->setActiveSheetIndex(0)->setCellValue('BZ'.$numrow, $data->f1604);
      $excel->setActiveSheetIndex(0)->setCellValue('CA'.$numrow, $data->f1605);
      $excel->setActiveSheetIndex(0)->setCellValue('CB'.$numrow, $data->f1606);
      $excel->setActiveSheetIndex(0)->setCellValue('CC'.$numrow, $data->f1607);
      $excel->setActiveSheetIndex(0)->setCellValue('CD'.$numrow, $data->f1608);
      $excel->setActiveSheetIndex(0)->setCellValue('CE'.$numrow, $data->f1609);
      $excel->setActiveSheetIndex(0)->setCellValue('CF'.$numrow, $data->f1610);
      $excel->setActiveSheetIndex(0)->setCellValue('CG'.$numrow, $data->f1611);
      $excel->setActiveSheetIndex(0)->setCellValue('CH'.$numrow, $data->f1612);
      $excel->setActiveSheetIndex(0)->setCellValue('CI'.$numrow, $data->f1613);
      $excel->setActiveSheetIndex(0)->setCellValue('CJ'.$numrow, $data->f1614);
    
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            // $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            // $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            // $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            // $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            // $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      
      // $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
          // $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
          // $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
          // $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
          // $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
          // $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Export Tracer");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    
    // Redirect output to a client’s web browser (Excel5)
        // header('Content-Type: application/vnd.ms-excel');
        // header('Content-Disposition: attachment;filename="Data Tracer "'.$tanggal_lulus.'".xlsx"');
        // header('Cache-Control: max-age=0');
        // $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        // $writer->save('php://output');
    //old
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean();
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="Data Tracer "'.$tanggal_lulus.'".xlsx"'); // Set nama file excel nya
        // header('Cache-Control: max-age=0');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Data Tracer "'.$tanggal_lulus.'".xlsx"');
        $write->save('php://output');
  }

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */