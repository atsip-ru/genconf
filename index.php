<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="height=device-height">
        <title>Модуль генерации конфигураций для Grandstream</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <style type="text/css">
	   /* скрываем чекбоксы и блоки с содержанием */
            .hide {
                display: none;
            }
            .hide + label ~ div{
                display: none;
            }
            /* оформляем текст label */
            .hide + label {
                border-bottom: 1px dotted green;
                padding: 0;
                color: green;
                cursor: pointer;
                display: inline-block;
            }
            /* вид текста label при активном переключателе */
            .hide:checked + label {
                color: red;
                border-bottom: 0;
            }
            /* когда чекбокс активен показываем блоки с содержанием  */
            .hide:checked + label + div {
                display: block;
                background: #efefef;
                -moz-box-shadow: inset 3px 3px 10px #7d8e8f;
                -webkit-box-shadow: inset 3px 3px 10px #7d8e8f;
                box-shadow: inset 3px 3px 10px #7d8e8f;
                padding: 10px;
            }
            /* demo контейнер */
            .demo {
                margin: 2% 0.3%;
            }
            input[name="email-value"] {
		display: none;
	    }
	    input[name="email-enabled"]:checked~input[name="email-value"] {
		display: inline-block;
	    }
	    
	    p {
		display: none;
	    }
	    #yealink:checked ~ #text1,
	    #yeastar:checked ~ #text2,
	    #grandstream:checked ~ #text3{
	      display: block;
	    }

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
        $elem = '00156566173c.cfg';
	//Get prefix and postfix for conffiles, exten for MAC-address and return Cendor IP-phones
	function ident_vendor($mac){
	    global $filepost;
	    global $fileprefix;
	    global $regstring;
	    global $parse_ext;
	    global $elem;
	    global $enable_vlan;
	    $get_vendor = substr($mac, 0, 6);
//		var_dump($enable_vlan);
	    if ($get_vendor === '4c3b74') {
		$filepost = '';
		$fileprefix = '';
		$parse_ext = "grep 'SIP1 Register User' $elem | cut -d ':' -f2";
		return 'snr';
	    } elseif ($get_vendor === '0001a8') {
		return 'welltech';
	    } elseif ($get_vendor === '00268b') {
		$filepost = '.xml';
		$fileprefix = '';
		$parse_ext = "grep -Eo 'UserName=\"[[:digit:]]{3}\"' ${elem} | grep -Eo '[[:digit:]]{3,4}'";
		return 'escene';
	    } elseif (in_array($get_vendor, ['805ec0', '001565'])) {
		$filepost = '.cfg';
		$fileprefix = '';
		$regstring = 'account.1.user_name';
		$parse_ext = "grep $regstring ${elem} | cut -d '=' -f 2";
		$enable_vlan = $enable_vlan == 'yes' ? 1 : 0;
		return 'yealink';
	    } elseif (in_array($get_vendor, ['cfgf4b', 'f4b549'])) {
		$filepost = '.xml';
		$fileprefix = 'cfg';
		$parse_ext = "grep --max-count=1 registerusername ${elem} | grep -Eo '[0-9]{3,4}'";
		return 'yeastar';
	    } elseif (in_array($get_vendor, ['001ee5', '20aa4b', 'bc671c'])) {
		return 'linksys';
	    } elseif (in_array($get_vendor, ['c074ad', 'ec74d7', '000b82'])) {
		$filepost = '.xml';
		$fileprefix = 'cfg';
		return 'grandstream';
	    } else {
		return 'X3';
	    }
	}
	
	//Get SIP-serv address and vlan (if needed) based current IP-address
	function choose_addresses($ip_addr){
	    global $sip_serv;
	    global $vlan;
	    global $enable_vlan;
	    $current_subnet = explode('.', $ip_addr);
//	    var_dump($ip_addr);
	    if ($current_subnet[0] != 192 or $current_subnet[1] != 168) {
		return "Error: wrong ip address $ip_addr";
	    } elseif ($vlan == 16){
		$sip_serv = "192.168.16.250";
		$snmp_serv = "192.168.16.2";
		$enable_vlan = 'yes';
//		var_dump($enable_vlan);
	    } elseif ($vlan == 33){
		$sip_serv = "192.168.33.250";
		$enable_vlan = 'yes';
//		var_dump($enable_vlan);
	    } elseif ($current_subnet[2] == 16) {
		$sip_serv = "192.168.16.250";
		$snmp_serv = "192.168.16.2";
		$vlan = 16;
		$enable_vlan = 'yes';
//		var_dump($enable_vlan);
	    } elseif ($current_subnet[2] == 33) {
		$sip_serv = "192.168.33.250";
		$snmp_serv = "192.168.33.2";
		$vlan = 33;
		$enable_vlan = 'yes';
	    } elseif ($current_subnet[2] == 15) {
		$sip_serv = "192.168.15.250";
		$vlan = "";
		$enable_vlan = 'no';
	    } elseif ($current_subnet[2] == 32 || $current_subnet[2] == 52) {
		$sip_serv = "192.168.10.200";
		$vlan = "";
		$enable_vlan = 'no';
	    } else {
		echo "Something wrong";
	    }
	return [$sip_serv, $vlan, $enable_vlan];
	}

	function choose_addresses_onvlan($ip_addr){
	    $var_dump(ip_addr);
	}

	include("blocks/header.php");
    ?>
        <table>
            <thead>
                <h1>Create config for IP-phones</h1>
            </thead>
	    <a href="arptable.php">ARP-table</a><br>
	    <a href="registrar.php">Registration and Useragent</a><br>
	    <a href="upload_ringtones.php">Upload ringtones (only Yealink)</a>
            <tr>
                <td>
                    <form action="" method="get" name="gs_provisioning">
			<label for="vendor"><b>Выберите производителя телефона:</b><br>
                            <input type="radio" name="vendor" value="yealink" id="yealink" checked>Yealink<br>
                            <input type="radio" name="vendor" value="yeastar" id="yeastar">Yeastar<br>
                    	    <input type="radio" name="vendor" value="grandstream" id="grandstream">Grandstream<br>
                        </label>
                        <br>
                        <label for="current_ip"><b>Введите текущий IP-адрес телефона:</b></label>
                        <input name="current_ip" type="text" maxlength="15" placeholder="172.16.0.255">
                        <br>
			
