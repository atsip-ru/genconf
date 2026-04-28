<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="height=device-height">
        <title>Upload ringtones for Yealink phones</title>
	<style type="text/css">
	    /* Upload files */
            .file-drop {
            background:#efefef;
            margin:auto;
            padding:1px 1px;
            border:0px solid #333;
            }
            .file-drop_dragover {
            border:2px dashed #333;
            }
            .file-drop__input {
            border:0;
            }
            .message-div {
            background:#fefefe;
            border:2px solid #333;
            color:#333;
            width:350px;
            height:150px;
            position:fixed;
            bottom:25px;
            right:25px;
	    font-size:15px;
            padding:5px;
	    z-index:99999;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            }
            .message-div_hidden {
            right:-9999999999999999999px;
            }
        </style>
    </head>
    <body height="100%" bgcolor="CCCCCC">
        <?php
        include("blocks/header.php");
        ?>
        <a href="javascript:history.go(-1)">go back</a>
	<!-- Фо�ма дл� з-->
	<form action="file.php" method="post" enctype="multipart/form-data">
	<label for="fileToUpload">Choose the file to upload:</label>
	<input type="hidden" name="MAX_FILE_SIZE" value="102400">
	<br>
	<input type="file" name="fileToUpload" id="fileToUpload" accept="audio/*">
	<br>
	<input type="submit" value="Upload file" name="submit">
</form>

    </body>
</html>
