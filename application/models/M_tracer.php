<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tracer extends CI_Model {

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function get_data($where,$table){		
	return $this->db->get_where($table,$where);
	}
	function get_data_all($table){
		return $this->db->get($table);
	}
	function get_data_list($table, $limit, $start){
        $query = $this->db->get($table, $limit, $start);
        return $query;
    }
    function get_data_last($table, $limit){
        $query = $this->db->get($table, $limit);
        return $query;
    }
    function get_kabkota($id){
        $hasil=$this->db->query("SELECT * FROM tbl_kabkota WHERE id_induk_wil='$id'");
        return $hasil->result();
    }
	function get_data_join_where($where){
		$this->db->select('tbl_datadiri.Nim,
tbl_datadiri.bekerja,
tbl_datadiri.perusahaan,
tbl_datadiri.jabatan,
tbl_datadiri.jeda,
tbl_datadiri.domisili,
tbl_datadiri.waktu_daftar,
tbl_datadiri.`password`,
tbl_datadiri.email AS datadiri_email,
tbl_datadiri.thn_lulus AS `datadiri_thn_lulus`,
tbl_datadiri.no_telp AS `datadiri_no_telp`,
tmst_mahasiswa.Kode_perguruan_tinggi,
tmst_mahasiswa.Kode_program_studi,
tmst_mahasiswa.NIM,
tmst_mahasiswa.Kode_jenjang_pendidikan,
tmst_mahasiswa.Nama_mahasiswa,
tmst_mahasiswa.Kelas,
tmst_mahasiswa.Tempat_lahir,
tmst_mahasiswa.Tanggal_lahir,
tmst_mahasiswa.Jenis_kelamin,
tmst_mahasiswa.Alamat,
tmst_mahasiswa.Alamat_kost,
tmst_mahasiswa.Kelurahan,
tmst_mahasiswa.Kode_kecamatan,
tmst_mahasiswa.Kode_kota,
tmst_mahasiswa.Kode_provinsi,
tmst_mahasiswa.Kode_pos,
tmst_mahasiswa.Kode_negara,
tmst_mahasiswa.Status_mahasiswa,
tmst_mahasiswa.Tahun_masuk,
tmst_mahasiswa.Batas_studi,
tmst_mahasiswa.Tanggal_masuk,
tmst_mahasiswa.Tanggal_lulus,
tmst_mahasiswa.IPK_akhir,
tmst_mahasiswa.Nomor_SK_yudisium,
tmst_mahasiswa.Tanggal_SK_yudisium,
tmst_mahasiswa.Nomor_seri_ijazah,
tmst_mahasiswa.Kode_prov_asal_pendidikan,
tmst_mahasiswa.Status_awal_mahasiswa,
tmst_mahasiswa.SKS_diakui,
tmst_mahasiswa.Kode_perguruan_tinggi_asal,
tmst_mahasiswa.Kode_program_studi_asal,
tmst_mahasiswa.Kode_beasiswa,
tmst_mahasiswa.Kode_jenjang_pendidikan_sblm,
tmst_mahasiswa.NIM_asal,
tmst_mahasiswa.Kode_biaya_studi,
tmst_mahasiswa.Kode_pekerjaan,
tmst_mahasiswa.Nama_tempat_bekerja,
tmst_mahasiswa.Kode_PT_bekerja,
tmst_mahasiswa.Kode_PS_bekerja,
tmst_mahasiswa.NIDN_Promotor,
tmst_mahasiswa.NIDN_Kopromotor1,
tmst_mahasiswa.NIDN_Kopromotor2,
tmst_mahasiswa.NIDN_Kopromotor3,
tmst_mahasiswa.NIDN_Kopromotor4,
tmst_mahasiswa.Jalur_skripsi,
tmst_mahasiswa.Judul_skripsi,
tmst_mahasiswa.Bulan_awal_bimbingan,
tmst_mahasiswa.Bulan_akhir_bimbingan,
tmst_mahasiswa.NISN,
tmst_mahasiswa.Kode_kategori_penghasilan,
tmst_mahasiswa.ID_log_audit,
tmst_mahasiswa.SHIFTMSMHS,
tmst_mahasiswa.SMAWLMSMHS,
tmst_mahasiswa.bapak,
tmst_mahasiswa.ibu,
tmst_mahasiswa.alamat_ortu,
tmst_mahasiswa.hp_ortu,
tmst_mahasiswa.telp_ortu,
tmst_mahasiswa.jenis_sma,
tmst_mahasiswa.asal_sekolah,
tmst_mahasiswa.jurusan_sekolah,
tmst_mahasiswa.alamat_sekolah,
tmst_mahasiswa.tahun_lulus_sma,
tmst_mahasiswa.no_ijasah_sma,
tmst_mahasiswa.agama_mahasiswa,
tmst_mahasiswa.tinggi_badan,
tmst_mahasiswa.berat_badan,
tmst_mahasiswa.hp_mahasiswa,
tmst_mahasiswa.dosen_wali,
tmst_mahasiswa.validasi_krs,
tmst_mahasiswa.nik,
tmst_mahasiswa.rt,
tmst_mahasiswa.rw,
tmst_mahasiswa.pindahan
		');
		$this->db->from('tbl_datadiri');
		$this->db->join('tmst_mahasiswa','tbl_datadiri2021.Nim = tmst_mahasiswa.NIM','inner');
		$this->db->where($where);
		// $this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;	
	}	
	function get_join_where_prodi($where)
	{
		# code...
		$this->db->select('tbl_datadiri.Nim AS datadiri_nim,
tbl_datadiri.bekerja AS datadiri_bekerja,
tbl_datadiri.perusahaan AS datadiri_perusahaan,
tbl_datadiri.jabatan AS datadiri_jabatan,
tbl_datadiri.jeda AS datadiri_jeda,
tbl_datadiri.domisili AS datadiri_domisili,
tbl_datadiri.waktu_daftar AS datadiri_waktu_daftar,
tbl_datadiri.password AS datadiri_password,
tbl_datadiri.email AS datadiri_email,
tbl_datadiri.thn_lulus AS datadiri_thn_lulus,
tbl_datadiri.no_telp AS datadiri_no_telp,
tbl_f1016.id_f1016 AS id_f1016,
tbl_f1016.f1001 AS f1001,
tbl_f1016.f1001 AS f1002,
tbl_f1016.f1101 AS f1101,
tbl_f1016.f1102 AS f1102,
tbl_f1016.f1201 AS f1201,
tbl_f1016.f1202 AS f1202,
tbl_f1016.f1301 AS f1301,
tbl_f1016.f1302 AS f1302,
tbl_f1016.f1303 AS f1303,
tbl_f1016.f14 AS f14,
tbl_f1016.f15 AS f15,
tbl_f1016.f1601 AS f1601,
tbl_f1016.f1602 AS f1602,
tbl_f1016.f1603 AS f1603,
tbl_f1016.f1604 AS f1604,
tbl_f1016.f1605 AS f1605,
tbl_f1016.f1606 AS f1606,
tbl_f1016.f1607 AS f1607,
tbl_f1016.f1608 AS f1608,
tbl_f1016.f1609 AS f1609,
tbl_f1016.f1610 AS f1610,
tbl_f1016.f1611 AS f1611,
tbl_f1016.f1612 AS f1612,
tbl_f1016.f1613 AS f1613,
tbl_f1016.f1614 AS f1614,
tbl_f17_1.id_f17_1 AS id_f17_1,
tbl_f17_1.f1701 AS f1701,
tbl_f17_1.f1702b AS f1702b,
tbl_f17_1.f1703 AS f1703,
tbl_f17_1.f1704b AS f1704b,
tbl_f17_1.f1705 AS f1705,
tbl_f17_1.f1705a AS f1705a,
tbl_f17_1.f1706 AS f1706,
tbl_f17_1.f1706ba AS f1706ba,
tbl_f17_1.f1707 AS f1707,
tbl_f17_1.f1708b AS f1708b,
tbl_f17_1.f1709 AS f1709,
tbl_f17_1.f1710b AS f1710b,
tbl_f17_1.f1711 AS f1711,
tbl_f17_1.f1711a AS f1711a,
tbl_f17_1.f1712b AS f1712b,
tbl_f17_1.f1712a AS f1712a,
tbl_f17_1.f1713 AS f1713,
tbl_f17_1.f1714b AS f1714b,
tbl_f17_1.f1715 AS f1715,
tbl_f17_1.f1716b AS f1716b,
tbl_f17_1.f1717 AS f1717,
tbl_f17_1.f1718b AS f1718b,
tbl_f17_1.f1719 AS f1719,
tbl_f17_1.f1720b AS f1720b,
tbl_f17_1.f1721 AS f1721,
tbl_f17_1.f1722b AS f1722b,
tbl_f17_1.f1723 AS f1723,
tbl_f17_1.f1724b AS f1724b,
tbl_f17_1.f1725 AS f1725,
tbl_f17_1.f1726b AS f1726b,
tbl_f17_2.id_f17_2 AS id_f17_2,
tbl_f17_2.f1727 AS f1727,
tbl_f17_2.f1728b AS f1728b,
tbl_f17_2.f1729 AS f1729,
tbl_f17_2.f1730b AS f1730b,
tbl_f17_2.f1731 AS f1731,
tbl_f17_2.f1732b AS f1732b,
tbl_f17_2.f1733 AS f1733,
tbl_f17_2.f1734b AS f1734b,
tbl_f17_2.f1735 AS f1735,
tbl_f17_2.f1736b AS f1736b,
tbl_f17_2.f1737 AS f1737,
tbl_f17_2.f1737a AS f1737a,
tbl_f17_2.f1738 AS f1738,
tbl_f17_2.f1738ba AS f1738ba,
tbl_f17_2.f1739 AS f1739,
tbl_f17_2.f1740b AS f1740b,
tbl_f17_2.f1741 AS f1741,
tbl_f17_2.f1742b AS f1742b,
tbl_f17_2.f1743 AS f1743,
tbl_f17_2.f1744b AS f1744b,
tbl_f17_2.f1745 AS f1745,
tbl_f17_2.f1746b AS f1746b,
tbl_f17_2.f1747 AS f1747,
tbl_f17_2.f1748b AS f1748b,
tbl_f17_2.f1749 AS f1749,
tbl_f17_2.f1750b AS f1750b,
tbl_f17_2.f1751 AS f1751,
tbl_f17_2.f1752b AS f1752b,
tbl_f17_2.f1753 AS f1753,
tbl_f17_2.f1754b AS f1754b,
tbl_f23.id_f23 AS id_f23,
tbl_f23.f21 AS f21,
tbl_f23.f22 AS f22,
tbl_f23.f23 AS f23,
tbl_f23.f24 AS f24,
tbl_f23.f25 AS f25,
tbl_f23.f26 AS f26,
tbl_f23.f27 AS f27,
tbl_f23.f301 AS f301,
tbl_f23.f301 AS f302,
tbl_f23.f301 AS f303,
tbl_f4.f401 AS f401,
tbl_f4.f402 AS f402,
tbl_f4.f403 AS f403,
tbl_f4.f404 AS f404,
tbl_f4.f405 AS f405,
tbl_f4.f406 AS f406,
tbl_f4.f407 AS f407,
tbl_f4.f408 AS f408,
tbl_f4.f409 AS f409,
tbl_f4.f410 AS f410,
tbl_f4.f411 AS f411,
tbl_f4.f412 AS f412,
tbl_f4.f413 AS f413,
tbl_f4.f414 AS f414,
tbl_f4.f415 AS f415,
tbl_f4.f416 AS f416,
tbl_f4.id_f4 AS id_f4,
tbl_f69.id_f69 AS id_f69,
tbl_f69.f6 AS f6,
tbl_f69.f501 AS f501,
tbl_f69.f502 AS f502,
tbl_f69.f503 AS f503,
tbl_f69.f7 AS f7,
tbl_f69.f7a AS f7a,
tbl_f69.f8 AS f8,
tbl_f69.f901 AS f901,
tbl_f69.f902 AS f902,
tbl_f69.f903 AS f903,
tbl_f69.f904 AS f904,
tbl_f69.f905 AS f905,
tbl_f69.f906 AS f906,
tmst_mahasiswa.Kode_perguruan_tinggi AS mahasiswa_Kode_perguruan_tinggi,
tmst_mahasiswa.Kode_program_studi AS mahasiswa_Kode_progam_studi,
tmst_mahasiswa.NIM AS mahasiswa_NIM,
tmst_mahasiswa.Kode_jenjang_pendidikan AS mahasiswa_Kode_jenjang_pendidikan,
tmst_mahasiswa.Nama_mahasiswa AS mahasiswa_Nama_mahasiswa,
tmst_mahasiswa.Kelas AS mahasiswa_kelas,
tmst_mahasiswa.Tempat_lahir AS mahasiswa_Tempat_lahir,
tmst_mahasiswa.Tanggal_lahir AS mahasiswa_Tanggal_lahir,
tmst_mahasiswa.Jenis_kelamin AS mahasiswa_Jenis_kelamin,
tmst_mahasiswa.Alamat AS mahasiswa_Alamat,
tmst_mahasiswa.Alamat_kost AS mahasiswa_Alamat_kost,
tmst_mahasiswa.Kelurahan AS mahasiswa_Kelurahan,
tmst_mahasiswa.Kode_kecamatan AS mahasiswa_Kode_kecamatan,
tmst_mahasiswa.Kode_kota AS mahasiswa_Kode_kota,
tmst_mahasiswa.Kode_provinsi AS mahasiswa_Kode_provinsi,
tmst_mahasiswa.Kode_pos AS mahasiswa_Kode_pos,
tmst_mahasiswa.Kode_negara AS mahasiswa_Kode_negara,
tmst_mahasiswa.Status_mahasiswa AS mahasiswa_Status_mahasiswa,
tmst_mahasiswa.Tahun_masuk AS mahasiswa_Tahun_masuk,
tmst_mahasiswa.Batas_studi AS mahasiswa_Batas_studi,
tmst_mahasiswa.Tanggal_masuk AS mahasiswa_Tanggal_masuk,
tmst_mahasiswa.Tanggal_lulus AS mahasiswa_Tanggal_lulus,
tmst_mahasiswa.IPK_akhir AS mahasiswa_IPK_akhir,
tmst_mahasiswa.Nomor_SK_yudisium AS mahasiswa_Nomor_SK_yudisium,
tmst_mahasiswa.Tanggal_SK_yudisium AS mahasiswa_Tanggal_SK_yudisium,
tmst_mahasiswa.Nomor_seri_ijazah AS mahasiswa_Nomor_seri_ijazah,
tmst_mahasiswa.Kode_prov_asal_pendidikan AS mahasiswa_Kode_prov_asal_pendidikan,
tmst_mahasiswa.Status_awal_mahasiswa AS mahasiswa_Status_awal_mahasiswa,
tmst_mahasiswa.SKS_diakui AS mahasiswa_SKS_diakui,
tmst_mahasiswa.Kode_perguruan_tinggi_asal AS mahasiswa_Kode_perguruan_tinggi_asal,
tmst_mahasiswa.Kode_program_studi_asal AS mahasiswa_Kode_program_studi_asal,
tmst_mahasiswa.Kode_beasiswa AS mahasiswa_Kode_beasiswa,
tmst_mahasiswa.Kode_jenjang_pendidikan_sblm AS mahasiswa_Kode_jenjang_pendidikan_sblm,
tmst_mahasiswa.NIM_asal AS mahasiswa_NIM_asal,
tmst_mahasiswa.Kode_biaya_studi AS mahasiswa_Kode_biaya_studi,
tmst_mahasiswa.Kode_pekerjaan AS mahasiswa_Kode_pekerjaan,
tmst_mahasiswa.Nama_tempat_bekerja AS mahasiswa_Nama_tempat_kerja,
tmst_mahasiswa.Kode_PT_bekerja AS mahasiswa_Kode_PT_bekerja,
tmst_mahasiswa.Kode_PS_bekerja AS mahasiswa_Kode_PS_bekerja,
tmst_mahasiswa.NIDN_Promotor AS mahasiswa_NIDN_promotor,
tmst_mahasiswa.NIDN_Kopromotor1 AS mahasiswa_NIDN_Kopromotor_1,
tmst_mahasiswa.NIDN_Kopromotor2 AS mahasiswa_NIDN_Kopromotor_2,
tmst_mahasiswa.NIDN_Kopromotor3 AS mahasiswa_NIDN_Kopromotor_3,
tmst_mahasiswa.NIDN_Kopromotor4 AS mahasiswa_NIDN_Kopromotor_4,
tmst_mahasiswa.Jalur_skripsi AS mahasiswa_Jalur_skripsi,
tmst_mahasiswa.Judul_skripsi AS mahasiswa_Judul_skripsi,
tmst_mahasiswa.Bulan_awal_bimbingan AS mahasiswa_Bulan_awal_bimbingan,
tmst_mahasiswa.Bulan_akhir_bimbingan AS mahasiswa_Bulan_akhir_bimbingan,
tmst_mahasiswa.NISN AS mahasiswa_NISN,
tmst_mahasiswa.Kode_kategori_penghasilan AS mahasiswa_Kode_kategori_penghasilan,
tmst_mahasiswa.ID_log_audit AS mahasiswa_ID_log_audit,
tmst_mahasiswa.SHIFTMSMHS AS mahasiswa_SHIFTMSMHS,
tmst_mahasiswa.SMAWLMSMHS AS mahasiswa_SMAWLMSMHS,
tmst_mahasiswa.ibu AS mahasiswa_ibu,
tmst_mahasiswa.bapak AS mahasiswa_bapak,
tmst_mahasiswa.alamat_ortu AS mahasiswa_alamat_ortu,
tmst_mahasiswa.hp_ortu AS mahasiswa_hp_ortu,
tmst_mahasiswa.jenis_sma AS mahasiswa_jenis_sma,
tmst_mahasiswa.asal_sekolah AS mahasiswa_asal_sekolah,
tmst_mahasiswa.jurusan_sekolah AS mahasiswa_jurusan_sekolah,
tmst_mahasiswa.alamat_sekolah AS mahasiswa_alamat_sekolah,
tmst_mahasiswa.tahun_lulus_sma AS mahasiswa_tahun_lulus_sma,
tmst_mahasiswa.telp_ortu AS mahasiswa_telp_ortu,
tmst_mahasiswa.no_ijasah_sma AS mahasiswa_no_ijasah_sma,
tmst_mahasiswa.agama_mahasiswa AS mahasiswa_agama_mahasiswa,
tmst_mahasiswa.tinggi_badan AS mahasiswa_tinggi_badan,
tmst_mahasiswa.berat_badan AS mahasiswa_berat_badan,
tmst_mahasiswa.hp_mahasiswa AS mahasiswa_hp_mahasiswa,
tmst_mahasiswa.dosen_wali AS mahasiswa_dosen_wali,
tmst_mahasiswa.validasi_krs AS mahasiswa_validasi_krs,
tmst_mahasiswa.nik AS mahasiswa_nik,
tmst_mahasiswa.rt AS mahasiswa_rt,
tmst_mahasiswa.rw AS mahasiswa_rw,
tmst_mahasiswa.pindahan AS mahasiswa_pindahan,
tmst_program_studi.Kode_program_studi AS Kode_program_studi,
tmst_program_studi.Kode_perguruan_tinggi AS Kode_program_tinggi,
tmst_program_studi.Kode_fakultas AS Kode_fakultas,
tmst_program_studi.Nama_program_studi AS Nama_program_studi,
tmst_program_studi.Kode_jenjang_pendidikan AS Kode_jenjang_pendidikan,
tmst_program_studi.Alamat AS Alamat,
tmst_program_studi.Kode_kota AS Kode_kota,
tmst_program_studi.Kode_provinsi AS Kode_provinsi,
tmst_program_studi.Kode_negara AS Kode_negara,
tmst_program_studi.Kode_pos AS Kode_pos,
tmst_program_studi.Tanggal_berdiri AS Tanggal_berdiri,
tmst_program_studi.Email AS Email,
tmst_program_studi.Bidang_ilmu AS Bidang_ilmu,
tmst_program_studi.SKS_lulus AS SKS_ilmu,
tmst_program_studi.Status_program_studi AS Status_program_studi,
tmst_program_studi.No_SK_DIKTI AS No_SK_DIKTI,
tmst_program_studi.Tgl_SK_DIKTI AS Tgl_SK_DIKTI,
tmst_program_studi.Tgl_akhir_SK_DIKTI AS Tgl_akhir_SK_DIKTI,
tmst_program_studi.Mulai_semester AS Mulai_semester,
tmst_program_studi.NIDN AS NIDN,
tmst_program_studi.HP AS HP,
tmst_program_studi.Telepon_kantor AS Telepon_kantor,
tmst_program_studi.Fax AS Fax,
tmst_program_studi.Nama_operator AS Nama_operator,
tmst_program_studi.hp_operator AS hp_operator,
tmst_program_studi.Frekuensi_kurikulum AS Frekuensi_kurikulum,
tmst_program_studi.Pelaksanaan_kurikulum AS Pelaksanaan_kurikulum,
tmst_program_studi.Kode_akreditasi AS Kode_akreditasi,
tmst_program_studi.No_SK_BAN AS No_SK_BAN,
tmst_program_studi.Tanggal_SK_BAN AS Tanggal_SK_BAN,
tmst_program_studi.Tanggal_akhir_SK_BAN AS Tanggal_akhir_SK_BAN,
tmst_program_studi.Kapasitas_mahasiswa AS Kapasitas_mahasiswa,
tmst_program_studi.Visi AS Visi,
tmst_program_studi.Misi AS Misi,
tmst_program_studi.Tujuan AS Tujuan,
tmst_program_studi.Sasaran AS Sasaran,
tmst_program_studi.Upaya_penyebaran AS Upaya_pembayaran,
tmst_program_studi.Keberlanjutan AS Keberlanjutan,
tmst_program_studi.Himpunan_alumni AS Himpunan_alumni,
tmst_program_studi.Tgl_mulai_efektif AS Tgl_mulai_efektif,
tmst_program_studi.Tgl_akhir_efektif AS Tgl_akhir_efektif,
tmst_program_studi.Status_validasi AS Status_validasi,
tmst_program_studi.ID_log_audit AS ID_log_audit
		');
		$this->db->from('tbl_datadiri');
		$this->db->join('tbl_f1016','tbl_datadiri.Nim = tbl_f1016.nim','inner');
		$this->db->join('tbl_f17_1','tbl_datadiri.Nim = tbl_f17_1.nim','inner');
		$this->db->join('tbl_f17_2','tbl_datadiri.Nim = tbl_f17_2.nim','inner');
		$this->db->join('tbl_f23','tbl_datadiri.Nim = tbl_f23.nim','inner');
		$this->db->join('tbl_f4','tbl_datadiri.Nim = tbl_f4.nim','inner');
		$this->db->join('tbl_f69','tbl_datadiri.Nim = tbl_f69.nim','inner');
		$this->db->join('tmst_mahasiswa','tbl_datadiri.Nim = tmst_mahasiswa.NIM','inner');
		$this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->where($where);
		// $this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;	

	}
	function get_data_join_where2021($where){
		$this->db->select('tbl_datadiri2021.kdptimsmh,
tbl_datadiri2021.kdpstmsmh,
tbl_datadiri2021.nimhsmsmh,
tbl_datadiri2021.nmmhsmsmh,
tbl_datadiri2021.telpomsmh,
tbl_datadiri2021.emailmsmh,
tbl_datadiri2021.tahun_lulus,
tbl_datadiri2021.nik,
tbl_datadiri2021.npwp,
tbl_datadiri2021.nama_perusahaan,
tbl_datadiri2021.jabatan,
tbl_datadiri2021.jeda,
tbl_datadiri2021.domisili,
tbl_datadiri2021.`password`,
tmst_mahasiswa.Nama_mahasiswa,
tmst_mahasiswa.Kode_program_studi,
tmst_mahasiswa.Kode_perguruan_tinggi,
tmst_mahasiswa.Jenis_kelamin,
tmst_mahasiswa.Tanggal_lulus,
tmst_mahasiswa.hp_mahasiswa,
tbl_datadiri2021.bekerja');
		$this->db->from('tbl_datadiri2021');
		$this->db->join('tmst_mahasiswa','tbl_datadiri2021.nimhsmsmh = tmst_mahasiswa.NIM','inner');
		$this->db->where($where);
		// $this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;	
	}
	function get_join_where_prodi_2021($where)
	{
		# code...
		$this->db->select('tbl_datadiri2021.kdptimsmh AS kdptimsmh,
tbl_datadiri2021.kdpstmsmh AS kdpstmsmh,
tbl_datadiri2021.nimhsmsmh AS nimhsmsmh,
tbl_datadiri2021.nmmhsmsmh AS nmmhsmsmh,
tbl_datadiri2021.telpomsmh AS telpomsmh,
tbl_datadiri2021.emailmsmh AS emailmsmh,
tbl_datadiri2021.tahun_lulus AS tahun_lulus,
tbl_datadiri2021.nik AS nik,
tbl_datadiri2021.npwp AS npwp,
tbl_datadiri2021.nama_perusahaan AS nama_perusahaan,
tbl_datadiri2021.jabatan AS jabatan,
tbl_datadiri2021.jeda AS jeda,
tbl_datadiri2021.domisili AS domisili,
tbl_datadiri2021.`password` AS `password`,
tbl_datadiri2021.bekerja AS berkerja,
tbl_f_2021.id_f AS id_f,
tbl_f_2021.nimhsmsmh AS nimhsmsmh_2,
tbl_f_2021.f8 AS f8,
tbl_f_2021.f504 AS f504,
tbl_f_2021.f502 AS f502,
tbl_f_2021.f505 AS f505,
tbl_f_2021.f506 AS f506,
tbl_f_2021.f5a1 AS f5a1,
tbl_f_2021.f5a2 AS f5a2,
tbl_f_2021.f1101 AS f1101,
tbl_f_2021.f1102 AS f1102,
tbl_f_2021.f5b AS f5b,
tbl_f_2021.f5c AS f5c,
tbl_f_2021.f5d AS f5d,
tbl_f_2021.f18a AS f18a,
tbl_f_2021.f18b AS f18b,
tbl_f_2021.f18c AS f18c,
tbl_f_2021.f18d AS f18d,
tbl_f_2021.f1201 AS f1201,
tbl_f_2021.f1202 AS f1202,
tbl_f_2021.f14 AS f14,
tbl_f_2021.f15 AS f15,
tbl_f_2021.f1761 AS f1761,
tbl_f_2021.f1762 AS f1762,
tbl_f_2021.f1763 AS f1763,
tbl_f_2021.f1764 AS f1764,
tbl_f_2021.f1765 AS f1765,
tbl_f_2021.f1766 AS f1766,
tbl_f_2021.f1767 AS f1767,
tbl_f_2021.f1768 AS f1768,
tbl_f_2021.f1769 AS f1769,
tbl_f_2021.f1770 AS f1770,
tbl_f_2021.f1771 AS f1771,
tbl_f_2021.f1772 AS f1772,
tbl_f_2021.f1773 AS f1773,
tbl_f_2021.f1774 AS f1774,
tbl_f_2021.f21 AS f21,
tbl_f_2021.f22 AS f22,
tbl_f_2021.f23 AS f23,
tbl_f_2021.f24 AS f24,
tbl_f_2021.f25 AS f25,
tbl_f_2021.f26 AS f26,
tbl_f_2021.f27 AS f27,
tbl_f_2021.f301 AS f301,
tbl_f_2021.f302 AS f302,
tbl_f_2021.f303 AS f303,
tbl_f_2021.f401 AS f401,
tbl_f_2021.f402 AS f402,
tbl_f_2021.f403 AS f403,
tbl_f_2021.f404 AS f404,
tbl_f_2021.f405 AS f405,
tbl_f_2021.f406 AS f406,
tbl_f_2021.f407 AS f407,
tbl_f_2021.f408 AS f408,
tbl_f_2021.f409 AS f409,
tbl_f_2021.f410 AS f410,
tbl_f_2021.f411 AS f411,
tbl_f_2021.f412 AS f412,
tbl_f_2021.f413 AS f413,
tbl_f_2021.f414 AS f414,
tbl_f_2021.f415 AS f415,
tbl_f_2021.f416 AS f416,
tbl_f_2021.f6 AS f6,
tbl_f_2021.f7 AS f7,
tbl_f_2021.f7a AS f7a,
tbl_f_2021.f1001 AS f1001,
tbl_f_2021.f1002 AS f1002,
tbl_f_2021.f1601 AS f1601,
tbl_f_2021.f1602 AS f1602,
tbl_f_2021.f1603 AS f1603,
tbl_f_2021.f1604 AS f1604,
tbl_f_2021.f1605 AS f1605,
tbl_f_2021.f1606 AS f1606,
tbl_f_2021.f1607 AS f1607,
tbl_f_2021.f1608 AS f1608,
tbl_f_2021.f1609 AS f1609,
tbl_f_2021.f1610 AS f1610,
tbl_f_2021.f1611 AS f1611,
tbl_f_2021.f1612 AS f1612,
tbl_f_2021.f1613 AS f1613,
tbl_f_2021.f1614 AS f1614
		');
		$this->db->from('tbl_datadiri2021');
		$this->db->join('tbl_f_2021','tbl_datadiri2021.nimhsmsmh =  tbl_f_2021.nimhsmsmh','inner');
		$this->db->where($where);
		// $this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;	

	}	

	//////////////////////////////////////////////////////////////////////////////////// REPORT //////////////////////////////////////////////////////////////////////
	function get_join_report_count_2022($where,$item)
	{
		# code...
		$this->db->select('COUNT(tbl_f_2021.'.$item.') as jml');
		$this->db->from('tbl_datadiri2021');
		$this->db->join('tbl_f_2021','tbl_datadiri2021.nimhsmsmh =  tbl_f_2021.nimhsmsmh','inner');
		$this->db->where($where);
		// $this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;	

	}	
	function get_join_report_count_wt_avg_2022($where)
	{
		# code...
		$this->db->select('Avg(tbl_f_2021.f502) AS avg_f502,
		Avg(tbl_f_2021.f506) AS avg_f506');
		$this->db->from('tbl_datadiri2021');
		$this->db->join('tbl_f_2021','tbl_datadiri2021.nimhsmsmh =  tbl_f_2021.nimhsmsmh','inner');
		$this->db->where($where);
		// $this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;	

	}	

}

/* End of file m_tracer.php */
/* Location: ./application/models/m_tracer.php */

