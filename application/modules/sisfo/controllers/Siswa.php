<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Siswa_model','siswa');
		$this->load->model('sisfo/Jurusan_model','jurusan');
		is_login();
	}

	public function index()
	{	
		$data = [
			'title' => 'Data Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'siswa' => $this->siswa->getSiswa()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/siswa/index',$data);
		$this->load->view('template/footer');
	}

	public function get_prov()
	{		
			$prov = $this->input->post('provinsi');
            $result = $this->db->like('prov_name', $prov, 'both')->order_by('prov_name', 'ASC')->limit(10)->get('provinces')->result();
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->prov_name;
                echo json_encode($arr_result);
            }
       
	}

	public function tambah()
	{	
		$data =[
			'title' 	=> 'Tambah Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),			
			'jurusan'	=> $this->jurusan->getJurusan()->result(),
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
			'size_jurusan' => ['M','L','XL','XXL','XXL'],
			'size_olahraga' => ['M','L','XL','XXL','XXL'],
			'jenis_registrasi' => ['Siswa baru', 'Pindahan']
		];

		$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[1]|max_length[16]');
		$this->form_validation->set_rules('nisn', 'Nisn', 'required');
		$this->form_validation->set_rules('nama_peserta', 'Nama', 'required');

		if ($this->form_validation->run()== FALSE) {

			$this->load->view('template/header',$data);
			$this->load->view('template/navbar');
			$this->load->view('sisfo/siswa/tambah_siswa',$data);
			$this->load->view('template/footer');
		}else{

			$data =[
				'id_tahun' 		 => $this->session->userdata('id_tahun'),
				'tanggal_daftar' => date('Y-m-d'),
				'jenis_registrasi' => $this->input->post('jenis_registrasi'),
				'nik' 			 => $this->input->post('nik'),
				'nama_peserta'   => $this->input->post('nama_peserta'),
				'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
				'nisn' 			 => $this->input->post('nisn'),				
				'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
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
				'status' =>"Y",
				'id_users' => $this->session->userdata('id_user'),				
				'image' => 'default.jpg',
				'size_jurusan' => $this->input->post('size_jurusan'),
				'size_olahraga' => $this->input->post('size_olahraga'),
			];

			$query = $this->siswa->insertSiswa($data);
			if ($this->input->post('jenis_registrasi') == 'Pindahan') {
				$data =[
		            'id_tahun' => $this->session->userdata('id_tahun'),
		            'tanggal'  => date('Y-m-d'),
		            'nis'      => $this->input->post('nis'),
		            'sekolah_asal' => $this->input->post('asal_sekolah'),
		            'jenis_mutasi' => 'masuk',
		            'ket' => 'Pindahan',
		        ];

		        $this->db->insert('mutasi',$data);
			}

			if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
	        	redirect('sisfo/Siswa');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan!', 'error');</script>");
	        	redirect('sisfo/Siswa');
			}
		}
	}

	public function edit($id)
	{
		$id = decrypt_url($id);
		$data =[
			'title' => 'Edit Siswa',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'siswa'	=> $this->siswa->getSiswaById($id)->row(),
			'jurusan'	=> $this->jurusan->getJurusan()->result(),
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

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/siswa/edit_siswa',$data);
		$this->load->view('template/footer');

	}

	public function update($id)
	{
		$id = decrypt_url($id);
		$data =[
				'jenis_registrasi' => $this->input->post('jenis_registrasi'),
				'nik' 			 => $this->input->post('nik'),
				'nama_peserta'   => $this->input->post('nama_peserta'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'nis' => $this->input->post('nis'),		
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


			$query = $this->siswa->updateSiswa($data,$id);
			if ($query) {
				$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terupdate!', 'success');</script>");
	        	redirect('sisfo/Siswa');
			}else{
				$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terupdate!', 'error');</script>");
	        	redirect('sisfo/Siswa');
			}
	}

	public function hapus($id)
	{
		$id = decrypt_url($id);

		$query = $this->siswa->hapusSiswa($id);
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terhapus!', 'success');</script>");
        	redirect('sisfo/Siswa');
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terhapus', 'error');</script>");
        	redirect('sisfo/Siswa');
		}
	}

	public function import(){
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    
    if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['upload_file']['name']);
        $extension = end($arr_file);
        if('csv' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }elseif('xls' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetData = $spreadsheet->getSheet(0)->toArray();
        unset($sheetData[0]);

        foreach ($sheetData as $row) {      	
        	
        	$data = [
        		'id_tahun' => $this->session->userdata('id_tahun'),
	        	'nis' => $row[1],
	        	'nisn' => $row[2],
	        	'nik' => $row[3],
	        	'no_kk' => $row[4],
	        	'nama_peserta' => $row[5],
	        	'tempat_lahir' => $row[6],
	        	'tanggal_lahir' => $row[7],
	        	'jenis_kelamin' => $row[8],
	        	'asal_sekolah' => $row[9],
	        	'no_registrasi_akta_lahir' => $row[10],
	        	'agama' => $row[11],
	        	'berkebutuhan_khusus' => $row[12],
	        	'alamat' => $row[13],
	        	'rt' => $row[14],
	        	'rw' => $row[15],
	        	'desa' => $row[16],
	        	'kecamatan' => $row[17],
	        	'kabupaten' => $row[18],
	        	'provinsi' => $row[19],
	        	'tempat_tinggal' => $row[20],
	        	'moda_transportasi' => $row[21],
	        	'anak_ke' => $row[22],
	        	'jumlah_saudara_kandung' => $row[23],
	        	'nomor_hp' => $row[24],
	        	'email' => $row[25],
	        	'tinggi_badan' => $row[26],
	        	'berat_badan' => $row[27],
	        	'jarak' => $row[28],
	        	'size_jurusan' => $row[29],
	        	'size_olahraga' => $row[30],
	        	'nama_ayah' => $row[31],
	        	'nik_ayah' => $row[32],
	        	'tempat_lahir_ayah' => $row[33],
	        	'tanggal_lahir_ayah' => $row[34],
	        	'pendidikan_ayah' => $row[35],
	        	'pekerjaan_ayah' => $row[36],
	        	'penghasilan_bulanan_ayah' => $row[37],
	        	'berkebutuhan_khusus_ayah' => $row[38],
	        	'no_ayah' => $row[39],
	        	'nik_ibu' => $row[40],
	        	'nama_ibu' => $row[41],
	        	'tempat_lahir_ibu' => $row[42],
	        	'tanggal_lahir_ibu' => $row[43],
	        	'pendidikan_ibu' => $row[44],
	        	'pekerjaan_ibu' => $row[45],
	        	'penghasilan_bulanan_ibu' => $row[46],
	        	'berkebutuhan_khusus_ibu' => $row[47],
	        	'no_ibu' => $row[48],
	        	'nama_wali' => $row[49],
	        	'nik_wali' => $row[50],
	        	'tempat_lahir_wali' => $row[51],
	        	'tanggal_lahir_wali' => $row[52],
        		'penghasilan_bulanan_wali' => $row[53],
        		'penghasilan_bulanan_wali' => $row[53],
        		'no_wali' => $row[54],
        	];

        	$cek = $this->db->get_where('siswa',[
        		'nis' => $row[1],
	       // 	'nik' => $row[3],
        	])->num_rows();

        	if ($cek > 0) {
        		$this->session->set_flashdata('message', "<script>swal('Alert!', 'Data Sudah ada!', 'error');</script>");
        	}else{
        		$this->db->insert('siswa',$data);
        		$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Import !', 'success');</script>");
        	}

        }
    		redirect('sisfo/Siswa');
        
		
		

      }
	}

}

/* End of file Siswa.php */
/* Location: ./application/modules/sisfo/controllers/Siswa.php */