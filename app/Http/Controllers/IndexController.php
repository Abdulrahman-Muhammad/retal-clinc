<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function HandleRequest(REQUEST $request)
    {

        if(!isset($request->clinic_id) && ($request->clinic_id) != 111){
            return response()->json(['error'=>'Not Authorized'], 401);
        }


        if(isset($request->name)){
            $name = $request->name;

        }else {
            return response()->json(["message" => "please Enter Your Name"]);
        }

        if(isset($request->res_date)){
            $date_of_reservation = $request->res_date;

        }else {
            return response()->json(["message" => "please Select Reservation Date"]);
        }

        if(isset($request->clinic_type)){
            $clinic_type = $request->clinic_type;

        }else {
            return response()->json(["message" => "please Enter Reservation Type"]);
        }

        if(isset($request->telephone_number)){
            $telephone_number = $request->telephone_number;

        }else {
            return response()->json(["message" => "please Enter Telephone Number"]);
        }

        if(isset($request->patient_id)){
            $patient_id = $request->patient_id;

        }else {
            return response()->json(["message" => "please Send patient_id"]);
        }


        $save_role =  Patients::Create(
            [
                'patient_id' =>  $patient_id,
                'telephone_number' => $telephone_number,
                'clinic_type' => $clinic_type,
                'patient_name' => $name,
                'res_date' => $date_of_reservation,

            ]
        );

        if( $save_role){

            return response()->json(["message" => "sucess"]);
        }else{
            return response()->json(["message" => "error"]);

        }
    }
}
