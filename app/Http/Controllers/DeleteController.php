<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function DeleteRes(REQUEST $request)
    {
        if(!isset($request->clinic_id)){
            return response()->json(['error'=>'Not Authorized'], 401);
        }
        
        if (isset($request->patient_id)) {
            $patient_id = $request->patient_id;
        } else {
            return response()->json(["message" => "please Send patient_id"]);
        }

        $delete = Patients::where('patient_id', '=', $request->patient_id)->delete();

        if ($delete) {
            return response()->json(["message" => "patient deleted"]);
        }else {
            return response()->json(["message" => "patient not deleted"]);
        }
    }
}
