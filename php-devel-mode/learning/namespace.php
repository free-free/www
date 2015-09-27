<?php

//declaring namespace,namespace must ne defined in frist row
//命令空间可以防止重名函数或者同名类的冲突
//引用某一命名空间里函数  space1\test()
//namespace test1;



require_once "test1.php";
require_once "test2.php";


test1\test();
test2\test();







?>
