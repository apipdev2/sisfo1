<?php 
	
	function cekSPP($nis, $bulan){

		$ci = get_instance();
		$spp = $ci->db->select_sum('nominal')
                         ->from('transaksi_pembayaran')
                         ->where('id_jenis','2')
                         ->where('nis',$nis)
                         ->where('bulan',$bulan)
                         ->where('id_tahun',$ci->session->userdata('id_tahun'))
                         ->get()->row();
        if ($spp->nominal == null) {
        	
        	$data = 0;
        }else{
        	$data = $spp->nominal;
        }

        return $data;
	}


	function cekStudi($nis){

		$ci = get_instance();
		$studi = $ci->db->select_sum('nominal')
                         ->from('transaksi_pembayaran')
                         ->where('id_jenis','4')
                         ->where('nis',$nis)
                         ->where('id_tahun',$ci->session->userdata('id_tahun'))
                         ->get()->row();
        if ($studi->nominal == null) {
        	
        	$data = 0;
        }else{
        	$data = $studi->nominal;
        }

        return $data;
	}

 ?>