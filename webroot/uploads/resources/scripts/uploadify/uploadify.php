<?php		
if (!empty($_FILES)) {
    //echo $doc_type=addslashes($_REQUEST['doc_type']);
	$tempFile = $_FILES['Filedata']['tmp_name']; 
	//$_SESSION['file_upload_name']= $tempFile;
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
$date = date('d').'_'.date('m').'_'.date('y').'_'.date('h').'_'.date('i');
	$targetFile =  str_replace('//','/',$targetPath) .$_FILES['Filedata']['name'];	
	move_uploaded_file($tempFile,$targetFile);				
 }
?>