<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class ShowDoctorsControllers extends Controller
{
    public function ShowDataOfDoctors(REQUEST $request)
    {

        if(!isset($request->clinic_id) && ($request->clinic_id) != 111){
            return response()->json(['error'=>'Not Authorized'], 401);
        }

        if(isset( $request->perPage)){
            $paginate = $request->perPage;
        }else {

            $paginate = 15 ;
        }

        if(isset( $request->value)){

            if($request->value == 'asc')
            {
                $value = $request->value;

            }elseif($request->value == 'desc'){
                $value = $request->value;
                
            }else{
                $value = 'desc';
            }
        }else {

            $value = 'desc';
        }

        $pateints =  Doctors::select('*')->orderBy('doctor_name',$value)->paginate($paginate);

        return $pateints;
    }
}
