<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function ShowDataOfPatients(REQUEST $request)
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

        $pateints =  Patients::select('*')->orderBy('res_date',$value)->paginate($paginate);

        return $pateints;
    }
}
