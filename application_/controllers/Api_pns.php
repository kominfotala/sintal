<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_pns extends CI_Controller {

    public function __construct()
    {

       
        parent::__construct();
		is_login();
	
    }
	 
    
    public function get_by_nip(){

        $nip = $this->input->post('nip',true);

        $client = new Client();
        $url = '103.165.243.202:8000/GetPerNIP';

        $response = $client->request('POST',$url,[
            'auth' => ['admin','Pass88994545;'],
            
            'headers' => [
                'BKPSDM-API-KEY' => '123456'
            ],
            'form_params' => [
                'nip' => $nip
            ],

        ]);

        $result = $response->getBody()->getContents();
        echo $result;
       
        
    }
}