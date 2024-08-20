<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="height=device-height">
        <title>Table phones Yealink</title>
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
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" class="main_border">
            <tr>
                <td colspan="3" bgcolor="#0066ff"><img src="blocks/head011.png" width="500" height="97"></td>
            </tr>
        </table>
        <?php
	$request = shell_exec("asterisk -rx 'database show registrar'");
	$request = explode("/registrar/contact/", $request);
	echo "<table border='1' class='sortable'><tr><th>IP-address</th><th>Number</th><th>Useragent</th></tr>";
        foreach ($request as $row) {
	    $row = explode(": ", $row);
	    $dates = explode(":", $row[1]);
            echo "<tr>";
	    $exten = explode(",", $dates[7])[0];
	    $ifind = array_search('135', $exten);
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
