<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
	//$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
	//echo C('name'); //read config file function
/*ThinkPHP url mode
*1.normal mode :    URL_MODEL:0
*2.pathinfo mode :  URL_MODEL:1
*3.rewrite mode:    URL_MODEL:2//URL_MODE be written in config file 
*4.fit mode:        URL_MODEL:3
*
*
*
*/
	//echo C("URL_MODEL"),'<br/>';
/*U("Index/user",array('id'=>2,'name'=>'huangbiao'),'html',false,'localhost');*/
	//echo U("Index/user",array('id'=>2,'name'=>'huangbiao'),'html',false,'www.vekou.com');
    //test();


    /*$info=array("name"=>'huangbiao','age'=>14);
    $this->assign('info',$info);
    $this->time=time();*/

    $people=array(array("name"=>'huangbiao','age'=>21),
        array("name"=>'Tom','age'=>23),
        array("name"=>'Jery','age'=>34));
    $this->people=$people;//$this->assign("people",$people);
    $this->assign("num",10);
    $this->assign("name",'B');
    $this->display();
}

public function user(){

       //1.url_mode 2 rewrite mode test
        /*echo 'your id is :'.$_GET['id'],'<br/>';
        echo 'your name is:'.$_GET['name'].'<br/>';*/

       //2.debug config test
       /* G("run");
        echo C('name');
        trace('name',C('name'));
        trace('runtime',G('run','end'));
        $this->display();*/
        
       //3.database operation 
          /*
            NOTES:a database table is related to a Model ,for example UserModel is reponse to user table
          */

          /*
            (1).make a object of basic model
            (2).make a object of user self-defined model
            (3).make a object of public model
            (4).make a object of empty model

          */
        //(1):
            /*$user=new Model('user');//$user=M("user");
            $record=$user->select();
            dump($record);*/
        //(2):
            /*$user=new UserModel();//$user==D("User");
            $record=$user->select();
            echo $user->getinfo();
            dump($record);*/
        //(3)
            /*$cm=new CommonModel();
            echo $cm->pwd_convert("huangbiao526114");*/
        //(4):
            /*$em=M();
            $sql='select * from user';
            $records=$em->query($sql);//read operation ,select 
            $affected_row=$em->execute($sql);//write operation,update,insert
            dump($records);
            dump($affected_row);*/


        //database CURD operation
            //1.add operation 
               //(1) add one row record
            /*$record=array(
                'uid'=>1,
                'password'=>'fesfsefs',
                'age'=>21,
                'sex'=>1
            );
            echo M("tb1")->add($record);
               //(2):add mutilple rows records
            $records=array(
                0=>array(
                    'uid'=>2,
                    'password'=>'18281573692',
                    'age'=>21,
                    'sex'=>0
                    ),
                1=>array(
                    'uid'=>3,
                    'password'=>'xx',
                    'age'=>21,
                    'sex'=>1
                    )
            );
            echo M("tb1")->addAll($records);
            $this->display();*/

            //2.select operation 
              $obj=M("tb1");
              $record=array();
              //(1):stream select 
            /*$record=$obj->where('id=1')->select();*/
              //(2):array combination select
              /*$where['id']=1;
              $where['uid']=1;
              $where['_logic']='or';
              $record=$obj->where($where)->select();*/
              //(3):expression select eq,neq,lt,elt,like....
              /*$where['id']=array('lt','7');//where id<7
              $where['password']=array('like','%6133%');
              $record=$obj->where($where)->select();*/
              //(4):range select
              /*$where['id']=array(array("egt",'4'),array('elt','8'),'and'); id>=4 and id <=8
              $record=$obj->where($where)->select();*/
              //(5):posibility select :count,min,max,sum,avg
             /* $record[]=$obj->count();
              $record[]=$obj->max('id');
              $record[]=$obj->min('id');
              $record[]=$obj->avg("id");
              $record[]=$obj->sum("id");*/
            //3 update operation:
              /*$up['age']=100;
              $w['id']=1;
              $record=$obj->where($w)->save($up);*/
              
            //4 delete operation
              $w['id']=1;
              $record=$obj->where($w)->delete();
              dump($record);
              $this->display();
        }
    }