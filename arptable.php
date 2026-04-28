<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="height=device-height">
	<title>Table phones Yealink</title>
    </head>

    <body height="100%" bgcolor="CCCCCC">
	<?php
	include("blocks/header.php");
	?>
	<a href="javascript:history.go(-1)">go back</a>
	<h2>ARP-table for phones</h2>
	<?php
//	ini_set('display_errors',1);
//	error_reporting(E_ALL);
	$iface="enp3s0";
	$arp_request = "/usr/sbin/arp | /bin/grep -e 'enp3s0\|vlan16\|vlan33' | /bin/grep -v incomplete | awk '{print $1,$3}'";
	$ip_and_arp = shell_exec($arp_request);
	$ip_and_arp = explode("\n", $ip_and_arp);
//	var_dump($ip_and_arp);
//	var_dump(explode("\n", $ip_and_arp));

        echo "<table border='1'><tr><th>IP-address</th><th>MAC</th></tr>";
	foreach ($ip_and_arp as $row) {
	    echo "<tr>";
	    $row = explode(" ", $row);
	    echo "<td>" . $row[0] . "</td>";
	    echo "<td>" . $row[1] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
?>
    </body>
</html>