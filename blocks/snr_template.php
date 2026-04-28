<?php
$template = <<<EOD
<<VOIP CONFIG FILE>>Digests                            

<GLOBAL CONFIG MODULE>
Static IP          :192.168.1.179
Static NetMask     :255.255.255.0
Static GateWay     :192.168.1.1
Default Protocol   :2
Primary DNS        :202.96.134.133
Alter DNS          :202.96.128.68
DHCP Mode          :1
DHCP Dns           :1
Domain Name        :
Host Name          :tlf_${exten}
Pppoe Mode         :0
HTL Start Port     :10000
HTL Port Number    :200
SNTP Server        :${sip_serv}
Enable SNTP        :1
Time Zone          :46
Enable Daylight    :0
SNTP Time Out      :${ntp_timeout}
DayLight Shift Min :60
DayLight Start Mon :3
DayLight Start Week:5
DayLight Start Wday:0
DayLight Start Hour:2
DayLight Start Min :0
DayLight End Mon   :10
DayLight End Week  :5
DayLight End Wday  :0
DayLight End Hour  :2
DayLight End Min   :0
MMI Set            :12
MTU Length         :1500
Net Traffic Timeout:0
Wan Port Speed     :0
Lan Port Speed     :0
Wan MDIX enable    :0
Lan MDIX enable    :1

<LAN CONFIG MODULE>
Lan Ip             :192.168.0.1
Lan NetMask        :255.255.255.0
Bridge Mode        :1

<TELE CONFIG MODULE>
Dial End With #    :1
Dial Fixed Length  :0
Fixed Length       :11
Dial With Timeout  :1
Dial Timeout value :5
Dialpeer With Line :0
Poll Sequence      :0
Accept Any Call    :1
Phone Prefix       :
Local Area Code    :
IP call network    :.
--Port Config--    :
P1 No Disturb      :0
P1 Mute            :0
P1 No Dial Out     :0
P1 No Empty Calling:0
P1 Enable CallerId :1
P1 Forward Service :0
P1 SIP TransNum    :
P1 SIP TransAddr   :
P1 SIP TransPort   :5060
P1 CallWaiting     :1
P1 CallTransfer    :1
P1 Call3Way        :1
P1 AutoAnswer      :0
P1 No Answer Time  :20
P1 Extention No.   :
P1 Auto HandDown   :0
P1 Auto Handdown Ti:3
P1 Hotline Num     :
P1 Record Server   :
P1 Enable Record   :0
P1 Busy N/A Line   :0
P1 DND Return Code :1
P1 Busy Return Code:2
P1 Reject Return Co:3

<DSP CONFIG MODULE>
Signal Standard    :13
Handdown Time      :200
G729 Payload Length:1
G723 Bit Rate      :1
G722 Timestamps    :0
VAD                :0
Ring Type          :1
Dtmf Payload Type  :101
Disable Handfree   :0
RTP PROBE          :0
HD Voice           :0
TX AGC             :0
RX AGC             :0
--Port Config--    :
P1 Output Vol      :5
P1 Input Vol       :3
P1 HandFree Vol    :5
P1 RingTone Vol    :5
P1 Codec           :-1
P1 Voice Record    :0
P1 Record Playing  :1
P1 UserDef Voice   :0
P1 First Codec     :0
P1 Second Codec    :1
P1 Third Codec     :9
P1 Forth Codec     :-1
P1 Fifth Codec     :-1
P1 Sixth Codec     :-1
P1 Seventh Codec   :35

