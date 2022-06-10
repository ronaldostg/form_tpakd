<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
 
class HelperController extends Controller
{
    
  


    public static function encryptData($encString){
        $password = 'c3VtdXRyaXRlbA==';
        $method = 'aes-256-cbc';
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

        $password = substr(hash('sha256', $password, true), 0, 32);
        

        return base64_encode(openssl_encrypt($encString, $method, $password, OPENSSL_RAW_DATA, $iv));
    }
    public static function decryptData($decString){
        $password = 'c3VtdXRyaXRlbA==';
        $method = 'aes-256-cbc';
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

        $password = substr(hash('sha256', $password, true), 0, 32);
        

        return openssl_decrypt(base64_decode($decString), $method, $password, OPENSSL_RAW_DATA, $iv);
    }


}
