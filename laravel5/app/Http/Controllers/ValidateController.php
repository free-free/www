<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Http\Requests\LoginValidateRequest;
class ValidateController extends Controller
{
    public function create(Request $request){
        return view('auth.post');
       

    }
    public function store(Request $request){
        //method 1:
       /* $this->validate($request,[
            'email'=>'required|max:20',
            'password'=>'required|max:100'
            ]
        );*/

        //method 2: Validator facade
        $validator=Validator::make($request->all(),[
            'email'=>'required|max:20',
            'password'=>'required|max:20|min:6'
            ]);

        /*After Validation Hook
        The validator also allows you to attach callbacks to be 
        run after validation is completed. This allows you to easily perform further validation 
        and even add more error messages to the message collection. 
        To get started, use the after method on a validator instance:
        */
        $validator->after(function($validator){
                $validator->errors()->add('ok','not good');
        });
        if($validator->fails()){
            return redirect('/validate/post')
                    ->withErrors($validator)

        /*If you have multiple forms on a single page, 
        you may wish to name the MessageBag of errors, 
        allowing you to retrieve the error messages for a specific form. 
        Simply pass a name as the second argument to withErrors:

        access the named MessageBag instance from the $errors variable:
        {{ $errors->login->first('email') }}

        */
        //           ->withErrors($validator,'login')
                     ->withInput();
        }
        
        return response('ok',200);


    }

    /*
    Customizing The Flashed Error Format
    override the formatValidationErrors on your base controller to customizing the flashed error format
    must import /Illuminate/Contracts/Validation/Validator
    */
    public function formRequest(LoginValidateRequest $request){
        return response('ok');
    }
}
