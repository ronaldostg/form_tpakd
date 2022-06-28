<?php

namespace App\Http\Controllers;

use App\Models\FormTpakdModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Helper\HelperController as helperController;
use Illuminate\Support\Facades\Hash;


class ApiTpakdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {




        $token = $request->bearerToken();


        if ($token == null) {
            $data['rc'] = "01";
            $data['message'] = "maaf, masukkan token anda";
            
        } else {
            if (env('API_KEY') != $token) {
                $data['rc'] = "02";
                $data['message'] = 'token salah';
            } else {

                if (env('API_KEY') == $token) {


                    $dataForm = DB::table('tbl_loan_register')->orderBy('created_at', 'desc')->get();


                    foreach ($dataForm as $ds) {
                        $ds->id =helperController::encryptData($ds->id);
                       
                        $ds->tgl_lahir = date_format(date_create($ds->tgl_lahir), 'd-M-Y');
                        $ds->created_at = date_format(date_create($ds->created_at), 'd-M-Y h:i:s');
                        $ds->updated_at = date_format(date_create($ds->updated_at), 'd-M-Y h:i:s');
                        $ds->jlhPengajuan = number_format($ds->jlhPengajuan);
                    }


                    if ($dataForm) {
                        $data = [
                            'rc' => '00',
                            'message' => 'Berhasil mengambil data',
                            'data' => $dataForm
                        ];
                    } else {
                        $data = [
                            'rc' => '03',
                            'message' => 'Data tidak ditemukan',
                            'data' => $dataForm

                        ];
                    }


                   
                }
            }
        }
        return response()->json(
            $data
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormTpakdModel  $formTpakdModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //

        // $id = ;
        // echo helperController::encryptData($id);

        $id = helperController::decryptData(request('data_id'));
        // echo $id;
        // exit;
        
        $token = $request->bearerToken();

        $dataForm = DB::table('tbl_loan_register')->where('id', '=', $id)->first();

        if ($token == null) {
            $data['rc'] ="01";
            $data['message'] ="maaf, masukkan token anda";
        } else {
            if (env('API_KEY') != $token) {
                $data['rc'] = '02';
                $data['message'] = 'token salah';
            } else {

                if($id=='') {
                    $data['rc'] =  "03";
                    $data['message'] =  "parameter id kosong";
                }
                
                else {

                    $dataForm = DB::table('tbl_loan_register')->where('id', '=', $id)->first();
                    // var_dump($dataForm);
                    // exit;
                    
                    if ($dataForm==null) {
                        $data = [
                            'rc' => '04',
                            'message' => 'Data tidak ditemukan',
                            'data' => $dataForm

                        ];

                    } else {
                        
                        $dataForm->id =helperController::encryptData($dataForm->id);
                        $dataForm->tgl_lahir = date_format(date_create($dataForm->tgl_lahir), 'd-M-Y ');
                        $dataForm->created_at = date_format(date_create($dataForm->created_at), 'd-M-Y h:i:s');
                        $dataForm->updated_at = date_format(date_create($dataForm->updated_at), 'd-M-Y h:i:s');
                        $dataForm->jlhPengajuan = number_format($dataForm->jlhPengajuan);
                        $data = [
                            'rc' => '00',
                            'message' => 'Berhasil mengambil data',
                            'data' => $dataForm
                            // 'data'=>gettype($dataForm)/\
                        ];
                    }


                }
            }
        }
        
        // exit;
       
        
        // exit;

        // 


        return response()->json(
            $data
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormTpakdModel  $formTpakdModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormTpakdModel $formTpakdModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormTpakdModel  $formTpakdModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormTpakdModel $formTpakdModel)
    {
        //
    }
}
