<?php
$template = <<<EOD
<all> 
	<SipDSPs> 
			<dsp EchoSuppression="0" CodecType="0"
CodecType1="1" CodecType2="3" CodecType3="4" CodecType4="2"
CodecType5="255" CodecType6="255" CodecType7="255" CodecType8="255"
HandInputVoice="5" HandOutputVoice="3" EarphoneInputVoice="5"
EarphoneOutputVoice="3" RingTypeVoice="7" DiallingTone="1" RTPsize="1"
HandFreeInputVoice="5" HandFreeOutputVoice="3" VoEnableAEC="1"
VoEnableAGC="1" HighG723="1" VoEnableVAD="0" ringfileName0=""
ringfileName1="" ringfileName2="" ringfileName3="" ringfileName4=""
ringfileName5="" ringfileName6="" ringfileName7="" ringfileName8=""
ringfileName9="" CurrentRingName="Ring1" enableCode0="G711A"
enableCode1="G711U" enableCode2="G729" enableCode3="G722"
enableCode4="G723" enableCode5="" enableCode6="" enableCode7=""
enableCode8="" disableCode0="iLBC" disableCode1="G726_32" disableCode2=""
disableCode3="" disableCode4="" disableCode5="" disableCode6=""
disableCode7="" disableCode8="" disableCode9="" ToneCountry="1"
JITTERBUFFER="0" MinDelay="60" MaxDelay="500" NormalDelay="120"
SideTone="0" InternalRingerText0="" InternalRingerFile0="Ring1"
InternalRingerText1="" InternalRingerFile1="Ring1" InternalRingerText2=""
InternalRingerFile2="Ring1" InternalRingerText3=""
InternalRingerFile3="Ring1" InternalRingerText4=""
InternalRingerFile4="Ring1" InternalRingerText5=""
InternalRingerFile5="Ring1" InternalRingerText6=""
InternalRingerFile6="Ring1" InternalRingerText7=""
InternalRingerFile7="Ring1" InternalRingerText8=""
InternalRingerFile8="Ring1" InternalRingerText9=""
InternalRingerFile9="Ring1" CustomTone_Dial="" CustomTone_RingBack=""
CustomTone_Busy="" />
	 </SipDSPs>
	 
	<pnps> 
			<pnp AutoGainBasicFlag="1" AutoUpVersionFlag="1"
UsePnPFlag="0" ReportLocalIP="*99" mode="0" address="" key=""
autoConfig="0" autoContract="0" autoUpgrade="0" />
	 </pnps>
	 
	<Privisions> 
			<privision AutoPrivisionFlag="1"
DHCPOptionFlag="1" Freqency="168" time="24" protocol="0"
Firmware="${sip_serv}" DHCPOptionValue="66" username="" password=""
Downloadconfig="1" DownloadBroadsoft="0" DownloadFirmwar="1"
DownloadKernel="1" DownloadPhonebook="1" DownloadPersonPhonebook="1"
DownloadExtension="1" Bootingchecked="1" ExtensionNumber=""
BootingcheckedMode="0" DownloadFilename="0" PNP="1" PNPPIN=""
PNPInterval="60" ZeroActive="0" WaitTime="90" />
	 </Privisions>
	 
	<Cwmps> 
			<cwmp CwmpConfigFlag="0" CwmpEveryReboot="0"
SerialNumber="00100400YJ012050000000268b04b90d"
CwmpHost="https://tms.ctcims.cn" Port="80" HttpsPort="443" username=""
password="" protocol="3" Periodic="0" freqency="3600" />
	 </Cwmps>
	 
	<Networks> 
			<network DefaultGateways="192.168.0.1"
NetConfigType="2" IPAddress="192.168.0.200" IPDNS="192.168.0.1"
SecondDNS="0.0.0.0" SubnetMask="255.255.255.0" UsrKey="" UsrName=""
MTU="1500" WebPort="80" AutoGetDNS="1" Hostname="tlf_${exten}"
Manufacturer="" UserClassInformation="" />
	 
			<newTelnet TelnetEnable="0" TelnetPort="23" />
	 </Networks>
	 
	<Pagings> 
			<paging PagingEnableOne="0" PagingDomainOne=""
