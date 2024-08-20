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

        </style>
    </head>

    <body height="100%" bgcolor="CCCCCC">
    <?php
        $elem = '00156566173c.cfg';
    	function ident_vendor($mac){
	    global $filepost;
	    global $fileprefix;
	    global $regstring;
	    global $parse_ext;
	    global $elem;
//	    $elem = '00156566173c.cfg';
	    $get_vendor = substr($mac, 0, 6);
	    if ($get_vendor === '4c3b74') {
		$filepost = '';
		$fileprefix = '';
		$regstring = 'SIP1 Register User';
		$parse_ext = "grep $regstring $elem | cut -d ':' -f2";
		return 'snr';
	    } elseif ($get_vendor === '0001a8') {
		return 'welltech';
	    } elseif ($get_vendor === '00268b') {
		$filepost = '.xml';
		$fileprefix = '';
		$parse_ext = "grep -Eo 'UserName=\"[[:digit:]]{3,4}\"' $elem | cut -d '=' -f2";
		return 'escene';
	    } elseif (in_array($get_vendor, ['805ec0', '001565'])) {
		$filepost = '.cfg';
		$fileprefix = '';
		$regstring = 'account.1.user_name';
		$parse_ext = "grep $regstring ${elem} | cut -d '=' -f 2";
		return 'yealink';
	    } elseif ($get_vendor === 'f4b549') {
		return 'yeastar';
	    } elseif (in_array($get_vendor, ['001ee5', '20aa4b', 'bc671c'])) {
		return 'linksys';
	    } elseif (in_arrey($get_vendor, ['c074ad', 'ec74d7', '000b82'])) {
		$filepost = '.xml';
		$fileprefix = 'cfg';
		return 'grandstream';
	    } else {
		return 'FK';
	    }
	}
    ?>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" class="main_border">
            <tr>
                <td colspan="3" bgcolor="#0066ff"><img src="blocks/head011.png" width="500" height="97"></td>
            </tr>
        </table>

        <table>
            <thead>
                <h1>Создание конфига:</h1>
            </thead>
	    <a href="arptable.php">ARP-table</a><br>
	    <a href="registrar.php">Registration and Useragent</a>
            <tr>
                <td>
                    <form action="" method="get" name="gs_provisioning">
                        <label for="current_ip"><b>Введите текущий IP-адрес телефона:</b></label>
                        <input name="current_ip" type="text" maxlength="15" placeholder="172.16.0.255">
                        <br>
			
			<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
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
                        
                        
                        <label for="exten"><b>Введите требуемый номер телефона:</b>
                        <input name="exten" type="text" maxlength="4" placeholder="123">
                        </label>
                        <br>
<!--                        <label for="vendor"><b>Выберите производителя телефона:</b><br>
                    	    <input type="radio" name="vendor" value="gs">Grandstream<br>
                            <input type="radio" name="vendor" value="yl" checked>Yealink<br>
                        </label>
                        <br>
-->                        <input type="submit" name="submit" value="Запросить" method="post">
                    </form>

        <?php
        //Переменные
        $exten = $_GET['exten'];
//        $vendor = $_GET['vendor'];
        $current_ip = $_GET['current_ip'];

	//Подключение к БД
        include ("blocks/bd.php");

//	if ($ip_mode == 'dhcp'){
//	    $ip_addr = $current_ip;
//	    }

	//Имя файла для конфига
//	$mac = shell_exec("/usr/sbin/arp | /bin/grep '$ip_addr' | /usr/bin/awk '{print $3}'");
	$mac = shell_exec("/usr/sbin/arp | /bin/grep '$current_ip' | /usr/bin/awk '{print $3}'");

	//Проверка на пустой мак-адрес	
	if (empty($mac)){
	    $fullname_mac = $fullname;
	}

	//else {
	$mac2 = str_replace(":", "", $mac);
	$mac3 = substr($mac2, 0, -1);
//	var_dump($mac3);
	$get_vendor = ident_vendor($mac3);
	echo "<br>";
