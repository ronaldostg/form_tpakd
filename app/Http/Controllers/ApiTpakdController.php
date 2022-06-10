<?php

namespace App\Http\Controllers;

use App\Models\FormTpakdModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Helper\HelperController as helperController;


class ApiTpakdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataForm = DB::table('tbl_loan_register')->orderBy('created_at', 'desc')->get();
        // $dataForm = DB::table('tbl_loan_register')->where('id','=',10)->get();

        // for ($i=0; $i < count($dataForm) ; $i++) { 
        //     # code...
        //     $dataForm[$i]->noNIK = helperController::decryptData($dataForm->noNIK);
        //     $dataForm[$i]->notelp1 = helperController::decryptData($dataForm->notelp1);
        //     $dataForm[$i]->notelp2 = helperController::decryptData($dataForm->notelp2);
        //     $dataForm[$i]->npwp = helperController::decryptData($dataForm->npwp);

        // }

        foreach ($dataForm as $ds) {
            $ds->noNIK = helperController::decryptData($ds->noNIK);
            $ds->notelp1 = helperController::decryptData($ds->notelp1);
            $ds->notelp2 = helperController::decryptData($ds->notelp2);
            $ds->npwp = helperController::decryptData($ds->npwp);
        }


        if ($dataForm) {
            $data = [
                'status' => 200,
                'message' => 'Berhasil mengambil data',
                'data' => $dataForm
                // 'data'=>gettype($dataForm)/\
            ];
        } else {
            $data = [
                'status' => 400,
                'message' => 'Data tidak ditemukan',
                'data' => $dataForm

            ];
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
    public function show($id)
    {
        //

        // print_r($id);
        $dataForm = DB::table('tbl_loan_register')->where('id', '=', $id)->first();

        $dataForm->noNIK = helperController::decryptData($dataForm->noNIK);
        $dataForm->notelp1 = helperController::decryptData($dataForm->notelp1);
        $dataForm->notelp2 = helperController::decryptData($dataForm->notelp2);
        $dataForm->npwp = helperController::decryptData($dataForm->npwp);

        if ($dataForm) {
            $data = [
                'status' => 200,
                'message' => 'Berhasil mengambil data',
                'data' => $dataForm
                // 'data'=>gettype($dataForm)/\
            ];
        } else {
            $data = [
                'status' => 400,
                'message' => 'Data tidak ditemukan',
                'data' => $dataForm

            ];
        }


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
