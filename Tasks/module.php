<?php

declare(strict_types=1);
require_once __DIR__ . '/../libs/InstarBaseModule.php';

class Tasks extends InstarBaseModule
{
    const SUBTOPIC = 'task';

    public static $Variables = [
        'TaskPhotoseriesSDCardEnable'                       => ['Photoseries SD Card Enable', VARIABLETYPE_BOOLEAN, '', true, true, 'photoseries/sdcard/enable'],
        'TaskPhotoseriesSDCardInterval'                     => ['Photoseries SD Card Interval', VARIABLETYPE_INTEGER, 'INSTAR.PhotoseriesInterval', true, true, 'photoseries/sdcard/interval'],
        'TaskPhotoseriesFTPEnable'                          => ['Photoseries FTP Enable', VARIABLETYPE_BOOLEAN, '', true, true, 'photoseries/ftp/enable'],
        'TaskPhotoseriesFTPEnable'                          => ['Photoseries FTP Enable', VARIABLETYPE_INTEGER, 'INSTAR.PhotoseriesInterval', true, true, 'photoseries/ftp/Interval'],
        'TaskPhotoseriesFTPFixedName'                       => ['Photoseries FTP Fixed Name', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'photoseries/ftp/fixedname'],
        'TaskPhotoseriesFTPFilename'                        => ['Photoseries FTP Filename', VARIABLETYPE_STRING, '', true, true, 'photoseries/ftp/filename'],
        'TaskPhotoseriesFTPPrefix'                          => ['Photoseries FTP Prefix', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'photoseries/ftp/prefix'],
        /* task/photoseries/schedule/sunday	{"val":"-week0=NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"-week0=PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        task/photoseries/schedule/monday	{"val":"-week0=NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"-week0=PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        task/photoseries/schedule/tuesday	{"val":"-week0=NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"-week0=PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        task/photoseries/schedule/wednesday	{"val":"-week0=NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"-week0=PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        task/photoseries/schedule/thursday	{"val":"-week0=NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"-week0=PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        task/photoseries/schedule/friday	{"val":"-week0=NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"-week0=PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"}
        task/photoseries/schedule/saturday	{"val":"-week0=NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"} - {"val":"-week0=PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"} */
        'TaskPhotoseriesSnapBase64'                      => ['Photoseries FTP Snap Base64', VARIABLETYPE_STRING, '', true, true, 'photoseries/snap/base64'],
        'TaskVideoPlanrecEnable'                         => ['Video Plan Rec', VARIABLETYPE_BOOLEAN, '~Switch', true, true, 'video/planrec/enable'],
        'TaskVideoPlanrecChannel'                        => ['Video Plan Channel', VARIABLETYPE_INTEGER, 'INSTAR.TaskVideoPlanrecChannel', true, true, 'video/planrerc/channel'],
        'TaskVideoPlanrecLength'                         => ['Video Plan Length', VARIABLETYPE_INTEGER, '', true, true, 'video/planrec/length'],
        'TaskVideoRecStart'                              => ['Video Rec Start', VARIABLETYPE_INTEGER, 'INSTAR.TaskVideoRecStart', true, true, 'video/rec/start'],
        'TaskVideoRecLength'                             => ['Video Rec Length', VARIABLETYPE_INTEGER, 'INSTAR.TaskVideoRecLength', true, true, 'video/rec/length'],
        'TaskVideoRecStatus'                             => ['Video Rec Status', VARIABLETYPE_INTEGER, 'INSTAR.TaskVideoRecStatus', true, true, 'video/rec/status'],

    ];
    public function Create()
    {
        if (!IPS_VariableProfileExists('INSTAR.PhotoseriesInterval')) {
            $this->RegisterProfileInteger('INSTAR.PhotoseriesInterval', 'Clock', '', '', 1, 86400, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.TaskVideoPlanrecChannel')) {
            $this->RegisterProfileInteger('INSTAR.TaskVideoPlanrecChannel', 'Informationen', '', '', 11, 12, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.TaskVideoRecStart')) {
            $this->RegisterProfileInteger('INSTAR.TaskVideoRecStart', 'Informationen', '', '', 15, 60, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.TaskVideoRecStop')) {
            $this->RegisterProfileInteger('INSTAR.TaskVideoRecStop', 'Informationen', '', '', 1, 1, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.TaskVideoRecLength')) {
            $this->RegisterProfileInteger('INSTAR.TaskVideoRecLength', 'Informationen', '', '', 15, 900, 1);
        }
        if (!IPS_VariableProfileExists('INSTAR.TaskVideoRecStatus')) {
            $this->RegisterProfileInteger('INSTAR.TaskVideoRecStatus', 'Informationen', '', '', 1, 3, 1);
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