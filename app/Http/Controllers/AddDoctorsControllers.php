<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class AddDoctorsControllers extends Controller
{
    public function AddDoctors(Request $request)
    {

        if(!isset($request->clinic_id) && ($request->clinic_id) != 111){
            return response()->json(['error'=>'Not Authorized'], 401);
        }


        if(isset($request->doctor_name)){
            $doctor_name = $request->doctor_name;

        }else {
            return response()->json(["message" => "please Enter Your Name"]);
        }

        if(isset($request->doctor_specialization)){
            $doctor_specialization = $request->doctor_specialization;

        }else {
            return response()->json(["message" => "please Select Doctor Specialization"]);
        }

        if(isset($request->description)){
            $description = $request->description;

        }else {
            return response()->json(["message" => "please Enter description"]);
        }

        if(isset($request->telephone_number)){
            $telephone_number = $request->telephone_number;

        }else {
            return response()->json(["message" => "please Enter Telephone Number"]);
        }

        if(isset($request->doctor_id)){
            $doctor_id = $request->doctor_id;

        }else {
            return response()->json(["message" => "please Send doctor_id"]);
        }



        $save_role =  Doctors::Create(
            [
                'doctor_id' =>  $doctor_id,
                'doctor_name' => $doctor_name,
                'doctor_specialization' => $doctor_specialization,
                'telephone_number' => $telephone_number,
                'description' => $description
            ]
        );

        if( $save_role){

            return response()->json(["message" => "sucess"]);
        }else{
            return response()->json(["message" => "error"]);

        }
    }
}
