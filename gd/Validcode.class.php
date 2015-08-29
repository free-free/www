<?php


class Validcode{

   
	protected $validcode_image='';
	protected $width=0;
	protected $height=0;
	protected $code_case='ABCDEFFGHJKLMNPQRSTYZWabcdefhkmbywrstp23455696782736437823927432';
	protected $validcode='';
	public function __construct($width=80,$height=30){
		$this->width=$width;
		$this->height=$height;
	}
	public function __destruct(){
		if(!empty($this->validcode_image)){
			imagedestroy($this->validcode_image);
		}
	}
	/*
	*@param     string $font_file
	*@param     int    $font_size
	*@param     int    $text_angle=30
	*@return    boolean
	*
	*/
	public function createValidcode($font_file,$font_size,$text_angle=30){
			$this->validcode_image=imagecreatetruecolor($this->width, $this->height);
			imagefill($this->validcode_image, 0, 0,imagecolorallocate($this->validcode_image,255,255,255));
			$dots=mt_rand(300,350);
			for ($i=0; $i<$dots ; $i++) { 
				$dot_color=imagecolorallocate($this->validcode_image,mt_rand(120,200),mt_rand(100,200),mt_rand(100,200));
				imagesetpixel($this->validcode_image, mt_rand(1,$this->width-1), mt_rand(1,$this->height),$dot_color);
			}
			$lines_num=mt_rand(2,7);
			for ($i=0; $i<$lines_num;$i++) { 
				$line_color=imagecolorallocate($this->validcode_image, mt_rand(90,180),mt_rand(80,180),mt_rand(80,180));
				imageline($this->validcode_image, mt_rand(1,$this->width), mt_rand(1,$this->height),
					mt_rand(1,$this->width),mt_rand(1,$this->height), $line_color);
			}
			for ($i=0; $i <4 ; $i++) { 
				$x=$i*$this->width/4+mt_rand(2,$font_size/4);
				$y=$font_size+mt_rand(3,($this->height-$font_size)-2);
				$this->code_case=str_shuffle($this->code_case);
				$angle=mt_rand($text_angle*(-1),$text_angle);
				$text=substr($this->code_case,mt_rand(1,strlen($this->code_case)-5),1);
				$this->validcode.=$text;
				$color=imagecolorallocate($this->validcode_image, mt_rand(0,100), mt_rand(0,100), mt_rand(0,100));
				imagettftext($this->validcode_image, $font_size,$angle, $x, $y, $color, $font_file, $text);
			}
			return true;
	}
	/*
	*
	*
	*@param      none
	*@return     string validcode
	*
	*/
	public function  getValidcode(){
		return $this->validcode;
	}
	/*
	*
	*@param    string $path
	*@return   none
	*/
	public function outputValidcode($path=''){
		if(empty($path)){
			header('Content-type:image/png');
			imagepng($this->validcode_image);

		}else{
			imagepng($this->validcode_image,$path.'.png');
			return $path.'.png';
		}
	}
}


?>