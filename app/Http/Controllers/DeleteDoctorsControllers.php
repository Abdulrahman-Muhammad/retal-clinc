<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;


class DeleteDoctorsControllers extends Controller
{
    public function DeleteDoctors(REQUEST $request)
    {

        if(!isset($request->clinic_id) && ($request->clinic_id) != 111){
            return response()->json(['error'=>'Not Authorized'], 401);
        }


        if (isset($request->doctor_id)) {
            $doctor_id = $request->doctor_id;
        } else {
            return response()->json(["message" => "please Send doctor_id"]);
        }

        $delete = Doctors::where('doctor_id', '=', $request->doctor_id)->delete();

        if ($delete) {
            return response()->json(["message" => "Doctor deleted"]);
        }else {
            return response()->json(["message" => "Doctor not deleted"]);
        }
    }
}


//ShowDoctorsControllers