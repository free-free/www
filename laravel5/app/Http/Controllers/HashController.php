<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
class HashController extends Controller
{
   /*
    Laravel 自带的 Hash 
    facade 提供了采用 Bcrypt 加密算法的加密方式，用于存储用户密码
    Laravel app 中自带的 AuthController 控制器（controller），
    它将自动为注册和验证过程采用 Bcrypt 算法


    对于加密密码来说，Bcrypt 是一个非常好的选择，
    因为它的 “加密系数（work factor）” 是可调整的，这就意味着，
    即便计算机硬件能力在逐步提升，通过调整 “加密系数”，
    计算一个哈希所消耗的时间也会随着提升，就是说破解的难度不会因为计算能力的提升而降低。
   */
    public function index(){
        /*
            $options=['rounds'=>12];//work factor
            Hash::make('huangbiao',$options);

            needsRehash 函数帮助你检查自从密码被加密之后，
            加密系数（work factor）是否被改变了：
            Hash::needsReHash($hashed);
        */
        //$password=Hash::make('huangbiao526114');
        $password=bcrypt('huangbiao');
        $return='check failed!';
        if(Hash::check('huangbiao',$password)){
                $return='check successful!';
        }
        if(Hash::needsReHash($password)){
            $return.='<br/> need rehash secrets';
        }else{
           $return.=' <br/> don\'t  need rehash secrets';
        }
        return response($return,200);
    }
}
