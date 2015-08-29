<?php

/*
*@class:ImageOperation
*@method:
*@property:
*/
class ImageOperation {
	/*property*/
	protected $image_info=array();
	protected $src_image='';
	protected $dst_image='';
	protected $thumb_image='';
	/*method*/
	public function __construct($image_path){
		if(empty($image_path)){
			return false;
		}
		$info=getimagesize($image_path);
		$this->image_info['dst']=array(
			'width'=>$info[0],
			'height'=>$info[1],
			'type'=>image_type_to_extension($info[2],false),
			'mime'=>$info['mime'],
			'path'=>$image_path
			);
		$image_create_func='imagecreatefrom'.$this->image_info['dst']['type'];
		if(!($this->dst_image=$image_create_func($this->image_info['dst']['path']))){
			return false;
		}
	}


	public function __destruct(){
		
		if(!empty($this->src_image)){
			imagedestroy($this->src_image);
		}
		if(!empty($this->dst_image)){
			imagedestroy($this->dst_image);	
		}
		if(!empty($this->thumb_image)){
			imagedestroy($this->thumb_image);	
		}
		
		
		
	}
	/*
	*@param    array    $font   index:path,size
	*@param    array    $color  index:0(red),1(green),2(blue),3(alpha)
	*@param    string   $text   
	*@param    array    $position  0(x),1(y)
	*@param    int      $angle     text rotate  angle
	*/
	public function addFontWaterMark($font,$color,$text,$position=array(3,23),$angle=0){
		$mark_color=imagecolorallocatealpha($this->dst_image, $color[0], $color[1], $color[2], $color[3]);
		imagettftext($this->dst_image, $font['size'], $angle, $position[0], $position[1], $mark_color, $font['path'], $text);
	}
	/*
	*
	*@param       string        $image_path 
	*@param  	  array x,y     $dst_p  
	*@param       array x,y     $src_p      
	*@param       int 	        $pct
	*
	*/
	public function addImgWaterMark($image_path,$dst_p=array('x'=>0,'y'=>0),$src_p=array('x'=>0,'y'=>0),$pct=100){
		$info=getimagesize($image_path);
		$this->image_info['src']=array(
			'width'=>$info[0],
			'height'=>$info[1],
			'type'=>image_type_to_extension($info[2],false),
			'mime'=>$info['mime'],
			'path'=>$image_path
			);
		$image_create_func='imagecreatefrom'.$this->image_info['dst']['type'];
		if(!($this->src_image=$image_create_func($this->image_info['src']['path']))){
			return false;
		}	
		imagecopymerge($this->dst_image,$this->src_image, $dst_p['x'], $dst_p['y'], $src_p['x'], $src_p['y'],
		 $this->image_info['src']['width']-$src_p['x'], $this->image_info['src']['height']-$src_p['y'], $pct);
	}
	/*
	*
	*
	*
	*
	*
	*/
	public function thumb($width,$height){
		$this->thumb_image=imagecreatetruecolor($width, $height);
		imagecopyresampled(
			               $this->thumb_image,
						   $this->dst_image, 
						   0, 0, 0, 0,
		                   $width, $height,
		                   $this->image_info['dst']['width'],
		                   $this->image_info['dst']['height']
		                   );
		$this->dst_image=$this->thumb_image;
		
	}
	/*
	*@param    string $path
	*@return    none
	*
	*
	*/
	public function outputImage($path=''){
		$image_save_func='image'.$this->image_info['dst']['type'];
		if(empty($path)){
			header('content-type:'.$this->image_info['dst']['mime']);
			$image_save_func($this->dst_image);
		}else{
			$image_save_func($this->dst_image,$path.'.'.$this->image_info['dst']['type']);		
	    }
	}

}

$obj=new ImageOperation("./image/a.jpg");
//$obj->addFontWaterMark(array('path'=>'./arial.ttf','size'=>20),array(255,0,54,0),'This is world');
$obj->addImgWaterMark("./x.jpeg",array('x'=>0,'y'=>0),array('x'=>0,'y'=>0),100);
//$obj->thumb(50,50);
$obj->outputImage('./image/f');
	



?>