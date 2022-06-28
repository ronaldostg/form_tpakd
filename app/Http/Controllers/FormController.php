<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\FormTpakdModel;
use App\Http\Controllers\Helper\HelperController as helperController;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


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
        // var_dump($request->cekPengajuan);
        // exit;

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'noNIK' => 'required|min:16',
            
            'email' => 'nullable|email:rfc,dns',
            'notelp1' => 'required|min:11',
            'jenisKelamin' => 'required|in:laki-laki,perempuan',
            'fotoKTP' => 'required|mimes:jpeg,jpg,png',
            'notelp2' => 'nullable|min:11',
            'tgl_lahir' => 'required',
            'usahaKabupaten' => 'required',
            'usahaKecamatan' => 'required',
            'usahaDesaKel' => 'required',
            'detailAlamat' => 'required',
            'jlhPengajuan' => 'required',
            'jangkaWaktu' => 'required|in:1,2,3,4,5',
            'jnsUsaha' => 'required',
            'ketIzinUsaha' => 'required',
            'npwp' => 'nullable|min:15',
            'fotoTempatUsaha' => 'required|mimes:jpeg,jpg,png',
            'cekPengajuan' => 'required',
     
        ],[
            'nama.required' => 'Mohon Isi Nama Anda',
            'noNIK.required' => 'Mohon Isi NIK Anda',
            'noNIK.min' => 'NIK harus minimum 16 karakter',

            'email.email' => 'Wajib dalam bentuk format email',
            'email.dns' => 'Email anda tidak punya nama domain',
            
            'notelp1.required' => 'Mohon Isi No. Telepon Anda',
            'notelp1.min' => 'NIK harus minimum 11 karakter',
            'notelp2.min' => 'NIK harus minimum 11 karakter',

            'jenisKelamin.required' => 'Mohon Isi Jenis Kelamin Anda',
            'jenisKelamin.in' => 'Jenis Kelamin tidak terdaftar',

            'fotoKTP.required' => 'Mohon Upload Foto KTP Anda',
            // 'fotoKTP.mimes' => 'Mohon Upload Foto KTP Anda',
            'fotoKTP.mimes' => 'Foto wajib dalam format PNG, JPG, atau JPEG',
            'usahaKabupaten.required' => 'Mohon Isi Kabupaten Anda',
            'usahaKecamatan.required' => 'Mohon Isi Kecamatan Anda',
            'usahaDesaKel.required' => 'Mohon Isi Desa / Kelurahan Anda',
            
            'jangkaWaktu.required' => 'Mohon Isi Jangka Waktu Pinjaman Anda',
            'jangkaWaktu.required' => 'Pilihan jangka waktu tidak ada',
            
            
            'jnsUsaha.required' => 'Mohon Isi Jenis Pinjaman Anda',



            'detailAlamat.required' => 'Mohon Isi Alamat Usaha Anda',
            'ketIzinUsaha.required' => 'Mohon Isi Jenis Pembiayaan Anda',
            
            'npwp.min' => 'NPWP harus minimum 15 karakter',
            'fotoTempatUsaha.required' => 'Mohon Isi Jenis Pembiayaan Anda',
            'fotoTempatUsaha.mimes' => 'Foto wajib dalam format PNG, JPG, atau JPEG',
            'cekPengajuan.required' => 'Mohon beri centang pengajuan',


        ]);
        
        if ($validator->fails()) {
            // Session::flash('error', $validator->messages()->first());
            // echo $validator->messages()->first();
            // exit;
            // return Redirect::back()->withErrors($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            
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
            

            $request->jlhPengajuan =  floatval(str_replace(".", "", $request->jlhPengajuan ));
            $request->notelp1 =  str_replace("-", "", $request->notelp1);
            $request->notelp2=  $request->notelp2 ? str_replace("-", "", $request->notelp2) : "";


            $formTpakd = [
                'nama' => $request->nama,
                'noNIK' => helperController::encryptData($request->noNIK),
                'email' => $request->email,
                'notelp1' => helperController::encryptData($request->notelp1),
                'jenisKelamin' => $request->jenisKelamin,
                'fotoKTP' => helperController::encryptData($gbrKtp),
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

            // echo json_encode($formTpakd);
            if (FormTpakdModel::create($formTpakd)) {
                return redirect()->back()->with('success', 'Data Pengajuan berhasil dikirimkan');
            } else {
                return redirect()->back()->withInput()->with('error', 'Data Pengajuan gagal terkirim');
            }

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
        FormTpakdModel::destroy(request('id'));
        return redirect('/load-data');
    }
}
