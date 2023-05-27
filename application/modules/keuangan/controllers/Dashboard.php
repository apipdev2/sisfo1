<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_tu();
		
	}
	public function index()
	{	
		$data= [
			'title' => 'Dashboard',
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'j_guru' => $this->db->get_where('pegawai',['status_pegawai'=>'guru'])->num_rows(),
			'j_tendik' => $this->db->get_where('pegawai',['status_pegawai'=>'tendik'])->num_rows(),
			'j_pd' => $this->db->get_where('riwayatkelas',['status_siswa'=>'Y'])->num_rows(),
			'j_kls' => $this->db->get('tbl_kelas')->num_rows(),
			'kelas' => $this->db->get('tbl_kelas')->result(),
			'pembayaran' => $this->db->select_sum('nominal')
	                                     ->from('transaksi_pembayaran')
	                                     ->where('id_tahun',$this->session->userdata('id_tahun'))
	                                     ->get()->row(),

	        'tunggakan' => $this->db->select_sum('jp.nominal')
	                                     ->from('jenis_pembayaran jp')
	                                     ->join('tbl_tagihan tgk','tgk.id_jenis = jp.id_jenis')
	                                     ->where('tgk.id_tahun',$this->session->userdata('id_tahun'))
	                                     ->get()->row(),

		];

		$this->load->view('keuangan/template/header',$data);
		$this->load->view('keuangan/template/navbar',$data);
		$this->load->view('keuangan/index',$data);
		$this->load->view('keuangan/template/footer',$data);
	}

	public function chart()
	{
		$pembayaran = $this->db->select('tgl_bayar, SUM(nominal) as total')
			                 ->from('transaksi_pembayaran')
			                 ->where('MONTH(tgl_bayar) = MONTH(NOW())')
			                 ->group_by('DAY(tgl_bayar)')
			                 ->get()->result();
        foreach ($pembayaran as $row) {
        	
        	$data[] = [
        		'tanggal' => date('d-m-Y',strtotime($row->tgl_bayar)),
        		'nominal' => $row->total,
        	];
        }

        echo json_encode($data);

	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/infoguru/controllers/Dashboard.php */