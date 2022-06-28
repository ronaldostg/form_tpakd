<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;


class WilayahController extends Controller
{
    //

    public function getKabupaten(Request $request){
        // return request('provinsi');
        // return $request->provinsi;
        $kabupatenData = DB::table('pembagian_wilayah')->where('provinsi', $request->provinsi)->get();
        // // $kabupaten = DB::table('pembagian_wilayah')->get();

        $output = array(
            "success" => false,
            "items" => array()
        );
        foreach($kabupatenData as $dt){
            $kodeWilayah = $dt->kode_wilayah;
            if(strlen($kodeWilayah)==4){
                $output['items'][] = array(
                    'kode_wilayah' => $dt->kode_wilayah,
                    'wilayah' => $dt->nama_wilayah,
                  );
            }
        }
        $output['success'] = true;  
        return $output;
    }


    public function getKecamatan(Request $request){

 
        // return csrf_token() ;
        $kabkota = strtolower($request->kabkota);
        // return $kabkota;
        $kecamatanData =  DB::table('pembagian_wilayah')->where('kab_kota','LIKE' ,'%'.$kabkota .'%')->get();
        
        // return $kecamatan;
            
        $output = array(
            "kabupaten"=>'%'.$kabkota .'%',
            "success" => false,
            "items" => array()
        );
        foreach($kecamatanData as $dt){
            $kodeWilayah = $dt->kode_wilayah;
            if(strlen($kodeWilayah)==6){
                $output['items'][] = array(
                    'kode_wilayah' => $dt->kode_wilayah,
                    'wilayah' => $dt->nama_wilayah,
                  );
            }
        }
        $output['success'] = true;  
        return $output;


    }




    public function getDesaKel(Request $request){


        // $kecamatan = strtolower($request->kecamatan);
        $kecamatan = $request->kecamatan;
 
        $desaKelData =  DB::table('pembagian_wilayah')->where('kecamatan','LIKE','%'.$kecamatan.'%')->get();
 

            $output = array(
                "kabupaten"=>'%'.$kecamatan .'%',
                "success" => false,
                "items" => array()
            );
            foreach($desaKelData as $dt){
                $kodeWilayah = $dt->kode_wilayah;
                if(strlen($kodeWilayah)==10){
                    $output['items'][] = array(
                        'kode_wilayah' => $dt->kode_wilayah,
                        'wilayah' => $dt->nama_wilayah,
                    );
                }
            }
            $output['success'] = true;  
            return $output;


    }

    public function getTujuanKredit(){
        $listTujuanKredit = DB::table('tbl_tujuan_kredit')->get();
        // // $kabupaten = DB::table('pembagian_wilayah')->get();

        $output = array(
            "success" => false,
            "items" => array()
        );
        // foreach($listTujuanKredit as $dt){
        //     $kodeWilayah = $dt->nama_tujuan;
        //     if(strlen($kodeWilayah)==4){
        //         $output['items'][] = array(
        //             'kode_wilayah' => $dt->kode_wilayah,
        //             'wilayah' => $dt->nama_wilayah,
        //           );
        //     }
        // }
        $output['success'] = true;  
        $output['data'] = $listTujuanKredit;  
        return $output;
    }




}
