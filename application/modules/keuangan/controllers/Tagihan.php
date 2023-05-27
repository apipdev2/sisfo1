<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Tagihan extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');

		$this->load->model('sisfo/Siswa_model','siswa');

		$this->load->model('sisfo/Jurusan_model','jurusan');

		$this->load->model('keuangan/Pembayaran_model','pembayaran');

		$this->load->helper('bulan');



		is_tu();

	}



	public function ajax_getKelas($tingkat){



		$kelas = $this->riwayatkelas->getKelas($tingkat)->result();

		echo json_encode($kelas);

	}



	public function ajax_getTunggakanByIdkelas($id_kelas)

	{

		$data = $this->db->select('*')

						 ->from('tbl_tagihan tgh')

						 ->join('jenis_pembayaran jp','jp.id_jenis = tgh.id_jenis')

						 ->join('siswa s', 's.nis = tgh.nis')

						 ->join('riwayatkelas rs','rs.nis = s.nis')

						 ->join('tbl_kelas kls','kls.id_kelas = tgh.id_kelas')

						 ->where('tgh.id_kelas',$id_kelas)						 

						 ->where('tgh.id_tahun',$this->session->userdata('id_tahun'))

						 ->group_by('tgh.nis')

						 ->get()->result();



		echo json_encode($data);

	}



	public function index()

	{

		$data= [

			'title' => 'Tagihan Pembayaran',

			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),

			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),

			'tingkat' => $this->riwayatkelas->getTingkat()->result(),

			'tagihan' => $this->db->get_where('tbl_tagihan',['id_tahun'=> $this->session->userdata('id_tahun')])->result(),

		];



		$this->load->view('keuangan/template/header',$data);

		$this->load->view('keuangan/template/navbar',$data);

		$this->load->view('keuangan/tagihan/index',$data);

		$this->load->view('keuangan/template/footer');

	}



	public function detail($nis)

	{

		$data = [

			'title' => 'Detail Tunggakan',

			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),

			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),

			'siswa' => $this->db->select('*')

							->from('siswa s')

						   	->join('riwayatkelas rs','rs.nis = s.nis')

						   	->join('tbl_kelas kls','kls.id_kelas = rs.id_kelas')

						   	->where('rs.nis',$nis)

						   	->where('rs.id_tahun', $this->session->userdata('id_tahun'))

						   	->get()->row(),



			'pembayaran' =>  $this->db->select('*')

						 ->from('tbl_tagihan tgh')

						 ->join('jenis_pembayaran jp','jp.id_jenis = tgh.id_jenis')

						 ->join('siswa s', 's.nis = tgh.nis')

						 ->join('riwayatkelas rs','rs.nis = s.nis')

						 ->join('tbl_kelas kls','kls.id_kelas = tgh.id_kelas')	 

						 ->where('tgh.nis',$nis)

						 ->where('tgh.id_tahun',$this->session->userdata('id_tahun'))

						 ->get()->result(),

				];



		$this->load->view('keuangan/template/header',$data);

		$this->load->view('keuangan/template/navbar',$data);

		$this->load->view('keuangan/tagihan/detail',$data);

		$this->load->view('keuangan/template/footer');



		// echo json_encode($data);



	}



	public function cetak($nis)

	{

		$nis = decrypt_url($nis);

		$data = [

			'title' => 'Cetak Data Tunggakan',

			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),

			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),

			'siswa' => $this->db->select('*')

							->from('siswa s')

						   	->join('riwayatkelas rs','rs.nis = s.nis')

						   	->join('tbl_kelas kls','kls.id_kelas = rs.id_kelas')

						   	->where('rs.nis',$nis)

						   	->where('rs.id_tahun', $this->session->userdata('id_tahun'))

						   	->get()->row(),



			'pembayaran' =>  $this->db->select('*')

						 ->from('tbl_tagihan tgh')

						 ->join('jenis_pembayaran jp','jp.id_jenis = tgh.id_jenis')

						 ->join('siswa s', 's.nis = tgh.nis')
						 ->join('riwayatkelas rs','rs.nis = s.nis')

						 ->join('tbl_kelas kls','kls.id_kelas = tgh.id_kelas')	 

						 ->where('tgh.nis',$nis)

						 ->where('tgh.id_tahun',$this->session->userdata('id_tahun'))

						 ->get()->result(),

				];

		$this->load->library('Pdf');

	    $this->pdf->setFileName = "Cetak Data Tunggakan.pdf";

	    $this->pdf->setPaper('A4', 'Portrait');

	    $this->pdf->loadView('keuangan/Tagihan/print', $data);



	    // $this->load->view('keuangan/Tagihan/print', $data);



		// echo json_encode($data);



	}





	public function create_tagihan()

	{

		$data= [

			'title' => 'Setting Tagihan',

			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),

			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),

			'tingkat' => $this->riwayatkelas->getTingkat()->result(),

			'kategori' => $this->pembayaran->get_kategori()->result(),

			'jenis' => $this->pembayaran->get_jenis()->result(),

		];



		$this->load->view('keuangan/template/header',$data);

		$this->load->view('keuangan/template/navbar',$data);

		$this->load->view('keuangan/tagihan/create_tagihan',$data);

		$this->load->view('keuangan/template/footer');

	}



	public function create_tagihan_persiswa()

	{

		$data= [

			'title' => 'Setting Tagihan',

			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),

			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),

			'tingkat' => $this->riwayatkelas->getTingkat()->result(),

			'siswa' => $this->riwayatkelas->getSiswa()->result(),

			'kategori' => $this->pembayaran->get_kategori()->result(),

			'jenis' => $this->pembayaran->get_jenis()->result(),

		];



		$this->load->view('keuangan/template/header',$data);

		$this->load->view('keuangan/template/navbar',$data);

		$this->load->view('keuangan/tagihan/create_tagihan_persiswa',$data);

		$this->load->view('keuangan/template/footer');

	}



	public function get_bulan1(){

		



		$this->load->view('keuangan/tagihan/form_bulan1');

	}



	public function get_bulan2(){

		



		$this->load->view('keuangan/tagihan/form_bulan2');

	}



	



	public function add_tagihan()

	{	

		$id_tahun = $this->session->userdata('id_tahun');

		$kategori = $this->input->post('kategori');

		$tingkat = $this->input->post('tingkat');

		$bulan = $this->input->post('bulan');



		$siswa = $this->db->select('s.nis, s.nama_peserta, tk.tingkat,tk.id_kelas,tk.kelas')

						  ->from('riwayatkelas as rk')

						  ->join('tbl_kelas as tk','tk.id_kelas = rk.id_kelas')

						  ->join('siswa as s','s.nis = rk.nis')

						  ->where('tk.tingkat',$tingkat)

						  ->get()->result();



		foreach ($siswa as $siswa) {



			if ($kategori ==="SPP") {

				

				for ($i=0; $i < count($bulan) ; $i++) { 

			

				$data[$i] = [

					'id_tahun' => $id_tahun,

					'kategori' => $kategori,

					'id_jenis' => $this->input->post('id_jenis'),

					'nis' => $siswa->nis,

					'id_kelas' => $siswa->id_kelas,

					'bulan' => $bulan[$i],

					'status_tagihan' => 'Y',

					'ket' => 'BL',

					'id_user' => $this->session->userdata('id_user'),

					'created_at' => date('Y-m-d')

				];



				$cek_spp = $this->db->get_where('tbl_tagihan',[

						'id_tahun' => $id_tahun,

						'kategori' => $kategori,

						'id_jenis' => $this->input->post('id_jenis'),

						'nis' => $siswa->nis,

						'id_kelas' => $siswa->id_kelas,

						'bulan' => $bulan[$i]

					])->num_rows();



					if ($cek_spp < 1) {					

						$query = $this->db->insert('tbl_tagihan',$data[$i]);

					}			

				

				}

			}else{



				$cek_lainnya = $this->db->get_where('tbl_tagihan',[

						'id_tahun' => $id_tahun,

						'kategori' => $kategori,

						'id_jenis' => $this->input->post('id_jenis'),

						'nis' => $siswa->nis,

						'id_kelas' => $siswa->id_kelas,

					])->num_rows();



				$data = [

					'id_tahun' => $id_tahun,

					'kategori' => $kategori,

					'id_jenis' => $this->input->post('id_jenis'),

					'nis' => $siswa->nis,

					'id_kelas' => $siswa->id_kelas,

					'status_tagihan' => 'Y',

					'ket' => 'BL',

					'id_user' => $this->session->userdata('id_user'),

					'created_at' => date('Y-m-d')

				];



				if ($cek_lainnya < 1) {					

						$query = $this->db->insert('tbl_tagihan',$data);

					}
				

			}
			

		}



		if ($query) {

			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Tagihan Berhasil Buat!', 'success');</script>");

        	redirect('keuangan/Tagihan');

		}else{

			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Tagihan Gagal Buat / Duplicate Data!', 'error');</script>");

        	redirect('keuangan/Tagihan');

		}



		

	}



	public function add_tagihan_persiswa()

	{	

		$id_tahun = $this->session->userdata('id_tahun');

		$kategori = $this->input->post('kategori');

		$nis = $this->input->post('nis');

		$bulan = $this->input->post('bulan');



		$siswa = $this->db->select('s.nis, s.nama_peserta, tk.tingkat,tk.id_kelas,tk.kelas')

						  ->from('riwayatkelas as rk')

						  ->join('tbl_kelas as tk','tk.id_kelas = rk.id_kelas')

						  ->join('siswa as s','s.nis = rk.nis')

						  ->where('s.nis',$nis)

						  ->get()->row();



		if ($kategori ==="SPP") {

				

				for ($i=0; $i < count($bulan) ; $i++) { 

			

				$data[$i] = [

					'id_tahun' => $id_tahun,

					'kategori' => $kategori,

					'id_jenis' => $this->input->post('id_jenis'),

					'nis' => $siswa->nis,

					'id_kelas' => $siswa->id_kelas,

					'bulan' => $bulan[$i],

					'status_tagihan' => 'Y',

					'ket' => 'BL',

					'id_user' => $this->session->userdata('id_user'),

					'created_at' => date('Y-m-d')

				];



				$cek_spp = $this->db->get_where('tbl_tagihan',[

						'id_tahun' => $id_tahun,

						'kategori' => $kategori,

						'id_jenis' => $this->input->post('id_jenis'),

						'nis' => $siswa->nis,

						'id_kelas' => $siswa->id_kelas,

						'bulan' => $bulan[$i]

					]);



					if ($cek_spp->num_rows() < 1) {					

						$query = $this->db->insert('tbl_tagihan',$data[$i]);

					}			

				

				}

			}else{



				$cek_lainnya = $this->db->get_where('tbl_tagihan',[

						'id_tahun' => $id_tahun,

						'kategori' => $kategori,

						'id_jenis' => $this->input->post('id_jenis'),

						'nis' => $siswa->nis,

						'id_kelas' => $siswa->id_kelas,

					])->num_rows();



				$data = [

					'id_tahun' => $id_tahun,

					'kategori' => $kategori,

					'id_jenis' => $this->input->post('id_jenis'),

					'nis' => $siswa->nis,

					'id_kelas' => $siswa->id_kelas,

					'status_tagihan' => 'Y',

					'ket' => 'BL',

					'id_user' => $this->session->userdata('id_user'),

					'created_at' => date('Y-m-d')

				];



				

				if ($cek_lainnya < 1) {

					$query = $this->db->insert('tbl_tagihan',$data);

				}

			}



		echo json_encode($data);



		



		if ($query) {

			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Tagihan Berhasil Buat!', 'success');</script>");

        	redirect('keuangan/Tagihan');

		}else{

			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Tagihan Gagal Buat / Duplicate Data!', 'error');</script>");

        	redirect('keuangan/Tagihan');

		}



		

	}



}



/* End of file Tagihan.php */

/* Location: ./application/controllers/Tagihan.php */