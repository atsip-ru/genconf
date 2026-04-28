<?php
include('blocks/values.php');
$ring_dir = $ringtonepath;
if (@$_REQUEST['submit']) { 
$data = $_FILES['fileToUpload']; 
$tmp = $data['tmp_name']; 
if (@file_exists($tmp)) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $tmp);
    $array_types = array(
        'audio/wav' => true,
        'audio/x-wav' => true,
        'audio/vnd.wave' => true,
    );
    if(isset($array_types[$mime])){ 
        $name = "$ring_dir".$_FILES['fileToUpload']['name'];
        move_uploaded_file($tmp, $name);
	echo "File upload success!";
	echo "<br>";
	echo "<a href='javascript:history.go(-1)'>go back</a>";
    } else { 
        //echo "<div class='list'>�анн�й �ип �айла зап�е�ен дл� заг��зки!</div>"; 
	echo "Don't load tin type of file";
    } 
} else { 
    //echo "<div class='list'>Уп�. ��ибка!</div>"; 
    echo "Error!";
} 
}
?>