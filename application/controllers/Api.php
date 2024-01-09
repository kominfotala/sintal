<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {

       
        parent::__construct();
		is_login();
	
    }
	 
    
    public function get_by_nip(){

        // $nip = $this->input->post('nip',true);

        // $client = new Client();
        // $url = '103.165.243.202:8000/GetPerNIP';

        // $response = $client->request('POST',$url,[
        //     'auth' => ['admin','Pass88994545;'],
            
        //     'headers' => [
        //         'BKPSDM-API-KEY' => '123456'
        //     ],
        //     'form_params' => [
        //         'nip' => $nip
        //     ],

        // ]);

        // $result = $response->getBody()->getContents();
        // echo $result;
        
        $nip = $this->input->post('nip',true);
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://103.165.243.35/apiv2/nametag?nip='.$nip,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'x-api-key: YmVyYW5ha2RhbGFta3VidXI=',
            'Cookie: ci_session=52p428aalmnfche46o09gr8dsnud8oio'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        $data = json_decode($response,true);
        
        echo json_encode($data['data'],true);
       
        
    }


    public function get_data(){
        $curl = curl_init();

        $nip = $this->input->post('nip',true);
        
      $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://103.165.243.35/apiv2/nametag?nip='.$nip,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'x-api-key: YmVyYW5ha2RhbGFta3VidXI=',
            'Cookie: ci_session=lbrmihh5pfr01k85nbcvjpedc00kiq28'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;

    }
}