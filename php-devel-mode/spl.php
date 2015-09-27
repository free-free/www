<?php

//栈
$stack=new SplStack();
$stack->push('data1');
$stack->push('data2');
echo $stack->pop(),'<br/>';
echo $stack->pop(),'<br/>';
//队列
$queue=new SplQueue();
$queue->enqueue('data1');
$queue->enqueue('data2');

echo $queue->dequeue(),"<br/>";
echo $queue->dequeue(),'<br/>';

//堆
$heap=new SplMinHeap();
$heap->insert('data1');
$heap->insert('data2');
echo $heap->extract(),'<br/>';
echo $heap->extract(),'<br/>';

//固定长度的数组
$array=new SplFixedArray(10);
$array[0]=123;
$array[1]=1234;
var_dump($array);


?>

