<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
class MailController extends Controller
{
    public function send(){
        Mail::send('emails.reminder',['name'=>'huangbiao'],function($message){
            /*$message->from('19941222hb@gmail.com','john');
                $message->from($address, $name = null);
                $message->sender($address, $name = null);
                $message->to($address, $name = null);
                $message->cc($address, $name = null);
                $message->bcc($address, $name = null);
                $message->replyTo($address, $name = null);
                $message->subject($subject);
                $message->priority($level);
                $message->attach($pathToFile, array $options = []);
                // Attach a file from a raw $data string...
                $message->attachData($data, $name, array $options = []);
                // Get the underlying SwiftMailer message instance...
                $message->getSwiftMessage();

            */
                
           // $message->attach('/var/www/laravel5/phpunit.xml',['as'=>'display name','mime'=>'text/xml']);
            $message->to('19941222hb@gmail.com','helloketty')->subject("your reminder");
        });
        /*
        You may use the raw method if you wish to e-mail a raw string directly:
        
        Mail::raw('Text to e-mail', function ($message) {
                //
        });
        */
        return response('ok');
    }
}
