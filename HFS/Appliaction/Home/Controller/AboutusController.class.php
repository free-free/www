<?php
namespace Home\Controller;
use Think\Controller;
class AboutusController extends Controller {
    public function indexAction(){
        $this->display("aboutus::index");
    }
}