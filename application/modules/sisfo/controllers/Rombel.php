<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Rombel_model','rombel');
		$this->load->model('sisfo/Riwayatkelas_model','riwayatkelas');
		is_login();
        cek_admin();
		
	}

	public function index()
	{
		$data= [
			'title' => 'Data Rombel',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'rombel' => $this->rombel->getRombel()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/rombel/index',$data);
		$this->load->view('template/footer');
	}

	public function view($id_kelas)
	{
		$id_kelas = decrypt_url($id_kelas);

		$data= [
			'title' => 'View Rombel',
			'instansi' => $this->db->get_where('identitas',['id_identitas'=>'1'])->row(),
			'tahunajaran' => $this->db->get_where('tahunajaran',['id_tahun'=> $this->session->userdata('id_tahun')])->row(),
			'pd' => $this->rombel->getSiswaByIdKelas($id_kelas)->result(),
			'kelas' => $this->db->get_where('tbl_kelas',['id_kelas' => $id_kelas])->row(),
			'siswa' => $this->rombel->getSiswa()->result(),
		];

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('sisfo/rombel/view',$data);
		$this->load->view('template/footer');
	}

   

	public function addPeserta()
	{	
		$id_kelas = $this->input->post('id_kelas');
		$id_siswa =  $this->input->post('id_siswa');
        $nis =  $this->input->post('nis');



		for ($i=0; $i < count($id_siswa); $i++) { 

			$data[$i] = [
				'id_tahun' => $this->session->userdata('id_tahun'),
				'nis' => $nis[$i],
				'id_kelas' => $id_kelas,
				'status_siswa' => 'Y',
			];

            $cek = $this->db->get_where('riwayatkelas',[
                'id_tahun' => $this->session->userdata('id_tahun'),
                'nis' => $nis[$i],
                'id_kelas' => $id_kelas,
            ])->num_rows();

            if ($cek < 1) {
                $query = $this->riwayatkelas->insertSiswa($data[$i]);
                //update flag siswa
                $this->db->where('id_siswa', $id_siswa[$i])->update('siswa',['nis'=>$nis[$i],'flag'=>'1','tanggal_daftar'=>date('Y-m-d')]);
            }
			

		}
		
		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Tersimpan!', 'success');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Tersimpan data suda ada!', 'error');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
		}
	}

	public function hapusPeserta($id,$id_kelas)
	{	
		$id_kelas = decrypt_url($id_kelas);
		$id = decrypt_url($id);

			//update flag siswa
			$riwayat = $this->db->get_where('riwayatkelas',['id_riwayat'=>$id])->row();
			$this->db->where('nis', $riwayat->nis)->update('siswa',['flag'=>'0']);
			//delete
			$query = $this->riwayatkelas->hapusSiswa($id);
			


		if ($query) {
			$this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Terhapus!', 'success');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
		}else{
			$this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Terhapus!', 'error');</script>");
        	redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
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
        $data = array();

        foreach ($sheetData as $row) {
        	$data  = [
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
                'prov' => $row[19],
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
                'tempat_lahir_ibu'=>$row[42],
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
                'no_wali' => $row[54],
            ];

            $dt_kelas = [
                'id_tahun' => $this->session->userdata('id_tahun'),
                'nis' => $rows[1],
                'id_kelas' => $this->input->post('id_kelas'),
                'status_siswa' => "Y",
                'flag' => 0,
            ];

            $cek_siswa =  $this->db->get_where('siswa',[
                'nisn' => $row[2],
                'nik' => $row[3],
                'nama_peserta' => $row[5],
            ])->num_rows();

            if ($cek_siswa < 1) {
                
                $this->db->insert('siswa',$data);
                $cek_rk = $this->db->get_where('riwayatkelas',[])->num_rows();
                if ($cek_rk < 1) {
                    $this->db->insert('riwayatkelas', $dt_kelas);
                    //update flag siswa
                    $this->db->where('nis', $nis[$i])->update('siswa',['flag'=>'1']);
                }

                $this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Import data!', 'success');</script>");
            }else{

                $this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Sudah ada!', 'error');</script>");
            }

            redirect('sisfo/Rombel');
        }
        

      }


	}


    public function active($nis)
    {
        $this->db->where('nis',$nis);
        $this->db->update('riwayatkelas',['status_siswa'=>'Y']);

        $result = ['message'=>'success'];
        echo json_encode($result);
    }

     public function non_active($nis)
    {
        $this->db->where('nis',$nis);
        $this->db->update('riwayatkelas',['status_siswa'=>'N']);

        $result = ['message'=>'success'];
        echo json_encode($result);
    }

    public function mutasi()
    {

        $data =[
            'id_tahun' => $this->session->userdata('id_tahun'),
            'tanggal'  => date('Y-m-d'),
            'nis'      => $this->input->post('nis'),
            'sekolah_tujuan' => $this->input->post('sekolah_tujuan'),
            'ket' => $this->input->post('ket'),
            'jenis_mutasi' => 'keluar',
            'alasan' => $this->input->post('alasan'),
        ];

        $query = $this->db->insert('mutasi',$data);
        $this->db->where('nis',$this->input->post('nis'));
        $this->db->update('riwayatkelas',['status_siswa'=>'N']);

        if ($query) {
        $this->session->set_flashdata('message', "<script>swal('Sukses!', 'Data Berhasil Save data!', 'success');</script>");
        redirect('sisfo/Rombel');
        }else{
            $this->session->set_flashdata('message', "<script>swal('Gagal!', 'Data Gagal Save data!', 'error');</script>");
            redirect('sisfo/Rombel');
        }
    }

    public function generate($id_kelas)
    {   
        $id_kelas = decrypt_url($id_kelas);
        $siswa = $this->db->get_where('riwayatkelas',['id_kelas'=>$id_kelas])->result();

        foreach ($siswa as $sis) {
            
            $nis = $sis->nis;
            $password = password_hash('123456', PASSWORD_DEFAULT);

            $this->db->where('nis', $nis);
            $this->db->update('siswa',['password'=> $password]);
        }

    $this->session->set_flashdata('message', "<script>swal('Sukses!', 'Generate data berhasil!', 'success');</script>");
    redirect('sisfo/Rombel/view/'.encrypt_url($id_kelas));
    }

    public function reset($nis,$id_kelas)
    {   
        $nis = decrypt_url($nis);        
        $password = password_hash('123456', PASSWORD_DEFAULT);

        $this->db->where('nis', $nis);
        $this->db->update('siswa',['password'=> $password]);

        $this->session->set_flashdata('message', "<script>swal('Sukses!', 'Reset Password berhasil'!', 'success');</script>");
        redirect('sisfo/Rombel/view/'.$id_kelas);
            

    }


	

}



/* End of file Rombel.php */
/* Location: ./application/modules/sisfo/controllers/Rombel.php */