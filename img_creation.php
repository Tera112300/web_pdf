<?php
$tempfile = $_FILES['files']['tmp_name'];
$files = $_FILES['files']['name'];
$time_file = date("Ymd-His")."_".$files;
$decision;
if(is_uploaded_file($tempfile)){
	if(move_uploaded_file($tempfile,'images/upload/'.$time_file)){
		echo 'images/upload/'.$time_file;	
	}else{
		$decision = "can_not";
		//echo "アップロード出来ませんでした";
		echo $decision;
	}
}else{
	$decision = "not_selected";
	echo $decision;
	//echo "ファイルが選択されていません";
}
exit;