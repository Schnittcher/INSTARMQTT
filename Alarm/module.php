<?php

declare(strict_types=1);
require_once __DIR__ . '/../libs/InstarBaseModule.php';

class Alarm extends InstarBaseModule
{
    const SUBTOPIC = 'alarm';

    public static $Variables = [
        //'AlarmPushAlarm'                     => ['Push Alarm', VARIABLETYPE_INTEGER, '', true, true, 'pushalarm'],
        'AlarmTriggered'                     => ['Triggered', VARIABLETYPE_INTEGER, 'INSTAR.AlarmTriggered', true, true, 'triggered'],
        'AlarmTriggeredTriggers'             => ['Triggered Triggers', VARIABLETYPE_INTEGER, 'INSTAR.AlarmTriggeredTriggers', true, true, 'triggered/triggers'],
        'AlarmTriggeredObject'               => ['Triggered Object', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'triggered/object'],
        //'AlarmActionsStressAlarmEnable'      => ['Actions Stress Alarm Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/stressalarm/enable'],
        //'AlarmActionsEnable'                 => ['Alarm enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/enable'],
        //'AlarmActionsEMailEnable'            => ['Actions E-Mail Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/email/enable'],
        //'AlarmActionsEMailInterval'          => ['Actions E-Mail Interval', VARIABLETYPE_INTEGER, 'INSTAR.AlarmActionsInterval', true, true, 'actions/email/interval'],
        //'AlarmActionsEMailSnapCount'         => ['Actions E-Mail Snap Count', VARIABLETYPE_INTEGER, 'INSTAR.AlarmActionsEMailSnapCount', true, true, 'actions/email/snapcount'],
        //'AlarmActionsSDSnapshotEnable'       => ['Actions SD Snapshot Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/sd/snapshot/enable'],
        //'AlarmActionsSDSnapshotCount'        => ['Actions SD Snapshot Count', VARIABLETYPE_INTEGER, 'INSTAR.AlarmActionsSnapshotCount', true, true, 'actions/sd/snapshot/count'],
        //'AlarmActionsSDSnapshotInterval'     => ['Actions SD Snapshot Interval', VARIABLETYPE_INTEGER, 'INSTAR.AlarmActionsInterval', true, true, 'actions/sd/snapshot/interval'],
        //'AlarmActionsSDVideoEnable'          => ['Actions SD Video Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/sd/video/enable'],
        //'AlarmActionsSDVideoInterval'        => ['Actions SD Video Interval', VARIABLETYPE_INTEGER, 'INSTAR.AlarmActionsInterval', true, true, 'actions/sd/video/interval'],
        //'AlarmActionsFTPSnapshotEnable'      => ['Actions FTP Snapshot Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/ftp/snapshot/enable'],
        //'AlarmActionsFTPSnapshotInterval'    => ['Actions FTP Snapshot Interval', VARIABLETYPE_INTEGER, 'INSTAR.AlarmActionsInterval', true, true, 'actions/ftp/snapshot/interval'],
        //'AlarmActionsFTPSnapshotCount'       => ['Actions FTP Snapshot Count', VARIABLETYPE_INTEGER, '', true, true, 'actions/ftp/snapshot/count'],
        //'AlarmActionsFTPVideoEnable'         => ['Actions FTP Video Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/ftp/video/enable'],
        //'AlarmActionsFTPVideoInterval'       => ['Actions FTP Video Interval', VARIABLETYPE_INTEGER, 'INSTAR.AlarmActionsInterval', true, true, 'actions/ftp/video/interval'],
        //'AlarmActionsRecordingResolution'    => ['Actions Recording Resolution', VARIABLETYPE_STRING, 'INSTAR.AlarmActionsResolution', true, true, 'actions/recording/resolution'],
        //'AlarmActionsRecordingDuration'      => ['Actions Recording Duration', VARIABLETYPE_STRING, 'INSTAR.AlarmActionsRecordingDuration', true, true, 'actions/recording/duration'],
        //'AlarmActionsSnapshotResolution'     => ['Actions Snapshot Resolution', VARIABLETYPE_STRING, 'INSTAR.AlarmActionsResolution', true, true, 'actions/snapshot/resolution'],
        'AlarmActionsPIREnable'              => ['PIR enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/pir/enable'],
        //'AlarmActionsPIRLink'                => ['Actions PIR Link', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/pir/link'],
        //'AlarmActionsPIRNightvision'         => ['Actions PIR Nightvision', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/pir/nightvision'],
        'AlarmActionsInputEnable'            => ['Input enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/input/enable'],
        //'AlarmActionsInputMode'              => ['Actions Input Mode', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/input/mode'],
        //'AlarmActionsInputLinkIO'            => ['Actions Link IO', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/input/linkio'],
        //'AlarmActionsRealyEnable'            => ['Actions Relay Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/relay/enable'],
        //'AlarmActionsRealyTime'              => ['Actions Relay Time', VARIABLETYPE_INTEGER, '', true, true, 'actions/relay/time'],
        //'AlarmActionsAlarmsignalCooldown'    => ['Actions Alarmsignal Cooldown', VARIABLETYPE_STRING, 'INSTAR.AlarmActionsAlarmsignalCooldown', true, true, 'actions/alarmsignal/cooldown'],
        //'AlarmActionsAutodetectionEnable'    => ['Actions Autodetection Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/audiodetection/enable'],
        //'AlarmActionsAutodetectionThreshold' => ['Actions Autodetection Threshold', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'actions/audiodetection/threshold'],
        //'AlarmActionsCloudEnable'            => ['Actions Cloud Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/cloud/enable'],
        'AlarmActionsObjectsEnable'          => ['Objects Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/objects/enable'],
        //'AlarmActionsObjectsThreshold'       => ['Actions Objects Threshold', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'actions/objects/threshold'],
        'AlarmActionsObjectsLinkPerson'      => ['Objects Link Person', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/objects/link/person'],
        'AlarmActionsObjectsLinkVehicle'     => ['Objects Link Vehicle', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/objects/link/vehicle'],
        'AlarmActionsObjectsLinkAnimal'      => ['Objects Link Animal', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'actions/objects/link/animal'],
        //	alarm/actions/objects/poll/x
        //  alarm/actions/objects/poll/y
        //  alarm/actions/objects/poll/w
        //  alarm/actions/objects/poll/h
        //  alarm/actions/objects/poll/moving
        'AlarmAreasRedEnable'         => ['Areas Red Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'areas/red/enable'],
        'AlarmAreasRedSensitivity'    => ['Areas Red Sensitivity', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'areas/red/sensitivity'],
        //'AlarmAreasRedXOrigin'        => ['Areas Red X Origin', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasXOrigin', true, true, 'areas/red/xorigin'],
        //'AlarmAreasRedYOrigin'        => ['Areas Red Y Origin', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasYOrigin', true, true, 'areas/red/yorigin'],
        //'AlarmAreasRedHeight'         => ['Areas Red Height', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasHeight', true, true, 'areas/red/height'],
        //'AlarmAreasRedWidth'          => ['Areas Red Width', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasWidth', true, true, 'areas/red/width'],
        'AlarmAreasBlueEnable'        => ['Areas Blue Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'areas/blue/enable'],
        'AlarmAreasBlueSensitivity'   => ['Areas Blue Sensitivity', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'areas/blue/sensitivity'],
        //'AlarmAreasBlueXOrigin'       => ['Areas Blue X Origin', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasXOrigin', true, true, 'areas/blue/xorigin'],
        //'AlarmAreasBlueYOrigin'       => ['Areas Blue Y Origin', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasYOrigin', true, true, 'areas/blue/yorigin'],
        //'AlarmAreasBlueHeight'        => ['Areas Blue Height', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasHeight', true, true, 'areas/blue/height'],
        //'AlarmAreasBlueWidth'         => ['Areas Blue Width', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasWidth', true, true, 'areas/blue/width'],
        'AlarmAreasGreenEnable'       => ['Areas Green Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'areas/green/enable'],
        'AlarmAreasGreenSensitivity'  => ['Areas Green Sensitivity', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'areas/green/sensitivity'],
        //'AlarmAreasGreenXOrigin'      => ['Areas Green X Origin', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasXOrigin', true, true, 'areas/green/xorigin'],
        //'AlarmAreasGreenYOrigin'      => ['Areas Green Y Origin', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasYOrigin', true, true, 'areas/green/yorigin'],
        //'AlarmAreasGreenHeight'       => ['Areas Green Height', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasHeight', true, true, 'areas/green/height'],
        //'AlarmAreasGreenWidth'        => ['Areas Green Width', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasWidth', true, true, 'areas/green/width'],
        'AlarmAreasYellowEnable'      => ['Areas Yellow Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'areas/yellow/enable'],
        'AlarmAreasYellowSensitivity' => ['Areas Yellow Sensitivity', VARIABLETYPE_INTEGER, '~Intensity.100', true, true, 'areas/yellow/sensitivity'],
        //'AlarmAreasYellowXOrigin'     => ['Areas Yellow X Origin', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasXOrigin', true, true, 'areas/yellow/xorigin'],
        //'AlarmAreasYellowYOrigin'     => ['Areas Yellow Y Origin', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasYOrigin', true, true, 'areas/yellow/yorigin'],
        //'AlarmAreasYellowHeight'      => ['Areas Yellow Height', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasHeight', true, true, 'areas/yellow/height'],
        //'AlarmAreasYellowWidth'       => ['Areas Yellow Width', VARIABLETYPE_INTEGER, 'INSTAR.AlarmAreasWidth', true, true, 'areas/yellow/width'],
        //'AlarmAreasScheduleEnable'    => ['Areas Schedule Enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'areas/schedule/enable'],
        //'AlarmAreasScheduleDay'       => ['Areas Schedule Day', VARIABLETYPE_INTEGER, '', true, true, 'areas/schedule/day'],
        //'AlarmAreasScheduleNIght'     => ['Areas Schedule Night', VARIABLETYPE_INTEGER, '', true, true, 'areas/schedule/night'],
        //TODO Schedule Wochenplan?
        /* alarm/schedule/master/sunday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/master/monday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/master/tuesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/master/wednesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/master/thursday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/master/friday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/master/saturday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/motiondetection/sunday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/motiondetection/monday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/motiondetection/tuesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/motiondetection/wednesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/motiondetection/thursday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/motiondetection/friday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/motiondetection/saturday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/pir/sunday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/pir/monday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/pir/tuesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/pir/wednesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/pir/thursday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/pir/friday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/pir/saturday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/input/sunday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/input/monday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/input/tuesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/input/wednesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/input/thursday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/input/friday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/input/saturday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/audio/sunday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/audio/monday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/audio/tuesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/audio/wednesday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/audio/thursday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/audio/friday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        alarm/schedule/audio/saturday	{"val":"NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"} */
        'AlarmPushEnable'   => ['Push enable', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'push/enable'],
        'AlarmPushInterval' => ['Push Interval', VARIABLETYPE_STRING, 'INSTAR.AlarmPushInterval', true, true, 'push/interval'],
    ];
    public function Create()
    {
        if (!IPS_VariableProfileExists('INSTAR.AlarmTriggered')) {
            $this->RegisterProfileInteger('INSTAR.AlarmTriggered', 'Information', '', '', 1, 10, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmActionsInterval')) {
            $this->RegisterProfileInteger('INSTAR.AlarmActionsInterval', 'Information', '', '', 1, 3600, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmActionsEMailSnapCount')) {
            $this->RegisterProfileInteger('INSTAR.AlarmActionsEMailSnapCount', 'Information', '', '', 1, 10, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmActionsSnapshotCount')) {
            $this->RegisterProfileInteger('INSTAR.AlarmActionsSnapshotCount', 'Information', '', '', 1, 8, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmActionsResolution')) {
            $this->RegisterProfileStringEx('INSTAR.AlarmActionsResolution', 'Information', '', '', [
                [11, '11', '', 0x00FF00],
                [12, '12', '', 0x00FF00],
                [13, '13', '', 0x00FF00],
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmActionsRecordingDuration')) {
            $this->RegisterProfileStringEx('INSTAR.AlarmActionsRecordingDuration', 'Clock', '', '', [
                [15, '15', '', 0x00FF00],
                [30, '30', '', 0x00FF00],
                [45, '45', '', 0x00FF00],
                [60, '60', '', 0x00FF00],
            ]);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmTriggeredTriggers')) {
            $this->RegisterProfileIntegerEx('INSTAR.AlarmTriggeredTriggers', 'Information', '', '', [
                [1, 'Area 1', '', 0x00FF00],
                [2, 'Area 2', '', 0x00FF00],
                [4, 'Area 3', '', 0x00FF00],
                [8, 'Area 4', '', 0x00FF00],
                [256, 'Area 5', '', 0x00FF00],
                [512, 'Area 6', '', 0x00FF00],
                [1024, 'Area 7', '', 0x00FF00],
                [2048, 'Area 8', '', 0x00FF00],
                [16, 'PIR Sensor', '', 0x00FF00],
                [32, 'Alrm Input', '', 0x00FF00],
                [64, 'Audio', '', 0x00FF00],
                [128, 'Manual Trigger', '', 0x00FF00],
                [17, 'Area 1 & PIR', '', 0x00FF00],
                [18, 'Area 2 & PIR', '', 0x00FF00],
                [20, 'Area 3 & PIR', '', 0x00FF00],
                [24, 'Area 4 & PIR', '', 0x00FF00],
                [272, 'Area 5 & PIR', '', 0x00FF00],
                [528, 'Area 6 & PIR', '', 0x00FF00],
                [1040, 'Area 7 & PIR', '', 0x00FF00],
                [2064, 'Area 8 & PIR', '', 0x00FF00],
                [33, 'Area 1 & Input', '', 0x00FF00],
                [34, 'Area 2 & Input', '', 0x00FF00],
                [36, 'Area 3 & Input', '', 0x00FF00],
                [40, 'Area 4 & Input', '', 0x00FF00],
                [288, 'Area 5 & Input', '', 0x00FF00],
                [544, 'Area 6 & Input', '', 0x00FF00],
                [1056, 'Area 7 & Input', '', 0x00FF00],
                [2080, 'Area 8 & Input', '', 0x00FF00],
                [65, 'Area 1 & Audio', '', 0x00FF00],
                [66, 'Area 2 & Audio', '', 0x00FF00],
                [68, 'Area 3 & Audio', '', 0x00FF00],
                [72, 'Area 4 & Audio', '', 0x00FF00],
                [320, 'Area 5 & Audio', '', 0x00FF00],
                [567, 'Area 6 & Audio', '', 0x00FF00],
                [1088, 'Area 7 & Audio', '', 0x00FF00],
                [2112, 'Area 8 & Audio', '', 0x00FF00],
                [3, 'Area 1 & 2', '', 0x00FF00],
                [5, 'Area 1 & 3', '', 0x00FF00],
                [9, 'Area 1 & 4', '', 0x00FF00],
                [257, 'Area 1 & 5', '', 0x00FF00],
                [513, 'Area 1 & 6', '', 0x00FF00],
                [1025, 'Area 1 & 7', '', 0x00FF00],
                [2049, 'Area 1 & 8', '', 0x00FF00],
                [6, 'Area 2 & 3', '', 0x00FF00],
                [10, 'Area 2 & 4', '', 0x00FF00],
                [258, 'Area 2 & 5', '', 0x00FF00],
                [514, 'Area 2 & 6', '', 0x00FF00],
                [1026, 'Area 2 & 7', '', 0x00FF00],
                [2050, 'Area 2 & 8', '', 0x00FF00],
                [12, 'Area 3 & 4', '', 0x00FF00],
                [260, 'Area 3 & 5', '', 0x00FF00],
                [516, 'Area 3 & 6', '', 0x00FF00],
                [1028, 'Area 3 & 7', '', 0x00FF00],
                [2052, 'Area 3 & 8', '', 0x00FF00],
                [264, 'Area 4 & 5', '', 0x00FF00],
                [520, 'Area 4 & 6', '', 0x00FF00],
                [1032, 'Area 4 & 7', '', 0x00FF00],
                [2056, 'Area 4 & 8', '', 0x00FF00],
                [768, 'Area 5 & 6', '', 0x00FF00],
                [1280, 'Area 5 & 7', '', 0x00FF00],
                [2304, 'Area 5 & 8', '', 0x00FF00],
                [1536, 'Area 6 & ', '', 0x00FF00],
                [2560, 'Area 6 & 8', '', 0x00FF00],
                [3072, 'Area 7 & 8', '', 0x00FF00],
                [15, 'Area 1,2,3,4', '', 0x00FF00],
                [3840, 'Area 5,6,7,8', '', 0x00FF00],
                [3075, 'Area 1,2,7,8', '', 0x00FF00],
                [780, 'Area 3,4,5,6', '', 0x00FF00],
            ]);
        }

        if (!IPS_VariableProfileExists('INSTAR.AlarmTriggeredTriggers')) {
            $this->RegisterProfileStringEx('INSTAR.AlarmTriggeredTriggers', 'Information', '', '', [
                [5, '5', '', 0x00FF00],
                [60, '60', '', 0x00FF00],
            ]);
        }

        if (!IPS_VariableProfileExists('INSTAR.AlarmAreasXOrigin')) {
            $this->RegisterProfileInteger('INSTAR.AlarmAreasXOrigin', 'Information', '', '', 0, 1920, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmAreasYOrigin')) {
            $this->RegisterProfileInteger('INSTAR.AlarmAreasYOrigin', 'Information', '', '', 0, 1080, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmAreasHeight')) {
            $this->RegisterProfileInteger('INSTAR.AlarmAreasHeight', 'Information', '', '', 0, 1080, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmAreasWidth')) {
            $this->RegisterProfileInteger('INSTAR.AlarmAreasWidth', 'Information', '', '', 0, 1920, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.AlarmPushInterval')) {
            $this->RegisterProfileStringEx('INSTAR.AlarmPushInterval', 'Information', '', '', [
                [5, '5', '', 0x00FF00],
                [60, '60', '', 0x00FF00],
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