<SIP CONFIG MODULE>
SIP  Port          :5060
Stun Address       :
Stun Port          :3478
Stun Effect Time   :50
SIP Wait Stun Time :800
SIP  Differv       :0
Extern Address     :
Url Convert        :1
Reg Retry Time     :30
Strict BranchPrefix:1
--SIP Line List--  :
SIP1 Phone Number  :${exten}
SIP1 Display Name  :${exten}
SIP1 Sip Name      :${exten}
SIP1 Register Addr :${sip_serv}
SIP1 Register Port :5060
SIP1 Register User :${exten}
SIP1 Register Pwd  :${ext_secret}
SIP1 Register TTL  :900
SIP1 Enable Reg    :1
SIP1 Proxy Addr    :
SIP1 Proxy Port    :5060
SIP1 Proxy User    :
SIP1 Proxy Pwd     :
SIP1 Signal Enc    :0
SIP1 Signal Key    :
SIP1 Media Enc     :0
SIP1 Media Key     :
SIP1 Local Domain  :
SIP1 Fwd Service   :0
SIP1 Ring Type     :0
SIP1 Fwd Number    :
SIP1 Hotline Number:
SIP1 Enable Detect :0
SIP1 Detect TTL    :60
SIP1 Server Type   :0
SIP1 User Agent    :VoIP Phone
SIP1 PRACK         :0
SIP1 KEEP AUTH     :0
SIP1 Session Timer :0
SIP1 Gruu          :0
SIP1 DTMF Mode     :1
SIP1 DTMF SIP-INFO :0
SIP1 Use Stun      :0
SIP1 Via Port      :1
SIP1 Subscribe     :0
SIP1 Sub Expire    :300
SIP1 Single Codec  :0
SIP1 CLIR          :0
SIP1 Strict Proxy  :0
SIP1 Direct Contact:0
SIP1 History Info  :0
SIP1 DNS SRV       :0
SIP1 Transfer Expir:0
SIP1 Ban Anonymous :0
SIP1 Dial Without R:0
SIP1 DisplayName Qu:0
SIP1 Presence Mode :0
SIP1 RFC Ver       :1
SIP1 Signal Port   :9950
SIP1 Port in Reques:0
SIP1 Use Mixer     :0
SIP1 Mixer Uri     :
SIP1 Long Contact  :0
SIP1 Auto TCP      :0
SIP1 Click to Talk :0
SIP1 Mwi No.       :
SIP1 Park No.      :
SIP1 Help No.      :
SIP1 Use user=phone:0
SIP2 Phone Number  :
SIP2 Display Name  :
SIP2 Sip Name      :
SIP2 Register Addr :
SIP2 Register Port :5060
SIP2 Register User :
SIP2 Register Pwd  :
SIP2 Register TTL  :60
SIP2 Enable Reg    :0
SIP2 Proxy Addr    :
SIP2 Proxy Port    :5060
SIP2 Proxy User    :
SIP2 Proxy Pwd     :
SIP2 Signal Enc    :0
SIP2 Signal Key    :
SIP2 Media Enc     :0
SIP2 Media Key     :
SIP2 Local Domain  :
SIP2 Fwd Service   :0
SIP2 Ring Type     :0
SIP2 Fwd Number    :
SIP2 Hotline Number:
SIP2 Enable Detect :0
SIP2 Detect TTL    :60
SIP2 Server Type   :0
SIP2 User Agent    :VoIP Phone
SIP2 PRACK         :0
SIP2 KEEP AUTH     :0
SIP2 Session Timer :0
SIP2 Gruu          :0
SIP2 DTMF Mode     :1
SIP2 DTMF SIP-INFO :0
SIP2 Use Stun      :0
SIP2 Via Port      :1
SIP2 Subscribe     :0
SIP2 Sub Expire    :300
SIP2 Single Codec  :0
SIP2 CLIR          :0
SIP2 Strict Proxy  :0
SIP2 Direct Contact:0
SIP2 History Info  :0
SIP2 DNS SRV       :0
SIP2 Transfer Expir:0
SIP2 Ban Anonymous :0
SIP2 Dial Without R:0
SIP2 DisplayName Qu:0
SIP2 Presence Mode :0
SIP2 RFC Ver       :1
SIP2 Signal Port   :0
SIP2 Port in Reques:0
SIP2 Use Mixer     :0
SIP2 Mixer Uri     :
SIP2 Long Contact  :0
SIP2 Auto TCP      :0
SIP2 Click to Talk :0
SIP2 Mwi No.       :
SIP2 Park No.      :
SIP2 Help No.      :
SIP2 Use user=phone:0

<IAX2 CONFIG MODULE>
Server   Address   :
Server   Port      :4569
User     Name      :
User     Password  :
User     Number    :
Voice    Number    :0
Voice    Text      :mail
EchoTest Number    :1
EchoTest Text      :echo
Local    Port      :4569
Enable   Register  :0
Refresh  Time      :60
Enable   G.729     :0

