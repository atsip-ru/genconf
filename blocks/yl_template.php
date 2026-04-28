<?php
$template = <<<EOD
#!version:1.0.0.1

### This file is the exported MAC-all.cfg.
### For security, the following parameters with password haven't been display in this file.
voice.handfree.tone_vol = 9
voice.ring_vol = 7
### Time Settings
local_time.dhcp_time = 1
local_time.time_zone = +5
local_time.time_zone_name = Russia(Chelyabinsk)
local_time.summer_time = 0
local_time.ntp_server1 = ${sip_serv}
local_time.ntp_server2 = ${ntp_serv}
local_time.date_format = 6
### Config Account 1
account.1.enable = 1
account.1.codec.pcma.priority = 1
account.1.codec.pcmu.priority = 2
account.1.codec.g722.priority = 3
account.1.label = ${exten}
account.1.display_name = ${exten}
account.1.user_name = ${exten}
account.1.auth_name = ${exten}
account.1.password = ${ext_secret}
account.1.sip_server.1.address = ${sip_serv}
account.1.unregister_on_reboot = 1
###  Static Configuration  ###
auto_provision.dhcp_option.enable = 1
#auto_provision.pnp_enable = 1
auto_provision.power_on = 1
auto_provision.repeat.enable = 1
auto_provision.repeat.minutes = 720
auto_provision.server.url = tftp://${sip_serv}
#programablekey.3.line = 0
#programablekey.3.type = 33
zero_touch.enable = 1
zero_touch.wait_time = 5
### Network
network.dhcp_host_name = tlf_${exten}
# network.ip_address_mode
# static or dhcp and IP address
# network.internet_port.type = ${s_or_d}
# static or dhcp and IP address
#if static = 2
#network.internet_port.type = 2
${is_static_network_mode}
network.internet_port.gateway = ${sip_serv}
network.internet_port.ip = ${needed_ip}
network.internet_port.mask = 255.255.255.0
network.primary_dns = ${sip_serv}
network.secondary_dns = 8.8.8.8
#network.static_dns_enable = 1
network.vlan.internet_port_enable = ${enable_vlan}
network.vlan.internet_port_priority = 5
network.vlan.internet_port_vid = ${vlan}
network.vlan.pc_port_enable = 0
network.vlan.pc_port_priority = 3
network.vlan.pc_port_vid = 1
network.span_to_pc_port = 1
wui.https_enable = 0
voice_mail.number.1 = *97
sip.listen_port = 9950
features.relog_offtime = 15
lang.gui = Russian
lang.wui = Russian
${is_ringtone}
## SNMP ##
network.snmp.enable = 1
network.snmp.port = 161
network.snmp.trust_ip = 192.168.10.10
#### по умолчанию rtp-порты 11780-12780
### User and Admin Login
security.user_password = admin:${device_password_a}
security.user_password = user:${device_password_u}
EOD;
?>