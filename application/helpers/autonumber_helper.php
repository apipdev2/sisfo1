<?php 

function autonumber(){

	$ci 	=  get_instance();
    $date 	= date('Ym');
    $q	= $ci->db->query("SELECT MAX(RIGHT(no_pendaftaran,5))as kd_max FROM peserta");

    $prefix = '';
    $prx=$prefix.$date;
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = $prx.sprintf("%06s", $tmp);
        }
    }
    else
    {
        $kd = $prx."000001";
    }

    return $kd;
}

function kode_tr_tmp(){

    $ci     =  get_instance();
    $date   = date('Ym');
    $q  = $ci->db->query("SELECT MAX(RIGHT(kode_pembayaran,5))as kd_max FROM transaksi_pembayaran_tmp");

    $prefix = 'TR-';
    $prx=$prefix.$date;
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = $prx.sprintf("%06s", $tmp);
        }
    }
    else
    {
        $kd = $prx."000001";
    }

    return $kd;
}

function kode_tr(){

    $ci     =  get_instance();
    $date   = date('Ym');
    $q  = $ci->db->query("SELECT MAX(RIGHT(kode_pembayaran,5))as kd_max FROM transaksi_pembayaran");

    $prefix = 'TR-';
    $prx=$prefix.$date;
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = $prx.sprintf("%06s", $tmp);
        }
    }
    else
    {
        $kd = $prx."000001";
    }

    return $kd;
}



 ?>