<PPPoE CONFIG MODULE>
Pppoe User         :user123
Pppoe Password     :password
Pppoe Service      :ANY
Pppoe Ip Address   :

<MMI CONFIG MODULE>
Telnet Port        :23
Web Port           :80
Remote Control     :1
Enable MMI Filter  :0
Telnet Prompt      :
--MMI Account--    :
Account1 Name      :admin
Account1 Pass      :${device_password_a}
Account1 Level     :10
Account2 Name      :guest
Account2 Pass      :${device_password_u}
Account2 Level     :5

<QOS CONFIG MODULE>
Enable VLAN        :0
Enable diffServ    :0
DiffServ Value     :184
VLAN ID            :256
802.1P Value       :0
VLAN Recv Check    :1
Data VLAN ID       :254
Data 802.1P Value  :0
Diff Data Voice    :0
Enable PVID        :0
PVID Value         :0

<DEBUG CONFIG MODULE>
MGR Trace Level    :0
SIP Trace Level    :0
IAX Trace Level    :0
Trace File Info    :0

<AAA CONFIG MODULE>
Enable Syslog      :0
Syslog address     :0.0.0.0
Syslog port        :514

<ACCESS CONFIG MODULE>
Enable In Access   :0
Enable Out Access  :0

<DHCP CONFIG MODULE>
Enable DHCP Server :0
DHCP Relay Target  :
Enable DNS Relay   :1
DHCP Update Flag   :0
TFTP  Server       :${sip_serv}

<NAT CONFIG MODULE>
Enable Nat         :0
Enable Ftp ALG     :1
Enable H323 ALG    :0
Enable PPTP ALG    :1
Enable IPSec ALG   :1

<PHONE CONFIG MODULE>
Keypad Password    :123
KeyLock Password   :123
Enable KeyLock     :0
LCD Logo           :VOIP PHONE
LCD Constrast      :5
LCD Luminance      :1
Backlight Off Time :30
Time Display Style :0
Display Time       :1
Resolve Address    :
MWI Number         :
--Function Key--   :
Fkey1 Type         :2
Fkey1 Value        :SIP1:Line1
Fkey1 Title        :
Fkey2 Type         :2
Fkey2 Value        :SIP2:Line2
Fkey2 Title        :
Fkey3 Type         :1
Fkey3 Value        :
Fkey3 Title        :
Fkey4 Type         :1
Fkey4 Value        :
Fkey4 Title        :
Fkey5 Type         :1
Fkey5 Value        :
Fkey5 Title        :
Fkey6 Type         :1
Fkey6 Value        :
Fkey6 Title        :
Fkey7 Type         :1
Fkey7 Value        :
Fkey7 Title        :
Fkey8 Type         :1
Fkey8 Value        :
Fkey8 Title        :
Fkey9 Type         :1
Fkey9 Value        :
Fkey9 Title        :
Fkey10 Type        :1
Fkey10 Value       :
Fkey10 Title       :
Fkey11 Type        :1
Fkey11 Value       :
Fkey11 Title       :
Fkey12 Type        :1
Fkey12 Value       :
Fkey12 Title       :
Fkey13 Type        :1
Fkey13 Value       :
Fkey13 Title       :
Fkey14 Type        :1
Fkey14 Value       :
Fkey14 Title       :
Fkey15 Type        :1
Fkey15 Value       :
Fkey15 Title       :
Fkey16 Type        :1
Fkey16 Value       :
Fkey16 Title       :
Fkey17 Type        :1
Fkey17 Value       :
Fkey17 Title       :
Memo Number        :0

<AUTOUPDATE CONFIG MODULE>
Download Username  :
Download password  :
Download Server IP :${sip_serv}
Config File Name   :SNR.cfg
Config File Key    :
Download Protocol  :2
Download Mode      :1
Download Interval  :12
DHCP Option 66     :1

<VPN CONFIG MODULE>
VPN mode           :0
L2TP LNS IP        :
L2TP User Name     :
L2TP Password      :
Enable VPN Tunnel  :0
VPN Server IP      :0.0.0.0
VPN Server Port    :80
Server Group ID    :VPN
Server Area Code   :12345
<<END OF FILE>>
EOD;
?>