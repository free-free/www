<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;


class ResponseController extends Controller
{
    /**
     * Laravel basic response
     *
     * @return response
     */

    public function basicResponse(Request $request){
        /*
           The most basic response is simply returning a string from a route or controller:
           However,you also can return a fully Illuminate\Http\Response instance or a view
           a Illuminate\Http\Response instance provides a variety of method to customize 
           your HTTP status code and Headers
        */
        /*1.make a response instance*/
           $content="<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
           $content.='<root><title>Laravel Response</title></root>';
           $statusCode='200';
           // make a Response instance by Illuminate\Http\Response 
           $response=new Response($content,$statusCode); 
           //return $response->header('Content-Type','text/xml');

           //for convenience ,you can use response helper to return response
           //return response($content,$statusCode)->header('Content-Type','text/xml');

        /*2. add header to response*/
           /*return response($content,$statusCode)
           ->header('Content-Type','text/xml')
           ->header('cache-control','max-age=1500')
           ->header('Last-Modified',time());*/
        /*3. attach a cookie to a response*/
            //->withCookie($name, $value, $minutes, $path, $domain, $secure, $httpOnly)
            if($request->cookie('pid')){
                return response('<?xml version="1.0" encoding="utf-8"?><name>hello</name>',$statusCode)
                       ->header('content-type','text/xml');  
            }else{
                return response($content,$statusCode)
                        ->header('content-type','text/xml')
                        ->withCookie('pid',time(),1);        
            }
    }
    /**
     * Laravel other type response
     *
     * @return response
     */    
    public function otherTypeResponse(Request $request){
       /* The response helper may be used to conveniently 
       generate other types of response instances. 
       When the response helper is called without arguments,
        an implementation of the Illuminate\Contracts\Routing\ResponseFactory 
        contract is returned. This contract provides several 
        helpful methods for generating responses.*/


        /*1. return view by response helper
            If you need control over the response status and headers, 
            but also need to return a view as the response content, you may use the view method:
        */

        /*return response()->view('responseview',['name'=>'response view'])
                ->header('content-type','text/html');*/
            
            /*Of course, if you do not need to pass a custom
             HTTP status code or custom headers, you may simply 
             use the global view helper function.*/
        /*return view('responseview',['name'=>'response']);*/

        /*2. response json
            The json method will automatically set the Content-Type header to application/json, 
            as well as convert the given array into JSON using the json_encode PHP function:
        */
        // return response()->json(['name'=>'huangbiao','age'=>12,'address'=>'SiChuanProvicne']);
            
        /*    If you would like to create a JSONP response, you may use the 
              json method in addition to setCallback:
                return response()->json(['name' => 'Abigail', 'state' => 'CA'])
                                 ->setCallback($request->input('callback'));*/

        /*3. download file
            The download method may be used to generate a response that
            forces the user's browser to download the file at the given path. 
            The download method accepts a file name as the second argument to 
            the method, which will determine the file name that is seen by the 
            user downloading the file. Finally, you may pass an array of HTTP 
            headers as the third argument to the method:
            ****response()->download($pathToFile, $name, $headers);
        */
            return response()->download('RequestController.php','php');
    }
     /**
     * Laravel redirect instance
     *
     * @return redirect
     */   
     public function redirect(Request $request){
            /*
            redirect instance
            Redirect responses are instances of the Illuminate\Http\RedirectResponse class, 
            and contain the proper headers needed to redirect the user to another URL. 
            There are several ways to generate a RedirectResponse instance. 
            The simplest method is to use the global redirect helper method:
            */
            //return redirect('createurl');
            
            /*1. redirecting to  previous page
                Sometimes you may wish to redirect the user to their previous location, 
                for example, after a form submission that is invalid. You may do so by 
                using the global back helper function:
            */
            //return back()->withInput();


            /*2. redirecting to Named Routes*/
           // return redirect()->route('profile',['id'=>12]);


            /*3. redirecting to Controller actions*/
            //return redirect()->action('RequestController@getParamFromUrl',['id'=>'12']);

            /*4.Redirecting With Flashed Session Data
            Of course, after the user is redirected to a new page, 
            you may retrieve and display the flashed message from the session.
             For example, using Blade syntax:

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            */
            return redirect('createurl')->with('stutus','good');
     }  
}
