<?php 

function Is_Mobile(){

	$ci = get_instance();
 	$ci->load->library('user_agent');

        if ( $ci->agent->is_browser())
        {
                $agent =  $ci->agent->browser().' '. $ci->agent->version();
        }
        elseif ( $ci->agent->is_robot())
        {
                $agent =  $ci->agent->robot();
        }
        elseif ( $ci->agent->is_mobile())
        {
                $agent =  $ci->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }

        if ($agent !=  $ci->agent->is_mobile()) {
            redirect('auth_siswa/blocked');
        }

}
	
 ?>