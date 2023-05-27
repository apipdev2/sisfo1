<!DOCTYPE html>

<html>

<head>

	<title>Data Laporan Keuangan</title>

	<style>

		body{

			margin: 20px;

		}

		#data{

			border-collapse: collapse;

			text-align: left;

			font-size: 14px;



		}

		#data th,td{

			border : 1px solid #000;

			padding: 8px;



		}

		#data th{

			background-color: #95a5a6;

		}



		#header{

			border-collapse: collapse;

			text-align: left;

		}

		#header td{

			border:none;

			padding: 1px;

		}



	</style>

</head>

<body>

<?php

        header("Content-type: application/vnd-ms-excel");

        header("Content-Disposition: attachment; filename=Laporan Keuangan Semua Kelas ".date('d-m-Y').".xls");

 ?> 

<?php foreach ($kls as $klas): ?>



<?php 

	$siswa = $this->db->select('*')

					->from('siswa s')

				   	->join('riwayatkelas rs','rs.nis = s.nis')

				   	->join('tbl_kelas kls','kls.id_kelas = rs.id_kelas')

				   	->where('rs.id_kelas',$klas->id_kelas)

				   	->where('rs.id_tahun', $this->session->userdata('id_tahun'))

				   	->get()->result();

	

	

	$walas = $this->db->select('*')

					->from('walikelas w')

					->join('pegawai p','p.id_pegawai = w.id_guru')

					->join('tbl_kelas k','k.id_kelas = w.id_kelas')

					->where('w.id_kelas', $klas->id_kelas)

					->where('w.id_tahun', $this->session->userdata('id_tahun'))

					->get()->row();

			

         ?>

	

<div class="content" style="margin-bottom: 200px; margin-top: 400px;">



 	<table width="30%" id="header">

		<tr>

			<td>Tahun Ajaran</td><td>:</td><td><?= $tahunajaran->tahun_ajaran;?></td>

		</tr>

		<tr>

			<td>Kelas</td><td>:</td><td><?= $klas->kelas; ?></td>

		</tr>

		<tr>

			<td>Walas</td><td>:</td><td><?= $walas->nama_lengkap; ?></td>

		</tr>

	</table>

	<br>

	<table width="100%" id="data">

         <tr>

          <th rowspan="2" style="text-align: center;">No</th>

          <th rowspan="2" style="text-align: center;">NIS</th>

          <th rowspan="2" style="text-align: center;">Nama Siswa</th>

          <th colspan="2" style="text-align: center;">Tunggakan</th>

          <th colspan="6" style="text-align: center;">SPP Semester1</th>

          <th colspan="6" style="text-align: center;">SPP Semester2</th>

          <th rowspan="2" style="text-align: center;">Studi Wisata</th>

          <th rowspan="2" style="text-align: center;">Jumlah SPP yang belum dibayarkan</th>

          <th rowspan="2" style="text-align: center;">Daftar Ulang</th>

          <th rowspan="2" style="text-align: center;">Jumlah yang belum dibayarkan</th>

        </tr>

        <tr>

          <th style="text-align: center;">DU</th>

          <th style="text-align: center;">Total</th>

          <th style="text-align: center;">Jul</th>

          <th style="text-align: center;">Agust</th>

          <th style="text-align: center;">Sept</th>

          <th style="text-align: center;">Okt</th>

          <th style="text-align: center;">Nov</th>

          <th style="text-align: center;">Des</th>

          <th style="text-align: center;">Jan</th>

          <th style="text-align: center;">Feb</th>

          <th style="text-align: center;">Mar</th>

          <th style="text-align: center;">Apr</th>

          <th style="text-align: center;">Mei</th>

          <th style="text-align: center;">Jun</th>

        </tr>

        

        

        	<?php 



        	$no=1; 



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





        	 ?>



       <?php 

       		$total_studi[] = cekstudi($siswa->nis); 

       		$tot_tagihandu[] = $du->nominal - $pmb;

       		$tot_tagihanspp[] =$tunggakan->nominal - $pmb_spp;

       		$tot_all[] = $tunggakan->nominal - $pmb_spp + $du->nominal - $pmb;

        ?>

       	<tr>

       		<td><?= $no++;?></td>

       		<td><?= $siswa->nis;?></td>

       		<td><?= $siswa->nama_peserta;?></td>

       		<td style="text-align: right;"><?= number_format($pmb);?></td>

       		<td style="text-align: right;"><?= number_format( $du->nominal - $pmb);?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'7'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'8'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'9'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'10'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'11'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'12'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'1'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'2'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'3'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'4'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'5'));?></td>

       		<td style="text-align: right;"><?= number_format(cekSPP($siswa->nis,'6'));?></td>

       		<td style="text-align: right;"><?= number_format(cekstudi($siswa->nis));?></td>

       		<td style="text-align: right;"><?= number_format($tunggakan->nominal - $pmb_spp);?></td>

       		<td style="text-align: right;"><?= number_format($du->nominal - $pmb);?></td>

       		<td style="text-align: right;"><?= number_format($tunggakan->nominal - $pmb_spp + $du->nominal - $pmb);?></td>

       	</tr>



       

       <?php } ?>



       	<tr>

       		<td colspan="3">Update : <?= date('d-m-Y');?></td>

       		<td></td>

       		<td></td>

       		<td colspan="12" style="text-align: center; font-size: 9px;">

       			APABILA ADA PERBEDAAN ANTARA REKAPAN DAN KARTU SPP, YANG BENAR ADALAH YANG ADA DI KARTU SPP

       		</td>

       		<td style="text-align: right;">

       			<?= number_format(array_sum($total_studi)); ?>

       		</td>

       		<td style="text-align: right;">

       			<?= number_format(array_sum($tot_tagihanspp)); ?>

       		</td>

       		<td style="text-align: right;">

       			<?= number_format(array_sum($tot_tagihandu)); ?>

       		</td>

       		<td style="text-align: right;">

       			<?= number_format(array_sum($tot_all)); ?>

       		</td>

       	

        </tr>



        

    </table>

    </div>











	<?php endforeach ?>

</body>

</html>