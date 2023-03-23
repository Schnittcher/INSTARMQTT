<?php

declare(strict_types=1);
require_once __DIR__ . '/../libs/InstarBaseModule.php';

class Netzwerk extends InstarBaseModule
{
    const SUBTOPIC = 'network';

    public static $Variables = [
        'ConfigDHCP'                                           => ['Config DHCP', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'config/dhcp'],
        'ConfigIPAddr'                                         => ['Config IP-Adresse', VARIABLETYPE_STRING, '', true, true, 'config/ipaddr'],
        'ConfigNetmask'                                        => ['Config Netmask', VARIABLETYPE_STRING, '', true, true, 'config/netmask'],
        'ConfigGateway'                                        => ['Config Gateway', VARIABLETYPE_STRING, '', true, true, 'config/gateway'],
        'ConfigFDNSIP'                                         => ['Config FDNSIP', VARIABLETYPE_STRING, '', true, true, 'config/fdnsip'],
        'ConfigSDNSIP'                                         => ['Config SDNSIP', VARIABLETYPE_STRING, '', true, true, 'config/sdnsip'],
        'ConfigNetworktype'                                    => ['Config Network Type', VARIABLETYPE_STRING, '', false, true, 'config/networktype'],
        'ConfigMacAddress'                                     => ['Config MAC Address', VARIABLETYPE_STRING, '', false, true, 'config/macaddress'],
        'ConfigHTTPPort'                                       => ['Config HTTP Port', VARIABLETYPE_INTEGER, '', true, true, 'config/httpport'],
        'ConfigHTTPSPort'                                      => ['Config HTTPS Port', VARIABLETYPE_INTEGER, '', true, true, 'config/httpsport'],
        'ConfigRTSPPort'                                       => ['Config RTSP Port', VARIABLETYPE_INTEGER, '', true, true, 'config/rtspport'],
        'ConfigLANMMAC'                                        => ['Config LAN MAC', VARIABLETYPE_STRING, '', false, true, 'config/lanmac'],
        'ConfigWifiMAC'                                        => ['Config Wifi MAC', VARIABLETYPE_STRING, '', false, true, 'config/wifimac'],
        'WifiEnable'                                           => ['Wifi Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'wifi/enable'],
        'WifiSSID'                                             => ['Wifi SSID', VARIABLETYPE_STRING, '', true, true, 'wifi/ssid'],
        'WifiBSSID'                                            => ['Wifi BSSID', VARIABLETYPE_STRING, '', true, true, 'wifi/bssid'],
        'WifiEncryption'                                       => ['Wifi Encryption', VARIABLETYPE_INTEGER, 'INSTAR.WifiEnryption', true, true, 'wifi/encryption'],
        'WifiKey'                                              => ['Wifi Key', VARIABLETYPE_INTEGER, 'INSTAR.WifiEnryption', true, true, 'wifi/key'],
        'WifiEncryptionType'                                   => ['Wifi Encryption Type', VARIABLETYPE_INTEGER, 'INSTAR.WifiEnryptionType', true, true, 'wifi/encryptiontype'],
        'WifiMode'                                             => ['Wifi Mode', VARIABLETYPE_INTEGER, 'INSTAR.WifiMode', true, true, 'wifi/mode'],
        'WifiWPS'                                              => ['Wifi WPS', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'wifi/wps'],
        'RemoteINSTARDDNSServer'                               => ['Remote INSTAR DDNS Server', VARIABLETYPE_STRING, '', true, true, 'remote/instarddns/server'],
        'RemoteINSTARDDNSPort'                                 => ['Remote INSTAR DDNS Port', VARIABLETYPE_INTEGER, '', true, true, 'remote/instarddns/port'],
        'RemoteINSTARDDNSDomain'                               => ['Remote INSTAR DDNS Domain', VARIABLETYPE_STRING, '', true, true, 'remote/instarddns/domain'],
        'RemoteOWNDDNSEnable'                                  => ['Remote OWN DDNS Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'remote/ownddns/enable'],
        'RemoteOWNDDNSUname'                                   => ['Remote OWN DDNS Uname', VARIABLETYPE_STRING, '', true, true, 'remote/ownddns/uname'],
        'RemoteOWNDDNSPasswd'                                  => ['Remote OWN DDNS Passwd', VARIABLETYPE_STRING, '', true, true, 'remote/ownddns/passwd'],
        'RemoteOWNDDNSService'                                 => ['Remote OWN DDNS Service', VARIABLETYPE_INTEGER, 'INSTAR.OWNDDNSService', true, true, 'remote/ownddns/service'],
        'RemoteOWNDDNSDomain'                                  => ['Remote OWN DDNS Domain', VARIABLETYPE_STRING, '', true, true, 'remote/ownddns/domain'],
        'RemoteOWNDDNSInterval'                                => ['Remote OWN DDNS Interval', VARIABLETYPE_INTEGER, '', true, true, 'remote/ownddns/interval'],
        'RemoteOWNDDNSToken'                                   => ['Remote OWN DDNS Token', VARIABLETYPE_STRING, '', true, true, 'remote/ownddns/token'],
        'RemoteINSTARP2PEnable'                                => ['Remote INSTAR P2P Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'remote/instarp2p/enable'],
        'RemoteINSTARP2PMinPort'                               => ['Remote INSTAR P2P min Port', VARIABLETYPE_INTEGER, '', true, true, 'remote/instarp2p/minport'],
        'RemoteINSTARP2PMaxPort'                               => ['Remote INSTAR P2P max Port', VARIABLETYPE_INTEGER, '', true, true, 'remote/instarp2p/maxport'],
        'ONVIFEnable'                                          => ['ONVIF Enable', VARIABLETYPE_BOOLEAN, '', true, true, 'onvif/enable'],
        'ONVIFPort'                                            => ['ONVIF Port', VARIABLETYPE_INTEGER, '', true, true, 'onvif/port'],
        'ONVIFSSLPort'                                         => ['ONVIF SSL Port', VARIABLETYPE_INTEGER, '', true, true, 'onvif/sslport'],
        'CertCustomEnabled'                                    => ['Cert Custom Enabled', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'cert/custom/enabled'],
        'CertCustomExpire'                                     => ['Cert Custom Expire', VARIABLETYPE_STRING, '', false, true, 'cert/custom/expire'],
        'CertCustomStart'                                      => ['Cert Custom Start', VARIABLETYPE_STRING, '', false, true, 'cert/custom/start'],
        'CertCustomDomain'                                     => ['Cert Custom Domain', VARIABLETYPE_STRING, '', false, true, 'cert/custom/domain'],
        'CertCustomIssuer'                                     => ['Cert Custom Issuer', VARIABLETYPE_STRING, '', false, true, 'cert/custom/issuer'],
        'CertCustomUpdate'                                     => ['Cert Custom Update', VARIABLETYPE_STRING, '', false, true, 'cert/custom/update'],
        'CertINSTARExpire'                                     => ['Cert INSTAR Expire', VARIABLETYPE_STRING, '', false, true, 'cert/instar/expire'],
        'CertINSTARStart'                                      => ['Cert INSTAR Start', VARIABLETYPE_STRING, '', false, true, 'cert/instar/start'],
        'CertINSTARDomain'                                     => ['Cert INSTAR Domain', VARIABLETYPE_STRING, '', false, true, 'cert/instar/domain'],
        'CertINSTARIssuer'                                     => ['Cert INSTAR Issuer', VARIABLETYPE_STRING, '', false, true, 'cert/instar/issuer'],
        'CertINSTARUpdate'                                     => ['Cert INSTAR Update', VARIABLETYPE_STRING, '', false, true, 'cert/instar/update'],
    ];

    public function Create()
    {
        if (!IPS_VariableProfileExists('INSTAR.WifiEnryption')) {
            $this->RegisterProfileInteger('INSTAR.WifiEnryption', 'Information', '', '', 1, 3, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.WifiEnryptionType')) {
            $this->RegisterProfileInteger('INSTAR.WifiEnryptionType', 'Information', '', '', 0, 1, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.WifiMode')) {
            $this->RegisterProfileInteger('INSTAR.WifiMode', 'Information', '', '', 0, 1, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.OWNDDNSService')) {
            $this->RegisterProfileStringEx('INSTAR.OWNDDNSService', 'Information', '', '', [
                [1, '1', '', 0x00FF00],
                [3, '3', '', 0x00FF00],
            ]);
        }
        //Never delete this line!
        parent::Create();
    }

    public function Destroy()
    {
        //Never delete this line!
        parent::Destroy();
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();
    }
}