<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;


class AddImageController extends Controller
{
    public function imageUploadPost(Request $request)
    {

        if(!isset($request->clinic_id) && ($request->clinic_id) != 111){
            return response()->json(['error'=>'Not Authorized'], 401);
        }

        if(isset($request->doctor_id)){
            $doctor_id = $request->doctor_id;

        }else {
            return response()->json(["message" => "please Send doctor_id"]);
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $request->image->storeAs('images', $imageName);

        $fileName = $request->image->getClientOriginalName();

        /* Store $imageName name in DATABASE from HERE */

        $save_role =  Images::Create(
            [
                'doctor_id' =>  $doctor_id,
                'image' =>  $imageName

            ]
        );

        if( $save_role){

            return response()->json(["message" => "sucess"]);
        }else{
            return response()->json(["message" => "error"]);

        }

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);

        
    }
}
