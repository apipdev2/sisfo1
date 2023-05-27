<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Siswa_model','siswa');
		is_siswa();
		
	}
	public function index()
	{	
		
		$id = $this->session->userdata('id_siswa');
		$data =[
			'title' => 'Profile Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'siswa'	=> $this->db->get_where('siswa',['id_siswa' => $id])->row(),

			'agama'		=> $this->db->get('tbl_agama')->result(),
			'kebutuhan'	=> $this->db->get('berkebutuhan_khusus')->result(),
			'kebutuhan_ayah'	=> $this->db->get('berkebutuhan_khusus')->result(),
			'kebutuhan_ibu'	=> $this->db->get('berkebutuhan_khusus')->result(),
			'pendidikan_ayah'	=> $this->db->get('tbl_pendidikan')->result(),
			'pendidikan_ibu'	=> $this->db->get('tbl_pendidikan')->result(),
			'pendidikan_wali'	=> $this->db->get('tbl_pendidikan')->result(),
			'pekerjaan'	=> $this->db->get('tbl_pekerjaan')->result(),
			'penghasilan'	=> $this->db->get('tbl_penghasilan')->result(),
			'pekerjaan_ibu'	=> $this->db->get('tbl_pekerjaan')->result(),
			'penghasilan_ibu'	=> $this->db->get('tbl_penghasilan')->result(),
			'pekerjaan_wali'	=> $this->db->get('tbl_pekerjaan')->result(),
			'penghasilan_wali'	=> $this->db->get('tbl_penghasilan')->result(),
			'transportasi'	=> $this->db->get('transportasi')->result(),
			'jenis_kelamin' => ['L','P'],
			'tempat_tinggal' => ['Bersama Orang Tua','Wali','Kos','Asrama','Panti Asuhan'],
			'jarak' => ['Kurang Dari 1 KM', 'Lebih Dari 1 KM'],
			'size_jurusan' => ['M','L','XL','XXL','XXL'],
			'size_olahraga' => ['M','L','XL','XXL','XXL'],
			'jenis_registrasi' => ['Siswa baru', 'Pindahan']
		];

		$this->load->view('infosiswa/template/header',$data);
		$this->load->view('infosiswa/template/navbar',$data);
		$this->load->view('infosiswa/profile/index',$data);
		$this->load->view('infosiswa/template/footer',$data);


		
	}

	public function update($id)
	{
		$id = decrypt_url($id);
		$data =[
				'nik' 			 => $this->input->post('nik'),
				'nama_peserta'   => $this->input->post('nama_peserta'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'nisn' => $this->input->post('nisn'),				
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'no_registrasi_akta_lahir' => $this->input->post('no_registrasi_akta_lahir'),
				'agama' => $this->input->post('agama'),
				'berkebutuhan_khusus' => $this->input->post('berkebutuhan_khusus'),
				'alamat' => $this->input->post('alamat'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
				'desa' => $this->input->post('desa'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kabupaten' => $this->input->post('kabupaten'),
				'provinsi' => $this->input->post('provinsi'),
				'kode_pos' => $this->input->post('kode_pos'),
				'tempat_tinggal' => $this->input->post('tempat_tinggal'),
				'moda_transportasi' => $this->input->post('moda_transportasi'),
				'anak_ke' => $this->input->post('anak_ke'),
				'no_kip' => $this->input->post('no_kip'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nik_ayah' => $this->input->post('nik_ayah'),
				'tempat_lahir_ayah' => $this->input->post('tempat_lahir_ayah'),
				'tanggal_lahir_ayah' => $this->input->post('tanggal_lahir_ayah'),
				'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
				'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
				'penghasilan_bulanan_ayah' => $this->input->post('penghasilan_bulanan_ayah'),
				'berkebutuhan_khusus_ayah' => $this->input->post('berkebutuhan_khusus_ayah'),
				'no_ayah' => $this->input->post('no_ayah'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'nik_ibu' => $this->input->post('nik_ibu'),
				'tempat_lahir_ibu' => $this->input->post('tempat_lahir_ibu'),
				'tanggal_lahir_ibu' => $this->input->post('tanggal_lahir_ibu'),
				'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
				'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
				'penghasilan_bulanan_ibu' => $this->input->post('penghasilan_bulanan_ibu'),
				'berkebutuhan_khusus_ibu' => $this->input->post('berkebutuhan_khusus_ibu'),
				'no_ibu' => $this->input->post('no_ibu'),
				'nama_wali' => $this->input->post('nama_wali'),
				'nik_wali' => $this->input->post('nik_wali'),
				'tempat_lahir_wali' => $this->input->post('tempat_lahir_wali'),
				'pendidikan_wali' => $this->input->post('pendidikan_wali'),
				'pekerjaan_wali' => $this->input->post('pekerjaan_wali'),
				'tanggal_lahir_wali' => $this->input->post('tanggal_lahir_wali'),
				'penghasilan_bulanan_wali' => $this->input->post('penghasilan_bulanan_wali'),
				'no_wali' => $this->input->post('no_wali'),
				'nomor_hp' => $this->input->post('nomor_hp'),
				'email' => $this->input->post('email'),
				'tinggi_badan' => $this->input->post('tinggi_badan'),
				'berat_badan' => $this->input->post('berat_badan'),
				'jarak' => $this->input->post('jarak'),
				'jumlah_saudara_kandung' => $this->input->post('jumlah_saudara_kandung'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'no_kk	' => $this->input->post('no_kk'),
			];		

			$this->db->where('id_siswa',$id);
			$query = $this->db->update('siswa',$data);

			if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terupdate!', 'success');</script>");
	        	redirect('infosiswa/Profile');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terupdate!', 'error');</script>");
	        	redirect('infosiswa/Profile');
			}
	}

	

}

/* End of file Dashboard.php */
/* Location: ./application/modules/infoguru/controllers/Dashboard.php */