<!--			<?php
//			ini_set('display_errors',1);
//			error_reporting(E_ALL);
                        include("blocks/values.php");
                        if ($ip_mode == "mixed") {
                            echo "<p><label for='ip_mode'>Выберите тип адреса для текущего телефона:</label><br>
                    	          <input name='ip_mode' type='radio' value='static'>Статический<br>
                     		  <input name='ip_mode' type='radio' value='dhcp' checked>Автоматический<br>";
                    	}
                    	
			//$ip_mode = $_GET['ip_mode'];
                        if ($ip_mode != "dhcp") {
                            echo "<label for='ip_addr'><b>Введите требуемый IP-адрес телефона:</b>
                            <input name='ip_addr' type='text' maxlength='15' placeholder='172.16.0.255'>
                            <br>(Или оставьте пустым при автоматической настройке ip-адреса)</label>
                            <br>";
                        } else {
                            echo "<br>";
                        }
                        ?>
-->
                                    
                        <label for="exten"><b>Введите требуемый номер телефона:</b>
                        <input name="exten" type="text" maxlength="4" size="25" placeholder="123">
                        <input name="exten2" type="text" maxlength="4" size="25" placeholder="For 2nd line">
			<br>
                        </label>
                        <label for="mac_address"><b>Input MAC-address IPphone:</b>
                        <input name="mac_address" type="text" maxlength="17" placeholder="00:15:65:d5:32:01">
                        </label>
                        </label>
			<br><br>
                        <label for="needed_ip"><b>Input you needed IP-address and VLAN for IPPhone:</b>
                        <input name="needed_ip" type="text" maxlength="14" placeholder="192.168.16.254 or empty for DHCP" size="28">
			<select name="vlan">
			    <option value=1 selected>1 (none)</option>
			    <option value=16>16</option>
			    <option value=33>33</option> 
			</select>
                        </label>
			<br>
			(You need to write down IP-address needes subnet according to vlan)
                        <br>

			<label for="get_ringtone"><b>Select Ringtone:</b>

			<select name="ringtone">
			    <option value="NULL" selected>(none)</option>
			    <?php 
				$ringtonelist = shell_exec("ls -lh $ringtonepath | awk '{print $9}' | xargs");
