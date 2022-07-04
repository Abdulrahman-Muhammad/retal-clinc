<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function ShowDataOfPatients(REQUEST $request)
    {

        if(isset( $request->perPage)){
            $paginate = $request->perPage;
        }else {

            $paginate = 15 ;
        }

        $pateints =  Patients::select('*')->paginate($paginate);

        return $pateints;
    }
}