PagingGroupPortOne="10000" PagingEnableTwo="0" PagingDomainTwo=""
PagingGroupPortTwo="10000" PagingEnableThree="0" PagingDomainThree=""
PagingGroupPortThree="10000" PagingEnableFour="0" PagingDomainFour=""
PagingGroupPortFour="10000" PagingEnableFive="0" PagingDomainFive=""
PagingGroupPortFive="10000" />
	 </Pagings>
	 
	<NATs> 
			<nat PCPortMode="0" PCPortIPAddress=""
PCPortIPMask="" DHCPServerEnable="0" DHCPStartAddress=""
DHCPEndAddress="" />
	 </NATs>
	 
	<Proxys> 
			<proxy ProxyServerEnable="0"
ProxyServerPort="1080" AnonymousLogin="1" ProxyServerDomain=""
Username="" Password="" />
	 </Proxys>
	 
	<sipServers> 
			<sipserver DomainName="" ProxyServerAddress=""
SecondDomainName="" STUNAddress="" STUNEnableFlag="0"
SipRefreshTime="${sip_refresh}" LocalPort="9950" LinkUse="0" BeginPort="10000"
EndPort="10128" Qos="40" SubExpire="3600" AffiliatedPortEnable="1"
P-Asserted-Identity="1" SipSessionTimeT1="0.5" SipSessionTimeT2="4"
SipSessionTimeT4="5" />
	 </sipServers>
	 
	<syss> 
			<sys KeyboardPasswd="" KeyboardEncrypt="0"
FirstDialTime="15" MaxConnectTime="30" NoAnswerTime="70"
NoAnswerTimeEnable="1" UpgradeCheck="1" NetworkPacket="0"
PstnRingType="1" pictureType="0" startPicturePath="" idlePicturePath=""
waitPicturePath1="" waitPicturePath2="" EmbeddedMode="0"
EmbeddedFreqency="300" EmbeddedUrl="" voicemail="0" PoundSendType="0"
voicemailToneEnable="0" PhonebookSearch="0" CallerNoAnswerTime="180"
CallerNoAnswerTimeEnable="1" StatusLightEnable="0" />
	 </syss>
	 
	<DTMEFs> 
			<DTMF DTMFSendType="0" DTMFShowSendType="0"
RFC2833CodeId="101" SIPInfoReSend="0" />
	 </DTMEFs>
	 
	<calls> 
			<call PrefixPSTNNum="" PrefixVOIPNum=""
AutoAnswerNum="123" callwaiting="1" PlaycallwaitingTone="1"
AfterTurnType="0" ShowPhonelist="0" ShowPhonelistWay="0"
AutoAnswerEnableFlag="0" AutoAnswerEnableGroupName="" AutoAnswerMode="0"
CallBusyTone="1" MisscallDisEnable="1" DNDSoftkeyEnable="1"
CallListSaveEnable="1" BLFTransferEnable="0" BLFTransferMode="0"
AvoidDisturbEnableFlag="0" SIPQos="26" RTPQos="46" forkEnableFlag="1"
forktime="500" Unconditional="0" UnconditionalNum="" busytransfer="0"
busytransferNum="" UnAnswer="0" UnAnswerNum="" RingFrequency="15"
PickupEnable="1" ConfEndMethod="0" PlaycallwaitingToneFreqency="10"
ReturnCodeWhenRefuse="0" ReturnCodeWhenDND="0" FlashHookEnable="0"
FlashHookTime="500" HoldPlayToneEnable="1" HoldPlayToneFreqency="30"
SuppressDTMFDisplay="0" SIP100RelEnable="1" CallerIDSource="1" LLDP="1"
LLDPInterval="60" CallLeaveMessageNum="" />
	 </calls>
	 
	<SysTimes> 
			<systime
SNTPAddress="${sip_serv}"
SNTPAddressBackup="${ntp_serv}" DaylightSaveingFlag="2"
SNTPEnableFlag="1" TimeZoneType="109" DaySet="12" HourSet="10"
MinuteSet="40" SecondSet="20" YearSet="2024" MouthSet="12"
AutoAddress="0" AutoAddressBackup="0" DSTtype="0" DSTStartMonth="1"
DSTStartDay="1" DSTStartHour="0" DSTEndMonth="12" DSTEndDay="31"
DSTEndHour="23" DSTWeekStartMonth="1" DSTWeekStartWeek="0"
DSTWeekStartInMonth="1" DSTWeekStartHour="0" DSTWeekEndMonth="12"
DSTWeekEndWeek="6" DSTWeekEndInMonth="5" DSTWeekEndHour="23" Offset="60"
UpdateInterval="${ntp_timeout}" />
	 </SysTimes>
	 
	<FunCodes> 
			<CallFun CallBackFC="" CallWaitFC=""
TransferCodeEnable="0" TransferCodeNum="" ConferenceCodeEnable="0"
ConferenceCodeNum="" HoldCodeEnable="0" HoldCodeNum="" />
	 </FunCodes>
	 
	<RouteGoals> 
			<route DialNumLength="25" DialOutButton="1"
DialOutFlag="0" DialOutMaxTime="5" IPStrategyEnable="0" />
	 </RouteGoals>
	 
	<RouteTabs />
	 
	<BlackTabs />
	 
	<WhiteTabs />
	 
	<logs> 
			<log LogCallGrade="0" LogSave="0" LogType="1"
LogServerAddress="" LogServerEnable="0" LogServerPort="514" />
	 </logs>
	 
	<hotlineBLFs> 
			<hotlineBLF BLF="0" />
	 </hotlineBLFs>
	 
	<lcds> 
			<lcd Password="" AvoidDisturbEnableFlag="0"
Language="2" WebLanguage="1" Light="3" NoSoundEnableFlag="0"
ScreenLightEnableFlag="1" BackLightEnableFlag="0" TimeFormat="0"
TimeListSeparator="0" TouchScreen="0" CloseLightTime="60" ScreenTime="60"
Contrast="3" ScreenSaverEnable="0" lockScreenPassword="1234"
LockScreenEnable="0" LockScreenMode="0" LockScreenTime="60"
DateFormat="8" LockKeys="0" PhoneLockTimeOut="0" PhoneUnlockPIN=""
Emergency="112,911,110" />
	 </lcds>
	 
	<passwords> 
			<password UsrName="root"
ext_Password="6f0b05fbf1d582bc" Password="[p]4385e1d51c6ba973"
User="user" ext_UserPassword="4ff55f8f9e70099d"
UserPassword="[p]cefe3e3de6c968f4" type="65" />
	 </passwords>
	 
	<HotLineFuns> 
			<HotLineFun HotLineState="0" HotLineNum=""
DelayTime="5" />
	 </HotLineFuns>
	 
	<LDAPs> 
			<ldap id="0" LDAPName="" LDAPNumber=""
Address="0.0.0.0" Com="389" Base="" UserName="" Password="" MaxHit="50"
Name_Attribites1="" Name_Attribites2="" Name_Attribites3=""
Number_Attribites1="" Number_Attribites2="" Number_Attribites3=""
Protocol="3" Deslay="0" call="1" Results="1" PreDial_Dial="0"
LDAPEnable="0" />
	 
			<ldap id="1" LDAPName="" LDAPNumber=""
Address="0.0.0.0" Com="389" Base="" UserName="" Password="" MaxHit="50"
Name_Attribites1="" Name_Attribites2="" Name_Attribites3=""
Number_Attribites1="" Number_Attribites2="" Number_Attribites3=""
Protocol="3" Deslay="0" call="1" Results="1" PreDial_Dial="0"
LDAPEnable="0" />
	 </LDAPs>
	 
	<sipUsers> 
			<sipUser id="0" Describe="${exten}"
