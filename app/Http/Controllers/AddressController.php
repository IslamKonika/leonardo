<?php
// Laravel implementation for backend filtering

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{

    public function search(){
        return view('pages.address');
    }

    public function find(Request $request)

    {
       $validation=Validator::make($request->all(),[

        'first_name'=> 'required',
        'last_name'=> 'required',
        'building_name'=> 'required',
        'address_one'=> 'required',
        'address_two'=> 'required',
        'town'=> 'required',
        'instruction'=>'required'


       ]);

       if($validation->fails())
       {
           dd($validation->getMessageBag());
           flash()->error('input field empty');


           return redirect()->back();
       }
    }
}
