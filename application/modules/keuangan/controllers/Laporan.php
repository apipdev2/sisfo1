<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		$this->load->model('sisfo/Siswa_model','siswa');
		$this->load->model('sisfo/Jurusan_model','jurusan');

		$this->load->helper('spp');
		is_tu();
	}

	public function index()
	{	


		
		$data= [
			'title' => 'Laporan',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'tingkat' => $this->riwayatkelas->getTingkat()->result(), 
			

		];

		$this->load->view('keuangan/template/header',$data);
		$this->load->view('keuangan/template/navbar',$data);
		$this->load->view('keuangan/laporan/index',$data);
		$this->load->view('keuangan/template/footer');

		// echo json_encode($data['siswa']);
	}

	public function table($id_kelas)
	{
		

			$siswa = $this->db->select('*')
							->from('siswa s')
						   	->join('riwayatkelas rs','rs.nis = s.nis')
						   	->join('tbl_kelas kls','kls.id_kelas = rs.id_kelas')
						   	->where('rs.id_kelas',$id_kelas)
						   	->where('rs.id_tahun', $this->session->userdata('id_tahun'))
						   	->get()->result();


			foreach($siswa as $siswa){

                $pembayaran = $this->db->select_sum('nominal')
	                                     ->from('transaksi_pembayaran')
	                                     ->where('nis',$siswa->nis)
	                                     ->where('kategori','DSP')
	                                     ->where('id_tahun',$this->session->userdata('id_tahun'))
	                                     ->get()->row();
	            if ($pembayaran->nominal == null) {
	                $pmb = 0;
	            } else{
	            	$pmb = $pembayaran->nominal;
	            }                                            
                          
                $du = $this->db->get_where('jenis_pembayaran',['id_jenis' => 1])->row();

                $tunggakan = $this->db->select_sum('jp.nominal')
	                                     ->from('jenis_pembayaran jp')
	                                     ->join('tbl_tagihan tgk','tgk.id_jenis = jp.id_jenis')
	                                     ->where('tgk.nis',$siswa->nis)
	                                     ->where('tgk.kategori','SPP')
	                                     // ->where('tgk.ket','BL')
	                                     ->where('tgk.id_tahun',$this->session->userdata('id_tahun'))
	                                     ->get()->row();


	            $pembayaran_spp = $this->db->select_sum('nominal')
	                                     ->from('transaksi_pembayaran')
	                                     ->where('nis',$siswa->nis)
	                                     ->where('kategori','SPP')
	                                     ->where('id_tahun',$this->session->userdata('id_tahun'))
	                                     ->get()->row();

	            if ($pembayaran_spp->nominal == null) {
	                $pmb_spp = 0;
	            } else{
	            	$pmb_spp = $pembayaran_spp->nominal;
	            }                                 

               

				$body[] = [
					'nis' => $siswa->nis,
					'nama_peserta' => $siswa->nama_peserta,
					'du' => $pmb,
                    'total' => $du->nominal - $pmb,
                    'jul' 	=> cekSPP($siswa->nis,'7'),
                    'agust' => cekSPP($siswa->nis,'8'),
                    'sep' 	=> cekSPP($siswa->nis,'9'),
                    'okt' 	=> cekSPP($siswa->nis,'10'),
                    'nov' 	=> cekSPP($siswa->nis,'11'),
                    'des' 	=> cekSPP($siswa->nis,'12'),
                    'jan' 	=> cekSPP($siswa->nis,'1'),
                    'feb' 	=> cekSPP($siswa->nis,'2'),
                    'mar' 	=> cekSPP($siswa->nis,'3'),
                    'apr' 	=> cekSPP($siswa->nis,'4'),
                    'mei' 	=> cekSPP($siswa->nis,'5'),
                    'jun' 	=> cekSPP($siswa->nis,'6'),
                    'studi' =>cekstudi($siswa->nis),
                    'tot_spp' => $tunggakan->nominal - $pmb_spp,

				];
			}

			$data = [
				'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
				'kelas' => $this->db->select('*')
						->from('tbl_kelas')
						->where('id_kelas',$id_kelas)
						->where('id_tahunajaran', $this->session->userdata('id_tahun'))
						->get()->row(),
				'walas' => $this->db->select('*')
						->from('walikelas w')
						->join('pegawai p','p.id_pegawai = w.id_guru')
						->join('tbl_kelas k','k.id_kelas = w.id_kelas')
						->where('w.id_kelas', $id_kelas)
						->where('w.id_tahun', $this->session->userdata('id_tahun'))
						->get()->row(),
				'laporan' => $body
			];

			$this->load->view('keuangan/laporan/table',$data);
		
	}

	public function cetak($id_kelas)
	{
		

			$siswa = $this->db->select('*')
							->from('siswa s')
						   	->join('riwayatkelas rs','rs.nis = s.nis')
						   	->join('tbl_kelas kls','kls.id_kelas = rs.id_kelas')
						   	->where('rs.id_kelas',$id_kelas)
						   	->where('rs.id_tahun', $this->session->userdata('id_tahun'))
						   	->get()->result();


			foreach($siswa as $siswa){

                $pembayaran = $this->db->select_sum('nominal')
	                                     ->from('transaksi_pembayaran')
	                                     ->where('nis',$siswa->nis)
	                                     ->where('kategori','DSP')
	                                     ->where('id_tahun',$this->session->userdata('id_tahun'))
	                                     ->get()->row();
	            if ($pembayaran->nominal == null) {
	                $pmb = 0;
	            } else{
	            	$pmb = $pembayaran->nominal;
	            }                                            
                          
                $du = $this->db->get_where('jenis_pembayaran',['id_jenis' => 1])->row();

                $tunggakan = $this->db->select_sum('jp.nominal')
	                                     ->from('jenis_pembayaran jp')
	                                     ->join('tbl_tagihan tgk','tgk.id_jenis = jp.id_jenis')
	                                     ->where('tgk.nis',$siswa->nis)
	                                     ->where('tgk.kategori','SPP')
	                                     // ->where('tgk.ket','BL')
	                                     ->where('tgk.id_tahun',$this->session->userdata('id_tahun'))
	                                     ->get()->row();

	            $pembayaran_spp = $this->db->select_sum('nominal')
	                                     ->from('transaksi_pembayaran')
	                                     ->where('nis',$siswa->nis)
	                                     ->where('kategori','SPP')
	                                     ->where('id_tahun',$this->session->userdata('id_tahun'))
	                                     ->get()->row();
	            if ($pembayaran_spp->nominal == null) {
	                $pmb_spp = 0;
	            } else{
	            	$pmb_spp = $pembayaran_spp->nominal;
	            }                                 

               

				$body[] = [
					'nis' => $siswa->nis,
					'nama_peserta' => $siswa->nama_peserta,
					'du' => $pmb,
                    'total' => $du->nominal - $pmb,
                    'jul' 	=> cekSPP($siswa->nis,'7'),
                    'agust' => cekSPP($siswa->nis,'8'),
                    'sep' 	=> cekSPP($siswa->nis,'9'),
                    'okt' 	=> cekSPP($siswa->nis,'10'),
                    'nov' 	=> cekSPP($siswa->nis,'11'),
                    'des' 	=> cekSPP($siswa->nis,'12'),
                    'jan' 	=> cekSPP($siswa->nis,'1'),
                    'feb' 	=> cekSPP($siswa->nis,'2'),
                    'mar' 	=> cekSPP($siswa->nis,'3'),
                    'apr' 	=> cekSPP($siswa->nis,'4'),
                    'mei' 	=> cekSPP($siswa->nis,'5'),
                    'jun' 	=> cekSPP($siswa->nis,'6'),
                    'studi' =>cekstudi($siswa->nis),
                    'tot_spp' => $tunggakan->nominal - $pmb_spp,



				];
			}
			$data = [
				'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
				'kelas' => $this->db->select('*')
						->from('tbl_kelas')
						->where('id_kelas',$id_kelas)
						->where('id_tahunajaran', $this->session->userdata('id_tahun'))
						->get()->row(),
				'walas' => $this->db->select('*')
						->from('walikelas w')
						->join('pegawai p','p.id_pegawai = w.id_guru')
						->join('tbl_kelas k','k.id_kelas = w.id_kelas')
						->where('w.id_kelas', $id_kelas)
						->where('w.id_tahun', $this->session->userdata('id_tahun'))
						->get()->row(),
				'laporan' => $body
			];

			$this->load->view('keuangan/laporan/cetak',$data);
		
	}

	public function cetak_all()
	{	
		$kelas = $this->db->get_where('tbl_kelas',['id_tahunajaran'=> $this->session->userdata('id_tahun')])->result();

		$data =[
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'kls' => $kelas,
			];
		
			$this->load->view('keuangan/laporan/cetak_all',$data);
		
	}

	

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */