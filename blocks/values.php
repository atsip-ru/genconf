<?php
        //Глобальные параметры
        $exten = 123;
//        $sip_serv = '192.168.15.250';
	$sip_refresh = '900';
        $ntp_serv = 'ntp3.vniiftri.ru';
	$ntp_timeout = '1800';
        //Каталог конфигов
        $filepath = "/var/www/html/genconf/";
        $tftppath = "/home/asterisk/tftpboot/";
        $ringtonepath = "/home/asterisk/tftpboot/ringtones/";
        $device_password_a = "59ajBXPh";
        $device_password_u = "wosOe5I7";
        //Настройка ip-адресации
//        $ip_mode = 'mixed';
        $ip_mode = 'static';
	$s_or_d = 2;
        // 'static' or 'dhcp' or 'mixed'
        $ip_gate = '192.168.15.250';
        $ip_mask = '255.255.255.0';
        $ip_dns = '192.168.15.250';
        $ip_dns2 = '8.8.8.8';
	$vlan = '16';
	$enable_vlan = 'no';
?>