//				var_dump($ringtonelist);
				$rt_array = explode(" ", $ringtonelist);
//				var_dump($rt_array);
				foreach ($rt_array as $rt) {
				    echo "<option value=$rt>$rt</option>";
			    	}
			    ?> 
			</select>
			</label>
			<br>
			<br>
                        <input type="submit" name="submit" value="Запросить" method="post">
                    </form>

        <?php
        //Values
        $exten = $_GET['exten'];
        $exten2 = $_GET['exten2'];
        $vendor = $_GET['vendor'];
        $current_ip = $_GET['current_ip'];
	$mac_address = $_GET['mac_address'];
	$needed_ip = $_GET['needed_ip'];
	$vlan = $_GET['vlan'];
	$enable_vlan = "no";
	$ringtone = $_GET['ringtone'];

	//Check set static ip-addr or not - choose DHCP
	if ($needed_ip) {
	    choose_addresses($needed_ip);
	} else {
	    choose_addresses($current_ip);
	    $ip_mode = 'dhcp';
	    $enable_dhcp = True;
	}

//	$sip_serv,$vlan,$enable_vlan = extract(array(choose_addresses($current_ip)));
//	var_dump(array(choose_addresses($current_ip)));
//	var_dump($sip_serv);

	//Connect to Database
        include ("blocks/bd.php");

	//Имя файла для конфига
	shell_exec("/bin/ping -c 1 '$current_ip'");
	$mac = trim(shell_exec("/usr/sbin/arp | /bin/grep '$current_ip' | /usr/bin/awk '{print $3}'"));
	$is_incomplete = trim(shell_exec("/usr/sbin/arp | /bin/grep '$current_ip' | /usr/bin/awk '{print $2}'"));
//	echo "mac:";
//	var_dump($mac);
//	echo "MAC:";
//	var_dump($mac_address);
	//Проверка на пустой м
	if (empty($mac)){
	    $fullname_mac = $fullname;
	}

	if (!isset($mac)){
	    $mac = $mac_address;
//	    echo "Is null";
	} elseif (empty($mac)) {
	    $mac = $mac_address;
//	    echo "Is null";
	} elseif ($mac == 'vlan16') {
	    $mac = $mac_address;
//	    echo "What?";
	} elseif ($mac == 'vlan16 ') {
	    $mac = $mac_address;
//	    echo "What ?";
	} elseif ($mac == 'vlan33') {
	    $mac = $mac_address;	
	} elseif ($is_incomplete == "(incomplete)") {
	    $mac = $mac_address;
//	    echo "Incomplete";
	} else { 
//	    $mac = substr($mac, 0, -1); 
//	    echo "whawhat?";
	}

//	echo "mac:";
//	var_dump($mac);
//	var_dump($mac_address);

	$mac3 = str_replace(":", "", $mac);
	$mac3 = strtolower($mac3);

	$get_vendor = ident_vendor($mac3);
	echo "Vendor IP-phone is <b>".ucfirst($get_vendor)."</b><br>";
	
	
/*	//Расширение файлов
	if ($get_vendor == 'grandstream'){
	    $filepost = ".xml";
	    $fileprefix = "cfg";
	} else if ($get_vendor == 'yealink'){
	    $filepost = ".cfg";
	    $fileprefix = "";
	} else if ($get_vendor == 'yeastar'){
	    $filepost = ".xml";
	    $fileprefix = "cfg";
	}
*/

