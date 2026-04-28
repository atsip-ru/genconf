<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="height=device-height">
        <title>Table phones</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <style type="text/css">
	    /* Sortable tables */
	    table.sortable thead {
		background-color:#eee;
		color:#666666;
		font-weight: bold;
		cursor: default;
	    }
        </style>

    </head>

    <body height="100%" bgcolor="CCCCCC">
	<?php
	include("blocks/header.php");
	?>
	<a href="javascript:history.go(-1)">go back</a>
	<h2>Table phones</h2>
	<?php
//        ini_set('display_errors',1);
//        error_reporting(E_ALL);
	$request = shell_exec("asterisk -rx 'database show registrar'");
// 	var_dump(explode("/registrar/contact/", $request));
	$request = explode("/registrar/contact/", $request);
//	var_dump($request);

	echo "<table border='1' class='sortable'><tr><th>IP-address</th><th>Number</th><th>Useragent</th></tr>";
        foreach ($request as $row) {
	    $row = explode(": ", $row);
	    $dates = explode(":", $row[1]);
//            var_dump($dates);
            echo "<tr>";
//            $row = explode(" ", $row);
//          var_dump($row);
	    $exten = explode(",", $dates[7])[0];
//	    var_dump($exten);
	    $ifind = array_search('135', $exten);
//	    var_dump($ifind);
	    if (!empty($ifind)){
		var_dump($ifind);
	    }
            echo "<td>" . explode(",", $dates[1])[0] . "</td>";
            echo "<td>" . explode(",", $dates[7])[0] . "</td>";
	    echo "<td>" . explode(",", $dates[14])[0] . "</td>";
            echo "</tr>";
            } 
            echo "</table>"; 

	?>
    </body>
</html>
