<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   /* public function _before_index(){
    	echo 'I am before<br/>';
    }*/
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	// $this->assign('age',19);
    	// $this->assign('likes',array('Mom','Dad','Sister'));
    	// $this->assign('money',0);
       	
     	// $this->display();
     	//sayHi(); //call your self defined function
     	// echo 'I am index <br/>';
     	echo I('param.id');
     	echo I('id');
     	echo I('get.id');
        echo 'I am index method';
     	/*if(IS_GET){
     		echo 'this get request';
     	}else{
     		echo 'this not get request';
     	}*/
     	$this->display();
    }
 /*   public function _after_index(){
    	echo 'I am after <br/>';
    }*/
    public function createUser(){
    	$user=M('User');
    	if($user->create()){
    		$user->add();
    		$this->success('login successful',10);
    	}else{
    		$this->error('login failed!',20);
    	}

    }
    public function _empty($name){
        echo 'the city is '.$name;
    }
    public function createUrl(){
        echo U('Home/Index/createUrl',array('id'=>1,'name'=>'huangbiao'),'shtml');
        echo '<br/>';
        echo U('Home/Index/createUrl/','id=1&name=hudsds','xml');
        echo '<br/>';
        echo U('Home/Index/createUrl?id=1&name=hudhsd','','htm');
        echo '<br/>';
        echo U('Home/Index/createUrl#comment?id=1');
   }
   public function ajax($format='json'){
        $format_arr=array('json','xml');
        if(!in_array($format, $format_arr)){
                $format='json';
        }
        $data=array(
               'msg'=>'',
               'code'=>402,
               'data'=>array(
                'name'=>'huangbiao',
                'u_id'=>1,
                'p_id'=>2
                ) 
            );
        $this->ajaxReturn($data,$format);
   }
   public function pageJump($code='s'){
        if($code=='s'){
            $this->success('successful','/thinkphp/home/index/index',8);
        }else{
            $this->error('failed');
        }
   }
    public function pageRedirect(){
        $this->redirect('/home/index/index',array('id'=>12),5,'page jumping');
    }
    public function operateModel(){
        $user=M('User');
        $data['user_name']='john-huang';
        $data['email']='19941222hb@gmail.com';
        $data['password']='526114';
        /*
        before create():
                1.field
                2.auto
                3.validate
                4.token
        before add():
                1.table
                2.data
                3.field
                4.auto
                5.validate
                6.filter
                7.token
                8.fetchSql
                9.comment
                10.bind
        before select():
                where   用于查询或者更新条件的定义   字符串、数组和对象
                table   用于定义要操作的数据表名称   字符串和数组
                alias   用于给当前数据表定义别名    字符串
                field   用于定义要查询的字段（支持字段排除）  字符串和数组
                order   用于对结果排序     字符串和数组
                group   用于对查询的group支持   字符串
                having  用于对查询的having支持  字符串
                join    用于对查询的join支持    字符串和数组
                union   用于对查询的union支持   字符串、数组和对象
                distinct    用于查询的distinct支持     布尔值
                lock    用于数据库的锁机制   布尔值
                cache   用于查询缓存  支持多个参数
                relation    用于关联查询（需要关联模型支持）    字符串
                result  用于返回数据转换    字符串
                scope   用于命名范围  字符串、数组
                bind    用于数据绑定操作    数组
                comment     用于SQL注释     字符串
                fetchSql    不执行SQL而只是返回SQL  布尔值
        $user->addAll($data) //insert a set of data
        */
        /*if($user->create($data)){
            $result=$user->add();
            if($result){
                $insertId=$result;
                echo 'insert ID :'.$insertId;
            }
        }*/
        /*
        $data=$user->find(); //find method just return one record
        $data=$user->select(); //select method return all the avaliable data
        $data=$user->getField('user_name',3);//return 3 records of user_name field
        print_r($data);*/
        /*
            if you want save()m method to update your database data,
            the primary key must be pointed out with some form,
            like that form using where('id=5') method 
            before save():
                    where   用于查询或者更新条件的定义   字符串、数组和对象
                    table   用于定义要操作的数据表名称   字符串和数组
                    alias   用于给当前数据表定义别名    字符串
                    field   用于定义允许更新的字段     字符串和数组
                    order   用于对数据排序     字符串和数组
                    lock    用于数据库的锁机制   布尔值
                    relation    用于关联更新（需要关联模型支持）    字符串
                    scope   用于命名范围  字符串、数组
                    bind    用于数据绑定操作    数组
                    comment     用于SQL注释     字符串
                    fetchSql    不执行SQL而只是返回SQL  布尔值
        */
        /*$updateData=array(
            'user_name'=>'Simon'
            );
        $user->where('id=1')->save($updateData);
        //or $user->data($updateData)->where('id=1')->save();
        //or $user->create($updateData)->where('id=1')->save();
        // $user->where('id=2')->setField('password','hello world');*/
        /*
        when using delete() method ,
        primary key must be pointed out
        like thst $user->delete('1,2,3');
            or $user->where(1,2)->delete();
        before delete():
                where   用于查询或者更新条件的定义   字符串、数组和对象
                table   用于定义要操作的数据表名称   字符串和数组
                alias   用于给当前数据表定义别名    字符串
                order   用于对数据排序     字符串和数组
                lock    用于数据库的锁机制   布尔值
                relation    用于关联删除（需要关联模型支持）    字符串
                scope   用于命名范围  字符串、数组
                bind    用于数据绑定操作    数组
                comment     用于SQL注释     字符串
                fetchSql    不执行SQL而只是返回SQL  布尔值
        */
        $user->delete('3');
    } 
    public function operateView(){
        /*
        before display():
                theme('blue') //show temp file with theme View/blue/Controller/operation.html
        */
        //T('Public/menu'); //create  template file name 
        $this->display("Index:index"); //output temp file directly
        //$this->display('Public:menu');
        //$this->display("Public:extendsBase");
       /* $content=$this->fetch('Index:index');//get content of temp file,but not output it
        $this->show($content,'utf-8','text/html');//output $content ,but there is no temp file existed
    */
    }
    public function cache(){
        /*
            S() method used to set or get caching data
        */
            /*  config cache parameters*/
            /* S(array(
                'type'=>"memcache",
                'port'=>'11232',
                'host'=>'192.168.252.12',
                'prefix'=>'think',
                'expire'=>'70'));*/

            /*set cache*/
            /*S('name',$value,$expire);*/

            /*get cache*/
            /*S('name');*/

            /*delete cache*/
            /*S('name',null);*/


        /*
            another method used to operation of cache
            by object
        */
            /*
               $cache=S(array(
                    'type'=>"memcache",
                    'port'=>'12313',
                    'host'=>'192.168.252.12',
                    'prefix'=>'think',
                    'expire'=>'60',
                    'length'=>'100' //max number records of cache data
               ));
               //set cache
               $cache->name="hello";
               // get cache
               $value=$cache->name;
               //delete cache
               unset($cache->name);
            */



        /*
            if there is no special requirement of cache outdate time,
            F() method can be more fast and convinence for fast caching

        */
            /*
                //set cache
                F('name',$data,[$CACHE_DIR]); // cache directory is option 
                // get cache
                F('name');
                //delete cache
                F('name',NULL);
            */ 
    }
}