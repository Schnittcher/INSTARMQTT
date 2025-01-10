<?php

declare(strict_types=1);
require_once __DIR__ . '/../libs/InstarBaseModule.php';

class Features extends InstarBaseModule
{
    const SUBTOPIC = 'features';

    public static $Variables = [
        //'EMailSender'                                                                 => ['E-Mail Sender', VARIABLETYPE_STRING, '', true, true, 'email/sender'],
        //'EMailReceiver'                                                               => ['E-Mail Receiver', VARIABLETYPE_STRING, '', true, true, 'email/receiver'],
        //'EMailSubject'                                                                => ['E-Mail Subject', VARIABLETYPE_STRING, '', true, true, 'email/subject'],
        //'EMailText'                                                                   => ['E-Mail Text', VARIABLETYPE_STRING, '', true, true, 'email/text'],
        //'EMailServer'                                                                 => ['E-Mail Server', VARIABLETYPE_STRING, '', true, true, 'email/server'],
        //'EMailSSL'                                                                    => ['E-Mail SSL', VARIABLETYPE_INTEGER, 'INSTAR.EMailSSL', true, true, 'email/ssl'],
        //'EMailPort'                                                                   => ['E-Mail Port', VARIABLETYPE_INTEGER, '', true, true, 'email/port'],
        //'EMailUsername'                                                               => ['E-Mail Username', VARIABLETYPE_STRING, '', true, true, 'email/username'],
        //'EMailPassword'                                                               => ['E-Mail Password', VARIABLETYPE_STRING, '', true, true, 'email/password'],
        //'FTPServer'                                                                   => ['FTP Server', VARIABLETYPE_STRING, '', true, true, 'ftp/server'],
        //'FTPPort'                                                                     => ['FTP Port', VARIABLETYPE_STRING, '', true, true, 'ftp/port'],
        //'FTPUsername'                                                                 => ['FTP Username', VARIABLETYPE_STRING, '', true, true, 'ftp/username'],
        //'FTPPassword'                                                                 => ['FTP Password', VARIABLETYPE_STRING, '', true, true, 'ftp/password'],
        //'FTPPasvMode'                                                                 => ['FTP Pasv Mode', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'ftp/pasvmode'],
        //'FTPDirName'                                                                  => ['FTP Dir Name', VARIABLETYPE_STRING, '', true, true, 'ftp/dirname'],
        //'FTPDirMode'                                                                  => ['FTP Dir Mode', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'ftp/dirmode'],
        //'FTPssl'                                                                      => ['FTP SSL', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'ftp/ssl'],
        //'FTPInsecure'                                                                 => ['FTP Insecure', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'ftp/insecure'],
        'NightvisionAutoLed'                                                          => ['IR-Led control', VARIABLETYPE_INTEGER, 'INSTAR.NightvisionAutoLED', true, true, 'nightvision/autoled'],
        'NightvisionAutoIrcut'                                                        => ['IR-CUT filter', VARIABLETYPE_INTEGER, 'INSTAR.NightvisionAutoIrcut', true, true, 'nightvision/autoircut'],
        //'NightvisionScheduleEnable'                                                   => ['Nightvision Schedule Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'nightvision/schedule/enable'],
        //'NightvisionScheduleDay'                                                      => ['Nightvision Schedule Day', VARIABLETYPE_INTEGER, '', true, true, 'nightvision/schedule/day'],
        //'NightvisionScheduleNight'                                                    => ['Nightvision Schedule Night', VARIABLETYPE_INTEGER, '', true, true, 'nightvision/schedule/night'],
        'NightvisionThresholdHigh'                                                    => ['IR Threshold High', VARIABLETYPE_INTEGER, 'INSTAR.NightvisionThreshold', true, true, 'nightvision/threshold/high'],
        'NightvisionThresholdLow'                                                     => ['IR Threshold Low', VARIABLETYPE_INTEGER, 'INSTAR.NightvisionThreshold', true, true, 'nightvision/threshold/low'],
        //'NightvisionDelayEnable'                                                      => ['Nightvision Delay Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'nightvision/delay/enable'],
        //'NightvisionDelayTime'                                                        => ['Nightvision Delay Time', VARIABLETYPE_INTEGER, 'INSTAR.NightvisionDelayTime', true, true, 'nightvision/delay/time'],
        'NightvisionMode'                                                             => ['IR-LED-Mode', VARIABLETYPE_INTEGER, 'INSTAR.NightvisionMode', true, true, 'nightvision/mode'],
        //'NightvisionModeOnAlarm'                                                      => ['Nightvision Mode on Alarm', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'nightvision/mode/onalarm'],
        //'NightvisionModeInterval'                                                     => ['Nightvision Mode Interval', VARIABLETYPE_INTEGER, 'INSTAR.NightvisionInterval', true, true, 'nightvision/mode/interval'],
        'NightvisionCurrentBrightness'                                                => ['IR Current Brightness', VARIABLETYPE_INTEGER, 'INSTAR.NightvisionCurrentBrightness', true, true, 'nightvision/currentbrightness'],
        'PTZMove'                                                                     => ['PTZ Move', VARIABLETYPE_STRING, 'INSTAR.PTZMove', true, true, 'ptz/move'],
        'PTZMoveStep'                                                                 => ['PTZ Move Step', VARIABLETYPE_STRING, 'INSTAR.PTZMoveStep', true, true, 'ptz/movestep'],
        'PTZPreset'                                                                   => ['PTZ Preset', VARIABLETYPE_STRING, 'INSTAR.PTZPreset', true, true, 'ptz/preset'],
        'PTZSavePreset'                                                               => ['PTZ Save Preset', VARIABLETYPE_INTEGER, 'INSTAR.PTZSavePreset', true, true, 'ptz/savepreset'],
        'PTZScan'                                                                     => ['PTZ Scan', VARIABLETYPE_STRING, 'INSTAR.PTZScan', true, true, 'ptz/scan'],
        'PTZCalibrationEnable'                                                        => ['PTZ Calibration Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'ptz/calibration/enable'],
        'PTZStartPresetEnable'                                                        => ['PTZ Start Preset Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'ptz/startpreset/enable'],
        'PTZStartPresetPosition'                                                      => ['PTZ Start Preset Position', VARIABLETYPE_INTEGER, 'INSTAR.PTZPresetPosition', true, true, 'ptz/startpreset/position'],
        'PTZParkPresetInterval'                                                       => ['PTZ Park Preset Interval', VARIABLETYPE_STRING, 'INSTAR.PTZParkPresetInterval', true, true, 'ptz/parkpreset/interval'],
        'PTZAlarmPresetEnable'                                                        => ['PTZ Alarm Preset Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'ptz/alarmpreset/enable'],
        'PTZAlarmPresetPosition'                                                      => ['PTZ Alarm Preset Position', VARIABLETYPE_INTEGER, 'INSTAR.PTZPresetPosition', true, true, 'ptz/alarmpreset/position'],
        'PTZPTZAlarmMask'                                                             => ['PTZ Alarm Mask', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'ptz/ptzalarmmask'],
        'PTZPanSpeed'                                                                 => ['PTZ Pan Speed', VARIABLETYPE_INTEGER, 'INSTAR.PTZPanSpeed', true, true, 'ptz/panspeed'],
        'PTZTiltSpeed'                                                                => ['PTZ Tilt Speed', VARIABLETYPE_INTEGER, 'INSTAR.PTZTiltSpeed', true, true, 'ptz/tiltspeed'],
        'PTZPanScan'                                                                  => ['PTZ Pan Scan', VARIABLETYPE_INTEGER, 'INSTAR.PTZPanTiltScan', true, true, 'ptz/panscan'],
        'PTZTiltScan'                                                                 => ['PTZ Tilt Scan', VARIABLETYPE_INTEGER, 'INSTAR.PTZPanTiltScan', true, true, 'ptz/tiltscan'],
        'PTZParkPresetEnable'                                                         => ['PTZ Park Preset Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'ptz/parkpreset/enable'],
        'PTZParkPresetPosition'                                                       => ['PTZ Park Preset Position', VARIABLETYPE_INTEGER, 'INSTAR.PTZPresetPosition', true, true, 'ptz/parkpreset/position'],
        'PTZParkInterval'                                                             => ['PTZ Park Interval', VARIABLETYPE_INTEGER, '', true, true, 'ptz/parkinterval'],
        'PTZTourPresets'                                                              => ['PTZ Tour Presets', VARIABLETYPE_STRING, '', true, true, 'ptz/tourpresets'],
        'PTZTourInterval'                                                             => ['PTZ Tour Interval', VARIABLETYPE_STRING, '', true, true, 'ptz/tourinterval'],
        'PTZTourRepeats'                                                              => ['PTZ Tour Repeats', VARIABLETYPE_INTEGER, 'INSTAR.PTZTourRepeats', true, true, 'ptz/tourrepeats'],
        'IndicatorPower'                                                              => ['State-LED Power', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'indicator/power'],
        'IndicatorWifi'                                                               => ['State-LED Wifi', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'indicator/wifi'],
        //'SDAutoDelete'                                                                => ['SD Auto Delete', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'sd/autodelete'],
        //'SDRstorageEnable'                                                            => ['SD Rstorage Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'sd/rstorage/enable'],
        //'SDRstorageDuration'                                                          => ['SD Rstorage Duration', VARIABLETYPE_STRING, 'INSTAR.SDRstorageDuration', true, true, 'sd/rstorage/duration'],

    ];
    public function Create()
    {
        if (!IPS_VariableProfileExists('INSTAR.EMailSSL')) {
            $this->RegisterProfileInteger('INSTAR.EMailSSL', 'Information', '', '', 1, 3, 1);
        }

        if (!IPS_VariableProfileExists('INSTAR.NightvisionAutoLED')) {
            $this->RegisterProfileIntegerEx('INSTAR.NightvisionAutoLED', 'Information', '', '', [
                [0, $this->Translate('Disabled'), '', 0x00FF00],
                [1, $this->Translate('Permanently'), '', 0x00FF00],
                [2, $this->Translate('Automatically'), '', 0x00FF00],
            ]);
        }

        if (!IPS_VariableProfileExists('INSTAR.NightvisionAutoIrcut')) {
            $this->RegisterProfileIntegerEx('INSTAR.NightvisionAutoIrcut', 'Information', '', '', [
                [0, $this->Translate('Day mode'), '', 0x00FF00],
                [1, $this->Translate('Night mode'), '', 0x00FF00],
                [2, $this->Translate('Automatically'), '', 0x00FF00],
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.NightvisionThreshold')) {
            $this->RegisterProfileInteger('INSTAR.NightvisionThreshold', 'Information', '', '', 1, 240, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.NightvisionDelayTime')) {
            $this->RegisterProfileInteger('INSTAR.NightvisionDelayTime', 'Clock', '', '', 1, 60, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.NightvisionMode')) {
            $this->RegisterProfileIntegerEx('INSTAR.NightvisionMode', 'Information', '', '', [
                [0, $this->Translate('940nm'), '', 0x00FF00],
                [1, $this->Translate('850nm'), '', 0x00FF00],
                [2, $this->Translate('850nm+940nm'), '', 0x00FF00],
            ]);
        }

        if (!IPS_VariableProfileExists('INSTAR.NightvisionInterval')) {
            $this->RegisterProfileInteger('INSTAR.NightvisionInterval', 'Clock', '', '', 1, 60, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.NightvisionCurrentBrightness')) {
            $this->RegisterProfileInteger('INSTAR.NightvisionCurrentBrightness', 'Information', '', '', 1, 240, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZMove')) {
            $this->RegisterProfileStringEx('INSTAR.PTZMove', 'Information', '', '', [
                ['left', $this->Translate('Left'), '', 0x00FF00],
                ['right', $this->Translate('Right'), '', 0x00FF00],
                ['down', $this->Translate('Down'), '', 0x00FF00],
                ['up', $this->Translate('Up'), '', 0x00FF00],
                ['stop', $this->Translate('Stop'), '', 0x00FF00],
                ['focusin', $this->Translate('Focus in'), '', 0x00FF00],
                ['focusout', $this->Translate('Focus out'), '', 0x00FF00],
                ['zoomout', $this->Translate('Zoom out'), '', 0x00FF00],
                ['zoomin', $this->Translate('Zoom in'), '', 0x00FF00],
                ['tour', $this->Translate('Tour'), '', 0x00FF00],
                ['hscan', $this->Translate('HScan'), '', 0x00FF00],
                ['vscan', $this->Translate('VScan'), '', 0x00FF00]
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZMoveStep')) {
            $this->RegisterProfileStringEx('INSTAR.PTZMoveStep', 'Information', '', '', [
                ['left', $this->Translate('Left'), '', 0x00FF00],
                ['right', $this->Translate('Right'), '', 0x00FF00],
                ['down', $this->Translate('Down'), '', 0x00FF00],
                ['up', $this->Translate('Up'), '', 0x00FF00],
                ['stop', $this->Translate('Stop'), '', 0x00FF00],
                ['focusin', $this->Translate('Focus in'), '', 0x00FF00],
                ['focusout', $this->Translate('Focus out'), '', 0x00FF00],
                ['zoomout', $this->Translate('Zoom out'), '', 0x00FF00],
                ['zoomin', $this->Translate('Zoom in'), '', 0x00FF00]
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZPreset')) {
            $this->RegisterProfileStringEx('INSTAR.PTZPreset', 'Information', '', '', [
                ['1', '1', '', 0x00FF00],
                ['2', '2', '', 0x00FF00],
                ['3', '3', '', 0x00FF00],
                ['4', '4', '', 0x00FF00],
                ['6', '5', '', 0x00FF00],
                ['7', '6', '', 0x00FF00],
                ['88', '88', '', 0x00FF00]
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZSavePreset')) {
            $this->RegisterProfileIntegerEx('INSTAR.PTZSavePreset', 'Information', '', '', [
                [1, '1', '', 0x00FF00],
                [2, '2', '', 0x00FF00],
                [3, '3', '', 0x00FF00],
                [4, '4', '', 0x00FF00],
                [6, '5', '', 0x00FF00],
                [7, '6', '', 0x00FF00]
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZScan')) {
            $this->RegisterProfileStringEx('INSTAR.PTZScan', 'Information', '', '', [
                ['hscan', $this->Translate('HScan'), '', 0x00FF00],
                ['vscan', $this->Translate('VScan'), '', 0x00FF00],
                ['tour', $this->Translate('Tour'), '', 0x00FF00],

            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZPresetPosition')) {
            $this->RegisterProfileInteger('INSTAR.PTZPresetPosition', 'Information', '', '', 1, 8, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZParkPresetInterval')) {
            $this->RegisterProfileStringEx('INSTAR.PTZParkPresetInterval', 'Information', '', '', [
                [30, '30', '', 0x00FF00],
                [900, '900', '', 0x00FF00],
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZPanSpeed')) {
            $this->RegisterProfileInteger('INSTAR.PTZPanSpeed', 'Information', '', '', 0, 2, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZTiltSpeed')) {
            $this->RegisterProfileInteger('INSTAR.PTZTiltSpeed', 'Information', '', '', 0, 2, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZPanTiltScan')) {
            $this->RegisterProfileInteger('INSTAR.PTZPanTiltScan', 'Information', '', '', 1, 50, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.PTZTourRepeats')) {
            $this->RegisterProfileInteger('INSTAR.PTZTourRepeats', 'Information', '', '', 1, 50, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.SDRstorageDuration')) {
            $this->RegisterProfileStringEx('INSTAR.SDRstorageDuration', 'Information', '', '', [
                [1, '1', '', 0x00FF00],
                [30, '30', '', 0x00FF00],
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