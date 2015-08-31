<?php

/*
 *
 *@param string $filename
 *@return string $file extension
 *
 */
function common_getFileExt($filename){
	return strtolower(pathinfo($filename,PATHINFO_EXTENSION));
}
/*
 *
 *@param none
 *@return string filename
 */
function common_createUniqueName(){
	return md5(uniqid(microtime(true),true));
}



?>