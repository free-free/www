<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Qiniu\Auth;
class QiniuController extends Controller
{
    public function getUpload()
    {
        $accessKey = 'CKQNXugLAXFueA5UlBKQnkWxslYC8rIErwn2ch4I';
        $secretKey = '4lnKaSKUk1SVmbB4alt6PtkL2O1Sm-jP6e-T7EER';
        $bucket='first-blood';
        $auth=new Auth($accessKey,$secretKey);
        $upload_token=$auth->uploadToken($bucket);
        return view('qiniu.upload',['upload_token'=>$upload_token]);
    }

}