//	var_dump($fileprefix); echo "<br>";
//	var_dump($mac3); echo "<br>";
//	var_dump($filepost); echo "<br>";
	$filename_mac = $fileprefix . $mac3 . $filepost;
	$filename_bp = $fileprefix . $mac3 . $filepost;
//	var_dump($filename_mac); echo "<br>";
	//Web-directory/valid config name
	$fullname_mac = $filepath . $filename_mac;
//	var_dump($fullname_mac);
//	}
	
	//Имена файлов с путями и расширениями
	$filename = $exten . $filepost;
	$filename_mac = $fileprefix . $mac3 . $filepost;
	$filename_mac = $tftppath . $filename_mac;
	//web-directory/exten.cfg
	$fullname = $filepath . $filename;
//	echo "config:";
//	var_dump($fullname_mac); echo "<br>";
	
	//Проверка на пустое поле производитель
//	if (empty($vendor)){
//	    $vendor = 'yealink';
//          exit ("Необходимо выбрать производителя телефона");
//        }
	//Get exten count extens and return exten secret
	function get_exten($exten, $order_exten = 1, $exten2 = null){
	    global $ext_secret;
	    global $ext2_secret;
	    global $filename;
	    global $filename_mac;
	    global $db;
	    global $fconf;
	    global $fconf_mac;
//	    var_dump($exten);
//	    var_dump($exten2);
//	    echo "Order exten: ";
//	    var_dump($order_exten);
	    //Проверка на пустой экстен
	    if (empty($exten)){
        	exit ("Номер телефона не может быть пустым");
    	    } else if (file_exists($filename) or file_exists($filename_mac)){
		echo "File ${filename} or ${filename_bp} are exists and be rewrite.<br>";
	    }
	    $fconf = fopen($filename, 'w') or die("Can't open the file");
	    $fconf_mac = fopen($filename_mac, 'w') or die("Can't open the file");

//	    $query = "SELECT data FROM sip WHERE id = '${exten}' and keyword = 'secret';";
//	    var_dump($db);
//	    echo "<br>";
//	    var_dump($query);
//	    $result = mysqli_query($db, $query) or die("Query secret failed");
//	    echo "<br>";
//	    echo "result: ";
//	    var_dump($result);
	    if ($order_exten == 1){
		$query = "SELECT data FROM sip WHERE id = '${exten}' and keyword = 'secret';";
		$result = mysqli_query($db, $query) or die("Query secret1 failed");
		$ext_secret = mysqli_fetch_array($result)[0];
	    } else if ($order_exten == 2) {
	        $query = "SELECT data FROM sip WHERE id = '${exten}' and keyword = 'secret';";
		$query2 = "SELECT data FROM sip WHERE id = '${exten2}' and keyword = 'secret';";
		$result = mysqli_query($db, $query) or die("Query secret1 failed");
		$result2 = mysqli_query($db, $query2) or die("Query secret2 failed");
		$ext_secret = mysqli_fetch_array($result)[0];
		$ext2_secret = mysqli_fetch_array($result2)[0];
	    // Needed write to file in $filename or $filename_mac
	    } else {
		echo "Something error";
	    }
//	    var_dump($ext_secret);
//	    var_dump($ext2_secret);
	    mysqli_free_result($result);
	    mysqli_free_result($result2);
	    mysqli_close($db);
	}

//	var_dump($exten);
//	var_dump($exten2);

//	get_exten($exten, 1);
	
	if ($exten2){
	    get_exten($exten, 2, $exten2);
	} else if ($exten){
	    get_exten($exten, 1);
	}

//	var_dump($ringtone);
//	var_dump($sip_serv);

	function get_ringtone($ringtone) {
	    global $sip_serv;
	    if ($ringtone == 'NULL') {
	    return " ";
	    } else {
	    return "ringtone.url = tftp://$sip_serv/ringtones/$ringtone\nphone_setting.ring_type = $ringtone";
	    }
	}

	$is_ringtone = get_ringtone($ringtone);
