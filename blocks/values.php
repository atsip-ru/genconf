<?php
        //Глобальные параметры
        $exten = 123;
        $sip_serv = '192.168.15.250';
	$sip_refresh = '900';
        $ntp_serv = 'ntp3.vniiftri.ru';
	$ntp_timeout = '1800';
        //Каталог конфигов
        $filepath = "/var/www/html/genconf/";
        $tftppath = "/home/asterisk/tftpboot/";
        $device_password_a = "admin1";
        $device_password_u = "user";
        //Настройка ip-адресации
//        $ip_mode = 'mixed';
        $ip_mode = 'dhcp';
        // 'static' or 'dhcp' or 'mixed'
        $ip_gate = '192.168.15.250';
        $ip_mask = '255.255.255.0';
        $ip_dns = '192.168.15.250';
        $ip_dns2 = '8.8.8.8';
?>
