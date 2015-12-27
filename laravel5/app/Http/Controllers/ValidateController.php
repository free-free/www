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
        /*Customizing The Flashed Error Format
        If you wish to customize the format of the validation errors that are flashed to the 
        session when validation fails, override the formatErrors on your base request 
        (App\Http\Requests\Request). Don't forget to import the Illuminate\Contracts\Validation\Validator class at the top of the file:
        */

        /*Customizing The Error Messages
        You may customize the error messages used by the form request by overriding the 
        messages method. This method should return an array of attribute / rule
        pairs and their corresponding error messages:
        */
        return response('good');
    }
    public function msgInstance(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
            ]);
        /*Retrieving The First Error Message For A Field*/
        $messages=$validator->errors();
        //echo $messages->first('email');

        /*Retrieving All Error Messages For A Field*/
        //echo json_encode($messages->get('password'));

        /*Retrieving All Error Messages For All Fields*/
        //echo json_encode($messages->all());

        /*Determining If Messages Exist For A Field*/
        //echo $messages->has('email');

        /*Retrieving An Error Message With A Format*/
        //echo $messages->first('email','<p style="color:red;">:message</p>');

        /*Retrieving All Error Messages With A Format*/
        return response($messages->all('<p style="color:red;">:message</p>'),200);
    }
    public function customMsg(Request $request){
        $messages=[
        //Specifying A Custom Message For A Given Attribute
        'email.required' => 'We need to know your e-mail address!',
        'required'=>"A :attribute is must",
        'same'    => 'The :attribute and :other must match.',
        'size'    => 'The :attribute must be exactly :size.',
        'between' => 'The :attribute must be between :min - :max.',
        'in'      => 'The :attribute must be one of the following types: :values'
        ];
        $validator=Validator::make($request->all(),[
            'email'=>"required",
            'password'=>'required',
        ],$messages);
        if($validator->fails())
        {
            return redirect('/validate/post')
                    ->withErrors($validator)
                    ->withInput();
        }
        return response('good,boy',200);

        /*Specifying Custom Messages In Language Files*/
        //In many cases, you may wish to specify your attribute specific custom messages in a 
        //language file instead of passing them directly to the Validator. To do so, add your 
        //messages to custom array in the resources/lang/xx/validation.php language file.
        //custom' => [
        //    'email' => [
        //        'required' => 'We need to know your e-mail address!',
        //     ],
        //  ]
    }
}