//	var_dump($is_ringtone);

	function network_mode($vlan, $enable_vlan) {
//	    var_dump($vlan);
//	    var_dump($enable_vlan);
	    if (empty($vlan) or $enable_vlan == 'no') {
	    return "##For DHCP internet_port is 0"; //DHCP
	    } 
	    elseif ($vlan == 16 or $vlan == 33){
	    return "# Network address mode is DHCP";
	    } else {
	    return "network.internet_port.type = 2"; //static
	    }
	}

	$is_static_network_mode = network_mode($vlan, $enable_vlan);
	echo "<br>";
//	var_dump($is_static_network_mode);

//	echo "<br>";
//	var_dump($is_ringtone);

	// Choose template of vendor
	if ($get_vendor == 'grandstreams'){
    	    include ("blocks/gs_template.php");
	} else if ($get_vendor == 'yealink'){
    	    include ("blocks/yl_template.php");
	} else if ($get_vendor == 'snr'){
	    include ("blocks/snr_template.php");
	} else if ($get_vendor == 'escene'){
	    include ("blocks/es_template.php");
	} else if ($get_vendor == 'yeastar'){
	    include ("blocks/ys_template.php");
	}
//	echo "Vendor: ";
//	var_dump($get_vendor);
//	var_dump($template);
	shell_exec("sudo /bin/chown nobody:nogroup $filename_mac");
	//Record to file $fconf of file $template
	fwrite($fconf, $template);
//	echo "File: ";
//	var_dump($fconf);
	fclose($fconf);
//	echo "File: ";
//	var_dump($fconf);

	fwrite($fconf_mac, $template);
	fclose($fconf_mac);
//	echo "fullname: "; var_dump($fullname_mac); echo "<br>";
//	echo "tftppath: "; var_dump($tftppath); echo "<br>";
	$tftpname = $tftppath . $filename_mac;
//	echo "tftpname: "; var_dump($tftpname);
	shell_exec("sudo /bin/cp $fullname_mac $tftpname");
	shell_exec("sudo /bin/chown nobody.nogroup $tftpname");
	shell_exec("sudo /bin/chmod 777 $tftpname");

	if (empty($exten)){
            echo "";
        }
	else {
	    if (file_exists($filename)){
		echo "Files ${filename} and $filename_bp be saved.";
	    }
	}

	echo '<br>  <hr align="left" width="100%" size="2" color="#ff0000" />';

	// Print list of configuration files 
//	$dir = '/var/www/localhost/htdocs/pbx/genconf';
	$dir = $tftppath;
	$fileslist = shell_exec("ls $dir | xargs");
//	var_dump($fileslist);
	$listfiles = explode(" ", $fileslist);

	echo "<h2>Files in tftp dir</h2>";
	echo "<table border='1'><tr><th>Config file</th><th>Vendor</th><th>Exten</th></tr>";
	foreach($listfiles as $elem) {
	echo "<tr>";
//	echo $elem;
//    	echo "<br>";
//	ident_vendor($mac3);
//	$ext_of_file = shell_exec("grep $regstring $tftppath . $elem | cut -d '=' -f 2");
//	var_dump($parse_ext); echo "<br>";
//	var_dump(shell_exec($parse_ext));
	echo "<td>" . $elem . "</td>";
//	$elem = $tftppath . $elem;
	$mac = explode(".", $elem);
	$elem = $tftppath . $elem;
//	var_dump($mac[0]); echo "<br>";
	$get_vendor2 = ident_vendor($mac[0]);
//	var_dump(ident_vendor($mac[0]));
//	echo $get_vendor2; echo ":";
//	var_dump($parse_ext);
        echo "<td>" . $get_vendor2 . "</td>";
	$exten = shell_exec($parse_ext);
        echo "<td>" . $exten . "</td>";
	$parse_ext = " ";
//        var_dump($parse_ext);
        echo "</tr>";
	}
	echo "</table>";

	?>
		</td>
	    </tr>
	</table>
    </body>
</html>
