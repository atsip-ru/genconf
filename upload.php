<?php
var_dump($_FILES);
// �б�або�ка одино�ного �айла
if (isset($_POST['submit'])) {
    // ��ове��ем, е��� ли о�ибки п�и заг��зке
    if ($_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
	// Файл ��пе�но заг��жен во в�еменн�� ди�ек�о�и�
	$tmpName = $_FILES['fileToUpload']['tmp_name'];
	$fileName = $_FILES['fileToUpload']['name'];
	$fileSize = $_FILES['fileToUpload']['size'];
	$fileType = $_FILES['fileToUpload']['type'];

	// ���� дл� �о��анени� �айла
	$uploadDir = '/ringtones/';
	$destination = $uploadDir . basename($fileName);

	// �е�еме�аем �айл из в�еменной ди�ек�о�ии в �елев��
	//var_dump($tmpName);
	echo "<br><br>";
	var_dump($destination);
	    if (move_uploaded_file($tmpName, $destination)) {
		echo "File upload success!";
	    } else {
		echo "Failed uploaded file!";
	    }
    } else {
	// ��водим �ооб�ение в зави�имо��и о� кода о�ибки
	switch ($_FILES['fileToUpload']['error']) {
    	    case UPLOAD_ERR_INI_SIZE:
	    echo "Файл п�ев��ае� мак�имал�но доп���им�й �азме�.";
	    break;
	    case UPLOAD_ERR_FORM_SIZE:
	    echo "Файл п�ев��ае� �азме�, �казанн�й в �о�ме.";
	    break;
	    case UPLOAD_ERR_PARTIAL:
	    echo "Файл б�л заг��жен �ол�ко �а��и�но.";
	    break;
	    case UPLOAD_ERR_NO_FILE:
	    echo "Файл не б�л заг��жен.";
	    break;
	    default:
	    echo "��оизо�ла о�ибка п�и заг��зке �айла.";
	}
    }
}
?>
