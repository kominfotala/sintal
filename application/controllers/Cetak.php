<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
    {

       
        parent::__construct();
		is_login();
		$this->load->model('M_app','app');
        $this->load->library('form_validation');
    }


    public function asn($id){


        $data = array(
            'judul' => 'Cetak ID Card PNS',
            'mn_idcard_asn' => true,
            'jquery' => 'cetak/asn/jquery',
            'css' => 'cetak/asn/css',
            'pengaturan' => $this->json(),
            'data' => $this->app->view_where('asn',array('id_asn' => $id))->row_array()
        
        );

   
        $this->template->display('cetak/asn/view', $data);
    }


    public function pppk($id){


        $data = array(
            'judul' => 'Cetak ID Card PPPK',
            'mn_idcard_p3k' => true,
            'jquery' => 'cetak/pppk/jquery',
            'css' => 'cetak/pppk/css',
            'pengaturan' => $this->json(),
            'data' => $this->app->view_join_where('p3k','ref_skpd','id_skpd',array('id_p3k' => $id),'id_p3k','DESC')->row_array(),
        
        );

   
        $this->template->display('cetak/pppk/view', $data);
    }


    public function ptt($id){


        $data = array(
            'judul' => 'Cetak ID Card PTT',
            'mn_idcard_ptt' => true,
            'jquery' => 'cetak/ptt/jquery',
            'css' => 'cetak/ptt/css',
            'pengaturan' => $this->json(),
            'data' => $this->app->view_join_where('ptt','ref_skpd','id_skpd',array('id_ptt' => $id),'id_ptt','DESC')->row_array(),
        
        );

   
        $this->template->display('cetak/ptt/view', $data);
    }

         
    private function json(){
        $json =  $this->app->view('ref_pengaturan')->row_array();
        $json = json_decode($json['json'], true);

        return $json;
    }


   public function save_image(){

    $image = $this->input->post('image',false);
    $file = $this->input->post('file_name',true);
    
    $image_parts = explode(";base64,", $image);
    $image_base64 = base64_decode($image_parts[1]);
  
    var_dump($image_parts);
    file_put_contents($file, $image_base64);


    
   }

   public function idcard($jenis,$bagian,$id){


        if($jenis == 'asn'){
            $str = $this->app->view_where('asn',array('id_asn'=> $id))->row_array();
          
        }elseif($jenis == 'pppk'){
            $str = $this->app->view_where('p3k',array('id_p3k'=> $id))->row_array();
        }else{
            $str = $this->app->view_where('ptt',array('id_ptt'=> $id))->row_array();
       
        }

    
        if($bagian == 'depan'){
            $str = $str['id_card_depan'];
        }else{
            $str = $str['id_card_belakang'];
        }



    

        $data['src'] = base_url().$str;
        $this->load->view('cetak',$data);
       
}








}