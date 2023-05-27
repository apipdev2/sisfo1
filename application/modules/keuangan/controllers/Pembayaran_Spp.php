<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran_Spp extends CI_Controller {

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

	public function index()
	{
		$data = [
			'title' => 'Transaksi Pembayaran',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'tingkat' => $this->riwayatkelas->getTingkat()->result(),
			'siswa' => $this->riwayatkelas->getSiswa()->result(),
			'kategori' => $this->pembayaran->get_kategori()->result(),
			'jenis' => $this->pembayaran->get_jenis()->result(),

			
		];
		$this->load->view('keuangan/template/header',$data);
		$this->load->view('keuangan/template/navbar',$data);
		$this->load->view('keuangan/transaksi/index',$data);
		$this->load->view('keuangan/template/footer');
	}

	public function get_pembayaran()
	{	
		
		if ($tanggal1 = $this->input->post('tanggal1') && $tanggal2 = $this->input->post('tanggal2')) {
			$tgl1 = $tanggal1;
			$tgl2 = $tanggal2;
		}else{
			$tgl1 = date('Y-m-d');
			$tgl2 = date('Y-m-d');
		}
		$data = [
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'pembayaran' => $this->db->select('tp.id_pembayaran, tp.nis, tp.id_kelas, tp.id_jenis,tp.tgl_bayar,tp.nominal,tp.bulan,tp.status_bayar,tp.id_tahun, s.nis,s.nama_peserta,rs.nis, rs.id_kelas, kls.id_kelas, kls.kelas, jp.id_jenis,jp.jenis_pembayaran')
						   ->from('transaksi_pembayaran tp')
						   ->join('siswa s','s.nis = tp.nis')
						   ->join('riwayatkelas rs','rs.nis = s.nis')
						   ->join('tbl_kelas kls','kls.id_kelas = tp.id_kelas')
						   ->join('jenis_pembayaran jp','jp.id_jenis = tp.id_jenis')
						   ->where('tp.tgl_bayar >=',$tgl1)
						   ->where('tp.tgl_bayar <=',$tgl2)
						   ->where('tp.id_tahun', $this->session->userdata('id_tahun'))
						   ->get()->result(),
		];
		$this->load->view('keuangan/transaksi/view_pembayaran',$data);
		// echo json_encode($data);
	}

	public function cetak_byTgl($tgl1,$tgl2)
	{
		$tgl1 = base64_decode($tgl1);
		$tgl2 = base64_decode($tgl2);
		$data = [
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'pembayaran' => $this->db->select('tp.id_pembayaran, tp.nis, tp.id_kelas, tp.id_jenis,tp.tgl_bayar,tp.nominal,tp.bulan,tp.status_bayar,tp.id_tahun, s.nis,s.nama_peserta,rs.nis, rs.id_kelas, kls.id_kelas, kls.kelas, jp.id_jenis,jp.jenis_pembayaran')
						   ->from('transaksi_pembayaran tp')
						   ->join('siswa s','s.nis = tp.nis')
						   ->join('riwayatkelas rs','rs.nis = s.nis')
						   ->join('tbl_kelas kls','kls.id_kelas = tp.id_kelas')
						   ->join('jenis_pembayaran jp','jp.id_jenis = tp.id_jenis')
						   ->where('tp.tgl_bayar >=',$tgl1)
						   ->where('tp.tgl_bayar <=',$tgl2)
						   ->where('tp.id_tahun', $this->session->userdata('id_tahun'))
						   ->get()->result(),
			'tgl1' => $tgl1,
			'tgl2' => $tgl2,
		];
		
		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Print Pembayaran Pertanggal.pdf";
	    $this->pdf->setPaper('A4', 'Portrait');
	    $this->pdf->loadView('keuangan/transaksi/cetak_pembayaranbytgl', $data);
	}

	public function print($nis)
	{
		$nis = decrypt_url($nis);
		$data = [
			'title' => 'Transaksi Pembayaran',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'siswa' => $this->db->select('*')
							->from('siswa s')
						   	->join('riwayatkelas rs','rs.nis = s.nis')
						   	->join('tbl_kelas kls','kls.id_kelas = rs.id_kelas')
						   	->where('rs.nis',$nis)
						   	->where('rs.id_tahun', $this->session->userdata('id_tahun'))
						   	->get()->row(),

			'pembayaran' => $this->db->select('tp.id_pembayaran, tp.nis, tp.id_kelas, tp.id_jenis,tp.tgl_bayar,tp.nominal,tp.bulan,tp.status_bayar,tp.id_tahun, s.nis,s.nama_peserta,rs.nis, rs.id_kelas, kls.id_kelas, kls.kelas, jp.id_jenis,jp.jenis_pembayaran')
						   ->from('transaksi_pembayaran tp')
						   ->join('siswa s','s.nis = tp.nis')
						   ->join('riwayatkelas rs','rs.nis = s.nis')
						   ->join('tbl_kelas kls','kls.id_kelas = tp.id_kelas')
						   ->join('jenis_pembayaran jp','jp.id_jenis = tp.id_jenis')
						   ->where('tp.nis',$nis)
						   ->where('tp.id_tahun', $this->session->userdata('id_tahun'))
						   ->get()->result(),
				];

		$this->load->view('keuangan/template/header',$data);
		$this->load->view('keuangan/template/navbar',$data);
		$this->load->view('keuangan/transaksi/cetak',$data);
		$this->load->view('keuangan/template/footer');

		// echo json_encode($data);

	}

	public function cetak()
	{
		
		$nis = $this->input->post('nis');
		$id_pembayaran = $this->input->post('id_pembayaran');

		if ($id_pembayaran == '') {
			
			$this->session->set_flashdata('message', "<script>swal('Info!', 'Silahkan Pilih data terlebih dahulu.!', 'info');</script>");
	        	redirect('keuangan/Pembayaran_Spp');
		}

		$data = [
			'pembayaran' => $this->db->select('tp.id_pembayaran, tp.nis, tp.id_kelas, tp.id_jenis,tp.tgl_bayar,tp.nominal,tp.bulan,tp.status_bayar,tp.id_tahun, s.nis,s.nama_peserta,rs.nis, rs.id_kelas, kls.id_kelas, kls.kelas, jp.id_jenis,jp.jenis_pembayaran')
						   ->from('transaksi_pembayaran tp')
						   ->join('siswa s','s.nis = tp.nis')
						   ->join('riwayatkelas rs','rs.nis = s.nis')
						   ->join('tbl_kelas kls','kls.id_kelas = tp.id_kelas')
						   ->join('jenis_pembayaran jp','jp.id_jenis = tp.id_jenis')
						   ->where('tp.nis',$nis)
						   ->where('tp.id_tahun', $this->session->userdata('id_tahun'))
						   ->get()->result(),
		];

		$id_bayar = [];
		for ($i=0; $i < count($id_pembayaran); $i++) { 
			$id_bayar[] = $id_pembayaran[$i];
		}

		$data['id_bayar'] = $id_bayar;
		// $this->load->view('keuangan/transaksi/print',$data);
		// echo json_encode($id_bayar);

		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Print Pembayaran.pdf";
	    $this->pdf->setPaper('A4', 'Portrait');
	    $this->pdf->loadView('keuangan/transaksi/print', $data);
	}

	public function cetak_all($nis)
	{
		
		$nis = decrypt_url($nis);

		

		$data = [
			'pembayaran' => $this->db->select('tp.id_pembayaran, tp.nis, tp.id_kelas, tp.id_jenis,tp.tgl_bayar,tp.nominal,tp.bulan,tp.status_bayar,tp.id_tahun, s.nis,s.nama_peserta,rs.nis, rs.id_kelas, kls.id_kelas, kls.kelas, jp.id_jenis,jp.jenis_pembayaran')
						   ->from('transaksi_pembayaran tp')
						   ->join('siswa s','s.nis = tp.nis')
						   ->join('riwayatkelas rs','rs.nis = s.nis')
						   ->join('tbl_kelas kls','kls.id_kelas = tp.id_kelas')
						   ->join('jenis_pembayaran jp','jp.id_jenis = tp.id_jenis')
						   ->where('tp.nis',$nis)
						   ->where('tp.id_tahun', $this->session->userdata('id_tahun'))
						   ->get()->result(),
		];

		

		$this->load->library('Pdf');
	    $this->pdf->setFileName = "Print Pembayaran.pdf";
	    $this->pdf->setPaper('A4', 'Portrait');
	    $this->pdf->loadView('keuangan/transaksi/print_all',$data);
	}

	

	public function add()
	{
		$data = [
			'title' => 'Tambah Pembayaran',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'tingkat' => $this->riwayatkelas->getTingkat()->result(),
			'siswa' => $this->riwayatkelas->getSiswa()->result(),
			'kategori' => $this->pembayaran->get_kategori()->result(),
			'jenis' => $this->pembayaran->get_jenis()->result(),

			
		];
		$this->load->view('keuangan/template/header',$data);
		$this->load->view('keuangan/template/navbar',$data);
		$this->load->view('keuangan/transaksi/add',$data);
		$this->load->view('keuangan/template/footer');
	}

	public function get_siswa($nis)
	{
		$siswa = $this->riwayatkelas->getSiswaById($nis)->row();
		echo json_encode($siswa);
	}

	public function cek_jenis($id_jenis)
	{	
		$jenis = $this->pembayaran->get_jenisByid($id_jenis)->row();
		echo json_encode($jenis);
	}

	public function get_bulan()
	{	
		$nis = $this->input->post('nis');
		$id_jenis = $this->input->post('id_jenis');
		$id_kelas = $this->input->post('id_kelas');
		
		$bulan = $this->pembayaran->get_tagihan($nis,$id_jenis,$id_kelas)->result();		
		echo json_encode($bulan);
	}

	public function cek_pembayaran()
	{	
		$nis = $this->input->post('nis');
		$id_jenis = $this->input->post('id_jenis');
		$id_kelas = $this->input->post('id_kelas');
		$bulan = $this->input->post('bulan');
		
		$where =[
						'id_tahun' => $this->session->userdata('id_tahun'),
						'id_jenis' => $this->input->post('id_jenis'),
						'nis'	=> $this->input->post('nis'),
						'id_kelas'	=> $this->input->post('id_kelas'),
						'bulan'	=> $this->input->post('bulan'),
					];
		$pembayaran = $this->db->select_sum('nominal')
						   ->from('transaksi_pembayaran')
						   ->where($where)
						   ->get()->row();		

		echo json_encode($pembayaran);
	}


	public function add_temp()
	{	
		$id_jenis = $this->input->post('id_jenis');

		$cek_tagihan = $this->db->get_where('jenis_pembayaran',['id_jenis'=> $id_jenis])->row();
		$kategori = $this->db->select('*')
							 ->from('kategori_pembayaran kp')
							 ->join('jenis_pembayaran jp','jp.id_kategori = kp.id_kategori')
							 ->where('jp.id_jenis',$id_jenis)
							 ->get()->row();

		$where =[
						'id_tahun' => $this->session->userdata('id_tahun'),
						'id_jenis' => $this->input->post('id_jenis'),
						'nis'	=> $this->input->post('nis'),
						'id_kelas'	=> $this->input->post('id_kelas'),
						'bulan'	=> $this->input->post('bulan'),
					];
		$cek_pembayaran = $this->db->select_sum('nominal')
						   ->from('transaksi_pembayaran')
						   ->where($where)
						   ->get()->row();

		$pmb_masuk = $cek_pembayaran->nominal;
		$nominal = $this->input->post('nominal');
		$tagihan = $cek_tagihan->nominal;
		$total = $pmb_masuk + $nominal;


		

		if ($total > $tagihan ) {
			$res = ['status'=>'502'];
			echo json_encode($res);
		}else{


			$data = [
			'id_tahun' => $this->session->userdata('id_tahun'),
			'kategori' => $kategori->nama_kategori,
			'id_jenis' => $this->input->post('id_jenis'),
			'tgl_bayar' => date('Y-m-d'),
			'nis'	=> $this->input->post('nis'),
			'id_kelas'	=> $this->input->post('id_kelas'),
			'bulan'	=> $this->input->post('bulan'),
			'nominal' => $this->input->post('nominal'),
			'diskon' => $this->input->post('diskon'),
			'status_bayar' => $this->input->post('status_bayar'),
			'id_user' => $this->session->userdata('id_user'),
		];

		$cek = $this->db->get_where('transaksi_pembayaran_tmp',[
			'id_tahun' => $this->session->userdata('id_tahun'),
			'id_jenis' => $this->input->post('id_jenis'),
			'tgl_bayar' => date('Y-m-d'),
			'nis'	=> $this->input->post('nis'),
			'id_kelas'	=> $this->input->post('id_kelas'),
			'bulan'	=> $this->input->post('bulan'),
			'nominal' => $this->input->post('nominal'),			
			'id_user' => $this->session->userdata('id_user'),

			])->num_rows();

			if ($cek > 0) {
				$res = ['status'=>'503'];
				echo json_encode($res);

			}else{

				$cek_pmb = $this->db->get_where('transaksi_pembayaran',[
						'id_tahun' => $this->session->userdata('id_tahun'),
						'id_jenis' => $this->input->post('id_jenis'),
						'tgl_bayar' => date('Y-m-d'),
						'nis'	=> $this->input->post('nis'),
						'id_kelas'	=> $this->input->post('id_kelas'),
						'bulan'	=> $this->input->post('bulan'),
						'nominal' => $this->input->post('nominal'),			

						])->num_rows();
				if ($cek_pmb < 1) {
					
					$query = $this->db->insert('transaksi_pembayaran_tmp',$data);
				}

		

				$res = ['status'=>'200'];
				echo json_encode($res);
			}		

		}
		

	}

	public function del_temp()
	{
		
		$id = $this->input->post('id_pembayaran');
		$query = $this->db->where('id_pembayaran', $id)->delete('transaksi_pembayaran_tmp');	

		echo json_encode($query);

	}

	public function get_temp()
	{	
		$temp = $this->db->select('*')
						 ->from('transaksi_pembayaran_tmp tp')
						 ->join('siswa s','s.nis = tp.nis')
						 ->join('riwayatkelas rs','rs.nis = tp.nis')
						 ->join('tbl_kelas kls','kls.id_kelas = rs.id_kelas')
						 ->join('jenis_pembayaran jp','jp.id_jenis = tp.id_jenis')
						 ->where('tp.id_user',$this->session->userdata('id_user'))
						 ->where('tp.id_tahun', $this->session->userdata('id_tahun'))
						 ->get()->result();
		

		echo json_encode($temp);
	}

	public function simpan()
	{	
		$cek = $this->db->get_where('transaksi_pembayaran_tmp',
			[
				'id_tahun' => $this->session->userdata('id_tahun'),
				'id_user'  => $this->session->userdata('id_user'),
			])->num_rows();

		$temp = $this->db->get_where('transaksi_pembayaran_tmp',
			[
				'id_tahun' => $this->session->userdata('id_tahun'),
				'id_user'  => $this->session->userdata('id_user'),
			])->result();

		if ($cek > 0) {		
			

				foreach ($temp as $row) {
					
					$data = [
						'id_tahun' => $row->id_tahun,
						'kategori' => $row->kategori,
						'id_jenis' => $row->id_jenis,
						'tgl_bayar'=> $row->tgl_bayar,
						'nis' 	   => $row->nis,
						'id_kelas' => $row->id_kelas,
						'bulan'	   => $row->bulan,
						'nominal'  => $row->nominal,
						'status_bayar' => $row->status_bayar,
						'id_user' => $row->id_user,
					];

					$this->db->insert('transaksi_pembayaran',$data);

					$where = [
						'id_tahun' => $row->id_tahun,
						'id_jenis' => $row->id_jenis,
						'nis' 	   => $row->nis,
						'id_kelas' => $row->id_kelas,
						'bulan'	   => $row->bulan,
					];

					$this->db->where($where)->update('tbl_tagihan',['ket'=> $row->status_bayar]);

					$this->db->where('id_pembayaran', $row->id_pembayaran)->delete('transaksi_pembayaran_tmp');
				}
				$res = ['status'=>'200'];
				echo json_encode($res);

				}else{
				$res = ['status'=>'503'];
				echo json_encode($res);
			}

		}
		

}

/* End of file Pembayaran_Spp.php */
/* Location: ./application/controllers/Pembayaran_Spp.php */