//	var_dump($get_vendor);
	echo "Vendor IP-hone is <b>${get_vendor}</b><br>";

	//Расширение файлов
/*	if ($get_vendor == 'grandstream'){
	    $filepost = ".xml";
	    $fileprefix = "cfg";
	} else if ($get_vendor == 'yealink'){
	    $filepost = ".cfg";
	    $fileprefix = "";
	}
*/
//	var_dump($fileprefix); echo "<br>";
//	var_dump($mac3); echo "<br>";
//	var_dump($filepost); echo "<br>";
	$filename_mac = $fileprefix . $mac3 . $filepost;
//	var_dump($filename_mac); echo "<br>";
	$fullname_mac = $filepath . $filename_mac;
//	var_dump($fullname_mac);
//	}
	
	//Имена файлов с путями и расширениями
	$filename = $exten . $filepost;
	$filename_mac = $fileprefix . $mac3 . $filepost;
	$filename_mac = $tftppath . $filename_mac;
	$fullname = $filepath . $filename;
//	var_dump($filename_mac);
	
	//Проверка на пустое поле производитель
//	if (empty($vendor)){
//	    $vendor = 'yealink';
//          exit ("Необходимо выбрать производителя телефона");
//        }

	//Проверка на пустой экстен
	if (empty($exten)){
            exit ("Номер телефона не может быть пустым");
//	    break;
        }
	else if (file_exists($filename) or file_exists($filename_mac)){
		echo "Файлы ${filename} или ${filename_mac} уже существуют и будут перезаписаны<br>";
	}
	$fconf = fopen($filename, 'w') or die("не удалось открыть файл");
	$fconf_mac = fopen($filename_mac, 'w') or die("не удалось открыть файл");

	$query = "SELECT data FROM sip WHERE id = '${exten}' and keyword = 'secret';";
	$result = mysqli_query($db, $query) or die("Query failed");
	$ext_secret = mysqli_fetch_array($result)[0];
//	echo $exten . ':' . $ext_secret;
	mysqli_free_result($result);
	mysqli_close($db);

	if ($get_vendor == 'grandstreams'){
    	    include ("blocks/gs_template.php");
	} else if ($get_vendor == 'yealink'){
    	    include ("blocks/yl_template.php");
	} else if ($get_vendor == 'snr'){
	    include ("blocks/snr_template.php");
	} else if ($get_vendor == 'escene'){
	    include ("blocks/es_template.php");
	}
	shell_exec("sudo /bin/chown nobody:nogroup $filename_mac");
	fwrite($fconf, $template);
	fclose($fconf);

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
		echo "Files ${filename} and $filename_mac сохранены";
	    }
	}

	echo '<br>  <hr align="left" width="100%" size="2" color="#ff0000" />';

	// Print list of configuration files 
//	$dir = '/var/www/localhost/htdocs/pbx/genconf';
	$dir = $tftppath;
//	$fileslist = shell_exec("ls $dir | grep 'xml\|cnf\|cfg'");
	$fileslist = shell_exec("ls $dir");
	$listfiles = explode("\n", $fileslist);

	echo "<h2>Files in tftp dir</h2>";
	echo "<table border='1'><tr><th>Config file</th><th>Exten</th></tr>";
	foreach($listfiles as $elem) {
	echo "<tr>";
//	echo $elem;
//    	echo "<br>";
//	ident_vendor($mac3);
//	$ext_of_file = shell_exec("grep $regstring $tftppath . $elem | cut -d '=' -f 2");
//	var_dump($parse_ext); echo "<br>";
//	var_dump(shell_exec($parse_ext));
	echo "<td>" . $elem . "</td>";
	$elem = $tftppath . $elem;
//	var_dump($elem);
	ident_vendor($mac3);
        echo "<td>" . shell_exec($parse_ext) . "</td>";
        echo "</tr>";
	}
	echo "</table>";

	?>
		</td>
	    </tr>
	</table>
    </body>
</html>
