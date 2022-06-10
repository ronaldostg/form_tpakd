<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\FormTpakdModel;
use App\Http\Controllers\Helper\HelperController as helperController;
use Image;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function loadWilayah()
    {
        $wilayah = DB::table('pembagian_wilayah')->get();
        return $wilayah;
    }


    public function allDataApi()
    {
        $dataForm = FormTpakdModel::all();

        $data = [
            'status' => 200,
            'message' => 'Berhasil mengambil data',
            'data' => $dataForm
        ];

        return response()->json(
            $data
        );
    }

    public function loadData()
    {

        $dataForm = FormTpakdModel::all();
        
        return view('all_data', [
            'datas' => $dataForm
        ]);
    }


    public function index()
    {

        return view('form_kur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
 

        // return $cities;


        return view('form_kur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('fotoKTP');
        $imageTptUsaha = $request->file('fotoTempatUsaha');


        $destinationPath = public_path('/thumbnail');
        $imgFile = Image::make($image->getRealPath());
        $imgFileTptUsaha = Image::make($imageTptUsaha->getRealPath());

        $imgFile->resize(480, 480, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 30);

        $imgFileTptUsaha->resize(480, 480, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 30);




        $gbrKtp = base64_encode($imgFile);
        $gbrTempatUsaha = base64_encode($imgFileTptUsaha);



        // $password = 'c3VtdXRyaXRlbA==';
        // $method = 'aes-256-cbc';
        // $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

        // $password = substr(hash('sha256', $password, true), 0, 32);
        
        
        // $encrypted = base64_encode(openssl_encrypt($request->notelp1, $method, $password, OPENSSL_RAW_DATA, $iv));
        // $encrypted = base64_encode(openssl_encrypt($request->notelp1, $method, $password, OPENSSL_RAW_DATA, $iv));

        // $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);


        $formTpakd = [
            'nama' => $request->nama,
            'noNIK' => helperController::encryptData($request->noNIK),
            
            
            
            'email' => $request->email,
            // 'notelp1' => base64_encode(openssl_encrypt($request->notelp1, $method, $password, OPENSSL_RAW_DATA, $iv)),
            'notelp1' => helperController::encryptData($request->notelp1),
            'jenisKelamin' => $request->jenisKelamin,
            'fotoKTP' => $gbrKtp,
            'notelp2' => helperController::encryptData($request->notelp2),
            'tgl_lahir' => $request->tgl_lahir,
            'usahaKabupaten' => $request->usahaKabupaten,
            'usahaKecamatan' => $request->usahaKecamatan,
            'usahaDesaKel' => $request->usahaDesaKel,
            'detailAlamat' => $request->detailAlamat,
            'jlhPengajuan' => $request->jlhPengajuan,
            'jangkaWaktu' => $request->jangkaWaktu,
            'jnsUsaha' => $request->jnsUsaha,
            'ketIzinUsaha' => $request->ketIzinUsaha,
            'npwp' => helperController::encryptData($request->npwp),
            'fotoTempatUsaha' => $gbrTempatUsaha,

        ];
 

 
        if (FormTpakdModel::create($formTpakd) && $request->checkPengajuan == '1') {
            return redirect('/form-tpakd')->with('success', 'Data Pengajuan berhasil dikirimkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengirim data');
        }
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        //
        // dd(request('id'));
        FormTpakdModel::destroy(request('id'));
        return redirect('/load-data');
    }
}