DomainName="[p]484462cdbba7857304617f7a72f6a3d3"
Password="[p]8f829d6ec9daf7fc270130c7684ad66c" ProxyServerAddress=""
SecondProxyServerAddress="" PollingRegistrationTime="60"
RefreshTime="${sip_refresh}" Subscribe="1800" SecondDomainName="" STUNAddress=""
STUNEnableFlag="0" UserName="${exten}" UserNumber="${exten}" flag="0" LinkUse="0"
PossessNumber="2" SupportNumber="8" approveName="${exten}" RTPBegin="10000"
RTPEND="10128" EnableAccount="1" AccountMode="0" RegisterMethod="0"
BLAEnableFlag="0" BLANum="" AnonymousCall="0" UserSessionTimerEnable="0"
SessionTimer="300" AllowEventsEnable="0" DNSSRVEnable="0"
RegisteredNAT="1" RingFilename="Ring1" KeepaliveEnable="1"
KeepaliveInterval="30" AnonymousCallReject="0" ProxyEnableFlag="0"
AutoAnsEnableFlag="0" ServerType="0" SessionTimerRefresher="0"
UserphoneEnable="0" ConferenceWay="0" ConferenceNum=""
EPPOutcodeEnable="0" EPPOutcode="" EPPOutcodeLength="0"
CallLeaveMessageNum="*97" RPortEnable="1" ext_DomainName=""
ext_Password="" UserSessionTimerRefresher="0" />
	 
			<sipUser id="1" Describe="" DomainName=""
Password="" ProxyServerAddress="" SecondProxyServerAddress=""
PollingRegistrationTime="32" RefreshTime="900" Subscribe="1800"
SecondDomainName="" STUNAddress="" STUNEnableFlag="0" UserName=""
UserNumber="" flag="0" LinkUse="0" PossessNumber="2" SupportNumber="8"
approveName="" RTPBegin="10000" RTPEND="10128" EnableAccount="0"
AccountMode="0" RegisterMethod="0" BLAEnableFlag="0" BLANum=""
AnonymousCall="0" UserSessionTimerEnable="0" SessionTimer="300"
AllowEventsEnable="0" DNSSRVEnable="0" RegisteredNAT="1" RingFilename=""
KeepaliveEnable="1" KeepaliveInterval="30" AnonymousCallReject="0"
ProxyEnableFlag="0" AutoAnsEnableFlag="0" ServerType="0"
SessionTimerRefresher="0" UserphoneEnable="0" ConferenceWay="0"
ConferenceNum="" EPPOutcodeEnable="0" EPPOutcode="" EPPOutcodeLength=""
CallLeaveMessageNum="*97" RPortEnable="0" />
	 </sipUsers>
	 
	<SipEncrys> 
			<SipEncry id="0" EncryptionNum=""
EncryptionType="0" FaxEncryption="0" RTPEncryption="0"
SignalingEncryption="0" SRTPEncryption="0" />
	 
			<SipEncry id="1" EncryptionNum=""
EncryptionType="0" FaxEncryption="0" RTPEncryption="0"
SignalingEncryption="0" SRTPEncryption="0" />
	 </SipEncrys>
	 
	<modes> 
			<mode Headphonesmode="0" RingMode="0" />
	 </modes>
	 
	<VPNs> 
			<VPN VPNUserName="" VPNUserPassword=""
VPNServer="" Enable="0" Type="0" />
	 </VPNs>
	 
	<VLANs> 
			<Vlan LocalEnableVlan="0" PCEnableVlan="0"
LocalVID="0" PCVID="0" LocalPriority="0" PCPriority="0" />
	 </VLANs>
	 
	<E8021xs> 
			<E8021x c8021xType="0" Identity="" Password=""
CA_Cert="onex.cer" Device_Cert="" />
	 </E8021xs>
	 
	<MultiMedias> 
			<MultiMedia CfgMode="0" EnableMultiMedia="1"
OutCode="" ext_Password="4e529c" Password="[p]32a429b0838abc9844532d0e9d"
OutCodeLen="0" DoorbellCode="" OpenDoorPwd="" RoamingAddr=""
RoamingPort="0" GroupName="" />
	 </MultiMedias>
	 </all>
EOD;
?>