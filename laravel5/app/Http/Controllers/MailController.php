<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
class MailController extends Controller
{
    public function send(){
     /*   Mail::send('emails.reminder',['msg'=>'huangbiao'],function($message){
                //$message->from('19941222hb@gmail.com','john');
                //$message->from($address, $name = null);
                //$message->sender($address, $name = null);
                //$message->to($address, $name = null);
                //$message->cc($address, $name = null);
                //$message->bcc($address, $name = null);
                //$message->replyTo($address, $name = null);
                //$message->subject($subject);
                //$message->priority($level);
                //$message->attach($pathToFile, array $options = []);
                // Attach a file from a raw $data string...
                //$message->attachData($data, $name, array $options = []);
                // Get the underlying SwiftMailer message instance...
                //$message->getSwiftMessage();

            
                
           // $message->attach('/var/www/laravel5/phpunit.xml',['as'=>'display name','mime'=>'text/xml']);
            $message->to('19941222hb@gmail.com','helloketty')->subject("your reminder");
        });*/
        /*
        You may use the raw method if you wish to e-mail a raw string directly:
        
        Mail::raw('Text to e-mail', function ($message) {
                //
        });
        */


        /*
        if you only need to send a plain text e-mail, you may specify this using the text key in the array:

        Mail::send(['text' => 'view'], $data, $callback);
        */

        
         //Queueing A Mail Message   
        Mail::queue('emails.reminder',['msg'=>'hello'],function($message){
                $message->to('1462086237@qq.com','john')->subject('this is email');
        });
        
        //Delayed Message Queueing(unit seconds)
        /*Mail::later(5,'emails.reminder',['msg'=>'yes']function($message){
            $message->to('182918392@132.com','zhou')->subject('this is email');
        });*/

        //Pushing To Specific Queues
        /*Mail::queueOn('queue-name','emails.reminder',['msg'=>'queueon'],function($message){

        });
        Mail::laterOn('queue-name',5,'emails.reminder',['msg'=>'lateron'],function($message){

        });*/
        return response('ok');
    }
}
