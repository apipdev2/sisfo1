<?php 

function get_nis()
{
	$ci = get_instance();
	$tahun = date('Y');
	$tingkat = '10';
	$kode = $tahun.$tingkat;


	$max_nis = $ci->db->select_max('nis','maxnis')->get('siswa')->row();

	$nis = $max_nis->maxnis;

	$urutan = (int) substr($nis, 5,5);
	$urutan++;

	$kodeBarang = $kode . sprintf("%04s", $urutan);
	return $kodeBarang;
}


 ?>