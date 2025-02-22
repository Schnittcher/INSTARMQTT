<?php

declare(strict_types=1);
require_once __DIR__ . '/../libs/InstarBaseModule.php';

class System extends InstarBaseModule
{
    const SUBTOPIC = 'system';

    public static $Variables = [
        //'UserUserEnable'                                   => ['User User Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'user/user/enable'],
        //'UserUserName'                                     => ['User User Name', VARIABLETYPE_STRING, '', true, true, 'user/user/name'],
        //'UserGuestEnable'                                  => ['User Guest Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'user/guest/enable'],
        //'UserGuestName'                                    => ['User Guest Name', VARIABLETYPE_STRING, '', true, true, 'user/guest/name'],
        //'UserAdminTokenExpire'                             => ['User Admin Token Expire', VARIABLETYPE_INTEGER, 'INSTAR.SystemUserTokenExpire', true, true, 'user/admin/token/expire'],
        //'UserUserTokenExpire'                              => ['User User Token Expire', VARIABLETYPE_INTEGER, 'INSTAR.SystemUserTokenExpire', true, true, 'user/user/token/expire'],
        //'UserGuestTokenExpire'                             => ['User Guest Token Expire', VARIABLETYPE_INTEGER, 'INSTAR.SystemUserTokenExpire', true, true, 'user/guest/token/expire'],
        'Language'                                         => ['Language', VARIABLETYPE_STRING, '', true, true, 'language'],
        'ServerinfoModel'                                  => ['Model', VARIABLETYPE_STRING, '', false, true, 'serverinfo/model'],
        'ServerinfoName'                                   => ['Name', VARIABLETYPE_STRING, '', false, true, 'serverinfo/name'],
        'ServerinfoStartDate'                              => ['Date of installation', VARIABLETYPE_STRING, '', false, true, 'serverinfo/startdate'],
        'ServerinfoHardVersion'                            => ['Hardware-Version', VARIABLETYPE_STRING, '', false, true, 'serverinfo/hardversion'],
        'ServerinfoSysVersion'                             => ['Firmware-Version', VARIABLETYPE_STRING, '', false, true, 'serverinfo/sysversion'],
        'ServerinfoSoftVersion'                            => ['Soft Version', VARIABLETYPE_STRING, '', false, true, 'serverinfo/softversion'],
        'ServerinfoWebVersion'                             => ['WebUI-Version', VARIABLETYPE_STRING, '', false, true, 'serverinfo/webversion'],
        //'VendorInfoProduct'                                => ['Vendor Info Product', VARIABLETYPE_STRING, '', false, true, 'vendorinfo/product'],
        //'VendorInfoSeries'                                 => ['Vendor Info Series', VARIABLETYPE_STRING, '', false, true, 'vendorinfo/series'],
        //'VendorInfoVendor'                                 => ['Vendor Info Vendor', VARIABLETYPE_STRING, '', false, true, 'vendorinfo/vendor'],
        'DevInfoSerialNo'                                  => ['Serialunmber', VARIABLETYPE_STRING, '', false, true, 'devinfo/serialno'],
        //'DevInfoProduct'                                   => ['Dev Info Product', VARIABLETYPE_STRING, '', false, true, 'devinfo/product'],
        //'DevInfoHardVersion'                               => ['Dev Hard Version', VARIABLETYPE_STRING, '', false, true, 'devinfo/hardversion'],
        //'LogEnable'                                        => ['Log Enable', VARIABLETYPE_BOOLEAN, '', true, true, 'log/enable'],
        //'LogLevel'                                         => ['Log Level', VARIABLETYPE_STRING, 'INSTAR.SystemLogLevel', true, true, 'log/level'],
        //'LogEntries'                                       => ['Log Entries', VARIABLETYPE_STRING, '', true, true, 'log/entries'],
        //'LogCleanLog'                                      => ['Log Clean Log', VARIABLETYPE_INTEGER, 'INSTAR.SystemLogCleanLog', true, true, 'log/cleanlog'],
        //'LogSD'                                            => ['Log SD', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'log/logsd'],
        //'LogIPLogging'                                     => ['Log IP Logging', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'log/iplogging'],
        //'LogMaxLines'                                      => ['Log Max Lines', VARIABLETYPE_INTEGER, 'INSTAR.SystemLogMaxLines', true, true, 'log/maxlines'],
        'RebootNow'                                        => ['Reboot Now', VARIABLETYPE_INTEGER, 'INSTAR.SystemRebootNow', true, true, 'reboot/now'],
        'RebootPlanned'                                    => ['Reboot planned', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'reboot/planned'],
        'RebootDay'                                        => ['Reboot planned Day', VARIABLETYPE_INTEGER, 'INSTAR.SystemRebootDay', true, true, 'reboot/day'],
        'RebootTime'                                       => ['Reboot planned Time', VARIABLETYPE_INTEGER, '~UnixTimestampTime', true, true, 'reboot/time'],
        //'ResetNow'                                         => ['Reset Now', VARIABLETYPE_INTEGER, 'INSTAR.SystemResetNow', true, true, 'reset/now'],
        //'TimeTimezone'                                     => ['Time Timezone', VARIABLETYPE_STRING, '', true, true, 'time/timezone'],
        //'TimeTime'                                         => ['Time Time', VARIABLETYPE_STRING, '', true, true, 'time/time'],
        //'TimeNTPServer'                                    => ['Time NTP Server', VARIABLETYPE_STRING, '', true, true, 'ntp/server'],
        //'TimeNTPEnable'                                    => ['Time NTP Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'time/ntp/enable'],
        'UpdateAvailable'                                  => ['Update Available', VARIABLETYPE_BOOLEAN, '~Switch', false, true, 'update/updateavailable'],
        'UpdateUpdateInfo'                                 => ['Update Info', VARIABLETYPE_STRING, '', false, true, 'update/updateinfo'],
        'UpdateUpdateProgress'                             => ['Update Progress', VARIABLETYPE_INTEGER, '~Intensity.100', false, true, 'update/updateprogress'],
        //'UpdateServerHost'                                 => ['Update Server Host', VARIABLETYPE_STRING, '', true, true, 'update/server/host'],
        //'UpdateServerPort'                                 => ['Update Server Port', VARIABLETYPE_INTEGER, '', true, true, 'update/server/port'],
        //'UpdateServerName'                                 => ['Update Server Name', VARIABLETYPE_STRING, '', true, true, 'update/server/name'],
        'UpdateNow'                                        => ['Update Now', VARIABLETYPE_INTEGER, 'INSTAR.SystemUpdateNow', true, true, 'update/now'],
        //'WebUIEncoding'                                    => ['WebUI Encoding', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'webui/encoding'],
        //'WebUIPlugin'                                      => ['WebUI Plugin', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'webui/plugin'],
        //'WebUITheme'                                       => ['WebUI Theme', VARIABLETYPE_STRING, 'INSTAR.SystemWebUITheme', true, true, 'webui/theme'],
        //'WebUITiles'                                       => ['WebUI TZiles', VARIABLETYPE_STRING, '', false, true, 'webui/tiles'],
        //'WebUIMessages'                                    => ['WebUI Messages', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'webui/messages'],
        //'WebUIResolution'                                  => ['WebUI Resolution', VARIABLETYPE_INTEGER, 'INSTAR.SystemWebUIResolution', true, true, 'webui/resolution'],
        //'WebUIWizardStatus'                                => ['WebUI Wizard Status', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'webui/wizardstatus'],

    ];
    public function Create()
    {
        if (!IPS_VariableProfileExists('INSTAR.SystemUserTokenExpire')) {
            $this->RegisterProfileInteger('INSTAR.SystemUserTokenExpire', 'Information', '', '', 0, 5, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.SystemLogLevel')) {
            $this->RegisterProfileStringEx('INSTAR.SystemLogLevel', 'Information', '', '', [
                ['debug', $this->Translate('Debug'), '', 0x00FF00],
                ['info', $this->Translate('Info'), '', 0x00FF00],
                ['warn', $this->Translate('Warn'), '', 0x00FF00],
                ['error', $this->Translate('Error'), '', 0x00FF00]
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.SystemLogCleanLog')) {
            $this->RegisterProfileInteger('INSTAR.SystemLogCleanLog', 'Information', '', '', 1, 1, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.SystemLogMaxLines')) {
            $this->RegisterProfileInteger('INSTAR.SystemLogMaxLines', 'Information', '', '', 20, 3000, 1);
        }

        if (!IPS_VariableProfileExists('INSTAR.SystemRebootNow')) {
            $this->RegisterProfileIntegerEx('INSTAR.SystemRebootNow', 'Information', '', '', [
                [1, $this->Translate('Restart'), '', 0x00FF00],
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.SystemRebootDay')) {
            $this->RegisterProfileIntegerEx('INSTAR.SystemRebootDay', 'Information', '', '', [
                [0, $this->Translate('Every day'), '', 0x00FF00],
                [1, $this->Translate('Monday'), '', 0x00FF00],
                [2, $this->Translate('Tuesday'), '', 0x00FF00],
                [3, $this->Translate('Wednesday'), '', 0x00FF00],
                [4, $this->Translate('Thursday'), '', 0x00FF00],
                [5, $this->Translate('Friday'), '', 0x00FF00],
                [6, $this->Translate('Saturday'), '', 0x00FF00],
                [7, $this->Translate('Sunday'), '', 0x00FF00],
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.SystemResetNow')) {
            $this->RegisterProfileInteger('INSTAR.SystemResetNow', 'Information', '', '', 1, 1, 1);
        }

        if (!IPS_VariableProfileExists('INSTAR.SystemUpdateNow')) {
            $this->RegisterProfileIntegerEx('INSTAR.SystemUpdateNow', 'Information', '', '', [
                [1, $this->Translate('Update'), '', 0x00FF00],
            ]);
        }

        if (!IPS_VariableProfileExists('INSTAR.SystemWebUITheme')) {
            $this->RegisterProfileStringEx('INSTAR.SystemWebUITheme', 'Information', '', '', [
                [0, '0', '', 0x00FF00],
                [2, '2', '', 0x00FF00],
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.SystemWebUIResolution')) {
            $this->RegisterProfileInteger('INSTAR.SystemWebUIResolution', 'Information', '', '', 11, 13, 1);
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