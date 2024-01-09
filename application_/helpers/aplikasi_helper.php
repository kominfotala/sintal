<?php

    function is_login(){
        $ci = get_instance();

        if(!$ci->session->login){

            redirect('login','refresh');
        }
    }

    function kosong($str){
        if($str == ""){

            return 'Belum Diisi';
        }else{
            return $str;
        }
    }

    function goldar(){
        
        $arr = ['-','O','A','B','AB'];

        return $arr;

    }

    function selected($x,$y){

        
        if($x == $y){
           $result = 'selected';
        }else{
            $result = null;
        }


        return $result;



    }

    function tgl_indo($tgl){
        $explode = explode(' ', $tgl);
        $tanggal = substr($tgl,8,2);
        $bulan = getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun. ' '. $explode[1];        
    } 
    
    function tgl($tgl){
     
        $tanggal = substr($tgl,8,2);
        $bulan = getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;        
    } 
    
    
    function getBulan($bln){
        switch ($bln){
            case 1: 
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }


    }

    function nip($str){

        $a = substr($str,0,8);
        $b = substr($str,8,6);
        $c = substr($str,14,1);
        $d = substr($str,15,3);

        $str = $a.' '.$b.' '.$c.' '.$d;

        return $str;
    }
    
?>